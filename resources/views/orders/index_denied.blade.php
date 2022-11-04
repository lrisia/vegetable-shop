@extends('layouts.main')

@section('content')
    @include('orders.index_layout')
    <section class="mx-8">
        <h2 class="text-xl mt-4 text-red-500">รายการที่ปฏิเสธคำสั่งซื้อ</h2>
        <div class="mt-4 overflow-x-auto relative shadow-md sm:rounded">
            <table class="w-full text-left text-gray-60 mr-0">
                <thead class="text-lg text-gray-700 bg-red-200">
                <tr>
                    <th scope="col" class="py-3 px-4">รหัสคำสั่งซื้อ</th>
                    <th scope="col" class="py-3 px-6">วันที่สั่งซื้อ</th>
                    <th scope="col" class="py-3 px-6">วันที่นัดรับสินค้า</th>
                    <th scope="col" class="py-3 px-6">รหัสลูกค้า</th>
                    <th scope="col" class="py-3 px-6">รหัสพนักงาน</th>
                    <th scope="col" class="py-3 px-6">ราคารวมทั้งหมด</th>
                    <th scope="col" class="py-3 px-6">สถานะ</th>
                </tr>
                </thead>

                <tbody class="m-2">
                @foreach($orders as $order)
                    @if($order->สถานะ == 'ปฏิเสธคำสั่งซื้อ')
                        <tr class="border-t hover:bg-gray-100">
                            <td class="py-3 px-4">
                                <a href=" {{ route( 'orders.show' , ['order' => $order->รหัสคำสั่งซื้อ]) }}">
                                    {{ $order->รหัสคำสั่งซื้อ }}
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
                            </td>
                            <td class="py-3 px-6">
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
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
