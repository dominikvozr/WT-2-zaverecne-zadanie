<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeachersController extends Controller {
    public function index() {
        return view('dashboard');
    }

    public function tests() {
        //$tests = User::where('id', Auth::id());

        return view('tests');
    }
}
