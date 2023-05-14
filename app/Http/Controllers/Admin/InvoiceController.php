<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function manage()
    {
        $data = [];
        $invoices = DB::table('don_hang')
            ->join('khach_hang', 'khach_hang.MaKH', 'don_hang.MaKH')
            ->orderBy('NgayDat', 'DESC')
            ->get();

        $data['invoices'] = $invoices;
        return view('admin.invoice.manage_invoice', $data);
    }

    public function detail($MaDH)
    {
        $data = [];
        $invoice = DB::table('don_hang')
            ->where('MaDonHang', '=', $MaDH)
            ->join('khach_hang', 'khach_hang.MaKH', 'don_hang.MaKH')
            ->first();
        $books = DB::table('chi_tiet_don_hang')
            ->where('MaDonHang', '=', $MaDH)
            ->join('sach','sach.MaSach','chi_tiet_don_hang.MaSach')
            ->get();
        $data['invoice'] = $invoice;
        $data['books'] = $books;
        return view('admin.invoice.detail_invoice', $data);
    }

    // public function delete(Request $req)
    // {
    //     $data = [];
    //     $data['code'] = 200;
    //     $data['msg'] = 'Thành công';

    //     $MaTheLoai = $req->MaTheLoai;
    //     $check_use = DB::table('sach')
    //         ->where('MaTheLoai', '=', $MaTheLoai)
    //         ->count();
    //     if ($check_use == 0) {
    //         $check = DB::table('the_loai')
    //             ->where('MaTheLoai', '=', $MaTheLoai)
    //             ->delete();
    //         if (!$check) {
    //             $data['code'] = 500;
    //             $data['msg'] = 'Thất bại';
    //         }
    //     } else {
    //         $data['msg'] = 'Không thể xóa mục này';
    //         $data['code'] = 500;
    //     }

    //     $response = response()->json($data);
    //     return $response;
    // }

    public function deliveryDate(Request $req)
    {
        $data = [];
        $data['code'] = 200;
        $data['msg'] = 'Cập nhật ngày giao thành công';

        $MaDH = $req->MaDH;
        $NgayGiao = $req->NgayGiao;
        DB::table('don_hang')
            ->where('MaDonHang', '=', $MaDH)
            ->update([
                'NgayGiao' => $NgayGiao,
            ]);

        $response = response()->json($data);
        return $response;
    }

    public function active(Request $req)
    {
        $data = [];
        $data['code'] = 200;
        $data['msg'] = 'Thành công';

        $MaDH = $req->MaDH;
        $check_date = DB::table('don_hang')
            ->where('MaDonHang', '=', $MaDH)
            ->first();
        if ($check_date->NgayGiao != null and $check_date->NgayGiao != '0000-00-00') {
            DB::table('don_hang')
                ->where('MaDonHang', '=', $MaDH)
                ->update([
                    'DaThanhToan' => 1,
                ]);
        } else {
            $data['code'] = 500;
            $data['msg'] = 'Đơn hàng chưa có ngày giao hàng';
        }

        $response = response()->json($data);
        return $response;
    }

    public function cancel(Request $req)
    {
        $data = [];
        $data['code'] = 200;
        $data['msg'] = 'Hủy hóa đơn thành công';

        $MaDH = $req->MaDH;
        $all_sach = DB::table('chi_tiet_don_hang')
            ->where('MaDonHang', '=', $MaDH)->get();
        foreach ($all_sach as $item) {
            $MaSach = $item->MaSach;
            $sach = DB::table('sach')
                ->where('MaSach', '=', $MaSach)
                ->first();
            $Soluong = $sach->SoLuongTon;
            DB::table('sach')
                ->where('MaSach', '=', $MaSach)
                ->update([
                    'SoLuongTon' => $Soluong,
                ]);
        }

        DB::table('don_hang')
            ->where('MaDonHang', '=', $MaDH)
            ->update([
                'DaThanhToan' => 0,
            ]);

        $response = response()->json($data);
        return $response;
    }
}
