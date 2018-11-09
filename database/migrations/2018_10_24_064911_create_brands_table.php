<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->increments('id');
            $table->string('brandName')->comment('品牌名称');
            $table->string('brand_image')->comment('品牌图片');
            $table->string('colony')->comment('所属地');
            $table->string('brand_describe')->comment('品牌描述');
            $table->unsignedInteger('brand_order')->comment('品牌序号');
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
        Schema::dropIfExists('brands');
    }
}
