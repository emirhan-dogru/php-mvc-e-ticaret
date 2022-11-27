@extends('frontend.layout')

@section('title' , $product['title'])

@push('css')
<style>
  .categoryItem:not(:last-child)::after{
    content: '-';
    margin-right: 5px;
    margin-left: 5px;
  }
</style>
@endpush

@section('content')
<!-- PRODUCT -->
<section class="pt-5">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="row">
            <div class="col-12 col-md-6">

              <!-- Card -->
              <div class="card">

                <!-- Badge -->
                @if($product['sale_price'] && $product['sale_price'] > 0) 
                <div class="badge badge-primary card-badge text-uppercase">
                  Discount
                </div>
                @endif

                <!-- Slider -->
                <div class="mb-4" data-flickity='{"draggable": false, "fade": true}' id="productSlider">

                  @foreach($images as $image)
                  <!-- Item -->
                  <a href="{{ base_url($image['image_path'] . '/' . $image['original_image']) }}" data-fancybox>
                    <img src="{{ base_url($image['image_path'] . '/' . $image['original_image']) }}" height="430px" alt="..." class="card-img-top">
                  </a>
                  @endforeach
                 

                </div>

              </div>

              <!-- Slider -->
              <div class="flickity-nav mx-n2 mb-10 mb-md-0" data-flickity='{"asNavFor": "#productSlider", "contain": true, "wrapAround": false}'>

                @foreach($images as $image)
                <!-- Item -->
                <div class="col-12 px-2" style="max-width: 113px;">
                  <!-- Image -->
                  <div class="embed-responsive embed-responsive-1by1 bg-cover" style="background-image: url({{ base_url($image['image_path'] . '/' . $image['small_image']) }});"></div>
                </div>
                @endforeach

              </div>

            </div>
            <div class="col-12 col-md-6 pl-lg-10">

              <!-- Header -->
              <div class="row mb-1">
                <div class="col">

                  @foreach($categories as $category)
                  <a class="text-muted categoryItem" href="">{{ $category['title'] }}</a>
                  @endforeach

                </div>
                <div class="col-auto">

                  <!-- Rating -->
                  <div class="rating font-size-xs text-dark" data-value="4">
                    <div class="rating-item">
                      <i class="fas fa-star"></i>
                    </div>
                    <div class="rating-item">
                      <i class="fas fa-star"></i>
                    </div>
                    <div class="rating-item">
                      <i class="fas fa-star"></i>
                    </div>
                    <div class="rating-item">
                      <i class="fas fa-star"></i>
                    </div>
                    <div class="rating-item">
                      <i class="fas fa-star"></i>
                    </div>
                  </div>

                  <a class="font-size-sm text-reset ml-2" href="#reviews">
                    Reviews (6)
                  </a>

                </div>
              </div>

              <!-- Heading -->
              <h3 class="mb-2">{{ $product['title'] }}</h3>

              <!-- Price -->
              <div class="mb-7">
                @if($product['sale_price'] && $product['sale_price'] > 0) 
                <span class="font-size-lg font-weight-bold text-gray-350 text-decoration-line-through">{{ $product['price'] }}</span>
                <span class="ml-1 font-size-h5 font-weight-bolder text-primary">{{ $product['sale_price'] }}</span>

                @else

                <span class="font-size-h5 font-weight-bolder text-primary">{{ $product['price'] }}</span>
                @endif
                
                <span class="font-size-sm ml-1">({{ $product['stock'] }})</span>
              </div>

              <!-- Form -->
              {!! auth()->get('userLogin') ? "<form action=". base_url("basket-add") . '/' . $product['id'] ." method=POST > " : '' !!}
                @foreach ($variants as $key => $variant)
                <div class="row mb-4 bg-light rounded border">
                  <div class="col-md-12 font-weight-bold">
                    {{ $key }}
                  </div>
                  @foreach ($variant as $item)
                  <div class="col-md-3 bg-white rounded border">
                    <label>
                   <input type="radio" name="variants[{{ $key }}]" value="{{ $item['id'] }}"><span class="ml-1">{{ $item['variant_value'] }}</span>
                    </label>
                  </div>
                  @endforeach
                </div>
                @endforeach
                <div class="form-group">




                  <div class="form-row mb-7">
                    <div class="col-12 col-lg-auto">

                      <!-- Quantity -->
                      <select class="custom-select mb-2" name="count">
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                      </select>

                    </div>
                    <div class="col-12 col-lg">

                      <!-- Submit -->
                      @if (auth()->get('userLogin'))
                      <button type="submit" class="btn btn-block btn-dark mb-2">
                        Add to Basket <i class="fe fe-shopping-cart ml-2"></i>
                      </button>
                      @else
                      <a href="{{ base_url('giris-yap') }}" class="btn btn-block btn-dark mb-2">
                        Add to Basket
                      </a>
                      @endif

                    </div>
                  </div>



                </div>
                {!! auth()->get('userLogin') ? "</form>" : '' !!}

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- DESCRIPTION -->
  <section class="pt-11">
    <div class="container">
      <div class="row">
        <div class="col-12">

          <!-- Nav -->
          <div class="nav nav-tabs nav-overflow justify-content-start justify-content-md-center border-bottom">
            <a class="nav-link active" data-toggle="tab" href="#descriptionTab">
              Description
            </a>
            <a class="nav-link" data-toggle="tab" href="#sizeTab">
              Size / Body
            </a>
            <a class="nav-link" data-toggle="tab" href="#shippingTab">
              Sales and Returns
            </a>
          </div>

          <!-- Content -->
          <div class="tab-content">
            <div class="tab-pane fade show active" id="descriptionTab">
              <div class="row justify-content-center py-9">
                <div class="col-12 col-lg-10 col-xl-8">
                  <div class="row">
                    <div class="col-12">
                      <!-- Text -->
                      <p class="text-gray-500">
                       {{ $product['description'] }}
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="sizeTab">
              <div class="row justify-content-center py-9">
                <div class="col-12 col-lg-10 col-xl-8">
                  <div class="row">
                    <div class="col-12 col-md-6">

                      <!-- Text -->
                      <p class="mb-4">
                        <strong>Fitting information:</strong>
                      </p>

                      <!-- List -->
                      <ul class="mb-md-0 text-gray-500">
                        <li>
                          Upon seas hath every years have whose
                          subdue creeping they're it were.
                        </li>
                        <li>
                          Make great day bearing.
                        </li>
                        <li>
                          For the moveth is days don't said days.
                        </li>
                      </ul>

                    </div>
                    <div class="col-12 col-md-6">

                      <!-- Text -->
                      <p class="mb-4">
                        <strong>Model measurements:</strong>
                      </p>

                      <!-- List -->
                      <ul class="list-unstyled text-gray-500">
                        <li>Height: 1.80 m</li>
                        <li>Bust/Chest: 89 cm</li>
                        <li>Hips: 91 cm</li>
                        <li>Waist: 65 cm</li>
                        <li>Model size: M</li>
                      </ul>



                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="shippingTab">
              <div class="row justify-content-center py-9">
                <div class="col-12 col-lg-10 col-xl-8">

                  <!-- Table -->
                  <div class="table-responsive">
                    <table class="table table-bordered table-sm table-hover">
                      <thead>
                        <tr>
                          <th>Shipping Options</th>
                          <th>Delivery Time</th>
                          <th>Price</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Standard Shipping</td>
                          <td>Delivery in 5 - 7 working days</td>
                          <td>$8.00</td>
                        </tr>
                        <tr>
                          <td>Express Shipping</td>
                          <td>Delivery in 3 - 5 working days</td>
                          <td>$12.00</td>
                        </tr>
                        <tr>
                          <td>1 - 2 day Shipping</td>
                          <td>Delivery in 1 - 2 working days</td>
                          <td>$12.00</td>
                        </tr>
                        <tr>
                          <td>Free Shipping</td>
                          <td>
                            Living won't the He one every subdue meat replenish
                            face was you morning firmament darkness.
                          </td>
                          <td>$0.00</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  <!-- Caption -->
                  <p class="mb-0 text-gray-500">
                    May, life blessed night so creature likeness their, for. <a class="text-body text-decoration-underline" href="#!">Find out more</a>
                  </p>

                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

  @if(count($CategoryProduct))
  <!-- PRODUCTS -->
  <section class="pt-11">
    <div class="container">
      <div class="row">
        <div class="col-12">

          <!-- Heading -->
          <h4 class="mb-10 text-center">Products That Might Interest You</h4>

          <!-- Items -->
          <div class="row">
            @foreach($CategoryProduct as $item)
            <div class="col-6 col-sm-6 col-md-4 col-lg-3">

              <!-- Card -->
              <div class="card mb-7">


                <!-- Image -->
                <div class="card-img">

                  <!-- Image -->
                  <a class="card-img-hover" href="{{ base_url("urun/" . $item->slug . "/" . $item->id)  }}">
                    <img class="card-img-top card-img-back" src="{{ base_url($item->image_path."/".$item->small_image) }}" alt="{{ $item->title }}">
                    <img class="card-img-top card-img-front" src="{{ base_url($item->image_path."/".$item->small_image) }}" alt="{{ $item->title }}">
                  </a>

                  <!-- Actions -->
                  <div class="card-actions">

                    <span class="card-action">
                      <button class="btn btn-xs btn-circle btn-white-primary" data-toggle="button">
                        <i class="fe fe-shopping-cart"></i>
                      </button>
                    </span>

                  </div>

                </div>

                <!-- Body -->
                <div class="card-body px-0">

                  <!-- Category -->
                  <div class="font-size-xs">
                    <a class="text-muted" href="#">{{ $item->category_title }}</a>
                  </div>

                  <!-- Title -->
                  <div class="font-weight-bold">
                    <a class="text-body" href="{{ base_url("urun/" . $item->slug . "/" . $item->id)  }}">
                      {{ $item->title }}
                    </a>
                  </div>

                  <!-- Price -->
                  <div class="font-weight-bold">
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
            @endforeach
          </div>

        </div>
      </div>
    </div>
  </section>
  @endif

  {{-- <!-- REVIEWS -->
  <section class="pt-9 pb-11" id="reviews">
    <div class="container">
      <div class="row">
        <div class="col-12">

          <!-- Heading -->
          <h4 class="mb-10 text-center">Yorumlar</h4>

          <!-- Header -->
          <div class="row align-items-center">
            <div class="col-12 col-md-auto">

              <!-- Dropdown -->
              <div class="dropdown mb-4 mb-md-0">

                <!-- Toggle -->
                <a class="dropdown-toggle text-reset" data-toggle="dropdown" href="#">
                  <strong>Sırala: Yeniler</strong>
                </a>

                <!-- Menu -->
                <div class="dropdown-menu mt-3">
                  <a class="dropdown-item" href="#!">Yeniler</a>
                  <a class="dropdown-item" href="#!">Eskiler</a>
                </div>

              </div>

            </div>
            <div class="col-12 col-md text-md-center">

              <!-- Rating -->
              <div class="rating text-dark h6 mb-4 mb-md-0" data-value="4">
                <div class="rating-item">
                  <i class="fas fa-star"></i>
                </div>
                <div class="rating-item">
                  <i class="fas fa-star"></i>
                </div>
                <div class="rating-item">
                  <i class="fas fa-star"></i>
                </div>
                <div class="rating-item">
                  <i class="fas fa-star"></i>
                </div>
                <div class="rating-item">
                  <i class="fas fa-star"></i>
                </div>
              </div>

              <!-- Count -->
              <strong class="font-size-sm ml-2">Reviews (3)</strong>

            </div>
            <div class="col-12 col-md-auto">

              <!-- Button -->
              <a class="btn btn-sm btn-dark" data-toggle="collapse" href="#reviewForm">
                Write Review
              </a>

            </div>
          </div>

          <!-- New Review -->
          <div class="collapse" id="reviewForm">

            <!-- Divider -->
            <hr class="my-8">

            <!-- Form -->
            <form>
              <div class="row">
                <div class="col-12 mb-6 text-center">

                  <!-- Text -->
                  <p class="mb-1 font-size-xs">
                    Score:
                  </p>

                  <!-- Rating form -->
                  <div class="rating-form">

                    <!-- Input -->
                    <input class="rating-input" type="range" min="1" max="5" value="5">

                    <!-- Rating -->
                    <div class="rating h5 text-dark" data-value="5">
                      <div class="rating-item">
                        <i class="fas fa-star"></i>
                      </div>
                      <div class="rating-item">
                        <i class="fas fa-star"></i>
                      </div>
                      <div class="rating-item">
                        <i class="fas fa-star"></i>
                      </div>
                      <div class="rating-item">
                        <i class="fas fa-star"></i>
                      </div>
                      <div class="rating-item">
                        <i class="fas fa-star"></i>
                      </div>
                    </div>

                  </div>

                </div>
                <div class="col-12 col-md-6">

                  <!-- Name -->
                  <div class="form-group">
                    <label class="sr-only" for="reviewName">Your Name:</label>
                    <input class="form-control form-control-sm" id="reviewName" type="text" placeholder="Your Name *" required>
                  </div>

                </div>
                <div class="col-12 col-md-6">

                  <!-- Email -->
                  <div class="form-group">
                    <label class="sr-only" for="reviewEmail">Your Email:</label>
                    <input class="form-control form-control-sm" id="reviewEmail" type="email" placeholder="Your Email *" required>
                  </div>

                </div>
                <div class="col-12">

                  <!-- Name -->
                  <div class="form-group">
                    <label class="sr-only" for="reviewTitle">Review Title:</label>
                    <input class="form-control form-control-sm" id="reviewTitle" type="text" placeholder="Review Title *" required>
                  </div>

                </div>
                <div class="col-12">

                  <!-- Name -->
                  <div class="form-group">
                    <label class="sr-only" for="reviewText">Review:</label>
                    <textarea class="form-control form-control-sm" id="reviewText" rows="5" placeholder="Review *" required></textarea>
                  </div>

                </div>
                <div class="col-12 text-center">

                  <!-- Button -->
                  <button class="btn btn-outline-dark" type="submit">
                    Post Review
                  </button>

                </div>
              </div>
            </form>

          </div>

          <!-- Reviews -->
          <div class="mt-8">

            <!-- Review -->
            <div class="review">
              <div class="review-body">
                <div class="row">
                  <div class="col-12 col-md-auto">

                    <div class="avatar avatar-xxl mb-6 mb-md-0">
                      <span class="avatar-title rounded-circle">
                        <i class="fa fa-user"></i>
                      </span>
                    </div>

                  </div>
                  <div class="col-12 col-md">

                    <!-- Header -->
                    <div class="row mb-6">
                      <div class="col-12">

                        <!-- Rating -->
                        <div class="rating font-size-sm text-dark" data-value="5">
                          <div class="rating-item">
                            <i class="fas fa-star"></i>
                          </div>
                          <div class="rating-item">
                            <i class="fas fa-star"></i>
                          </div>
                          <div class="rating-item">
                            <i class="fas fa-star"></i>
                          </div>
                          <div class="rating-item">
                            <i class="fas fa-star"></i>
                          </div>
                          <div class="rating-item">
                            <i class="fas fa-star"></i>
                          </div>
                        </div>

                      </div>
                      <div class="col-12">

                        <!-- Time -->
                        <span class="font-size-xs text-muted">
                          Logan Edwards, <time datetime="2019-07-25">25 Jul 2019</time>
                        </span>

                      </div>
                    </div>

                    <!-- Title -->
                    <p class="mb-2 font-size-lg font-weight-bold">
                      So cute!
                    </p>

                    <!-- Text -->
                    <p class="text-gray-500">
                      Justo ut diam erat hendrerit. Morbi porttitor, per eu. Sodales curabitur diam sociis. Taciti lobortis nascetur. Ante laoreet odio hendrerit.
                      Dictumst curabitur nascetur lectus potenti dis sollicitudin habitant quis vestibulum.
                    </p>

                    <!-- Footer -->
                    <div class="row align-items-center">
                      <div class="col-auto d-none d-lg-block">

                        <!-- Text -->
                        <p class="mb-0 font-size-sm">Bu yorum yardımcı oldumu?</p>

                      </div>
                      <div class="col-auto mr-auto">

                        <!-- Rate -->
                        <div class="rate">
                          <a class="rate-item" data-toggle="vote" data-count="3" href="#" role="button">
                            <i class="fe fe-thumbs-up"></i>
                          </a>
                          <a class="rate-item" data-toggle="vote" data-count="0" href="#" role="button">
                            <i class="fe fe-thumbs-down"></i>
                          </a>
                        </div>

                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>



          </div>

          <!-- Pagination -->
          <nav class="d-flex justify-content-center mt-9">
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
                <a class="page-link page-link-arrow" href="#">
                  <i class="fa fa-caret-right"></i>
                </a>
              </li>
            </ul>
          </nav>

        </div>
      </div>
    </div>
  </section> --}}
@endsection