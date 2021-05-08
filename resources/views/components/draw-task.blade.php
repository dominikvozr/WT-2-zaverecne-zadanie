<!-- Typ otázky kreslenie -->
<div class="row">
    <!--  Otazka  -->
    <h4 class="h4 dark-grey-text mt-5 mb-4">{{ $task->question }}</h4>
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
