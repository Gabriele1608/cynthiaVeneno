@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10"> 
    <div class="flex">
        <div class="w-full">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-lg">

                <header class=" text-lg font-semibold bg-white text-black py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{-- {{ __('Register') }} --}} Crear una cuenta
                </header>

                <form class="w-full bg-black border border-white px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST"
                    action="{{ route('register') }}">
                    @csrf

                    <div class="flex flex-wrap">
                        <label for="name" class="block text-white text-sm font-bold mb-2 sm:mb-4">
                            {{-- {{ __('Name') }}: --}} Nombre de Usuario
                        </label>

                        <input id="name" type="text" class="form-input w-full @error('name')  border-red-500 @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="email" class="block text-white text-sm font-bold mb-2 sm:mb-4">
                            {{-- {{ __('E-Mail Address') }}: --}} Email
                        </label>

                        <input id="email" type="email"
                            class="form-input w-full @error('email') border-red-500 @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="password" class="block text-white text-sm font-bold mb-2 sm:mb-4">
                            {{-- {{ __('Password') }}: --}} Contraseña
                        </label>
                        
                        <input id="password" type="password"
                            class="form-input w-full @error('password') border-red-500 @enderror" name="password"
                            required autocomplete="new-password">
                            <span class="text-xs text-white">La contraseña debe tener al menos 8 caracteres.</span>
                        @error('password')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="password-confirm" class="block text-white text-sm font-bold mb-2 sm:mb-4">
                            {{-- {{ __('Confirm Password') }}: --}} Confirmar contraseña
                        </label>

                        <input id="password-confirm" type="password" class="form-input w-full"
                            name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="flex flex-wrap">
                        <button type="submit"
                            class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline border border-black hover:border-white text-black bg-white hover:bg-black hover:text-white sm:py-4">
                            {{-- {{ __('Register') }} --}} Registrar
                        </button>

                        <p class="w-full text-xs text-center text-white my-6 sm:text-sm sm:my-8">
                            {{-- {{ __('Already have an account?') }} --}} ¿Ya tienes una cuenta?
                            <a class="text-purple-500 hover:text-purple-700 no-underline" href="{{ route('login') }}">
                                {{-- {{ __('Login') }} --}} Conéctate
                            </a>
                        </p>
                    </div>
                </form>

            </section>
        </div>
    </div>
</main>
@endsection
