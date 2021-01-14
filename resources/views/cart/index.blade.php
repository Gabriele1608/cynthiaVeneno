@extends('layouts.app')

@section('title', 'Cesta')

@section('content')

    {{-- @if (count($errors)>0)
        <div class="text-pink-500"> 
            <ul>
                @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>    
    @endif --}}

    @if (Cart::count()>0)

    <h2 class="text-white ml-2 p-4 text-xl">{{ Cart::count()}} producto(s) en la cesta</h2>
  

        <div class="mt-8 flex flex-wrap md:justify-between w-full px-2 md:w-3/4 md:mx-auto">
          <div class=" flex-col mx-auto">
              @foreach (Cart::content() as $item)
              
            <div class="flex flex-col ">
              <div class="flex flex-col ">
                  <a href="{{route('products.show', $item->model->slug)}}"><img src="{{asset('storage/'.$item->model->image)}}" alt="Ilustración Cynthia Veneno" class="w-full md:w-96 md:h-96 object-cover flex-1 rounded-sm"></a>
                  <div class="flex flex-col p-2">
                    <div class="NOM mb-2"><a href="{{route('products.show', $item->model->slug)}}" class="text-white md:font-bold uppercase">{{$item->model->name}}</a></div>
                    <div class="DETAILS text-white mb-2">{{$item->model->details}}</div>
                    <div class="">
                      <label for="quantity" class="text-white">Cantidad</label>
                      <select class="quantity rounded-md" data-id="{{$item->rowId}}" data-productQuantity="{{$item->model->quantity}}">
                      @for ($i = 1; $i < 20 +1; $i++)
                          <option {{$item->qty == $i ? 'selected':''}} >{{$i}}</option>
                      @endfor          
                      </select>  
                    </div>
                    <div class="PRECIO text-white mt-2 font-bold">Precio: {{presentPrice($item->subtotal)}}</div>
                  </div>
              </div>
                <div class="p-2">
                  {{-- <form action="{{route('cart.switchToSaveForLater', $item->rowId)}}" method="POST">
                      @csrf
                      <button type="submit" class=" bg-teal-500 hover:bg-gray-700 text-white font-bold py-2 px-2 rounded my-2">Guardar para más tarde</button>
                  </form> --}}
                  <form action="{{route('cart.destroy', $item->rowId)}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class=" bg-white hover:bg-black text-center hover:text-white text-black border border-white font-bold py-2 px-2 rounded mt-2">Eliminar</button>
                  </form>
              </div>  
                <hr class="border-2 my-4">
            </div>
         
              @endforeach
            </div>
              
              <div class="w-96 px-2 md:mx-auto">
                <div>
                @if (session()->has('coupon'))
                  <div>
                   <div class="mb-2 text-white text-lg font-semibold"> Código: {{ session()->get('coupon')['name'] }}</div>
                    <form action="{{route('coupon.destroy')}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="bg-teal-500 hover:bg-gray-700 text-white text-sm py-1 px-2 rounded mb-4">Eliminar</button>
                    </form>
                  </div>      
                @endif
              </div>
            {{-- Tax ({{config('cart.tax')}}%)<br> --}}
            {{-- <span class="checkout-totals-total text-white">Precio: </span> --}}
            <div>
           <div class="text-white text-lg font-semibold mb-4">Precio: {{ presentPrice(Cart::subtotal()) }}</div>
            @if (session()->has('coupon'))
                <div class="text-red-500 text-lg font-semibold ml-14">-{{ presentPrice($discount) }}</div> <br>
               <div class="text-white text-lg font-semibold mb-2">Precio final: {{ presentPrice($newSubtotal) }}</div> <br> 
                @if (presentPrice($newSubtotal)>=50)
                  <div class="text-green-500 mb-4">
                    Gastos de envío: gratis
                  </div>
                @else
                  <div class="text-pink-500 mb-4">
                    Gastos de envío: 5 euros (para una compra superior a 50 euros, los gastos de envío salen gratis)
                  </div> 
                @endif
                   
            @else
              @if (presentPrice(Cart::subtotal())>=50)
                <div class="text-yellow-500 mb-4">
                  Gastos de envío: gratis
                </div>
              @else
              <div class="text-blue-500 mb-4">
                Gastos de envío: 5 euros (para una compra superior a 50 euros, los gastos de envío salen gratis)
              </div> 
              @endif
            @endif   
            {{-- {{ presentPrice($newTax) }} <br> --}}
            <span class="text-white text-lg font-semibold mb-4">Total: {{ presentPrice($newTotalEnvio) }}</span>
          </div>

          <div class="flex flex-wrap mt-4">
          @if (!session()->has('coupon'))
          <form action="{{route('coupon.store')}}" method="POST" class="flex flex-wrap box-border p-2 border-2 border-gray-500">
              @csrf
              
              <input type="text" class="inline-block mr-2 md:mb-2" name="coupon_code" id="coupon_code">
              <button type="submit" class=" p-2 border md:mx-auto border-gray-600 rounded text-sm bg-gray-200 text-black font-medium">Aplicar descuento</button>
           
            </form>
          @endif
            </div>
 
            <div class="flex mt-4">
              <a href="{{route('products.index')}}" class="bg-white hover:bg-black text-center hover:text-white text-black border border-white font-bold text-sm py-1 px-2 rounded mb-4 mr-2">Seguir comprando</a>
              <a href="{{route('checkout.index')}}" class="bg-white hover:bg-black text-center hover:text-white text-black border border-white font-bold text-sm py-1 px-2 rounded mb-4 mr-2">Pagar con Tarjeta</a>
              <a href="{{route('paypal.index')}}" class="bg-white hover:bg-black text-center hover:text-white text-black border border-white font-bold text-sm py-1 px-2 rounded mb-4">Pagar con Paypal</a>
          </div>
   </div>
     
      </div>
     <!-- end checkout-section -->
    @else
  <div class="flex flex-col flex-wrap mb-56 mt-20 md:p-8 p-4">
      <h3 class="text-white text-lg font-semibold mb-4">No tienes producto en la cesta.</h3> 
      <a href="{{route('products.index')}}" class="w-36 text-white hover:text-black font-medium border border-white hover:border-black rounded py-2 px-3 bg-black hover:bg-white">Seguir mirando</a>
      
  </div>   
    @endif
  </div>
     
