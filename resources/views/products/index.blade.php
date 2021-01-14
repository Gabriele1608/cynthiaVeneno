
@extends('layouts.app')

@section('title', 'Tienda')

@section('content')
  
{{-- <div class="py-8 w-full flex justify-around shadow-lg text-white border border-red-500">
<a href="{{route('products.index')}}" class="hover:font-bold hover:text-gray-500">Todo</a>
    @foreach ($categories as $category)
        
<li class="flex {{setActiveCategory($category->slug)}} active:bold "><a href="{{route('products.index', ['category'=>$category->slug])}}" class="hover:font-bold hover:text-gray-500">{{$category->name}}</a></li>

    @endforeach
</div> --}}


{{-- @if (session()->has('success_message'))
        <div class="text-green-500">
            {{session()->get('success_message')}}
        </div>    
    @endif --}}


    {{-- @if (count($errors)>0)
        <div class="text-pink-500">
            <ul>
                @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>    
    @endif --}}
   


<div class="md:mt-28 lg:mt-20 mb-8">
    
    <div class="flex flex-col flex-wrap justify-center sm:flex-row text-white md:mb-10">
        
        <a href="{{route('products.index')}}" class="flex hover:font-bold hover:text-gray-500 pl-4 pt-4 pb-2">Todo</a>
    @foreach ($categories as $category)   
    <li class="flex {{setActiveCategory($category->slug)}} active:bold p-4 text-white "><a href="{{route('products.index', ['category'=>$category->slug])}}" class="hover:font-bold hover:text-gray-500">{{$category->name}}</a></li>

    @endforeach
    </div>

    <div class="flex flex-col ml-4 md:ml-3 md:flex-row md:justify-between md:mx-6 lg:mx-8 mb-8 mt-4">
        {{-- <h1 class="text-white text-2xl">{{$categoryName}}</h1> --}}
        @include('partials.search')
        <div class="mt-6 md:mt-0 md:mr-3 lg:mr-0">
            <span class="text-white font-bold">Precio: </span>
            <a class="text-white text-sm hover:font-bold hover:text-gray-500" href="{{route('products.index', ['category'=>request()->category, 'sort'=>'low_high'])}}" class="text-white text-sm">Más bajo a más alto | </a>
            <a class="text-white text-sm hover:font-bold hover:text-gray-500" href="{{route('products.index', ['category'=>request()->category, 'sort'=>'high_low'])}}" class="text-white text-sm">Más alto a más bajo</a>
        </div>
    </div>

    <div class="flex flex-wrap justify-around mx-auto p-1 ">
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
</div>

    {{$products->appends(request()->input())->links()}} 


@endsection    


