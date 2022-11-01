<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Product>
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
        return [
            'รหัสสินค้า' => fake()->numerify('P####'),
            'ชื่อสินค้า' => fake()->word,
            'ราคาสินค้าต่อหน่วย' => fake()->numberBetween(0, 100),
            'จำนวนสินค้าคงคลัง' => fake()->numberBetween(0, 100),
            'สินค้าที่ถูกจอง' => fake()->numberBetween(0, 10)
        ];
    }
}
