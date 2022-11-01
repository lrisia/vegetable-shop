@extends('layouts.main')

@section('content')
    <section class="mx-8">
        <div class="pt-4 flex">
            <h1 class="text-2xl">รายการคำสั่งซื้อ</h1>
            <div class="ml-auto">
                <a href="{{ route('orders.create') }}" class="bg-[#B3BA1E] p-3 rounded-lg ">
                    + สร้างคำสั่งซื้อใหม่
                </a>
            </div>
        </div>
        </h1>
        <div class="mt-4 overflow-x-auto relative shadow-md sm:rounded">
        <table class="w-full text-left text-gray-60 mr-0">
            <thead class="text-lg text-gray-700 bg-gray-200">
                <tr>
                    <th scope="col" class="py-3 px-6">รหัสคำสั่งซื้อ</th>
                    <th scope="col" class="py-3 px-6">วันที่สั่งซื้อ</th>
                    <th scope="col" class="py-3 px-6">วันที่นัดรับสินค้า</th>
                    <th scope="col" class="py-3 px-6">รหัสลูกค้า</th>
                    <th scope="col" class="py-3 px-6">รหัสพนักงาน</th>
                    <th scope="col" class="py-3 px-6">ราคารวมทั้งหมด</th>
                    <th scope="col" class="py-3 px-6">สถานะ</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            
            <tbody class="m-2">
                @foreach($orders as $order)
                <tr class="border-t">
                    <td class="py-3 px-6">
                        <a href=" {{ route( 'orders.show' , ['order' => $order->id]) }}">
                            {{ $order->id }}
                        </a>
                    </td>
                    <td class="py-3 px-6">
                        {{ $order->วันที่สั่งซื้อ }}
                    </td>
                    <td class="py-3 px-6">
                        {{ $order->วันที่นัดรับสินค้า }}
                    </td>
                     <td class="py-3 px-6">
                        <a href="" class="hover:underline hover:text-gray-700 ">
                            {{ $order->รหัสลูกค้า }}
                        </a>
                    </td><td class="py-3 px-6">
                        <a href="" class="hover:underline hover:text-gray-700 ">
                            {{ $order->รหัสพนักงาน }}
                        </a>
                    </td>
                    <td class="py-3 px-6">
                        {{ $order->ราคารวมทั้งหมด }}
                    </td>
                    <td class="py-3 px-6">
                        {{ $order->สถานะ }}
                    </td>
                    <td>
                        <div>
                            <a class="text-gray-600 text-sm p-2 m-3 ml-0.5 rounded bg-gray-200 hover:bg-gray-300" href="{{ route('orders.edit', ['order' => $order->id]) }}">
                                แก้ไข
                            </a>
                        </div>
                    </td>
                    <td>
                        <div>
                            <a class="text-sm p-2 m-3 ml-0.5 rounded bg-red-400 hover:bg-red-300" href="">
                                ยกเลิก
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
             </tbody>
        </table>
        </div>
    </section>

@endsection
