<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index()
    {
        $data = [];
        $data['title'] = 'Tin tức';
        $news = DB::table('bai_viet')
            ->where('status', '=', 1)
            ->orderBy('id', 'DESC')
            ->paginate(config('page.page_new'));

        $data['news'] = $news;

        return view('clients.news.client_info_new', $data);
    }

    public function detail($id)
    {
        $data = [];
        $data['title'] = 'Chi tiết tin tức';
        $new = DB::table('bai_viet')
            ->where('id', '=', $id)
            ->first();

        $data['new'] = $new;

        return view('clients.news.client_detail_new', $data);
    }
}
