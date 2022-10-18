<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            //
            $table->tinyint('gender_id');
            $table->string('cellular_phone');
            $table->string('sns1');
            $table->string('sns2');
            $table->string('sns3');
            $table->string('job');
            $table->text('allergy');
            $table->text('note');
            $table->bigint('business_card_id');
            $table->integer('number_of_visit');
            $table->integer('amount_of_payment');
            $table->double('average_payment_amount');
            $table->string('zip');
            $table->tinyint('member_attribute_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            //
        });
    }
};
