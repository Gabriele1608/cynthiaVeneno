@extends('layouts.app')

@section('title', 'Mi Perfil')

@section('content')

   
<div class="text-xl md:text-2xl font-medium md:font-semibold text-white p-4 md:p-8 mt-4">
Mi Perfil: <span class="text-lg font-medium text-white"> en esta sección podrás cambiar tu nombre de usuario, tu email y tu contraseña.</span>
</div>
       
<div class="text-left md:text-center p-4 md:p-8 text-base md:text-lg font-medium md:font-semibold text-white">{{$user->name}} llevas conmigo desde el {{Carbon\Carbon::parse
($user->created_at)->format('d/m/Y')}} muchas gracias por la confianza!</div>

<div class="flex flex-col mt-8">
    <div class="flex border-2 rounded-md border-white w-full md:w-2/5 mx-auto md:p-4">
                <form action="{{ route('users.update') }}" method="POST" class="w-full rounded-md bg-black">
                    @method('patch')
                    @csrf
                    <div class="flex flex-col text-white">
                        <label for="name" class="text-white md:p-1 mb-2 font-semibold">Nombre</label>
                        <input id="name" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-2 px-2 mb-3 appearance-none focus:outline-none" type="text" name="name" value="{{ old('name', $user->name) }}" placeholder="Name" required>
                    </div>
                    <div class="flex flex-col text-white">
                        <label for="email" class="text-white md:p-1 mb-2 font-semibold">Email</label>
                        <input id="email" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-2 px-2 mb-3 appearance-none focus:outline-none" type="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Email" required>
                    </div>
                    <div class="flex flex-col text-white">
                        <label for="password" class="text-white md:p-1 mb-2 font-semibold">Contraseña</label>
                        <input id="password" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-2 px-2 appearance-none focus:outline-none" type="password" name="password" placeholder="Password">
                        <div class="text-white text-xs mb-2">Deja en blanco para seguir usando tu contraseña actual</div>
                    </div>
                    <div class="flex flex-col text-white">
                        <label for="email" class="text-white md:p-1 mb-2 font-semibold">Confirmar contraseña</label>
                        <input id="password-confirm" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-2 px-2 mb-3 appearance-none focus:outline-none" type="password" name="password_confirmation" placeholder="Confirmar Contraseña">
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="w-full bg-white border border-white hover:bg-black text-black hover:text-white font-bold py-2 px-3 rounded">Actualizar perfil</button>
                    </div>
                </form>
            </div>
</div>

            <div class="spacer"></div>
        </div>
    </div>

@endsection


