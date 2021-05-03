<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="antialiased">
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
        {{--<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>--}}
        <script>
            // Enable pusher logging - don't include this in production
            /*Pusher.logToConsole = true;

            var pusher = new Pusher('8b3c6edffd569df64802', {
                cluster: 'eu'
            });

            var channel = pusher.subscribe('my-channel');
            channel.bind('my-event', function(data) {
                app.messages.push(JSON.stringify(data));
            });*/

            // Vue application
            const app = new Vue({
                el: '#app',
                data: {
                    messages: [],
                },
                mounted(){
                    Pusher.logToConsole = true;

                    var pusher = new Pusher('8b3c6edffd569df64802', {
                        cluster: 'eu'
                    });

                    var channel = pusher.subscribe('my-channel');
                    channel.bind('my-event', function(data) {
                        app.messages.push(JSON.stringify(data));
                    });
                }
            });
        </script>
    </body>
</html>
