@extends('layouts.admin')

@section('title')
@endsection

@section('css')
@endsection

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý khách hàng</h1>

    <div class="card shadow mb-4">
        @if ($customer)
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Chi tiết khách hàng {{ $customer->MaKH }}</h6>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-8">
                        <p>
                            <b>Tên khách hàng:</b>
                            {{ $customer->HoTen }}
                        </p>
                    </div>

                    <div class="col-md-8">
                        <p>
                            <b>Email:</b>
                            {{ $customer->Email }}
                        </p>
                    </div>

                    <div class="col-md-8">
                        <p>
                            <b>Ngày tạo:</b>
                            {{ $customer->NgayTao }}
                        </p>
                    </div>

                    <div class="col-md-8">
                        <p>
                            <b>Điện thoại:</b>
                            {{ $customer->DienThoai }}
                        </p>
                    </div>

                    <div class="col-md-8">
                        <p>
                            <b>Trạng thái:</b>
                            @if ($customer->Status == 0)
                                <span class="text-danger">
                                    Tài khoản bị khóa
                                </span>
                            @else
                                <span class="text-success">
                                    Đang hoạt động
                                </span>
                            @endif
                        </p>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-8">
                        <div class="form-actions no-color">
                            <a href="/admin/customer/manage" class="btn btn-secondary btn-icon-split">
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
                            <a href="/admin/customer/manage" class="btn btn-secondary btn-icon-split">
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
