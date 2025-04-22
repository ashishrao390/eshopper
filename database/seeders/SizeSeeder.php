<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Size;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sizes = array('XS','S','M','L','XL','XXL','XXXL');
        for($i=0;$i<sizeof($sizes);$i++){
            Size::create([
                'size_label' => $sizes[$i],
            ]);
        }
    }
}
