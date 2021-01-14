@extends('layouts.app')

@section('title', 'Pago')

@section('extra-script')
<script src="https://js.stripe.com/v3/"></script>

    
@endsection

{{-- CSS --}}

@section('extra-css')

<style>
    .StripeElement {
  box-sizing: border-box;

  height: 40px;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
</style>

    
@endsection
 
{{-- FIN CSS --}}

@section('content')

{{-- @if (session('error'))
<div class="inline-block text-red-500 bg-red-200 border-t border-b border-red-900 px-4 py-3 rounded" role="alert">

    <p class="text-sm font-bold">{{session('error')}}</p>
</div>
@endif



 

    @if (session()->has('success_message'))
        
        <div class="inline-block text-green-500 bg-green-200 border-t border-b border-gree-900 px-4 py-3 rounded">
            {{ session()->get('success_message') }}
        </div>
    @endif

    @if(count($errors) > 0)
        
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
                <form action="{{route('checkout.store')}}" method="POST" id="payment-form" class="w-full rounded-md bg-black">
                @csrf
                <h2 class="text-2xl mb-4 font-bold text-white text-center">Informaciones de Envío</h2>

                <div class="flex flex-col text-white">
                    <label for="email" class="text-white p-1 mb-2 font-semibold">Email</label>
                    @if (auth()->user())
                        <input type="email" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-2 px-2 mb-3 appearance-none focus:outline-none" id="email" name="email" value="{{ auth()->user()->email }}" >
                        @else
                        <input type="email" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-2 px-2 mb-3 appearance-none focus:outline-none" id="email" name="email" value="{{ old('email') }}" required >
                    @endif
                </div>
                <div class="flex flex-col text-white">
                    <label for="name" class="text-white p-1 mb-2 font-semibold">Nombre</label>
                    <input type="text" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-2 px-2 mb-3 appearance-none focus:outline-none" id="name" name="name" value="{{ old('name') }}" required >
                </div>
                <div class="flex flex-col text-white">
                    <label for="address" class="text-white p-1 mb-2 font-semibold">Dirección</label>
                    <input type="text" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-2 px-2 mb-3 appearance-none focus:outline-none" id="address" name="address" value="{{ old('address') }}" required >
                </div>

                <div class="half-form">
                    <div class="flex flex-col text-white">
                        <label for="city" class="text-white p-1 mb-2 font-semibold">Ciudad</label>
                        <input type="text" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-2 px-2 mb-3 appearance-none focus:outline-none" id="city" name="city" value="{{ old('city') }}" required >
                    </div>
                    <div class="flex flex-col text-white">
                        <label for="province" class="text-white p-1 mb-2 font-semibold">Provincia</label>
                        <input type="text" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-2 px-2 mb-3 appearance-none focus:outline-none" id="province" name="province" value="{{ old('province') }}" required >
                    </div>
                </div> <!-- end half-form -->

                <div class="half-form">
                    <div class="flex flex-col text-white">
                        <label for="postalcode" class="text-white p-1 mb-2 font-semibold">Código Postal</label>
                        <input type="text" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-2 px-2 mb-3 appearance-none focus:outline-none" id="postalcode" name="postalcode" value="{{ old('postalcode') }}" required >
                    </div>
                   
                </div> <!-- end half-form -->
             
               

                <h2 class="text-2xl my-6 font-bold text-white text-center">Detalles de Pago con Tarjeta</h2>

                <div class="flex flex-col text-white">
                    <label for="name_on_card" class="text-white p-1 mb-2 font-semibold">Nombre del Titular de la Tarjeta</label>
                    <input type="text" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-2 px-2 mb-3 appearance-none focus:outline-none" id="name_on_card" name="name_on_card" value="">
                </div>

                <div class="flex flex-col text-white">
                    <label for="card-element" class="text-white p-1 mb-2 font-semibold">
                      Tarjeta de Crédito o Débito
                    </label>
                    <div id="card-element">
                      <!-- a Stripe Element will be inserted here. -->
                    </div>

                    <!-- Used to display form errors -->
                    <div id="card-errors" role="alert"></div>
                </div>
                <div class="spacer"></div>
                <button type="submit" id="complete-order" class="w-full text-white font-semibold border border-white bg-black rounded py-2 px-4 my-4">Pagar ({{ presentPrice($newTotalEnvio) }})</button>
              
              </form>
            </div>      
      </div>

@endsection

@section('extra-js') 

<script>
    // Create a Stripe client.
    
var stripe = Stripe('pk_test_51HXrpGLouV2umHtaTh5iVlX1qcDpfUzziOFchKU5GFvfmrJprWP7vNJZkXlmDOhL3DH3RlarnzSw33mDXR7poVDB00bTyZH484');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {
    style: style,
    hidePostalCode: true
    });

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

//Disable the submit button to prevent repeated clicks
document.getElementById('complete-order').disabled = true;

  var options = {
      name:document.getElementById('name_on_card').value,
      address_line1:document.getElementById('address').value,
      address_city:document.getElementById('city').value,
      address_state:document.getElementById('province').value,
      address_zip:document.getElementById('postalcode').value,
  }

  stripe.createToken(card, options).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;

        //Enable the submit button
        document.getElementById('complete-order').disabled = false;

    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}


</script>
    

    
@endsection