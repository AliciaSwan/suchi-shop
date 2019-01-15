<?php
/**
 * Created by PhpStorm.
 * User: Angélika
 * Date: 15/01/2019
 * Time: 11:39
 */

namespace app\models;

use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
   public static function tableName()
   {
       return 'category';
   }

   public function getCategories(){
       return Category::find()->asArray()->all();
   }

}