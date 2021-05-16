<?php

namespace App\View\Components;

use App\Models\Connection;
use App\Models\Task;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class ShowPairTask extends Component {

    public $task;
    public $studentId;
    public $connections;
    public $points;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($task, $student = null) {
        $this->task = $task;
        $this->studentId = $student;
        if ($student === null)
            $this->parseTeacherConnections();
        else
            $this->parseStudentConnections($student);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render() {
        return view('components.show-pair-task');
    }

    public function parseTeacherConnections() {
        $connections = Connection::where('task_id', $this->task->id)
            ->where('user_id', Auth::id())
            ->get();
        $this->points = $this->task->points;
        $this->connections = $connections;
    }

    public function parseStudentConnections($studentId) {
        $connections = Connection::where('task_id', $this->task->id)
            ->where('student_id', $studentId)
            ->get();
        $this->connections = $connections;
        $this->getPoints();
    }

    public function getPoints() {
        if (!isset($this->connections[0])) {
            $this->points = 0;
            return;
        }

        $min = $this->connections[0]->points;
        foreach ($this->connections as $connection) {
            if ($connection->points < $min)
                $min = $connection->points;
        }
        $this->points = $min;
    }
}
