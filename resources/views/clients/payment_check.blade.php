@extends('layouts.payment_temp')

@section('title')
    {{ $title }}
@endsection

@section('css')
@endsection

@section('content')
    <div class="col-12">
        <h4>Thông báo</h4>
        <p>
            Một số sản phẩm trong giỏ hàng không còn đủ số lượng để đặt hàng. Chúng tôi xin lỗi vì sự bất tiện này.
        </p>
        <div class="cart-tbody">
            @if ($oldCart)
                @foreach ($oldCart as $x => $x_value)
                    @foreach ($check_sach as $c => $c_value)
                        @if ($x == $c)
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
                                    <div class="box-price col-2">
                                        <p class="price pricechange">{{ number_format($x_value['productInfo']->GiaMoi, 0, ',', '.') }}₫
                                        </p>
                                    </div>
                                    
                                    <div class="form-product col-2">
                                        <div class="add-to-cart-form">
                                            <div class="qty-ant custom-btn-number">
                                                <div class="custom custom-btn-numbers form-control">
                                                    <input type="text" disabled class="qty input-text" name="txtQuantity"
                                                        size="4" value="{{ $x_value['quanty'] }}" maxlength="3">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-1">
                                        <i class="ti-arrow-right"></i>
                                    </div>
                                    <div class="form-product col-2">
                                        <div class="add-to-cart-form">
                                            <div class="qty-ant custom-btn-number">
                                                <div class="custom custom-btn-numbers form-control">
                                                    <input type="text" disabled class="qty input-text" name="txtQuantity"
                                                        value="{{ $c_value['SoLuong'] }}" size="4" maxlength="3">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if ($c_value['SoLuong'] == 0)
                                    <p class="text-danger">Sản phẩm này hiện tại đã hết hàng. Chúng tôi xin lỗi vì sự bất
                                        tiện
                                        này.</p>
                                @endif
                            </div>
                        @endif
                    @endforeach
                @endforeach
            @else
                <p>
                    Một số sản phẩm trong giỏ hàng không còn đủ số lượng để đặt hàng. Chúng tôi xin lỗi vì sự bất tiện này.
                </p>
            @endif
        </div>
    </div>
    <div class="col-6">
        <div id="right-affix">
            <div class="row justify-content-end">
                <div class="col-5 text-center justify-content-center">
                    <a href="/cart" class="text-info">
                        ❮ Quay về giỏ hàng
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div id="right-affix">
            <div class="row justify-content-end">
                <div class="col-5 text-center justify-content-center">
                    <form action="/payment_check" method="POST">
                        @csrf
                        <button class="text-white btn-style btn-proceed-checkout" type="submit">
                            Xác nhận thay đổi
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
