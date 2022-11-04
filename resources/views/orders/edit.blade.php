@extends('layouts.main')

@section('content')
    <section class="mx-auto mt-10 bg-gray-200 p-8 rounded-lg">
        <h1 class="my-10 text-center text-gray-700 text-2xl font-bold">
            แก้ไขคำสั่งซื้อ
        </h1>
        <div class="p-4 ml-20">
            <form action="{{ route('orders.update', ['order' => $order->order_id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="relative z-0 mb-6 w-full group">
                    <label for="วันที่สั่งซื้อ" class="label-gray">วันที่สั่งซื้อ</label>
                    <input type="date" class="ml-5 p-2 pl-4 w-3/4 border-2 border-gray-300 rounded-lg" name="วันที่สั่งซื้อ" id="วันที่สั่งซื้อ" value="{{ old('วันที่สั่งซื้อ', $order->วันที่สั่งซื้อ) }}" required>
                </div>

                <div class="relative z-0 mb-6 w-full group">
                    <label for="วันที่นัดรับสินค้า" class="label-gray">วันที่นัดรับสินค้า</label>
                    <input type="date" class="ml-5 p-2 pl-4 w-3/4 border-2 border-gray-300 rounded-lg" name="วันที่นัดรับสินค้า" id="วันที่นัดรับสินค้า" value="{{ old('วันที่นัดรับสินค้า', $order->วันที่นัดรับสินค้า) }}" required>
                </div>

                <div class="relative z-0 mb-6 w-full group">
                    <label for="สถานะ" class="label-gray">สถานะ</label>
                    <input type="text" class="ml-5 p-2 pl-4 w-3/4 border-2 border-gray-300 rounded-lg" name="สถานะ" id="สถานะ" value="{{ old('สถานะ', $order->สถานะ) }}" required>
                </div>

                <div class="text-center mr-20">
                    <button class="my-2 px-6 py-3 rounded-xl bg-gray-300 hover:bg-gray-400" type="submit">แก้ไขคำสั่งซื้อ</button>
                </div>
            </form>
        </div>
    </section>

@endsection
