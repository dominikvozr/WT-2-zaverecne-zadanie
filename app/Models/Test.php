<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model {
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'code',
        'active',
        'expiration_date',
        'questions_number',
        'time',
        'total_points',
        'created_at',
        'updated_at' ];

    public function tasks() {
        return $this->hasMany(Task::class);
    }

    public function exams() {
        return $this->hasMany(Exam::class);
    }

    public function students() {
        return $this->belongsToMany(Student::class);
    }
}
