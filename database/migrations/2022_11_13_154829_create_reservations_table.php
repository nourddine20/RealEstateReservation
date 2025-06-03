<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->integer('statu_id')->nullable();
            $table->integer('client_id')->nullable();
            $table->integer('lot_id')->nullable();
            $table->integer('commercial_id')->nullable();
            $table->integer('member_id')->nullable();
            $table->integer('avance')->default(0);
            $table->integer('reliquat')->default(0);
              $table->string('date_reservation')->nullable();
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
        Schema::dropIfExists('reservations');
    }
}
