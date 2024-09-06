<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\productrequest;

class ProductController extends Controller
{
    public function index(){
        return view("product.index");
    }

    public function create(productrequest $request){
        Product::create($request->validated());
        session()->flash('success', 'Data Product berhasil ditambah');
        return redirect()->route('product.index');
    }

    public function edit(product $product){
        $productById = product::find($product->id);
        return view ('product.edit',compact('productById'));
    }

    public function Update(productrequest $request,product $product){
        $product->update( $request->validated());
        session()->flash('success', 'Data Product berhasil diupdate');
        return view('product.index');
    }
}
