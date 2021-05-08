<?php

namespace App\Jobs;

use App\Events\ExamFinished;
use App\Models\Exam;
use App\Models\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FinishExam implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $exam;

    public $student;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Exam $exam, Student $student = null) {
        $this->exam = $exam;
        $this->student = $student;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {
        if ($this->student === null)
            $this->student = $this->exam->student;

        //dd('EXAMO FINITOOO!');

        ExamFinished::dispatch($this->exam, $this->student);
    }
}
