<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i=0;$i<10;$i++){
            User::create([
                'username'=>$faker->name,
                'fname'=>$faker->firstname,
                'lname'=>$faker->lastname,
                'gender_id'=>rand(1,2),
                'age'=>rand(18,70),
                'phone'=>rand(9111111111,9999999999),
                'email'=>$faker->unique()->safeEmail,
                'address'=>$faker->address,
                'state'=>$faker->state,
                'rdate'=>now(),
                'terms'=>1,
                'newsletter'=>1,
                'promotions'=>1,
                'status'=>1,
                'email_verified_at'=>now(),
                'password'=>MD5('password')
            ]);
        }
    }
}
