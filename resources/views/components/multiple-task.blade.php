<div class="row task" data-id="{{$task->id}}" data-type="{{$task->taskType}}">
    <!--  Otazka  -->
    <h4 class="h4 dark-grey-text mt-5 mb-4">{{ $task->question }}</h4>
    <!-- Sekcia odpovedi multiChoice-->
    <section class="border py-3 " style="padding: 25px;">
        <h5 class="MS_comment" >{{ $task->points }} points</h5>
        @foreach($answers as $answer)

            <div class="form-check checkbox-teal mb-2">
                <input type="checkbox" class="form-check-input hover-shadow pulse" id="{{ $answer->id }}">
                <label class="form-check-label" for="{{ $answer->id }}">{{ $answer->value }}</label>
            </div>

        @endforeach

    </section>
</div>
