<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login(Request $req){
        $data = [];
        if ($req->method() == "POST") {
            $TenDN = $req->TenDN;
            $MatKhau = $req->MatKhau;
            $check_login = DB::table('user')
            ->where('TenDN','=',$TenDN)
            ->first();
            if($check_login){
                $hash = $check_login->MatKhau;
                $role = $check_login->Role;
                $verify_pass = password_verify($MatKhau, $hash);
                if($verify_pass){
                    $LAST_ACTIVITY = time();
                    $req->session()->put('sUser', $TenDN);
                    $req->session()->put('sRole', $role);
                    $req->session()->put('LAST_ACTIVITY_AD', $LAST_ACTIVITY);
                    return redirect('/admin');
                }else{
                    $error = "Tài khoản hoặc mật khẩu không chính xác!";
                    $data['error'] = $error;
                }
            }else{
                $error = "Tài khoản hoặc mật khẩu không chính xác!";
                $data['error'] = $error;
            }
        }
        return view('admin.login',$data);
    }

    public function logout(Request $req){
        $req->session()->forget(['sUser','sRole','LAST_ACTIVITY_AD']);
        return redirect('/admin/login');
    }
}
