@extends('layouts.client')

@section('title')
    {{ $title }}
@endsection

@section('css')
    <link href="{{ asset('assets/client/css/Product.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div id="section-1">
        <div class="container">
            <ul class="list-navigation">
                <li>
                    <a itemprop="item" href="index.php" title="Trang chủ">
                        <span itemprop="name">Trang chủ</span>
                    </a>
                </li>
                <li>
                    <strong itemprop="name">Sản phẩm</strong>
                </li>
            </ul>
        </div>
    </div>

    <div id="product">
        <section class="container">
            <div class="row m-0 pb-1">
                <!--Phần slidebar bên trái-->
                <div id="sildebar" class="col-3 p-0">
                    <div class="slidebar_header">
                        <img src="{{ asset('assets/client/images/funnel.svg') }}" />
                        Lọc Sản Phẩm
                    </div>
                    <form action="" method="GET">
                        <div class="slidebar_contents border">
                            <!--Thương hiệu--->
                            <div class="filter border-bottom p-3">
                                <div class="slidebar_contens_tittle">
                                    Thương Hiệu
                                </div>
                                <input class="form-control field_search pr-5 pl-2" id="filed_search" type="Text"
                                    placeholder="Tìm Thương Hiệu">
                                <button class="submit_of_slidebar" id="submit_of_slidebar" type="button">
                                    <img src="{{ asset('assets/client/images/search.png') }}">
                                </button>

                                <ul class="slidebar_checkbox mt-1" id="checkboxes">
                                    @if (!empty($producer))
                                        @foreach ($producer as $item)
                                            <li class="p-2 align-items-center row m-0">
                                                <div class="col-1 p-0">
                                                    <input name="MaNXB" id="nxb_{{ $item->MaNXB }}" type="checkbox"
                                                        value="{{ $item->MaNXB }}">
                                                </div>
                                                <div class="col-11 p-0">
                                                    <label class="m-0 ml-2" for="nxb_{{ $item->MaNXB }}">
                                                        {{ $item->TenNXB }}</label>
                                                </div>
                                            </li>
                                        @endforeach ()
                                    @else
                                        <li class="p-2 align-items-center">
                                            <label class="m-0 ml-2" for="nxb_">
                                                Đang cập nhật</label>
                                        </li>
                                    @endif

                                </ul>
                                <input id="number_manxb" type="text" hidden name="lstProducer"
                                    value="{{ $lstProducer }}" />
                            </div>
                            <!--Giá sản phẩm-->
                            <div class="filter border-bottom p-3">
                                <div class="slidebar_contens_tittle mb-1">
                                    Giá Sản Phẩm
                                </div>
                                <ul class="slidebar_checkbox" id="checkboxes_2">
                                    @if (!empty($bang_gia))
                                        @foreach ($bang_gia as $item)
                                            <li class="p-2 row m-0 align-items-center">
                                                <div class="col-1 p-0">
                                                    <input name="price" id="price_{{ $item->MaGia }}" type="checkbox"
                                                        value="{{ $item->MaGia }}">
                                                </div>
                                                <div class="col-11 p-0">
                                                    <label class="m-0 ml-2"
                                                        for="price_{{ $item->MaGia }}">{{ number_format($item->MocDau) }}₫
                                                        - {{ number_format($item->MocCuoi) }}₫</label>
                                                </div>
                                            </li>
                                        @endforeach
                                    @else
                                        <li class="p-2 row d-flex align-items-center">
                                            <label class="m-0 ml-2" for="price_">Đang cập nhật</label>
                                        </li>
                                    @endif
                                </ul>
                                <input id="number_Gia" type="text" hidden name="Gia" value="{{ $Gia }}" />
                            </div>
                            <!--Loại sản phẩm -->
                            <div class="filter p-3">
                                <div class="slidebar_contens_tittle">
                                    Thể Loại
                                </div>
                                <input class="form-control field_search pr-5 pl-2" id="filed_search_1" type="Text"
                                    placeholder="Tìm thể loại">
                                <button class="submit_of_slidebar" id="submit_of_slidebar-2" type="button">
                                    <img src="{{ asset('assets/client/images/search.png') }}">
                                </button>
                                <ul class="slidebar_checkbox mt-1" id="checkboxes_1">
                                    @if (!empty($category_book))
                                        @foreach ($category_book as $item)
                                            <li class="p-2 align-items-center row m-0">
                                                <div class="col-1 p-0">
                                                    <input name="MaTheLoai" id="category_{{ $item->MaTheLoai }}"
                                                        type="checkbox" value="{{ $item->MaTheLoai }}">
                                                </div>
                                                <div class="col-11 p-0">
                                                    <label class="m-0 ml-2" for="category_{{ $item->MaTheLoai }}">
                                                        {{ $item->TenTheLoai }}</label>
                                                </div>
                                            </li>
                                        @endforeach
                                    @else
                                        <li class="p-2 align-items-center">
                                            <label class="m-0 ml-2" for="category_">
                                                Đang cập nhật</label>
                                        </li>
                                    @endif
                                </ul>
                                <input id="number_maTheLoai" type="text" hidden name="lstCategory"
                                    value="{{ $lstCategory }}" />
                            </div>
                        </div>
                        <input id="seach_book" hidden class="btn btn-info" type="submit" value="Tìm kiếm" />
                        <input hidden name="MaChuDe" type="text" value="{{ $MaChuDe }}" />
                        <input name="MaLoai" type="text" hidden value="{{ $MaLoai }}" />
                    </form>
                </div>
                <!--Kết thúc slidebar-->
                <div id="list_product" class="col-9 p-0">
                    <!--header list-->
                    <div class="tittle_header">
                        <div class="col-2">
                            Danh mục
                        </div>
                        <div class="slidebar_list">
                            <div class="items_slidebar_list">
                                <div class="owl-carousel">
                                    @if ($MaChuDe == '')
                                        @if (!empty($theme_book))
                                            @foreach ($theme_book as $item)
                                                <div>
                                                    <form action="" method="GET" class="mr-2">
                                                        <input name="MaChuDe" type="text" hidden
                                                            value="{{ $item->MaChuDe }}" />
                                                        <button id="select_theme_{{ $item->MaChuDe }}"
                                                            type="submit">{{ $item->TenChuDe }}</button>
                                                    </form>
                                                </div>
                                            @endforeach
                                        @else
                                            <div>
                                                <form action="" method="GET" class="mr-2">
                                                    <input name="MaChuDe" type="text" hidden value="" />
                                                    <button id="select_theme_" type="submit">Đang cập
                                                        nhật</button>
                                                </form>
                                            </div>
                                        @endif
                                    @else
                                        @if (!empty($type_book))
                                            @foreach ($type_book as $item)
                                                <div>
                                                    <form action="" method="GET" class="mr-2">
                                                        <input name="MaLoai" type="text" hidden
                                                            value="{{ $item->MaLoai }}" />
                                                        <input hidden name="MaChuDe" type="text"
                                                            value="{{ $MaChuDe }}" />
                                                        <button id="select_type_{{ $item->MaLoai }}"
                                                            type="submit">{{ $item->TenLoai }}</button>
                                                    </form>
                                                </div>
                                            @endforeach
                                        @else
                                            <div>
                                                <form action="" method="GET" class="mr-2">
                                                    <input name="MaLoai" type="text" hidden value="" />
                                                    <input hidden name="MaChuDe" type="text" value="" />
                                                    <button id="select_type_" type="submit">Đang cập
                                                        nhật</button>
                                                </form>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('clients.blocks.products_partial')
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#filed_search").on('input', function() {
                let search = $("#filed_search").val().toUpperCase();
                $('#checkboxes li').each(function() {
                    let a = $(this).children("div").text().toUpperCase();
                    if (!a.includes(search)) {
                        $(this).prop("hidden", true);
                    } else {
                        $(this).prop("hidden", false);
                    }
                })
            });

            $("#filed_search_1").on('input', function() {
                let search = $("#filed_search_1").val().toUpperCase();
                $('#checkboxes_1 li').each(function() {
                    let a = $(this).children("div").text().toUpperCase();
                    if (!a.includes(search)) {
                        $(this).prop("hidden", true);
                    } else {
                        $(this).prop("hidden", false);
                    }
                })
            });

            var selected = [];
            //gan gia tri cho input
            function Set_List_value(checkbox, number) {
                selected = [];
                $(checkbox + ' input:checked').each(function() {
                    selected.push($(this).attr('value'));
                });
                let len = selected.length;
                if (len == 0) {
                    $(number).val("");
                } else {
                    let str = "";
                    for (let i = 0; i < len - 1; i++) {
                        str += selected[i] + " ";
                    }
                    str += selected[len - 1];
                    $(number).val(str);
                }
            };

            @if (!empty($MaLoai))
                $("#select_type_{{ $MaLoai }}").addClass("btn_active");
            @endif

            $('input[name=MaNXB]').change(function() {
                Set_List_value("#checkboxes", "#number_manxb");
                $("#seach_book").click();
            });

            $('input[name=MaTheLoai]').change(function() {
                Set_List_value("#checkboxes_1", "#number_maTheLoai");
                $("#seach_book").click();
            });

            $('input[name=price]').change(function() {
                Set_List_value("#checkboxes_2", "#number_Gia");
                $("#seach_book").click();
            });

            function set_List_checked(str_number, input_name, checkboxes) {
                let str_lst = str_number.split(" ");
                let set = $(input_name);
                for (let i = 0; i < set.length; i++) {
                    if (str_lst.indexOf(set[i].defaultValue) != -1) {
                        $(checkboxes + " input[value=" + set[i].defaultValue + "]").attr('checked', 'checked');
                    }
                }
            };
            set_List_checked("{{ $lstProducer }}", "input[name=MaNXB]", "#checkboxes");
            set_List_checked("{{ $lstCategory }}", "input[name=MaTheLoai]", "#checkboxes_1");
            set_List_checked("{{ $Gia }}", "input[name=price]", "#checkboxes_2");

            // Select price
            $("#checkboxes_2 input:checkbox").on('click', function() {
                // in the handler, 'this' refers to the box clicked on
                let $box = $(this);
                if ($box.is(":checked")) {
                    // the name of the box is retrieved using the .attr() method
                    // as it is assumed and expected to be immutable
                    let group = "input:checkbox[name='" + $box.attr("name") + "']";
                    // the checked state of the group/box on the other hand will change
                    // and the current value is retrieved using .prop() method
                    $(group).prop("checked", false);
                    $box.prop("checked", true);
                } else {
                    $box.prop("checked", false);
                }
            });

            $('.owl-carousel').owlCarousel({
                loop: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 5
                    }
                }
            })
        });
    </script>
@endsection
