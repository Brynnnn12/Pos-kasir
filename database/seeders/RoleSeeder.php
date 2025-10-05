<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * membuat role Admin dan User
         */
        $roles = ['Admin', 'Kasir'];

        foreach ($roles as $role) {
            \Spatie\Permission\Models\Role::create(['name' => $role]);
        }

        /**
         * membuat user admin
         */
        $admin = \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@pos.com',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole('Admin');

        /**
         * membuat user biasa
         */
        $user = \App\Models\User::create([
            'name' => 'Kasir',
            'email' => 'kasir@pos.com',
            'password' => bcrypt('password'),
        ]);
        $user->assignRole('Kasir');
    }
}
