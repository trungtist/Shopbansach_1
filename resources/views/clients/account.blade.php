@extends('layouts.client')

@section('title')
    {{ $title }}
@endsection

@section('css')
    <link href="{{ asset('assets/client/css/styleintroduction.css') }}" rel="stylesheet" />
    <style>
        .pag a {
            margin: 0 3px;
            width: 36px;
            background: #fff;
            height: 36px;
            font-size: 14px;
            line-height: 34px;
            text-align: center;
            text-decoration: none;
            padding: 0;
            box-shadow: 0 2px 10px 0 #d8dde6;
            float: left;
        }

    </style>
@endsection

@section('content')
    <div id="section-1">
        <div class="container">
            <ul class="list-navigation">
                <li>
                    <a href="/">Trang chủ</a>
                </li>
                <li>
                    <strong itemprop="name">Thông tin tài khoản</strong>
                </li>
            </ul>
        </div>
    </div>

    <div id="section-2">
        <div class="container">
            <div class="col-12 p-3">
                <div class="page-title">
                    <h1 class="title-head">
                        <a href="#" title="Giới thiệu">Thông tin tài khoản</a>
                    </h1>
                </div>
                <div class="content-page">
                    <p>Họ và tên: {{ $account->HoTen }} </p>
                    <p>Số điện thoại: {{ $account->DienThoai }}</p>
                    <p>Email: {{ $account->Email }}</p>
                    <p>Ngày tạo tài khoản: {{ $account->NgayTao }}</p>
                </div>
            </div>
            <div class="col-12 p-3">
                <div class="card">
                    @if (count($orders) > 0)
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>Mã đơn hàng</th>
                                            <th>Mã giao dịch</th>
                                            <th>Địa chỉ</th>
                                            <th>Phí giao hàng</th>
                                            <th>Thành tiền</th>
                                            <th>Ngày đặt</th>
                                            <th>Ngày giao</th>
                                            <th>Trạng thái</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $item)
                                            <tr id="{{ $item->MaDonHang }}">
                                                <td class="text-bold-500">
                                                    <button class="btn btn-link"
                                                        name="view">#{{ $item->MaDonHang }}</button>
                                                </td>
                                                @if ($item->tran_code == 0)
                                                    <td></td>
                                                @else
                                                    <td>
                                                        <span class="text-info">{{ $item->tran_code }}</span>
                                                    </td>
                                                @endif
                                                <td>{{ $item->DiaChi }}</td>
                                                <td>{{ number_format($item->PhiGiaoHang, 0, ',', '.') }}₫</td>
                                                <td>{{ number_format($item->ThanhTien, 0, ',', '.') }}₫</td>

                                                <td>{{ $item->NgayDat }}</td>

                                                @if ($item->NgayGiao == '0000-00-00' || $item->NgayGiao == null)
                                                    <td class="text-warning"></td>
                                                @else
                                                    <td>{{ $item->NgayGiao }}</td>
                                                @endif

                                                @if ($item->DaThanhToan == 0)
                                                    <td class="text-danger">Đã hủy</td>

                                                @elseif ($item->DaThanhToan == 1)
                                                    <td class="text-success">Đã thanh toán</td>
                                                @else
                                                    <td class="text-warning">Chờ xác nhật</td>
                                                @endif

                                                @if ($item->DaThanhToan == 2)
                                                    <td>
                                                        <a href="javascript:;" name="cancel" class="text-danger">Hủy</a>
                                                    </td>
                                                @else
                                                    <td></td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-center">
                            <div class="pag">
                                {{ $orders->links('clients.blocks.products_page') }}
                            </div>
                        </div>
                    @else
                        <div class="card-footer d-flex justify-content-center">
                            <p>Bạn chưa có hóa đơn nào!</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="modalOrder">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="d-flex justify-content-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="order_body" class="modal-body" style="max-height: 70vh;overflow-y:auto">
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="modalCT">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detail_head"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="detail_body" class="modal-body" style="max-height: 70vh;overflow-y:auto">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @if (Session::get('active'))
        <script>
            $(document).ready(function() {
                $.ajax({
                    url: '/infoCongrats/1645292528',
                    type: 'get',
                    dataType: 'json',
                    data: {},
                    success: function(data) {
                        // console.log(data);
                        if (data.code == 200) {
                            var html = data.congrats.content;

                            $('#order_body').html(html);
                            $('#modalOrder').modal('show');
                        } else {
                            console.log("error");
                        }
                    },
                    error: function() {
                        Swal.fire({
                            title: "<h4>error!</h4>",
                            text: "Vui lòng thử lại sau.",
                            icon: "warning",
                            showConfirmButton: true
                        })
                    }
                })
            })
        </script>
    @endif
    <script>
        $(document).on('click', "button[name='view']", function() {
            let id = $(this).closest('tr').attr('id');
            $.ajax({
                url: '/detail_order',
                type: 'get',
                dataType: 'json',
                data: {
                    MaDonHang: id
                },
                success: function(data) {
                    if (data.code == 200) {
                        $("#detail_head").text("Chi tiết đơn hàng #" + data.id);
                        let html = '';
                        if (data.mota == "" || data.mota == null) {
                            html +=
                                `<div class=" mb-2 pb-1"><b>Ghi chú thêm:</b> <span class="text-primary">không có ghi chú thêm.</div></span><br>`;
                        } else {
                            html +=
                                `<div class=" mb-2 pb-1"><b>Ghi chú thêm:</b> <span class="text-primary">` +
                                data.mota + `</div></span><br>`;
                        }
                        $.each(data.ctdonhang, function(k, v) {
                            html +=
                                `<hr><div class="mb-2 d-flex"><div class="col-4"><img class="thumb-1x1" src="{{ asset('assets/client/imgs') }}/` +
                                v.AnhBia + `"/></div><div class="col-8"><div>Tên sách: <b>` + v
                                .TenSach + '</b></div>';
                            html += '<div>Số lượng: ' + v.SoLuong + '</div>';
                            html += '<div>Đơn giá: ' + v.DonGia + '</div></div></div>';

                        });
                        $("#detail_body").html(html);
                        $("#modalCT").modal();
                    } else {
                        Swal.fire({
                            title: "<h4>Có lỗi xảy ra!</h4>",
                            text: "Vui lòng thử lại sau.",
                            icon: "warning",
                            showConfirmButton: true
                        })
                    }
                },
                error: function() {
                    Swal.fire({
                        title: "<h4>error!</h4>",
                        text: "Vui lòng thử lại sau.",
                        icon: "warning",
                        showConfirmButton: true
                    })
                }
            })
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
                        url: '/cancel_order',
                        type: 'get',
                        dataType: 'json',
                        data: {
                            MaDonHang: id
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
                        },
                        error: function() {
                            Swal.fire({
                                title: "<h4>error</h4>",
                                text: "Có lỗi xảy ra!",
                                icon: "error",
                                showConfirmButton: true
                            })
                        }
                    })
                }
            });
        });
    </script>
@endsection
