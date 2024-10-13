<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::count()) {
            return;
        }

        User::create([
            'id' => 1,
            'name' => 'Test User',
            'email' => 'user@example.com',
            'password' => Hash::make('123123123'),
            'balance' => 150,
        ]);
    }
}
