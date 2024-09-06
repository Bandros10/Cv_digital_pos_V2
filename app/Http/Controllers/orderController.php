<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\orderitem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\orderRequest;

class orderController extends Controller
{
    public function index(){
        // $orders = order::query()
        //     ->Join("orderitems","orders.orderitem_id","=","orderitems.orderitem_id")
        //     ->selectRaw('DATE(orderitems.created_at) as transaksi_day, orders.orderitem_id as order_id, SUM(price_Qty) as total_pay')
        //     ->groupByRaw('transaksi_day,order_id')
        //     ->get();
        //     // dd();
        return view("order.index");
    }

    public function create(orderRequest $request){
        $orderid = explode(" ",$request->customer_name)[0];
        $products = $request->input('Products');
        foreach($products as $product){
            $orderCreate = orderitem::create([
                    'orderitem_id' => $orderid."-"."ORD",
                    'product_id' => $product['product_id'],
                    'customer_name' => $request->customer_name,
                    'nama_product' => $product['nama_product'],
                    'order_Qty' => $product['order_Qty'],
                    'price_Qty' =>$product['price_Qty'],
            ]);
        }
        order::create([
            'orderitem_id' => $orderCreate->orderitem_id,
            'customer_name' => $request->customer_name,
            'totalprice' => $request->totalprice,
        ]);
        session()->flash('success', 'Berhasil melakukan order');
        return redirect()->back();
    }

    public function show($slug){
        $detail_order = DB::table('orderitems')->where('orderitem_id',$slug)->select('orderitems.*')->get();
        return view('order.show',compact('detail_order'));
    }
}
