<div class="mx-auto max-w-7xl">
    <div class="pt-4 flex">
        <h1 class="text-2xl">รายการคำสั่งซื้อ</h1>
        <div class="ml-auto">
            <a href="{{ route('orders.create') }}" class="bg-[#B3BA1E] p-3 rounded-lg ">
                + สร้างคำสั่งซื้อใหม่
            </a>
        </div>
    </div>

    <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px">
            <li class="mr-2">
                <a href="{{ route('orders.ordering') }}" class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 @if(Route::currentRouteName() === 'orders.ordering') current-order @endif">รอดำเนินการ</a>
            </li>
            <li class="mr-2">
                <a href="{{ route('orders.accept') }}" class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 @if(Route::currentRouteName() === 'orders.accept') current-order @endif">รอชำระเงิน</a>
            </li>
            <li class="mr-2">
                <a href="{{ route('orders.waiting') }}" class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 @if(Route::currentRouteName() === 'orders.waiting') current-order @endif">รอรับสินค้า</a>
            </li>
            <li class="mr-2">
                <a href="{{ route('orders.denied') }}" class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 @if(Route::currentRouteName() === 'orders.denied') current-order @endif">ปฏิเสธแล้ว</a>
            </li>
            <li>
                <a href="{{ route('orders.done') }}" class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 @if(Route::currentRouteName() === 'orders.done') current-order @endif">ปิดการขายแล้ว</a>
            </li>
        </ul>
    </div>
</div>
