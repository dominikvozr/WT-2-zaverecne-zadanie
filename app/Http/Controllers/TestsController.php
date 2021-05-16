<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Connection;
use App\Models\Exam;
use App\Models\Task;
use App\Models\Test;
use Auth;
use Illuminate\Http\Request;
use Str;

class TestsController extends Controller{
    public function answers( $id ) {
        $test = Test::where('user_id', Auth::id())
                    ->where('id', $id)
                    ->first();

        return view('test_answers')
            ->with('test', $test);
    }

    public function changeActivation(Request $request) {
        $test = Test::find($request->test_id);

        $test->active = $request->active;

        $test->save();

        return response()->json('test activity updated to ' . $request->active);
    }

    public function studentAnswers( $id ) {
        $exam = Exam::find($id);
        return view('test_student_answers')
            ->with('exam', $exam);
    }

    public function detail( $id ) {
        $test = Test::where('user_id', Auth::id())
                    ->where('id', $id)
                    ->first();

        return view('test_detail')
            ->with('test', $test);
    }

    public function store (Request $request) {
        $test_code = crypt(time(), 'l9r');

        $test = Test::create([
            'user_id'=> Auth::id(),
            'code'   => $test_code,
            'name'   => $request->name,
            'time'   => $request->time * 60,
            'active' => true
        ]);

        foreach ($request->questions as $task) {
            $this->storeTask($task, $test->id);
            $test->total_points += $task['points'];
            $test->questions_number += 1;
        }

        $test->save();

        return response()->json( $test );
    }

    private function storeTask($reqTask, $testId) {
        $task = Task::create([
            'test_id'  => $testId,
            'question' => $reqTask['question'],
            'points'   => $reqTask['points'],
            'taskType' => $reqTask['type'],
        ]);

        switch ($reqTask['type']) {
            case "multiple":
                $this->storeTaskMultiple($task, $reqTask);
                break;
            case "short":
                $this->storeTaskShort($task, $reqTask);
                break;
            case "pair":
                $this->storeTaskPair($task, $reqTask);
                break;
            //case "draw": $this->storeTaskDraw($task, $reqTask);
        }
    }

    private function storeTaskMultiple(Task $task, $reqTask) {
        foreach ($reqTask['Answers'] as $answer) {
            Answer::create([
                'user_id'    => Auth::id(),
                'task_id'    => $task->id,
                'answerType' => $reqTask['type'],
                'value'      => $answer['answer'],
                'success'    => $answer['type'] == 'true' ? 1 : 0,
                'points'     => $task->points,
            ]);
        }
    }

    private function storeTaskShort(Task $task, $reqTask) {
        Answer::create([
            'user_id'    => Auth::id(),
            'task_id'    => $task->id,
            'answerType' => $reqTask['type'],
            'value'      => $reqTask['answer'],
            'success'    => 1,
            'points'     => $task->points,
        ]);
    }

    private function storeTaskPair(Task $task, $reqTask) {
        foreach ($reqTask['Answers'] as $answer) {
            Connection::create([
                'user_id'      => Auth::id(),
                'task_id'      => $task->id,
                'answer_left'  => $answer['pair-left'],
                'answer_right' => $answer['pair-right'],
                'success'      => 1,
                'points'       => $task->points,
            ]);
        }
    }
}
