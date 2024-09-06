<div class="modal fade" id="modal-add-order">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">NEW ORDER</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" action="{{Route('order.create')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="input" class="control-label">Nama Customer</label><i class="bar"></i>
                        <select class="form-control" id="customer-data" name="customer_name">
                        </select>
                        {{-- <input type="text" class="form-control" readonly name="customer_name"> --}}
                    </div>
                    <div id="repeater">
                        <button type="button" data-repeater-create class="btn btn-primary form-control">Tambah Product</button>
                        <div data-repeater-list="Products">
                            <div data-repeater-item>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" hidden required name="Products[][product_id]" class="ProductId">
                                            <label for="product" class="control-label">Nama Product</label><i class="bar"></i>
                                            <select class="form-control select2_data" name="Products[][nama_product]" required>
                                                <option value="">Select Product</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="harga" class="control-label">Harga per lembar</label><i class="bar"></i>
                                            <input type="text" readonly class="form-control hargasatuan">
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="product" class="control-label">jumlah Order</label><i class="bar"></i>
                                            <input type="text" required inputmode="numeric" name="Products[][order_Qty]" class="form-control orderQty" value="1" min="1">
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="product" class="control-label">Aksi</label><i class="bar"></i>
                                            <button type="button" data-repeater-delete class="btn btn-danger form-control">Delete</button>
                                        </div>
                                        <input type="text" hidden required name="Products[][price_Qty]" class="priceQty">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                            <div class="col-6" class="right">
                                <input type="text" id="totalOrder" name="totalprice" readonly class="form-control">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
