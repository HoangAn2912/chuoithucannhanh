<title>Thống kê doanh thu</title>
<link rel="stylesheet" href="css/QLNL/style.css">

<!-- CDN Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<!-- CDN TailwindCSS -->
<script src="https://cdn.tailwindcss.com"></script>
<!-- CDN XLSX (Xuất Excel) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>

<?php
require("layout/navqlchuoi.php");
include_once("controllers/cCuaHang.php");
include_once("controllers/cThongKeDoanhThu.php");

/* Hàm đọc số tiền */
function numberToWords($number)
{
    $units = ["", "một", "hai", "ba", "bốn", "năm", "sáu", "bảy", "tám", "chín"];
    $levels = ["", "nghìn", "triệu", "tỷ"];

    if ($number == 0) {
        return "không";
    }

    $numberStr = strval($number);
    $numberStr = str_pad($numberStr, ceil(strlen($numberStr) / 3) * 3, "0", STR_PAD_LEFT); // Làm tròn số ký tự thành bội số của 3
    $chunks = str_split($numberStr, 3);

    $words = [];
    foreach ($chunks as $i => $chunk) {
        if ($chunk != "000") {
            $words[] = chunkToWords($chunk, $units) . ' ' . $levels[count($chunks) - $i - 1];
        }
    }

    return implode(' ', array_filter($words)) . " đồng";
}

function chunkToWords($chunk, $units)
{
    $hundreds = intval($chunk[0]);
    $tens = intval($chunk[1]);
    $ones = intval($chunk[2]);

    $result = [];
    if ($hundreds > 0) {
        $result[] = $units[$hundreds] . " trăm";
    }

    if ($tens > 0) {
        if ($tens == 1) {
            $result[] = "mười";
        } else {
            $result[] = $units[$tens] . " mươi";
        }
    } else if ($hundreds > 0 && $ones > 0) {
        $result[] = "lẻ";
    }

    if ($ones > 0) {
        if ($tens > 1 && $ones == 1) {
            $result[] = "mốt";
        } else if ($tens > 0 && $ones == 5) {
            $result[] = "lăm";
        } else {
            $result[] = $units[$ones];
        }
    }

    return implode(" ", $result);
}

if (isset($_POST["btnxem"])) {
    $startInput = $_POST["start"];
    $endInput = $_POST["end"];

    $daystart = explode("-", $startInput);
    $start = implode("-", array($daystart[0], $daystart[1], $daystart[2]));
    $dayend = explode("-", $endInput);
    $end = implode("-", array($dayend[0], $dayend[1], $dayend[2]));

    $stores = $_POST["cuahang"];
} else {
    $start = date("Y-m-01");
    $end = date("Y-m-t");
}

if (!isset($_POST["cuahang"]))
    $stores = [1, 2, 3, 4, 5];
?>
<div class="sidebar px-4">
    <form action="" method="POST">
        <h3>Cửa hàng</h3>
        <?php
        $cuaHang = new cCuaHang();
        $DScuaHang = $cuaHang->getCuaHang();
        foreach ($DScuaHang as $i) {
            echo "<input class='mb-2 mr-1 accent-blue-600 size-4' type='checkbox' name='cuahang[]' value='" . $i["mach"] . "' id='" . $i["mach"] . "'><label style='font-size: 1rem;' for='" . $i["mach"] . "'>" . $i["tench"] . "</label>";
        }
        ?>

        <h3>Ngày</h3>
        <div class="w-full border-b-2 pb-3">
            <input type="date" name="start" id="" class="form-control" value="<?php echo $start; ?>">
            <span class="block my-1 text-center">đến</span>
            <input type="date" name="end" id="" class="form-control" value="<?php echo $end; ?>">
        </div>
        <button type="submit" class="btn btn-warning mt-3 w-full text-white rounded-md" name="btnxem">Xác nhận</button>
    </form>

