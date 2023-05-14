@extends('layouts.client')

@section('title')
    {{ $title }}
@endsection

@section('css')
    <link href="{{ asset('assets/client/css/styledtlsproduct1.css') }}" rel="stylesheet" />
    <style>
        .title-form-coment {
            color: #1c1c1c;
            letter-spacing: .01em;
            font-size: 16px;
            line-height: 1.4;
            margin-bottom: 5px;
        }

        #article-comments .article-comment-user-image {
            margin: 0;
            float: left;
            margin-right: 12px;
        }

        #article-comments .article-comment-user-image img {
            width: 55px;
        }

        #article-comments .article-comment-user-comment {
            font-size: 1em;
        }

        .btn_evaluate {
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            text-transform: uppercase;
            color: #fff;
            border: none;
            background: linear-gradient(120deg, var(--bg1), var(--bg2), var(--bg1));
            user-select: none;
            transition: 0.5s;
            background-size: 200%;
        }

        .btn_evaluate:hover {
            cursor: pointer;
            background-position: right;
        }

    </style>
@endsection

@section('content')
    <div id="section-1">
        <div class="container">
            <ul class="list-navigation">
                <li>
                    <a itemprop="item" href="/" title="Trang chủ">
                        <span itemprop="name">Trang chủ</span>
                    </a>
                </li>
                <li>
                    <a itemprop="item" href="#" title="{{ $sach->TenChuDe }}">
                        <span itemprop="name">{{ $sach->TenChuDe }}</span>
                    </a>
                </li>
                <li>
                    <a itemprop="item" href="#" title="{{ $sach->TenTheLoai }}">
                        <span itemprop="name">{{ $sach->TenTheLoai }}</span>
                    </a>
                </li>
                <li>
                    <strong itemprop="name">{{ $sach->TenSach }}</strong>
                </li>
            </ul>
        </div>
    </div>

    <div id="section-2">
        <div class="container">
            <div class="details-product">
                <div class="row p-3">
                    <div class="col-4">
                        <div class="product-image-block">
                            <div class="img-big clearfix">
                                <div class="slick-track">
                                    <a href="#" class="slick-slide style-a" data-toggle="modal"
                                        data-target=".bd-example-modal-lg">
                                        <img src="{{ asset('assets/client/imgs/' . $sach->AnhBia) }}">
                                    </a>
                                </div>
                            </div>
                            <div class="img-small p-5">
                                <div class="slick-track">
                                    <div class="slick-1">
                                        <img src="{{ asset('assets/client/imgs/' . $sach->AnhBia) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="product-top">
                            <h1 class="title-head">
                                {{ $sach->TenSach }}
                            </h1>
                            <div class="product-rating mb-3">
                                <i class="star-off-png" title="Not rated yet!">
                                    ☆
                                </i>
                                <i class="star-off-png" title="Not rated yet!">
                                    ☆
                                </i>
                                <i class="star-off-png" title="Not rated yet!">
                                    ☆
                                </i>
                                <i class="star-off-png" title="Not rated yet!">
                                    ☆
                                </i>
                                <i class="star-off-png" title="Not rated yet!">
                                    ☆
                                </i>
                            </div>
                            <div class="social-sharing margin-top-10 margin-bottom-20">
                                <span class="icon-like clearfix">
                                    <a href="#">
                                        <img src="{{ asset('assets/client/images/icon-like.png') }}">
                                        <span>Thích</span>
                                        <span>0</span>
                                    </a>
                                </span>
                                <a class="social-share" href="#">Chia sẻ</a>
                            </div>
                            <div class="info-product">
                                <div class="item-info">
                                    <span class="item-title">Mã sản phẩm:</span>
                                    <span class="detail-info">
                                        {{ $sach->MaSach }}
                                    </span>
                                </div>
                                <div class="item-info">
                                    <span class="item-title">Thương hiệu:</span>
                                    <span class="vendor">
                                        {{ $sach->TenNXB }}
                                    </span>
                                </div>
                                <div class="item-info item-special">
                                    <span class="item-title">Tình trạng:</span>
                                    @if ($sach->SoLuongTon > 0)
                                        <span class="info-status">
                                            Còn hàng
                                        </span>
                                    @else
                                        <span class="info-status text-danger">
                                            Hết hàng
                                        </span>
                                    @endif
                                </div>
                                <div class="price-box margin-bottom-10">
                                    <div id="money" class="price special-price">
                                        {{ number_format($sach->GiaMoi, 0, ',', '.') }}₫
                                    </div>
                                    @if ($sach->GiamGia > 0)
                                        <div class="old-price">
                                            Giá thị trường:
                                            <del id="money-old" class="price product-price-old">
                                                {{ number_format($sach->GiaBan, 0, ',', '.') }}₫
                                            </del>
                                        </div>
                                        <span class="save-price">
                                            Tiết kiệm:
                                            <span id="price_save" class="price product-price-save">
                                                {{ number_format($sach->GiaBan - $sach->GiaMoi, 0, ',', '.') }}₫
                                            </span>
                                        </span>
                                    @endif
                                </div>
                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <img src="{{ asset('assets/client/imgs/' . $sach->AnhBia) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-product">
                                    <div class="clearfix form-group">
                                        <div class="qty-ant clearfix custom-btn-number mt-3">
                                            <div class="custom custom-btn-numbers form-control">
                                                <button id="btn_minus" type="button" class="btn-minus btn-cts">
                                                    -
                                                </button>
                                                <input id="qty" type="text" class="qty input-text" name="SoLuong" size="4"
                                                    value="1" maxlength="3">
                                                <input id="input_MS" type="number" disabled value="{{ $sach->MaSach }}"
                                                    hidden />
                                                <button id="btn_plus" type="button" class="btn-plus btn-cts">
                                                    +
                                                </button>
                                            </div>
                                        </div>
                                        <div class="btn-mua mt-5">
                                            <button id="insert_cart" type="button"
                                                class="btn btn-lg btn-gray btn-cart btn_buy">
                                                Thêm vào giỏ
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="may-be-like">
                            <h3>
                                <a href="#" title="Có thể bạn quan tâm">
                                    Có thể bạn quan tâm
                                </a>
                            </h3>
                            @if (!empty($book_new))
                                <div class="may-be-like-list clearfix ">
                                    @foreach ($book_new as $key => $item)
                                        <div class="list-bestsell-item clearfix">
                                            <div class="product-image">
                                                <a href="{{ url('/products_detail/' . $item->MaSach) }}"
                                                    title="{{ $item->TenSach }}">
                                                    <img src="{{ asset('assets/client/imgs/' . $item->AnhBia) }}"
                                                        alt="{{ $item->TenSach }}">
                                                </a>
                                            </div>
                                            <div class="product-meta">
                                                <div class="names">
                                                    <a href="{{ url('/products_detail/' . $item->MaSach) }}"
                                                        class="line-clamp" title="{{ $item->TenSach }}">
                                                        {{ $item->TenSach }}
                                                    </a>
                                                </div>
                                                <div class="product-price-and-shipping">
                                                    <span class="price">
                                                        <?= number_format($item->GiaMoi, 0, ',', '.') ?>₫
                                                    </span>
                                                    @if ($item->GiamGia > 0)
                                                        <span class="regular-price">
                                                            <?= number_format($item->GiaBan, 0, ',', '.') ?>₫
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="may-be-like-list">
                                    <div class="list-bestsell-item clearfix">
                                        <div class="product-image">
                                            <a href="javascript:;" title="Đang cập nhật!">
                                                <img src="{{ asset('assets/client/images/not_image.png') }}"
                                                    alt="Đang cập nhật!">
                                            </a>
                                        </div>
                                        <div class="product-meta">
                                            <div class="names">
                                                <a href="javascript:;" class="line-clamp" title="Đang cập nhật!">
                                                    Đang cập nhật!
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="section-3">
        <div class="container p-4">
            <div class="row justify-content-center">
                <div class="tab-details-product col-10 p-3">
                    <div class="product-tab">
                        <ul class="tabs-title">
                            <li class="tab-link">
                                <span id="des" class="span-active" onclick="description()">Mô tả</span>
                            </li>
                            <li class="tab-link">
                                <span id="prorv" class="" onclick="proreviews()">Đánh giá sản phẩm</span>
                            </li>
                        </ul>
                        <div id="tab-1" class="current">
                            <p>{{ $sach->MoTa }}</p>
                        </div>
                        <div id="tab-3" class="tab-content">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="ModalEvalueate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Xóa đánh giá của bạn</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Địa chỉ email của bạn sẽ được bảo mật. Các trường bắt buộc được đánh dấu
                        <span class="text-danger">(*)</span>
                    </p>
                    <div class="row">

                        <div class="col-12 padding-l-5">
                            <fieldset class="form-group">
                                <label>
                                    Email xác thực
                                    <span class="text-danger">(*)</span>
                                </label>
                                <input type="text" hidden name="" id="id_evaluate">
                                <input type="email" required placeholder="Email" class="form-control" id="email_delete">
                                <div class="invalid-feedback" id="feedback_email_delete">
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn_evaluate" data-dismiss="modal">Đóng</button>
                    <button type="button" id="delete_evaluate" class="btn_evaluate">Xóa bình luận</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Viết đánh giá của bạn</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Địa chỉ email của bạn sẽ được bảo mật. Các trường bắt buộc được đánh dấu
                        <span class="text-danger">(*)</span>
                    </p>
                    <div class="row">
                        <div class="col-12 padding-r-5">
                            <fieldset class="form-group">
                                <label>
                                    Họ tên
                                    <span class="text-danger">(*)</span>
                                </label>
                                <input type="text" required placeholder="Họ tên" class="form-control" id="full_name">
                                <div class="invalid-feedback" id="feedback_name">
                            </fieldset>
                        </div>
                        <div class="col-12 padding-l-5">
                            <fieldset class="form-group">
                                <label>
                                    Email
                                    <span class="text-danger">(*)</span>
                                </label>
                                <input type="email" required placeholder="Email" class="form-control" id="email">
                                <div class="invalid-feedback" id="feedback_email">
                            </fieldset>
                        </div>
                        <div class="col-12">
                            <fieldset class="form-group">
                                <label>
                                    Nội dung
                                    <span class="text-danger">(*)</span>
                                </label>
                                <textarea name="Body" required placeholder="Nội dung" id="comment" class="form-control"
                                    rows="6"></textarea>
                                <div class="invalid-feedback" id="feedback_comment">
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    @csrf
                    <button type="button" class="btn_evaluate" data-dismiss="modal">Đóng</button>
                    <button type="button" id="evaluate" class="btn_evaluate">Gửi bình luận</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        const email =
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        function description() {
            document.getElementById("des").classList.remove("span-active");
            document.getElementById("des").classList.add("span-active");
            document.getElementById("prorv").classList.remove('span-active');
            document.getElementById("tab-1").classList.add('current');
            document.getElementById("tab-1").classList.remove('tab-content');
            document.getElementById("tab-3").classList.add('tab-content');
            document.getElementById("tab-3").classList.remove('current');
        }

        function proreviews() {
            document.getElementById("prorv").classList.add('span-active');
            document.getElementById("des").classList.remove("span-active");
            document.getElementById("tab-1").classList.remove('current');
            document.getElementById("tab-1").classList.add('tab-content');
            document.getElementById("tab-3").classList.add('current');
            document.getElementById("tab-3").classList.remove('tab-content');
        }

        function load_data_evaluate() {
            var id = $('#input_MS').val();
            $.ajax({
                url: '/get_evaluate',
                type: 'get',
                dataType: 'json',
                data: {
                    id: id,
                    type: 0,
                },
                success: function(data) {
                    var html_head = '<div class="product-reviews m-3">';
                    if(data.evaluates.length > 0){
                        html_head += `
                            <h5 class="title-form-coment">
                                Bình luận (${data.evaluates.length} bình luận)
                            </h5>
                        `;
                    }else{
                        html_head += `
                            <p>Hiện tại sản phẩm chưa có đánh giá nào, bạn hãy trở thành người đầu tiên đánh giá cho
                            sản phẩm này</p>
                        `;
                    }
                    html_head+=`
                        <br>
                        <div id="article-comments">
                    `;

                    var html_footer = `
                        </div>
                        <div class="product-reviews-summery p-2">
                            <button type="button" class="btn-new-review" data-toggle="modal"
                                data-target="#exampleModalCenter">Gửi đánh giá của bạn</button>
                        </div>
                    </div>
                    `;
                    
                    var html = '';
                    if(data.evaluates.length > 0){
                        data.evaluates.forEach(element => {
                            html += `<div class="article-comment d-flex">
                                <figure class="article-comment-user-image col-1">
                                    <img src="{{ asset('assets/client/images').'/' }}${element.AnhNen}">
                                </figure>
                                <div class="article-comment-user-comment col-auto">
                                    <p class="user-name-comment">
                                        <strong>${element.HoTen}</strong>
                                        <a href="javascript:;" id="setId_evaluate_${element.MaDG}"
                                            class="text-danger ml-2 setId_evaluate" data-toggle="modal"
                                            data-target="#ModalEvalueate">xóa</a>
                                    </p>
                                    <span class="article-comment-date">
                                        ${element.NgayDang}
                                    </span>
                                    <p>
                                        ${element.NoiDung}
                                    </p>
                                </div>
                            </div>`;
                        });
                    }
                    $('#tab-3').html(html_head+html+html_footer);
                },
                error: function() {
                    console.log('error get evaluate');
                }
            })
            $('#ModalEvalueate').modal('hide');
            $('#exampleModalCenter').modal('hide');
        }

        load_data_evaluate();

        $(document).ready(function() {
            $('#email_delete').on('input', function() {
                var a = $(`#email_delete`).val();
                if ($(this).val().length >= 100) {
                    $(this).val($(this).val().substr(0, 100));
                }
                if (a == "" || !email.test(a)) {
                    $(`#email_delete`).addClass("is-invalid");
                    $(`#email_delete`).removeClass("is-valid");
                    $(`#feedback_email_delete`).html("Email không đúng định dạng!");
                } else if (a.length > 100) {
                    $(`#email_delete`).addClass("is-invalid");
                    $(`#email_delete`).removeClass("is-valid");
                    $(`#feedback_email_delete`).html("Trường này phải <= 100 ký tự");
                } else {
                    $(`#email_delete`).removeClass("is-invalid");
                    $(`#email_delete`).addClass("is-valid");
                    $(`#feedback_email_delete`).html("");
                }
            })

            $('#email').on('input', function() {
                var a = $(`#email`).val();
                if ($(this).val().length >= 100) {
                    $(this).val($(this).val().substr(0, 100));
                }
                if (a == "" || !email.test(a)) {
                    $(`#email`).addClass("is-invalid");
                    $(`#email`).removeClass("is-valid");
                    $(`#feedback_email`).html("Email không đúng định dạng!");
                } else if (a.length > 100) {
                    $(`#email`).addClass("is-invalid");
                    $(`#email`).removeClass("is-valid");
                    $(`#feedback_email`).html("Trường này phải <= 100 ký tự");
                } else {
                    $(`#email`).removeClass("is-invalid");
                    $(`#email`).addClass("is-valid");
                    $(`#feedback_email`).html("");
                }
            })

            $('#full_name').on('input', function() {
                var a = $(`#full_name`).val();
                if ($(this).val().length >= 50) {
                    $(this).val($(this).val().substr(0, 50));
                }
                if (a == "") {
                    $(`#full_name`).addClass("is-invalid");
                    $(`#full_name`).removeClass("is-valid");
                    $(`#feedback_name`).html("Trường này không được để trống!");
                } else if (a.length > 50) {
                    $(`#full_name`).addClass("is-invalid");
                    $(`#full_name`).removeClass("is-valid");
                    $(`#feedback_name`).html("Trường này phải từ dưới 50 ký tự");
                } else {
                    $(`#full_name`).removeClass("is-invalid");
                    $(`#full_name`).addClass("is-valid");
                    $(`#feedback_name`).html("");
                }
            })

            $('#comment').on('input', function() {
                var a = $(`#comment`).val();
                if ($(this).val().length >= 300) {
                    $(this).val($(this).val().substr(0, 300));
                }
                if (a == "") {
                    $(`#comment`).addClass("is-invalid");
                    $(`#comment`).removeClass("is-valid");
                    $(`#feedback_comment`).html("Trường này không được để trống!");
                } else if (a.length > 300) {
                    $(`#comment`).addClass("is-invalid");
                    $(`#comment`).removeClass("is-valid");
                    $(`#feedback_comment`).html("Trường này phải <= 300 ký tự");
                } else {
                    $(`#comment`).removeClass("is-invalid");
                    $(`#comment`).addClass("is-valid");
                    $(`#feedback_comment`).html("");
                }
            })

            $(document).on('click', "a.setId_evaluate", function() {
                let id = $(this).attr('id');
                id = id.replace("setId_evaluate_", "");
                $('#id_evaluate').val(id);
            });

            $('#delete_evaluate').on('click', function() {
                let check = 0;
                let email = $('#email_delete').val();
                let MaDG = $('#id_evaluate').val();
                if (email == "") {
                    $(`#email_delete`).addClass("is-invalid");
                    $(`#email_delete`).removeClass("is-valid");
                    $(`#feedback_email_delete`).html("Trường này không được để trống!");
                    check++;
                }
                let _token = $("input[name='_token']").val();
                if (check == 0) {
                    $.ajax({
                        url: '/Delete_evaluate',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            MaDG: MaDG,
                            email: email,
                            _token: _token
                        },
                        success: function(data) {
                            if (data.code == 200) {
                                Swal.fire({
                                    title: "<h5>" + data.msg + "</h5>",
                                    icon: "success",
                                    showConfirmButton: true
                                }).then((result) => {
                                    load_data_evaluate();
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
            });

            $('#evaluate').on('click', function() {
                let check = 0;
                let comment = $('#comment').val();
                if (comment == "") {
                    $(`#comment`).addClass("is-invalid");
                    $(`#comment`).removeClass("is-valid");
                    $(`#feedback_comment`).html("Trường này không được để trống!");
                    check++;
                }

                let name = $('#full_name').val();
                if (name == "") {
                    $(`#full_name`).addClass("is-invalid");
                    $(`#full_name`).removeClass("is-valid");
                    $(`#feedback_name`).html("Trường này không được để trống!");
                    check++;
                }

                let email = $('#email').val();
                if (email == "") {
                    $(`#email`).addClass("is-invalid");
                    $(`#email`).removeClass("is-valid");
                    $(`#feedback_email`).html("Trường này không được để trống!");
                    check++;
                }

                let id = $('#input_MS').val();
                let _token = $("input[name='_token']").val();
                if (check == 0) {
                    $.ajax({
                        url: '/evaluate',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            _token: _token,
                            comment: comment,
                            name: name,
                            email: email,
                            id: id,
                            type: 0,
                        },
                        success: function(data) {
                            // console.log(data);
                            if (data.code == 200) {
                                Swal.fire({
                                    title: "<h5>" + data.msg + "</h5>",
                                    icon: "success",
                                    showConfirmButton: true
                                }).then((result) => {
                                    load_data_evaluate();
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
            });

            document.querySelector("#qty").addEventListener("keypress", function(evt) {
                if (evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57) {
                    evt.preventDefault();
                }
            });
            (function($) {
                $.fn.inputFilter = function(inputFilter) {
                    return this.on("input keydown keyup mousedown mouseup select contextmenu drop",
                        function() {
                            if (inputFilter(this.value)) {
                                this.oldValue = this.value;
                                this.oldSelectionStart = this.selectionStart;
                                this.oldSelectionEnd = this.selectionEnd;
                            } else if (this.hasOwnProperty("oldValue")) {
                                this.value = this.oldValue;
                                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                            } else {
                                this.value = "1";
                            }
                        });
                };
            }(jQuery));
            $('#btn_plus').click(function() {
                var oldValue = $("#qty").val();
                var newVal = parseFloat(oldValue) + 1;
                $("#qty").val(newVal);
            });

            $('#btn_minus').click(function() {
                var oldValue = $("#qty").val();
                if (oldValue > 1) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 1;
                }
                $("#qty").val(newVal);
            });

            $('#qty').on('input', function() {
                if ($("#qty").val() == "0") {
                    $("#qty").val("1");
                }
            });

            $("#insert_cart").on("click", function() {
                var quantity = $("#qty").val();
                var input_MS = $("#input_MS").val();
                $(document).on('click', '.SwalBtn1', function() {
                    swal.close();
                });
                $.ajax({
                    url: '/AddCart',
                    type: 'get',
                    dataType: 'json',
                    data: {
                        id: input_MS,
                        quanty: quantity
                    },
                    success: function(data) {
                        if (data.code == 200) {
                            Swal.fire({
                                html: `<div class="text-info"><i class="ti-check"></i>` +
                                    data.msg +
                                    `</div><span class="ml-4 SwalBtn1 remove-item-cart">×</span>` +
                                    `<div class="row align-items-center p-3 btn_border border-secondary">` +
                                    `<div class="col p-0"><img class="thumb-1x1" src="{{ asset('assets/client/imgs') }}/` +
                                    data.img + `"/></div><div class="col p-0">` + data
                                    .TenSach + "</div></div>" +
                                    `<div class="row">
                                <a href="/cart"  style="display: inline-block;"><i class="ti-angle-right"></i> Giỏ hàng hiện có (` +
                                    data.total + `) sản phẩm</a>
                                </div>` +
                                    `<div class="row pt-2 justify-content-center"><a href="/payment_check" class="btn btn-primary text-white w-100">Tiến hành thanh toán<i class="ti-arrow-right"></i></a></div>`,
                                showConfirmButton: false,
                            }).then((result) => {
                                // location.reload();
                                update_cart_partial();
                            });
                        } else {
                            Swal.fire({
                                title: "<h4>" + data.msg + "</h4>",
                                text: data.msg,
                                icon: "danger",
                                showConfirmButton: true
                            })
                        }
                    }
                })
            })
        })
    </script>
@endsection
