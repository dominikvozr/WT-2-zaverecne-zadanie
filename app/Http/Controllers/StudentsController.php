<?php

namespace App\Http\Controllers;

use App\Events\ExamFinished;
use App\Events\ExamStarted;
use App\Http\Requests\StudentLoginRequest;
use App\Jobs\FinishExam;
use App\Models\Exam;
use App\Models\Test;
use Illuminate\Validation\ValidationException;
use Webmozart\Assert\Assert;

class StudentsController extends Controller {
    /**
     * @throws ValidationException
     */
    public function login(StudentLoginRequest $request) {

        $student = $request->authenticate();

        $test = Test::where('code', $request->code)->first();

        if (!isset($test)) {
            $this->logoutStudent($request);
            throw ValidationException::withMessages([
                'email' => __('auth.test_not_found'),
            ]);
        }

        $exam = Exam::create([
            "student_id" => $student->id,
            "code"       => $request->code,
            "test_id"    => $test->id,
            "started_at" => now(),
            "ends_at"    => date("Y-m-d H:i:s", time() + $test->time),
        ]);

        ExamStarted::dispatch($exam, $student);

        //$job = (new FinishExam($exam, $student))->delay($test->time);

        //$job->

        return redirect("zaverecne_zadanie/exam/$request->code");

        /*return view('exam')
            ->with('exam', $exam)
            ->with('student', $student);*/
    }

    public function exam($code) {
        if (! session()->exists('student_id')) return redirect('zaverecne_zadanie/login');

        $exam = Exam::where('code', $code)
            ->where('student_id', session('student_id'))
            ->first();

        if ($exam == null) abort(404);


        session()->reflash();

        FinishExam::dispatch($exam)
            ->delay(now()->addSeconds(10));
        //ExamFinished::dispatch($exam);
        /*$evt = event(new FinishExam($exam));
        dispatch($evt);*/
        //dd($exam->test->tasks[0]->answers);

        return view('exam')
            ->with('exam', $exam);
    }

    private function logoutStudent($request) {
        $request->session()->forget(['name', 'surname', 'ais', 'student_id']);
    }


}
