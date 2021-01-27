<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{ asset('/') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POS - Login</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="32x32" href="assets/image/fev.png">

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
                    <div class="login_left_img"><img src="assets/image/login-bg.jpg" alt="login background"></div>
                </div>
            </div>
            <div class="col-md-6 bg-white">
                <div class="login_box">
                    <a href="#" class="logo_text">
                        <span>PS</span> Just Log
                    </a>
                    <div class="login_form">
                        <div class="login_form_inner">
                            @if ($errors->any())
                            <div class="bg-danger">
                                <ul class="m-0 list-unstyled">
                                    @foreach ($errors->all() as $error)
                                        <li class="text-light py-1" style="font-weight: 300;">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group">
                                    <input type="email" name="email" class="input-text  @error('email') is-invalid @enderror" placeholder="Email Address"  value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    <i class="fa fa-envelope"></i>
                                    <span class="focus-border"></span>

                                </div>

                                <div class="form-group">
                                    <input type="password" name="password" class="input-text @error('password') is-invalid @enderror" placeholder="Password"  required autocomplete="current-password">

                                    <i class="fa fa-lock"></i>
                                    <span class="focus-border"></span>

                                </div>

                                <div class="checkbox clearfix">
                                    <div class="form-check checkbox-theme">
                                        <input class="form-check-input" type="checkbox" name="remember" value="" id="rememberMe" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="rememberMe">
                                            Remember me
                                        </label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}">Forgot Password</a>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn-md btn-theme btn-block"><i class="fas fa-sign-in-alt"></i> Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
