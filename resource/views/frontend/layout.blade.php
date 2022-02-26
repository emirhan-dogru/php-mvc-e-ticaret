<!doctype html>
<html lang="tr">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <!-- Required meta tags -->
  <base href="{{ config('BASE_FRONTEND_ASSET') }}">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Favicons -->
  <link rel="icon" href="assets/img/favicons/favicon.ico">

  <!-- Libs CSS -->
  <link rel="stylesheet" href="assets/libs/%40fancyapps/fancybox/dist/jquery.fancybox.min.css">
  <link rel="stylesheet" href="assets/libs/%40fortawesome/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="assets/libs/flickity/dist/flickity.min.css">
  <link rel="stylesheet" href="assets/libs/highlightjs/styles/vs2015.css">
  <link rel="stylesheet" href="assets/libs/simplebar/dist/simplebar.min.css">
  <link rel="stylesheet" href="assets/libs/flickity-fade/flickity-fade.css">
  <link rel="stylesheet" href="assets/fonts/feather/feather.css">

  <!-- Theme CSS -->
  <link rel="stylesheet" href="assets/css/theme.min.css">

  @stack('css')

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-154926440-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-154926440-1');

  </script>

  <title>@yield('title' , 'E-Ticaret')</title>

</head>
<body>



<!-- Shopping Cart -->
<div class="modal fixed-right fade" id="modalShoppingCart" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-vertical" role="document">

    <!-- Full cart (add `.d-none` to disable it) -->
    <div class="modal-content">

      <!-- Close -->
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <i class="fe fe-x" aria-hidden="true"></i>
      </button>

      <!-- Header-->
      <div class="modal-header line-height-fixed font-size-lg">
        <strong class="mx-auto">Your Cart (2)</strong>
      </div>

      <!-- List group -->
      <ul class="list-group list-group-lg list-group-flush">
        <li class="list-group-item">
          <div class="row align-items-center">
            <div class="col-4">

              <!-- Image -->
              <a href="product.html">
                <img class="img-fluid" src="assets/img/products/product-6.jpg" alt="...">
              </a>

            </div>
            <div class="col-8">

              <!-- Title -->
              <p class="font-size-sm font-weight-bold mb-6">
                <a class="text-body" href="product.html">Cotton floral print Dress</a> <br>
                <span class="text-muted">$40.00</span>
              </p>

              <!--Footer -->
              <div class="d-flex align-items-center">

                <!-- Select -->
                <select class="custom-select custom-select-xxs w-auto">
                  <option value="1">1</option>
                  <option value="1">2</option>
                  <option value="1">3</option>
                </select>

                <!-- Remove -->
                <a class="font-size-xs text-gray-400 ml-auto" href="#!">
                  <i class="fe fe-x"></i> Remove
                </a>

              </div>

            </div>
          </div>
        </li>
        <li class="list-group-item">
          <div class="row align-items-center">
            <div class="col-4">

              <!-- Image -->
              <a href="product.html">
                <img class="img-fluid" src="assets/img/products/product-10.jpg" alt="...">
              </a>

            </div>
            <div class="col-8">

              <!-- Title -->
              <p class="font-size-sm font-weight-bold mb-6">
                <a class="text-body" href="product.html">Suede cross body Bag</a> <br>
                <span class="text-muted">$49.00</span>
              </p>

              <!--Footer -->
              <div class="d-flex align-items-center">

                <!-- Select -->
                <select class="custom-select custom-select-xxs w-auto">
                  <option value="1">1</option>
                  <option value="1">2</option>
                  <option value="1">3</option>
                </select>

                <!-- Remove -->
                <a class="font-size-xs text-gray-400 ml-auto" href="#!">
                  <i class="fe fe-x"></i> Remove
                </a>

              </div>

            </div>
          </div>
        </li>
      </ul>

      <!-- Footer -->
      <div class="modal-footer line-height-fixed font-size-sm bg-light mt-auto">
        <strong>Subtotal</strong> <strong class="ml-auto">$89.00</strong>
      </div>

      <!-- Buttons -->
      <div class="modal-body">
        <a class="btn btn-block btn-dark" href="checkout.html">Continue to Checkout</a>
        <a class="btn btn-block btn-outline-dark" href="shopping-cart.html">View Cart</a>
      </div>

    </div>

    <!-- Empty cart (remove `.d-none` to enable it) -->
    <div class="modal-content d-none">

      <!-- Close -->
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <i class="fe fe-x" aria-hidden="true"></i>
      </button>

      <!-- Header-->
      <div class="modal-header line-height-fixed font-size-lg">
        <strong class="mx-auto">Your Cart (0)</strong>
      </div>

      <!-- Body -->
      <div class="modal-body flex-grow-0 my-auto">

        <!-- Heading -->
        <h6 class="mb-7 text-center">Your cart is empty 😞</h6>

        <!-- Button -->
        <a class="btn btn-block btn-outline-dark" href="#!">
          Continue Shopping
        </a>

      </div>

    </div>

  </div>
</div>




<!-- TOPBAR -->
<div class="navbar navbar-topbar navbar-expand-xl navbar-light bg-light ">
  @include('frontend.default.topbar')
</div>


<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-white">
  @include('frontend.default.navbar')
</nav>


<section class="pt-7 pb-12">
  @include('frontend.default.alert')
     @yield('content')
