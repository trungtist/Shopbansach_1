@extends('layouts.client')

@section('title')
    {{ $title }}
@endsection

@section('css')
    <link href="{{ asset('assets/client/css/styleSearch.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div id="section-1">
        <div class="container">
            <ul class="list-navigation">
                <li>
                    <a itemprop="item" href="/" title="Trang chủ">
                        <span itemprop="name">Trang chủ</span>
                    </a>
                </li>
                <li>
                    <strong itemprop="name">Kết quả tìm kiếm</strong>
                </li>
            </ul>
        </div>
    </div>


    <div id="section-2">
        <div class="container">
            @if (count($result)!=0)
                <div class="product-contain-2">
                    <div class="product-contain-block">
                        <div class="text-center pt-3 pb-1">
                            <h4 style="font-weight: 400" class="text-uppercase">CÓ {{ $total }} sản phẩm PHÙ HỢP với
                                TÌM
                                KIẾM "{{ $search }}".</h4>
                        </div>
                        <div class="row">
                            @foreach ($result as $item)
                                <div class="block-1 col-3">
                                    <div class="nav-block-1">
                                        <a href="{{ url('/products_detail/'.$item->MaSach) }}">
                                            <img src="{{ asset('assets/client/imgs/' . $item->AnhBia) }}"
                                                alt="{{ $item->TenSach }}">
                                        </a>
                                    </div>

                                    <div class="product-action">
                                        <div action="" class="from-action">
                                            <form action="/orderNow" method="GET">
                                                <input hidden name="MaSach" value="{{ $item->MaSach }}">
                                                <button type="submit" class="btn-action add-to-cart" title="Mua ngay">
                                                    <div class="ti-shopping">
                                                        <img src="{{ asset('assets/client/images/muangay1.jpg') }}">
                                                    </div>
                                                </button>
                                            </form>

                                            <button id="search_{{ $item->MaSach }}" name="search" type="button"
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
                                    <div class="product-info p-2">
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
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="pb-5">
                    {{ $result->links('clients.blocks.products_page') }}
                </div>
            @else
                <h4 class="p-3 m-0 text-center text-uppercase" style="font-weight: 400">Không có sản phẩm nào cho tìm kiếm
                    "<?= $search ?>".</h4>
            @endif
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).on('click', "button[name='search']", function() {
            let id = $(this).attr('id');
            id = id.replace("search_", "");
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
@endsection
