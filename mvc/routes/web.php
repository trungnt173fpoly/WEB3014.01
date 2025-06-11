<?php 
use Bramus\Router\Router;
use App\Controllers\ProductController;
$router = new Router();
// chỉ dùng 2 phương thức
// Get -> hiển thi (danh sach, form)
// Post -> Xử lý thêm, sửa, xóa,...
// demo
$router->get('/danh-bai', function(){
    echo "2345678910JQKA";
});
// Ct: $router->phương_thức('đường dẫn', Tên_class::class.'@tên_phương thức');
// Phương thức: get/post
// Danh sách
$router->get('/product', ProductController::class.'@index');
// Thêm
// Hiện thị form
$router->get('/product/create', ProductController::class.'@create');
// Xử lý thêm
$router->post('/product/create', ProductController::class.'@store');
// Xóa
// Hiện thị form
$router->get('/product/delete/{id}', ProductController::class.'@delete');
// Sửa
// Hiện thị form
$router->get('/product/edit/{id}', ProductController::class.'@edit');
// Xử lý sửa
$router->post('/product/edit/{id}', ProductController::class.'@update');
$router->run(); // Nằm ở cuối cùng
?>