<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'name' => 'Gestao IDI',
            'moodleToken' => '8e16d9ad4470a19e40fa0ed2ee25df73',
            'moodleUrl' => 'http://ava.institutodeinteligencia.com.br/webservice/rest/server.php?',
            'streamLibraryId' => '237372',
            'streamApiKey' => 'ba7efe5c-a1b0-4f19-994f08486f35-136c-4a56',
            'streamUserApiKey' => '5d43f0ce-83b4-418f-abf1-232c70a016d33d3fc5c7-ba09-4ece-a22d-59faca9ee22c',
        ]);
    }
}
