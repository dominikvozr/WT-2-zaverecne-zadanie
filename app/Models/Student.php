<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model {
    use HasFactory;

    protected $fillable = [ 'firstname', 'lastname', 'ais_id', 'created_at', 'updated_at' ];

    public function exams() {
        return $this->hasMany(Exam::class);
    }

    public function answers() {
        return $this->hasMany(Answer::class);
    }

    public function connections() {
        return $this->hasMany(Connection::class);
    }

    public function cheats() {
        return $this->hasMany(Cheat::class);
    }

    public function tests() {
        return $this->belongsToMany(Test::class);
    }
}
