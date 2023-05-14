<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RegisterController extends Controller
{
    public function register(Request $req)
    {
        $data = [];

        if($req->method() == "POST"){
            $email = $req->Email;
            $MatKhau = $req->MatKhau;
            $HoTen = $req->HoTen;
            $DienThoai = $req->DienThoai;
            $_token = $req->_token;
            $find_acc = DB::table('khach_hang')
            ->where('Email', '=', $email)
            ->first();

            if(!$find_acc){
                $MaKH = time();
                $LAST_ACTIVITY = time();
                $MatKhau_hash = password_hash($MatKhau, PASSWORD_DEFAULT);
                $NgayTao = date("Y-m-d H:i:s");
                DB::table('khach_hang')
                ->insert([
                    'MaKH'=> $MaKH,
                    'HoTen'=>$HoTen,
                    'Email'=>$email,
                    'MatKhau'=>$MatKhau_hash,
                    'DienThoai'=>$DienThoai,
                    'NgayTao'=>$NgayTao,
                    'Status'=>1
                ]);

                $req->session()->put('sEmail', $email);
                $req->session()->put('sToken', $_token);
                $req->session()->put('LAST_ACTIVITY', $LAST_ACTIVITY);
                return redirect('/account');
            }
            $data['msg'] = 'Email đã tồn tại!';
        }

        $data['title'] = 'Đăng ký';

        return view('clients.register', $data);
    }
}
