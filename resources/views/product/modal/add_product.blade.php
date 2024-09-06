<div class="modal fade" id="modal-add-product">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="add-form" action="{{route('product.create')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="exampleInputBorder">Name Product</label>
                                <input type="text" class="form-control form-control-border" name="nama_product" placeholder="Masukan Nama Product">
                            </div>
                            <div class="col-6">
                                <label for="exampleInputBorder">Harga Product</label>
                                <input type="text" class="form-control form-control-border" name="price" placeholder="Masukan Harga Product">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="exampleInputBorder">Descripsi Produk</label>
                                <input type="text" class="form-control form-control-border" name="desc" placeholder="Masukan Deskripsi Produk">
                            </div>
                            <div class="col-6">
                                <label for="exampleInputBorder">Kategori Produk</label>
                                <input type="text" class="form-control form-control-border" name="category" placeholder="Masukan Katagori Produk">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
