@extends('layouts.admin')

@section('title')
@endsection

@section('css')
@endsection

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý khuyến mại</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm khuyến mại</h6>
        </div>
        <div class="card-body">
            <form id="create" action="" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="TenKM" class="control-label col-md-2">Tên khuyến mại (<font style="color:red">*</font>
                        )</label>
                    <div class="col-sm-8">
                        <input type="text" id="TenKM" name="TenKM" value="" class='form-control' require>
                        <div class="invalid-feedback" id="feedback_TenKM">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="GiamGia" class="control-label col-md-2">Giảm giá (<font style="color:red">*</font>)</label>
                    <div class="col-sm-8">
                        <input type="number" id="GiamGia" name="GiamGia" value="" class='form-control' require>
                        <div class="invalid-feedback" id="feedback_GiamGia">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-8">
                        <input id="add_pro" name="smb" type="button" value="Thêm" class="btn btn-primary" />
                        <a href="/admin/promotion/manage" class="btn btn-secondary btn-icon-split">
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
        const MAX_LENGTH_NAME = 200;

        $(document).ready(function() {
            $('#TenKM').on('input', function() {
                let a = $(`#TenKM`).val();
                if ($(this).val().length >= MAX_LENGTH_NAME) {
                    $(this).val($(this).val().substr(0, MAX_LENGTH_NAME));
                }
                if (a == "") {
                    $(`#TenKM`).addClass("is-invalid");
                    $(`#TenKM`).removeClass("is-valid");
                    $(`#feedback_TenKM`).html("Trường này không được để trống!");
                } else if (a.length > MAX_LENGTH_NAME) {
                    $(`#TenKM`).addClass("is-invalid");
                    $(`#TenKM`).removeClass("is-valid");
                    $(`#feedback_TenKM`).html("Trường này phải <= 200 ký tự");
                } else {
                    $(`#TenKM`).removeClass("is-invalid");
                    $(`#TenKM`).addClass("is-valid");
                    $(`#feedback_TenKM`).html("");
                }
            })

            $('#GiamGia').on('input', function() {
                let a = $(`#GiamGia`).val();
                if ($(this).val().length >= 3) {
                    $(this).val($(this).val().substr(0, 3));
                }
                if (a == "") {
                    $(`#GiamGia`).addClass("is-invalid");
                    $(`#GiamGia`).removeClass("is-valid");
                    $(`#feedback_GiamGia`).html("Trường này không được để trống, phải >=0 và <= 100!");
                } else if (a < 0 || a > 100) {
                    $(`#GiamGia`).val(0);
                } else {
                    $(`#GiamGia`).removeClass("is-invalid");
                    $(`#GiamGia`).addClass("is-valid");
                    $(`#feedback_GiamGia`).html("");
                }
            })

            $('#add_pro').on('click', function() {
                let check = 0;
                let a = $(`#TenKM`).val();
                if (a == "") {
                    $(`#TenKM`).addClass("is-invalid");
                    $(`#TenKM`).removeClass("is-valid");
                    $(`#feedback_TenKM`).html("Trường này không được để trống!");
                    check++;
                } else if (a.length > MAX_LENGTH_NAME) {
                    $(`#TenKM`).addClass("is-invalid");
                    $(`#TenKM`).removeClass("is-valid");
                    $(`#feedback_TenKM`).html("Trường này phải <= 200 ký tự");
                    check++;
                }

                a = $(`#GiamGia`).val();
                if (a == "") {
                    $(`#GiamGia`).addClass("is-invalid");
                    $(`#GiamGia`).removeClass("is-valid");
                    $(`#feedback_GiamGia`).html("Trường này không được để trống, phải >=0 và <= 100!");
                    check++;
                }

                if (check == 0) {
                    $.ajax({
                        url: '/admin/promotion/create',
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
                                    location.href = '/admin/promotion/manage';
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
