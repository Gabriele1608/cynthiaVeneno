@extends('layouts.app')

@section('title', 'Pago')

@section('extra-script')

<script src="https://js.braintreegateway.com/web/dropin/1.25.0/js/dropin.min.js"></script>
    
@endsection

@section('content')

@if (session('error'))
<div class="inline-block text-red-500 bg-red-200 border-t border-b border-red-900 px-4 py-3 rounded" role="alert">

    <p class="text-sm font-bold">{{session('error')}}</p>
</div>
@endif

    {{-- @if (session()->has('success_message'))
        
        <div class="inline-block text-green-500 bg-green-200 border-t border-b border-gree-900 px-4 py-3 rounded">
            {{ session()->get('success_message') }}
        </div>
    @endif --}}

    {{-- @if(count($errors) > 0)
        
        <div class="alert alert-danger text-red-500">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
        
                <div class="flex flex-col mt-24">
                    <div class="flex border-2 rounded-md border-white w-2/5 mx-auto p-4">
                        
                        @if ($paypalToken)
            

                        <form method="POST" id="paypal-payment-form" class="w-full rounded-md bg-black" action="{{ route('paypal.store') }}">
                            @csrf
                            <h2 class="text-2xl mb-4 font-bold text-white text-center">Informaciones de Envío</h2>
                            {{-- FORMULARIO DE DATOS DE ENVIO --}}

                            <div class="flex flex-col text-white">
                                <label for="mail" class="text-white p-1 mb-2 font-semibold">Email</label>
                                @if (auth()->user())
                                    <input type="email" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-2 px-2 mb-3 appearance-none focus:outline-none" id="mail" name="mail" value="{{ auth()->user()->email }}" >
                                    @else
                                    <input type="email" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-2 px-2 mb-3 appearance-none focus:outline-none" id="mail" name="mail" value="{{ old('email') }}" >
                                @endif
                            </div>
                            <div class="flex flex-col text-white">
                                <label for="nombre" class="text-white p-1 mb-2 font-semibold">Nombre</label>
                                <input type="text" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-2 px-2 mb-3 appearance-none focus:outline-none" id="nombre" name="nombre" value="{{ old('name') }}" >
                            </div>
                            <div class="flex flex-col text-white">
                                <label for="addresse" class="text-white p-1 mb-2 font-semibold">Dirección</label>
                                <input type="text" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-2 px-2 mb-3 appearance-none focus:outline-none" id="addresse" name="addresse" value="{{ old('address') }}" >
                            </div>
            
                            <div class="half-form">
                                <div class="flex flex-col text-white">
                                    <label for="ciudad" class="text-white p-1 mb-2 font-semibold">Ciudad</label>
                                    <input type="text" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-2 px-2 mb-3 appearance-none focus:outline-none" id="ciudad" name="ciudad" value="{{ old('city') }}" >
                                </div>
                                <div class="flex flex-col text-white">
                                    <label for="provincia" class="text-white p-1 mb-2 font-semibold">Provincia</label>
                                    <input type="text" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-2 px-2 mb-3 appearance-none focus:outline-none" id="provincia" name="provincia" value="{{ old('province') }}" >
                                </div>
                            </div> <!-- end half-form -->
            
                            <div class="half-form">
                                <div class="flex flex-col text-white">
                                    <label for="postal" class="text-white p-1 mb-2 font-semibold">Código Postal</label>
                                    <input type="text" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-2 px-2 mb-3 appearance-none focus:outline-none" id="postal" name="postal" value="{{ old('postalcode') }}" >
                                </div>
                               
                            </div> <!-- end half-form -->


                            {{-- FIN FORMULARIO DE DATOS DE ENVIO --}}
                       
                            <section>
                              {{-- <div class="bt-drop-in-wrapper"> --}}
                                  <div id="bt-dropin"></div>
                              {{-- </div> --}}
                          </section>
                             
                           

                            <input id="nonce" name="payment_method_nonce" type="hidden" />
                            <button class="w-full text-white font-semibold border border-white bg-black rounded py-2 px-4 my-4" type="submit"><span>Pagar con Paypal ({{ presentPrice($newTotalEnvio) }})</span></button>
                        </form>
                    </div>
                @endif
            </div>
        
    </div>


@endsection

@section('extra-js')

<script>

// PayPal Stuff
var form = document.querySelector('#paypal-payment-form');
            var client_token = "{{ $paypalToken }}";

            braintree.dropin.create({
              authorization: client_token,
              selector: '#bt-dropin',
              paypal: {
                flow: 'vault'
              }
            }, function (createErr, instance) {
              if (createErr) {
                console.log('Create Error', createErr);
                return;
              }

              // remove credit card option
              var elem = document.querySelector('.braintree-option__card');
              elem.parentNode.removeChild(elem);

              form.addEventListener('submit', function (event) {
                event.preventDefault();

                instance.requestPaymentMethod(function (err, payload) {
                  if (err) {
                    console.log('Request Payment Method Error', err);
                    return;
                  }

                  // Add the nonce to the form and submit
                  document.querySelector('#nonce').value = payload.nonce;
                  form.submit();
                });
              });
            });

        ;
</script>
    

    
@endsection