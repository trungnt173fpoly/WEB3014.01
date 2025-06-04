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
}
?>