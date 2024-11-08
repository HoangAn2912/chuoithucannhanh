 // Giả lập việc cập nhật trạng thái bàn
 document.querySelectorAll('.table-item').forEach(item => {
    item.addEventListener('click', () => {
        const table = item;
        const currentStatus = table.classList.contains('trong') ? 'trống' : 'đã đặt';
        const newStatus = currentStatus === 'trống' ? 'đã đặt' : 'trống';

        // Cập nhật trạng thái bàn
        table.classList.toggle('trong');
        table.classList.toggle('dat');
        table.textContent = `${table.textContent.split(":")[0]}: ${newStatus}`;
    });
});