<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskType extends Model
{
    use HasFactory;

    public function answerType() {
        return $this->hasOne(AnswerType::class);
    }

    public function tasks() {
        return $this->belongsToMany(Task::class);
    }
}
