<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->comment('用户id');
            $table->string('username',40)->comment('用户名称');
            $table->string('password',80)->comment('密码');
            $table->string('phone',11)->comment('用户手机号');
            $table->unsignedDecimal('usermoney',11,2)->default(0.00)->comment('账户金额');
            $table->unsignedTinyInteger('userType')->default(0)->comment('用户类型 1:会员，0:普遍用户');
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
        Schema::dropIfExists('users');
    }
}
