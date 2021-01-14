<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;
 
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mightAlsoLike = Product::inRandomOrder()->take(4)->get();

        // $envio = 500;

        // $newEnvio = (Cart::subtotal() + $envio); 

        return view('cart.index')->with([
            
            'mightAlsoLike' => $mightAlsoLike,
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
    public function store(Request $request)
    {
        $duplicates = Cart::search(function($cartItem, $rowId) use ($request){

            return $cartItem->id ===$request->id;
        });

        if($duplicates->isNotEmpty()){
            return redirect()->route('products.index')->with('success_message', 'El producto ya se ha añadido a la cesta.');
        }

        Cart::add($request->id, $request->name , 1, $request->price)
        ->associate('App\Models\Product');

        return redirect()->route('products.index')->with('success_message', 'El producto se ha añadido correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,20'
        ]);

        if ($validator->fails()) {
            session()->flash('errors', collect(['No se puede superar la cantidad de 20.']));
            return response()->json(['success' => false], 400);
        }

        if ($request->quantity > $request->productQuantity) {
            session()->flash('errors', collect(['No hay bastante productos disponibles.']));
            return response()->json(['success' => false], 400);
        }

        Cart::update($id, $request->quantity);
        session()->flash('success_message', 'La cantidad se ha actualizado correctamente');
        return response()->json(['success' => true]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);

        return back()->with('success_message', 'El producto se ha eliminado correctamente');
    }

     /**
     * Switch item for shopping cart to Save For Later.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function switchToSaveForLater($id)
    // {
    //     $item = Cart::get($id);

    //     Cart::remove($id);

    //     $duplicates = Cart::instance('saveForLater')->search(function($cartItem, $rowId) use ($id){

    //         return $rowId ===$id;
    //     });

    //     if($duplicates->isNotEmpty()){
    //         return redirect()->route('cart.index')->with('success_message', 'El producto ya se ha añadido para guardar para más tarde.');
    //     }

    //     Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)
    //         ->associate('App\Models\Product');

    //     return redirect()->route('cart.index')->with('success_message', 'El producto se ha guardado para más tarde');
    // }
}
