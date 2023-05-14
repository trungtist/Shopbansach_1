@extends('layouts.admin')

@section('title')
@endsection

@section('css')
@endsection

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Quản lý lọc giá</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm lọc giá</h6>
        </div>
        <div class="card-body">
            <form id="create" action="" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="MocDau" class="control-label col-md-2">Mốc đầu (<font style="color:red">*</font>)</label>
                    <div class="col-sm-8">
                        <input type="number" id="MocDau" name="MocDau" value="" class='form-control' require>
                        <div class="invalid-feedback" id="feedback_MocDau">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="MocCuoi" class="control-label col-md-2">Mốc cuối (<font style="color:red">*</font>)</label>
                    <div class="col-sm-8">
                        <input type="number" id="MocCuoi" name="MocCuoi" value="" class='form-control' require>
                        <div class="invalid-feedback" id="feedback_MocCuoi">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-8">
                        <input id="add_price" name="smb" type="button" value="Thêm" class="btn btn-primary" />
                        <a href="/admin/filter_price/manage" class="btn btn-secondary btn-icon-split">
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
        $(document).ready(function() {
            $('#MocDau').on('input', function() {
                var a = $(`#MocDau`).val();
                if ($(this).val().length >= MAX_LENGTH_NUMBER) {
                    $(this).val($(this).val().substr(0, MAX_LENGTH_NUMBER));
                }
                if (a == "") {
                    $(`#MocDau`).addClass("is-invalid");
                    $(`#MocDau`).removeClass("is-valid");
                    $(`#feedback_MocDau`).html("Trường này không được để trống!");
                } else if (a.length > MAX_LENGTH_NUMBER) {
                    $(`#MocDau`).addClass("is-invalid");
                    $(`#MocDau`).removeClass("is-valid");
                    $(`#feedback_MocDau`).html("Trường này phải <= 999.999.999");
                } else {
                    $(`#MocDau`).removeClass("is-invalid");
                    $(`#MocDau`).addClass("is-valid");
                    $(`#feedback_MocDau`).html("");
                }
            })

            $('#MocCuoi').on('input', function() {
                var a = $(`#MocCuoi`).val();
                if ($(this).val().length >= MAX_LENGTH_NUMBER) {
                    $(this).val($(this).val().substr(0, MAX_LENGTH_NUMBER));
                }
                if (a == "") {
                    $(`#MocCuoi`).addClass("is-invalid");
                    $(`#MocCuoi`).removeClass("is-valid");
                    $(`#feedback_MocCuoi`).html("Trường này không được để trống!");
                } else if (a.length > MAX_LENGTH_NUMBER) {
                    $(`#MocCuoi`).addClass("is-invalid");
                    $(`#MocCuoi`).removeClass("is-valid");
                    $(`#feedback_MocCuoi`).html("Trường này phải <= 999.999.999");
                } else {
                    $(`#MocCuoi`).removeClass("is-invalid");
                    $(`#MocCuoi`).addClass("is-valid");
                    $(`#feedback_MocCuoi`).html("");
                }
            })

            $("#add_price").on('click', function() {
                let check = 0;
                a = $(`#MocDau`).val();
                if (a == "") {
                    $(`#MocDau`).addClass("is-invalid");
                    $(`#MocDau`).removeClass("is-valid");
                    $(`#feedback_MocDau`).html("Trường này không được để trống!");
                    check++;
                } else if (a.length > MAX_LENGTH_NUMBER) {
                    $(`#MocDau`).addClass("is-invalid");
                    $(`#MocDau`).removeClass("is-valid");
                    $(`#feedback_MocDau`).html("Trường này phải <= 999.999.999");
                    check++;
                }

                a = $(`#MocCuoi`).val();
                if (a == "") {
                    $(`#MocCuoi`).addClass("is-invalid");
                    $(`#MocCuoi`).removeClass("is-valid");
                    $(`#feedback_MocCuoi`).html("Trường này không được để trống!");
                    check++;
                } else if (a.length > MAX_LENGTH_NUMBER) {
                    $(`#MocCuoi`).addClass("is-invalid");
                    $(`#MocCuoi`).removeClass("is-valid");
                    $(`#feedback_MocCuoi`).html("Trường này phải <= 999.999.999");
                    check++;
                }

                if (check == 0) {
                    $.ajax({
                        url: '/admin/filter_price/create',
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
                                    location.href = '/admin/filter_price/manage';
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
