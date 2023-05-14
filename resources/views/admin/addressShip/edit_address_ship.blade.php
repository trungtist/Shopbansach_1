@extends('layouts.admin')

@section('title')
@endsection

@section('css')
@endsection

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý địa chỉ giao hàng</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Chỉnh sửa địa chỉ giao hàng</h6>
        </div>
        <div class="card-body">
            <form id="edit" action="" method="POST">
                @csrf
                <input type="text" id="MaViTri" hidden value="{{ $address_ship->MaViTri }}">
                <div class="form-group row">
                    <label for="TenViTri" class="control-label col-md-2">Tên vị trí (<font style="color:red">*</font>
                        )</label>
                    <div class="col-sm-8">
                        <input type="text" id="TenViTri" name="TenViTri" value="{{ $address_ship->TenViTri }}"
                            class='form-control' require>
                        <div class="invalid-feedback" id="feedback_TenViTri">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="PhiShip" class="control-label col-md-2">Phí vận chuyển (<font style="color:red">*</font>
                        )</label>
                    <div class="col-sm-8">
                        <input type="number" id="PhiShip" name="PhiShip" value="{{ $address_ship->PhiShip }}"
                            class='form-control' require>
                        <div class="invalid-feedback" id="feedback_PhiShip">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Status" class="control-label col-md-2">Trạng thái (1-Còn sử dụng, 0-Không sử dùng) (<font
                            style="color:red">*</font>)</label>
                    <div class="col-sm-8">
                        <input type="number" id="Status" name="Status" value="{{ $address_ship->Status }}"
                            class='form-control' require>
                        <div class="invalid-feedback" id="feedback_Status">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input name="smb" type="button" id="update_local" value="Cập nhật" class="btn btn-primary" />
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
        const MAX_LENGTH_NUMBER = 9;
        const MAX_LENGTH_NAME = 200;
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
                var a = $(`#PhiShip`).val();
                if ($(this).val().length >= MAX_LENGTH_NUMBER) {
                    $(this).val($(this).val().substr(0, MAX_LENGTH_NUMBER));
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

            $("#update_local").on('click', function() {
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
                    let MaViTri = $('#MaViTri').val();
                    $.ajax({
                        url: '/admin/address_ship/edit/'+MaViTri,
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
            })
        })
    </script>
@endsection
