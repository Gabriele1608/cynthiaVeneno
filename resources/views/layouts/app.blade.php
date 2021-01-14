<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Cynthia Veneno | @yield('title', '')</title>  

  <!-- Scripts --> 
  @yield('extra-script')
  
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  
  <script src="https://kit.fontawesome.com/40c8dc7766.js" crossorigin="anonymous"></script>


  <!-- Styles -->
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  {{-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">   --}}
  @yield('extra-css')
  <style>
    #menu-toggle:checked+#menu {
      display: block;
    }

    .dropdown:hover>.dropdown-content {
      display: block;

    }

  </style>
</head>

<body class="bg-black w-full h-screen antialiased leading-none font-sans">
  <div id="app">

    {{-- <header class="bg-black py-6">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
    {{ config('app.name', 'Laravel') }}
    </a>
  </div>
  <nav class="space-x-4 text-gray-300 text-sm sm:text-base"> --}}

   @include('partials.headerdropdownworks')
    
    <main class="pb-16 pt-24">
      @if (session()->has('success_message'))
      <div class="inline-block text-green-700 bg-green-300 p-4 font-semibold rounded-lg ml-6">
          {{session()->get('success_message')}}
      </div>    
  @endif

  @if (count($errors)>0)
  <div class="inline-block text-red-700 bg-red-300 p-4 font-semibold rounded-lg ml-6">
      <ul>
          @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
          @endforeach
      </ul>
  </div>    
@endif
     
      @yield('content')
    </main>

   
    {{-- FOOTER --}}
  <footer id="footer" class="relative  bg-gray-400 pt-4">
    {{-- <div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
          style="height: 80px; transform: translateZ(0px);">
          <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
            version="1.1" viewBox="0 0 2560 100" x="0" y="0">
            <polygon class="text-white fill-current" points="2560 0 2560 100 0 100"></polygon>
          </svg>
        </div> --}}
    <div class=" mx-auto lg:mx-0">
      <div class="flex flex-wrap pb-4">
        <div class="w-full lg:w-6/12 px-4">
          <h4 class="text-3xl text-center lg:text-left mb-2 font-semibold text-black">Cynthia Veneno</h4>
         
          <div class="w-full flex justify-center lg:justify-start mb-2 lg:mb-0">
            <button
              class="modal-open ml-4 bg-transparent border border-black text-black hover:white bg-white hover:bg-black hover:text-white font-bold py-1 px-2 rounded-full focus:outline-none">Contactar</button>
          </div>
          <div class="flex justify-center lg:justify-start mt-2 mb-4 lg:mb-0 py-2">
            <button
            class="bg-black text-blue-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
            type="button"><a href="https://twitter.com/cynthiaveneno" target="_blank">
            <i class="flex fab fa-twitter"></i></a></button><button
            class="bg-black  text-blue-600 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
            type="button"><a href="https://www.facebook.com/cynthiaveneno/" target="_blank">
            <i class="flex fab fa-facebook-square"></i></a></button><button
            class="bg-black  text-pink-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
            type="button"><a href="https://www.instagram.com/cynthiaveneno/?fbclid=IwAR0W9Hr5zvSl93-cp8jqjvOGBvCfympJapWVHsqKDa6QUeZECtBKofNl3ck" target="_blank">
            <i class="flex fab fa-instagram"></i></a></button>
           
          </div>
        </div>
        <div class="flex w-full lg:w-6/12 px-4">
          <div class="flex flex-wrap justify-end w-full text-center items-top">
            <div class="w-full lg:w-72 px-4 ml-auto lg:ml-0">
              <h4 class="block w-full text-black text-3xl mb-2 lg:mb-2 font-semibold">Código Disidente </h4>
              <h5 class="text-sm mb-2">Web Developer</h5> 
              <ul class="list-unstyled">
                {{-- <li>
                  <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                    href="https://www.creative-tim.com/presentation">Portfolio</a>
                </li> --}}
                <li>
                  <button
                  class="modal-opene mb-4 bg-transparent border border-black text-black hover:white bg-white hover:bg-black hover:text-white font-bold py-1 px-2 rounded-full focus:outline-none">Contactar</button>
                </li>
                <li>
                  <a class="bg-transparent border border-black text-black hover:white bg-white hover:bg-black hover:text-white font-bold py-1 px-2 rounded-full focus:outline-none"
                  href="">Web</a>
                </li>
              </ul>
            </div>
           
          </div>
        </div>
      </div>

      <div class="flex flex-wrap items-center md:justify-between justify-center ">
        <div class="w-full mx-auto text-center bg-black">
          <div class="text-sm text-white font-semibold py-4">
            Copyright © 2020 Desarrollado con <span class="text-purple-600"><i class="fas fa-heart"></i></span> Código Disidente Web Developer

          </div>
        </div>
      </div>
    </div>
  
  </footer>


    </div>
   <!--Modal CYNTHIA-->
  <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

      <div
        class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
          viewBox="0 0 18 18">
          <path
            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
          </path>
        </svg>
        <span class="text-sm">(Esc)</span>
      </div>

      <!-- Add margin if you want to see some of the overlay behind the modal-->
      <div class="modal-content py-4 text-left px-6">
        <!--Title-->
        <div class="flex justify-between items-center pb-3">
          <p class="text-2xl font-bold mb-2">¿Una consulta para Cynthia Veneno?</p>
          <div class="modal-close cursor-pointer z-50">
            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
              viewBox="0 0 18 18">
              <path
                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
              </path>
            </svg>
          </div>
        </div>

        <!--Body-->
      <form action="{{route('contacta.store')}}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
            Nombre
          </label>
          <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            id="name" name="name" type="text" placeholder="ejemplo: Cynthia Veneno" required>
        </div>
        
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
              Email
            </label>
            <input
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="email" name="email" type="email" placeholder="ejemplo: cynthiailustra@gmail.com" required>
          </div>
                
          <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="mensaje">
              Mensaje
            </label>
            <textarea
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
              id="mensaje" name="mensaje" type="text" placeholder="Hola Cynthia!Me encanta tu trabajo, podrías..." required></textarea>
          </div>
          <div class="flex items-center justify-between">
            <button
            class=" bg-gray-700 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            type="submit">
            Enviar
          </button>
            
            
          </div>
        </form>

        <!--Footer-->
        <div class="flex justify-end pt-2">
          <button class="modal-close px-4 bg-gray-700 hover:bg-gray-900 p-3 rounded-lg text-white ">Cerrar</button>
        </div>
        
      </div>
    </div>
  </div>

   <!--Modal Codigo Disidente-->
  <div class="modale opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlaye absolute w-full h-full bg-gray-900 opacity-50"></div>

    <div class="modale-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

      <div
        class="modal-closee absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
          viewBox="0 0 18 18">
          <path
            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
          </path>
        </svg>
        <span class="text-sm">(Esc)</span>
      </div>

      <!-- Add margin if you want to see some of the overlay behind the modal-->
      <div class="modale-content py-4 text-left px-6">
        <!--Title-->
        <div class="flex justify-between items-center pb-3">
          <p class="text-2xl font-bold mb-2">¿Una consulta para Código Disidente?</p>
          <div class="modal-closee cursor-pointer z-50">
            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
              viewBox="0 0 18 18">
              <path
                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
              </path>
            </svg>
          </div>
        </div>
 
        <!--Body-->
      <form action="{{route('contactacodigodisidente.store')}}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="nameCodigo">
            Nombre
          </label>
          <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            id="nameCodigo" name="nameCodigo" type="text" placeholder="ejemplo: Código Disidente" required>
        </div>
        
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="emailCodigo">
              Email
            </label>
            <input
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="emailCodigo" name="emailCodigo" type="email" placeholder="ejemplo: codigodisidente@gmail.com" required>
          </div>
                
          <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="mensajeCodigo">
              Mensaje
            </label>
            <textarea
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
              id="mensajeCodigo" name="mensajeCodigo" type="text" placeholder="Hola Código Disidente! Necesitaría una página web..." required></textarea>
          </div>
          <div class="flex items-center justify-between">
            <button
            class=" bg-gray-700 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            type="submit">
            Enviar
          </button>
            
            
          </div>
        </form>

        <!--Footer-->
        <div class="flex justify-end pt-2">
          <button class="modal-closee px-4 bg-gray-700 hover:bg-gray-900 p-3 rounded-lg text-white ">Cerrar</button>
        </div>
        
      </div>
    </div>
  </div>
    
 
 @yield('extra-js')
 <script src="{{asset('js/app.js')}}"></script>
</body>

</html>