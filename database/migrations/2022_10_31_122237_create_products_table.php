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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('ชื่อสินค้า', 30);
            $table->double('ราคาสินค้าต่อหน่วย', 8, 2);
            $table->integer('จำนวนสินค้าคงคลัง');
            $table->integer('จำนวนสินค้าที่ถูกจอง')->default(0);
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
};