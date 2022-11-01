<?php

namespace Database\Seeders;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order = new Order;
        $order->วันที่สั่งซื้อ = Carbon::now();
        $order->วันที่นัดรับสินค้า = "2022-11-01";
        $order->รหัสลูกค้า = 1;
        $order->รหัสพนักงาน = 3;
        $order->ราคารวมทั้งหมด = 30;
        $order->save();

    }
}
