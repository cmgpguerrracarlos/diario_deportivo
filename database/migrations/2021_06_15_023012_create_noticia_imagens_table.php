<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticiaImagensTable extends Migration
{
    // Si se saca la id del autor por el auth, talvez no se precisen estas referencias
    public function up()
    {
        Schema::create('noticia_imagens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_creador');
            $table->unsignedBigInteger('id_noticia');
            $table->foreign('id_noticia')->references('id')->on('noticia')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_creador')->references('id')->on('usuarios')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('noticia_imagens');
    }
}
