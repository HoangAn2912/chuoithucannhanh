<?php
session_start();
require_once 'models/mTaoDonHang.php';

class MonAnController {
    private $model;

    public function __construct($db) {
        $this->model = new MonAnModel($db);
    }

    public function index() {
        if (isset($_GET['search'])) {
            $keyword = $_GET['search'];
            $monAnList = $this->model->searchMonAn($keyword);
        } else {
            $monAnList = $this->model->getAllMonAn();
        }
        return $monAnList;
    }

    public function addToCart($id, $name, $price) {
        // Kiểm tra số lượng sản phẩm trong kho
        $query = "SELECT soluong FROM monan WHERE mama = ?";
        $stmt = $this->model->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
    
        if ($row['soluong'] <= 0) {
            $_SESSION['error_message'] = "Sản phẩm đã hết hàng.";
            return false;
        }
    
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    
        if (isset($_SESSION['cart'][$id])) {
            if ($_SESSION['cart'][$id]['quantity'] < $row['soluong']) {
                $_SESSION['cart'][$id]['quantity'] += 1;
            } else {
                $_SESSION['error_message'] = "Số lượng sản phẩm trong giỏ hàng vượt quá số lượng có trong kho.";
                return false;
            }
        } else {
            $_SESSION['cart'][$id] = [
                'name' => $name,
                'price' => $price,
                'quantity' => 1
            ];
        }
    
        return true;
    }
    
    public function updateCart($id, $action) {
        if (isset($_SESSION['cart'][$id])) {
            if ($action == 'increase') {
                // Kiểm tra số lượng sản phẩm trong kho trước khi tăng số lượng
                $query = "SELECT soluong FROM monan WHERE mama = ?";
                $stmt = $this->model->conn->prepare($query);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();

                if ($_SESSION['cart'][$id]['quantity'] < $row['soluong']) {
                    $_SESSION['cart'][$id]['quantity'] += 1;
                } else {
                    $_SESSION['error_message'] = "Số lượng sản phẩm trong giỏ hàng vượt quá số lượng có trong kho.";
                    return false;
                }
            } elseif ($action == 'decrease') {
                $_SESSION['cart'][$id]['quantity'] -= 1;
                if ($_SESSION['cart'][$id]['quantity'] <= 0) {
                    unset($_SESSION['cart'][$id]);
                }
            } elseif ($action == 'remove') {
                unset($_SESSION['cart'][$id]);
            }
        }
    }

    public function clearCart() {
        unset($_SESSION['cart']);
    }

    public function getCart() {
        return isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    }

    public function getTotalPrice() {
        $total = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                $total += $item['price'] * $item['quantity'];
            }
        }
        return $total;
    }

    public function checkout() {
        $mand = $_SESSION['dangnhap'];
        $mach = $_SESSION['mach'];
        $mattdh = 4; // mã trạng thái là 4 vì nhân viên đặt và thanh toán tại chỗ luôn

        // Kiểm tra số lượng sản phẩm trong kho trước khi thanh toán
        foreach ($_SESSION['cart'] as $id => $item) {
            $query = "SELECT soluong FROM monan WHERE mama = ?";
            $stmt = $this->model->conn->prepare($query);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            if ($item['quantity'] > $row['soluong']) {
                $_SESSION['error_message'] = "Số lượng sản phẩm trong giỏ hàng vượt quá số lượng có trong kho.";
                return false;
            }
        }

        // Tạo đơn hàng mới
        $query = "INSERT INTO donhang (mattdh, makh, mach) VALUES (?, ?, ?)";
        $stmt = $this->model->conn->prepare($query);
        $stmt->bind_param("iii", $mattdh, $mand, $mach);
        $stmt->execute();
        $madh = $stmt->insert_id;

        // Lưu chi tiết đơn hàng và cập nhật số lượng món ăn
        foreach ($_SESSION['cart'] as $id => $item) {
            // Lưu chi tiết đơn hàng
            $query = "INSERT INTO chitietdonhang (giamgia, soluong, dongia, madh, mama) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->model->conn->prepare($query);
            $giamgia = 0;
            $soluong = $item['quantity'];
            $dongia = $item['price'];
            $stmt->bind_param("iiiii", $giamgia, $soluong, $dongia, $madh, $id);
            $stmt->execute();

            // Cập nhật số lượng món ăn
            $query = "UPDATE monan SET soluong = soluong - ? WHERE mama = ?";
            $stmt = $this->model->conn->prepare($query);
            $stmt->bind_param("ii", $soluong, $id);
            $stmt->execute();
        }
        $this->clearCart();
        $_SESSION['checkout_success'] = true;
        return true;
    }
}

$database = new ketnoi();
$db = $database->ketnoi();

$controller = new MonAnController($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_to_cart'])) {
        $result = $controller->addToCart($_POST['id'], $_POST['name'], $_POST['price']);
        if (!$result && isset($_SESSION['error_message'])) {
            echo '<script>alert("' . $_SESSION['error_message'] . '");</script>';
            unset($_SESSION['error_message']);
        }
    } elseif (isset($_POST['update_cart'])) {
        $controller->updateCart($_POST['id'], $_POST['action']);
        if (isset($_SESSION['error_message'])) {
            echo '<script>alert("' . $_SESSION['error_message'] . '");</script>';
            unset($_SESSION['error_message']);
        }
    } elseif (isset($_POST['clear_cart'])) {
        $controller->clearCart();
    } elseif (isset($_POST['checkout'])) {
        $result = $controller->checkout();
        if (!$result && isset($_SESSION['error_message'])) {
            echo '<script>alert("' . $_SESSION['error_message'] . '");</script>';
            unset($_SESSION['error_message']);
        } else {
            header("Location: index.php?page=taodonhang");
            exit();
        }
    }
}

$monAnList = $controller->index();
$cart = $controller->getCart();
$totalPrice = $controller->getTotalPrice();
?>
