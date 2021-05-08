@extends('layouts.test')
@section('title', 'View Test')

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
                <li>
                    <a href="{{ url('zaverecne_zadanie/tests/live', [], true) }}"><i class="fa fa-graduation-cap"></i> Show Live Test</a>
                </li>
            </ul>
        </div>
    </div>
    <div id="container">
        <nav id="navbar" >
            <div id="nav-container">
                <div id="container-left"><div class="nav-text" id="btn-menu"><button class="basic-btn" onclick="showMenu()"><i class="fa fa-bars"></i></button></div></div>
                <div id="container-right" class="container-text">

                    <form id="logout" method="post" action="{{ url('zaverecne_zadanie/logout', [], true) }}">
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
                <a href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i></a>
            </div>
            <div id="bar">
                <div id="bar-top">
                    <div class="nadpis-bar">
                        <div class="nadpis-bar-text">
{{--                            <span>User Information</span>--}}
                            <span>Test Details</span>
                        </div>

                    </div>
                </div>

                <div id="bar-content">
                    <div id="bar-table">
                        <div class="detail-test">
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="testName" class="nazov">Test Name</label>
                                        <input name="testName" type="testName" id="testName" class="form-control" value="{{ $test->name }}" disabled />

                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="timeLimit" class="nazov">Time Limit</label>
                                        <input name="timelimit" type="text" id="timeLimit" class="form-control" value="{{ $test->time / 60 }} min" disabled />

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="timeLimit" class="nazov">Test Code</label>
                                        <input name="timelimit" type="text" id="code" class="form-control" value="{{ $test->code}}" disabled />

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="testBody">

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/hardcore.js') }}" defer></script>
@endpush
