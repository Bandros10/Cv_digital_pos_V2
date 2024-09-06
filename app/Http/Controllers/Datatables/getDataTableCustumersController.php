<?php

namespace App\Http\Controllers\Datatables;

use App\Models\customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class getDataTableCustumersController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $dataCust = customer::select('customers.*');

        return DataTables::of($dataCust)->addColumn('action',function ($row){
            return '<a href="/Customers/edit/'.$row->id.'" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a> <a href="/Customers/delete/'.$row->id.'" class="btn btn-sm btn-danger"><i class="fas fa-exclamation-triangle"></i> Delete</a>';
        })->make(true);
    }
}
