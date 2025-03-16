<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        Admin::truncate();
        Category::truncate();
        Product::truncate();
        Admin::factory(1)->create();
        // First Category and its Products
        $randomImages1 =[
            'https://m.media-amazon.com/images/I/41WpqIvJWRL._AC_UY436_QL65_.jpg',
            'https://m.media-amazon.com/images/I/61ghDjhS8vL._AC_UY436_QL65_.jpg',
            'https://m.media-amazon.com/images/I/61c1QC4lF-L._AC_UY436_QL65_.jpg',
            'https://m.media-amazon.com/images/I/710VzyXGVsL._AC_UY436_QL65_.jpg',
            'https://m.media-amazon.com/images/I/61EPT-oMLrL._AC_UY436_QL65_.jpg',
        ];
        $arabicNames =[
            'غسيل',
            'مكيف',
            'مسحوق',
            'مكواة',
            'مشابك',
        ];
        $cat1 = Category::factory()->create([
                 'name' => ['en' => 'Electronics', 'ar' => 'إلكترونيات'],
                 'description' => 'Electronics category'       
                ]);
        for($i=1 ; $i <=20 ; $i++){
          Product::factory()->create([
            'name'         => ['en' => fake()->name() , 'ar' =>  $arabicNames[rand(0, 4)]],
            'description'  => fake()->sentence(5),
            'price'        => fake()->numberBetween(100,5000),
            'quantity'     => fake()->numberBetween(10,99),
            'size'         => fake()->numberBetween(10,99),
            'color'        => fake()->numberBetween(10,99),
            'image'        => $randomImages1[rand(0, 4)],
            'category_id'  => $cat1->id, 
            'admin_id'     => Admin::all()->random()->id,
            'Approve'      => 1,           
          ]);
        }
        // Second Category and its Products
        $randomImages2 = [
            'https://m.media-amazon.com/images/I/61gEQ5Tv3qL._AC_SX679_.jpg',
            'https://m.media-amazon.com/images/I/41JvTBkw6UL._AC_SY679_.jpg',
            'https://m.media-amazon.com/images/I/31AFsgaZPaL._AC_SY679_.jpg',
            'https://m.media-amazon.com/images/I/71XFRBQMVQL._AC_SY741_.jpg',
            'https://m.media-amazon.com/images/I/81-jxE9pcLL._AC_SX679_.jpg',
            'https://m.media-amazon.com/images/I/51rDNm7uBWL._AC_SY500_.jpg'
        ];
        $cat2 = Category::factory()->create([
            'name' => ['en' => 'colthes', 'ar' => 'ملابس'],
            'description' => 'clothes category'       
        ]);
        for($i=1 ; $i <=20 ; $i++){
          Product::factory()->create([
            'name'         => ['en' => fake()->name() , 'ar' =>  $arabicNames[rand(0, 4)]],
            'description'  => fake()->sentence(5),
            'price'        => fake()->numberBetween(100,5000),
            'quantity'     => fake()->numberBetween(10,99),
            'size'         => fake()->numberBetween(10,99),
            'color'        => fake()->numberBetween(10,99),
            'image'        => $randomImages2[rand(0, 5)],
            'category_id'  => $cat2->id, 
            'admin_id'     => Admin::all()->random()->id,
            'Approve'      => 1,           
          ]);
        }
        // Third Category and its Products
        $randomImages3 = [
            'https://m.media-amazon.com/images/I/51wa+OHY9OL._AC_UL480_FMwebp_QL65_.jpg',
            'https://m.media-amazon.com/images/I/61zPxWcy6FL._AC._SR360,460.jpg',
            'https://m.media-amazon.com/images/I/81NFdwAE0EL._AC._SR360,460.jpg',
            'https://m.media-amazon.com/images/I/61V+3+08bmL._AC_UL480_QL65_.jpg',
            'https://m.media-amazon.com/images/I/61o3uiGZp2L._AC_UL480_FMwebp_QL65_.jpg'
        ];
        $cat3 = Category::factory()->create([
            'name' => ['en' => 'toys', 'ar' => 'ألعاب'],
            'description' => 'toys category'       
        ]);
        for($i=1 ; $i <=20 ; $i++){
          Product::factory()->create([
            'name'         => ['en' => fake()->name() , 'ar' =>  $arabicNames[rand(0, 4)]],
            'description'  => fake()->sentence(5),
            'price'        => fake()->numberBetween(100,5000),
            'quantity'     => fake()->numberBetween(10,99),
            'size'         => fake()->numberBetween(10,99),
            'color'        => fake()->numberBetween(10,99),
            'image'        => $randomImages3[rand(0, 4)],
            'category_id'  => $cat3->id, 
            'admin_id'     => Admin::all()->random()->id,
            'Approve'      => 1,           
          ]);
        }
        // Fourth Category and its Products
        $randomImages4 = [
            'https://m.media-amazon.com/images/I/61Ww2oqvbLL._AC_UL480_QL65_.jpg',
            'https://m.media-amazon.com/images/I/51Ikxj6QTIL._AC_UL480_QL65_.jpg',
            'https://m.media-amazon.com/images/I/710t69feAML._AC_UL480_QL65_.jpg',
            'https://m.media-amazon.com/images/I/41LruIHspoL._AC_UL480_FMwebp_QL65_.jpg',
            'https://m.media-amazon.com/images/I/717EcTE1dtL._AC_UL480_FMwebp_QL65_.jpg'
        ];
        $cat4 = Category::factory()->create([
            'name' => ['en' => 'perfumes', 'ar' => 'العطور'],
            'description' => 'perfumes category'       
        ]);
        for($i=1 ; $i <=20 ; $i++){
          Product::factory()->create([
            'name'         => ['en' => fake()->name() , 'ar' =>  $arabicNames[rand(0, 4)]],
            'description'  => fake()->sentence(5),
            'price'        => fake()->numberBetween(100,5000),
            'quantity'     => fake()->numberBetween(10,99),
            'size'         => fake()->numberBetween(10,99),
            'color'        => fake()->numberBetween(10,99),
            'image'        => $randomImages4[rand(0, 4)],
            'category_id'  => $cat4->id, 
            'admin_id'     => Admin::all()->random()->id,
            'Approve'      => 1,           
          ]);
        }

        


        //User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
