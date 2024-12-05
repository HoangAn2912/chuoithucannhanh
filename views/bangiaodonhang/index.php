<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bàn giao đơn hàng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/bangiaodonhang/style.css">
</head>
<?php
require("layout/navnvb.php");
include_once("controllers/cBanGiaoDonHang.php");
$ctrl = new controlDonHang();

if (isset($_POST["btnchuyen"])) {
    $order = explode("/", $_POST["btnchuyen"]);
    $id = $order[0];
    $status = $order[1] < 4 ? $order[1] + 1 : $order[1];

    $dishList = $ctrl->cGetDishListByOrderId($id);

    if (isset($_POST["checkboxes"][$id]) && count($_POST["checkboxes"][$id]) == count($dishList) && $status < 4)
        $ctrl->cUpdateStatusOrder($id, $status);
    else if (!isset($_POST["checkboxes"][$id]) || count($_POST["checkboxes"][$id]) != count($dishList) || $status < 4)
        echo "<script>alert('Có món ăn chưa hoàn thành!');</script>";
}
?>

<body>
    <div class="main">
        <div style="text-align: center;  margin-top: 20px; ">
            <h2>Bàn giao đơn hàng</h2>
        </div>

        <div class="list-dish">
            <table class="dish-list">
                <thead>
                    <tr>
                        <th style="text-align: center;">Mã đơn hàng</th>
                        <th style="text-align: center;">Tên món ăn</th>
                        <th style="text-align: center;">Ngày đặt</th>
                        <th style="text-align: center;">Trạng thái</th>
                        <th style="text-align: center;">Chức năng</th>
                    </tr>
                </thead>
                <tbody id="dish-list">
                    <?php
                    $result = $ctrl->cGetOrderByStatusForKitchen();

                    if ($result) {
                        echo "<form method='POST'>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            $groupDish = "";
                            $dish = explode(", ", $row["dishName"]);

                            foreach ($dish as $d) {
                                $groupDish .= "<label for='" . $d . "' style='margin-right: 4px;'>" . $d . "</label>
                                    <input type='checkbox' class='dish-checkbox' name='checkboxes[" . $row["madh"] . "][]' ".($row["mattdh"] >= 3 ? "checked" : "")." id='" . $d . "' value='" . $d . "' style='margin-right: 10px;' />";
                            }

                            echo "<tr>";
                            echo "<td>#" . $row["madh"] . "</td>";
                            echo "<td>" . $groupDish . "</td>";
                            echo "<td>" . $row['ngaydat'] . "</td>";
                            echo "<td>" . $row['tenttdh'] . "</td>";
                            echo "<td style='display: flex; justify-content: center;'>
                            <button type='submit' value='" . $row["madh"] . "/" . $row["mattdh"] . "' name='btnchuyen' id='btn'>Chuyển</button>
                            </td>";
                        }
                        echo "</form>";
                    } else
                        echo "<script>alert('Không có dữ liệu!')</script>";
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        document.querySelectorAll(".dish-checkbox").forEach(function(checkbox) {
            checkbox.addEventListener("change", function() {
                let checkedDishes = JSON.parse(localStorage.getItem("checkedDishes")) || {};

                const orderId = checkbox.closest("tr").querySelector("td").innerText.replace("#", "").trim();
                if (!checkedDishes[orderId]) {
                    checkedDishes[orderId] = [];
                }

                if (checkbox.checked) {
                    checkedDishes[orderId].push(checkbox.value);
                } else {
                    checkedDishes[orderId] = checkedDishes[orderId].filter(dish => dish !== checkbox.value);
                }

                localStorage.setItem("checkedDishes", JSON.stringify(checkedDishes));
            });
        });

        window.addEventListener("load", function() {
            let checkedDishes = JSON.parse(localStorage.getItem("checkedDishes")) || {};

            document.querySelectorAll(".dish-checkbox").forEach(function(checkbox) {
                const orderId = checkbox.closest("tr").querySelector("td").innerText.replace("#", "").trim();

                if (checkedDishes[orderId] && checkedDishes[orderId].includes(checkbox.value)) {
                    checkbox.checked = true;
                }
            });
        });
    </script>

</body>

</html>