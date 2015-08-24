<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOverbookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('overbookings', function (Blueprint $table) {

            $table->increments('id');
            $table->string('nome');
            $table->string('cognome');
            $table->string('data');
            $table->integer('telefono');
            $table->string('visita');
            $table->string('medicazione');
            $table->string('sala_gessi');
            $table->string('rx_prima');
            $table->string('rx_dopo');
            $table->string('prenotato_da');
            $table->timestamps('data_creazione');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('overbookings');

    }
}
