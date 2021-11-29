<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airports', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->unsignedBigInteger('countries_id');

            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->foreign("created_by")->references("id")->on("passengers")->onDelete("restrict")->onUpdate('cascade');
            $table->foreign("updated_by")->references("id")->on("passengers")->onDelete("restrict")->onUpdate('cascade');
            $table->foreign("countries_id")->references("id")->on("countries")->onDelete("restrict")->onUpdate('cascade');
            
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
        Schema::dropIfExists('airports');
    }
}
