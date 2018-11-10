<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('expressName')->comment('快递名称');
            $table->unsignedInteger('exprenumber')->comment('快递号');
            $table->unsignedInteger('order_id')->comment('订单id');
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
        Schema::dropIfExists('expresses');
    }
}
