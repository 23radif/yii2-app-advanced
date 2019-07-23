<?php


namespace backend\components;


class ProfileRepositoryMysql implements Repository
{

    public function save($model):bool
    {
        if($model->save()){
            return true;
        } else {
            return false;
        }
    }

    public function update($model)
    {
        // TODO: Implement update() method.
    }

    public function findById($id)
    {
        // TODO: Implement findById() method.
    }
}