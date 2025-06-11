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
    // Thêm
    public function addProduct($id, $name, $price, $image, $quantity, $status){
        $sql = "INSERT INTO $this->table(`id`, `name`, `price`, `image`, `quantity`, `status`) 
        VALUES (?,?,?,?,?,?)"; // Câu lệnh Sql
        $this->conn->setSql( $sql);
        return $this->conn->execute([$id, $name, $price, $image, $quantity, $status]);
    }
    // Xóa
    public function deleteProduct($id){
        $sql = "DELETE FROM $this->table WHERE id = ?"; // Câu lệnh Sql
        $this->conn->setSql( $sql);
        return $this->conn->execute([$id]);
    }
    // Lấy dữ liệu theo id
    public function getIDProduct($id){
        $sql = "SELECT * FROM $this->table WHERE id = ?"; // Câu lệnh Sql
        $this->conn->setSql( $sql);
        return $this->conn->first([$id]);
    }
    public function updateProduct($name, $price, $image, $quantity, $status, $id){
        $sql = "UPDATE $this->table SET `name`= ?,`price`= ?,
        `image`= ?,`quantity`= ?,`status`= ? WHERE `id`= ?"; // Câu lệnh Sql
        $this->conn->setSql( $sql);
        return $this->conn->execute([$name, $price, $image, $quantity, $status, $id]);
    }
}
?>