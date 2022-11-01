<?php

namespace App\Http\Controllers;

use App\Models\OrderList;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orderlists = Orderlist::all();
        $orders = Order::all();
        $products = Product::all();
        return view('orderlists.create', ['orderlists' => $orderlists, 'orders' => $orders, 'products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderList  $orderList
     * @return \Illuminate\Http\Response
     */
    public function show(OrderList $orderList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderList  $orderList
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderList $orderList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderList  $orderList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderList $orderList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderList  $orderList
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderList $orderList)
    {
        //
    }
}
