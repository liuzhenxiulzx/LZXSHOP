<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRbacUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rbac_users', function (Blueprint $table) {
            $table->increments('id');;
            $table->string('rbac_name',40)->comment('用户名称');
            $table->string('email',40)->comment('邮箱');
            $table->string('password',80)->comment('密码');
            $table->string('phone',11)->comment('用户手机号');
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
        Schema::dropIfExists('rbac_users');
    }
}
