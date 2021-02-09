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
                <a href="{{ url('/') }}" class="dt-side-nav__link {{ Request::is('/') ? 'active' : '' }}"
                    title="Dashboard"> <i class="icon icon-dashboard icon-fw icon-sm"></i>
                    <span class="dt-side-nav__text">Dashboard</span> </a>
            </li>
            <!-- /menu item -->

            <!-- Menu Item -->
            <li class="dt-side-nav__item">
                <a href="{{ route('supplier.index') }}"
                    class="dt-side-nav__link {{ Request::is('supplier*') ? 'active' : '' }}" title="Supplier"> <i
                        class="icon icon-profile2  icon-fw icon-sm"></i>
                    <span class="dt-side-nav__text">Supplier</span> </a>
            </li>
            <!-- /Menu Item -->

            <!-- Menu Item -->
            <li class="dt-side-nav__item">
                <a href="{{ route('customer.index') }}"
                    class="dt-side-nav__link {{ Request::is('customer*') ? 'active' : '' }}" title="Customer"> <i
                        class="icon icon-avatar  icon-fw icon-sm"></i>
                    <span class="dt-side-nav__text">Customer</span> </a>
            </li>
            <!-- /Menu Item -->

            <!-- Menu Item -->
            <li class="dt-side-nav__item">
                <a href="{{ route('units.index') }}"
                    class="dt-side-nav__link {{ Request::is('units*') ? 'active' : '' }}" title="Units"> <i
                        class="icon icon-picker icon-fw icon-sm"></i>
                    <span class="dt-side-nav__text">Units</span> </a>
            </li>
            <!-- /Menu Item -->

            <!-- Menu Item -->
            <li class="dt-side-nav__item">
                <a href="{{ route('category.index') }}"
                    class="dt-side-nav__link {{ Request::is('category*') ? 'active' : '' }}" title="Category"> <i
                        class="icon icon-picker icon-fw icon-sm"></i>
                    <span class="dt-side-nav__text">Category</span> </a>
            </li>
            <!-- /Menu Item -->

            <!-- Menu Header -->
            <li class="dt-side-nav__item dt-side-nav__header">
                <span class="dt-side-nav__text">Product Manage</span>
            </li>
            <!-- /menu header -->

            <!-- Menu Item -->
            <li class="dt-side-nav__item">
                <a href="{{ route('product.index') }}"
                    class="dt-side-nav__link {{ Request::is('product*') ? 'active' : '' }}" title="Product"> <i
                        class="icon icon-picker icon-fw icon-sm"></i>
                    <span class="dt-side-nav__text">Product</span> </a>
            </li>
            <!-- /Menu Item -->

            <!-- Menu Header -->
            <li class="dt-side-nav__item dt-side-nav__header">
                <span class="dt-side-nav__text">Purchase Manage</span>
            </li>
            <!-- /menu header -->

            <!-- Menu Item -->
            <li class="dt-side-nav__item {{ Request::is('purchase*') ? 'open' : '' }}">
                <a href="javascript:void(0)" class="dt-side-nav__link dt-side-nav__arrow" title="Purchase Manage">
                    <i class="icon icon-editor icon-fw icon-sm"></i> <span class="dt-side-nav__text">Purchase</span>
                </a>

                <!-- Sub-menu -->
                <ul class="dt-side-nav__sub-menu">
                    <li class="dt-side-nav__item">
                        <a href="{{ route('purchase.index') }}"
                            class="dt-side-nav__link {{ Request::is('purchase*') ? 'active' : '' }}"
                            title="Purchase View">
                            <span class=" dt-side-nav__text">Purchase View</span> </a>
                    </li>

                    <li class="dt-side-nav__item">
                        <a href="#" class="dt-side-nav__link" title="Purchase Pending">
                            <span class="dt-side-nav__text">Purchase Pending</span> </a>
                    </li>

                    <li class="dt-side-nav__item">
                        <a href="#" class="dt-side-nav__link" title="Purchase Approved">
                            <span class="dt-side-nav__text">Purchase Approved</span> </a>
                    </li>
                </ul>
                <!-- /sub-menu -->
            </li>

            <!-- Menu Header -->
            <li class="dt-side-nav__item dt-side-nav__header">
                <span class="dt-side-nav__text">Invoice Manage</span>
            </li>
            <!-- /menu header -->

            <!-- Menu Item -->
            <li class="dt-side-nav__item {{ Request::is('purchase*') ? 'open' : '' }}">
                <a href="javascript:void(0)" class="dt-side-nav__link dt-side-nav__arrow" title="Purchase Manage">
                    <i class="icon icon-editor icon-fw icon-sm"></i> <span class="dt-side-nav__text">Invoice</span>
                </a>

                <!-- Sub-menu -->
                <ul class="dt-side-nav__sub-menu">
                    <li class="dt-side-nav__item">
                        <a href="{{ route('purchase.index') }}"
                            class="dt-side-nav__link {{ Request::is('purchase*') ? 'active' : '' }}"
                            title="Invoice View">
                            <span class=" dt-side-nav__text">Invoice View</span> </a>
                    </li>

                    <li class="dt-side-nav__item">
                        <a href="#" class="dt-side-nav__link" title="Invoice Pending">
                            <span class="dt-side-nav__text">Invoice Pending</span> </a>
                    </li>

                    <li class="dt-side-nav__item">
                        <a href="#" class="dt-side-nav__link" title="Invoice Approved">
                            <span class="dt-side-nav__text">Invoice Approved</span> </a>
                    </li>
                </ul>
                <!-- /sub-menu -->
            </li>



        </ul>
        <!-- /sidebar navigation -->

    </div>
</aside>
