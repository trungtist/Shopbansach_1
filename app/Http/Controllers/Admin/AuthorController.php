<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    public function manage()
    {
        $data = [];
        $authors = DB::table('tac_gia')
            ->orderBy('MaTacGia', 'DESC')
            ->get();

        $data['authors'] = $authors;
        return view('admin.author.manage_author', $data);
    }

    public function create(Request $req)
    {
        $data = [];
        if ($req->method() == "POST") {
            $data['code'] = 200;
            $data['msg'] = 'Thành công';

            $MaTacGia = time();
            $TenTacGia = $req->TenTacGia;
            $DiaChi = $req->DiaChi;
            $TieuSu = $req->TieuSu;
            $DienThoai = $req->DienThoai;
            $Status = (int)$req->Status;

            $check = DB::table('tac_gia')
                ->insert([
                    'MaTacGia' => $MaTacGia,
                    'TenTacGia' => $TenTacGia,
                    'DiaChi' => $DiaChi,
                    'TieuSu' => $TieuSu,
                    'DienThoai' => $DienThoai,
                    'Status' => $Status
                ]);

            if ($check == false) {
                $data['code'] = 500;
                $data['msg'] = 'Thất bại';
            }

            $response = response()->json($data);
            return $response;
        }

        return view('admin.author.create_author', $data);
    }

    public function edit(Request $req, $id)
    {
        $data = [];

        if ($req->method() == "POST") {
            $data['code'] = 200;
            $data['msg'] = 'Thành công';

            $TenTacGia = $req->TenTacGia;
            $DiaChi = $req->DiaChi;
            $TieuSu = $req->TieuSu;
            $DienThoai = $req->DienThoai;
            $Status = (int)$req->Status;

            DB::table('tac_gia')
                ->where('MaTacGia', '=', $id)
                ->update([
                    'TenTacGia' => $TenTacGia,
                    'DiaChi' => $DiaChi,
                    'TieuSu' => $TieuSu,
                    'DienThoai' => $DienThoai,
                    'Status' => $Status
                ]);

            $response = response()->json($data);
            return $response;
        }

        $author = DB::table('tac_gia')
            ->where('MaTacGia', '=', $id)->first();

        $data['author'] = $author;
        return view('admin.author.edit_author', $data);
    }

    public function delete(Request $req)
    {
        $data = [];
        $data['code'] = 200;
        $data['msg'] = 'Thành công';

        $MaTacGia = $req->MaTacGia;

        DB::table('tham_gia')
            ->where('MaTacGia', '=', $MaTacGia)
            ->delete();

        $check = DB::table('tac_gia')
            ->where('MaTacGia', '=', $MaTacGia)
            ->delete();

        if (!$check) {
            $data['code'] = 500;
            $data['msg'] = 'Thất bại';
        }

        $response = response()->json($data);
        return $response;
    }

    public function status(Request $req)
    {
        $data = [];
        $data['code'] = 200;
        $data['msg'] = 'Thành công';

        $MaTacGia = $req->MaTacGia;
        $supplier = DB::table('tac_gia')
            ->where('MaTacGia', '=', $MaTacGia)
            ->first();

        $status = $supplier->Status;
        if ($status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }

        DB::table('tac_gia')
            ->where('MaTacGia', '=', $MaTacGia)
            ->update([
                'Status' => $status
            ]);

        $response = response()->json($data);
        return $response;
    }
}
