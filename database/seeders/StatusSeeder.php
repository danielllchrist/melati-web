<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        DB::table('statuses')->insert([
            [
                'statusID' => $faker->uuid,
                'statusName' => 'Menunggu Konfirmasi',
                'pic' => 'Admin',
            ],
            [
                'statusID' => $faker->uuid,
                'statusName' => 'Sedang di Proses',
                'pic' => 'Admin',
            ],
            [
                'statusID' => $faker->uuid,
                'statusName' => 'Dalam Pengiriman',
                'pic' => 'Jasa Kirim',
            ],
            [
                'statusID' => $faker->uuid,
                'statusName' => 'Tiba di Tujuan',
                'pic' => 'Jasa Kirim',
            ],
            [
                'statusID' => $faker->uuid,
                'statusName' => 'Penilaian',
                'pic' => 'Admin',
            ],
        ]);
    }
}
