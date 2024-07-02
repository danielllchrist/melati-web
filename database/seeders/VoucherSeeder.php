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
        $faker = Faker::create('id_ID');
        for ($i=0; $i < 10; $i++) {
            DB::table('vouchers')->insert([
                'voucherID' => $faker->uuid,
                'voucherName' => $faker->word,
                'voucherNominal' => $faker->numberBetween(1000, 100000),
                'startDate' => $faker->date,
                'expiredDate' => $faker->date,
                'minimumSpending' => $faker->numberBetween(1000, 100000),
                'voucherQuantity' => $faker->numberBetween(100, 1000),
                'created_at' => $faker->dateTime,
                'updated_at' => $faker->dateTime,
            ]);
        }
    }
}
