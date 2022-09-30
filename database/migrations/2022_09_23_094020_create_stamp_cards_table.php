<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stamp_cards', function (Blueprint $table) {
            $table->id();
            $table->string('lineuser_id');
            $table->string('img');
            $table->string('store_id');
            $table->string('number');
            $table->integer('state');
            $table->timestamp('expiry')->nullable(true);
            $table->integer('points');
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
        Schema::dropIfExists('stamp_cards');
    }
};
