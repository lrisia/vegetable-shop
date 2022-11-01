<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employee = new Employee;
        $employee->เบอร์โทรพนักงาน = "0800000001";
        $employee->ชื่อพนักงาน = "มอสซี่ ฮิปฮิปปี้";
        $employee->save();

        $employee = new Employee;
        $employee->เบอร์โทรพนักงาน = "0800000002";
        $employee->ชื่อพนักงาน = "พลอย วิบวับวิบวับ";
        $employee->save();

        $employee = new Employee;
        $employee->เบอร์โทรพนักงาน = "0800000003";
        $employee->ชื่อพนักงาน = "ต้นต้น รถเป็นอะไรอะ";
        $employee->save();

        $employee = new Employee;
        $employee->เบอร์โทรพนักงาน = "0800000004";
        $employee->ชื่อพนักงาน = "เอิร์น อีซี่มันนี่";
        $employee->save();

        $employee = new Employee;
        $employee->เบอร์โทรพนักงาน = "0800000005";
        $employee->ชื่อพนักงาน = "สมชาย มีลูกแมว";
        $employee->save();
    }
}
