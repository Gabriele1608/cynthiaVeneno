<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' =>$this->faker->sentence(5),
             'slug' =>$this->faker->slug, 
             'details' =>$this->faker->sentence(10),
             'description' =>$this->faker->text,
             'price' =>$this->faker->numberBetween(20, 300)*100,
             'width' =>$this->faker->numberBetween(20, 100)*10,
             'height' =>$this->faker->numberBetween(20, 100)*10,
             'image' =>'https://via.placeholder.com/200X250',
        ];
    }
}
