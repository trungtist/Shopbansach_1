@extends('layouts.admin')

@section('title')
@endsection

@section('css')
@endsection

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý nhà xuất bản</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm nhà xuất bản</h6>
        </div>
        <div class="card-body">
            <form id="create" action="" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="TenNXB" class="control-label col-md-2">Tên nhà xuất bản (<font style="color:red">*</font>
                        )</label>
                    <div class="col-sm-8">
                        <input type="text" id="TenNXB" name="TenNXB" value="" class='form-control' require>
                        <div class="invalid-feedback" id="feedback_TenNXB">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="DiaChi" class="control-label col-md-2">Địa chỉ (<font style="color:red">*</font>)</label>
                    <div class="col-sm-8">
                        <input type="text" id="DiaChi" name="DiaChi" value="" class='form-control' require>
                        <div class="invalid-feedback" id="feedback_DiaChi">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="DienThoai" class="control-label col-md-2">Điện thoại (<font style="color:red">*</font>
                        )</label>
                    <div class="col-sm-8">
                        <input type="number" id="DienThoai" name="DienThoai" value="" class='form-control'>
                        <div class="invalid-feedback" id="feedback_DienThoai">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Status" class="control-label col-md-2">Trạng thái (1-Còn hợp tác, 0-Đã hủy) (<font
                            style="color:red">*</font>)</label>
                    <div class="col-md-8">
                        <input type="number" id="Status" name="Status" class='form-control' value="">
                        <div class="invalid-feedback" id="feedback_Status">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-8">
                        <input id="add_producer" name="smb" type="button" value="Thêm" class="btn btn-primary" />
                        <a href="manage" class="btn btn-secondary btn-icon-split">
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
            $('#TenNXB').on('input', function() {
                let a = $(`#TenNXB`).val();
                if ($(this).val().length >= MAX_LENGTH_NAME) {
                    $(this).val($(this).val().substr(0, MAX_LENGTH_NAME));
                }
                if (a == "") {
                    $(`#TenNXB`).addClass("is-invalid");
                    $(`#TenNXB`).removeClass("is-valid");
                    $(`#feedback_TenNXB`).html("Trường này không được để trống!");
                } else if (a.length > MAX_LENGTH_NAME) {
                    $(`#TenNXB`).addClass("is-invalid");
                    $(`#TenNXB`).removeClass("is-valid");
                    $(`#feedback_TenNXB`).html("Trường này phải <= 200 ký tự");
                } else {
                    $(`#TenNXB`).removeClass("is-invalid");
                    $(`#TenNXB`).addClass("is-valid");
                    $(`#feedback_TenNXB`).html("");
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

            $('#add_producer').on('click', function() {
                let check = 0;
                let a = $(`#TenNXB`).val();
                if (a == "") {
                    $(`#TenNXB`).addClass("is-invalid");
                    $(`#TenNXB`).removeClass("is-valid");
                    $(`#feedback_TenNXB`).html("Trường này không được để trống!");
                    check++;
                } else if (a.length > MAX_LENGTH_NAME) {
                    $(`#TenNXB`).addClass("is-invalid");
                    $(`#TenNXB`).removeClass("is-valid");
                    $(`#feedback_TenNXB`).html("Trường này phải <= 200 ký tự");
                    check++;
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

                a = $(`#Status`).val();
                if (a == "") {
                    $(`#Status`).addClass("is-invalid");
                    $(`#Status`).removeClass("is-valid");
                    $(`#feedback_Status`).html("Trường này không được để trống!");
                    check++;
                } else if (a > 1 || a < 0) {
                    $("#Status").val(1);
                }

                if (check == 0) {
                    $.ajax({
                        url: '/admin/supplier/create',
                        type: 'post',
                        dataType: 'json',
                        data: $("#create").serialize(),
                        success: function(data) {
                            if (data.code == 200) {
                                Swal.fire({
                                    title: "<h5>" + data.msg + "</h5>",
                                    icon: "success",
                                    showConfirmButton: true
                                }).then((result) => {
                                    location.href = '/admin/supplier/manage';
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
            })
        });
    </script>
@endsection
