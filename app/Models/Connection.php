<?php

namespace App\Models;

use Awobaz\Compoships\Compoships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Connection extends Model {
    use HasFactory, Compoships;

    protected $fillable = [
        'user_id',
        'student_id',
        'exam_id',
        'answer_left',
        'answer_right',
        'points',
        'success',
        'task_id',
        'created_at',
        'updated_at'
    ];

    public function getAnswerAttribute(): array {
        return [ $this->answer_left, $this->answer_right ];
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function student() {
        return $this->belongsTo(Student::class);
    }

    public function task() {
        return $this->belongsTo(Task::class);
    }
}
