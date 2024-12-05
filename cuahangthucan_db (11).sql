-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 05, 2024 lúc 03:45 AM
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
  `trangthai` varchar(50) NOT NULL,
  `mach` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ban`
--

INSERT INTO `ban` (`maban`, `tenban`, `trangthai`, `mach`) VALUES
(44, 'Bàn Số 1', 'Trống', 1),
(45, 'Bàn Số 2', 'Trống', 1),
(46, 'Bàn Số 3', 'Trống', 1),
(47, 'Bàn Số 4', 'Trống', 1),
(48, 'Bàn Số 5', 'Đã đặt', 1),
(49, 'Bàn Số 6', 'Đã đặt', 1),
(50, 'Bàn Số 7', 'Trống', 1),
(51, 'Bàn Số 8', 'Trống', 1),
(52, 'Bàn Số 9', 'Đã đặt', 1),
(53, 'Bàn Số 10', 'Đã đặt', 1),
(54, 'Bàn Số 11', 'Đã đặt', 1),
(55, 'Bàn Số 12', 'Trống', 1),
(68, 'Bàn Số 1', 'Đã đặt', 2),
(69, 'Bàn Số 2', 'Đã đặt', 2),
(70, 'Bàn Số 3', 'Đã đặt', 2),
(71, 'Bàn Số 4', 'Trống', 2),
(72, 'Bàn Số 5', 'Trống', 2),
(73, 'Bàn Số 6', 'Trống', 2),
(74, 'Bàn Số 7', 'Đã đặt', 2),
(75, 'Bàn Số 8', 'Đã đặt', 2),
(76, 'Bàn Số 9', 'Trống', 2),
(77, 'Bàn Số 10', 'Đã đặt', 2),
(78, 'Bàn Số 11', 'Trống', 2),
(79, 'Bàn Số 12', 'Đã đặt', 2),
(80, 'Bàn Số 1', 'Trống', 3),
(81, 'Bàn Số 2', 'Đã đặt', 3),
(82, 'Bàn Số 3', 'Đã đặt', 3),
(83, 'Bàn Số 4', 'Đã đặt', 3),
(84, 'Bàn Số 5', 'Đã đặt', 3),
(85, 'Bàn Số 6', 'Trống', 3),
(86, 'Bàn Số 7', 'Đã đặt', 3),
(87, 'Bàn Số 8', 'Trống', 3),
(88, 'Bàn Số 9', 'Đã đặt', 3),
(89, 'Bàn Số 10', 'Trống', 3),
(90, 'Bàn Số 11', 'Đã đặt', 3),
(91, 'Bàn Số 12', 'Đã đặt', 3),
(92, 'Bàn Số 1', 'Đã đặt', 4),
(93, 'Bàn Số 2', 'Đã đặt', 4),
(94, 'Bàn Số 3', 'Trống', 4),
(95, 'Bàn Số 4', 'Đã đặt', 4),
(96, 'Bàn Số 5', 'Đã đặt', 4),
(97, 'Bàn Số 6', 'Đã đặt', 4),
(98, 'Bàn Số 7', 'Đã đặt', 4),
(99, 'Bàn Số 8', 'Trống', 4),
(100, 'Bàn Số 9', 'Đã đặt', 4),
(101, 'Bàn Số 10', 'Đã đặt', 4),
(102, 'Bàn Số 11', 'Trống', 4),
(103, 'Bàn Số 12', 'Đã đặt', 4),
(104, 'Bàn Số 1', 'Trống', 5),
(105, 'Bàn Số 2', 'Trống', 5),
(106, 'Bàn Số 3', 'Đã đặt', 5),
(107, 'Bàn Số 4', 'Trống', 5),
(108, 'Bàn Số 5', 'Đã đặt', 5),
(109, 'Bàn Số 6', 'Trống', 5),
(110, 'Bàn Số 7', 'Trống', 5),
(111, 'Bàn Số 8', 'Đã đặt', 5),
(112, 'Bàn Số 9', 'Đã đặt', 5),
(113, 'Bàn Số 10', 'Trống', 5),
(114, 'Bàn Số 11', 'Đã đặt', 5),
(115, 'Bàn Số 12', 'Trống', 5);

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
  `thoigianvao` time DEFAULT NULL,
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
(28, 4, '2024-01-04', NULL, 'Có mặt', NULL, 8, 2, 0),
(67, 1, '2024-11-21', '09:31:35', 'có mặt', 'ddur', 10, 0, 0),
(68, 1, '2024-11-21', '09:31:50', 'có mặt', 'co mat', 10, 0, 0),
(69, 4, '2024-11-21', '09:32:13', 'vắng', 'vang', 10, 0, 0),
(70, 1, '2024-11-21', '10:11:15', 'có mặt', '', 7, 0, 0),
(71, 4, '2024-11-21', '10:11:32', 'vắng', '', 22, 0, 0);

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
  `mama` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`mactdh`, `giamgia`, `soluong`, `dongia`, `ghichu`, `madh`, `mama`) VALUES
(1, 5000, 2, 75000, 'Không lấy tương ớt mà hãy lấy tương cà', 1, 1),
(2, 0, 1, 15000, 'Không lấy đá', 2, 6),
(3, 10000, 1, 90000, NULL, 3, 11),
(5, 0, 1, 29000, NULL, 12, 1),
(6, 0, 1, 29000, NULL, 13, 1),
(7, 0, 1, 25000, '123', 14, 16);

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
  `ngaydangky` date NOT NULL,
  `macalam` int(11) NOT NULL,
  `mattdk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dangkycalam`
--

INSERT INTO `dangkycalam` (`madkcl`, `mand`, `ngaydangky`, `macalam`, `mattdk`) VALUES
(4, 7, '2024-12-02', 1, 1),
(5, 7, '2024-12-02', 3, 1),
(9, 22, '2024-12-02', 1, 1),
(10, 22, '2024-12-02', 3, 1);

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
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `madh` int(11) NOT NULL,
  `ngaydat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `mattdh` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `mach` int(11) NOT NULL,
  `tennguoinhan` varchar(255) DEFAULT NULL,
  `sdtnguoinhan` varchar(255) DEFAULT NULL,
  `diachinguoinhan` varchar(255) DEFAULT NULL,
  `emailnguoinhan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`magiohang`, `mama`, `soluong`, `dongia`, `makh`) VALUES
(1, 2, 2, 33000, 1),
(2, 4, 1, 190000, 1),
(3, 6, 9, 15000, 1),
(4, 16, 79, 25000, 1),
(5, 16, 1, 25000, 1),
(6, 2, 50, 33000, 2),
(8, 1, 1, 29000, 35);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `makh` int(11) NOT NULL,
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

INSERT INTO `khachhang` (`makh`, `tennd`, `sodienthoai`, `email`, `diachi`, `matkhau`, `mavaitro`, `ngaysinh`, `gioitinh`) VALUES
(1, 'Nguyễn Văn A', '0987654321', 'khcn1a@gmail.com', 'Quận 1', '202cb962ac59075b964b07152d234b70', 5, '1992-05-16', 1),
(2, 'Trần Thị B', '0912345678', 'khcn1b@gmail.com', 'Quận 1', '202cb962ac59075b964b07152d234b70', 5, '1994-11-22', 0),
(3, 'Nguyễn Văn A', '0987654321', 'khcn2a@gmail.com', 'Quận 2', '202cb962ac59075b964b07152d234b70', 5, '1990-07-10', 1),
(4, 'Trần Thị B', '0912345678', 'khcn2b@gmail.com', 'Quận 2', '202cb962ac59075b964b07152d234b70', 5, '1998-09-15', 0),
(5, 'Nguyễn Văn A', '0987654321', 'khcn3a@gmail.com', 'Quận 3', '202cb962ac59075b964b07152d234b70', 5, '1995-12-01', 1),
(6, 'Trần Thị B', '0912345678', 'khcn3b@gmail.com', 'Quận 3', '202cb962ac59075b964b07152d234b70', 5, '1993-03-17', 0),
(7, 'Nguyễn Văn A', '0987654321', 'khcn4a@gmail.com', 'Quận 4', '202cb962ac59075b964b07152d234b70', 5, '1991-06-20', 1),
(8, 'Trần Thị B', '0912345678', 'khcn4b@gmail.com', 'Quận 4', '202cb962ac59075b964b07152d234b70', 5, '1996-10-08', 0),
(9, 'Nguyễn Văn A', '0987654321', 'khcn5a@gmail.com', 'Quận 5', '202cb962ac59075b964b07152d234b70', 5, '2000-01-25', 1),
(10, 'Trần Thị B', '0912345678', NULL, 'Quận 5', NULL, 5, '1999-11-30', 0),
(34, 'aaaaa', '099299222', NULL, '424 haa', NULL, 5, '2002-12-12', 1),
(35, 'hoangan292', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'Hoàng Ann', '0912328222', 'a@gmail.com', '123', '202cb962ac59075b964b07152d234b70', 5, '2002-02-18', 1),
(37, 'Hoàng An', '0912328222', NULL, '123', NULL, 5, '2002-02-18', 1),
(38, 'Hoàng A', '0912328222', NULL, '123', NULL, 5, '2002-02-19', 1),
(39, 'Hoàng Ann', '99999999999', NULL, '123', NULL, 5, '2002-12-12', 1),
(40, 'Hoàng An', '423423423', 'ad@gmail.com', '123', '202cb962ac59075b964b07152d234b70', 5, '2002-02-22', 1),
(41, 'Hoàng An', '0912328222', 'ad@gmail.com', '123', '202cb962ac59075b964b07152d234b70', 5, '2002-02-02', 1),
(42, 'Hoàng An', '0912328222', 'ad@gmail.com', '123', '202cb962ac59075b964b07152d234b70', 5, '2024-12-03', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khomonan`
--

