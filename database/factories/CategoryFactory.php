<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        $arabicNames = [
            'ملابس',
            'أحذية',
            'إلكترونيات',
            'منظفات',
            'أطفال',
        ];
        $englishNames = [
            'Clothes',
            'Shoes',
            'Electronics',
            'Cleaning',
            'Kids',
        ];
            return [
            'name'         => ['en' => $englishNames[rand(0, 4)], 'ar' =>  $arabicNames[rand(0, 4)]],
            'description'  => ['en' => $englishNames[rand(0, 4)], 'ar' =>  $arabicNames[rand(0, 4)]],
        ];
    }
}
