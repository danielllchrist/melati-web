<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StatusTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i = 0; $i < 100; $i++) {
            $transactionID = Transaction::all()->random()->transactionID;
            $statusID = Status::all()->random()->statusID;

            // Cek apakah kombinasi transactionID dan statusID sudah ada
            $existingStatusTransaction = DB::table('status_transactions')->where('transactionID', $transactionID)->where('statusID', $statusID)->first();

            if (!$existingStatusTransaction) {
                DB::table('status_transactions')->insert([
                    'transactionID' => $transactionID,
                    'statusID' => $statusID,
                    'created_at' => $faker->dateTimeThisYear(),
                    'updated_at' => $faker->dateTimeThisYear(),
                ]);
            } else {
                // Jika kombinasi transactionID dan statusID sudah ada, kurangi nilai loop dan lanjutkan
                $i--;
            }
        }
    }
}
