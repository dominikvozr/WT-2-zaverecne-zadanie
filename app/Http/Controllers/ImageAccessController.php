<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageAccessController extends Controller {

    public function serve($image) {
        //if(Auth::check()) {
            $answer = Answer::where('value', $image)->first();
            if ( $answer->task->test->user_id !== Auth::id() ) abort('404');
            $imagepath = storage_path('app/' . $image);
            return response()->file($imagepath);
        //}else{
            return abort('404');
        //}
    }
}
