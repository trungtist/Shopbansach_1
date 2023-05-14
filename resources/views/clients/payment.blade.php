@extends('layouts.payment_temp')

@section('title')
    {{ $title }}
@endsection

@section('css')
@endsection

@section('content')
    <div class="col-12">
        <h4 style="text-transform: uppercase;">Đơn hàng ( {{ $total }} sản phẩm)</h4>
        <div class="cart-tbody">
            @foreach ($oldCart as $x => $x_value)
                <div class="row shopping-cart-item border-bottom">
                    <div class="col-3 img-custom">
                        <p class="image">
                            <img src="{{ asset('assets/client/imgs/' . $x_value['productInfo']->AnhBia) }}"
                                title="{{ $x_value['productInfo']->TenSach }}">
                        </p>
                    </div>
                    <div class="col-right col-9 content-center">
                        <div class="box-info-product col-5">
                            <p class="name">
                                {{ $x_value['productInfo']->TenSach }}
                            </p>
                        </div>
                        <div class="box-price col-3">
                            <p class="price pricechange">
                                {{ number_format($x_value['productInfo']->GiaMoi, 0, ',', '.') }}
                                ₫</p>
                        </div>
                        <div class="form-product col-4">
                            <div class="add-to-cart-form">
                                <div class="qty-ant custom-btn-number">
                                    <div class="custom custom-btn-numbers form-control">
                                        <input id="qty_{{ $x }}" type="text" disabled class="qty input-text"
                                            name="txtQuantity" size="4" value="{{ $x_value['quanty'] }}" maxlength="3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-12">
        <div id="right-affix">
            <div class="row justify-content-end">
                <div class="col-5 text-center justify-content-center">
                    <a href="/cart" class="text-danger">
                        ❮ Quay về giỏ hàng
                    </a>
                </div>
                <div class="col-7">
                    <div class="each-row">
                        <form action="/client_order" method="POST">
                            @csrf
                            <label for="choice_vt">Địa chỉ nhận hàng: (<span class="text-danger">*</span>) </label>
                            <fieldset class="form-group">
                                <select name="id" id="lstVitri" class="form-control">
                                    <option selected value="">-- Chọn --</option>
                                    @if (count($local_ship) > 0)
                                        @foreach ($local_ship as $item)
                                            <option value="{{ $item->MaViTri }}"> {{ $item->TenViTri }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </fieldset>

                            <label for="description">Ghi chú thêm:</label>
                            <textarea id="description" name="desct" rows="5" class="form-control"></textarea>

                            <div class="box-style">
                                <div class="list-info-price">
                                    <span>Tạm tính: </span>
                                    <strong class="totals_price">
                                        {{ $totalprice }}
                                    </strong>
                                </div>
                            </div>

                            <div class="box-style">
                                <div class="list-info-price">
                                    <span>Phí giao dịch: </span>
                                    <strong class="totals_price" id="chargesship">
                                        0₫
                                    </strong>
                                </div>
                            </div>

                            <div class="box-style">
                                <div class="total2">
                                    <span class="text-label">Thành tiền: </span>
                                    <div class="amount">
                                        <p>
                                            <strong class="totals_price" id="total">0₫</strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @if (Session::get('error'))
                                <div class="alert alert-danger">{{ Session::get('error') }}</div>
                            @endif
                            <div class="text-center">
                                <span class="text-info">***Hình thức thanh toán***</span>
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <button id="order" class="text-white btn-style btn-proceed-checkout" type="button">
                                        Thanh toán khi nhận hàng
                                    </button>
                                    <button hidden id="order_normal" class="text-white btn-style btn-proceed-checkout" type="submit">
                                        Thanh toán khi nhận hàng
                                    </button>
                                </div>
                                <div class="col-md-5">
                                    <button id="order_1" type="button" class="text-white btn-style btn-proceed-checkout"
                                        type="button">
                                        Thánh toán online
                                    </button>
                                    <button id="order_cart" hidden name="payment" value="1" type="submit" class="text-white btn-style btn-proceed-checkout"
                                        type="button">
                                        Thánh toán online
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function select_vitri() {
            let vitri = $("#lstVitri").val();
            $.ajax({
                url: '/change_ship',
                type: 'get',
                dataType: 'json',
                data: {
                    id: vitri,
                },
                success: function(data) {
                    if (data.code == 200) {
                        $('#chargesship').html(data.fee);
                        $('#total').html(data.totalpriceall);
                    } else {
                        Swal.fire({
                            title: "<h5>" + data.msg + "</h5>",
                            icon: "error",
                            showConfirmButton: true
                        });
                    }
                }
            })
        }


        $(document).on('change', "#lstVitri", function() {
            select_vitri();
        });

        $(document).ready(function() {
            $("#order").on('click', function(event) {
                event.preventDefault();
                let desct = $("#description").val();
                let _token = $("input[name='_token']").val();
                let vitri = $("#lstVitri").val();
                if (vitri) {
                    if (desct.length <= 300) {
                        Swal.fire({
                            title: "<h5>Bạn chắc chắn muốn đặt đơn hàng?</h5>",
                            icon: "question",
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Đồng ý!'
                        }).then((result) => {
                            $('#order_normal').click();
                        });
                    } else {
                        Swal.fire({
                            title: "<h4>Phần mô tả không quá 300 ký tự!</h4>",
                            text: "Vui lòng thực hiện lại.",
                            icon: "error",
                            showConfirmButton: true
                        })
                    }
                } else {
                    Swal.fire({
                        title: "<h4>Bạn chưa chọn địa chỉ nhận hàng!</h4>",
                        text: "Vui lòng thực hiện lại.",
                        icon: "warning",
                        showConfirmButton: true
                    })
                }
            })
            $("#order_1").on('click', function(event) {
                event.preventDefault();
                let desct = $("#description").val();
                let _token = $("input[name='_token']").val();
                let vitri = $("#lstVitri").val();
                if (vitri) {
                    if (desct.length <= 300) {
                        $('#order_cart').click();
                    } else {
                        Swal.fire({
                            title: "<h4>Phần mô tả không quá 300 ký tự!</h4>",
                            text: "Vui lòng thực hiện lại.",
                            icon: "error",
                            showConfirmButton: true
                        })
                    }
                } else {
                    Swal.fire({
                        title: "<h4>Bạn chưa chọn địa chỉ nhận hàng!</h4>",
                        text: "Vui lòng thực hiện lại.",
                        icon: "warning",
                        showConfirmButton: true
                    })
                }
            })
        });
    </script>
@endsection
