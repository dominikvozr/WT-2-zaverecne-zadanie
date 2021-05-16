@extends('layouts.test')
@section('title', 'Answers')

@section('styles')
@endsection

@section('content')
    <div id="sidebar">
        <div id="sidebar-header">
            <div id="sidebar-header-container">
                <div id="sidebar-left"> </div>
                <div id="sidebar-right"><button class="basic-btn" id="sidebar-close-btn" ><i class="fa fa-times"></i></button></div>
            </div>
        </div>
        <div>
            <ul class="sidebar-list">
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
                <a href="{{ route('tests') }}"><i class="fa fa-arrow-left"></i></a>
            </div>
            <div id="bar">
                <div id="bar-top">
                    <div class="nadpis-bar">
                        <div class="nadpis-bar-text">
                            <span>Answers for test: <span class="test-tittle">{{ $test->name }}</span></span><br>
                            <span>Test Code: <span class="test-tittle">{{ $test->code}}</span></span>
                        </div>
                    </div>
                </div>

                <div id="bar-content">
                    <div id="bar-table">
                        <table>
                            <thead>
                            <tr><th>Name</th><th>Surname</th><th>Time</th><th>Points</th><th>Show Test</th></tr></thead>
                            <tbody>
                                @forelse($test->exams as $exam)

                                    <tr>
                                        <td>{{ $exam->student->firstname }}</td>
                                        <td>{{ $exam->student->lastname }}</td>
                                        <td>{{ $exam->submitted ? $exam->timeInTest : $exam->test->testDurationTime}}</td>
                                        <td>{{ $exam->total_points ?? 0 }}</td>
                                        <td><a href="{{ route("test.student.answers", $exam->id) }}">show</a></td>
                                    </tr>

                                @empty
{{--                                    NISTA SME NENASLI--}}
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>


@endsection

@section('scripts')
    <script src="{{asset('js/hardcore.js')}}"></script>
@endsection
