<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilerPriceController extends Controller
{
    public function manage()
    {
        $data = [];
        $filter_price = DB::table('bang_gia')
            ->orderBy('MocDau', 'DESC')->get();

        $data['filter_price'] = $filter_price;
        return view('admin.filterPrice.manage_filter_price', $data);
    }

    public function create(Request $req)
    {
        $data = [];
        if ($req->method() == "POST") {
            $data['code'] = 200;
            $data['msg'] = 'Thành công';

            $MaGia = time();
            $MocDau = $req->MocDau;
            $MocCuoi = $req->MocCuoi;

            $check = DB::table('bang_gia')
                ->insert([
                    'MaGia' => $MaGia,
                    'MocDau' => $MocDau,
                    'MocCuoi' => $MocCuoi
                ]);

            if ($check == false) {
                $data['code'] = 500;
                $data['msg'] = 'Thất bại';
            }

            $response = response()->json($data);
            return $response;
        }
        return view('admin.filterPrice.create_filter_price', $data);
    }

    public function edit(Request $req, $id)
    {
        $data = [];

        if ($req->method() == "POST") {
            $data['code'] = 200;
            $data['msg'] = 'Thành công';

            $MocDau = $req->MocDau;
            $MocCuoi = $req->MocCuoi;

            DB::table('bang_gia')
                ->where('MaGia', '=', $id)
                ->update([
                    'MocDau' => $MocDau,
                    'MocCuoi' => $MocCuoi
                ]);

            $response = response()->json($data);
            return $response;
        }

        $filter_price = DB::table('bang_gia')
            ->where('MaGia', '=', $id)->first();

        $data['filter_price'] = $filter_price;
        return view('admin.filterPrice.edit_filter_price', $data);
    }

    public function delete(Request $req)
    {
        $data = [];
        $data['code'] = 200;
        $data['msg'] = 'Thành công';

        $MaGia = $req->MaGia;
        $_token = $req->_token;
        $check = DB::table('bang_gia')
        ->where('MaGia','=',$MaGia)
        ->delete();

        if(!$check){
            $data['code'] = 500;
            $data['msg'] = 'Thất bại';
        }

        $response = response()->json($data);
        return $response;
    }
}
