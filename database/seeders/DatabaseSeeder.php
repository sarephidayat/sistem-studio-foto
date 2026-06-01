<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\MasterDataSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            MasterDataSeeder::class,
        ]);
    }
}
