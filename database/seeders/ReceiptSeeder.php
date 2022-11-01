<?php

namespace Database\Seeders;

use App\Models\Receipt;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReceiptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $receipt = new Receipt;
        $receipt->วันที่ออกใบเสร็จ = Carbon::now();
        $receipt->รหัสคำสั่งซื้อ = 1;
        $receipt->รหัสพนักงาน = 3;
        $receipt->save();
    }
}
