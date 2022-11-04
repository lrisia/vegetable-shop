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
        Schema::create('receipts', function (Blueprint $table) {
            $table->id('receipt_id');
            $table->date('วันที่ออกใบเสร็จ');
            $table->unsignedBigInteger('รหัสคำสั่งซื้อ');
            $table->foreign('รหัสคำสั่งซื้อ')->references('order_id')->on('orders');
            $table->unsignedBigInteger('รหัสพนักงาน');
            $table->foreign('รหัสพนักงาน')->references('employee_id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receipts');
    }
};
