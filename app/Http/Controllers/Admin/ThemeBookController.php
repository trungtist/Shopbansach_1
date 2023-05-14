<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThemeBookController extends Controller
{
    public function manage()
    {
        $data = [];
        $theme_books = DB::table('chu_de')
            ->orderBy('MaChuDe', 'DESC')
            ->get();

        $data['theme_books'] = $theme_books;
        return view('admin.themeBook.manage_theme_book', $data);
    }

    public function create(Request $req)
    {
        $data = [];
        if ($req->method() == "POST") {
            $data['code'] = 200;
            $data['msg'] = 'Thành công';

            $MaChuDe = time();
            $TenChuDe = $req->TenChuDe;
            $Level = $req->Level;
            $Status = (int)$req->Status;

            $check = DB::table('chu_de')
                ->insert([
                    'MaChuDe' => $MaChuDe,
                    'TenChuDe' => $TenChuDe,
                    'Level' => $Level,
                    'Status' => $Status
                ]);

            if ($check == false) {
                $data['code'] = 500;
                $data['msg'] = 'Thất bại';
            }

            $response = response()->json($data);
            return $response;
        }

        return view('admin.themeBook.create_theme_book', $data);
    }

    public function edit(Request $req, $id)
    {
        $data = [];

        if ($req->method() == "POST") {
            $data['code'] = 200;
            $data['msg'] = 'Thành công';

            $TenChuDe = $req->TenChuDe;
            $Level = $req->Level;
            $Status = (int)$req->Status;

            DB::table('chu_de')
                ->where('MaChuDe', '=', $id)
                ->update([
                    'TenChuDe' => $TenChuDe,
                    'Level' => $Level,
                    'Status' => $Status
                ]);

            $response = response()->json($data);
            return $response;
        }

        $theme_book = DB::table('chu_de')
            ->where('MaChuDe', '=', $id)->first();

        $data['theme_book'] = $theme_book;
        return view('admin.themeBook.edit_theme_book', $data);
    }

    public function delete(Request $req)
    {
        $data = [];
        $data['code'] = 200;
        $data['msg'] = 'Thành công';

        $MaChuDe = $req->MaChuDe;
        $check_use = DB::table('loai')
            ->where('MaChuDe', '=', $MaChuDe)
            ->count();
        if ($check_use == 0) {
            $check = DB::table('chu_de')
                ->where('MaChuDe', '=', $MaChuDe)
                ->delete();
            if (!$check) {
                $data['code'] = 500;
                $data['msg'] = 'Thất bại';
            }
        } else {
            $data['msg'] = 'Không thể xóa mục này';
            $data['code'] = 500;
        }

        $response = response()->json($data);
        return $response;
    }

    public function status(Request $req)
    {
        $data = [];
        $data['code'] = 200;
        $data['msg'] = 'Thành công';

        $MaChuDe = $req->MaChuDe;
        $supplier = DB::table('chu_de')
            ->where('MaChuDe', '=', $MaChuDe)
            ->first();

        $status = $supplier->Status;
        if ($status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }

        DB::table('chu_de')
            ->where('MaChuDe', '=', $MaChuDe)
            ->update([
                'Status' => $status
            ]);

        $response = response()->json($data);
        return $response;
    }
}
