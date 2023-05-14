<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CheckLogin;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function payment_check(Request $req)
    {
        if (!(new CheckLogin())->AuthenLogin(Session('sEmail'))) {
            return redirect('/logout');
        }
        $data = [];
        if ($req->method() == "GET") {
            $number_fail = 0;
            if (Session::has('Cart') and Session('Cart')->products != null) {
                $check_sach = [];
                $oldCart = Session('Cart');
                foreach ($oldCart->products as $key => $item) {
                    $sach = DB::table('sach')
                        ->select('MaSach', 'SoLuongTon')
                        ->where('MaSach', '=', $key)->first();
                    if (!$sach) {
                        $newCart = new Cart($oldCart);
                        $newCart->DeleteItemCart($item['MaSach']);
                        $req->session()->put('Cart', $newCart);
                    } else {
                        if ($sach->SoLuongTon < $item['quanty']) {
                            $number_fail++;
                            $check_sach[$key] = array();
                            $check_sach[$key]['SoLuong'] = $sach->SoLuongTon;
                        }
                    }
                }
            } else {
                return redirect('/products');
            }

            if ($number_fail == 0) {
                return redirect('/payment');
            }

            $data['title'] = 'Kiểm tra đơn hàng';
            $data['oldCart'] = $oldCart->products;
            $data['check_sach'] = $check_sach;
            $data['number_fail'] = $number_fail;
        } else {
            if (Session::has('Cart') and Session('Cart')->products != null) {
                $oldCart = Session('Cart');
                $newCart = new Cart($oldCart);

                foreach ($oldCart->products as $key => $item) {
                    $sach = DB::table('sach')
                        ->select('MaSach', 'SoLuongTon')
                        ->where('MaSach', '=', $key)->first();

                    if (!$sach or $sach->SoLuongTon == 0) {
                        $newCart->DeleteItemCart($key);
                    } else if ($sach->SoLuongTon < $item['quanty']) {
                        $newCart->UpdateItemCart($key, $sach->SoLuongTon);
                    }
                }

                $req->session()->put('Cart', $newCart);
            } else {
                return redirect('/products');
            }
            return redirect('/payment');
        }

        return view('clients.payment_check', $data);
    }

    public function payment()
    {
        if (!(new CheckLogin())->AuthenLogin(Session('sEmail'))) {
            return redirect('/logout');
        }
        $data = [];
        if (Session::has('Cart') and Session('Cart')->products != null) {
            $oldCart = Session('Cart');
            $local_ship = DB::table('vi_tri_ship')->get();
            $data['total'] = $oldCart->totalQuanty;
            $data['local_ship'] = $local_ship;
            $data['oldCart'] = $oldCart->products;
            $data['totalprice'] = number_format($oldCart->totalPrice, 0, ',', '.') . '₫';
        } else {
            return redirect('/products');
        }

        $data['title'] = 'Thanh toán';
        return view('clients.payment', $data);
    }

    public function change_ship()
    {
        if (!(new CheckLogin())->AuthenLogin(Session('sEmail'))) {
            return redirect('/logout');
        }
        $data = [];
        $id_ship = (int)request()->id;
        if (Session::has('Cart') and Session('Cart')->products != null) {
            $oldCart = Session('Cart');
            $local_ship = DB::table('vi_tri_ship')
                ->where('MaViTri', '=', $id_ship)
                ->first();
            $data['totalprice'] = number_format($oldCart->totalPrice, 0, ',', '.') . '₫';
            if ($local_ship) {
                $data['fee'] = number_format($local_ship->PhiShip, 0, ',', '.') . '₫';
                $data['totalpriceall'] = number_format($oldCart->totalPrice + $local_ship->PhiShip, 0, ',', '.') . '₫';
            } else {
                $data['fee'] = '0' . '₫';
                $data['totalpriceall'] = '0' . '₫';
            }
            $data['code'] = 200;
            $data['msg'] = 'Thành công';
        } else {
            $data['code'] = 0;
            $data['msg'] = 'Thất bại';
        }

        $response = response()->json($data);
        return $response;
    }

    public function client_order(Request $req)
    {
        if (!(new CheckLogin())->AuthenLogin(Session('sEmail'))) {
            return redirect('/logout');
        }
        $data = [];
        $error = NULL;

        $type = $req->payment;

        $id_ship = request()->id;
        $MoTa = request()->desct;

        if (Session::has('Cart') and Session('Cart')->products != null) {
            $oldCart = Session('Cart');
            $local_ship = DB::table('vi_tri_ship')
                ->where('MaViTri', '=', $id_ship)
                ->first();

            if ($local_ship) {
                $check = 0;
                foreach ($oldCart->products as $key => $item) {
                    $sach = DB::table('sach')
                        ->select('MaSach', 'SoLuongTon')
                        ->where('MaSach', '=', $key)->first();
                    if (!$sach || $sach->SoLuongTon == 0 || $sach->SoLuongTon < $item['quanty']) {
                        $check++;
                    }
                }
                if ($check != 0) {
                    return redirect('/payment_check');
                }

                $email = Session('sEmail');
                $client = DB::table('khach_hang')
                    ->where('Email', '=', $email)->first();
                if ($client) {
                    $MaDonHang = time();
                    $DaThanhToan = 2;
                    $MaKH = $client->MaKH;
                    $NgayDat = date("Y-m-d H:i:s");
                    $NgayGiao = null;
                    $DiaChi = $local_ship->TenViTri;
                    $PhiGiaoHang = $local_ship->PhiShip;
                    $ThanhTien = $oldCart->totalPrice + $PhiGiaoHang;
                    $infoOrder = [
                        'MaDonHang' => $MaDonHang,
                        'DaThanhToan' => 1,
                        'NgayDat' => $NgayDat,
                        'NgayGiao' => $NgayGiao,
                        'DiaChi' => $DiaChi,
                        'PhiGiaoHang' => $PhiGiaoHang,
                        'ThanhTien' => $ThanhTien,
                        'MoTa' => $MoTa,
                        'MaKH' => $MaKH
                    ];
                    if ($type and $type == '1') {
                        $req->session()->put('totalPrice', $ThanhTien);
                        $req->session()->put('infoOrder', $infoOrder);
                        return redirect('/payment_cart');
                    }

                    // them don hang
                    $check_dh = DB::table('don_hang')->insert([
                        'MaDonHang' => $MaDonHang,
                        'DaThanhToan' => $DaThanhToan,
                        'NgayDat' => $NgayDat,
                        'NgayGiao' => $NgayGiao,
                        'DiaChi' => $DiaChi,
                        'PhiGiaoHang' => $PhiGiaoHang,
                        'ThanhTien' => $ThanhTien,
                        'MoTa' => $MoTa,
                        'MaKH' => $MaKH
                    ]);

                    if ($check_dh) {
                        // them chi tiet don hang
                        foreach ($oldCart->products as $key => $item) {
                            $SoLuong = $item['quanty'];
                            $DonGia = $item['productInfo']->GiaMoi;

                            $check_dh = DB::table('chi_tiet_don_hang')->insert([
                                'MaDonHang' => $MaDonHang,
                                'MaSach' => $key,
                                'SoLuong' => $SoLuong,
                                'DonGia' => $DonGia
                            ]);

                            $sach = DB::table('sach')
                                ->select('MaSach', 'SoLuongTon')
                                ->where('MaSach', '=', $key)->first();

                            $SoLuongTon = $sach->SoLuongTon - $SoLuong;
                            DB::table('sach')
                                ->where('MaSach', '=', $key)
                                ->update([
                                    'SoLuongTon' => $SoLuongTon
                                ]);
                        }
                        $req->session()->forget('Cart');
                    } else {
                        $error = "Có lỗi xảy ra";
                        return redirect('/payment')->with(['error' => $error]);
                    }
                } else {
                    $error = "Có lỗi xảy ra";
                    return redirect('/payment')->with(['error' => $error]);
                }
            } else {
                $error = "Bạn chưa trọn mã vị trí";
                return redirect('/payment')->with(['error' => $error]);
            }
        } else {
            $error = "Có lỗi xảy ra";
            return redirect('/payment')->with(['error' => $error]);
        }
        return redirect('/account')->with(['active' => true]);;
    }

    public function payment_cart()
    {
        if (!Session::has('totalPrice')) {
            return redirect('/payment_check');
        }
        return view('clients.vnpay.index');
    }

    public function paymentOnline(Request $req)
    {
        if (!(new CheckLogin())->AuthenLogin(Session('sEmail'))) {
            return redirect('/logout');
        }
        $infoOrder = Session::get('infoOrder');
        if($infoOrder and Session::get('totalPrice')){
            $vnp_TxnRef = $infoOrder['MaDonHang']; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = $req->order_desc;
            $vnp_OrderType = $req->order_type;
            $vnp_Amount = Session::get('totalPrice')*100;
            $vnp_Locale = $req->language;
            $vnp_BankCode = $req->bank_code;
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
            
            //Add Params of 2.0.1 Version
            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => env('VNP_TMN_CODE'),
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => route('vnpReturn'),
                "vnp_TxnRef" => $vnp_TxnRef
            );
    
            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                $inputData['vnp_Bill_State'] = $vnp_Bill_State;
            }
    
            //var_dump($inputData);
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }
    
            $vnp_Url = env('VNP_URL') . "?" . $query;
            if (env('VNP_HASH_SECRET')) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, env('VNP_HASH_SECRET')); // 
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            
            return redirect($vnp_Url);
        }else{
            return redirect('/payment_check');
        }
    }

    public function vnpReturn(Request $req){
        if(session()->has('infoOrder') and $req->vnp_ResponseCode == '00'){
            $infoOrder = Session::get('infoOrder');
            
            $tran_code = $req->vnp_TransactionNo;
            $MaDonHang = $infoOrder['MaDonHang'];
            $DaThanhToan = $infoOrder['DaThanhToan'];
            $NgayDat = $infoOrder['NgayDat'];
            $NgayGiao = $infoOrder['NgayGiao'];
            $DiaChi = $infoOrder['DiaChi'];
            $ThanhTien = $infoOrder['ThanhTien'];
            $MoTa = $infoOrder['MoTa'];
            $PhiGiaoHang = $infoOrder['PhiGiaoHang'];
            $MaKH = $infoOrder['MaKH'];
            
            $oldCart = Session('Cart');
            $check_dh = DB::table('don_hang')->insert([
                'MaDonHang' => $MaDonHang,
                'DaThanhToan' => $DaThanhToan,
                'NgayDat' => $NgayDat,
                'NgayGiao' => $NgayGiao,
                'DiaChi' => $DiaChi,
                'PhiGiaoHang' => $PhiGiaoHang,
                'ThanhTien' => $ThanhTien,
                'MoTa' => $MoTa,
                'MaKH' => $MaKH,
                'tran_code' => $tran_code
            ]);

            if ($check_dh) {
                // them chi tiet don hang
                foreach ($oldCart->products as $key => $item) {
                    $SoLuong = $item['quanty'];
                    $DonGia = $item['productInfo']->GiaMoi;

                    $check_dh = DB::table('chi_tiet_don_hang')->insert([
                        'MaDonHang' => $MaDonHang,
                        'MaSach' => $key,
                        'SoLuong' => $SoLuong,
                        'DonGia' => $DonGia
                    ]);

                    $sach = DB::table('sach')
                        ->select('MaSach', 'SoLuongTon')
                        ->where('MaSach', '=', $key)->first();

                    $SoLuongTon = $sach->SoLuongTon - $SoLuong;
                    DB::table('sach')
                        ->where('MaSach', '=', $key)
                        ->update([
                            'SoLuongTon' => $SoLuongTon
                        ]);
                }
                $req->session()->forget('Cart');
                $req->session()->forget('infoOrder');
                $req->session()->forget('totalPrice');
            } else {
                $error = "Có lỗi xảy ra";
                return redirect('/payment')->with(['error' => $error]);
            }

            return redirect('/account')->with(['active' => true]);
        }else{
            $error = "Đã xảy ra lỗi không thể thanh toán";
            return redirect('/payment')->with(['error' => $error]);
        }
        return redirect()->to('/');
    }
}
