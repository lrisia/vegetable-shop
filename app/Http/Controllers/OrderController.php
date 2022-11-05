<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\OrderList;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $orders = Order::get();
//        return view('orders.index', ['orders' => $orders]);
        return redirect()->route('orders.ordering');
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
        $products = Product::all();
        return view('orders.create', [
            'orders' => $orders,
            'customers' => $customers,
            'employees' => $employees,
            'products' => $products
        ]);
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
            'วันที่นัดรับสินค้า' => 'required|date|after:yesterday',
        ]);
        $order = new Order;
        $order->วันที่สั่งซื้อ = Carbon::now();
        $order->วันที่นัดรับสินค้า = $request->input('วันที่นัดรับสินค้า');
        $order->รหัสลูกค้า = $request->input('รหัสลูกค้า');
        $order->รหัสพนักงาน = $request->input('รหัสพนักงาน');
        $order->save();

        $products = array_filter($request->except('_token'), function ($key) {
            if (str_contains($key, "จำนวนสินค้า")) return true;
        }, ARRAY_FILTER_USE_KEY);

        $total = 0;

        foreach ($products as $key => $amount) {
            if (is_null($amount)) continue;
            $product_id = explode("_", $key)[1];
            $product = Product::find($product_id);
            $orderList = new OrderList;
            $orderList->รหัสคำสั่งซื้อ = $order->order_id;
            $orderList->รหัสสินค้า = $product_id;
            $orderList->จำนวนสินค้า = $amount;
            $orderList->ราคารวมย่อย = $amount * $product->ราคาสินค้าต่อหน่วย;
            $orderList->save();

            $total += $orderList->ราคารวมย่อย;
        }
        $order->ราคารวมทั้งหมด = $total;
        $order->save();

        return redirect()->route('orders.show', [ 'order' => $order->order_id ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $orders = Order::all();
        $customer = Customer::find($order->รหัสลูกค้า);
        $orderLists = OrderList::where('รหัสคำสั่งซื้อ', $order->order_id)->get();
        $total = 0;
        foreach ($orderLists as $orderList) {
            $total += $orderList->ราคารวมย่อย;
        }
        return view('orders.show', [
            'order' => $order,
            'customer' => $customer,
            'orderLists' => $orderLists,
            'products' => Product::all(),
            'total' => $total,
            'total_text' => $this->convert($total),
            'employee' => Employee::find($order->รหัสพนักงาน)
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

    public function cancelOrder($id) {
        $order = Order::find($id);
        $orderLists = OrderList::where('รหัสคำสั่งซื้อ', $id)->get();
        if ($order->สถานะ === "รอชำระเงิน") {
            foreach ($orderLists as $orderList) {
                $product = Product::find($orderList->รหัสสินค้า);
                $product->จำนวนสินค้าคงคลัง += $orderList->จำนวนสินค้า;
                $product->จำนวนสินค้าที่ถูกจอง -= $orderList->จำนวนสินค้า;
                $product->save();
            }
        }
        $order->สถานะ = 'ปฏิเสธคำสั่งซื้อ';
        $order->save();
        return redirect()->route('orders.denied');
    }

    public function acceptOrder($id) {
        $order = Order::find($id);
        $orderLists = OrderList::where('รหัสคำสั่งซื้อ', $id)->get();
        foreach ($orderLists as $orderList) {
            $product = Product::find($orderList->รหัสสินค้า);
            if ($orderList->จำนวนสินค้า > $product->จำนวนสินค้าคงคลัง)
                throw ValidationException::withMessages(['ยืนยัน' => $product->ชื่อสินค้า]);
        }

        foreach ($orderLists as $orderList) {
            $product = Product::find($orderList->รหัสสินค้า);
            $product->จำนวนสินค้าคงคลัง -= $orderList->จำนวนสินค้า;
            $product->จำนวนสินค้าที่ถูกจอง += $orderList->จำนวนสินค้า;
            $product->save();
        }
        $order->สถานะ = 'รอชำระเงิน';
        $order->save();
        return redirect()->route('orders.accept');
    }

    public function paidOrder($id) {
        $order = Order::find($id);
        $order->สถานะ = 'รอรับสินค้า';
        $order->save();
        return redirect()->route('orders.waiting');
    }

    public function takeOrder($id) {
        $order = Order::find($id);
        $order->สถานะ = 'เสร็จสิ้น';
        $order->save();
        return redirect()->route('orders.done');
    }

    public function orderingPage() {
        $orders = Order::where('สถานะ', 'รอดำเนินการ')->get();
        return view('orders.index_ordering', ['orders' => $orders]);
    }

    public function acceptPage() {
        $orders = Order::where('สถานะ', 'รอชำระเงิน')->get();
        return view('orders.index_accept', ['orders' => $orders]);
    }

    public function deniedPage() {
        $orders = Order::where('สถานะ', 'ปฏิเสธคำสั่งซื้อ')->get();
        return view('orders.index_denied', ['orders' => $orders]);
    }

    public function waitingPage() {
        $orders = Order::where('สถานะ', 'รอรับสินค้า')->get();
        return view('orders.index_waiting', ['orders' => $orders]);
    }

    public function donePage() {
        $orders = Order::where('สถานะ', 'เสร็จสิ้น')->get();
        return view('orders.index_done', ['orders' => $orders]);
    }
}
