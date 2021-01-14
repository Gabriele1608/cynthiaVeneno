<header
class="z-40 fixed w-full md:px-16 bg-black flex flex-wrap items-center md:py-0 py-2 opacity-50 xs:opacity-75">
<div class="flex-1 mr-2 flex justify-center items-center lg:justify-start">
  <a href="{{route('welcome')}}">
    <svg class="fill-current text-white" width="32" height="36" viewBox="0 0 32 36"
      xmlns="http://www.w3.org/2000/svg">
      <path
        d="M15.922 35.798c-.946 0-1.852-.228-2.549-.638l-10.825-6.379c-1.428-.843-2.549-2.82-2.549-4.501v-12.762c0-1.681 1.12-3.663 2.549-4.501l10.825-6.379c.696-.41 1.602-.638 2.549-.638.946 0 1.852.228 2.549.638l10.825 6.379c1.428.843 2.549 2.82 2.549 4.501v12.762c0 1.681-1.12 3.663-2.549 4.501l-10.825 6.379c-.696.41-1.602.638-2.549.638zm0-33.474c-.545 0-1.058.118-1.406.323l-10.825 6.383c-.737.433-1.406 1.617-1.406 2.488v12.762c0 .866.67 2.05 1.406 2.488l10.825 6.379c.348.205.862.323 1.406.323.545 0 1.058-.118 1.406-.323l10.825-6.383c.737-.433 1.406-1.617 1.406-2.488v-12.757c0-.866-.67-2.05-1.406-2.488l-10.825-6.379c-.348-.21-.862-.328-1.406-.328zM26.024 13.104l-7.205 13.258-3.053-5.777-3.071 5.777-7.187-13.258h4.343l2.803 5.189 3.107-5.832 3.089 5.832 2.821-5.189h4.352z">
      </path>
    </svg>
  </a>
  <a href="{{route('welcome')}}" class="text-2xl font-semibold ml-2 text-white hover:font-bold hover:text-purple-600 ">Cynthia VeNeNo</a>
</div>

<label for="menu-toggle" class="pointer-cursor md:hidden mr-2 block"><svg class="fill-current text-white"
    xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
    <title>menu</title>
    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
  </svg></label>
<input class="hidden" type="checkbox" id="menu-toggle" />

<div class="hidden md:flex md:items-center md:w-auto w-full mx-auto" id="menu">
  <nav class="">
    <ul class="ml-4 md:flex items-center justify-between  text-purple-700 md:text-white pt-4 md:pt-0 hover:text-opacity-100">
        <li><a class="md:p-4 py-3 px-0 block border-b-2 border-transparent hover:font-semibold hover:text-purple-400 md:hover:border-white"
            href="{{route('products.index')}}">Boutique</a>
        </li>
        <li class="dropdown">
            <a class="md:p-4 py-3 px-0 block border-b-2 border-transparent hover:font-semibold hover:text-purple-400 md:hover:border-white" href="#works">Trabajos</a>
            <ul class="dropdown-content md:absolute hidden text-start ">
              <li><a class=" hover:font-bold hover:text-purple-500 py-2 px-4 block whitespace-no-wrap text-white"
                  href="{{route('works.editoriales')}}">Editoriales</a></li>
              <li><a class=" hover:font-bold hover:text-purple-500 py-2 px-4 block whitespace-no-wrap text-white"
                  href="{{route('works.murales')}}">Murales</a></li>
              <li><a class=" hover:font-bold hover:text-purple-500 py-2 px-4 block whitespace-no-wrap text-white"
                  href="{{route('works.entrevistas')}}">Entrevistas</a></li>
            </ul>
          </li>
      <li><a class="md:p-4 py-3 px-0 block border-b-2 border-transparent hover:font-semibold hover:text-purple-400 md:hover:border-white"
          href="{{route('biografia')}}">Biografía</a>
      </li>
      <li><a class="md:p-4 py-3 px-0 block border-b-2 border-transparent hover:font-semibold hover:text-purple-400 md:hover:border-white md:mb-0 "
          href="{{route('contacto')}}">Contacto</a></li>
      <li>
        <a href="{{route("cart.index")}}"
          class="md:p-4 py-3 px-0 block border-b-2 border-transparent hover:font-semibold hover:text-purple-400 md:hover:border-white">Cesta <span>
            @if (Cart::instance('default')->count()>0)
            <span class="text-white">{{Cart::instance('default')->count()}}</span>
            @endif </span> </a>
      </li>
      @if(Route::has('login'))
      @auth
      <li class="dropdown">
        <span
          class="md:p-4 py-3 px-0 block border-b-2 border-transparent hover:font-semibold hover:text-purple-400 md:hover:border-white">{{ Auth::user()->name }}</span>
        <ul class="dropdown-content md:absolute hidden text-start ">
          <li><a class="hover:font-bold hover:text-purple-500 py-2 px-4 block whitespace-no-wrap text-white"
              href="{{route('users.edit')}}">Mi perfil</a></li>
          <li><a class="hover:font-bold hover:text-purple-500 py-2 px-4 block whitespace-no-wrap text-white"
              href="{{route('orders.index')}}">Mis pedidos</a></li>
          <li><a class="hover:font-bold hover:text-purple-500 py-2 px-4 block whitespace-no-wrap text-white"
              href="{{ route('logout') }}" class="no-underline" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            {{ csrf_field() }}
          </form>
        </ul>
      </li>
      @else
      <li><a href="{{ route('login') }}"
          class="md:p-4 py-3 px-0 block border-b-2 border-transparent hover:font-semibold hover:text-purple-400 md:hover:border-white">{{ __('Identificarse') }}</a>
      </li>
      @if (Route::has('register'))
      <li><a href="{{ route('register') }}"
          class="md:p-4 py-3 px-0 block border-b-2 border-transparent hover:font-semibold hover:text-purple-400 md:hover:border-white">{{ __('Registrarse') }}</a>
      </li>
      @endif
      @endauth

      @endif
    </ul>
  </nav>

  {{-- <a href="#" class="md:ml-4 flex items-center justify-start md:mb-0 mb-4 pointer-cursor">
  <img class="rounded-full w-10 h-10 border-2 border-transparent hover:border-indigo-400" src="https://pbs.twimg.com/profile_images/1128143121475342337/e8tkhRaz_normal.jpg" alt="Andy Leverenz">
</a> --}}


</div>

</header>