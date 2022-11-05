@extends('layouts.main')

@section('content')
    @include('orders.index_layout')
    <section class="mx-8">
    <h2 class="text-xl mt-4 text-blue-500">รายการสั่งซื้อที่รอชำระเงิน</h2>
    <div class="mt-4 overflow-x-auto relative shadow-md sm:rounded">
        <table class="w-full text-left text-gray-60 mr-0">
            <thead class="text-lg text-gray-700 bg-blue-200">
            <tr>
                <th scope="col" class="py-3 px-4">รหัสคำสั่งซื้อ</th>
                <th scope="col" class="py-3 px-6">วันที่สั่งซื้อ</th>
                <th scope="col" class="py-3 px-6">วันที่นัดรับสินค้า</th>
                <th scope="col" class="py-3 px-6">รหัสลูกค้า</th>
                <th scope="col" class="py-3 px-6">รหัสพนักงาน</th>
                <th scope="col" class="py-3 px-6">ราคารวมทั้งหมด</th>
                <th scope="col" class="py-3 px-6">สถานะ</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>

            <tbody class="m-2">
            @foreach($orders as $order)
                @if($order->สถานะ == 'รอชำระเงิน')
                    <tr class="border-t hover:bg-gray-100">
                        <td class="py-3 px-4">
                            <a href=" {{ route( 'orders.show' , ['order' => $order->order_id]) }}">
                                {{ $order->order_id }}
                            </a>
                        </td>
                        <td class="py-3 px-6">
                            {{ $order->วันที่สั่งซื้อ }}
                        </td>
                        <td class="py-3 px-6">
                            {{ $order->วันที่นัดรับสินค้า }}
                        </td>
                        <td class="py-3 px-6">
                            <a href="" class="hover:underline hover:text-gray-700 ">
                                {{ $order->รหัสลูกค้า }}
                            </a>
                        </td>
                        <td class="py-3 px-6">
                            <a href="" class="hover:underline hover:text-gray-700 ">
                                {{ $order->รหัสพนักงาน }}
                            </a>
                        </td>
                        <td class="py-3 px-6">
                            {{ number_format($order->ราคารวมทั้งหมด) }}
                        </td>
                        <td class="py-3 px-6">
                            {{ $order->สถานะ }}
                        </td>
                        <td>
                            <div>
                                <a  href="{{ route('orders.cancel', ['id' => $order->order_id]) }}"
                                    class="text-sm px-2 py-1.5 mx-3 my-2 ml-0.5 rounded bg-red-400 hover:bg-red-300"
                                >
                                    ปฏิเสธ
                                </a>
                            </div>
                            <form action="{{ route('orders.cancel', ['id' => $order->order_id]) }}" method="get">
                                @csrf
{{--                                <div hidden id="popup">--}}
{{--                                    <div id="popup-modal" tabindex="-1"--}}
{{--                                         class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center flex"--}}
{{--                                         aria-modal="true" role="dialog">--}}
{{--                                        <div class="relative p-4 w-full max-w-md h-full md:h-auto">--}}
{{--                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">--}}
{{--                                                <button type="button"--}}
{{--                                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"--}}
{{--                                                        data-modal-toggle="popup-modal">--}}
{{--                                                    <!-- <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg> -->--}}
{{--                                                </button>--}}
{{--                                                <div class="p-6 text-center">--}}
{{--                                                    <!-- <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> -->--}}
{{--                                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">--}}
{{--                                                        แน่ใจหรือไม่ว่าจะปฏิเสธคำสั่งซื้อนี้--}}
{{--                                                        การกระทำนี้ไม่สามารถย้อนกลับได้</h3>--}}
{{--                                                    <button method="post" type="submit"--}}
{{--                                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">--}}
{{--                                                        ตกลง--}}
{{--                                                    </button>--}}
{{--                                                    <button type="button"--}}
{{--                                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10"--}}
{{--                                                            onclick="hideDelete()">ยกเลิก--}}
{{--                                                    </button>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <script>--}}
{{--                                    function showDelete() {--}}
{{--                                        document.getElementById("popup").hidden = false;--}}
{{--                                    }--}}

{{--                                    function hideDelete() {--}}
{{--                                        document.getElementById("popup").hidden = true;--}}
{{--                                    }--}}
{{--                                </script>--}}
                            </form>
                        </td>
                        <td>
                            <div>
                                <a class="text-sm p-2 m-3 ml-0.5 rounded bg-green-300 hover:bg-green-200"
                                   href="{{ route('orders.paid', ['id' => $order->order_id]) }}">
                                    ชำระแล้ว
                                </a>
                            </div>
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
