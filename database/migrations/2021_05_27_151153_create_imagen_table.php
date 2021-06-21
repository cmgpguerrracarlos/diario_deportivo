<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagenTable extends Migration
{
    public function up()
    {
        Schema::create('imagen', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
        // Esta es para dejarlo como base64 envez de una direccion en el servidor
        // DB::statement("ALTER TABLE noticia ADD direccion MEDIUMBLOB");
    }

    public function down()
    {
        Schema::dropIfExists('imagen');
    }
}
