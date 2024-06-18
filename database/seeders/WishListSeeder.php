<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class WishListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i=0; $i < 100; $i++) {
            DB::table('wishlists')->insert([
                'userID' => User::all()->random()->userID,
                'productID' => Product::all()->random()->productID,
                'created_at' => $faker->dateTimeThisYear,
                'updated_at' => $faker->dateTimeThisYear,
            ]);
        }
    }
}
