<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i=0; $i < 10; $i++) {
            DB::table('addresses')->insert([
                'addressID' => $faker->uuid,
                'userID' => User::all()->random()->userID,
                'nameAddress' => $faker->randomElement(['Rumah', 'Kantor', 'Apartment']),
                'receiver' => $faker->name,
                'phoneNum' => $faker->phoneNumber,
                'detailAddress' => $faker->address,
                'ward' => $faker->streetName,
                'cityOrRegency' => $faker->city,
                'province' => $faker->state,
                'description' => $faker->text(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
