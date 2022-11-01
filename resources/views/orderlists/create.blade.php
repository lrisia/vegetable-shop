@extends('layouts.main')

@section('content')
    <section class="mx-8">
        <div class="pt-4 flex">
            <h1 class="text-2xl">สั่งซื้อสินค้า</h1>
        </div>
        </h1>
        <div class="mt-4 overflow-x-auto relative shadow-md sm:rounded">
        <table class="w-full text-left text-gray-60 mr-0">
            <thead class="text-lg text-gray-700 bg-gray-200">
                <tr>
                    <th scope="col" class="py-3 px-6 text-center">ชื่อสินค้า</th>
                    <th scope="col" class="py-3 px-6 text-center">ราคาสินค้าต่อหน่วย</th>
                    <th scope="col" class="py-3 px-6 text-center">จำนวนสินค้าในคำสั่งซื้อ</th>
                    <th scope="col" class="py-3 px-6 text-center">ราคารวมย่อย</th>
                    <th scope="col" class="py-3 px-6 text-center">
                        <a href="">+</a>
                    </th>
                </tr>
            </thead>
            
            <tbody class="m-2">
                <tr class="border-t">
                    <td class="py-3 px-6">
                        <select name="รหัสสินค้า" id="รหัสสินค้า"  class="ml-5 p-2 pl-4 w-3/4 border-2 border-gray-300 rounded-lg">
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->ชื่อสินค้า }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td class="py-3 px-6">
                        <p  class="ml-5 p-2 pl-4 min-w-min border-2 border-gray-300 rounded-lg">ราคาสินค้า</p>
                    </td>                    
                    <td class="py-3 px-6">
                        <input type="number" name="จำนวนสินค้าในคำสั่งซื้อ" id="จำนวนสินค้าในคำสั่งซื้อ" class="ml-5 p-2 pl-4 min-w-min border-2 border-gray-300 rounded-lg">
                    </td>                    
                    <td class="py-3 px-6">
                        <input type="number" name="ราคารวมย่อย" id="ราคารวมย่อย" class="ml-5 p-2 pl-4 min-w-min border-2 border-gray-300 rounded-lg">
                    </td>
                    <td class="py-3 px-6">
                        <a href=""> x </a>
                    </td>
                </tr>
             </tbody>
        </table>
        </div>
        <div>
            <a class="text-gray-600 text-sm p-2 m-3 ml-0.5 rounded bg-gray-200 hover:bg-gray-300">เสร็จสิ้น</a>
        </div>
    </section>

@endsection
