<?php

function presentPrice($price){
    $price = $price/100;

    return number_format($price, 2, ',', '').'€';
}

function getWidth($width){
    $width = $width/10;

    return number_format($width, 2, ',', '').' cm';
}

function getHeight($height){
    $height = $height/10;

    return number_format($height, 2, ',', '').' cm';
}

function setActiveCategory($category, $output = 'active'){
    return request()->category == $category ? $output: '';
}

function getNumbers(){

        
    //$tax = config('cart.tax') /100;
    $discount = session()->get('coupon')['discount'] ?? 0; 
    $newSubtotal = (Cart::subtotal()-$discount);
    if ($newSubtotal < 0) {
        $newSubtotal = 0;
    }
    $code = session()->get('coupon')['name'] ?? null;
    //$newTax = $newSubtotal * $tax;
    //$newTotal = $newSubtotal * (1 + $tax);
    $envio = 0;
    if (presentPrice(Cart::subtotal())>= 50) {
        $envio = 0;
    }else{
        $envio = 500;
    }
    if (presentPrice($newSubtotal)>= 50) {
        $envio = 0;
    }else{
        $envio = 500;
    }
    $newTotalEnvio = (Cart::subtotal()+$envio-$discount);

    return collect([
        'envio' => $envio,
        'discount' => $discount,
        'newSubtotal' => $newSubtotal,
        'code' => $code,
        'newTotalEnvio' => $newTotalEnvio,
        //'newTax' => $newTax,
        //'newTotal' => $newTotal
    ]);
}