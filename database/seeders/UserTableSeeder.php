<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Clauberson pacheco',
            'email' => 'caubinho@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('cau12345'),
            'remember_token' => Str::random(10),
        ]);
    }
}
