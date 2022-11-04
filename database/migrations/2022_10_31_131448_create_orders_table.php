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
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->date('วันที่สั่งซื้อ');
            $table->date('วันที่นัดรับสินค้า');
            $table->unsignedBigInteger('รหัสลูกค้า');
            $table->foreign('รหัสลูกค้า')->references('customer_id')->on('customers');
            $table->unsignedBigInteger('รหัสพนักงาน');
            $table->foreign('รหัสพนักงาน')->references('employee_id')->on('employees');
            $table->integer('ราคารวมทั้งหมด')->default(0);
            $table->string('สถานะ', 20)->default('รอดำเนินการ');
            $table->string('หมายเหตุ', 50)->nullable()->default('-');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
