<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoTourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phototour', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('location')->nullable();
            $table->string('images')->nullable();
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
        Schema::drop('phototours');
    }
}
