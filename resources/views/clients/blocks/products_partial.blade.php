<!--dòng sản phẩm 1-->
@if (count($sach_all) != 0)
    <div id="list_product_container">
        <div class="product-contain-2">
            <div class="product-contain-block row p-0 m-0">
                @foreach ($sach_all as $item_sach)
                    <div class="block-1 col-3">
                        <div class="nav-block-1">
                            <a href="{{ url('/products_detail/'.$item_sach->MaSach) }}">
                                <img src="{{ asset('assets/client/imgs/' . $item_sach->AnhBia) }}">
                            </a>
                        </div>

                        <div class="product-action">
                            <div class="from-action">
                                <form action="/orderNow" method="GET">
                                    <input hidden name="MaSach" value="{{ $item_sach->MaSach }}">
                                    <button type="submit" class="btn-action add-to-cart" title="Mua ngay">
                                        <div class="ti-shopping">
                                            <img src="{{ asset('assets/client/images/muangay1.jpg') }}">
                                        </div>
                                    </button>
                                </form>
                                <button id="bookall_{{ $item_sach->MaSach }}" name="bookall" type="button"
                                    class="btn-action add-to-cart" title="Thêm vào giỏ">
                                    <div class="ti-shopping">
                                        <img src="{{ asset('assets/client/images/cart.png') }}">
                                    </div>
                                </button>

                            </div>
                        </div>
                        @if ($item_sach->GiamGia > 0)
                            <div class="product-badge">- {{ $item_sach->GiamGia }}%</div>
                        @endif
                        <div class="product-info">
                            <h3 class="product-title">
                                <a href="{{ url('/products_detail/'.$item_sach->MaSach) }}" title="{{ $item_sach->TenSach }}">
                                    {{ $item_sach->TenSach }}
                                </a>
                            </h3>
                            <span class="product-price-wrapper">
                                <span
                                    class="money">{{ number_format($item_sach->GiaMoi, 0, ',', '.') }}₫</span>
                                @if ($item_sach->GiamGia > 0)
                                    <span
                                        class="money-old">{{ number_format($item_sach->GiaBan, 0, ',', '.') }}₫</span>
                                @endif
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{ $sach_all->links('clients.blocks.products_page') }}
    </div>
@else
    <div id="alert">
        <div class="d-none d-flex alert p-2 mt-2 ml-2 alert-info justify-content-between align-items-center">
            Không có sản phẩm nào trong danh mục này.
            <input id="close" style="font-size:20px;" type="button" class="btn p-0 mr-2 alert-info border-0"
                value="×" />
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#close").on("click", function() {
                $("#alert").hide();
            });
        });
    </script>
@endif

<script>
    $(document).on('click', "button[name='bookall']", function() {
        let id = $(this).attr('id');
        id = id.replace("bookall_", "");
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
