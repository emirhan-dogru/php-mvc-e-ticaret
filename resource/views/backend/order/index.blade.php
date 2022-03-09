@extends("backend.layout")

@section( "content" )

{{-- 
    
    Sİpariş No                 = order_id
    Kim vermiş ( kullanıcı )   = user_id
    Adres (İl  - ilçe )        = order.country + order.city
    Teslim telefon no          = order.phone
    Toplam Ödenen tutar        = order_prdoucts içindeki ürünlerin fiyatı * adet
    Sipariş Durumu             = order_status
    İşemler ( düzenle, detay ) 
    
    --}}


<!-- Begin Page Content -->
<div class="container-fluid">

     @include('backend.default.alert')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center justify-content-between ">
            <h6 class="m-0 font-weight-bold text-primary">Siparişler</h6>
           
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Adı ve Soyadı</th>
                            <th>Adres</th> 
                            <th>Telefon</th>
                            <th>Sipariş Tarihi</th>
                            <th>Sipariş Durumu</th>
                            <th>Sipariş Tutarı</th>
                            <th>İşlem</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        

                        @foreach( App\Models\OrderListsView::orderBy("id", "desc")->get() as $order )
                            <tr>
                                <td> {{ $order->id }} </td>
                                <td> {{ $order->name_surname }} <br> <small>{{ $order->email }}</small> </td>
                                <td> {{ $order->addres }} </td>
                                <td> {{ $order->phone }} </td>
                                <td> {{ format_date( $order->created_at , "d F Y | H:m") }} </td>
                                <td> {{ $order->order_status }} </td>
                                <td> {{ $order->order_price }} </td>
                                <td> 
                                   <button class="btn btn-primary btnEdit" data-id="{{$order->id}}" >Düzenle</button>
                                   <button class="btn btn-success btnDetail" data-id="{{$order->id}}" >Detay</button>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->





  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel"> Düzenle  </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="{{base_url("admin/edit-order")}}" method="POST" id="editForm" >
            <div class="modal-body">
                    <input type="hidden" name="id" value="">

                    <div class="form-group">
                        <label>Sipariş Durumu </label>
                        <select name="order_status" class="form-control">
                            <option value="Yeni Sipariş"> Yeni Sipariş </option>
                            <option value="Sipariş Hazırlanıyor"> Sipariş Hazırlanıyor </option>
                            <option value="Sipariş İptal Edildi"> Sipariş İptal Edildi </option>
                            <option value="Sipariş Yola Çıktı"> Sipariş Yola Çıktı </option>
                            <option value="Teslim Edilmedi"> Teslim Edilmedi </option>
                            <option value="Teslim Edildi"> Teslim Edildi </option>
                            <option value="Sipariş İade Edildi"> Sipariş İade Edildi </option>
                        </select>
                    </div>
                    
                    <div class="col-md-12" id="editProductsArea"></div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
                <button type="submit" class="btn btn-primary">Kaydet</button>
            </div>
       </form>
      </div>
    </div>
  </div>


  
  <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="detailModalLabel"> Detay  </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div> 
        <div class="modal-body" id="editModalBody">
 
        </div> 
      </div>
    </div>
  </div>

@endsection


