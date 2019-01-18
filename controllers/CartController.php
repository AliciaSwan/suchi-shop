<?php
/**
 * Created by PhpStorm.
 * User: Angélika
 * Date: 16/01/2019
 * Time: 20:42
 */

namespace app\controllers;


use app\models\Order;
use app\models\Products;
use yii\web\Controller;
use app\models\Cart;
use Yii;

class CartController extends Controller
{
    public function actionOrder(){
        $session = Yii::$app->session;
        $session->open();
        $order = new Order();
        if($order ->load(Yii::$app->request->post())){
            $order->date = date('Y-m-d H:m:s');
            $order->sum = $session['cart.totalSum'];
            if($order->save()){
                Yii::$app->mailer->compose()
                    ->setFrom(['info@suchi-shop.ru' => 'Test Test'])
                    ->setTo( 'admin@suchi-shop.ru')
                    ->setSubject('Ваш заказ принят')
                    ->send();
                $session->remove('cart');
                $session->remove('cart.totalQuantity');
                $session->remove('cart.totalSum');
                return $this->render('succes');
            }
        }
        $this->layout = 'empty-layout';
        return $this->render('order', compact( 'session', 'order'));
    }
    public function actionDelete($id){
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalcCart($id);
        return $this->renderPartial('cart', compact( 'session'));
    }
    public function actionClear(){
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.totalQuantity');
        $session->remove('cart.totalSum');
        return $this->renderPartial('cart', compact( 'session'));
    }

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