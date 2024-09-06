@extends('home')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Data Product</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Product Edit</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Form Edit Product</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{route('product.update',$productById->id)}}" method="POST">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="exampleInputBorder">Name Product</label>
                                <input type="text" class="form-control form-control-border" name="nama_product" value="{{$productById->nama_product}}">
                            </div>
                            <div class="col-6">
                                <label for="exampleInputBorder">Harga Product</label>
                                <input type="text" class="form-control form-control-border" name="price" value="{{$productById->price}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="exampleInputBorder">Descripsi Produk</label>
                                <input type="text" class="form-control form-control-border" name="desc" value="{{$productById->desc}}">
                            </div>
                            <div class="col-6">
                                <label for="exampleInputBorder">Kategori Produk</label>
                                <input type="text" class="form-control form-control-border" name="category" value="{{$productById->category}}">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary form-control">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
