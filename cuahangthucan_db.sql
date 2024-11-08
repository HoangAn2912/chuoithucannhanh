-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 08, 2024 lúc 06:24 AM
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
  `tenban` varchar(255) NOT NULL,
  `mach` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ban`
--

INSERT INTO `ban` (`maban`, `tenban`, `mach`) VALUES
(44, 'Bàn Số 1', 1),
(45, 'Bàn Số 2', 1),
(46, 'Bàn Số 3', 1),
(47, 'Bàn Số 4', 1),
(48, 'Bàn Số 5', 1),
(49, 'Bàn Số 6', 1),
(50, 'Bàn Số 7', 1),
(51, 'Bàn Số 8', 1),
(52, 'Bàn Số 9', 1),
(53, 'Bàn Số 10', 1),
(54, 'Bàn Số 11', 1),
(55, 'Bàn Số 12', 1),
(56, 'Bàn Số 1', 1),
(57, 'Bàn Số 2', 1),
(58, 'Bàn Số 3', 1),
(59, 'Bàn Số 4', 1),
(60, 'Bàn Số 5', 1),
(61, 'Bàn Số 6', 1),
(62, 'Bàn Số 7', 1),
(63, 'Bàn Số 8', 1),
(64, 'Bàn Số 9', 1),
(65, 'Bàn Số 10', 1),
(66, 'Bàn Số 11', 1),
(67, 'Bàn Số 12', 1),
(68, 'Bàn Số 1', 2),
(69, 'Bàn Số 2', 2),
(70, 'Bàn Số 3', 2),
(71, 'Bàn Số 4', 2),
(72, 'Bàn Số 5', 2),
(73, 'Bàn Số 6', 2),
(74, 'Bàn Số 7', 2),
(75, 'Bàn Số 8', 2),
(76, 'Bàn Số 9', 2),
(77, 'Bàn Số 10', 2),
(78, 'Bàn Số 11', 2),
(79, 'Bàn Số 12', 2),
(80, 'Bàn Số 1', 3),
(81, 'Bàn Số 2', 3),
(82, 'Bàn Số 3', 3),
(83, 'Bàn Số 4', 3),
(84, 'Bàn Số 5', 3),
(85, 'Bàn Số 6', 3),
(86, 'Bàn Số 7', 3),
(87, 'Bàn Số 8', 3),
(88, 'Bàn Số 9', 3),
(89, 'Bàn Số 10', 3),
(90, 'Bàn Số 11', 3),
(91, 'Bàn Số 12', 3),
(92, 'Bàn Số 1', 4),
(93, 'Bàn Số 2', 4),
(94, 'Bàn Số 3', 4),
(95, 'Bàn Số 4', 4),
(96, 'Bàn Số 5', 4),
(97, 'Bàn Số 6', 4),
(98, 'Bàn Số 7', 4),
(99, 'Bàn Số 8', 4),
(100, 'Bàn Số 9', 4),
(101, 'Bàn Số 10', 4),
(102, 'Bàn Số 11', 4),
(103, 'Bàn Số 12', 4),
(104, 'Bàn Số 1', 5),
(105, 'Bàn Số 2', 5),
(106, 'Bàn Số 3', 5),
(107, 'Bàn Số 4', 5),
(108, 'Bàn Số 5', 5),
(109, 'Bàn Số 6', 5),
(110, 'Bàn Số 7', 5),
(111, 'Bàn Số 8', 5),
(112, 'Bàn Số 9', 5),
(113, 'Bàn Số 10', 5),
(114, 'Bàn Số 11', 5),
(115, 'Bàn Số 12', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `calam`
--

CREATE TABLE `calam` (
  `macalam` int(11) NOT NULL,
  `tenca` varchar(50) NOT NULL,
  `giobatdau` time NOT NULL,
  `gioketthuc` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `calam`
--

INSERT INTO `calam` (`macalam`, `tenca`, `giobatdau`, `gioketthuc`) VALUES
(1, 'Ca Sáng', '07:00:00', '11:00:00'),
(2, 'Ca Trưa', '11:00:00', '15:00:00'),
(3, 'Ca Chiều', '15:00:00', '19:00:00'),
(4, 'Ca Tối', '19:00:00', '23:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chamcong`
--

