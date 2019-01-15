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
        $products = $products->getAllProducts();
        return $this->render('index', compact('products'));
    }

    public function actionView($id){
        $products = new Products();
        $products = $products->getProductsCategories($id);
        return $this->render('view', compact('products'));
    }

    public function actionSearch(){
        $search = \Yii::$app->request->get('search');
        $products = new Products();
        $products = $products->getSearchResults($search);
        return $this->render('search', compact('products', 'search'));

    }

}