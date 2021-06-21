<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccionPartidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accion_partido', function (Blueprint $table) {
            $table->id();
            $table->string("accion");
            $table->integer("minuto");
            $table->unsignedBigInteger("jugador_id");
            $table->unsignedBigInteger("partido_id");
            $table->foreign("jugador_id")->references("id")->on("jugadors")->onDelete("cascade")->onUpdate('cascade');
            $table->foreign("partido_id")->references("id")->on("partidos")->onDelete("cascade")->onUpdate('cascade');
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
        Schema::dropIfExists('accion_partido');
    }
}
