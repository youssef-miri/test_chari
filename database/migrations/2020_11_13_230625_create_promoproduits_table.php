<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromoproduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promoproduits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_promo')->unsigned()->nullable();
            $table->integer('id_produit')->unsigned()->nullable();
            $table->integer('prix');
            $table->integer('prix_promo');
            $table->integer('pourcentage');
            $table->foreign('id_promo')->references('id')->on('promos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_produit')->references('id')->on('articles')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('promoproduits');
    }
}
