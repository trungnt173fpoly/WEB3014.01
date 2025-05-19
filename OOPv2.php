<?php 
// Tính chất của OOP
// 1. Tính đóng gói
// Tính đóng gói là "đóng gói"  thuộc tính và phương thức của đối tượng
// (hoặc class) thông qua việc giới hạn quyền truy cập
// Giới hạn quyền truy cập thông qua các từ khóa: public, private, protected
// - public: có thể truy cập từ bất kỳ đâu
// - private: chỉ có thể truy cập trong class đó
// - protected: chỉ có thể truy cập trong class đó và các class con
// ví dụ:
class SinhVien{
    // public $hoTen;
    private $hoTen;
    private $maSV;
    // protected $namSinh;
    private $namSinh;
    // Truy cập và cấp gia trị cho thuộc tính thông các phương thức
    // 1: Thông các phương thức tự định nghĩa (Tự viết)
    // Nhập vào họ tên
    public function nhapHoTen($hoTen){
        $this->hoTen = $hoTen;
    }
    // Hiển thị họ tên
    public function hienThiHoTen(){
        return $this->hoTen;
    }
    // 2: Thông qua các phương thức có sẵn của class
    // Hàm __set và __get
    // Hàm __set: được gọi khi gán giá trị cho thuộc tính không tồn tại
    public function __set($tenThuocTinh, $giaTriNhapVao){
        $this->$tenThuocTinh = $giaTriNhapVao;
    }
    // Hàm __get: được gọi khi truy cập vào thuộc tính không tồn tại
    public function __get($tenThuocTinh){
        return $this->$tenThuocTinh;
    }
}
// Khởi tạo đối tượng
$sv = new SinhVien();
// Gán giá trị cho thuộc tính
// $sv->hoTen = "Nguyễn A"; // public => có thể truy cập từ bất kỳ đâu
//$sv->maSV = "123456"; // private => không thể truy cập từ bên ngoài
//$sv->namSinh = "2000"; // protected => không thể truy cập từ bên ngoài
// Nếu bây giờ tất cả thuộc tính đều ở trạng thái private thì làm sao để có thể cập nhập
// giá trị cho thuộc tính đó
// => Cách 1: Tạo phương thức để gán giá trị cho thuộc tính
//$sv->nhapHoTen("Nguyễn Văn A"); // Gán giá trị cho thuộc tính hoTen
//echo $sv->hienThiHoTen(); // Hiển thị giá trị của thuộc tính hoTen
// => Cách 2: Tạo phương thức để lấy giá trị của thuộc tính
$sv->maSV = "123456"; // Gán giá trị cho thuộc tính maSV
echo $sv->maSV; // Hiển thị giá trị của thuộc tính maSV
// $sv->namS = 1223;
// 2. Tính kế thừa
// Tính kế thừa là cho phép một class (lớp) có thể kế thừa (sử dụng lại) thuộc 
// tính và phương thức của 1 class khác đã định nghĩa. Lớp được kế thừa thì gọi
// là lớp cha (class cha) còn lớp kế thừa thì gọi là lớp con (class con)
// Trong php thì chỉ có đơn kế thừa(tức là 1 class chỉ kế thừa từ 1 class)
// Ví dụ:
// class cha
class ConNguoi{
    public $hoTen;
    protected $namSinh;
    private $scccd;
    public function di(){
        return "Đi bộ";
    }

}
// Class con
class SinhVien1 extends ConNguoi{
    public $maSV;
    public function hoc(){
        return $this->hoTen+$this->namSinh;
    }
}
// Trait
// Trait là một cơ chế cho phép bạn chia sẻ mã giữa các lớp mà không cần kế thừa
// Ví dụ:
trait PhepCong{
    public function congHaiSo($a, $b){
        return $a + $b;
    }
}
trait PhepTru{
    public function truHaiSo($a, $b){
        return $a - $b;
    }
}
class ToanHoc{
    use PhepCong, PhepTru; // Sử dụng trait
    public function tinhToan($a, $b){
        return $this->congHaiSo($a, $b) + $this->truHaiSo($a, $b);
    }
}
// 3. Tính đa hình
// 4. Tính trừu tượng
?>