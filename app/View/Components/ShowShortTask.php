<?php

namespace App\View\Components;

use App\Models\Answer;
use App\Models\Task;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class ShowShortTask extends Component {

    public $task;
    public $studentId;
    public $answer;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($task, $student = null) {
        $this->task = $task;
        $this->studentId = $student;
        if ($student === null)
            $this->answer = $this->get_user_answer();
        else
            $this->answer = $this->get_student_answer($student);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('components.show-short-task');
    }

    private function get_student_answer($studentId) {
        return Answer::where('task_id', $this->task->id)
            ->where('student_id', $studentId)
            ->firstOrNew();
    }

    private function get_user_answer() {
        return Answer::where('task_id', $this->task->id)
            ->where('user_id', Auth::id())
            ->firstOrNew();
    }
}
