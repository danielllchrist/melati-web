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
        $users = User::all();
        $faker = Faker::create('id_ID');
        foreach ($users as $user) {
            for ($i = 0; $i < 3; $i++) {
                $sizeID = Size::all()->random()->sizeID;

                // Cek apakah kombinasi userID dan productID sudah ada
                $existingCart = DB::table('carts')->where('userID', $user->userID)->where('sizeID', $sizeID)->first();

                if (!$existingCart) {
                    DB::table('carts')->insert([
                        'userID' => $user->userID,
                        'sizeID' => $sizeID,
                        'quantity' => $faker->numberBetween(3, 7),
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
}
