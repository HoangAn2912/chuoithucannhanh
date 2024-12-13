<?php
    include_once("mketnoi.php");
    class modelQuanLyKhachHang {
       
        public function selectAllKhachHang (){
            $p = new ketnoi();
			$con = $p -> ketnoi();
            if($con -> connect_errno){
				return false;
			}else{
                $sql = "SELECT * FROM khachhang 
						WHERE email IS NOT NULL AND matkhau IS NOT NULL 
						ORDER BY makh DESC
						LIMIT 10;
						";
				$kq = mysqli_query($con, $sql);
				return $kq;
			}
        }

        public function selectAllKhachHangTheoTen($tennd){
			$p = new ketnoi();
			$con = $p->ketnoi();
			if ($con->connect_errno) {
				return false;
			} else {
				$sql = "SELECT * FROM khachhang WHERE tennd LIKE N'%$tennd%'";
				$kq = mysqli_query($con, $sql);
				return $kq;
			}
		}
		
		public function selectMotKhachHang($makh) {
			$p = new ketnoi();
			$con = $p->ketnoi();  
		
			if ($con->connect_errno) {
				return false;
			} else {
				$sql = "SELECT * FROM khachhang WHERE makh = ?";
				if ($stmt = $con->prepare($sql)) {
					$stmt->bind_param("i", $makh); 
					$stmt->execute();
		
					$result = $stmt->get_result();
					if ($result->num_rows > 0) {
						return $result;
					} else {
						return false;
					}
				} else {
					return false;
				}
			}
		}
		

        public function mUpdateKhachHang($makh, $tennd, $ngaysinh, $gioitinh, $sodienthoai, $email, $diachi, $matkhau){
			$p = new ketnoi();
			$con = $p->ketnoi();
			$matkhau = md5($matkhau);
			
			if ($con->connect_errno) {
				return false;
			} else {
				// Kiểm tra xem email đã tồn tại trong bảng nhưng không thuộc khách hàng hiện tại
				$sqlCheckEmail = "SELECT * FROM khachhang WHERE email = '$email' AND makh != $makh";
				$resultCheckEmail = mysqli_query($con, $sqlCheckEmail);
		
				if (mysqli_num_rows($resultCheckEmail) > 0) {
					// Nếu email đã tồn tại, không cho phép sửa
					return "Email đã tồn tại!";
				} else {
					// Thực hiện cập nhật nếu email không trùng lặp
					$sql = "UPDATE khachhang 
							SET tennd = '$tennd', 
								ngaysinh = '$ngaysinh', 
								gioitinh = $gioitinh, 
								sodienthoai = '$sodienthoai', 
								email = '$email', 
								diachi = '$diachi' 
							WHERE makh = $makh";
					
					$kq = mysqli_query($con, $sql);
					return $kq;
				}
			}
		}
		

		public function checkEmailTrungLap($email) {
			$p = new ketnoi();
			$con = $p -> ketnoi();
			$sql = "SELECT * FROM khachhang WHERE email = '$email'";
			$result = mysqli_query($con, $sql);
			if (mysqli_num_rows($result) > 0) {
				return true; 
			}
			return false; 
		}
		
        public function mInsertKhachHang($tennd, $ngaysinh, $gioitinh, $sodienthoai, $email, $diachi, $matkhau){
            $p = new ketnoi();
			$con = $p -> ketnoi();
            $matkhau = md5($matkhau);
			if($con -> connect_errno){
				return false;
			}else{
				$sql = "INSERT INTO khachhang (tennd, ngaysinh, gioitinh, sodienthoai, email, diachi, matkhau, mavaitro) 
            VALUES (N'$tennd', '$ngaysinh', $gioitinh, '$sodienthoai', '$email', '$diachi', '$matkhau', 5)";	
				$kq = mysqli_query($con, $sql);
				return $kq;
			}
        }

		
		public function mDeleteKhachHang($makh){
            $p = new ketnoi();
			$sql = "UPDATE khachhang SET email = null, matkhau = NULL WHERE makh = $makh";	
			try{
                $con = $p -> ketnoi();
				$kq = mysqli_query($con, $sql);
				return $kq;
			}catch(Exception $e){
				return false;
			}
		}
		
		public function selectNguoiDung($mand) {
			$p = new ketnoi();
			$con = $p->ketnoi();
			if ($con->connect_errno) {
				return false;
			} else {
				$sql = "SELECT mavaitro FROM nguoidung WHERE mand = $mand";
				$kq = mysqli_query($con, $sql);
				
				if ($kq && mysqli_num_rows($kq) > 0) {
					$row = mysqli_fetch_assoc($kq); 
					return $row['mavaitro']; 
				} else {
					return null; 
				}
			}
		}
    }
?>