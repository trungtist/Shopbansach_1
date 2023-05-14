@extends('layouts.admin')

@section('title')
@endsection

@section('css')
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Quản lý hóa đơn</h1>
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>
                                Mã đơn hàng
                            </th>
                            <th>
                                Tên khách hàng
                            </th>
                            <th>Mã giao dịch</th>
                            <th>
                                Ngày đặt hàng
                            </th>
                            <th>
                                Ngày giao hàng
                            </th>
                            <th>
                                Địa chỉ giao hàng
                            </th>
                            <th>
                                Thành tiền
                            </th>
                            <th>
                                Trạng thái
                            </th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if ($invoices)
                            @foreach ($invoices as $item)
                                <tr id="{{ $item->MaDonHang }}">
                                    <td class="text-bold-500">
                                        <a href="/admin/invoice/detail/{{ $item->MaDonHang }}"
                                            name="view">#{{ $item->MaDonHang }}</a>
                                    </td>
                                    <td>
                                        <a href="/admin/customer/detail/{{ $item->MaKH }}">{{ $item->HoTen }}</a>
                                    </td>
                                    @if ($item->tran_code == 0)
                                        <td></td>
                                    @else
                                        <td>
                                            <span class="text-info">{{ $item->tran_code }}</span>
                                        </td>
                                    @endif
                                    <td>
                                        {{ $item->NgayDat }}
                                    </td>
                                    <td>
                                        @if ($item->NgayGiao and $item->NgayGiao != '0000-00-00')
                                            {{ $item->NgayGiao }}
                                        @endif
                                    </td>
                                    <td>
                                        {{ $item->DiaChi }}
                                    </td>
                                    <td>
                                        {{ number_format($item->ThanhTien, 0, ',', '.') }}₫
                                    </td>
                                    @if ($item->DaThanhToan == 0)
                                        <td class="text-danger">
                                            Đã hủy
                                        </td>
                                        <td></td>
                                    @elseif($item->DaThanhToan == 1 and $item->NgayGiao)
                                        <td class="text-success">
                                            Đã thanh toán
                                        </td>
                                        <td></td>
                                    @elseif ($item->DaThanhToan == 1 and !$item->NgayGiao)
                                        <td class="text-success">
                                            Đã thanh toán
                                        </td>
                                        <td>
                                            <a href="javascript:" name="Day_delivery" class="text-primary"
                                                data-toggle="modal" data-target="#modalDay">Chọn ngày
                                                giao</a>
                                        </td>
                                    @else
                                        <td class="text-warning">
                                            Chờ xác nhận
                                        </td>
                                        <td>
                                            <a href="javascript:;" name="payment" class="text-primary">Thanh toán</a> |
                                            <a href="javascript:;" name="Day_delivery" class="text-primary"
                                                data-toggle="modal" data-target="#modalDay">Chọn ngày
                                                giao</a>
                                            |
                                            <a href="javascript:;" name="cancel" class="text-danger">Hủy</a>
                                        </td>
                                    @endif
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

    <div class="modal" tabindex="-1" role="dialog" id="modalDay">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Chọn ngày giao hàng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="max-height: 70vh;overflow-y:auto">
                    <input class="form-control" name="day_delivery" type="date" />
                </div>
                <div class="modal-footer">
                    <button type="button" id="accept" class="btn btn-primary">Xác nhận</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        const _token = $("input[name='_token']").val();
        const dateObj = new Date();
        $(document).on('click', "a[name='payment']", function() {
            let id = $(this).closest('tr').attr('id');
            Swal.fire({
                title: "<h5>Bạn chắc chắn muốn thanh toán đơn hàng?</h5>",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/invoice/active',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            MaDH: id,
                            _token: _token
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
                                    text: "Vui lòng thử lại!",
                                    icon: "error",
                                    showConfirmButton: true
                                })
                            }
                        }
                    })
                }
            });
        });

        $(document).on('click', "a[name='cancel']", function() {
            let id = $(this).closest('tr').attr('id');
            Swal.fire({
                title: "<h5>Bạn chắc chắn muốn hủy đơn hàng?</h5>",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/invoice/cancel',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            MaDH: id,
                            _token: _token
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
                                    text: "Có lỗi xảy ra!",
                                    icon: "error",
                                    showConfirmButton: true
                                })
                            }
                        }
                    })
                }
            });
        });

        $(document).on('click', "a[name='Day_delivery']", function() {
            let id = $(this).closest('tr').attr('id');
            $("#accept").on('click', function() {
                let day = $("input[name='day_delivery']").val();
                let date = new Date(day + 'T23:59:59');

                if (day == "" || day == null) {
                    Swal.fire({
                        title: "<h4>Ngày giao hàng không được để trống!</h4>",
                        text: "Vui lòng thử lại!",
                        icon: "warning",
                        showConfirmButton: true
                    })
                } else if (dateObj > date) {
                    Swal.fire({
                        title: "<h4>Ngày giao hàng phải lớn hơn hoặc bằng ngày hiện tại!</h4>",
                        text: "Vui lòng thử lại!",
                        icon: "warning",
                        showConfirmButton: true
                    })
                } else {
                    Swal.fire({
                        title: "<h5>Chắc chắn giao hàng " + day + " ?</h5>",
                        icon: "question",
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Đồng ý!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: '/admin/invoice/delivery_date',
                                type: 'post',
                                dataType: 'json',
                                data: {
                                    MaDH: id,
                                    NgayGiao: day,
                                    _token: _token
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
                                            text: "Có lỗi xảy ra!",
                                            icon: "error",
                                            showConfirmButton: true
                                        })
                                    }
                                }
                            })
                        }
                    });
                }
            });
        });
    </script>
@endsection
