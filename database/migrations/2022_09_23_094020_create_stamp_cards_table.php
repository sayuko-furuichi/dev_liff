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
            $table->string('number')->comment('何枚目の発行か');
            $table->integer('state');
            $table->timestamp('expiry')->nullable(true)->comment('有効期限');
            $table->integer('points')->comment('total_points');
            $table->integer('max_points');
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
