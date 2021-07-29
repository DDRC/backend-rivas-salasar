<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(env('DB_CONNECTION_APP'))->create('games', function (Blueprint $table) {
            $table->id();
            $table->foreignId('player_id')->constrained('app.players');
            $table->double('prize',3,2)
            ->unsigned()
            ->nullable()
            ->comment('precio del juego, con sintaxis 12,26');

            $table->string('state',30)
            ->comment('el estado el juego puede estar en desarrollo, fase de alpha, en mantenimiento');

            $table->string('owner',50)
            ->default('')
            ->comment('duño del juego si el estado esta comprado');

            $table->string('developer',30)
            ->comment('desarrolladora del juego');

            $table->string('genre',15)
            ->comment('genero del juego');

            $table->dateTime('releaseDate')
            ->comment('fecha de lanzamiento');

            $table->boolean('sold')
            ->comment('campo para saber si esta comprado o no');
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
        Schema::connection(env('DB_CONNECTION_APP'))->dropIfExists('games');
    }
}
