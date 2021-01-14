@extends('layouts.app')

@section('title', 'Mis Pedidos')

@section('content')

        <div class="p-4 md:p-12">
            <h1 class="text-white text-2xl font-semibold">Mi Historial de Compras:</h1>
        </div>
        @if (count($orders) > 0)

        <div class="text-white container mx-auto mb-10">
            <div class="flex flex-col flex-wrap">
            @foreach ($orders as $order)
            <div class=" border-b-2 border-purple-700 flex flex-wrap p-4">
               @foreach ($order->products as $product)
               <div class="border-2 rounded-lg border-white mr-4 mb-4 mt-6 flex">
                    <ul>
                        <li class="text-center uppercase p-1">{{$product->name}}</li>
                        <li><img src="{{asset('storage/'.$product->image)}}" alt="ILustración Cynthia Veneno" class="w-full md:h-40 md:w-36 object-cover flex-1"></li>
                        <li class="p-1 text-center">Cantidad:{{$product->pivot->quantity}} </li>
                    </ul>
                </div>
                @endforeach
            
               <ul class=" mb-4 md:mt-6">
                Pedido hecho el {{Carbon\Carbon::parse
                    ($order->created_at)->format('d/m/Y')}}
                    <li>Número del pedido: {{$order->id}}</li>
                    <li>Precio: {{presentPrice($order->billing_total_envio)}}</li>
                    @if($order->billing_discount)
                        <li>Descuento de: {{presentPrice($order->billing_discount)}}</li>   
                    @endif 
                <li>Pagado con: {{$order->payment_gateway}}</li>      
               </ul> 
            </div>      
            @endforeach
                </div>
            </div>
            
        @else

    <div class="mb-56 mt-32">
        <h2 class="text-lg text-center font-medium text-white">No se realizado ningún pedido todavía, eche un vistazo a la <a href="{{ route('products.index') }}" class="w-full bg-white hover:bg-black text-center hover:text-white text-black border border-white font-bold py-1 px-3 rounded">tienda</a>.  </h2>

    </div>
    
    @endif
         
    {{$orders->appends(request()->input())->links()}}

@endsection


