<html lang="en">
@include('admin.templates.partials.head')

<body id="kt_body" class="app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
    <div class="d-flex flex-column flex-root">
        <style>
            body {
                background-image: url({{ asset('assets/media/bg/login2.jpg') }});
            }
        </style>
        <div class="d-flex flex-column flex-column-fluid flex-lg-row">
            <div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
                <div class="d-flex flex-center flex-lg-start flex-column">
                    <a href="#" class="mb-7">
                        <img alt="Logo" src="{{ asset('assets/media/logos/logo-white.png') }}" />
                    </a>
                    {{-- <h2 class="text-white fw-normal m-0">Branding tools designed for your business</h2> --}}
                </div>
            </div>
            <div class="d-flex flex-center w-lg-50 p-10">
                <div class="card rounded-3 w-md-550px">
                    <div class="card-body p-10 p-lg-20">
                        <form class="form w-100" id="modal_form_login" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="text-center mb-11">
                                <h1 class="text-dark fw-bolder mb-3">Register</h1>
                                <div class="text-gray-500 fw-semibold fs-6">Dashboard Aplication</div>
                            </div>

                            @include('admin.templates.partials.alert')

                            <div class="fv-row mb-5">
                                <input type="text" placeholder="Username" name="username" autocomplete="off"
                                    class="form-control bg-transparent" value="{{ old('username') }}" autofocus />
                            </div>
                            <div class="fv-row mb-5">
                                <input type="text" placeholder="Name" name="name" autocomplete="off"
                                    class="form-control bg-transparent" value="{{ old('name') }}" />
                            </div>
                            <div class="fv-row mb-5">
                                <input type="text" placeholder="Email" name="email" autocomplete="off"
                                    class="form-control bg-transparent" value="{{ old('email') }}" />
                            </div>
                            <div class="fv-row mb-5">
                                <input type="password" placeholder="Password" name="password" autocomplete="off"
                                    class="form-control bg-transparent" />
                            </div>
                            <div class="fv-row mb-10">
                                <input type="password" placeholder="Confirm Password" name="password_confirmation"
                                    autocomplete="off" class="form-control bg-transparent" />
                            </div>

                            <div class="d-grid mb-10">
                                <button type="submit" id="form_submit" class="btn btn-primary">
                                    <span class="indicator-label">Register</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <div class="text-gray-500 text-center fw-semibold fs-6">
                                <a href="{{ route('login') }}" class="link-primary">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.templates.partials.script')
    <script>
        const form = document.getElementById('modal_form_login');
        var validator = FormValidation.formValidation(
            form, {
                fields: {
                    'username': {
                        validators: {
                            notEmpty: {
                                message: 'Silahkan isi username!'
                            }
                        }
                    },
                    'name': {
                        validators: {
                            notEmpty: {
                                message: 'Silahkan isi name!'
                            }
                        }
                    },
                    'email': {
                        validators: {
                            notEmpty: {
                                message: 'Silahkan isi email!'
                            }
                        }
                    },
                    'password': {
                        validators: {
                            notEmpty: {
                                message: 'Silahkan isi password!'
                            }
                        }
                    },
                    'password_confirmation': {
                        validators: {
                            notEmpty: {
                                message: 'Silahkan isi password!'
                            }
                        }
                    },
                },

                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        );

        // Submit button handler
        const submitButton = document.getElementById('form_submit');
        submitButton.addEventListener('click', function(e) {
            e.preventDefault();
            if (validator) {
                validator.validate().then(function(status) {
                    console.log('validated!');
                    if (status == 'Valid') {
                        submitButton.setAttribute('data-kt-indicator', 'on');
                        submitButton.disabled = true;
                        form.submit();
                    }
                });
            }
        });
    </script>

</html>

{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
