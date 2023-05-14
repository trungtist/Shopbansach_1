<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    public function manage()
    {
        $data = [];
        $books = DB::table('sach')
            ->select('MaSach', 'TenSach', 'AnhBia', 'TenKM', 'TenTheLoai', 'TenNXB', 'GiaBan', 'GiaMoi', 'Active', 'sach.Status', 'SoLuongTon')
            ->join('khuyen_mai', 'khuyen_mai.MaKM', 'sach.MaKM')
            ->join('nha_xuat_ban', 'nha_xuat_ban.MaNXB', 'sach.MaNXB')
            ->join('the_loai', 'the_loai.MaTheLoai', 'sach.MaTheLoai')
            ->orderBy('MaSach', 'DESC')
            ->get();

        $data['books'] = $books;

        return view('admin.book.manage_book', $data);
    }

    public function create(Request $req)
    {
        $data = [];
        if ($req->method() == "POST") {
            $data['code'] = 200;
            $data['msg'] = 'Thành công';

            $MaSach = time();
            $TenSach = $req->TenSach;
            $MoTa = $req->MoTa;
            $SoLuongTon = $req->SoLuongTon;
            $MaNXB = $req->MaNXB;
            $MaTheLoai = $req->MaTheLoai;
            $MaKM = $req->MaKM;
            $GiaBan = $req->GiaBan;
            $Status = (int)$req->Status;
            $Active = (int)$req->Active;
            $NgayCapNhat = date("Y-m-d H:i:s");

            $promotion = DB::table('khuyen_mai')
                ->where('MaKM', '=', $MaKM)
                ->first();

            $GiaMoi = $GiaBan - $GiaBan * $promotion->GiamGia / 100;
            $Location = 'assets/client/imgs';
            if ($req->hasFile('AnhBia')) {
                $file = $req->AnhBia;
                $file_name = $file->getClientOriginalName();
                $check_file_name = DB::table('sach')
                    ->where('AnhBia', '=', $file_name)
                    ->count();
                if ($check_file_name == 0) {
                    $check = DB::table('sach')
                        ->insert([
                            'MaSach' => $MaSach,
                            'TenSach' => $TenSach,
                            'MoTa' => $MoTa,
                            'AnhBia' => $file_name,
                            'NgayCapNhat' => $NgayCapNhat,
                            'SoLuongTon' => $SoLuongTon,
                            'MaNXB' => $MaNXB,
                            'MaTheLoai' => $MaTheLoai,
                            'MaKM' => $MaKM,
                            'GiaBan' => $GiaBan,
                            'GiaMoi' => $GiaMoi,
                            'Status' => $Status,
                            'Active' => $Active
                        ]);
                    if ($check) {
                        $file->move(public_path($Location), $file_name);
                    } else {
                        $data['code'] = 500;
                        $data['msg'] = 'Thất bại';
                    }
                } else {
                    $data['code'] = 500;
                    $data['msg'] = 'Tên ảnh đã tồn tại';
                }
            } else {
                $data['code'] = 500;
                $data['msg'] = 'Bạn chưa chọn ảnh bìa';
            }

            $response = response()->json($data);
            return $response;
        }

        $suppliers = DB::table('nha_xuat_ban')
            ->select('MaNXB', 'TenNXB')
            ->where('Status', 1)
            ->orderBy('MaNXB', 'DESC')
            ->get();

        $categories = DB::table('the_loai')
            ->select('MaTheLoai', 'TenTheLoai')
            ->orderBy('MaTheLoai', 'DESC')
            ->get();

        $promotions = DB::table('khuyen_mai')
            ->select('MaKM', 'TenKM')
            ->orderBy('MaKM', 'DESC')
            ->get();

        $data['suppliers'] = $suppliers;
        $data['categories'] = $categories;
        $data['promotions'] = $promotions;
        return view('admin.book.create_book', $data);
    }

    public function edit(Request $req, $id)
    {
        $data = [];

        if ($req->method() == "POST") {
            $data['code'] = 200;
            $data['msg'] = 'Thành công';

            $TenSach = $req->TenSach;
            $MoTa = $req->MoTa;
            $SoLuongTon = $req->SoLuongTon;
            $MaNXB = $req->MaNXB;
            $MaTheLoai = $req->MaTheLoai;
            $MaKM = $req->MaKM;
            $GiaBan = $req->GiaBan;
            $Status = (int)$req->Status;
            $Active = (int)$req->Active;
            $NgayCapNhat = date("Y-m-d H:i:s");

            $promotion = DB::table('khuyen_mai')
                ->where('MaKM', '=', $MaKM)
                ->first();

            $GiaMoi = $GiaBan - $GiaBan * $promotion->GiamGia / 100;
            $Location = 'assets/client/imgs';
            if ($req->hasFile('AnhBia')) {
                $file = $req->AnhBia;
                $file_name = $file->getClientOriginalName();
                $check_file_name = DB::table('sach')
                    ->where('AnhBia', '=', $file_name)
                    ->count();

                if ($check_file_name == 0) {
                    $sach = DB::table('sach')
                        ->where('MaSach', '=', $id)
                        ->first();
                    $ten_anh = $sach->AnhBia;
                    $path = public_path($Location) . '/' . $ten_anh;
                    $check = DB::table('sach')
                        ->where('MaSach', '=', $id)
                        ->update([
                            'TenSach' => $TenSach,
                            'MoTa' => $MoTa,
                            'AnhBia' => $file_name,
                            'SoLuongTon' => $SoLuongTon,
                            'MaNXB' => $MaNXB,
                            'MaTheLoai' => $MaTheLoai,
                            'NgayCapNhat' => $NgayCapNhat,
                            'MaKM' => $MaKM,
                            'GiaBan' => $GiaBan,
                            'GiaMoi' => $GiaMoi,
                            'Active' => $Active,
                            'Status' => $Status
                        ]);
                    if ($check) {
                        $file->move(public_path($Location), $file_name);
                        unlink($path);
                    } else {
                        $data['code'] = 500;
                        $data['msg'] = 'Thất bại';
                    }
                } else {
                    $data['code'] = 500;
                    $data['msg'] = 'Tên ảnh đã tồn tại';
                }
            } else {
                DB::table('sach')
                    ->where('MaSach', '=', $id)
                    ->update([
                        'TenSach' => $TenSach,
                        'MoTa' => $MoTa,
                        'SoLuongTon' => $SoLuongTon,
                        'MaNXB' => $MaNXB,
                        'MaTheLoai' => $MaTheLoai,
                        'MaKM' => $MaKM,
                        'GiaBan' => $GiaBan,
                        'GiaMoi' => $GiaMoi,
                        'Active' => $Active,
                        'Status' => $Status
                    ]);
                $file_name = '';
            }
            $response = response()->json($data);
            return $response;
        }

        $book = DB::table('sach')
            ->where('sach.MaSach', '=', $id)
            ->join('khuyen_mai', 'khuyen_mai.MaKM', 'sach.MaKM')
            ->join('nha_xuat_ban', 'nha_xuat_ban.MaNXB', 'sach.MaNXB')
            ->join('the_loai', 'the_loai.MaTheLoai', 'sach.MaTheLoai')
            ->first();

        $suppliers = DB::table('nha_xuat_ban')
            ->select('MaNXB', 'TenNXB')
            ->where('Status', 1)
            ->orderBy('MaNXB', 'DESC')
            ->get();

        $categories = DB::table('the_loai')
            ->select('MaTheLoai', 'TenTheLoai')
            ->orderBy('MaTheLoai', 'DESC')
            ->get();

        $promotions = DB::table('khuyen_mai')
            ->select('MaKM', 'TenKM')
            ->orderBy('MaKM', 'DESC')
            ->get();

        $data['book'] = $book;
        $data['suppliers'] = $suppliers;
        $data['categories'] = $categories;
        $data['promotions'] = $promotions;
        return view('admin.book.edit_book', $data);
    }

    // public function detail($id)
    // {
    //     $data = [];
    //     $book = DB::table('sach')
    //         ->select('MaSach', 'TenSach', 'AnhBia', 'TenKM', 'TenTheLoai', 'TenNXB', 'GiaBan', 'GiaMoi', 'Active', 'sach.Status', 'SoLuongTon')
    //         ->join('khuyen_mai', 'khuyen_mai.MaKM', 'sach.MaKM')
    //         ->join('nha_xuat_ban', 'nha_xuat_ban.MaNXB', 'sach.MaNXB')
    //         ->join('the_loai', 'the_loai.MaTheLoai', 'sach.MaTheLoai')
    //         ->first();
    //     $data['book'] = $book;
    //     return view('admin.book.detail_book', $data);
    // }

    public function delete(Request $req)
    {
        $data = [];
        $data['code'] = 200;
        $data['msg'] = 'Thành công';
        $Location = 'assets/client/imgs';

        $MaSach = $req->MaSach;

        $sach = DB::table('sach')
            ->where('MaSach', '=', $MaSach)
            ->first();
        $ten_anh = $sach->AnhBia;
        $path = public_path($Location) . '/' . $ten_anh;
        
        $check_use = DB::table('chi_tiet_don_hang')
        ->where('MaSach', '=', $MaSach)
        ->count();

        $check_use += DB::table('tham_gia')
        ->where('MaSach', '=', $MaSach)
        ->count();

        $check_use += DB::table('danh_gia')
        ->where('MaSach', '=', $MaSach)
        ->count();

        if ($check_use == 0) {
            $check = DB::table('sach')
            ->where('MaSach', '=', $MaSach)
            ->delete();
            
            if (!$check) {
                $data['code'] = 500;
                $data['msg'] = 'Thất bại';
            } else {
                $check_file_name = file_exists($path);
                if($check_file_name){
                    unlink($path);
                }
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

        $MaSach = $req->MaSach;
        $book = DB::table('sach')
            ->where('MaSach', '=', $MaSach)
            ->first();

        $status = $book->Status;
        if ($status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }

        DB::table('sach')
            ->where('MaSach', '=', $MaSach)
            ->update([
                'Status' => $status
            ]);

        $response = response()->json($data);
        return $response;
    }

    public function active(Request $req)
    {
        $data = [];
        $data['code'] = 200;
        $data['msg'] = 'Thành công';

        $MaSach = $req->MaSach;
        $book = DB::table('sach')
            ->where('MaSach', '=', $MaSach)
            ->first();

        $active = $book->Active;
        if ($active == 0) {
            $active = 1;
        } else {
            $active = 0;
        }

        DB::table('sach')
            ->where('MaSach', '=', $MaSach)
            ->update([
                'Active' => $active
            ]);

        $response = response()->json($data);
        return $response;
    }
}
