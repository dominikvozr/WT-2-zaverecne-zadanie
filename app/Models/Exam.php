<?php

namespace App\Models;

use Config;
use Http;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class Exam extends Model {
    use HasFactory;

    public $timezone;

    protected $fillable = [
        'student_id',
        'test_id',
        'code',
        'total_points',
        'submitted_answers',
        'submitted',
        'ends_at',
        'created_at',
        'updated_at' ];

    protected $appends = ['timeInTest', 'zaciatok', 'koniec'];

    /**
     * Exam constructor.
     *
     */
    public function __construct(array $attributes = array()) {
        parent::__construct($attributes);

        $this->timezone = Config::get('app.timezone');

        $ip = Request::ip();

        $info = Http::get("http://ip-api.com/json/$ip");

        $info = json_decode($info->body());

        if ($info->status !== 'fail')
            $this->timezone = $info->timezone;

        date_default_timezone_set ( $this->timezone );
    }


    public function getTimeInTestAttribute() {
        return $this->started_at - $this->ended_at;
    }

    public function getZaciatokAttribute() {
        return date("j M Y H:i", strtotime($this->created_at));//$this->started_at - $this->ended_at;
    }

    public function getKoniecAttribute() {
        return date("j M Y H:i", strtotime($this->ends_at));
        //return $this->started_at - $this->ended_at;
    }

    public function answers() {
        return $this->hasMany(Answer::class);
    }

    public function test() {
        return $this->belongsTo(Test::class);
    }

    public function tasks() {
        return $this->hasManyThrough(Task::class, Test::class);
    }

    public function student() {
        return $this->belongsTo(Student::class );
    }
}
