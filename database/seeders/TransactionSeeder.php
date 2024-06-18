<?php

namespace Database\Seeders;

use App\Models\Address;
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
        for ($i=0; $i < 100; $i++) {
            DB::table('transactions')->insert([
                'userID' => User::all()->random()->userID,
                'addressID' => Address::all()->random()->addressID,
                'voucherID' => Voucher::all()->random()->voucherID,
                'subTotalPrice' => $faker->numberBetween(100000, 1000000),
                'totalWeight' => $faker->numberBetween(100, 5000),
                'totalDiscount' => $faker->numberBetween(10000, 20000),
                'shippingFee' => $faker->numberBetween(10000, 20000),
                'totalPrice' => $faker->numberBetween(100000, 1000000),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
