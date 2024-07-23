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
        $faker = Faker::create('id_ID');
        DB::table('users')->insert([
            [
                'userID' => '01ee9554-9e84-367d-96ec-bf2a25b4cb3e',
                'name' => 'Admin',
                'gender' => 'Wanita',
                'phoneNum' => '08122189892',
                'email' => 'admin@example.com',
                'age' => '20',
                'password' => bcrypt('password'),
                'profilePicturePath' => '/storage/uploads/daniel.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'remember_token' => Str::random(10),
            ],
            [
                'userID' => '029ef8cd-7c30-3d78-a748-5ba3520cbb8b',
                'name' => 'Shipping Service',
                'gender' => 'Pria',
                'phoneNum' => '08122189829',
                'email' => 'shippingservice@example.com',
                'age' => '20',
                'password' => bcrypt('password'),
                'profilePicturePath' => '/storage/uploads/daniel.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'remember_token' => Str::random(10),
            ],
            [
                'userID' => '48057d34-f68c-391d-a0ad-45b5429faccf',
                'name' => 'Daniel Christopher Santoso',
                'gender' => 'Pria',
                'phoneNum' => '08122189828',
                'email' => 'daniel@example.com',
                'age' => '20',
                'password' => bcrypt('password'),
                'profilePicturePath' => '/storage/uploads/daniel.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'remember_token' => Str::random(10),
            ],
            [
                'userID' => $faker->uuid(),
                'name' => 'Aryo Bintang Prabowo',
                'gender' => 'Pria',
                'phoneNum' => '081234567890',
                'email' => 'aryo@example.com',
                'age' => '25',
                'password' => bcrypt('password'),
                'profilePicturePath' => '/storage/uploads/aryo.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'remember_token' => Str::random(10),
            ],
            [
                'userID' => $faker->uuid(),
                'name' => 'Grace Setiaputri',
                'gender' => 'Wanita',
                'phoneNum' => '081234567891',
                'email' => 'grace@example.com',
                'age' => '23',
                'password' => bcrypt('password'),
                'profilePicturePath' => '/storage/uploads/grace.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'remember_token' => Str::random(10),
            ],
            [
                'userID' => $faker->uuid(),
                'name' => 'Ryan Christian Henlin',
                'gender' => 'Pria',
                'phoneNum' => '081234567892',
                'email' => 'ryan@example.com',
                'age' => '27',
                'password' => bcrypt('password'),
                'profilePicturePath' => '/storage/uploads/ryan.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'remember_token' => Str::random(10),
            ],
            [
                'userID' => $faker->uuid(),
                'name' => 'Ruth Timorah',
                'gender' => 'Wanita',
                'phoneNum' => '081234567893',
                'email' => 'ruth@example.com',
                'age' => '26',
                'password' => bcrypt('password'),
                'profilePicturePath' => '/storage/uploads/ruth.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'remember_token' => Str::random(10),
            ],
        ]);
    }
}
