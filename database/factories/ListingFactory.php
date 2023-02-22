<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category' => 'Cow',
            'age' => $this->faker->numberBetween(1,20),
            'gender' => 'Male',
            'weight' => $this->faker->numberBetween(40, 70),
            'quantity' => $this->faker->numberBetween(1,5),
            'location' => $this->faker->address(),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->numberBetween(30000, 60000),
            'seller_mobile_number' => '09123456789',
        ];
    }
}
