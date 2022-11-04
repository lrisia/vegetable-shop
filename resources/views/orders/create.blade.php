@extends('layouts.main')

@section('content')
    <form action="{{ route('orders.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <section class="mx-8 mt-10 bg-gray-200 p-10 rounded-lg">
        <a class="mt-6 px-6 py-3 rounded-xl bg-gray-300 hover:bg-gray-400" href="/orders"><  ย้อนกลับ</a>
        <h1 class="my-10 text-center text-gray-700 text-2xl font-bold">
            สร้างคำสั่งซื้อ
        </h1>
            <div class="p-4 ml-20">

                <div class="relative z-0 mb-6 w-full group">
                    @if ($errors->has('วันที่นัดรับสินค้า'))
                        <p class="text-red-500">วันที่นัดรับสินค้าไม่สามารถเป็นอดีต</p>
                    @endif
                    <label for="วันที่นัดรับสินค้า" class="label-gray">วันที่นัดรับสินค้า</label>
                    <input type="date" class="ml-5 p-2 pl-4 w-3/4 border-2 border-gray-300 rounded-lg" name="วันที่นัดรับสินค้า" id="วันที่นัดรับสินค้า" placeholder="" required>
                </div>

                <div class="relative z-0 mb-6 w-full group">
                    <label for="ชื่อลูกค้า" class="label-gray">ชื่อลูกค้า</label>
                    <select name="รหัสลูกค้า" id="รหัสลูกค้า"  class="ml-5 p-2 pl-4 w-3/4 border-2 border-gray-300 rounded-lg">
                        @foreach($customers as $customer)
                            <option value="{{ $customer->รหัสลูกค้า }}">{{ $customer->ชื่อลูกค้า }}</option>
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
            </div>
        </section>

        <section class="mx-8">
            <div class="pt-4 flex">
                <h1 class="text-2xl">สินค้าทั้งหมด</h1>
            </div>
            <p>ใส่จำนวนสินค้าที่ต้องการจะเพิ่มในคำสั่งซื้อ</p>
            <div class="mt-4 mb-10 overflow-x-auto relative shadow-md sm:rounded">
                <table class="w-full text-left text-gray-60 mr-0">
                    <thead class="text-lg text-gray-700 bg-gray-200">
                    <tr>
                        <th scope="col" class="py-3 px-6">รหัสสินค้า</th>
                        <th scope="col" class="py-3 px-6">ชื่อสินค้า</th>
                        <th scope="col" class="py-3 px-6">ราคาสินค้าต่อหน่วย</th>
                        <th scope="col" class="py-3 px-6">จำนวนสินค้าคงคลัง</th>
                        <th scope="col" class="py-3 px-6">จำนวนสินค้าที่ถูกจอง</th>
                        <th scope="col" class="py-3 px-6">จำนวนสินค้า</th>
                    </tr>
                    </thead>

                    <tbody class="m-2">
                    @foreach($products as $product)
                        <tr class="border-t">
                            <td class="py-4 px-6">
                                {{ $product->รหัสสินค้า }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $product->ชื่อสินค้า }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $product->ราคาสินค้าต่อหน่วย }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $product->จำนวนสินค้าคงคลัง }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $product->จำนวนสินค้าที่ถูกจอง }}
                            </td>
                            <td>
                                <div class="ml-10">
                                    <input type="number"
                                           class="border-2 border-gray-300 rounded-lg mr-6"
                                           name="จำนวนสินค้า" id="จำนวนสินค้า" placeholder="0" min="0" max="{{ $product->จำนวนสินค้าคงคลัง }}" value="{{ old('จำนวนสินค้า'.$product->รหัสสินค้า) }}">
                                </div>
                                <script>
                                    var count = {{ $product->รหัสสินค้า }};
                                    document.getElementById("จำนวนสินค้า").setAttribute("name", "จำนวนสินค้า_" + count);
                                    document.getElementById("จำนวนสินค้า").id = "จำนวนสินค้า_" + count;
                                </script>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>

        <div class="text-center mr-20 mb-10">
            <button class="my-2 px-6 py-3 rounded-xl bg-gray-300 hover:bg-gray-400" type="submit">สร้างคำสั่งซื้อ</button>
        </div>
    </form>
@endsection
