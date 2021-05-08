<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskType extends Model
{
    use HasFactory;

    protected $fillable = ['answerType_id', 'task_before', 'task_after', 'created_at', 'updated_at'];


    public function answerType() {
        return $this->hasOne(AnswerType::class);
    }

    public function tasks() {
        return $this->belongsToMany(Task::class);
    }
}
