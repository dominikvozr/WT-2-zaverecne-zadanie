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
            <div class="col-50">
{{--                <label for="">Answers: <span class="dod">(answers with black border were choosen)</span></label>--}}
                <label for="">Answers:
                    @if($studentId && !$pdf)<span class="dod">(answers with black border were choosen)</span>@endif
                    @if($pdf)<span class="dod">(selected answers)</span>@endif
                </label>
                @foreach($answers as $answer)
                    @if($pdf && !$answer->success)
                        @continue
                    @endif

                    <input type="text" value="{{ $answer->value }}" name="answer" class="form-control {{ $studentId ? 'od' : 'answer'}}{{$answer->success}} " disabled>

                @endforeach
            </div>
        </div>
    </div>
</div>
