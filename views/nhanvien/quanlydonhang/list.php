<?php
// Sidebar
echo '<link rel="stylesheet" href="css/DAY/day.css">';
require("layout/navnvbh.php");
?>

<!-- Thêm liên kết đến thư viện SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<div style="margin-left: 210px; padding: 20px;" class="content">
    <h4 style="color: #db5a04">Quản lý đơn hàng</h4>
    <form action="" method="post">
        <table>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Tên khách hàng</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Trạng thái</th>
                <th>Tùy Chọn</th>
            </tr>
            <!-- Dòng dữ liệu mẫu -->
            <tr>
                <td>001</td>
                <td>Nguyễn Văn A</td>
                <td>123 Đường ABC</td>
                <td>0123456789</td>
                <td><span class="status" onclick="showStatusOptions(this)">Đã duyệt <i class="fa fa-edit"></i></span></td>
                <td>
                    <button type="button" class="btn-detail" onclick="showOrderDetails()">Xem chi tiết</button>
                    <button type="button" class="btn-option" onclick="confirmCancellation()">Hủy đơn</button>
                </td>
            </tr>
            <!-- Thêm các dòng dữ liệu khác tương tự -->
        </table>
    </form>
    <div class="pagination">
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">Tiếp theo</a>
    </div>
</div>

<!-- Modal chi tiết đơn hàng -->
<div id="orderDetailModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeOrderDetails()">&times;</span>
        <h4>Thông tin chi tiết đơn hàng</h4>
        <p><strong>Mã đơn hàng:</strong> <span id="orderID">001</span></p>
        <p><strong>Tên khách hàng:</strong> <input type="text" id="customerName" value="Nguyễn Văn A" readonly></p>
        <p><strong>Số điện thoại:</strong> <input type="text" id="phoneNumber" value="0123456789" readonly></p>
        <p><strong>Địa chỉ:</strong> <input type="text" id="address" value="123 Đường ABC" readonly></p>
        <p><strong>Chi nhánh cửa hàng:</strong> <input type="text" id="storeBranch" value="Cửa hàng 1" readonly></p>
        <p><strong>Ngày đặt hàng:</strong> <input type="text" id="orderDate" value="2024-10-28" readonly></p>
        <p><strong>Danh sách món ăn:</strong></p>
        <ul id="itemList">
            <li>Gà rán - 2 phần</li>
            <li>Spaghetti - 1 phần</li>
            <li>Nước ngọt - 2 ly</li>
        </ul>
        <p><strong>Tổng hóa đơn:</strong> <input type="text" id="totalInvoice" value="300,000 VND" readonly></p>
        <button id="editButton" onclick="enableEditing()">Sửa</button>
        <button id="updateButton" onclick="updateOrderDetails()" style="display: none;">Cập nhật</button>
    </div>
</div>

<div id="notification" class="notification">
    <p>Cập nhật trạng thái thành công!</p>
</div>

<script>
   let trangThaiBanDau = ""; // Biến lưu trạng thái ban đầu

// Hiển thị tùy chọn trạng thái khi nhấp vào trạng thái hiện tại
function showStatusOptions(element) {
    trangThaiBanDau = element.innerText.trim(); // Lưu trạng thái ban đầu

    const statusOptions = document.createElement("div"); // Tạo div cho tùy chọn trạng thái
    statusOptions.classList.add("status-options");

    // Nội dung của tùy chọn trạng thái
    statusOptions.innerHTML = `
        <select onchange="updateStatus(this)">
            <option value="">Chọn trạng thái</option>
            <option value="Đã duyệt">Đã duyệt</option>
            <option value="Chờ duyệt">Chờ duyệt</option>
            <option value="Đang giao">Đang giao</option>
            <option value="Đã giao">Đã giao</option>
        </select>
        <button onclick="cancelUpdate()">Hủy</button>
    `;

    element.replaceWith(statusOptions); // Thay thế trạng thái hiện tại bằng tùy chọn
}

// Cập nhật trạng thái và hiển thị thông báo
function updateStatus(selectElement) {
    const newStatus = selectElement.value; // Lấy trạng thái mới
    
    const statusSpan = document.createElement("span"); // Tạo span cho trạng thái mới
    statusSpan.classList.add("status");
    statusSpan.innerHTML = `${newStatus} <i class="fa fa-edit"></i>`;
    statusSpan.onclick = () => showStatusOptions(statusSpan); // Gọi hàm khi nhấp vào trạng thái mới
    
    selectElement.parentNode.replaceWith(statusSpan); // Thay thế tùy chọn bằng trạng thái mới

    showNotification("Cập nhật trạng thái thành công!"); // Hiển thị thông báo
}

