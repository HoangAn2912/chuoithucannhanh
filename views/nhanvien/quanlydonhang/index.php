<?php
session_start(); // Khởi động phiên làm việc

// Kiểm tra nếu người dùng đã đăng nhập
if (!isset($_SESSION["dangnhap"])) {
    header("Location: index.php?page=dangnhap"); // Nếu chưa đăng nhập thì chuyển hướng
    exit();
}

include_once("models/Order.php");

// Lấy mã cửa hàng từ session
$storeId = $_SESSION["mach"]; // Giả sử mã cửa hàng được lưu trong session

$orderModel = new Order();
$orders = $orderModel->getAllOrdersByStore($storeId); // Lấy đơn hàng theo mã cửa hàng
$statusList = $orderModel->getAllOrderStatuses();

echo '<link rel="stylesheet" href="css/DAY/day.css">';
// echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">';

require("layout/navnvbh.php");
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div style="margin-left: 210px; padding: 20px;" class="content">
    <h4 style="color: #db5a04">Quản lý đơn hàng</h4>
    <form action="" method="post">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Trạng thái</th>
                    <th>Tùy Chọn</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($orders)): ?>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?php echo $order['madh']; ?></td>
                            <td><?php echo $order['tennd']; ?></td>
                            <td><?php echo $order['diachi']; ?></td>
                            <td><?php echo $order['sodienthoai']; ?></td>
                            <td>
                                <select class="custom-select" onchange="updateOrderStatus(<?php echo $order['madh']; ?>, this.value)">
                                    <?php foreach ($statusList as $status): ?>
                                        <option value="<?php echo $status['mattdh']; ?>" <?php echo ($status['mattdh'] == $order['mattdh']) ? 'selected' : ''; ?>>
                                            <?php echo $status['tenttdh']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <button type="button" class="btn btn-info" onclick="showOrderDetails(<?php echo $order['madh']; ?>)">Xem chi tiết</button>
                                <button type="button" class="btn btn-danger" onclick="confirmCancellation(<?php echo $order['madh']; ?>)">Hủy đơn</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">Không có đơn hàng nào.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </form>
</div>

<script>
function showOrderDetails(madh) {
    window.location.href = 'views/nhanvien/quanlydonhang/details.php?madh=' + madh;
}

function confirmCancellation(madh) {
    Swal.fire({
        title: 'Bạn có chắc chắn muốn hủy đơn này?',
        showCancelButton: true,
        confirmButtonText: 'Hủy',
        cancelButtonText: 'Không'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'process/cancelOrder.php?madh=' + madh;
        }
    });
}

function updateOrderStatus(madh, statusId) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function() {
        if (xhr.status === 200) {
            Swal.fire('Cập nhật thành công!', '', 'success');
        } else {
            Swal.fire('Có lỗi xảy ra!', '', 'error');
        }
    };
    xhr.send("madh=" + madh + "&mattdh=" + statusId);
}
</script>