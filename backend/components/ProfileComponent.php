<?php


namespace backend\components;


use backend\models\UserReg;
use yii\base\Component;


class ProfileComponent extends Component
{
    /** @var Repository */
    public $repository;

    public function createProfile(UserReg &$user): bool
    {
        $user->auth_key = $this->genAuthKey();
        if (!$user->validate()) {
            return false;
        }

        if (!$this->repository->save($user)) {
            return false;
        };

        return true;
    }

    private function genAuthKey(): string
    {
        return \Yii::$app->security->generateRandomString();
    }

}