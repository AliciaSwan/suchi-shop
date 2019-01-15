<?php
/**
 * Created by PhpStorm.
 * User: Angélika
 * Date: 15/01/2019
 * Time: 10:13
 */

namespace app\controllers;

use app\models\Products;
use yii\web\Controller;

class CategoryController extends Controller
{
    public function actionIndex(){
        $products = new Products();
        $products = $products->GetAllProducts();
        return $this->render('index', compact('products'));
    }

}