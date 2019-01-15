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
    public function GetAllProducts(){
        $products = Yii::$app->cache->get('products');
        if(!$products){
            $products = Products::find()->asArray()->all();
            Yii::$app->cache->set('products', $products, 60);
        }

        return $products;
    }
}