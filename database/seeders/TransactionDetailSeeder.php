<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TransactionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i = 0; $i < 100; $i++) {
            $transactionID = Transaction::all()->random()->transactionID;
            $productID = Product::all()->random()->productID;

            // Cek apakah kombinasi transactionID dan productID sudah ada
            $existingDetail = DB::table('transaction_details')->where('transactionID', $transactionID)->where('productID', $productID)->first();

            if (!$existingDetail) {
                DB::table('transaction_details')->insert([
                    'transactionID' => $transactionID,
                    'productID' => $productID,
                    'quantity' => $faker->numberBetween(1, 10),
                    'price' => $faker->numberBetween(100000, 1000000),
                    'weight' => $faker->numberBetween(100, 5000),
                    'created_at' => $faker->dateTime,
                    'updated_at' => $faker->dateTime,
                ]);
            } else {
                // Jika kombinasi transactionID dan productID sudah ada, kurangi nilai loop dan lanjutkan
                $i--;
            }
        }
    }
}