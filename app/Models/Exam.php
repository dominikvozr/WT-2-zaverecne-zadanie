<?php

namespace App\Models;

use Config;
use DateTime;
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
        'job_id',
        'code',
        'total_points',
        'submitted_answers',
        'submitted',
        'ends_at',
        'created_at',
        'ended_at',
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

        if (isset($info) && $info->status !== 'fail')
            $this->timezone = $info->timezone;

        date_default_timezone_set ( $this->timezone );
    }


    /**
     * @throws \Exception
     */
    public function getTimeInTestAttribute() {
        $datetime1 = new DateTime($this->ended_at);
        $datetime2 = new DateTime($this->created_at);
        $interval = $datetime1->diff($datetime2);
        return $interval->format('%s') >= 3600 ?
            $interval->format('%H:%i:%s') . ' hours' :
            $interval->format('%i:%s') . ' min';
        //return date("H:i:s",strtotime($this->updated_at) - strtotime($this->created_at));
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

    public function cheats() {
        return $this->hasMany(Cheat::class);
    }

    public function test() {
        return $this->belongsTo(Test::class);
    }

    /*public function tasks() {
        return $this->hasManyThrough(Task::class, Test::class);
    }*/

    public function student() {
        return $this->belongsTo(Student::class );
    }
}