</div>
<div style="margin-left: 200px; padding: 20px;" class="content">
    <div class="flex justify-between">
        <h4 class="text-[#db5a04] font-semibold">Thống kê doanh thu bán hàng</h4>
        <p>Đơn vị: VND</p>
    </div>
    <div class="table-material">
        <?php
        if ($cuaHang->cGetNameStoreByID($stores)) {
            $result1 = $cuaHang->cGetNameStoreByID($stores);
            $totalRevenue = 0;
            $revenueData = [];

            while ($row1 = $result1->fetch_assoc()) {
                echo "<h4>" . $row1["tench"] . "</h4>";

                echo "<table class='w-full text-center mb-4'>
                <thead>
                    <tr>
                        <th class='border-2 py-2 w-20'>Mã DH</th>
                        <th class='border-2 py-2 w-80'>Món ăn</th>
                        <th class='border-2 py-2 w-56'>Ngày đặt</th>
                        <th class='border-2 py-2'>Trạng thái</th>
                        <th class='border-2 py-2 w-44'>Khuyến mãi</th>
                        <th class='border-2 py-2 w-44'>Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>";

                $ctrl = new cThongKe;
                $revenue = 0;

                if ($ctrl->cGetAllOrderCompleteByStore($row1["mach"])) {
                    $result2 = $ctrl->cGetAllOrderCompleteByStore($row1["mach"]);

                    while ($row2 = $result2->fetch_assoc()) {
                        echo "<tr>
                        <td class='border-2 py-2'>#" . $row2["madh"] . "</td>
                        <td class='border-2 py-2'>" . $row2["dishName"] . "</td>
                        <td class='border-2 py-2'>" . $row2["ngaydat"] . "</td>
                        <td class='border-2 py-2'>" . $row2["tenttdh"] . "</td>
                        <td class='border-2 py-2'>" . number_format($row2["giamgia"], 0, ".", ",") . "</td>
                        <td class='border-2 py-2'>" . number_format($row2["dongia"], 0, ".", ",") . "</td>
                    </tr>";

                        $revenue += $row2["dongia"];
                        $revenueData[] = [
                            "Cửa hàng" => $row2["mach"],
                            "Mã đơn hàng" => $row2["madh"],
                            "Danh sách món" => $row2["dishName"],
                            "Ngày đặt" => $row2["ngaydat"],
                            "Giảm giá" => $row2["giamgia"],
                            "Tổng đơn" => $row2["dongia"],
                            "Doanh thu" => $revenue
                        ];
                    }

                    echo "<tr><td colspan='5' class='border-2 py-2 text-left font-bold text-lg'>Doanh thu:</td><td class='border-2 py-2 text-lg'>" . number_format($revenue, 0, ".", ",") . "</td></tr>";
                } else echo "<tr><td colspan='6' class='border-2 py-2'>Không có dữ liệu trong thời gian này!</td></tr>";

                echo "</tbody>
                </table>";

                $totalRevenue += $revenue;

            }
            $revenueData[] = [
                "Cửa hàng" => "Tổng doanh thu",
                "Mã đơn hàng" => "",
                "Danh sách món" => "",
                "Ngày đặt" => "",
                "Giảm giá" => "",
                "Doanh thu" => number_format($totalRevenue, 0, ".", ","),
            ];
            
            $data = json_encode($revenueData);
        } else echo "Không có dữ liệu!";

        echo "<h3 class='text-2xl border-b-2 pb-2 font-bold text-[#ec9262]'>Tổng doanh thu</h3>
        <div class='pl-6 pt-2 font-bold text-lg'>
            <p>Bằng số: <span class='italic font-thin'>" . number_format($totalRevenue, 0, ".", ",") . " đồng</span></p>
            <p>Bằng chữ: <span class='italic font-thin'>" . numberToWords($totalRevenue) . "</span></p>
        </div>
        <div>
            <button id='export' class='btn btn-outline-success'>Xuất Excel</button>
        </div>";
        ?>
    </div>
</div>
<script>
    /* Xuất Excel */
    document.getElementById("export").addEventListener("click", function() {
        let data = <?php echo $data; ?>;
        
        let worksheet = XLSX.utils.json_to_sheet(data);

        let workbook = XLSX.utils.book_new();
        
        XLSX.utils.book_append_sheet(workbook, worksheet, "Thống kê doanh thu");

        XLSX.writeFile(workbook, "Thông kê doanh thu.xlsx");
    });
</script>
</body>

</html>