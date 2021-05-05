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

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>--}}
    <section class="main">
        <div class="karta">
            <div class="karta-hlava karta-hlava-border karta-hlava-reg">
                <div class="karta-hlava-nadpis">
                    <span class="nadpis-log">Register</span>
                </div>
            </div>
            <div class="karta-telo">
                <!--            <form method="POST"  action="create.php" id="oh" enctype="multipart/form-data">-->
                <div class="inside">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form method="POST"  action="{{ url('zaverecne_zadanie/register', [], true) }}" id="profileData">
                        @csrf
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="name" class="nazov">Name</label>
                                    <input name="name" type="text" id="name" class="form-control" placeholder="Name" required />

                                </div>
                            </div>
                        </div>
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

                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="password_confirmation" class="nazov">Password confirmation</label>
                                    <input name="password_confirmation" type="password" id="password_confirmation" class="form-control" placeholder="Password confirmation" required />

                                </div>
                            </div>
                        </div>

                        <div class="form-group btn-center">
                            <button type="submit" id="submit" name="submit" class="button-style-mod btn btn-outline-primary" >Register</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>



    </section>
</x-guest-layout>

@section('scripts')
    <script src="{{asset('js/hardcore.js')}}"></script>
@endsection
