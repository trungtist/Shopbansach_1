@extends('layouts.client')

@section('title')
    {{ $title }}
@endsection

@section('css')
    <link href="{{ asset('assets/client/css/styleNews.css') }}" rel="stylesheet" />
    <style>
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
                    <a href="/">Trang chủ</a>
                </li>
                <li>
                    <a href="/news">Tin tức</a>
                </li>
                <li>
                    <strong itemprop="name">{{ $new->title }}</strong>
                </li>
            </ul>
        </div>
    </div>

    <div id="section-2">
        <div class="container">
            <div class="p-3">
                <div class="list-page">
                    <h1 class="title-head">{{ $new->title }}</h1>
                    <section class="list-blogs">
                        <input id="input_MS" type="number" disabled value="{{ $new->id }}" hidden />
                        <div class="row">
                            @if ($new)
                                <div class="col-12">
                                    {!! $new->content !!}
                                </div>
                            @else
                                <div class="col-12">
                                    <p>Tin tức đang được cập nhật. Xin vui lòng quay lại sau!</p>
                                </div>
                            @endif
                        </div>
                        <div id="tab-3" class="tab-content">

                        </div>
                    </section>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="ModalEvalueate" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Xóa bình luận của bạn</h5>
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
                                        <input type="email" required placeholder="Email" class="form-control"
                                            id="email_delete">
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
                            <h5 class="modal-title" id="exampleModalLongTitle">Viết bình luận của bạn</h5>
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
                                        <input type="text" required placeholder="Họ tên" class="form-control"
                                            id="full_name">
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
                                        <textarea name="Body" required placeholder="Nội dung" id="comment"
                                            class="form-control" rows="6"></textarea>
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
        </div>
    </div>
@endsection

@section('js')
    <script>
        const email =
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        function load_data_evaluate() {
            var id = $('#input_MS').val();
            $.ajax({
                url: '/get_evaluate',
                type: 'get',
                dataType: 'json',
                data: {
                    id: id,
                    type: 1,
                },
                success: function(data) {
                    var html_head = '<div class="product-reviews m-3">';
                    if (data.evaluates.length > 0) {
                        html_head += `
                        <h5 class="title-form-coment">
                            Bình luận (${data.evaluates.length} bình luận)
                        </h5>
                    `;
                    } else {
                        html_head += `
                        <p>Hiện tại chưa có tin, bạn hãy trở thành người đầu tiên đăng tin.
                        </p>
                    `;
                    }
                    html_head += `
                    <br>
                    <div id="article-comments">
                `;

                    var html_footer = `
                    </div>
                    <div class="product-reviews-summery p-2 text-center">
                        <button type="button" class="btn-new-review" data-toggle="modal"
                            data-target="#exampleModalCenter">Bình luận của bạn</button>
                    </div>
                </div>
                `;

                    var html = '';
                    if (data.evaluates.length > 0) {
                        data.evaluates.forEach(element => {
                            html += `<div class="article-comment d-flex">
                            <figure class="article-comment-user-image col-1">
                                <img src="{{ asset('assets/client/images') . '/' }}${element.AnhNen}">
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
                    $('#tab-3').html(html_head + html + html_footer);
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
                            type: 1,
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
        })
    </script>
@endsection
