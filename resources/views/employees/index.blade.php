@extends('layouts.main')

@section('content')
    <section class="mx-8">
        <div class="pt-4 flex">
            <h1 class="text-2xl">รายชื่อพนักงานทั้งหมด</h1>
            <div class="ml-auto">
                <a href="{{ route('employees.create') }}" class="bg-[#B3BA1E] p-3 rounded-lg ">
                    + เพิ่มรายชื่อพนักงาน
                </a>
            </div>
        </div>
        <div class="mt-4 overflow-x-auto relative shadow-md sm:rounded">
        <table class="w-full text-left text-gray-60 mr-0">
            <thead class="text-lg text-gray-700 bg-gray-200">
                <tr>
                    <th scope="col" class="py-3 px-6">รหัสพนักงาน</th>
                    <th scope="col" class="py-3 px-6">ชื่อพนักงาน</th>
                    <th scope="col" class="py-3 px-6">เบอร์โทรพนักงาน</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            
            <tbody class="m-2">
                @foreach($employees as $employee)
                <tr class="border-t">
                    <td class="py-3 px-6">
                        {{ $employee->employee_id }}
                    </td>
                    <td class="py-3 px-6">
                        {{ $employee->ชื่อพนักงาน }}
                    </td>
                    <td class="py-3 px-6">
                        {{ $employee->เบอร์โทรพนักงาน }}
                    </td>
                    <td>
                        <div>
                            <a class="text-gray-600 text-sm p-2 m-3 ml-0.5 rounded bg-gray-200 hover:bg-gray-300" href="{{ route('employees.edit', ['employee' => $employee->employee_id]) }}">
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
