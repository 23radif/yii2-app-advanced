<?php


namespace backend\models;


use common\models\User;
use mohorev\file\UploadImageBehavior;

class UserEdit extends User
{
    public $avatar;

    public function behaviors()
    {
        return array_merge([
            'class' => UploadImageBehavior::class,
            'attribute' => 'avatar',
        ],
            parent::behaviors());
    }

    public function rules()
    {
        return array_merge(
            ['avatar', 'image', 'extensions' => ['jpg', 'png']],
            parent::rules());
    }
}