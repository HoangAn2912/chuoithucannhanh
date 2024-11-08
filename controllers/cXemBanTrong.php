<?php
    include_once("models/mXemBanTrong.php");
    class controlBan {
      
        public function getAllBan (){
            $p = new modelBan();
			$kq = $p -> selectAllBan();
            if(mysqli_num_rows($kq) > 0){
				return $kq;
			}else{
				echo "<script>alert('Khong co du lieu!')</script>";
			}
        }

        public function getAllThoiGianGio (){
            $p = new modelBan();
			$kq = $p -> selectAllThoiGianGio();
            if(mysqli_num_rows($kq) > 0){
				return $kq;
			}else{
				echo "<script>alert('Khong co du lieu!')</script>";
			}
        }
    }
?>