<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Connection extends Model {
    use HasFactory;

    protected $fillable = [
        'user_id',
        'student_id',
        'answer_left_id',
        'answer_right_id',
        'answer_left',
        'answer_right',
        'points',
        'success',
        'task_id',
        'created_at',
        'updated_at'
    ];

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
