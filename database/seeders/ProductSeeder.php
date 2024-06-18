<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i=0; $i < 100; $i++) {
            DB::table('products')->insert([
                'productID' => $faker->uuid,
                'productName' => $faker->name,
                'productPrice' => $faker->numberBetween(10000, 1000000),
                'productCategory' => $faker->randomElement(['Atasan', 'Bawahan', 'Aksesoris']),
                'productDescription' => $faker->text,
                'productWeight' => $faker->numberBetween(100, 5000),
                'productPicturePath' => json_encode('https://via.placeholder.com/800x600'),
                'forGender' => $faker->randomElement(['Pria', 'Wanita']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
