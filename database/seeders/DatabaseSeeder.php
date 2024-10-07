<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            // 'password_confirmation' => Hash::make('admin123'),
        ]);

        $this->call([
            SatuanSeeder::class,
            AnggaranSeeder::class,
            ItemSeeder::class,
            ProyekSeeder::class,
            TransaksiSeeder::class,
            SupplierSeeder::class,
            ProductSeeder::class,
        ]);
    }

}
