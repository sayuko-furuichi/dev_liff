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
        Schema::create('client_charges', function (Blueprint $table) {
            $table->id();
            $table->Integer('amount')->comment('支払い金額');
            $table->Integer('store_id');
            $table->string('line_user_id');
            $table->Integer('reserve_id');
            // $table->Integer('product_id');
            
            $table->timestamp('expired_at')->nullable(true)->comment('認証が切れるまでのタイムスタンプ');
            $table->timestamp('captured_at')->nullable(true)->comment('支払処理確定時のタイムスタンプ');
            $table->string('customer_id')->comment('顧客ID');

            $table->string('description')->comment('概要');
            $table->tinyInteger('refunded')->comment('返金済みかどうか');

            $table->Integer('amount_refunded')->comment('この支払いに対しての返金額');
            $table->string('refund_reason')->comment('返金理由');

            $table->string('fee_rate')->comment('決済手数料率');
            $table->string('failure_message ')->comment('失敗した支払いの説明');

            $table->string('charge_id')->comment('ch_で始まる一意なオブジェクトを示す文字列');
            $table->tinyInteger('captured')->comment('支払い処理を確定しているかどうか');


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
        Schema::dropIfExists('client_charges');
    }
};
