<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeachersController extends Controller {
    public function index() {
        return view('dashboard');
    }

    public function tests() {
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
}
