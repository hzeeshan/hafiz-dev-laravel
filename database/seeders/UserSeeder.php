<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Hafiz Riaz',
            'email' => 'hafizzeeshan619@gmail.com',
            'password' => Hash::make('qwertyuiop'),
            'email_verified_at' => now(),
        ]);

        $this->command->info('✅ Created user: hafizzeeshan619@gmail.com');
    }
}
