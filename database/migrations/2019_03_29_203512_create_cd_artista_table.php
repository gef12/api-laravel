<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
//responsavel por unir cds e artistas
class CreateCdArtistaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cd_artista', function (Blueprint $table) {
            $table->integer('artista_id')->unsigned();
            $table->integer('cd_id')->unsigned();
            $table->foreign('artista_id')
                ->references('id')->on('artistas')
                ->onDelete('cascade');
            $table->foreign('cd_id')
                ->references('id')->on('cds')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cd_artista');
    }
}
