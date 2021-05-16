@extends('layouts.test')
@section('title', 'Answers')

@section('styles')
@endsection

@section('content')
    <div id="sidebar">
        <div id="sidebar-header">
            <div id="sidebar-header-container">
                <div id="sidebar-left"> </div>
                <div id="sidebar-right"><button class="basic-btn" id="sidebar-close-btn" onclick="closeSideBar()"><i class="fa fa-times"></i></button></div>
            </div>
        </div>
        <div>
            <ul class="sidebar-list">
                <li>
                    <a href="{{ route('dashboard') }}"><i class="fa fa-edit"></i> Create Test</a>
                </li>
                <li>
                    <a href="{{ route('tests') }}"><i class="fa fa-list"></i> Show Test</a>
                </li>
                <li>
                    <a href="{{ route('tests.live') }}"><i class="fa fa-graduation-cap"></i> Show Live Test</a>
                </li>
            </ul>
        </div>
    </div>

    <div id="container">
        <nav id="navbar" >
            <div id="nav-container">
                <div id="container-left"><div class="nav-text" id="btn-menu"><button class="basic-btn"><i class="fa fa-bars"></i></button></div></div>
                <div id="container-right" class="container-text">

                    <form id="logout" method="post" action="{{ route('logout') }}">
                        <i class="fa fa-user icon"></i>{{Auth::user()->name}}
                        @csrf
                        <a class="navbar-item" href="#" onclick="document.getElementById('logout').submit()">
                            <i class="fa fa-power-off "></i>
                            <span class="nav-text">Logout</span>
                        </a>
                    </form>

                </div>
            </div>
        </nav>
        <div id="items">
            <div id="return-btn">
                <a href="{{url()->previous()}}"><i class="fa fa-arrow-left"></i></a>
            </div>
            <div id="bar">
                <div id="bar-top">
                    <div class="nadpis-bar">
                        <div class="nadpis-bar-text">
                            <span>Answers for test: <span class="test-tittle">{{ $exam->test->name }}</span>  </span><br>
                            <span>Test Code: <span class="test-tittle"> {{ $exam->test->code }}</span> </span>
                        </div>
                    </div>
                </div>

                <div id="bar-content">
                    <div id="bar-table">
                        <div class="detail-test">
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="student" class="nazov">Student name</label>
                                        <input name="student" type="student" id="student" class="form-control" value="{{ $exam->student->firstname }} {{ $exam->student->lastname }}" disabled />
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="aisId" class="nazov">Ais Id</label>
                                        <input name="aisId" type="aisId" id="aisId" class="form-control" value="{{ $exam->student->ais_id }}" disabled />
                                    </div>
                                </div>
                            </div>
                            <form id="getPoints" data-student="{{ $exam->student->id }}" data-exam="{{ $exam->id }}">
                            @foreach($exam->test->tasks as $task)

                                @switch($task->taskType)
                                    @case('multiple')

                                    <x-show-multiple-task :task="$task" :student="$exam->student->id" />

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
                            </form>
                            <div id="valid">

                            </div>
                            <div class="download-btns">
                                <button id="change" class="btn-change btn">Change Points</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


@endsection
        @section('scripts')
            <script src="{{asset('js/hardcore.js')}}"></script>
@endsection

