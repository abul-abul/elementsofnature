<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryCategoryImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_category_images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gallery_category_id')->nullable();
            $table->string('favourite')->nullable();
            $table->string('featured_images')->nullable();
            $table->string('images')->nullable();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('alt')->nullable();
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
        Schema::drop('gallery_category_images');
    }
}
