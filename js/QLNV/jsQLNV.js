function confirmAddEmployee() {
    return confirm('Bạn có chắc chắn muốn thêm nhân viên này không?');
}

function deleteEmployee(mand) {
    if (confirm('Bạn có chắc chắn muốn xóa nhân viên không?')) {
        window.location.href = 'controllers/cQLNV.php?action=delete&mand=' + mand;
    }
}

function viewEmployeeDetail(mand) {
    fetch(`controllers/cQLNV.php?action=view&mand=${mand}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('employeeNameDetail').value = data.tennd;
            document.getElementById('employeeBirthdayDetail').value = data.ngaysinh;
            document.getElementById('employeeGenderDetail').value = data.gioitinh;
            document.getElementById('employeeAddressDetail').value = data.diachi;
            document.getElementById('employeeEmailDetail').value = data.email;
            document.getElementById('employeePhoneDetail').value = data.sodienthoai;
            document.getElementById('employeePositionDetail').value = data.tenvaitro;
            document.getElementById('branchDetail').value = data.tench;
            toggleDetailForm();
        })
        .catch(error => console.error('Error:', error));
}

function toggleForm() {
    var form = document.getElementById('employeeForm');
    var overlay = document.getElementById('overlay');
    form.style.display = form.style.display === 'block' ? 'none' : 'block';
    overlay.style.display = overlay.style.display === 'block' ? 'none' : 'block';
}

function toggleDetailForm() {
    var form = document.getElementById('employeeDetail');
    var overlay = document.getElementById('overlayDetail');
    form.style.display = form.style.display === 'block' ? 'none' : 'block';
    overlay.style.display = overlay.style.display === 'block' ? 'none' : 'block';
}
