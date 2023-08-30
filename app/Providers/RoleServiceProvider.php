<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Role;

class RoleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
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
    }
}
