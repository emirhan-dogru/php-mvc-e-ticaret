<div class="modal-dialog modal-dialog-vertical" role="document">

    <!-- Full cart (add `.d-none` to disable it) -->
    <div class="modal-content">

        <!-- Close -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="fe fe-x" aria-hidden="true"></i>
        </button>

        <!-- Header-->
        <div class="modal-header line-height-fixed font-size-lg">
            <strong class="mx-auto">Your Cart ({{ getBasketSum() }})</strong>
        </div>

        @if (getBasketSum() > 0)
                <ul class="list-group list-group-lg list-group-flush">
                    <?php $subTotal = 0; ?>
                    @foreach (App\Models\BasketProductsView::where(['user_id' => auth()->get('userLogin')['id'], 'basket_status' => 'aktif'])->limit(1)->get() as $item)
                        <li class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col-4">
        
                                    <!-- Image -->
                                    <a href="product.html">
                                        <img class="img-fluid"
                                            src="{{ base_url($item->image_path . '/' . $item->small_image) }}" alt="{{ $item->title }}">
                                    </a>
        
                                </div>
                                <div class="col-8">
        
                                    <!-- Title -->
                                    <p class="font-size-sm font-weight-bold mb-6">
                                        <a class="text-body" href="product.html">{{ $item->title }}</a> <br>
                                        @if ($item->sale_price && $item->sale_price > 0)
                                            <span
                                                class="text-muted small text-decoration-line-through">{{ $item->price }}</span>
                                            <span class="text-primary">{{ $item->sale_price }}</span>
                                        @else
                                            <span class="text-primary">{{ $item->sale_price }}</span>
                                        @endif
                                    </p>
        
                                    <!--Footer -->
                                    <div class="d-flex align-items-center">
        
                                        <!-- Select -->
                                        <div>
                                            <div>
                                                Piece : {{ $item->count }}
                                            </div>
                                            <div>
                                                @foreach (App\Models\BasketVariantsView::where('basket_id' , $item->id)->get() as $varitant)
                                                    {{ $varitant->variant_name }} : {{ $varitant->variant_value }}
                                                @endforeach
                                            </div>
                                        </div>
        
        
                                        <!-- Remove -->
                                        <a class="font-size-xs text-gray-400 ml-auto" href="{{ base_url('basket-item-delete/' . $item->id) }}">
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
        <div class="modal-footer line-height-fixed font-size-sm bg-light mt-auto">
            <strong>Sub Total</strong> <strong class="ml-auto">{{ money($subTotal) }}</strong>
        </div>

        <!-- Buttons -->
        <div class="modal-body">
            <a class="btn btn-block btn-dark" href="{{ base_url('urunler') }}">Continue Shopping</a>
            <a class="btn btn-block btn-outline-dark" href="{{ base_url('sepet') }}">Go To Cart</a>
        </div>
        @else
        <h6 class="mb-7 text-center">Cart Empty 😞</h6>
        @endif



        

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
