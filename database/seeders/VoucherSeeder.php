<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $voucherName = ['Gratis Ongkir', 'Promo Hari Batik Nasional', 'Diskon Rp 10,000.00', 'Diskon Pengguna Setia', 'Promo Batik Lovers'];
        $faker = Faker::create('id_ID');
        for ($i=0; $i < 5; $i++) {
            DB::table('vouchers')->insert([
                'voucherID' => $faker->uuid,
                'voucherName' => $voucherName[$i],
                'voucherNominal' => 10000,
                'startDate' => $faker->dateTimeBetween('2024-01-01', '2024-03-31')->format('Y-m-d'),
                'expiredDate' => $faker->dateTimeBetween('2024-10-01', '2024-12-31')->format('Y-m-d'),
                'minimumSpending' => 100000,
                'voucherQuantity' => 1000,
                'created_at' => $faker->dateTime,
                'updated_at' => $faker->dateTime,
            ]);
        }
    }
}
