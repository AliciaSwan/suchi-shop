<?php

namespace app\models;
use yii\db\ActiveRecord;

class Cart extends ActiveRecord {


    public function addToCart($product){
        if(isset($_SESSION['cart'][$product->id])){
            $_SESSION['cart'][$product->id]['productQuantity']+=1;
        }else{
            $_SESSION['cart'][$product->id] = [
                'productQuantity' => 1,
                'name' => $product['name'],
                'price' => $product['price'],
                'img' => $product['img'],
            ];
        }
        $_SESSION['cart.totalQuantity'] = isset($_SESSION['cart.totalQuantity']) ? $_SESSION['cart.totalQuantity'] + 1 : 1;
        $_SESSION['cart.totalSum'] = isset($_SESSION['cart.totalSum']) ? $_SESSION['cart.totalSum'] + $product->price : $product->price;

    }
}