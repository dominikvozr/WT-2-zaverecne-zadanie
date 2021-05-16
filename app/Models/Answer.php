<?php

namespace App\Models;

use Awobaz\Compoships\Compoships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model {
    use HasFactory, Compoships;

    protected $fillable = [
        'user_id',
        'student_id',
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

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function student() {
        return $this->belongsTo(Student::class);
    }

}
