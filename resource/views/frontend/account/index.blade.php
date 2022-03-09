@extends('frontend.layout')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12 text-center">

      <!-- Heading -->
      <h3 class="mb-10">Hesabım</h3>

    </div>
  </div>
  <div class="row">
    <div class="col-12 col-md-3">

      <!-- Nav -->
      <nav class="mb-10 mb-md-0">
        <div class="list-group list-group-sm list-group-strong list-group-flush-x">


          <a class="list-group-item list-group-item-action dropright-toggle" href="{{ base_url('logout') }}">
            Çıkış Yap
          </a>
        </div>
      </nav>


    </div>
    <div class="col-12 col-md-9 col-lg-8 offset-lg-1">

            <!-- Order -->
            @foreach ($orders["data"] as $item) 
            
            <div class="card card-lg mb-5 border">
              <div class="card-body pb-0">

                <!-- Info -->
                <div class="card card-sm">
                  <div class="card-body bg-light">
                    <div class="row">
                      <div class="col-6 col-lg-3">

                        <!-- Heading -->
                        <h6 class="heading-xxxs text-muted">Sipariş No:</h6>

                        <!-- Text -->
                        <p class="mb-lg-0 font-size-sm font-weight-bold">
                          #{{$item["id"]}}
                        </p>

                      </div>
                      <div class="col-6 col-lg-3">

                        <!-- Heading -->
                        <h6 class="heading-xxxs text-muted">Sipariş Tar:</h6>

                        <!-- Text -->
                        <p class="mb-lg-0 font-size-sm font-weight-bold">
                          <time datetime="2019-10-01">
                            {{ format_date($item["created_at"]) }}
                          </time>
                        </p>

                      </div>
                      <div class="col-6 col-lg-3">

                        <!-- Heading -->
                        <h6 class="heading-xxxs text-muted">Durum:</h6>

                        <!-- Text -->
                        <p class="mb-0 font-size-sm font-weight-bold">
                          {{$item["order_status"]}}
                        </p>

                      </div>
                      <div class="col-6 col-lg-3">

                        <!-- Heading -->
                        <h6 class="heading-xxxs text-muted">Tutar:</h6>

                        <!-- Text -->
                        <p class="mb-0 font-size-sm font-weight-bold">
                          {{$item["order_price"]}} TL
                        </p>

                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="card-footer">
                <div class="row align-items-center">
                  <div class="col-12 col-lg-12">
                    <div class="form-row mb-4 mb-lg-0">             
                      
                      @foreach (App\Models\OrderProductsView::where("order_id", $item["id"] )->get() as $product)
      
                        <div class="col-md-2">
                          <a href="{{ base_url("urun/".$product->slug."/".$product->product_id ) }}">
                              <div class="embed-responsive embed-responsive-1by1 bg-cover"
                              style="background-image: url({{ base_url( $product->image_path."/".$product->small_image ) }});"></div>
                          </a> 
                        </div>

                      @endforeach
                     
                       
                      
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>

            @endforeach



      <!-- Pagination -->
      <nav class="d-flex justify-content-center justify-content-md-end mt-10">
        <ul class="pagination pagination-sm text-gray-400">
          @foreach ($orders["links"] as $item)
        <li class="page-item {{$item["active"]? "active" : "" }}">
          <a class="page-link " 

          href="{{ base_url("hesabim".$item["url"]) }}"

          >{!!
               $item["label"] == "Previous" ?
                '<i class="fa fa-caret-left"></i>'  :
                ( 
                  $item["label"] == "Next" ?
                   '<i class="fa fa-caret-right"></i>' : 
                   $item["label"] 
                )  
                !!}</a>
        </li> 
      @endforeach
        </ul>
      </nav>

    </div>
  </div>
</div>
@endsection