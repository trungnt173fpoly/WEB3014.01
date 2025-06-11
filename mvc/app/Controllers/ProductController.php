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
        // var_dump($_FILES);
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
        if($_FILES['image']['error'] != 0 || $_FILES['image']['size'] == 0){
            $errors[] = "Bạn cần phải chọn ảnh gửi lên hoặc lỗi trong quá trình gửi ảnh";
        }
        // Tự viết validate ảnh
        if(count($errors) > 0){
            flash('errors', $errors, 'product/create');
        }else{
            // Upload hình ảnh
            // Tạo đường dẫn
            $tagetDir = __DIR__.'/../../storage/uploads/';
            $newNameFile = time()."_".$_FILES['image']['name'];
            $imagePath = $tagetDir.$newNameFile;
            move_uploaded_file($_FILES['image']['tmp_name'], 
             $imagePath);
            if(!file_exists( $imagePath)){
                $errors[] = "Lỗi ảnh k tồn tại";
                flash('errors', $errors, 'product/create');
            }else{
                $modePro = new Product();
                if($modePro->addProduct(null, 
                $_POST['name'],
                $_POST['price'],
                $newNameFile,
                $_POST['quantity'],
                $_POST['status'])){
                flash('success', "Thêm thành công", 'product/create');
                }else{
                     flash('errors', "Thêm thất bại", 'product/create');
                }
            }
        }
    }
    public function delete($id){
        // validate xóa 
        // Xóa cứng
        $modelPro = new Product();
        if($modelPro->deleteProduct($id)){
            flash('success', "Xóa thành công", 'product');
        }
    }
    // Sửa
     // Dùng hiển thị form
    public function edit($id){
        $modelPro = new Product();
        $product = $modelPro->getIDProduct($id);
        return $this->views('product.edit', compact('product'));
    }
    // Dùng để xử lý
    public function update($id){
        // Check dữ liệu gửi lên thông  qua form
        // var_dump($_POST);
        // var_dump($_FILES);
        // die();
        // Validate
        $modelPro = new Product();
        $product = $modelPro->getIDProduct($id);
        $errors = [];
        if(empty($_POST['name'])){
            $errors[] = "Bạn cần phải nhập tên sản phẩm";
        }
        if(empty($_POST['price'])){
            $errors[] = "Bạn cần phải nhập giá sản phẩm";
        }
        // var_dump($errors);
        // Tương tự với số lượng
        if($_FILES['image']['error'] != 0 || $_FILES['image']['size'] == 0){
            $newNameFile = $product->image;
        }else{
            // Upload hình ảnh
            // Tạo đường dẫn
            $tagetDir = __DIR__.'/../../storage/uploads/';
            $newNameFile = time()."_".$_FILES['image']['name'];
            $imagePath = $tagetDir.$newNameFile;
            move_uploaded_file($_FILES['image']['tmp_name'], 
             $imagePath);
              if(!file_exists( $imagePath)){
                $errors[] = "Lỗi ảnh k tồn tại";
                flash('errors', $errors, 'product/edit/'.$id);
            }
            // var_dump($_FILES);
        }
        // Tự viết validate ảnh
        if(count($errors) > 0){
            flash('errors', $errors, 'product/create');
        }else{
                $modePro = new Product();
                if($modePro->updateProduct(
                $_POST['name'],
                $_POST['price'],
                $newNameFile,
                $_POST['quantity'],
                $_POST['status'],
                $id)){
                flash('success', "Chỉnh sửa thành công", 'product/edit/'.$id);
                }else{
                     flash('errors', "Chỉnh sửa thất bại", 'product/edit/'.$id);
                }
        }
    }
}
?>