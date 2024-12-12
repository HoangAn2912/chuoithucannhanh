<?php
// session_start(); 

if (!isset($_SESSION["dangnhap"])) {
    header("Location: index.php?page=dangnhap"); 
    exit();
}
// ktr vai trò nhân viên bán hàng
if (!isset($_SESSION["mavaitro"]) || $_SESSION["mavaitro"] != 3) {
    echo '<script>alert("Bạn không có quyền truy cập vào trang này!");</script>';
    header("Location: index.php?page=trangchu"); 
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

    // Ktr yêu cầu hiển thị chi tiết đơn hàng
    if (isset($_REQUEST["chitietdonhang"])) {
        $mach = $_SESSION["mach"]; 
        $madh = $_REQUEST["chitietdonhang"];
        $orderDetails = $orderController->getchitietdonhang($madh, $mach);

        if (!empty($orderDetails)) {
            // Lấy thông tin chung của đơn hàng (hiển thị một lần)
            $order = $orderDetails[0]; // Lấy thông tin từ đơn hàng đầu tiên vì chúng đều giống nhau
            ?>
            <div class="order-detail-container">
                <div class="recipient-info">
                    <h2>Thông tin đơn hàng</h2>
                    <p class="detail-title">Mã đơn hàng: <span class="detail-value"><?php echo $order["madh"]; ?></span></p>
                    <p class="detail-title">Ngày đặt: <span class="detail-value"><?php echo $order["ngaydat"]; ?></span></p>
                    <p class="detail-title">Tên người nhận: <span class="detail-value"><?php echo $order["tennguoinhan"]; ?></span></p>
                    <p class="detail-title">Số điện thoại: <span class="detail-value"><?php echo $order["sdtnguoinhan"]; ?></span></p>
                    <p class="detail-title">Địa chỉ: <span class="detail-value"><?php echo $order["diachinguoinhan"]; ?></span></p>
                    <p class="detail-title">Email: <span class="detail-value"><?php echo $order["emailnguoinhan"]; ?></span></p>
                </div>
                <div class="button-container">
                    <button class="btn-back">
                        <a href="index.php?page=nhanvien/quanlydonhang">Quay lại</a>
                    </button>
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
                                <td><?php echo $orderItem["tenma"]; ?></td>
                                <td><?php echo $orderItem["soluong"]; ?></td>
                                <td><?php echo $orderItem["dongia"]; ?></td>
                                <td><?php echo $orderItem["ghichu"]; ?></td>
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
            ?>
            <div class="button-container">
                <button class="btn-back">
                    <a href="index.php?page=nhanvien/quanlydonhang">Quay lại</a>
                </button>
            </div>
            <?php
        }

    } else {
        // Lấy danh sách đơn hàng
        $mach = $_SESSION["mach"]; 
        $searchQuery = "";
        if (isset($_GET['search'])) {
            $searchQuery = $_GET['search'];
            $orderList = $orderController->searchOrders($searchQuery, $mach); 
        } else {
            $orderList = $orderController->selectdanhsachdonhang($mach); 
        }

        ?>
        <div>
            <h2 style="color: #db5a04">Quản lý đơn hàng</h2>
            <!-- tìm -->
            <div class="qldh-search-bar">
                <form method="GET" action="index.php">
                    <input type="hidden" name="page" value="nhanvien/quanlydonhang">
                    <input type="text" name="search" placeholder="Nhập tên hoặc SĐT cần tìm..." value="<?php echo $searchQuery; ?>" />
                    <button type="submit"><i class="fas fa-search"></i> Tìm</button>
                </form>
            </div>

            <?php if (!empty($orderList)): ?>
                <div style="overflow: auto; height: 400px;">
                    <table>
                        <thead style="position: sticky; top: 0; z-index: 1;">
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
                                    <td><?php echo $order['madh']; ?></td>
                                    <td><?php echo $order['ngaydat']; ?></td>
                                    <td><?php echo $order['tennguoinhan']; ?></td>
                                    <td><?php echo $order['sdtnguoinhan']; ?></td>
                                    <td><?php echo $order['diachinguoinhan']; ?></td>
                                    <td>
                                        <select class="custom-select" onchange="confirmUpdateTinhTrang(<?php echo $order['madh']; ?>, this.value)">
                                        <?php foreach ($order['statusList'] as $status): ?>
                                                <option value="<?php echo $status['mattdh']; ?>" <?php echo ($status['mattdh'] == $order['mattdh']) ? 'selected' : ''; ?>>
                                                    <?php echo $status['tenttdh']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                    <td>
                                        <a href="index.php?page=nhanvien/quanlydonhang&chitietdonhang=<?php echo $order['madh']; ?>" class="btn btn-primary btn-sm">Xem chi tiết</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p>Không có đơn hàng nào.</p>
                <div class="button-container">
                    <button class="btn-back">
                        <a href="index.php?page=nhanvien/quanlydonhang">Quay lại</a>
                    </button>
                </div>
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
        .button-container {
            text-align: center;
            margin: 20px 0;
        }
        .btn-back {
            border: none;
            color: white;
            border-radius: 5px;
            font-size: 18px; /* Slightly larger font */
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }
        .btn-back a {
            color: white;
            text-decoration: none;
        }
        
        .order-detail-container, .order-items {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        .recipient-info h2, .order-items h3 {
            color: #db5a04;
        }
        .detail-title {
            font-weight: bold;
        }
        .detail-value {
            margin-left: 10px;
        }
    </style>
</head>
<body>
</body>
</html>