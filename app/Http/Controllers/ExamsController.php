<?php

namespace App\Http\Controllers;

use App\Events\ExamNotification;
use App\Models\Answer;
use App\Models\Connection;
use App\Models\Exam;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Str;

class ExamsController extends Controller {

    private $studentId;

    public function store(Request $request) {
        if (! session()->exists('student_id')) return redirect('login');

        $this->studentId = session()->get('student_id');

        $exam = Exam::find($request->id);

        if ($exam->total_points !== null) $this->logout();

        $points = 0;
        $answers = 0;
        $tasksMap = $this->buildHashMap($exam->test->tasks);

        ExamNotification::dispatch($exam, $exam->student, "exam finished");

        foreach ($request->tasks as $task) {

            switch ($task['taskType']) {
                case 'short':
                    $answer = $this->storeShort($task, $tasksMap[$task['taskId']], $exam->id);
                    break;
                case 'multiple':
                    $answer = $this->storeMultiple($task, $tasksMap[$task['taskId']], $exam->id);
                    break;
                case 'pair':
                    $answer = $this->storePair($task, $tasksMap[$task['taskId']], $exam->id);
                    break;
                case 'draw':
                    if ($task['answers'] != "")
                        $this->storeDraw($task, $tasksMap[$task['taskId']], $exam->id);
                    break;
            }

            $answers++;
            if ($task['taskType'] === 'draw') continue;
            $points += $answer->points;
        }

        $exam->submitted_answers = $answers;
        $exam->ended_at = now();
        $exam->total_points = $points;
        $exam->submitted = $request->submitted;

        $exam->save();

        $this->logout();

        return response()->json('data saved');
    }

    private function logout() {
        session()->forget(['name', 'surname', 'ais', 'student_id', 'exam_id']);
    }

    private function storeShort($studentTask, Task $teacherTask, $examId) {
        $points = 0;
        $success = 0;

        if (strtolower($teacherTask->answer->value) === strtolower($studentTask['answers'])) {
            $points = $teacherTask->points;
            $success = 1;
        }

        $answer = Answer::create([
            'student_id' => $this->studentId,
            'answerType' => $studentTask['taskType'],
            'exam_id'    => $examId,
            'task_id'    => $teacherTask->id,
            'value'      => $studentTask['answers'],
            'points'     => $points,
            'success'    => $success,
        ]);

        return $answer;
    }

    private function storeMultiple($studentTask, Task $teacherTask, $examId) {

        $global_success = 1;

        $answers = Answer::where('user_id', $teacherTask->test->user_id)
            ->where('task_id', $teacherTask->id)
            ->get();

        foreach ($answers as $answer) {

            $points = 0;

            if ((bool)$answer->success === $studentTask['answers'][$answer->id]['checked'])
                $points = $teacherTask->points;
            else $global_success = 0;

            Answer::create([
                'student_id' => $this->studentId,
                'answerType' => $studentTask['taskType'],
                'exam_id'    => $examId,
                'task_id'    => $teacherTask->id,
                'value'      => $studentTask['answers'][$answer->id]['value'],
                'points'     => $points,
                'success'    => $studentTask['answers'][$answer->id]['checked'],
            ]);

        }

        return $global_success !== 0 ? $teacherTask : (object)[
            'points' => 0,
            'success' => 0,
        ];

    }

    private function storePair($studentTask, Task $teacherTask, $examId) {

        $global_success = 1;
        $connections = Connection::where('user_id', $teacherTask->test->user_id)
            ->where('task_id', $teacherTask->id)
            ->get();

        foreach ($studentTask['answers'] as $connection) {

            $points = 0;
            $success = 0;


            if ($this->findConnection($connection, $connections)) {
                $points = $teacherTask->points;
                $success = 1;
            } else
                $global_success = 0;

            Connection::create([
                'student_id'   => $this->studentId,
                'task_id'      => $teacherTask->id,
                'exam_id'      => $examId,
                'answer_left'  => $connection[0],
                'answer_right' => $connection[1],
                'points'       => $points,
                'success'      => $success,
            ]);

        }


        return $global_success !== 0 ? $connections[0] : (object)[
            'points' => 0,
            'success' => 0,
        ];

    }

    private function storeDraw($studentTask, Task $teacherTask, $examId) {

        $image_64 = $studentTask['answers'];

        $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf

        $replace = substr($image_64, 0, strpos($image_64, ',')+1);

        $image = str_replace($replace, '', $image_64);

        $image = str_replace(' ', '+', $image);

        $img = base64_decode($image);

        $imageName = time() . Str::random(10).'.'.$extension;

        Storage::put("$imageName", $img);

        $answer = Answer::create([
            'student_id' => $this->studentId,
            'answerType' => $studentTask['taskType'],
            'exam_id'    => $examId,
            'task_id'    => $teacherTask->id,
            'value'      => "$imageName"//env('APP_URL').'storage/app/img/'.$imageName,
        ]);

        return $answer;
    }

    private function buildHashMap($tasks): array {
        $hMap = [];
        foreach ($tasks as $task) {
            $hMap[$task->id] = $task;
        }
        return $hMap;
    }

    private function findConnection($connection, $teacherConnections) {
        foreach ($teacherConnections as $conn) {
            if ($conn->answer === $connection) return true;
            if ($conn->answer[0] === $connection[0]) return false;
        }

        return false;
    }
}
