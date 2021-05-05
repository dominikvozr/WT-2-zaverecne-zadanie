<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Auth;
use Illuminate\Http\Request;

class TestsController extends Controller{
    public function answers( $id ) {
        $test = Test::where(Auth::id())
                    ->where('id', $id)
                    ->get();

        return view('test_answers')
            ->with('test', $test);
    }

    public function studentAnswers( $id ) {
        $test = Test::where(Auth::id())
            ->where('id', $id)
            ->get();

        return view('test_student_answers')
            ->with('test', $test);
    }

    public function detail( $id ) {
        $test = Test::where(Auth::id())
                    ->where('id', $id)
                    ->get();

        return view('test_detail')
            ->with('test', $test);
    }
}
