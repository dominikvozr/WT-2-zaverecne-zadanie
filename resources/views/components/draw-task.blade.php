<!-- Typ otázky kreslenie -->
<div class="row task" data-id="{{$task->id}}" data-type="{{$task->taskType}}">
    <!--  Otazka  -->
    <h4 class="h4 dark-grey-text mt-5 mb-4">{{ $task->question }}</h4>
    <!--  Telo SketchPadu  -->
    <section class="border py-3 ">

        <h5 class="MS_comment" >{{ $task->points }} points</h5>


        <div id="MS_upload">
            <div class="container">
                <div class="row">
                    <h6>Draw and upload your answer</h6>
                    <div class="col">
{{--                        onchange="readURL(this);--}}
                        <input type="file" id="file{{$task->id}}" accept="image/png, image/jpg, image/jpeg">
                        <label type="file"  for="file{{$task->id}}" class="labelUpload">Choose file</label>
                    </div>
                </div>
                <div class="row">
                    <img id="upload{{$task->id}}" src="{{ asset('img/150.png') }}" alt="" />
                </div>
                <button type="button" class="btn btn-primary btnmodal" data-toggle="modal" data-target=".bd-example-modal-lg">Draw</button>
            </div>
        </div>

    </section>
</div>
