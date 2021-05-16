@extends('layouts.test')
@section('title', 'testy')

@section('scripts')
    <script src="{{ asset('js/hardcore.js') }}"></script>
@endsection

@section('content')
    <div id="sidebar">
        <div id="sidebar-header">
            <div id="sidebar-header-container">
                <div id="sidebar-left"> </div>
                <div id="sidebar-right"><button class="basic-btn" id="sidebar-close-btn"><i class="fa fa-times"></i></button></div>
            </div>
        </div>
        <div>
            <ul class="sidebar-list">

                <li>
                    <a href="{{ route('dashboard') }}"><i class="fa fa-edit"></i> Create Test</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-list"></i> Show Test</a>
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
            <div id="bar">
                <div id="bar-top">
                    <div class="nadpis-bar">
                        <div class="nadpis-bar-text">
                            <span>All Tests</span>
                        </div>
                    </div>
                </div>
                <div id="bar-content">
                    <div id="bar-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Test name</th>
                                    <th>Test code</th>
                                    <th>Test Length</th>
                                    <th>Number of Answers</th>
                                    <th>Show answers</th>
                                    <th>Show Test</th>
                                    <th>Active</th>

                                </tr>
                            </thead>
                            <tbody id="bodie">

                            @forelse($tests as $test)

                                <tr>
                                    <td>{{ $test->name }}</td>
                                    <td>{{ $test->code }}</td>
                                    <td>{{ $test->time / 60 }} min</td>
                                    <td>{{ count($test->exams) }}</td>
                                    <td><a href="{{ route("test.answers", $test->id) }}">Answers</a></td>
                                    <td><a href="{{ route("test.detail", $test->id) }}">Test</a></td>
                                    <td>
                                            <input  type="checkbox"  id="{{ $test->id }}" {{ $test->active == 1 ? 'checked' : '' }}>
                                    </td>
                                </tr>

                            @empty
{{--                                NISTA SME NENASLI--}}
                            @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
