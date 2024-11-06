<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = Admin::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@admin.com',
            'password' => bcrypt(env('ADMIN_PASS','jpr@FEB19')), // Replace with a secure password
            // 'mobile' => "00000000000", // Replace with a secure password
            // 'dob' => "2004-11-11", // Replace with a secure password
        ]);

        $superAdmin->assignRole('super-admin');
        $superAdmin->givePermissionTo('all');
    }
}
