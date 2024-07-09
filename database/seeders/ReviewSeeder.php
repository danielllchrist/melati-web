<?php

namespace Database\Seeders;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $productIDs = Product::pluck('productID')->toArray();

        for ($i = 0; $i < 10; $i++) {
            $transactionID = $faker->numberBetween(1, 10);
            $productID = $faker->randomElement($productIDs);

            // Cek apakah kombinasi transactionID dan productID sudah ada
            $existingDetail = DB::table('reviews')
                ->where('transactionID', $transactionID)
                ->where('productID', $productID)
                ->exists();

            if (!$existingDetail) {
                DB::table('reviews')->insert([
                    'transactionID' => $transactionID,
                    'productID' => $productID,
                    'rating' => $faker->numberBetween(3, 5),
                    'comment' => $faker->sentence(),
                    'created_at' => $faker->dateTime,
                    'updated_at' => $faker->dateTime,
                ]);
            } else {
                // Jika kombinasi transactionID dan productID sudah ada, lanjutkan ke iterasi berikutnya
                $i--;
            }
        }
    }
}
