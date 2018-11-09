<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVipGrade extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vip_grade', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rankName')->comment('等级名称');
            $table->unsignedInteger('startScore')->comment('开始积分');
            $table->unsignedInteger('endScore')->comment('结束积分');
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
        //
    }
}
