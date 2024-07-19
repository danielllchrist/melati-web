<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReturnOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // get the current count of transactionID
        $transactionID = Transaction::pluck('transactionID')->toArray();

        for ($i = 0; $i < 10; $i++) {
            $transactionID = $faker->randomNumber(1, 11);

            // Cek apakah kombinasi transactionID dan productID sudah ada
            $existingDetail = DB::table('return_orders')
                ->where('transactionID', $transactionID)
                ->exists();

            if (!$existingDetail) {
                DB::table('return_orders')->insert([
                    'transactionID' => $transactionID,
                    'comment' => $faker->sentence(),
                ]);
            } else {
                // Jika kombinasi transactionID dan productID sudah ada, lanjutkan ke iterasi berikutnya
                // $i--;
            }
        }
    }
}
