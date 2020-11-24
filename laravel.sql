-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th10 24, 2020 lúc 11:48 AM
-- Phiên bản máy phục vụ: 8.0.22-0ubuntu0.20.04.2
-- Phiên bản PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmucs`
--

CREATE TABLE `danhmucs` (
  `id` bigint UNSIGNED NOT NULL,
  `loaihang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenhang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mahang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dongia` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmucs`
--

INSERT INTO `danhmucs` (`id`, `loaihang`, `tenhang`, `mahang`, `dongia`, `created_at`) VALUES
(137, 'Giấy tờ có giá', 'Voucher Urbox 300 Mầu Đỏ', 'Urbox 300', 300000, '2020-07-10 03:54:04'),
(138, 'Vàng', 'Vàng nhẫn SBJ loại 0,5 chỉ', 'GOLD SBJ 0,5C', 2335000, '2020-07-10 04:00:08'),
(139, 'Vàng', 'Vàng nhẫn SBJ loại 1 chỉ', 'GOLD SBJ 1C', 0, '2020-07-10 04:02:00'),
(140, 'Giấy tờ có giá', 'Voucher vàng SBJ loại 0,5 chỉ', 'Vàng Voucher 0,5C', 2335000, '2020-07-10 04:02:40'),
(141, 'Giấy tờ có giá', 'Voucher vàng SBJ loại 1 chỉ', 'Vàng Voucher 1C', 4670000, '2020-07-10 04:03:07'),
(142, 'Giấy tờ có giá', 'Voucher Urbox 800 Mầu Xanh', 'Urbox 800', 800000, '2020-07-10 04:03:48'),
(143, 'Giấy tờ có giá', 'Voucher Urbox 200 Mầu Hồng', 'Urbox 200', 200000, '2020-07-10 04:04:07'),
(144, 'Giấy tờ có giá', 'Voucher Esteem 500', 'Esteem 500', 500000, '2020-07-10 04:05:20'),
(145, 'Giấy tờ có giá', 'Voucher Esteem 200', 'Esteem 200', 200000, '2020-07-10 04:05:38'),
(146, 'Giấy tờ có giá', 'Voucher Esteem 100', 'Esteem 100', 100000, '2020-07-10 04:06:01'),
(147, 'Giấy tờ có giá', 'Voucher Esteem 50', 'Esteem 50', 50000, '2020-07-10 04:06:19'),
(148, 'Giấy tờ có giá', 'Voucher Esteem 10', 'Esteem 10', 10000, '2020-07-10 04:06:39'),
(149, 'Giấy tờ có giá', 'Thẻ California', 'California', 1000000, '2020-07-10 04:07:03'),
(150, 'Giấy tờ có giá', 'Voucher Vin ID 100', 'Vin ID 100', 100000, '2020-07-10 04:07:44'),
(151, 'Giấy tờ có giá', 'Thẻ điện thoại Viettel 100', 'Viettel 100', 100000, '2020-07-10 04:08:29'),
(152, 'Giấy tờ có giá', 'Thẻ điện thoại Mobile 100', 'Mobile 100', 100000, '2020-07-10 04:08:53'),
(153, 'Giấy tờ có giá', 'Thẻ điện thoại Mobile 50', 'Mobile 50', 50000, '2020-07-10 04:09:11'),
(154, 'Giấy tờ có giá', 'Thẻ điện thoại Vinaphone 500', 'Vinaphone 500', 500000, '2020-07-10 04:09:28'),
(155, 'Giấy tờ có giá', 'Sài Gòn Co.op', 'Co.op 200', 200000, '2020-07-10 04:09:48'),
(156, 'Hàng hóa thông thường', 'Mũ bảo hiểm', 'GIFT 01', 0, '2020-07-14 08:21:25'),
(157, 'Hàng hóa thông thường', 'Bộ áo mưa', 'GIFT 02', 95000, '2020-07-14 08:21:54'),
(158, 'Hàng hóa thông thường', 'Ô che nắng', 'GIFT 03', 150000, '2020-07-14 08:24:07'),
(159, 'Hàng hóa thông thường', 'Vali', 'GIFT 04', 0, '2020-07-14 08:24:31'),
(160, 'Hàng hóa thông thường', 'Set Bình & Túi', 'GIFT 05', 0, '2020-07-14 08:24:56'),
(161, 'Hàng hóa thông thường', 'Set Loa & Sạc', 'GIFT 06', 0, '2020-07-14 08:26:26'),
(162, 'Hàng hóa thông thường', 'Set Loa', 'GIFT 07', 520000, '2020-07-14 08:26:40'),
(163, 'Hàng hóa thông thường', 'Set Sạc', 'GIFT 08', 0, '2020-07-14 08:39:54'),
(164, 'Hàng hóa thông thường', 'Bình nhựa bottle', 'GIFT 09', 19000, '2020-07-14 08:40:15'),
(165, 'Hàng hóa thông thường', 'Túi trống', 'GIFT 10', 0, '2020-07-14 08:40:36'),
(166, 'Hàng hóa thông thường', 'Hộp Carton Sóng', 'GIFT 11', 0, '2020-07-14 08:41:02'),
(167, 'Hàng hóa thông thường', 'Bình giữ nhiệt tre', 'GIFT 12', 0, '2020-07-14 10:04:09'),
(168, 'Hàng hóa thông thường', 'Khăn mặt', 'GIFT 13', 20000, '2020-07-14 10:04:42'),
(169, 'Hàng hóa thông thường', 'Hộp quà tặng (cover ipad)', 'GIFT 14', 0, '2020-07-14 10:09:35'),
(170, 'Hàng hóa thông thường', 'Xoong Nồi Lock & Lock', 'GIFT 15', 0, '2020-07-14 10:10:44'),
(171, 'Hàng hóa thông thường', 'Kệ giá đỡ điện thoại logo MBAL', 'GIFT 16', 0, '2020-07-14 10:11:02'),
(172, 'Hàng hóa thông thường', 'Thiệp chúc mừng MBAL', 'GIFT 17', 0, '2020-07-14 10:11:16'),
(173, 'Hàng hóa thông thường', 'Set THL HC Name Card', 'GIFT 18', 0, '2020-07-14 10:11:29'),
(174, 'Hàng hóa thông thường', 'Giftalen (Sổ da, Passport, Thẻ hành lý, Tag Valy)', 'GIFT 19', 0, '2020-07-14 10:11:42'),
(175, 'Hàng hóa thông thường', 'Đồng hồ TM Xiao Mi (MBAL)', 'GIFT 20', 0, '2020-07-14 10:11:53'),
(176, 'Hàng hóa thông thường', 'Bút ký (có hộp đen in Logo MBAL nhũ)', 'GIFT 21', 0, '2020-07-16 07:11:17'),
(177, 'Hàng hóa thông thường', 'Bút bi banner (xanh, hồng)', 'GIFT 22', 0, '2020-07-16 07:11:31'),
(178, 'Hàng hóa thông thường', 'Túi Vải Canvas', 'GIFT 23', 0, '2020-07-16 07:11:45'),
(179, 'Hàng hóa thông thường', 'Cốc lúa mạch', 'GIFT 24', 47000, '2020-07-16 07:12:01'),
(180, 'Hàng hóa thông thường', 'Cáp đa năng', 'GIFT 25', 69500, '2020-07-16 07:12:16'),
(181, 'Hàng hóa thông thường', 'Bóng Bay', 'GIFT 26', 0, '2020-07-16 07:12:42'),
(182, 'Hàng hóa thông thường', 'Que cắm bóng', 'GIFT 27', 0, '2020-07-16 07:12:55'),
(183, 'Hàng hóa thông thường', 'Cốc giấy', 'GIFT 28', 0, '2020-07-16 07:13:14'),
(184, 'Hàng hóa thông thường', 'Giấy gói quà', 'GIFT 29', 0, '2020-07-16 07:13:32'),
(185, 'Hàng hóa thông thường', 'Phòng bì A4', 'GIFT 30', 0, '2020-07-16 07:13:45'),
(186, 'Hàng hóa thông thường', 'Phong bì A5', 'GIFT 31', 0, '2020-07-16 07:14:00'),
(187, 'Hàng hóa thông thường', 'Túi giấy cỡ nhỏ 20x25x10cm', 'GIFT 32', 0, '2020-07-16 07:14:15'),
(188, 'Hàng hóa thông thường', 'Túi giấy cỡ trung 26x33x10cm', 'GIFT 33', 0, '2020-07-16 07:14:27'),
(189, 'Hàng hóa thông thường', 'Túi giấy cỡ to 30x40x10cm', 'GIFT 34', 0, '2020-07-16 07:14:41'),
(190, 'Hàng hóa thông thường', 'Kẹp File', 'GIFT 35', 0, '2020-07-16 07:14:55'),
(191, 'Hàng hóa thông thường', 'Leter head', 'GIFT 36', 0, '2020-07-16 07:15:07'),
(192, 'Hàng hóa thông thường', 'Tentcard A4', 'GIFT 37', 0, '2020-07-16 07:15:21'),
(193, 'Hàng hóa thông thường', 'Khung bằng khen', 'GIFT 38', 0, '2020-07-16 07:15:33'),
(194, 'Giấy tờ có giá', 'Voucher Esteem 1000', 'Esteem 1000', 1000000, '2020-07-16 08:01:43'),
(195, 'Hàng hóa thông thường', 'Hộp bằng khen Trip', 'GIFT 39', 0, '2020-08-07 03:03:18'),
(196, 'Hàng hóa thông thường', 'Đèn remax', 'GIFT 40', 0, '2020-08-07 06:55:40'),
(197, 'Giấy tờ có giá', 'Voucher Esteem điện tử 1000', 'Evoucher Esteem 1000', 1000000, '2020-08-07 07:30:17'),
(198, 'Giấy tờ có giá', 'Voucher Esteem điện tử 500', 'Evoucher Esteem 500', 500000, '2020-08-07 07:31:14'),
(199, 'Hàng hóa thông thường', 'Bình INOX 316 (Bình giữ nhiệt hiển thị nhiệt)', 'GIFT 41', 300000, '2020-08-12 03:31:13'),
(200, 'Hàng hóa thông thường', 'Cốc Coffee', 'GIFT 42', 52000, '2020-08-14 07:16:43'),
(201, 'Hàng hóa thông thường', 'Bộ hộp bảo quản 4pcs Lock&Lock', 'GIFT 43', 265000, '2020-08-14 07:24:11'),
(202, 'Hàng hóa thông thường', 'Bình đựng nước Mixer One', 'GIFT 44', 72000, '2020-08-14 07:32:34'),
(203, 'Hàng hóa thông thường', 'Hộp bảo quản Lock & Lock 690ml', 'GIFT 45', 69000, '2020-08-14 07:33:26'),
(204, 'Hàng hóa thông thường', 'Bộ hộp bảo quản 6pcs Lock&Lock', 'GIFT 46', 415000, '2020-08-14 07:42:49'),
(205, 'Giấy tờ có giá', 'Evoucher Viettel 30000', 'Evoucher Viettel 30k', 30000, '2020-08-19 10:00:07'),
(206, 'Giấy tờ có giá', 'Evoucher Viettel 50000', 'Evoucher Viettel 50000', 50000, '2020-08-20 09:38:33'),
(207, 'Hàng hóa thông thường', 'Evoucher Mobiphone 50000', 'Evoucher Mobi 50k', 50000, '2020-08-20 09:40:00'),
(208, 'Giấy tờ có giá', 'Evoucher Mobiphone 30000', 'Evoucher Mobi 30k', 30000, '2020-08-20 09:40:31'),
(209, 'Giấy tờ có giá', 'Evoucher Vinaphone 50000', 'Evoucher Vina 50k', 50000, '2020-08-20 09:40:57'),
(210, 'Giấy tờ có giá', 'Evoucher Vinaphone 30000', 'Evoucher Vina 30k', 30000, '2020-08-20 09:41:11'),
(211, 'Hàng hóa thông thường', 'Ô gập 3', 'GIFT 47', 0, '2020-09-07 09:04:56'),
(212, 'Hàng hóa thông thường', 'Phong bì A6', 'GIFT 48', 0, '2020-09-07 09:09:16'),
(213, 'Giấy tờ có giá', 'Voucher Esteem 20', 'Esteem 20', 20000, '2020-10-08 10:21:07'),
(214, 'Hàng hóa thông thường', 'Khung bằng khen', 'GIFT 49', 0, '2020-11-18 01:48:37'),
(215, 'Hàng hóa thông thường', 'Gối cao su non', 'GIFT 50', 0, '2020-11-18 02:04:41'),
(216, 'Hàng hóa thông thường', 'Máy phun sương mini RT-A620', 'GIFT 51', 0, '2020-11-18 02:05:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `delivery_history`
--

CREATE TABLE `delivery_history` (
  `id` bigint UNSIGNED NOT NULL,
  `userid` int DEFAULT NULL,
  `orderid` int NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `delivery_history`
--

INSERT INTO `delivery_history` (`id`, `userid`, `orderid`, `status`, `created_at`) VALUES
(31, 14, 219, 2, '2020-08-18 02:40:56'),
(32, 14, 221, 2, '2020-08-18 02:45:55'),
(33, 14, 222, 2, '2020-08-18 02:57:10'),
(34, 14, 223, 2, '2020-08-18 03:01:30'),
(35, 14, 224, 2, '2020-08-18 03:09:28'),
(36, 14, 225, 2, '2020-08-18 03:09:37'),
(37, 14, 226, 2, '2020-08-18 03:09:43'),
(38, 14, 227, 2, '2020-08-18 03:09:55'),
(39, 14, 228, 2, '2020-08-18 03:15:40'),
(40, 14, 229, 2, '2020-08-19 09:54:13'),
(41, 14, 231, 2, '2020-08-19 09:57:18'),
(42, 14, 238, 2, '2020-08-21 01:39:36'),
(43, 14, 239, 2, '2020-08-21 01:57:14'),
(44, 14, 240, 2, '2020-08-21 02:25:40'),
(45, 14, 241, 2, '2020-08-21 03:44:05'),
(46, 14, 247, 2, '2020-08-25 02:44:07'),
(47, 14, 242, 2, '2020-08-25 02:44:19'),
(48, -1, 248, 0, '2020-08-25 02:53:03'),
(49, 14, 249, 2, '2020-08-25 05:45:14'),
(50, 14, 252, 2, '2020-08-25 09:31:12'),
(51, 14, 250, 2, '2020-08-25 09:31:26'),
(52, 14, 251, 2, '2020-08-25 09:31:55'),
(53, 14, 269, 2, '2020-09-07 07:48:23'),
(54, 14, 268, 2, '2020-09-07 07:48:33'),
(55, 14, 266, 2, '2020-09-07 07:48:44'),
(56, 14, 265, 2, '2020-09-07 07:49:40'),
(57, -1, 270, 0, '2020-09-07 09:41:58'),
(58, 14, 275, 2, '2020-09-08 10:27:50'),
(59, 14, 274, 2, '2020-09-08 10:27:55'),
(60, 14, 283, 2, '2020-09-21 03:15:11'),
(61, 14, 279, 1, '2020-09-21 03:17:06'),
(62, 14, 278, 2, '2020-09-21 03:17:59'),
(63, 14, 277, 2, '2020-09-21 03:18:27'),
(64, 14, 276, 2, '2020-09-21 03:18:49'),
(65, 14, 284, 2, '2020-09-21 04:30:36'),
(66, -1, 290, 0, '2020-09-28 10:10:21'),
(67, -1, 285, 0, '2020-10-02 10:27:28'),
(68, -1, 286, 0, '2020-10-02 10:28:05'),
(69, -1, 291, 0, '2020-10-02 10:28:18'),
(70, -1, 308, 0, '2020-10-26 04:26:09'),
(71, -1, 307, 0, '2020-10-26 04:26:37'),
(72, -1, 306, 0, '2020-10-26 04:26:44'),
(73, -1, 305, 0, '2020-10-26 04:26:54'),
(74, -1, 299, 0, '2020-10-26 04:27:01'),
(75, -1, 298, 0, '2020-10-26 04:27:08'),
(76, -1, 300, 0, '2020-10-26 04:27:25'),
(77, -1, 314, 0, '2020-10-26 04:59:31'),
(78, -1, 320, 0, '2020-11-10 04:16:14'),
(79, -1, 319, 0, '2020-11-10 04:16:52'),
(80, -1, 318, 0, '2020-11-10 04:17:01'),
(81, -1, 317, 0, '2020-11-10 04:17:08'),
(82, -1, 316, 0, '2020-11-10 04:17:14'),
(83, -1, 315, 0, '2020-11-10 04:17:24'),
(84, -1, 322, 0, '2020-11-17 08:15:29'),
(85, -1, 331, 0, '2020-11-23 08:45:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donxuats`
--

CREATE TABLE `donxuats` (
  `id` bigint UNSIGNED NOT NULL,
  `id_history` int NOT NULL,
  `warehouseId` int NOT NULL,
  `danhmucId` int NOT NULL,
  `soluong` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donxuats`
--

INSERT INTO `donxuats` (`id`, `id_history`, `warehouseId`, `danhmucId`, `soluong`, `created_at`, `updated_at`) VALUES
(92, 219, 2, 144, 27, NULL, NULL),
(93, 219, 2, 147, 3, NULL, NULL),
(94, 219, 2, 145, 1, NULL, NULL),
(95, 221, 2, 164, 15, NULL, NULL),
(96, 221, 2, 170, 2, NULL, NULL),
(97, 221, 2, 163, 2, NULL, NULL),
(98, 221, 2, 179, 17, NULL, NULL),
(99, 222, 2, 168, 80, NULL, NULL),
(100, 222, 2, 187, 395, NULL, NULL),
(101, 222, 2, 181, 450, NULL, NULL),
(102, 222, 2, 179, 67, NULL, NULL),
(103, 222, 2, 180, 84, NULL, NULL),
(104, 222, 2, 164, 190, NULL, NULL),
(105, 223, 2, 164, 425, NULL, NULL),
(106, 223, 2, 159, 4, NULL, NULL),
(107, 223, 2, 160, 4, NULL, NULL),
(108, 223, 2, 184, 110, NULL, NULL),
(109, 223, 2, 188, 20, NULL, NULL),
(110, 223, 2, 187, 590, NULL, NULL),
(111, 223, 2, 181, 560, NULL, NULL),
(112, 223, 2, 179, 315, NULL, NULL),
(113, 224, 2, 188, 50, NULL, NULL),
(114, 225, 2, 175, 21, NULL, NULL),
(115, 226, 2, 186, 500, NULL, NULL),
(116, 227, 2, 164, 510, NULL, NULL),
(117, 227, 2, 159, 6, NULL, NULL),
(118, 227, 2, 163, 6, NULL, NULL),
(119, 227, 2, 184, 92, NULL, NULL),
(120, 227, 2, 181, 270, NULL, NULL),
(121, 227, 2, 179, 118, NULL, NULL),
(122, 227, 2, 168, 145, NULL, NULL),
(123, 228, 2, 179, 14, NULL, NULL),
(124, 228, 2, 184, 20, NULL, NULL),
(125, 229, 2, 187, 20, NULL, NULL),
(126, 229, 2, 183, 100, NULL, NULL),
(127, 229, 2, 189, 30, NULL, NULL),
(128, 231, 2, 158, 4, NULL, NULL),
(129, 231, 2, 161, 1, NULL, NULL),
(130, 231, 2, 189, 9, NULL, NULL),
(131, 231, 2, 187, 20, NULL, NULL),
(132, 231, 2, 193, 19, NULL, NULL),
(133, 238, 3, 197, 5, NULL, NULL),
(134, 239, 2, 158, 1, NULL, NULL),
(135, 240, 2, 179, 20, NULL, NULL),
(136, 240, 2, 189, 10, NULL, NULL),
(137, 240, 2, 188, 20, NULL, NULL),
(138, 240, 2, 170, 2, NULL, NULL),
(139, 240, 2, 160, 2, NULL, NULL),
(140, 241, 2, 194, 124, NULL, NULL),
(141, 241, 2, 148, 7, NULL, NULL),
(142, 241, 2, 147, 1, NULL, NULL),
(143, 241, 2, 146, 43, NULL, NULL),
(144, 242, 2, 187, 30, NULL, NULL),
(145, 242, 2, 188, 30, NULL, NULL),
(146, 247, 2, 144, 1270, NULL, NULL),
(147, 247, 2, 145, 230, NULL, NULL),
(148, 247, 2, 147, 59, NULL, NULL),
(149, 247, 2, 148, 81, NULL, NULL),
(150, 248, 3, 198, 88, NULL, NULL),
(151, 249, 2, 187, 100, NULL, NULL),
(152, 250, 2, 187, 30, NULL, NULL),
(153, 250, 2, 184, 15, NULL, NULL),
(154, 250, 2, 203, 6, NULL, NULL),
(155, 250, 2, 179, 10, NULL, NULL),
(156, 251, 2, 202, 45, NULL, NULL),
(157, 251, 2, 159, 2, NULL, NULL),
(158, 251, 2, 158, 2, NULL, NULL),
(159, 251, 2, 184, 60, NULL, NULL),
(160, 251, 2, 187, 60, NULL, NULL),
(161, 251, 2, 181, 60, NULL, NULL),
(162, 252, 2, 199, 2, NULL, NULL),
(163, 265, 2, 144, 2289, NULL, NULL),
(164, 265, 2, 145, 277, NULL, NULL),
(165, 265, 2, 147, 459, NULL, NULL),
(166, 265, 2, 148, 468, NULL, NULL),
(167, 266, 2, 144, 29, NULL, NULL),
(168, 266, 2, 145, 5, NULL, NULL),
(169, 266, 2, 147, 10, NULL, NULL),
(170, 266, 2, 148, 8, NULL, NULL),
(171, 268, 2, 148, 31, NULL, NULL),
(172, 268, 2, 194, 17, NULL, NULL),
(173, 268, 2, 146, 80, NULL, NULL),
(174, 268, 2, 147, 5, NULL, NULL),
(175, 269, 2, 187, 50, NULL, NULL),
(176, 269, 2, 188, 50, NULL, NULL),
(182, 274, 2, 146, 7, NULL, NULL),
(183, 274, 2, 194, 33, NULL, NULL),
(184, 274, 2, 148, 3, NULL, NULL),
(185, 274, 2, 147, 1, NULL, NULL),
(186, 275, 2, 144, 103, NULL, NULL),
(187, 275, 2, 148, 4, NULL, NULL),
(188, 275, 2, 147, 1, NULL, NULL),
(189, 275, 2, 145, 1, NULL, NULL),
(190, 275, 2, 146, 1, NULL, NULL),
(191, 276, 2, 165, 5, NULL, NULL),
(192, 277, 2, 168, 359, NULL, NULL),
(193, 277, 2, 161, 4, NULL, NULL),
(194, 277, 2, 159, 2, NULL, NULL),
(195, 277, 2, 170, 2, NULL, NULL),
(196, 277, 2, 184, 678, NULL, NULL),
(197, 277, 2, 188, 490, NULL, NULL),
(198, 277, 2, 187, 930, NULL, NULL),
(199, 277, 2, 181, 1000, NULL, NULL),
(200, 277, 2, 200, 223, NULL, NULL),
(201, 277, 2, 202, 389, NULL, NULL),
(202, 278, 2, 168, 210, NULL, NULL),
(203, 278, 2, 159, 2, NULL, NULL),
(204, 278, 2, 163, 2, NULL, NULL),
(205, 278, 2, 160, 2, NULL, NULL),
(206, 278, 2, 184, 250, NULL, NULL),
(207, 278, 2, 188, 90, NULL, NULL),
(208, 278, 2, 200, 181, NULL, NULL),
(209, 278, 2, 181, 880, NULL, NULL),
(210, 278, 2, 203, 104, NULL, NULL),
(211, 278, 2, 187, 400, NULL, NULL),
(214, 283, 2, 144, 1752, NULL, NULL),
(215, 283, 2, 145, 160, NULL, NULL),
(216, 283, 2, 146, 1510, NULL, NULL),
(217, 283, 2, 147, 2164, NULL, NULL),
(218, 283, 2, 148, 6758, NULL, NULL),
(219, 284, 2, 144, 3, NULL, NULL),
(220, 285, 2, 144, 1250, NULL, NULL),
(221, 285, 2, 147, 340, NULL, NULL),
(222, 285, 2, 146, 170, NULL, NULL),
(223, 285, 2, 145, 850, NULL, NULL),
(224, 285, 2, 194, 26, NULL, NULL),
(225, 286, 2, 144, 1, NULL, NULL),
(226, 286, 2, 145, 2, NULL, NULL),
(227, 286, 2, 148, 7, NULL, NULL),
(228, 287, 2, 144, 13, NULL, NULL),
(229, 287, 2, 148, 40, NULL, NULL),
(230, 287, 2, 147, 58, NULL, NULL),
(231, 287, 2, 145, 18, NULL, NULL),
(232, 287, 2, 146, 4, NULL, NULL),
(233, 290, 2, 168, 8, NULL, NULL),
(234, 290, 2, 157, 50, NULL, NULL),
(235, 290, 2, 159, 2, NULL, NULL),
(236, 290, 2, 161, 1, NULL, NULL),
(237, 290, 2, 163, 4, NULL, NULL),
(238, 290, 2, 184, 60, NULL, NULL),
(239, 290, 2, 188, 160, NULL, NULL),
(240, 290, 2, 187, 240, NULL, NULL),
(241, 290, 2, 181, 120, NULL, NULL),
(242, 290, 2, 203, 38, NULL, NULL),
(243, 290, 2, 179, 152, NULL, NULL),
(244, 290, 2, 164, 28, NULL, NULL),
(245, 291, 2, 189, 2, NULL, NULL),
(246, 298, 2, 157, 110, NULL, NULL),
(247, 299, 2, 170, 219, NULL, NULL),
(248, 299, 2, 165, 897, NULL, NULL),
(249, 300, 2, 170, 269, NULL, NULL),
(250, 300, 2, 165, 328, NULL, NULL),
(251, 300, 2, 158, 27, NULL, NULL),
(252, 305, 2, 144, 1703, NULL, NULL),
(253, 305, 2, 145, 1059, NULL, NULL),
(254, 305, 2, 147, 178, NULL, NULL),
(255, 305, 2, 148, 266, NULL, NULL),
(256, 306, 2, 145, 50, NULL, NULL),
(257, 306, 2, 147, 22, NULL, NULL),
(258, 306, 2, 148, 1001, NULL, NULL),
(259, 307, 2, 144, 972, NULL, NULL),
(260, 308, 2, 194, 48, NULL, NULL),
(261, 308, 2, 213, 1, NULL, NULL),
(262, 308, 2, 146, 8, NULL, NULL),
(263, 313, 2, 144, 0, NULL, NULL),
(264, 313, 2, 147, 0, NULL, NULL),
(265, 313, 2, 146, 0, NULL, NULL),
(266, 313, 2, 145, 0, NULL, NULL),
(267, 314, 2, 144, 17, NULL, NULL),
(268, 314, 2, 147, 26, NULL, NULL),
(269, 314, 2, 146, 4, NULL, NULL),
(270, 314, 2, 145, 18, NULL, NULL),
(271, 315, 2, 144, 20, NULL, NULL),
(272, 316, 2, 144, 20, NULL, NULL),
(273, 316, 2, 145, 2, NULL, NULL),
(274, 316, 2, 148, 1, NULL, NULL),
(275, 317, 2, 144, 174, NULL, NULL),
(276, 317, 2, 148, 5, NULL, NULL),
(277, 317, 2, 147, 3, NULL, NULL),
(278, 317, 2, 145, 6, NULL, NULL),
(279, 318, 2, 194, 12, NULL, NULL),
(280, 318, 2, 148, 6, NULL, NULL),
(281, 318, 2, 146, 3, NULL, NULL),
(282, 319, 2, 194, 5, NULL, NULL),
(283, 319, 2, 146, 205, NULL, NULL),
(284, 320, 2, 144, 271, NULL, NULL),
(285, 320, 2, 148, 125, NULL, NULL),
(286, 320, 2, 146, 93, NULL, NULL),
(287, 322, 2, 194, 71, NULL, NULL),
(288, 322, 2, 148, 22, NULL, NULL),
(289, 322, 2, 147, 4, NULL, NULL),
(290, 322, 2, 146, 25, NULL, NULL),
(291, 322, 2, 144, 7, NULL, NULL),
(292, 331, 2, 144, 2974, NULL, NULL),
(293, 331, 2, 145, 1478, NULL, NULL),
(294, 331, 2, 147, 2873, NULL, NULL),
(295, 331, 2, 148, 2504, NULL, NULL),
(296, 332, 2, 144, 283, NULL, NULL),
(297, 332, 2, 145, 3, NULL, NULL),
(298, 332, 2, 147, 8, NULL, NULL),
(299, 332, 2, 148, 6, NULL, NULL),
(300, 333, 2, 144, 14, NULL, NULL),
(301, 334, 2, 144, 133, NULL, NULL),
(302, 334, 2, 145, 17, NULL, NULL),
(303, 334, 2, 147, 10, NULL, NULL),
(304, 334, 2, 148, 12, NULL, NULL),
(305, 335, 2, 194, 41, NULL, NULL),
(306, 335, 2, 144, 151, NULL, NULL),
(307, 336, 2, 167, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `files`
--

CREATE TABLE `files` (
  `id_file` bigint UNSIGNED NOT NULL,
  `name_old` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_order` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `files`
--

INSERT INTO `files` (`id_file`, `name_old`, `filename`, `id_order`, `created_at`) VALUES
(1, '05. Warehouse Report T5.2020.xlsx', '1590388833.xlsx', 54, '2020-05-25 06:40:34'),
(2, 'Xuất kho voucher_Pers Campaign tháng 6.xlsx', '1597981404.xlsx', 241, '2020-08-21 03:43:24'),
(3, 'Update DS xuất quà.xlsx', '1600252903.xlsx', 278, '2020-09-16 10:41:43'),
(4, 'Tổng hợp thông tin nhận thưởng RD challenge tháng 8.xlsx', '1603790490.xlsx', 317, '2020-10-27 09:21:31'),
(5, 'Tổng hợp thông tin trả thưởng CT additional contest tháng 8 - MB staff(Chia lại voucher).xlsx', '1603855609.xlsx', 319, '2020-10-28 03:26:49'),
(6, 'Kết quả Per tháng 8 _Truyền thông - MB.xlsx', '1603857230.xlsx', 320, '2020-10-28 03:53:50'),
(7, 'Chi trả Voucher KHDN Đợt 1+2.xlsx', '1605599091.xlsx', 322, '2020-11-17 07:44:51'),
(8, 'Thông tin trả thưởng Challenge tháng 9 - Gửi xuất kho.xlsx', '1605612262.xlsx', 332, '2020-11-17 11:24:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(14, '2014_10_12_000000_create_users_table', 1),
(15, '2014_10_12_100000_create_password_resets_table', 1),
(16, '2019_08_19_000000_create_failed_jobs_table', 1),
(17, '2020_02_20_163016_create_danhmucs_table', 1),
(18, '2020_02_20_170739_create_warehouse_histories_table', 1),
(19, '2020_02_20_172439_create_warehouses_table', 1),
(20, '2020_02_23_022347_create_files_table', 1),
(21, '2020_02_23_122833_create_user_activations_table', 1),
(22, '2020_02_23_122935_alter_users_table', 1),
(23, '2020_02_24_110923_create_permissions_table', 1),
(24, '2020_02_28_145950_create_warehouse_goods_table', 1),
(25, '2020_02_29_000228_create_system_histories_table', 1),
(26, '2020_03_27_060232_delivery_history', 1),
(27, '2020_05_05_130131_create_donxuats_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notificaiton`
--

CREATE TABLE `notificaiton` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `ntf_title` text COLLATE utf8mb4_general_ci NOT NULL,
  `ntf_content` text COLLATE utf8mb4_general_ci NOT NULL,
  `ntf_link` text COLLATE utf8mb4_general_ci NOT NULL,
  `ntf_style` text COLLATE utf8mb4_general_ci,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `notificaiton`
--

INSERT INTO `notificaiton` (`id`, `user_id`, `ntf_title`, `ntf_content`, `ntf_link`, `ntf_style`, `status`, `created_at`) VALUES
(1, 1, 'Đơn hàng [331] đã được phê duyệt', 'Xem chi tiết đơn hàng', 'http://127.0.0.1:8000/xuatkho/331', 'success', 1, '2020-11-23 08:45:27'),
(2, 62, 'Có 1 đơn hàng mới cần phê duyệt', 'Bấm vào đây và phê duyệt đơn hàng này nào !', 'http://127.0.0.1:8000/xuatkho/336', 'warning', 0, '2020-11-24 03:04:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('bac.nguyen.71271@gmail.com', '$2y$10$DwHCPRfAEjVtPWDprxVF1.odFuUHHHve34tb7iVJUWcRD4sSid61C', '2020-11-23 08:28:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `warehouse_id` int NOT NULL,
  `permission` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `user_id`, `warehouse_id`, `permission`, `created_at`, `updated_at`) VALUES
(15, 4, 1, 'User', NULL, NULL),
(16, 4, 2, 'User', NULL, NULL),
(17, 3, 1, 'Delivery', NULL, NULL),
(18, 5, 1, 'Delivery', NULL, NULL),
(19, 5, 2, 'Delivery', NULL, NULL),
(24, 7, 1, 'User', NULL, NULL),
(25, 7, 2, 'User', NULL, NULL),
(32, 6, 1, 'Delivery', NULL, NULL),
(33, 6, 2, 'Delivery', NULL, NULL),
(52, 11, 1, 'User', NULL, NULL),
(53, 11, 2, 'User', NULL, NULL),
(54, 11, 3, 'User', NULL, NULL),
(55, 10, 1, 'User', NULL, NULL),
(56, 10, 2, 'User', NULL, NULL),
(57, 10, 3, 'User', NULL, NULL),
(58, 9, 1, 'User', NULL, NULL),
(59, 9, 2, 'User', NULL, NULL),
(60, 9, 3, 'User', NULL, NULL),
(61, 13, 1, 'Approved', NULL, NULL),
(62, 13, 2, 'Approved', NULL, NULL),
(63, 13, 3, 'Approved', NULL, NULL),
(66, 12, 1, 'Administrator', NULL, NULL),
(67, 12, 2, 'Administrator', NULL, NULL),
(68, 12, 3, 'Administrator', NULL, NULL),
(72, 15, 1, 'User', NULL, NULL),
(73, 15, 2, 'User', NULL, NULL),
(74, 15, 3, 'User', NULL, NULL),
(78, 14, 2, 'Delivery', NULL, NULL),
(80, 8, 1, 'Administrator', NULL, NULL),
(81, 8, 2, 'Administrator', NULL, NULL),
(82, 8, 3, 'Administrator', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `system_histories`
--

CREATE TABLE `system_histories` (
  `id` bigint UNSIGNED NOT NULL,
  `hanhdong` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `userid` int NOT NULL,
  `thongtin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `system_histories`
--

INSERT INTO `system_histories` (`id`, `hanhdong`, `userid`, `thongtin`, `created_at`) VALUES
(190, 'Nhập kho', 8, '158', '2020-08-07 02:44:57'),
(191, 'Nhập kho', 8, '159', '2020-08-07 02:44:57'),
(192, 'Nhập kho', 8, '161', '2020-08-07 02:44:57'),
(193, 'Nhập kho', 8, '160', '2020-08-07 02:44:57'),
(194, 'Nhập kho', 8, '162', '2020-08-07 02:44:57'),
(195, 'Nhập kho', 8, '163', '2020-08-07 02:44:57'),
(196, 'Nhập kho', 8, '164', '2020-08-07 02:44:57'),
(197, 'Nhập kho', 8, '167', '2020-08-07 02:44:57'),
(198, 'Nhập kho', 8, '165', '2020-08-07 02:44:57'),
(199, 'Nhập kho', 8, '166', '2020-08-07 02:44:57'),
(200, 'Nhập kho', 8, '168', '2020-08-07 02:44:57'),
(201, 'Nhập kho', 8, '169', '2020-08-07 02:44:57'),
(202, 'Nhập kho', 8, '170', '2020-08-07 02:44:57'),
(203, 'Nhập kho', 8, '171', '2020-08-07 02:44:57'),
(204, 'Nhập kho', 8, '172', '2020-08-07 02:46:14'),
(205, 'Nhập kho', 8, '173', '2020-08-07 03:01:50'),
(206, 'Nhập kho', 8, '174', '2020-08-07 03:01:50'),
(207, 'Nhập kho', 8, '175', '2020-08-07 03:01:50'),
(208, 'Nhập kho', 8, '176', '2020-08-07 03:01:50'),
(209, 'Nhập kho', 8, '177', '2020-08-07 03:01:50'),
(210, 'Nhập kho', 8, '178', '2020-08-07 03:01:50'),
(211, 'Nhập kho', 8, '179', '2020-08-07 03:01:50'),
(212, 'Nhập kho', 8, '180', '2020-08-07 03:01:50'),
(213, 'Nhập kho', 8, '181', '2020-08-07 03:01:50'),
(214, 'Nhập kho', 8, '182', '2020-08-07 03:01:50'),
(215, 'Nhập kho', 8, '183', '2020-08-07 03:01:50'),
(216, 'Nhập kho', 8, '184', '2020-08-07 03:01:50'),
(217, 'Nhập kho', 8, '185', '2020-08-07 03:01:50'),
(218, 'Nhập kho', 8, '186', '2020-08-07 03:01:50'),
(219, 'Nhập kho', 8, '187', '2020-08-07 03:01:50'),
(220, 'Nhập kho', 8, '188', '2020-08-07 03:01:50'),
(221, 'Nhập kho', 8, '189', '2020-08-07 03:01:50'),
(222, 'Nhập kho', 8, '190', '2020-08-07 03:01:50'),
(223, 'Nhập kho', 8, '191', '2020-08-07 03:01:50'),
(224, 'Nhập kho', 8, '192', '2020-08-07 03:01:50'),
(225, 'Nhập kho', 8, '193', '2020-08-07 03:01:50'),
(226, 'Nhập kho', 8, '194', '2020-08-07 03:01:50'),
(227, 'Nhập kho', 8, '195', '2020-08-07 03:01:50'),
(228, 'Nhập kho', 8, '196', '2020-08-07 03:01:50'),
(229, 'Nhập kho', 8, '197', '2020-08-07 03:01:50'),
(230, 'Nhập kho', 8, '198', '2020-08-07 03:01:50'),
(231, 'Nhập kho', 8, '199', '2020-08-07 03:01:50'),
(232, 'Nhập kho', 8, '200', '2020-08-07 03:01:50'),
(233, 'Nhập kho', 8, '201', '2020-08-07 03:01:50'),
(234, 'Nhập kho', 8, '202', '2020-08-07 03:01:50'),
(235, 'Nhập kho', 8, '203', '2020-08-07 03:01:50'),
(236, 'Nhập kho', 8, '204', '2020-08-07 03:01:50'),
(237, 'Nhập kho', 8, '205', '2020-08-07 03:01:50'),
(238, 'Nhập kho', 8, '206', '2020-08-07 03:03:57'),
(239, 'Xuất kho', 8, '207', '2020-08-07 06:51:57'),
(240, 'Xác nhận đơn hàng', 8, '207', '2020-08-07 06:52:10'),
(241, 'Nhập kho', 8, '208', '2020-08-07 06:56:35'),
(242, 'Xuất kho', 8, '209', '2020-08-07 06:58:07'),
(243, 'Xác nhận đơn hàng', 8, '209', '2020-08-07 06:58:13'),
(244, 'Nhập kho', 8, '210', '2020-08-07 07:36:53'),
(245, 'Nhập kho', 8, '211', '2020-08-07 07:36:53'),
(246, 'Xuất kho', 8, '212', '2020-08-07 08:29:53'),
(247, 'Nhập kho', 8, '213', '2020-08-12 03:31:58'),
(248, 'Nhập kho', 8, '214', '2020-08-14 07:21:29'),
(249, 'Nhập kho', 8, '215', '2020-08-14 07:35:39'),
(250, 'Nhập kho', 8, '216', '2020-08-14 07:35:39'),
(251, 'Nhập kho', 8, '217', '2020-08-14 07:35:39'),
(252, 'Nhập kho', 8, '218', '2020-08-14 07:43:39'),
(253, 'Xuất kho', 8, '219', '2020-08-18 02:40:41'),
(254, 'Xác nhận đơn hàng', 8, '219', '2020-08-18 02:40:56'),
(255, 'Nhập kho', 8, '220', '2020-08-18 02:44:13'),
(256, 'Xuất kho', 8, '221', '2020-08-18 02:45:51'),
(257, 'Xác nhận đơn hàng', 8, '221', '2020-08-18 02:45:55'),
(258, 'Xuất kho', 8, '222', '2020-08-18 02:57:06'),
(259, 'Xác nhận đơn hàng', 8, '222', '2020-08-18 02:57:10'),
(260, 'Xuất kho', 8, '223', '2020-08-18 03:01:26'),
(261, 'Xác nhận đơn hàng', 8, '223', '2020-08-18 03:01:30'),
(262, 'Xuất kho', 8, '224', '2020-08-18 03:02:30'),
(263, 'Xuất kho', 8, '225', '2020-08-18 03:03:09'),
(264, 'Xuất kho', 8, '226', '2020-08-18 03:03:47'),
(265, 'Xuất kho', 8, '227', '2020-08-18 03:09:17'),
(266, 'Xác nhận đơn hàng', 8, '224', '2020-08-18 03:09:28'),
(267, 'Xác nhận đơn hàng', 8, '225', '2020-08-18 03:09:37'),
(268, 'Xác nhận đơn hàng', 8, '226', '2020-08-18 03:09:43'),
(269, 'Xác nhận đơn hàng', 8, '227', '2020-08-18 03:09:55'),
(270, 'Xuất kho', 8, '228', '2020-08-18 03:13:33'),
(271, 'Xác nhận đơn hàng', 8, '228', '2020-08-18 03:15:40'),
(272, 'Xuất kho', 8, '229', '2020-08-19 09:54:08'),
(273, 'Xác nhận đơn hàng', 8, '229', '2020-08-19 09:54:13'),
(274, 'Nhập kho', 8, '230', '2020-08-19 09:55:39'),
(275, 'Xuất kho', 8, '231', '2020-08-19 09:57:13'),
(276, 'Xác nhận đơn hàng', 8, '231', '2020-08-19 09:57:18'),
(277, 'Nhập kho', 1, '232', '2020-08-20 09:47:02'),
(278, 'Nhập kho', 1, '233', '2020-08-20 09:47:02'),
(279, 'Nhập kho', 1, '234', '2020-08-20 09:47:02'),
(280, 'Nhập kho', 1, '235', '2020-08-20 09:47:02'),
(281, 'Nhập kho', 1, '236', '2020-08-20 09:47:02'),
(282, 'Nhập kho', 1, '237', '2020-08-20 09:47:02'),
(283, 'Xuất kho', 10, '238', '2020-08-21 01:32:59'),
(284, 'Xác nhận đơn hàng', 13, '238', '2020-08-21 01:39:36'),
(285, 'Xuất kho', 8, '239', '2020-08-21 01:57:07'),
(286, 'Xác nhận đơn hàng', 8, '239', '2020-08-21 01:57:14'),
(287, 'Xuất kho', 11, '240', '2020-08-21 02:05:02'),
(288, 'Xác nhận đơn hàng', 13, '240', '2020-08-21 02:25:40'),
(289, 'Nhận giao đơn hàng', 14, '219', '2020-08-21 03:31:16'),
(290, 'Hoàn tất giao hàng', 14, '219', '2020-08-21 03:31:30'),
(291, 'Xuất kho', 8, '241', '2020-08-21 03:43:24'),
(292, 'Xác nhận đơn hàng', 8, '241', '2020-08-21 03:44:05'),
(293, 'Nhận giao đơn hàng', 14, '221', '2020-08-21 03:48:14'),
(294, 'Hoàn tất giao hàng', 14, '221', '2020-08-21 03:48:17'),
(295, 'Nhận giao đơn hàng', 14, '222', '2020-08-21 03:48:31'),
(296, 'Hoàn tất giao hàng', 14, '222', '2020-08-21 03:48:37'),
(297, 'Nhận giao đơn hàng', 14, '223', '2020-08-21 03:48:43'),
(298, 'Hoàn tất giao hàng', 14, '223', '2020-08-21 03:48:48'),
(299, 'Nhận giao đơn hàng', 14, '224', '2020-08-21 03:48:52'),
(300, 'Hoàn tất giao hàng', 14, '224', '2020-08-21 03:48:56'),
(301, 'Nhận giao đơn hàng', 14, '225', '2020-08-21 03:49:01'),
(302, 'Hoàn tất giao hàng', 14, '225', '2020-08-21 03:49:06'),
(303, 'Nhận giao đơn hàng', 14, '226', '2020-08-21 03:49:10'),
(304, 'Hoàn tất giao hàng', 14, '226', '2020-08-21 03:49:15'),
(305, 'Nhận giao đơn hàng', 14, '227', '2020-08-21 03:49:22'),
(306, 'Hoàn tất giao hàng', 14, '227', '2020-08-21 03:49:29'),
(307, 'Nhận giao đơn hàng', 14, '228', '2020-08-21 03:49:35'),
(308, 'Hoàn tất giao hàng', 14, '228', '2020-08-21 03:49:39'),
(309, 'Nhận giao đơn hàng', 14, '229', '2020-08-21 03:49:43'),
(310, 'Hoàn tất giao hàng', 14, '229', '2020-08-21 03:49:49'),
(311, 'Nhận giao đơn hàng', 14, '231', '2020-08-21 03:49:55'),
(312, 'Hoàn tất giao hàng', 14, '231', '2020-08-21 03:50:01'),
(313, 'Nhận giao đơn hàng', 14, '238', '2020-08-21 04:01:35'),
(314, 'Hoàn tất giao hàng', 14, '238', '2020-08-21 04:01:42'),
(315, 'Nhận giao đơn hàng', 14, '239', '2020-08-21 04:01:51'),
(316, 'Hoàn tất giao hàng', 14, '239', '2020-08-21 04:01:57'),
(317, 'Nhận giao đơn hàng', 14, '240', '2020-08-21 04:02:03'),
(318, 'Hoàn tất giao hàng', 14, '240', '2020-08-21 04:02:12'),
(319, 'Nhận giao đơn hàng', 14, '241', '2020-08-21 04:02:18'),
(320, 'Hoàn tất giao hàng', 14, '241', '2020-08-21 04:02:24'),
(321, 'Xuất kho', 11, '242', '2020-08-21 07:00:06'),
(322, 'Nhập kho', 12, '243', '2020-08-24 03:51:09'),
(323, 'Nhập kho', 12, '244', '2020-08-24 03:51:09'),
(324, 'Nhập kho', 12, '245', '2020-08-24 03:51:09'),
(325, 'Nhập kho', 12, '246', '2020-08-24 03:51:09'),
(326, 'Xuất kho', 12, '247', '2020-08-24 03:54:34'),
(327, 'Xác nhận đơn hàng', 13, '247', '2020-08-25 02:44:07'),
(328, 'Xác nhận đơn hàng', 13, '242', '2020-08-25 02:44:19'),
(329, 'Xuất kho', 10, '248', '2020-08-25 02:49:25'),
(330, 'Xác nhận đơn hàng', 13, '248', '2020-08-25 02:53:03'),
(331, 'Xuất kho', 11, '249', '2020-08-25 04:52:53'),
(332, 'Xác nhận đơn hàng', 13, '249', '2020-08-25 05:45:14'),
(333, 'Xuất kho', 11, '250', '2020-08-25 07:25:47'),
(334, 'Xuất kho', 11, '251', '2020-08-25 08:00:07'),
(335, 'Xuất kho', 11, '252', '2020-08-25 08:03:43'),
(336, 'Xác nhận đơn hàng', 13, '252', '2020-08-25 09:31:12'),
(337, 'Xác nhận đơn hàng', 13, '250', '2020-08-25 09:31:26'),
(338, 'Xác nhận đơn hàng', 13, '251', '2020-08-25 09:31:55'),
(339, 'Nhận giao đơn hàng', 14, '249', '2020-08-26 09:13:27'),
(340, 'Hoàn tất giao hàng', 14, '249', '2020-08-26 15:45:40'),
(341, 'Nhận giao đơn hàng', 14, '247', '2020-08-26 15:46:14'),
(342, 'Hoàn tất giao hàng', 14, '247', '2020-08-26 15:46:32'),
(343, 'Nhận giao đơn hàng', 14, '252', '2020-08-26 15:48:01'),
(344, 'Hoàn tất giao hàng', 14, '252', '2020-08-26 15:48:14'),
(345, 'Nhận giao đơn hàng', 14, '250', '2020-08-26 16:07:31'),
(346, 'Nhận giao đơn hàng', 14, '242', '2020-08-26 16:07:41'),
(347, 'Nhận giao đơn hàng', 14, '251', '2020-08-26 16:07:54'),
(348, 'Nhập kho', 12, '253', '2020-08-28 04:05:27'),
(349, 'Nhập kho', 12, '254', '2020-08-28 04:05:27'),
(350, 'Nhập kho', 12, '255', '2020-08-28 04:05:27'),
(351, 'Nhập kho', 8, '256', '2020-08-28 06:45:19'),
(352, 'Nhập kho', 8, '257', '2020-08-28 06:45:19'),
(353, 'Nhập kho', 8, '258', '2020-08-28 06:45:19'),
(354, 'Nhập kho', 8, '259', '2020-08-28 06:45:19'),
(355, 'Nhập kho', 8, '260', '2020-08-28 06:45:19'),
(356, 'Nhập kho', 8, '261', '2020-08-28 06:47:28'),
(357, 'Nhập kho', 8, '262', '2020-08-28 06:47:28'),
(358, 'Nhập kho', 8, '263', '2020-08-28 06:47:28'),
(359, 'Nhập kho', 8, '264', '2020-08-28 06:47:28'),
(360, 'Xuất kho', 12, '265', '2020-08-28 10:12:15'),
(361, 'Xuất kho', 12, '266', '2020-08-28 10:15:03'),
(362, 'Nhập kho', 8, '267', '2020-09-03 03:31:24'),
(363, 'Xuất kho', 15, '268', '2020-09-03 07:38:37'),
(364, 'Hoàn tất giao hàng', 14, '242', '2020-09-04 04:56:01'),
(365, 'Hoàn tất giao hàng', 14, '250', '2020-09-04 04:56:33'),
(366, 'Hoàn tất giao hàng', 14, '251', '2020-09-04 04:56:46'),
(367, 'Xuất kho', 11, '269', '2020-09-07 03:19:47'),
(368, 'Xác nhận đơn hàng', 13, '269', '2020-09-07 07:48:23'),
(369, 'Xác nhận đơn hàng', 13, '268', '2020-09-07 07:48:33'),
(370, 'Xác nhận đơn hàng', 13, '266', '2020-09-07 07:48:44'),
(371, 'Xác nhận đơn hàng', 13, '265', '2020-09-07 07:49:40'),
(372, 'Xuất kho', 11, '270', '2020-09-07 08:39:36'),
(373, 'Nhập kho', 8, '271', '2020-09-07 09:08:34'),
(374, 'Nhập kho', 8, '272', '2020-09-07 09:08:34'),
(375, 'Nhập kho', 8, '273', '2020-09-07 09:09:42'),
(376, 'Xác nhận đơn hàng', 13, '270', '2020-09-07 09:41:58'),
(377, 'Xuất kho', 15, '274', '2020-09-08 09:28:50'),
(378, 'Xuất kho', 15, '275', '2020-09-08 09:45:55'),
(379, 'Xác nhận đơn hàng', 1, '275', '2020-09-08 10:27:50'),
(380, 'Xác nhận đơn hàng', 1, '274', '2020-09-08 10:27:55'),
(381, 'Xuất kho', 8, '276', '2020-09-11 04:01:02'),
(382, 'Nhận giao đơn hàng', 14, '265', '2020-09-11 04:38:33'),
(383, 'Hoàn tất giao hàng', 14, '265', '2020-09-11 04:38:43'),
(384, 'Nhận giao đơn hàng', 14, '266', '2020-09-11 04:39:03'),
(385, 'Hoàn tất giao hàng', 14, '266', '2020-09-11 04:39:11'),
(386, 'Nhận giao đơn hàng', 14, '268', '2020-09-11 04:39:49'),
(387, 'Hoàn tất giao hàng', 14, '268', '2020-09-11 04:39:54'),
(388, 'Nhận giao đơn hàng', 14, '269', '2020-09-11 04:40:06'),
(389, 'Hoàn tất giao hàng', 14, '269', '2020-09-11 04:40:16'),
(390, 'Nhận giao đơn hàng', 14, '274', '2020-09-11 04:40:42'),
(391, 'Hoàn tất giao hàng', 14, '274', '2020-09-11 04:40:47'),
(392, 'Nhận giao đơn hàng', 14, '275', '2020-09-11 04:40:55'),
(393, 'Hoàn tất giao hàng', 14, '275', '2020-09-11 04:41:11'),
(394, 'Xuất kho', 11, '277', '2020-09-16 03:37:24'),
(395, 'Xuất kho', 11, '278', '2020-09-16 10:41:43'),
(396, 'Xuất kho', 9, '279', '2020-09-17 10:01:38'),
(397, 'Nhập kho', 12, '280', '2020-09-18 02:07:51'),
(398, 'Nhập kho', 12, '281', '2020-09-18 02:07:51'),
(399, 'Nhập kho', 12, '282', '2020-09-18 02:07:51'),
(400, 'Xuất kho', 12, '283', '2020-09-18 02:10:58'),
(401, 'Xác nhận đơn hàng', 13, '283', '2020-09-21 03:15:11'),
(402, 'Xác nhận đơn hàng', 13, '279', '2020-09-21 03:17:06'),
(403, 'Xác nhận đơn hàng', 13, '278', '2020-09-21 03:17:59'),
(404, 'Xác nhận đơn hàng', 13, '277', '2020-09-21 03:18:27'),
(405, 'Xác nhận đơn hàng', 13, '276', '2020-09-21 03:18:49'),
(406, 'Xuất kho', 8, '284', '2020-09-21 04:27:49'),
(407, 'Xác nhận đơn hàng', 1, '284', '2020-09-21 04:30:36'),
(408, 'Nhận giao đơn hàng', 14, '276', '2020-09-21 05:19:33'),
(409, 'Nhận giao đơn hàng', 14, '277', '2020-09-21 12:04:01'),
(410, 'Nhận giao đơn hàng', 14, '278', '2020-09-21 12:04:24'),
(411, 'Nhận giao đơn hàng', 14, '283', '2020-09-21 12:04:37'),
(412, 'Nhận giao đơn hàng', 14, '284', '2020-09-21 12:04:51'),
(413, 'Hoàn tất giao hàng', 14, '284', '2020-09-21 13:50:37'),
(414, 'Hoàn tất giao hàng', 14, '277', '2020-09-21 13:50:59'),
(415, 'Hoàn tất giao hàng', 14, '276', '2020-09-21 13:51:08'),
(416, 'Hoàn tất giao hàng', 14, '278', '2020-09-21 13:51:17'),
(417, 'Nhận giao đơn hàng', 14, '279', '2020-09-21 13:51:38'),
(418, 'Xuất kho', 8, '285', '2020-09-22 03:01:27'),
(419, 'Xuất kho', 12, '286', '2020-09-22 04:10:31'),
(420, 'Xuất kho', 9, '287', '2020-09-22 04:33:32'),
(421, 'Nhập kho', 8, '288', '2020-09-22 09:09:16'),
(422, 'Hoàn tất giao hàng', 14, '283', '2020-09-22 17:33:36'),
(423, 'Nhập kho', 8, '289', '2020-09-28 09:14:30'),
(424, 'Xuất kho', 8, '290', '2020-09-28 10:03:38'),
(425, 'Xác nhận đơn hàng', 8, '290', '2020-09-28 10:10:21'),
(426, 'Xuất kho', 8, '291', '2020-09-29 02:56:09'),
(427, 'Xác nhận đơn hàng', 8, '285', '2020-10-02 10:27:28'),
(428, 'Xác nhận đơn hàng', 1, '286', '2020-10-02 10:28:05'),
(429, 'Xác nhận đơn hàng', 1, '291', '2020-10-02 10:28:18'),
(430, 'Nhập kho', 8, '292', '2020-10-07 01:43:53'),
(431, 'Nhập kho', 8, '293', '2020-10-07 01:43:53'),
(432, 'Nhập kho', 8, '294', '2020-10-07 01:43:53'),
(433, 'Nhập kho', 8, '295', '2020-10-08 10:22:25'),
(434, 'Nhập kho', 8, '296', '2020-10-08 10:22:25'),
(435, 'Nhập kho', 8, '297', '2020-10-08 10:22:26'),
(436, 'Xuất kho', 10, '298', '2020-10-14 01:45:59'),
(437, 'Xuất kho', 10, '299', '2020-10-14 01:50:36'),
(438, 'Xuất kho', 10, '300', '2020-10-14 01:59:59'),
(439, 'Nhập kho', 12, '301', '2020-10-15 02:27:17'),
(440, 'Nhập kho', 12, '302', '2020-10-15 02:27:17'),
(441, 'Nhập kho', 12, '303', '2020-10-15 02:27:17'),
(442, 'Nhập kho', 12, '304', '2020-10-15 02:27:17'),
(443, 'Xuất kho', 12, '305', '2020-10-15 02:32:31'),
(444, 'Xuất kho', 12, '306', '2020-10-15 02:34:18'),
(445, 'Xuất kho', 12, '307', '2020-10-15 02:37:25'),
(446, 'Xuất kho', 8, '308', '2020-10-26 04:18:06'),
(447, 'Nhập kho', 8, '309', '2020-10-26 04:21:09'),
(448, 'Nhập kho', 8, '311', '2020-10-26 04:21:09'),
(449, 'Nhập kho', 8, '310', '2020-10-26 04:21:09'),
(450, 'Nhập kho', 8, '312', '2020-10-26 04:21:09'),
(451, 'Xác nhận đơn hàng', 8, '308', '2020-10-26 04:26:09'),
(452, 'Xác nhận đơn hàng', 1, '307', '2020-10-26 04:26:37'),
(453, 'Xác nhận đơn hàng', 1, '306', '2020-10-26 04:26:44'),
(454, 'Xác nhận đơn hàng', 1, '305', '2020-10-26 04:26:54'),
(455, 'Xác nhận đơn hàng', 1, '299', '2020-10-26 04:27:01'),
(456, 'Xác nhận đơn hàng', 1, '298', '2020-10-26 04:27:08'),
(457, 'Xác nhận đơn hàng', 1, '300', '2020-10-26 04:27:25'),
(458, 'Xuất kho', 1, '313', '2020-10-26 04:56:17'),
(459, 'Xuất kho', 8, '314', '2020-10-26 04:58:29'),
(460, 'Xác nhận đơn hàng', 8, '314', '2020-10-26 04:59:31'),
(461, 'Xuất kho', 12, '315', '2020-10-27 03:48:47'),
(462, 'Xuất kho', 12, '316', '2020-10-27 04:42:05'),
(463, 'Xuất kho', 8, '317', '2020-10-27 09:21:30'),
(464, 'Xuất kho', 8, '318', '2020-10-28 03:02:35'),
(465, 'Xuất kho', 8, '319', '2020-10-28 03:26:49'),
(466, 'Xuất kho', 8, '320', '2020-10-28 03:53:49'),
(467, 'Xác nhận đơn hàng', 8, '320', '2020-11-10 04:16:14'),
(468, 'Xác nhận đơn hàng', 1, '319', '2020-11-10 04:16:52'),
(469, 'Xác nhận đơn hàng', 1, '318', '2020-11-10 04:17:01'),
(470, 'Xác nhận đơn hàng', 1, '317', '2020-11-10 04:17:08'),
(471, 'Xác nhận đơn hàng', 1, '316', '2020-11-10 04:17:14'),
(472, 'Xác nhận đơn hàng', 1, '315', '2020-11-10 04:17:24'),
(473, 'Nhập kho', 8, '321', '2020-11-17 06:44:07'),
(474, 'Xuất kho', 11, '322', '2020-11-17 07:44:51'),
(475, 'Xác nhận đơn hàng', 1, '322', '2020-11-17 08:15:29'),
(476, 'Nhập kho', 12, '323', '2020-11-17 11:16:20'),
(477, 'Nhập kho', 12, '324', '2020-11-17 11:16:20'),
(478, 'Nhập kho', 12, '325', '2020-11-17 11:16:20'),
(479, 'Nhập kho', 12, '326', '2020-11-17 11:16:20'),
(480, 'Nhập kho', 12, '327', '2020-11-17 11:18:51'),
(481, 'Nhập kho', 12, '328', '2020-11-17 11:18:51'),
(482, 'Nhập kho', 12, '329', '2020-11-17 11:18:51'),
(483, 'Nhập kho', 12, '330', '2020-11-17 11:18:51'),
(484, 'Xuất kho', 12, '331', '2020-11-17 11:22:36'),
(485, 'Xuất kho', 12, '332', '2020-11-17 11:24:22'),
(486, 'Xuất kho', 12, '333', '2020-11-17 11:25:49'),
(487, 'Xuất kho', 11, '334', '2020-11-19 11:19:31'),
(488, 'Xuất kho', 11, '335', '2020-11-20 03:45:03'),
(489, 'Xác nhận đơn hàng', 1, '331', '2020-11-23 08:45:27'),
(490, 'Xuất kho', 1, '336', '2020-11-24 03:04:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `permission` int NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `permission`, `password`, `api_token`, `remember_token`, `created_at`, `active`) VALUES
(1, 'Nguyễn Văn Bắc', 'bac.nguyen.71271@gmail.com', NULL, 0, '$2y$12$K0qZgcSRR0YB.Y.S8DcOouj1bcKI17f5ZYwKV00IKQRDGkybBzQfq', NULL, 'PQXQjdAcb2LSao0PJJ6fHF9TMku8BGURzkkMe2ychMXyKr5XbRvQLvRoNFNs', '2020-02-28 11:32:34', 1),
(2, 'Dương Minh Châu', 'minhchauneu@gmail.com', NULL, 0, '$2y$10$IfrB8vEHSKbJlzoC9uxHKeq3wmoAeMhiWSXw7pLfUy3yjpdqXWQ/.', NULL, 'IbY7Kun6RMJbyti4NIT7nEp48i8ABkzakHLk6VxuTg26aoy5fVcHVABVZNvu', '2020-02-29 20:14:14', 1),
(3, 'Nguyễn Văn Bắc', 'bac.nguyen.71271@gmail.co2', NULL, 2, '$2y$12$K0qZgcSRR0YB.Y.S8DcOouj1bcKI17f5ZYwKV00IKQRDGkybBzQfq', NULL, NULL, '2020-02-29 20:16:44', 1),
(4, 'HaThu', 'honeyed.strawberry@gmail.com', NULL, 0, '$2y$10$bXOVPexitjRwk5u5TQ6XU.2S0tjbcew.YC6kpvb0DE.qyO33iFY6S', NULL, 'gVJCFL6Kf4VxgSxdYL8gwnZi1xFQpj8HhrhLeT64QbsLSNQuQgHr6WZrLRJS', '2020-03-09 03:22:50', 1),
(5, 'HaThu1', 'nghathu28@gmail.com', NULL, 2, '$2y$10$GbOQ0h6JaFIlCI5QQ8ysyeHtbM3B95OESL1l7EdMkUnM1od.U9ajK', NULL, NULL, '2020-04-20 03:54:58', 1),
(6, 'HaThu01', 'honeyed_strawberry@yahoo.com.vn', NULL, 2, '$2y$10$2KJZiTtB7gHohHQYZrTlTeX0xLuZ16.ophvaaKCbN/lU2tKEHoNVy', NULL, '9z0FWo9KtQJCjmo1e3sBreqkj5kt7o1Y1oZvoRWwvhGN012G0fNE1YED1hJL', '2020-04-20 03:56:45', 1),
(7, 'Nguyễn Văn Bắc', 'hitarity@gmail.com', NULL, 2, '$2y$12$K0qZgcSRR0YB.Y.S8DcOouj1bcKI17f5ZYwKV00IKQRDGkybBzQfq', NULL, '', '2020-02-28 11:32:34', 1),
(8, 'Cao Phương Minh', 'minh.cp@mbageas.life', NULL, 2, '$2y$10$e39/15uuQkKXnrMpvIjhge8ESiP3S/EbDYyYFsbOZdVL932AweAEy', NULL, 'eT3hm937xb6tsd31wzXZQ2TuMRdEvlBhexmbxPN6V6Q9vrY6h9EfXauN2GxA', '2020-06-25 02:52:45', 1),
(9, 'Trần Thị Quỳnh Hoa', 'hoa.ttq@mbageas.life', NULL, 2, '$2y$10$XIQ9gXdgq.NlPxptZv2jReyXqlJzU0i6a9FrqxwEFZMOzzHRRBEv.', NULL, '286q4W97hUbmFmOaH2kteKiE2cY2QTSwdiFcgLHRLI9MrdsWx3tiEKjYaQM1', '2020-08-18 17:41:22', 1),
(10, 'Phi Lê Ly', 'ly.pl@mbageas.life', NULL, 2, '$2y$10$YbDHGtgBduJYJA0npGr3De4n9rVphKBSDyRonmxWSoNevPHlh8.bO', NULL, 'Qso5s2XQ5Pxnm35KKG5oWCHkrOlYbaaqwxtyr801zMhTU2I3H5oDOPKU6nzE', '2020-08-18 17:43:47', 1),
(11, 'Lê Huyền Trang', 'trang.lh1@mbageas.life', NULL, 2, '$2y$10$suW/O2lbYz6xNnnuWb753.7w.ZHVMUk4wMn0NqA1Mdvte3yDMw8Je', NULL, 'dNs4TJONHe0QeRde7pqDX20pLAUBsYxOwrvrCOSmGeqPM8oWjmut35gKFjyD', '2020-08-19 14:58:43', 1),
(12, 'Nguyễn Thị Hà Thu', 'thu.nth@mbageas.life', NULL, 2, '$2y$10$6NN03gRYWOd8Q.Sltzv6r.Ng1LfzfaZbJABPaBFCQYN9R1ErU55IG', NULL, 'AlEBz52f1i28j2FI38cfhqOSBQ6KcE9fpYdKd4SwJYKq2M2YajbZ9xZwoi6x', '2020-08-19 16:10:23', 1),
(13, 'Lê Thị Nhung', 'nhung.lt@mbageas.life', NULL, 2, '$2y$10$5R7Nu6Mmg5DvWr/hnnq9bO1XSbSpbQfUhqKFhbOzU/TIodvOZwdPS', NULL, NULL, '2020-08-21 08:28:54', 1),
(14, 'HDE', 'hdexpress628@gmail.com', NULL, 2, '$2y$10$OBuR7wHJTD0DJNF27y4Cje.FUJEnc6q209Vb2jsvggt8Jz.ZPGsYu', NULL, 'P7iBBw52zyBvqDjJNIITBL20aojEXHHkDG6BME1dkAecSLUvxIiEiUfk4kH7', '2020-08-21 10:29:51', 1),
(15, 'Pham Hanh Quyen', 'quyen.ph@mbageas.life', NULL, 2, '$2y$10$Do.hARl7S5LyuA6XdiF0u..3p6L1GPT92gXxitD38sET/ozBujX3G', NULL, 'VBkyMvz7AodeJ6gaD8kBVzZlzEiyVRvSmNEDkY8P1fnGw0oZvjpRsRZ0mwyj', '2020-09-03 14:30:21', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_activations`
--

CREATE TABLE `user_activations` (
  `user_id` int UNSIGNED NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `warehouses`
--

CREATE TABLE `warehouses` (
  `id` bigint UNSIGNED NOT NULL,
  `tenkho` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `warehouses`
--

INSERT INTO `warehouses` (`id`, `tenkho`, `created_at`) VALUES
(1, 'Kho MB', '2020-03-26 18:55:51'),
(2, 'Kho HD', '2020-03-26 18:55:51'),
(3, 'Evoucher', '2020-08-07 07:34:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `warehouse_goods`
--

CREATE TABLE `warehouse_goods` (
  `id` bigint UNSIGNED NOT NULL,
  `warehouseid` int NOT NULL,
  `danhmucid` int NOT NULL,
  `soluong` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `warehouse_histories`
--

CREATE TABLE `warehouse_histories` (
  `id` bigint UNSIGNED NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '0: nhập, 1: xuất',
  `warehouseId` int NOT NULL,
  `tenchuongtrinh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `userid` int NOT NULL,
  `danhmucId` int DEFAULT NULL,
  `soluong` int DEFAULT NULL,
  `hansudung` date DEFAULT NULL,
  `thoigian` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `ghichu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `warehouse_histories`
--

INSERT INTO `warehouse_histories` (`id`, `type`, `warehouseId`, `tenchuongtrinh`, `userid`, `danhmucId`, `soluong`, `hansudung`, `thoigian`, `status`, `ghichu`, `created_at`) VALUES
(158, 0, 2, 'Tồn kho T7', 8, 138, 183, '2021-08-07', '2020-08-07', NULL, NULL, '2020-08-07 02:44:57'),
(159, 0, 2, 'Tồn kho T7', 8, 148, 8229, '2021-08-07', '2020-08-07', NULL, NULL, '2020-08-07 02:44:57'),
(160, 0, 2, 'Tồn kho T7', 8, 144, 141, '2021-08-07', '2020-08-07', NULL, NULL, '2020-08-07 02:44:57'),
(161, 0, 2, 'Tồn kho T7', 8, 155, 514, '2021-08-07', '2020-08-07', NULL, NULL, '2020-08-07 02:44:57'),
(162, 0, 2, 'Tồn kho T7', 8, 151, 500, '2021-08-07', '2020-08-07', NULL, NULL, '2020-08-07 02:44:57'),
(163, 0, 2, 'Tồn kho T7', 8, 147, 2379, '2021-08-07', '2020-08-07', NULL, NULL, '2020-08-07 02:44:57'),
(164, 0, 2, 'Tồn kho T7', 8, 146, 1813, '2021-08-07', '2020-08-07', NULL, NULL, '2020-08-07 02:44:57'),
(165, 0, 2, 'Tồn kho T7', 8, 145, 341, '2021-08-07', '2020-08-07', NULL, NULL, '2020-08-07 02:44:57'),
(166, 0, 2, 'Tồn kho T7', 8, 137, 569, '2021-08-07', '2020-08-07', NULL, NULL, '2020-08-07 02:44:57'),
(167, 0, 2, 'Tồn kho T7', 8, 142, 299, '2021-08-07', '2020-08-07', NULL, NULL, '2020-08-07 02:44:57'),
(168, 0, 2, 'Tồn kho T7', 8, 138, 0, '2021-08-07', '2020-08-07', NULL, NULL, '2020-08-07 02:44:57'),
(169, 0, 2, 'Tồn kho T7', 8, 143, 467, '2021-08-07', '2020-08-07', NULL, NULL, '2020-08-07 02:44:57'),
(170, 0, 2, 'Tồn kho T7', 8, 141, 10, '2021-08-07', '2020-08-07', NULL, NULL, '2020-08-07 02:44:57'),
(171, 0, 2, 'Tồn kho T7', 8, 140, 823, '2021-08-07', '2020-08-07', NULL, NULL, '2020-08-07 02:44:57'),
(172, 0, 2, 'Tồn kho T7', 8, 194, 200, '2021-08-07', '2020-08-07', NULL, NULL, '2020-08-07 02:46:14'),
(173, 0, 2, 'Tồn kho T7', 8, 156, 7, '2021-08-07', '2020-08-07', NULL, 'Logo cũ', '2020-08-07 03:01:50'),
(174, 0, 2, 'Tồn kho T7', 8, 157, 1200, '2021-08-07', '2020-08-07', NULL, '21 chiếc logo cũ', '2020-08-07 03:01:50'),
(175, 0, 2, 'Tồn kho T7', 8, 170, 496, '2021-08-07', '2020-08-07', NULL, 'Logo cũ', '2020-08-07 03:01:50'),
(176, 0, 2, 'Tồn kho T7', 8, 189, 2290, '2021-08-07', '2020-08-07', NULL, 'Nhập mới', '2020-08-07 03:01:50'),
(177, 0, 2, 'Tồn kho T7', 8, 193, 355, '2021-08-07', '2020-08-07', NULL, NULL, '2020-08-07 03:01:50'),
(178, 0, 2, 'Tồn kho T7', 8, 191, 730, '2021-08-07', '2020-08-07', NULL, 'Logo cũ', '2020-08-07 03:01:50'),
(179, 0, 2, 'Tồn kho T7', 8, 184, 3802, '2021-08-07', '2020-08-07', NULL, 'Nhập mới', '2020-08-07 03:01:50'),
(180, 0, 2, 'Tồn kho T7', 8, 175, 21, '2021-08-07', '2020-08-07', NULL, NULL, '2020-08-07 03:01:50'),
(181, 0, 2, 'Tồn kho T7', 8, 177, 33, '2021-08-07', '2020-08-07', NULL, NULL, '2020-08-07 03:01:50'),
(182, 0, 2, 'Tồn kho T7', 8, 168, 1100, '2021-08-07', '2020-08-07', NULL, 'Nhập mới', '2020-08-07 03:01:50'),
(183, 0, 2, 'Tồn kho T7', 8, 174, 12, '2021-08-07', '2020-08-07', NULL, NULL, '2020-08-07 03:01:50'),
(184, 0, 2, 'Tồn kho T7', 8, 158, 36, '2021-08-07', '2020-08-07', NULL, 'Logo cũ', '2020-08-07 03:01:50'),
(185, 0, 2, 'Tồn kho T7', 8, 180, 106, '2021-08-07', '2020-08-07', NULL, 'Nhập mới', '2020-08-07 03:01:50'),
(186, 0, 2, 'Tồn kho T7', 8, 173, 448, '2021-08-07', '2020-08-07', NULL, 'Nhập mới', '2020-08-07 03:01:50'),
(187, 0, 2, 'Tồn kho T7', 8, 162, 499, '2021-08-07', '2020-08-07', NULL, 'Nhập mới', '2020-08-07 03:01:50'),
(188, 0, 2, 'Tồn kho T7', 8, 181, 5330, '2021-08-07', '2020-08-07', NULL, 'Nhập mới', '2020-08-07 03:01:50'),
(189, 0, 2, 'Tồn kho T7', 8, 186, 679, '2021-08-07', '2020-08-07', NULL, 'Logo cũ', '2020-08-07 03:01:50'),
(190, 0, 2, 'Tồn kho T7', 8, 169, 100, '2021-08-07', '2020-08-07', NULL, NULL, '2020-08-07 03:01:50'),
(191, 0, 2, 'Tồn kho T7', 8, 188, 4290, '2021-08-07', '2020-08-07', NULL, 'Nhập mới', '2020-08-07 03:01:50'),
(192, 0, 2, 'Tồn kho T7', 8, 159, 68, '2021-08-07', '2020-08-07', NULL, 'Logo cũ', '2020-08-07 03:01:50'),
(193, 0, 2, 'Tồn kho T7', 8, 179, 948, '2021-08-07', '2020-08-07', NULL, 'Nhập mới', '2020-08-07 03:01:50'),
(194, 0, 2, 'Tồn kho T7', 8, 166, 2478, '2021-08-07', '2020-08-07', NULL, 'Logo cũ', '2020-08-07 03:01:50'),
(195, 0, 2, 'Tồn kho T7', 8, 192, 33, '2021-08-07', '2020-08-07', NULL, NULL, '2020-08-07 03:01:50'),
(196, 0, 2, 'Tồn kho T7', 8, 165, 1230, '2021-08-07', '2020-08-07', NULL, 'Logo cũ', '2020-08-07 03:01:50'),
(197, 0, 2, 'Tồn kho T7', 8, 187, 7424, '2021-08-07', '2020-08-07', NULL, 'Nhập mới', '2020-08-07 03:01:50'),
(198, 0, 2, 'Tồn kho T7', 8, 164, 1172, '2021-08-07', '2020-08-07', NULL, 'Nhập mới', '2020-08-07 03:01:50'),
(199, 0, 2, 'Tồn kho T7', 8, 183, 10000, '2021-08-07', '2020-08-07', NULL, 'Nhập mới', '2020-08-07 03:01:50'),
(200, 0, 2, 'Tồn kho T7', 8, 160, 12, '2021-08-07', '2020-08-07', NULL, NULL, '2020-08-07 03:01:50'),
(201, 0, 2, 'Tồn kho T7', 8, 161, 557, '2021-08-07', '2020-08-07', NULL, 'Logo cũ', '2020-08-07 03:01:50'),
(202, 0, 2, 'Tồn kho T7', 8, 167, 48, '2021-08-07', '2020-08-07', NULL, 'Nhập mới', '2020-08-07 03:01:50'),
(203, 0, 2, 'Tồn kho T7', 8, 185, 1080, '2021-08-07', '2020-08-07', NULL, 'Logo cũ', '2020-08-07 03:01:50'),
(204, 0, 2, 'Tồn kho T7', 8, 172, 47, '2021-08-07', '2020-08-07', NULL, NULL, '2020-08-07 03:01:50'),
(205, 0, 2, 'Tồn kho T7', 8, 163, 25, '2021-08-07', '2020-08-07', NULL, NULL, '2020-08-07 03:01:50'),
(206, 0, 2, 'Tồn kho T7', 8, 195, 14, '2021-08-07', '2020-08-07', NULL, 'Nhập mới', '2020-08-07 03:03:57'),
(208, 0, 2, 'Nhập hàng T8', 8, 196, 500, '2021-08-07', '2020-08-07', NULL, NULL, '2020-08-07 06:56:35'),
(210, 0, 3, 'Tồn kho T7', 8, 198, 692, '2021-06-30', '2020-08-07', NULL, NULL, '2020-08-07 07:36:53'),
(211, 0, 3, 'Tồn kho T7', 8, 197, 131, '2021-06-30', '2020-08-07', NULL, NULL, '2020-08-07 07:36:53'),
(213, 0, 2, 'Nhập hàng T8', 8, 199, 500, '2021-08-12', '2020-08-12', NULL, 'Nhập mới', '2020-08-12 03:31:58'),
(214, 0, 2, 'Nhập hàng T8', 8, 200, 500, '2021-08-14', '2020-08-14', NULL, 'Nhập mới', '2020-08-14 07:21:29'),
(215, 0, 2, 'Nhập hàng T8', 8, 203, 500, '2021-08-14', '2020-08-14', NULL, 'Nhập mới', '2020-08-14 07:35:39'),
(216, 0, 2, 'Nhập hàng T8', 8, 202, 500, '2021-08-14', '2020-08-14', NULL, 'Nhập mới', '2020-08-14 07:35:39'),
(217, 0, 2, 'Nhập hàng T8', 8, 201, 500, '2021-08-14', '2020-08-14', NULL, 'Nhập mới', '2020-08-14 07:35:39'),
(218, 0, 2, 'Nhập hàng T8', 8, 204, 500, '2021-08-14', '2020-08-14', NULL, 'Nhập mới', '2020-08-14 07:43:39'),
(219, 1, 2, 'RD Challenge Tháng 6 trả trước', 8, NULL, NULL, NULL, '2020-08-06', 1, 'AM Hanh PGD Xuân Mai', '2020-08-18 02:40:41'),
(220, 0, 2, 'Đổi trả', 8, 180, 5, '2021-08-18', '2020-08-11', NULL, 'AM Hằng 10/08', '2020-08-18 02:44:13'),
(221, 1, 2, 'WS', 8, NULL, NULL, NULL, '2020-08-11', 1, 'Ms Hằng AM – 34 Láng Hạ', '2020-08-18 02:45:51'),
(222, 1, 2, 'IW/GP & WS MKT', 8, NULL, NULL, NULL, '2020-08-03', 1, 'Lưu Thị Thúy Thủy\nNguyễn Sơn Thạch\nTrương Lệ Đoàn\nNguyễn Hải Anh\nNguyễn Thị Kim Ngọc', '2020-08-18 02:57:06'),
(223, 1, 2, 'IW/GP và WS MKT', 8, NULL, NULL, NULL, '2020-08-11', 1, 'BÙI MINH TUẤN ANH\nNguyễn Vũ Hùng\nHoàng Quốc Hưng\nNguyễn Thị Thanh Hương\nLê Phước Thị Thành Vương\nLê Ngọc Quỳnh Trâm', '2020-08-18 03:01:26'),
(224, 1, 2, 'Xuất kho', 8, NULL, NULL, NULL, '2020-08-11', 1, 'AM Hằng', '2020-08-18 03:02:30'),
(225, 1, 2, 'Kiểm tra về chất lượng', 8, NULL, NULL, NULL, '2020-08-11', 1, 'Check hàng', '2020-08-18 03:03:09'),
(226, 1, 2, 'Xuất kho cho AM Vương', 8, NULL, NULL, NULL, '2020-08-11', 1, 'AM Thành Vương trong HCM', '2020-08-18 03:03:47'),
(227, 1, 2, 'IW/WS & MKT', 8, NULL, NULL, NULL, '2020-08-18', 1, NULL, '2020-08-18 03:09:17'),
(228, 1, 2, 'IW cho CN An Phú', 8, NULL, NULL, NULL, '2020-08-14', 1, 'Nguyễn Thị Ngọc Dung\n\n901379464\n\nCao Ốc An Phú, đường Song Hành, An Khánh, Quận 2', '2020-08-18 03:13:33'),
(229, 1, 2, 'Xuất kho IC', 8, NULL, NULL, NULL, '2020-08-17', 1, 'IC Lê Thị Kiều Thao code 2210003195 PGd Hà Huy Tập - CN Nghệ An.', '2020-08-19 09:54:08'),
(230, 0, 2, 'AM Trâm gửi đổi trả', 8, 164, 28, '2021-08-19', '2020-08-19', NULL, NULL, '2020-08-19 09:55:39'),
(231, 1, 2, 'Xuất kho', 8, NULL, NULL, NULL, '2020-08-19', 1, 'Banca CI', '2020-08-19 09:57:13'),
(232, 0, 3, 'Evoucher', 1, 205, 5094, '2022-07-01', '2020-08-20', NULL, 'Tồn', '2020-08-20 09:47:02'),
(233, 0, 3, 'Evoucher', 1, 208, 2037, '2022-07-01', '2020-08-20', NULL, 'Tồn', '2020-08-20 09:47:02'),
(234, 0, 3, 'Evoucher', 1, 209, 255, '2022-07-01', '2020-08-20', NULL, 'Tồn', '2020-08-20 09:47:02'),
(235, 0, 3, 'Evoucher', 1, 210, 3056, '2022-07-01', '2020-08-20', NULL, 'Tồn', '2020-08-20 09:47:02'),
(236, 0, 3, 'Evoucher', 1, 207, 171, '2022-07-01', '2020-08-20', NULL, 'Tồn', '2020-08-20 09:47:02'),
(237, 0, 3, 'Evoucher', 1, 206, 427, '2022-07-01', '2020-08-20', NULL, 'Tồn', '2020-08-20 09:47:02'),
(238, 1, 3, 'Vinh danh 5 CN Xuất sắc KV HCM -Khối Vận hành tháng 7', 10, NULL, NULL, NULL, '2020-08-21', 1, 'ACNC1_VN\n\nChi nhánh\n\nMã nhân viên\n\nHọ tên\n\nJOBTITLE\n\nmail\n\nVN0010202\n\nCN. Quang Trung\n\nMB00000796\n\nTrần Thị Như Ngọc\n\nGiám đốc Dịch vụ\n\nnhungoc.bsg@mbbank.com.vn\n\nVN0010120\n\nCN. Kỳ Đồng\n\nMB00000329\n\nNguyễn Minh Đoàn\n\nGiám đốc Dịch vụ\n\ndoannm.sg@mbbank.com', '2020-08-21 01:32:59'),
(239, 1, 2, 'Xuất kho 1 ô logo cũ', 8, NULL, NULL, NULL, '2020-08-20', 1, NULL, '2020-08-21 01:57:07'),
(240, 1, 2, 'tổ chức WS tại PGD Từ Sơn', 11, NULL, NULL, NULL, '2020-08-20', 1, 'AM Bùi Thị Thùy Linh', '2020-08-21 02:05:02'),
(241, 1, 2, 'Pers Campaign tháng 6', 8, NULL, NULL, NULL, '2020-08-20', 1, '4 AM đã trao rồi thì không trao lại nữa', '2020-08-21 03:43:24'),
(242, 1, 2, 'Hỗ trợ túi đựng quà cho PGD Phúc Yên', 11, NULL, NULL, NULL, '2020-08-21', 1, 'Vũ Thị Hồng Hải\nIC - Banca | Chuyên viên tư vấn- Khối Banca\nTel: 0968221195\nĐỊa chỉ: 65 Trần Hưng Đạo, Hùng Vương, Phúc Yên, Vĩnh Phúc', '2020-08-21 07:00:06'),
(243, 0, 2, 'TTr 36 & 41 - RD Challenge & Inactive Challenge June', 12, 144, 2191, '2021-03-09', '2020-08-24', NULL, 'Đơn hàng ngày 24.08, nhập kho HD', '2020-08-24 03:51:09'),
(244, 0, 2, 'TTr 36 & 41 - RD Challenge & Inactive Challenge June', 12, 147, 319, '2021-03-09', '2020-08-24', NULL, 'Đơn hàng ngày 24.08, nhập kho HD', '2020-08-24 03:51:09'),
(245, 0, 2, 'TTr 36 & 41 - RD Challenge & Inactive Challenge June', 12, 148, 328, '2021-03-09', '2020-08-24', NULL, 'Đơn hàng ngày 24.08, nhập kho HD', '2020-08-24 03:51:09'),
(246, 0, 2, 'TTr 36 & 41 - RD Challenge & Inactive Challenge June', 12, 145, 183, '2021-03-09', '2020-08-24', NULL, 'Đơn hàng ngày 24.08, nhập kho HD', '2020-08-24 03:51:09'),
(247, 1, 2, 'TTr 36 & TTr 41 - RD Challenge T6', 12, NULL, NULL, NULL, '2020-08-24', 1, '1. Voucher RD chi trả hot contest đã trừ đi phần ứng trước: theo sheet 1 \"Chia voucher RD\"\n2. Voucher chi trả AM cho các AM tại HN, Miền Bắc để trao trực tiếp CN cho các giải còn lại: %KPI, growth rate, top inactive (không bao gồm hot contest): theo Sheet', '2020-08-24 03:54:34'),
(248, 1, 3, 'Chương trình Kick off Khối vận hành của MB (Miền Bắc, HN, Miền Nam) (44 triệu giải thưởng)', 10, NULL, NULL, NULL, '2020-08-25', 1, 'Xuất kho cho chương trình vận hành MB ( 44 triệu)', '2020-08-25 02:49:25'),
(249, 1, 2, 'Chương trình tri ân KH CN Tây Hồ', 11, NULL, NULL, NULL, '2020-08-25', 1, 'MB Tây Hồ: 28 Xuân La, Tây Hồ, HN \nNgười nhận: Nguyễn Thị Tuyết Hoa \nSđt: 094.66.12345', '2020-08-25 04:52:53'),
(250, 1, 2, 'IW CN Quảng Ngãi', 11, NULL, NULL, NULL, '2020-08-25', 1, 'Võ Thị Thu Hà	0932403959	168 Hùng Vương, Phường Trần Phú, TP Quảng Ngãi', '2020-08-25 07:25:47'),
(251, 1, 2, 'IW Bình Dương, Nam Bình Dương, Phú Mỹ (AM Trần Huỳnh Sơn Lâm)', 11, NULL, NULL, NULL, '2020-08-25', 1, NULL, '2020-08-25 08:00:07'),
(252, 1, 2, 'Xuất kho cho Hạnh HĐQT', 11, NULL, NULL, NULL, '2020-08-25', 1, 'Xuất kho 2 bình giữ nhiệt hiển thị nhiệt độ tặng đối tác cho Hạnh HĐQT', '2020-08-25 08:03:43'),
(253, 0, 2, 'TTr 36 RD Challenge - Nhập lại kho phần tạm ứng CN Hải Dương', 12, 147, 2, '2021-03-06', '2020-08-28', NULL, 'Đã tạm ứng 12.3 triệu cho AM Bùi Thị Thùy Linh', '2020-08-28 04:05:27'),
(254, 0, 2, 'TTr 36 RD Challenge - Nhập lại kho phần tạm ứng CN Hải Dương', 12, 145, 1, '2021-03-06', '2020-08-28', NULL, 'Đã tạm ứng 12.3 triệu cho AM Bùi Thị Thùy Linh', '2020-08-28 04:05:27'),
(255, 0, 2, 'TTr 36 RD Challenge - Nhập lại kho phần tạm ứng CN Hải Dương', 12, 144, 24, '2021-03-06', '2020-08-28', NULL, 'Đã tạm ứng 12.3 triệu cho AM Bùi Thị Thùy Linh', '2020-08-28 04:05:27'),
(256, 0, 2, 'TTr 42 – Persistency Campaign Tháng 6', 8, 145, 7, '2021-08-28', '2020-08-28', NULL, NULL, '2020-08-28 06:45:19'),
(257, 0, 2, 'TTr 42 – Persistency Campaign Tháng 6', 8, 148, 11, '2021-08-28', '2020-08-28', NULL, NULL, '2020-08-28 06:45:19'),
(258, 0, 2, 'TTr 42 – Persistency Campaign Tháng 6', 8, 147, 2, '2021-08-28', '2020-08-28', NULL, NULL, '2020-08-28 06:45:19'),
(259, 0, 2, 'TTr 42 – Persistency Campaign Tháng 6', 8, 144, 357, '2021-08-28', '2020-08-28', NULL, NULL, '2020-08-28 06:45:19'),
(260, 0, 2, 'TTr 42 – Persistency Campaign Tháng 6', 8, 146, 5, '2021-08-28', '2020-08-28', NULL, NULL, '2020-08-28 06:45:19'),
(261, 0, 2, 'TTr 17 – Quarterly contest Q2 (June)', 8, 145, 143, '2021-08-28', '2020-08-28', NULL, NULL, '2020-08-28 06:47:28'),
(262, 0, 2, 'TTr 17 – Quarterly contest Q2 (June)', 8, 147, 212, '2021-08-28', '2020-08-28', NULL, NULL, '2020-08-28 06:47:28'),
(263, 0, 2, 'TTr 17 – Quarterly contest Q2 (June)', 8, 144, 2069, '2021-08-28', '2020-08-28', NULL, NULL, '2020-08-28 06:47:28'),
(264, 0, 2, 'TTr 17 – Quarterly contest Q2 (June)', 8, 148, 230, '2021-08-28', '2020-08-28', NULL, NULL, '2020-08-28 06:47:28'),
(265, 1, 2, 'TTr 17 - Quarterly contest June', 12, NULL, NULL, NULL, '2020-08-28', 1, 'RD Yến Linh nhận riêng theo đơn hàng của Vendor\nAM Đoàn đã ứng ngày 27/08', '2020-08-28 10:12:15'),
(266, 1, 2, 'TTr 17 - Quarterly contest June - AM Đoàn', 12, NULL, NULL, NULL, '2020-08-27', 1, 'AM Đoàn ứng trước ngày 27/08', '2020-08-28 10:15:03'),
(267, 0, 2, 'Ttr 21 - SPA 101', 8, 144, 188, '2021-09-03', '2020-09-03', NULL, 'xuất admin nhập về CL', '2020-09-03 03:31:24'),
(268, 1, 2, 'TTr 68_Persistency Campaign Thang 7', 15, NULL, NULL, NULL, '2020-09-03', 1, NULL, '2020-09-03 07:38:37'),
(269, 1, 2, 'Xuất túi giấy cho CN Vĩnh Phúc', 11, NULL, NULL, NULL, '2020-09-07', 1, NULL, '2020-09-07 03:19:47'),
(271, 0, 2, 'Nhập kho T8', 8, 190, 1000, '2021-08-07', '2020-09-07', NULL, 'Nhập mới', '2020-09-07 09:08:34'),
(272, 0, 2, 'Nhập kho T8', 8, 211, 1000, '2021-08-07', '2020-09-07', NULL, 'Nhập mới', '2020-09-07 09:08:34'),
(273, 0, 2, 'Nhập kho T8', 8, 212, 1000, '2021-09-07', '2020-09-07', NULL, 'Nhập mới', '2020-09-07 09:09:42'),
(274, 1, 2, 'TTr 42_Persistency Campaign tháng 5', 15, NULL, NULL, NULL, '2020-08-20', 1, NULL, '2020-09-08 09:28:50'),
(275, 1, 2, 'TTr42_Pers Campaign thang 6', 15, NULL, NULL, NULL, '2020-08-06', 1, NULL, '2020-09-08 09:45:54'),
(276, 1, 2, 'TẶNG QUÀ CHO BAN LÃNH ĐẠO CHI NHÁNH TRẦN DUY HƯNG', 8, NULL, NULL, NULL, '2020-09-11', 1, 'Am Hằng', '2020-09-11 04:01:02'),
(277, 1, 2, 'Phê duyệt xuất quà tổ chức IW/GP 16.09', 11, NULL, NULL, NULL, '2020-09-16', 1, NULL, '2020-09-16 03:37:24'),
(278, 1, 2, 'Phê duyệt xuất kho 16.9 (lần 2)', 11, NULL, NULL, NULL, '2020-09-16', 1, NULL, '2020-09-16 10:41:43'),
(280, 0, 2, 'TT58 Đơn hàng Esteem 17.09 (Monthly contest Jul)', 12, 147, 188, '2021-06-30', '2020-09-17', NULL, NULL, '2020-09-18 02:07:51'),
(281, 0, 2, 'TT58 Đơn hàng Esteem 17.09 (Monthly contest Jul)', 12, 144, 1767, '2021-06-30', '2020-09-17', NULL, NULL, '2020-09-18 02:07:51'),
(282, 0, 2, 'TT58 Đơn hàng Esteem 17.09 (Monthly contest Jul)', 12, 145, 869, '2021-06-30', '2020-09-17', NULL, NULL, '2020-09-18 02:07:51'),
(283, 1, 2, 'TT58 - Monthly contest Jul', 12, NULL, NULL, NULL, '2020-09-17', 1, NULL, '2020-09-18 02:10:58'),
(284, 1, 2, 'KHTM RNQT KH Thu', 8, NULL, NULL, NULL, '2020-08-03', 1, 'Xuất bổ sung cho kh Thu', '2020-09-21 04:27:49'),
(285, 1, 2, 'TT 78 - Chi trả tạm ứng Monthly contest tháng 9 – AM', 8, NULL, NULL, NULL, '2020-09-17', 1, NULL, '2020-09-22 03:01:27'),
(286, 1, 2, 'TTR 58 - Monthly contest T7 Chi trả bổ sung điều chỉnh Line OP Tây HN', 12, NULL, NULL, NULL, '2020-09-22', 1, 'Chi trả bổ sung Monthly contest T7 do điều chỉnh Line OP CN Tây Hà Nội - AM Hà', '2020-09-22 04:10:31'),
(287, 1, 2, 'TT40 MRTA Task force from May to July', 9, NULL, NULL, NULL, '2020-09-22', 0, 'Nguyễn Quốc Phú\nTrần Huỳnh Sơn Lâm\nBùi Minh Tuấn Anh', '2020-09-22 04:33:32'),
(288, 0, 2, 'Nhập kho bổ sung áo mưa', 8, 157, 1000, '2021-08-22', '2020-08-07', NULL, 'Nhập mới', '2020-09-22 09:09:16'),
(289, 0, 2, 'Nhập kho T9', 8, 164, 2000, '2021-11-28', '2020-09-28', NULL, 'Nhập mới', '2020-09-28 09:14:30'),
(290, 1, 2, 'GP IW', 8, NULL, NULL, NULL, '2020-08-19', 1, 'Bùi Thị Minh Nguyệt\nNguyễn Thị Hằng\nHà Thị Kim Oanh\nĐặng Thu Mai\nNguyễn Thế Duyệt\nVi Thị Lanh\nLê Thị Thanh Hoa\nAm Huyền\nDoãn Thị Giang', '2020-09-28 10:03:38'),
(291, 1, 2, 'Cân đối balance T8', 8, NULL, NULL, NULL, '2020-08-11', 1, 'Xuất kho bổ sung cân đối kho t8', '2020-09-29 02:56:09'),
(292, 0, 2, 'TT 58 - Quarterly contest in August', 8, 144, 1743, '2021-10-07', '2020-10-07', NULL, NULL, '2020-10-07 01:43:53'),
(293, 0, 2, 'TT 58 - Quarterly contest in August', 8, 145, 1111, '2021-10-07', '2020-10-07', NULL, NULL, '2020-10-07 01:43:53'),
(294, 0, 2, 'TT 58 - Quarterly contest in August', 8, 147, 169, '2021-10-07', '2020-10-07', NULL, NULL, '2020-10-07 01:43:53'),
(295, 0, 2, 'TT 76A - RD challenge in July', 8, 146, 1637, '2021-10-08', '2020-10-08', NULL, NULL, '2020-10-08 10:22:25'),
(296, 0, 2, 'TT 76A - RD challenge in July', 8, 194, 48, '2021-10-08', '2020-10-08', NULL, NULL, '2020-10-08 10:22:25'),
(297, 0, 2, 'TT 76A - RD challenge in July', 8, 213, 3, '2021-10-08', '2020-10-08', NULL, NULL, '2020-10-08 10:22:25'),
(298, 1, 2, 'Special day tháng 7 - sinh nhật MBAL', 10, NULL, NULL, NULL, '2020-10-01', 1, 'Xuất quà là bộ áo mưa cho KH đạt giải chương trình \"Mừng sinh nhật MBAL\" (20-24/7/2020) ( trước đây đã xuất 821 áo mưa theo danh sách tạm tính)', '2020-10-14 01:45:59'),
(299, 1, 2, 'Special day tháng 8 -  Chào mừng ngày quốc khánh Việt Nam', 10, NULL, NULL, NULL, '2020-10-01', 1, 'Xuất quà cho KH chương trình \"Chào mừng ngày quốc khánh VN\"\n897 túi trống du lịch, và 219 nồi Lock & Lock', '2020-10-14 01:50:36'),
(300, 1, 2, 'Special day tháng 9 -Chương trình \"An tâm bảo vệ, cùng con tới trường\"', 10, NULL, NULL, NULL, '2020-10-01', 1, 'Xuất quà tặng KH Chương trình \"An tâm bảo vệ, cùng con tới trường\" : 269 nồi Lock & Lock, 27 ô gấp ngược, 328 túi trống du lịch', '2020-10-14 01:59:59'),
(301, 0, 2, 'TT78 - Monthly contest Sep (Batch1)', 12, 148, 1801, '2021-06-30', '2020-10-13', NULL, NULL, '2020-10-15 02:27:17'),
(302, 0, 2, 'TT78 - Monthly contest Sep (Batch1)', 12, 145, 1001, '2021-06-30', '2020-10-13', NULL, NULL, '2020-10-15 02:27:17'),
(303, 0, 2, 'TT78 - Monthly contest Sep (Batch1)', 12, 144, 2174, '2021-06-30', '2020-10-13', NULL, NULL, '2020-10-15 02:27:17'),
(304, 0, 2, 'TT78 - Monthly contest Sep (Batch1)', 12, 147, 2173, '2021-06-30', '2020-10-13', NULL, NULL, '2020-10-15 02:27:17'),
(305, 1, 2, 'TT58 - Monthly contest Aug to MB', 12, NULL, NULL, NULL, '2020-10-08', 1, NULL, '2020-10-15 02:32:31'),
(306, 1, 2, 'TT78 - Quarterly contest Q4 (Special contest Sep)', 12, NULL, NULL, NULL, '2020-10-08', 1, 'Fee 10%', '2020-10-15 02:34:18'),
(307, 1, 2, 'TT78 - Quarterly contest Q4 (Sponsor MB)', 12, NULL, NULL, NULL, '2020-10-13', 1, 'Ngân sách Hỗ trợ vùng Q4 -> gửi RD theo vùng', '2020-10-15 02:37:25'),
(308, 1, 2, 'TT 76A - RD challenge in July', 8, NULL, NULL, NULL, '2020-10-12', 1, NULL, '2020-10-26 04:18:06'),
(309, 0, 2, 'KHDN + Persistency Tháng 8', 8, 148, 121, '2021-10-26', '2020-10-19', NULL, NULL, '2020-10-26 04:21:09'),
(310, 0, 2, 'KHDN + Persistency Tháng 8', 8, 146, 100, '2021-10-26', '2020-10-19', NULL, NULL, '2020-10-26 04:21:09'),
(311, 0, 2, 'KHDN + Persistency Tháng 8', 8, 194, 129, '2021-10-26', '2020-10-19', NULL, NULL, '2020-10-26 04:21:09'),
(312, 0, 2, 'KHDN + Persistency Tháng 8', 8, 144, 271, '2021-10-26', '2020-10-19', NULL, NULL, '2020-10-26 04:21:09'),
(313, 1, 2, 'TT40 MRTA Task force from May to July', 1, NULL, NULL, NULL, '2020-10-02', 0, NULL, '2020-10-26 04:56:17'),
(314, 1, 2, 'TT40 MRTA Task force from May to July', 8, NULL, NULL, NULL, '2020-10-02', 1, NULL, '2020-10-26 04:58:29'),
(315, 1, 2, 'TT BD - Khen thưởng OP', 12, NULL, NULL, NULL, '2020-10-27', 1, 'Tờ trình Banca BD đề xuất khen thưởng Khối Vận hành MB tháng 10', '2020-10-27 03:48:47'),
(316, 1, 2, 'TT89 - RD Challenge Tháng 9 (chi trả trước CN Lào Cai)', 12, NULL, NULL, NULL, '2020-10-27', 1, 'Chi trả trước cho AM/RD Challenge tháng 9 - CN Lào Cai (CBO + DCEO Branch tour)', '2020-10-27 04:42:05'),
(317, 1, 2, 'TT 76A RD challenge Jul and Aug', 8, NULL, NULL, NULL, '2020-10-27', 1, 'Lê Huyền Trang', '2020-10-27 09:21:30'),
(318, 1, 2, 'TT 76A RD challenge Jul and Aug - Exeptional case', 8, NULL, NULL, NULL, '2020-10-28', 1, 'Ngoại lệ CN Quảng Ninh\nAM Phạm Thị Thùy Linh', '2020-10-28 03:02:35'),
(319, 1, 2, 'Additional contest in August - MB staff', 8, NULL, NULL, NULL, '2020-10-28', 1, 'Lê Huyền Trang', '2020-10-28 03:26:49'),
(320, 1, 2, 'TT 72 Pers campaign in August', 8, NULL, NULL, NULL, '2020-10-28', 1, 'Phạm Hạnh Quyên', '2020-10-28 03:53:49'),
(321, 0, 2, 'Trip H1.2020', 8, 195, 270, NULL, '2020-11-16', NULL, NULL, '2020-11-17 06:44:07'),
(322, 1, 2, 'TT 71 XUẤT QUÀ TẶNG CTKM AN TÂM BẢO VỆ - PHÁT TRIỂN BỀN VỮNG ĐỢT 2', 11, NULL, NULL, NULL, '2020-10-26', 1, NULL, '2020-11-17 07:44:51'),
(323, 0, 2, 'Monthly conest Sep (batch 2)', 12, 145, 538, '2021-06-30', '2020-11-12', NULL, 'TT78 Monthly contest 4 last months 2020', '2020-11-17 11:16:20'),
(324, 0, 2, 'Monthly conest Sep (batch 2)', 12, 144, 3031, '2021-06-30', '2020-11-12', NULL, 'TT78 Monthly contest 4 last months 2020', '2020-11-17 11:16:20'),
(325, 0, 2, 'Monthly conest Sep (batch 2)', 12, 148, 621, '2021-06-30', '2020-11-12', NULL, 'TT78 Monthly contest 4 last months 2020', '2020-11-17 11:16:20'),
(326, 0, 2, 'Monthly conest Sep (batch 2)', 12, 147, 798, '2021-06-30', '2020-11-12', NULL, 'TT78 Monthly contest 4 last months 2020', '2020-11-17 11:16:20'),
(327, 0, 2, 'RD Challenge Sep', 12, 145, 4, '2021-06-30', '2020-11-17', NULL, 'TT53 Budget\nTT89 Scheme', '2020-11-17 11:18:51'),
(328, 0, 2, 'RD Challenge Sep', 12, 144, 280, '2021-06-30', '2020-11-17', NULL, 'TT53 Budget\nTT89 Scheme', '2020-11-17 11:18:51'),
(329, 0, 2, 'RD Challenge Sep', 12, 148, 7, '2021-06-30', '2020-11-17', NULL, 'TT53 Budget\nTT89 Scheme', '2020-11-17 11:18:51'),
(330, 0, 2, 'RD Challenge Sep', 12, 147, 6, '2021-06-30', '2020-11-17', NULL, 'TT53 Budget\nTT89 Scheme', '2020-11-17 11:18:51'),
(331, 1, 2, 'TT78 - Monthly contest Sep', 12, NULL, NULL, NULL, '2020-11-13', 1, '- Pending case 200tr PGD Trung Văn và CN Thanh Xuân\n- Pending Tuyên Quang', '2020-11-17 11:22:36'),
(332, 1, 2, 'RD Challenge Sep', 12, NULL, NULL, NULL, '2020-11-13', 0, 'Tờ trình 53 Budget\nTờ trình 89 Scheme', '2020-11-17 11:24:22'),
(333, 1, 2, 'TT BD - Vinh danh OP (bổ sung)', 12, NULL, NULL, NULL, '2020-11-13', 0, 'Bổ sung 7tr voucher cho Vinh danh OP', '2020-11-17 11:25:49'),
(334, 1, 2, 'TT71 Chi trả voucher Đợt 3 CTKM \"An tâm bảo vệ, phát triển bền vững\"', 11, NULL, NULL, NULL, '2020-11-19', 0, NULL, '2020-11-19 11:19:31'),
(335, 1, 2, 'PREPAID MONTHLY CONTEST T10+ CUSTOMER CAMPAIGN AM ĐỖ THƯƠNG HUYỀN', 11, NULL, NULL, NULL, '2020-11-05', 0, NULL, '2020-11-20 03:45:03'),
(336, 1, 2, 'fdfgddfgd', 1, NULL, NULL, NULL, '2020-11-24', 3, NULL, '2020-11-24 03:04:13');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danhmucs`
--
ALTER TABLE `danhmucs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `delivery_history`
--
ALTER TABLE `delivery_history`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `donxuats`
--
ALTER TABLE `donxuats`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id_file`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `notificaiton`
--
ALTER TABLE `notificaiton`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `system_histories`
--
ALTER TABLE `system_histories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_api_token_unique` (`api_token`);

--
-- Chỉ mục cho bảng `user_activations`
--
ALTER TABLE `user_activations`
  ADD KEY `user_activations_token_index` (`token`);

--
-- Chỉ mục cho bảng `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `warehouse_goods`
--
ALTER TABLE `warehouse_goods`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `warehouse_histories`
--
ALTER TABLE `warehouse_histories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhmucs`
--
ALTER TABLE `danhmucs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT cho bảng `delivery_history`
--
ALTER TABLE `delivery_history`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT cho bảng `donxuats`
--
ALTER TABLE `donxuats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=308;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `files`
--
ALTER TABLE `files`
  MODIFY `id_file` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `notificaiton`
--
ALTER TABLE `notificaiton`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT cho bảng `system_histories`
--
ALTER TABLE `system_histories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=491;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `warehouse_goods`
--
ALTER TABLE `warehouse_goods`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `warehouse_histories`
--
ALTER TABLE `warehouse_histories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=337;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
