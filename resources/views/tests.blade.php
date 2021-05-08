@extends('layouts.test')
@section('title', 'testy')

@section('scripts')
    <script src="{{ asset('js/hardcore.js') }}"></script>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
                    <a href="#"><i class="fa fa-list"></i> Show Test</a>
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
            <div id="bar">
                <div id="bar-top">
                    <div class="nadpis-bar">
                        <div class="nadpis-bar-text">
                            <span>Testy</span>
                        </div>
                    </div>
                </div>
                <div id="bar-content">
                    <div id="bar-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Nazov testu</th>
                                    <th>Kod testu</th>
                                    <th>Dlzka Testu</th>
                                    <th>Pocet Odpovedi</th>
                                    <th>Zobrazit odpovede</th>
                                    <th>Zobrazit Test</th>

                                </tr>
                            </thead>
                            <tbody>

                            @forelse($tests as $test)

                                <tr>
                                    <td>{{ $test->name }}</td>
                                    <td>{{ $test->code }}</td>
                                    <td>{{ $test->time / 60 }} min</td>
                                    <td>{{ $test->exams()->length ?? '0' }}</td>
                                    <td><a href="{{ url("zaverecne_zadanie/test/answers/$test->id", [], true) }}">Odpovede</a></td>
                                    <td><a href="{{ url("zaverecne_zadanie/test/detail/$test->id", [], true) }}">Test</a></td>
                                </tr>

                            @empty
                                NISTA SME NENASLI
                            @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
