<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cheat extends Model {
    use HasFactory;

    protected $fillable = ['student_id', 'exam_id', 'message', 'created_at', 'updated_at'];

    public function student() {
        return $this->belongsTo(Student::class);
    }

    public function exam() {
        return $this->belongsTo(Exam::class);
    }
}
