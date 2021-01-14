<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Jobs\UpdateCoupon;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CouponsController extends Controller
{
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coupon = Coupon::where('code', $request->coupon_code)->first();

        if (!$coupon) {
            return back()->withErrors('El cupón no es válido, por favor vuelve a intentarlo');
        }

        dispatch_now(new UpdateCoupon($coupon));

        return back()->with('success_message', 'El cupón se ha aplicado correctamente');
        
    }

    

    /**
     * Remove the specified resource from storage.
     *
    
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        session()->forget('coupon');

        return redirect()->route('cart.index')->with('success_message', 'El cupón se ha eliminado correctamente.');
    }
}
