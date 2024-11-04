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

function viewEmployeeDetail(mand) {
    fetch(`controllers/cQLNV.php?action=view&mand=${mand}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('employeeNameDetail').value = data.tennd;
            document.getElementById('employeeAddressDetail').value = data.diachi;
            document.getElementById('employeeEmailDetail').value = data.email;
            document.getElementById('employeePhoneDetail').value = data.sodienthoai;
            document.getElementById('employeePositionDetail').value = data.tenvaitro;
            document.getElementById('branchDetail').value = data.tench;
            toggleDetailForm();
            history.pushState(null, '', `index.php?page=QLNV&mand=${mand}`);
        })
        .catch(error => console.error('Error:', error));
}

function editEmployee(mand) {
    fetch(`controllers/cQLNV.php?action=view&mand=${mand}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('editEmployeeId').value = data.mand;
            document.getElementById('editEmployeeName').value = data.tennd;
            document.getElementById('editEmployeeAddress').value = data.diachi;
            document.getElementById('editEmployeeEmail').value = data.email;
            document.getElementById('editEmployeePhone').value = data.sodienthoai;
            fetch('controllers/cQLNV.php?action=getRoles')
                .then(response => response.json())
                .then(roles => {
                    const roleSelect = document.getElementById('editEmployeePosition');
                    roleSelect.innerHTML = '';
                    roles.forEach(role => {
                        const option = document.createElement('option');
                        option.value = role.mavaitro;
                        option.textContent = role.tenvaitro;
                        if (role.tenvaitro === data.tenvaitro) {
                            option.selected = true;
                        }
                        roleSelect.appendChild(option);
                    });
                });
            fetch('controllers/cQLNV.php?action=getBranches')
                .then(response => response.json())
                .then(branches => {
                    const branchSelect = document.getElementById('editBranch');
                    branchSelect.innerHTML = '';
                    branches.forEach(branch => {
                        const option = document.createElement('option');
                        option.value = branch.mach;
                        option.textContent = branch.tench;
                        if (branch.tench === data.tench) {
                            option.selected = true;
                        }
                        branchSelect.appendChild(option);
                    });
                });

            toggleEditForm();
            history.pushState(null, '', `index.php?page=QLNV&mand=${mand}`);
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

function toggleEditForm() {
    var form = document.getElementById('employeeEdit');
    var overlay = document.getElementById('overlayEdit');
    form.style.display = form.style.display === 'block' ? 'none' : 'block';
    overlay.style.display = overlay.style.display === 'block' ? 'none' : 'block';
}