// Hủy cập nhật và khôi phục trạng thái ban đầu
function cancelUpdate() {
    const statusSpan = document.createElement("span"); // Tạo span cho trạng thái
    statusSpan.classList.add("status");
    statusSpan.innerHTML = `${trangThaiBanDau} <i class="fa fa-edit"></i>`;
    statusSpan.onclick = () => showStatusOptions(statusSpan); // Gọi hàm khi nhấp vào trạng thái

    document.querySelector(".status-options").replaceWith(statusSpan); // Thay thế tùy chọn bằng trạng thái ban đầu
}

// Kích hoạt chế độ chỉnh sửa thông tin đơn hàng
function enableEditing() {
    document.getElementById("customerName").readOnly = false; // Cho phép chỉnh sửa tên khách hàng
    document.getElementById("phoneNumber").readOnly = false; // Cho phép chỉnh sửa số điện thoại
    document.getElementById("address").readOnly = false; // Cho phép chỉnh sửa địa chỉ
    document.getElementById("storeBranch").readOnly = false; // Cho phép chỉnh sửa chi nhánh
    document.getElementById("orderDate").readOnly = false; // Cho phép chỉnh sửa ngày đặt hàng
    document.getElementById("totalInvoice").readOnly = false; // Cho phép chỉnh sửa tổng hóa đơn
    
    document.getElementById("editButton").style.display = "none"; // Ẩn nút chỉnh sửa
    document.getElementById("updateButton").style.display = "inline"; // Hiện nút cập nhật
}

// Cập nhật thông tin đơn hàng và quay lại chế độ chỉ đọc
function updateOrderDetails() {
    document.getElementById("customerName").readOnly = true; // Khóa chỉnh sửa tên khách hàng
    document.getElementById("phoneNumber").readOnly = true; // Khóa chỉnh sửa số điện thoại
    document.getElementById("address").readOnly = true; // Khóa chỉnh sửa địa chỉ
    document.getElementById("storeBranch").readOnly = true; // Khóa chỉnh sửa chi nhánh
    document.getElementById("orderDate").readOnly = true; // Khóa chỉnh sửa ngày đặt hàng
    document.getElementById("totalInvoice").readOnly = true; // Khóa chỉnh sửa tổng hóa đơn

    document.getElementById("editButton").style.display = "inline"; // Hiện nút chỉnh sửa
    document.getElementById("updateButton").style.display = "none"; // Ẩn nút cập nhật

    showNotification("Cập nhật thông tin đơn hàng thành công!"); // Hiển thị thông báo
}

// Hiển thị modal chi tiết đơn hàng
function showOrderDetails() {
    document.getElementById("orderDetailModal").style.display = "block"; // Hiện modal
}

// Đóng modal chi tiết đơn hàng
function closeOrderDetails() {
    document.getElementById("orderDetailModal").style.display = "none"; // Ẩn modal
}

// Hiển thị thông báo
function showNotification(message) {
    const notification = document.getElementById("notification"); // Lấy phần tử thông báo
    notification.querySelector("p").innerText = message; // Cập nhật nội dung thông báo
    notification.classList.add("show"); // Thêm lớp show để hiện thông báo

    // Ẩn thông báo sau 3 giây
    setTimeout(() => {
        notification.classList.remove("show");
    }, 3000);
}

// Xác nhận hủy đơn hàng
function confirmCancellation() {
    Swal.fire({
        title: 'Bạn có chắc chắn muốn hủy đơn hàng này?', // Tiêu đề thông báo
        text: 'Hành động này không thể hoàn tác.', // Nội dung thông báo
        icon: 'warning', // Biểu tượng cảnh báo
        showCancelButton: true, // Hiện nút hủy
        confirmButtonColor: '#3085d6', // Màu nút xác nhận
        cancelButtonColor: '#d33', // Màu nút hủy
        confirmButtonText: 'Xác nhận', // Văn bản nút xác nhận
        cancelButtonText: 'Hủy' // Văn bản nút hủy
    }).then((result) => {
        if (result.isConfirmed) {
            // Thực hiện hành động hủy đơn ở đây
            showNotification("Hủy đơn hàng thành công!"); // Hiển thị thông báo
            // Thêm logic để xóa hoặc cập nhật đơn hàng nếu cần
        }
    });
}

// Đóng modal khi nhấp bên ngoài modal
window.onclick = function(event) {
    if (event.target == document.getElementById("orderDetailModal")) {
        document.getElementById("orderDetailModal").style.display = "none"; // Ẩn modal
    }
}
</script>

