<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model {
    use HasFactory;

    public function answers() {
        return $this->hasMany(Answer::class);
    }

    public function answer() {
        return $this->hasOne(Answer::class);
    }
}
