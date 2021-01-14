<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Mail\OrderPlaced;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Mail\PedidoHechoMailable;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\CheckoutRequest;
use Gloudemans\Shoppingcart\Facades\Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //     $gateway = new \Braintree\Gateway([
    //         'environment' => config('services.braintree.environment'),
    //         'merchantId' => config('services.braintree.merchantId'),
    //         'publicKey' => config('services.braintree.publicKey'),
    //         'privateKey' => config('services.braintree.privateKey')
    //     ]);

    //     try {
    //         $paypalToken = $gateway->ClientToken()->generate();
    //     } catch (\Exception $e) {
    //         $paypalToken = null;
    //     }
    
        return view('checkout.index')->with([
            
            'envio' => getNumbers()->get('envio'),
            'discount' => getNumbers()->get('discount'),
            'newSubtotal' =>  getNumbers()->get('newSubtotal'),
            'newTotalEnvio' => getNumbers()->get('newTotalEnvio'),
            //'newTax' =>  getNumbers()->get('newTax'),
            //'newTotal' =>  getNumbers()->get('newTotal'),
        ]);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckoutRequest $request)
    {
        //Check race condition when there are less items available to purchase

        if ($this->productsAreNoLongerAvailable()) {
            return back()->withErrors('Lo siento!Uno de los productos de la cesta ya no es disponible.');
        }


        $contents = Cart::content()->map(function($item){
            return $item->model->slug.', '.$item->qty;
        })->values()->toJson();

        try{
            $charge = Stripe::charges()->create([
                'amount' => getNumbers()->get('newTotalEnvio')/100,
                'currency' => 'EUR',
                'source' => $request->stripeToken,
                'description' => 'Order',
                'receipt_email' => $request->email,
                'metadata' => [
                    //change to Order ID after we start using DB
                    'contents' => $contents,
                    'quantity' => Cart::instance('default')->count(),
                    'discount' => collect(session()->get('coupon'))->toJson(),
                    'gastos' => getNumbers()->get('envio'),
                ],
            ]);

            $order = $this->addToOrdersTables($request, null);
            Mail::send(new OrderPlaced($order));
            Mail::Send(new PedidoHechoMailable($order));
            //Mail::to($request->email)->send(new OrderPlaced);

            //decrease the quantities of all products in the cart
            $this->decreaseQuantities();
            
            //SUCCESS PAYMENT
            Cart::instance('default')->destroy();
            session()->forget('coupon');

            return redirect()->route('thankyou.index')->with('success_message', 'Gracias!Su compra se ha realizado correctamente. En breve, recibirás un email de confirmación del pedido.');

            //return back()->with('success_message', 'Gracias!Su compra se ha realizado correctamente.');

         }catch(CardErrorException $e){
            $this->addToOrdersTables($request, $e->getMessage());
            return back()->withErrors('Error! ' . $e->getMessage()); 
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function paypalCheckout(Request $request)
    // {
    //     // Check race condition when there are less items available to purchase
    //     if ($this->productsAreNoLongerAvailable()) {
    //         return back()->withErrors('Sorry! One of the items in your cart is no longer avialble.');
    //     }

    //     $request->validate([
    //         'billing_email' => 'required|email',
    //         'billing_name' => 'required',
    //         'billing_address' => 'required',
    //        ' billing_city' => 'required',
    //         'billing_province' => 'required',
    //         'billing_postalcode' => 'required',
    //         'billing_name_on_card' => 'required'
            
    //     ]);

    //     $gateway = new \Braintree\Gateway([
    //         'environment' => config('services.braintree.environment'),
    //         'merchantId' => config('services.braintree.merchantId'),
    //         'publicKey' => config('services.braintree.publicKey'),
    //         'privateKey' => config('services.braintree.privateKey')
    //     ]);

    //     $nonce = $request->payment_method_nonce;

    //     $result = $gateway->transaction()->sale([
    //         'amount' => round(getNumbers()->get('newTotalEnvio') / 100, 2),
    //         'paymentMethodNonce' => $nonce,
    //         'options' => [
    //             'submitForSettlement' => true
    //         ]
    //     ]);

    //     $transaction = $result->transaction;

    //     if ($result->success) {
    //         //  $order = $this->addToOrdersTablesPaypal(
    //         //     $transaction->paypal['payerEmail'],
    //         //   $transaction->paypal['payerFirstName'].' '.$transaction->paypal['payerLastName'],
    //         //     null
    //         //  );

    //         $order = $this->addToOrdersTablesPaypal($request, null);
    //         Mail::send(new OrderPlaced($order));

    //         // decrease the quantities of all the products in the cart
    //         $this->decreaseQuantities();

    //         Cart::instance('default')->destroy();
    //         session()->forget('coupon');

    //         return redirect()->route('thankyou.index')->with('success_message', 'Thank you! Your payment has been successfully accepted!');
    //     } else {
    //         // $order = $this->addToOrdersTablesPaypal(
    //         //     $transaction->paypal['payerEmail'],
    //         //     $transaction->paypal['payerFirstName'].' '.$transaction->paypal['payerLastName'],
    //         //     $result->message
    //         // );

    //         return back()->withErrors('An error occurred with the message: '.$result->message);
    //     }
    // }

    protected function addToOrdersTables($request, $error){

      

        $order = Order::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'billing_email' => $request->email,
            'billing_name' => $request->name,
            'billing_address' => $request->address,
            'billing_city' => $request->city,
            'billing_province' => $request->province,
            'billing_postalcode' => $request->postalcode,
            'billing_name_on_card' => $request->name_on_card,
            'billing_discount' => getNumbers()->get('discount'),
            'billing_discount_code' => getNumbers()->get('code'),
            'billing_subtotal' => getNumbers()->get('newSubtotal'),
            // 'billing_tax' => getNumbers()->get('newTax'),
            // 'billing_total' => getNumbers()->get('newTotal),
            'billing_total_envio' => getNumbers()->get('newTotalEnvio'),
            'error' => $error,
        ]);

        //Insert into order_product table

        foreach (Cart::content() as $item) {
            
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'user_id' => auth()->user() ? auth()->user()->id : null,
                'quantity' => $item->qty,
            ]);
        }
        return $order;
    }

    // protected function addToOrdersTablesPaypal($request, $error)
    // {
    //     $request->validate([
    //         'billing_email' => 'required|email',
    //         'billing_name' => 'required',
    //         'billing_address' => 'required',
    //        ' billing_city' => 'required',
    //         'billing_province' => 'required',
    //         'billing_postalcode' => 'required',
    //         'billing_name_on_card' => 'required'
            
    //     ]);
    //     // Insert into orders table
    //     $order = Order::create([
    //         'user_id' => auth()->user() ? auth()->user()->id : null,
    //         'billing_email' =>$request->email,
    //         'billing_name' => $request->name,
    //         'billing_address' => $request->address,
    //         'billing_city' => $request->city,
    //         'billing_province' => $request->province,
    //         'billing_postalcode' => $request->postalcode,
    //         'billing_discount' => getNumbers()->get('discount'),
    //         'billing_discount_code' => getNumbers()->get('code'),
    //         'billing_subtotal' => getNumbers()->get('newSubtotal'),
    //         // 'billing_tax' => getNumbers()->get('newTax'),
    //         'billing_total_envio' => getNumbers()->get('newTotalEnvio'),
    //         'error' => $error,
    //         'payment_gateway' => 'paypal',
    //     ]);

    //     // Insert into order_product table
    //     foreach (Cart::content() as $item) {
    //         OrderProduct::create([
    //             'order_id' => $order->id,
    //             'product_id' => $item->model->id,
    //             'quantity' => $item->qty,
    //         ]);
    //     }

    //     return $order;
    // }


    protected function decreaseQuantities(){
        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->id);

            $product->update(['quantity' => $product->quantity - $item->qty]);
        }
    }

    protected function productsAreNoLongerAvailable(){
        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->id);
           if($product->quantity < $item->qty){
               return true;
           }
        }

        return false;
    }

    
}
