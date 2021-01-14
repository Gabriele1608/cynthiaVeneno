@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex">
        <div class="w-full">

            @if (session('resent'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100  px-3 py-4 mb-4"
                role="alert">
                {{-- {{ __('A fresh verification link has been sent to your email address.') }} --}}
                Se ha enviado un nuevo enlace de verificación a tu dirección de correo electrónico.
            </div>
            @endif

            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-lg">
                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{-- {{ __('Verify Your Email Address') }} --}}
                    Verifica tu dirección de correo electrónico
                </header>

                <div class="w-full flex flex-wrap text-gray-700 leading-normal text-sm p-6 space-y-4 sm:text-base sm:space-y-6">
                    <p>
                        {{-- {{ __('Before proceeding, please check your email for a verification link.') }} --}}
                        Antes de continuar, consulta tu correo electrónico para ver si hay un enlace de verificación.
                    </p>

                    <p>
                        {{-- {{ __('If you did not receive the email') }}--}}Si no has recibido el correo electrónico, <a 
                            class="text-purple-500 hover:text-purple-700 no-underline hover:underline cursor-pointer"
                            onclick="event.preventDefault(); document.getElementById('resend-verification-form').submit();">{{--{{ __('click here to request another') }}--}}haz clic aquí para solicitar otro</a>.
                    </p>

                    <form id="resend-verification-form" method="POST" action="{{ route('verification.resend') }}"
                        class="hidden">
                        @csrf
                    </form>
                </div>

            </section>
        </div>
    </div>
</main>
@endsection
