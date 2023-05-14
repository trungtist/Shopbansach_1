<?php

namespace App\Http\Controllers;

use App\Models\CheckLogin;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login(Request $req)
    {
        $data = [];
        if($req->method() == "POST"){
            $email = $req->Email;
            $MatKhau = $req->MatKhau;
            $_token = $req->_token;
            $find_acc = DB::table('khach_hang')
            ->where('Email', '=', $email)
            ->first();

            if($find_acc){
                $hash = $find_acc->MatKhau;
                $verify_pass = password_verify($MatKhau, $hash);
                if($verify_pass){
                    $LAST_ACTIVITY = time();
                    $req->session()->put('sEmail', $email);
                    $req->session()->put('sToken', $_token);
                    $req->session()->put('LAST_ACTIVITY', $LAST_ACTIVITY);
                    return redirect('/account');
                }
            }
            $data['msg'] = 'Email hoặc mật khẩu không chính xác!';
        }

        if($req->session()->has('sEmail')){
            return redirect('/account');
        }

        $data['title'] = 'Đăng nhập';

        return view('clients.login', $data);
    }

    public function logout(Request $req)
    {
        $req->session()->forget(['sEmail','sToken','LAST_ACTIVITY', 'totalPrice', 'infoOrder']);
        return redirect('/login');
    }

    //account
    public function account(){
        if(!(new CheckLogin())->AuthenLogin(Session('sEmail'))){
            return redirect('/logout');
        }
        $data = [];
        $email = Session('sEmail');
        $find_acc = DB::table('khach_hang')
        ->select('MaKH','HoTen','Email','DienThoai','NgayTao','Status')
        ->where('Email', '=', $email)
        ->first();

        $orders = DB::table('don_hang')
        ->where('MaKH', '=', $find_acc->MaKH)
        ->orderBy('NgayDat','DESC')->paginate(config('page.page'));

        $data['title'] = 'Thông tin tài khoản';
        $data['account'] = $find_acc;
        $data['orders'] = $orders;
        return view('clients.account', $data);
    }

    //get info congrats
    public function infoCongrats($id){
        $data = [];
        $data['code'] = 200;
        $data['msg'] = 'Thành công';

        $congrats = DB::table('bai_viet')
        ->where('id', '=', $id)
        ->first();

        if($congrats){
        }else{
            $data['code'] = 500;
            $data['msg'] = 'Thất bại';
        }

        $data['congrats'] = $congrats;
        
        $response = response()->json($data);
        return $response; 
    }

    //order
    public function detail_order(){
        if(!(new CheckLogin())->AuthenLogin(Session('sEmail'))){
            return redirect('/logout');
        }
        $data = [];
        $MaDonHang = request()->MaDonHang;
        $order = DB::table('don_hang')
        ->where('MaDonHang','=', $MaDonHang)
        ->first();

        if($order){
            $ct_donhang = DB::table('chi_tiet_don_hang')
            ->where('MaDonHang','=',$MaDonHang)->get();
            $ctdonhang = [];
            $i = 0;
            foreach($ct_donhang as $item){
                $MaSach = $item->MaSach;
                $sach = DB::table('sach')
                ->where('MaSach','=',$MaSach)->first();

                $ctdonhang[$i] = [];
                $ctdonhang[$i]['AnhBia'] = $sach->AnhBia;
                $ctdonhang[$i]['TenSach'] = $sach->TenSach;
                $ctdonhang[$i]['SoLuong'] = $item->SoLuong;
                $ctdonhang[$i]['DonGia'] = number_format($item->DonGia, 0, ',', '.').'₫';
                $i++;
            }
            $data['code'] = 200;
            $data['msg'] = 'Thành công';
            $data['id'] = $MaDonHang;
            $data['mota'] = $order->MoTa;
            $data['ctdonhang'] = $ctdonhang;
        }else{
            $data['code'] = 0;
            $data['msg'] = 'Thất bại';
        }
        $response = response()->json($data);
        return $response;
    }

    public function cancel_order(){
        if(!(new CheckLogin())->AuthenLogin(Session('sEmail'))){
            return redirect('/logout');
        }
        $data = [];
        $MaDonHang = request()->MaDonHang;

        // cap nhat hoa don
        $order = DB::table('don_hang')
        ->where('MaDonHang','=', $MaDonHang)
        ->update(['DaThanhToan'=> 0]);
        if($order == 1){
            // them lai sach khi huy
            $ct_donhang = DB::table('chi_tiet_don_hang')
            ->where('MaDonHang','=',$MaDonHang)->get();
            foreach($ct_donhang as $item){
                // lay so luong ton
                $MaSach = $item->MaSach;
                $sach_detail = DB::table('sach')
                ->select('SoLuongTon')
                ->where('MaSach','=',$MaSach)->first();
                $SoLuongTon = $sach_detail->SoLuongTon + $item->SoLuong;
                $update_sach = DB::table('sach')
                ->where('MaSach','=', $MaSach)
                ->update(['SoLuongTon'=> $SoLuongTon]);
            }
            
            $data['code'] = 200;
            $data['msg'] = 'Thành công';
        }else{
            $data['code'] = 0;
            $data['msg'] = 'Thất bại';
        }
        $response = response()->json($data);
        return $response;
    }
}
