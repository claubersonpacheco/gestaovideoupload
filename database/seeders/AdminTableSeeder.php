<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Caubinho Admin',
            'username' => 'caubinhopacheco',
            'email' => 'caubinho@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('cau12345'),
        ]);

        $user->assignRole('master');

        $user2 = User::create([
            'name' => 'User',
            'username' => 'usuarioteste',
            'mcode' => '',
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('cau12345'),
        ]);

        $user2->assignRole('user');
    }
}
