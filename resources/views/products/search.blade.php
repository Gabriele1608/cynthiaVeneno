@extends('layouts.app')

@section('content')

<div class=" container flex-wrap justify-between mx-auto flex mb-8">
    @forelse ($products as $product)
    <div class="flex flex-col mb-4 shadow-xl border-2 border-white bg-black rounded-md">
        <div class="w-full md:w-96"> <img src="{{asset('storage/'.$product->image)}}" alt="Ilustración de Cynthia Veneno" class="w-full md:w-96 md:h-96 flex-1 object-cover"></div>
         <div class="flex justify-between p-1 mt-2">
             <h1 class="flex flex-wrap flex-col text-lg break-word font-medium text-white">
                 <a href="{{route('products.show', $product->slug)}}">{{$product->name}}</a>  
             </h1>
             <span class="text-white text-sm">
                 {{$product->presentPrice()}}
             </span>
         </div>
         <div class="flex flex-col p-1 mb-2">
             <span class="text-xs text-white break-words mb-2">Quedan {{$product->quantity}} unidades</span>
             <div class="flex justify-between">
                 <span class="text-sm text-white">Ancho: {{$product->getWidth()}}</span>
                 <span class="text-sm text-white">Alto: {{$product->getHeight()}}</span>
             </div>
         </div>
         <a class="bg-white hover:bg-black text-center hover:text-white text-black border border-white font-bold py-2 px-4 rounded mb-2"
                         href="{{route('products.show', $product->slug )}}">Ver detalles</a>
                         @if ($product->quantity > 0)
                         <form action="{{route('cart.store')}}" method="POST">
                             @csrf
                             <input type="hidden" name="id" value="{{$product->id}}">
                             <input type="hidden" name="name" value="{{$product->name}}">
                             <input type="hidden" name="price" value="{{$product->price}}">
                             <button type="submit" class="w-full bg-white hover:bg-black text-center hover:text-white text-black border border-white font-bold py-2 px-4 rounded mb-2">Añadir al carrito</button>
                         </form>  
                         @endif
                        
     </div>
    @empty 

    <div class="text-white font-semibold">Por el momento, no hay artículos para esta categoría</div>
        
    @endforelse
</div>
        {{$products->appends(request()->input())->links()}}
   
    
@endsection