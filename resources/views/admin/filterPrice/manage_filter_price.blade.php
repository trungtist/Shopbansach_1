@extends('layouts.admin')

@section('title')
@endsection

@section('css')
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Quản lý bảng lọc giá</h1>
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
                                ID
                            </th>
                            <th>
                                Mốc giá tìm kiếm đầu
                            </th>
                            <th>
                                Mốc giá tiếm kiếm cuối
                            </th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if ($filter_price)
                            @foreach ($filter_price as $item)
                                <tr>
                                    <td class="text-primary">
                                        {{ $item->MaGia }}
                                    </td>
                                    <td>
                                        {{ number_format($item->MocDau, 0, ',', '.') }}₫
                                    </td>
                                    <td>
                                        {{ number_format($item->MocCuoi, 0, ',', '.') }}₫
                                    </td>
                                    <td>
                                        <a href="edit/{{ $item->MaGia }}">Sửa</a> |
                                        <a id="delete_{{ $item->MaGia }}" class="text-danger delete_Price"
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
        $(document).on('click', "a.delete_Price", function() {
            let id = $(this).attr('id');
            id = id.replace("delete_", "");
            _token = $("input[name='_token']").val();
            Swal.fire({
                title: `Bạn chắc chắn muốn xóa giá này?`,
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
                        url: '/admin/filter_price/delete',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            MaGia: id,
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
