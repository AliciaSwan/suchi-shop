<?php
/**
 * Created by PhpStorm.
 * User: Angélika
 * Date: 16/01/2019
 * Time: 20:42
 */

namespace app\controllers;


use app\models\Products;
use yii\web\Controller;
use app\models\Cart;
use Yii;

class CartController extends Controller
{
    public  function actionOpen() {
        $session = Yii::$app->session;
        $session->open();
//        $session->remove('cart');
//        $session->remove('cart.totalQuantity');
//        $session->remove('cart.totalSum');
        return $this->renderPartial('cart', compact( 'session'));
    }
   public function actionAdd($name){
       $product = new Products();
       $product = $product->getOneProduct($name);
       $session = Yii::$app->session;
       $session->open();
//       $session->remove('cart');
       $cart = new Cart();
       $cart->addToCart($product);
       return $this->renderPartial('cart', compact('product', 'session'));
   }
}