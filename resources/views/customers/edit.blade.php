@extends('layouts.main')

@section('content')
    <section class="mx-auto mt-10 bg-gray-200 p-10 rounded-lg">
        <a class="mt-6 px-6 py-3 rounded-xl bg-gray-300 hover:bg-gray-400" href="/customers"><  ย้อนกลับ</a>
        <h1 class="my-10 text-center text-gray-700 text-2xl font-bold">
            แก้ไขรายชื่อลูกค้า
        </h1>
        <div class="p-10 ml-20">
            <form action="{{ route('customers.update', ['customer' => $customer->customer_id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="relative z-0 mb-6 w-full group">
                    <label for="ชื่อลูกค้า" class="mr-10">ชื่อลูกค้า</label>
                    <input type="text"class="ml-5 p-2 pl-4 w-3/4 border-2 border-gray-300 rounded-lg" name="ชื่อลูกค้า" id="ชื่อลูกค้า" value="{{ old('ชื่อลูกค้า', $customer->ชื่อลูกค้า) }}" max="30" required>
                </div>

                <div class="relative z-0 mb-6 w-full group">
                    <label for="เบอร์โทรลูกค้า">เบอร์โทรลูกค้า</label>
                    <input type="tel" class="ml-5 p-2 pl-4 w-3/4 border-2 border-gray-300 rounded-lg" name="เบอร์โทรลูกค้า" id="เบอร์โทรลูกค้า" value="{{ old('เบอร์โทรลูกค้า', $customer->เบอร์โทรลูกค้า) }}" pattern="[0-9]{10}" required>
                </div>

                <div class="text-center mr-20">
                    <button class="mt-6 px-6 py-3 rounded-xl bg-gray-300 hover:bg-gray-400" type="submit">แก้ไขรายชื่อลูกค้า</button>
                </div>
            </form>
        </div>
    </section>

@endsection
