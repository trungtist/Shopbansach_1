<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomersController extends Controller
{
    public function manage()
    {
        $data = [];
        $customers = DB::table('khach_hang')
            ->orderBy('MaKH', 'DESC')
            ->get();

        $data['customers'] = $customers;
        return view('admin.customer.manage_customer', $data);
    }

    public function create(Request $req)
    {
        $data = [];
        if ($req->method() == "POST") {
            $data['code'] = 200;
            $data['msg'] = 'Thành công';

            $MaKH = time();
            $HoTen = $req->HoTen;
            $MatKhau = $req->MatKhau;
            $MatKhau_hash = password_hash($MatKhau, PASSWORD_DEFAULT);
            $Email = $req->Email;
            $DienThoai = $req->DienThoai;
            $NgayTao = date("Y-m-d H:i:s");
            $Status = (int)$req->Status;

            $check_email_use = DB::table('khach_hang')
                ->where('Email', '=', $Email)
                ->count();
            if ($check_email_use == 0) {
                $check = DB::table('khach_hang')
                    ->insert([
                        'MaKH' => $MaKH,
                        'HoTen' => $HoTen,
                        'Email' => $Email,
                        'MatKhau' => $MatKhau_hash,
                        'DienThoai' => $DienThoai,
                        'NgayTao' => $NgayTao,
                        'Status' => $Status
                    ]);

                if ($check == false) {
                    $data['code'] = 500;
                    $data['msg'] = 'Thất bại';
                }
            } else {
                $data['code'] = 500;
                $data['msg'] = 'Email đã tồn tại';
            }

            $response = response()->json($data);
            return $response;
        }

        return view('admin.customer.create_customer', $data);
    }

    public function edit(Request $req, $id)
    {
        $data = [];

        if ($req->method() == "POST") {
            $data['code'] = 200;
            $data['msg'] = 'Thành công';

            $HoTen = $req->HoTen;
            $MatKhau = $req->MatKhau;
            $Email = $req->Email;
            $DienThoai = $req->DienThoai;
            $Status = (int)$req->Status;

            $check_email_use = DB::table('khach_hang')
                ->where('Email', '=', $Email)
                ->where('MaKH', '<>', $id)
                ->count();
            if ($check_email_use == 0) {
                if ($MatKhau) {
                    $MatKhau_hash = password_hash($MatKhau, PASSWORD_DEFAULT);
                    DB::table('khach_hang')
                        ->where('MaKH', '=', $id)
                        ->update([
                            'HoTen' => $HoTen,
                            'Email' => $Email,
                            'MatKhau' => $MatKhau_hash,
                            'DienThoai' => $DienThoai,
                            'Status' => $Status
                        ]);
                } else {
                    DB::table('khach_hang')
                        ->where('MaKH', '=', $id)
                        ->update([
                            'HoTen' => $HoTen,
                            'Email' => $Email,
                            'DienThoai' => $DienThoai,
                            'Status' => $Status
                        ]);
                }
            } else {
                $data['code'] = 500;
                $data['msg'] = 'Email đã tồn tại';
            }

            $response = response()->json($data);
            return $response;
        }

        $customer = DB::table('khach_hang')
            ->where('MaKH', '=', $id)->first();

        $data['customer'] = $customer;
        return view('admin.customer.edit_customer', $data);
    }

    public function delete(Request $req)
    {
        $data = [];
        $data['code'] = 200;
        $data['msg'] = 'Thành công';

        $MaKH = $req->MaKH;

        $check_use = DB::table('don_hang')
            ->where('MaKH', '=', $MaKH)
            ->count();
        if ($check_use == 0) {
            $check = DB::table('khach_hang')
                ->where('MaKH', '=', $MaKH)
                ->delete();

            if (!$check) {
                $data['code'] = 500;
                $data['msg'] = 'Thất bại';
            }
        } else {
            $data['code'] = 500;
            $data['msg'] = 'Không thể xóa mục này';
        }

        $response = response()->json($data);
        return $response;
    }

    public function status(Request $req)
    {
        $data = [];
        $data['code'] = 200;
        $data['msg'] = 'Thành công';

        $MaKH = $req->MaKH;
        $customer = DB::table('khach_hang')
            ->where('MaKH', '=', $MaKH)
            ->first();

        $status = $customer->Status;
        if ($status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }

        DB::table('khach_hang')
            ->where('MaKH', '=', $MaKH)
            ->update([
                'Status' => $status
            ]);

        $response = response()->json($data);
        return $response;
    }

    public function detail($MaKH)
    {
        $data = [];
        $customer = DB::table('khach_hang')
            ->where('MaKH', '=', $MaKH)
            ->first();

        $data['customer'] = $customer;
        return view('admin.customer.detail_customer', $data);
    }
}
