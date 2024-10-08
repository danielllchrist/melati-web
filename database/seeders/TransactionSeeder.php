<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Status;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i = 0; $i < 20; $i++) {
            $userID = '';
            do {
                $userID = User::all()->random()->userID;
            }
            while ($userID == '01ee9554-9e84-367d-96ec-bf2a25b4cb3e' || $userID == '029ef8cd-7c30-3d78-a748-5ba3520cbb8b');
            DB::table('transactions')->insert([
                'userID' => $userID,
                'addressID' => Address::all()->random()->addressID,
                'voucherID' => Voucher::all()->random()->voucherID,
                'statusID' => Status::all()->random()->statusID,
                'subTotalPrice' => 0,
                'totalWeight' => 0,
                'totalDiscount' => 0,
                'shippingFee' => 15000,
                'paymentMethod' => $faker->randomElement(['Kartu Kredit', 'Transfer Bank', 'E-Wallet']),
                'totalPrice' => 0,
                'created_at' => $faker->dateTimeBetween('2024-01-01', '2024-08-12'),
                'updated_at' => Carbon::now(),
            ]);
        }
        for ($i = 0; $i < 10; $i++) {
            $userID = '';
            do {
                $userID = User::all()->random()->userID;
            }
            while ($userID == '01ee9554-9e84-367d-96ec-bf2a25b4cb3e' || $userID == '029ef8cd-7c30-3d78-a748-5ba3520cbb8b');
            DB::table('transactions')->insert([
                'userID' => $userID,
                'addressID' => Address::all()->random()->addressID,
                'voucherID' => Voucher::all()->random()->voucherID,
                'statusID' => 5,
                'subTotalPrice' => 0,
                'totalWeight' => 0,
                'totalDiscount' => 0,
                'shippingFee' => 15000,
                'paymentMethod' => $faker->randomElement(['Kartu Kredit', 'Transfer Bank', 'E-Wallet']),
                'totalPrice' => 0,
                'created_at' => $faker->dateTimeBetween('2021-01-01', '2024-01-01'),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
