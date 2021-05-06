@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
@endsection

<x-guest-layout>
    {{--<x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>--}}

    <section class="main">
        <div class="karta">
            <div class="karta-hlava ">
                <div id="loginTeacher" class="selected">
                    <span class="nadpis-log">Teacher</span>
                </div>
                <div id="loginStudent" class="not-selected">
                    <span class="nadpis-log">Student</span>
                </div>
            </div>
            <div class="karta-telo">

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <div class="inside">
                    <div id="loginTeacher-option">
                        <form method="POST"  action="{{ url('zaverecne_zadanie/login', [], true) }}" id="teacher">
                            @csrf
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="email" class="nazov">Email</label>
                                        <input name="email" type="email" id="email" class="form-control" placeholder="Email" required />
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="password" class="nazov">Password</label>
                                        <input name="password" type="password" id="password" class="form-control" placeholder="Password" required />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group btn-center">
                                <button type="submit" id="submit-teacher" name="submit" class="button-style-mod btn btn-outline-primary" >Log in</button>
                            </div>
                        </form>
                        <div class="not-registered"><span>Not registered yet?</span><a href="{{ url('zaverecne_zadanie/register') }}">Register now.</a></div>
                    </div>
                    <div id="loginStudent-option">
                        <form method="POST"  action="{{ url('zaverecne_zadanie/student/login', [], true) }}" id="student">
                            @csrf
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name" class="nazov">Name</label>
                                        <input name="name" type="text" id="name" class="form-control" placeholder="Name" required />

                                    </div>
                                </div>


                                <div class="col">
                                    <div class="form-group">
                                        <label for="surname" class="nazov">Surname</label>
                                        <input name="surname" type="text" id="surname" class="form-control" placeholder="Surname" required />

                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="code" class="nazov">Code</label>
                                        <input name="code" type="text" id="code" class="form-control" placeholder="Input Code" required />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="ais" class="nazov">Ais ID</label>
                                        <input name="ais" type="text" id="ais" class="form-control" placeholder="Input Ais Id" required />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group btn-center">
                                <button type="submit" id="submit-student" name="submit" class="button-style-mod btn btn-outline-primary" >Start Test</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
        <script src="{{asset('js/hardcore.js')}}"></script>
    @endpush
</x-guest-layout>


