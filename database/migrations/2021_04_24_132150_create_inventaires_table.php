<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventaires', function (Blueprint $table) {
            $table->id();
            // ->unique()
            $table->string('nomcoord');
            $table->string('nomusager');
            $table->string('contactusager');
            // $table->string('ncni')->unique();
            $table->string('dateinv');
            $table->string('lieuenlev');
            $table->string('marque');
            $table->string('genre');
            $table->string('panne');
            // $table->string('immatricule')->unique();
            $table->string('immatricule');
            $table->unsignedBigInteger('parc_id')->index();
            $table->unsignedBigInteger('prix');
            // $table->unsignedbigInteger('avance');
            // $table->boolean('status');

            $table->foreign('parc_id')->references('id')->on('parcs');
            $table->timestamps();
              // $table->string('couleur');
            // $table->string('carrosserie');
            // $table->string('energie');
            // $table->string('placeassise');
            // $table->string('usagevehicule');
            // $table->string('puissancefiscal');
            // $table->string('nombressieux');
            // $table->string('cylindre');
            // $table->string('ptac');
            // $table->string('pv');
            // $table->string('cu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventaires');
    }
}
