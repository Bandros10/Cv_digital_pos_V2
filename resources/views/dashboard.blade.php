@extends('home')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Dahboar</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">customer</span>
                  <span class="info-box-number">{{count($customer)}}</span>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-boxes"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Product</span>
                  <span class="info-box-number">{{count($product)}}</span>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3 bg-success">
                    <span class="info-box-icon"><i class="fas fa-tag"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Order</span>
                      <span class="info-box-number">{{count($order)}}</span>
                    </div>
                  </div>
            </div>
            <div class="col-sm-3 col-6">
                <div class="description-block border-right">
                  <h5 class="description-header">Rp. {{$totalAmount}}</h5>
                  <span class="description-text">TOTAL PROFIT</span>
                </div>
                <!-- /.description-block -->
              </div>
          </div>
    </div>
</div>
@endsection
