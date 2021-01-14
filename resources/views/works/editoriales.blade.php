@extends('layouts.app')

@section('title', 'Editoriales')

@section('content') 


<div class="w-full md:py-12 mx-auto px-4 md:px-12 mb-96">
    <h1 class="semibold text-2xl lg:mb-0 mb-4">Año o mes: </h1>
    <div class="flex flex-wrap mx-1 lg:-mx-4">

        <!-- Column -->
        <div class="mb-4 px-1 w-full md:w-1/2 md:h-96 lg:my-4 lg:px-4 lg:w-1/3">

            <!-- Article -->
            {{-- <article class="md:h-96 overflow-hidden rounded-lg shadow-lg">

                <a href="#">
                    <img alt="Placeholder" class="block h-64 w-full object-cover" src="storage_old/img/editorial.jpg">
                </a>

                <header class="flex items-center justify-between leading-tight p-2 md:p-2 bg-black">
                    <h1 class="text-lg text-white">
                        <a class="no-underline hover:underline text-white" href="#">
                            Article Title
                        </a>
                    </h1>
                    <p class="text-grey-darker text-sm">
                        fecha 
                    </p>
                </header>

                <footer class="items-center leading-none p-2 md:p-2 bg-black">
                    <h2 class="pb-2 text-white">Frase pequeña para explicar </h2>
                    <a href="{{route('works.editorialesshow')}}" class="">
                        <button
                            class="w-full mt-3 text-black border hover:white bg-white hover:bg-black  hover:text-white text-sm font-bold uppercase px-4 py-2 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
                            type="button" style="transition: all 0.15s ease 0s;">
                            Ver detalles
                        </button>
                    </a>
                </footer>

            </article> --}}
            <article class="md:h-64 overflow-hidden rounded-lg shadow-lg border border-red-800">

                <a href="#">
                    <img alt="Placeholder" class="block h-64 w-full object-cover" src="storage_old/img/editorial.jpg">
                </a>

                <header class="flex items-center justify-between leading-tight p-2 md:p-2 bg-black">
                    <h1 class="text-lg text-white">
                        <a class="no-underline hover:underline text-white" href="#">
                            Article Title
                        </a>
                    </h1>
                    <p class="text-grey-darker text-sm">
                        fecha 
                    </p>
                </header>

                <footer class="items-center leading-none p-2 md:p-2 bg-black">
                    <h2 class="pb-2 text-white">Frase pequeña para explicar </h2>  
                </footer>
               
            </article>
            <article>
               
            <input type="checkbox" id="spoiler1">
                    <label for="spoiler1" class="inline-block w-full mt-3 text-center cursor-pointer text-black border hover:white bg-white hover:bg-black  hover:text-white text-sm font-bold uppercase px-4 py-2 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1">Ver detalles</label>
            <div class="spoiler relative text-white border border-yellow-300">
                CONTENIDO OCULTO
                    <img alt="Placeholder" class="block h-64 w-full object-cover" src="storage_old/img/3.jpg">       
            </div>
        
        </article>
            <!-- END Article -->

        </div>
        <!-- END Column -->
          <!-- Column -->
        <div class="mb-4 px-1 w-full md:w-1/2 md:h-96 lg:my-4 lg:px-4 lg:w-1/3">

            <!-- Article -->
            <article class="md:h-64 overflow-hidden rounded-lg shadow-lg border border-red-800">

                <a href="#">
                    <img alt="Placeholder" class="block h-64 w-full object-cover" src="storage_old/img/editorial.jpg">
                </a>

                <header class="flex items-center justify-between leading-tight p-2 md:p-2 bg-black">
                    <h1 class="text-lg text-white">
                        <a class="no-underline hover:underline text-white" href="#">
                            Article Title
                        </a>
                    </h1>
                    <p class="text-grey-darker text-sm">
                        fecha 
                    </p>
                </header>

                <footer class="items-center leading-none p-2 md:p-2 bg-black">
                    <h2 class="pb-2 text-white">Frase pequeña para explicar </h2>  
                </footer>
               
            </article>
            <article>
               
            <input type="checkbox" id="spoiler2">
                    <label for="spoiler2" class="inline-block w-full mt-3 text-center cursor-pointer text-black border hover:white bg-white hover:bg-black  hover:text-white text-sm font-bold uppercase px-4 py-2 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1">Ver detalles</label>
            <div class="spoiler relative text-white border border-yellow-300">
                CONTENIDO OCULTO
                    <img alt="Placeholder" class="block h-64 w-full object-cover" src="storage_old/img/3.jpg">       
            </div>
        
        </article>
            <!-- END Article -->

        </div>
        <!-- END Column -->
         <!-- Column -->
        <div class="mb-4 px-1 w-full md:w-1/2 md:h-96 lg:my-4 lg:px-4 lg:w-1/3 ">

            <!-- Article -->
            <article class="md:h-64 overflow-hidden rounded-lg shadow-lg">

                <a href="#">
                    <img alt="Placeholder" class="block h-64 w-full object-cover" src="storage_old/img/editorial.jpg">
                </a>

                <header class="flex items-center justify-between leading-tight p-2 md:p-2 bg-black">
                    <h1 class="text-lg text-white">
                        <a class="no-underline hover:underline text-white" href="#">
                            Article Title
                        </a>
                    </h1>
                    <p class="text-grey-darker text-sm">
                        fecha 
                    </p>
                </header>

                <footer class="items-center leading-none p-2 md:p-2 bg-black">
                    <h2 class="pb-2 text-white">Frase pequeña para explicar </h2>  
                </footer>
               
            </article>
            <article>
               
            <input type="checkbox" id="spoiler3">
                    <label for="spoiler3" class="inline-block w-full mt-3 text-center cursor-pointer text-black border hover:white bg-white hover:bg-black  hover:text-white text-sm font-bold uppercase px-4 py-2 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1">Ver detalles</label>
            <div class="spoiler relative text-white border border-yellow-300">
                CONTENIDO OCULTO
                    <img alt="Placeholder" class="block h-64 w-full object-cover" src="storage_old/img/3.jpg">       
            </div>
        
        </article>
            <!-- END Article -->

        </div>
        <!-- END Column -->
</div>
      



@endsection

