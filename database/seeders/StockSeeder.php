<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Stock;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=1346;$i<6345;$i++){
            Stock::create([
                'product_id'=>$i,
                'quantity'=>rand(0,10)
            ]);
        }
    }
}
