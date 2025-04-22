<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Discount;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $occasions = [
            ["Makar Sankranti", "2020-01-14", "2020-01-14"],
            ["Pongal", "2020-01-14", "2020-01-17"],
            ["Republic Day", "2020-01-26", "2020-01-26"],
            ["Vasant Panchami", "2020-01-29", "2020-01-29"],
            ["Maha Shivaratri", "2020-02-21", "2020-02-21"],
            ["Holi", "2020-03-09", "2020-03-10"],
            ["Ugadi", "2020-03-25", "2020-03-25"],
            ["Gudi Padwa", "2020-03-25", "2020-03-25"],
            ["Ram Navami", "2020-04-02", "2020-04-02"],
            ["Baisakhi", "2020-04-13", "2020-04-14"],
            ["Mahavir Jayanti", "2020-04-06", "2020-04-06"],
            ["Good Friday", "2020-04-10", "2020-04-10"],
            ["Eid al-Fitr", "2020-05-23", "2020-05-24"],
            ["Buddha Purnima", "2020-05-07", "2020-05-07"],
            ["Raksha Bandhan", "2020-08-03", "2020-08-03"],
            ["Independence Day", "2020-08-15", "2020-08-15"],
            ["Janmashtami", "2020-08-11", "2020-08-12"],
            ["Ganesh Chaturthi", "2020-08-22", "2020-08-22"],
            ["Onam", "2020-08-22", "2020-09-02"],
            ["Navratri", "2020-10-17", "2020-10-25"],
            ["Dussehra/Vijayadashami", "2020-10-25", "2020-10-26"],
            ["Karva Chauth", "2020-11-04", "2020-11-04"],
            ["Diwali", "2020-11-14", "2020-11-14"],
            ["Bhai Dooj", "2020-11-16", "2020-11-16"],
            ["Guru Nanak Jayanti", "2020-11-30", "2020-11-30"],
            ["Christmas", "2020-12-25", "2020-12-25"],
        ];        
        for($i=0;$i<sizeof($occasions);$i++){
            Discount::create([
                'discount_label' => $occasions[$i][0],
                'discount_percentage' => rand(10,25),
                'start_date' => $occasions[$i][1],
                'end_date' => $occasions[$i][2],
            ]);
        }

    }
}
