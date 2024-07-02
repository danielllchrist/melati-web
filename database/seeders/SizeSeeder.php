<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i=0; $i < 10; $i++) {
            DB::table('sizes')->insert([
                'sizeID' => $faker->uuid,
                'productID' => Product::all()->random()->productID,
                'size' => $faker->randomElement(['S', 'M', 'L', 'XL']),
                'stock' => $faker->numberBetween(40, 100),
                'created_at' => $faker->dateTimeThisYear,
                'updated_at' => $faker->dateTimeThisYear,
            ]);
        }
    }
}
