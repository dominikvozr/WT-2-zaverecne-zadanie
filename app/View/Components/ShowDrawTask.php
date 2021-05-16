<?php

namespace App\View\Components;

use App\Models\Answer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowDrawTask extends Component {

    public $task;
    public $studentId;
    public $answer;
    //public $img;
    public $points;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($task, $student = null) {
        $this->task = $task;
        $this->studentId = $student;
        if ($student === null) {
            $this->answer = null;
            //$this->img = null;
            $this->points = $this->task->points;
        } else {
            $this->answer = $this->getAnswer($student);
            //$this->img = $this->getImg($this->answer);
            if (isset($this->answer))
                $this->points = $this->answer->points;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render() {
        return view('components.show-draw-task');
    }

    private function getAnswer($studentId) {
        return Answer::where('task_id', $this->task->id)
            ->where('student_id', $studentId)
            ->first();
    }

    /*private function getImg(Answer $answer) {
        return route("image", $answer->value);
    }*/
}
