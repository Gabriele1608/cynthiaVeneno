@extends('layouts.app')

@section('title', $product->name)

@section('content')

<div class="flex justify-center md:justify-start p-4 mb-8 md:mb-0 md:pt-10">
@include('partials.search')
</div>

<div class="md:w-2/3 mx-auto rounded overflow-hidden shadow-lg bg-white md:my-12 border-2 border-white">

    {{-- CONTENEUR IMAGES --}}
    <article class=" shadow-lg  bg-black">
  
      <div class="">
        <img alt="Ilustración de Cynthia Veneno" id="mainImage" class="w-full object-cover flex-1 cursor-default" src="{{asset('storage/' . $product->image)}}">
      </div>
  
      <div class="flex flex-wrap justify-between mt-2 p-2 bg-black text-white">
          <div class="flex flex-wrap items-center">
            
            <h1 class="text-white text-lg font-bold uppercase mr-2 mb-2"> 
              {{$product->name}}
            </h1>
            
            <span class="text-xs text-white mb-2">Quedan {{$product->quantity}} unidades</span>
          
          </div>
          <div>
            <span class="title-font font-medium text-lg text-white ">{{$product->presentPrice()}}</span>
          </div>
      </div>

          <h2 class="text-white bg-black mb-2 pl-2">
            {{$product->details}}
          </h2>

          <h2 class="pl-2 mb-2 text-white bg-black">{!!$product->description!!} </h2>

        <div class="flex flex-col pl-2 bg-black">
          <span class="text-white text-xs font-semibold mb-1 text-left ">
            Anc: {{$product->getWidth()}}
           </span>
  
           <span class="text-white text-xs font-semibold text-left">
            Alt: {{$product->getHeight()}}
           </span>
        </div>

      @if ($product->quantity >0)
      <form action="{{route('cart.store')}}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$product->id}}">
        <input type="hidden" name="name" value="{{$product->name}}">
        <input type="hidden" name="price" value="{{$product->price}}">
        <div class="w-full flex justify-center">
        <button type="submit" class=" mb-6 mt-4 bg-white hover:bg-black text-center hover:text-white text-black border border-white font-bold py-2 px-4 rounded">Añadir al carrito</button>
      </div>
    </form>
          
      @endif
     
          {{-- @if ($stock == 'Disponible')
          <form class="mb-0 flex justify-center" action="{{route('cart.store')}}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{$product->id}}">
            <button
              class="w-full md:w-32 mt-3 md:my-4 lg:my-8 text-black border hover:white bg-white hover:bg-black  hover:text-white text-sm font-bold uppercase px-4 py-2 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
              type="submit" style="transition: all 0.15s ease 0s;">
              Comprar
            </button>
          </form>
          @endif --}}
      </footer>
  
    </article>
  
    
    <div class="container flex flex-wrap bg-black">
      @if ($product->images)
      <div class="flex flex-wrap mx-auto">
      <div class="border-content w-20 h-20 border-white bg-black p-1 md:border-2 mx-2 rounded ">
        <img src="{{asset('storage/' . $product->image)}}" alt="Ilustración de Cynthia Veneno" class="thumbnails w-full h-full object-cover cursor-pointer rounded">
      </div>
      @foreach (json_decode($product->images, true) as $image)
      <div class="border-content w-20 h-20 border-white bg-black p-1 md:border-2 mx-2 rounded cursor-pointer">
        <img src="{{asset('storage/' . $image)}}" alt="Ilustración de Cynthia Veneno" class="thumbnails w-full h-full object-cover rounded">
      </div>
      @endforeach
      @endif
    </div>
  </div>
  </div>

  {{-- ANDRE --}}

    {{-- <div class="flex w-2/3 mx-auto mt-16 mb-4 border border-pink-500">
        
            <div class="w-1/2">
                <img src="{{asset('storage/'.$product->image)}}" alt="">
            </div>
      
        <div class="flex flex-col place-content-between border border-red-500">
            <div class="">
                <h1 class="text-white">
                {{$product->name}}  
                </h1>
            </div>
            <div class="w-full text-white">
                {!! $product -> description !!}
            </div>
            <div class="flex flex-col">
                    <span class="text-sm text-white">{{$product->presentPrice()}}</span>
                <div class="flex justify-start">
                    <span class="text-sm text-white mr-2">Ancho: {{$product->getWidth()}}</span>
                    <span class="text-sm text-white">Alto: {{$product->getHeight()}}</span>
                <form action="{{route('cart.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <input type="hidden" name="name" value="{{$product->name}}">
                    <input type="hidden" name="price" value="{{$product->price}}">
                    <button type="submit" class="text-white">Añadir al carrito</button>
                </form>
                </div>
            </div>
        </div>
      
    </div>
    <div class="flex justify-between bg-black">
        @if ($product->images)
        <div class="border-content w-20 h-20 border-white bg-black p-1 md:border-2 mx-2 rounded ">
          <img src="{{asset('storage/' . $product->image)}}" alt="" class="thumbnails w-full h-full object-cover rounded">
        </div>
        @foreach (json_decode($product->images, true) as $image)
        <div class="border-content w-20 h-20 border-white bg-black p-1 md:border-2 mx-2 rounded">
          <img src="{{asset('storage/' . $image)}}" alt="" class="thumbnails w-full h-full object-cover rounded">
        </div>
        @endforeach
        @endif
      </div> --}}
    <div class="mt-4">
    @include('partials.might-like')
  </div>
@endsection

