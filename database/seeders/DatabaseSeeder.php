<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UserSeeder::class,
            ProductSeeder::class,
            StatusSeeder::class,
            AddressSeeder::class,
            VoucherSeeder::class,
            TransactionSeeder::class,
            VoucherUsageSeeder::class,
            ReviewSeeder::class,
            TransactionDetailSeeder::class,
            CartSeeder::class,
            StatusTransactionSeeder::class,
            SizeSeeder::class,
            WishListSeeder::class,
            ManageAssetSeeder::class,
            ManageLinkSeeder::class,
        ]);
    }
}
