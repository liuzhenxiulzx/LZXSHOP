<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('parent_id')->comment('分类ID');
            $table->unsignedInteger('brand_id')->comment('品牌ID');
            $table->string('pro_name')->comment('产品名称');
            $table->string('pro_title')->comment('产品标题');
            $table->string('brief_title')->comment('简略标题');
            $table->unsignedDecimal('price',8,2)->default(0.00)->comment('产品价格');
            $table->unsignedInteger('pro_number')->comment('产品编号');
            $table->string('area')->comment('产地');
            $table->unsignedInteger('weight')->comment('产品重量');
            $table->string('promotion')->comment('促销');
            $table->string('pro_image')->comment('产品图片');
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
        Schema::dropIfExists('products');
    }
}
