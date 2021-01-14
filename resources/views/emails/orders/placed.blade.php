@component('mail::message') 

    <h1>Muchas gracias por su compra {{ Auth::user()->name }}</h1>
    <h2>Aquí encontrará un resumen de su pedido: </h2>
    <ul>
        <li>Número del pedido: {{$order->id}}</li>
        @foreach ($order->products as $product)
           <li> Producto: {{ $product->name }}</li>
           <li> Cantidad: {{ $product->pivot->quantity }}</li>
           <li>Precio por Unidad: {{ round($product->price / 100, 2)}}</li>
           <li>Precio total: {{ round($product->price / 100, 2)*($product->pivot->quantity)}} euros </li>  
         @endforeach
         <li>Descuento de: {{round($order->billing_discount / 100, 2)}}</li>
         <li>Si la compra es superior a 50 euros, los gastos de envío son gratis.</li>
         <li>Si la compra es inferior a 50 euros los gastos de envío son 5 euros</li>
         <li>Precio final: {{$order->billing_total_envio /100 }} euros</li>
         
    </ul>

  


Puedes obtener más detalles sobre tu pedido iniciando sesión en el sitio web.
<a class="border border-black py-1 px-2" href="https://cynthiaveneno.dev">Ir al sitio</a>  
Gracias por la confianza y hasta pronto.
<br>
<br>
{{ config('app.name') }}
@endcomponent

