<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
 
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagination = 9;
        $categories = Category::all();

        if(request()->category){
            $products = Product::with('categories')->whereHas('categories', function($query){
             $query->where('slug', request()->category);   
            });

            $categoryName = optional($categories->where('slug', request()->category)->first())->name;

        }else{
            $products = Product::take(12);
            $categoryName = 'Todo';
        }
        
        if(request()->sort == 'low_high'){
            $products = $products->orderBy('price')->paginate($pagination);
        }elseif(request()->sort == 'high_low'){
            $products = $products->orderBy('price', 'desc')->paginate($pagination);
        }else{
            $products = $products->paginate($pagination);
        }

     

        return view('products.index')->with([

            'products'=> $products,
            'categories'=> $categories,
            'categoryName'=>$categoryName,
            
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $mightALsoLike = Product::where('slug', '!=', $slug)->inRandomOrder()->take(4)->get();

        if ($product->quantity > setting('site.stock_threshold')) {
            
            $stockLevel = 'Disponible';

        }elseif($product->quantity <= setting('site.stock_threshold') && $product->quantity > 0){

            $stockLevel = 'Quedan pocas unidades';

        }else{

            $stockLevel = 'Indisponible';
        }

       

        return view('products.show')->with([
            'product' =>  $product,
            'mightAlsoLike' => $mightALsoLike,
            'stockLevel' => $stockLevel
            ]);
    }

    public function search(){

        request()->validate([
            'recherche' => 'required'
        ]);

        if(request()->category){
            $products = Product::with('categories')->whereHas('categories', function($query){
             $query->where('slug', request()->category);   
            });}

        $recherche = request()->input('recherche');

        $products = Product::where('name', 'like', "%$recherche%")
                ->orWhere('description', 'like', "%$recherche%")
                ->paginate(6);
        
        return view('products.search')->with('products', $products);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
