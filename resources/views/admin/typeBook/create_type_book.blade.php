@extends('layouts.admin')

@section('title')
@endsection

@section('css')
@endsection

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý loại</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm loại</h6>
        </div>
        <div class="card-body">
            <form id="create" action="" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="TenLoai" class="control-label col-md-2">Tên loại (<font style="color:red">*</font>)</label>
                    <div class="col-sm-8">
                        <input type="text" id="TenLoai" name="TenLoai" value="" class='form-control' require>
                        <div class="invalid-feedback" id="feedback_TenLoai">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="MaChuDe" class="control-label col-md-2">Tên chủ đề (<font style="color:red">*</font>
                        )</label>
                    <div class="col-md-8">
                        <select name="MaChuDe" id="MaChuDe" class="form-control">
                            @foreach ($theme_books as $key => $item)
                                @if ($key == 0)
                                    <option selected value="{{ $item->MaChuDe }}">{{ $item->TenChuDe }}</option>
                                @else
                                    <option value="{{ $item->MaChuDe }}">{{ $item->TenChuDe }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Level" class="control-label col-md-2">Thứ tự hiển thị (<font style="color:red">*</font>
                        )</label>
                    <div class="col-md-8">
                        <input type="number" id="Level" name="Level" class='form-control' value="">
                        <div class="invalid-feedback" id="feedback_Level">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Status" class="control-label col-md-2">Trạng thái (1-Còn bán, 0-Đã hủy) (<font
                            style="color:red">*</font>)</label>
                    <div class="col-md-8">
                        <input type="number" id="Status" name="Status" class='form-control' value="">
                        <div class="invalid-feedback" id="feedback_Status">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-8">
                        <input id="add_pro" name="smb" type="submit" value="Thêm" class="btn btn-primary" />

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

            $('#add_pro').on('click', function(event) {
                event.preventDefault();
                let check = 0;
                let a = $(`#TenLoai`).val();
                if (a == "") {
                    $(`#TenLoai`).addClass("is-invalid");
                    $(`#TenLoai`).removeClass("is-valid");
                    $(`#feedback_TenLoai`).html("Trường này không được để trống!");
                    check++;
                } else if (a.length > MAX_LENGTH_NAME) {
                    $(`#TenLoai`).addClass("is-invalid");
                    $(`#TenLoai`).removeClass("is-valid");
                    $(`#feedback_TenLoai`).html("Trường này phải <= " + MAX_LENGTH_NAME + " ký tự");
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
                    $.ajax({
                        url: '/admin/type_book/create',
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
                                    location.href = '/admin/type_book/manage';
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
