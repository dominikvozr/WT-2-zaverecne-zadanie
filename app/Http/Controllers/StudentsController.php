<?php

namespace App\Http\Controllers;

use App\Events\ExamNotification;
use App\Http\Requests\StudentLoginRequest;
use App\Jobs\TestCountStarted;
use App\Models\Cheat;
use App\Models\Exam;
use App\Models\Test;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class StudentsController extends Controller {

    /**
     * @throws ValidationException
     */
    public function login(StudentLoginRequest $request) {

        $student = $request->authenticate();

        $test = Test::where('code', $request->code)->first();

        if (!isset($test)) {
            $this->logoutStudent();
            throw ValidationException::withMessages([
                'test' => __('auth.test_not_found'),
            ]);
        }

        if ($test->active === 0) {
            $this->logoutStudent();
            throw ValidationException::withMessages([
                'test' => __('auth.test_closed'),
            ]);
        }

        $exam = Exam::firstOrCreate([
            "student_id" => $student->id,
            "code"       => $request->code,
            "test_id"    => $test->id,
            //"ends_at"    => date("Y-m-d H:i:s", time() + $test->time),
        ]);

        session(['exam_id' => $exam->id]);

        return redirect("exam/$request->code");
    }

    /**
     * @throws ValidationException
     */
    public function exam($code) {
        if (! session()->exists('student_id')) return redirect('login');

        $exam = Exam::where('code', $code)
            ->where('student_id', session('student_id'))
            ->first();

        if ($exam->test->active === 0) {
            $this->logoutStudent();
            throw ValidationException::withMessages([
                'email' => __('auth.test_closed'),
            ]);
        }

        if ($exam == null) abort(404);
        if ($exam->test->active !== 1) abort(404);
        if ($exam->ends_at == null) {
            $exam->ends_at = date("Y-m-d H:i:s", time() + $exam->test->time);
            ExamNotification::dispatch($exam, $exam->student, "exam started");//->onQueue('teacherNotify');
            $exam->job_id = TestCountStarted::dispatchAfterResponse($exam);
            $exam->save();
        }

        $ends_at_timestamp = strtotime($exam->ends_at);

        if ($ends_at_timestamp <= now()->timestamp) {
            if (session()->exists('name')) $this->logoutStudent();
            return redirect('login');
        }

        session()->reflash();

        return view('exam')
            ->with('exam', $exam);
    }

    public function studentCheat(Request $request) {

        $cheat = Cheat::create([
            'student_id' => session()->get('student_id'),
            'exam_id'    => session()->get('exam_id'),
            'message'    => $request['message'],
        ]);

        ExamNotification::dispatch($cheat->exam, $cheat->student, "CHEATING!!!", $cheat);

        return response()->json('cheat saved!');
    }

    private function logoutStudent() {
        session()->forget(['name', 'surname', 'ais', 'student_id', 'exam_id']);
    }
}
