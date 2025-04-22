<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $brandName = Brand::pluck('brand_name');
        $brandId = Brand::pluck('id');
        $categoryName = Category::pluck('category_name');
        $categoryId = Category::pluck('id');
        $brandCtr=0;
        $categoryCtr=0;
        for($i=0;$i<5000;$i++){
            if($brandCtr == 598)
                $brandCtr=0;
            if($categoryCtr == 316)
                $categoryCtr=0;
            Product::create([
                'product_name'=>$brandName[$brandCtr].' '.$categoryName[$categoryCtr],
                'brand_id'=>$brandId[$brandCtr++],
                'category_id'=>$categoryId[$categoryCtr++],
                'weartype_id'=>rand(1,15),
                'gender_id'=>rand(1,2),
                'color_id'=>rand(1,291),
                'size_id'=>rand(1,7),
                'price'=>rand(2000,10000),
                'discount_id'=>rand(0,26),
                'description'=>substr($faker->paragraph, 0, 250),
                'image_url'=>'product-'.rand(1,8).'.jpg',
            ]);
        }
    }
}
