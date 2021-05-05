@extends('layouts.master')

@section('title', 'test')

@section('content')
    <div class="container">
        <!--  Telo testu-->
        <div class="container MS_testBody">
            <div class="row flex justify-content-center text-center">
                <h1 class="h1 dark-grey-text mt-5 mb-4">
                    Test {{ $exam->code }} for {{ $student->firstname }} {{ $student->lastname }}
                </h1>
            </div>



            <!-- Typ otázky s viacerými možnostami -->
            <div class="row">
                <!--  Otazka  -->
                <h4 class="h4 dark-grey-text mt-5 mb-4">Definition of theory of relativity, and types?</h4>
                <!-- Sekcia odpovedi multiChoice-->
                <section class="border py-3 " style="padding: 25px;">

                    <div class="form-check checkbox-teal mb-2">
                        <input type="checkbox" class="form-check-input hover-shadow pulse" id="answer1">
                        <label class="form-check-label" for="answer1">E = MC^4, special and ordinary</label>
                    </div>
                    <div class="form-check checkbox-teal mb-2">
                        <input type="checkbox" class="form-check-input hover-shadow pulse" id="answer2">
                        <label class="form-check-label" for="answer2">E = MC^2, special and standard</label>
                    </div>
                    <div class="form-check checkbox-teal mb-2">
                        <input type="checkbox" class="form-check-input hover-shadow pulse" id="answer3">
                        <label class="form-check-label" for="answer3">E = MC^2, determined and standard</label>
                    </div>
                    <div class="form-check checkbox-teal mb-2">
                        <input type="checkbox" class="form-check-input hover-shadow pulse" id="answer4">
                        <label class="form-check-label" for="answer4">M = EC^2, determined and standard</label>
                    </div>
                    <div class="form-check checkbox-teal mb-2">
                        <input type="checkbox" class="form-check-input hover-shadow pulse" id="answer5">
                        <label class="form-check-label" for="answer5">E = MC^2, special and ordinary</label>
                    </div>
                </section>
            </div>




            <!-- Typ otázky s jednou možnostou -->
            <div class="row">
                <!--  Otazka  -->
                <h4 class="h4 dark-grey-text mt-5 mb-4">Second name of the best Slovak actor who should by a Prime minister ?</h4>
                <!-- Sekcia odpovedi -->
                <section class="border py-3 align-items-center" style="padding: 25px;">
                    <div class="form-outline w-50 align-items-center">
                        <input type="text" id="formControlDefault" class="form-control" style="background: white; border-radius:10px "/>
                        <label class="form-label" for="formControlDefault">Type your answer</label>
                    </div>
                </section>
            </div>



            <!-- Typ otázky spájanie -->
            <div class="row">
                <!--  Otazka  -->
                <h4 class="h4 dark-grey-text mt-5 mb-4">Match car to model</h4>
                <!-- Sekcia odpovedi -->
                <section class="border py-3 " style="padding: 25px;">
                    <div class="container">
                        <div data-value="1" class="draggable">
                            <p>Škoda</p>
                        </div>
                        <div data-value="1" class="droppable">
                            <div class="droparea"></div>
                            <p>Octavia</p>
                        </div>
                    </div>
                    <div class="container">
                        <div data-value="2" class="draggable">
                            <p>Fiat</p>
                        </div>
                        <div data-value="2" class="droppable">
                            <div class="droparea"></div>
                            <p>Punto</p>
                        </div>
                    </div>
                    <div class="container">
                        <div data-value="3" class="draggable">
                            <p>VW</p>
                        </div>
                        <div data-value="3" class="droppable">
                            <div class="droparea"></div>
                            <p>Golf</p>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Typ otázky kreslenie -->
            <div class="row">
                <!--  Otazka  -->
                <h4 class="h4 dark-grey-text mt-5 mb-4">Definition of theory of relativity, and types ?</h4>
                <!--  Telo SketchPadu  -->
                <section class="border py-3 " style="padding: 25px;">
                    <section class="MS_canvas">
                        <div class="row">
                            <div class="two-thirds column" >
                                <div  id="sketchpad"></div>
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
                                                <a class="button u-full-width" id="uploadJson" download="image.png">Upload JSON</a>
                                                <input type="file" id="uploadJsonInput" style="position: fixed; top: -100em" accept="application/json" />
                                            </div>
                                            <div class="one-half column">
                                                <a class="button u-full-width" id="downloadJson" download="data.json">Download JSON</a>
                                            </div>
                                            <a class="button u-full-width" id="downloadPng" download="image.png">Download PNG</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </section>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/responsive-sketchpad@1.2.2/dist/sketchpad.min.js" ></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/mdb.min.js') }}" defer></script>
    <script src="{{ asset('js/sketchpad.js') }}" defer></script>
    <script src="{{ asset('js/majo.js') }}" defer></script>
@endsection
