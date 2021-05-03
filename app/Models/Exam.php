<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model {
    use HasFactory;

    public function answers() {
        return $this->hasMany(Answer::class);
    }

    public function test() {
        return $this->belongsTo(Test::class);
    }

    public function tasks()
    {
        return $this->hasManyThrough(Task::class, Test::class);
    }
}
