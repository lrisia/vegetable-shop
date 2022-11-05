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
            'total_text' => $this->convert($total),
            'employee' => Employee::find($receipt->รหัสพนักงาน)
        ]);
    }

    function convert($number){
        $txtnum1 = array('ศูนย์','หนึ่ง','สอง','สาม','สี่','ห้า','หก','เจ็ด','แปด','เก้า','สิบ');
        $txtnum2 = array('','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน');
        $number = str_replace(",","",$number);
        $number = str_replace(" ","",$number);
        $number = str_replace("บาท","",$number);
        $number = explode(".",$number);
        if(sizeof($number)>2){
            return $number;
        }
        $strlen = strlen($number[0]);
        $convert = '';
        for($i=0;$i<$strlen;$i++){
            $n = substr($number[0], $i,1);
            if($n != 0){
                if($i==($strlen-1) AND $n==1){ $convert .=
                    'เอ็ด'; }
                elseif($i==($strlen-2) AND $n==2){
                    $convert .= 'ยี่'; }
                elseif($i==($strlen-2) AND $n==1){
                    $convert .= ''; }
                else{ $convert .= $txtnum1[$n]; }
                $convert .= $txtnum2[$strlen-$i-1];
            }
        }
        $convert .= 'บาทถ้วน';
        return $convert;
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

    public function filter(Request $request) {
        $receipts = Receipt::get();
        $filtered = false;
        if (!is_null($request->get('receipt_id'))) {
            $filtered = true;
            $receipts = $receipts->where('receipt_id', $request->get('receipt_id'));
        }
        if (!is_null($request->get('date_old'))) {
            $filtered = true;
            $receipts = $receipts->where('วันที่ออกใบเสร็จ', '>=', $request->get('date_old'));
        }
        if (!is_null($request->get('date_new'))) {
            $filtered = true;
            $receipts = $receipts->where('วันที่ออกใบเสร็จ', '<=', $request->get('date_new'));
        }
        if (!is_null($request->get('order_id'))) {
            $filtered = true;
            $receipts = $receipts->where('รหัสคำสั่งซื้อ', $request->get('order_id'));
        }
        if (!is_null($request->get('employee_id'))) {
            $filtered = true;
            $receipts = $receipts->where('รหัสพนักงาน', $request->get('employee_id'));
        }

        if ($filtered) return view('receipts.index', ['receipts' => $receipts]);
        return redirect()->route('receipts.index');
    }
}
