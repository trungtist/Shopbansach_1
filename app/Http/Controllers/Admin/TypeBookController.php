<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TypeBookController extends Controller
{
    public function manage()
    {
        $data = [];
        $type_books = DB::table('loai')
            ->select('MaLoai', 'TenLoai', 'TenChuDe', 'loai.Status', 'loai.Level')
            ->join('chu_de', 'loai.MaChuDe', 'chu_de.MaChuDe')
            ->orderBy('MaLoai', 'DESC')
            ->get();

        $data['type_books'] = $type_books;
        return view('admin.typeBook.manage_type_book', $data);
    }

    public function create(Request $req)
    {
        $data = [];
        if ($req->method() == "POST") {
            $data['code'] = 200;
            $data['msg'] = 'Thành công';

            $MaLoai = time();
            $TenLoai = $req->TenLoai;
            $MaChuDe = $req->MaChuDe;
            $Level = $req->Level;
            $Status = (int)$req->Status;

            $check = DB::table('loai')
                ->insert([
                    'MaLoai' => $MaLoai,
                    'TenLoai' => $TenLoai,
                    'MaChuDe' => $MaChuDe,
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

        $theme_books = DB::table('chu_de')
            ->get();
        $data['theme_books'] = $theme_books;

        return view('admin.typeBook.create_type_book', $data);
    }

    public function edit(Request $req, $id)
    {
        $data = [];

        if ($req->method() == "POST") {
            $data['code'] = 200;
            $data['msg'] = 'Thành công';

            $TenLoai = $req->TenLoai;
            $MaChuDe = $req->MaChuDe;
            $Level = $req->Level;
            $Status = (int)$req->Status;

            DB::table('loai')
                ->where('MaLoai', '=', $id)
                ->update([
                    'TenLoai' => $TenLoai,
                    'MaChuDe' => $MaChuDe,
                    'Level' => $Level,
                    'Status' => $Status
                ]);

            $response = response()->json($data);
            return $response;
        }

        $type_book = DB::table('loai')
            ->where('MaLoai', '=', $id)->first();

        $theme_books = DB::table('chu_de')
            ->get();
        $data['theme_books'] = $theme_books;

        $data['type_book'] = $type_book;
        return view('admin.typeBook.edit_type_book', $data);
    }

    public function delete(Request $req)
    {
        $data = [];
        $data['code'] = 200;
        $data['msg'] = 'Thành công';

        $MaLoai = $req->MaLoai;
        $check_use = DB::table('the_loai')
        ->where('MaLoai', '=', $MaLoai)
        ->count();
        if($check_use == 0){
            $check = DB::table('loai')
                ->where('MaLoai', '=', $MaLoai)
                ->delete();
            if (!$check) {
                $data['code'] = 500;
                $data['msg'] = 'Thất bại';
            }
        }else{
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

        $MaLoai = $req->MaLoai;
        $supplier = DB::table('loai')
            ->where('MaLoai', '=', $MaLoai)
            ->first();

        $status = $supplier->Status;
        if ($status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }

        DB::table('loai')
            ->where('MaLoai', '=', $MaLoai)
            ->update([
                'Status' => $status
            ]);

        $response = response()->json($data);
        return $response;
    }
}
