<aside id="main-sidebar" class="dt-sidebar">
    <div class="dt-sidebar__container">

        <!-- Sidebar Navigation -->
        <ul class="dt-side-nav">

            <!-- Menu Header -->
            <li class="dt-side-nav__item dt-side-nav__header">
                <span class="dt-side-nav__text">main</span>
            </li>
            <!-- /menu header -->

            <!-- Menu Item -->
            <li class="dt-side-nav__item">
                <a href="{{ url('/') }}" class="dt-side-nav__link {{ Request::is('/')? 'active':''}}" title="Dashboard"> <i class="icon icon-dashboard icon-fw icon-sm"></i>
                <span class="dt-side-nav__text">Dashboard</span> </a>
            </li>
            <!-- /menu item -->

            <!-- Menu Item -->
            <li class="dt-side-nav__item">
                <a href="{{ route('supplier.index') }}" class="dt-side-nav__link {{ Request::is('supplier*')? 'active':''}}" title="Supplier"> <i class="icon icon-profile2  icon-fw icon-sm"></i>
                <span class="dt-side-nav__text">Supplier</span> </a>
            </li>
            <!-- /Menu Item -->

            <!-- Menu Item -->
            <li class="dt-side-nav__item">
                <a href="{{ route('customer.index') }}" class="dt-side-nav__link {{ Request::is('customer*')? 'active':''}}" title="Customer"> <i class="icon icon-avatar  icon-fw icon-sm"></i>
                <span class="dt-side-nav__text">Customer</span> </a>
            </li>
            <!-- /Menu Item -->

            <!-- Menu Item -->
            <li class="dt-side-nav__item">
                <a href="{{ route('units.index') }}" class="dt-side-nav__link {{ Request::is('units*')? 'active':''}}" title="Units"> <i class="icon icon-picker icon-fw icon-sm"></i>
                <span class="dt-side-nav__text">Units</span> </a>
            </li>
            <!-- /Menu Item -->

            <!-- Menu Item -->
            <li class="dt-side-nav__item">
                <a href="{{ route('category.index') }}" class="dt-side-nav__link {{ Request::is('category*')? 'active':''}}" title="Category"> <i class="icon icon-picker icon-fw icon-sm"></i>
                <span class="dt-side-nav__text">Category</span> </a>
            </li>
            <!-- /Menu Item -->

            <!-- Menu Item -->
            <li class="dt-side-nav__item">
                <a href="{{ route('product.index') }}" class="dt-side-nav__link {{ Request::is('product*')? 'active':''}}" title="Product"> <i class="icon icon-picker icon-fw icon-sm"></i>
                <span class="dt-side-nav__text">Product</span> </a>
            </li>
            <!-- /Menu Item -->

            <!-- Menu Item -->
            <li class="dt-side-nav__item">
                <a href="{{ route('purchase.index') }}" class="dt-side-nav__link {{ Request::is('purchase*')? 'active':''}}" title="Supplier"> <i class="icon icon-picker icon-fw icon-sm"></i>
                <span class="dt-side-nav__text">Purchase</span> </a>
            </li>
            <!-- /Menu Item -->

            <!-- Menu Item -->
            <li class="dt-side-nav__item">
                <a href="javascript:void(0)" class="dt-side-nav__link dt-side-nav__arrow" title="Editors">
                    <i class="icon icon-editor icon-fw icon-sm"></i> <span class="dt-side-nav__text">Editors</span> </a>

                <!-- Sub-menu -->
                <ul class="dt-side-nav__sub-menu">
                    <li class="dt-side-nav__item">
                        <a href="editor-summernote.html" class="dt-side-nav__link" title="Summernote Editor">
                            <span class="dt-side-nav__text">Summernote Editor</span> </a>
                    </li>

                    <li class="dt-side-nav__item">
                        <a href="code-editor.html" class="dt-side-nav__link" title="Code Editor">
                            <span class="dt-side-nav__text">Code Editor</span> </a>
                    </li>
                </ul>
                <!-- /sub-menu -->
            </li>

            <!-- Menu Item -->
            <li class="dt-side-nav__item">
                <a href="widget.html" class="dt-side-nav__link" title="Widgets"> <i class="icon icon-widgets icon-fw icon-sm"></i>
                <span class="dt-side-nav__text">Widgets</span> </a>
            </li>
            <!-- /menu item -->

            <!-- Menu Header -->
            <li class="dt-side-nav__item dt-side-nav__header">
                <span class="dt-side-nav__text">Pre-built Apps</span>
            </li>
            <!-- /menu header -->

            <!-- Menu Item -->
            <li class="dt-side-nav__item">
                <a href="mail.html" class="dt-side-nav__link" title="Mail App"> <i
                        class="icon icon-email icon-fw icon-sm"></i>
                    <span class="dt-side-nav__text">Mail App</span> </a>
            </li>
            <!-- /menu item -->


        </ul>
        <!-- /sidebar navigation -->

    </div>
</aside>
