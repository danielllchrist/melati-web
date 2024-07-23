<?php

namespace Database\Seeders;

use App\Models\Product;
use Carbon\Carbon;
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
        $products = Product::all();
        foreach ($products as $product) {
            DB::table('sizes')->insert([
                [
                    'sizeID' => $faker->uuid,
                    'productID' => $product->productID,
                    'size' => 'S',
                    'stock' => 1000,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'sizeID' => $faker->uuid,
                    'productID' => $product->productID,
                    'size' => 'M',
                    'stock' => 1000,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'sizeID' => $faker->uuid,
                    'productID' => $product->productID,
                    'size' => 'L',
                    'stock' => 1000,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'sizeID' => $faker->uuid,
                    'productID' => $product->productID,
                    'size' => 'XL',
                    'stock' => 1000,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ]);
        }
    }
}
