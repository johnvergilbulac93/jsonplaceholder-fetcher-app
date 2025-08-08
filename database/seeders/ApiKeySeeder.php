<?php

namespace Database\Seeders;

use App\Models\ApiKey;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ApiKeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ApiKey::truncate();
        ApiKey::create(['keys' => Str::random(50)]);
    }
}
