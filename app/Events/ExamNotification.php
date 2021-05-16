<?php

namespace App\Events;

use App\Jobs\FinishExam;
use App\Models\Cheat;
use App\Models\Exam;
use App\Models\Student;
use Auth;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ExamNotification implements ShouldBroadcast, ShouldQueue {
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $exam;
    public $message;
    public $student;
    public $cheat;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Exam $exam, Student $student = null, $message, Cheat $cheat = null ) {
        $this->exam = $exam;

        if ($student === null)
            $this->student = $exam->student();
        else
            $this->student = $student;

        $this->message = $message;

        $this->cheat = $cheat;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel
     */
    public function broadcastOn() {
        return new PrivateChannel('exam.'. $this->exam->test->user_id);
    }

    /**
     * Set the event name
     *
     * @return string
     */
    /*public function broadcastAs() {
        return 'exam-notification';
    }*/


}
