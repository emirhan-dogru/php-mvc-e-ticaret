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
                    673290789
                  </p>

                </div>
                <div class="col-6 col-lg-3">

                  <!-- Heading -->
                  <h6 class="heading-xxxs text-muted">Sipariş Tar:</h6>

                  <!-- Text -->
                  <p class="mb-lg-0 font-size-sm font-weight-bold">
                    <time datetime="2019-10-01">
                      01 Oct, 2019
                    </time>
                  </p>

                </div>
                <div class="col-6 col-lg-3">

                  <!-- Heading -->
                  <h6 class="heading-xxxs text-muted">Durum:</h6>

                  <!-- Text -->
                  <p class="mb-0 font-size-sm font-weight-bold">
                    Yeni Sipariş
                  </p>

                </div>
                <div class="col-6 col-lg-3">

                  <!-- Heading -->
                  <h6 class="heading-xxxs text-muted">Tutar:</h6>

                  <!-- Text -->
                  <p class="mb-0 font-size-sm font-weight-bold">
                    999.99 TL
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
                <div class="col-md-2">

                  <!-- Image -->
                  <div class="embed-responsive embed-responsive-1by1 bg-cover" style="background-image: url(assets/img/products/product-5.jpg);"></div>

                </div>
                <div class="col-md-2">

                  <!-- Image -->
                  <div class="embed-responsive embed-responsive-1by1 bg-cover" style="background-image: url(assets/img/products/product-112.jpg);"></div>

                </div>
                <div class="col-md-2">

                  <!-- Image -->
                  <div class="embed-responsive embed-responsive-1by1 bg-cover" style="background-image: url(assets/img/products/product-7.jpg);"></div>

                </div>
                <div class="col-md-2">

                  <!-- Image -->
                  <div class="embed-responsive embed-responsive-1by1 bg-light">
                    <a class="embed-responsive-item embed-responsive-item-text text-reset" href="#!">
                      <div class="font-size-xxs font-weight-bold">
                        +2 <br> Ürün
                      </div>
                    </a>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>



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
      </nav>

    </div>
  </div>
</div>
@endsection