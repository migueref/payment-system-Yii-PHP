<?php
namespace backend\models;
/**
  *
  *
  *
  *@Miguel Ángel Rea Flores
  */
class Graphics{
  public function getDb(){
    return Yii::$app->db;
  }
  public function getData(){
    //Here we need to create a query for statistics to put into a graph
  }
}
