<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
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
        $users = User::all();
        $faker = Faker::create('id_ID');
        foreach ($users as $user) {
            DB::table('addresses')->insert([
                'addressID' => $faker->uuid,
                'userID' => $user->userID,
                'nameAddress' => $faker->randomElement(['Rumah', 'Apartment', 'Ruko', 'Kantor', 'Toko']),
                'receiver' => $user->name,
                'phoneNum' => $user->phoneNum,
                'detailAddress' => $faker->address,
                'ward' => 3201140,
                'cityOrRegency' => 3201,
                'province' => 32,
                'description' => $faker->randomElement(['Awas ada anjing galak!', 'Rumahnya dekat ujung gang ya kak.', 'Titip di pos satpam.']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
