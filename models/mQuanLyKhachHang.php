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
			$con = $p -> ketnoi();
			if($con -> connect_errno){
				return false;
			}else{
				$sql = "select tennd from khachhang where tennd like N'%$tennd%'";	
				$kq = mysqli_query($con, $sql);
				return $kq;
			}
		}
		public function selectMotKhachHang($makh) {
			$p = new ketnoi();
			$con = $p->ketnoi();  // Kết nối đến cơ sở dữ liệu
		
			if ($con->connect_errno) {
				// Nếu có lỗi kết nối cơ sở dữ liệu
				return false;
			} else {
				// Sử dụng prepared statement để bảo vệ truy vấn khỏi SQL Injection
				$sql = "SELECT * FROM khachhang WHERE makh = ?";
				if ($stmt = $con->prepare($sql)) {
					// Gắn giá trị vào placeholder
					$stmt->bind_param("i", $makh); // "i" là kiểu dữ liệu integer
		
					// Thực thi truy vấn
					$stmt->execute();
		
					// Lấy kết quả
					$result = $stmt->get_result();
					if ($result->num_rows > 0) {
						// Trả về dữ liệu nếu tìm thấy
						return $result;
					} else {
						// Trả về false nếu không tìm thấy khách hàng
						return false;
					}
				} else {
					// Nếu không thể chuẩn bị câu lệnh SQL
					return false;
				}
			}
		}
		

        public function mUpdateKhachHang($makh, $tennd, $ngaysinh, $gioitinh, $sodienthoai, $email, $diachi, $matkhau){
			$p = new ketnoi();
			$con = $p -> ketnoi();
            $matkhau = md5($matkhau);
			if($con -> connect_errno){
				return false;
			}else{
				$sql = "UPDATE khachhang 
            	SET tennd = '$tennd', 
                ngaysinh = '$ngaysinh', 
                gioitinh = $gioitinh, 
                sodienthoai = '$sodienthoai', 
                email = '$email', 
                diachi = '$diachi' where makh = $makh";	
				$kq = mysqli_query($con, $sql);
				return $kq;
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

    }
?>