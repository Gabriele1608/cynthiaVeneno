<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        for ($i=1; $i<50 ; $i++) {  
           
            Product::create([

             'name' =>'ilustracion' . $i,
             'slug' =>'ilustracion' . $i, 
             'details' =>'une petite ilustration' . $i,
             'description' =>'une petite ilustration qui vaut bien la peine detre regarde' . $i,
             'price' =>rand(10, 100)*100,
             'width' =>rand(10, 60)*10,
             'height' =>rand(10, 60)*10,
             'image' =>'https://via.placeholder.com/200X250'

            ])->categories()->attach([
                rand(1,5),
                rand(1,5)
            ]);
        }
    }
}