CREATE TABLE `chamcong` (
  `machamcong` int(11) NOT NULL,
  `macalam` int(11) NOT NULL,
  `ngaychamcong` date NOT NULL,
  `thoigianvao` date DEFAULT NULL,
  `trangthai` varchar(30) NOT NULL,
  `ghichu` text DEFAULT NULL,
  `mand` int(11) NOT NULL,
  `manvbh` int(11) NOT NULL,
  `manvb` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chamcong`
--

INSERT INTO `chamcong` (`machamcong`, `macalam`, `ngaychamcong`, `thoigianvao`, `trangthai`, `ghichu`, `mand`, `manvbh`, `manvb`) VALUES
(13, 1, '2024-01-01', NULL, 'Có mặt', NULL, 22, 0, 1),
(14, 2, '2024-01-02', NULL, 'Có mặt', NULL, 22, 0, 1),
(15, 3, '2024-01-03', NULL, 'Có mặt', NULL, 23, 0, 2),
(16, 4, '2024-01-04', NULL, 'Có mặt', NULL, 23, 0, 2),
(17, 1, '2024-01-01', NULL, 'Có mặt', NULL, 7, 1, 0),
(18, 2, '2024-01-02', NULL, 'Có mặt', NULL, 7, 1, 0),
(19, 3, '2024-01-03', NULL, 'Có mặt', NULL, 8, 2, 0),
(20, 4, '2024-01-04', NULL, 'Có mặt', NULL, 8, 2, 0),
(21, 1, '2024-01-01', NULL, 'Có mặt', NULL, 22, 0, 1),
(22, 2, '2024-01-02', NULL, 'Có mặt', NULL, 22, 0, 1),
(23, 3, '2024-01-03', NULL, 'Có mặt', NULL, 23, 0, 2),
(24, 4, '2024-01-04', NULL, 'Có mặt', NULL, 23, 0, 2),
(25, 1, '2024-01-01', NULL, 'Có mặt', NULL, 7, 1, 0),
(26, 2, '2024-01-02', NULL, 'Có mặt', NULL, 7, 1, 0),
(27, 3, '2024-01-03', NULL, 'Có mặt', NULL, 8, 2, 0),
(28, 4, '2024-01-04', NULL, 'Có mặt', NULL, 8, 2, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `mactdh` int(11) NOT NULL,
  `giamgia` decimal(10,0) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` decimal(10,0) NOT NULL,
  `ghichu` varchar(255) DEFAULT NULL,
  `madh` int(11) NOT NULL,
  `mama` int(11) NOT NULL,
  `mattdh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`mactdh`, `giamgia`, `soluong`, `dongia`, `ghichu`, `madh`, `mama`, `mattdh`) VALUES
(1, 5000, 2, 75000, 'Không lấy tương ớt mà hãy lấy tương cà', 1, 1, 1),
(2, 0, 1, 15000, 'Không lấy đá', 2, 6, 2),
(3, 10000, 1, 90000, NULL, 3, 11, 3);

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
-- Cấu trúc bảng cho bảng `dangkycalam`
--

CREATE TABLE `dangkycalam` (
  `madkcl` int(11) NOT NULL,
  `mand` int(11) NOT NULL,
  `ngaydanky` date NOT NULL,
  `macalam` int(11) NOT NULL,
  `mattdk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhsachdexuat`
--

CREATE TABLE `danhsachdexuat` (
  `madexuat` int(11) NOT NULL,
  `mand` int(11) NOT NULL,
  `tenma` varchar(50) NOT NULL,
  `nguyenlieu` varchar(250) NOT NULL,
  `congthuc` varchar(250) NOT NULL,
  `cachtrinhbay` varchar(250) NOT NULL,
  `mota` varchar(255) NOT NULL,
  `ngaydexuat` date NOT NULL,
  `ghichu` text NOT NULL,
  `trangthai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `datban`
--

CREATE TABLE `datban` (
  `madb` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `maban` int(11) NOT NULL,
  `mach` int(11) NOT NULL,
  `ngaydat` date NOT NULL,
  `thoigiandat` datetime NOT NULL,
  `thoigiandongban` datetime DEFAULT NULL,
  `trangthai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `datban`
--

INSERT INTO `datban` (`madb`, `makh`, `maban`, `mach`, `ngaydat`, `thoigiandat`, `thoigiandongban`, `trangthai`) VALUES
(2, 1, 44, 1, '2024-11-05', '2024-11-05 06:28:41', NULL, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `madh` int(11) NOT NULL,
  `ngaydat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `mattdh` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `mach` int(11) NOT NULL,
  `madb` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`madh`, `ngaydat`, `mattdh`, `makh`, `mach`, `madb`) VALUES
(1, '2024-11-01 11:00:00', 1, 1, 1, 2),
(2, '2024-11-02 11:15:00', 2, 2, 2, NULL),
(3, '2024-11-03 11:20:00', 3, 3, 3, NULL),
(4, '2024-11-08 11:43:55', 1, 1, 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `magiohang` int(11) NOT NULL,
  `mama` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` int(11) NOT NULL,
  `makh` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `makh` int(11) NOT NULL,
  `mand` int(11) DEFAULT NULL,
  `tennd` varchar(50) DEFAULT NULL,
  `sodienthoai` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `diachi` varchar(50) DEFAULT NULL,
  `matkhau` varchar(32) DEFAULT NULL,
  `mavaitro` int(11) DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `gioitinh` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`makh`, `mand`, `tennd`, `sodienthoai`, `email`, `diachi`, `matkhau`, `mavaitro`, `ngaysinh`, `gioitinh`) VALUES
(1, 32, 'Nguyễn Văn A', '0987654321', 'khcn1a@gmail.com', 'Quận 1', '202cb962ac59075b964b07152d234b70', 5, '1992-05-16', 1),
(2, 33, 'Trần Thị B', '0912345678', 'khcn1b@gmail.com', 'Quận 1', '202cb962ac59075b964b07152d234b70', 5, '1994-11-22', 0),
(3, 34, 'Nguyễn Văn A', '0987654321', 'khcn2a@gmail.com', 'Quận 2', '202cb962ac59075b964b07152d234b70', 5, '1990-07-10', 1),
(4, 35, 'Trần Thị B', '0912345678', 'khcn2b@gmail.com', 'Quận 2', '202cb962ac59075b964b07152d234b70', 5, '1998-09-15', 0),
(5, 36, 'Nguyễn Văn A', '0987654321', 'khcn3a@gmail.com', 'Quận 3', '202cb962ac59075b964b07152d234b70', 5, '1995-12-01', 1),
(6, 37, 'Trần Thị B', '0912345678', 'khcn3b@gmail.com', 'Quận 3', '202cb962ac59075b964b07152d234b70', 5, '1993-03-17', 0),
(7, 38, 'Nguyễn Văn A', '0987654321', 'khcn4a@gmail.com', 'Quận 4', '202cb962ac59075b964b07152d234b70', 5, '1991-06-20', 1),
(8, 39, 'Trần Thị B', '0912345678', 'khcn4b@gmail.com', 'Quận 4', '202cb962ac59075b964b07152d234b70', 5, '1996-10-08', 0),
(9, 40, 'Nguyễn Văn A', '0987654321', 'khcn5a@gmail.com', 'Quận 5', '202cb962ac59075b964b07152d234b70', 5, '2000-01-25', 1),
(10, 41, 'Trần Thị B', '0912345678', 'khcn5b@gmail.com', 'Quận 5', '202cb962ac59075b964b07152d234b70', 5, '1999-11-30', 0);

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
-- Cấu trúc bảng cho bảng `lichlamviec`
--

CREATE TABLE `lichlamviec` (
  `malamviec` int(11) NOT NULL,
  `mand` int(11) NOT NULL,
  `ngaylamviec` date NOT NULL,
  `macalam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lichlamviec`
--

INSERT INTO `lichlamviec` (`malamviec`, `mand`, `ngaylamviec`, `macalam`) VALUES
(1, 7, '2024-11-04', 1),
(2, 8, '2024-11-04', 1),
(3, 9, '2024-11-04', 1),
(4, 22, '2024-11-04', 1),
(5, 23, '2024-11-04', 1),
(6, 7, '2024-11-04', 2),
(7, 8, '2024-11-04', 2),
(8, 9, '2024-11-04', 2),
(9, 24, '2024-11-04', 2),
(10, 25, '2024-11-04', 2),
(11, 7, '2024-11-04', 3),
(12, 8, '2024-11-04', 3),
(13, 9, '2024-11-04', 3),
(14, 22, '2024-11-04', 3),
(15, 23, '2024-11-04', 3),
(16, 7, '2024-11-04', 4),
(17, 8, '2024-11-04', 4),
(18, 9, '2024-11-04', 4),
(19, 24, '2024-11-04', 4),
(20, 25, '2024-11-04', 4),
(21, 7, '2024-11-05', 1),
(22, 8, '2024-11-05', 1),
(23, 9, '2024-11-05', 1),
(24, 22, '2024-11-05', 1),
(25, 23, '2024-11-05', 1),
(26, 7, '2024-11-05', 2),
(27, 8, '2024-11-05', 2),
(28, 9, '2024-11-05', 2),
(29, 24, '2024-11-05', 2),
(30, 25, '2024-11-05', 2),
(31, 7, '2024-11-05', 3),
(32, 8, '2024-11-05', 3),
(33, 9, '2024-11-05', 3),
(34, 22, '2024-11-05', 3),
(35, 23, '2024-11-05', 3),
(36, 7, '2024-11-05', 4),
(37, 8, '2024-11-05', 4),
(38, 9, '2024-11-05', 4),
(39, 24, '2024-11-05', 4),
(40, 25, '2024-11-05', 4),
(41, 7, '2024-11-06', 1),
(42, 8, '2024-11-06', 1),
(43, 9, '2024-11-06', 1),
(44, 22, '2024-11-06', 1),
(45, 23, '2024-11-06', 1),
(46, 7, '2024-11-06', 2),
(47, 8, '2024-11-06', 2),
(48, 9, '2024-11-06', 2),
(49, 24, '2024-11-06', 2),
(50, 25, '2024-11-06', 2),
(51, 7, '2024-11-06', 3),
(52, 8, '2024-11-06', 3),
(53, 9, '2024-11-06', 3),
(54, 22, '2024-11-06', 3),
(55, 23, '2024-11-06', 3),
(56, 7, '2024-11-06', 4),
(57, 8, '2024-11-06', 4),
(58, 9, '2024-11-06', 4),
(59, 24, '2024-11-06', 4),
(60, 25, '2024-11-06', 4),
(61, 7, '2024-11-07', 1),
(62, 8, '2024-11-07', 1),
(63, 9, '2024-11-07', 1),
(64, 22, '2024-11-07', 1),
(65, 23, '2024-11-07', 1),
(66, 7, '2024-11-07', 2),
(67, 8, '2024-11-07', 2),
(68, 9, '2024-11-07', 2),
(69, 24, '2024-11-07', 2),
(70, 25, '2024-11-07', 2),
(71, 7, '2024-11-07', 3),
(72, 8, '2024-11-07', 3),
(73, 9, '2024-11-07', 3),
(74, 22, '2024-11-07', 3),
(75, 23, '2024-11-07', 3),
(76, 7, '2024-11-07', 4),
(77, 8, '2024-11-07', 4),
(78, 9, '2024-11-07', 4),
(79, 24, '2024-11-07', 4),
(80, 25, '2024-11-07', 4),
(81, 7, '2024-11-08', 1),
(82, 8, '2024-11-08', 1),
(83, 9, '2024-11-08', 1),
(84, 22, '2024-11-08', 1),
(85, 23, '2024-11-08', 1),
(86, 7, '2024-11-08', 2),
(87, 8, '2024-11-08', 2),
(88, 9, '2024-11-08', 2),
(89, 24, '2024-11-08', 2),
(90, 25, '2024-11-08', 2),
(101, 7, '2024-11-11', 1),
(102, 22, '2024-11-11', 1),
(103, 8, '2024-11-11', 2),
(104, 9, '2024-11-12', 1),
(105, 23, '2024-11-12', 2),
(106, 7, '2024-11-13', 1),
(107, 22, '2024-11-13', 3),
(108, 8, '2024-11-14', 1),
(109, 24, '2024-11-14', 2),
(110, 21, '2024-11-15', 1),
(111, 23, '2024-11-15', 2),
(112, 7, '2024-11-09', 1),
(113, 8, '2024-11-09', 1),
(114, 9, '2024-11-09', 1),
(115, 22, '2024-11-09', 1),
(116, 23, '2024-11-09', 1),
(117, 7, '2024-11-09', 2),
(118, 8, '2024-11-09', 2),
(119, 9, '2024-11-09', 2),
(120, 24, '2024-11-09', 2),
(121, 25, '2024-11-09', 2),
(122, 7, '2024-11-09', 3),
(123, 8, '2024-11-09', 3),
(124, 9, '2024-11-09', 3),
(125, 22, '2024-11-09', 3),
(126, 23, '2024-11-09', 3),
(127, 7, '2024-11-09', 4),
(128, 8, '2024-11-09', 4),
(129, 9, '2024-11-09', 4),
(130, 24, '2024-11-09', 4),
(131, 25, '2024-11-09', 4),
(132, 7, '2024-11-10', 1),
(133, 8, '2024-11-10', 1),
(134, 9, '2024-11-10', 1),
(135, 22, '2024-11-10', 1),
(136, 23, '2024-11-10', 1),
(137, 7, '2024-11-10', 2),
(138, 8, '2024-11-10', 2),
(139, 9, '2024-11-10', 2),
(140, 24, '2024-11-10', 2),
(141, 25, '2024-11-10', 2),
(142, 7, '2024-11-10', 3),
(143, 8, '2024-11-10', 3),
(144, 9, '2024-11-10', 3),
(145, 22, '2024-11-10', 3),
(146, 23, '2024-11-10', 3),
(147, 7, '2024-11-10', 4),
(148, 8, '2024-11-10', 4),
(149, 9, '2024-11-10', 4),
(150, 24, '2024-11-10', 4),
(151, 25, '2024-11-10', 4),
(152, 7, '2024-11-08', 3),
(153, 8, '2024-11-08', 3),
(154, 9, '2024-11-08', 3),
(155, 22, '2024-11-08', 3),
(156, 23, '2024-11-08', 3),
(157, 7, '2024-11-08', 4),
(158, 8, '2024-11-08', 4),
(159, 9, '2024-11-08', 4),
(160, 24, '2024-11-08', 4),
(161, 25, '2024-11-08', 4);

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
  `thangtinhluong` date NOT NULL,
  `sogiolamtrongthang` int(11) NOT NULL,
  `tienthuong` decimal(10,0) DEFAULT NULL,
  `tongluong` int(11) NOT NULL,
  `ngaythanhtoan` date NOT NULL,
  `mand` int(11) NOT NULL
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
  `congthuc` text NOT NULL,
  `dinhluong` decimal(10,0) NOT NULL,
  `trangthai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `monan`
--

INSERT INTO `monan` (`mama`, `tenma`, `hinhanh`, `maloaima`, `giaban`, `soluong`, `congthuc`, `dinhluong`, `trangthai`) VALUES
(1, 'Gà Rán Giòn', 'garan.jpg', 1, 29000, 100, '', 0, 0),
(2, 'Gà Rán Cay', 'garancay.jpg', 1, 33000, 50, '', 0, 0),
(3, 'Gà Rán Phô Mai', 'garanphomai.jpg', 1, 35000, 30, '', 0, 0),
(4, 'Gà Rán Nguyên Con', 'garannguyencon.jpg', 1, 190000, 20, '', 0, 0),
(5, 'Gà Rán Combo', 'garancombo.jpg', 5, 299000, 10, '', 0, 0),
(6, 'Nước Ngọt Coca', 'nuocngotcoca.jpg', 2, 15000, 200, '', 0, 0),
(7, 'Nước Ngọt Pepsi', 'nuocngotpepsi.jpg', 2, 15000, 200, '', 0, 0),
(8, 'Nước Ngọt Sprite', 'nuocngotsprite.jpg', 2, 15000, 200, '', 0, 0),
(9, 'Nước Ngọt Fanta', 'nuocngotpanta.jpg', 2, 15000, 200, '', 0, 0),
(10, 'Nước Ngọt Coca + Gà Rán', 'garanvacoca.jpg', 5, 39000, 50, '', 0, 0),
(11, 'Mì Ý Bolognese', 'myyolo.jpg', 3, 39000, 30, '', 0, 0),
(12, 'Mì Ý Trung Quốc', 'myytrungquoc.jpg', 3, 39000, 25, '', 0, 0),
(13, 'Mì Ý Hải Sản', 'myyhaisan.jpg', 3, 49000, 20, '', 0, 0),
(14, 'Mì Ý Việt + Gà Rán Cay', 'myyvietvagarancay.jpg', 5, 63000, 15, '', 0, 0),
(15, 'Khoai Tây Chiên', 'khoaitaychien.jpg', 4, 19000, 100, '', 0, 0),
(16, 'Khoai Tây Chiên Phô Mai', 'khoaitaychienphomai.jpg', 4, 25000, 80, '', 0, 0),
(17, 'Gà Rán + Khoai Tây Chiên ', 'garanvakhoaitaychien.jpg', 5, 49000, 30, '', 0, 0),
(18, 'Cánh Gà Rán', 'canhgaran.jpg', 1, 29000, 15, '', 0, 0),
(19, 'Combo Gà Rán', 'combogaran.jpg', 5, 79000, 10, '', 0, 0),
(20, 'Mì Ý Tương Đen', 'mytuongden.jpg', 3, 39000, 12, '', 0, 0),
(21, 'Combo Đặt Biệt', 'combodatbiet.jpg', 5, 299000, 8, '', 0, 0),
(22, 'Gà Rán + Mì Ý', 'garanvamyy.jpg', 5, 69000, 5, '', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `mand` int(11) NOT NULL,
  `tennd` varchar(50) NOT NULL,
  `ngaysinh` date DEFAULT NULL,
  `gioitinh` tinyint(1) DEFAULT NULL,
  `sodienthoai` varchar(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `diachi` varchar(50) NOT NULL,
  `matkhau` varchar(50) NOT NULL,
  `mavaitro` int(11) NOT NULL,
  `mach` int(11) NOT NULL,
  `mattlv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`mand`, `tennd`, `ngaysinh`, `gioitinh`, `sodienthoai`, `email`, `diachi`, `matkhau`, `mavaitro`, `mach`, `mattlv`) VALUES
(1, 'Nguyễn Văn A', '1990-07-30', 0, '0987654321', 'qlcn1@gmail.com', 'Quận 1', '202cb962ac59075b964b07152d234b70', 1, 1, 1),
(2, 'Nguyễn Văn A', '1998-09-21', 1, '0987654321', 'qlcn1@gmail.com', 'Quận 1', '202cb962ac59075b964b07152d234b70', 2, 1, 1),
(3, 'Trần Thị B', '1999-05-04', 1, '0912345678', 'qlcn2@gmail.com', 'Quận 2', '202cb962ac59075b964b07152d234b70', 2, 2, 1),
(4, 'Lê Văn C', '1999-11-20', 1, '0934567890', 'qlcn3@gmail.com', 'Quận 3', '202cb962ac59075b964b07152d234b70', 2, 3, 1),
(5, 'Phạm Thị D', '2000-05-22', 1, '0945678901', 'qlcn4@gmail.com', 'Quận 4', '202cb962ac59075b964b07152d234b70', 2, 4, 1),
(6, 'Võ Văn E', '1996-03-19', 1, '0956789012', 'qlcn5@gmail.com', 'Quận 5', '202cb962ac59075b964b07152d234b70', 2, 5, 1),
(7, 'Nguyễn Văn A', '1993-07-09', 1, '0987654321', 'nvbhcn1a@gmail.com', 'Quận 1', '202cb962ac59075b964b07152d234b70', 3, 1, 1),
(8, 'Trần Thị B', '2002-06-19', 0, '0912345678', 'nvbhcn1b@gmail.com', 'Quận 1', '202cb962ac59075b964b07152d234b70', 3, 1, 1),
(9, 'Lê Văn C', '1992-02-20', 0, '0934567890', 'nvbhcn1c@gmail.com', 'Quận 1', '202cb962ac59075b964b07152d234b70', 3, 1, 1),
(10, 'Nguyễn Văn A', '1999-01-01', 0, '0987654321', 'nvbhcn2a@gmail.com', 'Quận 33333333333', '202cb962ac59075b964b07152d234b70', 3, 2, 1),
(11, 'Trần Thị B', '1992-07-03', 1, '0912345678', 'nvbhcn2b@gmail.com', 'Quận 2', '202cb962ac59075b964b07152d234b70', 3, 2, 1),
(12, 'Lê Văn C', '1997-12-30', 1, '0934567890', 'nvbhcn2c@gmail.com', 'Quận 2', '202cb962ac59075b964b07152d234b70', 3, 2, 1),
(13, 'Nguyễn Văn A', '2000-03-10', 0, '0987654321', 'nvbhcn3a@gmail.com', 'Quận 3', '202cb962ac59075b964b07152d234b70', 3, 3, 1),
(14, 'Trần Thị B', '2000-11-08', 0, '0912345678', 'nvbhcn3b@gmail.com', 'Quận 3', '202cb962ac59075b964b07152d234b70', 3, 3, 1),
(15, 'Lê Văn C', '1995-01-19', 1, '0934567890', 'nvbhcn3c@gmail.com', 'Quận 3', '202cb962ac59075b964b07152d234b70', 3, 3, 1),
(16, 'Nguyễn Văn A', '2002-08-01', 1, '0987654321', 'nvbhcn4a@gmail.com', 'Quận 4', '202cb962ac59075b964b07152d234b70', 3, 4, 1),
(17, 'Trần Thị B', '1996-04-09', 1, '0912345678', 'nvbhcn4b@gmail.com', 'Quận 4', '202cb962ac59075b964b07152d234b70', 3, 4, 1),
(18, 'Lê Văn C', '1996-02-24', 0, '0934567890', 'nvbhcn4c@gmail.com', 'Quận 4', '202cb962ac59075b964b07152d234b70', 3, 4, 1),
(19, 'Nguyễn Văn A', '1995-09-24', 1, '0987654321', 'nvbhcn5a@gmail.com', 'Quận 5', '202cb962ac59075b964b07152d234b70', 3, 5, 1),
(20, 'Trần Thị B', '1998-01-28', 0, '0912345678', 'nvbhcn5b@gmail.com', 'Quận 5', '202cb962ac59075b964b07152d234b70', 3, 5, 1),
(21, 'Lê Văn C', '1996-11-08', 0, '0934567890', 'nvbhcn5c@gmail.com', 'Quận 5', '202cb962ac59075b964b07152d234b70', 3, 5, 1),
(22, 'Nguyễn Văn A', '1999-11-04', 0, '0987654321', 'nvbcn1a@gmail.com', 'Quận 1', '202cb962ac59075b964b07152d234b70', 4, 1, 1),
(23, 'Trần Thị B', '1999-03-11', 1, '0912345678', 'nvbcn1b@gmail.com', 'Quận 1', '202cb962ac59075b964b07152d234b70', 4, 1, 1),
(24, 'Nguyễn Văn A', '2000-08-12', 1, '0987654321', 'nvbcn2a@gmail.com', 'Quận 2', '202cb962ac59075b964b07152d234b70', 4, 2, 1),
(25, 'Trần Thị B', '1993-07-08', 0, '0912345678', 'nvbcn2b@gmail.com', 'Quận 2', '202cb962ac59075b964b07152d234b70', 4, 2, 1),
(26, 'Nguyễn Văn A', '2003-06-07', 0, '0987654321', 'nvbcn3a@gmail.com', 'Quận 3', '202cb962ac59075b964b07152d234b70', 4, 3, 1),
(27, 'Trần Thị B', '1998-11-03', 0, '0912345678', 'nvbcn3b@gmail.com', 'Quận 3', '202cb962ac59075b964b07152d234b70', 4, 3, 1),
(28, 'Nguyễn Văn A', '2003-10-12', 1, '0987654321', 'nvbcn4a@gmail.com', 'Quận 4', '202cb962ac59075b964b07152d234b70', 4, 4, 1),
(29, 'Trần Thị B', '1991-04-09', 0, '0912345678', 'nvbcn4b@gmail.com', 'Quận 4', '202cb962ac59075b964b07152d234b70', 4, 4, 1),
(30, 'Nguyễn Văn A', '1995-02-07', 0, '0987654321', 'nvbcn5a@gmail.com', 'Quận 5', '202cb962ac59075b964b07152d234b70', 4, 5, 1),
(31, 'Trần Thị B', '1995-12-27', 0, '0912345678', 'nvbcn5b@gmail.com', 'Quận 5', '202cb962ac59075b964b07152d234b70', 4, 5, 1);

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
(1, 'Thịt gà', 80000, 'kg', 'NCC A', 'ncca@example.com', '0123456789'),
(2, 'Thịt heo', 90000, 'kg', 'NCC B', 'nccb@example.com', '0123456788'),
(3, 'Thịt bò', 150000, 'kg', 'NCC C', 'nccc@example.com', '0123456787'),
(4, 'Cá hồi', 300000, 'kg', 'NCC D', 'nccd@example.com', '0123456786'),
(5, 'Tôm', 200000, 'kg', 'NCC E', 'ncce@example.com', '0123456785'),
(6, 'Mực', 180000, 'kg', 'NCC F', 'nccf@example.com', '0123456784'),
(7, 'Cà chua', 20000, 'kg', 'NCC G', 'ncgg@example.com', '0123456783'),
(8, 'Bắp cải', 15000, 'kg', 'NCC H', 'nchh@example.com', '0123456782'),
(9, 'Rau xà lách', 25000, 'kg', 'NCC I', 'nci@example.com', '0123456781'),
(10, 'Ớt', 40000, 'kg', 'NCC J', 'ncj@example.com', '0123456780'),
(11, 'Hành', 30000, 'kg', 'NCC K', 'nck@example.com', '0123456790'),
(12, 'Tỏi', 35000, 'kg', 'NCC L', 'ncl@example.com', '0123456700'),
(13, 'Nấm', 50000, 'kg', 'NCC M', 'ncm@example.com', '0123456710'),
(14, 'Bí ngòi', 45000, 'kg', 'NCC N', 'ncn@example.com', '0123456720'),
(15, 'Đậu xanh', 25000, 'kg', 'NCC O', 'nco@example.com', '0123456730'),
(16, 'Đậu đỏ', 30000, 'kg', 'NCC P', 'ncp@example.com', '0123456740'),
(17, 'Nho', 60000, 'kg', 'NCC Q', 'ncq@example.com', '0123456750'),
(18, 'Cam', 50000, 'kg', 'NCC R', 'ncr@example.com', '0123456760'),
(19, 'Táo', 70000, 'kg', 'NCC S', 'ncs@example.com', '0123456770'),
(20, 'Chuối', 30000, 'kg', 'NCC T', 'nct@example.com', '0123456780');

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
-- Cấu trúc bảng cho bảng `time_gio`
--

CREATE TABLE `time_gio` (
  `magio` int(11) NOT NULL,
  `giobatdau` time NOT NULL,
  `gioketthuc` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `time_gio`
--

INSERT INTO `time_gio` (`magio`, `giobatdau`, `gioketthuc`) VALUES
(1, '07:00:00', '08:00:00'),
(2, '08:00:00', '09:00:00'),
(3, '09:00:00', '10:00:00'),
(4, '10:00:00', '11:00:00'),
(5, '11:00:00', '12:00:00'),
(6, '12:00:00', '13:00:00'),
(7, '13:00:00', '14:00:00'),
(8, '14:00:00', '15:00:00'),
(9, '15:00:00', '16:00:00'),
(10, '16:00:00', '17:00:00'),
(11, '17:00:00', '18:00:00'),
(12, '18:00:00', '19:00:00'),
(13, '19:00:00', '20:00:00'),
(14, '20:00:00', '21:00:00'),
(15, '21:00:00', '22:00:00'),
(16, '22:00:00', '23:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinhtrangdangkycalam`
--

CREATE TABLE `tinhtrangdangkycalam` (
  `mattdk` int(11) NOT NULL,
  `tendklich` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tinhtrangdangkycalam`
--

INSERT INTO `tinhtrangdangkycalam` (`mattdk`, `tendklich`) VALUES
(1, 'Chờ duyệt'),
(2, 'Đã duyệt'),
(3, 'Bị từ chối');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinhtrangdonhang`
--

CREATE TABLE `tinhtrangdonhang` (
  `mattdh` int(11) NOT NULL,
  `tenttdh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tinhtrangdonhang`
--

INSERT INTO `tinhtrangdonhang` (`mattdh`, `tenttdh`) VALUES
(1, 'Đã đặt hàng'),
(2, 'Đang chế biến'),
(3, 'Hoàn thành chế biến'),
(4, 'Đã thanh toán'),
(5, 'Đã hủy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trangthaicalam`
--

CREATE TABLE `trangthaicalam` (
  `matrangthaicalam` int(11) NOT NULL,
  `ngay` date DEFAULT NULL,
  `macalam` int(11) DEFAULT NULL,
  `soluongdangkybanhang` int(11) DEFAULT NULL,
  `soluongdangkybep` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trangthailamviec`
--

CREATE TABLE `trangthailamviec` (
  `mattlv` int(11) NOT NULL,
  `tenttlv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `trangthailamviec`
--

INSERT INTO `trangthailamviec` (`mattlv`, `tenttlv`) VALUES
(1, 'Đang làm việc'),
(2, 'Đã nghỉ việc');

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
  ADD PRIMARY KEY (`macalam`);

--
-- Chỉ mục cho bảng `chamcong`
--
ALTER TABLE `chamcong`
  ADD PRIMARY KEY (`machamcong`),
  ADD KEY `fk_calam` (`macalam`),
  ADD KEY `fk_nguoidung_chamcong` (`mand`),
  ADD KEY `fk_nvbh_chamcong` (`manvbh`),
  ADD KEY `fk_nvb_chamcong` (`manvb`);

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
-- Chỉ mục cho bảng `dangkycalam`
--
ALTER TABLE `dangkycalam`
  ADD PRIMARY KEY (`madkcl`);

--
-- Chỉ mục cho bảng `danhsachdexuat`
--
ALTER TABLE `danhsachdexuat`
  ADD PRIMARY KEY (`madexuat`),
  ADD KEY `fk_mand_dsdx` (`mand`);

--
-- Chỉ mục cho bảng `datban`
--
ALTER TABLE `datban`
  ADD PRIMARY KEY (`madb`),
  ADD KEY `fk_ban_datban` (`maban`),
  ADD KEY `fk_cuahang_datban` (`mach`),
  ADD KEY `fk_khachhang_datban` (`makh`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`madh`),
  ADD KEY `fk_cuahang_donhang` (`mach`),
  ADD KEY `fk_khachhang_donhang` (`makh`),
  ADD KEY `fk_ttdh_donhang` (`mattdh`),
  ADD KEY `fk_datban_donhang` (`madb`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`magiohang`),
  ADD KEY `fk_monan_giohang` (`mama`),
  ADD KEY `fk_makh_giohang` (`makh`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`makh`);

--
-- Chỉ mục cho bảng `khonguyenlieu`
--
ALTER TABLE `khonguyenlieu`
  ADD PRIMARY KEY (`NLCH_ID`),
  ADD KEY `fk_nguyenlieu` (`manl`),
  ADD KEY `fk_cuahang_kho` (`mach`);

--
-- Chỉ mục cho bảng `lichlamviec`
--
ALTER TABLE `lichlamviec`
  ADD PRIMARY KEY (`malamviec`);

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
  ADD KEY `fk_nguoidung_luong` (`mand`);

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
  ADD KEY `fk_cuahang_nguoidung` (`mach`),
  ADD KEY `fk_lamviec_nguoidung` (`mattlv`);

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
  ADD KEY `fk_nd_nvbh` (`mand`),
  ADD KEY `fk_ch_nvbh` (`mach`);

--
-- Chỉ mục cho bảng `nhanvienbep`
--
ALTER TABLE `nhanvienbep`
  ADD PRIMARY KEY (`manvb`),
  ADD KEY `fk_nd_nvb` (`mand`),
  ADD KEY `fk_ch_nvb` (`mach`);

--
-- Chỉ mục cho bảng `time_gio`
--
ALTER TABLE `time_gio`
  ADD PRIMARY KEY (`magio`);

--
-- Chỉ mục cho bảng `tinhtrangdangkycalam`
--
ALTER TABLE `tinhtrangdangkycalam`
  ADD PRIMARY KEY (`mattdk`);

--
-- Chỉ mục cho bảng `tinhtrangdonhang`
--
ALTER TABLE `tinhtrangdonhang`
  ADD PRIMARY KEY (`mattdh`);

--
-- Chỉ mục cho bảng `trangthaicalam`
--
ALTER TABLE `trangthaicalam`
  ADD PRIMARY KEY (`matrangthaicalam`);

--
-- Chỉ mục cho bảng `trangthailamviec`
--
ALTER TABLE `trangthailamviec`
  ADD PRIMARY KEY (`mattlv`);

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
  MODIFY `maban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT cho bảng `calam`
--
ALTER TABLE `calam`
  MODIFY `macalam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `chamcong`
--
ALTER TABLE `chamcong`
  MODIFY `machamcong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

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
-- AUTO_INCREMENT cho bảng `dangkycalam`
--
ALTER TABLE `dangkycalam`
  MODIFY `madkcl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhsachdexuat`
--
ALTER TABLE `danhsachdexuat`
  MODIFY `madexuat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `datban`
--
ALTER TABLE `datban`
  MODIFY `madb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `madh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `magiohang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `makh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `khonguyenlieu`
--
ALTER TABLE `khonguyenlieu`
  MODIFY `NLCH_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT cho bảng `lichlamviec`
--
ALTER TABLE `lichlamviec`
  MODIFY `malamviec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

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
-- AUTO_INCREMENT cho bảng `time_gio`
--
ALTER TABLE `time_gio`
  MODIFY `magio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `tinhtrangdangkycalam`
--
ALTER TABLE `tinhtrangdangkycalam`
  MODIFY `mattdk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tinhtrangdonhang`
--
ALTER TABLE `tinhtrangdonhang`
  MODIFY `mattdh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `trangthailamviec`
--
ALTER TABLE `trangthailamviec`
  MODIFY `mattlv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Các ràng buộc cho bảng `chamcong`
--
ALTER TABLE `chamcong`
  ADD CONSTRAINT `fk_calam` FOREIGN KEY (`macalam`) REFERENCES `calam` (`macalam`),
  ADD CONSTRAINT `fk_nguoidung_chamcong` FOREIGN KEY (`mand`) REFERENCES `nguoidung` (`mand`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nvb_chamcong` FOREIGN KEY (`manvb`) REFERENCES `nhanvienbe` (`manvb`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nvbh_chamcong` FOREIGN KEY (`manvbh`) REFERENCES `nhanvienbanhang` (`manvbh`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `fk_donhang` FOREIGN KEY (`madh`) REFERENCES `donhang` (`madh`),
  ADD CONSTRAINT `fk_monan` FOREIGN KEY (`mama`) REFERENCES `monan` (`mama`);

--
-- Các ràng buộc cho bảng `danhsachdexuat`
--
ALTER TABLE `danhsachdexuat`
  ADD CONSTRAINT `fk_mand_dsdx` FOREIGN KEY (`mand`) REFERENCES `nguoidung` (`mand`);

--
-- Các ràng buộc cho bảng `datban`
--
ALTER TABLE `datban`
  ADD CONSTRAINT `fk_ban_datban` FOREIGN KEY (`maban`) REFERENCES `ban` (`maban`),
  ADD CONSTRAINT `fk_cuahang_datban` FOREIGN KEY (`mach`) REFERENCES `cuahang` (`mach`),
  ADD CONSTRAINT `fk_khachhang_datban` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `fk_cuahang_donhang` FOREIGN KEY (`mach`) REFERENCES `cuahang` (`mach`),
  ADD CONSTRAINT `fk_datban_donhang` FOREIGN KEY (`madb`) REFERENCES `datban` (`madb`),
  ADD CONSTRAINT `fk_khachhang_donhang` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`),
  ADD CONSTRAINT `fk_ttdh_donhang` FOREIGN KEY (`mattdh`) REFERENCES `tinhtrangdonhang` (`mattdh`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `fk_makh_giohang` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`),
  ADD CONSTRAINT `fk_monan_giohang` FOREIGN KEY (`mama`) REFERENCES `monan` (`mama`);

--
-- Các ràng buộc cho bảng `khonguyenlieu`
--
ALTER TABLE `khonguyenlieu`
  ADD CONSTRAINT `fk_cuahang_kho` FOREIGN KEY (`mach`) REFERENCES `cuahang` (`mach`);

--
-- Các ràng buộc cho bảng `luong`
--
ALTER TABLE `luong`
  ADD CONSTRAINT `fk_nguoidung_luong` FOREIGN KEY (`mand`) REFERENCES `nguoidung` (`mand`);

--
-- Các ràng buộc cho bảng `monan`
--
ALTER TABLE `monan`
  ADD CONSTRAINT `fk_loaima` FOREIGN KEY (`maloaima`) REFERENCES `loaimonan` (`maloaima`);

--
-- Các ràng buộc cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `fk_cuahang_nguoidung` FOREIGN KEY (`mach`) REFERENCES `cuahang` (`mach`),
  ADD CONSTRAINT `fk_lamviec_nguoidung` FOREIGN KEY (`mattlv`) REFERENCES `trangthailamviec` (`mattlv`);

--
-- Các ràng buộc cho bảng `nhanvienbanhang`
--
ALTER TABLE `nhanvienbanhang`
  ADD CONSTRAINT `fk_ch_nvbh` FOREIGN KEY (`mach`) REFERENCES `cuahang` (`mach`),
  ADD CONSTRAINT `fk_nd_nvbh` FOREIGN KEY (`mand`) REFERENCES `nguoidung` (`mand`);

--
-- Các ràng buộc cho bảng `nhanvienbep`
--
ALTER TABLE `nhanvienbep`
  ADD CONSTRAINT `fk_ch_nvb` FOREIGN KEY (`mach`) REFERENCES `cuahang` (`mach`),
  ADD CONSTRAINT `fk_nd_nvb` FOREIGN KEY (`mand`) REFERENCES `nguoidung` (`mand`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
