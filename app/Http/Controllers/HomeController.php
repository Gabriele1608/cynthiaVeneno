<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home'); 
    }

    public function welcome()
    {
        $products = DB::table('products')->orderBy('created_at', 'DESC')->take(3)->get();
        return view('welcome', ['products' => $products]); 
    }

    public function boutique(){
        return view('layouts.master');
    }

    public function biografia(){
        return view('biografia');
    }

    public function contacto(){
        return view('contacto');
    }
}
