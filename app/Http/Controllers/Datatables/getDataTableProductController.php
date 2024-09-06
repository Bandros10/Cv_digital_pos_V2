<?php

namespace App\Http\Controllers\Datatables;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class getDataTableProductController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $dataCust = Product::select('products.*');

        return DataTables::of($dataCust)->addColumn('action',function ($row){
            return '<a href="/product/edit/'.$row->id.'" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a> <a href="/product/delete/'.$row->id.'" class="btn btn-sm btn-danger"><i class="fas fa-exclamation-triangle"></i> Delete</a>';
        })->editColumn('price', function ($row) {
            return 'Rp ' . number_format($row->price, 0, ',', '.');
        })->make(true);
    }
}
