@extends('layouts.app')

@section('title', 'Murales')

@section('content') 
    

<div class="flex justify-center md:mt-16">
    {{-- <h1 class="text-white text-center text-lg mb-6 md:mx-8 lg:text-left lg:mb-0">Año o mese o categoria</h1> --}}
    <div class="bg-black md:py-6 md:flex md:justify-start">
       
        <div class="bg-white md:mx-8 md:flex md:max-w-5xl md:shadow-lg md:rounded-lg">
            
            <div class="md:w-1/2">
                <img class="w-full object-cover md:rounded-lg md:h-full" src="storage_old/img/murales.jpeg">
            </div>
            <div class="flex-col items-center py-4 px-6 md:py-2 md:w-1/2">
                {{-- <h2 class="text-center text-3xl text-gray-800 font-bold">Titulo del mural</h2> --}}
                <p class="mt-4 text-gray-600 text-justify p-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem modi reprehenderit vitae exercitationem 
                    aliquid dolores ullam temporibus enim expedita aperiam mollitia iure consectetur dicta tenetur, porro consequuntur saepe accusantium consequatur.
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem modi reprehenderit vitae exercitationem aliquid dolores ullam temporibus enim expedita
                     aperiam mollitia iure consectetur dicta tenetur, porro consequuntur saepe accusantium consequatur.
                     Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem modi reprehenderit vitae exercitationem aliquid dolores ullam temporibus enim expedita
                      aperiam mollitia iure consectetur dicta tenetur, porro consequuntur saepe accusantium consequatur.
                      Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem modi reprehenderit vitae exercitationem aliquid dolores ullam temporibus enim expedita 
                      aperiam mollitia iure consectetur dicta tenetur, porro consequuntur saepe accusantium consequatur.
                     </p>
                {{-- <div class="flex mt-6 md:mb-2">
                    <a href="{{route('works.muralesshow')}}" class="mx-auto bg-black hover:bg-white text-white hover:text-black border hover:border-black px-5 py-3 font-semibold rounded">Ver detalles</a>
                </div> --}}
            </div>
        </div>
    </div> 
</div>
<div class="flex justify-center mt-4"> 
    
    <div class="bg-black md:py-6 md:flex md:justify-start">
       
        <div class="bg-white md:mx-8 md:flex md:max-w-5xl md:shadow-lg md:rounded-lg">
            
            <div class="md:w-1/2">
                <img class="w-full object-cover md:rounded-lg md:h-full" src="storage_old/img/murales.jpeg">
            </div>
            <div class="flex-col items-center py-8 px-6 md:py-2 md:w-1/2">
                {{-- <h2 class="text-center text-3xl text-gray-800 font-bold">Titulo del mural <span class="text-indigo-600">Idea</span></h2> --}}
                <p class="mt-4 text-gray-600 text-justify p-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem modi reprehenderit vitae exercitationem 
                    aliquid dolores ullam temporibus enim expedita aperiam mollitia iure consectetur dicta tenetur, porro consequuntur saepe accusantium consequatur.
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem modi reprehenderit vitae exercitationem aliquid dolores ullam temporibus enim expedita
                     aperiam mollitia iure consectetur dicta tenetur, porro consequuntur saepe accusantium consequatur.
                     Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem modi reprehenderit vitae exercitationem aliquid dolores ullam temporibus enim expedita
                      aperiam mollitia iure consectetur dicta tenetur, porro consequuntur saepe accusantium consequatur.
                      Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem modi reprehenderit vitae exercitationem aliquid dolores ullam temporibus enim expedita 
                      aperiam mollitia iure consectetur dicta tenetur, porro consequuntur saepe accusantium consequatur.
                     </p>
                {{-- <div class="flex mt-6 md:mb-2">
                    <a href="{{route('works.muralesshow')}}" class="mx-auto bg-black hover:bg-white text-white hover:text-black border hover:border-black px-5 py-3 font-semibold rounded">Ver detalles</a>
                </div> --}}
            </div>
        </div>
    </div> 
</div>

@endsection

