<div id="section-4">
    <div class="container">
        <!-- <div class="row"> -->
        <div class="section_best_sale_product">
            <a href="javascript:;" class="title-a" title="Sản phẩm mới">
                <script>
                    var run = 0;
                    var message = "Sản phẩm mới" //Chữ cần tạo hiệu ứng
                    var neonbasecolor = "#fff" //Mầu chữ ban đầu
                    var neontextsize = "40"
                    var neontextcolor = "#89ff00" //Hiệu ứng mầu 1
                    var neontextcolor2 = "#ccc" //Hiệu ứng mầu 2
                    var flashspeed = 100 //Tốc độ của hiệu ứng
                    var flashingletters = 3 // Số chữ thay đổi màu của lần 1
                    var flashingletters2 = 1 // Số chữ thay đổi màu của lần 2
                    var flashpause = 0 // the pause between flash-cycles in milliseconds
                    ///No need to edit below this line/////
                    var n = 0;
                    if (document.all || document.getElementById) {
                        document.write('<font color="' + neonbasecolor + '">')
                        for (m = 0; m < message.length; m++)
                            document.write('<span id="neonlight' + m + '">' + message.charAt(m) + '</span>')
                        document.write('</font>')
                    } else
                        document.write(message)

                    function crossref(number) {
                        var crossobj = document.all ? eval("document.all.neonlight" + number) : document.getElementById("neonlight" +
                            number)
                        return crossobj
                    }

                    function neon() {
                        if (run == 1) {
                            neontextcolor = "yellow" //Hiệu ứng mầu 1
                        } else {
                            neontextcolor = "#89ff00" //Hiệu ứng mầu 1
                        }
                        //Change all letters to base color
                        if (n == 0) {
                            for (m = 0; m < message.length; m++)
                                crossref(m).style.color = neonbasecolor;
                        }
                        //cycle through and change individual letters to neon color
                        crossref(n).style.color = neontextcolor;
                        if (n > flashingletters - 1) crossref(n - flashingletters).style.color = neontextcolor2
                        if (n > (flashingletters + flashingletters2) - 1) crossref(n - flashingletters - flashingletters2).style.color =
                            neonbasecolor
                        if (n < message.length - 1)
                            n++;
                        else {
                            n = 0
                            clearInterval(flashing)
                            setTimeout("beginneon()", flashpause)
                            return
                        }
                        if (run == 2) {
                            run = 0;
                        }
                    }

                    function beginneon() {
                        if (document.all || document.getElementById)
                            flashing = setInterval("neon()", flashspeed);
                        run++;
                    }
                    beginneon()
                </script>
            </a>

            <!-- sach noi bat -->
            <div class="best-sell-slick">
                <div class="slick-list">
                    <div class="slick-track">
                        <div class="owl-carousel">
                            @if (!empty($books_new))
                                @foreach ($books_new as $key => $item)
                                    <div>
                                        <div class="nav-slick-track float-left">
                                            <div class="product-img">
                                                <a href="{{ url('/products_detail/'.$item->MaSach) }}">
                                                    <img src="{{ asset('assets/client/imgs/' . $item->AnhBia) }}"
                                                        alt=".">
                                                </a>
                                            </div>
                                            <div class="product-action">
                                                <div class="from-action">
                                                    <form action="/orderNow" method="GET">
                                                        <input hidden name="MaSach" value="{{ $item->MaSach }}">
                                                        <button type="submit" class="btn-action add-to-cart"
                                                            title="Mua ngay">
                                                            <div class="ti-shopping">
                                                                <img
                                                                    src="{{ asset('assets/client/images/muangay1.jpg') }}">
                                                            </div>
                                                        </button>
                                                    </form>

                                                    <button id="noibat_{{ $item->MaSach }}" name="insertnb"
                                                        type="button" class="btn-action add-to-cart"
                                                        title="Thêm vào giỏ">
                                                        <div class="ti-shopping">
                                                            <img src="{{ asset('assets/client/images/cart.png') }}">
                                                        </div>
                                                    </button>

                                                </div>
                                            </div>
                                            @if ($item->GiamGia > 0)
                                                <div class="product-badge">- {{ $item->GiamGia }}%</div>
                                            @endif

                                            <div class="product-info">
                                                <h3 class="product-title">
                                                    <a href="{{ url('/products_detail/'.$item->MaSach) }}" title="{{ $item->TenSach }}">
                                                        {{ $item->TenSach }}
                                                    </a>
                                                </h3>
                                                <span class="product-price-wrapper">
                                                    <span
                                                        class="money">{{ number_format($item->GiaMoi, 0, ',', '.') }}₫</span>
                                                    @if ($item->GiamGia > 0)
                                                        <span
                                                            class="money-old">{{ number_format($item->GiaBan, 0, ',', '.') }}₫</span>
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div>
                                    <div class="nav-slick-track float-left">
                                        <div class="product-img">
                                            <a href="javascript:;">
                                                <img src="{{ asset('assets/client/images/not_image.png') }}" alt="">
                                            </a>
                                        </div>

                                        <div class="product-info">
                                            <h3 class="product-title">
                                                <a href="javascript:;" title="Sản phẩm đang được cập nhật!">
                                                    Sản phẩm đang được cập nhật!
                                                </a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <script>
                    $('.owl-carousel').owlCarousel({
                        loop: true,
                        margin: 10,
                        responsiveClass: true,
                        responsive: {
                            0: {
                                items: 1,
                                nav: true
                            },
                            600: {
                                items: 3,
                                nav: false
                            },
                            1000: {
                                items: 5,
                                nav: true,
                                loop: false
                            }
                        }
                    })

                    $(document).on('click', "button[name='insertnb']", function() {
                        let id = $(this).attr('id');
                        id = id.replace("noibat_", "");
                        $(document).on('click', '.SwalBtn1', function() {
                            swal.close();
                        });
                        $.ajax({
                            url: '/AddCart',
                            type: 'get',
                            dataType: 'json',
                            data: {
                                id: id,
                                quanty: 1
                            },
                            success: function(data) {
                                if (data.code == 200) {
                                    Swal.fire({
                                        html: `<div class="text-info"><i class="ti-check"></i>` + data.msg +
                                            `</div><span class="ml-4 SwalBtn1 remove-item-cart">×</span>` +
                                            `<div class="row align-items-center p-3 btn_border border-secondary">` +
                                            `<div class="col p-0"><img class="thumb-1x1" src="{{ asset('assets/client/imgs') }}/` +
                                            data.img + `"/></div><div class="col p-0">` + data.TenSach +
                                            "</div></div>" +
                                            `<div class="row">
                                            <a href="/cart"  style="display: inline-block;"><i class="ti-angle-right"></i> Giỏ hàng hiện có (` +
                                                                            data.total + `) sản phẩm</a>
                                            </div>` +
                                            `<div class="row pt-2 justify-content-center"><a href="/payment_check" class="btn btn-primary text-white w-100">Tiến hành thanh toán<i class="ti-arrow-right"></i></a></div>`,
                                        showConfirmButton: false,
                                    }).then((result) => {
                                        // location.reload();
                                        update_cart_partial();
                                    });
                                } else {
                                    Swal.fire({
                                        title: "<h4>" + data.msg + "</h4>",
                                        text: data.msg,
                                        icon: "danger",
                                        showConfirmButton: true
                                    })
                                }
                            }
                        })
                    });
                </script>
            </div>
        </div>
        <!-- </div> -->
    </div>
</div>
<!-- end - section-4 -->
