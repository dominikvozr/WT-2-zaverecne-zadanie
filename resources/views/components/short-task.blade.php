<div class="row">
    <!--  Otazka  -->
    <h4 class="h4 dark-grey-text mt-5 mb-4">{{ $task->question }}</h4>
    <!-- Sekcia odpovedi -->
    <section class="border py-3 align-items-center" style="padding: 25px;">
        <div class="form-outline w-50 align-items-center">
            <input type="text" id="answer-{{ $task->id }}" class="form-control" style="background: white; border-radius:10px "/>
            <label class="form-label" for="answer-{{ $task->id }}">Type your answer</label>
        </div>
    </section>
</div>
