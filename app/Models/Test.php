<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model {
    use HasFactory;

    protected $appends = ['testDurationTime'];

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

    /**
     * @throws \Exception
     */
    public function getTestDurationTimeAttribute() {
        return $this->time >= 3600 ?
            date("H:i:s", $this->time) . ' hours' :
            date("i:s", $this->time) . ' min';
    }

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
