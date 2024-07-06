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
                'statusID' => 1,
                'statusName' => 'Menunggu Konfirmasi',
                'pic' => 'Admin',
            ],
            [
                'statusID' => 2,
                'statusName' => 'Sedang di Proses',
                'pic' => 'Admin',
            ],
            [
                'statusID' => 3,
                'statusName' => 'Dalam Pengiriman',
                'pic' => 'Jasa Kirim',
            ],
            [
                'statusID' => 4,
                'statusName' => 'Tiba di Tujuan',
                'pic' => 'Jasa Kirim',
            ],
            [
                'statusID' => 5,
                'statusName' => 'Penilaian',
                'pic' => 'Customer',
            ],
            [
                'statusID' => 6,
                'statusName' => 'Dibatalkan',
                'pic' => 'Customer',
            ],
            [
                'statusID' => 7,
                'statusName' => 'Dikembalikan',
                'pic' => 'Customer',
            ]
        ]);
    }
}
