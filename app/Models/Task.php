<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model {
    use HasFactory;

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
        return $this->hasMany(Answer::class);
    }

    public function connections() {
        return $this->hasMany(Connection::class);
    }

    public function answer() {
        return $this->hasOne(Answer::class);
    }

    public function taskType() {
        return $this->hasOne(Task::class);
    }
}
