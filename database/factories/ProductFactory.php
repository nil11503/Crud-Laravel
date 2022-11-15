<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        $categoriesIDs = DB::table('categories')->pluck('id');
         return [
            'name' => fake()->name(),
            'category_id' => fake()->randomElement($categoriesIDs),
            'description' => fake()->realText(),
            'stock'=> rand(1,50),
            'price'=>rand(1,50),
            'remember_token' => Str::random(10)
            ];
    }
}
