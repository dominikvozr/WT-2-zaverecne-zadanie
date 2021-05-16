<?php

namespace App\Jobs;

use App\Models\Exam;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TestCountStarted implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $exam;
    public $finish_jop;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Exam $exam) {
        $this->exam = $exam;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {
        $this->finish_jop = FinishExam::dispatch($this->exam, null, now())
            ->delay(now()->addMinutes( $this->exam->test->time / 60 ));
    }
}
