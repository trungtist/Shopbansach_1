@extends('layouts.admin')

@section('title')
@endsection

@section('css')
@endsection

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý chủ đề</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Chỉnh sửa chủ đề</h6>
        </div>
        <div class="card-body">
            <form id="edit" action="" method="POST">
                @csrf
                <input type="text" hidden id="MaChuDe" value="{{ $theme_book->MaChuDe }}">
                <div class="form-group row">
                    <label for="TenChuDe" class="control-label col-md-2">Tên chủ đề (<font style="color:red">*</font>
                        )</label>
                    <div class="col-sm-8">
                        <input type="text" id="TenChuDe" name="TenChuDe" value="{{ $theme_book->TenChuDe }}"
                            class='form-control' required>
                        <div class="invalid-feedback" id="feedback_TenChuDe">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Level" class="control-label col-md-2">Thứ tự hiển thị (<font style="color:red">*</font>
                        )</label>
                    <div class="col-md-8">
                        <input type="number" id="Level" name="Level" class='form-control' value="{{ $theme_book->Level }}"
                            required>
                        <div class="invalid-feedback" id="feedback_Level">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Status" class="control-label col-md-2">Trạng thái (1-Còn bán, 0-Đã hủy) (<font
                            style="color:red">*</font>)</label>
                    <div class="col-md-8">
                        <input type="number" id="Status" name="Status" class='form-control'
                            value="{{ $theme_book->Status }}" required>
                        <div class="invalid-feedback" id="feedback_Status">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-8">
                        <input name="smb" type="submit" id="update_pro" value="Cập nhật" class="btn btn-primary" />

                        <a href="/admin/theme_book/manage" class="btn btn-secondary btn-icon-split">
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
        document.querySelector("#Status").addEventListener("keypress", function(evt) {
            if (evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57) {
                evt.preventDefault();
            }
        });
        document.querySelector("#Level").addEventListener("keypress", function(evt) {
            if (evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57) {
                evt.preventDefault();
            }
        });
        $(document).ready(function() {
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
            $('#update_pro').on('click', function(event) {
                event.preventDefault();
                let check = 0;
                let a = $(`#TenChuDe`).val();
                if (a == "") {
                    $(`#TenChuDe`).addClass("is-invalid");
                    $(`#TenChuDe`).removeClass("is-valid");
                    $(`#feedback_TenChuDe`).html("Trường này không được để trống!");
                    check++;
                } else if (a.length > MAX_LENGTH_NAME) {
                    $(`#TenChuDe`).addClass("is-invalid");
                    $(`#TenChuDe`).removeClass("is-valid");
                    $(`#feedback_TenChuDe`).html("Trường này phải <= " + MAX_LENGTH_NAME + " ký tự");
                    check++;
                }

                a = $(`#Level`).val();
                if (a == "") {
                    $(`#Level`).addClass("is-invalid");
                    $(`#Level`).removeClass("is-valid");
                    $(`#feedback_Level`).html("Trường này không được để trống!");
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
                    let MaChuDe = $('#MaChuDe').val();
                    $.ajax({
                        url: '/admin/theme_book/edit/' + MaChuDe,
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
