<div class="row">
    <!--  Otazka  -->
    <h4 class="h4 dark-grey-text mt-5 mb-4">{{ $task->question }}</h4>
    <!-- Sekcia odpovedi -->
    <section class="border py-3 " style="padding: 25px;">



{{--            <div class="container">--}}
{{--                <div data-value="{{ $task->id .'-'. $i }}" class="draggable">--}}
{{--                    <p>{{ $leftConnections[$i] }}</p>--}}
{{--                </div>--}}
{{--                <div data-value="{{ $task->id .'-'. $i }}" class="droppable">--}}
{{--                    <div class="droparea"></div>--}}
{{--                    <p>{{ $rightConnections[$i] }}</p>--}}
{{--                </div>--}}
{{--            </div>--}}



            <h5 style="padding: 10px">Drag circle from first column to circle in second one</h5>
            <h5 class="MS_comment" >3 points</h5>
            <div id="dragQuestion" class="linkingQuestion">
                <ul id="dragUL">
                    @for ($i = 0; $i < count($leftConnections); $i++)
                    <li>{{$leftConnections[$i]}}<div id="{{$i+1}}-draggable"    class="dragElement" draggable="true"><i class="far fa-circle"></i></div></li>

                    @endfor
                </ul>
                <div class="canvasWrapper">
                    <canvas id="canvas"></canvas>
                    <canvas id="canvasTemp"></canvas>
                </div>
                <ul id="dropUL">
                    @for ($i = 0; $i < count($rightConnections); $i++)
                    <li>{{$rightConnections[$i]}}<div id="{{$i+1}}-dropzone"  onclick="clearPath(event)" class="dragElement dropElement"> <i class="far fa-circle"></i> </div></li>
                    @endfor
                </ul>
            </div>


    </section>
</div>
