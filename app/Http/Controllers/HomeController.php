<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\Product;
use App\Models\customer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $customer = customer::all();
        $product = Product::all();
        $order = order::all();
        $totalAmount = number_format(Order::sum('totalprice'), 0, ',', '.');
        return view('dashboard',compact('customer','product','order','totalAmount'));
    }
}
