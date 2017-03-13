<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryCategoryImagesInnerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_category_images_inner', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gallery_category_images_id')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('images')->nullable();
            $table->string('size')->nullable();
            $table->string('frame_canvas')->nullable();
            $table->string('frame')->nullable();
            $table->string('price')->nullable();
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
        Schema::drop('gallery_category_images_inner');
    }
}
