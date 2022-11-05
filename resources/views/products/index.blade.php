@extends('layouts.main')

@section('content')
    <section class="mx-8">
        <div class="pt-4 flex">
            <h1 class="text-2xl">สินค้าทั้งหมด</h1>
            <div class="ml-auto">
                <a href="{{ route('products.create') }}" class="bg-[#B3BA1E] p-3 rounded-lg ">
                    + เพิ่มสินค้า
                </a>
            </div>
        </div>
        <div class="mt-4 overflow-x-auto relative shadow-md sm:rounded">
        <table class="w-full text-left text-gray-60 mr-0">
            <thead class="text-lg text-gray-700 bg-gray-200">
                <tr>
                    <th scope="col" class="py-3 px-6">รหัสสินค้า</th>
                    <th scope="col" class="py-3 px-6">ชื่อสินค้า</th>
                    <th scope="col" class="py-3 px-6">ราคาสินค้าต่อหน่วย</th>
                    <th scope="col" class="py-3 px-6">จำนวนสินค้าคงคลัง</th>
                    <th scope="col" class="py-3 px-6">จำนวนสินค้าที่ถูกจอง</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            
            <tbody class="m-2">
                @foreach($products as $product)
                <tr class="border-t">
                    <td class="py-3 px-6">
                        {{ $product->product_id }}
                    </td>
                    <td class="py-3 px-6">
                        {{ $product->ชื่อสินค้า }}
                    </td>
                    <td class="py-3 px-6">
                        {{number_format($product->ราคาสินค้าต่อหน่วย)}}
                    </td>
                    <td class="py-3 px-6">
                        {{ number_format($product->จำนวนสินค้าคงคลัง) }}
                    </td>
                    <td class="py-3 px-6">
                        {{ number_format($product->จำนวนสินค้าที่ถูกจอง) }}
                    </td>
                    <td>
                        <div>
                            <a class="text-gray-600 text-sm p-2 m-3 ml-0.5 rounded bg-gray-200 hover:bg-gray-300" href="{{ route('products.edit', ['product' => $product->product_id]) }}">
                                แก้ไข
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
