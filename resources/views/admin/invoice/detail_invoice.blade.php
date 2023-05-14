@extends('layouts.admin')

@section('title')
@endsection

@section('css')
@endsection

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý đơn hàng</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        @if ($invoice)
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Chi tiết đơn hàng #{{ $invoice->MaDonHang }}</h6>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-8">
                        <p>
                            <b>Tên khách hàng:</b>
                            {{ $invoice->HoTen }}
                        </p>
                    </div>

                    <div class="col-md-8">
                        <div>
                            <b>Sản phẩm:</b>
                            @foreach ($books as $key => $item)
                                <p class="text-info"> - {{ $key + 1 }}:</p>
                                <div class="pl-3">
                                    <p>
                                        <b>Tên sách:</b>
                                        {{ $item->TenSach }}
                                    </p>
                                </div>

                                <div class="pl-3 row mb-2">
                                    <div class="col-2">
                                        <b>Ảnh bìa:</b>
                                    </div>
                                    <div class="col-auto">
                                        <img src="{{ asset('assets/client/imgs/'.$item->AnhBia) }}" alt="." width='80'>
                                    </div>
                                </div>

                                <div class="pl-3">

                                    <p>
                                        <b>Số lượng:</b>
                                        {{ $item->SoLuong }}
                                    </p>
                                </div>

                                <div class="pl-3">
                                    <p>
                                        <b>Đơn giá:</b>
                                        {{ number_format($item->DonGia, 0, ',', '.') }}₫
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-8">
                        <p>
                            <b>Ngày đặt:</b>
                            {{ $invoice->NgayDat }}
                        </p>
                    </div>

                    <div class="col-md-8">
                        <p>
                            <b>Ngày giao:</b>
                            @if ($invoice->NgayGiao and $invoice->NgayGiao != '0000-00-00')
                                {{ $invoice->NgayGiao }}
                            @endif
                        </p>
                    </div>

                    <div class="col-md-8">
                        <p>
                            <b>Mô tả:</b>
                            {{ $invoice->MoTa }}
                        </p>
                    </div>

                    <div class="col-md-8">
                        <p>
                            <b>Địa chỉ:</b>
                            {{ $invoice->DiaChi }}
                        </p>
                    </div>

                    <div class="col-md-8">
                        <p>
                            <b>Phí giao hàng:</b>
                            {{ number_format($invoice->PhiGiaoHang, 0, ',', '.') }}₫
                        </p>
                    </div>
                    <div class="col-md-8">
                        <p>
                            <b>Thành tiền:</b>
                            {{ number_format($invoice->ThanhTien, 0, ',', '.') }}₫
                        </p>
                    </div>
                    <div class="col-md-8">
                        <p>
                            <b>Trạng thái:</b>
                            @if ($invoice->DaThanhToan == 0)
                                <span class="text-danger">
                                    Đã hủy
                                </span>
                                <span></span>
                            @elseif($invoice->DaThanhToan == 1)
                                <span class="text-success">
                                    Đã thanh toán
                                </span>
                                <span></span>
                            @else
                                <span class="text-warning">
                                    Chờ xác nhận
                                </span>
                            @endif
                        </p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-8">
                        <div class="form-actions no-color">
                            <a href="/admin/invoice/manage" class="btn btn-secondary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-arrow-left"></i>
                                </span>
                                <span class="text">Quay lại</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-8">
                        <p class="text-danger">
                            Có lỗi xảy ra!
                        </p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-8">
                        <div class="form-actions no-color">
                            <a href="/admin/invoice/manage" class="btn btn-secondary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-arrow-left"></i>
                                </span>
                                <span class="text">Quay lại</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('js')
@endsection
