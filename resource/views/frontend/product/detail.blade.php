@extends('frontend.layout')

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
                <div class="badge badge-primary card-badge text-uppercase">
                  Sale
                </div>

                <!-- Slider -->
                <div class="mb-4" data-flickity='{"draggable": false, "fade": true}' id="productSlider">

                  <!-- Item -->
                  <a href="assets/img/products/product-7.jpg" data-fancybox>
                    <img src="assets/img/products/product-7.jpg" alt="..." class="card-img-top">
                  </a>

                  <!-- Item -->
                  <a href="assets/img/products/product-122.jpg" data-fancybox>
                    <img src="assets/img/products/product-122.jpg" alt="..." class="card-img-top">
                  </a>

                  <!-- Item -->
                  <a href="assets/img/products/product-146.jpg" data-fancybox>
                    <img src="assets/img/products/product-146.jpg" alt="..." class="card-img-top">
                  </a>

                </div>

              </div>

              <!-- Slider -->
              <div class="flickity-nav mx-n2 mb-10 mb-md-0" data-flickity='{"asNavFor": "#productSlider", "contain": true, "wrapAround": false}'>

                <!-- Item -->
                <div class="col-12 px-2" style="max-width: 113px;">

                  <!-- Image -->
                  <div class="embed-responsive embed-responsive-1by1 bg-cover" style="background-image: url(assets/img/products/product-7.jpg);"></div>

                </div>

                <!-- Item -->
                <div class="col-12 px-2" style="max-width: 113px;">

                  <!-- Image -->
                  <div class="embed-responsive embed-responsive-1by1 bg-cover" style="background-image: url(assets/img/products/product-122.jpg);"></div>

                </div>

                <!-- Item -->
                <div class="col-12 px-2" style="max-width: 113px;">

                  <!-- Image -->
                  <div class="embed-responsive embed-responsive-1by1 bg-cover" style="background-image: url(assets/img/products/product-146.jpg);"></div>

                </div>

              </div>

            </div>
            <div class="col-12 col-md-6 pl-lg-10">

              <!-- Header -->
              <div class="row mb-1">
                <div class="col">

                  <!-- Preheading -->
                  <a class="text-muted" href="shop.html">Sneakers</a>

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
              <h3 class="mb-2">Leather Sneakers</h3>

              <!-- Price -->
              <div class="mb-7">
                <span class="font-size-lg font-weight-bold text-gray-350 text-decoration-line-through">$115.00</span>
                <span class="ml-1 font-size-h5 font-weight-bolder text-primary">$85.00</span>
                <span class="font-size-sm ml-1">(In Stock)</span>
              </div>

              <!-- Form -->
              <form>
                <div class="form-group">

                  <!-- Label -->
                  <p class="mb-5">
                    Color: <strong id="colorCaption">White</strong>
                  </p>



                </div>
                <div class="form-group">




                  <div class="form-row mb-7">
                    <div class="col-12 col-lg-auto">

                      <!-- Quantity -->
                      <select class="custom-select mb-2">
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                      </select>

                    </div>
                    <div class="col-12 col-lg">

                      <!-- Submit -->
                      <button type="submit" class="btn btn-block btn-dark mb-2">
                        Sepete Ekle <i class="fe fe-shopping-cart ml-2"></i>
                      </button>

                    </div>
                  </div>



                </div>
              </form>

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
              Açıklama
            </a>
            <a class="nav-link" data-toggle="tab" href="#sizeTab">
              Ölçü / Beden
            </a>
            <a class="nav-link" data-toggle="tab" href="#shippingTab">
             Satış ve İade
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
                        Won't herb first male seas, beast. Let upon, female upon third fifth every. Man subdue rule after years herb after
                        form. And image may, morning. Behold in tree day sea that together cattle whose. Fifth gathering brought
                        bearing. Abundantly creeping whose. Beginning form have void two. A whose.
                      </p>

                    </div>
                    <div class="col-12 col-md-6">

                      <!-- List -->
                      <ul class="list list-unstyled mb-md-0 text-gray-500">
                        <li>
                          <strong class="text-body">SKU</strong>: #61590437
                        </li>
                        <li>
                          <strong class="text-body">Occasion</strong>: Lifestyle, Sport
                        </li>
                        <li>
                          <strong class="text-body">Country</strong>: Italy
                        </li>
                      </ul>

                    </div>
                    <div class="col-12 col-md-6">

                      <!-- List -->
                      <ul class="list list-unstyled mb-0">
                        <li>
                          <strong>Outer</strong>: Leather 100%, Polyamide 100%
                        </li>
                        <li>
                          <strong>Lining</strong>: Polyester 100%
                        </li>
                        <li>
                          <strong>CounSoletry</strong>: Rubber 100%
                        </li>
                      </ul>

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

  <!-- PRODUCTS -->
  <section class="pt-11">
    <div class="container">
      <div class="row">
        <div class="col-12">

          <!-- Heading -->
          <h4 class="mb-10 text-center">İlginizi Çekebilecek Ürünler</h4>

          <!-- Items -->
          <div class="row">
            <div class="col-6 col-sm-6 col-md-4 col-lg-3">

              <!-- Card -->
              <div class="card mb-7">


                <!-- Image -->
                <div class="card-img">

                  <!-- Image -->
                  <a class="card-img-hover" href="product.html">
                    <img class="card-img-top card-img-back" src="assets/img/products/product-122.jpg" alt="...">
                    <img class="card-img-top card-img-front" src="assets/img/products/product-7.jpg" alt="...">
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
                    <a class="text-muted" href="#">Ayakkabı</a>
                  </div>

                  <!-- Title -->
                  <div class="font-weight-bold">
                    <a class="text-body" href="product.html">
                     Ürün Adı
                    </a>
                  </div>

                  <!-- Price -->
                  <div class="font-weight-bold">
                    <span class="text-primary">99.90 TL</span>
                  </div>

                </div>

              </div>

            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- REVIEWS -->
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
  </section>
@endsection