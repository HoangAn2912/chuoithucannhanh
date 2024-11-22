<?php
    include_once("models/mTiepNhanDonHang.php");
	include_once("../models/mketnoi.php");
    class controlDonHang {
      
        public function getAllDonHang (){
            $p = new modelDonHang();
			$kq = $p -> selectAllDonHang();
            if(mysqli_num_rows($kq) > 0){
				return $kq;
			}else{
				echo "<script>alert('Không có dữ liệu!')</script>";
			}
        }

		public function mUpdateTinhTrang($madh, $mattdh){
			$p = new ketnoi();
			$con = $p -> ketnoi();
            if($con -> connect_errno){
				return false;
			}else{
                $sql = "UPDATE donhang SET mattdh = $mattdh WHERE madh = $madh";
				$kq = mysqli_query($con, $sql);
				return $kq;
			}
        }

        public function cUpdateTinhTrang($madh, $mattdh){
			var_dump($madh, $mattdh);
			$p = new controlDonHang();
			return $p -> mUpdateTinhTrang($madh,$mattdh);
		}

		public function getTinhTrangOptions() {
			$p = new modelDonHang();
			return $p->selectTinhTrangOptions();
		}
        
    }
?>