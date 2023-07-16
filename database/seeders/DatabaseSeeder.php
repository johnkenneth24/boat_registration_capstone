<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (!User::where('email', 'admin@example.com')->first()) {
            $user = User::create([
                'name' => 'Municipal Agriculture Office',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('admin1234'),
                'id_number' => 'BRIMS-001',
                'contact_no' => '09123456789',
            ]);
        }

        if (!User::where('email', 'staff@example.com')->first()) {
            $user = User::create([
                'name' => 'Staff',
                'username' => 'staff',
                'email' => 'staff@gmail.com',
                'role' => 'staff',
                'password' => Hash::make('staff1234'),
                'id_number' => 'BRIMS-002',
                'contact_no' => '09123456790',
            ]);
        }
    }
}
