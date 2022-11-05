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

        <form class="my-8" action="{{ route('receipts.filter') }}" method="post">
            @csrf
            <h1 class="text-xl mb-4">ค้นหาข้อมูลใบเสร็จ</h1>
            <div class="grid md:grid-cols-4 md:gap-6">
                <div class="relative z-0 mb-6 w-full group">
                    <input type="number" name="receipt_id" id="receipt_id" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                    <label for="receipt_id" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">รหัสใบเสร็จ</label>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 mb-6 w-full group">
                        <input type="date" name="date_old" id="date_old" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                        <label for="date_old" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">วันที่เก่าที่สุด</label>
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <input type="date" name="date_new" id="date_new" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                        <label for="date_new" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">วันที่ใหม่ที่สุด</label>
                    </div>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input type="ืnumber" name="order_id" id="order_id" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                    <label for="order_id" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">รหัสคำสั่งซื้อ</label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input type="number" name="employee_id" id="employee_id" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                    <label for="employee_id" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">รหัสพนักงาน</label>
                </div>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                ค้นหา
            </button>
        </form>

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
                        {{ $receipt->receipt_id }}
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
