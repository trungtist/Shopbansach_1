@extends('layouts.client')

@section('title')
    {{ $title }}
@endsection

@section('css')
    <link href="{{ asset('assets/client/css/styleintroduction.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div id="section-1">
        <div class="container">
            <ul class="list-navigation">
                <li>
                    <a href="/">Trang chủ</a>
                </li>
                <li>
                    <strong itemprop="name">Giới thiệu</strong>
                </li>
            </ul>
        </div>
    </div>

    <div id="section-2">
        <div class="container">
            <div class="col-12 p-3">
                <div class="page-title">
                    <h1 class="title-head">
                        <a href="#" title="Giới thiệu">Giới thiệu</a>
                    </h1>
                </div>
                <div class="content-page">
                    <p class="">
                        <strong>TIỆN ÍCH - GIẢI TRÍ - KẾT NỐI</strong>
                    </p>
                    <p class="">
                        <span>Nhà sách Linh Phong là tổ hợp mua sắm - giải trí rộng hơn 2500m2, vừa là nơi để mọi người thỏa
                            mãn nhu cầu của bản thân, vừa là không gian giúp giải phóng cảm xúc cá nhân.</span>
                    </p>
                    <p class="">
                        <span>
                            Dù bạn là ai, bất kể độ tuổi, bất kể mức thu nhập như thế nào, đến Nhà sách Linh Phong đều có
                            thể tìm thấy thứ mình cần; và đều có một nơi chốn để thư giãn, nghỉ ngơi, chia sẻ.
                            <br>
                            <br>
                            Nhà sách Linh Phong dành ra một không gian đặc biệt cho trẻ em, với ước mong giúp các em được
                            sống hồn nhiên, sinh động đúng với lứa tuổi, được khai mở tiềm năng sáng tạo, và trên hết, được
                            kết nối với thế giới quanh mình.
                        </span>
                        <br>
                        <br>
                    </p>
                    <p class="">
                        <span>
                            ►Cơ sở 1: 828 Đường Láng - Đống Đa - Hà Nội
                            <br>
                            ☎️Hotline : 094.1234.828
                            <br>
                            ►Cơ sở 2: 36 Xuân Thủy - Cầu Giấy - Hà Nội
                            <br>
                            ☎️Hotline: 093.417.3636
                            <br>
                            ►Cơ sở 3 : 424 Nguyễn Trãi - Thanh Xuân - Hà Nội
                            <br>
                            ☎️Hotline: 0966 .688. 424
                            <br>
                            ►Cơ sở 4 : 697 Giải Phóng - Hoàng Mai - Hà Nội
                            <br>
                            ☎️Hotline: 0933.695.697
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
