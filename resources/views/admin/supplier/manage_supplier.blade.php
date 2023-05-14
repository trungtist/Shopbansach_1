@extends('layouts.admin')

@section('title')
@endsection

@section('css')
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Quản lý nhà xuất bản</h1>
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="my-2"></div>
            <a href="create" class="btn btn-success btn-icon-split float-right">
                <span class="icon text-white-50">
                    <i class="fa fa-plus"></i>
                </span>
                <span class="text">Thêm mới</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>
                                Tên nhà xuất bản
                            </th>
                            <th>
                                Địa chỉ
                            </th>
                            <th>
                                Số điện thoại
                            </th>
                            <th>
                                Trạng thái
                            </th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if ($suppliers)
                            @foreach ($suppliers as $item)
                                <tr id="{{ $item->MaNXB }}">
                                    <td class="text-primary">
                                        {{ $item->TenNXB }}
                                    </td>
                                    <td>
                                        {{ $item->DiaChi }}
                                    </td>
                                    <td>
                                        {{ $item->DienThoai }}
                                    </td>
                                    <td>
                                        @if ($item->Status == 1)
                                            <center>
                                                <label class="switch">
                                                    <input value="on" id='status_{{ $item->MaNXB }}' type="checkbox"
                                                        checked disabled="">
                                                    <span class="slider round"></span>
                                                </label>
                                            </center>
                                        @else
                                            <center>
                                                <label class="switch">
                                                    <input value="off" id='status_{{ $item->MaNXB }}' type="checkbox"
                                                        disabled="">
                                                    <span class="slider round"></span>
                                                </label>
                                            </center>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="edit/{{ $item->MaNXB }}">Sửa</a> |
                                        <a id="delete_{{ $item->MaNXB }}" class="text-danger delete_NXB"
                                            href="javascript:;">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else

                        @endif
                    </tbody>
                </table>
                @csrf
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).on('click', "a.delete_NXB", function() {
            let id = $(this).attr('id');
            let _token = $("input[name='_token']").val();
            id = id.replace("delete_", "");
            Swal.fire({
                title: `Bạn chắc chắn muốn xóa nhà xuất bản này?`,
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
                        url: '/admin/supplier/delete',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            MaNXB: id,
                            _token: _token,
                        },
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
    <script>
        $(document).on('click', "span.slider", function() {
            let id = $(this).closest('tr').attr('id');
            $.ajax({
                url: '/admin/supplier/status',
                type: 'get',
                dataType: 'json',
                data: {
                    MaNXB: id
                },
                success: function(data) {
                    if (data.code == 200) {
                        let a = $("#status_" + id).val();
                        if (a == 'on') {
                            $("#status_" + id).removeAttr('checked');
                            $("#status_" + id).val('off');
                        } else {
                            $("#status_" + id).attr('checked', 'checked');
                            $("#status_" + id).val('on');
                        }
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
        });
    </script>
@endsection
