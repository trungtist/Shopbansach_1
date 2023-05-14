@extends('layouts.admin')

@section('title')
@endsection

@section('css')
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Quản lý loại</h1>
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
                                Tên tác giả
                            </th>
                            <th>
                                Vai trò
                            </th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if ($participates)
                            @foreach ($participates as $item)
                                <tr>
                                    <td class="text-primary">
                                        {{ $item->TenSach }}
                                    </td>
                                    <td class="text-primary">
                                        {{ $item->TenTacGia }}
                                    </td>
                                    <td>
                                        {{ $item->VaiTro }}
                                    </td>
                                    <td>
                                        <a href="edit/{{ $item->MaSach }}-{{ $item->MaTacGia }}">Sửa</a>
                                        |
                                        <a id="delete_{{ $item->MaSach }}_{{ $item->MaTacGia }}"
                                            class="text-danger delete_AUTJ" href="javascript:;">Xóa</a>
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
        $(document).on('click', "a.delete_AUTJ", function() {
            let str = $(this).attr('id');
            str = str.replace("delete_", "");
            let words = str.split('_');
            let _token = $("input[name='_token']").val();
            let id = words[0];
            let MaTacGia = words[1];
            Swal.fire({
                title: `Bạn chắc chắn muốn xóa ?`,
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
                        url: '/admin/author_participate/delete',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            MaSach: id,
                            MaTacGia: MaTacGia,
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
