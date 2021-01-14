<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();

Route::get('/', [\App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome'); 



//Route::get('/boutique', [\App\Http\Controllers\HomeController::class, 'boutique'])->name('layouts.master');

// ROUTING BIOGRAFIA
Route::get('/biografia', [\App\Http\Controllers\HomeController::class, 'biografia'] )->name('biografia');

// ROUTING CONTACTO
Route::get('/contacto', [\App\Http\Controllers\HomeController::class, 'contacto'] )->name('contacto');

// ROUTING WORKS
    //Editorial
Route::get('/editoriales', [\App\Http\Controllers\EditorialesController::class, 'index'])->name('works.editoriales');
Route::get('/editoriales/detail', [\App\Http\Controllers\EditorialesController::class, 'show'])->name('works.editorialesshow');
    //Murales
Route::get('/murales', [\App\Http\Controllers\MuralesController::class, 'index'])->name('works.murales');
Route::get('/murales/detail', [\App\Http\Controllers\MuralesController::class, 'show'])->name('works.muralesshow');
    //Entrevistas
Route::get('/entrevistas', [\App\Http\Controllers\EntrevistasController::class, 'index'])->name('works.entrevistas');
Route::get('/entrevistas/detail', [\App\Http\Controllers\EntrevistasController::class, 'show'])->name('works.entrevistasshow');


//ROUTING PRODUCTS
Route::get('/shop', [\App\Http\Controllers\ProductsController::class, 'index'])->name('products.index');
Route::get('/producto/{slug}', [\App\Http\Controllers\ProductsController::class, 'show'])->name('products.show');
Route::get('/search', [\App\Http\Controllers\ProductsController::class, 'search'])->name('products.search');

//ROUTING CART

Route::get('/cesta', [\App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::post('/cesta', [\App\Http\Controllers\CartController::class, 'store'])->name('cart.store');
Route::patch('/cesta/{product}', [\App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
Route::post('/cesta/guardarParaMasTarde/{product}', [\App\Http\Controllers\CartController::class, 'switchToSaveForLater'])->name('cart.switchToSaveForLater');
Route::delete('/cesta/{product}', [\App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy');


//ROUTING CHECKOUT
Route::group(['middleware'=>['auth']], function(){
    //STRIPE
Route::get('/pago', [\App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/pago', [\App\Http\Controllers\CheckoutController::class, 'store'])->name('checkout.store');
    //PAYPAL
Route::get('/paypal', [\App\Http\Controllers\PaypalController::class, 'index'])->name('paypal.index');
Route::post('/paypal-pago', [\App\Http\Controllers\PaypalController::class, 'store'])->name('paypal.store');
Route::get('/mi-perfil', [\App\Http\Controllers\UsersController::class, 'edit'])->name('users.edit');
Route::patch('/mi-perfil', [\App\Http\Controllers\UsersController::class, 'update'])->name('users.update'); 
Route::get('/mis-pedidos', [\App\Http\Controllers\OrdersController::class, 'index'])->name('orders.index');


 });
//ROUTING SAVE FOR LATER
// Route::post('/guardarParaMasTarde/{product}', [\App\Http\Controllers\SaveForLaterController::class, 'switchToCart'])->name('saveForLater.switchToCart');
// Route::delete('/guardarParaMasTarde/{product}', [\App\Http\Controllers\SaveForLaterController::class, 'destroy'])->name('saveForLater.destroy');

//ROUTING COUPONS
Route::post('/coupon', [\App\Http\Controllers\CouponsController::class, 'store'])->name('coupon.store');
Route::delete('/coupon', [\App\Http\Controllers\CouponsController::class, 'destroy'])->name('coupon.destroy');


//ROUTING CONFIRMATION PAYMENT
Route::get('/thankyou', [\App\Http\Controllers\ConfirmationController::class, 'index'])->name('thankyou.index');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

//ROUTING CONTACTO
Route::post('/contacto', [\App\Http\Controllers\ContactaController::class, 'store'])->name('contacta.store');
Route::post('/contacto-codigo-disidente', [\App\Http\Controllers\ContactaCodigoDisidenteController::class, 'store'])->name('contactacodigodisidente.store');

//ROUTING PRIVACITY USERS
Route::get('/privacidad', [\App\Http\Controllers\PrivacityController::class, 'index'])->name('legal.index');


// Route::get('empty', function(){
//     Cart::destroy();
// });

//PARA TRABAJAR CON EL MAIL SIN TENER QUE PASAR POR MAILTRAP
// Route::get('/mailable', function(){
//     $order = App\Models\Order::find(1);

//     return new App\Mail\OrderPlaced($order);
// });


