<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name" => "Nasredien Hussien",
            "email" => "zezack2211@gmail.com",
            "role" => UserRole::Admin,
            "password" => bcrypt("0902621113@m"),
        ]);
    }
}
