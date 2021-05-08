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

    public $student;

    public $message = 'koniec skusky';
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Exam $exam, Student $student = null ) {
        $this->exam = $exam;
        if ($this->student === null)
            $this->student = $this->exam->student;
        else
            $this->student = $student;

        //$this->delay($appointment->start_date_time)->subDay(1);

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
