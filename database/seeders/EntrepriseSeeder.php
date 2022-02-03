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
            ],
            [
                'nrTVA' => '987654321',
                'nomEntreprise' =>'Exemple entreprise 2',
                'activiteEntreprise' => 'IT2',
                'adresseEntreprise' => "Rue de l'exemple 12",
                'villeEntreprise' => 'Bruxelles',
                'paysEntreprise' => 'Belgique',
                'phoneEntreprise' => 'O485396686',
                'codePostalEntreprise' => 10002,
                'user_id' => 3,
                'persContactEmail' => 'persContEx@exemple2.be2',
                'persContactNom' => 'persContNom2',
                'persContactphone' => '04812345672'
            ],
            ]);
    }
}
