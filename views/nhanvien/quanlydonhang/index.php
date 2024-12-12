<?php
// session_start(); 
// Kiểm tra nếu người dùng đã đăng nhập
if (!isset($_SESSION["dangnhap"])) {
    header("Location: index.php?page=dangnhap"); 
    exit();
}
// Kiểm tra xem người dùng đã đăng nhập và có vai trò nhân viên bán hàng hay chưa
if (!isset($_SESSION["mavaitro"]) || $_SESSION["mavaitro"] != 3) {
    echo '<script>alert("Bạn không có quyền truy cập vào trang này!");</script>';
    header("Location: index.php?page=trangchu"); // Chuyển hướng về trang chủ
    exit();
}

include_once("models/Order.php");
include_once("controllers/OrderController.php");

// Khởi tạo controller
$orderController = new OrderController();
$mach = $_SESSION["mach"];

    require("layout/navnvbh.php");
?>
<div style="padding: 20px;" class="content" id="content">
    <?php

// Kiểm tra xem người dùng yêu cầu hiển thị chi tiết đơn hàng hay không
if (isset($_REQUEST["chitietdonhang"])) {
    $mach = $_SESSION["mach"]; 
    $madh = $_REQUEST["chitietdonhang"];
    $orderDetails = $orderController->getchitietdonhang($madh,$mach);

    if (!empty($orderDetails)) {
        // Lấy thông tin chung của đơn hàng (hiển thị một lần)
        $order = $orderDetails[0]; // Lấy thông tin từ đơn hàng đầu tiên vì chúng đều giống nhau
        ?>
        <div class="order-detail-container">
            <div class="recipient-info">
                <p class="detail-title">Mã đơn hàng:</p>
                <p class="detail-value"><?php echo htmlspecialchars($order["madh"]); ?></p>
    
                <p class="detail-title">Ngày đặt:</p>
                <p class="detail-value"><?php echo htmlspecialchars($order["ngaydat"]); ?></p>
    
                <p class="detail-title">Tên người nhận:</p>
                <p class="detail-value"><?php echo htmlspecialchars($order["tennguoinhan"]); ?></p>
    
                <p class="detail-title">Số điện thoại người nhận:</p>
                <p class="detail-value"><?php echo htmlspecialchars($order["sdtnguoinhan"]); ?></p>
    
                <p class="detail-title">Địa chỉ người nhận:</p>
                <p class="detail-value"><?php echo htmlspecialchars($order["diachinguoinhan"]); ?></p>
    
                <p class="detail-title">Email người nhận:</p>
                <p class="detail-value"><?php echo htmlspecialchars($order["emailnguoinhan"]); ?></p>
            </div>
        </div>
    
        <div class="order-items">
            <h3>Danh sách món ăn</h3>
            <table>
                <thead>
                    <tr>
                        <th>Tên món ăn</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Ghi chú</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Lặp qua các món ăn trong đơn hàng
                    foreach ($orderDetails as $orderItem) {
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($orderItem["tenma"]); ?></td>
                            <td><?php echo htmlspecialchars($orderItem["soluong"]); ?></td>
                            <td><?php echo htmlspecialchars($orderItem["dongia"]); ?></td>
                            <td><?php echo htmlspecialchars($orderItem["ghichu"]); ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php
    } else {
        echo "<p>Không tìm thấy chi tiết đơn hàng.</p>";
    }
    
} else {
    // Lấy danh sách đơn hàng
    $mach = $_SESSION["mach"]; 
    // $orderList = $orderController->selectdanhsachdonhang($mach);
    $searchQuery = "";
    if (isset($_GET['search'])) {
        $searchQuery = $_GET['search'];
        // echo $searchQuery;
        $orderList = $orderController->searchOrders($searchQuery, $mach); 
       // var_dump($orderList);
    } else {
        $orderList = $orderController->selectdanhsachdonhang($mach); 
    }
    
    ?>
    <div >
        <h2 style="color: #db5a04">Quản lý đơn hàng</h2>
        <!-- Form tìm kiếm -->
            <div class="qldh-search-bar">
            <form method="GET" action="index.php">
                <input type="hidden" name="page" value="nhanvien/quanlydonhang">
                <input type="text" name="search" placeholder="Nhập tên hoặc SĐT cần tìm..." value="<?php echo htmlspecialchars($searchQuery); ?>" />
                <button type="submit"><i class="fas fa-search"></i> Tìm</button>
            </form>
        </div>

        <?php if (!empty($orderList)): ?>
            <div style ="overflow: auto; height: 400px;">
                <table>
                    <thead style ="position: sticky; top: 0; z-index: 1;">
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Ngày đặt</th>
                            <th>Tên khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Trạng thái</th>
                            <th>Tùy chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php foreach ($orderList as $order): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($order['madh']); ?></td>
                                <td><?php echo htmlspecialchars($order['ngaydat']); ?></td>
                                <td><?php echo htmlspecialchars($order['tennguoinhan']); ?></td>
                                <td><?php echo htmlspecialchars($order['sdtnguoinhan']); ?></td>
                                <td><?php echo htmlspecialchars($order['diachinguoinhan']); ?></td>
                                <td>
                                    <select class="custom-select" onchange="confirmUpdateTinhTrang(<?php echo $order['madh']; ?>, this.value)">
                                    <?php foreach ($order['statusList'] as $status): ?>
                                            <option value="<?php echo $status['mattdh']; ?>" <?php echo ($status['mattdh'] == $order['mattdh']) ? 'selected' : ''; ?>>
                                                <?php echo htmlspecialchars($status['tenttdh']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td>
                                    <a href="index.php?page=nhanvien/quanlydonhang&chitietdonhang=<?php echo htmlspecialchars($order['madh']); ?>" class="btn btn-primary btn-sm">Xem chi tiết</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p>Không có đơn hàng nào.</p>
        <?php endif; ?>
    </div>
<?php
}

?>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmUpdateTinhTrang(madh, mattdh) {
        Swal.fire({
            title: 'Xác nhận',
            text: "Bạn có chắc chắn muốn thay đổi tình trạng đơn hàng này?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                updateTinhTrang(madh, mattdh);
            }
        });
    }

    function updateTinhTrang(madh, mattdh) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "controllers/updateTinhTrangDH1.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                Swal.fire('Thành công!', 'Tình trạng đã được cập nhật!', 'success').then(() => {
                    location.reload();
                });
            } else if (xhr.readyState === 4) {
                Swal.fire('Lỗi!', 'Cập nhật tình trạng thất bại!', 'error');
            }
        };
        xhr.send("madh=" + encodeURIComponent(madh) + "&mattdh=" + encodeURIComponent(mattdh));
    }
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý đơn hàng</title>
    <link rel="stylesheet" href="css/DAY/qldh1.css">
<style>  
    
</style>

</head>
<body>
    
</body>
</html>