<nav class="bg-[#80b319] border-gray-200 px-2 sm:px-3 py-2.5">
    <div class="container flex flex-wrap justify-between items-center mx-auto">
        <a href="{{ url('/') }}" class="flex items-center">
            <span class="self-center text-xl font-semibold whitespace-nowrap font-mono text-white ml-1">
                <img src="https://cdn-icons-png.flaticon.com/512/1617/1617578.png" alt="" style="width: 70px">
            </span>
            <h1 class="text-3xl font-bold text-white ml-6">ระบบร้านขายผัก</h1>
        </a>
        <form class="w-2/4 m-1 mx-10" action="{{ route('products.search') }}" method="get">
            <label for="default-search" class="mb-2 text-gray-900 sr-only">Search</label>
            <div class="relative">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input name="search" type="search" id="default-search" class="block p-3 pl-10 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="ค้นหาสินค้า" required>
                <button type="submit" class="text-white absolute right-1.5 bottom-1.5  bg-[#B3BA1E] hover:bg-[#aeb347] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </button>
            </div>
        </form>
        <a href="{{ route('products.create') }}"
            class="block py-2 pr-4 pl-3 text-white text-lg rounded md:p-0 hover:underline" >
            เพิ่มสินค้า
        </a>
        <a href="{{ route('orders.create') }}"
            class="block py-2 pr-4 pl-3 text-white text-lg rounded md:p-0 hover:underline">
            สร้างคำสั่งซื้อ
        </a>
        <a href="{{ route('receipts.create') }}"
            class="block py-2 pr-4 pl-3 text-white text-lg rounded md:p-0 hover:underline" >
            ออกใบเสร็จ
        </a>
    </div>
</nav>

