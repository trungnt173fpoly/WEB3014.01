<?php 
// trong php luôn phải khai báo class trước
// đối tượng (thuộc tính và phường thức)
// khai báo class
// CT: class TenClass{Khối lệnh}
// Tên class phải viết hoa chữ cái đầu tiên của mỗi từ
// ví dụ:
class SinhVien{
    // Thuộc tính
    // CT khai báo thuộc tính: phạm_vi_truy_cập $tenThuocTinh; => biến của class 
    // phạm vi truy cập: public, private, protected
    // họ tên, mã sinh viên, năm sinh, địa chỉ,...
    public $hoTen;
    public $maSV;
    public $namSinh;
    // Khai báo thêm 5 thuộc tính của sinh viên
    // Phương thức => hàm trong class
    // CT: phạm_vi_truy_cập function tenPhuongThuc(tham_số){khối lệnh}
    // lưu ý: Tham số nếu cần dùng truyền dự liệu từ bên ngoài vào
    // Loại 1: Phường thức không tham số và không trả về giá trị
    // => với những pt không trả thì kết thúc khối lệnh sẽ không có return
    // Ví dụ:
    public function diChuyen(){ // Nhận biết hàm có chứa tham số hay không
        // nhìn () sau tên hàm nếu có tham số thì có tham số
        echo "Sinh viên đang di chuyển";
    }
    // Loại 2: Phường thức không tham số và có trả về giá trị
    public function hienThiTen(){
        return $this->hoTen;
        // Trong class muốn truy cập thuộc tính hay phương thức thì dùng $this
        // Với thuộc tính là: $this->tenThuocTinh
        // Với phương thức là: $this->tenPhuongThuc()
    }
    // Loại 3: Phường thức có tham số và không trả về giá trị
    public function nhapTen($hoTen){
        // Lưu ý: Với tên hàm hoặc tên biến: Viết thường từ đầu tiên và 
        // viết hoa chữ cái đầu tiên của các từ tiếp theo
        // Ví dụ: $tenSinhVien, $tenMonHoc
        $this->hoTen = $hoTen; // $this->hoTen => thuộc tính
        // $hoTen => tham số
    }
    // Loại 4: Phường thức có tham số và có trả về giá trị
    public function nhapMaSV($maSV){
        $this->maSV = $maSV;
        return $this->maSV;
    }
}
// Khởi tạo đối tượng
// CT: $tenBien = new TenClass();
// Ví dụ:
$sv = new SinhVien(); // Khởi tạo đối tượng
// Gán giá trị cho thuộc tính
// CT: $tenBien->tenThuocTinh = giaTri; 
$sv->hoTen = "Nguyễn A";
// Tương tự hay gán giá trị cho tất cả các thuộc tính còn lại
// Gọi phương thức
// Loại 1: Không tham số và không trả về giá trị
$sv->diChuyen(); // Vì không có tham số nên không cần truyền gì vào
// Vì không có trả về nên không cần gán cho biến
// Loại 2: Không tham số và có trả về giá trị
$ten = $sv->hienThiTen(); // vì có trả về nên cần gán cho biến
// Loại 3: Có tham số và không trả về giá trị
$sv->nhapTen("Nguyễn Văn A"); // vì có tham số nên cần truyền vào
//Vì không có trả về nên không cần gán cho biến
// Loại 4: Có tham số và có trả về giá trị
$maSV = $sv->nhapMaSV("123456"); // vì có tham số nên cần truyền vào
// Vì có trả về nên cần gán cho biến
?>