<?php


namespace backend\models;


use backend\validators\PasswordValidator;
use common\models\User;
use Yii;

class UserReg extends User
{
    private $password;

    public function getPassword(){
        return $this->password;
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function rules()
    {
        $rules = parent::rules();
        return array_merge([
            ['password', 'required'],
            ['password', PasswordValidator::class]
        ], $rules);
    }
}