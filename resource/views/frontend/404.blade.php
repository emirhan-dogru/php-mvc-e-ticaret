@extends('frontend.layout')

@section('content')
    <!-- CONTENT -->
    <section class="py-12">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-6 text-center">
  
              <!-- Icon -->
              <div class="mb-7 font-size-h1">🙁</div>
  
              <!-- Heading -->
              <h2 class="mb-5">404. Sayfa Bulunamadı.</h2>
  
              <!-- Text -->
              <p class="mb-7 text-gray-500">
               Aradığınız sayfayı bulunamadı!
              </p>
  
              <!-- Button -->
              <a class="btn btn-dark" href="{{ base_url() }}">
                Anasayfa
              </a>
  
            </div>
          </div>
        </div>
      </section>
@endsection