@push('js')
    <script>
 
      $(".btnEdit").on("click", function(){         
        const id = $(this).data("id")
        $("#editForm").find('[name="id"]').val(id);
        $.get(  "{{ base_url("api/getOrderDetail/" ) }}" + id  , function( response ){
                if( response.status ){
                    const {order, products, user} = response.data

                    let tableBody = "";
                    products.map( function(product){
                        let variants = "";

                        product.variants.map( function(variant){
                            variants += ` <div> ${variant.variant_name} : ${variant.variant_value} </div> `
                        } )

                        const imgUrl = "<?=base_url()?>"+product.image_path+"/"+product.small_image ;
                        tableBody+=`
                            <tr>
                                <td> <img src="${imgUrl}" height="50px" > </td>
                                <td> ${product.title} </td>
                                <td> ${product.product_price} </td>
                                <td> <input 
                                        class="form-control form-control-sm" 
                                        type="number" 
                                        value="${product.count}" 
                                        min="0" 
                                        name="product_count[${product.id}]" >  
                                 </td>
                                <td> ${variants} </td>
                            </tr> `;
                    } )

                    $("#editProductsArea").html(`
                        
                            <table class="table table-sm bordered">
                                <thead>
                                    <th>Ürün Resmi</th>
                                    <th>Ürün Adı</th>
                                    <th>Ürün Ödenen Bedel</th>
                                    <th>Adet</th>
                                    <th>Opsiyonlar</th>
                                </thead>
                                <tbody>
                                    ${tableBody}
                                </tbody>
                            </table>

                    `)

                $("#editModal").modal("show")              
                } else {
                    alert(response.message)
                }
        } );


      })


      $(".btnDetail").on("click", function(){
          const orderID = $(this).data("id")
         $.get(  "<?=base_url("api/getOrderDetail/")?>"+orderID , function(response){
                let html = "";

                if(response.status){
                    const {order, products, user} = response.data

                    let tableBody = "";
                    products.map( function(product){
                        let variants = "";

                        product.variants.map( function(variant){
                            variants += ` <div> ${variant.variant_name} : ${variant.variant_value} </div> `
                        } )

                        const imgUrl = "<?=base_url()?>"+product.image_path+"/"+product.small_image ;
                        tableBody+=`
                            <tr>
                                <td> <img src="${imgUrl}" height="50px" > </td>
                                <td> ${product.title} </td>
                                <td> ${product.product_price} </td>
                                <td> ${product.count} </td>
                                <td> ${variants} </td>
                            </tr> `;
                    } )

 
                    html = `
                    <div class="row">
                        <div class="col-md-6 bg-light border rounded">
                            <h5>Sipariş N</h5>
                            <span>#${order.id}</span>
                        </div>
                        <div class="col-md-6 bg-light border rounded">
                            <h5>Sipariş Tarihi</h5>
                            <span>${order.created_at}</span>
                        </div>

                        <div class="col-md-12 my-3 bg-light border rounded">
                            <h5>Teslim Adresi</h5>
                            
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Ad ve Soyad</h5>
                                    <span>${order.first_name + " " + order.last_name}</span>
                                </div>
                                <div class="col-md-3">
                                    <h5>Telefon no</h5>
                                    <span>${order.phone}</span>
                                </div>
                                <div class="col-md-3">
                                    <h5>E-Mail</h5>
                                    <span>${order.email}</span>
                                </div>
                                <div class="col-md-3">
                                    <h5>İl - İlçe</h5>
                                    <span>${order.city + " / " + order.country}</span>
                                </div>
                                <div class="col-md-3">
                                    <h5>Firma Adı</h5>
                                    <span>${order.campany_name}</span>
                                </div>
                                <div class="col-md-3">
                                    <h5>Adres</h5>
                                    <span>${order.addres1 + "  " + order.addres2}</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-12 my-4 bg-light border rounded">
                            <h5>Ödeme Bilgileri</h5>
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>Kargo Bedeli</h5>
                                    <span>${order.order_cargo_price}</span>
                                </div>
                                <div class="col-md-4">
                                    <h5>Genel Tutar</h5>
                                    <span>${order.order_genereal_price}</span>
                                </div>

                                <div class="col-md-4">
                                    <h5>Toplam Tutar</h5>
                                    <span>${parseFloat(order.order_cargo_price) + parseFloat(order.order_genereal_price)}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 bg-light border rounded mb-4">
                            <h5>Siparişi veren Kullanıcı Bilgileri</h5>
                            <span>${user.name_surname + " - "+user.email}</span>
                        </div>



                        <div class="col-md-12">
                            <h5>Ürünler</h5>
                            
                            <table class="table table-sm bordered">
                                <thead>
                                    <th>Ürün Resmi</th>
                                    <th>Ürün Adı</th>
                                    <th>Ürün Ödenen Bedel</th>
                                    <th>Adet</th>
                                    <th>Opsiyonlar</th>
                                </thead>
                                <tbody>
                                   ${tableBody}
                                </tbody>
                            </table>

                        </div>


                    </div>
                    `;
                } else {
                    html = ` <h1> Detay verisi çekilemedi. Daha sonra tekrar deneyin </h1> `;
                }

                $("#editModalBody").html(html)

                $("#detailModal").modal("show");
         })
      })
        

    </script>

@endpush