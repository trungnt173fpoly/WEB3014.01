<?php 
// MVC
// Modelmode
// View
// Contronller
// include_once 'app/Models/Model.php';
// $model = new Model();
// var_dump($model->getConnection());
// include 'app/Models/Product.php';
use Dotenv\Dotenv;
use App\Models\Product;
session_start();
include_once 'vendor/autoload.php';
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
include_once 'routes/web.php';
// $pro = new Product();
// var_dump($pro->getAllProduct());

?>