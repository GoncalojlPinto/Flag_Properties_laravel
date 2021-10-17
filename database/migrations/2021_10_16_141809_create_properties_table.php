<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('description', 255);
            $table->string('floor', 3);
            $table->string('type', 2);
            $table->unsignedTinyInteger('bedrooms')->unsigned();
            $table->unsignedTinyInteger('bathrooms')->unsigned();
            $table->string('location', 255);
            $table->unsignedInteger('price')->unsigned();
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
        Schema::dropIfExists('properties');
    }
}
