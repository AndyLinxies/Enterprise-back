<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntreprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entreprises', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nrTVA');
            $table->string('nomEntreprise');
            $table->string('activiteEntreprise');
            $table->string('adresseEntreprise');
            $table->string('villeEntreprise');
            $table->string('paysEntreprise');
            $table->string('phoneEntreprise');
            $table->integer('codePostalEntreprise');
            //L'entreprise est aussi un user
            $table->foreignId('user_id')->constrained();
            //Personne de contact
            $table->string('persContactEmail');
            $table->string('persContactNom');
            $table->string('persContactphone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entreprises');
    }
}
