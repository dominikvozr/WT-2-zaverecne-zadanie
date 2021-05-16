@extends('layouts.master')

@section('title', 'test')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/test.css') }}">
@endsection

@section('content')
    <body class="bodyTest">
    <div class="MS_timerDiv">
        <h3>Time remaining:</h3>
        <h3 id="MS_timer"></h3>
    </div>
    <div class="container">
        <!--  Telo testu-->
{{--        MhJwZ3ctiK--}}
        <div class="container MS_testBody">
            <div class="row flex justify-content-center text-center">
                <h1 class="h1 dark-grey-text mt-5 mb-4">
                    Test {{ $exam->test->code }} for {{ session()->get('student_name') }} {{ session()->get('student_surname') }}
                </h1>
            </div>
            <div id="app">
                <ul id="ref" ref="{{ $exam->id }}">
                </ul>
            </div>

            @foreach($exam->test->tasks as $task)

                @switch($task->taskType)
                    @case('multiple')

                        <x-multiple-task :task="$task" />

                    @break

                    @case('short')

                        <x-short-task :task="$task" />

                    @break

                    @case('pair')

                        <x-pair-task :task="$task" />

                    @break

                    @case('draw')

                        <x-draw-task :task="$task" />

                    @break
                @endswitch

            @endforeach
        </div>
    </div>
{{--    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Draw</button>--}}

{{--    <div class="modal fade bd-example-modal-lg" id="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog modal-xl" id="resize">--}}
{{--            <div class="modal-content">--}}
{{--                <button id="btn">clicero</button>--}}

                <section class="border py-3" id="MS_draw" style="display: none">
                    <section class="MS_canvas" id="MS_Sketchpad">
                        <div class="row">
                            <div class="two-thirds column" >
                                <div>
                                    <div  id="sketchpad" style="max-width: 100%;"></div>
                                </div>
                            </div>
                            <div class="toolbox one-third column">
                                <label for="line-color-input">Set Line Color</label>
                                <input class="u-full-width MS_sketchpad_settings" type="text" value="#000000" id="line-color-input">
                                <label for="line-size-input">Set Line Size</label>
                                <input class="u-full-width MS_sketchpad_settings" type="number" value="5" id="line-size-input">

                                <div class="row">
                                    <div class="one-half column">
                                        <button class="u-full-width btn btn-danger MS_undo" id="undo">Undo</button>
                                    </div>

                                    <div class="one-half column">
                                        <button class="u-full-width btn btn-danger MS_redo" id="redo">Redo</button>
                                    </div>

                                    <button class="u-full-width btn btn-primary MS_clear" id="clear">Clear</button>

                                    <div class="docs-section text-center">
                                        <p>Read and write sketchpad data</p>
                                        <div class="row">
                                            <div class="one-half column">
                                                <a class="u-full-width" id="uploadJson" download="image.png"></a>
                                                <input type="file" id="uploadJsonInput" style="position: fixed; top: -100em" accept="application/json" />
                                            </div>
                                            <div class="one-half column">
                                                <a class=" u-full-width" id="downloadJson" download="data.json"></a>
                                            </div>
                                            <a class="button u-full-width" id="downloadPng" download="image.png">Download PNG</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </section>
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- Modal -->

    <script> window.majoJeFrajerTime = {!! json_encode($exam->ends_at) !!}
            if(document.getElementById("MS_upload")) {
                document.getElementById("MS_draw").style.display = "block";
            }
    </script>
    <div class="MS_submit">
        <button type="submit" class="btn btn-primary" id="MS_submit">ODOSLAŤ TEST</button>
    </div>
    </body>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script src="//code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/responsive-sketchpad@1.2.2/dist/sketchpad.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsPlumb/2.13.1/js/jsplumb.min.js" integrity="sha512-uRRmBpTXPtyfLZow7fU6oPbRK8UbmhBZeayUcQpRDmjkXhxfm1eK9AgA/N321nBw1n3qVFQk2srxyeTqXAqWEA==" crossorigin="anonymous"></script>
    <script src="{{ asset('js/lodash.min.js') }}"></script>
    <script src="{{ asset('js/mdb.min.js') }}" defer></script>
    <script src="{{ asset('js/sketchpad.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/send.js') }}" defer></script>
    <script src="{{ asset('js/questionMatch.js') }}" defer></script>
    <script>
        $(".btnmodal").click(function() {
            $('html,body').animate({
                    scrollTop: $("#MS_draw").offset().top},
                'fast');
        });
    </script>
    {{--<script src="{{ asset('js/home.js') }}" defer></script>--}}
@endsection
