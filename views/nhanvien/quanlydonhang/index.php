    <?php
    session_start(); // Khởi động phiên làm việc

    // Kiểm tra nếu người dùng đã đăng nhập
    if (!isset($_SESSION["dangnhap"])) {
        header("Location: index.php?page=dangnhap"); // Nếu chưa đăng nhập thì chuyển hướng
        exit();
    }

    include_once("models/Order.php");

    // Lấy mã cửa hàng từ session
    $storeId = $_SESSION["mach"]; 

    $orderModel = new Order();

    
   
        // Lấy tất cả đơn hàng của cửa hàng
        $orders = $orderModel->getAllOrdersByStore($storeId);
    

    $statusList = $orderModel->getAllOrderStatuses();

    echo '<link rel="stylesheet" href="css/DAY/day.css">';
    // echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">';

    require("layout/navnvbh.php");
    ?>
    <style>
        #content {
            width: 80%;
            margin: 0 auto;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div style="padding: 20px;" class="content" id="content">
        <h2 style="color: #db5a04">Quản lý đơn hàng</h2>
       
        <form action="" method="post">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Tên khách hàng</th>
                        <th>MaKH</th>
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
                                <td><?php echo $order['tennguoinhan']; ?></td>
                                <td><?php echo $order['makh']; ?></td>
                                <td><?php echo $order['diachinguoinhan']; ?></td>
                                <td><?php echo $order['sdtnguoinhan']; ?></td>
                                <td>
                                    <select class="custom-select" onchange="confirmUpdateTinhTrang(<?php echo $order['madh']; ?>, this.value)">
                                        <?php foreach ($statusList as $status): ?>
                                            <option value="<?php echo $status['mattdh']; ?>" <?php echo ($status['mattdh'] == $order['mattdh']) ? 'selected' : ''; ?>>
                                                <?php echo $status['tenttdh']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-info" onclick="showOrderDetails(<?php echo $order['madh']; ?>)">Xem chi tiết</button>   
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7">Không có đơn hàng nào.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </form>
    </div>



    <script>
    // function showOrderDetails(madh) {
    //     window.location.href = 'views/nhanvien/quanlydonhang/details.php?madh=' + madh;
        
    // }

    // Hàm xác nhận thay đổi tình trạng đơn hàng
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
            } else {
                console.log("Thay đổi tình trạng bị hủy bỏ.");
            }
        });
    }

    // Hàm thực hiện gửi dữ liệu cập nhật tình trạng đơn hàng qua AJAX
    function updateTinhTrang(madh, mattdh) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "controllers/updateTinhTrangDH.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                Swal.fire({
                    title: 'Thành công!',
                    text: "Tình trạng đã được cập nhật!",
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    location.reload(); // Tự động reload lại trang để cập nhật
                });
            } else if (xhr.readyState === 4) {
                Swal.fire({
                    title: 'Lỗi!',
                    text: "Cập nhật tình trạng thất bại!",
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        };
        
        // Gửi dữ liệu qua POST
        xhr.send("madh=" + encodeURIComponent(madh) + "&mattdh=" + encodeURIComponent(mattdh));
    }

    
    </script>
