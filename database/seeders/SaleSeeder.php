<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sale;
use App\Models\Product;
use App\Models\Discount;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for($i=2000;$i<5000;$i++){
            $prod = Product::where('id',$i)->first();
            $disc = rand(1,26);
            $discRow = Discount::where('id',$disc)->first();
            Sale::create([
                'user_id'=>rand(1,10),
                'product_id'=>$i,
                'discount_id'=>$disc,
                'quantity'=>rand(1,4),
                'actual_price'=>$prod->price,
                'sales_price'=>$prod->price - (($prod->price*$discRow->discount_percentage)/100),
            ]);
        }
    }
}
