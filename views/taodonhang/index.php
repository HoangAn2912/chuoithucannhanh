<?php
require_once 'controllers/cTaoDonHang.php';
$monAnModel = new MonAnModel($db);
$monAnList = [];
$searchQuery = "";

if (isset($_GET['search'])) {
    $searchQuery = $_GET['search'];
    $monAnList = $monAnModel->searchMonAn($searchQuery);
} else {
    $monAnList = $monAnModel->getAllMonAn();
}
// kt hien thi ttb tanh cong
$checkoutSuccess = false;
if (isset($_SESSION['checkout_success'])) {
    $checkoutSuccess = true;
    unset($_SESSION['checkout_success']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Tạo đơn hàng</title>  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">  
    <link rel="stylesheet" href="css/taodonhang/styles.css?v=1">  
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>  

    </style>  
</head>  
<body>  

    <?php  
        require('layout/navnvbh.php');  
    ?>  
    
    <div class="container">  
        <h1>TẠO ĐƠN HÀNG</h1>  
        <div class="flex-container">  
            <div class="menu">  
                <h2>Danh Sách Món Ăn</h2>  
                <form class="form-search" method="GET" action="index.php">  
                    <input type="hidden" name="page" value="taodonhang">
                    <input class="ip-search-item" type="text" name="search" placeholder="Tìm kiếm món ăn..." value="<?php echo htmlspecialchars($searchQuery); ?>" />  
                    <button class="btn-search-item" type="submit"><i class="fas fa-search"></i> Tìm</button> 
                </form>   
                
                <!-- Các món ăn hiện tại -->  
                <?php foreach ($monAnList as $monAn): ?>
                <div class="menu-item">  
                    <div class="item-image"><img src="img/<?php echo $monAn['hinhanh']; ?>" alt="<?php echo $monAn['tenma']; ?>"></div>  
                    <div class="item-name"><?php echo $monAn['tenma']; ?></div>  
                    <div class="item-price"><?php echo number_format($monAn['giaban'], 0, ',', '.'); ?>đ</div>  
                    <form class="form-add-cart" method="POST">
                        <input type="hidden" name="id" value="<?php echo $monAn['mama']; ?>">
                        <input type="hidden" name="name" value="<?php echo $monAn['tenma']; ?>">
                        <input type="hidden" name="price" value="<?php echo $monAn['giaban']; ?>">
                        <button type="submit" name="add_to_cart">Chọn</button>
                    </form>
                </div>  
                <?php endforeach; ?>
            </div>  
            
            <div class="order-summary">  
                <h2>Thông Tin Đơn Hàng</h2>  
                <div id="order-list">  
                    <div class="infor-item">
                        <table id="order-table">  
                            <tr>  
                                <th>Tên món</th>  
                                <th>Giá</th>  
                                <th>Số lượng</th>
                            </tr>    
                            <?php foreach ($cart as $id => $item): ?>
                            <tr class="order-table-tr">
                                <td><?php echo $item['name']; ?></td>
                                <td><?php echo number_format($item['price'], 0, ',', '.'); ?>đ</td>
                                <td class="order-table-td">
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <input type="hidden" name="action" value="decrease">
                                        <button class="btn-giam" type="submit" name="update_cart"><i class='bx bx-caret-left' ></i></button>
                                    </form>
                                    <?php echo $item['quantity']; ?>
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <input type="hidden" name="action" value="increase">
                                        <button class="btn-tang" type="submit" name="update_cart"><i class='bx bx-caret-right' ></i></button>
                                    </form>
                                </td>
                                <td>
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <input type="hidden" name="action" value="remove">
                                        <button type="submit" name="update_cart">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>  
                <div id="total-price">Tổng Cộng: <?php echo number_format($totalPrice, 0, ',', '.'); ?>đ</div>  
                <div class="btn-order">
                    <form method="POST">
                        <button type="submit" name="clear_cart" class="btn-huy">Hủy đơn hàng</button>
                    </form>
                    <form method="POST" id="checkout-form">
                        <input type="hidden" name="checkout" value="1">
                        <button type="button" class="btn-thanhtoan" onclick="confirmCheckout()">Thanh toán</button>
                    </form>
                </div>
            </div>  
        </div>  
    </div>  

    <script>
        function confirmCheckout() {
        if (<?php echo isset($_SESSION['dangnhap']) ? 'false' : 'true'; ?>) {
            alert("Vui lòng đăng nhập để thanh toán.");
            return;
        }
        if (<?php echo empty($cart) ? 'true' : 'false'; ?>) {
            alert("Bạn chưa có sản phẩm nào để thanh toán.");
        } else {
            if (confirm("Bạn có chắc chắn muốn thanh toán không?")) {
                document.getElementById('checkout-form').submit();
            }
        }
    }
        <?php if ($checkoutSuccess): ?>
            alert("Thanh toán thành công!");
        <?php endif; ?>
    </script>

</body>
</html>
