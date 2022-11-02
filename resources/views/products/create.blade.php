@extends('layouts.main')

@section('content')
    <section class="mx-auto mt-10 bg-gray-200 p-8 rounded-lg">
        <a class="mt-6 px-6 py-3 rounded-xl bg-gray-300 hover:bg-gray-400" href="/products"><  ย้อนกลับ</a>
        <h1 class="my-10 text-center text-gray-700 text-2xl font-bold">
            เพิ่มสินค้า
        </h1>
        <div class="p-4 ml-20">
            <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                @if ($errors->has('ชื่อสินค้า'))
                    <p class="text-red-600 mb-2">
                        กรุณากรอกชื่อสินค้าให้ครบถ้วน
                    </p>
                @endif
                <div class="relative z-0 mb-6 w-full group">
                    <label for="ชื่อสินค้า" class="label-gray">ชื่อสินค้า</label>
                    <input type="text" class="ml-5 p-2 pl-4 w-3/4 border-2 border-gray-300 rounded-lg" name="ชื่อสินค้า" id="ชื่อสินค้า" placeholder="" value="{{ old('ชื่อสินค้า') }}">
                </div>
                @if ($errors->has('ราคาสินค้าต่อหน่วย'))
                    <p class="text-red-600 mb-2">
                        กรุณากรอกราคาสินค้าต่อหน่วย
                    </p>
                @endif
                <div class="relative z-0 mb-6 w-full group">
                    <label for="ราคาสินค้าต่อหน่วย" class="label-gray">ราคาสินค้าต่อหน่วย</label>
                    <input type="number" class="ml-5 p-2 pl-4 w-3/4 border-2 border-gray-300 rounded-lg" name="ราคาสินค้าต่อหน่วย" id="ราคาสินค้าต่อหน่วย" placeholder="" min="1" value="{{ old('ราคาสินค้าต่อหน่วย') }}">
                </div>
                @if ($errors->has('จำนวนสินค้าคงคลัง'))
                    <p class="text-red-600 mb-2">
                        กรุณากรอกจำนวนสินค้าคงคลัง
                    </p>
                @endif
                <div class="relative z-0 mb-6 w-full group">
                    <label for="จำนวนสินค้าคงคลัง" class="label-gray">จำนวนสินค้าคงคลัง</label>
                    <input type="number" class="ml-5 p-2 pl-4 w-3/4 border-2 border-gray-300 rounded-lg" name="จำนวนสินค้าคงคลัง" id="จำนวนสินค้าคงคลัง" placeholder="" min="0" value="{{ old('จำนวนสินค้าคงคลัง') }}">
                </div>

                <div class="text-center mr-20">
                    <button class="my-2 px-6 py-3 rounded-xl bg-gray-300 hover:bg-gray-400" type="submit">เพิ่มสินค้า</button>
                </div>
            </form>
        </div>
    </section>

@endsection
