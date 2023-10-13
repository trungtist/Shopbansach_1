<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('assets/client/images/iconbook.png') }}" type="image/png" />
    <title>@yield('title') - Trung Book Store</title>

    <link rel="stylesheet" href="{{ asset('assets/client/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/stylegeneral.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/owlcarousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/owlcarousel/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/bootStrap4.0.0.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/sweetalert2/sweetalert2.min.css') }}">
    <script src="{{ asset('assets/client/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/client/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/boostrap4.0.0.min.js') }}"></script>
    @yield('css')
</head>

<body id="page-top">
    <div id="main">
        @include('clients.blocks.header')
        @yield('content')
        @include('clients.blocks.footer')
    </div>
    
    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "102892709005284");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v13.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- <script src="assets/js/GioHang.js"></script> -->
    <script src="{{ asset('assets/client/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/chuchay1.js') }}"></script>
    <script>
        function short_url(full_url, remove_str) {
            if (full_url.includes(remove_str)) {
                return full_url.substring(0, full_url.indexOf(remove_str));
            }
            return full_url
        }

        $(function() {
            var current_page_URL = location.href;
            current_page_URL = short_url(current_page_URL, '?');
            current_page_URL = short_url(current_page_URL, '/detail');

            $("#header-2 a").each(function() {
                if ($(this).attr("href") !== "#" && $(this).attr("href") != "") {
                    var target_URL = $(this).prop("href");
                    if (target_URL == current_page_URL) {
                        $(this).addClass('color-rgba');
                        return false;
                    }
                }
            });
        });

        function info_cart() {
            $.ajax({
                url: `/InfoCart`,
                type: 'get',
                dataType: 'json',
            }).done(function(response) {
                $('#count-item').text(response.total);
            });
        }

        function update_cart_partial() {
            $.ajax({
                url: `/html_cart_partial`,
                type: 'get'
            }).done(function(response) {
                $('#cart_partial').html(response); //---gio hang
            });
            // thong tin cart
            info_cart();
        }

        function update_cart_partial_1() {
            $.ajax({
                url: `/html_cart_partial_1`,
                type: 'get'
            }).done(function(response) {
                $('#cart_partial_1').html(response);
            });
            // thong tin cart
            info_cart();
        }


        $(document).ready(function() {
            // cap nhat gio va thong tin cart
            update_cart_partial();
        });


        // xoa item gio hang
        $('#cart_change').on('click', "button[name='delete_cart']", function() {
            let id = $(this).data('id');
            // id = id.replace("delete_cart_", "");
            $.ajax({
                url: '/DeleteItemCart',
                type: 'get',
                dataType: 'json',
                data: {
                    id: id
                },
                success: function(data) {
                    // console.log(data);
                    if (data.code == 200) {
                        // location.reload();
                        update_cart_partial();
                    } else {
                        Swal.fire({
                            title: "<h4 Có lỗi xảy ra </h4>",
                            text: "Vui lòng thử lại",
                            icon: "warning",
                            showConfirmButton: true
                        })
                    }
                }
            })
        });
    </script>
    @yield('js')
</body>

</html>
