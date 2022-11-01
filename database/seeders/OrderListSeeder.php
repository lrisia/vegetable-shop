<?php

namespace Database\Seeders;

use App\Models\OrderList;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orderList = new OrderList;
        $orderList->รหัสคำสั่งซื้อ = 1;
        $orderList->รหัสสินค้า = 1;
        $product_price = Product::find($orderList->รหัสสินค้า);
        $orderList->จำนวนสินค้า = 1;
        $orderList->ราคารวมย่อย = $orderList->จำนวนสินค้า*$product_price->ราคาสินค้าต่อหน่วย;
        $orderList->save();

        $orderList = new OrderList;
        $orderList->รหัสคำสั่งซื้อ = 1;
        $orderList->รหัสสินค้า = 2;
        $product_price = Product::find($orderList->รหัสสินค้า);
        $orderList->จำนวนสินค้า = 1;
        $orderList->ราคารวมย่อย = $orderList->จำนวนสินค้า*$product_price->ราคาสินค้าต่อหน่วย;
        $orderList->save();
    }
}
