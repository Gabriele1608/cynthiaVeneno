@extends('layouts.app')

@section('title', 'Entrevistas')

@section('content') 


<div class="mx-auto h-full flex flex-wrap items-center justify-around px-8 my-20">
    <div class="flex flex-wrap w-full mr-4 bg-white rounded shadow-lg md:w-3/4 lg:w-3/5 border-4 border-white">
      <img class="w-full h-64 object-cover object-bottom rounded-t" src="storage_old/img/enrevista_personal.jpg">
      <div class="flex flex-col w-full md:flex-row">
          <div class="flex flex-row justify-around lg:p-4 font-bold leading-none text-white uppercase bg-black rounded md:flex-col md:items-center md:justify-center md:w-1/4">
              <div class="lg:text-5xl p-2">18</div>
              <div class="lg:text-3xl p-2">Junio</div>
              <div class="lg:text-5xl p-2">2018</div>
          </div>
          <div class="p-4 font-normal text-gray-800 md:w-3/4">
              <h1 class="mb-4 text-4xl font-bold leading-none tracking-tight text-black">Mag Les Revista</h1>
              <a href=""><p class="hover:underline leading-normal text-justify">“Mi nombre es Cynthia y soy ilustradora. Por aquí os dejo un hilo con algunos de mis dibujos y,
                   si os gustan, sería genial que los pudierais compartir”, así es como presenta
                   Cynthia parte de sus ilustraciones en Twitter, y es que la artista revolucionó la red social hace tres años ...</p></a>
              <div class="flex flex-row items-center mt-4 text-gray-700">
                  <div class="lg:w-1/2 text-center">
                      Written by Sam Martinez
                  </div>
                  <div class="w-full flex justify-end md:justify-end mt-4 md:mt-0">
                    <a href="{{route('works.entrevistasshow')}}" class="bg-black hover:bg-white text-white hover:text-black border hover:border-black px-5 py-3 font-semibold rounded">Leer artículo</a>
                  </div>
              </div>
          </div>
      </div>
    </div>   
  </div>
  <div class="mx-auto h-full flex flex-wrap items-center justify-around px-8 my-8">
    <div class="flex flex-wrap w-full mr-4 bg-white rounded shadow-lg md:w-3/4 lg:w-3/5 border-4 border-white">
      <img class="w-full h-64 object-cover object-bottom rounded-t" src="storage_old/img/enrevista_personal.jpg">
      <div class="flex flex-col w-full md:flex-row">
          <div class="flex flex-row justify-around lg:p-4 font-bold leading-none text-white uppercase bg-black rounded md:flex-col md:items-center md:justify-center md:w-1/4">
              <div class="lg:text-5xl p-2">18</div>
              <div class="lg:text-3xl p-2">Junio</div>
              <div class="lg:text-5xl p-2">2018</div>
          </div>
          <div class="p-4 font-normal text-gray-800 md:w-3/4">
              <h1 class="mb-4 text-4xl font-bold leading-none tracking-tight text-black">Mag Les Revista</h1>
              <a href=""><p class="hover:underline leading-normal text-justify">“Mi nombre es Cynthia y soy ilustradora. Por aquí os dejo un hilo con algunos de mis dibujos y,
                   si os gustan, sería genial que los pudierais compartir”, así es como presenta
                   Cynthia parte de sus ilustraciones en Twitter, y es que la artista revolucionó la red social hace tres años ...</p></a>
              <div class="flex flex-row items-center mt-4 text-gray-700">
                  <div class="lg:w-1/2 text-center">
                      Written by Sam Martinez
                  </div>
                  <div class="w-full flex justify-end">
                    <a href="{{route('works.entrevistasshow')}}" class="bg-black hover:bg-white text-white hover:text-black border hover:border-black px-5 py-3 font-semibold rounded">Leer artículo</a>
                  </div>
              </div>
          </div>
      </div>
    </div>   
  </div>

@endsection

