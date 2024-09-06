@extends('home')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Product</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Product</li>
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
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#modal-add-product">
                            Add Data Product
                        </button>
                        @include('product.modal.add_product')
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="dataProduct" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Product</th>
                                    <th>Kategori Product</th>
                                    <th>Deskripsi product</th>
                                    <th>Harga product</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    $('#dataProduct').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{route('data.product')}}',
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'nama_product',
                name: 'nama_product'
            },
            {
                data: 'category',
                name: 'category'
            },
            {
                data: 'desc',
                name: 'desc'
            },
            {
                data: 'price',
                name: 'peice'
            },
            {
                data: 'action',
                name: 'action',
            }
        ]
    });
</script>
@endpush



