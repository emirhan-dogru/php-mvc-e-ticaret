<div class="container">

    <!-- Brand -->
    <a class="navbar-brand" href="{{ base_url() }}">
      E-TİCARET.
    </a>

    <!-- Toggler -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapse -->
    <div class="collapse navbar-collapse" id="navbarCollapse">

      <!-- Nav -->
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ base_url() }}">Homepage</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ base_url('urunler') }}">Product</a>
        </li>
      </ul>

      <!-- Nav -->
      <ul class="navbar-nav flex-row">

        @if (auth()->get('userLogin'))
        <li class="nav-item ml-lg-n4">
          <a class="nav-link" href="{{ base_url('hesabim') }}">
            <i class="fe fe-user"></i>
          </a>
        </li>

        <li class="nav-item ml-lg-n4">
          <a class="nav-link" data-toggle="modal" href="#modalShoppingCart">
                <span data-cart-items="{{ getBasketSum() }}">
                  <i class="fe fe-shopping-cart"></i>
                </span>
          </a>
        </li>

        <li class="nav-item ml-lg-n4">
          <a class="nav-link" href="{{ base_url('logout') }}">
            <i class="fe fe-log-out"></i>
          </a>
        </li>
        @else
        <li class="nav-item ml-lg-n4">
          <a class="nav-link" href="{{ base_url('giris-yap') }}">
            <i class="fe fe-user"></i> Login
          </a>
        </li>
        @endif
       
      </ul>

    </div>

  </div>