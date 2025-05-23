<?php 
class Model{
    // Kết nối csdl
    private $host = "localhost"; //địa chỉ mysql server sẽ kết nối đến
    private $dbname="web3014.01"; //tên database sẽ kết nối đến
    private $username = "root"; //username để kết nối đến database 
    private $password = ""; // mật khẩu để kết nối đến database
    // Thuộc tính chứa kết nối CSDL
    private $pdo;
    // Thuộc tính chứa câu lệnh sql 
    private $sql;
    // Thuộc tính chứa kết quả thực hiện câu lệnh
    private $sta;
    // Dùng hàm khởi tạo 
    public function __construct(){
        $this->pdo = $this->getConnection();
    }
    // Hàm => Phương thức
    private function getConnection(){
        try{
            $conn = new PDO("mysql:host=$this->host; 
            dbname=$this->dbname;", 
            $this->username, 
            $this->password,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            ]
        );  
        // Code dùng đề test
            // if($conn){
            //     return "Kết nối thành công";
            // }
            return $conn;
            // kết nối đến database. $conn gọi là đối tượng kết nối
        }catch(PDOException $e){
            throw new Exception("Lỗi kết nối CSDL: ".
            $e->getMessage());
        }
    }
    // Nhận cậu lệnh sql
    protected function setSql($sql){
        $this->sql = $sql;
    }
    // Thực hiện câu lệnh sql
    protected function execute($option = []){
        try{
            $this->sta = $this->pdo->prepare($this->sql);
            if(!empty($option )){
                foreach($option  as $key => $value){
                     $this->sta->bindValue($key+1, $value);
                }
            }
            $this->sta->execute();
            return $this->sta;
        }catch(PDOException $e){
            throw new Exception("Lỗi thực hiện câu lệnh SQL: ".
            $e->getMessage());
        }
    }
    // Phương thức giúp truy vấn dữ liệu
    // Có nhiều bản ghi
    // Có 1 bản ghi
    // Đặt 2 hằng số dùng phân biệt 2 trạng thái của fetch
    const FETCH_ALL = "all";
    const Fetch_FIRST = "first";
    private function executeQuery($option = [], $fetchModel = self::FETCH_ALL){
        // Mặc định trạng thái truy vấn là lấy nhiều bản ghi
        $result = $this->execute($option);
        if(!$result){
            return false;
        }else{
            return $fetchModel ==  self::FETCH_ALL
            ? $result->fetchAll(PDO::FETCH_OBJ)
            : $result->fetch(PDO::FETCH_OBJ);
        }
    }
    protected function all($option = []){
        return $this->executeQuery($option);
    }
    protected function first($option = []){
        return $this->executeQuery($option, self::Fetch_FIRST);
    }
}
?>