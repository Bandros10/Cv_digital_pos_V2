<?php

namespace App\Http\Controllers\Select2Controller;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class getDataProductController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $search = $request->get('q');
        $products = Product::where('nama_product', 'like', '%' . $search . '%')->select('products.*')->get();

        return response()->json($products);
    }
}
