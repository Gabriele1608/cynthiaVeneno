<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Cynthia Veneno | @yield('title', '')</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/40c8dc7766.js" crossorigin="anonymous"></script>


    @yield('extra-script')

    <style>
        #menu-toggle:checked+#menu {
            display: block;
        }

        .dropdown:hover>.dropdown-content {
            display: block;

        }


        .modal {
            transition: opacity 0.25s ease;
        }

        body.modal-active {
            overflow-x: hidden;
            overflow-y: visible !important;
        }
    </style>
</head>

<body class="bg-pink-500 h-screen antialiased leading-none ">
    {{-- PRUEBAS  --}}
    <header
        class="z-40 fixed w-full md:px-16 px-6 bg-black flex flex-wrap items-center md:py-0 py-2 opacity-75 hover:text-opacity-100">
        <div class="flex-1 mr-2 flex justify-center items-center lg:justify-start">
            <a href="{{route('welcome')}}">
                <svg class="fill-current text-white" width="32" height="36" viewBox="0 0 32 36"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M15.922 35.798c-.946 0-1.852-.228-2.549-.638l-10.825-6.379c-1.428-.843-2.549-2.82-2.549-4.501v-12.762c0-1.681 1.12-3.663 2.549-4.501l10.825-6.379c.696-.41 1.602-.638 2.549-.638.946 0 1.852.228 2.549.638l10.825 6.379c1.428.843 2.549 2.82 2.549 4.501v12.762c0 1.681-1.12 3.663-2.549 4.501l-10.825 6.379c-.696.41-1.602.638-2.549.638zm0-33.474c-.545 0-1.058.118-1.406.323l-10.825 6.383c-.737.433-1.406 1.617-1.406 2.488v12.762c0 .866.67 2.05 1.406 2.488l10.825 6.379c.348.205.862.323 1.406.323.545 0 1.058-.118 1.406-.323l10.825-6.383c.737-.433 1.406-1.617 1.406-2.488v-12.757c0-.866-.67-2.05-1.406-2.488l-10.825-6.379c-.348-.21-.862-.328-1.406-.328zM26.024 13.104l-7.205 13.258-3.053-5.777-3.071 5.777-7.187-13.258h4.343l2.803 5.189 3.107-5.832 3.089 5.832 2.821-5.189h4.352z">
                    </path>
                </svg>
            </a>
            <a href="{{route('welcome')}}" class="text-2xl font-semibold ml-2 text-white ">Cynthia VeNeNo</a>
        </div>

        <label for="menu-toggle" class="pointer-cursor md:hidden block"><svg class="fill-current text-white"
                xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                <title>menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg></label>
        <input class="hidden" type="checkbox" id="menu-toggle" />

        <div class="hidden md:flex md:items-center md:w-auto w-full mx-auto" id="menu">
            <nav class="">
                <ul class="md:flex items-center justify-between text-white pt-4 md:pt-0 hover:text-opacity-100">
                    <li><a class="md:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-white"
                            href="{{route('biografia')}}">Biografía</a>
                    </li>
                    <li class="dropdown">
                        <a class="boutique md:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-white"
                            href="#boutique">Boutique</a>
                            <ul class="dropdown-content md:absolute hidden text-start ">
                                <li><a class=" hover:bg-gray-900 md:hidden py-2 px-4 block whitespace-no-wrap text-white"
                                        href="">Inicio</a></li>
                                {{-- @foreach (App\Models\Category::all() as $category)
                                    <li><a href="{{route('products.index', ['categorie'=>$category->slug])}}"
                                    class="hover:bg-gray-900 md:hidden py-2 px-4 block whitespace-no-wrap text-white">
                                    {{$category->name}}
                                    </a></li>
                                @endforeach --}}
                                {{-- <li><a class=" hover:bg-gray-900 md:hidden py-2 px-4 block whitespace-no-wrap text-white"
                                        href="{{route('works.murales')}}">Ilu Feministas</a></li>
                                <li><a class=" hover:bg-gray-900 md:hidden py-2 px-4 block whitespace-no-wrap text-white"
                                        href="{{route('works.entrevistas')}}">Ilu Eróticas</a></li>
                                <li><a class=" hover:bg-gray-900 md:hidden py-2 px-4 block whitespace-no-wrap text-white"
                                        href="{{route('works.entrevistas')}}">Ilu Queer</a></li>
                                <li><a class=" hover:bg-gray-900 md:hidden py-2 px-4 block whitespace-no-wrap text-white"
                                        href="{{route('works.entrevistas')}}">Tote Bags</a></li> --}}
                            </ul>
                    </li>
                    <li class="dropdown">
                        <a class="md:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-white " href="#works">Trabajos</a>
                        <ul class="dropdown-content md:absolute hidden text-start ">
                            <li><a class=" hover:bg-gray-900 py-2 px-4 block whitespace-no-wrap text-white"
                                    href="{{route('works.editoriales')}}">Editoriales</a></li>
                            <li><a class=" hover:bg-gray-900 py-2 px-4 block whitespace-no-wrap text-white"
                                    href="{{route('works.murales')}}">Murales</a></li>
                            <li><a class=" hover:bg-gray-900 py-2 px-4 block whitespace-no-wrap text-white"
                                    href="{{route('works.entrevistas')}}">Entrevistas</a></li>
                        </ul>
                    </li>

                    <li><a class="md:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-white md:mb-0"
                            href="{{route('contacto')}}">Contacto</a></li>
                    <li>
                        <a href="{{route("cart.index")}}" class="md:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-white">Cesta <span>
                            @if (Cart::instance('default')->count()>0)
                              <span class="text-white">{{Cart::instance('default')->count()}}</span>  
                            @endif </span> </a>
                    </li>

                    @guest
                    <li><a class="md:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-white"
                            href="{{--{{ route('login') }}--}}">{{ __('Login') }}</a></li>
                    @if (Route::has('register'))
                    <li><a class="md:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-white"
                            href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @endif
                    @else
                    <li class="dropdown"> 
                        <span class="md:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-white">{{ Auth::user()->name }}</span>
                        <ul class="dropdown-content md:absolute hidden text-start ">
                            <li><a class=" hover:bg-gray-900 py-2 px-4 block whitespace-no-wrap text-white"
                                    href="{{route('home')}}">Mis pedidos</a></li>
                            <li><a class=" hover:bg-gray-900 py-2 px-4 block whitespace-no-wrap text-white"
                                href="{{ route('logout') }}" class="no-underline" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    {{ csrf_field() }}
                                </form>
                        </ul>
                    </li>

                     
                    @endguest
            </nav>
        </div>
    </header>


    {{-- FIN PRUEBAS  --}}

    <!--Nav-->
    <div class="relative w-full flex content-center items-end justify-center" style="min-height: 55vh;">
        <div class="absolute top-0 w-full h-full bg-center bg-cover" style="background-image: url('/storage_old/img/water.jpg')">
         
        </div>
        </div>
      </div>
    {{-- <header id="header" class="w-full h-64"
        style="background-image: url('/storage_old/img/eyes-2764597_1280.jpg')"> 
    </header> --}}

    <div class="flex justify-end mr-20">
        @if (count($errors)>0)
        <div class="w-auto inline-block justify-self-end text-xs rounded px-2 bg-red-100 text-red-900" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>

        </div>
        @endif
    </div>


    {{-- FIN HEADER --}}
    <nav class="flex items-center justify-between bg-black p-1 border-b border-white">
        <div class="flex justify-between w-full items-center">

            {{-- Carrito --}}
            <a class="flex ml-3 p-1 no-underline rounded-lg bg-white  hover:bg-gray-700 hover:text-white"
                href="{{--{{route('cart.index')}}--}}">
                <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path
                        d="M21,7H7.462L5.91,3.586C5.748,3.229,5.392,3,5,3H2v2h2.356L9.09,15.414C9.252,15.771,9.608,16,10,16h8 c0.4,0,0.762-0.238,0.919-0.606l3-7c0.133-0.309,0.101-0.663-0.084-0.944C21.649,7.169,21.336,7,21,7z M17.341,14h-6.697L8.371,9 h11.112L17.341,14z" />
                    <circle cx="10.5" cy="18.5" r="1.5" />
                    <circle cx="17.5" cy="18.5" r="1.5" />
                </svg>
                {{-- CESTA CARRITO --}}
                <button type="button"
                    class="ml-1 p-1 rounded text-black font-semibold leading-none flex items-center  hover:text-white">
                    {{-- {{Cart::count()}} --}}
                </button>
            </a>
            
        <a href="{{route('products.index')}}" class="hidden ml-4 md:block lg:inline-block lg:mt-0 text-white font-semibold hover:text-red-700 mr-8 shadow-lg rounded">Todo</a>
                    @foreach {{--(App\Models\Category::all() as $category)--}}
                    <a href="{{--{{route('products.index', ['categorie'=>$category->slug])}}--}}"
                        class="hidden ml-4 md:block lg:inline-block lg:mt-0 text-white font-semibold hover:text-red-700 mr-8 shadow-lg rounded">
                        {{-- {{$category->name}} --}}
                    </a>
                    @endforeach
                
    
            
            <div class="flex items-center mr-2" id="nav-content">
     
                @include('partials.search')
                {{-- @include('partials.auth') --}}
               
            </div>  
        </div>


        {{-- <a class="flex absolute items-center"
        href="{{route('products.index')}}">

        <span class="tracking-wide no-underline hover:no-underline font-bold text-white text-xl "> </span>
        </a> --}}


    </nav>

    @if (session('success'))
    <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">

        <p class="text-sm font-bold">{{session('success')}}</p>
    </div>
    @endif

    @if (session('duplicate'))
    <div class="bg-red-200 border-t border-b border-red-600 text-red-800 px-4 py-3" role="alert">

        <p class="text-sm font-bold">{{session('duplicate')}}</p>
    </div>
    @endif

    @if (session('danger'))
    <div class="bg-blue-100 border-t border-b border-red-800 text-red-900 px-4 py-3" role="alert">

        <p class="text-sm font-bold">{{session('danger')}}</p>
    </div>
    @endif



    @if (request()->input('q'))

    <h6>{{$products->total()}} resultados para la búsqueda "{{request()->q}}"</h6>

    @endif


    <div class="container mx-auto">

        <div class="flex flex-wrap -mx-1 lg:-mx-4">

            @yield('content')
        </div>

    </div>

     {{-- FOOTER --}}
     <footer id="footer" class="w-full relative bg-gray-400 pt-4">
        {{-- <div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
              style="height: 80px; transform: translateZ(0px);">
              <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
                version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                <polygon class="text-white fill-current" points="2560 0 2560 100 0 100"></polygon>
              </svg>
            </div> --}}
        <div class="mx-auto lg:mx-0">
          <div class="flex flex-wrap pb-4">
            <div class="w-full lg:w-6/12 px-4">
              <h4 class="text-3xl text-center lg:text-left mb-4 font-semibold text-black">Contactar:</h4>
              <h5 class="text-lg text-center lg:text-left mt-0 mb-2 lg:mb-4 text-black">
                cynthiailustra@gmail.com
              </h5>
              <div class="w-full flex justify-center lg:justify-start">
                <button
                  class="modal-open bg-transparent border border-black text-black hover:white bg-white hover:bg-black hover:text-white font-bold py-1 px-2 rounded-full focus:outline-none">Contactar</button>
              </div>
              <div class="flex justify-center lg:justify-start mt-2 py-2">
                <button
                  class="bg-black text-blue-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
                  type="button">
                  <i class="flex fab fa-twitter"></i></button><button
                  class="bg-black  text-blue-600 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
                  type="button">
                  <i class="flex fab fa-facebook-square"></i></button><button
                  class="bg-black  text-pink-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
                  type="button">
                  <i class="flex fab fa-instagram"></i></button><button
                  class="bg-black  text-red-700 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
                  type="button">
                  <i class="flex fab fa-google"></i>
                </button>
              </div>
            </div>
            <div class="flex w-full lg:w-6/12 px-4">
              <div class="flex flex-wrap justify-end w-full text-center items-top">
                <div class="w-full lg:w-4/12 px-4 ml-auto lg:ml-0">
                  <span class="block uppercase text-black text-sm font-semibold mb-2">Mi desarollador</span>
                  <ul class="list-unstyled">
                    <li>
                      <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                        href="https://www.creative-tim.com/presentation">Portfolio</a>
                    </li>
                    <li>
                      <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                        href="https://blog.creative-tim.com">Contactar</a>
                    </li>
                  </ul>
                </div>
                <div class="w-full lg:w-4/12 px-4">
                  <span class="block uppercase text-black text-sm font-semibold mb-2">Otra cosa por anadir</span>
                  <ul class="list-unstyled">
                    <li>
                      <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                        href="https://github.com/creativetimofficial/argon-design-system/blob/master/LICENSE.md">XXXXXXX</a>
                    </li>
                    <li>
                      <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                        href="https://creative-tim.com/terms">XXXXXXX</a>
                    </li>
                    <li>
                      <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                        href="https://creative-tim.com/privacy">XXXXXXX</a>
                    </li>
                    <li>
                      <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                        href="https://creative-tim.com/contact-us">XXXXXX</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
  
          <div class="flex flex-wrap items-center md:justify-between justify-center ">
            <div class="w-full mx-auto text-center bg-black">
              <div class="text-sm text-white font-semibold py-4">
                Copyright © 2020 Código Disidente Web Developer
  
              </div>
            </div>
          </div>
        </div>
      </footer>

    @yield('extra-js')
</body>

</html>