<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product;
        $product->ชื่อสินค้า = "แครอท";
        $product->ราคาสินค้าต่อหน่วย = 20;
        $product->จำนวนสินค้าคงคลัง = 20;
        $product->save();

        $product = new Product;
        $product->ชื่อสินค้า = "ผักชี";
        $product->ราคาสินค้าต่อหน่วย = 10;
        $product->จำนวนสินค้าคงคลัง = 30;
        $product->save();

        $product = new Product;
        $product->ชื่อสินค้า = "ผักกาดขาว";
        $product->ราคาสินค้าต่อหน่วย = 22;
        $product->จำนวนสินค้าคงคลัง = 25;
        $product->save();

        $product = new Product;
        $product->ชื่อสินค้า = "กะหล่ำ";
        $product->ราคาสินค้าต่อหน่วย = 17;
        $product->จำนวนสินค้าคงคลัง = 27;
        $product->save();

        $product = new Product;
        $product->ชื่อสินค้า = "ขิง";
        $product->ราคาสินค้าต่อหน่วย = 30;
        $product->จำนวนสินค้าคงคลัง = 15;
        $product->save();

    }
}
