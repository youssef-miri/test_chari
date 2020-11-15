<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLignecommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lignecommandes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_comd')->unsigned()->nullable();
            $table->integer('id_art')->unsigned()->nullable();
            $table->integer('pu');
            $table->integer('qte');
            $table->integer('total');
            $table->foreign('id_comd')->references('id')->on('commandes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_art')->references('id')->on('articles')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('lignecommandes');
    }
}
