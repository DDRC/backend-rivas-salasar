<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppPlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(env('DB_CONNECTION_APP'))->create('players', function (Blueprint $table) {
            $table->id();
            $table->string('name',40)
            ->comment('nombre completo del jugador');

            $table->string('nickname',20)
            ->comment('apodo del jugador');

            $table->string('status',15)
            ->comment('estado del jugador, puede ser conectado, desconectado,en juego');

            $table->string('gameslist',500)
            ->comment('la lista de juegos del jugador');

            $table->string('stadistics',500)
            ->comment('estadisticas del jugador');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection(env('DB_CONNECTION_APP'))->dropIfExists('players');
    }
}
