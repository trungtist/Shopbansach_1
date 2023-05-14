@extends('layouts.admin')

@section('title')
@endsection

@section('css')
@endsection

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Quản lý địa chỉ giao hàng</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm địa chỉ</h6>
        </div>
        <div class="card-body">
            <form id="create" action="" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="TenViTri" class="control-label col-md-2">Tên vị trí (<font style="color:red">*</font>
                        )</label>
                    <div class="col-sm-8">
                        <input type="text" id="TenViTri" name="TenViTri" value="" class='form-control' require>
                        <div class="invalid-feedback" id="feedback_TenViTri">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="PhiShip" class="control-label col-md-2">Phí vận chuyển (<font style="color:red">*</font>
                        )</label>
                    <div class="col-sm-8">
                        <input type="number" id="PhiShip" name="PhiShip" value="" class='form-control' require>
                        <div class="invalid-feedback" id="feedback_PhiShip">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Status" class="control-label col-md-2">Trạng thái (1-Dùng, 0-Không dùng) (<font
                            style="color:red">*</font>)</label>
                    <div class="col-sm-8">
                        <input type="number" id="Status" name="Status" value="" class='form-control' require>
                        <div class="invalid-feedback" id="feedback_Status">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-8">
                        <input id="add_local" name="smb" type="button" value="Thêm" class="btn btn-primary" />
                        <a href="/admin/address_ship/manage" class="btn btn-secondary btn-icon-split">
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
        const MAX_LENGTH_NUMBER = 9;

        $(document).ready(function() {
            $('#TenViTri').on('input', function() {
                let a = $(`#TenViTri`).val();
                if ($(this).val().length >= MAX_LENGTH_NAME) {
                    $(this).val($(this).val().substr(0, MAX_LENGTH_NAME));
                }
                if (a == "") {
                    $(`#TenViTri`).addClass("is-invalid");
                    $(`#TenViTri`).removeClass("is-valid");
                    $(`#feedback_TenViTri`).html("Trường này không được để trống!");
                } else if (a.length > MAX_LENGTH_NAME) {
                    $(`#TenViTri`).addClass("is-invalid");
                    $(`#TenViTri`).removeClass("is-valid");
                    $(`#feedback_TenViTri`).html("Trường này phải <= 200 ký tự");
                } else {
                    $(`#TenViTri`).removeClass("is-invalid");
                    $(`#TenViTri`).addClass("is-valid");
                    $(`#feedback_TenViTri`).html("");
                }
            })

            $('#PhiShip').on('input', function() {
                let a = $(`#PhiShip`).val();
                if ($(this).val().length >= 11) {
                    $(this).val($(this).val().substr(0, 11));
                }
                if (a == "") {
                    $(`#PhiShip`).addClass("is-invalid");
                    $(`#PhiShip`).removeClass("is-valid");
                    $(`#feedback_PhiShip`).html("Trường này không được để trống!");
                } else if (a.length > MAX_LENGTH_NUMBER) {
                    $(`#PhiShip`).addClass("is-invalid");
                    $(`#PhiShip`).removeClass("is-valid");
                    $(`#feedback_PhiShip`).html("Trường này phải <= 999.999.999");
                } else {
                    $(`#PhiShip`).removeClass("is-invalid");
                    $(`#PhiShip`).addClass("is-valid");
                    $(`#feedback_PhiShip`).html("");
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

            $('#add_local').on('click', function() {
                let check = 0;
                let a = $(`#TenViTri`).val();
                if (a == "") {
                    $(`#TenViTri`).addClass("is-invalid");
                    $(`#TenViTri`).removeClass("is-valid");
                    $(`#feedback_TenViTri`).html("Trường này không được để trống!");
                    check++;
                } else if (a.length > MAX_LENGTH_NAME) {
                    $(`#TenViTri`).addClass("is-invalid");
                    $(`#TenViTri`).removeClass("is-valid");
                    $(`#feedback_TenViTri`).html("Trường này phải <= 200 ký tự");
                    check++;
                }

                a = $(`#PhiShip`).val();
                if (a == "") {
                    $(`#PhiShip`).addClass("is-invalid");
                    $(`#PhiShip`).removeClass("is-valid");
                    $(`#feedback_PhiShip`).html("Trường này không được để trống!");
                    check++;
                } else if (a.length > MAX_LENGTH_NUMBER) {
                    $(`#PhiShip`).addClass("is-invalid");
                    $(`#PhiShip`).removeClass("is-valid");
                    $(`#feedback_PhiShip`).html("Trường này phải <= 999.999.999");
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
                        url: '/admin/address_ship/create',
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
                                    location.href = '/admin/address_ship/manage';
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
                } else {
                    $('#add_local').attr('type', 'button');
                }
            })
        });
    </script>
@endsection
