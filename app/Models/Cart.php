<?php

namespace App\Models;

class Cart
{
    public $products = null;
    public $totalPrice = 0;
    public $totalQuanty = 0;

    public function __construct($cart){
        if($cart){
            $this->products = $cart->products;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuanty = $cart->totalQuanty;
        }
    }

    public function AddCart($product, $id, $quanty){
        if(empty($quanty)){
            $quanty = 1;
        }

        $newProduct = ['quanty'=>0, 'price'=> $product->GiaMoi, 'productInfo'=> $product];
        if($this->products != null){
            if(array_key_exists($id, $this->products)){
                $newProduct = $this->products[$id];
            }
        }
        $newProduct['quanty'] += $quanty;
        $newProduct['price']  = $newProduct['quanty'] * $product->GiaMoi;
        $this->products[$id] = $newProduct;
        $this->totalPrice += $quanty * $product->GiaMoi;
        $this->totalQuanty += $quanty;
    }

    public function DeleteItemCart($id){
        $this->totalPrice -= $this->products[$id]['price'];
        $this->totalQuanty -= $this->products[$id]['quanty'];
        unset($this->products[$id]);
    }

    public function UpdateItemCart($id, $quanty){
        $this->totalPrice -= $this->products[$id]['price'];
        $this->totalQuanty -= $this->products[$id]['quanty'];

        $this->products[$id]['price'] = $quanty * $this->products[$id]['productInfo']->GiaMoi;
        $this->products[$id]['quanty'] = $quanty;
        $this->totalPrice += $this->products[$id]['price'];
        $this->totalQuanty += $this->products[$id]['quanty'];
    }
}
