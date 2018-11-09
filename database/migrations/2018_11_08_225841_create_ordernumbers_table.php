<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdernumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordernumbers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ordernumber')->comment('订单号');
            $table->unsignedTinyInteger('isPay')->default(0)->comment('是否支付,0:未支付,1:已支付');
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
        Schema::dropIfExists('ordernumbers');
    }
}
