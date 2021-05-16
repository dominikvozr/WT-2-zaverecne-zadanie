<div class="form-row">
    <div class="col">
        <div class="form-group line">
            <label for="">Question:</label>
            <div class="form-row ">
                <input type="text" value="{{ $task->question }}"  class="form-control question" disabled>
                <div class="point">
                    <input type="number" name="{{ $task->id .'|'.$task->taskType }}" value="{{ $answer->points }}" class="form-control points" {{ $studentId ? '' : 'disabled'}}>
                </div>
            </div>

            <div class="col-50">
                <label for="">Answer:</label>
                <input type="text" value="{{ $answer->value }}" class="form-control" disabled>
            </div>
        </div>
    </div>
</div>
