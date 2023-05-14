<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function manage()
    {
        $data = [];
        $categories = DB::table('the_loai')
            ->select('MaTheLoai', 'TenTheLoai', 'TenLoai', 'the_loai.Status', 'the_loai.Level')
            ->join('loai', 'loai.MaLoai', 'the_loai.MaLoai')
            ->orderBy('MaTheLoai', 'DESC')
            ->get();

        $data['categories'] = $categories;
        return view('admin.category.manage_category', $data);
    }

    public function create(Request $req)
    {
        $data = [];
        if ($req->method() == "POST") {
            $data['code'] = 200;
            $data['msg'] = 'Thành công';

            $MaTheLoai = time();
            $TenTheLoai = $req->TenTheLoai;
            $MaLoai = $req->MaLoai;
            $Level = $req->Level;
            $Status = (int)$req->Status;

            $check = DB::table('the_loai')
                ->insert([
                    'MaTheLoai' => $MaTheLoai,
                    'TenTheLoai' => $TenTheLoai,
                    'MaLoai' => $MaLoai,
                    'Level' => $Level,
                    'Status' => $Status
                ]);

            if ($check == false) {
                $data['code'] = 500;
                $data['msg'] = 'Thất bại';
            }

            $response = response()->json($data);
            return $response;
        }

        $type_books = DB::table('loai')
            ->get();
        $data['type_books'] = $type_books;

        return view('admin.category.create_category', $data);
    }

    public function edit(Request $req, $id)
    {
        $data = [];

        if ($req->method() == "POST") {
            $data['code'] = 200;
            $data['msg'] = 'Thành công';

            $TenTheLoai = $req->TenTheLoai;
            $MaLoai = $req->MaLoai;
            $Level = $req->Level;
            $Status = (int)$req->Status;

            DB::table('the_loai')
                ->where('MaTheLoai', '=', $id)
                ->update([
                    'TenTheLoai' => $TenTheLoai,
                    'MaLoai' => $MaLoai,
                    'Level' => $Level,
                    'Status' => $Status
                ]);

            $response = response()->json($data);
            return $response;
        }

        $category = DB::table('the_loai')
            ->where('MaTheLoai', '=', $id)->first();

        $type_books = DB::table('loai')
            ->get();
        $data['type_books'] = $type_books;

        $data['category'] = $category;
        return view('admin.category.edit_category', $data);
    }

    public function delete(Request $req)
    {
        $data = [];
        $data['code'] = 200;
        $data['msg'] = 'Thành công';

        $MaTheLoai = $req->MaTheLoai;
        $check_use = DB::table('sach')
        ->where('MaTheLoai', '=', $MaTheLoai)
        ->count();
        if($check_use == 0){
            $check = DB::table('the_loai')
                ->where('MaTheLoai', '=', $MaTheLoai)
                ->delete();
            if (!$check) {
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

    public function status(Request $req)
    {
        $data = [];
        $data['code'] = 200;
        $data['msg'] = 'Thành công';

        $MaTheLoai = $req->MaTheLoai;
        $supplier = DB::table('the_loai')
            ->where('MaTheLoai', '=', $MaTheLoai)
            ->first();

        $status = $supplier->Status;
        if ($status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }

        DB::table('the_loai')
            ->where('MaTheLoai', '=', $MaTheLoai)
            ->update([
                'Status' => $status
            ]);

        $response = response()->json($data);
        return $response;
    }
}
