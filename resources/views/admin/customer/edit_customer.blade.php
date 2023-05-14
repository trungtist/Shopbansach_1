@extends('layouts.admin')

@section('title')
@endsection

@section('css')
@endsection

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý khách hàng</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Chỉnh sửa khách hàng</h6>
        </div>
        <div class="card-body">
            <form id="edit" action="" method="POST">
                @csrf
                <input type="text" hidden id="MaKH" value="{{ $customer->MaKH }}">
                <div class="form-group row">
                    <label for="HoTen" class="control-label col-md-2">Họ tên khách hàng (<font style="color:red">*</font>
                        )</label>
                    <div class="col-sm-8">
                        <input type="text" id="HoTen" name="HoTen" value="{{ $customer->HoTen }}" class='form-control'>
                        <div class="invalid-feedback" id="feedback_HoTen">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Email" class="control-label col-md-2">Email (<font style="color:red">*</font>)</label>
                    <div class="col-sm-8">
                        <input type="email" id="Email" name="Email" value="{{ $customer->Email }}" class='form-control'>
                        <div class="invalid-feedback" id="feedback_Email">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="MatKhau" class="control-label col-md-2">Mật khẩu (<font style="color:red">*</font>)</label>
                    <div class="col-sm-8">
                        <input type="password" id="MatKhau" name="MatKhau" value="" class='form-control'>
                        <div class="invalid-feedback" id="feedback_MatKhau">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="check_password" class="control-label col-md-2">
                        Nhập lại mật khẩu:
                    </label>
                    <div class="col-sm-8">
                        <input id="check_password" type="password" class="form-control" />
                        <div class="invalid-feedback" id="feedback_check_password">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="DienThoai" class="control-label col-md-2">Điện thoại (<font style="color:red">*</font>
                        )</label>
                    <div class="col-sm-8">
                        <input type="number" id="DienThoai" name="DienThoai" value="{{ $customer->DienThoai }}"
                            class='form-control'>
                        <div class="invalid-feedback" id="feedback_DienThoai">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Status" class="control-label col-md-2">Trạng thái (1-Còn sử dụng, 0-Đã bị khóa) (<font
                            style="color:red">*</font>)</label>
                    <div class="col-md-8">
                        <input type="number" id="Status" name="Status" class='form-control'
                            value="{{ $customer->Status }}">
                        <div class="invalid-feedback" id="feedback_Status">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <input name="smb" type="button" id="update_customer" value="Cập nhật" class="btn btn-primary" />
                        <a href="/admin/customer/manage" class="btn btn-secondary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-left"></i>
                            </span>
                            <span class="text">Quay lại</span>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#MatKhau').on('input', function() {
                let a = $(`#MatKhau`).val();
                if ($(this).val().length >= MAX_LENGTH_PASS) {
                    $(this).val($(this).val().substr(0, MAX_LENGTH_PASS));
                }
                if (a.length > MAX_LENGTH_PASS || !pw.test(a)) {
                    $(`#MatKhau`).addClass("is-invalid");
                    $(`#MatKhau`).removeClass("is-valid");
                    $(`#feedback_MatKhau`).html(
                        "Tối thiểu 8 ký tự, tối đa 32 ký tự, ít nhất một chữ hoa, một chữ thường, một kí tự đặc biệt và một số."
                    );
                } else {
                    $(`#MatKhau`).removeClass("is-invalid");
                    $(`#MatKhau`).addClass("is-valid");
                    $(`#feedback_MatKhau`).html("");
                }
            })

            $('#Email').on('input', function() {
                let a = $(`#Email`).val();
                if ($(this).val().length >= MAX_LENGTH_EMAIL) {
                    $(this).val($(this).val().substr(0, MAX_LENGTH_EMAIL));
                }
                if (a == '' || a.length > MAX_LENGTH_EMAIL || !email.test(a)) {
                    $(`#Email`).addClass("is-invalid");
                    $(`#Email`).removeClass("is-valid");
                    $(`#feedback_Email`).html(
                        `Email không đúng định dạng và phải <= ${MAX_LENGTH_EMAIL} ký tự.`);
                } else {
                    $(`#Email`).removeClass("is-invalid");
                    $(`#Email`).addClass("is-valid");
                    $(`#feedback_Email`).html("");
                }
            })

            $('#Status').on('input', function() {
                let a = $(`#Status`).val();
                if ($(this).val().length >= 1) {
                    $(this).val($(this).val().substr(0, 1));
                }
                if (a == "") {
                    $(`#Status`).addClass("is-invalid");
                    $(`#Status`).removeClass("is-valid");
                    $(`#feedback_Status`).html("Trường này không được để trống!");
                } else if (a > 1 || a < 0) {
                    $("#Status").val(1);
                } else {
                    $(`#Status`).removeClass("is-invalid");
                    $(`#Status`).addClass("is-valid");
                    $(`#feedback_Status`).html("");
                }
            })

            $('#DienThoai').on('input', function() {
                let a = $(`#DienThoai`).val();
                if ($(this).val().length >= 11) {
                    $(this).val($(this).val().substr(0, 11));
                }
                if (a == "") {
                    $(`#DienThoai`).addClass("is-invalid");
                    $(`#DienThoai`).removeClass("is-valid");
                    $(`#feedback_DienThoai`).html("Trường này không được để trống!");
                } else if (a.length <= 9 || a.length > 11) {
                    $(`#DienThoai`).addClass("is-invalid");
                    $(`#DienThoai`).removeClass("is-valid");
                    $(`#feedback_DienThoai`).html("Trường này phải 10 hoặc 11 ký tự");
                } else {
                    $(`#DienThoai`).removeClass("is-invalid");
                    $(`#DienThoai`).addClass("is-valid");
                    $(`#feedback_DienThoai`).html("");
                }
            })

            $('#HoTen').on('input', function() {
                let a = $(`#HoTen`).val();
                if ($(this).val().length >= MAX_LENGTH_NAME_CUS) {
                    $(this).val($(this).val().substr(0, MAX_LENGTH_NAME_CUS));
                }
                if (a == "") {
                    $(`#HoTen`).addClass("is-invalid");
                    $(`#HoTen`).removeClass("is-valid");
                    $(`#feedback_HoTen`).html("Trường này không được để trống!");
                } else if (a.length > MAX_LENGTH_NAME_CUS) {
                    $(`#HoTen`).addClass("is-invalid");
                    $(`#HoTen`).removeClass("is-valid");
                    $(`#feedback_HoTen`).html("Trường này phải <= 50 ký tự");
                } else {
                    $(`#HoTen`).removeClass("is-invalid");
                    $(`#HoTen`).addClass("is-valid");
                    $(`#feedback_HoTen`).html("");
                }
            })

            $("#check_password").on('input', function() {
                let pw_in = $("#MatKhau").val();
                let pw_now = $("#check_password").val();
                if (pw_in != pw_now) {
                    $(`#check_password`).addClass("is-invalid");
                    $(`#check_password`).removeClass("is-valid");
                    $("#feedback_check_password").html("Mật khẩu không chính xác!");
                } else {
                    $(`#check_password`).removeClass("is-invalid");
                    $(`#check_password`).addClass("is-valid");
                    $("#feedback_check_password").html("");
                }
            });

            $("#update_customer").on('click', function(event) {
                event.preventDefault();
                let check = 0;
                let a = $(`#MatKhau`).val();
                if (a.length > 32 || (a.length != 0 && !pw.test(a))) {
                    check++;
                    $(`#MatKhau`).addClass("is-invalid");
                    $(`#MatKhau`).removeClass("is-valid");
                    $(`#feedback_MatKhau`).html(
                        "Tối thiểu 8 ký tự, tối đa 32 ký tự, ít nhất một chữ hoa, một chữ thường, một kí tự đặc biệt và một số."
                    );
                }


                a = $(`#Email`).val();
                if (a == '' || a.length > 55 || !email.test(a)) {
                    $(`#Email`).addClass("is-invalid");
                    $(`#Email`).removeClass("is-valid");
                    $(`#feedback_Email`).html("Email không đúng định dạng và phải <= 55 ký tự.");
                    check++;
                }

                a = $(`#Status`).val();
                if (a == "") {
                    $(`#Status`).addClass("is-invalid");
                    $(`#Status`).removeClass("is-valid");
                    $(`#feedback_Status`).html("Trường này không được để trống!");
                    check++;
                } else if (a > 1 || a < 0) {
                    $("#Status").val(1);
                }


                a = $(`#DienThoai`).val();

                if (a == "") {
                    $(`#DienThoai`).addClass("is-invalid");
                    $(`#DienThoai`).removeClass("is-valid");
                    $(`#feedback_DienThoai`).html("Trường này không được để trống!");
                    check++;
                } else if (a.length <= 9 || a.length > 11) {
                    $(`#DienThoai`).addClass("is-invalid");
                    $(`#DienThoai`).removeClass("is-valid");
                    $(`#feedback_DienThoai`).html("Trường này phải 10 hoặc 11 ký tự");
                    check++;
                }

                a = $(`#HoTen`).val();
                if (a == "") {
                    $(`#HoTen`).addClass("is-invalid");
                    $(`#HoTen`).removeClass("is-valid");
                    $(`#feedback_HoTen`).html("Trường này không được để trống!");
                    check++;
                }

                let pw_one = $("#MatKhau").val();
                let pw_now = $("#check_password").val();
                if (pw_one != pw_now) {
                    $("#feedback_check_password").html("Mật khẩu không chính xác!");
                    check++;
                }

                if (check == 0) {
                    let MaKH = $('#MaKH').val();
                    $.ajax({
                        url: '/admin/customer/edit/' + MaKH,
                        type: 'post',
                        dataType: 'json',
                        data: $("#edit").serialize(),
                        success: function(data) {
                            if (data.code == 200) {
                                Swal.fire({
                                    title: "<h5>" + data.msg + "</h5>",
                                    icon: "success",
                                    showConfirmButton: true
                                }).then((result) => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    title: "<h4>" + data.msg + "</h4>",
                                    text: "Vui lòng thử lại sau.",
                                    icon: "warning",
                                    showConfirmButton: true
                                })
                            }
                        },
                        error: function() {
                            Swal.fire({
                                title: "<h4>Có lỗi xảy ra!</h4>",
                                text: "Vui lòng thử lại sau.",
                                icon: "warning",
                                showConfirmButton: true
                            })
                        }
                    })
                }
            });
        });
    </script>
@endsection
