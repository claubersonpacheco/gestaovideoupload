<?php

namespace Database\Seeders;

use App\Models\Folder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FolderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Folder::create([
            'name' => 'Default',
        ]);
    }
}