</section>



    <!-- FOOTER -->
    <footer class="bg-dark bg-cover @@classList" style="background-image: url(assets/img/patterns/pattern-2.svg)">
      <div class="py-12 border-bottom border-gray-700">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-6">

              <!-- Heading -->
              <h5 class="mb-7 text-center text-white">Want style Ideas and Treats?</h5>

              <!-- Form -->
              <form class="mb-11">
                <div class="form-row align-items-start">
                  <div class="col">
                    <input type="email" class="form-control form-control-gray-700 form-control-lg" placeholder="Enter Email *">
                  </div>
                  <div class="col-auto">
                    <button type="submit" class="btn btn-gray-500 btn-lg">Subscribe</button>
                  </div>
                </div>
              </form>

            </div>
          </div>
          <div class="row">
            <div class="col-12 col-md-3">

              <!-- Heading -->
              <h4 class="mb-6 text-white">Shopper.</h4>

              <!-- Social -->
              <ul class="list-unstyled list-inline mb-7 mb-md-0">
                <li class="list-inline-item">
                  <a href="#!" class="text-gray-350">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#!" class="text-gray-350">
                    <i class="fab fa-youtube"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#!" class="text-gray-350">
                    <i class="fab fa-twitter"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#!" class="text-gray-350">
                    <i class="fab fa-instagram"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#!" class="text-gray-350">
                    <i class="fab fa-medium"></i>
                  </a>
                </li>
              </ul>

            </div>
            <div class="col-6 col-sm">

              <!-- Heading -->
              <h6 class="heading-xxs mb-4 text-white">
                Support
              </h6>

              <!-- Links -->
              <ul class="list-unstyled mb-7 mb-sm-0">
                <li>
                  <a class="text-gray-300" href="contact-us.html">Contact Us</a>
                </li>
                <li>
                  <a class="text-gray-300" href="faq.html">FAQs</a>
                </li>
                <li>
                  <a class="text-gray-300" data-toggle="modal" href="#modalSizeChart">Size Guide</a>
                </li>
                <li>
                  <a class="text-gray-300" href="shipping-and-returns.html">Shipping & Returns</a>
                </li>
              </ul>

            </div>
            <div class="col-6 col-sm">

              <!-- Heading -->
              <h6 class="heading-xxs mb-4 text-white">
                Shop
              </h6>

              <!-- Links -->
              <ul class="list-unstyled mb-7 mb-sm-0">
                <li>
                  <a class="text-gray-300" href="shop.html">Men's Shopping</a>
                </li>
                <li>
                  <a class="text-gray-300" href="shop.html">Women's Shopping</a>
                </li>
                <li>
                  <a class="text-gray-300" href="shop.html">Kids' Shopping</a>
                </li>
                <li>
                  <a class="text-gray-300" href="shop.html">Discounts</a>
                </li>
              </ul>

            </div>
            <div class="col-6 col-sm">

              <!-- Heading -->
              <h6 class="heading-xxs mb-4 text-white">
                Company
              </h6>

              <!-- Links -->
              <ul class="list-unstyled mb-0">
                <li>
                  <a class="text-gray-300" href="about.html">Our Story</a>
                </li>
                <li>
                  <a class="text-gray-300" href="#!">Careers</a>
                </li>
                <li>
                  <a class="text-gray-300" href="#!">Terms & Conditions</a>
                </li>
                <li>
                  <a class="text-gray-300" href="#!">Privacy & Cookie policy</a>
                </li>
              </ul>

            </div>
            <div class="col-6 col-sm">

              <!-- Heading -->
              <h6 class="heading-xxs mb-4 text-white">
                Contact
              </h6>

              <!-- Links -->
              <ul class="list-unstyled mb-0">
                <li>
                  <a class="text-gray-300" href="#!">1-202-555-0105</a>
                </li>
                <li>
                  <a class="text-gray-300" href="#!">1-202-555-0106</a>
                </li>
                <li>
                  <a class="text-gray-300" href="#!">help@shopper.com</a>
                </li>
              </ul>

            </div>
          </div>
        </div>
      </div>
      <div class="py-6">
        <div class="container">
          <div class="row">
            <div class="col">

              <!-- Copyright -->
              <p class="mb-3 mb-md-0 font-size-xxs text-muted">
                © 2019 All rights reserved. Designed by Unvab.
              </p>

            </div>
            <div class="col-auto">

              <!-- Payment methods -->
              <img class="footer-payment" src="assets/img/payment/mastercard.svg" alt="...">
              <img class="footer-payment" src="assets/img/payment/visa.svg" alt="...">
              <img class="footer-payment" src="assets/img/payment/amex.svg" alt="...">
              <img class="footer-payment" src="assets/img/payment/paypal.svg" alt="...">
              <img class="footer-payment" src="assets/img/payment/maestro.svg" alt="...">
              <img class="footer-payment" src="assets/img/payment/klarna.svg" alt="...">

            </div>
          </div>
        </div>
      </div>
    </footer>


    <!-- JAVASCRIPT -->
    <!-- Libs JS -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/%40fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/flickity/dist/flickity.pkgd.min.js"></script>
    <script src="assets/libs/highlightjs/highlight.pack.min.js"></script>
    <script src="assets/libs/jarallax/dist/jarallax.min.js"></script>
    <script src="assets/libs/list.js/dist/list.min.js"></script>
    <script src="assets/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="assets/libs/smooth-scroll/dist/smooth-scroll.min.js"></script>
    <script src="assets/libs/flickity-fade/flickity-fade.js"></script>

    <!-- Map (replace the API key to enable) -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnKt8_N4-FKOnhI_pSaDL7g_g-XI1-R9E"></script>

    <!-- Theme JS -->
    <script src="assets/js/theme.min.js"></script>

    @stack('js')


  </body>

<!-- Mirrored from yevgenysim.github.io/shopper/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 28 Jan 2022 22:49:57 GMT -->
</html>
