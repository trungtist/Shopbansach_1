@extends('layouts.admin')

@section('title')
@endsection

@section('css')
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Quản lý sách</h1>
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
                                Tên sách
                            </th>
                            <th>
                                Hình ảnh
                            </th>
                            <th>
                                Số lượng tồn
                            </th>

                            <th>
                                Khuyến mại
                            </th>
                            <th>
                                Tên nhà xuất bản
                            </th>
                            <th>
                                Tên thể loại
                            </th>

                            <th>
                                Giá bán
                            </th>
                            <th>
                                Giá mới
                            </th>
                            <th>
                                Hàng mới
                            </th>
                            <th>
                                Trạng thái
                            </th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if ($books)
                            @foreach ($books as $item)
                                <tr id="{{ $item->MaSach }}">
                                    <td>
                                        <a href="javascript:">{{ $item->TenSach }}</a>
                                    </td>

                                    <td>
                                        <img src="{{ asset('assets/client/imgs/' . $item->AnhBia) }}" alt="." width="100">
                                    </td>

                                    <td>
                                        {{ number_format($item->SoLuongTon, 0, ',', '.') }}
                                    </td>

                                    <td>
                                        {{ $item->TenKM }}
                                    </td>
                                    <td>
                                        {{ $item->TenNXB }}
                                    </td>
                                    <td>
                                        {{ $item->TenTheLoai }}
                                    </td>

                                    <td>
                                        {{ number_format($item->GiaBan, 0, ',', '.') }}₫
                                    </td>
                                    <td>
                                        {{ number_format($item->GiaMoi, 0, ',', '.') }}₫
                                    </td>

                                    <td>
                                        @if ($item->Active == 1)
                                            <center>
                                                <label class="switch">
                                                    <input value="on" id='active_{{ $item->MaSach }}' type="checkbox"
                                                        checked disabled="">
                                                    <span class="slider_0 slider round"></span>
                                                </label>
                                            </center>
                                        @else
                                            <center>
                                                <label class="switch">
                                                    <input value="off" id='active_{{ $item->MaSach }}' type="checkbox"
                                                        disabled="">
                                                    <span class="slider_0 slider round"></span>
                                                </label>
                                            </center>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($item->Status == 1)
                                            <center>
                                                <label class="switch">
                                                    <input value="on" id='status_{{ $item->MaSach }}' type="checkbox"
                                                        checked disabled="">
                                                    <span class="slider_1 slider round"></span>
                                                </label>
                                            </center>
                                        @else
                                            <center>
                                                <label class="switch">
                                                    <input value="off" id='status_{{ $item->MaSach }}' type="checkbox"
                                                        disabled="">
                                                    <span class="slider_1 slider round"></span>
                                                </label>
                                            </center>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="edit/{{ $item->MaSach }}">Sửa</a> |
                                        <a class="text-danger delete_book" id="delete_{{ $item->MaSach }}" href="javascript:">Xóa</a>
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
        $(document).on('click', "span.slider_0", function() {
            let id = $(this).closest('tr').attr('id');
            $.ajax({
                url: '/admin/book/active',
                type: 'get',
                dataType: 'json',
                data: {
                    MaSach: id
                },
                success: function(data) {
                    if (data.code == 200) {
                        let a = $("#active_" + id).val();
                        if (a == 'on') {
                            $("#active_" + id).removeAttr('checked');
                            $("#active_" + id).val('off');
                        } else {
                            $("#active_" + id).attr('checked', 'checked');
                            $("#active_" + id).val('on');
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

        $(document).on('click', "span.slider_1", function() {
            let id = $(this).closest('tr').attr('id');
            $.ajax({
                url: '/admin/book/status',
                type: 'get',
                dataType: 'json',
                data: {
                    MaSach: id
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

        $(document).on('click', "a.delete_book", function() {
            let id = $(this).attr('id');
            id = id.replace("delete_", "");
            let _token = $("input[name='_token']").val();
            console.log(id);
            Swal.fire({
                title: `Bạn chắc chắn muốn xóa sách này?`,
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
                        url: '/admin/book/delete',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            MaSach: id,
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
@endsection
