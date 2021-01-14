@extends('layouts.app')

@section('title', 'Gracias') 

@section('content')

   <div class="thank-you-section">
       
       <div class="mt-8 ml-6 mb-56">
           <a href="{{ url('/shop') }}" class="bg-black hover:bg-white text-white hover:text-black border border-white hover:border-black font-bold text-sm py-2 px-3 rounded mr-2">Volver a la tienda</a>
       </div>
   </div>


@endsection

