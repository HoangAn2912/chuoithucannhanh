function openEditModal(customerId) {
    $.ajax({
    url: 'controllers/controllerquanlykhachhang.php',
    method: 'POST',
    data: { action: 'getCustomer', makh: customerId },
    dataType: 'json',  // Đảm bảo dữ liệu trả về là JSON
    success: function(response) {
        console.log(response); // Kiểm tra phản hồi từ server
        if (response.status === 'success') {
            let customer = response.data;  // Dữ liệu khách hàng từ server

            // Điền dữ liệu vào form trong modal
            $('#edit-makh').val(customer.makh);
            $('#edit-tennd').val(customer.tennd);
            $('#edit-ngaysinh').val(customer.ngaysinh);
            $('#edit-gioitinh').val(customer.gioitinh);
            $('#edit-sodienthoai').val(customer.sodienthoai);
            $('#edit-email').val(customer.email);
            $('#edit-matkhau').val(customer.matkhau);
            $('#edit-diachi').val(customer.diachi);

            // Hiển thị modal sửa khách hàng
            $('#editCustomerModal').modal('show');
        } else {
            alert(response.message); // Nếu không tìm thấy khách hàng, thông báo lỗi
        }
    },
    error: function() {
        alert('Có lỗi xảy ra khi thực hiện yêu cầu!');
    }
});

}
// Kiểm tra tính hợp lệ của tên người dùng
function validateName(name) {
    const regex = /^[a-zA-Zàáảãạăắằặẳẵâấầẩẫđèéẻẽẹêềếểễễìíỉĩịòóỏõọôốồổỗộơớờởỡợùúủũụưứừửữự]+( [a-zA-Zàáảãạăắằặẳẵâấầẩẫđèéẻẽẹêềếểễễìíỉĩịòóỏõọôốồổỗộơớờởỡợùúủũụưứừửữự]+)*$/;
    return regex.test(name);
}



// Kiểm tra tính hợp lệ của số điện thoại
function validatePhone(phone) {
    const regex = /^(02|03|04|05|06|07|08|09)\d{8}$/;
    return regex.test(phone);
}

// Kiểm tra tính hợp lệ của ngày sinh
function validateBirthDate(birthDateString) {
    const birthDate = new Date(birthDateString);
    const currentDate = new Date();

    // Tính tuổi dựa trên năm, tháng, ngày
    const age = currentDate.getFullYear() - birthDate.getFullYear();
    const monthDiff = currentDate.getMonth() - birthDate.getMonth();
    const dayDiff = currentDate.getDate() - birthDate.getDate();

    // Kiểm tra tuổi lớn hơn hoặc bằng 5
    return (
        birthDate < currentDate &&
        (age > 5 || (age === 5 && (monthDiff > 0 || (monthDiff === 0 && dayDiff >= 0))))
    );
}


// Hiển thị lỗi dưới trường input
function showError(input, message) {
    const errorElement = document.createElement("div");
    errorElement.className = "text-danger mt-1";
    errorElement.innerText = message;
    input.classList.add("is-invalid");

    // Nếu lỗi đã tồn tại, không thêm mới
    if (input.nextElementSibling && input.nextElementSibling.classList.contains("text-danger")) {
        input.nextElementSibling.innerText = message;
    } else {
        input.parentElement.appendChild(errorElement);
    }
}

// Xóa lỗi
function clearError(input) {
    input.classList.remove("is-invalid");
    if (input.nextElementSibling && input.nextElementSibling.classList.contains("text-danger")) {
        input.parentElement.removeChild(input.nextElementSibling);
    }
}

// Kiểm tra và gửi biểu mẫu thêm khách hàng
document.getElementById("addCustomerForm").addEventListener("submit", function (e) {
    const nameInput = document.getElementById("tennd");
    const phoneInput = document.getElementById("sodienthoai");
    const birthDateInput = document.getElementById("ngaysinh"); // Thêm input ngày sinh
    let isValid = true;

    clearError(nameInput);
    clearError(phoneInput);
    clearError(birthDateInput);

    // Kiểm tra tên người dùng
    if (!validateName(nameInput.value)) {
        showError(nameInput, "Tên người dùng phải chứa chữ cái và không được chứa số hoặc ký tự đặc biệt.");
        isValid = false;
    }

    // Kiểm tra số điện thoại
    if (!validatePhone(phoneInput.value)) {
        showError(phoneInput, "Số điện thoại phải bắt đầu bằng 02, 03, ..., 09 và đủ 10 số.");
        isValid = false;
    }

    // Kiểm tra ngày sinh
    if (!validateBirthDate(birthDateInput.value)) {
        showError(birthDateInput, "Ngày sinh phải nhỏ hơn ngày hiện tại và lớn hơn 5 tuổi.");
        isValid = false;
    }

    if (!isValid) e.preventDefault(); // Ngăn chặn gửi biểu mẫu nếu không hợp lệ
});

// Kiểm tra và gửi biểu mẫu sửa khách hàng
document.getElementById("editCustomerForm").addEventListener("submit", function (e) {
    const nameInput = document.getElementById("edit-tennd");
    const phoneInput = document.getElementById("edit-sodienthoai");
    const birthDateInput = document.getElementById("edit-ngaysinh"); // Thêm input ngày sinh
    let isValid = true;

    clearError(nameInput);
    clearError(phoneInput);
    clearError(birthDateInput);

    // Kiểm tra tên người dùng
    if (!validateName(nameInput.value)) {
        showError(nameInput, "Tên người dùng phải chứa chữ cái và không được chứa số hoặc ký tự đặc biệt.");
        isValid = false;
    }

    // Kiểm tra số điện thoại
    if (!validatePhone(phoneInput.value)) {
        showError(phoneInput, "Số điện thoại phải bắt đầu bằng 02, 03, ..., 09 và đủ 10 số.");
        isValid = false;
    }

    // Kiểm tra ngày sinh
    if (!validateBirthDate(birthDateInput.value)) {
        showError(birthDateInput, "Ngày sinh phải nhỏ hơn ngày hiện tại và lớn hơn 5 tuổi.");
        isValid = false;
    }

    if (!isValid) e.preventDefault(); // Ngăn chặn gửi biểu mẫu nếu không hợp lệ
});



