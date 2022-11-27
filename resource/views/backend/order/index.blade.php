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
            <h6 class="m-0 font-weight-bold text-primary">Orders</h6>
           
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name and surname</th>
                            <th>Address</th> 
                            <th>Phone</th>
                            <th>Order Date</th>
                            <th>Order Status</th>
                            <th>Order Price</th>
                            <th>Status</th>
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
                                   <button class="btn btn-primary btnEdit" data-id="{{$order->id}}" >Edit</button>
                                   <button class="btn btn-success btnDetail" data-id="{{$order->id}}" >Detail</button>
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
          <h5 class="modal-title" id="editModalLabel"> Edit  </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="{{base_url("admin/edit-order")}}" method="POST" id="editForm" >
            <div class="modal-body">
                    <input type="hidden" name="id" value="">

                    <div class="form-group">
                        <label>Order Status </label>
                        <select name="order_status" class="form-control">
                            <option value="Yeni Sipariş"> New order </option>
                            <option value="Sipariş Hazırlanıyor"> Order Preparing </option>
                            <option value="Sipariş İptal Edildi"> Order Canceled </option>
                            <option value="Sipariş Yola Çıktı"> Order is On The Way </option>
                            <option value="Teslim Edilmedi"> Not Delivered </option>
                            <option value="Teslim Edildi"> Was Delivered </option>
                            <option value="Sipariş İade Edildi"> Order Returned </option>
                        </select>
                    </div>
                    
                    <div class="col-md-12" id="editProductsArea"></div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
       </form>
      </div>
    </div>
  </div>


  
  <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="detailModalLabel"> Detail  </h5>
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
                                    <th>Product İmage</th>
                                    <th>Product Name</th>
                                    <th>Product Price Paid</th>
                                    <th>Piece</th>
                                    <th>Options</th>
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
                            <h5>Order No</h5>
                            <span>#${order.id}</span>
                        </div>
                        <div class="col-md-6 bg-light border rounded">
                            <h5>Order Date</h5>
                            <span>${order.created_at}</span>
                        </div>

                        <div class="col-md-12 my-3 bg-light border rounded">
                            <h5>Delivery Address</h5>
                            
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Name and Surname</h5>
                                    <span>${order.first_name + " " + order.last_name}</span>
                                </div>
                                <div class="col-md-3">
                                    <h5>Phone no</h5>
                                    <span>${order.phone}</span>
                                </div>
                                <div class="col-md-3">
                                    <h5>E-Mail</h5>
                                    <span>${order.email}</span>
                                </div>
                                <div class="col-md-3">
                                    <h5>City</h5>
                                    <span>${order.city + " / " + order.country}</span>
                                </div>
                                <div class="col-md-3">
                                    <h5>Company name</h5>
                                    <span>${order.campany_name}</span>
                                </div>
                                <div class="col-md-3">
                                    <h5>Adres</h5>
                                    <span>${order.addres1 + "  " + order.addres2}</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-12 my-4 bg-light border rounded">
                            <h5>Payment information</h5>
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>Shipping Cost</h5>
                                    <span>${order.order_cargo_price}</span>
                                </div>
                                <div class="col-md-4">
                                    <h5>General Amount</h5>
                                    <span>${order.order_genereal_price}</span>
                                </div>

                                <div class="col-md-4">
                                    <h5>Total amount</h5>
                                    <span>${parseFloat(order.order_cargo_price) + parseFloat(order.order_genereal_price)}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 bg-light border rounded mb-4">
                            <h5>User Information who placed the order</h5>
                            <span>${user.name_surname + " - "+user.email}</span>
                        </div>



                        <div class="col-md-12">
                            <h5>Ürünler</h5>
                            
                            <table class="table table-sm bordered">
                                <thead>
                                    <th>Product Image</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Piece</th>
                                    <th>Options</th>
                                </thead>
                                <tbody>
                                   ${tableBody}
                                </tbody>
                            </table>

                        </div>


                    </div>
                    `;
                } else {
                    html = ` <h1> Detail data could not be retrieved. try again later </h1> `;
                }

                $("#editModalBody").html(html)

                $("#detailModal").modal("show");
         })
      })
        

    </script>

@endpush