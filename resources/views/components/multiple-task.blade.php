<div class="row">
    <!--  Otazka  -->
    <h4 class="h4 dark-grey-text mt-5 mb-4">{{ $task->question }}</h4>
    <!-- Sekcia odpovedi multiChoice-->
    <section class="border py-3 " style="padding: 25px;">

        @foreach($answers as $answer)

            <div class="form-check checkbox-teal mb-2">
                <input type="checkbox" class="form-check-input hover-shadow pulse" id="{{ $answer->id }}">
                <label class="form-check-label" for="{{ $answer->id }}">{{ $answer->value }}</label>
            </div>

        @endforeach

    </section>
</div>
