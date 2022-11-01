@extends('layouts.main')

@section('content')
    <section class="mx-8">
        <div class="pt-4 flex">
            <h1 class="text-2xl">รายชื่อลูกค้าทั้งหมด</h1>
            <div class="ml-auto">
                <a href="{{ route('customers.create') }}" class="bg-[#B3BA1E] p-3 rounded-lg ">
                    + เพิ่มรายชื่อลูกค้า
                </a>
            </div>
        </div>
        <div class="mt-4 overflow-x-auto relative shadow-md sm:rounded">
        <table class="w-full text-left text-gray-60">
            <thead class="text-lg text-gray-700 bg-gray-200">
                <tr>
                    <th scope="col" class="py-3 px-6">รหัสลูกค้า</th>
                    <th scope="col" class="py-3 px-6">ชื่อลูกค้า</th>
                    <th scope="col" class="py-3 px-6">เบอร์โทรลูกค้า</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            
            <tbody class="ml-10">
                @foreach($customers as $customer)
                <tr class="border-t">
                    <td class="py-3 px-6">
                        {{ $customer->id }}
                    </td>
                    <td class="py-3 px-6">
                        {{ $customer->ชื่อลูกค้า }}
                    </td>
                    <td class="py-3 px-6">
                        {{ $customer->เบอร์โทรลูกค้า }}
                    </td>
                    <td>
                        <div>
                            <a class="text-gray-600 text-sm p-2 m-3 ml-0.5 rounded bg-gray-200 hover:bg-gray-300" href="{{ route('customers.edit', ['customer' => $customer->id]) }}">
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
