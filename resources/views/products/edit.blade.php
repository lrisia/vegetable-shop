@extends('layouts.main')

@section('content')
    <section class="mx-auto my-10 bg-gray-200 p-7 rounded-lg">
        <a class="mt-6 px-6 py-3 rounded-xl bg-gray-300 hover:bg-gray-400" href="/products"><  ย้อนกลับ</a>
        <h1 class="my-10 text-center text-gray-700 text-2xl font-bold">
            แก้ไขสินค้า
        </h1>
        <div class="p-3 ml-20">
            <form action="{{ route('products.update', ['product' => $product->product_id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="relative z-0 mb-6 w-full group">
                    <label for="ชื่อสินค้า" class="label-gray">ชื่อสินค้า</label>
                    <input type="text" class="ml-5 p-2 pl-4 w-3/4 border-2 border-gray-300 rounded-lg" name="ชื่อสินค้า" id="ชื่อสินค้า" value="{{ old('ชื่อสินค้า', $product->ชื่อสินค้า) }}" placeholder="" required>
                </div>

                <div class="relative z-0 mb-6 w-full group">
                    <label for="ราคาสินค้าต่อหน่วย" class="label-gray">ราคาสินค้าต่อหน่วย</label>
                    <input type="number" class="ml-5 p-2 pl-4 w-3/4 border-2 border-gray-300 rounded-lg" name="ราคาสินค้าต่อหน่วย" id="ราคาสินค้าต่อหน่วย" value="{{ old('ราคาสินค้าต่อหน่วย', $product->ราคาสินค้าต่อหน่วย) }}" placeholder="" min="1" required>
                </div>

                <div class="relative z-0 mb-6 w-full group">
                    <label for="จำนวนสินค้าคงคลัง" class="label-gray">จำนวนสินค้าคงคลัง</label>
                    <input type="number" class="ml-5 p-2 pl-4 w-3/4 border-2 border-gray-300 rounded-lg" name="จำนวนสินค้าคงคลัง" id="จำนวนสินค้าคงคลัง" value="{{ old('จำนวนสินค้าคงคลัง', $product->จำนวนสินค้าคงคลัง) }}" placeholder="" min="0" required>
                </div>

                <div class="relative z-0 mb-6 w-full group">
                    <label for="จำนวนสินค้าที่ถูกจอง" class="label-gray">จำนวนสินค้าที่ถูกจอง</label>
                    <input type="number" class="ml-5 p-2 pl-4 w-3/4 border-2 border-gray-300 rounded-lg" name="จำนวนสินค้าที่ถูกจอง" id="จำนวนสินค้าที่ถูกจอง" value="{{ old('จำนวนสินค้าที่ถูกจอง', $product->จำนวนสินค้าที่ถูกจอง) }}" placeholder="" min="0" required>
                </div>

                <div class="text-center mr-20">
                    <button class="my-2 px-6 py-3 rounded-xl bg-gray-300 hover:bg-gray-400" type="submit">แก้ไขสินค้า</button>
                </div>

            </form>
        </div>
    </section>

@endsection
