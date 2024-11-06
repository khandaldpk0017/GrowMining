<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdminRole = Role::create(['guard_name' => 'admin','name' => 'super-admin']);
        $adminRole = Role::create(['guard_name' => 'admin','name' => 'admin']);
        $editorRole = Role::create(['guard_name' => 'admin','name' => 'editor']);

        // Permissions
        Permission::create(['guard_name' => 'admin','name' => 'manage users']);
        Permission::create(['guard_name' => 'admin','name' => 'edit roles']);
        Permission::create(['guard_name' => 'admin','name' => 'add users']);
        Permission::create(['guard_name' => 'admin','name' => 'view users']);
        Permission::create(['guard_name' => 'admin', 'name' => 'update users']);
        Permission::create(['guard_name' => 'admin', 'name' => 'delete users']);
        Permission::create(['guard_name' => 'admin', 'name' => 'all']);

        // Assign permissions to roles
        $superAdminRole->givePermissionTo(Permission::all());
        $adminRole->givePermissionTo(['manage users', 'view users']);
        $editorRole->givePermissionTo('view users');
    }
}
