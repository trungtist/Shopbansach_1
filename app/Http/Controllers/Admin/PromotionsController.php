<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromotionsController extends Controller
{
    public function manage()
    {
        $data = [];
        $promotions = DB::table('khuyen_mai')
        ->orderBy('GiamGia','DESC')->get();

        $data['promotions'] = $promotions;
        return view('admin.promotion.manage_promotion', $data);
    }

    public function create(Request $req)
    {
        $data = [];
        if ($req->method() == "POST") {
            $data['code'] = 200;
            $data['msg'] = 'Thành công';

            $MaKM = time();
            $TenKM = $req->TenKM;
            $GiamGia = $req->GiamGia;

            $check = DB::table('khuyen_mai')
                ->insert([
                    'MaKM' => $MaKM,
                    'TenKM' => $TenKM,
                    'GiamGia' => $GiamGia
                ]);

            if ($check == false) {
                $data['code'] = 500;
                $data['msg'] = 'Thất bại';
            }

            $response = response()->json($data);
            return $response;
        }
        return view('admin.promotion.create_promotion', $data);
    }

    public function edit(Request $req,$id)
    {
        $data = [];
        if ($req->method() == "POST") {
            $data['code'] = 200;
            $data['msg'] = 'Thành công';

            $TenKM = $req->TenKM;
            $GiamGia = $req->GiamGia;

            DB::table('khuyen_mai')
                ->where('MaKM', '=', $id)
                ->update([
                    'TenKM' => $TenKM,
                    'GiamGia' => $GiamGia
                ]);

            $response = response()->json($data);
            return $response;
        }

        $promotion = DB::table('khuyen_mai')
            ->where('MaKM', '=', $id)->first();

        $data['promotion'] = $promotion;
        return view('admin.promotion.edit_promotion', $data);
    }

    public function delete(Request $req)
    {
        $data = [];
        $data['code'] = 200;
        $data['msg'] = 'Thành công';

        $MaKM = $req->MaKM;
        $_token = $req->_token;

        $check_use = DB::table('sach')
        ->where('MaKM', '=', $MaKM)
        ->count();
        if($check_use == 0){
            $check = DB::table('khuyen_mai')
            ->where('MaKM','=',$MaKM)
            ->delete();
    
            if(!$check){
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
}
