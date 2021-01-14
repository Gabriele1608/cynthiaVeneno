<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> 

<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Cynthia Veneno | Contacto</title>  

  <!-- Scripts --> 

  <script src="https://kit.fontawesome.com/40c8dc7766.js" crossorigin="anonymous"></script>


  <!-- Styles -->
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  

  
</head>

<body class="bg-black w-full h-screen antialiased leading-none font-sans">
 
  @include('partials.headerdropdownworks')

    <section>
     
    <div id="container" class="w-4/5 mx-auto pt-32 pb-8">
      @if (session()->has('success_message'))
      <div class="inline-block text-green-700 bg-green-300 p-4 font-semibold rounded-lg ml-4 mb-8">
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
      <h1 class="text-center text-2xl text-white hover:text-purple-600 font-semibold p-2 cursor-pointer mb-4">Cynthia Veneno
      </h1>
      <div class="flex flex-col sm:flex-row">
        <!-- Card 1 -->
        <div class="sm:w-1/4 p-2">
          <div class="bg-white px-2 py-8 rounded-lg shadow-lg text-center">
            <div class="mb-3">
              <img class="w-32 mx-auto rounded-full object-contain" src="storage_old/img/facebook.png" alt="" />
            </div>
            <h2 class="text-lg md:text-xl font-medium text-gray-700 mb-6">FACEBOOK</h2>
    
    
            <a href="https://www.facebook.com/cynthiaveneno/" target="_blank" class="px-4 py-2 bg-blue-500 hover:bg-blue-900 text-white rounded-full">Contactar</a>
          </div>
        </div>
    
        <!-- Card 2 -->
        <div class="sm:w-1/4 p-2">
          <div class="bg-white px-2 py-8 rounded-lg shadow-lg text-center">
            <div class="mb-3">
              <img class="w-32 mx-auto rounded-full" src="storage_old/img/instagram.png" alt="" />
            </div>
            <h2 class="text-lg md:text-xl font-medium text-gray-700 mb-6">INSTAGRAM</h2>
    
    
            <a href="https://www.instagram.com/cynthiaveneno/?fbclid=IwAR0W9Hr5zvSl93-cp8jqjvOGBvCfympJapWVHsqKDa6QUeZECtBKofNl3ck" target="_blank" class="px-4 py-2 bg-blue-500 hover:bg-blue-900 text-white rounded-full">Contactar</a>
          </div>
        </div>
    
        <!-- Card 3 -->
        {{-- <div class="form-popup bg-white border border-black mt-2" id="myForm">
            <form action="mailto:gabriele16cangelli@gmail.com" class="form-container ml-2 bg-white lg:w-64 absolute z-50 rounded-lg">
              
          
              <label for="email" class="inline-block w-full text-center p-1 bg-black text-white rounded-lg"><b>Email</b></label>
              <input type="text" placeholder="Escriba su email" name="email" class="bg-gray-200 w-full" required>
          
              <label for="psw" class="inline-block w-full text-center p-1  bg-black text-white  rounded-lg"><b>Mensaje</b></label>
              <textarea name="" id="" cols="20" rows="8" placeholder="Escriba su mensaje" class="border p-1 w-full"></textarea>
          
              <button type="submit" class="btn w-full mb-2 p-1 bg-red-400 rounded-lg">Enviar</button>
              <button type="button" class="btn cancel flex w-full p-1 bg-blue-900 rounded-lg justify-center" onclick="closeForm()">Close</button>
            </form>
          </div> --}}
        <div class="sm:w-1/4 p-2">
          <div class="bg-white px-2 py-8 rounded-lg shadow-lg text-center">
            <div class="mb-3">
              <img class="w-32 mx-auto rounded-full" src="storage_old/img/email.png" alt="" />
            </div>
            <h2 class="text-lg md:text-xl font-medium text-gray-700 mb-3">GMAIL</h2>
            <button class="modal-open bg-transparent bg-blue-500 hover:bg-blue-900 text-white py-2 px-4 rounded-full focus:outline-none">Contactar</button>
          </div>
        </div>
    
            <!-- Card 4 -->
            <div class="sm:w-1/4 p-2">
              <div class="bg-white px-2 py-8 rounded-lg shadow-lg text-center">
                <div class="mb-3">
                  <img class="w-32 mx-auto rounded-full" src="storage_old/img/twitter.png" alt="" />
                </div>
                <h2 class="text-lg md:text-xl font-medium text-gray-700 mb-6">TWITTER</h2>
    
    
                <a href="https://twitter.com/cynthiaveneno" target="_blank" class="px-4 py-2 bg-blue-500 hover:bg-blue-900 text-white rounded-full">Contactar</a>
              </div>
            </div>
          </div>
        </div>
      </section> 
      <section>
          {{-- PARTE CODIGO DISIDENTE --}}
        <div id="container" class="w-4/5 mx-auto">
          <h1 class="text-center text-2xl text-white hover:text-green-500 font-semibold p-2 cursor-pointer mb-4">Código Disidente Web Developer
          </h1>
          <div class="flex flex-col sm:flex-row justify-center">
            <!-- Card 1 -->
            {{-- <div class="sm:w-1/4 p-2">
              <div class="bg-white px-2 py-8 rounded-lg shadow-lg text-center">
                <div class="mb-3">
                  <img class="w-auto mx-auto rounded-full" src="https://i.pravatar.cc/150?img=66" alt="" />
                </div>
                <h2 class="text-lg md:text-xl font-medium text-gray-700 mb-6">FACEBOOK</h2>
    
    
                <a href="#" class="px-4 py-2 bg-blue-500 text-white rounded-full">Hire</a>
              </div>
            </div> --}}
    
            <!-- Card 2 -->
            {{-- <div class="sm:w-1/4 p-2">
              <div class="bg-white px-2 py-8 rounded-lg shadow-lg text-center">
                <div class="mb-3">
                  <img class="w-auto mx-auto rounded-full" src="https://i.pravatar.cc/150?img=66" alt="" />
                </div>
                <h2 class="text-lg md:text-xl font-medium text-gray-700 mb-6">INSTAGRAM</h2>
    
    
                <a href="#" class="px-4 py-2 bg-blue-500 text-white rounded-full">Hire</a>
              </div>
            </div> --}}
    
            <!-- Card 3 -->
            <div class="sm:w-1/4 p-2">
              <div class="bg-white px-2 py-8 rounded-lg shadow-lg text-center">
                <div class="mb-3">
                  {{-- <img class="w-auto mx-auto rounded-full" src="https://i.pravatar.cc/150?img=66" alt="" /> --}}
                  <div class="flex items-center justify-center rounded-full w-32 h-32 mx-auto bg-black">
                   <div class="text-white text-center text-5xl font-piazzolla">D</div>
                  </div>
                </div>
                <h2 class="text-xl font-medium text-gray-700 mb-6">GMAIL</h2>
    
    
                <button class="modal-opene bg-transparent bg-blue-500 hover:bg-blue-900 text-white py-2 px-4 rounded-full focus:outline-none">Contactar</button>
              </div>
            </div>
    
            <!-- Card 4 -->
            {{-- <div class="sm:w-1/4 p-2">
              <div class="bg-white px-2 py-8 rounded-lg shadow-lg text-center">
                <div class="mb-3">
                  <img class="w-auto mx-auto rounded-full" src="https://i.pravatar.cc/150?img=66" alt="" />
                </div>
                <h2 class="text-lg md:text-xl font-medium text-gray-700 mb-6">TWITTER</h2>
    
    
                <a href="#" class="px-4 py-2 bg-blue-500 text-white rounded-full">Hire</a>
              </div>
            </div> --}}
          </div>
        </div> 
      </section>



    {{-- FOOTER --}}
    {{-- <footer id="footer" class="relative bg-gray-400 pt-4">
      <div class="mx-auto lg:mx-0">
        <div class="flex flex-wrap pb-4">
          <div class="w-full lg:w-6/12 px-4">
            <div class="w-full flex justify-center lg:justify-start">
            </div>
            <div class="flex justify-center lg:justify-start mt-2 py-2">
              <button
              class="bg-black text-blue-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
              type="button"><a href="https://twitter.com/cynthiaveneno" target="_blank">
              <i class="flex fab fa-twitter"></i></a></button><button
              class="bg-black  text-blue-600 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
              type="button"><a href="https://www.facebook.com/cynthiaveneno/" target="_blank">
              <i class="flex fab fa-facebook-square"></i></a></button><button
              class="bg-black  text-pink-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
              type="button"><a href="https://www.instagram.com/cynthiaveneno/?fbclid=IwAR0W9Hr5zvSl93-cp8jqjvOGBvCfympJapWVHsqKDa6QUeZECtBKofNl3ck" target="_blank">
              <i class="flex fab fa-instagram"></i></a></button><button
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
                 
                    <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                      href="https://blog.creative-tim.com">Contactar</a>
                  </li>
                </ul>
              </div>
              <div class="w-full lg:w-4/12 px-2">
               
                <span class="block uppercase text-black text-sm font-semibold mb-2">Cynthia Veneno</span>
                  <a href="{{route('welcome')}}" class="flex justify-center text-md font-semibold ml-2 text-white"><svg class="fill-current text-white" width="28" height="28" viewBox="0 0 32 36"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M15.922 35.798c-.946 0-1.852-.228-2.549-.638l-10.825-6.379c-1.428-.843-2.549-2.82-2.549-4.501v-12.762c0-1.681 1.12-3.663 2.549-4.501l10.825-6.379c.696-.41 1.602-.638 2.549-.638.946 0 1.852.228 2.549.638l10.825 6.379c1.428.843 2.549 2.82 2.549 4.501v12.762c0 1.681-1.12 3.663-2.549 4.501l-10.825 6.379c-.696.41-1.602.638-2.549.638zm0-33.474c-.545 0-1.058.118-1.406.323l-10.825 6.383c-.737.433-1.406 1.617-1.406 2.488v12.762c0 .866.67 2.05 1.406 2.488l10.825 6.379c.348.205.862.323 1.406.323.545 0 1.058-.118 1.406-.323l10.825-6.383c.737-.433 1.406-1.617 1.406-2.488v-12.757c0-.866-.67-2.05-1.406-2.488l-10.825-6.379c-.348-.21-.862-.328-1.406-.328zM26.024 13.104l-7.205 13.258-3.053-5.777-3.071 5.777-7.187-13.258h4.343l2.803 5.189 3.107-5.832 3.089 5.832 2.821-5.189h4.352z">
                    </path>
                  </svg></a>
               
              </div>
            </div>
          </div>
        </div> --}}
        <footer id="footer" class="mt-24">
        <div class="flex flex-wrap items-center md:justify-between justify-center ">
          <div class="w-full mx-auto text-center bg-white">
            <div class="text-sm text-black font-semibold py-4">
              Copyright © 2020 Desarrollado con <span class="text-black"><i class="fas fa-heart"></i></span> Código Disidente Web Developer

            </div>
          </div>
        </div>
      </footer>
      {{-- </div> --}}
    


    
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
  
    <script src="{{asset('js/app.js')}}"></script>
     
  </body>

  </html>