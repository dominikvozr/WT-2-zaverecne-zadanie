@extends('master')
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
                    <a href="{{ url('zaverecne_zadanie/dashboard', [], true) }}"><i class="fa fa-edit"></i> Create Test</a>
                </li>
                <li>
                    <a href="{{ url('zaverecne_zadanie/tests', [], true) }}"><i class="fa fa-list"></i> Show Test</a>
                </li>
            </ul>
        </div>
    </div>

    <div id="container">
        <nav id="navbar" >
            <div id="nav-container">
                <div id="container-left"><div class="nav-text" id="btn-menu"><button class="basic-btn" onclick="showMenu()"><i class="fa fa-bars"></i></button></div></div>
                <div id="container-right" class="container-text">

                    <ul >
                        <li class="navbar-user"><i class="fa fa-user"></i>{{ Auth::user()->name }}</li>
                        <li>
                            <form id="logout" method="post" action="{{ url('zaverecne_zadanie/logout', [], true) }}">
                                @csrf
                                <a class="navbar-item" href="#" onclick="document.getElementById('logout').submit()">
                                    <i class="fa fa-power-off "></i>
                                    <span class="nav-text">Logout</span>
                                </a>
                            </form>
                        </li>
                    </ul>
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
                            <span>Answers for test {{ $test->name }}</span>
                        </div>
                    </div>
                </div>

                <div id="bar-content">
                    <div id="bar-table">
                        <table>
                            {{--<thead>
                            <tr><th>Name</th><th>Surname</th><th>Time</th><th>Points</th><th>Show Test</th></tr></thead>
                            <tbody>
                                @forelse($test->exams() as $exam)

                                    <tr>
                                        <td>{{ $exam->student()->firstname }}</td>
                                        <td>{{ $exam->student()->lastname }}</td>
                                        <td>{{ $exam->timeInTest }}</td>
                                        <td>{{ $exam->points }}</td>
                                        <td><a href="{{ url("zaverecne_zadanie/student/answers/$exam->id", [], true) }}">show</a></td>
                                    </tr>

                                @empty
                                    NISTA SME NENASLI
                                @endforelse
                            </tbody>--}}
                        </table>
                    </div>
                </div>

            </div>
        </div>


@endsection

@push('scripts')
    <script src="{{ asset('js/hardcore.js') }}" defer></script>
@endpush
