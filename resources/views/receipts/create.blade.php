@extends('layouts.main')

@section('content')
    <section class="mx-auto mt-10 bg-gray-200 p-10 rounded-lg">
        <a class="mt-6 px-6 py-3 rounded-xl bg-gray-300 hover:bg-gray-400" href="/receipts"><  ย้อนกลับ</a>
        <h1 class="my-10 text-center text-gray-700 text-2xl font-bold">
            ออกใบเสร็จ
        </h1>
        <div class="p-10 ml-20">
            <form action="{{ route('receipts.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="relative z-0 mb-6 w-full group">
                    <label for="รหัสคำสั่งซื้อ" class="mr-10">รหัสคำสั่งซื้อ</label>
                    <select name="รหัสคำสั่งซื้อ" id="รหัสคำสั่งซื้อ"  class="p-2 pl-4 w-3/4 border-2 border-gray-300 rounded-lg">
                        @foreach($orders as $order)
                            <option value="{{ $order->รหัสคำสั่งซื้อ }}">{{ $order->รหัสคำสั่งซื้อ }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="relative z-0 mb-6 w-full group">
                    <label for="ชื่อพนักงาน" class="label-gray">ชื่อพนักงาน</label>
                    <select name="รหัสพนักงาน" id="รหัสพนักงาน"  class="ml-5 p-2 pl-4 w-3/4 border-2 border-gray-300 rounded-lg">
                        @foreach($employees as $employee)
                            <option value="{{ $employee->รหัสพนักงาน }}">{{ $employee->ชื่อพนักงาน }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="text-center mr-20">
                    <button class="mt-6 px-6 py-3 rounded-xl bg-gray-300 hover:bg-gray-400" type="submit">ออกใบเสร็จ</button>
                </div>
            </form>
        </div>
    </section>

@endsection
