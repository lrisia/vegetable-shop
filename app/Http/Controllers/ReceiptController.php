<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\OrderList;
use App\Models\Product;
use App\Models\Receipt;
use App\Models\Employee;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receipts = Receipt::get();
        return view('receipts.index', ['receipts' => $receipts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders = Order::all();
        $employees = Employee::all();
        $receipts = Receipt::all();
        return view('receipts.create', ['orders' => $orders, 'receipts' => $receipts, 'employees' => $employees]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $receipt = new Receipt();
        $receipt->วันที่ออกใบเสร็จ = Carbon::now();
        $receipt->รหัสคำสั่งซื้อ = $request->input('รหัสคำสั่งซื้อ');
        $receipt->รหัสพนักงาน = $request->input('รหัสพนักงาน');
        $receipt->save();
        return redirect()->route('receipts.show', ['receipt' => $receipt]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function show(Receipt $receipt)
    {
        $order = Order::find($receipt->รหัสคำสั่งซื้อ);
        $customer = Customer::find($order->รหัสลูกค้า);
        $orderLists = OrderList::where('รหัสคำสั่งซื้อ', $order->order_id)->get();
        $total = 0;
        foreach ($orderLists as $orderList) {
            $total += $orderList->ราคารวมย่อย;
        }
        return view('receipts.show', [
            'receipt' => $receipt,
            'customer' => $customer,
            'orderLists' => $orderLists,
            'products' => Product::all(),
            'total' => $total,
            'employee' => Employee::find($receipt->รหัสพนักงาน)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function edit(Receipt $receipt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receipt $receipt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receipt $receipt)
    {
        //
    }
}
