<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Connection;
use App\Models\Exam;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeachersController extends Controller {
    public function index() {
        return view('dashboard');
    }

    public function Tests() {
        $tests = Test::where('user_id', Auth::id())->get();

        return view('tests')
            ->with('tests', $tests);
    }

    public function testsLive() {
        $tests = Test::where('user_id', Auth::id())->get();

        return view('testslive')
            ->with('tests', $tests);
    }

    public function testsLiveStudents($id) {
        $test = Test::where('user_id', Auth::id())
            ->where('id', $id)
            ->first();

        return view('tests_live_students')
            ->with('test', $test);
    }

    public function updatePoints(Request $request) {
        $points_diff = 0;
        foreach ($request['questions'] as $tTask) {
            switch ($tTask['answerType']) {
                case 'short':
                    $answer = Answer::where('student_id', $request['student_id'])
                        ->where('task_id', $tTask['id'])
                        ->first();
                    $points_diff += $this->updateShort($answer, $tTask);
                    break;
                case 'multiple':
                    $answers = Answer::where('student_id', $request['student_id'])
                        ->where('task_id', $tTask['id'])
                        ->get();

                    $points_diff += $this->updateMultiple($answers, $tTask);
                    break;
                case 'pair':
                    $connections = Connection::where('student_id', $request['student_id'])
                        ->where('task_id', $tTask['id'])
                        ->get();
                    $points_diff += $this->updatePair($connections, $tTask);
                    break;
                case 'draw':
                    $answer = Answer::where('student_id', $request['student_id'])
                        ->where('task_id', $tTask['id'])
                        ->first();
                    $points_diff += $this->updateDraw($answer, $tTask);
                    break;
            }
        }

        $exam = Exam::find($request['exam_id']);

        $exam->total_points += $points_diff;

        $exam->save();

        return response()->json('data updated!');
     }

    private function updateShort(Answer $answer, $tTask) {

        $diff = $tTask['points'] - $answer->points;

        $answer->points = $tTask['points'];

        $answer->save();

        return $diff;
    }

    private function updateMultiple($answers, $tTask) {
        $min = $answers[0]->points;

        foreach ($answers as $answer) {
            if ($answer->points < $min) $min = $answer->points;

            $answer->points = $tTask['points'];

            $answer->save();
        }

        return $tTask['points'] - $min;
    }

    private function updatePair($connections, $tTask) {

        $min = $connections[0]->points;

        foreach ($connections as $connection) {

            if ($connection->points < $min) $min = $connection->points;

            $connection->points = $tTask['points'];

            $connection->save();
        }

        return $tTask['points'] - $min;
    }

    private function updateDraw($answer, $tTask) {

        $diff = $tTask['points'] - $answer->points;

        $answer->points = $tTask['points'];

        $answer->save();

        return $diff;
    }
}
