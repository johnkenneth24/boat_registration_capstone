<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        if (!Role::where('name', 'admin')->exists()) {
            Role::create(['name' => 'admin']);
        }

        if (!Role::where('name', 'staff')->exists()) {
            Role::create(['name' => 'staff']);
        }

        if (!Role::where('name', 'user')->exists()) {
            Role::create(['name' => 'user']);
        }

        if (!User::where('username', 'admin')->first()) {
            $user = User::create([
                'name' => 'Municipal Agriculture Office',
                'username' => 'admin',
                'password' => Hash::make('admin1234'),
                'id_number' => 'BRIMS-001',
                'contact_no' => '09123456789',
            ]);
            $user->assignRole('admin');
        }

        if (!User::where('username', 'staff')->first()) {
            $user = User::create([
                'name' => 'Staff',
                'username' => 'staff',
                'password' => Hash::make('staff1234'),
                'id_number' => 'BRIMS-002',
                'contact_no' => '09123456790',
            ]);
            $user->assignRole('staff');
        }
    }
}
