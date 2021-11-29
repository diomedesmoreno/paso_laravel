<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flight_reservations', function (Blueprint $table) {
            $table->id();

            $table->string('travelDateFrom')->nullable();
            $table->string('travelDateTo')->nullable();

            $table->unsignedBigInteger('passengers_id');
            $table->unsignedBigInteger('flights_id');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->foreign("created_by")->references("id")->on("passengers")->onDelete("restrict")->onUpdate('cascade');
            $table->foreign("updated_by")->references("id")->on("passengers")->onDelete("restrict")->onUpdate('cascade');
            $table->foreign("passengers_id")->references("id")->on("passengers")->onDelete("restrict")->onUpdate('cascade');
            $table->foreign("flights_id")->references("id")->on("flights")->onDelete("restrict")->onUpdate('cascade');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flight_reservations');
    }
}
