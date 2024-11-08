<?php
    include_once("mketnoi.php");
    class modelBan {
       
        public function selectAllBan (){
            $p = new ketnoi();
			$con = $p -> ketnoi();
            if($con -> connect_errno){
				return false;
			}else{
                $sql = "select * from ban";

				$kq = mysqli_query($con, $sql);
				return $kq;
			}
        }

        public function selectAllThoiGianGio (){
            $p = new ketnoi();
			$con = $p -> ketnoi();
            if($con -> connect_errno){
				return false;
			}else{
                $sql = "select * from time_gio";

				$kq = mysqli_query($con, $sql);
				return $kq;
			}
        }

    }
?>