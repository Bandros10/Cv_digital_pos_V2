@extends('home')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Show data</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Order</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">ORDER</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nama Product</th>
                                    <th>Banyaknya order</th>
                                    <th>Harga order</th>
                                    <th>Tanggal order</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detail_order as $detail)
                                    <tr>
                                        <td>{{$detail->nama_product}}</td>
                                        <td>{{$detail->order_Qty}}</td>
                                        <td>{{'Rp. '. number_format($detail->price_Qty, 0, ',', '.')}}</td>
                                        <td>{{\Carbon\Carbon::parse($detail->created_at)->format('d F Y')}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
