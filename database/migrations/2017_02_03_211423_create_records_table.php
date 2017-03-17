<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordsTable extends Migration
{
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->increments('id');
            $table->text('data')->nullable();
            $table->integer('plot_no')->nullable();
            $table->text('block')->nullable();
            $table->string('category')->nullable();
            $table->text('contact')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('records');
    }
}
