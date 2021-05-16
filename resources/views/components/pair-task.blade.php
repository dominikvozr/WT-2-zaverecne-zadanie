<div class="row task" data-id="{{$task->id}}" data-type="{{$task->taskType}}">
    <!--  Otazka  -->
    <h4 class="h4 dark-grey-text mt-5 mb-4">{{ $task->question }}</h4>
    <!-- Sekcia odpovedi -->
    <section class="border py-3 " style="padding: 25px;">
        <h5 class="MS_comment" >{{ $task->points }} points</h5>
        <div class="wrapper" id="{{$task->id}}-pair">
            <div class="left-wrapper">
                @for ($i = 0; $i < count($leftConnections); $i++)
                    <div  class="connect-card jtk-droppable">
                        <h4>
                            {{$leftConnections[$i]}}
                        </h4>
                    </div>
                @endfor
            </div>
            <div class="right-wrapper">
                @for ($i = 0; $i < count($rightConnections); $i++)
                <div  class="connect-card jtk-droppable">
                    <h4>
                        {{$rightConnections[$i]}}
                    </h4>
                </div>
                @endfor
            </div>
        </div>
    </section>
</div>
