function confirmAddEmployee() {
    return confirm('Bạn có chắc chắn muốn thêm nhân viên này không?');
}

function deleteEmployee(mand) {
    if (confirm('Bạn có chắc chắn muốn xóa nhân viên không?')) {
        window.location.href = 'controllers/cQLNV.php?action=delete&mand=' + mand;
    }
}

function confirmEditEmployee() {
    return confirm('Bạn có chắc chắn muốn chỉnh sửa nhân viên này không?');
}


function toggleForm() {
    var form = document.getElementById('employeeForm');
    var overlay = document.getElementById('overlay');
    form.style.display = form.style.display === 'block' ? 'none' : 'block';
    overlay.style.display = overlay.style.display === 'block' ? 'none' : 'block';
}

