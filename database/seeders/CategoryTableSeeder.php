<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
           
            Category::create([

             'name' =>'Ilustracion Feminista',
             'slug' =>'Ilustracion_Feminista', 

            ]);

            Category::create([

                'name' =>'Ilustracion Queer',
                'slug' =>'Ilustracion_Queer', 
                
               ]);

            Category::create([

                'name' =>'Ilustracion Erotica',
                'slug' =>'Ilustracion_Erotica', 
                
               ]);
                
            Category::create([

                'name' =>'Ilustracion Vanguardista',
                'slug' =>'Ilustracion_Vanguardista', 
                
               ]);

            Category::create([

                'name' =>'Tote Bags',
                'slug' =>'Tote_Bags', 
                
               ]);
}
}