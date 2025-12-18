<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table("users")->insert([
            [
                "name" => "Admin",
                "email" => "admin@gmail.com",
                "role" => "admin",
                "password" => bcrypt("password"),
                "phone" => "1234567890",
                "email_verified_at" => now(),
                "created_at"=> now(),
            ],
            [
                "name" => "User",
                "email" => "user@gmail.com",
                "role" => "user",
                "password" => bcrypt("password"),
                "phone"=> "1234567890",
                "email_verified_at" => now(),
                "created_at" => now(),
            ]
        ]);
    }
}
