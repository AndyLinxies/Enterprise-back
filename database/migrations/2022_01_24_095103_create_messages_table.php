<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->longText('message');
            //L'utilisateur qui envoie le message
            $table->foreignId('entreprise_id')->constrained('entreprises');
            //L'admin
            $table->bigInteger('user_id')->default(1);
            //Celui qui envoit le message
            $table->integer('sender');
            $table->timestamp('sentAt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
