<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{ asset('/') }}">
  <!-- Meta tags -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Wieldy - A fully responsive, HTML5 based admin template">
  <meta name="keywords" content="Responsive, HTML5, admin theme, business, professional, jQuery, web design, CSS3, sass">
  <!-- /meta tags -->
  <title>POS Software @stack('title')</title>

  <!-- Site favicon -->
  <link rel="shortcut icon" href="assets/image/fev.png" type="image/x-icon">
  <!-- /site favicon -->
    @stack('styles')
    <x-style/>
    <link rel="stylesheet" href="css/app.css">
  <!-- Load Styles -->
  <link rel="stylesheet" href="assets/css/lite-style-1.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <!-- /load styles -->

</head>
<body class="dt-sidebar--fixed dt-header--fixed">

<!-- Loader -->
<div class="dt-loader-container">
  <div class="dt-loader">
    <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle>
    </svg>
  </div>
</div>
<!-- /loader -->

<!-- Root -->
<div class="dt-root">
  <!-- Header -->
  @include('include.header')
  <!-- /header -->


  <!-- Site Main -->
  <main class="dt-main">
    <!-- Sidebar -->
    <x-sideber/>
    <!-- /sidebar -->


    <!-- Site Content Wrapper -->
    <div class="dt-content-wrapper">

      <!-- Site Content -->
      @yield('content')
      <!-- /site content -->

      <!-- Footer -->
      @include('include.footer')
      <!-- /footer -->

    </div>
    <!-- /site content wrapper -->

  </main>
</div>
<!-- /root -->


<!-- Custom JavaScript -->
<script src="js/app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="assets/js/perfect-scrollbar.min.js"></script>
<script src="assets/js/dashboard-crypto.js"></script>
<script src="assets/js/script.js"></script>

<x-scripts/>

@stack('scripts')

</body>

</html>
