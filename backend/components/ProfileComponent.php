<?php


namespace backend\components;


use backend\models\UserReg;
use yii\base\Component;


class ProfileComponent extends Component
{
    public function createProfile(UserReg &$user): bool
    {
        if(!$user->validate()){
            return false;
        }



        return true;
    }

    

}