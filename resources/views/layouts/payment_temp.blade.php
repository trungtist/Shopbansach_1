<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('assets/client/images/iconThanhtoan.png') }}" type="image/png" />
    <title>@yield('title') - LinhTrungBook</title>

    <link rel="stylesheet" href="{{ asset('assets/client/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/stylegeneral.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/owlcarousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/owlcarousel/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/bootStrap4.0.0.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/sweetalert2/sweetalert2.min.css') }}">
    <link href="{{ asset('assets/client/css/stylecartprod.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/client/css/stylePayment.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/client/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/client/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/boostrap4.0.0.min.js') }}"></script>
    @yield('css')
</head>

<body>
    <content>
        <div id="section-2" style="height:100%">
            <div class="container p-5">
                <div class="col-main mb-5">
                    <div id="shopping-cart" class="validation-callback">
                        <div class="cart page-cart row">
                            <div class="col-12 text-center m-3">
                                <img src="{{ asset('assets/client/images/logo1.png') }}" />
                            </div>
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="background-color: #fff; height: 100px"></div>
        <a href='#' id="bttop" title="Lên đầu trang">
            <div class="back-to-top d-flex align-items-center justify-content-center">
                <div class="btn-to-top">
                    <img src="{{ asset('assets/client/images/preview.png') }}">
                </div>
            </div>
        </a>
    </content>
    
    <script type="text/javascript" src="{{ asset('assets/client/js/backtotop.js') }}"></script>
    <script src="{{ asset('assets/client/sweetalert2/sweetalert2.all.min.js') }}"></script>
    @yield('js')
</body>

</html>
