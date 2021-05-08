<?php

namespace App\Listeners;

use App\Events\ExamFinished;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendExamFinishedNotification implements ShouldQueue {

    /**
     * The name of the queue the job should be sent to.
     *
     * @var string|null
     */
    public $queue = 'listeners';

    /**
     * The time (seconds) before the job should be processed.
     *
     * @var int
     */
    public $delay;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct() {

    }

    /**
     * Handle the event.
     *
     * @param  ExamFinished  $event
     * @return void
     */
    public function handle(ExamFinished $event) {
        //$this->delay = $event->exam->test->time;
        dd('exam finished');
    }
}
