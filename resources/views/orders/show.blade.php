@extends('layouts.main')

@section('content')
<section class="mx-auto mt-10 bg-gray-200 p-10 rounded-lg">
        <a class="mt-6 px-6 py-3 rounded-xl bg-gray-300 hover:bg-gray-400" href="/orders"><  ย้อนกลับ</a>
        <h1 class="my-10 text-center text-gray-700 text-2xl font-bold">
            รายการคำสั่งซื้อ
        </h1>
        <div class="p-4 ml-20">
            <p> รหัสคำสั่งซื้อ: {{ $order->id }}</p>
            <p> วันที่สั่งซื้อ: {{ $order->วันที่สั่งซื้อ }}</p>
            <p> วันที่นัดรับสินค้า: {{ $order->วันที่นัดรับสินค้า }}</p>
            <p> ชื่อลูกค้า: {{ $order->รหัสลูกค้า }}</p>
            <p> ชื่อพนักงาน: {{ $order->รหัสพนักงาน }}</p>
    
        </div>
    </section>

@endsection