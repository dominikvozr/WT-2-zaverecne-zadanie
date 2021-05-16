<div class="form-row">
    <div class="col">
        <div class="form-group line">
            <label for="">Question:</label>
            <div class="form-row ">
                <input type="text" value="{{ $task->question }}" name="DrawQuestion" class="form-control question" disabled>
                <div class="point">
                    <input type="number" name="{{ $task->id .'|'.$task->taskType }}" value="{{ $points }}" class="form-control points" {{ $studentId ? '' : 'disabled'}}>
                </div>
            </div>
            <div class="answers-top">
                <label for="">Answers:</label>
                @foreach($connections as $connection)
                    <div class="pair">Pair:</div>
                    <div class="form-row row-margin">

                        <div class="col form-pair">
                            <div class="form-group">
                                <input type="text" value="{{ $connection->answer_left }}" name="answer" class="form-control" disabled >
                            </div>
                        </div>
                        <div class="col form-pair">
                            <div class="form-group">
                                <input type="text" value="{{ $connection->answer_right }}" name="answer" class="form-control" disabled >
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
