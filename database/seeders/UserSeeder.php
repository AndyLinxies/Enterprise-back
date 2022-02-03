<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                "name" => "admin",
                "email"=> "linxies@gmail.com",
                "password"=>Hash::make('password')
            ],
            [
                "name" => "entreprise1",
                "email"=> "entreprise1@entreprise1.be",
                "password"=>Hash::make('entreprise1@entreprise1.be')
            ],
            [
                "name" => "entreprise2",
                "email"=> "entreprise2@entreprise2.be",
                "password"=>Hash::make('entreprise2@entreprise2.be')
            ],
        ]);
    }
}
