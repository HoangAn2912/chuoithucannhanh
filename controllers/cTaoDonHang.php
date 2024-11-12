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
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity'] += 1;
        } else {
            $_SESSION['cart'][$id] = [
                'name' => $name,
                'price' => $price,
                'quantity' => 1
            ];
        }
    }
    public function updateCart($id, $action) {
        if (isset($_SESSION['cart'][$id])) {
            if ($action == 'increase') {
                $_SESSION['cart'][$id]['quantity'] += 1;
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
    
        // Tạo đơn hàng mới
        $query = "INSERT INTO donhang (mattdh, makh, mach) VALUES (?, ?, ?)";
        $stmt = $this->model->conn->prepare($query);
        $stmt->bind_param("iii", $mattdh, $mand, $mach);
        $stmt->execute();
        $madh = $stmt->insert_id;
    
        // Lưu chi tiết đơn hàng và cập nhật số lượng món ăn
        foreach ($_SESSION['cart'] as $id => $item) {
            // Lưu chi tiết đơn hàng
            $query = "INSERT INTO chitietdonhang (giamgia, soluong, dongia, madh, mama, mattdh) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->model->conn->prepare($query);
            $giamgia = 0;
            $soluong = $item['quantity'];
            $dongia = $item['price'];
            $stmt->bind_param("iiiiii", $giamgia, $soluong, $dongia, $madh, $id, $mattdh);
            $stmt->execute();
    
            // Cập nhật số lượng món ăn
            $query = "UPDATE monan SET soluong = soluong - ? WHERE mama = ?";
            $stmt = $this->model->conn->prepare($query);
            $stmt->bind_param("ii", $soluong, $id);
            $stmt->execute();
        }
        $this->clearCart();
        $_SESSION['checkout_success'] = true;
    }
    
}

$database = new ketnoi();
$db = $database->ketnoi();

$controller = new MonAnController($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_to_cart'])) {
        $controller->addToCart($_POST['id'], $_POST['name'], $_POST['price']);
    } elseif (isset($_POST['update_cart'])) {
        $controller->updateCart($_POST['id'], $_POST['action']);
    } elseif (isset($_POST['clear_cart'])) {
        $controller->clearCart();
    } elseif (isset($_POST['checkout'])) {
        $controller->checkout();
        header("Location: index.php?page=taodonhang");
        exit();
    }
}

$monAnList = $controller->index();
$cart = $controller->getCart();
$totalPrice = $controller->getTotalPrice();
?>
