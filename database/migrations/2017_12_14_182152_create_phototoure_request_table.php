<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhototoureRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phototoure_request', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phototoure_id')->nullable();
            $table->string('name')->nullable();
            $table->string('lastname')->nullable();
            $table->longText('message')->nullable();
            $table->string('email')->nullable();
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
        Schema::drop('phototoure_request');
    }
}
