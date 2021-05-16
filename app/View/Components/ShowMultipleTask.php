<?php

namespace App\View\Components;

use App\Models\Answer;
use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowMultipleTask extends Component {

    public $task;
    public $studentId;
    public $answers;
    public $points;
    public $pdf;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($task, $student = null, $pdf = false) {
        $this->task = $task;
        $this->pdf = $pdf;
        $this->studentId = $student;
        $this->answers = $this->parseAnswers($student);

        if ($this->studentId !== null)
            $this->getPoints();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render() {
        return view('components.show-multiple-task');
    }

    public function parseAnswers($studentId = null) {
        if ($studentId === null) {
            $this->points = $this->task->points;
            return Answer::where('task_id', $this->task->id)
                ->where('user_id', Auth::id())
                ->get();
        }

        return Answer::where('task_id', $this->task->id)
            ->where('student_id', $studentId)
            ->get();
    }

    public function getPoints() {
        if (!isset($this->answers[0])) {
            $this->points = 0;
            return;
        }

        $min = $this->answers[0]->points;
        foreach ($this->answers as $answer) {
            if ($answer->points < $min)
                $min = $answer->points;
        }
        $this->points = $min;
    }
}
