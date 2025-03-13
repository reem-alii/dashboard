<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
             'first_name' => 'admin',
             'last_name' => 'admin',
             'email' => 'admin@gmail.com',
            //'first_name' => fake()->name(),
            //'last_name' => fake()->name(),
            //'email' => fake()->unique()->safeEmail(),
            'password' => bcrypt('123456789'),
            'phone' =>fake()->unique()->numerify('01#########')
        ];
    }
}
