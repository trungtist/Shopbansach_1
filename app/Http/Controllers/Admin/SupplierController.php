<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    public function manage()
    {
        $data = [];
        $suppliers = DB::table('nha_xuat_ban')
            ->orderBy('MaNXB', 'DESC')->get();

        $data['suppliers'] = $suppliers;
        return view('admin.supplier.manage_supplier', $data);
    }

    public function create(Request $req)
    {
        $data = [];
        if ($req->method() == "POST") {
            $data['code'] = 200;
            $data['msg'] = 'Thành công';

            $MaNXB = time();
            $TenNXB = $req->TenNXB;
            $DiaChi = $req->DiaChi;
            $DienThoai = $req->DienThoai;
            $Status = (int)$req->Status;

            $check = DB::table('nha_xuat_ban')
                ->insert([
                    'MaNXB' => $MaNXB,
                    'TenNXB' => $TenNXB,
                    'DiaChi' => $DiaChi,
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
        return view('admin.supplier.create_supplier', $data);
    }

    public function edit(Request $req, $id)
    {
        $data = [];

        if ($req->method() == "POST") {
            $data['code'] = 200;
            $data['msg'] = 'Thành công';

            $TenNXB = $req->TenNXB;
            $DiaChi = $req->DiaChi;
            $DienThoai = $req->DienThoai;
            $Status = (int)$req->Status;

            DB::table('nha_xuat_ban')
                ->where('MaNXB', '=', $id)
                ->update([
                    'TenNXB' => $TenNXB,
                    'DiaChi' => $DiaChi,
                    'DienThoai' => $DienThoai,
                    'Status' => $Status
                ]);

            $response = response()->json($data);
            return $response;
        }

        $supplier = DB::table('nha_xuat_ban')
            ->where('MaNXB', '=', $id)->first();

        $data['supplier'] = $supplier;
        return view('admin.supplier.edit_supplier', $data);
    }

    public function delete(Request $req)
    {
        $data = [];
        $data['code'] = 200;
        $data['msg'] = 'Thành công';

        $MaNXB = $req->MaNXB;
        $_token = $req->_token;
        $check_use = DB::table('sach')
            ->where('MaNXB', '=', $MaNXB)
            ->count();

        if ($check_use == 0) {
            $check = DB::table('nha_xuat_ban')
                ->where('MaNXB', '=', $MaNXB)
                ->delete();
            if (!$check) {
                $data['code'] = 500;
                $data['msg'] = 'Thất bại';
            }
        } else {
            $data['msg'] = 'Không thể xóa mục này';
            $data['code'] = 500;
        }

        $response = response()->json($data);
        return $response;
    }

    public function status(Request $req)
    {
        $data = [];
        $data['code'] = 200;
        $data['msg'] = 'Thành công';

        $MaNXB = $req->MaNXB;
        $supplier = DB::table('nha_xuat_ban')
            ->where('MaNXB', '=', $MaNXB)
            ->first();

        $status = $supplier->Status;
        if ($status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }

        DB::table('nha_xuat_ban')
            ->where('MaNXB', '=', $MaNXB)
            ->update([
                'Status' => $status
            ]);

        $response = response()->json($data);
        return $response;
    }
}
