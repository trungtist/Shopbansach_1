<!-- Begin - header -->
<div id="header">
    <div class="container">
        <div id="header-1" class="row justify-content-between m-0">
            <div id="header-sec-1">
                <a href="/">
                    <img id="logo" src="{{ asset('assets/client/images/logo1.png') }}" alt="Linh - Phong Books"
                        title="Linh - Phong Books">
                </a>
            </div>
            <div id="header-sec-2">
                <form action="/products_search" method="GET">
                    <div id="sec-2-nav-1" class="row">
                        <div>
                            <input id="text-search" name="search" value="" placeholder="Tìm sản phẩm..."
                                autocomplete="off" type="text">
                        </div>
                        <div id="btn-search-sec-2">
                            <button type="submit">
                                <img src="{{ asset('assets/client/images/find.png') }}" alt="search">
                            </button>
                        </div>
                    </div>
                </form>

            </div>
            <div id="header-sec-3">
                <div id="sec-3-nav-1" class="row m-0">
                    <div>
                        <div class="">
                            <p class="m-0 time-open">Giờ mở cửa (08:00 - 22:00)</p>
                        </div>
                        <div class="row m-0 justify-content-center">
                            <div class="mr-2">
                                <div class="m-0 logo-hotline" title="Hotline">
                                    <a href="#" class="hot-line">
                                        <img id="nav-hotline" src="{{ asset('assets/client/images/hotline.png') }}"
                                            alt="Hotline">
                                        098.7651.432
                                    </a>
                                </div>
                            </div>
                            <div class="mr-2">
                                <div id="icon-user">
                                    <img src="{{ asset('assets/client/images/user.png') }}" alt="user">
                                    <ul class="nav-user">
                                        @if (Session::has('sEmail') and Session::has('sToken'))
                                            <li><a href="/account">Thông tin tài khoản</a></li>
                                            <li><a href="/logout">Đăng xuất</a> </li>
                                        @else
                                            <li><a href="/login">Đăng nhập</a> </li>
                                            <li><a href="/register">Đăng ký</a> </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>

                            <div class="mr-2" id="cart_change">
                                <div id="shopping-cart-mini">
                                    <a href="/cart">
                                        <div id="icon-shopping">
                                            <div class="icon-shopping-cart" title="Giỏ hàng">
                                                <img src="{{ asset('assets/client/images/cart.png') }}"
                                                    alt="Giỏ hàng">
                                            </div>
                                            <span class="count-item-pr" id="count-item"
                                                data-count="0">0</span>
                                        </div>
                                    </a>
                                    <div id="cart_partial">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="header-2">
        <div>
            <ul id="nav-header-2">
                <li>
                    <a href="/">Trang chủ</a>
                </li>

                <li>
                    <a href="/introduction">Giới thiệu</a>
                </li>

                <li>
                    <a href="/products">
                        Sản phẩm
                        <div class="ti-arrow-down-1">
                            <img src="{{ asset('assets/client/images/down.png') }}" alt="arrow-down">
                        </div>
                    </a>
                    @include('clients.blocks.products_navigate')
                </li>

                <li>
                    <a href="#" class="">
                        Khuyến mại nối bật
                        <div class="ti-arrow-down-1">
                            <img src="{{ asset('assets/client/images/down.png') }}" alt="arrow-down">
                        </div>
                    </a>
                    <ul class="nav-2-subnav-2">
                        <li><a href="javascript:;">Tặng voucher 50%</a></li>
                        <li><a href="javascript:;">Lịch Tết</a></li>
                    </ul>
                </li>

                <li>
                    <a href="/news">Tin tức</a>
                </li>

                <li>
                    <a href="/contact">Liên hệ</a>
                </li>
            </ul>
        </div>
    </div>
</div>
