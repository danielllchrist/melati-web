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
        $users = User::all();
        $faker = Faker::create('id_ID');
        foreach ($users as $user) {
            for ($i = 0; $i < 3; $i++) {
                $productID = Product::all()->random()->productID;

                // Cek apakah kombinasi userID dan productID sudah ada
                $existingWishlist = DB::table('wishlists')->where('userID', $user->userID)->where('productID', $productID)->first();

                if (!$existingWishlist) {
                    DB::table('wishlists')->insert([
                        'userID' => $user->userID,
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
}
