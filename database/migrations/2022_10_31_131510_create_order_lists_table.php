<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_lists', function (Blueprint $table) {
            $table->unsignedBigInteger('รหัสคำสั่งซื้อ');
            $table->foreign('รหัสคำสั่งซื้อ')->references('id')->on('orders');
            $table->unsignedBigInteger('รหัสสินค้า');
            $table->foreign('รหัสสินค้า')->references('id')->on('products');
            $table->integer('จำนวนสินค้า');
            $table->integer('ราคารวมย่อย');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_lists');
    }
};
