<?php

namespace App\Listeners;

use App\Events\ExamStarted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendExamStartedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ExamStarted  $event
     * @return void
     */
    public function handle(ExamStarted $event) {



    }
}
