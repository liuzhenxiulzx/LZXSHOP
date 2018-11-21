<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('order_id')->comment('订单号id');
            $table->unsignedInteger('user_id')->comment('用户id');
            $table->unsignedInteger('addgoods_id')->comment('购物车商品id');
            $table->unsignedInteger('goods_id')->comment('商品id');
            $table->unsignedInteger('sku_id')->comment('skuid');
            $table->unsignedInteger('goodsCount')->comment('结算时商品的数量');
            $table->unsignedInteger('order_state')->default(2)->comment('订单状态;1:已退款, 2:待发货，3:待收货，4:已签收，5:已退货');
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
        Schema::dropIfExists('orders');
    }
}
