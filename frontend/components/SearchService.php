<?php


namespace frontend\components;


use yii\helpers\ArrayHelper;

class SearchService
{
    private $data = ['pert' => '1', 'Nikolay' => 'Zatonski', 'Alex' => 'Man'];

    public function find($name)/*:?string*/ {

        return ArrayHelper::getValue($this->data, $name);
    }
}