<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{ asset('/') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POS - @yield('title')</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('public/assets/image/fev.png') }}">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="css/login.css">

</head>

<body>

    <!-- Loader -->
    <div class="loader">
        <div class="loader_div"></div>
    </div>

    <!-- Login page -->
    <div class="login_wrapper">
        <div class="row no-gutters">

            <div class="col-md-6 mobile-hidden">
                <div class="login_left">
                    <div class="login_left_img"><img src="{{ asset('assets/image/login-bg.jpg') }}" alt="login background"></div>
                </div>
            </div>

            @yield('login-content')

        </div>

    </div>
    <!-- /. Login page -->


    <!-- External JS libraries -->
    <script src="js/login.js"></script>

    <!-- Custom JS Script -->
    <script type="text/javascript">
        var $window = $(window);

        // :: Preloader Active Code
        $window.on('load', function () {
            $('.loader').fadeOut('slow', function () {
                $(this).remove();
            });
        });

    </script>

</body>

</html>

