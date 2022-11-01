@extends('layouts.main')

@section('content')
    <section class="mx-auto mt-10 bg-gray-200 p-10 rounded-lg">
        <a class="mt-6 px-6 py-3 rounded-xl bg-gray-300 hover:bg-gray-400" href="/employees"><  ย้อนกลับ</a>
        <h1 class="my-10 text-center text-gray-700 text-2xl font-bold">
            เพิ่มรายชื่อพนักงาน
        </h1>
        <div class="p-10 ml-20">
            <form action="{{ route('employees.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                @if ($errors->has('ชื่อพนักงาน'))
                    <p class="text-red-600 mb-2">
                        กรุณากรอกชื่อ-นามสกุลให้ครบถ้วน
                    </p>
                @endif
                <div class="relative z-0 mb-6 w-full group">
                    <label for="ชื่อพนักงาน" class="mr-10">ชื่อพนักงาน</label>
                    <input type="text" class="ml-5 p-2 pl-4 w-3/4 border-2 border-gray-300 rounded-lg" name="ชื่อพนักงาน" id="ชื่อพนักงาน" placeholder="ชื่อ-นามสกุล" value="{{ old('ชื่อพนักงาน') }}">
                </div>

                @if ($errors->has('เบอร์โทรพนักงาน'))
                    <p class="text-red-600 mb-2">
                        กรุณากรอกเบอร์โทรพนักงาน
                    </p>
                @endif
                <div class="relative z-0 mb-6 w-full group">
                    <label for="เบอร์โทรพนักงาน">เบอร์โทรพนักงาน</label>
                    <input type="tel" class="ml-5 p-2 pl-4 w-3/4 border-2 border-gray-300 rounded-lg" name="เบอร์โทรพนักงาน" id="เบอร์โทรพนักงาน" placeholder="0812345678" pattern="[0-9]{10}" value="{{ old('เบอร์โทรพนักงาน') }}">
                </div>

                <div class="text-center mr-20">
                    <button class="mt-6 px-6 py-3 rounded-xl bg-gray-300 hover:bg-gray-400" type="submit">เพิ่มรายชื่อพนักงาน</button>
                </div>
            </form>
        </div>
    </section>

@endsection
