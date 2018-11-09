<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertimgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertimgs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('imgclass_id')->comment('所属图片分类ID');
            $table->unsignedInteger('size_w')->comment('图片尺寸的宽');
            $table->unsignedInteger('size_h')->comment('图片尺寸的高');
            $table->string('image')->comment('图片');
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
        Schema::dropIfExists('advertimgs');
    }
}
