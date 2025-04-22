<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Weartype;

class WearTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $weartype = array("Casual Wear",
                        "Formal Wear",
                        "Business/Office Wear",
                        "Sportswear/Athletic Wear",
                        "Party Wear",
                        "Ethnic/Traditional Wear",
                        "Loungewear",
                        "Outerwear",
                        "Swimwear",
                        "Seasonal Wear",
                        "Maternity Wear",
                        "Undergarments/Intimate Wear",
                        "Specialty Wear",
                        "Costume Wear",
                        "Resort Wear/Beachwear");

        for($i=0;$i<sizeof($weartype);$i++){
            Weartype::create([
                'weartypes_name'=>$weartype[$i]
            ]);
        }

    }
}
