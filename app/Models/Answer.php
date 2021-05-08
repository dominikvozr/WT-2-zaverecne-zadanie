<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model {
    use HasFactory;

    protected $fillable = [
        'user_id',
        'student_id',
        'answerType_id',
        'answerType',
        'exam_id',
        'task_id',
        'value',
        'points',
        'success',
        'created_at',
        'updated_at' ];

    public function task() {
        return $this->belongsTo(Task::class);
    }

}
