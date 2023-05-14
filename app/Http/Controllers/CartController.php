<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class CartController extends Controller
{
    public function cart(){
        $data = [];
        $data['title'] = 'Giỏ hàng';

        return view('clients.cart', $data);
    }

    public function html_cart_partial_1(){
        $data = [];
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $data['cart'] = $newCart;

        return view('clients.blocks.cart_partial_1', $data);
    }

    public function html_cart_partial(){
        $data = [];
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $data['order'] = $newCart;
        return view('clients.blocks.cart_partial',$data);
    }

    public function AddCart(Request $req){
        $data = [];
        $id = (int)request()->id;
        $quanty = (int)request()->quanty;
        $find_sach = DB::table('sach')
        ->select('MaSach','TenSach','AnhBia','TenNXB','GiaMoi')
        ->join('nha_xuat_ban', 'nha_xuat_ban.MaNXB', 'sach.MaNXB')
        ->where('sach.MaSach','=', $id)
        ->first();
        if($find_sach != null){
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->AddCart($find_sach, $id, $quanty);
            $req->session()->put('Cart',$newCart);

            $data['msg'] = "Sản phẩm vừa được thêm vào giỏ hàng.";
            $data['code'] = 200;
            $data['img'] = $find_sach->AnhBia;
            $data['TenSach'] = $find_sach->TenSach;
            $data['total'] = Session('Cart')->totalQuanty;
        }else{
            $data['msg'] = "Sản phẩm không tồn tại.";
            $data['code'] = 0;
        }
        
        $response = response()->json($data);
        return $response;
    }

    public function orderNow(Request $req){
        $data = [];
        $id = (int)request()->MaSach;
        $quanty = 1;
        $find_sach = DB::table('sach')
        ->select('MaSach','TenSach','AnhBia','TenNXB','GiaMoi')
        ->join('nha_xuat_ban', 'nha_xuat_ban.MaNXB', 'sach.MaNXB')
        ->where('sach.MaSach','=', $id)
        ->first();
        if($find_sach != null){
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->AddCart($find_sach, $id, $quanty);
            $req->session()->put('Cart',$newCart);

            $data['img'] = $find_sach->AnhBia;
            $data['TenSach'] = $find_sach->TenSach;
            $data['total'] = Session('Cart')->totalQuanty;
        }else{
            $data['msg'] = "Sản phẩm không tồn tại.";
            $data['code'] = 0;
            $response = response()->json($data);
            return $response;
        }
        return redirect('/payment_check');
        
    }


    public function InfoCart(){
        $data = [];
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $data['msg'] = "Thành công.";
        $data['code'] = 200;
        $data['total'] = $newCart->totalQuanty;
        $data['price'] = number_format($newCart->totalPrice, 0, ',', '.').'₫';
        
        $response = response()->json($data);
        return $response;
    }

    public function DeleteItemCart(Request $req){
        $data =[];
        $id = (int)request()->id;
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->DeleteItemCart($id);

        if(count($newCart->products)){
            $req->session()->put('Cart',$newCart);
        }else{
            $req->session()->forget('Cart');
        }

        $data['msg'] = "Sản phẩm vừa bị xóa khỏi giỏ hàng.";
        $data['code'] = 200;
        $response = response()->json($data);
        return  $response;
    }

    public function UpdateItemCart(Request $req){
        $data = [];
        $id = (int)request()->id;
        $quanty = (int)request()->quanty;
       
        $oldCart = Session('Cart') ? Session('Cart') : null;
        if($oldCart){
            $newCart = new Cart($oldCart);
            $newCart->UpdateItemCart($id, $quanty);
            $req->session()->put('Cart',$newCart);
    
            $data['msg'] = "Sản phẩm vừa được cập nhật vào giỏ hàng.";
            $data['code'] = 200;
        }else{
            $data['msg'] = "Giỏ hàng không tồn tại.";
            $data['code'] = 0;
        }
        
        $response = response()->json($data);
        return $response;
    }
}
