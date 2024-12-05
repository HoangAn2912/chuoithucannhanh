<style>
    .navbars:hover .subnav {
        display: block;
    }

    .subnav {
        display: none;
        transition: all 2s linear;
    }
    
</style>

<!-- CDN Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<!-- CDN TailwindCSS -->
<script src="https://cdn.tailwindcss.com"></script>
<!-- Sidebar -->
<?php
include_once("controllers/cNguoiDung.php");
include_once("controllers/cDanhMucSanPham.php");
$nguoidung = new cNguoiDung;
if (isset($_SESSION["dangnhap"])) {
    $taikhoan = $nguoidung->getNguoiDungByID($_SESSION["dangnhap"]);
    $role = $taikhoan[0]['mavaitro'];
    if ($role == 4) {
        require("layout/navnvb.php");
    } else if ($role == 3) {
        require("layout/navnvbh.php");
    } else if ($role == 2) {
        require("layout/navqlch.php");
    } else if ($role == 1) {
        require("layout/navqlchuoi.php");
    }
}
?>
<ul class="sidebar">
    <li><a href="index.php" class="py-2 rounded-l-md"><i class="fas fa-home mr-2"></i> Trang chủ</a></li>
    <li class="navbars"><a href="index.php?c=all" class="py-2 rounded-l-md"><i class="fas fa-utensils mr-2"></i> Thực đơn</a>
        <ul class="subnav pl-4">
            <?php
            $ctrl = new cDanhMuc;

            if ($ctrl->cGetCategories()) {
                $result = $ctrl->cGetCategories();

                while ($row = $result->fetch_assoc()) {
                    echo "<li class='border-l-2'><a href='index.php?c=" . $row["maloaima"] . "' class='py-1'>" . $row["tenloai"] . "</a></li>";
                }
            }
            ?>
        </ul>
    </li>
    <li><a href="#" class="py-2 rounded-l-md"><i class="fas fa-cogs mr-2"></i> Cài đặt</a></li>
    <li><a href="#" class="py-2 rounded-l-md"><i class="fas fa-question-circle mr-2"></i> Hỗ trợ</a></li>
</ul>

<div style="margin-left: 210px; padding: 30px 20px;">
    <?php
    if (isset($_GET["search"])) {
        if ($dishList) {
            echo "<h4 class='mb-4'>Kết quả tìm kiếm cho: " . $searchQuery . "</h4>";
            echo "<div class='grid grid-cols-5 gap-10'>";
            
            $img_dish = "";
            
            foreach ($dishList as $dish) {
                $img_dish = "img/" . $dish["hinhanh"];
                if (!file_exists($img_dish))
                    $img_dish = "img/nodish.png";
                    
                echo "<div class='w-full bg-white shadow rounded-lg hover:scale-105 transition delay-150'>
                    <a href='index.php?p=dish&i=" . $dish["mama"] . "' style='text-decoration: none;'>
                        <div class='h-40 w-full bg-gray-200 flex flex-col justify-between p-4 bg-cover bg-center border-2 border-red-100 rounded-t-lg' style='background-image: url(" . $img_dish . ")'>
                        </div>
                        <div class='px-4 pt-2 pb-4 flex flex-col items-center'>
                        <p class='text-gray-400 font-light text-xs text-center'>" . $dish["tenloai"] . "</p>
                        <h4 class='text-orange-600 text-lg font-bold text-center h-10 mt-1'>" . $dish["tenma"] . "</h4>
                        <p class='text-center text-red-600 mt-1'>" . str_replace(".00", "", number_format($dish["giaban"], "2", ".", ",")) . " đ</p>
                        <button type='submit' class='py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600 active:bg-blue-700 disabled:opacity-50 mt-2 w-full flex items-center justify-center'>
                            Thêm
                            <svg
                            xmlns='http://www.w3.org/2000/svg'
                            class='h-6 w-6 ml-2'
                            fill='none'
                            viewBox='0 0 24 24'
                            stroke='currentColor'
                            >
                            <path
                                stroke-linecap='round'
                                stroke-linejoin='round'
                                stroke-width='2'
                                d='M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z'
                            />
                            </svg>
                        </button>
                        </div>
                        </a>
                    </div>";
            }
            echo "</div>";
        } else {
            echo "Không tìm thấy kết quả liên quan đến: " . $searchQuery;
        }
    }

    if (isset($_GET["c"])) {
        $id = $_GET["c"];

        if ($id != "all") {
            if ($ctrl->cGetAllCategoriesByID($id)) {
                $result = $ctrl->cGetAllCategoriesByID($id);
                echo "<h4 class='mb-4'>Thực đơn/<span class='text-gray-400'>".$result->fetch_assoc()["tenloai"]."</span></h4>";
            }
        } else {
            if ($ctrl->cGetAllCategories()) {
                $result = $ctrl->cGetAllCategories();
                echo "<h4 class='mb-4'>Danh sách món ăn</h4>";
            }
        }

        $img_dish = "";
        echo "<div class='grid grid-cols-5 gap-10'>";

        while ($row = $result->fetch_assoc()) {
            $img_dish = "img/" . $row["hinhanh"];
            if (!file_exists($img_dish))
                $img_dish = "img/nodish.png"; #Thay bằng ảnh mặc định khi không có ảnh sản phẩm

            $price = str_replace(".00", "", number_format($row["giaban"], "2", ".", ","));
            echo "<div class='w-full bg-white shadow rounded-lg hover:scale-105 transition delay-150'>
                            <a href='index.php?p=dish&i=" . $row["mama"] . "' style='text-decoration: none;'>
                        <div class='h-40 w-full bg-gray-200 flex flex-col justify-between p-4 bg-cover bg-center border-2 border-red-100 rounded-t-lg' style='background-image: url(" . $img_dish . ")'>
                        </div>
                        <div class='px-4 pt-2 pb-4 flex flex-col items-center'>
                        <p class='text-gray-400 font-light text-xs text-center'>" . $row["tenloai"] . "</p>
                        <h4 class='text-orange-600 text-lg font-bold text-center h-10 mt-1'>" . $row["tenma"] . "</h4>
                        <p class='text-center text-red-600 mt-1'>" . str_replace(".00", "", number_format($row["giaban"], "2", ".", ",")) . " đ</p>
                        <button type='submit' class='py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600 active:bg-blue-700 disabled:opacity-50 mt-2 w-full flex items-center justify-center'>
                            Thêm
                            <svg
                            xmlns='http://www.w3.org/2000/svg'
                            class='h-6 w-6 ml-2'
                            fill='none'
                            viewBox='0 0 24 24'
                            stroke='currentColor'
                            >
                            <path
                                stroke-linecap='round'
                                stroke-linejoin='round'
                                stroke-width='2'
                                d='M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z'
                            />
                            </svg>
                        </button>
                        </div>
                        </a>
                    </div>";
        }
        echo "</div>";
    }
    ?>
</div>

</body>

</html>