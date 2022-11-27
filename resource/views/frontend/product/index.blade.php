@extends('frontend.layout')

@section('content')
    <!-- BREADCRUMB -->
    <nav class="my-5">
        <div class="container">
          <div class="row">
            <div class="col-12">
  
              <!-- Breadcrumb -->
              <ol class="breadcrumb mb-0 font-size-xs text-gray-400">
                <li class="breadcrumb-item">
                  <a class="text-reset" href="#">Homepage</a>
                </li>
                <li class="breadcrumb-item active">
                 Product
                </li>
              </ol>
  
            </div>
          </div>
  
        </div>
      </nav>
  
  
      <section class="pt-7 pb-12">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <h3 class="mb-10 text-center">Product</h3>
  
            </div>
          </div>
  
  
          <div class="row">
            <div class="col-12">
  
              <!-- Filters -->
              <div class="btn-group-justified btn-group-expand-lg mb-10" role="group">
                <div class="btn-group dropdown">
  
                  <!-- Toggle -->
                  <button class="btn btn-sm btn-block btn-outline-border dropdown-toggle" data-toggle="dropdown" data-display="static">
                    Category
                  </button>
  
                  <div class="dropdown-menu">
                    @foreach (App\Models\categories::get() as $data)
                    <div class="card">
                      <div class="card-body">
                        <div class="form-group-overflow">
                          <div class="custom-control custom-control-text mb-3">
                            <a class="custom-control-label" href="{{ base_url("urunler/$data->slug") }}" >{{ $data->title }}</a>
                          </div>
  
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>

                  
  
                </div>
              </div>
  
            </div>
          </div>
  
          <div class="row">

            @foreach($product as $item)
            <div class="col-6 col-sm-6 col-md-4 col-lg-3">
              <div class="card mb-7" data-toggle="card-collapse">
                <a href="{{ base_url("urun/" . $item->slug . "/" . $item->id)  }}">
                <img class="card-img-top" src="{{ base_url($item->image_path."/".$item->small_image) }}" alt="..." height="247px" />
              </a>
                <div class="card-collapse-parent">
                  <div class="card-body px-0 pb-0 bg-white">
                    <div class="row no-gutters">
                      <div class="col">
                        <a class="d-block font-weight-bold text-body" href="{{ base_url("urun/" . $item->slug . "/" . $item->id)  }}">
                          {{ $item->title }}
                        </a>
      
                        <a class="font-size-xs text-muted" href="{{ base_url("kategori/$item->category_slug") }}">
                          {{ $item->category_title }}
                        </a>
      
                      </div>
                      <div class="col-auto">
      
                        @if( $item->sale_price > 0 )
      
                        <div class="font-size-sm text-muted small">
                          <del>  {{ $item->price }} TL</del>
                         </div>
      
                         <div class="font-size-sm font-weight-bold text-primary">
                          {{ $item->sale_price }} TL
                         </div>
      
                        @else
      
                        <div class="font-size-sm font-weight-bold text-primary">
                          {{ $item->price }} TL
                        </div>
      
                        @endif
      
                    
      
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
  
  
  
  
          </div>
  
{{--   
          <!-- Pagination -->
          <nav class="d-flex justify-content-center justify-content-md-end mt-10">
            <ul class="pagination pagination-sm text-gray-400">
              <li class="page-item">
                <a class="page-link page-link-arrow" href="#">
                  <i class="fa fa-caret-left"></i>
                </a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="#">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">2</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">3</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">4</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">5</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">6</a>
              </li>
              <li class="page-item">
                <a class="page-link page-link-arrow" href="#">
                  <i class="fa fa-caret-right"></i>
                </a>
              </li>
            </ul>
          </nav> --}}
  
        </div>
      </section>
@endsection