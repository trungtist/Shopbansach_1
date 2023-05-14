@extends('layouts.admin')

@section('title')
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/summernote/summernote-lite.min.css') }}">
@endsection

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý bài viết</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm bài viết</h6>
        </div>
        <div class="card-body">
            <form id="create" action="" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="title" class="control-label col-md-2">Tiêu đề (<font style="color:red">*</font>)</label>
                    <div class="col-md-8">
                        <input type="text" id="title" name="title" value="" class='form-control'>
                        <div class="invalid-feedback" id="feedback_title">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="summenote" class="control-label col-md-2">Mô tả</label>
                    <div class="col-md-8">
                        <div id="summenote" name="summenote"></div>
                    </div>
                </div>

                <textarea name="new_content" hidden id="new_content" cols="30" rows="10"></textarea>

                <div class="form-group row">
                    <label for="image" class="control-label col-md-2">Ảnh bìa (<font style="color:red">*</font>)</label>
                    <div class="col-md-8">
                        <input type="file" name="image" multiple accept="image/*" />
                        <div class="invalid-feedback" id="feedback_image">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Status" class="control-label col-md-2">Trạng thái (1-Hiển thị, 0-Không hiển thị) (<font
                            style="color:red">*</font>)</label>
                    <div class="col-md-8">
                        <input type="number" id="Status" name="Status" class='form-control' value="">
                        <div class="invalid-feedback" id="feedback_Status">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-8">
                        <input name="bsm" type="button" id="add_new" value="Thêm" class="btn btn-primary" />
                        <a href="manage" class="btn btn-secondary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-left"></i>
                            </span>
                            <span class="text">Quay lại</span>
                        </a>
                    </div>
                </div>
            </form>
            <h3 class="control-label col-md-12 text-center">Quản lý ảnh bài viết</h3>
            <form id="image_news" action="" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="form-group d-flex justify-content-center">
                    <input type="file" name="image" multiple accept="image/*" />
                </div>
                <div class="form-group d-flex justify-content-center">
                    <input name="add_image" type="button" id="add_image" value="Tải ảnh lên" class="btn btn-primary" />
                </div>
            </form>
            <h5 class="control-label col-md-12 text-center">Ảnh bài viết</h5>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>
                                Địa chỉ
                            </th>
                            <th>
                                Ảnh
                            </th>

                            <th>Thao tác</th>
                        </tr>
                    </thead>

                    <tbody id="body_image">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/admin/summernote/summernote-lite.min.js') }}"></script>
    <script>
        $('#summenote').summernote({
            tabsize: 20,
            height: 300,
        })
    </script>
    <script type="text/javascript">
        function load_image() {
            $.ajax({
                url: '/admin/new/manage_image',
                type: 'get',
                dataType: 'json',
                data: {},
                success: function(data) {
                    var html = '';
                    data.images.forEach(element => {
                        html += `<tr>
                            <td>{{ asset('assets/client/images_in_new/') }}/${element.name_image}</td>
                            <td>
                                <img src="{{ asset('assets/client/images_in_new/') }}/` + element.name_image + `" alt="."
                                            width="100">
                            </td>
                            <td>
                                <a class="text-danger delete_image" id="delete_${element.id}"
                                            href="javascript:">Xóa</a>
                            </td>
                        </tr>`;
                        $('#body_image').html(html);
                    });
                },
                error: function() {
                    console.log('error get image');
                }
            })
        }


        $(document).ready(function() {
            load_image();

            $('#title').on('input', function() {
                var a = $(`#title`).val();
                if ($(this).val().length >= MAX_LENGTH_NAME) {
                    $(this).val($(this).val().substr(0, MAX_LENGTH_NAME));
                }
                if (a == "") {
                    $(`#title`).addClass("is-invalid");
                    $(`#title`).removeClass("is-valid");
                    $(`#feedback_title`).html("Trường này không được để trống!");
                } else if (a.length > MAX_LENGTH_NAME) {
                    $(`#title`).addClass("is-invalid");
                    $(`#title`).removeClass("is-valid");
                    $(`#feedback_title`).html("Trường này phải <= 200 ký tự");
                } else {
                    $(`#title`).removeClass("is-invalid");
                    $(`#title`).addClass("is-valid");
                    $(`#feedback_title`).html("");
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

            $('#add_new').on('click', function(event) {
                event.preventDefault();
                var textareaValue = $('#summenote').summernote('code');
                $('#new_content').val(textareaValue);
                let check = 0;
                let a = $(`#title`).val();
                if (a == "") {
                    $(`#title`).addClass("is-invalid");
                    $(`#title`).removeClass("is-valid");
                    $(`#feedback_title`).html("Trường này không được để trống!");
                    check++;
                } else if (a.length > MAX_LENGTH_NAME) {
                    $(`#title`).addClass("is-invalid");
                    $(`#title`).removeClass("is-valid");
                    $(`#feedback_title`).html("Trường này phải <= 200 ký tự");
                    check++;
                }

                a = $(`#Status`).val();
                if (a == "") {
                    $(`#Status`).addClass("is-invalid");
                    $(`#Status`).removeClass("is-valid");
                    $(`#feedback_Status`).html("Trường này không được để trống!");
                    check++;
                }

                if (check == 0) {
                    var form = new FormData($('#create')[0]);
                    $.ajax({
                        url: '/admin/new/create',
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
                                    location.href = '/admin/new/manage';
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

            $('#add_image').on('click', function() {
                var form = new FormData($('#image_news')[0]);
                $.ajax({
                    url: '/admin/new/add_image',
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
                            })
                            load_image();
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
            })

            $(document).on('click', "a.delete_image", function() {
                let id = $(this).attr('id');
                id = id.replace("delete_", "");
                let _token = $("input[name='_token']").val();
                // console.log(id);
                Swal.fire({
                    title: `Bạn chắc chắn muốn xóa ảnh này?`,
                    text: "",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Đồng ý',
                    cancelButtonText: "Hủy",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/admin/new/delete_image',
                            type: 'post',
                            dataType: 'json',
                            data: {
                                id: id,
                                _token: _token,
                            },
                            success: function(data) {
                                if (data.code == 200) {
                                    load_image();
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
        });
    </script>
@endsection
