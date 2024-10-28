const tables = [
    { id: 1, status: 'trống' },
    { id: 2, status: 'đã đặt' },
    { id: 3, status: 'trống' },
    { id: 4, status: 'đã đặt' },
    { id: 5, status: 'trống' },
    { id: 6, status: 'đã đặt' },
    { id: 7, status: 'trống' },
    { id: 8, status: 'đã đặt' },
    { id: 9, status: 'trống' },
    { id: 10, status: 'đã đặt' },
    { id: 11, status: 'trống' },
    { id: 12, status: 'đã đặt' }
    // Thêm các bàn khác nếu cần
];

function createTableItem(table) {
    const colDiv = document.createElement('div');
    colDiv.className = 'col-md-3 mb-3';  // Lớp `col-md-3` giúp chia 4 cột mỗi hàng

    const tableItem = document.createElement('div');
    tableItem.className = 'table-item ' + (table.status === 'trống' ? 'trong' : 'dat');
    tableItem.textContent = `Bàn ${table.id}: ${table.status}`;

    tableItem.addEventListener('click', () => {
        table.status = table.status === 'trống' ? 'đã đặt' : 'trống';
        checkAvailableTables();  // Gọi lại hàm để cập nhật trạng thái
    });

    colDiv.appendChild(tableItem);
    return colDiv;
}

function checkAvailableTables() {
    const tableList = document.getElementById('tables');
    tableList.innerHTML = '';  // Xóa nội dung cũ

    tables.forEach(table => {
        const tableItem = createTableItem(table);
        tableList.appendChild(tableItem);  // Thêm từng item vào danh sách
    });
}

checkAvailableTables();  // Gọi hàm khi trang tải lần đầu
