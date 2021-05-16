<?php

namespace App\Models;

use Awobaz\Compoships\Compoships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model {
    use HasFactory, Compoships;

    protected $fillable = [
        'test_id',
        'answer_id',
        'taskType_id',
        'taskType',
        'question',
        'points',
        'created_at',
        'updated_at' ];

    public function answers() {
        return $this->hasMany(Answer::class, ['task_id', 'user_id'], ['task_id', 'user_id']);
    }

    public function connections() {
        return $this->hasMany(Connection::class, ['task_id', 'user_id'], ['task_id', 'user_id']);
    }

    public function answer() {
        return $this->hasOne(Answer::class/*, ['task_id', 'user_id'], ['answer_id', '']*/);
    }

    public function taskType() {
        return $this->hasOne(Task::class);
    }

    public function test() {
        return $this->belongsTo(Test::class);
    }
}
