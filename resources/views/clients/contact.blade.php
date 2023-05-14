@extends('layouts.client')

@section('title')
    {{ $title }}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/client/css/stylecontact.css') }}" />
@endsection

@section('content')
    <div id="section-1">
        <div class="container">
            <ul class="list-navigation">
                <li>
                    <a href="index.php">Trang chủ</a>
                </li>
                <li>
                    <strong itemprop="name">Liên hệ</strong>
                </li>
            </ul>
        </div>
    </div>

    <div id="section-2">
        <div class="container">
            <div class="row">
                <div class="col-3 p-3">
                    <div class="leave-your-message">
                        <h3>ĐỂ LẠI TIN NHẮN</h3>
                        <p></p>
                        <div class="contact-box">
                            <div class="icon">
                                <img src="{{ asset('assets/client/images/house_location_pin-512.png') }}">
                            </div>
                            <div class="content">
                                <p>CS1: 828 Đường Láng – Láng Thượng – Hà Nội - 094.1234.828</p>
                            </div>
                        </div>
                        <div class="contact-box">
                            <div class="icon">
                                <img src="{{ asset('assets/client/images/house_location_pin-512.png') }}">
                            </div>
                            <div class="content">
                                <p>CS2: 36 Xuân Thủy – Cầu Giấy – Hà Nội - 0934.173.636</p>
                            </div>
                        </div>
                        <div class="contact-box">
                            <div class="icon">
                                <img src="{{ asset('assets/client/images/house_location_pin-512.png') }}">
                            </div>
                            <div class="content">
                                <p>CS3: 424 Nguyễn Trãi - Thanh Xuân - Hà Nội - 0966.688.424</p>
                            </div>
                        </div>
                        <div class="contact-box">
                            <div class="icon">
                                <img src="{{ asset('assets/client/images/house_location_pin-512.png') }}">
                            </div>
                            <div class="content">
                                <p>CS4: 697 Giải Phóng - Hoàng Mai - Hà Nội - 0933.695.697</p>
                            </div>
                        </div>
                        <div class="contact-box">
                            <div class="icon">
                                <img src="{{ asset('assets/client/images/phone-call.png') }}">
                            </div>
                            <div class="content">
                                <a href="#">0123456789</a>
                            </div>
                        </div>
                        <div class="contact-box">
                            <div class="icon">
                                <img src="{{ asset('assets/client/images/phone-call.png') }}">
                            </div>
                            <div class="content">
                                <a href="#">0123456987</a>
                            </div>
                        </div>
                        <div class="contact-box">
                            <div class="icon">
                                <img src="{{ asset('assets/client/images/email.png') }}">
                            </div>
                            <div class="content">
                                <a href="#">linhphongbook@gmail.com</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-9 p-3">
                    <form id="form-1" class="form-signup">
                        <div class="row">
                            <div class="col-4">
                                <fieldset class="form-group">
                                    <label>
                                        Họ và tên
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" placeholder="Nhập họ và tên" class="form-control" required
                                        id="Name">
                                    <span class="help-block"></span>
                                </fieldset>
                            </div>
                            <div class="col-4">
                                <fieldset class="form-group">
                                    <label>
                                        Email
                                        <span class="required">*</span>
                                    </label>
                                    <input type="email" placeholder="Nhập Địa chỉ Email" class="form-control" required
                                        id="email">
                                    <span class="help-block"></span>
                                </fieldset>
                            </div>
                            <div class="col-4">
                                <fieldset class="form-group">
                                    <label>
                                        Số điện thoại
                                        <span class="required">*</span>
                                    </label>
                                    <input type="tel" placeholder="Nhập Số điện thoại" class="form-control" required
                                        id="phone">
                                    <span class="help-block"></span>
                                </fieldset>
                            </div>
                            <div class="col-12">
                                <fieldset class="form-group">
                                    <label>
                                        Nội dung
                                        <span class="required">*</span>
                                    </label>
                                    <textarea name="contact[body]" id="comment" rows="5" placeholder="Nội dung liên hệ"
                                        required class="form-control"></textarea>
                                    <span class="help-block"></span>
                                </fieldset>
                                <div class="p-3">
                                    <button type="submit" class="btn-style" value="Gửi tin nhắn">Gửi tin nhắn</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.6571856852916!2d105.78272751476362!3d21.046398585988825!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135abb158a2305d%3A0x5c357d21c785ea3d!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyDEkGnhu4duIEzhu7Fj!5e0!3m2!1svi!2s!4v1638086093863!5m2!1svi!2s"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('assets/client/js/validator.js')}}"></script>
    <script>
        Validator({
            form: '#form-1',
            fromGroupSelector: '.form-group',
            rules: [
                Validator.isRequired('#Name'),
                Validator.isRequired('#comment'),
                Validator.isTelephone('#phone'),
                Validator.isEmail('#email')
            ]
        })
    </script>
@endsection
