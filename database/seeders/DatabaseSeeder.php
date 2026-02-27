<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        //User::factory()->create([
        //    'name' => 'Test User',
        //    'email' => 'test@example.com',
        //]);

        \App\Models\User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'admin',
                'password' => \Illuminate\Support\Facades\Hash::make('admin'),
                'ville' => 'AdminCity',
                'CIN' => 'ADMIN01',
                'tel' => '0000000000',
                'address' => 'Admin Address',
            ]
        );

        $this->call([
            //productSeeder::class,
            Product2Seeder::class,
        ]);

    }
}
