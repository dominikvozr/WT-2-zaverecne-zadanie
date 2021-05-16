<div class="form-row">
    <div class="col">
        <div class="form-group line">
            <label for="">Question:</label>
            <div class="form-row ">
                <input type="text" value="{{ $task->question }}" name="DrawQuestion" class="form-control question" disabled>
                <div class="point">
                    <input type="number" name="{{ $task->id .'|'.$task->taskType }}" value="{{ $points ?? '' }}" class="form-control points" {{ $studentId ? '' : 'disabled'}}>
                </div>
            </div>
            @if($answer !== null)
                {{--<img src="{{ route("image", $answer->value) }}" alt="img-{{ $answer->value }}">--}}
                <img src="https://wt166.fei.stuba.sk/zaverecne_zadanie/storage/app/{{$answer->value}}" alt="{{$answer->value}}">
            @endif
        </div>
    </div>
</div>
