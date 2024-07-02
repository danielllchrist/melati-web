<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i = 0; $i < 10; $i++) {
            $userID = User::all()->random()->userID;
            $productID = Product::all()->random()->productID;

            // Cek apakah kombinasi userID dan productID sudah ada
            $existingCart = DB::table('carts')->where('userID', $userID)->where('productID', $productID)->first();

            if (!$existingCart) {
                DB::table('carts')->insert([
                    'userID' => $userID,
                    'productID' => $productID,
                    'quantity' => $faker->numberBetween(1, 10),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            } else {
                // Jika kombinasi userID dan productID sudah ada, kurangi nilai loop dan lanjutkan
                $i--;
            }
        }
    }
}