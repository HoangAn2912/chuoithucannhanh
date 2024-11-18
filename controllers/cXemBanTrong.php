<?php
    include_once(__DIR__ . "/../models/mXemBanTrong.php");

    class controlBan {
      
        public function getAllBan ($mach){
            $p = new modelBan();
			$kq = $p -> selectAllBan($mach);
            if(mysqli_num_rows($kq) > 0){
				return $kq;
			}else{
				echo "<script>alert('Khong co du lieu!')</script>";
			}
        }

       // Phương thức cập nhật trạng thái bàn
   // Phương thức cập nhật trạng thái bàn
   public function updateTrangThaiBan($maban, $trangthai) {
    $model = new modelBan();
    $result = $model->updateTrangThaiBan($maban, $trangthai);
    return $result;
}
    }
?>