@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex">
        <div class="w-full">

            @if (session('status'))
            <div class="text-sm text-green-700 bg-green-100 px-5 py-6 sm:rounded sm:border sm:border-green-400 sm:mb-6"
                role="alert">
                {{ session('status') }}
            </div>
            @endif

            <section class="flex flex-col break-words bg-black sm:border-1 sm:rounded-md sm:shadow-lg">
                <header class="font-semibold bg-white text-black py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{-- {{ __('Reset Password') }} --}} Restablecer contraseña
                </header>

                <form class="w-full border border-white px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="flex flex-wrap">
                        <label for="email" class="block text-white text-sm font-bold mb-2 sm:mb-4">
                            {{-- {{ __('E-Mail Address') }}: --}} Email
                        </label>

                        <input id="email" type="email"
                            class="form-input w-full @error('email') border-red-500 @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap justify-center items-center mt-2 space-y-6 pb-6 sm:pb-10 sm:space-y-0 sm:justify-between">
                        <button type="submit"
                        class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline border border-black hover:border-white text-black bg-white hover:bg-black hover:text-white sm:w-auto sm:px-4 sm:order-1">
                            {{-- {{ __('Send Password Reset Link') }} --}} Enviar enlace de restablecimiento de contraseña
                        </button>

                        <p class="mt-4 text-xs text-purple-500 hover:text-purple-700 whitespace-no-wrap no-underline sm:text-sm sm:order-0 sm:m-0">
                            <a class=" text-purple-500 hover:text-purple-700 no-underline" href="{{ route('login') }}">
                                {{-- {{ __('Back to login') }} --}} Volver atrás para iniciar sesión
                            </a>
                        </p>
                    </div>
                </form>
            </section>
        </div>
    </div>
</main>
@endsection
