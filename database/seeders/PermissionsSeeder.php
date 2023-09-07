<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'Kepala Dinas']);
        $role3 = Role::create(['name' => 'Kepala Desa']);
        $role4 = Role::create(['name' => 'user']);
        
        $user = \App\Models\User::factory()->create([
            'name' => 'Tewoll',
            'email' => 'tewollart@gmail.com',
        ]);
        $user->assignRole($role1);
        
    }
}
