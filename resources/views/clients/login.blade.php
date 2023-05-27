@extends('layouts.client')

@section('title')
    {{ $title }}
@endsection

@section('css')
    <link href="{{ asset('assets/client/css/stylelogin.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div id="section-1">
        <div class="container">
            <ul class="list-navigation">
                <li>
                    <a href="/">Trang chủ</a>
                </li>
                <li>
                    <strong itemprop="name">Đăng nhập tài khoản</strong>
                </li>
            </ul>
        </div>
    </div>
    <div id="section-2">
        <div class="container ">
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="page-login account-box-shadow">
                        <div id="login">
                            <div class="text-center">
                                <h1 class="title-head p-2">Đăng nhập tài khoản</h1>
                            </div>
                            <!-- Login With Facebook -->
                            <div class="social-login text-center margin-bottom-10">
                                <a href="#" class="social-login--facebook">
                                    <img src="{{ asset('assets/client/images/fb-btn.jpg') }}" alt="Facebook">
                                </a>
                                <a href="#" class="social-login--google">
                                    <img src="{{ asset('assets/client/images/gp-btn.jpg') }}" alt="google">
                                </a>
                            </div>
                            <div class="line_break">
                                <span>hoặc</span>
                            </div>
                            <form action="/login" id="form-1" method="POST">
                                @csrf
                                <div class="form-signup">
                                    <fieldset class="form-group margin-bottom-10">
                                        <label>
                                            Email
                                            <span class="required">*</span>
                                        </label>
                                        <input type="email" class="form-control" value="" placeholder="Nhập Địa chỉ Email"
                                            name="Email" id="email" required>
                                        <span class="help-block"></span>
                                    </fieldset>
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
                                            <p class="slash_eye_1">\</p>
                                        </div>
                                    </fieldset>
                                    <p class="text-left recover">
                                        <a class="btn-link-style" href="#" title="Quên mật khẩu?">Quên mật khẩu?</a>
                                    </p>
                                    @if (!empty($msg))
                                        <p class="alert alert-danger">{{ $msg }}</p>
                                    @else
                                        <script>
                                            $(document).ready(function() {
                                                localStorage.removeItem('email');
                                            })
                                        </script>
                                    @endif
                                    <div class="margin-top-15 text-center">
                                        <button id="submit_from" class="btn-style" type="submit">
                                            Đăng nhập
                                        </button>
                                    </div>
                                    <p class="login--notes text-center">
                                        Linh Phong Books cam kết bảo mật và sẽ không bao giờ đăng
                                        <br>
                                        hay chia sẻ thông tin mà chưa có được sự đồng ý của bạn.
                                    </p>
                                </div>
                            </form>
                            <div class="text-login text-center p-3">
                                <div>
                                    Bạn chưa có tài khoản?
                                    <a href="/register">Đăng ký.</a>
                                </div>
                            </div>
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
                    Validator.isEmail('#email')
                ]
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

            $('#submit_from').on('click', function() {
                let email = $('#email').val();
                localStorage.setItem('email', email);
            })

            const email = localStorage.getItem('email');
            if (email) {
                $('#email').val(email);
            }
        })
    </script>
@endsection
