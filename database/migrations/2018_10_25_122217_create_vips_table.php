<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vips', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vipname')->comment('会员名');
            $table->string('real_name')->comment('真实姓名');
            $table->unsignedInteger('phone')->comment('会员手机号');
            $table->string('home_address')->comment('家庭地址');
            $table->string('userEmail')->comment('邮箱');
            $table->unsignedInteger('grade_ID')->default(2)->comment('等级ID');
            $table->unsignedInteger('integral')->default(0)->comment('积分数');
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
        Schema::dropIfExists('vips');
    }
}
