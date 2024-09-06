@extends('home')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Order</h1>
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
                        <br>
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#modal-add-order">
                            New Order
                        </button>
                        @include('order.modal.add_order')
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="dataOrder" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Order Id</th>
                                    <th>Total transaksi</th>
                                    <th>Transaksi hari</th>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
<script>

$('#dataOrder').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{route('data.order')}}',
        columns: [{
                data: 'order_id',
                name: 'order_id'
            },
            {
                data: 'total_pay',
                name: 'total_pay'
            },
            {
                data: 'transaksi_day',
                name: 'transaksi_day'
            },
            {
                data: 'action',
                name: 'action',
            }
        ]
    });


    $('#customer-data').select2({
        placeholder: 'Select a customer',
        ajax: {
            url: '{{ route('data.customer.select') }}',
            dataType: 'json',
            delay: 250, // Tunggu 250ms sebelum mengirim request
            data: function (params) {
                return {
                    q: params.term // Kirim kata kunci pencarian ke server
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            id: item.name,
                            text: item.name,
                        };
                    })
                };
            },
            cache: true
        }
    });

    $(document).ready(function () {
        // Inisialisasi Repeater
        $('#repeater').repeater({
            initEmpty: false,
            show: function () {
                $(this).slideDown();
                initSelect2($(this));
                calculateGrandTotal();
            },
            hide: function (deleteElement) {
                if(confirm('Are you sure you want to delete this item?')) {
                    $(this).slideUp(deleteElement);
                    calculateGrandTotal();
                }
            }
        });

        function initSelect2(container) {
            container.find('.select2_data').select2({
                ajax: {
                    url: '{{route('data.product.select')}}',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term // query term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    id: item.nama_product,
                                    product_id: item.id,
                                    text: item.id + ' - ' + item.nama_product,
                                    price: item.price
                                };
                            })
                        };
                    },
                    cache: true
                },
                theme: "classic",
            }).on('select2:select', function (e) {
                let selectedValue = $(this).val();
                let isDuplicate = false;

                // Cek apakah nilai yang sama sudah dipilih
                $('.select2_data').not(this).each(function () {
                    if ($(this).val() === selectedValue) {
                        isDuplicate = true;
                        return false; // Keluar dari loop
                    }
                });

                if (isDuplicate) {
                    // Jika duplikat, tampilkan alert dan reset pilihan
                    alert('Item ini sudah dipilih sebelumnya. Pilih item yang lain.');
                    $(this).val(null).trigger('change');
                }
            });

            // Handle selection
            container.find('.select2_data').on('select2:select', function (e) {
                var selectedProduct = e.params.data;
                container.find('.ProductId').val(selectedProduct.product_id);
            });

            container.find('.select2_data').on('select2:select', function (e) {
                var selectedProduct = e.params.data;
                container.find('.hargasatuan').val(selectedProduct.price);
                totalPriceQty(container);
            });

            container.find('.orderQty').on('input', function() {
                totalPriceQty(container);
            });
        }
        function totalPriceQty(container) {
            var price = parseFloat(container.find('.hargasatuan').val()) || 0;
            var quantity = parseInt(container.find('.orderQty').val()) || 1;
            var total = price * quantity;
            container.find('.priceQty').val(total.toFixed(2));
            calculateGrandTotal();
        }

        function calculateGrandTotal() {
            var grandTotal = 0;
            $('.priceQty').each(function() {
                var total = parseFloat($(this).val()) || 0;
                grandTotal += total;
            });
            // $('#repeater [data-repeater-item]').each(function() {
            //     var price = parseFloat($(this).find('.hargasatuan').val()) || 0;
            //     var quantity = parseInt($(this).find('.orderQty').val()) || 1;
            //     grandTotal += price * quantity;
            // });
            $('#totalOrder').val(grandTotal.toFixed(2));
        }

        // Initialize Select2 for the first repeater item
        initSelect2($('#repeater'));
        calculateGrandTotal();
    });
</script>
@endpush
