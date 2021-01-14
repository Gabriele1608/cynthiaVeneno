<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Cynthia Veneno | Hola @yield('title', '')</title>
  <script src="{{ asset('js/app.js') }}" defer></script>
  <!-- Styles -->

  <script src="https://kit.fontawesome.com/40c8dc7766.js" crossorigin="anonymous"></script>

  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  <link rel="shortcut icon" href="./assets/img/favicon.ico" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" />
 


</head>

<body class="antialiased w-full bg-white">
  
 @include('partials.header')
  {{-- MAIN AREA --}}

  <main>
    
    <div class="relative w-full pt-16 pb-32 flex content-center items-end justify-center bg-black" style="min-height: 75vh;">
      <div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
        style="height: 80px; transform: translateZ(0px);">
        <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
          version="1.1" viewBox="0 0 2560 100" x="0" y="0">
          <polygon points="2560 0 2560 100 0 100" style="fill:white;stroke:black;stroke-width:1" />
        </svg>
      </div>
    </div>
    {{-- SECTION TRABAJOS VARIOS --}}
 
    <section id="works" class="lg:pb- relative block w-full bg-white">
      <div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
        style="height: 80px; transform: translateZ(0px);">
        <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
          version="1.1" viewBox="0 0 2560 100" x="0" y="0">
          <polygon points="2560 0 2560 100 0 100" style="fill:white" />
        </svg>
      </div>
      <div class="container mx-auto px-4 lg:pt-12 pt-4 pb:4 lg:pb-14">
        <div class="flex flex-wrap text-center justify-center">
          <div class="w-full lg:w-6/12 px-4 mb-8">
            <h2 class="text-5xl font-semibold text-black">TRABAJOS</h2>
            <p class="text-lg leading-relaxed mt-4 mb-4 text-gray-500">
              Desctacaremos los trabajos en editoriales, murales y entrevistas
            </p>
          </div>
        </div>
        <div class="flex flex-wrap">
          <div class="w-full md:w-4/12 lg:mb-0 mb-12 px-4" >
            <div class="w-full lg:h-96 h-full px-6">
              <img alt="..." src="storage_old/img/editorial.jpg"
                class="md:h-56 shadow-2xl rounded-full max-w-full mx-auto object-cover" />
              <div class="pt-4 text-center">
                <h5 class="text-xl text-black font-bold">Editoriales</h5>
                <a href="{{route('works.editoriales')}}"><button
                    class="mt-3 border border-black hover:white bg-white hover:bg-black text-black hover:text-white text-sm font-bold uppercase px-4 py-2 rounded shadow hover:shadow-lg  outline-none focus:outline-none mr-1 mb-1"
                    type="button" style="transition: all 0.15s ease 0s;">
                    Ver más
                  </button>
                </a>
              </div>
            </div>
          </div>
          <div class="w-full md:w-4/12 lg:mb-0 mb-12 px-4">
            <div class="w-full lg:h-96  h-full px-6">
              <img alt="..." src="storage_old/img/murales.jpeg"
                class="md:h-56 shadow-2xl rounded-full max-w-full mx-auto object-cover" />
              <div class="pt-4 text-center">
                <h5 class="text-xl text-black font-bold">Murales</h5>
                <a href="{{route('works.murales')}}"><button
                    class="mt-3 text-black border border-black hover:white bg-white hover:bg-black  hover:text-white text-sm font-bold uppercase px-4 py-2 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
                    type="button" style="transition: all 0.15s ease 0s;">
                    Ver más
                  </button>
                </a>
              </div>
            </div>
          </div>
          <div class="w-full md:w-4/12 lg:mb-0 mb-12 px-4">
            <div class="w-full lg:h-96 h-full px-6">
              <img alt="..." src="storage_old/img/entrevistas.jpg"
                class="md:h-56 shadow-2xl rounded-full max-w-full mx-auto object-cover" />
              <div class="pt-4 text-center">
                <h5 class="text-xl text-black font-bold">Entrevistas</h5>
                <a href="{{route('works.entrevistas')}}"><button
                    class="mt-3 border border-black hover:white bg-white text-black hover:text-white text-sm font-bold uppercase px-4 py-2 rounded shadow hover:shadow-lg hover:bg-black outline-none focus:outline-none mr-1 mb-1"
                    type="button" style="transition: all 0.15s ease 0s;">
                    Ver más
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    {{-- BOUTIQUE --}}
    <section class="p-4 lg:pt-12 pb-4 lg:pb-32 w-full bg-black">
      <div class="container mx-auto w-full">
        <div class="flex flex-wrap justify-center text-center mb-10">
          <div class="w-full lg:w-6/12 px-4">
            <h2 class="text-5xl text-white font-semibold" id="boutique">TIENDA</h2>
            <p class="text-lg text-white leading-relaxed m-5">
              Últimos tres trabajos, muchos más en la tienda
            </p>
          </div>
        </div>
        {{-- OBRAS CARDS --}}
        <div class="flex flex-wrap">
          {{-- CARD 1 --}}
          @foreach ($products as $product)
          <div class="w-full md:w-4/12 lg:mb-0 mb-10 px-4" >
            <div class="w-full lg:h-96 h-full px-6">
              <img src="{{asset('storage/'.$product->image)}}" alt="Ilustración de Cynthia Veneno"
              class="md:h-56 md:w-48 shadow-2xl rounded max-w-full mx-auto object-cover flex-1" />
            <div class="pt-4 text-center">
            <h5 class="text-xl text-white font-bold">{{$product->name}}</h5>
              <a class="mt-3 bg-black hover:bg-white text-white hover:text-black border hover:border-black text-sm font-bold uppercase px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1"
            href="{{route('products.show', $product->slug)}}" type="button" style="transition: all 0.15s ease 0s;">
                Ver Tienda
            </a>
            </div>    
            </div>
          </div>
          @endforeach
          {{-- CARD 2
          <div class="w-full md:w-4/12 lg:mb-0 mb-12 px-4" >
            <div class="w-full lg:h-96  h-full px-6">
              <img alt="..." src="storage_old/img/4.jpg"
                class="md:h-56 shadow-2xl rounded max-w-full mx-auto object-cover" />
              <div class="pt-4 text-center">
                <h5 class="text-xl text-white font-bold">Ilustración 2</h5>

                <a class="mt-3 bg-black hover:bg-white text-white hover:text-black border hover:border-black text-sm font-bold uppercase px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1"
              href="{{route('products.index')}}" type="button" style="transition: all 0.15s ease 0s;">
                  Ver Tienda
              </a>
              </div>
            </div>
          </div>
          {{-- CARD 3 --}}
          {{-- <div class="w-full md:w-4/12 lg:mb-0 mb-12 px-4">
            <div class="w-full lg:h-96  h-full px-6">
              <img alt="..." src="storage_old/img/11.jpg"
                class="md:h-56 shadow-2xl rounded max-w-full mx-auto object-cover" />
              <div class="pt-4 text-center">
                <h5 class="text-xl text-white font-bold">Ilustración 3</h5>
                <a class="mt-3 bg-black hover:bg-white text-white hover:text-black border hover:border-black text-sm font-bold uppercase px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1"
              href="{{route('products.index')}}" type="button" style="transition: all 0.15s ease 0s;">
                  Ver Tienda
              </a>
              </div>
            </div>
          </div> --}}

        </div>
      </div>
      </div>
      </div>
      </div>
    </section>

    {{-- SECTION BIOGRAFIA --}}
    <section id="biografia" class="relative pb-14 pt-10 sm:w-full bg-white">
      <div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
        style="height: 80px; transform: translateZ(0px);">
        <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
          version="1.1" viewBox="0 0 2560 100" x="0" y="0">
          <polygon points="2560 0 2560 100 0 100" style="fill:white
          "></polygon>
        </svg>
      </div>

      <div class="container mx-auto px-4 lg:pb-12">
        <div class="w-full mb-12 lg:mb-14 px-4">
          <h2 class="text-5xl text-black text-center font-semibold">BIOGRAFÍA</h2>
        </div>
        <div class="items-center flex flex-wrap">
          <div class="w-full md:w-7/12 lg:w-4/12 ml-auto mr-auto px-4">
            <img alt="..." class="max-w-full rounded-lg shadow-2xl bg-cover" src="storage_old/img/13.jpg" />
          </div>
          <div class="w-full md:w-7/12 lg:w-5/12 ml-auto mr-auto px-4">

            <div class="lg:pr-12">

              <p class="mt-2 mb-5 text-black text-justify text-md leading-relaxed ">
                The standard Lorem Ipsum passage, used since the 1500s
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                deserunt mollit anim id est laborum."
              </p>
              <a href="{{route('biografia')}}"><button
                  class="w-full lg:w-24 mt-2 border border-black text-black hover:white bg-white hover:bg-black  hover:text-white text-sm font-bold uppercase px-4 py-2 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
                  type="button" style="transition: all 0.15s ease 0s;">
                  Ver más
                </button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
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
          <h4 class="text-3xl text-center lg:text-left mb-2 font-semibold text-black">Contactar:</h4>
         
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
              <h4 class="block w-full text-black text-3xl font-semibold">Código Disidente</h4>
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
    @include('cookieConsent::index')
  </footer>
   


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
            id="name1" name="name" type="text" placeholder="ejemplo: Cynthia Veneno" required>
        </div>
        
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
              Email
            </label>
            <input
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="email1" name="email" type="email" placeholder="ejemplo: cynthiailustra@gmail.com" required>
          </div>
                
          <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="mensaje">
              Mensaje
            </label>
            <textarea
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
              id="mensaje1" name="mensaje" type="text" placeholder="Hola Cynthia!Me encanta tu trabajo, podrías..." required></textarea>
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

  {{-- MODAL CODIGO DISIDENTE --}}
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
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
            Nombre
          </label>
          <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            id="name2" name="name" type="text" placeholder="ejemplo: Código Disidente" required>
        </div>
        
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
              Email
            </label>
            <input
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="email2" name="email" type="email" placeholder="ejemplo: codigodisidente@gmail.com" required>
          </div>
                
          <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="mensaje">
              Mensaje
            </label>
            <textarea
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
              id="mensaje2" name="mensaje" type="text" placeholder="Hola Código Disidente! Necesitaría una página web..." required></textarea>
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

</body>

</html>