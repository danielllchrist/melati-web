<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Size;
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
        $productIDs = Product::pluck('productID')->toArray();

        for ($i = 1; $i <= 30; $i++) {
            $transactionID = $i;
            for ($j = 1; $j <= 5; $j++) {
                $productID = $faker->randomElement($productIDs);

                // Cek apakah kombinasi transactionID dan productID sudah ada
                $existingDetail = DB::table('transaction_details')
                    ->where('transactionID', $transactionID)
                    ->where('productID', $productID)
                    ->exists();

                if (!$existingDetail) {
                    $quantity = $faker->numberBetween(1, 10);
                    $price = $faker->numberBetween(100000, 1000000);
                    $weight = $faker->numberBetween(100, 5000);
                    DB::table('transaction_details')->insert([
                        'transactionID' => $transactionID,
                        'productID' => $productID,
                        'quantity' => $quantity,
                        'price' => $price,
                        'weight' => $weight,
                        'sizeID' => Size::all()->random()->sizeID,
                        'created_at' => $faker->dateTime,
                        'updated_at' => $faker->dateTime,
                    ]);

                    // update transaction
                    $transaction = Transaction::find('transactionID');
                    $transaction->subTotalPrice += $price * $quantity;
                    $transaction->totalWeight += $weight * $quantity;
                    $transaction->totalPrice += $price * $quantity;
                    $transaction->save();
                } else {
                    // Jika kombinasi transactionID dan productID sudah ada, lanjutkan ke iterasi berikutnya
                    $i--;
                }
            }
        }
    }
}
