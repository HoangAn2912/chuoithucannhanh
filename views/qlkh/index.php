<?php
if(!isset($_SESSION['dangnhap'])){
    header("Refresh: 0; url=index.php?page=dangnhap");
    exit();
}
if (!isset($_SESSION['mavaitro']) || ($_SESSION['mavaitro'] != 2 && $_SESSION['mavaitro'] != 3)) {
    header("Refresh: 0; url=index.php"); 
    exit();
}
$mavaitro = $_SESSION['mavaitro']; 
?>

<?php
if ($mavaitro == 3) {
    require("layout/navnvbh.php"); 
} elseif ($mavaitro == 2) {
    require("layout/navqlch.php");
} else {
    echo "Vai trò không xác định.";
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách khách hàng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/qlkh/style.css">
    
<style>
    .navbar {
            display: flex;
            justify-content: center;
            align-items: center; 
        }
    .navbar a {
    color: white !important;
    text-decoration: none !important;
    padding: 10px 20px;
    font-size: 14px;
}
.form-container {
    display: flex;
    justify-content: flex-end; 
    align-items: center; 
    width: 100%;
}

.search-container {
    padding-top: 10px;
    display: flex;
    gap: 10px; 
}



.search-container {
    display: flex;
    gap: 10px; 
}

.search-container input {
    padding: 10px 10px;
    font-size: 14px;
}

.search{
    border: 1px solid #333; 
    border-radius: 20px; 
}

</style>


</head>
<body>
    <div class="main">
        <div class="container">
            <h1>Danh sách khách hàng</h1>

<form method="POST" action="" class="form-container">
    <div class="search-container">
        <input type="search" class="search" name="txtsearch" placeholder="Tìm kiếm khách hàng" /> 
        <input type="submit" class="btn btn-secondary" name="btnSearch" value="Tìm Kiếm">
    </div>
</form>
<button class="btn btn-success mb-3" data-toggle="modal" data-target="#addCustomerModal">Thêm khách hàng</button>
           
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Họ và tên</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include_once("controllers/cQuanLyKhachHang.php");
                        $controller = new ControlQuanLyKhachHang();
                        $searchKeyword = isset($_POST['txtsearch']) ? $_POST['txtsearch'] : '';

                        if (!empty($searchKeyword)) {
                            $customers = $controller->getAllKhachHangTheoTen($searchKeyword); 
                        } else {
                            $customers = $controller->getAllKhachHang(); 
                        }
                        if ($customers) {
                            $index = 1;
                            while ($row = mysqli_fetch_assoc($customers)) {
                                $gioitinh = ($row['gioitinh'] == 1) ? 'Nam' : 'Nữ';  
                            echo "
                            <tr>
                                <td>{$index}</td>
                                <td>{$row['tennd']}</td>
                                <td>{$row['ngaysinh']}</td>
                                <td>{$gioitinh}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['sodienthoai']}</td>
                                <td>{$row['diachi']}</td>
                                <td>"
                                ?>
                            <button type='button' class='btn btn-warning' name='btnEditKhachHang' onclick='openEditModal(<?php echo $row["makh"]; ?>)'>Sửa</button>
                            <?php echo"
                                    <form action='index.php?page=qlkh' method='POST' style='display:inline;'>
                                        <input type='hidden' name='makh' value='{$row["makh"]}' />
                                        <button type='submit' class='btn btn-danger' name='btnDeleteKhachHang' onclick='return confirm(\"Bạn có xác định xóa khách hàng này không?\");'>Xóa</button>
                                    </form>
                                </td>
                            </tr>
                            ";
                            $index++;

                            }
                        } else {
                            echo "<tr><td colspan='8' class='text-center'>Không có khách hàng</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Thêm Khách Hàng -->
<div class="modal fade" id="addCustomerModal" tabindex="-1" role="dialog" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCustomerModalLabel">Thêm khách hàng mới</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
   
<form id="addCustomerForm" method="POST" action="index.php?page=qlkh" enctype="multipart/form-data" name="form1">
    <div class="modal-body">
        <table class="table" style="border: none;">
            <tr>
                <td><label for="tennd">Họ và tên:</label></td>
                <td><input type="text" class="form-control" name="tennd" id="tennd" required></td>
            </tr>

            <tr>
                <td><label for="ngaysinh">Ngày sinh:</label></td>
                <td><input type="date" class="form-control" name="ngaysinh" id="ngaysinh" required></td>
            </tr>

            <tr>
                <td><label for="gioitinh">Giới tính:</label></td>
                <td>
                    <select class="form-control" name="gioitinh" id="gioitinh" required>
                        <option value="1">Nam</option>
                        <option value="0">Nữ</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="sodienthoai">Số điện thoại:</label></td>
                <td><input type="text" class="form-control" name="sodienthoai" id="sodienthoai" required></td>
            </tr>

            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="email" class="form-control" name="email" id="email" required></td>
            </tr>

            <tr>
                <td><label for="matkhau">Mật khẩu:</label></td>
                <td><input type="password" class="form-control" name="matkhau" id="matkhau" required></td>
            </tr>

            <tr>
                <td><label for="diachi">Địa chỉ:</label></td>
                <td><input type="text" class="form-control" name="diachi" id="diachi" required></td>
            </tr>
        </table>
    </div>
    <div class="modal-footer text-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
        <button type="submit" class="btn btn-success" name="btnInsertKhachHang" id="submitForm">Lưu</button>

    </div>
</form>


        </div>
    </div>
</div>

  <!-- Modal Sửa Khách Hàng -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="modal fade" id="editCustomerModal" tabindex="-1" role="dialog" aria-labelledby="editCustomerModalLabel" aria-hidden="true" name="form1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCustomerModalLabel">Sửa khách hàng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editCustomerForm" method="POST" action="index.php?page=qlkh">
                <div class="modal-body">
                    <input type="hidden" name="makh" id="edit-makh">
                    <div class="form-group">
                        <label for="tennd">Họ và tên:</label>
                        <input type="text" class="form-control" name="tennd" id="edit-tennd">
                    </div>
                    <div class="form-group">
                        <label for="ngaysinh">Ngày sinh:</label>
                        <input type="date" class="form-control" name="ngaysinh" id="edit-ngaysinh">
                    </div>
                    <div class="form-group">
                        <label for="gioitinh">Giới tính:</label>
                        <select class="form-control" name="gioitinh" id="edit-gioitinh">
                            <option value="1">Nam</option>
                            <option value="0">Nữ</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sodienthoai">Số điện thoại:</label>
                        <input type="text" class="form-control" name="sodienthoai" id="edit-sodienthoai">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" id="edit-email">
                    </div>
                    <div class="form-group">
                        <label for="matkhau">Mật khẩu:</label>
                        <input type="password" class="form-control" name="matkhau" id="edit-matkhau">
                    </div>
                    <div class="form-group">
                        <label for="diachi">Địa chỉ:</label>
                        <input type="text" class="form-control" name="diachi" id="edit-diachi">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-success" name="btnEditKhachHang">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Thêm khách hàng -->
<?php
// Xử lý Thêm khách hàng
if (isset($_POST['btnInsertKhachHang'])) {
    $tennd = $_POST['tennd'];
    $ngaysinh = $_POST['ngaysinh'];
    $gioitinh = $_POST['gioitinh'];
    $sodienthoai = $_POST['sodienthoai'];
    $email = $_POST['email'];
    $diachi = $_POST['diachi'];
    $matkhau = $_POST['matkhau'];
    $controller = new controlQuanLyKhachHang();
    $result = $controller->cInsertKhachHang($tennd, $ngaysinh, $gioitinh, $sodienthoai, $email, $diachi, $matkhau);

    if ($result) {
        echo "<script>alert('Thêm khách hàng thành công!'); window.location.href = 'index.php?page=qlkh';</script>";
        exit();
    } else {
        echo "<script>alert('Email đã tồn tại!');</script>";
    }
}

// Xử lý Sửa khách hàng
if (isset($_POST['btnEditKhachHang'])) {
    $makh = $_POST['makh']; 
    $tennd = $_POST['tennd'];
    $ngaysinh = $_POST['ngaysinh'];
    $gioitinh = $_POST['gioitinh'];
    $sodienthoai = $_POST['sodienthoai'];
    $email = $_POST['email'];
    $diachi = $_POST['diachi'];
    $matkhau = $_POST['matkhau'];
    $controller = new controlQuanLyKhachHang();
    $result = $controller->cUpdateKhachHang($makh, $tennd, $ngaysinh, $gioitinh, $sodienthoai, $email, $diachi, $matkhau);

    if ($result) {
        echo "<script>alert('Sửa khách hàng thành công!'); window.location.href = 'index.php?page=qlkh';</script>";
        exit();
    } else {
        echo "<script>alert('Email đã tồn tại!');</script>";
    }
}


// Xử lý Xóa khách hàng
if (isset($_POST['btnDeleteKhachHang'])) {
    $makh = $_POST['makh'];

    $controller = new controlQuanLyKhachHang();
    $result = $controller->cDeleteKhachHang($makh);

    if ($result) {
        echo "<script>alert('Xóa khách hàng thành công!'); window.location.href = 'index.php?page=qlkh';</script>";
        exit();
    } else {
        echo "<script>alert('Xóa khách hàng thất bại!');</script>";
    }
}
	
?>

    <!-- Thêm bootstrap JS -->
    <script src="js/qlkh/qlkh.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>