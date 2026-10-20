<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(['email' => 'admin@boitata.test'], ['name' => 'Admin', 'password' => bcrypt('password')]);
    }
}
