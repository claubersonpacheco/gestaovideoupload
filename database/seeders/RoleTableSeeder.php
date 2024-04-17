<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'master', 'mcode' => '0']);
        Role::create(['name' => 'manager', 'mcode' => '1']);
        Role::create(['name' => 'coursecreator', 'mcode' => '2']);
        Role::create(['name' => 'editingteacher', 'mcode' => '3']);
        Role::create(['name' => 'teacher', 'mcode' => '4']);
        Role::create(['name' => 'student', 'mcode' => '5']);
        Role::create(['name' => 'guest', 'mcode' => '6']);
        Role::create(['name' => 'user', 'mcode' => '7']);
        Role::create(['name' => 'frontpage', 'mcode' => '8']);
    }
}


