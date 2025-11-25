<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'admin@laravel.com')->first();
        if (is_null($user)) {
            $user = new User;
            $user->name = 'Super Administrator';
            $user->email = 'admin@laravel.com';
            $user->password = bcrypt('admin123');
            $user->save();
        }


    }
}
