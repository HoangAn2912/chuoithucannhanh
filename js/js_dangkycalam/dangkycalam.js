function submitShift(date, shift) {
    document.getElementById('selected_date').value = date;
    document.getElementById('selected_shift').value = shift;
    document.getElementById('btn_confirm').click();
}
// Lưu vị trí cuộn trước khi gửi form
function saveScrollPosition() {
    localStorage.setItem('scrollPosition', window.scrollY);
}
// Đặt lại vị trí cuộn sau khi tải lại trang
window.onload = function() {
    const scrollPosition = localStorage.getItem('scrollPosition');
    if (scrollPosition) {
        window.scrollTo(0, scrollPosition);
        localStorage.removeItem('scrollPosition'); // Xóa sau khi áp dụng
    }
};