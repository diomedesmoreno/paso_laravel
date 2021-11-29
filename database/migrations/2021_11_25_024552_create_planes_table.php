<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planes', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('description')->nullable();
            $table->decimal('seating');
            
            $table->unsignedBigInteger('types_planes_id');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->foreign("types_planes_id")->references("id")->on("types_planes")->onDelete("restrict")->onUpdate('cascade');
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
        Schema::dropIfExists('planes');
    }
}
