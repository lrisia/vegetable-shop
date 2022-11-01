@extends('layouts.main')

@section('content')
<section class="mx-auto mt-10 bg-gray-200 p-10 rounded-lg">
        <a class="mt-6 px-6 py-3 rounded-xl bg-gray-300 hover:bg-gray-400" href="/orders"><  ย้อนกลับ</a>
        <h1 class="my-10 text-center text-gray-700 text-2xl font-bold">
            สร้างคำสั่งซื้อ
        </h1>
        <div class="p-4 ml-20">
            <form action="{{ route('orders.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="relative z-0 mb-6 w-full group">
                    <label for="วันที่สั่งซื้อ" class="label-gray">วันที่สั่งซื้อ</label>
                    <input type="date" class="ml-5 p-2 pl-4 w-3/4 border-2 border-gray-300 rounded-lg" name="วันที่สั่งซื้อ" id="วันที่สั่งซื้อ" placeholder="">
                </div>

                <div class="relative z-0 mb-6 w-full group">
                    <label for="วันที่นัดรับสินค้า" class="label-gray">วันที่นัดรับสินค้า</label>
                    <input type="date" class="ml-5 p-2 pl-4 w-3/4 border-2 border-gray-300 rounded-lg" name="วันที่นัดรับสินค้า" id="วันที่นัดรับสินค้า" placeholder="" required>
                </div>

                <div class="relative z-0 mb-6 w-full group">
                    <label for="ชื่อลูกค้า" class="label-gray">ชื่อลูกค้า</label>
                    <select name="รหัสลูกค้า" id="รหัสลูกค้า"  class="ml-5 p-2 pl-4 w-3/4 border-2 border-gray-300 rounded-lg">
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->ชื่อลูกค้า }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="relative z-0 mb-6 w-full group">
                    <label for="ชื่อพนักงาน" class="label-gray">ชื่อพนักงาน</label>
                    <select name="รหัสพนักงาน" id="รหัสพนักงาน"  class="ml-5 p-2 pl-4 w-3/4 border-2 border-gray-300 rounded-lg">
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->ชื่อพนักงาน }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="text-center mr-20">
                    <button class="my-2 px-6 py-3 rounded-xl bg-gray-300 hover:bg-gray-400" type="submit">สร้างคำสั่งซื้อ</button>
                </div>
            </form>
        </div>
    </section>

@endsection
