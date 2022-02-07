<?php 

class Controller  
{

  // untuk mengelola view
  public function view($view, $data = [])
  {
    require_once '../app/views/' . $view . '.php'; //memanggil view yang sesuai
  }

  // untuk mengelola model
  public function model($model)
  {
    require_once '../app/models/' . $model . '.php'; // memanggil file model
    return new $model;
  }
}
