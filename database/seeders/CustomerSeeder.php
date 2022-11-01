<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = new Customer;
        $customer->เบอร์โทรลูกค้า= "0600000001";
        $customer->ชื่อลูกค้า = "หนูมาลี มีลูกแมวเหมียว";
        $customer->save();

        $customer = new Customer;
        $customer->เบอร์โทรลูกค้า= "0600000002";
        $customer->ชื่อลูกค้า = "เอก ฮาร์ทแอคแทค";
        $customer->save();

        $customer = new Customer;
        $customer->เบอร์โทรลูกค้า= "0600000003";
        $customer->ชื่อลูกค้า = "ณเดช คุกกี้ไหมจ๊ะ";
        $customer->save();

        $customer = new Customer;
        $customer->เบอร์โทรลูกค้า= "0600000004";
        $customer->ชื่อลูกค้า = "หมอแลป อะแมนด้า";
        $customer->save();

        $customer = new Customer;
        $customer->เบอร์โทรลูกค้า= "0600000005";
        $customer->ชื่อลูกค้า = "ลุงหวัง นักเทรดในตำนาน";
        $customer->save();
    }
}
