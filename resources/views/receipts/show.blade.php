@extends('layouts.main')

@section('content')
    <section class="mt-10" id="printThis">
        <div class="flex">
            <h1 class="text-3xl font-bold">คำสั่งซื้อ #{{ $receipt->รหัสคำสั่งซื้อ }}</h1>
            <div class="flex justify-end">
                <div>
                    <span
                        class="self-center text-xl font-semibold whitespace-nowrap font-mono text-white ml-1">
                        <img src="https://cdn-icons-png.flaticon.com/512/1617/1617578.png" alt="" style="width: 70px">
                    </span>
                    <h1 class="text-3xl font-bold ml-6">ระบบร้านขายผัก</h1>
                </div>
            </div>
        </div>

        <p> รหัสคำสั่งซื้อ: {{ $receipt->รหัสคำสั่งซื้อ }}</p>
        <h1 class="text-2xl">ใบเสร็จ</h1>

        <div class="bg-blue-200 items-center grid-cols-2">
            <div>
                <p>ร้านค้า: ร้านขายผัก</p>
            </div>

            <div>
                <p>ชื่อลูกค้า: {{ $customer->ชื่อลูกค้า }}</p>
            </div>

            <div>
                <p>วันที่ออกใบเสร็จ: {{ $receipt->วันที่ออกใบเสร็จ }}</p>
            </div>

            <div>
                <p>รหัสคำสั่งซื้อ: {{ $receipt->รหัสคำสั่งซื้อ }}</p>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อสินค้า</th>
                        <th>จำนวนสินค้า</th>
                        <th>ราคาสินค้าต่อหน่วย</th>
                        <th>ราคารวม</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orderLists as $orderList)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $products->find($orderList->รหัสสินค้า)->ชื่อสินค้า }}</td>
                        <td>{{ $orderList->จำนวนสินค้า }}</td>
                        <td>{{ $products->find($orderList->รหัสสินค้า)->ราคาสินค้าต่อหน่วย }}</td>
                        <td>{{ $orderList->ราคารวมย่อย }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <p>ราคารวมทั้งสิ้น: {{ $total }} บาท</p>
            <p>ออกใบเสร็จโดย: {{ $employee->ชื่อพนักงาน }}</p>
        </div>
    </section>
    <button onclick="printDiv('printThis')">print โว้ย</button>
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
