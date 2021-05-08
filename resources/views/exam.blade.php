@extends('layouts.master')

@section('title', 'test')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/test.css') }}">
@endsection

@section('content')
    <div class="container">
        <div id="app">
            <ul ref="{{ $exam->id }}">
                {{--<li v-for="message in messages">
                    @{{message}}
                </li>--}}
            </ul>
        </div>
        <!--  Telo testu-->
        <div class="container MS_testBody">
            <div class="row flex justify-content-center text-center">
                <h1 class="h1 dark-grey-text mt-5 mb-4">
                    Test {{ $exam->test->code }} for {{ session()->get('student_name') }} {{ session()->get('student_surname') }}
                </h1>
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
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/responsive-sketchpad@1.2.2/dist/sketchpad.min.js" ></script>
    <script src="{{ asset('js/mdb.min.js') }}" defer></script>
    <script src="{{ asset('js/sketchpad.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/majo.js') }}" defer></script>
    {{--<script src="{{ asset('js/send.js') }}" defer></script>--}}
    <script src="{{ asset('js/questionMatch.js') }}" defer></script>
    <script src="{{ asset('js/majosketchpad.js') }}" defer></script>
    <script src="{{ asset('js/home.js') }}" defer></script>
@endsection
