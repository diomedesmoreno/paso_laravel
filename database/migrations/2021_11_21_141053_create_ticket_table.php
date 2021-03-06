<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->string('status')->nullable();
            $table->decimal('number_passengers')->nullable();

            $table->unsignedBigInteger('passengers_id');
            $table->unsignedBigInteger('countries_id')->nullable();
            $table->unsignedBigInteger('flights_id');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            
            $table->foreign("flights_id")->references("id")->on("flights")->onDelete("restrict")->onUpdate('cascade');
            $table->foreign("passengers_id")->references("id")->on("passengers")->onDelete("restrict")->onUpdate('cascade');
            $table->foreign("countries_id")->references("id")->on("countries")->onDelete("restrict")->onUpdate('cascade');
            $table->foreign("created_by")->references("id")->on("passengers")->onDelete("restrict")->onUpdate('cascade');
            $table->foreign("updated_by")->references("id")->on("passengers")->onDelete("restrict")->onUpdate('cascade');

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
        Schema::dropIfExists('tickets');
    }
}
