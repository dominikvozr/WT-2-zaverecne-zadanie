@extends('layouts.app')
@section('title', 'testy')

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link
        href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css"
        rel="stylesheet"  type='text/css'>
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
                    <a href="index.html"><i class="fa fa-edit"></i> Create Test</a>
                </li>
                <li>
                    <a href="tests.html"><i class="fa fa-list"></i> Show Test</a>
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
                        <li class="navbar-user"><i class="fa fa-user"></i>Meno Priezvisko</li>
                        <li><a class="navbar-item" href="#">
                                <i class="fa fa-power-off "></i>
                                <span class="nav-text">Logout</span>
                            </a></li>
                    </ul>
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
                        <table><thead><tr><th>Nazov testu</th><th>Dlzka Testu</th><th>Pocet Odpovedi</th><th>Zobrazit odpovede</th><th>Zobrazit Test</th></tr></thead>
                            <tbody>
                            <tr><td>Skuska VSA</td><td>1min</td><td>0</td><td><a href="test/answers.html">Odpovede</a></td><td><a href="test/view.html">Test</a></td></tr>
                            <tr><td>Skuska VSA</td><td>1min</td><td>0</td><td><a href="test/answers.html">Odpovede</a></td><td><a href="test/view.html">Test</a></td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
