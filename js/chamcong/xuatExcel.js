document.addEventListener("DOMContentLoaded", function () {
    const exportButton = document.getElementById("export");

    if (exportButton) {
        exportButton.addEventListener("click", function () {
            if (!window.attendanceDetails || window.attendanceDetails.length === 0) {
                alert("Không có dữ liệu để xuất.");
                return;
            }

            // Chuẩn bị dữ liệu
            const worksheetData = [
                ["Tên nhân viên", "Chức vụ", "Ca làm", "Trạng thái", "Thời gian vào", "Ghi chú"], // Tiêu đề cột
            ];

            // Thêm dữ liệu từ attendanceDetails
            window.attendanceDetails.forEach(detail => {
                worksheetData.push([
                    detail.tennd || "",
                    detail.tenvaitro || "",
                    detail.tenca || "",
                    detail.trangthai || "",
                    detail.thoigianvao || "",
                    detail.ghichu || ""
                ]);
            });

            // Xác định tên ca dựa trên shift
            let shiftName = "";
            switch (window.shift) {
                case "1":
                    shiftName = "Ca Sáng";
                    break;
                case "2":
                    shiftName = "Ca Trưa";
                    break;
                case "3":
                    shiftName = "Ca Chiều";
                    break;
                case "4":
                    shiftName = "Ca Tối";
                    break;
                default:
                    shiftName = "Không xác định";
            }

            // Lấy tên cửa hàng từ session
            const tenCuaHang = "Cửa hàng " + window.cuaHang;

            // Chuyển đổi định dạng ngày từ YYYY-MM-DD sang DD-MM-YYYY
            function formatDate(dateString) {
                const [year, month, day] = dateString.split("-");
                return `${day}-${month}-${year}`;
            }

            const formattedDate = formatDate(window.date);

            // Đặt tên cho workbook
            const fileName = `Chấm công ${tenCuaHang} ${shiftName} ${formattedDate}.xlsx`;

            // Tạo workbook và worksheet
            const wb = XLSX.utils.book_new();
            const ws = XLSX.utils.aoa_to_sheet(worksheetData);

            // Ghi worksheet vào workbook
            XLSX.utils.book_append_sheet(wb, ws, "Chi Tiết Chấm Công");

            // Xuất file
            XLSX.writeFile(wb, fileName);
        });
    } else {
        console.error("Không tìm thấy nút Xuất Excel.");
    }
});