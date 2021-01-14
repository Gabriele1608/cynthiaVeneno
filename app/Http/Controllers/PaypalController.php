<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Mail\OrderPlaced;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Mail\PedidoHechoMailable;
use App\Http\Requests\PaypalRequest;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\CheckoutRequest;
use Gloudemans\Shoppingcart\Facades\Cart;


class PaypalController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gateway = new \Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        try {
            $paypalToken = $gateway->ClientToken()->generate();
        } catch (\Exception $e) {
            $paypalToken = null;
        }
    
        return view('paypal.index')->with([
            'paypalToken' => $paypalToken,
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
    public function store(PaypalRequest $request)
    {
                // Check race condition when there are less items available to purchase
                if ($this->productsAreNoLongerAvailable()) {
                    return back()->withErrors('Lo siento uno de los productos ya no está disponible.');
                }
        
        
                $gateway = new \Braintree\Gateway([
                    'environment' => config('services.braintree.environment'),
                    'merchantId' => config('services.braintree.merchantId'),
                    'publicKey' => config('services.braintree.publicKey'),
                    'privateKey' => config('services.braintree.privateKey')
                ]);
        
                $nonce = $request->payment_method_nonce;
        
                $result = $gateway->transaction()->sale([
                    'amount' => round(getNumbers()->get('newTotalEnvio') / 100, 2),
                    'paymentMethodNonce' => $nonce,
                    'options' => [
                        'submitForSettlement' => true
                    ]
                ]);
        
                $transaction = $result->transaction;
        
                if ($result->success) {
                    //  $order = $this->addToOrdersTablesPaypal(
                    //     $transaction->paypal['payerEmail'],
                    //   $transaction->paypal['payerFirstName'].' '.$transaction->paypal['payerLastName'],
                    //     null
                    //  );
        
                    $order = $this->addToOrdersTablesPaypal($request, null);
                    Mail::send(new OrderPlaced($order));
                    Mail::Send(new PedidoHechoMailable($order));
        
                    // decrease the quantities of all the products in the cart
                    $this->decreaseQuantities();
        
                    Cart::instance('default')->destroy();
                    session()->forget('coupon');
        
                    return redirect()->route('thankyou.index')->with('success_message', 'Gracias el pago se ha realizado correctamente. En breve, recibirá un email de confirmación del pedido.');
                } else {
                    // $order = $this->addToOrdersTablesPaypal(
                    //     $transaction->paypal['payerEmail'],
                    //     $transaction->paypal['payerFirstName'].' '.$transaction->paypal['payerLastName'],
                    //     $result->message
                    //);
        
                    return back()->withErrors('An error occurred with the message: '.$result->message);
                }
    }

    protected function addToOrdersTablesPaypal($request, $error)
    {

        // $validated = $request->validate([
            
        //     'billing_email' => 'required|email',
        //     'billing_name' => 'required',
        //     'billing_address' => 'required',
        //     'billing_city' => 'required',
        //     'billing_province' => 'required',
        //     'billing_postalcode' => 'required',   
        // ]);

        
            
        // Insert into orders table
        $order = Order::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'billing_email' =>$request->mail,
            'billing_name' => $request->nombre,
            'billing_address' => $request->addresse,
            'billing_city' => $request->ciudad,
            'billing_province' => $request->provincia,
            'billing_postalcode' => $request->postal,
            'billing_discount' => getNumbers()->get('discount'),
            'billing_discount_code' => getNumbers()->get('code'),
            'billing_subtotal' => getNumbers()->get('newSubtotal'),
            // 'billing_tax' => getNumbers()->get('newTax'),
            'billing_total_envio' => getNumbers()->get('newTotalEnvio'),
            'error' => $error,
            'payment_gateway' => 'paypal',
        ]);

        

        // Insert into order_product table
        foreach (Cart::content() as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'quantity' => $item->qty,
            ]);
        }

        return $order;
    
    }

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
