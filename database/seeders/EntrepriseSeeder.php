<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntrepriseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('entreprises')->insert([
            [
                'nrTVA' => '123456789',
                'nomEntreprise' =>'Exemple entreprise',
                'activiteEntreprise' => 'IT',
                'adresseEntreprise' => "Rue de l'exemple 1",
                'villeEntreprise' => 'Bruxelles',
                'paysEntreprise' => 'Belgique',
                'phoneEntreprise' => 'O485396686',
                'codePostalEntreprise' => 1000,
                'user_id' => 2,
                'persContactEmail' => 'persContEx@exemple.be',
                'persContactNom' => 'persContNom',
                'persContactphone' => '0481234567'
            ]
            ]);
    }
}
