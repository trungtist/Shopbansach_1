@extends('layouts.client')

@section('title')
    {{ $title }}
@endsection

@section('css')
    <link href="{{ asset('assets/client/css/stylecartprod.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div id="section-1">
        <div class="container">
            <ul class="list-navigation">
                <li>
                    <a itemprop="item" href="index.php" title="Trang chủ">
                        <span itemprop="name">Trang chủ</span>
                    </a>
                </li>
                <li>
                    <strong itemprop="name">Giỏ hàng</strong>
                </li>
            </ul>
        </div>
    </div>

    <div id="section-2">
        <div class="container">
            <div class="row p-3">
                <div class="col-8" id="cart_partial_1">
                    {{-- thong tin gio hang --}}
                </div>
                <div class="col-4">
                    <div class="side-module block">
                        <div class="content-asset">
                            <div class="service-module">
                                <h3>Dịch vụ khách hàng</h3>
                                <p>Bạn cần sự hỗ trợ từ chúng tôi? Hãy liên hệ ngay</p>
                                <ul>
                                    <li>
                                        <a href="#" title="Hotline">
                                            <img src="{{ asset('assets/client/images/phone-call.png') }}">
                                            094.1234.828
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Hotline">
                                            <img src="{{ asset('assets/client/images/iconsfacebook.png') }}">
                                            Chúng tôi trên Facebook
                                        </a>
                                    </li>
                                </ul>
                                <p>Giờ mở cửa (08:00 - 22:00)</p>
                                <a href="contact.php" class="text-links" target="_self">Liên hệ</a>
                            </div>
                        </div>
                    </div>
                    <div class="side-module block usp-payment-module">
                        <div class="content-asset">
                            <h3>Mua sắm cùng EVO FITNESS</h3>
                            <ul class="usp-list">
                                <li>
                                    <span class="color-grey-dark">Sản phẩm đẹp, thân thiện với môi trường</span>
                                    <p></p>
                                </li>
                                <li>
                                    <span class="color-grey-dark">Không lo về giá</span>
                                    <p></p>
                                </li>
                                <li>
                                    <span class="color-grey-dark">Miễn phí vận chuyển</span>
                                    <p>cho đơn hàng từ 500.000 VNĐ</p>
                                </li>
                            </ul>
                            <ul class="payment">
                                <li>
                                    <img src="{{ asset('assets/client/images/cart_payment_1.png') }}"
                                        alt="Hình thức thanh toán">
                                </li>
                                <li>
                                    <img src="{{ asset('assets/client/images/cart_payment_2.png') }}"
                                        alt="Hình thức thanh toán">
                                </li>
                                <li>
                                    <img src="{{ asset('assets/client/images/cart_payment_3.png') }}"
                                        alt="Hình thức thanh toán">
                                </li>
                                <li>
                                    <img src="{{ asset('assets/client/images/cart_payment_4.png') }}"
                                        alt="Hình thức thanh toán">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#cart_change').on('click', "button[name='delete_cart']", function() {
            update_cart_partial_1();
        });

        $(document).ready(function() {
            update_cart_partial_1();
        })
    </script>
@endsection
