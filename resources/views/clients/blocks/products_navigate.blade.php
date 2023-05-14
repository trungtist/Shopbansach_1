@php
    // lay chu de
    $theme_book = DB::select("SELECT MaChuDe, TenChuDe
    FROM chu_de cd
    WHERE cd.Status = 1");
    $data['theme_book'] = $theme_book;
    // lay loai
    $navigate_type_book = DB::select("SELECT MaLoai, TenLoai, MaChuDe
    FROM loai l
    WHERE l.Status = 1");
    $data['navigate_type_book'] = $navigate_type_book;
@endphp

<ul class="nav-2-subnav-1">
    @if (!empty($theme_book))
        @foreach ($theme_book as $item_theme)
            <li>
                <a href="/products?MaChuDe={{ $item_theme->MaChuDe }}">
                    {{ $item_theme->TenChuDe }}
                    <div class="arrow-down">
                        <i class="ti-angle-down"></i>
                    </div>
                    <ul class="list-1 list-main">
                        @if (!empty($navigate_type_book))
                            @foreach ($navigate_type_book as $item_type)
                                @if ($item_type->MaChuDe == $item_theme->MaChuDe)
                                    <li><a
                                            href="/products?MaChuDe={{ $item_theme->MaChuDe }}&MaLoai={{ $item_type->MaLoai }}">{{ $item_type->TenLoai }}</a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                </a>
            </li>
        @endforeach
    @else
        <li>
            <a href="/products">
                Đang cập nhật!
            </a>
        </li>
    @endif
</ul>
