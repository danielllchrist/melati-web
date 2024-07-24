<?php

namespace Database\Seeders;

use App\Models\Size;
use App\Models\Product;
use App\Models\Transaction;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            // Setiap transaction punya 5 transactionDetail
            for ($j = 1; $j <= 5; $j++) {
                $productID = $faker->randomElement($productIDs);
                $sizeIDs = Size::where('productID', $productID)->pluck('sizeID')->toArray();
                // pick the random size
                $sizeID = $faker->randomElement($sizeIDs);

                // Check if there is a combination of transactionID and sizeID
                $existingDetail = DB::table('transaction_details')
                    ->where('transactionID', $transactionID)
                    ->where('sizeID', $sizeID)
                    ->first();

                if (!$existingDetail) {
                    $quantity = $faker->numberBetween(1, 10);
                    $price = $faker->numberBetween(100000, 1000000);
                    $weight = $faker->numberBetween(100, 5000);
                    DB::table('transaction_details')->insert([
                        'transactionID' => $transactionID,
                        'sizeID' => $sizeID,
                        'productID' => $productID,
                        'quantity' => $quantity,
                        'price' => $price,
                        'weight' => $weight,
                        'created_at' => $faker->dateTime,
                        'updated_at' => $faker->dateTime,
                    ]);

                    // update transaction
                    $transaction = Transaction::where('TransactionID', $transactionID)->first();
                    $transaction->subTotalPrice += $price * $quantity;
                    $transaction->totalWeight += $weight * $quantity;
                    $transaction->totalPrice += $price * $quantity;
                    $transaction->save();
                } else {
                    // Jika kombinasi transactionID dan productID sudah ada, lanjutkan ke iterasi berikutnya
                    $j--;
                }
            }
        }
    }
}
