@extends('layouts.client')

@section('title')
    {{ $title }}
@endsection

@section('css')
    <link href="{{ asset('assets/client/css/styleNews.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/client/css/styleSearch.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div id="section-1">
        <div class="container">
            <ul class="list-navigation">
                <li>
                    <a href="/">Trang chủ</a>
                </li>
                <li>
                    <strong itemprop="name">Tin tức</strong>
                </li>
            </ul>
        </div>
    </div>

    <div id="section-2">
        <div class="container">
            <div class="p-3">
                <div class="list-page">
                    <h1 class="title-head">Tin tức</h1>
                    <section class="list-blogs">
                        <div class="row">
                            @if ($news)
                                @foreach ($news as $key => $item)
                                    @if ($key < 3)
                                        <div class="col-4 fix-blog">
                                            <article class="blog-item">
                                                <a href="{{ route('new_detail', ['id' => $item->id]) }}"
                                                    class="entry-header" title="{{ $item->title }}">
                                                    <img src="{{ asset('assets/client/images_new/' . $item->image) }}"
                                                        alt=".">
                                                </a>
                                                <h3 class="entry-title">
                                                    <a href="{{ route('new_detail', ['id' => $item->id]) }}"
                                                        title="{{ $item->title }}">{{ $item->title }}</a>
                                                </h3>
                                            </article>
                                        </div>
                                    @else
                                        <div class="col-3 fix-blog-small">
                                            <article class="blog-item">
                                                <a href="{{ route('new_detail', ['id' => $item->id]) }}"
                                                    class="entry-header" title="{{ $item->title }}">
                                                    <img src="{{ asset('assets/client/images_new/' . $item->image) }}"
                                                        alt=".">
                                                </a>
                                                <h3 class="entry-title">
                                                    <a href="{{ route('new_detail', ['id' => $item->id]) }}"
                                                        title="{{ $item->title }}">{{ $item->title }}</a>
                                                </h3>
                                            </article>
                                        </div>
                                    @endif
                                @endforeach
                                <div class="col-12">
                                    {{ $news->links('clients.blocks.products_page') }}
                                    {{-- <div class="page-switch-btn">
                                        <nav class="text-center">
                                            <ul class="pagination">
                                                <li class="page-item">
                                                    <a class="page-link" href="#">
                                                        <img src="{{ asset('assets/client/images/prev.png') }}" alt="">
                                                    </a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link background-03a9f4" href="#">
                                                        1
                                                    </a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#">
                                                        2
                                                    </a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#">
                                                        3
                                                    </a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#">
                                                        ...
                                                    </a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#">
                                                        8
                                                    </a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#">
                                                        <img src="{{ asset('assets/client/images/next.png') }}" alt="">
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div> --}}
                                </div>
                            @else
                                <div class="col-12">
                                    <p>Chưa có tin tức mới. Xin vui lòng quay lại sau!</p>
                                </div>
                            @endif
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
