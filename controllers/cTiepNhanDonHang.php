<?php
    include_once("models/mTiepNhanDonHang.php");
    class controlDonHang {
      
        public function getAllDonHang (){
            $p = new modelDonHang();
			$kq = $p -> selectAllDonHang();
            if(mysqli_num_rows($kq) > 0){
				return $kq;
			}else{
				echo "<script>alert('Khong co du lieu!')</script>";
			}
        }

        public function cUpdateTinhTrang($madh, $mattdh){
			$o = new modelDonHang();
			$kq = $o -> mUpdateTinhTrang($madh,$mattdh);
			return $kq;
		}

        
    }
?>