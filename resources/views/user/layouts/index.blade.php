<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <meta name="description" content="Index page">
    <meta name="keywords" content="index, page">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('homepage-section/imgs/template/logo-1.png')}}">
    <link href="{{ asset('homepage-section/css/style.css?v=3.0.0')}}" rel="stylesheet">
    <title>@yield('title', 'Home -  Delcraft')</title>

  <body>
    @if (Request::is('orders'))
    <div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
      <div class="preloader-inner position-relative">
        <div class="text-center load"><img class="mb-10" src="{{ asset('homepage-section/imgs/template/logo-1.png')}}" alt="Ecom">
          <div class="preloader-dots"></div>
        </div>
      </div>
    </div>
  </div>
  @endif

  <!-- navbar -->
  @include('user.layouts.navbar')
  <!--end Navbar-->

    <main class="main">

     @yield('content')

    </main>

    <!--footer-->
    @include('user.layouts.footer')
    <!--footer-->
    @livewireStyles
    <script src="{{ asset('homepage-section/js/vendors/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{ asset('homepage-section/js/vendors/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('homepage-section/js/vendors/jquery-migrate-3.3.0.min.js')}}"></script>
    <script src="{{ asset('homepage-section/js/vendors/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('homepage-section/js/vendors/waypoints.js')}}"></script>
    <script src="{{ asset('homepage-section/js/vendors/wow.js')}}"></script>
    <script src="{{ asset('homepage-section/js/vendors/magnific-popup.js')}}"></script>
    <script src="{{ asset('homepage-section/js/vendors/perfect-scrollbar.min.js')}}"></script>
    <script src="{{ asset('homepage-section/js/vendors/select2.min.js')}}"></script>
    <script src="{{ asset('homepage-section/js/vendors/isotope.js')}}"></script>
    <script src="{{ asset('homepage-section/js/vendors/scrollup.js')}}"></script>
    <script src="{{ asset('homepage-section/js/vendors/swiper-bundle.min.js')}}"></script>
    <script src="{{ asset('homepage-section/js/vendors/noUISlider.js')}}"></script>
    <script src="{{ asset('homepage-section/js/vendors/slider.js')}}"></script>
    <!-- Count down-->
    <script src="{{ asset('homepage-section/js/vendors/counterup.js')}}"></script>
    <script src="{{ asset('homepage-section/js/vendors/jquery.countdown.min.js')}}"></script>
    <script src="{{ asset('homepage-section/js/vendors/jquery.elevatezoom.js')}}"></script>
    <script src="{{ asset('homepage-section/js/vendors/slick.js')}}"></script>
    <script src="{{ asset('homepage-section/js/main.js?v=3.0.0')}}"></script>
    <script src="{{ asset('homepage-section/js/shop.js?v=1.2.1')}}"></script>

  </body>
</html>


