<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePixelsTable extends Migration
{
    public function up()
    {
        Schema::create('pixels', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('x');
            $table->unsignedInteger('y');
            $table->string('color')->default('c');
            $table->unsignedBigInteger('canvas_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('canvas_id')->references('id')->on('pixels')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pixels');
    }
}
