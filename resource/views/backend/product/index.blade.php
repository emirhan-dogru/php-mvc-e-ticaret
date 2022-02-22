@extends("backend.layout")

@section( "content" )


        <!-- Begin Page Content -->
        <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Ürünler</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ürünler</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Fotoğraf</th>
                        <th>Ürün Adı</th>
                        <th>Fiyatı</th>
                        <th>İndirim</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>İşlem</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(App\Models\GetProductsView::orderBy('id' , 'DESC')->get() as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td><img height="100" src="{{ base_url($product->image_path) . '/' . $product->small_image }}" alt=""></td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->sale_price }}</td>
                        <td>-</td>
                        <td>{{ $product->stock }}</td>
                        <td>buraya button gelicek</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

@endsection