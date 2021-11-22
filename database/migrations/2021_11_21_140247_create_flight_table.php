<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('abbreviation');

            $table->timestamps();
            $table->softDeletes();

        });

        Schema::create('flights', function (Blueprint $table) {
            $table->id();

            $table->string('name',100);
            $table->string('minute')->nullable();
            $table->string('hour')->nullable();
            $table->string('departuretime')->nullable();
            $table->string('arrivaltime')->nullable();

            $table->unsignedBigInteger('countryFrom');
            $table->unsignedBigInteger('countryTo');

            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            
            $table->foreign("countryFrom")->references("id")->on("countries")->onDelete("restrict")->onUpdate('cascade');
            $table->foreign("countryTo")->references("id")->on("countries")->onDelete("restrict")->onUpdate('cascade');
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
        Schema::dropIfExists('flights');
    }
}
