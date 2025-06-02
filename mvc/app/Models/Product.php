<?php 
// include 'Model.php';
namespace App\Models;
use App\Models\Model;
class Product extends Model{
    protected $table = "products";
    private $conn;
    // Kết nối csdl
    public function __construct(){
        $this->conn = new Model();
    }
    // Truy vấn lấy tất dữ liệu trong bảng products
    public function getAllProduct(){
        $sql = "SELECT * FROM $this->table"; // Câu lệnh Sql
        $this->conn->setSql( $sql);
        return $this->conn->all();
    }
}
?>