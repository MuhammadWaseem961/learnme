<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEventIdPayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->string('event_id')->after('bid_id')->nullable();
            $table->string('payment_from')->after('event_id')->nullable();
            $table->string('payment_method')->after('payment_from')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn('event_id');
            $table->dropColumn('payment_method');
            $table->dropColumn('payment_from');
        });
    }
}
