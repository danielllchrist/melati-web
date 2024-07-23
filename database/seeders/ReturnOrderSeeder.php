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

        $transactions = Transaction::where('statusID', 7)->get();

        foreach ($transactions as $transaction) {
            DB::table('return_orders')->insert([
                'transactionID' => $transaction->transactionID,
                'comment' => 'Barang rusak.',
                'created_at' => $transaction->updated_at,
                'updated_at' => $transaction->updated_at,
            ]);
        }
    }
}
