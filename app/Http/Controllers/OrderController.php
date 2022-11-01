<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::get();
        return view('orders.index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders = Order::all();
        $customers = Customer::all();
        $employees = Employee::all();
        return view('orders.create', ['orders' => $orders, 'customers' => $customers, 'employees' => $employees]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'วันที่นัดรับสินค้า' => ['required'],
        ]);
        $order = new Order;
        $order->วันที่สั่งซื้อ = Carbon::now();
        $order->วันที่นัดรับสินค้า = $request->input('วันที่นัดรับสินค้า');
        $order->รหัสลูกค้า = $request->input('รหัสลูกค้า');
        $order->รหัสพนักงาน = $request->input('รหัสพนักงาน');
        $order->save();
        return redirect()->route('orders.show', [ 'order' => $order->id ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $customers = Customer::all();
        $employees = Employee::all();
        return view('orders.show', ['order' => $order, 'customers' => $customers, 'employees' => $employees]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('orders.edit', ['order' => $order]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->วันที่สั่งซื้อ = $request->input('วันที่สั่งซื้อ');
        $order->วันที่นัดรับสินค้า = $request->input('วันที่นัดรับสินค้า');
        $order->สถานะ = $request->input('สถานะ');
        $order->save();
        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
