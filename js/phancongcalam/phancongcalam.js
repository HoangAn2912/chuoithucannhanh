document.addEventListener('DOMContentLoaded', (event) => {
    const modal = document.getElementById('employeeModal');
    const closeModal = document.querySelector('.modal .close');
    const selectEmployeeBtn = document.getElementById('selectEmployeeBtn');
    let currentCell;

    document.querySelectorAll('.schedule-table .selectable').forEach(cell => {
        cell.addEventListener('click', () => {
            currentCell = cell;
            modal.style.display = 'block';
        });
    });

    closeModal.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    window.addEventListener('click', (event) => {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    });

    selectEmployeeBtn.addEventListener('click', () => {
        const selectedEmployee = document.getElementById('employeeSelect').value;
        currentCell.textContent = selectedEmployee;
        modal.style.display = 'none';
    });

    document.querySelector('.btn.save').addEventListener('click', () => {
        alert('Lưu lịch làm thành công');
    });

    document.querySelector('.btn.cancel').addEventListener('click', () => {
        const confirmCancel = confirm('Thông tin vẫn chưa được lưu. Bạn có muốn thoát không?');
        if (confirmCancel) {
            location.reload();
        }
    });
});