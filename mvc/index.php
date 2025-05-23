<?php 
// MVC
// Modelmode
// View
// Contronller
// include_once 'app/Models/Model.php';
// $model = new Model();
// var_dump($model->getConnection());
include 'app/Models/Product.php';
$pro = new Product();
var_dump($pro->getAllProduct());

?>