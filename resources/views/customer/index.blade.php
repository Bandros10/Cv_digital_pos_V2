@extends('home')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Customer</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Customer</li>
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
                        <h3 class="card-title">Customers Data Index</h3>
                        <br>
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#modal-add-customer">
                            Add Data Customer
                        </button>
                        @include('customer.modal.add_customer')
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="dataCustomer" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Contact</th>
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
    $('#dataCustomer').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('data.customer') }}',
        columns: [
            {
                data: 'id',
                name: 'id'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'contact',
                name: 'contact'
            },
            {
                data: 'action',
                name: 'action',
            }
        ]
    });
</script>
@endpush
