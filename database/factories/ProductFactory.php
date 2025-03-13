<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Admin;

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
    public function definition(): array
    {
        $randomImages =[
            'https://m.media-amazon.com/images/I/41WpqIvJWRL._AC_UY436_QL65_.jpg',
            'https://m.media-amazon.com/images/I/61ghDjhS8vL._AC_UY436_QL65_.jpg',
            'https://m.media-amazon.com/images/I/61c1QC4lF-L._AC_UY436_QL65_.jpg',
            'https://m.media-amazon.com/images/I/710VzyXGVsL._AC_UY436_QL65_.jpg',
            'https://m.media-amazon.com/images/I/61EPT-oMLrL._AC_UY436_QL65_.jpg',
            'https://m.media-amazon.com/images/I/71r3ktfakgL._AC_UY436_QL65_.jpg',
            'https://m.media-amazon.com/images/I/61CqYq+xwNL._AC_UL640_QL65_.jpg',
            'https://m.media-amazon.com/images/I/71cVOgvystL._AC_UL640_QL65_.jpg',
            'https://m.media-amazon.com/images/I/71E+oh38ZqL._AC_UL640_QL65_.jpg',
            'https://m.media-amazon.com/images/I/61uSHBgUGhL._AC_UL640_QL65_.jpg',
            'https://m.media-amazon.com/images/I/71nDK2Q8HAL._AC_UL640_QL65_.jpg'
        ];
        $arabicNames =[
            'غسيل',
            'مكيف',
            'مسحوق',
            'مكواة',
            'مشابك',
            'رف تجفيف',
            'منشر غسيل',
            'برسيل جيل',
            'معطر ملابس',
            'حبل'
        ];

        return [
            'name'         => ['en' => fake()->name() , 'ar' =>  $arabicNames[rand(0, 9)]],
            'description'  => fake()->sentence(5),
            'price'        => fake()->numberBetween(100,5000),
            'quantity'     => fake()->numberBetween(10,99),
            'size'         => fake()->numberBetween(10,99),
            'color'        => fake()->numberBetween(10,99),
            'image'        => $randomImages[rand(0, 10)],
            'category_id'  => Category::all()->random()->id, 
            'admin_id'     => Admin::all()->random()->id,
            'Approve'      => 1,           
        ];
    }
}
