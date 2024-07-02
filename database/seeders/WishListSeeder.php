<?php
namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
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
        for ($i = 0; $i < 10; $i++) {
            $userID = User::all()->random()->userID;
            $productID = Product::all()->random()->productID;

            // Cek apakah kombinasi userID dan productID sudah ada
            $existingCart = DB::table('wishlists')->where('userID', $userID)->where('productID', $productID)->first();

            if (!$existingCart) {
                DB::table('wishlists')->insert([
                    'userID' => $userID,
                    'productID' => $productID,
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