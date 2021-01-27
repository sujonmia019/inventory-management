<header class="dt-header">

    <!-- Header container -->
    <div class="dt-header__container">

        <!-- Brand -->
        <div class="dt-brand">

            <!-- Brand tool -->
            <div class="dt-brand__tool" data-toggle="main-sidebar">
                <i class="icon icon-xl icon-menu-fold d-none d-lg-inline-block"></i>
                <i class="icon icon-xl icon-menu d-lg-none"></i>
            </div>
            <!-- /brand tool -->

            <!-- Brand logo -->
            <span class="dt-brand__logo">
                <a class="dt-brand__logo-link" href="{{ asset('/') }}">
                    <img class="" src="assets/img/logo-white.png" alt="Wieldy">
                </a>
            </span>
            <!-- /brand logo -->

        </div>
        <!-- /brand -->

        <!-- Header toolbar-->
        <div class="dt-header__toolbar">

            <!-- Header Menu Wrapper -->
            <div class="dt-nav-wrapper">

                <!-- Header Menu -->
                <ul class="dt-nav">
                    <li class="dt-nav__item dt-notification dropdown">

                        <!-- Dropdown Link -->
                        <a href="#" class="dt-nav__link dropdown-toggle no-arrow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon icon-notification icon-fw dt-icon-alert"></i>
                        </a>
                        <!-- /dropdown link -->

                        <!-- Dropdown Option -->
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-media">
                            <!-- Dropdown Menu Header -->
                            <div class="dropdown-menu-header">
                                <h4 class="title">Notifications (9)</h4>

                                <div class="ml-auto action-area">
                                    <a class="ml-2" href="javascript:void(0)">
                                        <i class="icon icon-setting icon-lg text-light-gray"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- /dropdown menu header -->

                            <!-- Dropdown Menu Body -->
                            <div class="dropdown-menu-body ps-custom-scrollbar">

                                <div class="h-auto">
                                    <!-- Media -->
                                    <a href="javascript:void(0)" class="media">

                                        <!-- Avatar -->
                                        <img class="dt-avatar mr-3" src="assets/img/user-avatar/stella-johnson.jpg"
                                            alt="User">
                                        <!-- avatar -->

                                        <!-- Media Body -->
                                        <span class="media-body">
                                            <span class="message">
                                                <span class="user-name">Stella Johnson</span> and <span
                                                    class="user-name">Chris Harris</span>
                                                have birthdays today. Help them celebrate!
                                            </span>
                                            <span class="meta-date">8 hours ago</span>
                                        </span>
                                        <!-- /media body -->

                                    </a>
                                    <!-- /media -->
                                </div>

                            </div>
                            <!-- /dropdown menu body -->

                            <!-- Dropdown Menu Footer -->
                            <div class="dropdown-menu-footer">
                                <a href="javascript:void(0)" class="card-link"> See All <i
                                        class="icon icon-arrow-right icon-fw"></i>
                                </a>
                            </div>
                            <!-- /dropdown menu footer -->
                        </div>
                        <!-- /dropdown option -->

                    </li>

                </ul>
                <!-- /header menu -->

                <!-- Header Menu -->
                <ul class="dt-nav d-lg-block d-none mt-4">
                    <li class="dt-nav__item dropdown">

                        <!-- Dropdown Option -->
                        <div class="dropdown-menu dropdown-menu-right w-100">
                            <a class="dropdown-item" href="javascript:void(0)"> <i
                                    class="icon icon-user-o icon-fw mr-2 mr-sm-1"></i>Account
                            </a> <a class="dropdown-item" href="javascript:void(0)">
                                <i class="icon icon-setting icon-fw mr-2 mr-sm-1"></i>Setting </a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="icon icon-edit icon-fw mr-2 mr-sm-1"></i>Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                        <!-- /dropdown option -->

                        <!-- Dropdown Link -->
                        <a href="#" class="dt-nav__link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img class="dt-avatar" src="assets/img/user-avatar/domnic-harris.jpg" alt="Domnic Harris">
                            <span class="dt-avatar-info">
                                <span class="dt-avatar-name">Bob Hyden</span>
                            </span>
                        </a>
                        <!-- /dropdown link -->

                        <!-- Dropdown Option -->
                        <div class="dropdown-menu dropdown-menu-right w-100">
                            <a class="dropdown-item" href="javascript:void(0)"> <i
                                    class="icon icon-user-o icon-fw mr-2 mr-sm-1"></i>Account
                            </a> <a class="dropdown-item" href="javascript:void(0)">
                                <i class="icon icon-setting icon-fw mr-2 mr-sm-1"></i>Setting </a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="icon icon-edit icon-fw mr-2 mr-sm-1"></i>Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                        </div>
                        <!-- /dropdown option -->

                    </li>
                </ul>
                <!-- /header menu -->

                <!-- Header Menu -->
                <ul class="dt-nav d-lg-none">
                    <li class="dt-nav__item dropdown">

                        <!-- Dropdown Link -->
                        <a href="#" class="dt-nav__link dropdown-toggle no-arrow dt-avatar-wrapper"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="dt-avatar size-40" src="assets/img/user-avatar/domnic-harris.jpg"
                                alt="Domnic Harris">
                        </a>
                        <!-- /dropdown link -->

                        <!-- Dropdown Option -->
                        <div class="dropdown-menu dropdown-menu-right w-100">

                            <a class="dropdown-item" href="javascript:void(0)"> <i class="icon icon-user-o icon-fw mr-2 mr-sm-1"></i>Account
                            </a> <a class="dropdown-item" href="javascript:void(0)">
                                <i class="icon icon-setting icon-fw mr-2 mr-sm-1"></i>Setting </a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="icon icon-edit icon-fw mr-2 mr-sm-1"></i>Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                        </div>
                        <!-- /dropdown option -->

                    </li>
                </ul>
                <!-- /header menu -->

            </div>
            <!-- Header Menu Wrapper -->

        </div>
        <!-- /header toolbar -->

    </div>
    <!-- /header container -->

</header>
