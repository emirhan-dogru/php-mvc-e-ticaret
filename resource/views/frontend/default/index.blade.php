@extends('frontend.layout')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-12">
        <h3 class="mb-10 text-center">Yeni Gelen Ürünler</h3>

      </div>
    </div>

    <div class="row">
      @foreach (App\Models\GetProductsView::get() as $item)
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

  </div>
@endsection