CREATE TABLE `khomonan` (
  `makhoma` int(11) NOT NULL,
  `mach` int(11) NOT NULL,
  `mama` int(11) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khomonan`
--

INSERT INTO `khomonan` (`makhoma`, `mach`, `mama`, `soluong`) VALUES
(1, 1, 1, 20),
(2, 2, 1, 49),
(3, 3, 1, 75),
(4, 4, 1, 18),
(5, 5, 1, 57),
(6, 1, 2, 19),
(7, 2, 2, 18),
(8, 3, 2, 20),
(9, 4, 2, 37),
(10, 5, 2, 17),
(11, 1, 3, 65),
(12, 2, 3, 62),
(13, 3, 3, 108),
(14, 4, 3, 42),
(15, 5, 3, 77),
(16, 1, 4, 50),
(17, 2, 4, 107),
(18, 3, 4, 79),
(19, 4, 4, 63),
(20, 5, 4, 67),
(21, 1, 18, 38),
(22, 2, 18, 78),
(23, 3, 18, 67),
(24, 4, 18, 91),
(25, 5, 18, 46),
(26, 1, 6, 47),
(27, 2, 6, 86),
(28, 3, 6, 80),
(29, 4, 6, 33),
(30, 5, 6, 13),
(31, 1, 7, 60),
(32, 2, 7, 49),
(33, 3, 7, 56),
(34, 4, 7, 25),
(35, 5, 7, 48),
(36, 1, 8, 55),
(37, 2, 8, 23),
(38, 3, 8, 38),
(39, 4, 8, 12),
(40, 5, 8, 37),
(41, 1, 9, 38),
(42, 2, 9, 72),
(43, 3, 9, 36),
(44, 4, 9, 56),
(45, 5, 9, 60),
(46, 1, 11, 22),
(47, 2, 11, 20),
(48, 3, 11, 27),
(49, 4, 11, 66),
(50, 5, 11, 39),
(51, 1, 12, 85),
(52, 2, 12, 100),
(53, 3, 12, 37),
(54, 4, 12, 73),
(55, 5, 12, 47),
(56, 1, 13, 106),
(57, 2, 13, 79),
(58, 3, 13, 68),
(59, 4, 13, 93),
(60, 5, 13, 52),
(61, 1, 20, 73),
(62, 2, 20, 99),
(63, 3, 20, 64),
(64, 4, 20, 16),
(65, 5, 20, 78),
(66, 1, 15, 34),
(67, 2, 15, 26),
(68, 3, 15, 18),
(69, 4, 15, 102),
(70, 5, 15, 49),
(71, 1, 16, 27),
(72, 2, 16, 78),
(73, 3, 16, 100),
(74, 4, 16, 57),
(75, 5, 16, 74),
(76, 1, 5, 89),
(77, 2, 5, 15),
(78, 3, 5, 96),
(79, 4, 5, 28),
(80, 5, 5, 43),
(81, 1, 10, 19),
(82, 2, 10, 56),
(83, 3, 10, 16),
(84, 4, 10, 101),
(85, 5, 10, 46),
(86, 1, 14, 20),
(87, 2, 14, 51),
(88, 3, 14, 86),
(89, 4, 14, 67),
(90, 5, 14, 68),
(91, 1, 17, 31),
(92, 2, 17, 42),
(93, 3, 17, 108),
(94, 4, 17, 103),
(95, 5, 17, 80),
(96, 1, 19, 82),
(97, 2, 19, 61),
(98, 3, 19, 47),
(99, 4, 19, 46),
(100, 5, 19, 79),
(101, 1, 21, 49),
(102, 2, 21, 95),
(103, 3, 21, 20),
(104, 4, 21, 105),
(105, 5, 21, 55),
(106, 1, 22, 50),
(107, 2, 22, 77),
(108, 3, 22, 26),
(109, 4, 22, 87),
(110, 5, 22, 50);

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
  `SoLuongHienCo` int(11) DEFAULT NULL,
  `TinhTrang` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khonguyenlieu`
--

INSERT INTO `khonguyenlieu` (`NLCH_ID`, `mach`, `manl`, `NgayNhap`, `SoLuongBoSung`, `SoLuongHienCo`, `TinhTrang`) VALUES
(150, 1, 1, '2024-11-16', 0, 0, 'Hết hàng'),
(151, 1, 2, '2024-11-16', 0, 0, 'Hết hàng'),
(152, 1, 3, '2024-11-16', 0, 100, 'Còn hàng'),
(153, 1, 4, '2024-11-16', 0, 150, 'Còn hàng'),
(154, 1, 5, '2024-11-16', 0, 90, 'Còn hàng'),
(155, 1, 6, '2024-11-16', 0, 100, 'Còn hàng'),
(156, 1, 7, '2024-11-16', 0, 200, 'Còn hàng'),
(157, 1, 8, '2024-11-16', 0, 230, 'Còn hàng'),
(158, 1, 9, '2024-11-16', 0, 150, 'Còn hàng'),
(159, 1, 10, '2024-11-16', 0, 140, 'Còn hàng'),
(160, 1, 11, '2024-11-16', 0, 320, 'Còn hàng'),
(161, 1, 12, '2024-11-16', 0, 0, 'Hết hàng'),
(162, 1, 13, '2024-11-16', 0, 130, 'Còn hàng'),
(163, 1, 14, '2024-11-16', 0, 0, 'Hết hàng'),
(164, 1, 15, '2024-11-16', 0, 130, 'Còn hàng'),
(165, 1, 16, '2024-11-16', 0, 0, 'Hết hàng'),
(166, 1, 17, '2024-11-16', 0, 300, 'Còn hàng'),
(167, 1, 18, '2024-11-16', 0, 200, 'Còn hàng'),
(168, 1, 19, '2024-11-16', 200, 0, 'Hết hàng'),
(169, 1, 20, '2024-11-16', 200, 0, 'Hết hàng'),
(170, 1, 21, '2024-11-16', 0, 0, 'Hết hàng'),
(171, 2, 1, '2024-11-16', 0, 110, 'Còn hàng'),
(172, 2, 2, '2024-11-16', 0, 130, 'Còn hàng'),
(173, 2, 3, '2024-11-16', 0, 120, 'Còn hàng'),
(174, 2, 4, '2024-11-16', 0, 0, 'Hết hàng'),
(175, 2, 5, '2024-11-16', 0, 0, 'Hết hàng'),
(176, 2, 6, '2024-11-16', 0, 90, 'Còn hàng'),
(177, 2, 7, '2024-11-16', 0, 210, 'Còn hàng'),
(178, 2, 8, '2024-11-16', 0, 240, 'Còn hàng'),
(179, 2, 9, '2024-11-16', 0, 160, 'Còn hàng'),
(180, 2, 10, '2024-11-16', 0, 150, 'Còn hàng'),
(181, 2, 11, '2024-11-16', 0, 310, 'Còn hàng'),
(182, 2, 12, '2024-11-16', 0, 120, 'Còn hàng'),
(183, 2, 13, '2024-11-16', 0, 130, 'Còn hàng'),
(184, 2, 14, '2024-11-16', 0, 130, 'Còn hàng'),
(185, 2, 15, '2024-11-16', 0, 330, 'Còn hàng'),
(186, 2, 16, '2024-11-16', 0, 310, 'Còn hàng'),
(187, 2, 17, '2024-11-16', 0, 290, 'Còn hàng'),
(188, 2, 18, '2024-11-16', 0, 180, 'Còn hàng'),
(189, 2, 19, '2024-11-16', 0, 520, 'Còn hàng'),
(190, 2, 20, '2024-11-16', 0, 280, 'Còn hàng'),
(191, 2, 21, '2024-11-16', 0, 130, 'Còn hàng'),
(192, 3, 1, '2024-11-20', 0, 132, 'Còn hàng'),
(193, 3, 2, '2024-11-16', 0, 130, 'Còn hàng'),
(194, 3, 3, '2024-11-16', 0, 110, 'Còn hàng'),
(195, 3, 4, '2024-11-16', 0, 160, 'Còn hàng'),
(196, 3, 5, '2024-11-16', 0, 90, 'Còn hàng'),
(197, 3, 6, '2024-11-16', 0, 100, 'Còn hàng'),
(198, 3, 7, '2024-11-16', 0, 220, 'Còn hàng'),
(199, 3, 8, '2024-11-16', 0, 250, 'Còn hàng'),
(200, 3, 9, '2024-11-16', 0, 170, 'Còn hàng'),
(201, 3, 10, '2024-11-16', 0, 160, 'Còn hàng'),
(202, 3, 11, '2024-11-16', 0, 320, 'Còn hàng'),
(203, 3, 12, '2024-11-16', 0, 130, 'Còn hàng'),
(204, 3, 13, '2024-11-16', 0, 140, 'Còn hàng'),
(205, 3, 14, '2024-11-16', 0, 120, 'Còn hàng'),
(206, 3, 15, '2024-11-16', 0, 340, 'Còn hàng'),
(207, 3, 16, '2024-11-16', 0, 330, 'Còn hàng'),
(208, 3, 17, '2024-11-16', 0, 300, 'Còn hàng'),
(209, 3, 18, '2024-11-16', 0, 320, 'Còn hàng'),
(210, 3, 19, '2024-11-16', 0, 530, 'Còn hàng'),
(211, 3, 20, '2024-11-16', 0, 290, 'Còn hàng'),
(212, 3, 21, '2024-11-16', 0, 140, 'Còn hàng'),
(213, 4, 1, '2024-11-16', 0, 120, 'Còn hàng'),
(214, 4, 2, '2024-11-16', 0, 130, 'Còn hàng'),
(215, 4, 3, '2024-11-16', 0, 110, 'Còn hàng'),
(216, 4, 4, '2024-11-16', 0, 160, 'Còn hàng'),
(217, 4, 5, '2024-11-16', 0, 90, 'Còn hàng'),
(218, 4, 6, '2024-11-16', 0, 100, 'Còn hàng'),
(219, 4, 7, '2024-11-16', 0, 210, 'Còn hàng'),
(220, 4, 8, '2024-11-16', 0, 250, 'Còn hàng'),
(221, 4, 9, '2024-11-16', 0, 160, 'Còn hàng'),
(222, 4, 10, '2024-11-16', 0, 150, 'Còn hàng'),
(223, 4, 11, '2024-11-16', 0, 310, 'Còn hàng'),
(224, 4, 12, '2024-11-16', 0, 120, 'Còn hàng'),
(225, 4, 13, '2024-11-16', 0, 130, 'Còn hàng'),
(226, 4, 14, '2024-11-16', 0, 120, 'Còn hàng'),
(227, 4, 15, '2024-11-16', 0, 330, 'Còn hàng'),
(228, 4, 16, '2024-11-16', 0, 310, 'Còn hàng'),
(229, 4, 17, '2024-11-16', 0, 300, 'Còn hàng'),
(230, 4, 18, '2024-11-16', 0, 320, 'Còn hàng'),
(231, 4, 19, '2024-11-16', 0, 520, 'Còn hàng'),
(232, 4, 20, '2024-11-16', 0, 280, 'Còn hàng'),
(233, 4, 21, '2024-11-16', 0, 130, 'Còn hàng'),
(234, 5, 1, '2024-11-16', 0, 100, 'Còn hàng'),
(235, 5, 2, '2024-11-16', 0, 110, 'Còn hàng'),
(236, 5, 3, '2024-11-16', 0, 90, 'Còn hàng'),
(237, 5, 4, '2024-11-16', 0, 130, 'Còn hàng'),
(238, 5, 5, '2024-11-16', 0, 80, 'Còn hàng'),
(239, 5, 6, '2024-11-16', 0, 90, 'Còn hàng'),
(240, 5, 7, '2024-11-16', 0, 200, 'Còn hàng'),
(241, 5, 8, '2024-11-16', 0, 230, 'Còn hàng'),
(242, 5, 9, '2024-11-16', 0, 150, 'Còn hàng'),
(243, 5, 10, '2024-11-16', 0, 140, 'Còn hàng'),
(244, 5, 11, '2024-11-16', 0, 300, 'Còn hàng'),
(245, 5, 12, '2024-11-16', 0, 110, 'Còn hàng'),
(246, 5, 13, '2024-11-16', 0, 120, 'Còn hàng'),
(247, 5, 14, '2024-11-16', 0, 120, 'Còn hàng'),
(248, 5, 15, '2024-11-16', 0, 320, 'Còn hàng'),
(249, 5, 16, '2024-11-16', 0, 300, 'Còn hàng'),
(250, 5, 17, '2024-11-16', 0, 280, 'Còn hàng'),
(251, 5, 18, '2024-11-16', 0, 300, 'Còn hàng'),
(252, 5, 19, '2024-11-16', 0, 510, 'Còn hàng'),
(253, 5, 20, '2024-11-16', 0, 290, 'Còn hàng'),
(254, 5, 21, '2024-11-16', 0, 130, 'Còn hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichlamviec`
--

CREATE TABLE `lichlamviec` (
  `malamviec` int(11) NOT NULL,
  `cocalam` text DEFAULT NULL,
  `mand` int(11) NOT NULL,
  `ngaylamviec` date NOT NULL,
  `macalam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lichlamviec`
--

INSERT INTO `lichlamviec` (`malamviec`, `cocalam`, `mand`, `ngaylamviec`, `macalam`) VALUES
(1, 'Có ca làm', 7, '2024-11-04', 1),
(2, 'Có ca làm', 8, '2024-11-04', 1),
(3, 'Có ca làm', 9, '2024-11-04', 1),
(4, 'Có ca làm', 22, '2024-11-04', 1),
(5, 'Có ca làm', 23, '2024-11-04', 1),
(6, 'Có ca làm', 7, '2024-11-04', 2),
(7, 'Có ca làm', 8, '2024-11-04', 2),
(8, 'Có ca làm', 9, '2024-11-04', 2),
(9, 'Có ca làm', 24, '2024-11-04', 2),
(10, 'Có ca làm', 25, '2024-11-04', 2),
(11, 'Có ca làm', 7, '2024-11-04', 3),
(12, 'Có ca làm', 8, '2024-11-04', 3),
(13, 'Có ca làm', 9, '2024-11-04', 3),
(14, 'Có ca làm', 22, '2024-11-04', 3),
(15, 'Có ca làm', 23, '2024-11-04', 3),
(16, 'Có ca làm', 7, '2024-11-04', 4),
(17, 'Có ca làm', 8, '2024-11-04', 4),
(18, 'Có ca làm', 9, '2024-11-04', 4),
(19, 'Có ca làm', 24, '2024-11-04', 4),
(20, 'Có ca làm', 25, '2024-11-04', 4),
(21, 'Có ca làm', 7, '2024-11-05', 1),
(22, 'Có ca làm', 8, '2024-11-05', 1),
(23, 'Có ca làm', 9, '2024-11-05', 1),
(24, 'Có ca làm', 22, '2024-11-05', 1),
(25, 'Có ca làm', 23, '2024-11-05', 1),
(26, 'Có ca làm', 7, '2024-11-05', 2),
(27, 'Có ca làm', 8, '2024-11-05', 2),
(28, 'Có ca làm', 9, '2024-11-05', 2),
(29, 'Có ca làm', 24, '2024-11-05', 2),
(30, 'Có ca làm', 25, '2024-11-05', 2),
(31, 'Có ca làm', 7, '2024-11-05', 3),
(32, 'Có ca làm', 8, '2024-11-05', 3),
(33, 'Có ca làm', 9, '2024-11-05', 3),
(34, 'Có ca làm', 22, '2024-11-05', 3),
(35, 'Có ca làm', 23, '2024-11-05', 3),
(36, 'Có ca làm', 7, '2024-11-05', 4),
(37, 'Có ca làm', 8, '2024-11-05', 4),
(38, 'Có ca làm', 9, '2024-11-05', 4),
(39, 'Có ca làm', 24, '2024-11-05', 4),
(40, 'Có ca làm', 25, '2024-11-05', 4),
(41, 'Có ca làm', 7, '2024-11-06', 1),
(42, 'Có ca làm', 8, '2024-11-06', 1),
(43, 'Có ca làm', 9, '2024-11-06', 1),
(44, 'Có ca làm', 22, '2024-11-06', 1),
(45, 'Có ca làm', 23, '2024-11-06', 1),
(46, 'Có ca làm', 7, '2024-11-06', 2),
(47, 'Có ca làm', 8, '2024-11-06', 2),
(48, 'Có ca làm', 9, '2024-11-06', 2),
(49, 'Có ca làm', 24, '2024-11-06', 2),
(50, 'Có ca làm', 25, '2024-11-06', 2),
(51, 'Có ca làm', 7, '2024-11-06', 3),
(52, 'Có ca làm', 8, '2024-11-06', 3),
(53, 'Có ca làm', 9, '2024-11-06', 3),
(54, 'Có ca làm', 22, '2024-11-06', 3),
(55, 'Có ca làm', 23, '2024-11-06', 3),
(56, 'Có ca làm', 7, '2024-11-06', 4),
(57, 'Có ca làm', 8, '2024-11-06', 4),
(58, 'Có ca làm', 9, '2024-11-06', 4),
(59, 'Có ca làm', 24, '2024-11-06', 4),
(60, 'Có ca làm', 25, '2024-11-06', 4),
(61, 'Có ca làm', 7, '2024-11-07', 1),
(62, 'Có ca làm', 8, '2024-11-07', 1),
(63, 'Có ca làm', 9, '2024-11-07', 1),
(64, 'Có ca làm', 22, '2024-11-07', 1),
(65, 'Có ca làm', 23, '2024-11-07', 1),
(66, 'Có ca làm', 7, '2024-11-07', 2),
(67, 'Có ca làm', 8, '2024-11-07', 2),
(68, 'Có ca làm', 9, '2024-11-07', 2),
(69, 'Có ca làm', 24, '2024-11-07', 2),
(70, 'Có ca làm', 25, '2024-11-07', 2),
(71, 'Có ca làm', 7, '2024-11-07', 3),
(72, 'Có ca làm', 8, '2024-11-07', 3),
(73, 'Có ca làm', 9, '2024-11-07', 3),
(74, 'Có ca làm', 22, '2024-11-07', 3),
(75, 'Có ca làm', 23, '2024-11-07', 3),
(76, 'Có ca làm', 7, '2024-11-07', 4),
(77, 'Có ca làm', 8, '2024-11-07', 4),
(78, 'Có ca làm', 9, '2024-11-07', 4),
(79, 'Có ca làm', 24, '2024-11-07', 4),
(80, 'Có ca làm', 25, '2024-11-07', 4),
(81, 'Có ca làm', 7, '2024-11-08', 1),
(82, 'Có ca làm', 8, '2024-11-08', 1),
(83, 'Có ca làm', 9, '2024-11-08', 1),
(84, 'Có ca làm', 22, '2024-11-08', 1),
(85, 'Có ca làm', 23, '2024-11-08', 1),
(86, 'Có ca làm', 7, '2024-11-08', 2),
(87, 'Có ca làm', 8, '2024-11-08', 2),
(88, 'Có ca làm', 9, '2024-11-08', 2),
(89, 'Có ca làm', 24, '2024-11-08', 2),
(90, 'Có ca làm', 25, '2024-11-08', 2),
(101, 'Có ca làm', 7, '2024-11-11', 1),
(102, 'Có ca làm', 22, '2024-11-11', 1),
(103, 'Có ca làm', 8, '2024-11-11', 2),
(104, 'Có ca làm', 9, '2024-11-12', 1),
(105, 'Có ca làm', 23, '2024-11-12', 2),
(106, 'Có ca làm', 7, '2024-11-13', 1),
(107, 'Có ca làm', 22, '2024-11-13', 3),
(108, 'Có ca làm', 8, '2024-11-14', 1),
(109, 'Có ca làm', 24, '2024-11-14', 2),
(110, 'Có ca làm', 21, '2024-11-15', 1),
(111, 'Có ca làm', 23, '2024-11-15', 2),
(112, 'Có ca làm', 7, '2024-11-09', 1),
(113, 'Có ca làm', 8, '2024-11-09', 1),
(114, 'Có ca làm', 9, '2024-11-09', 1),
(115, 'Có ca làm', 22, '2024-11-09', 1),
(116, 'Có ca làm', 23, '2024-11-09', 1),
(117, 'Có ca làm', 7, '2024-11-09', 2),
(118, 'Có ca làm', 8, '2024-11-09', 2),
(119, 'Có ca làm', 9, '2024-11-09', 2),
(120, 'Có ca làm', 24, '2024-11-09', 2),
(121, 'Có ca làm', 25, '2024-11-09', 2),
(122, 'Có ca làm', 7, '2024-11-09', 3),
(123, 'Có ca làm', 8, '2024-11-09', 3),
(124, 'Có ca làm', 9, '2024-11-09', 3),
(125, 'Có ca làm', 22, '2024-11-09', 3),
(126, 'Có ca làm', 23, '2024-11-09', 3),
(127, 'Có ca làm', 7, '2024-11-09', 4),
(128, 'Có ca làm', 8, '2024-11-09', 4),
(129, 'Có ca làm', 9, '2024-11-09', 4),
(130, 'Có ca làm', 24, '2024-11-09', 4),
(131, 'Có ca làm', 25, '2024-11-09', 4),
(132, 'Có ca làm', 7, '2024-11-10', 1),
(133, 'Có ca làm', 8, '2024-11-10', 1),
(134, 'Có ca làm', 9, '2024-11-10', 1),
(135, 'Có ca làm', 22, '2024-11-10', 1),
(136, 'Có ca làm', 23, '2024-11-10', 1),
(137, 'Có ca làm', 7, '2024-11-10', 2),
(138, 'Có ca làm', 8, '2024-11-10', 2),
(139, 'Có ca làm', 9, '2024-11-10', 2),
(140, 'Có ca làm', 24, '2024-11-10', 2),
(141, 'Có ca làm', 25, '2024-11-10', 2),
(142, 'Có ca làm', 7, '2024-11-10', 3),
(143, 'Có ca làm', 8, '2024-11-10', 3),
(144, 'Có ca làm', 9, '2024-11-10', 3),
(145, 'Có ca làm', 22, '2024-11-10', 3),
(146, 'Có ca làm', 23, '2024-11-10', 3),
(147, 'Có ca làm', 7, '2024-11-10', 4),
(148, 'Có ca làm', 8, '2024-11-10', 4),
(149, 'Có ca làm', 9, '2024-11-10', 4),
(150, 'Có ca làm', 24, '2024-11-10', 4),
(151, 'Có ca làm', 25, '2024-11-10', 4),
(152, 'Có ca làm', 7, '2024-11-19', 3),
(153, 'Có ca làm', 8, '2024-11-08', 3),
(154, 'Có ca làm', 9, '2024-11-08', 3),
(155, 'Có ca làm', 22, '2024-11-08', 3),
(156, 'Có ca làm', 23, '2024-11-08', 3),
(157, 'Có ca làm', 7, '2024-11-18', 4),
(158, 'Có ca làm', 8, '2024-11-08', 4),
(159, 'Có ca làm', 9, '2024-11-08', 4),
(160, 'Có ca làm', 24, '2024-11-08', 4),
(161, 'Có ca làm', 25, '0000-00-00', 4),
(162, 'Có ca làm', 7, '2024-11-25', 1),
(163, 'Có', 7, '2024-12-02', 2),
(164, 'Có', 22, '2024-12-02', 2),
(165, 'Có', 8, '2024-12-02', 2),
(166, 'Có', 9, '2024-12-02', 2),
(167, 'Có', 23, '2024-12-02', 2),
(176, NULL, 7, '2024-12-02', 1),
(177, NULL, 8, '2024-12-02', 1),
(178, NULL, 9, '2024-12-03', 3),
(181, NULL, 9, '2024-12-02', 1),
(187, NULL, 23, '2024-12-02', 1),
(190, NULL, 22, '2024-12-02', 1),
(192, NULL, 0, '2024-12-02', 3),
(193, NULL, 7, '2024-12-02', 3),
(194, NULL, 0, '2024-12-02', 3),
(196, NULL, 8, '2024-12-02', 3),
(199, NULL, 9, '2024-12-02', 3),
(202, NULL, 22, '2024-12-02', 3),
(207, NULL, 23, '2024-12-02', 3),
(211, NULL, 7, '2024-12-02', 4),
(212, NULL, 0, '2024-12-02', 4),
(213, NULL, 0, '2024-12-02', 4),
(214, NULL, 8, '2024-12-02', 4),
(215, NULL, 22, '2024-12-02', 4),
(216, NULL, 9, '2024-12-02', 4),
(217, NULL, 22, '2024-12-03', 1),
(218, NULL, 7, '2024-12-09', 1),
(219, NULL, 7, '2024-12-10', 1),
(220, NULL, 47, '2024-12-10', 1),
(221, NULL, 48, '2024-12-10', 1),
(222, NULL, 52, '2024-12-10', 1),
(223, NULL, 53, '2024-12-10', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsucapnhatnguyenlieu`
--

CREATE TABLE `lichsucapnhatnguyenlieu` (
  `ID` int(11) NOT NULL,
  `manl` int(11) NOT NULL,
  `loaithaotac` enum('Thêm','Sửa','Xóa') NOT NULL,
  `thongtincu` text DEFAULT NULL,
  `thongtinmoi` text DEFAULT NULL,
  `thoigiancapnhat` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsunhapkho`
--

CREATE TABLE `lichsunhapkho` (
  `ID` int(11) NOT NULL,
  `StoreIngredientID` int(11) NOT NULL,
  `ngaynhapkho` date NOT NULL,
  `soluongnhapkho` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lichsunhapkho`
--

INSERT INTO `lichsunhapkho` (`ID`, `StoreIngredientID`, `ngaynhapkho`, `soluongnhapkho`) VALUES
(2, 150, '2024-11-17', 100),
(3, 151, '2024-11-17', 120),
(4, 152, '2024-11-17', 100),
(5, 153, '2024-11-17', 150),
(6, 154, '2024-11-17', 90),
(7, 155, '2024-11-17', 100),
(8, 156, '2024-11-17', 200),
(9, 157, '2024-11-17', 230),
(10, 158, '2024-11-17', 150),
(11, 159, '2024-11-17', 140),
(12, 160, '2024-11-17', 320),
(13, 161, '2024-11-17', 110),
(14, 162, '2024-11-17', 130),
(15, 163, '2024-11-17', 120),
(16, 164, '2024-11-17', 130),
(17, 165, '2024-11-17', 320),
(18, 166, '2024-11-17', 300),
(19, 167, '2024-11-17', 200),
(20, 168, '2024-11-17', 500),
(21, 169, '2024-11-17', 300),
(22, 170, '2024-11-17', 120),
(23, 171, '2024-11-17', 110),
(24, 172, '2024-11-17', 130),
(25, 173, '2024-11-17', 120),
(26, 174, '2024-11-17', 150),
(27, 175, '2024-11-17', 80),
(28, 176, '2024-11-17', 90),
(29, 177, '2024-11-17', 210),
(30, 178, '2024-11-17', 240),
(31, 179, '2024-11-17', 160),
(32, 180, '2024-11-17', 150),
(33, 181, '2024-11-17', 310),
(34, 182, '2024-11-17', 120),
(35, 183, '2024-11-17', 130),
(36, 184, '2024-11-17', 130),
(37, 185, '2024-11-17', 330),
(38, 186, '2024-11-17', 310),
(39, 187, '2024-11-17', 290),
(40, 188, '2024-11-17', 180),
(41, 189, '2024-11-17', 520),
(42, 190, '2024-11-17', 280),
(43, 191, '2024-11-17', 130),
(44, 192, '2024-11-17', 120),
(45, 193, '2024-11-17', 130),
(46, 194, '2024-11-17', 110),
(47, 195, '2024-11-17', 160),
(48, 196, '2024-11-17', 90),
(49, 197, '2024-11-17', 100),
(50, 198, '2024-11-17', 220),
(51, 199, '2024-11-17', 250),
(52, 200, '2024-11-17', 170),
(53, 201, '2024-11-17', 160),
(54, 202, '2024-11-17', 320),
(55, 203, '2024-11-17', 130),
(56, 204, '2024-11-17', 140),
(57, 205, '2024-11-17', 120),
(58, 206, '2024-11-17', 340),
(59, 207, '2024-11-17', 330),
(60, 208, '2024-11-17', 300),
(61, 209, '2024-11-17', 320),
(62, 210, '2024-11-17', 530),
(63, 211, '2024-11-17', 290),
(64, 212, '2024-11-17', 140),
(65, 213, '2024-11-17', 120),
(66, 214, '2024-11-17', 130),
(67, 215, '2024-11-17', 110),
(68, 216, '2024-11-17', 160),
(69, 217, '2024-11-17', 90),
(70, 218, '2024-11-17', 100),
(71, 219, '2024-11-17', 210),
(72, 220, '2024-11-17', 250),
(73, 221, '2024-11-17', 160),
(74, 222, '2024-11-17', 150),
(75, 223, '2024-11-17', 310),
(76, 224, '2024-11-17', 120),
(77, 225, '2024-11-17', 130),
(78, 226, '2024-11-17', 120),
(79, 227, '2024-11-17', 330),
(80, 228, '2024-11-17', 310),
(81, 229, '2024-11-17', 300),
(82, 230, '2024-11-17', 320),
(83, 231, '2024-11-17', 520),
(84, 232, '2024-11-17', 280),
(85, 233, '2024-11-17', 130),
(86, 234, '2024-11-17', 100),
(87, 235, '2024-11-17', 110),
(88, 236, '2024-11-17', 90),
(89, 237, '2024-11-17', 130),
(90, 238, '2024-11-17', 80),
(91, 239, '2024-11-17', 90),
(92, 240, '2024-11-17', 200),
(93, 241, '2024-11-17', 230),
(94, 242, '2024-11-17', 150),
(95, 243, '2024-11-17', 140),
(96, 244, '2024-11-17', 300),
(97, 245, '2024-11-17', 110),
(98, 246, '2024-11-17', 120),
(99, 247, '2024-11-17', 120),
(100, 248, '2024-11-17', 320),
(101, 249, '2024-11-17', 300),
(102, 250, '2024-11-17', 280),
(103, 251, '2024-11-17', 300),
(104, 252, '2024-11-17', 510),
(105, 253, '2024-11-17', 290),
(106, 254, '2024-11-17', 130),
(136, 150, '2024-11-19', 30),
(137, 150, '2024-11-19', 30),
(138, 192, '2024-11-20', 12);

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
  `dinhluong` decimal(10,0) NOT NULL,
  `trangthai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `monan`
--

INSERT INTO `monan` (`mama`, `tenma`, `hinhanh`, `maloaima`, `giaban`, `soluong`, `dinhluong`, `trangthai`) VALUES
(1, 'Gà Rán Giòn', 'garan.jpg', 1, 29000, 98, 0, 'Còn hàng'),
(2, 'Gà Rán Cay', 'garancay.jpg', 1, 33000, 50, 0, 'Còn hàng'),
(3, 'Gà Rán Phô Mai', 'garanphomai.jpg', 1, 35000, 30, 0, 'Còn hàng'),
(4, 'Gà Rán Nguyên Con', 'garannguyencon.jpg', 1, 190000, 20, 0, 'Còn hàng'),
(5, 'Gà Rán Combo', 'garancombo.jpg', 5, 299000, 10, 0, 'Còn hàng'),
(6, 'Nước Ngọt Coca', 'nuocngotcoca.jpg', 2, 15000, 200, 0, 'Còn hàng'),
(7, 'Nước Ngọt Pepsi', 'nuocngotpepsi.jpg', 2, 15000, 200, 0, 'Còn hàng'),
(8, 'Nước Ngọt Sprite', 'nuocngotsprite.jpg', 2, 15000, 200, 0, 'Còn hàng'),
(9, 'Nước Ngọt Fanta', 'nuocngotpanta.jpg', 2, 15000, 200, 0, 'Còn hàng'),
(10, 'Nước Ngọt Coca + Gà Rán', 'garanvacoca.jpg', 5, 39000, 50, 0, 'Còn hàng'),
(11, 'Mì Ý Bolognese', 'myyolo.jpg', 3, 39000, 30, 0, 'Còn hàng'),
(12, 'Mì Ý Trung Quốc', 'myytrungquoc.jpg', 3, 39000, 25, 0, 'Còn hàng'),
(13, 'Mì Ý Hải Sản', 'myyhaisan.jpg', 3, 49000, 20, 0, 'Còn hàng'),
(14, 'Mì Ý Việt + Gà Rán Cay', 'myyvietvagarancay.jpg', 5, 63000, 15, 0, 'Còn hàng'),
(15, 'Khoai Tây Chiên', 'khoaitaychien.jpg', 4, 19000, 100, 0, 'Còn hàng'),
(16, 'Khoai Tây Chiên Phô Mai', 'khoaitaychienphomai.jpg', 4, 25000, 80, 0, 'Còn hàng'),
(17, 'Gà Rán + Khoai Tây Chiên ', 'garanvakhoaitaychien.jpg', 5, 49000, 30, 0, 'Còn hàng'),
(18, 'Cánh Gà Rán', 'canhgaran.jpg', 1, 29000, 15, 0, 'Còn hàng'),
(19, 'Combo Gà Rán', 'combogaran.jpg', 5, 79000, 10, 0, 'Còn hàng'),
(20, 'Mì Ý Tương Đen', 'mytuongden.jpg', 3, 39000, 12, 0, 'Còn hàng'),
(21, 'Combo Đặt Biệt', 'combodatbiet.jpg', 5, 299000, 8, 0, 'Còn hàng'),
(22, 'Gà Rán + Mì Ý', 'garanvamyy.jpg', 5, 69000, 5, 0, 'Còn hàng');

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
(1, 'Nguyễn Văn An', '1990-07-30', 0, '0987654321', 'qlchuoi@gmail.com', 'Quận 1', '202cb962ac59075b964b07152d234b70', 1, 1, 1),
(2, 'Nguyễn Thế Hoàng', '1998-09-21', 1, '0987654321', 'qlcn1@gmail.com', 'Quận 1', '202cb962ac59075b964b07152d234b70', 2, 1, 1),
(3, 'Trần Thị Bình', '1999-05-04', 1, '0912345678', 'qlcn2@gmail.com', 'Quận 2', '202cb962ac59075b964b07152d234b70', 2, 2, 1),
(4, 'Lê Văn Cương', '1999-11-20', 1, '0934567890', 'qlcn3@gmail.com', 'Quận 3', '202cb962ac59075b964b07152d234b70', 2, 3, 1),
(5, 'Phạm Thị D', '2000-05-22', 1, '0945678901', 'qlcn4@gmail.com', 'Quận 4', '202cb962ac59075b964b07152d234b70', 2, 4, 1),
(6, 'Võ Văn E', '1996-03-19', 1, '0956789012', 'qlcn5@gmail.com', 'Quận 5', '202cb962ac59075b964b07152d234b70', 2, 5, 1),
(7, 'Nguyễn Văn Hùng', '1993-07-09', 1, '0987654321', 'nvbhcn1a@gmail.com', 'Quận 1', '202cb962ac59075b964b07152d234b70', 3, 1, 1),
(8, 'Trần Thị Bảo', '2002-06-19', 0, '0912345678', 'nvbhcn1b@gmail.com', 'Quận 1', '202cb962ac59075b964b07152d234b70', 3, 1, 1),
(9, 'Lê Văn Duy', '1992-02-20', 0, '0934567890', 'nvbhcn1c@gmail.com', 'Quận 1', '202cb962ac59075b964b07152d234b70', 3, 1, 1),
(10, 'Nguyễn Văn A', '1999-01-01', 0, '0987654321', 'nvbhcn2a@gmail.com', 'Quận 3', '202cb962ac59075b964b07152d234b70', 3, 2, 1),
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
(22, 'Nguyễn Văn Bá', '1999-11-04', 0, '0987654321', 'nvbcn1a@gmail.com', 'Quận 1', '202cb962ac59075b964b07152d234b70', 4, 1, 1),
(23, 'Trần Thị Hồng', '1999-03-11', 1, '0912345678', 'nvbcn1b@gmail.com', 'Quận 1', '202cb962ac59075b964b07152d234b70', 4, 1, 2),
(26, 'Nguyễn Văn A', '2003-06-07', 0, '0987654321', 'nvbcn3a@gmail.com', 'Quận 3', '202cb962ac59075b964b07152d234b70', 4, 3, 1),
(27, 'Trần Thị B', '1998-11-03', 0, '0912345678', 'nvbcn3b@gmail.com', 'Quận 3', '202cb962ac59075b964b07152d234b70', 4, 3, 1),
(28, 'Nguyễn Văn A', '2003-10-12', 1, '0987654321', 'nvbcn4a@gmail.com', 'Quận 4', '202cb962ac59075b964b07152d234b70', 4, 4, 1),
(29, 'Trần Thị B', '1991-04-09', 0, '0912345678', 'nvbcn4b@gmail.com', 'Quận 4', '202cb962ac59075b964b07152d234b70', 4, 4, 1),
(30, 'Nguyễn Văn A', '1995-02-07', 0, '0987654321', 'nvbcn5a@gmail.com', 'Quận 5', '202cb962ac59075b964b07152d234b70', 4, 5, 1),
(31, 'Trần Thị B', '1995-12-27', 0, '0912345678', 'nvbcn5b@gmail.com', 'Quận 5', '202cb962ac59075b964b07152d234b70', 4, 5, 1),
(42, 'Hoàng An', '2007-03-21', 1, '098765432', 'hoangan@gmail.com', '25 linh', '202cb962ac59075b964b07152d234b70', 4, 2, 1),
(46, 'Phạm Minh Duy', '2002-03-15', 0, '0901234567', 'nvbhcn1d@gmail.com', 'Quận 1', '202cb962ac59075b964b07152d234b70', 3, 1, 1),
(47, 'Phạm Huy Hùng', '2002-07-15', 0, '0901234967', 'nvbhcn1e@gmail.com', 'Quận 1', '202cb962ac59075b964b07152d234b70', 3, 1, 1),
(48, 'Phạm Duy Phong', '2002-05-25', 0, '0901984567', 'nvbhcn1f@gmail.com', 'Quận 1', '202cb962ac59075b964b07152d234b70', 3, 1, 1),
(49, 'Hứa Minh Duy', '2000-03-12', 0, '0901824567', 'nvbhcn1g@gmail.com', 'Quận 1', '202cb962ac59075b964b07152d234b70', 3, 1, 1),
(50, 'Nguyễn Huy Hùng', '2002-03-29', 0, '0909234567', 'nvbcn1d@gmail.com', 'Quận 1', '202cb962ac59075b964b07152d234b70', 4, 1, 1),
(51, 'Nguyễn Mạnh', '0000-00-00', 0, '0909934567', 'nvbcn1e@gmail.com', 'Quận 1', '202cb962ac59075b964b07152d234b70', 4, 1, 1),
(52, 'Nguyễn Quang Huy', '2002-08-19', 0, '0909234567', 'nvbcn1f@gmail.com', 'Quận 1', '202cb962ac59075b964b07152d234b70', 4, 1, 1),
(53, 'Nguyễn Anh Kiệt', '2002-03-29', 0, '0909234567', 'nvbcn1g@gmail.com', 'Quận 1', '202cb962ac59075b964b07152d234b70', 4, 1, 1);

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
  `sodienthoai_ncc` varchar(11) NOT NULL,
  `hinh` varchar(255) NOT NULL,
  `trangthai` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguyenlieu`
--

INSERT INTO `nguyenlieu` (`manl`, `tennl`, `dongia`, `donvitinh`, `ten_ncc`, `email_ncc`, `sodienthoai_ncc`, `hinh`, `trangthai`) VALUES
(1, 'Cá hồi phi lê', 100000, 'kg', 'Thực phẩm tươi sống', 'thucphamtuisong@example.com', '0123456789', 'cahoiphile.jpg', NULL),
(2, 'Thịt bò xay', 120000, 'kg', 'Thực phẩm tươi sống', 'thucphamtuisong@example.com', '0123456789', 'thitboxay.jpg', NULL),
(3, 'Thịt nạt heo', 100000, 'kg', 'Thực phẩm tươi sống', 'thucphamtuisong@example.com', '0123456789', 'thitnatheo.jpg', NULL),
(4, 'Thịt đùi gà', 70000, 'kg', 'Thực phẩm tươi sống', 'thucphamtuisong@example.com', '0123456789', 'thitduiga.jpg', NULL),
(5, 'Thịt ức gà', 50000, 'kg', 'Thực phẩm tươi sống', 'thucphamtuisong@example.com', '0123456789', 'thitucga.jpg', NULL),
(6, 'Thịt cánh gà', 60000, 'kg', 'Thực phẩm tươi sống', 'thucphamtuisong@example.com', '0123456789', 'thitcanhga.jpg', NULL),
(7, 'Khoai tây', 20000, 'kg', 'Rau củ xanh', 'raucuxanh@example.com', '0987654321', 'khoaitay.jpg', NULL),
(8, 'Cà chua', 25000, 'kg', 'Rau củ xanh', 'raucuxanh@example.com', '0987654321', 'cachua.jpg', NULL),
(9, 'Rau diếp', 15000, 'kg', 'Rau củ xanh', 'raucuxanh@example.com', '0987654321', 'raudiep.jpg', NULL),
(10, 'xà lách', 15000, 'kg', 'Rau củ xanh', 'raucuxanh@example.com', '0987654321', 'xalach.jpg', NULL),
(11, 'Ớt chuông', 35000, 'kg', 'Rau củ xanh', 'raucuxanh@example.com', '0987654321', 'otchuong.jpg', NULL),
(12, 'Rau cải cay', 10000, 'kg', 'Rau củ xanh', 'raucuxanh@example.com', '0987654321', 'raucaicay.jpg', NULL),
(13, 'Bắp ngọt', 12000, 'kg', 'Rau củ xanh', 'raucuxanh@example.com', '0987654321', 'bapngot.jpg', NULL),
(14, 'Rau cải thìa', 12000, 'kg', 'Rau củ xanh', 'raucuxanh@example.com', '0987654321', 'raucaithia.jpg', NULL),
(15, 'Rau cải thảo', 15000, 'kg', 'Rau củ xanh', 'raucuxanh@example.com', '0987654321', 'raucaithao.jpg', NULL),
(16, 'Bắp xú', 15000, 'kg', 'Rau củ xanh', 'raucuxanh@example.com', '0987654321', 'raubapxu.jpg', NULL),
(17, 'Hành tây', 30000, 'kg', 'Rau củ xanh', 'raucuxanh@example.com', '0987654321', 'hanhtay.jpg', NULL),
(18, 'Sữa tươi', 30000, 'lít', 'Thực phẩm xanh', 'thucphamxanh@example.com', '0909090909', 'suatuoi.jpg', NULL),
(19, 'Bánh mì sandwich ', 2000, 'Cái', 'Thực phẩm xanh', 'thucphamxanh@example.com', '0909090909', 'banhmisandwich.jpg', NULL),
(20, 'Pasta', 50000, 'kg', 'Thực phẩm xanh', 'thucphamxanh@example.com', '0909090909', 'pasta.jpg', NULL),
(21, 'Bánh mì kẹp', 3000, 'cái', 'Thực phẩm xanh', 'thucphamxanh@example.com', '0909090909', 'banhmikep.jpg', NULL),
(22, 'Phô mai mozzarella', 120000, 'kg', 'Thực phẩm xanh', 'thucphamxanh@example.com', '0909090909', 'phomai.jpg', NULL);

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
(1, 'Chờ duyệt'),
(2, 'Đã đặt hàng'),
(3, 'Đang chế biến'),
(4, 'Hoàn thành chế biến'),
(5, 'Đã thanh toán'),
(6, 'Đã hủy');

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
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`madh`),
  ADD KEY `fk_cuahang_donhang` (`mach`),
  ADD KEY `fk_khachhang_donhang` (`makh`),
  ADD KEY `fk_ttdh_donhang` (`mattdh`);

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
  ADD PRIMARY KEY (`makh`),
  ADD KEY `fk_vaitro_kh` (`mavaitro`);

--
-- Chỉ mục cho bảng `khomonan`
--
ALTER TABLE `khomonan`
  ADD PRIMARY KEY (`makhoma`),
  ADD KEY `fk_cuahang_monan` (`mach`),
  ADD KEY `fk_monan_kho` (`mama`);

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
-- Chỉ mục cho bảng `lichsucapnhatnguyenlieu`
--
ALTER TABLE `lichsucapnhatnguyenlieu`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_history_ingredient` (`manl`);

--
-- Chỉ mục cho bảng `lichsunhapkho`
--
ALTER TABLE `lichsunhapkho`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_khonguyenlieu` (`StoreIngredientID`);

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
  MODIFY `machamcong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `mactdh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `cuahang`
--
ALTER TABLE `cuahang`
  MODIFY `mach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `dangkycalam`
--
ALTER TABLE `dangkycalam`
  MODIFY `madkcl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `danhsachdexuat`
--
ALTER TABLE `danhsachdexuat`
  MODIFY `madexuat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `madh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `magiohang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `makh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `khomonan`
--
ALTER TABLE `khomonan`
  MODIFY `makhoma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT cho bảng `khonguyenlieu`
--
ALTER TABLE `khonguyenlieu`
  MODIFY `NLCH_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT cho bảng `lichlamviec`
--
ALTER TABLE `lichlamviec`
  MODIFY `malamviec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT cho bảng `lichsucapnhatnguyenlieu`
--
ALTER TABLE `lichsucapnhatnguyenlieu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `lichsunhapkho`
--
ALTER TABLE `lichsunhapkho`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

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
  MODIFY `mand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `nguyenlieu`
--
ALTER TABLE `nguyenlieu`
  MODIFY `manl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `tinhtrangdangkycalam`
--
ALTER TABLE `tinhtrangdangkycalam`
  MODIFY `mattdk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tinhtrangdonhang`
--
ALTER TABLE `tinhtrangdonhang`
  MODIFY `mattdh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  ADD CONSTRAINT `fk_nguoidung_chamcong` FOREIGN KEY (`mand`) REFERENCES `nguoidung` (`mand`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `fk_cuahang_donhang` FOREIGN KEY (`mach`) REFERENCES `cuahang` (`mach`),
  ADD CONSTRAINT `fk_khachhang_donhang` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`),
  ADD CONSTRAINT `fk_ttdh_donhang` FOREIGN KEY (`mattdh`) REFERENCES `tinhtrangdonhang` (`mattdh`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `fk_makh_giohang` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`),
  ADD CONSTRAINT `fk_monan_giohang` FOREIGN KEY (`mama`) REFERENCES `monan` (`mama`);

--
-- Các ràng buộc cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `fk_vaitro_kh` FOREIGN KEY (`mavaitro`) REFERENCES `vaitro` (`mavaitro`);

--
-- Các ràng buộc cho bảng `khomonan`
--
ALTER TABLE `khomonan`
  ADD CONSTRAINT `fk_cuahang_monan` FOREIGN KEY (`mach`) REFERENCES `cuahang` (`mach`),
  ADD CONSTRAINT `fk_monan_kho` FOREIGN KEY (`mama`) REFERENCES `monan` (`mama`);

--
-- Các ràng buộc cho bảng `khonguyenlieu`
--
ALTER TABLE `khonguyenlieu`
  ADD CONSTRAINT `fk_cuahang_kho` FOREIGN KEY (`mach`) REFERENCES `cuahang` (`mach`);

--
-- Các ràng buộc cho bảng `lichsucapnhatnguyenlieu`
--
ALTER TABLE `lichsucapnhatnguyenlieu`
  ADD CONSTRAINT `fk_history_ingredient` FOREIGN KEY (`manl`) REFERENCES `nguyenlieu` (`manl`);

--
-- Các ràng buộc cho bảng `lichsunhapkho`
--
ALTER TABLE `lichsunhapkho`
  ADD CONSTRAINT `fk_khonguyenlieu` FOREIGN KEY (`StoreIngredientID`) REFERENCES `khonguyenlieu` (`NLCH_ID`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
