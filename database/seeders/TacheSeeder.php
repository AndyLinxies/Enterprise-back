<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TacheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('taches')->insert([
            [
                'tache' =>'Commencer à travailler',
                'done' => 0,
                'entreprise_id'=>1,
                
            ],
            [
                'tache' =>'Faire la réunion',
                'done' => 1,
                'entreprise_id'=>1,
                
            ],
            [
                'tache' =>'Coder',
                'done' => 0,
                'entreprise_id'=>2,
                
            ],
            [
                'tache' =>'Appeler les clients',
                'done' => 1,
                'entreprise_id'=>2,
                
            ],
        ]);
    }
}
