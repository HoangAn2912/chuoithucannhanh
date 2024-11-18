$(document).ready(function() {
    // Khi người dùng nhấn nút "Lưu"
    $('#submitForm').click(function(event) {
        // Ngừng gửi form mặc định
        event.preventDefault();

        // Lấy giá trị từ các trường input trong form
        var tennd = $('#tennd').val().trim();
        var email = $('#email').val().trim();
        var sodienthoai = $('#sodienthoai').val().trim();
        var ngaysinh = $('#ngaysinh').val().trim();
        var diachi = $('#diachi').val().trim();
        var matkhau = $('#matkhau').val().trim();

        // Kiểm tra các trường nhập liệu bắt buộc
        if (tennd === '' || email === '' || sodienthoai === '' || ngaysinh === '' || diachi === '' || matkhau === '') {
            alert("Vui lòng điền đầy đủ thông tin!");
            return false;
        }

        // Kiểm tra định dạng email hợp lệ
        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        if (!emailPattern.test(email)) {
            alert("Email không hợp lệ!");
            return false;
        }

        // Kiểm tra số điện thoại hợp lệ (chỉ số và độ dài từ 10 đến 15 ký tự)
        var phonePattern = /^[0-9]{10,15}$/;
        if (!phonePattern.test(sodienthoai)) {
            alert("Số điện thoại không hợp lệ!");
            return false;
        }

        // Nếu tất cả dữ liệu hợp lệ, gửi form qua AJAX
        var formData = $('#addCustomerForm').serialize();  // Lấy toàn bộ dữ liệu form

        $.ajax({
            type: 'POST',
            url: 'index.php?page=qlkh',  // Đảm bảo URL này đúng
            data: formData,  // Dữ liệu gửi đi
            success: function(response) {
                // Nếu thêm thành công, ẩn modal và thông báo thành công
                $('#addCustomerModal').modal('hide');
                alert("Thêm khách hàng thành công!");
                location.reload(); // Reload trang để cập nhật bảng
            },
            error: function() {
                // Nếu có lỗi, thông báo lỗi
                alert("Lỗi khi thêm khách hàng!");
            }
        });
    });
});
