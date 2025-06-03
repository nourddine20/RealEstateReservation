<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lots', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('commercial_id')->nullable();
            $table->string('commisson_com')->nullable();
            $table->integer('ilo_id')->nullable();
            $table->string('type_id')->nullable();
            $table->integer('surface')->nullable();
            $table->string('titre_foncier')->nullable();
            $table->string('hypotheque')->nullable();
            $table->integer('prix_m2')->nullable();
            $table->integer('prix_minimaum')->nullable();
            $table->integer('prix_vente')->nullable();
            $table->integer('avance')->nullable();
            $table->integer('reliquat')->nullable();
            $table->integer('statu_id')->nullable();
            $table->integer('lat')->nullable();
            $table->integer('len')->nullable();
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
        Schema::dropIfExists('lots');
    }
}