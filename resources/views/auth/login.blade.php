@section('styles')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

<x-guest-layout>
    <nav id="navbar" >
        <div id="nav-container">
            <div id="container-left">
                <a href="#">Login</a>
                <a href="{{ route('register') }}">Register</a>
                <a href="{{ route('technical') }}">Documentation</a>
            </div>
            <div id="container-right" class="container-text">

            </div>
        </div>
    </nav>
    <section class="main">
        <div class="karta">
            <div class="karta-hlava">
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



                <div class="inside">
                    <div id="loginTeacher-option">
                        <form method="POST"  action="{{ route('login') }}" id="teacher">
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
                            <div class="not-registered"><span>Not registered yet?</span><a href="{{ route('register') }}">Register now.</a></div>
                        </form>

                    </div>
                    <div id="loginStudent-option">
                        <form method="POST"  action="{{ route('student.login') }}" id="student">
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
                    <div class="cnt">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
        <script src="{{asset('js/hardcore.js')}}"></script>
    @endpush
</x-guest-layout>


