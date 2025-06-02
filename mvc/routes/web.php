<?php 
use Bramus\Router\Router;
$router = new Router();
// chỉ dùng 2 phương thức
// Get -> hiển thi (danh sach, form)
// Post -> Xử lý thêm, sửa, xóa,...
// demo
$router->get('/danh-bai', function(){
    echo "2345678910JQKA";
});
$router->run(); // Nằm ở cuối cùng
?>