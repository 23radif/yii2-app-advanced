<?php


namespace backend\validators;


use yii\validators\Validator;

class PasswordValidator extends Validator
{

    private $stopPassword = ['123456', 'admin', 'password'];
    public function validateAttribute($model, $attribute)
    {
        if(in_array($model->$attribute, $this->stopPassword)){
            $model->addError($attribute, 'Содержимое атрибута находится в черном списке');
        }
    }
}