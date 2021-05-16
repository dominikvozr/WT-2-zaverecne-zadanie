@extends('layouts.export')
@section('title', 'View Test')

@section('styles')
@endsection

@section('content')

        <div id="items">
            <div id="bar">
                @foreach($test->exams as $exam)
                    <div id="bar-top">
                        <div class="nadpis-bar">
                            <div class="nadpis-bar-text">
                                <h2>{{ $exam->student->firstname }} {{ $exam->student->lastname }} - {{ $exam->student->ais_id }}</h2>
                                <span>Test Details</span>
                            </div>

                        </div>
                    </div>

                    <div id="bar-content">
                        <div id="bar-table">
                            <div class="detail-test">

                                @foreach($test->tasks as $task)

                                    @switch($task->taskType)
                                        @case('multiple')

                                        <x-show-multiple-task :task="$task" :student="$exam->student->id" :pdf="true" />

                                        @break

                                        @case('short')

                                        <x-show-short-task :task="$task" :student="$exam->student->id" />

                                        @break

                                        @case('pair')

                                        <x-show-pair-task :task="$task" :student="$exam->student->id" />

                                        @break

                                        @case('draw')

                                        <x-show-draw-task :task="$task" :student="$exam->student->id" />

                                        @break
                                    @endswitch

                                @endforeach

                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>

@endsection

@section('scripts')
    <script src="{{asset('js/hardcore.js')}}"></script>
@endsection
