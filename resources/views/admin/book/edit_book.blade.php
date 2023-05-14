@extends('layouts.admin')

@section('title')
@endsection

@section('css')
@endsection

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý sách</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Chỉnh sửa sách</h6>
        </div>
        <div class="card-body">
            <form id="edit" action="" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" id="MaSach" hidden value="{{ $book->MaSach }}">
                <div class="form-group row">
                    <label for="TenSach" class="control-label col-md-2">Tên sách (<font style="color:red">*</font>)</label>
                    <div class="col-md-8">
                        <input type="text" id="TenSach" name="TenSach" value="{{ $book->TenSach }}" class='form-control'>
                        <div class="invalid-feedback" id="feedback_TenSach">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="MoTa" class="control-label col-md-2">Mô tả</label>
                    <div class="col-md-8">
                        <textarea type="text" width="100" rows="7" id="MoTa" name="MoTa"
                            class='form-control'>{{ $book->MoTa }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="AnhBia" class="control-label col-md-2">Ảnh bìa (<font style="color:red">*</font>)</label>
                    <div class="col-md-4">
                        <input type="file" name="AnhBia" id="AnhBia" multiple accept="image/*" />
                        <div class="invalid-feedback" id="feedback_AnhBia">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <img class="mt-1" width="100" src="{{ asset('assets/client/imgs/' . $book->AnhBia) }}">
                    </div>
                    <div class="col-md-2 text-center d-flex align-items-center">
                        (Ảnh cũ)
                    </div>
                </div>

                <div class="form-group row">
                    <label for="SoLuongTon" class="control-label col-md-2">Số lượng tồn (<font style="color:red">*</font>
                        )</label>
                    <div class="col-md-8">
                        <input type="number" id="SoLuongTon" name="SoLuongTon" class='form-control'
                            value="{{ $book->SoLuongTon }}">
                        <div class="invalid-feedback" id="feedback_SoLuongTon">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="MaNXB" class="control-label col-md-2">Nhà xuất bản (<font style="color:red">*</font>
                        )</label>
                    <div class="col-md-8">
                        <select name="MaNXB" id="MaNXB" class="form-control">
                            @foreach ($suppliers as $key => $item)
                                <option @if ($item->MaNXB == $book->MaNXB) selected  @endif value="{{ $item->MaNXB }}">{{ $item->TenNXB }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="MaTheLoai" class="control-label col-md-2">Thể loại (<font style="color:red">*</font>
                        )</label>
                    <div class="col-md-8">
                        <select name="MaTheLoai" id="MaTheLoai" class="form-control">
                            @foreach ($categories as $key => $item)
                                <option @if ($item->MaTheLoai == $book->MaTheLoai) selected  @endif value="{{ $item->MaTheLoai }}">{{ $item->TenTheLoai }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="MaKM" class="control-label col-md-2">Khuyến mại (<font style="color:red">*</font>)</label>
                    <div class="col-md-8">
                        <select name="MaKM" id="MaKM" class="form-control">
                            @foreach ($promotions as $key => $item)
                                <option @if ($item->MaKM == $book->MaKM) selected  @endif value="{{ $item->MaKM }}">{{ $item->TenKM }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="GiaBan" class="control-label col-md-2">Giá bán (<font style="color:red">*</font>)</label>
                    <div class="col-md-8">
                        <input type="number" id="GiaBan" name="GiaBan" class='form-control' value="{{ $book->GiaBan }}">
                        <div class="invalid-feedback" id="feedback_GiaBan">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Status" class="control-label col-md-2">Trạng thái (1-Còn bán, 0-Không bán) (<font
                            style="color:red">*</font>)</label>
                    <div class="col-md-8">
                        <input type="number" id="Status" name="Status" class='form-control' value="{{ $book->Status }}">
                        <div class="invalid-feedback" id="feedback_Status">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Active" class="control-label col-md-2">Hàng mới (1-Mới, 2-Cũ) (<font style="color:red">*
                        </font>)</label>
                    <div class="col-md-8">
                        <input type="number" id="Active" name="Active" class='form-control' value="{{ $book->Active }}">
                        <div class="invalid-feedback" id="feedback_Active">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-8">
                        <input type="button" id="update_book" value="Cập nhật" class="btn btn-primary" />
                        <a href="/admin/book/manage" class="btn btn-secondary btn-icon-split">
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
            $('#TenSach').on('input', function() {
                var a = $(`#TenSach`).val();
                if ($(this).val().length >= MAX_LENGTH_NAME) {
                    $(this).val($(this).val().substr(0, MAX_LENGTH_NAME));
                }
                if (a == "") {
                    $(`#TenSach`).addClass("is-invalid");
                    $(`#TenSach`).removeClass("is-valid");
                    $(`#feedback_TenSach`).html("Trường này không được để trống!");
                } else if (a.length > MAX_LENGTH_NAME) {
                    $(`#TenSach`).addClass("is-invalid");
                    $(`#TenSach`).removeClass("is-valid");
                    $(`#feedback_TenSach`).html("Trường này phải <= 200 ký tự");
                } else {
                    $(`#TenSach`).removeClass("is-invalid");
                    $(`#TenSach`).addClass("is-valid");
                    $(`#feedback_TenSach`).html("");
                }
            })

            $('#SoLuongTon').on('input', function() {
                var a = $(`#SoLuongTon`).val();
                if ($(this).val().length >= MAX_LENGTH_NUMBER) {
                    $(this).val($(this).val().substr(0, MAX_LENGTH_NUMBER));
                }
                if (a == "") {
                    $(`#SoLuongTon`).addClass("is-invalid");
                    $(`#SoLuongTon`).removeClass("is-valid");
                    $(`#feedback_SoLuongTon`).html("Trường này không được để trống!");
                } else if (a.length > MAX_LENGTH_NUMBER) {
                    $(`#SoLuongTon`).addClass("is-invalid");
                    $(`#SoLuongTon`).removeClass("is-valid");
                    $(`#feedback_SoLuongTon`).html("Trường này phải <= 999.999.999");
                } else {
                    $(`#SoLuongTon`).removeClass("is-invalid");
                    $(`#SoLuongTon`).addClass("is-valid");
                    $(`#feedback_SoLuongTon`).html("");
                }
            })

            $('#GiaBan').on('input', function() {
                var a = $(`#GiaBan`).val();
                if ($(this).val().length >= MAX_LENGTH_NUMBER) {
                    $(this).val($(this).val().substr(0, MAX_LENGTH_NUMBER));
                }
                if (a == "") {
                    $(`#GiaBan`).addClass("is-invalid");
                    $(`#GiaBan`).removeClass("is-valid");
                    $(`#feedback_GiaBan`).html("Trường này không được để trống!");
                } else if (a.length > MAX_LENGTH_NUMBER) {
                    $(`#GiaBan`).addClass("is-invalid");
                    $(`#GiaBan`).removeClass("is-valid");
                    $(`#feedback_GiaBan`).html("Trường này phải <= 999.999.999");
                } else {
                    $(`#GiaBan`).removeClass("is-invalid");
                    $(`#GiaBan`).addClass("is-valid");
                    $(`#feedback_GiaBan`).html("");
                }
            })

            $('#Status').on('input', function() {
                var a = $(`#Status`).val();
                if (a == "") {
                    $(`#Status`).addClass("is-invalid");
                    $(`#Status`).removeClass("is-valid");
                    $(`#feedback_Status`).html("Trường này không được để trống!");
                } else if (a > 1 || a < 0) {
                    $("#Status").val(1);
                    $(`#Status`).removeClass("is-invalid");
                    $(`#Status`).addClass("is-valid");
                    $(`#feedback_Status`).html("");
                } else {
                    $(`#Status`).removeClass("is-invalid");
                    $(`#Status`).addClass("is-valid");
                    $(`#feedback_Status`).html("");
                }
            })

            $('#Active').on('input', function() {
                var a = $(`#Active`).val();
                if (a == "") {
                    $(`#Active`).addClass("is-invalid");
                    $(`#Active`).removeClass("is-valid");
                    $(`#feedback_Active`).html("Trường này không được để trống!");
                } else if (a > 1 || a < 0) {
                    $("#Active").val(1);
                    $(`#Active`).removeClass("is-invalid");
                    $(`#Active`).addClass("is-valid");
                    $(`#feedback_Active`).html("");
                } else {
                    $(`#Active`).removeClass("is-invalid");
                    $(`#Active`).addClass("is-valid");
                    $(`#feedback_Active`).html("");
                }
            })

            $('#update_book').on('click', function(event) {
                event.preventDefault();
                let check = 0;
                let a = $(`#TenSach`).val();
                if (a == "") {
                    $(`#TenSach`).addClass("is-invalid");
                    $(`#TenSach`).removeClass("is-valid");
                    $(`#feedback_TenSach`).html("Trường này không được để trống!");
                    check++;
                } else if (a.length > MAX_LENGTH_NAME) {
                    $(`#TenSach`).addClass("is-invalid");
                    $(`#TenSach`).removeClass("is-valid");
                    $(`#feedback_TenSach`).html("Trường này phải <= 200 ký tự");
                    check++;
                }

                a = $(`#SoLuongTon`).val();
                if (a == "") {
                    $(`#SoLuongTon`).addClass("is-invalid");
                    $(`#SoLuongTon`).removeClass("is-valid");
                    $(`#feedback_SoLuongTon`).html("Trường này không được để trống!");
                    check++;
                } else if (a.length > MAX_LENGTH_NUMBER) {
                    $(`#SoLuongTon`).addClass("is-invalid");
                    $(`#SoLuongTon`).removeClass("is-valid");
                    $(`#feedback_SoLuongTon`).html("Trường này phải <= 999.999.999");
                    check++;
                }

                a = $(`#GiaBan`).val();
                if (a == "") {
                    $(`#GiaBan`).addClass("is-invalid");
                    $(`#GiaBan`).removeClass("is-valid");
                    $(`#feedback_GiaBan`).html("Trường này không được để trống!");
                    check++;
                } else if (a.length > MAX_LENGTH_NUMBER) {
                    $(`#GiaBan`).addClass("is-invalid");
                    $(`#GiaBan`).removeClass("is-valid");
                    $(`#feedback_GiaBan`).html("Trường này phải <= 999.999.999");
                    check++;
                }

                a = $(`#Status`).val();
                if (a == "") {
                    $(`#Status`).addClass("is-invalid");
                    $(`#Status`).removeClass("is-valid");
                    $(`#feedback_Status`).html("Trường này không được để trống!");
                    check++;
                }

                a = $(`#Active`).val();
                if (a == "") {
                    $(`#Active`).addClass("is-invalid");
                    $(`#Active`).removeClass("is-valid");
                    $(`#feedback_Active`).html("Trường này không được để trống!");
                    check++;
                }

                if (check == 0) {
                    let MaSach = $('#MaSach').val();
                    var form = new FormData($('#edit')[0]);
                    $.ajax({
                        url: '/admin/book/edit/' + MaSach,
                        type: 'post',
                        dataType: 'json',
                        cache: false,
                        processData: false,
                        mimeType: "multipart/form-data",
                        contentType: false,
                        data: form,
                        success: function(data) {
                            // console.log(data);
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
