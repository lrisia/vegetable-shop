@extends('layouts.main')

@section('content')
    <section>
        <div class="my-1 mt-10 px-8 py-2 flex flex-wrap justify-center">
            <a href="/products" class="m-4 block p-8 max-w-sm bg-[#F8F8F8] rounded-lg border border-gray-200 shadow-md hover:bg-gray-100">
                <img src="https://cdn-icons-png.flaticon.com/512/2153/2153788.png" class="m-1 p-2" width="120" height="120">
                <h2 class="text-center pt-3">สินค้าทั้งหมด</h2>
            </a>  
            <a href="/products/create" class="m-4 block p-8 max-w-sm bg-[#F8F8F8] rounded-lg border border-gray-200 shadow-md hover:bg-gray-100">
                <img src="https://cdn-icons-png.flaticon.com/512/7130/7130774.png" class="m-1 p-2" width="120" height="120">
                <h2 class="text-center pt-3">เพิ่มสินค้า</h2>
            </a>  
            <a href="/orders/create" class="m-4 block p-8 max-w-sm bg-[#F8F8F8] rounded-lg border border-gray-200 shadow-md hover:bg-gray-100">
                <img src="https://cdn-icons-png.flaticon.com/512/5530/5530389.png" class="m-1 p-2" width="120" height="120">
                <h2 class="text-center pt-3">สร้างคำสั่งซื้อ</h2>
            </a>  
            <a href="/orders" class="m-4 block p-8 max-w-sm bg-[#F8F8F8] rounded-lg border border-gray-200 shadow-md hover:bg-gray-100">
                <img src="https://cdn-icons-png.flaticon.com/512/1874/1874883.png" class="m-1 p-2" width="120" height="120">
                <h2 class="text-center pt-3">รายการคำสั่งซื้อ</h2>
            </a>
            <a href="/employees" class="m-4 block p-8 max-w-sm bg-[#F8F8F8] rounded-lg border border-gray-200 shadow-md hover:bg-gray-100">
                <img src="https://cdn-icons-png.flaticon.com/512/8327/8327833.png" class="m-1 p-2" width="120" height="120">
                <h2 class="text-center pt-3">รายชื่อพนักงาน</h2>
            </a>
            <a href="/employees/create" class="m-4 block p-8 max-w-sm bg-[#F8F8F8] rounded-lg border border-gray-200 shadow-md hover:bg-gray-100">
                <img src="https://cdn-icons-png.flaticon.com/512/5070/5070296.png" class="m-1 p-2" width="120" height="120">
                <h2 class="text-center pt-3">เพิ่มรายชื่อพนักงาน</h2>
            </a>
            <a href="/customers" class="m-4 block p-8 max-w-sm bg-[#F8F8F8] rounded-lg border border-gray-200 shadow-md hover:bg-gray-100">
                <img src="https://cdn-icons-png.flaticon.com/512/3194/3194712.png" class="m-1 p-2" width="120" height="120">
                <h2 class="text-center pt-3">รายชื่อลูกค้า</h2>
            </a>
            <a href="/customers/create" class="m-4 block p-8 max-w-sm bg-[#F8F8F8] rounded-lg border border-gray-200 shadow-md hover:bg-gray-100">
                <img src="https://cdn-icons-png.flaticon.com/512/3579/3579045.png" class="m-1 p-2" width="120" height="120">
                <h2 class="text-center pt-3">เพิ่มรายชื่อลูกค้า</h2>
            </a>
            <a href="/receipts/create" class="m-4 block p-8 max-w-sm bg-[#F8F8F8] rounded-lg border border-gray-200 shadow-md hover:bg-gray-100">
                <img src="https://cdn-icons-png.flaticon.com/512/8685/8685084.png" class="m-1 p-2" width="120" height="120">
                <h2 class="text-center pt-3">ออกใบเสร็จ</h2>
            </a>
            <a href="/receipts" class="m-4 block p-8 max-w-sm bg-[#F8F8F8] rounded-lg border border-gray-200 shadow-md hover:bg-gray-100">
                <img src="https://cdn-icons-png.flaticon.com/512/3753/3753033.png" class="m-1 p-2" width="120" height="120">
                <h2 class="text-center pt-3">รายการใบเสร็จ</h2>
            </a>
        </div>      
    </section>

@endsection
