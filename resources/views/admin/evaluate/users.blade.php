@extends('layouts.admin')

@section('title')
@endsection

@section('css')
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Quản lý email đánh giá</h1>
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
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
                                Họ tên
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Ảnh nền
                            </th>
                            <th>
                                Thao tác
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @if ($user_evaluate)
                            @foreach ($user_evaluate as $item)
                                <tr id="{{ $item->MaND }}">
                                    <td class="text-primary">
                                        {{ $item->MaND }}
                                    </td>
                                    <td>
                                        {{ $item->HoTen }}
                                    </td>
                                    <td>
                                        {{ $item->Email }}
                                    </td>
                                    <td>
                                        <img src="{{ asset('assets/client/images/' . $item->AnhNen) }}"
                                            alt="{{ $item->HoTen }}" width="100">
                                    </td>
                                    <td>
                                        <a id="delete_{{ $item->MaND }}" class="text-danger delete_Theme"
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
        $(document).on('click', "a.delete_Theme", function() {
            let id = $(this).attr('id');
            id = id.replace("delete_", "");
            let _token = $("input[name='_token']").val();
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
                        url: '/admin/evaluate/delete_user',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            _token: _token,
                            MaND: id
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
