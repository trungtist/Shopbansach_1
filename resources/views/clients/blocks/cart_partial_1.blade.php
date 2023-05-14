<div class="shopping-cart" id="delete_item">
    <div class="shopping-cart-table">
        <h1 class="lbl-shopping-cart lbl-shopping-cart-gio-hang">
            Giỏ hàng
            <span>
                (
                <span class="count-item-pr" id="count-item1" data-count="0">{{ $cart->totalQuanty }}</span>
                sản phẩm)
            </span>
        </h1>
        <div class="col-main">
            @if ($cart->products)
                <div id="shopping-cart" class="validation-callback">
                    <div class="cart page-cart row">
                        <div class="col-12">
                            <div class="cart-tbody">
                                @foreach ($cart->products as $x => $x_value)
                                    <div class="row shopping-cart-item border-bottom">
                                        <div class="col-4 img-custom">
                                            <p class="image">
                                                <a href="{{ url('/products_detail/' . $x) }}"
                                                    title="{{ $x_value['productInfo']->TenSach }}">
                                                    <img
                                                        src="{{ asset('assets/client/imgs/' . $x_value['productInfo']->AnhBia) }}">
                                                </a>
                                            </p>
                                        </div>
                                        <div class="col-right col-8 content-center">
                                            <div class="box-info-product col-5">
                                                <p class="name">
                                                    <a
                                                        href="{{ url('/products_detail/' . $x) }}">{{ $x_value['productInfo']->TenSach }}</a>
                                                </p>
                                                <p class="c-brands">Thương hiệu:
                                                    <?= $x_value['productInfo']->TenNXB ?>
                                                </p>
                                                <div class="action">
                                                    <button type="button" data-id="{{ $x }}"
                                                        name="delete_cart"
                                                        class="border-0 btn-link text-danger btn_outline remove-item-cart">Xóa</button>
                                                </div>
                                            </div>
                                            <div class="box-price col-3">
                                                <p class="price pricechange">
                                                    {{ number_format($x_value['productInfo']->GiaMoi, 0, ',', '.') }}₫
                                                </p>
                                            </div>
                                            <div class="form-product col-4">
                                                <div class="qty-ant custom-btn-number">
                                                    <div class="d-flex custom custom-btn-numbers form-control">
                                                        <button id="btn_minus_{{ $x }}" type="button"
                                                            class="btn-minus btn-cts update_cart">
                                                            -
                                                        </button>
                                                        <input id="qty_{{ $x }}" type="text" disabled
                                                            class="qty input-text" name="txtQuantity" size="4"
                                                            value="{{ $x_value['quanty'] }}" maxlength="3">
                                                        <button id="btn_plus_{{ $x }}" type="button"
                                                            class="btn-plus btn-cts update_cart">
                                                            +
                                                        </button>
                                                        <button name="Update_cart_1"
                                                            id="Update_cart_{{ $x }}" onclick="UpdateItemCart_1({{ $x }})" type="button"
                                                            hidden>Cập nhật</button>
                                                    </div>
                                                </div>
                                                <script>
                                                    $(document).ready(function() {
                                                        // update quantity
                                                        $('#btn_plus_{{ $x }}').click(function() {
                                                            var oldValue = $("#qty_{{ $x }}").val();
                                                            var newVal = parseFloat(oldValue) + 1;
                                                            $("#qty_{{ $x }}").val(newVal);

                                                            $("#Update_cart_{{ $x }}").click();
                                                        });

                                                        $('#btn_minus_{{ $x }}').click(function() {
                                                            var oldValue = $("#qty_{{ $x }}").val();
                                                            if (oldValue > 1) {
                                                                var newVal = parseFloat(oldValue) - 1;
                                                            } else {
                                                                newVal = 1;
                                                            }
                                                            $("#qty_{{ $x }}").val(newVal);

                                                            $("#Update_cart_{{ $x }}").click();
                                                        });

                                                        $('#qty_{{ $x }}').on('input', function() {
                                                            if ($("#qty_{{ $x }}").val() == "0") {
                                                                $("#qty_{{ $x }}").val("1");
                                                            }
                                                        });
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-12">
                            <div id="right-affix">
                                <div class="row justify-content-end">
                                    <div class="col-7">
                                        <div class="each-row">
                                            <div class="box-style">
                                                <div class="list-info-price">
                                                    <span>Tạm tính: </span>
                                                    <strong class="totals_price">
                                                        {{ number_format($cart->totalPrice, 0, ',', '.') }}₫
                                                    </strong>
                                                </div>
                                            </div>
                                            <div class="box-style">
                                                <div class="total2">
                                                    <span class="text-label">Thành tiền: </span>
                                                    <div class="amount">
                                                        <p>
                                                            <strong
                                                                class="totals_price">{{ number_format($cart->totalPrice, 0, ',', '.') }}₫</strong>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="/payment_check" class="text-white btn-style btn-proceed-checkout">
                                                Thanh toán ngay
                                            </a>
                                            <a class="text-white btn-style" href="/products">
                                                Tiếp tục mua hàng
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="cart-empty" id="cart-empty">
                    <span class="empty-icon">
                        <i class="icon-cart">
                            <img src="{{ asset('assets/client/images/cart_empty.png') }}">
                        </i>
                    </span>
                    <a class="col-5 btn-style" href="/products">Tiếp tục lựa chọn</a>
                </div>
            @endif
        </div>
    </div>
</div>

<script>
    function UpdateItemCart_1(id) {
        let quanty = $(`#qty_${id}`).val();
        $.ajax({
            url: `/UpdateItemCart`,
            type: 'get',
            dataType: 'json',
            data: {
                id: id,
                quanty: quanty,
            }
        }).done(function(response) {
            update_cart_partial();
            $.ajax({
                url: `/InfoCart`,
                type: 'get',
                dataType: 'json',
            }).done(function(response) {
                let html = response.price;
                $('.totals_price').html(html);
            });
        });
    }
    $('#delete_item').on('click',"button[name='delete_cart']", function() {
        let id = $(this).data('id');
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
        update_cart_partial_1();
        update_cart_partial();
    });
</script>
