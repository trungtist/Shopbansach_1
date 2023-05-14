<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EvaluateController extends Controller
{
    public function evaluate(){
        $data = [];
        $data['code'] = 200;
        $data['msg'] = 'Thành công';

        $id = request()->id;
        $type = request()->type;
        $lst_type = ['0','1', 0, 1];

        if(in_array($type, $lst_type)){
            $type = (int)$type;
        }else{
            $data['code'] = 500;
            $data['msg'] = 'Thất bại';
            $response = response()->json($data);
            return $response;
        }

        if($type == 0){
            $count_prod = DB::table('sach')
            ->where('MaSach','=',$id)
            ->count();
        }else{
            $count_prod = DB::table('bai_viet')
            ->where('id','=',$id)
            ->count();
        }

        if($count_prod==1){
            $comment = request()->comment;
            $name = request()->name;
            $email = request()->email;
            
            if(!$comment || !$name || !$email){
                $data['code'] = 500;
                $data['msg'] = 'Thất bại';
            }else{
                $nguoi_dang = DB::table('nguoi_danh_gia')
                ->where('Email','=',$email)
                ->first();
                if($nguoi_dang){
                    $MaND = $nguoi_dang->MaND;
                }else{
                    $MaND = time();
                    $array_image = [
                        'comment.png',
                        'comment1.png',
                        'comment2.jpg',
                        'comment3.png',
                        'comment4.jpg',
                        'comment5.jpg',
                        'comment6.jpg'
                    ];
                    $random_number = random_int(0, 5);
                    $AnhNen = $array_image[$random_number];
                    DB::table('nguoi_danh_gia')
                    ->insert([
                        'MaND'=> $MaND,
                        'HoTen'=>$name,
                        'Email'=>$email,
                        'AnhNen'=>$AnhNen,
                    ]);
                }
                $MaDG = time();
                $NgayDang = date("Y-m-d H:i:s");
                DB::table('danh_gia')
                ->insert([
                    'MaDG'=>$MaDG,
                    'id_prod' => $id,
                    'MaND'=>$MaND,
                    'NoiDung' => $comment,
                    'NgayDang' => $NgayDang,
                    'type' => $type
                ]);
            }
        }else{
            $data['code'] = 500;
            $data['msg'] = 'Thất bại';
        }

        $response = response()->json($data);
        return $response;
    }

    public function get_evaluate(Request $req){
        $data = [];
        $data['code'] = 200;
        $data['msg'] = 'Thành công';
        $type = (int)$req->type;
        $id = $req->id;
        $evaluates = DB::table('danh_gia')
        ->join('nguoi_danh_gia','nguoi_danh_gia.MaND','danh_gia.MaND')
        ->where('id_prod','=',$id)
        ->where('type','=', $type)
        ->orderBy('NgayDang', 'DESC')
        ->get();

        $data['evaluates'] = $evaluates;
        $response = response()->json($data);
        return $response;
    }

    public function Delete_evaluate(){
        $data = [];
        $data['code'] = 200;
        $data['msg'] = 'Thành công';

        $email = request()->email;
        $nguoidg = DB::table('nguoi_danh_gia')
        ->where('Email','=',$email)->first();
        
        if($nguoidg){
            $MaDG = request()->MaDG;
            $MaND = $nguoidg->MaND;
            $count_danhgia = DB::table('danh_gia')
            ->where('MaDG','=',$MaDG)
            ->where('MaND','=',$MaND)
            ->count();
            if($count_danhgia==0){
                $data['code'] = 500;
                $data['msg'] = 'Email không chính xác';
            }else{
                DB::table('danh_gia')
                ->where('MaDG', '=', $MaDG)
                ->delete();
            }
        }else{
            $data['code'] = 500;
            $data['msg'] = 'Thất bại';
        }

        $response = response()->json($data);
        return $response;
    }
}
