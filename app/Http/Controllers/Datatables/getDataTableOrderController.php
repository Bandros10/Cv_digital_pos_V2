<?php

namespace App\Http\Controllers\Datatables;

use App\Models\order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class getDataTableOrderController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $dataOrder = order::query()
        ->join("orderitems","orders.orderitem_id","=","orderitems.orderitem_id")
        ->selectRaw('DATE(orderitems.created_at) as transaksi_day,
            orders.orderitem_id as order_id,
            SUM(price_Qty) as total_pay')
        ->groupByRaw('transaksi_day,order_id')
        ->get();

        return DataTables::of($dataOrder)
        ->addColumn('action',function ($row){
            return '<a href="/order/show/'.$row->order_id.'" class="btn btn-sm btn-info"><i class="fas fa-info-circle"></i> Detail</a> <a href="/Order/delete/'.$row->id.'" class="btn btn-sm btn-danger"><i class="fas fa-exclamation-triangle"></i> Delete</a>';
        })
        ->editColumn('total_pay', function ($row) {
            return 'Rp ' . number_format($row->total_pay, 0, ',', '.');
        })->make(true);
    }
}
