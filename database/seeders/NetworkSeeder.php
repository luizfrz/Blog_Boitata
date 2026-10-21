<?php

namespace Database\Seeders;

use App\Models\Network;
use Illuminate\Database\Seeder;

class NetworkSeeder extends Seeder
{
    public function run(): void
    {
        Network::firstOrCreate(['url' => 'https://github.com/BoitataLabs'], ['name' => 'GitHub — BoitataLabs/Boitat--blog', 'icon' => 'github', 'sort' => 1]);
    }
}
