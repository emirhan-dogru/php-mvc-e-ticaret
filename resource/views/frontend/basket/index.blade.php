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
                            <a class="text-gray-400" href="{{ base_url() }}">Homepage</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Basket
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
                <div class="col-12">

                    <!-- Heading -->
                    <h3 class="mb-10 text-center">Basket</h3>

                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-7">

                    <!-- List group -->
                    @if (getBasketSum() > 0)
                        <ul class="list-group list-group-lg list-group-flush-x mb-6">
                            <?php $subTotal = 0; ?>
                            @foreach (App\Models\BasketProductsView::where(['user_id' => auth()->get('userLogin')['id'], 'basket_status' => 'aktif'])->limit(1)->get() as $item)
                               
                                <li class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-3">

                                            <!-- Image -->
                                            <a href="product.html">
                                                <img class="img-fluid"
                                                    src="{{ base_url($item->image_path . '/' . $item->small_image) }}"
                                                    alt="{{ $item->title }}">
                                            </a>

                                        </div>
                                        <div class="col">

                                            <!-- Title -->
                                            <div class="d-flex mb-2 font-weight-bold">
                                                <a class="text-body" href="product.html">{{ $item->title }}</a> <span
                                                    class="ml-auto">
                                                    <p class="font-size-sm font-weight-bold mb-6">
                                                        @if ($item->sale_price && $item->sale_price > 0)
                                                            <span
                                                                class="text-muted small text-decoration-line-through">{{ $item->price }}</span>
                                                            <span class="text-primary">{{ $item->sale_price }}</span>
                                                        @else
                                                            <span class="text-primary">{{ $item->sale_price }}</span>
                                                        @endif
                                                    </p>
                                                </span>
                                            </div>

                                            <!-- Text -->
                                            <p class="mb-7 font-size-sm text-muted">
                                                Size: M <br>
                                                Color: Red
                                            </p>

                                            <!--Footer -->
                                            <div class="d-flex align-items-center">

                                                <!-- Select -->
                                                <div>
                                                    <div>
                                                        Piece : {{ $item->count }}
                                                    </div>
                                                </div>

                                                <!-- Remove -->
                                                <a class="font-size-xs text-gray-400 ml-auto"
                                                    href="{{ base_url('basket-item-delete/' . $item->id) }}">
                                                    <i class="fe fe-x"></i> Remove
                                                </a>

                                            </div>

                                        </div>
                                    </div>
                                </li>
                                <?php
                                $subTotal += $item->sale_price && $item->sale_price > 0 ? $item->sale_price : $item->price;
                                ?>
                            @endforeach
                        </ul>

                        <!-- Footer -->
                        <div class="row align-items-end justify-content-between mb-10 mb-md-0">
                            <div class="col-12 col-md-7">

                                <!-- Coupon -->
                                <form class="mb-7 mb-md-0">
                                    <label class="font-size-sm font-weight-bold" for="cartCouponCode">
                                        Coupon code:
                                    </label>
                                    <div class="row form-row">
                                        <div class="col">

                                            <!-- Input -->
                                            <input class="form-control form-control-sm" id="cartCouponCode" type="text"
                                                placeholder="Enter coupon code*">

                                        </div>
                                        <div class="col-auto">

                                            <!-- Button -->
                                            <button class="btn btn-sm btn-dark" type="submit">
                                                Apply
                                            </button>

                                        </div>
                                    </div>
                                </form>

                            </div>
                            <div class="col-12 col-md-auto">

                                <!-- Button -->
                                <button class="btn btn-sm btn-outline-dark">Update Cart</button>

                            </div>
                        </div>
                    @else
                        <h1 class="mb-7 text-center">Cart Empty 😞</h1>
                    @endif



                </div>
                @if (getBasketSum() > 0)
                <div class="col-12 col-md-5 col-lg-4 offset-lg-1">

                    <!-- Total -->
                    <div class="card mb-7 bg-light">
                        <div class="card-body">
                            <ul class="list-group list-group-sm list-group-flush-y list-group-flush-x">
                                <li class="list-group-item d-flex">
                                    <span>Sub Total: </span> <span
                                        class="ml-auto font-size-sm">{{ money($subTotal) }}</span>
                                </li>
                                <li class="list-group-item d-flex">
                                    <?php
                                    $kdv = $subTotal * (18 / 100);
                                    ?>
                                    <span>KDV: </span> <span class="ml-auto font-size-sm">{{ money($kdv) }}</span>
                                </li>

                                <li class="list-group-item d-flex">
                                    <span>Cargo : </span> <span class="ml-auto font-size-sm">{{ money(15) }}</span>
                                </li>

                                <li class="list-group-item d-flex font-size-lg font-weight-bold">
                                    <span>General Total: </span> <span
                                        class="ml-auto font-size-sm">{{ money($subTotal + $kdv + 15) }}</span>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <!-- Button -->
                    <a class="btn btn-block btn-dark mb-2" href="{{ base_url('odeme') }}">Pay</a>

                    <!-- Link -->
                    <a class="btn btn-link btn-sm px-0 text-body" href="{{ base_url('urunler') }}">
                        <i class="fe fe-arrow-left mr-2"></i> Continue Shopping
                    </a>

                </div>
                @endif
            </div>
        </div>
    </section>

    <!-- FEATURES -->
    <section class="bg-light py-9">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">

                    <!-- Item -->
                    <div class="d-flex mb-6 mb-lg-0">

                        <!-- Icon -->
                        <i class="fe fe-truck font-size-lg text-primary"></i>

                        <!-- Body -->
                        <div class="ml-6">

                            <!-- Heading -->
                            <h6 class="heading-xxs mb-1">
                                Free shipping
                            </h6>

                            <!-- Text -->
                            <p class="mb-0 font-size-sm text-muted">
                                From all orders over $100
                            </p>

                        </div>

                    </div>

                </div>
                <div class="col-12 col-md-6 col-lg-3">

                    <!-- Item -->
                    <div class="d-flex mb-6 mb-lg-0">

                        <!-- Icon -->
                        <i class="fe fe-repeat font-size-lg text-primary"></i>

                        <!-- Body -->
                        <div class="ml-6">

                            <!-- Heading -->
                            <h6 class="mb-1 heading-xxs">
                                Free returns
                            </h6>

                            <!-- Text -->
                            <p class="mb-0 font-size-sm text-muted">
                                Return money within 30 days
                            </p>

                        </div>

                    </div>

                </div>
                <div class="col-12 col-md-6 col-lg-3">

                    <!-- Item -->
                    <div class="d-flex mb-6 mb-md-0">

                        <!-- Icon -->
                        <i class="fe fe-lock font-size-lg text-primary"></i>

                        <!-- Body -->
                        <div class="ml-6">

                            <!-- Heading -->
                            <h6 class="mb-1 heading-xxs">
                                Secure shopping
                            </h6>

                            <!-- Text -->
                            <p class="mb-0 font-size-sm text-muted">
                                You're in safe hands
                            </p>

                        </div>

                    </div>

                </div>
                <div class="col-12 col-md-6 col-lg-3">

                    <!-- Item -->
                    <div class="d-flex">

                        <!-- Icon -->
                        <i class="fe fe-tag font-size-lg text-primary"></i>

                        <!-- Body -->
                        <div class="ml-6">

                            <!-- Heading -->
                            <h6 class="mb-1 heading-xxs">
                                Over 10,000 Styles
                            </h6>

                            <!-- Text -->
                            <p class="mb-0 font-size-sm text-muted">
                                We have everything you need
                            </p>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
