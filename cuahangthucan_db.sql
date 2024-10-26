-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 26, 2024 lúc 11:07 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cuahangthucan_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ban`
--

CREATE TABLE `ban` (
  `maban` int(11) NOT NULL,
  `banhienco` int(11) NOT NULL,
  `bantrong` int(11) NOT NULL,
  `thoigian` time NOT NULL,
  `mach` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ban`
--

INSERT INTO `ban` (`maban`, `banhienco`, `bantrong`, `thoigian`, `mach`) VALUES
(1, 12, 5, '06:00:00', 1),
(2, 12, 3, '06:30:00', 1),
(3, 12, 7, '07:00:00', 1),
(4, 12, 4, '07:30:00', 1),
(5, 12, 2, '08:00:00', 1),
(6, 12, 1, '08:30:00', 1),
(7, 12, 8, '09:00:00', 1),
(8, 12, 9, '09:30:00', 1),
(9, 12, 6, '10:00:00', 1),
(10, 12, 10, '10:30:00', 1),
(11, 12, 11, '11:00:00', 1),
(12, 12, 0, '11:30:00', 1),
(13, 12, 5, '12:00:00', 1),
(14, 12, 3, '12:30:00', 1),
(15, 12, 7, '13:00:00', 1),
(16, 12, 4, '13:30:00', 1),
(17, 12, 2, '14:00:00', 1),
(18, 12, 1, '14:30:00', 1),
(19, 12, 8, '15:00:00', 1),
(20, 12, 9, '15:30:00', 1),
(21, 12, 6, '16:00:00', 1),
(22, 12, 10, '16:30:00', 1),
(23, 12, 11, '17:00:00', 1),
(24, 12, 0, '17:30:00', 1),
(25, 12, 5, '18:00:00', 1),
(26, 12, 3, '18:30:00', 1),
(27, 12, 7, '19:00:00', 1),
(28, 12, 4, '19:30:00', 1),
(29, 12, 2, '20:00:00', 1),
(30, 12, 1, '20:30:00', 1),
(31, 12, 8, '21:00:00', 1),
(32, 12, 9, '21:30:00', 1),
(33, 12, 6, '22:00:00', 1),
(34, 12, 10, '22:30:00', 1),
(35, 12, 11, '23:00:00', 1),
(36, 12, 5, '06:00:00', 2),
(37, 12, 3, '06:30:00', 2),
(38, 12, 5, '06:00:00', 3),
(39, 12, 3, '06:30:00', 3),
(40, 12, 5, '06:00:00', 4),
(41, 12, 3, '06:30:00', 4),
(42, 12, 5, '06:00:00', 5),
(43, 12, 3, '06:30:00', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `calam`
--

CREATE TABLE `calam` (
  `macalam` int(11) NOT NULL,
  `tenca` varchar(50) NOT NULL,
  `ngaylam` date NOT NULL,
  `manvb` int(11) NOT NULL,
  `manvbh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `calam`
--

INSERT INTO `calam` (`macalam`, `tenca`, `ngaylam`, `manvb`, `manvbh`) VALUES
(1, 'Ca Sáng', '2024-01-01', 0, 1),
(2, 'Ca Trưa', '2024-01-02', 0, 1),
(3, 'Ca Chiều', '2024-01-03', 0, 2),
(4, 'Ca Tối', '2024-01-04', 0, 2),
(5, 'Ca Sáng', '2024-01-01', 1, 0),
(6, 'Ca Trưa', '2024-01-02', 1, 0),
(7, 'Ca Chiều', '2024-01-03', 2, 0),
(8, 'Ca Tối', '2024-01-04', 2, 0),
(41, 'Ca Sáng', '2024-01-01', 0, 1),
(42, 'Ca Trưa', '2024-01-02', 0, 1),
(43, 'Ca Chiều', '2024-01-03', 0, 2),
(44, 'Ca Tối', '2024-01-04', 0, 2),
(45, 'Ca Sáng', '2024-01-01', 1, 0),
(46, 'Ca Trưa', '2024-01-02', 1, 0),
(47, 'Ca Chiều', '2024-01-03', 2, 0),
(48, 'Ca Tối', '2024-01-04', 2, 0),
(49, 'Ca Sáng', '2024-01-01', 0, 1),
(50, 'Ca Trưa', '2024-01-02', 0, 1),
(51, 'Ca Chiều', '2024-01-03', 0, 2),
(52, 'Ca Tối', '2024-01-04', 0, 2),
(53, 'Ca Sáng', '2024-01-01', 1, 0),
(54, 'Ca Trưa', '2024-01-02', 1, 0),
(55, 'Ca Chiều', '2024-01-03', 2, 0),
(56, 'Ca Tối', '2024-01-04', 2, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chamcong`
--

CREATE TABLE `chamcong` (
  `machamcong` int(11) NOT NULL,
  `manvb` int(11) NOT NULL,
  `manvbh` int(11) NOT NULL,
  `macalam` int(11) NOT NULL,
  `ngaychamcong` date NOT NULL,
  `thoigianvao` time NOT NULL,
  `thoigianra` time NOT NULL,
  `trangthai` varchar(30) NOT NULL,
  `ghichu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chamcong`
--

INSERT INTO `chamcong` (`machamcong`, `manvb`, `manvbh`, `macalam`, `ngaychamcong`, `thoigianvao`, `thoigianra`, `trangthai`, `ghichu`) VALUES
(13, 1, 0, 1, '2024-01-01', '07:00:00', '11:00:00', 'Có mặt', NULL),
(14, 1, 0, 2, '2024-01-02', '11:00:00', '15:00:00', 'Có mặt', NULL),
(15, 2, 0, 3, '2024-01-03', '15:00:00', '19:00:00', 'Có mặt', NULL),
(16, 2, 0, 4, '2024-01-04', '19:00:00', '23:00:00', 'Có mặt', NULL),
(17, 0, 1, 1, '2024-01-01', '07:00:00', '11:00:00', 'Có mặt', NULL),
(18, 0, 1, 2, '2024-01-02', '11:00:00', '15:00:00', 'Có mặt', NULL),
(19, 0, 2, 3, '2024-01-03', '15:00:00', '19:00:00', 'Có mặt', NULL),
(20, 0, 2, 4, '2024-01-04', '19:00:00', '23:00:00', 'Có mặt', NULL),
(21, 1, 0, 1, '2024-01-01', '07:00:00', '11:00:00', 'Có mặt', NULL),
(22, 1, 0, 2, '2024-01-02', '11:00:00', '15:00:00', 'Có mặt', NULL),
(23, 2, 0, 3, '2024-01-03', '15:00:00', '19:00:00', 'Có mặt', NULL),
(24, 2, 0, 4, '2024-01-04', '19:00:00', '23:00:00', 'Có mặt', NULL),
(25, 0, 1, 1, '2024-01-01', '07:00:00', '11:00:00', 'Có mặt', NULL),
(26, 0, 1, 2, '2024-01-02', '11:00:00', '15:00:00', 'Có mặt', NULL),
(27, 0, 2, 3, '2024-01-03', '15:00:00', '19:00:00', 'Có mặt', NULL),
(28, 0, 2, 4, '2024-01-04', '19:00:00', '23:00:00', 'Có mặt', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `mactdh` int(11) NOT NULL,
  `giamgia` decimal(10,0) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` decimal(10,0) NOT NULL,
  `madh` int(11) NOT NULL,
  `mama` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`mactdh`, `giamgia`, `soluong`, `dongia`, `madh`, `mama`) VALUES
(1, 5000, 2, 75000, 1, 1),
(2, 0, 1, 15000, 2, 6),
(3, 10000, 1, 90000, 3, 11),
(4, 0, 3, 30000, 4, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cuahang`
--

CREATE TABLE `cuahang` (
  `mach` int(11) NOT NULL,
  `tench` varchar(50) NOT NULL,
  `diachi` varchar(50) NOT NULL,
  `sodienthoai` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cuahang`
--

INSERT INTO `cuahang` (`mach`, `tench`, `diachi`, `sodienthoai`) VALUES
(1, 'Chi nhánh Quận 1', '123 Đường A, Quận 1, TP HCM', '0123456789'),
(2, 'Chi nhánh Quận 2', '456 Đường B, Quận 2, TP HCM', '0987654321'),
(3, 'Chi nhánh Quận 3', '789 Đường C, Quận 3, TP HCM', '0234567890'),
(4, 'Chi nhánh Quận 4 ', '123 Đường D, Quận 4, TP HCM', '0435678901'),
(5, 'Chi nhánh Quận 5', '456 Đường E, Quận 5, TP HCM', '0734567890');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhsachdexuat`
--

CREATE TABLE `danhsachdexuat` (
  `madexuat` int(11) NOT NULL,
  `tenma` varchar(50) NOT NULL,
  `nguyenlieu` varchar(250) NOT NULL,
  `congthuc` varchar(250) NOT NULL,
  `cachtrinhbay` varchar(250) NOT NULL,
  `mota` varchar(255) NOT NULL,
  `ngaydexuat` date NOT NULL,
  `ghichu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhsachdexuat`
--

INSERT INTO `danhsachdexuat` (`madexuat`, `tenma`, `nguyenlieu`, `congthuc`, `cachtrinhbay`, `mota`, `ngaydexuat`, `ghichu`) VALUES
(1, 'Gà Rán Mật Ong', 'Gà rán, mật ong, gia vị, bột chiên xù', 'Chiên gà với bột chiên xù, sau đó phủ mật ong', 'Dọn trên đĩa có trang trí rau thơm và lát chanh', 'Món gà rán với vị ngọt của mật ong, giòn bên ngoài, mềm bên trong', '2024-10-25', 'Phù hợp cho các bữa tiệc nhỏ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `madh` int(11) NOT NULL,
  `ngaydat` date NOT NULL,
  `tenmon` varchar(50) NOT NULL,
  `trangthai` varchar(50) NOT NULL,
  `tongtien` decimal(10,0) NOT NULL,
  `makh` int(11) NOT NULL,
  `mama` int(11) NOT NULL,
  `mach` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`madh`, `ngaydat`, `tenmon`, `trangthai`, `tongtien`, `makh`, `mama`, `mach`) VALUES
(1, '2023-10-01', 'Gà Rán Giòn', 'Đã thanh toán', 75000, 1, 1, 1),
(2, '2023-10-02', 'Nước Ngọt Coca', 'Chưa thanh toán', 15000, 2, 6, 2),
(3, '2023-10-03', 'Mì Ý Bolognese', 'Đã thanh toán', 90000, 3, 11, 3),
(4, '2023-10-04', 'Khoai Tây Chiên Thường', 'Đã thanh toán', 30000, 4, 15, 4),
(5, '2023-10-05', 'Gà Rán Combo', 'Chưa thanh toán', 150000, 5, 5, 1),
(6, '2023-10-06', 'Gà Rán + Nước Ngọt', 'Đã thanh toán', 85000, 6, 18, 2),
(7, '2023-10-07', 'Mì Ý + Khoai Tây Chiên', 'Đã thanh toán', 110000, 7, 21, 3),
(8, '2023-10-08', 'Nước Ngọt Fanta', 'Chưa thanh toán', 15000, 8, 9, 5),
(9, '2023-10-09', 'Gà Rán + Mì Ý', 'Đã thanh toán', 145000, 9, 22, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `makh` int(11) NOT NULL,
  `mand` int(11) NOT NULL,
  `mach` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`makh`, `mand`, `mach`) VALUES
(1, 32, 1),
(2, 33, 1),
(3, 34, 2),
(4, 35, 2),
(5, 36, 3),
(6, 37, 3),
(7, 38, 4),
(8, 39, 4),
(9, 40, 5),
(10, 41, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khonguyenlieu`
--

CREATE TABLE `khonguyenlieu` (
  `NLCH_ID` int(11) NOT NULL,
  `mach` int(11) DEFAULT NULL,
  `manl` int(11) DEFAULT NULL,
  `NgayNhap` date DEFAULT NULL,
  `SoLuongBoSung` int(11) DEFAULT NULL,
  `SoLuongNhapKho` int(11) DEFAULT NULL,
  `SoLuongHienCo` int(11) DEFAULT NULL,
  `TinhTrang` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khonguyenlieu`
--

INSERT INTO `khonguyenlieu` (`NLCH_ID`, `mach`, `manl`, `NgayNhap`, `SoLuongBoSung`, `SoLuongNhapKho`, `SoLuongHienCo`, `TinhTrang`) VALUES
(11, 1, 1, '2024-10-22', 10, 20, 20, 'Còn hàng'),
(12, 1, 2, '2024-10-22', 5, 15, 15, 'Còn hàng'),
(13, 1, 3, '2024-10-22', 0, 10, 10, 'Còn hàng'),
(14, 1, 4, '2024-10-22', 10, 25, 25, 'Còn hàng'),
(15, 1, 5, '2024-10-22', 15, 40, 40, 'Còn hàng'),
(16, 1, 6, '2024-10-22', 20, 50, 50, 'Còn hàng'),
(17, 1, 7, '2024-10-22', 5, 10, 10, 'Còn hàng'),
(18, 1, 8, '2024-10-22', 10, 15, 15, 'Còn hàng'),
(19, 1, 9, '2024-10-22', 0, 20, 20, 'Còn hàng'),
(20, 1, 10, '2024-10-22', 10, 25, 25, 'Còn hàng'),
(21, 1, 11, '2024-10-22', 15, 30, 30, 'Còn hàng'),
(22, 1, 12, '2024-10-22', 5, 10, 10, 'Còn hàng'),
(23, 1, 13, '2024-10-22', 0, 15, 15, 'Còn hàng'),
(24, 1, 14, '2024-10-22', 10, 20, 20, 'Còn hàng'),
(25, 1, 15, '2024-10-22', 5, 10, 10, 'Còn hàng'),
(26, 1, 16, '2024-10-22', 0, 25, 25, 'Còn hàng'),
(27, 1, 17, '2024-10-22', 15, 30, 30, 'Còn hàng'),
(28, 1, 18, '2024-10-22', 5, 10, 10, 'Còn hàng'),
(29, 1, 19, '2024-10-22', 10, 20, 20, 'Còn hàng'),
(30, 1, 20, '2024-10-22', 5, 15, 15, 'Hết hàng'),
(31, 2, 1, '2024-10-22', 20, 30, 30, 'Còn hàng'),
(32, 2, 2, '2024-10-22', 15, 25, 25, 'Hết hàng'),
(33, 2, 3, '2024-10-22', 5, 10, 10, 'Chờ duyệt'),
(34, 2, 4, '2024-10-22', 10, 20, 20, 'Đã duyệt'),
(35, 2, 5, '2024-10-22', 8, 18, 18, 'Còn hàng'),
(36, 2, 6, '2024-10-22', 0, 12, 12, 'Hết hàng'),
(37, 2, 7, '2024-10-22', 20, 35, 35, 'Đã duyệt'),
(38, 2, 8, '2024-10-22', 5, 10, 10, 'Còn hàng'),
(39, 2, 9, '2024-10-22', 15, 25, 25, 'Chờ duyệt'),
(40, 2, 10, '2024-10-22', 10, 20, 20, 'Đã duyệt'),
(41, 2, 11, '2024-10-22', 0, 15, 15, 'Hết hàng'),
(42, 2, 12, '2024-10-22', 5, 12, 12, 'Còn hàng'),
(43, 2, 13, '2024-10-22', 10, 30, 30, 'Còn hàng'),
(44, 2, 14, '2024-10-22', 7, 14, 14, 'Đã duyệt'),
(45, 2, 15, '2024-10-22', 12, 24, 24, 'Chờ duyệt'),
(46, 2, 16, '2024-10-22', 0, 8, 8, 'Hết hàng'),
(47, 2, 17, '2024-10-22', 18, 36, 36, 'Còn hàng'),
(48, 2, 18, '2024-10-22', 5, 10, 10, 'Đã duyệt'),
(49, 2, 19, '2024-10-22', 10, 20, 20, 'Còn hàng'),
(50, 2, 20, '2024-10-22', 8, 15, 15, 'Hết hàng'),
(51, 3, 1, '2024-10-22', 15, 30, 30, 'Còn hàng'),
(52, 3, 2, '2024-10-22', 10, 20, 20, 'Chờ duyệt'),
(53, 3, 3, '2024-10-22', 5, 12, 12, 'Đã duyệt'),
(54, 3, 4, '2024-10-22', 8, 18, 18, 'Hết hàng'),
(55, 3, 5, '2024-10-22', 6, 12, 12, 'Còn hàng'),
(56, 3, 6, '2024-10-22', 0, 15, 15, 'Đã duyệt'),
(57, 3, 7, '2024-10-22', 9, 25, 25, 'Hết hàng'),
(58, 3, 8, '2024-10-22', 4, 9, 9, 'Chờ duyệt'),
(59, 3, 9, '2024-10-22', 12, 24, 24, 'Còn hàng'),
(60, 3, 10, '2024-10-22', 6, 15, 15, 'Đã duyệt'),
(61, 3, 11, '2024-10-22', 3, 6, 6, 'Chờ duyệt'),
(62, 3, 12, '2024-10-22', 8, 18, 18, 'Còn hàng'),
(63, 3, 13, '2024-10-22', 0, 5, 5, 'Hết hàng'),
(64, 3, 14, '2024-10-22', 7, 14, 14, 'Còn hàng'),
(65, 3, 15, '2024-10-22', 5, 11, 11, 'Đã duyệt'),
(66, 3, 16, '2024-10-22', 2, 7, 7, 'Còn hàng'),
(67, 3, 17, '2024-10-22', 0, 3, 3, 'Hết hàng'),
(68, 3, 18, '2024-10-22', 10, 20, 20, 'Còn hàng'),
(69, 3, 19, '2024-10-22', 4, 12, 12, 'Chờ duyệt'),
(70, 3, 20, '2024-10-22', 3, 7, 7, 'Đã duyệt'),
(71, 4, 1, '2024-10-22', 12, 24, 24, 'Đã duyệt'),
(72, 4, 2, '2024-10-22', 9, 18, 18, 'Còn hàng'),
(73, 4, 3, '2024-10-22', 7, 14, 14, 'Hết hàng'),
(74, 4, 4, '2024-10-22', 10, 22, 22, 'Đã duyệt'),
(75, 4, 5, '2024-10-22', 3, 9, 9, 'Còn hàng'),
(76, 4, 6, '2024-10-22', 15, 30, 30, 'Chờ duyệt'),
(77, 4, 7, '2024-10-22', 0, 5, 5, 'Hết hàng'),
(78, 4, 8, '2024-10-22', 11, 22, 22, 'Đã duyệt'),
(79, 4, 9, '2024-10-22', 5, 12, 12, 'Chờ duyệt'),
(80, 4, 10, '2024-10-22', 8, 18, 18, 'Còn hàng'),
(81, 4, 11, '2024-10-22', 6, 14, 14, 'Hết hàng'),
(82, 4, 12, '2024-10-22', 0, 7, 7, 'Chờ duyệt'),
(83, 4, 13, '2024-10-22', 14, 28, 28, 'Còn hàng'),
(84, 4, 14, '2024-10-22', 7, 16, 16, 'Đã duyệt'),
(85, 4, 15, '2024-10-22', 5, 12, 12, 'Còn hàng'),
(86, 4, 16, '2024-10-22', 2, 9, 9, 'Hết hàng'),
(87, 4, 17, '2024-10-22', 4, 10, 10, 'Chờ duyệt'),
(88, 4, 1, '2024-10-22', 12, 24, 24, 'Đã duyệt'),
(89, 4, 2, '2024-10-22', 9, 18, 18, 'Còn hàng'),
(90, 4, 3, '2024-10-22', 7, 14, 14, 'Hết hàng'),
(91, 4, 4, '2024-10-22', 10, 22, 22, 'Đã duyệt'),
(92, 4, 5, '2024-10-22', 3, 9, 9, 'Còn hàng'),
(93, 4, 6, '2024-10-22', 15, 30, 30, 'Chờ duyệt'),
(94, 4, 7, '2024-10-22', 0, 5, 5, 'Hết hàng'),
(95, 4, 8, '2024-10-22', 11, 22, 22, 'Đã duyệt'),
(96, 4, 9, '2024-10-22', 5, 12, 12, 'Chờ duyệt'),
(97, 4, 10, '2024-10-22', 8, 18, 18, 'Còn hàng'),
(98, 4, 11, '2024-10-22', 6, 14, 14, 'Hết hàng'),
(99, 4, 12, '2024-10-22', 0, 7, 7, 'Chờ duyệt'),
(100, 4, 13, '2024-10-22', 14, 28, 28, 'Còn hàng'),
(101, 4, 14, '2024-10-22', 7, 16, 16, 'Đã duyệt'),
(102, 4, 15, '2024-10-22', 5, 12, 12, 'Còn hàng'),
(103, 4, 16, '2024-10-22', 2, 9, 9, 'Hết hàng'),
(104, 4, 17, '2024-10-22', 4, 10, 10, 'Chờ duyệt'),
(105, 4, 18, '2024-10-22', 6, 13, 13, 'Còn hàng'),
(106, 4, 19, '2024-10-22', 8, 18, 18, 'Đã duyệt'),
(107, 4, 20, '2024-10-22', 10, 20, 20, 'Còn hàng'),
(108, 5, 1, '2024-10-22', 18, 36, 36, 'Còn hàng'),
(109, 5, 2, '2024-10-22', 0, 5, 5, 'Hết hàng'),
(110, 5, 3, '2024-10-22', 8, 20, 20, 'Đã duyệt'),
(111, 5, 4, '2024-10-22', 5, 15, 15, 'Còn hàng'),
(112, 5, 5, '2024-10-22', 7, 14, 14, 'Chờ duyệt'),
(113, 5, 6, '2024-10-22', 0, 9, 9, 'Hết hàng'),
(114, 5, 7, '2024-10-22', 11, 25, 25, 'Đã duyệt'),
(115, 5, 8, '2024-10-22', 3, 10, 10, 'Còn hàng'),
(116, 5, 9, '2024-10-22', 9, 19, 19, 'Chờ duyệt'),
(117, 5, 10, '2024-10-22', 7, 15, 15, 'Còn hàng'),
(118, 5, 11, '2024-10-22', 4, 12, 12, 'Hết hàng'),
(119, 5, 12, '2024-10-22', 2, 8, 8, 'Đã duyệt'),
(120, 5, 13, '2024-10-22', 10, 22, 22, 'Còn hàng'),
(121, 5, 14, '2024-10-22', 5, 14, 14, 'Chờ duyệt'),
(122, 5, 15, '2024-10-22', 0, 6, 6, 'Hết hàng'),
(123, 5, 16, '2024-10-22', 3, 9, 9, 'Còn hàng'),
(124, 5, 17, '2024-10-22', 15, 30, 30, 'Đã duyệt'),
(125, 5, 18, '2024-10-22', 5, 12, 12, 'Chờ duyệt'),
(126, 5, 19, '2024-10-22', 10, 25, 25, 'Còn hàng'),
(127, 5, 20, '2024-10-22', 6, 10, 10, 'Hết hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaimonan`
--

CREATE TABLE `loaimonan` (
  `maloaima` int(11) NOT NULL,
  `tenloai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaimonan`
--

INSERT INTO `loaimonan` (`maloaima`, `tenloai`) VALUES
(1, 'Gà Rán'),
(2, 'Nước Ngọt'),
(3, 'Mì Ý'),
(4, 'Khoai Tây Chiên'),
(5, 'Combo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `luong`
--

CREATE TABLE `luong` (
  `mabangluong` int(11) NOT NULL,
  `manvb` int(11) NOT NULL,
  `manvbh` int(11) NOT NULL,
  `thangtinhluong` date NOT NULL,
  `sogiolamtrongthang` int(11) NOT NULL,
  `tienthuong` decimal(10,0) DEFAULT NULL,
  `tongluong` int(11) NOT NULL,
  `ngaythanhtoan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monan`
--

CREATE TABLE `monan` (
  `mama` int(11) NOT NULL,
  `tenma` varchar(255) NOT NULL,
  `hinhanh` varchar(255) DEFAULT NULL,
  `maloaima` int(11) NOT NULL,
  `giaban` decimal(10,0) NOT NULL,
  `soluong` int(11) NOT NULL,
  `trangthai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `monan`
--

INSERT INTO `monan` (`mama`, `tenma`, `hinhanh`, `maloaima`, `giaban`, `soluong`, `trangthai`) VALUES
(1, 'Gà Rán Giòn', NULL, 1, 75000, 100, 0),
(2, 'Gà Rán Cay', NULL, 1, 80000, 50, 0),
(3, 'Gà Rán Phô Mai', NULL, 1, 85000, 30, 0),
(4, 'Gà Rán Nguyên Miếng', NULL, 1, 90000, 20, 0),
(5, 'Gà Rán Combo', NULL, 5, 150000, 10, 0),
(6, 'Nước Ngọt Coca', NULL, 2, 15000, 200, 0),
(7, 'Nước Ngọt Pepsi', NULL, 2, 15000, 200, 0),
(8, 'Nước Ngọt Sprite', NULL, 2, 15000, 200, 0),
(9, 'Nước Ngọt Fanta', NULL, 2, 15000, 200, 0),
(10, 'Nước Ngọt Combo', NULL, 5, 40000, 50, 0),
(11, 'Mì Ý Bolognese', NULL, 3, 90000, 30, 0),
(12, 'Mì Ý Carbonara', NULL, 3, 95000, 25, 0),
(13, 'Mì Ý Hải Sản', NULL, 3, 100000, 20, 0),
(14, 'Mì Ý Combo', NULL, 5, 180000, 15, 0),
(15, 'Khoai Tây Chiên Thường', NULL, 4, 30000, 100, 0),
(16, 'Khoai Tây Chiên Phô Mai', NULL, 4, 40000, 80, 0),
(17, 'Khoai Tây Chiên Combo', NULL, 5, 70000, 30, 0),
(18, 'Gà Rán + Nước Ngọt', NULL, 5, 85000, 15, 0),
(19, 'Gà Rán + Khoai Tây Chiên', NULL, 5, 90000, 10, 0),
(20, 'Mì Ý + Nước Ngọt', NULL, 5, 105000, 12, 0),
(21, 'Mì Ý + Khoai Tây Chiên', NULL, 5, 110000, 8, 0),
(22, 'Gà Rán + Mì Ý', NULL, 5, 145000, 5, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `mand` int(11) NOT NULL,
  `tennd` varchar(50) NOT NULL,
  `sodienthoai` varchar(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `diachi` varchar(50) NOT NULL,
  `matkhau` varchar(50) NOT NULL,
  `mavaitro` int(11) NOT NULL,
  `mach` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`mand`, `tennd`, `sodienthoai`, `email`, `diachi`, `matkhau`, `mavaitro`, `mach`) VALUES
(1, 'Nguyễn Văn A', '0987654321', 'qlcn1@gmail.com', 'Quận 1', '123', 1, 1),
(2, 'Nguyễn Văn A', '0987654321', 'qlcn1@gmail.com', 'Quận 1', '123', 2, 1),
(3, 'Trần Thị B', '0912345678', 'qlcn2@gmail.com', 'Quận 2', '123', 2, 2),
(4, 'Lê Văn C', '0934567890', 'qlcn3@gmail.com', 'Quận 3', '123', 2, 3),
(5, 'Phạm Thị D', '0945678901', 'qlcn4@gmail.com', 'Quận 4', '123', 2, 4),
(6, 'Võ Văn E', '0956789012', 'qlcn5@gmail.com', 'Quận 5', '123', 2, 5),
(7, 'Nguyễn Văn A', '0987654321', 'nvbhcn1a@gmail.com', 'Quận 1', '123', 3, 1),
(8, 'Trần Thị B', '0912345678', 'nvbhcn1b@gmail.com', 'Quận 1', '123', 3, 1),
(9, 'Lê Văn C', '0934567890', 'nvbhcn1c@gmail.com', 'Quận 1', '123', 3, 1),
(10, 'Nguyễn Văn A', '0987654321', 'nvbhcn2a@gmail.com', 'Quận 2', '123', 3, 2),
(11, 'Trần Thị B', '0912345678', 'nvbhcn2b@gmail.com', 'Quận 2', '123', 3, 2),
(12, 'Lê Văn C', '0934567890', 'nvbhcn2c@gmail.com', 'Quận 2', '123', 3, 2),
(13, 'Nguyễn Văn A', '0987654321', 'nvbhcn3a@gmail.com', 'Quận 3', '123', 3, 3),
(14, 'Trần Thị B', '0912345678', 'nvbhcn3b@gmail.com', 'Quận 3', '123', 3, 3),
(15, 'Lê Văn C', '0934567890', 'nvbhcn3c@gmail.com', 'Quận 3', '123', 3, 3),
(16, 'Nguyễn Văn A', '0987654321', 'nvbhcn4a@gmail.com', 'Quận 4', '123', 3, 4),
(17, 'Trần Thị B', '0912345678', 'nvbhcn4b@gmail.com', 'Quận 4', '123', 3, 4),
(18, 'Lê Văn C', '0934567890', 'nvbhcn4c@gmail.com', 'Quận 4', '123', 3, 4),
(19, 'Nguyễn Văn A', '0987654321', 'nvbhcn5a@gmail.com', 'Quận 5', '123', 3, 5),
(20, 'Trần Thị B', '0912345678', 'nvbhcn5b@gmail.com', 'Quận 5', '123', 3, 5),
(21, 'Lê Văn C', '0934567890', 'nvbhcn5c@gmail.com', 'Quận 5', '123', 3, 5),
(22, 'Nguyễn Văn A', '0987654321', 'nvbcn1a@gmail.com', 'Quận 1', '123', 4, 1),
(23, 'Trần Thị B', '0912345678', 'nvbcn1b@gmail.com', 'Quận 1', '123', 4, 1),
(24, 'Nguyễn Văn A', '0987654321', 'nvbcn2a@gmail.com', 'Quận 2', '123', 4, 2),
(25, 'Trần Thị B', '0912345678', 'nvbcn2b@gmail.com', 'Quận 2', '123', 4, 2),
(26, 'Nguyễn Văn A', '0987654321', 'nvbcn3a@gmail.com', 'Quận 3', '123', 4, 3),
(27, 'Trần Thị B', '0912345678', 'nvbcn3b@gmail.com', 'Quận 3', '123', 4, 3),
(28, 'Nguyễn Văn A', '0987654321', 'nvbcn4a@gmail.com', 'Quận 4', '123', 4, 4),
(29, 'Trần Thị B', '0912345678', 'nvbcn4b@gmail.com', 'Quận 4', '123', 4, 4),
(30, 'Nguyễn Văn A', '0987654321', 'nvbcn5a@gmail.com', 'Quận 5', '123', 4, 5),
(31, 'Trần Thị B', '0912345678', 'nvbcn5b@gmail.com', 'Quận 5', '123', 4, 5),
(32, 'Nguyễn Văn A', '0987654321', 'khcn1a@gmail.com', 'Quận 1', '123', 5, 1),
(33, 'Trần Thị B', '0912345678', 'khcn1b@gmail.com', 'Quận 1', '123', 5, 1),
(34, 'Nguyễn Văn A', '0987654321', 'khcn2a@gmail.com', 'Quận 2', '123', 5, 2),
(35, 'Trần Thị B', '0912345678', 'khcn2b@gmail.com', 'Quận 2', '123', 5, 2),
(36, 'Nguyễn Văn A', '0987654321', 'khcn3a@gmail.com', 'Quận 3', '123', 5, 3),
(37, 'Trần Thị B', '0912345678', 'khcn3b@gmail.com', 'Quận 3', '123', 5, 3),
(38, 'Nguyễn Văn A', '0987654321', 'khcn4a@gmail.com', 'Quận 4', '123', 5, 4),
(39, 'Trần Thị B', '0912345678', 'khcn4b@gmail.com', 'Quận 4', '123', 5, 4),
(40, 'Nguyễn Văn A', '0987654321', 'khcn5a@gmail.com', 'Quận 5', '123', 5, 5),
(41, 'Trần Thị B', '0912345678', 'khcn5b@gmail.com', 'Quận 5', '123', 5, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguyenlieu`
--

CREATE TABLE `nguyenlieu` (
  `manl` int(11) NOT NULL,
  `tennl` varchar(255) NOT NULL,
  `dongia` decimal(10,0) NOT NULL,
  `donvitinh` varchar(50) NOT NULL,
  `ten_ncc` varchar(255) NOT NULL,
  `email_ncc` varchar(255) NOT NULL,
  `sodienthoai_ncc` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguyenlieu`
--

INSERT INTO `nguyenlieu` (`manl`, `tennl`, `dongia`, `donvitinh`, `ten_ncc`, `email_ncc`, `sodienthoai_ncc`) VALUES
(1, 'Thịt gà', 80, 'kg', 'NCC A', 'ncca@example.com', '0123456789'),
(2, 'Thịt heo', 90, 'kg', 'NCC B', 'nccb@example.com', '0123456788'),
(3, 'Thịt bò', 150, 'kg', 'NCC C', 'nccc@example.com', '0123456787'),
(4, 'Cá hồi', 300, 'kg', 'NCC D', 'nccd@example.com', '0123456786'),
(5, 'Tôm', 200, 'kg', 'NCC E', 'ncce@example.com', '0123456785'),
(6, 'Mực', 180, 'kg', 'NCC F', 'nccf@example.com', '0123456784'),
(7, 'Cà chua', 20, 'kg', 'NCC G', 'ncgg@example.com', '0123456783'),
(8, 'Bắp cải', 15, 'kg', 'NCC H', 'nchh@example.com', '0123456782'),
(9, 'Rau xà lách', 25, 'kg', 'NCC I', 'nci@example.com', '0123456781'),
(10, 'Ớt', 40, 'kg', 'NCC J', 'ncj@example.com', '0123456780'),
(11, 'Hành', 30, 'kg', 'NCC K', 'nck@example.com', '0123456790'),
(12, 'Tỏi', 35, 'kg', 'NCC L', 'ncl@example.com', '0123456700'),
(13, 'Nấm', 50, 'kg', 'NCC M', 'ncm@example.com', '0123456710'),
(14, 'Bí ngòi', 45, 'kg', 'NCC N', 'ncn@example.com', '0123456720'),
(15, 'Đậu xanh', 25, 'kg', 'NCC O', 'nco@example.com', '0123456730'),
(16, 'Đậu đỏ', 30, 'kg', 'NCC P', 'ncp@example.com', '0123456740'),
(17, 'Nho', 60, 'kg', 'NCC Q', 'ncq@example.com', '0123456750'),
(18, 'Cam', 50, 'kg', 'NCC R', 'ncr@example.com', '0123456760'),
(19, 'Táo', 70, 'kg', 'NCC S', 'ncs@example.com', '0123456770'),
(20, 'Chuối', 30, 'kg', 'NCC T', 'nct@example.com', '0123456780');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvienbanhang`
--

CREATE TABLE `nhanvienbanhang` (
  `manvbh` int(11) NOT NULL,
  `mand` int(11) NOT NULL,
  `mach` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvienbanhang`
--

INSERT INTO `nhanvienbanhang` (`manvbh`, `mand`, `mach`) VALUES
(1, 7, 1),
(2, 8, 1),
(3, 9, 1),
(4, 10, 2),
(5, 11, 2),
(6, 12, 2),
(7, 13, 3),
(8, 14, 3),
(9, 15, 3),
(10, 16, 4),
(11, 17, 4),
(12, 18, 4),
(13, 19, 5),
(14, 20, 5),
(15, 21, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvienbep`
--

CREATE TABLE `nhanvienbep` (
  `manvb` int(11) NOT NULL,
  `mand` int(11) NOT NULL,
  `mach` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvienbep`
--

INSERT INTO `nhanvienbep` (`manvb`, `mand`, `mach`) VALUES
(1, 22, 1),
(2, 23, 1),
(3, 24, 2),
(4, 25, 2),
(5, 26, 3),
(6, 27, 3),
(7, 28, 4),
(8, 29, 4),
(9, 30, 5),
(10, 31, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quanlychuoi`
--

CREATE TABLE `quanlychuoi` (
  `maqlc` int(11) NOT NULL,
  `mand` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quanlychuoi`
--

INSERT INTO `quanlychuoi` (`maqlc`, `mand`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quanlycuahang`
--

CREATE TABLE `quanlycuahang` (
  `maqlch` int(11) NOT NULL,
  `mand` int(11) NOT NULL,
  `mach` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quanlycuahang`
--

INSERT INTO `quanlycuahang` (`maqlch`, `mand`, `mach`) VALUES
(1, 2, 1),
(2, 3, 2),
(3, 4, 3),
(4, 5, 4),
(5, 6, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tam_luong`
--

CREATE TABLE `tam_luong` (
  `manvb` int(11) DEFAULT NULL,
  `manvbh` int(11) DEFAULT NULL,
  `sogiolamtrongthang` int(11) DEFAULT NULL,
  `tongluong` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vaitro`
--

CREATE TABLE `vaitro` (
  `mavaitro` int(11) NOT NULL,
  `tenvaitro` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `vaitro`
--

INSERT INTO `vaitro` (`mavaitro`, `tenvaitro`) VALUES
(1, 'Quản lý chuỗi'),
(2, 'Quản lý cửa hàng'),
(3, 'Nhân viên bán hàng'),
(4, 'Nhân viên bếp'),
(5, 'Khách hàng');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ban`
--
ALTER TABLE `ban`
  ADD PRIMARY KEY (`maban`),
  ADD KEY `fk_ban` (`mach`);

--
-- Chỉ mục cho bảng `calam`
--
ALTER TABLE `calam`
  ADD PRIMARY KEY (`macalam`),
  ADD KEY `fk_calam1` (`manvb`),
  ADD KEY `fk_calam2` (`manvbh`);

--
-- Chỉ mục cho bảng `chamcong`
--
ALTER TABLE `chamcong`
  ADD PRIMARY KEY (`machamcong`),
  ADD KEY `fk_chamcong1` (`manvb`),
  ADD KEY `fk_chamcong2` (`manvbh`),
  ADD KEY `fk_calam` (`macalam`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`mactdh`),
  ADD KEY `fk_donhang` (`madh`),
  ADD KEY `fk_monan` (`mama`);

--
-- Chỉ mục cho bảng `cuahang`
--
ALTER TABLE `cuahang`
  ADD PRIMARY KEY (`mach`);

--
-- Chỉ mục cho bảng `danhsachdexuat`
--
ALTER TABLE `danhsachdexuat`
  ADD PRIMARY KEY (`madexuat`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`madh`),
  ADD KEY `fk_cuahang_donhang` (`mach`),
  ADD KEY `fk_monan_donhang` (`mama`),
  ADD KEY `fk_khachhang_donhang` (`makh`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`makh`),
  ADD KEY `fk_khachhang` (`mand`),
  ADD KEY `fk_khachhang_cuahang` (`mach`);

--
-- Chỉ mục cho bảng `khonguyenlieu`
--
ALTER TABLE `khonguyenlieu`
  ADD PRIMARY KEY (`NLCH_ID`),
  ADD KEY `fk_nguyenlieu` (`manl`),
  ADD KEY `fk_cuahang_kho` (`mach`);

--
-- Chỉ mục cho bảng `loaimonan`
--
ALTER TABLE `loaimonan`
  ADD PRIMARY KEY (`maloaima`);

--
-- Chỉ mục cho bảng `luong`
--
ALTER TABLE `luong`
  ADD PRIMARY KEY (`mabangluong`),
  ADD KEY `fk_luong` (`manvb`),
  ADD KEY `fk_luong2` (`manvbh`);

--
-- Chỉ mục cho bảng `monan`
--
ALTER TABLE `monan`
  ADD PRIMARY KEY (`mama`),
  ADD KEY `fk_loaima` (`maloaima`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`mand`),
  ADD KEY `fk_vaitro` (`mavaitro`),
  ADD KEY `fk_cuahang_nguoidung` (`mach`);

--
-- Chỉ mục cho bảng `nguyenlieu`
--
ALTER TABLE `nguyenlieu`
  ADD PRIMARY KEY (`manl`);

--
-- Chỉ mục cho bảng `nhanvienbanhang`
--
ALTER TABLE `nhanvienbanhang`
  ADD PRIMARY KEY (`manvbh`),
  ADD KEY `fk_nvbh` (`mand`),
  ADD KEY `fk_cuahang_nvbh` (`mach`);

--
-- Chỉ mục cho bảng `nhanvienbep`
--
ALTER TABLE `nhanvienbep`
  ADD PRIMARY KEY (`manvb`),
  ADD KEY `fk_nvb` (`mand`),
  ADD KEY `fk_cuahang_nvb` (`mach`);

--
-- Chỉ mục cho bảng `quanlychuoi`
--
ALTER TABLE `quanlychuoi`
  ADD PRIMARY KEY (`maqlc`),
  ADD KEY `fk_qlc` (`mand`);

--
-- Chỉ mục cho bảng `quanlycuahang`
--
ALTER TABLE `quanlycuahang`
  ADD PRIMARY KEY (`maqlch`),
  ADD KEY `fk_qlch` (`mand`),
  ADD KEY `fk_cuahang_qlch` (`mach`);

--
-- Chỉ mục cho bảng `vaitro`
--
ALTER TABLE `vaitro`
  ADD PRIMARY KEY (`mavaitro`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `ban`
--
ALTER TABLE `ban`
  MODIFY `maban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `calam`
--
ALTER TABLE `calam`
  MODIFY `macalam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `chamcong`
--
ALTER TABLE `chamcong`
  MODIFY `machamcong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `mactdh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `cuahang`
--
ALTER TABLE `cuahang`
  MODIFY `mach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `danhsachdexuat`
--
ALTER TABLE `danhsachdexuat`
  MODIFY `madexuat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `madh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `makh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `khonguyenlieu`
--
ALTER TABLE `khonguyenlieu`
  MODIFY `NLCH_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT cho bảng `loaimonan`
--
ALTER TABLE `loaimonan`
  MODIFY `maloaima` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `luong`
--
ALTER TABLE `luong`
  MODIFY `mabangluong` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `monan`
--
ALTER TABLE `monan`
  MODIFY `mama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `mand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `nguyenlieu`
--
ALTER TABLE `nguyenlieu`
  MODIFY `manl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `nhanvienbanhang`
--
ALTER TABLE `nhanvienbanhang`
  MODIFY `manvbh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `nhanvienbep`
--
ALTER TABLE `nhanvienbep`
  MODIFY `manvb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `quanlychuoi`
--
ALTER TABLE `quanlychuoi`
  MODIFY `maqlc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `quanlycuahang`
--
ALTER TABLE `quanlycuahang`
  MODIFY `maqlch` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `vaitro`
--
ALTER TABLE `vaitro`
  MODIFY `mavaitro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `ban`
--
ALTER TABLE `ban`
  ADD CONSTRAINT `fk_ban` FOREIGN KEY (`mach`) REFERENCES `cuahang` (`mach`);

--
-- Các ràng buộc cho bảng `calam`
--
ALTER TABLE `calam`
  ADD CONSTRAINT `fk_calam1` FOREIGN KEY (`manvb`) REFERENCES `nhanvienbep` (`manvb`),
  ADD CONSTRAINT `fk_calam2` FOREIGN KEY (`manvbh`) REFERENCES `nhanvienbanhang` (`manvbh`);

--
-- Các ràng buộc cho bảng `chamcong`
--
ALTER TABLE `chamcong`
  ADD CONSTRAINT `fk_calam` FOREIGN KEY (`macalam`) REFERENCES `calam` (`macalam`),
  ADD CONSTRAINT `fk_chamcong1` FOREIGN KEY (`manvb`) REFERENCES `nhanvienbep` (`manvb`),
  ADD CONSTRAINT `fk_chamcong2` FOREIGN KEY (`manvbh`) REFERENCES `nhanvienbanhang` (`manvbh`);

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `fk_donhang` FOREIGN KEY (`madh`) REFERENCES `donhang` (`madh`),
  ADD CONSTRAINT `fk_monan` FOREIGN KEY (`mama`) REFERENCES `monan` (`mama`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `fk_cuahang_donhang` FOREIGN KEY (`mach`) REFERENCES `cuahang` (`mach`),
  ADD CONSTRAINT `fk_khachhang_donhang` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`),
  ADD CONSTRAINT `fk_monan_donhang` FOREIGN KEY (`mama`) REFERENCES `monan` (`mama`);

--
-- Các ràng buộc cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `fk_khachhang_cuahang` FOREIGN KEY (`mach`) REFERENCES `cuahang` (`mach`);

--
-- Các ràng buộc cho bảng `khonguyenlieu`
--
ALTER TABLE `khonguyenlieu`
  ADD CONSTRAINT `fk_cuahang_kho` FOREIGN KEY (`mach`) REFERENCES `cuahang` (`mach`);

--
-- Các ràng buộc cho bảng `luong`
--
ALTER TABLE `luong`
  ADD CONSTRAINT `fk_luong2` FOREIGN KEY (`manvbh`) REFERENCES `nhanvienbanhang` (`manvbh`);

--
-- Các ràng buộc cho bảng `monan`
--
ALTER TABLE `monan`
  ADD CONSTRAINT `fk_loaima` FOREIGN KEY (`maloaima`) REFERENCES `loaimonan` (`maloaima`);

--
-- Các ràng buộc cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `fk_cuahang_nguoidung` FOREIGN KEY (`mach`) REFERENCES `cuahang` (`mach`);

--
-- Các ràng buộc cho bảng `nhanvienbanhang`
--
ALTER TABLE `nhanvienbanhang`
  ADD CONSTRAINT `fk_cuahang_nvbh` FOREIGN KEY (`mach`) REFERENCES `cuahang` (`mach`);

--
-- Các ràng buộc cho bảng `nhanvienbep`
--
ALTER TABLE `nhanvienbep`
  ADD CONSTRAINT `fk_cuahang_nvb` FOREIGN KEY (`mach`) REFERENCES `cuahang` (`mach`);

--
-- Các ràng buộc cho bảng `quanlychuoi`
--
ALTER TABLE `quanlychuoi`
  ADD CONSTRAINT `fk_qlc` FOREIGN KEY (`mand`) REFERENCES `nguoidung` (`mand`);

--
-- Các ràng buộc cho bảng `quanlycuahang`
--
ALTER TABLE `quanlycuahang`
  ADD CONSTRAINT `fk_cuahang_qlch` FOREIGN KEY (`mach`) REFERENCES `cuahang` (`mach`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
