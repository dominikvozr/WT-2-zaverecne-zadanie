@extends('layouts.test')
@section('title', 'testy')

@section('scripts')
    <script src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"></script>
    <script src="{{ asset('js/hardcore.js') }}"></script>

@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

@endsection

@section('content')

{{--    <div id="container">--}}
        <nav id="navbar" >
            <div id="nav-container">
                <div id="container-left">
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                    <a href="#">Documentation</a>
                </div>
                <div id="container-right" class="container-text">

                </div>
            </div>
        </nav>
        <div id="items">
            <div id="baro">
                <div id="bar-top">
                    <div class="nadpis-bar">
                        <div class="nadpis-bar-text">
                            <span>Technická dokumentácia</span>
                        </div>
                    </div>
                </div>
                <div id="bar-content">
                    <div id="bar-table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="tablo"></th>
                                    <th>Dominik Vozár</th>
                                    <th>Marián Šebeňa</th>
                                    <th>Simon Youssef</th>
                                    <th>Patrik Šály</th>


                                </tr>
                            </thead>
                            <tbody>


                            <tr><td class="tablo">Prihlasovanie sa do aplikácie</td><td><i class="fas fa-check-circle"></i></td><td></td><td></td><td></td></tr>
                            <tr><td class="tablo">Realizácia otázok</td><td><i class="fas fa-check-circle"></i></td><td><i class="fas fa-check-circle"></i></td><td><i class="fas fa-check-circle"></i></td><td><i class="fas fa-check-circle"></i></td></tr>
                            <tr><td class="tablo">Realizácia testu z pohľadu študenta</td><td><i class="fas fa-check-circle"></i></td><td><i class="fas fa-check-circle"></i></td><td></td><td></td></tr>
                            <tr><td class="tablo">Ukončenie testu</td><td><i class="fas fa-check-circle"></i></td><td><i class="fas fa-check-circle"></i></td><td></td><td></td></tr>
                            <tr><td class="tablo">Zadefinovanie viacerých testov</td><td><i class="fas fa-check-circle"></i></td><td></td><td><i class="fas fa-check-circle"></i></td><td></td></tr>
                            <tr><td class="tablo">Info pre učiteľa ozbiehaní testov</td><td><i class="fas fa-check-circle"></i></td><td></td><td></td><td><i class="fas fa-check-circle"></i></td></tr>
                            <tr><td class="tablo">Export do pdf</td><td><i class="fas fa-check-circle"></i></td><td></td><td></td><td></td></tr>
                            <tr><td class="tablo">Export do csv</td><td><i class="fas fa-check-circle"></i></td><td></td><td></td><td></td></tr>
                            <tr><td class="tablo">Docker balíček</td><td><i class="fas fa-check-circle"></i></td><td></td><td></td><td></td></tr>
                            <tr><td class="tablo">Finalizácia aplikácie</td><td><i class="fas fa-check-circle"></i></td><td><i class="fas fa-check-circle"></i></td><td><i class="fas fa-check-circle"></i></td><td><i class="fas fa-check-circle"></i></td></tr>




                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
{{--    </div>--}}
@endsection
