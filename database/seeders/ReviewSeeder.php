<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Transaction;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $transactionToReview = Transaction::where('statusID', 5)->get();

        // enumerate foreach
        foreach ($transactionToReview as $transaction) {
            $transactionDetail = TransactionDetail::where('transactionID', $transaction->transactionID)->get();
            foreach ($transactionDetail as $detail) {
                $existingReview = DB::table('reviews')->where('productID', $detail->productID)->where('transactionID', $detail->transactionID)->first();
                if (!$existingReview) {
                    $comment = $faker->text(100);
                    $rating = $faker->numberBetween(1, 5);
                    DB::table('reviews')->insert([
                        'productID' => $detail->productID,
                        'transactionID' => $detail->transactionID,
                        'rating' => $rating,
                        'comment' => $comment,
                        'created_at' => $faker->dateTime,
                        'updated_at' => $faker->dateTime,
                    ]);
                }
                else{
                    Log::info('duplikat');
                }
            }
        }
    }
}
