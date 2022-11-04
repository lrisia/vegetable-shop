@extends('layouts.main')

@section('content')
    <section class="mx-8">
        <div class="pt-4 flex">
            <h1 class="text-2xl">รายการใบเสร็จทั้งหมด</h1>
            <div class="ml-auto">
                <a href="{{ route('receipts.create') }}" class="bg-[#B3BA1E] p-3 rounded-lg ">
                    + ออกใบเสร็จ
                </a>
            </div>
        </div>
        <div class="mt-4 overflow-x-auto relative shadow-md sm:rounded">
        <table class="w-full text-left text-gray-60 mr-0">
            <thead class="text-lg text-gray-700 bg-gray-200">
                <tr>
                    <th scope="col" class="py-3 px-6">รหัสใบเสร็จ</th>
                    <th scope="col" class="py-3 px-6">วันที่ออกใบเสร็จ</th>
                    <th scope="col" class="py-3 px-6">รหัสคำสั่งซื้อ</th>
                    <th scope="col" class="py-3 px-6">รหัสพนักงาน</th>
                </tr>
            </thead>

            <tbody class="m-2">
                @foreach($receipts as $receipt)
                <tr class="border-t cursor-pointer hover:bg-gray-100" onclick="window.location='{{ route('receipts.show', ['receipt' => $receipt]) }}';">
                    <td class="py-3 px-6">
                        {{ $receipt->id }}
                    </td>
                    <td class="py-3 px-6">
                        {{ $receipt->วันที่ออกใบเสร็จ }}
                    </td>
                    <td class="py-3 px-6">
                        {{ $receipt->รหัสคำสั่งซื้อ }}
                    </td>
                    <td class="py-3 px-6">
                        {{ $receipt->รหัสพนักงาน }}
                    </td>
                </tr>
                @endforeach
             </tbody>
        </table>
        </div>
    </section>

@endsection
