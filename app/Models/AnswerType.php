<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerType extends Model {
    use HasFactory;

    public function taskType() {
        return $this->hasOne(TaskType::class);
    }

    public function answers() {
        return $this->belongsToMany(Answer::class);
    }
}
