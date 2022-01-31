<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
            [
                "message"=>"Hello admin, I have a problelm !",
                //Entreprise 1
                "entreprise_id"=>1,
                //User 1 = admin
                "user_id"=>1,
                "sender"=>2
            ],
            [
                "message"=>"Hi. What is your problem ?",
                "entreprise_id"=>1,
                "user_id"=>1,
                "sender"=>1
            ],
                [
                    "message"=>"there is a bug on the website",
                    "entreprise_id"=>1,
                    "user_id"=>1,
                    "sender"=>2

                ],
        ]);
    }
}
