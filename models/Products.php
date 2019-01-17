<?php
/**
 * Created by PhpStorm.
 * User: Angélika
 * Date: 15/01/2019
 * Time: 10:27
 */

namespace app\models;

use yii\db\ActiveRecord;
use Yii;


class Products extends ActiveRecord
{

    public static function tableName()
    {
        return 'products';
    }
    public function getAllProducts(){
        $products = Yii::$app->cache->get('products');
        if(!$products){
            $products = Products::find()->asArray()->all();
            Yii::$app->cache->set('products', $products, 60);
        }

        return $products;
    }
    public function getProductsCategories($id){
        $catProducts = Yii::$app->cache->get("catProducts{$id}");
        if(!$catProducts){
            $catProducts = Products::find()->where(['category'=>$id])->asArray()->all();
            Yii::$app->cache->set("catProducts{$id}", $catProducts, 20);
        }
        return $catProducts;
    }

    public function getOneProduct($name){
        return Products::find()->where(['link_name'=>$name])->one();
    }

    public function getSearchResults($search){
        $searchResults = Products::find()->where(['like', 'name', $search])->asArray()->all();
        return $searchResults;
    }


}