<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_admin', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type')->default('admin');
            $table->string('username');
            $table->string('password');
            $table->dateTime('reg_date', $precision = 0);
            $table->dateTime('last_login', $precision = 0);
            $table->longText('stripe_public_key')->nullable();
            $table->longText('stripe_secret_key')->nullable();
            $table->string('picture')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_admin');
    }
}
