<div id="section-5">
    <div class="container">
        <!-- <div class="row"> -->
        <div class="col-m-p">
            <div class="section-product-title-and-menu">
                <h3><a href="" title="Tủ sách">Tủ sách</a></h3>
                <aside class="viewmore">
                    @foreach ($type_science as $item)
                        <a href="/products?MaChuDe={{ $item->MaChuDe }}&MaLoai={{ $item->MaLoai }}" title="{{ $item->TenLoai }}">{{ $item->TenLoai }}</a>
                    @endforeach
                </aside>
            </div>

            <div class="product-contain">
                <div class="product-contain-1">
                    <div class="product-contain-banner">
                        <div class="banner-1">
                            <a href="javascript:;">
                                <img src="{{ asset('assets/client/images/evo_block_product_1_image_1.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="">
                            <a href="javascript:;">
                                <img src="{{ asset('assets/client/images/evo_block_product_1_image_2.jpg') }}" alt="">
                            </a>
                        </div>
                    </div>
                </div>

                <!-- san pham -->
                <div class="product-contain-2">
                    <div class="product-contain-block">
                        @if (!empty($tu_sach))
                            @foreach ($tu_sach as $item)
                                <div class="block-1 col-3">
                                    <div class="nav-block-1">
                                        <a href="{{ url('/products_detail/'.$item->MaSach) }}">
                                            <img src="{{ asset('assets/client/imgs/' . $item->AnhBia) }}" alt=".">
                                        </a>
                                    </div>

                                    <div class="product-action">
                                        <div class="from-action">
                                            <form action="/orderNow" method="GET">
                                                <input hidden name="MaSach" value="{{ $item->MaSach }}">
                                                <button type="submit" class="btn-action add-to-cart" title="Mua ngay">
                                                    <div class="ti-shopping">
                                                        <img src="{{ asset('assets/client/images/muangay1.jpg') }}">
                                                    </div>
                                                </button>
                                            </form>
                                            <button id="insert_{{ $item->MaSach }}" name="insert" type="button"
                                                class="btn-action add-to-cart" title="Thêm vào giỏ">
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
                                            <span class="money">{{ number_format($item->GiaMoi, 0, ',', '.') }}₫</span>
                                            @if ($item->GiamGia > 0)
                                                <span
                                                    class="money-old">{{ number_format($item->GiaBan, 0, ',', '.') }}₫</span>
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="block-1 col-3">
                                <div class="nav-block-1">
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
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </div>
</div>
<!-- end - section-5 -->

<!-- Begin-section-6 -->
<div id="section-6">
    <div class="container">
        <!-- <div class="row"> -->
        <div class="col-m-p">
            <div class="section-product-title-and-menu">
                <h3>
                    <a href="product.php?MaChuDe=2" title="Sách giáo khoa">Sách giáo khoa</a>
                </h3>
                <aside class="viewmore">
                    @foreach ($type_bookcase as $item)
                        <a href="/products?MaChuDe={{ $item->MaChuDe }}&MaLoai={{ $item->MaLoai }}" title="{{ $item->TenLoai }}">{{ $item->TenLoai }}</a>
                    @endforeach
                </aside>
            </div>

            <div class="product-contain">
                <div class="product-contain-1">
                    <div class="product-contain-banner">
                        <div class="banner-1">
                            <a href="javascript:;">
                                <img src="{{ asset('assets/client/images/evo_block_product_2_image_1.jpg') }}"
                                    alt="">
                            </a>
                        </div>
                        <div class="">
                            <a href="javascript:;">
                                <img src="{{ asset('assets/client/images/evo_block_product_2_image_2.jpg') }}"
                                    alt="">
                            </a>
                        </div>
                    </div>
                </div>

                <!-- san pham -->
                <div class="product-contain-2">
                    <div class="product-contain-block">
                        @if (!empty($sach_giao_khoa))
                            @foreach ($sach_giao_khoa as $item)
                                <div class="block-1 col-3">
                                    <div class="nav-block-1">
                                        <a href="{{ url('/products_detail/'.$item->MaSach) }}">
                                            <img src="{{ asset('assets/client/imgs/' . $item->AnhBia) }}" alt=".">
                                        </a>
                                    </div>

                                    <div class="product-action">
                                        <div class="from-action">
                                            <form action="/orderNow" method="GET">
                                                <input hidden name="MaSach" value="{{ $item->MaSach }}">
                                                <button type="submit" class="btn-action add-to-cart" title="Mua ngay">
                                                    <div class="ti-shopping">
                                                        <img src="{{ asset('assets/client/images/muangay1.jpg') }}">
                                                    </div>
                                                </button>
                                            </form>
                                            @csrf
                                            <button id="sachgk_{{ $item->MaSach }}" name="insertsgk" type="button"
                                                class="btn-action add-to-cart" title="Thêm vào giỏ">
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
                                            <span class="money">{{ number_format($item->GiaMoi, 0, ',', '.') }}₫</span>
                                            @if ($item->GiamGia > 0)
                                                <span
                                                    class="money-old">{{ number_format($item->GiaBan, 0, ',', '.') }}₫</span>
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="block-1 col-3">
                                <div class="nav-block-1">
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
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </div>
</div>
<!-- end-section-6 -->

<script>
    $(document).on('click', "button[name='insertsgk']", function() {
        let id = $(this).attr('id');
        id = id.replace("sachgk_", "");   
        $(document).on('click', '.SwalBtn1', function() {
            swal.close();
        });
        
        $.ajax({
            url: `/AddCart`,
            type: 'get',
            dataType: 'json',
            data:{
                id: id,
                quanty: 1,
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

<script>
    $(document).on('click', "button[name='insert']", function() {
        let id = $(this).attr('id');
        id = id.replace("insert_", "");
        $(document).on('click', '.SwalBtn1', function() {
            swal.close();
        });
        $.ajax({
            url: `/AddCart`,
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