{{-- SAVE FOR LATER
    @if (Cart::instance('saveForLater')->count() > 0)

    <h2 class="text-white">{{Cart::instance('saveForLater')->count()}} producto(s) guardado(s) para más tarde</h2>

    <div class="flex flex-col">
        @foreach (Cart::instance('saveForLater')->content() as $item)
            
    
            <div class="">
                <a href="{{route('products.show', $item->model->slug)}}"><img src="{{asset('storage/'.$item->model->image)}}" alt="image"></a>
                    <div>
                        <div><a href="{{route('products.show', $item->model->slug)}}" class="text-white">{{$item->model->name}}</a></div>
                        <div class="text-white">{{$item->model->details}}</div>
                        <div class="text-white">{{$item->model->presentPrice()}}</div>
                    </div>
            </div>

            
            <div>
                <form action="{{route('saveForLater.destroy', $item->rowId)}}" method="POST">
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="text-white">Eliminar</button>
                
                </form>
            <form action="{{route('saveForLater.switchToCart', $item->rowId)}}" method="POST">
                    @csrf
                    <button type="submit" class="text-white">Mover a la cesta</button>
                </form>
                </div>
            
        @endforeach
    </div>

    @else

    <h2 class="text-white text-lg font-semibold mb-56">No hay producto guardado para más tarde</h2>

    @endif --}}
    @if (Cart::count()>0)
    <div>
      @include('partials.might-like')
    </div>
    @endif
@endsection

@section('extra-js')
<script>
    (function(){
        const classname = document.querySelectorAll('.quantity')

        Array.from(classname).forEach(function(element) {
            element.addEventListener('change', function() {
                const id = element.getAttribute('data-id')
                const productQuantity = element.getAttribute('data-productQuantity')

                axios.patch(`/cesta/${id}`, {
                    quantity: this.value,
                    productQuantity: productQuantity
                })
                .then(function (response) {
                    // console.log(response);
                    window.location.href = '{{ route('cart.index') }}'
                })
                .catch(function (error) {
                    //console.log(error);
                   window.location.href = '{{ route('cart.index') }}'
                });
            })
        })
    })();
</script>
   
@endsection




