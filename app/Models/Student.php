<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model {
    use HasFactory;

    public function exams() {
        return $this->hasMany(Exam::class);
    }

    public function answers() {
        return $this->hasMany(Answer::class);
    }

    public function cheats() {
        return $this->hasMany(Cheat::class);
    }
}
