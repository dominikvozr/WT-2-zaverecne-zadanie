<?php

namespace App\View\Components;

use App\Models\Connection;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PairTask extends Component {

    public $task;

    public $connections;

    public $leftConnections;
    public $rightConnections;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($task) {
        $this->task = $task;
        $this->rightConnections = [];
        $this->leftConnections = [];
        $this->parseConnections();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render() {
        return view('components.pair-task');
    }

    public function parseConnections() {
        $connections = Connection::where('task_id', $this->task->id)
            ->whereNotNull('user_id')
            ->get();

        $this->connections = $connections;

        foreach ($connections as $connection) {
            array_push($this->leftConnections, $connection->answer_left);
            array_push($this->rightConnections, $connection->answer_right);
        }

        shuffle($this->leftConnections);
        shuffle($this->rightConnections);
    }
}
