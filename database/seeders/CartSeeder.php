<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Size;
use App\Models\User;
use App\Models\Product;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i = 0; $i < 10; $i++) {
            // $userID = User::all()->random()->userID;
            $userID = '01ee9554-9e84-367d-96ec-bf2a25b4cb3e';
            $sizeID = Size::all()->random()->sizeID;

            // Cek apakah kombinasi userID dan productID sudah ada
            $existingCart = DB::table('carts')->where('userID', $userID)->where('sizeID', $sizeID)->first();

            if (!$existingCart) {
                DB::table('carts')->insert([
                    'userID' => $userID,
                    'sizeID' => $sizeID,
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
