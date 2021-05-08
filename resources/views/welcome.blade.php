@extends('layouts.master')

@section('title', 'home')

@section('scripts')
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/home.js') }}" defer></script>
@endsection

@section('content')
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/zaverecne_zadanie/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                @else
                    <a href="{{ url('/zaverecne_zadanie/login') }}" class="text-sm text-gray-700 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ url('/zaverecne_zadanie/register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <h1>Pusher Test</h1>
        <p>
            Publish an event to channel <code>my-channel</code>
            with event name <code>my-event</code>; it will appear below:
        </p>
        <div id="app">
            <ul>
                <li v-for="message in messages">
                    @{{message}}
                </li>
            </ul>
        </div>
    </div>
@endsection
