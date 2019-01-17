<?php
/**
 * Created by PhpStorm.
 * User: Angélika
 * Date: 16/01/2019
 * Time: 18:34
 */

namespace app\controllers;


use app\models\Products;
use yii\web\Controller;


class ProductController extends Controller
{
   public function actionIndex($name){
       $product = new Products();
       $product = $product->getOneProduct($name);
       return $this->render('index', compact('product'));
   }
}