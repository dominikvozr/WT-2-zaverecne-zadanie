<?php

namespace App\Jobs;

use App\Events\ExamFinished;
use App\Models\Exam;
use App\Models\Student;
use Illuminate\Broadcasting\Channel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\Middleware\WithoutOverlapping;
use Illuminate\Queue\SerializesModels;

class FinishExam implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $exam;

    public $student;

    public $time;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Exam $exam, Student $student = null, $time) {
        $this->exam = $exam;
        $this->student = $student;
        $this->time = $time;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {
        $freshExam = $this->exam->fresh();

        if ($this->student === null)
            $this->student = $this->exam->student;

        if ( !$freshExam->submitted )
            ExamFinished::dispatch($this->exam, $this->student);
        else
            $this->release();
    }
}
