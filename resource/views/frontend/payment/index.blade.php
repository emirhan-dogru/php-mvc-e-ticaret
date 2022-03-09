@extends('frontend.layout')

@section('content')
    <!-- BREADCRUMB -->
    <nav class="py-5">
        <div class="container">
          <div class="row">
            <div class="col-12">
  
              <!-- Breadcrumb -->
              <ol class="breadcrumb mb-0 font-size-xs text-gray-400">
                <li class="breadcrumb-item">
                  <a class="text-gray-400" href="{{ base_url() }}">Anasayfa</a>
                </li>
                <li class="breadcrumb-item">
                  <a class="text-gray-400" href="{{ base_url('sepet') }}">Sepetim</a>
                </li>
                <li class="breadcrumb-item active">
                  Ödeme
                </li>
              </ol>
  
            </div>
          </div>
        </div>
      </nav>
  
      <!-- CONTENT -->
      <section class="pt-7 pb-12">
        <div class="container">
          <div class="row">
            <div class="col-12 text-center">
  
              <!-- Heading -->
              <h3 class="mb-4">Ödeme Detayları</h3>
  
              <!-- Subheading -->
              <p class="mb-10">
                Already have an account? <a class="font-weight-bold text-reset" href="#!">Click here to login</a>
              </p>
  
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-md-7">
  
              <!-- Form -->
              <form action="{{ base_url('add-order') }}" method="POST" id="formOrder">
  
                <!-- Heading -->
                <h6 class="mb-7">Gönderim Detayları</h6>
  
              <!-- Billing details -->
              <div class="row mb-9">
                <div class="col-12 col-md-6">

                  <!-- First Name -->
                  <div class="form-group">
                    <label for="checkoutBillingFirstName">First Name *</label>
                    <input name="first_name" required class="form-control form-control-sm" id="checkoutBillingFirstName" type="text" placeholder="First Name" required>
                  </div>

                </div>
                <div class="col-12 col-md-6">

                  <!-- Last Name -->
                  <div class="form-group">
                    <label for="checkoutBillingLastName">Last Name *</label>
                    <input name="last_name" required class="form-control form-control-sm" id="checkoutBillingLastName" type="text" placeholder="Last Name" required>
                  </div>

                </div>
                <div class="col-12">

                  <!-- Email -->
                  <div class="form-group">
                    <label for="checkoutBillingEmail">Email *</label>
                    <input name="email" class="form-control form-control-sm" id="checkoutBillingEmail" type="email" placeholder="Email" required>
                  </div>

                </div>
                <div class="col-12">

                  <!-- Company Name -->
                  <div class="form-group">
                    <label for="checkoutBillingCompany">Company name *</label>
                    <input name="campany_name" class="form-control form-control-sm" id="checkoutBillingCompany" type="text" placeholder="Company name (optional)">
                  </div>

                </div>
                <div class="col-12">

                  <!-- Country -->
                  <div class="form-group">
                    <label for="checkoutBillingCountry">Country *</label>
                    <input name="country" class="form-control form-control-sm" id="checkoutBillingCountry" type="text" placeholder="Country" required>
                  </div>

                </div>
                <div class="col-12">

                  <!-- Address Line 1 -->
                  <div class="form-group">
                    <label for="checkoutBillingAddress">Address Line 1 *</label>
                    <input name="addres1" class="form-control form-control-sm" id="checkoutBillingAddress" type="text" placeholder="Address Line 1" required>
                  </div>

                </div>
                <div class="col-12">

                  <!-- Address Line 2 -->
                  <div class="form-group">
                    <label for="checkoutBillingAddressTwo">Address Line 2</label>
                    <input name="addres2" class="form-control form-control-sm" id="checkoutBillingAddressTwo" type="text" placeholder="Address Line 2 (optional)">
                  </div>

                </div>
                <div class="col-12 col-md-6">

                  <!-- Town / City -->
                  <div class="form-group">
                    <label for="checkoutBillingTown">Town / City *</label>
                    <input name="city" class="form-control form-control-sm" id="checkoutBillingTown" type="text" placeholder="Town / City" required>
                  </div>

                </div>
                <div class="col-12 col-md-6">

                  <!-- ZIP / Postcode -->
                  <div class="form-group">
                    <label for="checkoutBillingZIP">ZIP / Postcode *</label>
                    <input name="post_code" class="form-control form-control-sm" id="checkoutBillingZIP" type="text" placeholder="ZIP / Postcode" required>
                  </div>

                </div>
                <div class="col-12">

                  <!-- Mobile Phone -->
                  <div class="form-group mb-0">
                    <label for="checkoutBillingPhone">Mobile Phone *</label>
                    <input name="phone" class="form-control form-control-sm" id="checkoutBillingPhone" type="tel" placeholder="Mobile Phone" required>
                  </div>

                </div>
              </div>
                

  
  
  
                <!-- Heading -->
                <h6 class="mb-7">Payment</h6>
  
                <!-- List group -->
                <div class="list-group list-group-sm mb-7">
                  <div class="list-group-item">
  
                    <!-- Radio -->
                    <div class="custom-control custom-radio">
  
                      <!-- Input -->
                      <input value="kredi_karti" class="custom-control-input" id="checkoutPaymentCard" name="payment" type="radio" data-toggle="collapse" data-action="show" data-target="#checkoutPaymentCardCollapse">
  
                      <!-- Label -->
                      <label class="custom-control-label font-size-sm text-body text-nowrap" for="checkoutPaymentCard">
                       Kredi Kartı <img class="ml-2" src="assets/img/brands/color/cards.svg" alt="...">
                      </label>
  
                    </div>
  
                  </div>
                  {{-- <div class="list-group-item collapse py-0" id="checkoutPaymentCardCollapse">
  
                    <!-- Form -->
                    <div class="form-row py-5">
                      <div class="col-12">
                        <div class="form-group mb-4">
                          <label class="sr-only" for="checkoutPaymentCardNumber">Card Number</label>
                          <input class="form-control form-control-sm" id="checkoutPaymentCardNumber" type="text" placeholder="Card Number *" required>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group mb-4">
                          <label class="sr-only" for="checkoutPaymentCardName">Name on Card</label>
                          <input class="form-control form-control-sm" id="checkoutPaymentCardName" type="text" placeholder="Name on Card *" required>
                        </div>
                      </div>
                      <div class="col-12 col-md-4">
                        <div class="form-group mb-md-0">
                          <label class="sr-only" for="checkoutPaymentMonth">Month</label>
                          <select class="custom-select custom-select-sm" id="checkoutPaymentMonth">
                            <option>January</option>
                            <option>February</option>
                            <option>March</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-12 col-md-4">
                        <div class="form-group mb-md-0">
                          <label class="sr-only" for="checkoutPaymentCardYear">Year</label>
                          <select class="custom-select custom-select-sm" id="checkoutPaymentCardYear">
                            <option>2017</option>
                            <option>2018</option>
                            <option>2019</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-12 col-md-4">
                        <div class="input-group input-group-merge">
                          <input class="form-control form-control-sm" id="checkoutPaymentCardCVV" type="text" placeholder="CVV *" required>
                          <div class="input-group-append">
                            <span class="input-group-text" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="The CVV Number on your credit card or debit card is a 3 digit number on VISA, MasterCard and Discover branded credit and debit cards.">
                              <i class="fe fe-help-circle"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
  
                  </div> --}}
                  <div class="list-group-item">
  
                    <!-- Radio -->
                    <div class="custom-control custom-radio">
  
                      <!-- Input -->
                      <input value="havale" class="custom-control-input" id="checkoutPaymentPaypal" name="payment" type="radio" data-toggle="collapse" data-action="hide" data-target="#checkoutPaymentCardCollapse">
  
                      <!-- Label -->
                      <label class="custom-control-label font-size-sm text-body text-nowrap" for="checkoutPaymentPaypal">
                        Havale <img src="assets/img/brands/color/paypal.svg" alt="...">
                      </label>
  
                    </div>
  
                  </div>
                </div>
  
                <!-- Notes -->
                <textarea class="form-control form-control-sm mb-9 mb-md-0 font-size-xs" name="order_note" rows="5" placeholder="Order Notes (optional)"></textarea>
  
              </form>
  
            </div>
            <div class="col-12 col-md-5 col-lg-4 offset-lg-1">
  
              <!-- Heading -->
              <h6 class="mb-7">Order Items (3)</h6>
  
              <!-- Divider -->
              <hr class="my-7">
  
              <!-- List group -->
              <ul class="list-group list-group-lg list-group-flush-y list-group-flush-x mb-7">
                <li class="list-group-item">
                  <div class="row align-items-center">
                    <div class="col-4">
  
                      <!-- Image -->
                      <a href="product.html">
                        <img src="assets/img/products/product-6.jpg" alt="..." class="img-fluid">
                      </a>
  
                    </div>
                    <div class="col">
  
                      <!-- Title -->
                      <p class="mb-4 font-size-sm font-weight-bold">
                        <a class="text-body" href="product.html">Cotton floral print Dress</a> <br>
                        <span class="text-muted">$40.00</span>
                      </p>
  
                      <!-- Text -->
                      <div class="font-size-sm text-muted">
                        Size: M <br>
                        Color: Red
                      </div>
  
                    </div>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="row align-items-center">
                    <div class="col-4">
  
                      <!-- Image -->
                      <a href="product.html">
                        <img src="assets/img/products/product-10.jpg" alt="..." class="img-fluid">
                      </a>
  
                    </div>
                    <div class="col">
  
                      <!-- Title -->
                      <p class="mb-4 font-size-sm font-weight-bold">
                        <a class="text-body" href="product.html">Suede cross body Bag</a> <br>
                        <span class="text-muted">$49.00</span>
                      </p>
  
                      <!-- Text -->
                      <div class="font-size-sm text-muted">
                        Color: Brown
                      </div>
  
                    </div>
                  </div>
                </li>
              </ul>
  
              <!-- Card -->
              <div class="card mb-9 bg-light">
                <div class="card-body">
                  <ul class="list-group list-group-sm list-group-flush-y list-group-flush-x">
                    <li class="list-group-item d-flex">
                      <span>Subtotal</span> <span class="ml-auto font-size-sm">$89.00</span>
                    </li>
                    <li class="list-group-item d-flex">
                      <span>Tax</span> <span class="ml-auto font-size-sm">$00.00</span>
                    </li>
                    <li class="list-group-item d-flex">
                      <span>Shipping</span> <span class="ml-auto font-size-sm">$8.00</span>
                    </li>
                    <li class="list-group-item d-flex font-size-lg font-weight-bold">
                      <span>Total</span> <span class="ml-auto">$97.00</span>
                    </li>
                  </ul>
                </div>
              </div>
  
              <!-- Disclaimer -->
              <p class="mb-7 font-size-xs text-gray-500">
                Your personal data will be used to process your order, support
                your experience throughout this website, and for other purposes
                described in our privacy policy.
              </p>
  
              <!-- Button -->
              <button class="btn btn-block btn-dark" id="orderBtn">
                Ödeme Yap
              </button>
  
            </div>
          </div>
        </div>
      </section>
@endsection

@push('js')
    <script>
      $('#orderBtn').click(function(){
$('#formOrder').trigger('submit');
      });
    </script>
@endpush