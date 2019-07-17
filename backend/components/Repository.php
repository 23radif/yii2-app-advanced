<?php


namespace backend\components;


interface Repository
{
public function save($model);

public function update($model);

public function findById($id);
}