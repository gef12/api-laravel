<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCdGeneroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cd_genero', function (Blueprint $table) {
            $table->integer('genero_id')->unsigned();
            $table->integer('cd_id')->unsigned();
            $table->foreign('genero_id')
                ->references('id')->on('generos')
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
