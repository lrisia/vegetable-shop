@extends('layouts.main')

@section('content')

<section class="mt-10">
    <div class="flex items-center justify-center">
        <div class="w-/5 bg-white shadow-lg my-4">
            <div class="flex justify-center p-4">
                <div class="flex items-center">
                    <h1 class="text-3xl font-bold mx-2 ml-4">รายการสั่งซื้อ</h1>
                </div>
            </div>
            <div class="w-full h-0.5 bg-[#80b319]"></div>
            <div class="flex justify-between p-4 ml-8">
                <div>
                    <p class="font-bold">รหัสคำสั่งซื้อ: {{ $order->order_id }}</p>
                    <p class="font-bold"> วันที่สั่งซื้อ: {{ $order->วันที่สั่งซื้อ }}</p>
                    <p class="font-bold"> วันที่นัดรับสินค้า: {{ $order->วันที่นัดรับสินค้า }}</p>
                </div>
                <div class="w-50">
                    <p class="font-bold">ชื่อลูกค้า: {{ $customer->ชื่อลูกค้า }}</p>
                    <p class="font-bold">ชื่อพนักงาน:  {{ $employee->ชื่อพนักงาน }}</p>
                </div>
                <div></div>
            </div>
            <div class="flex justify-center p-4">
                <div class="border-b border-gray-200 shadow">
                    <table class="">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2">
                                    ลำดับ
                                </th>
                                <th class="px-4 py-2">
                                    ชื่อสินค้า
                                </th>
                                <th class="px-4 py-2">
                                    จำนวนสินค้า
                                </th>
                                <th class="px-4 py-2">
                                    ราคาสินค้าต่อหน่วย
                                </th>
                                <th class="px-4 py-2">
                                    ราคารวมย่อย
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach($orderLists as $orderList)
                            <tr>
                                <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4">{{ $products->find($orderList->รหัสสินค้า)->ชื่อสินค้า }}</td>
                                <td class="px-6 py-4">{{ $orderList->จำนวนสินค้า }}</td>
                                <td class="px-6 py-4">{{ $products->find($orderList->รหัสสินค้า)->ราคาสินค้าต่อหน่วย }}</td>
                                <td class="px-6 py-4">{{ $orderList->ราคารวมย่อย }}</td>
                            </tr>
                            @endforeach
                            <tr class="">
                                <td colspan="3"></td>
                                <td class="font-bold">ราคารวมทั้งสิ้น: </td>
                                <td class="font-bold"><b>{{ $total }} บาท</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</section>

<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
@endsection