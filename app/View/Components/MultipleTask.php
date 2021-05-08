<?php

namespace App\View\Components;

use App\Models\Answer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MultipleTask extends Component {

    public $task;

    public $answers;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($task) {
        $this->task = $task;
        $this->answers = $this->parseAnswers();

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render() {
        return view('components.multiple-task');
    }

    public function parseAnswers() {
        $answers = Answer::where('task_id', $this->task->id)
            ->whereNotNull('user_id')
            ->get();
        return $answers;
    }

}
