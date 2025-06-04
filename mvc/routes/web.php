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
$router->get('/product', ProductController::class.'@index');
$router->run(); // Nằm ở cuối cùng
?>