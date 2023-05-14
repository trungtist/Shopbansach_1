@extends('layouts.client')

@section('title')
    {{ $title }}
@endsection

@section('css')
    <link href="{{ asset('assets/client/css/styleregister.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div id="section-1">
        <div class="container">
            <ul class="list-navigation">
                <li>
                    <a href="/">Trang chủ</a>
                </li>
                <li>
                    <strong itemprop="name">Đăng ký tài khoản</strong>
                </li>
            </ul>
        </div>
    </div>

    <div id="section-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="page-login account-box-shadow">
                        <div id="login">
                            <div class="text-center">
                                <h1 class="title-head p-2">Đăng ký tài khoản</h1>
                            </div>
                            <div class="social-login text-center margin-bottom-10">
                                <a href="javascript:;" class="social-login--facebook">
                                    <img src="{{ asset('assets/client/images/fb-btn.jpg') }}" alt="Facebook">
                                </a>
                                <a href="javascript:;" class="social-login--google">
                                    <img src="{{ asset('assets/client/images/gp-btn.jpg') }}" alt="google">
                                </a>
                            </div>
                            <div class="line-break">
                                <span>hoặc</span>
                            </div>
                            <form action="/register" id='form-1' method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <label>
                                                Họ và tên
                                                <span class="required">*</span>
                                            </label>
                                            <input type="text" class="form-control" value="" placeholder="Nhập Họ Tên"
                                                name="HoTen" id="name" required>

                                            <span class="help-block"></span>
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <label>
                                                Số điện thoại
                                                <span class="required">*</span>
                                            </label>
                                            <input type="number" class="form-control" value=""
                                                placeholder="Nhập Số điện thoại" name="DienThoai" id="phone" required>

                                            <span class="help-block"></span>
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <label>
                                                Email
                                                <span class="required">*</span>
                                            </label>
                                            <input type="email" class="form-control" value=""
                                                placeholder="Nhập Địa chỉ Email" name="Email" id="email" required>

                                            <span class="help-block"></span>
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-group form_eye">
                                            <label>
                                                Mật khẩu
                                                <span class="required">*</span>
                                            </label>
                                            <input name="MatKhau" class="form-control" type="password"
                                                placeholder="Nhập Mật khẩu" required id="password">

                                            <span class="help-block"></span>
                                            <div toggle="#password-field" class="toggle-password btn_eye">
                                                <p class="eye"><i class="ti-eye"></i></p>
                                                <p class="slash_eye text-white">\</p>
                                                <p class="slash_eye_1 ">\</p>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="col-12 text-center">
                                        @if (!empty($msg))
                                            <p class="alert alert-danger">{{ $msg }}</p>
                                        @else
                                            <script>
                                                $(document).ready(function() {
                                                    localStorage.removeItem('email');
                                                    localStorage.removeItem('phone');
                                                    localStorage.removeItem('name');
                                                })
                                            </script>
                                        @endif
                                        <button id="create_acc" type="submit" value="Đăng ký" class="btn-style">
                                            Tạo tài khoản
                                        </button>
                                        <div class="p-3">
                                            <a href="/login">Đăng nhập.</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/client/js/validator.js') }}"></script>

    <script>
        $(document).ready(function() {
            Validator({
                form: '#form-1',
                fromGroupSelector: '.form-group',
                rules: [
                    Validator.isRequired("#name"),
                    Validator.isEmail("#email"),
                    Validator.isTelephone("#phone"),
                    Validator.isPassword('#password'),
                ]
            })

            $('#create_acc').on('click', function() {
                let Email = $('#email').val();
                let HoTen = $('#name').val();
                let DienThoai = $('#phone').val();
                localStorage.setItem('email', Email);
                localStorage.setItem('name', HoTen);
                localStorage.setItem('phone', DienThoai);
            })

            const email = localStorage.getItem('email');
            const name = localStorage.getItem('name');
            const phone = localStorage.getItem('phone');
            if (email) {
                $('#email').val(email);
                $('#name').val(name);
                $('#phone').val(phone);
            }

            // Swal.fire({
            //     title: "<h5>Tạo tài khoản thành công</h5>",
            //     icon: "success",
            //     showConfirmButton: true,
            //     confirmButtonText: "Đăng nhập ngay!",
            //     showCancelButton: false
            // }).then((result) => {
            //     location.href = 'login.php';
            // });
        })

        $("body").on('click', '.toggle-password', function() {

            var input = $("#password");

            if (input.attr("type") === "password") {
                $(".slash_eye").show();
                $(".slash_eye_1").show();
                input.attr("type", "text");
            } else {
                $(".slash_eye").hide();
                $(".slash_eye_1").hide();
                input.attr("type", "password");
            }
        });
    </script>
@endsection
