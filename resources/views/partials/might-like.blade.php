
    <div class="flex flex-col mb-8">
        <h1 class="ml-4 text-xl text-white text-center md:text-left mb-4 md:mb-8">También te puede interesar</h1>
        <div class="flex flex-wrap justify-around">
            @foreach ($mightAlsoLike as $product)
               <div class="border-2 border-white rounded">
                {{-- <a href="{{route('products.show', $product->slug)}}" class="flex flex-col mr-2 mb-2 w-40 border border-black rounded-sm"> --}}
                   <div> <img src="{{asset('storage/'.$product->image)}}" alt="Ilustración Cynthia Veneno" class="w-full md:h-52 md:w-52 object-cover flex-1"></div>
                    <div class="flex flex-col p-2 content-between">
                        <div class="flex flex-wrap mb-2 uppercase text-white text-sm font-semibold">{{$product->name}}</div>
                        <div class="flex text-white font-semibold mb-3">{{$product->presentPrice()}}</div>
                        <a class="bg-white hover:bg-black text-center hover:text-white text-black border border-white font-bold py-1 px-2 rounded mb-2"
                            href="{{route('products.show', $product->slug )}}">Ver detalles</a>
                    @if ($product->quantity > 0)
                        <form action="{{route('cart.store')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$product->id}}">
                                <input type="hidden" name="name" value="{{$product->name}}">
                                <input type="hidden" name="price" value="{{$product->price}}">
                                <button type="submit" class="w-full bg-white hover:bg-black text-center hover:text-white text-black border border-white font-bold py-1 px-2 rounded mb-2">Añadir al carrito</button>
                        </form>  
                    @endif 
                    </div>
                {{-- </a>  --}}
            </div>
                
                
            @endforeach  
        </div>
    </div>
