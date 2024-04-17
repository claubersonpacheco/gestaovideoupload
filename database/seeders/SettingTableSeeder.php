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
            'moodleUrl' => 'http://ava.institutodeinteligencia.com.br/webservice/rest/server.php?'
        ]);
    }
}
