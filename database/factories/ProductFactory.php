<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'category_id' => $this->faker->numberBetween(1, 2, 3),
            'name' => $this->faker->sentence(),
            'price' =>  $this->faker->randomNumber(),
            'description' => $this->faker->paragraph(),
            'stock' =>  $this->faker->randomDigit(),
            'image_path' => $this->faker->image(null, 640, 480)
        ];
    }

}



