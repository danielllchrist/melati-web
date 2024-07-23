<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Voucher;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VoucherUsageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // disini update total discount dan total price nya
        $faker = Faker::create('id_ID');
        for ($i = 0; $i < 5; $i++) {
            $userID = User::all()->random()->userID;
            $voucherID = Voucher::all()->random()->voucherID;
            // Cek apakah kombinasi voucherID dan productID sudah ada
            $existingCart = DB::table('voucher_usages')->where('userID', $userID)->where('voucherID', $voucherID)->first();

            if (!$existingCart) {
                DB::table('voucher_usages')->insert([
                    'voucherID' => $voucherID,
                    'userID' => $userID,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
                $voucher = Voucher::find($voucherID);
                $voucher->voucherQuantity -= 1;
            } else {
                // Jika kombinasi userID dan productID sudah ada, kurangi nilai loop dan lanjutkan
                $i--;
            }
        }
        for ($i = 0; $i < 3; $i++) {
            $userID = '01ee9554-9e84-367d-96ec-bf2a25b4cb3e';
            $voucherID = Voucher::all()->random()->voucherID;

            // Cek apakah kombinasi voucherID dan productID sudah ada
            $existingCart = DB::table('voucher_usages')->where('userID', $userID)->where('voucherID', $voucherID)->first();

            if (!$existingCart) {
                DB::table('voucher_usages')->insert([
                    'voucherID' => $voucherID,
                    'userID' => $userID,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
                $voucher = Voucher::find($voucherID);
                $voucher->voucherQuantity -= 1;
            } else {
                // Jika kombinasi userID dan productID sudah ada, kurangi nilai loop dan lanjutkan
                $i--;
            }
        }
    }
}
