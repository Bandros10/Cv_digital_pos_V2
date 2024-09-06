<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use App\Http\Requests\customerRequest;

class customerController extends Controller
{
    public function index(){
        return view('customer.index');
    }

    public function create(customerRequest $request){
        customer::create($request->validated());
        session()->flash('success', 'Data berhasil ditambah');
        return redirect()->back();
    }

    public function edit(customer $customer){
        $dataById = customer::find($customer->id);
        return view ('customer.edit',compact('dataById'));
    }

    public function Update(customerRequest $request,customer $customer){
        $customer->update( $request->validated());
        session()->flash('success', 'Data berhasil diupdate');
        return view('customer.index');
    }

    public function delete(customer $customer){
        $customer->delete();
        session()->flash('error', 'Data berhasil dihapus');
        return redirect()->back();
    }
}
