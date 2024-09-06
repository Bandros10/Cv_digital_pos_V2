<?php

namespace App\Http\Controllers\Select2Controller;

use App\Models\customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class getDataCustomerController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $search = $request->get('q');
        $customer = customer::where('name', 'like', '%' . $search . '%')->select('customers.*')->get();

        return response()->json($customer);
    }
}
