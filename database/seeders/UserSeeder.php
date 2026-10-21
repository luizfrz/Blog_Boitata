<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /** Cria o admin só se ADMIN_EMAIL e ADMIN_PASSWORD estiverem no .env (nada de senha no código). */
    public function run(): void
    {
        $email = env('ADMIN_EMAIL');
        $password = env('ADMIN_PASSWORD');

        if (! $email || ! $password) {
            $this->command?->warn('UserSeeder ignorado: defina ADMIN_EMAIL e ADMIN_PASSWORD no .env.');

            return;
        }

        User::firstOrCreate(['email' => $email], ['name' => 'Admin', 'password' => bcrypt($password)]);
    }
}
