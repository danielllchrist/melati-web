<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'userID' => '01ee9554-9e84-367d-96ec-bf2a25b4cb3e',
            'name' => 'Admin',
            'gender' => 'Pria',
            'phoneNum' => '08122189892',
            'email' => 'admin@example.com',
            'age' => '20',
            'password' => bcrypt('password'),
            'profilePicturePath' => json_encode('https://via.placeholder.com/800x600'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'remember_token' => Str::random(10),
        ]);
        DB::table('users')->insert([
            'userID' => '029ef8cd-7c30-3d78-a748-5ba3520cbb8b',
            'name' => 'Shipping Service',
            'gender' => 'Pria',
            'phoneNum' => '08122189829',
            'email' => 'shippingservice@example.com',
            'age' => '20',
            'password' => bcrypt('password'),
            'profilePicturePath' => json_encode('https://via.placeholder.com/800x600'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'remember_token' => Str::random(10),
        ]);
        $faker = Faker::create('id_ID');
        for ($i=0; $i < 100; $i++) {
            DB::table('users')->insert([
                'userID' => $faker->uuid,
                'name' => $faker->name,
                'gender' => $faker->randomElement(['Pria', 'Wanita']),
                'phoneNum' => $faker->phoneNumber,
                'email' => $faker->safeEmail(),
                'age' => $faker->numberBetween(12, 60),
                'password' => bcrypt('password'),
                'profilePicturePath' => json_encode('https://via.placeholder.com/800x600'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'remember_token' => Str::random(10),
            ]);
        }
    }
}
