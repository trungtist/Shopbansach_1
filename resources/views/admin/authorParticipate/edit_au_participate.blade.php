@extends('layouts.admin')

@section('title')
@endsection

@section('css')
@endsection

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý tham gia</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Chỉnh sửa tham gia</h6>
        </div>
        <div class="card-body">
            <form id="edit" action="" method="POST">
                @csrf
                <input type="text" id="MaSach" hidden value="{{ $participate->MaSach }}">
                <input type="text" hidden id="MaTacGia" value="{{ $participate->MaTacGia }}">
                <div class="form-group row">
                    <label for="VaiTro" class="control-label col-md-2">Vai trò (<font style="color:red">*</font>)</label>
                    <div class="col-sm-8">
                        <input type="text" id="VaiTro" name="VaiTro" value="{{ $participate->VaiTro }}"
                            class='form-control' require>
                        <div class="invalid-feedback" id="feedback_VaiTro">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-8">
                        <input name="smb" type="button" id="update_pro" value="Cập nhật" class="btn btn-primary" />
                        <a href="/admin/author_participate/manage" class="btn btn-secondary btn-icon-split">
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#VaiTro').on('input', function() {
                var a = $(`#VaiTro`).val();
                if ($(this).val().length >= MAX_LENGTH_NAME) {
                    $(this).val($(this).val().substr(0, MAX_LENGTH_NAME));
                }
                if (a == "") {
                    $(`#VaiTro`).addClass("is-invalid");
                    $(`#VaiTro`).removeClass("is-valid");
                    $(`#feedback_VaiTro`).html("Trường này không được để trống!");
                } else if (a.length > MAX_LENGTH_NAME) {
                    $(`#VaiTro`).addClass("is-invalid");
                    $(`#VaiTro`).removeClass("is-valid");
                    $(`#feedback_VaiTro`).html("Trường này phải <= 200 ký tự");
                } else {
                    $(`#VaiTro`).removeClass("is-invalid");
                    $(`#VaiTro`).addClass("is-valid");
                    $(`#feedback_VaiTro`).html("");
                }
            })

            $('#update_pro').on('click', function(event) {
                event.preventDefault();
                let check = 0;
                let a = $(`#VaiTro`).val();
                if (a == "") {
                    $(`#VaiTro`).addClass("is-invalid");
                    $(`#VaiTro`).removeClass("is-valid");
                    $(`#feedback_VaiTro`).html("Trường này không được để trống!");
                    check++;
                } else if (a.length > MAX_LENGTH_NAME) {
                    $(`#VaiTro`).addClass("is-invalid");
                    $(`#VaiTro`).removeClass("is-valid");
                    $(`#feedback_VaiTro`).html("Trường này phải <= 200 ký tự");
                    check++;
                }

                if (check == 0) {
                    let MaSach = $('#MaSach').val();
                    let MaTacGia = $('#MaTacGia').val();
                    $.ajax({
                        url: `/admin/author_participate/edit/${MaSach}-${MaTacGia}`,
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
        });
    </script>
@endsection
