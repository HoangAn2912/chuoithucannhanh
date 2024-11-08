<?php
    include_once("mketnoi.php");
    class modelDonHang {
       
        public function selectAllDonHang (){
            $p = new ketnoi();
			$con = $p -> ketnoi();
            if($con -> connect_errno){
				return false;
			}else{
                $sql = "SELECT *
                FROM donhang";
				$kq = mysqli_query($con, $sql);
				return $kq;
			}
        }

        public function mUpdateTinhTrang($madh,$mattdh){
            $p = new ketnoi();
			$con = $p -> ketnoi();
            $sql = "Update donhang set mattdh = $mattdh where madh = $madh";	
            $kq = mysqli_query($con, $sql);
            return $kq;
        }
    }
?>