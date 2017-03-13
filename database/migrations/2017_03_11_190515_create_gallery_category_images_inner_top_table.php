<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryCategoryImagesInnerTopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_category_images_inner_top', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gallery_category_images_inner_id')->nullable();
            $table->string('description')->nullable();
            $table->string('images1')->nullable();
            $table->string('images2')->nullable();
            $table->string('alt1')->nullable();
            $table->string('alt2')->nullable();
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
        Schema::drop('gallery_category_images_inner_top');
    }
}
