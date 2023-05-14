@if ($order->products)
    @php
        end($order->products);
        $key = key($order->products);
    @endphp
    <div class="list-item-cart has-item-cart">
        <div id="item_list" class="border-bottom">
            @foreach ($order->products as $x => $x_value)
                <div class="item-cart row @if ($key != $x) border-bottom @endif">
                    <div class="col-4 pr-0">
                        <a href="{{ url('/products_detail/' . $x) }}" title="{{ $x_value['productInfo']->TenSach }}"
                            class="product-image">
                            <img src="{{ asset('assets/client/imgs/' . $x_value['productInfo']->AnhBia) }}">
                        </a>
                    </div>
                    <div class="col-6 p-0">
                        <div class="detail-item">
                            <div class="product-details">
                                <p class="product-name">
                                    <a
                                        href="{{ url('/products_detail/' . $x) }}">{{ $x_value['productInfo']->TenSach }}</a>
                                </p>
                            </div>
                            <div class="product-details-bottom">
                                <span class="price pricechange">
                                    {{ number_format($x_value['productInfo']->GiaMoi, 0, ',', '.') }}₫
                                </span>
                            </div>
                            <div class="form-product">
                                <div class="form-group">
                                    <div class="qty-ant custom-btn-number">
                                        <div class="custom custom-btn-numbers form-control">
                                            <button id="btn_minus__{{ $x }}" type="button"
                                                class="btn-minus btn-cts update_cart">
                                                -
                                            </button>
                                            <input id="qty__{{ $x }}" type="text" class="qty input-text"
                                                name="txtQuantity" size="4" disabled value="{{ $x_value['quanty'] }}"
                                                maxlength="3">
                                            <button id="btn_plus__{{ $x }}" type="button"
                                                class="btn-plus btn-cts update_cart">
                                                +
                                            </button>
                                            <button id="Update_cart__{{ $x }}"
                                                onclick="UpdateItemCart({{ $x }})" name="Update_cart"
                                                type="submit" hidden>Cập nhật</button>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        // update quantity
                                        $('#btn_plus__{{ $x }}').click(function() {
                                            var oldValue = $("#qty__{{ $x }}").val();
                                            var newVal = parseFloat(oldValue) + 1;
                                            $("#qty__{{ $x }}").val(newVal);

                                            $("#Update_cart__{{ $x }}").click();
                                        });

                                        $('#btn_minus__{{ $x }}').click(function() {
                                            var oldValue = $("#qty__{{ $x }}").val();
                                            if (oldValue > 1) {
                                                var newVal = parseFloat(oldValue) - 1;
                                            } else {
                                                newVal = 1;
                                            }
                                            $("#qty__{{ $x }}").val(newVal);

                                            $("#Update_cart__{{ $x }}").click();
                                        });
                                        $('#qty__{{ $x }}').on('input', function() {
                                            if ($("#qty__{{ $x }}").val() == "0") {
                                                $("#qty__{{ $x }}").val("1");
                                            }
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 pr-0">
                        <button id="delete_cart_{{ $x }}" type="button" name="delete_cart"
                            data-id="{{ $x }}"
                            class="border-0 bg-white btn_outline remove-item-cart">×</button>
                    </div>
                </div>
            @endforeach
        </div>
        <div>
            <div class="price_total row justify-content-between m-0 pt-3 pb-2">
                <div>
                    <b>Tổng tiền:</b>
                </div>
                <div class="text-primary">
                    <b id="total_price">{{ number_format($order->totalPrice, 0, ',', '.') }}₫</b>
                </div>
            </div>
            <a href="/payment_check" class="text-white btn-style btn-proceed-checkout">
                Thanh toán ngay
            </a>
            <a href="/cart" class="text-white btn-style btn-proceed-checkout">
                Giỏ hàng
            </a>
        </div>
    </div>
@else
    <div class="no-item-cart active">
        Không có sản phẩm nào trong giỏ hàng.
    </div>
@endif

<script>
    function UpdateItemCart(id) {
        let quanty = $(`#qty__${id}`).val();
        $.ajax({
            url: `/UpdateItemCart`,
            type: 'get',
            dataType: 'json',
            data: {
                id: id,
                quanty: quanty,
            }
        }).done(function(response) {
            update_cart_partial_1();
            $.ajax({
                url: `/InfoCart`,
                type: 'get',
                dataType: 'json',
            }).done(function(response) {
                let html = response.price;
                $('#total_price').html(html);
            });
        });
    }
</script>
