<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_review', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('buyer_id')->nullable();
            $table->unsignedBigInteger('seller_id')->nullable();
            $table->foreign('buyer_id')->references('id')->on('tb_user')->onDelete('cascade');
            $table->foreign('seller_id')->references('id')->on('tb_user')->onDelete('cascade');
            $table->string('buyer_name',50);
            $table->string('buyer_picture',150);
            $table->string('service_date',20)->nullable();
            $table->string('review',512)->nullable();
            $table->string('rating',5)->nullable();
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
        Schema::dropIfExists('reviews');
    }
}
