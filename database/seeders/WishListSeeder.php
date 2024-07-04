<?php
namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
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
        for ($i = 0; $i < 100; $i++) {
            $userID = User::all()->random()->userID;
            $productID = Product::all()->random()->productID;

            $existingWishlist = DB::table('wishlists')->where('userID', $userID)->where('productID', $productID)->first();

            if (!$existingWishlist) {
                DB::table('wishlists')->insert([
                    'userID' => $userID,
                    'productID' => $productID,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            } else {
                $i--;
            }
        }
    }
}
