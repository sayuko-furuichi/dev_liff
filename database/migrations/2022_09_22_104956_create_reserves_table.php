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
        Schema::create('reserves', function (Blueprint $table) {
            $table->id();
            $table->string('store_id');
            $table->string('course');
            $table->timestamp('desired_dt')->nullable(true);
            $table->string('payment');
            $table->string('client_sei');
            $table->string('client_mei');
            $table->string('client_tel');
            $table->string('lineuser_id');
            $table->Integer('state');
            
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
        Schema::dropIfExists('reserves');
    }
};
