<?php 
namespace App\Controllers;

use App\Models\Product;
class ProductController extends Controller {
    // Hiển thị danh sách
    public function index(){
        $modelPro = new Product();
        // var_dump( $modelPro->getAllProduct());
        // echo "123456789";
        $products = $modelPro->getAllProduct();
        return $this->views('product.list', 
        compact('products')
    );
    }
    // 2 PT
    // Dùng hiển thị form
    public function create(){
        return $this->views('product.add');
    }
    // Dùng để xử lý
    public function store(){
        // Check dữ liệu gửi lên thông  qua form
        // var_dump($_POST);
        var_dump($_FILES);
        // Validate
        $errors = [];
        if(empty($_POST['name'])){
            $errors[] = "Bạn cần phải nhập tên sản phẩm";
        }
        if(empty($_POST['price'])){
            $errors[] = "Bạn cần phải nhập giá sản phẩm";
        }
        // var_dump($errors);
        // Tương tự với số lượng
        if($_FILES['error'] !== 0 && $_FILES['size'] == 0){
            $errors[] = "Bạn cần phải chọn ảnh gửi lên hoặc lỗi trong quá trình gửi ảnh";
        }
        // Tự viết validate ảnh
        if(count($errors) > 0){
            flash('errors', $errors, 'product/create');
        }else{
            
        }
    }
}
?>