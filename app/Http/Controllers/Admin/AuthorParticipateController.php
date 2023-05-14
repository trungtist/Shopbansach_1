<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorParticipateController extends Controller
{
    public function manage()
    {
        $data = [];
        $participates = DB::table('tham_gia')
            ->select('sach.MaSach', 'TenSach', 'tac_gia.MaTacGia', 'TenTacGia', 'VaiTro')
            ->join('sach', 'sach.MaSach', 'tham_gia.MaSach')
            ->join('tac_gia', 'tham_gia.MaTacGia', 'tac_gia.MaTacGia')
            ->orderBy('sach.MaSach', 'DESC')
            ->get();

        $data['participates'] = $participates;
        return view('admin.authorParticipate.manage_au_participate', $data);
    }

    public function create(Request $req)
    {
        $data = [];
        if ($req->method() == "POST") {
            $data['code'] = 200;
            $data['msg'] = 'Thành công';

            $MaSach = $req->MaSach;
            $MaTacGia = $req->MaTacGia;
            $VaiTro = $req->VaiTro;

            $check_use = DB::table('tham_gia')
                ->where('MaSach', '=', $MaSach)
                ->where('MaTacGia', '=', $MaTacGia)
                ->count();
            if ($check_use == 0) {
                $check = DB::table('tham_gia')
                    ->insert([
                        'MaSach' => $MaSach,
                        'MaTacGia' => $MaTacGia,
                        'VaiTro' => $VaiTro
                    ]);

                if ($check == false) {
                    $data['code'] = 500;
                    $data['msg'] = 'Thất bại';
                }
            } else {
                $data['code'] = 500;
                $data['msg'] = 'Tham gia đã tồn tại';
            }

            $response = response()->json($data);
            return $response;
        }

        $books = DB::table('sach')->orderBy('MaSach', 'DESC')->get();
        $authors = DB::table('tac_gia')->orderBy('MaTacGia', 'DESC')->get();

        $data['books'] = $books;
        $data['authors'] = $authors;

        return view('admin.authorParticipate.create_au_participate', $data);
    }

    public function edit(Request $req, $MaSach, $MaTacGia)
    {
        $data = [];

        if ($req->method() == "POST") {
            $data['code'] = 200;
            $data['msg'] = 'Thành công';

            $VaiTro = $req->VaiTro;

            DB::table('tham_gia')
                ->where('MaSach', '=', $MaSach)
                ->where('MaTacGia', '=', $MaTacGia)
                ->update([
                    'VaiTro' => $VaiTro
                ]);

            $response = response()->json($data);
            return $response;
        }

        $participate = DB::table('tham_gia')
            ->where('MaSach', '=', $MaSach)
            ->where('MaTacGia', '=', $MaTacGia)
            ->first();

        $data['participate'] = $participate;

        return view('admin.authorParticipate.edit_au_participate', $data);
    }

    public function delete(Request $req)
    {
        $data = [];
        $data['code'] = 200;
        $data['msg'] = 'Thành công';

        $MaSach = $req->MaSach;
        $MaTacGia = $req->MaTacGia;

        $check = DB::table('tham_gia')
            ->where('MaSach', '=', $MaSach)
            ->where('MaTacGia', '=', $MaTacGia)
            ->delete();
        if (!$check) {
            $data['code'] = 500;
            $data['msg'] = 'Thất bại';
        }

        $response = response()->json($data);
        return $response;
    }
}
