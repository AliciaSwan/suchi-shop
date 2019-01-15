<?php

namespace app\widgets;

use app\models\Category;
use yii\base\Widget;

class MenuWidget extends Widget
{
    public $data;
    public function run(){
        $this->data = new Category();
        $this->data = $this->data->getCategories();
        return $this->data['0']['cat_name'];

    }

}