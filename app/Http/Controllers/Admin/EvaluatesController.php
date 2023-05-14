<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EvaluatesController extends Controller
{
    public function users()
    {
        $data = [];
        $user_evaluate = DB::table('nguoi_danh_gia')
            ->orderBy('MaND', 'DESC')->get();

        $data['user_evaluate'] = $user_evaluate;
        return view('admin.evaluate.users', $data);
    }

    public function delete_user(Request $req)
    {
        $data = [];
        $data['code'] = 200;
        $data['msg'] = 'Thành công';

        $MaND = $req->MaND;
        $_token = $req->_token;
        DB::table('danh_gia')
        ->where('MaND','=',$MaND)
        ->delete();

        $check = DB::table('nguoi_danh_gia')
        ->where('MaND','=',$MaND)
        ->delete();

        if(!$check){
            $data['code'] = 500;
            $data['msg'] = 'Thất bại';
        }

        $response = response()->json($data);
        return $response;
    }

    public function messages()
    {
        $data = [];
        $mess_evaluate = DB::table('danh_gia')
            ->orderBy('NgayDang', 'DESC')->get();

        $data['mess_evaluate'] = $mess_evaluate;
        return view('admin.evaluate.messages', $data);
    }

    public function delete_message(Request $req)
    {
        $data = [];
        $data['code'] = 200;
        $data['msg'] = 'Thành công';

        $MaDG = $req->MaDG;
        $_token = $req->_token;
        $check = DB::table('danh_gia')
        ->where('MaDG','=',$MaDG)
        ->delete();

        if(!$check){
            $data['code'] = 500;
            $data['msg'] = 'Thất bại';
        }

        $response = response()->json($data);
        return $response;
    }
}
