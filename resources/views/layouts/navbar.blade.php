<nav class="bg-[#80b319] border-gray-200 px-2 sm:px-3 py-2.5">
  <div class="container flex flex-wrap justify-between items-center mx-auto">
    <a href="{{ url('/') }}" class="flex items-center">
        <span class="self-center text-xl font-semibold whitespace-nowrap font-mono text-white ml-1">
            <img src="https://cdn-icons-png.flaticon.com/512/1617/1617578.png" alt="" style="width: 70px">
        </span>
        <h1 class="text-3xl font-bold text-white ml-6">ระบบร้านขายผัก</h1>
    </a>
  <div class="flex md:order-1">
    <button data-collapse-toggle="navbar-search" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-search" aria-expanded="false">
      <span class="sr-only">Open menu</span>
      <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
    </button>
  </div>
    <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-last" id="navbar-search">
        <form class="w-3/4" action="{{ route('products.search') }}" method="get">
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
      <ul class="flex flex-auto w-full ml-10">
        <li>
            <a href="{{ route('products.create') }}"
                class="mr-4 text-white text-lg rounded  md:p-0 hover:underline">
                เพิ่มสินค้า
            </a>
        </li>
        <li>        
            <a href="{{ route('orders.create') }}"
                class="mr-2 text-white text-lg rounded md:p-0 hover:underline">
                สร้างคำสั่งซื้อ
            </a>
        </li>
        <li>
            <a href="{{ route('receipts.create') }}"
                class="ml-2 text-white text-lg rounded md:p-0 hover:underline" >
                ออกใบเสร็จ
            </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
