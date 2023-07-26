<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::factory()->create([
            'name' => 'Big Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin')
        ]);
        $admin->assignRole('Super Admin');

        $user = User::factory()->create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => Hash::make('user')
        ]);
        $user->assignRole('User');

        User::factory(3)->create();
    }
}
