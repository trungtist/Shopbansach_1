<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddressShipController extends Controller
{
    public function manage()
    {
        $data = [];
        $address_ship = DB::table('vi_tri_ship')
            ->orderBy('PhiShip', 'DESC')->get();

        $data['address_ship'] = $address_ship;
        return view('admin.addressShip.manage_address_ship', $data);
    }

    public function create(Request $req)
    {
        $data = [];
        if ($req->method() == "POST") {
            $data['code'] = 200;
            $data['msg'] = 'Thành công';

            $MaViTri = time();
            $TenViTri = $req->TenViTri;
            $PhiShip = $req->PhiShip;
            $Status = (int)$req->Status;

            $check = DB::table('vi_tri_ship')
                ->insert([
                    'MaViTri' => $MaViTri,
                    'TenViTri' => $TenViTri,
                    'PhiShip' => $PhiShip,
                    'Status' => $Status
                ]);

            if ($check == false) {
                $data['code'] = 500;
                $data['msg'] = 'Thất bại';
            }

            $response = response()->json($data);
            return $response;
        }
        return view('admin.addressShip.create_address_ship', $data);
    }

    public function edit(Request $req, $id)
    {
        $data = [];

        if ($req->method() == "POST") {
            $data['code'] = 200;
            $data['msg'] = 'Thành công';

            $TenViTri = $req->TenViTri;
            $PhiShip = $req->PhiShip;
            $Status = (int)$req->Status;

            DB::table('vi_tri_ship')
                ->where('MaViTri', '=', $id)
                ->update([
                    'TenViTri' => $TenViTri,
                    'PhiShip' => $PhiShip,
                    'Status' => $Status
                ]);

            $response = response()->json($data);
            return $response;
        }

        $address_ship = DB::table('vi_tri_ship')
            ->where('MaViTri', '=', $id)->first();

        $data['address_ship'] = $address_ship;
        return view('admin.addressShip.edit_address_ship', $data);
    }

    public function delete(Request $req)
    {
        $data = [];
        $data['code'] = 200;
        $data['msg'] = 'Thành công';

        $MaViTri = $req->MaViTri;
        $_token = $req->_token;
        $check = DB::table('vi_tri_ship')
        ->where('MaViTri','=',$MaViTri)
        ->delete();

        if(!$check){
            $data['code'] = 500;
            $data['msg'] = 'Thất bại';
        }

        $response = response()->json($data);
        return $response;
    }

    public function status(Request $req)
    {
        $data = [];
        $data['code'] = 200;
        $data['msg'] = 'Thành công';

        $MaViTri = $req->MaViTri;
        $vi_tri = DB::table('vi_tri_ship')
        ->where('MaViTri','=',$MaViTri)
        ->first();

        $status = $vi_tri->Status;
        if($status == 0){
            $status = 1;
        }else{
            $status = 0;
        }

        DB::table('vi_tri_ship')
        ->where('MaViTri','=',$MaViTri)
        ->update([
            'Status'=> $status
        ]);

        $response = response()->json($data);
        return $response;
    }
}
