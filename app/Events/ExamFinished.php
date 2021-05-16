<?php

namespace App\Events;

use App\Models\Exam;
use App\Models\Student;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ExamFinished implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $exam;

    public $message = 'koniec skusky';

    public $time;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Exam $exam ) {
        $this->exam = $exam;
        $this->student = $this->exam->student;
        /*if ($this->student === null)
        else
            $this->student = $student;*/

        //$this->delay($appointment->start_date_time)->subDay(1);
        $this->time = now();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel
     */
    public function broadcastOn() {
        return new Channel('exam.finished.' . $this->exam->id);
    }

    /**
     * Set the event name
     *
     * @return string
     */
    public function broadcastAs() {
        return 'exam-finished';
    }
}
