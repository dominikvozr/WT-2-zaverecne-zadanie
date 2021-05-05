<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentLoginRequest;
use App\Models\Exam;
use App\Models\Test;

class StudentsController extends Controller {
    public function login(StudentLoginRequest $request) {

        $student = $request->authenticate();

        $test = Test::where('code', $request->code)->first();

        if (!isset($test)) return view('404');

        $exam = Exam::create([
            "student_id"         => $student->id,
            "test_id"    => $test->id,
            "started_at" => now(),
            "ends_at"    => now() + $test->time,
        ]);

        return view('exam')
            ->with('student', $student)
            ->with('exam', $exam);
    }
}
