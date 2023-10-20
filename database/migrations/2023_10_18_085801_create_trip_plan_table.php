<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripPlansTable extends Migration
{
    public function up()
    {
        Schema::create('trip_plan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('destination');
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedBigInteger('amount');
            $table->text('content')->nullable(); // 旅行の内容を保存するカラム
            $table->string('image_path')->nullable(); // 画像のパスを保存するカラム
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('trip_plan');
    }
}
