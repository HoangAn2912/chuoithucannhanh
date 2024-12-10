<?php
    // Lấy dữ liệu khách hàng từ Controller
    include_once("controllers/cQuanLyKhachHang.php");
    $controller = new ControlQuanLyKhachHang();

    // Kiểm tra xem có tìm kiếm hay không
    $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

    // Lấy danh sách khách hàng từ phương thức tìm kiếm
    $customers = $controller->searchKhachHangByName($searchTerm);  // Gọi phương thức tìm kiếm

    if ($customers) {
        $index = 1;
        while ($row = mysqli_fetch_assoc($customers)) {
            // Xử lý giới tính
            $gioitinh = ($row['gioitinh'] == 1) ? 'Nam' : 'Nữ';
            echo "
            <tr>
                <td>{$index}</td>
                <td>{$row['tennd']}</td>
                <td>{$row['ngaysinh']}</td>
                <td>{$gioitinh}</td>
                <td>{$row['email']}</td>
                <td>{$row['sodienthoai']}</td>
                <td>{$row['diachi']}</td>
                <td>
                    <button type='button' class='btn btn-warning' name='btnEditKhachHang' onclick='openEditModal({$row['makh']})'>Sửa</button>
                    <form action='index.php?page=qlkh' method='POST' style='display:inline;'>
                        <input type='hidden' name='makh' value='{$row["makh"]}' />
                        <button type='submit' class='btn btn-danger' name='btnDeleteKhachHang' onclick='return confirm(\"Bạn có xác định xóa khách hàng này không?\");'>Xóa</button>
                    </form>
                </td>
            </tr>
            ";
            $index++;
        }
    } else {
        echo "<tr><td colspan='8' class='text-center'>Không có khách hàng</td></tr>";
    }
?>
