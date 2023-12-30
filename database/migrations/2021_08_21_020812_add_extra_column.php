<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_transaction', function (Blueprint $table) {
            $table->string('payment_method')->after('email')->nullable();
            $table->string('payment_from')->after('payment_method')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_transaction', function (Blueprint $table) {
            $table->dropColumn('payment_method');
            $table->dropColumn('payment_from');
        });
    }
}
