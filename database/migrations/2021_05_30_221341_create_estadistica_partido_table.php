<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadisticaPartidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estadistica_partido', function (Blueprint $table) {
            $table->id();
            $table->integer("goles")->nullable();
            $table->integer("posesion")->nullable();
            $table->integer("tirosTotales")->nullable();
            $table->integer("tirosPuerta")->nullable();
            $table->integer("corner")->nullable();
            $table->integer("offside")->nullable();
            $table->integer("faltas")->nullable();
            $table->integer("amarillas")->nullable();
            $table->integer("rojas")->nullable();
            $table->string("estado");
            $table->unsignedBigInteger("equipo_id");
            $table->unsignedBigInteger("partido_id");
            $table->foreign("equipo_id")->references("id")->on("equipos")->onDelete('cascade')->onUpdate('cascade');
            $table->foreign("partido_id")->references("id")->on("partidos")->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('estadistica_partido');
    }
}
