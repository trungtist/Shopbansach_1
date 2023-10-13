@extends('layouts.admin')

@section('title')
@endsection

@section('css')
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tổng quan</h1>

    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Doanh thu
                            </div>

                            <div class="h5 mb-0 font-weight-bold text-gray-800 total_revenue">... VNĐ</div>

                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Khách hàng đăng ký
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 count_customer">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-id-card fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Hóa đơn đã thanh toán
                            </div>
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800 paid_invoice">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Hóa đơn chờ thanh toán
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 unpaid_invoice">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    function loadReport(){
        $.ajax({
            url: '/admin/get_report',
            type: 'get',
            dataType: 'json',
            data: {},
            success: function(data) {
                if (data.code == 200) {
                    $('.total_revenue').html(data.report.total_revenue + " VNĐ");
                    $('.count_customer').html(data.report.count_customer)
                    $('.paid_invoice').html(data.report.paid_invoice)
                    $('.unpaid_invoice').html(data.report.unpaid_invoice)
                } else {
                    Swal.fire({
                        title: "<h4>" + data.msg + "</h4>",
                        text: "Vui lòng thử lại sau.",
                        icon: "warning",
                        showConfirmButton: true
                    })
                }
            },
            error: function(er) {
                console.log(er)
                Swal.fire({
                    title: "<h4>Có lỗi xảy ra!</h4>",
                    text: "Vui lòng thử lại sau.",
                    icon: "warning",
                    showConfirmButton: true
                })
            }
        })
    }
    loadReport();
</script>
@endsection
