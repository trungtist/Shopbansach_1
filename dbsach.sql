-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 21, 2022 lúc 04:27 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dbsach`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `anh_bai_viet`
--

CREATE TABLE `anh_bai_viet` (
  `id` int(11) NOT NULL,
  `name_image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `anh_bai_viet`
--

INSERT INTO `anh_bai_viet` (`id`, `name_image`) VALUES
(1645028748, 'hinh-nen-phong-canh-1.jpg'),
(1645034130, '273203989_2154362718035042_1197821733344498729_n.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bai_viet`
--

CREATE TABLE `bai_viet` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bai_viet`
--

INSERT INTO `bai_viet` (`id`, `title`, `content`, `image`, `created_at`, `status`) VALUES
(1645024848, 'Ngon quá trời ơi!', '<p style=\"text-align: center; \"><img style=\"width: 336px;\" src=\"https://i.ytimg.com/vi/AuRgsAvVASY/hqdefault.jpg?sqp=-oaymwEcCNACELwBSFXyq4qpAw4IARUAAIhCGAFwAcABBg==&amp;rs=AOn4CLBKHANnFnffxKHEqgtBy5pChXafXg\"></p><p style=\"text-align: center; \"><font color=\"#d63d3d\">Ngon không anh em :)</font></p>', 'hinh-nen-phong-canh-1.jpg', '2022-02-16', 1),
(1645032941, 'Ngủ ngon anh em ơi!', '<p style=\"text-align: center; \"><img style=\"width: 310px;\" src=\"data:image/jpeg;base64,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\"></p><p style=\"text-align: center; \"><font color=\"#003163\">*** Khuya rồi anh em ngủ ngon đi ***</font></p>', 'tai-xuong.jpg', '2022-02-21', 1),
(1645033802, 'Nghe nhạc thư giãn!', '<p style=\"text-align: center; \"><iframe frameborder=\"0\" src=\"//www.youtube.com/embed/zvnZEfmJDWo\" width=\"640\" height=\"360\" class=\"note-video-clip\" style=\"font-size: 1rem;\"></iframe></p><p style=\"text-align: center; \">Nghe nhạc để tận hưởng, thư giãn</p><p style=\"text-align: center; \">Đến đây nào!</p>', 'hqdefault.png', '2022-02-17', 1),
(1645034180, 'Ai hóng đc gì thêm khum!!!', '<p style=\"text-align: center; \"><img style=\"width: 50%;\" src=\"http://127.0.0.1:8000/assets/client/images_in_new/273203989_2154362718035042_1197821733344498729_n.jpg\"></p><p style=\"text-align: center; \"><br></p>', '273203989_2154362718035042_1197821733344498729_n.jpg', '2022-02-17', 1),
(1645292528, 'Đặt hàng thành công', '<h2 style=\"text-align: center; \"><font color=\"#b56308\"><span style=\"font-family: &quot;Comic Sans MS&quot;;\">Đặt hàng thành công</span></font></h2><p style=\"text-align: center; \"><img style=\"width: 450px;\" src=\"https://us.123rf.com/450wm/radenmas/radenmas1602/radenmas160200020/52510858-congratulations-celebration-with-fireworks.jpg?ver=6\"></p><h3 style=\"text-align: center; \"><font color=\"#e79439\"><span style=\"font-family: &quot;Comic Sans MS&quot;;\">Chúc mừng bạn có một đơn hàng mới!</span></font>🥳🥳🥳</h3>', 'congraturats.png', '2022-02-20', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bang_gia`
--

CREATE TABLE `bang_gia` (
  `MaGia` int(11) NOT NULL,
  `MocDau` int(11) NOT NULL,
  `MocCuoi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `bang_gia`
--

INSERT INTO `bang_gia` (`MaGia`, `MocDau`, `MocCuoi`) VALUES
(1, 0, 100000),
(2, 100000, 200000),
(3, 200000, 300000),
(4, 300000, 500000),
(5, 500000, 1000000),
(6, 1000000, 5000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_don_hang`
--

CREATE TABLE `chi_tiet_don_hang` (
  `MaDonHang` int(11) NOT NULL,
  `MaSach` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_don_hang`
--

INSERT INTO `chi_tiet_don_hang` (`MaDonHang`, `MaSach`, `SoLuong`, `DonGia`) VALUES
(255419916, 2, 1, 90000),
(317999085, 3, 1, 151200),
(317999085, 16, 1, 143100),
(680601536, 2, 1, 90000),
(680601536, 3, 5, 151200),
(680601536, 4, 3, 116100),
(790214152, 2, 3, 90000),
(1643890240, 431327246, 1, 252000),
(1643890240, 612034523, 1, 252000),
(1643892997, 612034523, 1, 252000),
(1643892997, 613999305, 1, 252000),
(1643892997, 794717844, 2, 252000),
(1643893062, 613999305, 1, 252000),
(1643893062, 794717844, 3, 252000),
(1645292960, 18, 1, 79200),
(1645293130, 613999305, 1, 252000),
(1645293164, 334281778, 1, 30000),
(1645346648, 334281778, 2, 30000),
(1645346648, 503078130, 1, 30000),
(1645346648, 633772850, 1, 30000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chu_de`
--

CREATE TABLE `chu_de` (
  `MaChuDe` int(11) NOT NULL,
  `TenChuDe` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Level` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chu_de`
--

INSERT INTO `chu_de` (`MaChuDe`, `TenChuDe`, `Level`, `Status`) VALUES
(1, 'Tủ Sách', 1, 1),
(2, 'Sách Giao Khoa', 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_gia`
--

CREATE TABLE `danh_gia` (
  `MaDG` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `MaND` int(11) NOT NULL,
  `NoiDung` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `NgayDang` datetime NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_gia`
--

INSERT INTO `danh_gia` (`MaDG`, `id_prod`, `MaND`, `NoiDung`, `NgayDang`, `type`) VALUES
(1, 1, 1, 'Mình cũng vừa mua♥', '2021-12-14 00:00:01', 0),
(2, 1, 2, 'Sách hay quá♥♥♥', '2021-12-14 00:00:00', 0),
(8, 2, 2, '☻☺', '2021-12-15 09:28:17', 0),
(10, 3, 6, 'hay!', '2021-12-15 09:47:24', 0),
(1645088866, 1, 1645088866, 'hahah', '2022-02-17 16:07:46', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `MaDonHang` int(11) NOT NULL,
  `DaThanhToan` int(11) NOT NULL,
  `NgayDat` datetime NOT NULL,
  `NgayGiao` date DEFAULT NULL,
  `DiaChi` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PhiGiaoHang` int(11) NOT NULL,
  `ThanhTien` int(11) NOT NULL,
  `MoTa` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `MaKH` int(11) NOT NULL,
  `tran_code` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `don_hang`
--

INSERT INTO `don_hang` (`MaDonHang`, `DaThanhToan`, `NgayDat`, `NgayGiao`, `DiaChi`, `PhiGiaoHang`, `ThanhTien`, `MoTa`, `MaKH`, `tran_code`) VALUES
(255419916, 1, '2021-12-10 17:45:15', '0000-00-00', 'Cầu Giấy - Hà Nội', 25000, 115000, 'abc', 688010869, 0),
(317999085, 1, '2021-12-11 10:28:27', '2021-12-25', 'Mai Dịch - Cầu giấy - Hà Nội', 20000, 314300, 'shop chất lượng', 688010869, 0),
(680601536, 0, '2021-12-10 19:24:53', '0000-00-00', 'Cầu Giấy - Hà Nội', 25000, 1219300, 'hay lam ban oi', 688010869, 0),
(790214152, 0, '2021-12-11 09:31:08', NULL, 'Cầu Giấy - Hà Nội', 25000, 295000, 'hay', 688010869, 0),
(1643890240, 0, '2022-02-03 19:10:40', NULL, 'Cầu Giấy - Hà Nội', 25000, 529000, 'mong gui hang som', 2, 0),
(1643892997, 1, '2022-02-03 19:56:37', '2022-02-09', 'Cầu Giấy - Hà Nội', 25000, 1033000, 'ok', 2, 0),
(1643893062, 0, '2022-02-03 19:57:42', NULL, 'Cầu Giấy - Hà Nội', 25000, 1033000, NULL, 2, 0),
(1645292960, 1, '2022-02-20 00:49:20', '2022-02-21', 'Mai Dịch - Cầu giấy - Hà Nội', 20000, 99200, NULL, 688010869, 13691002),
(1645293130, 0, '2022-02-20 00:52:10', NULL, 'vip_1', 25000, 277000, NULL, 688010869, 0),
(1645293164, 2, '2022-02-20 00:52:44', NULL, 'Mai Dịch - Cầu giấy - Hà Nội', 20000, 50000, NULL, 688010869, 0),
(1645346648, 2, '2022-02-20 15:44:08', NULL, 'Mai Dịch - Cầu giấy - Hà Nội', 20000, 140000, NULL, 688010869, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `MaKH` int(11) NOT NULL,
  `HoTen` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DienThoai` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `NgayTao` datetime NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`MaKH`, `HoTen`, `Email`, `MatKhau`, `DienThoai`, `NgayTao`, `Status`) VALUES
(2, 'abc', 'lamthatnhanh1113@gmail.com', '$2y$10$Air05HhMjicVl6EcXMP6JOcnCPmAWm1TnysUr8muJ56QfwRQEWC7a', '0123456789', '2022-02-03 15:27:12', 1),
(688010869, 'Vương Văn Linh', 'lamthatnhanh111@gmail.com', '$2y$10$8MDJC/3d5tMwRuhUshDoT.Zy4JHZXknJau8drYdIi94y17RWig3fW', '0352566267', '2021-12-04 16:57:36', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyen_mai`
--

CREATE TABLE `khuyen_mai` (
  `MaKM` int(11) NOT NULL,
  `TenKM` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `GiamGia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khuyen_mai`
--

INSERT INTO `khuyen_mai` (`MaKM`, `TenKM`, `GiamGia`) VALUES
(1, 'Khuyến mại 10%', 10),
(377019926, 'Không khuyến mại', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `MaLoai` int(11) NOT NULL,
  `TenLoai` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `MaChuDe` int(11) NOT NULL,
  `Level` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`MaLoai`, `TenLoai`, `MaChuDe`, `Level`, `Status`) VALUES
(1, 'Văn Học', 1, 1, 1),
(2, 'Luật', 1, 2, 1),
(3, 'Y Học', 1, 3, 1),
(4, 'Thiêu Nhi', 1, 4, 1),
(5, 'Sách Khoa Học', 1, 5, 1),
(6, 'Ngoại Ngữ', 1, 6, 1),
(7, 'Phụ Nữ', 1, 7, 1),
(8, 'Tâm Lý - Kỹ Năng Sống', 1, 8, 1),
(9, 'Nuôi Dạy Con', 1, 9, 1),
(10, 'Kinh Doanh - Kinh Tế', 1, 10, 1),
(11, 'Lịch Sử - Địa Lý - Tôn Giáo', 1, 11, 1),
(12, 'Nấu Ăn - Nuôi Trồng', 1, 12, 1),
(13, 'Sách Cấp 1', 2, 1, 1),
(14, 'Sách Cấp 2', 2, 2, 1),
(15, 'Sách Cấp 3', 2, 3, 1),
(16, 'Sách Thi Đại Học', 2, 4, 1),
(17, 'Sách Giáo Viên', 2, 5, 1),
(18, 'Sách Đại Học', 2, 6, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoi_danh_gia`
--

CREATE TABLE `nguoi_danh_gia` (
  `MaND` int(11) NOT NULL,
  `HoTen` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `AnhNen` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoi_danh_gia`
--

INSERT INTO `nguoi_danh_gia` (`MaND`, `HoTen`, `Email`, `AnhNen`) VALUES
(1, 'Trung', 'trungtis@gmail.com', 'comment.png'),
(2, 'Linh', 'lamnhanh@gmail.com', 'comment.png'),
(4, 'Linh', 'dfgdf@fdg.com', 'comment4.jpg'),
(5, 'Linh', 'sdfd@dgdfg.com', 'comment1.png'),
(6, 'linh', 'lamthatnhanh111@gmail.com', 'comment4.jpg'),
(1645085713, '1', '3534@lsgd.com', 'comment4.jpg'),
(1645088866, 'Văn Linh Vương', 'ssdgds@gmail.com', 'comment5.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nha_xuat_ban`
--

CREATE TABLE `nha_xuat_ban` (
  `MaNXB` int(11) NOT NULL,
  `TenNXB` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DienThoai` varchar(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nha_xuat_ban`
--

INSERT INTO `nha_xuat_ban` (`MaNXB`, `TenNXB`, `DiaChi`, `DienThoai`, `Status`) VALUES
(1, 'Đinh Tị', 'Hà Nội', '0123456789', 1),
(2, 'NXB Công Thương', 'Hà Nội', '0123456789', 1),
(3, ' NXB Đại Học Kinh Tế Quốc Dân', 'Hà Nội', '0482435322', 1),
(4, 'NXB Đà Nẵng', 'Hà Nội', '0329392333', 1),
(5, 'NXB Công An Nhân Dân', 'Hà Nội', '0482435324', 1),
(357429078, 'Macmillan Publishers', 'Ngoài nước', '0123456789', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sach`
--

CREATE TABLE `sach` (
  `MaSach` int(11) NOT NULL,
  `TenSach` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `GiaBan` int(11) NOT NULL,
  `MoTa` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `AnhBia` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `NgayCapNhat` datetime NOT NULL,
  `SoLuongTon` int(11) NOT NULL,
  `MaNXB` int(11) NOT NULL,
  `MaTheLoai` int(11) NOT NULL,
  `MaKM` int(11) NOT NULL,
  `GiaMoi` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `Active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sach`
--

INSERT INTO `sach` (`MaSach`, `TenSach`, `GiaBan`, `MoTa`, `AnhBia`, `NgayCapNhat`, `SoLuongTon`, `MaNXB`, `MaTheLoai`, `MaKM`, `GiaMoi`, `Status`, `Active`) VALUES
(1, 'Totto-Chan Bên Cửa Sổ', 98000, 'Không còn cách nào khác, mẹ đành đưa Totto-chan đến một ngôi trường mới, trường Tomoe. Đấy là một ngôi trường kỳ lạ, lớp học thì ở trong toa xe điện cũ, học sinh thì được thoả thích thay đổi chỗ ngồi mỗi ngày, muốn học môn nào trước cũng được, chẳng những thế, khi đã học hết bài, các bạn còn được cô giáo cho đi dạo. Đặc biệt hơn ở đó còn có một thầy hiệu trưởng có thể chăm chú lắng nghe Totto-chan kể chuyện suốt bốn tiếng đồng hồ! Chính nhờ ngôi trường đó, một Totto-chan hiếu động, cá biệt đã thu nhận được những điều vô cùng quý giá để lớn lên thành một con người hoàn thiện, mạnh mẽ.', 'sach1.jpg', '2021-08-27 00:00:00', 0, 1, 1, 1, 88200, 1, 0),
(2, 'Mười Ba Lý Do', 100000, 'Là cuốn sách hay', 'sach2.jpg', '2021-08-27 00:00:00', 8, 2, 1, 1, 90000, 1, 0),
(3, 'Bán Niềm Tin', 168000, 'Là cuốn sách hay', 'sach3.jpg', '2021-08-27 00:00:00', 26, 3, 1, 1, 151200, 1, 0),
(4, 'Cuộc Đời Không Phụ Lòng Người Nỗ Lực', 129000, 'Là cuốn sách hay', 'sach4.jpg', '2021-08-27 00:00:00', 15, 2, 1, 1, 116100, 1, 0),
(5, 'Tạo Dựng Thương Hiệu Cá Nhân', 89000, 'Là cuốn sách hay', 'sach5.jpg', '2021-08-27 00:00:00', 10000000, 2, 1, 1, 80100, 1, 0),
(6, 'Content Đắt Có Bắt Được Trend', 119000, 'Là cuốn sách hay', 'sach6.jpg', '2021-08-27 00:00:00', 10000000, 1, 2, 1, 107100, 1, 1),
(7, 'Yếu Tố Phát Triển Thương Hiệu Bền Vững - Lấy Khách Hàng Làm Trung Tâm', 139000, 'Là cuốn sách hay', 'sach7.jpg', '2021-08-27 00:00:00', 10000000, 2, 2, 1, 125100, 1, 0),
(8, 'Làm Một Người Biết Ơn', 50000, 'Là cuốn sách hay', 's1.jpg', '2021-08-27 00:00:00', 10000000, 3, 7, 1, 45000, 1, 0),
(9, 'Tôi Là Chế Ngự Đại Vương', 50000, 'Là cuốn sách hay', 's2.jpg', '2021-08-27 00:00:00', 10000000, 3, 2, 1, 45000, 1, 0),
(10, 'Làm Một Người Bao Dung', 50000, 'Là cuốn sách hay', 's3.jpg', '2021-08-27 00:00:00', 10000000, 3, 7, 1, 45000, 1, 0),
(11, 'Thói Quen Tốt Theo Tôi Chọn Đời', 50000, 'Là cuốn sách hay', 's4.jpg', '2021-08-27 00:00:00', 10000000, 3, 2, 1, 45000, 1, 0),
(12, 'Việc Học Không Hề Đáng Sợ', 50000, 'Là cuốn sách hay', 's5.jpg', '2021-08-27 00:00:00', 10000000, 3, 7, 1, 45000, 1, 0),
(13, 'Cha Mẹ Không Phải Người Đầy Tớ Của Tôi', 50000, 'Là cuốn sách hay', 's6.jpg', '2021-08-27 00:00:00', 10000000, 3, 2, 1, 45000, 1, 0),
(14, 'Việc Làm Của Mình Tự Mình Làm', 50000, 'Là cuốn sách hay', 's7.jpg', '2021-08-27 00:00:00', 10000000, 3, 1, 1, 45000, 1, 0),
(15, 'Làm Một Người Trung Thực', 50000, 'Là cuốn sách hay', 's8.jpg', '2021-08-27 00:00:00', 10000000, 3, 1, 1, 45000, 1, 0),
(16, '10 Bài Toán Trọng Điểm Hình Học Phẳng Oxy (Phiên Bản Mới Nhất)', 159000, 'Là cuốn sách hay', 'evo-2-1.jpg', '2021-08-27 00:00:00', 10000001, 2, 5, 1, 143100, 1, 0),
(17, '10 Chuyên Đề Bồi Dưỡng Học Sinh Giỏi Toán 4, 5 - Tập 2', 30000, 'Là cuốn sách hay', 'evo-2-2.jpg', '2021-08-27 00:00:00', 10000000, 2, 4, 1, 27000, 1, 0),
(18, '100 BÀI PHÂN TÍCH BÌNH GIẢNG BÌNH LUẬN VĂN HỌC', 88000, 'Là cuốn sách hay', 'evo-2-3.jpg', '2021-08-27 00:00:00', 9999999, 2, 6, 1, 79200, 1, 0),
(19, '100 Bài Tập Làm Văn Mẫu Lớp 5', 38000, 'Là cuốn sách hay', 'evo-2-4.jpg', '2021-08-27 00:00:00', 10000000, 2, 3, 1, 34200, 1, 0),
(20, '100 Đề Kiểm Tra Địa Lí 6 - 15 Phút - 45 Phút - Học Kì', 60000, 'Là cuốn sách hay', 'evo-2-5.jpg', '2021-08-27 00:00:00', 10000000, 2, 4, 1, 54000, 1, 0),
(21, '100 Đề Kiểm Tra Địa Lí 7', 69000, 'Là cuốn sách hay', 'evo-2-6.jpg', '2021-08-27 00:00:00', 10000000, 2, 4, 1, 62100, 1, 0),
(22, '100 Đề Kiểm Tra Học Kỳ Lớp 9 Và Ôn Thi Vào Lớp 10 THPT Môn Toán', 85000, 'Là cuốn sách hay', 'evo-2-7.jpg', '2021-08-27 00:00:00', 10000000, 2, 4, 1, 76500, 1, 0),
(23, '100 Đề Kiểm Tra Ngữ Văn 10', 75000, 'Là cuốn sách hay', 'evo-2-8.jpg', '2021-08-27 00:00:00', 10000000, 2, 5, 1, 67500, 1, 0),
(334281778, 'Doraemon - Đại Chiến Thuật Côn Trùng', 30000, 'Doraemon - Đại Chiến Thuật Côn Trùng\r\n\r\nNhà cung cấp:Nhà Xuất Bản Kim Đồng\r\n\r\nTác giả:Fujiko F Fujio\r\n\r\nNhà xuất bản:NXB Kim Đồng\r\n\r\nHình thức bìa:Bìa Mềm\r\n\r\nCâu chuyện kể về chuyến dã ngoại lí thú trước khi tốt nghiệp Trường đào tạo robot của nhóm bạn Doraemon. Thử thách trong ngày cuối cùng của chuyến đi cũng chính là bài thi tốt nghiệp. Mỗi học sinh phải tự chọn lấy một con robot côn trùng làm bạn đồng hành và tìm đường trở về trước hoàng hôn. Ai về trễ, người đó sẽ bị trượt tốt nghiệp! Liệu nhóm Doraemon có thể vượt qua thử thách này không, chúng ta cùng theo dõi nhé! Đây là phiên bản tranh truyện màu được vẽ lại từ tập phim hoạt hình cùng tên của tác giả Fujiko.F.Fujio.', 'image-195509-1-12294.jpg', '2021-12-15 10:34:40', 97, 1, 325257678, 377019926, 30000, 1, 1),
(431327246, 'Harry Potter and the Half-Blood Prince', 252000, 'Khi cụ Dumbledore đến đường Privet Drive vào một đêm mùa hè để thu thập Harry Potter, bàn tay đũa phép của cụ bị thâm đen và teo lại, nhưng cụ không tiết lộ lý do tại sao. Những bí mật và sự nghi ngờ đang lan rộng khắp thế giới phù thủy, và bản thân Hogwarts cũng không an toàn. Harry tin rằng Malfoy mang Dấu ấn Hắc ám: có một Tử thần Thực tử trong số họ. Harry sẽ cần phép thuật mạnh mẽ và những người bạn thực sự khi khám phá những bí mật đen tối nhất của Voldemort, và cụ Dumbledore chuẩn bị cho cậu bé đối mặt với số phận của mình. Những ấn bản mới này của bộ truyện kinh điển và bán chạy nhất trên toàn thế giới, từng đoạt nhiều giải thưởng này có ngay những chiếc áo khoác mới có thể mua được của Jonny Duddle, với sức hấp dẫn trẻ em rất lớn, để đưa Harry Potter đến với thế hệ độc giả tiếp theo. Đã đến lúc BẬT MAGIC ON.', 'harry-potter-and-the-half-blood-prince.jpg', '2021-12-15 10:24:09', 100, 357429078, 480966078, 377019926, 252000, 1, 1),
(503078130, 'Doraemon Học Tập - Nhân Chia', 30000, 'Doraemon Học Tập - Nhân Chia\r\n\r\nTác giả: Fujiko F Fujio, Kanjiro Kobayashi, Yukihiro Mitani\r\n\r\nKhuôn Khổ: 13x18 cm\r\n\r\nSố trang: 224\r\n\r\nĐịnh dạng: bìa mềm\r\n\r\nNgày phát hành: 20/03/2019\r\n\r\nGIỚI THIỆU TÁC PHẨM\r\nTrẻ em rất thích câu đố và những điều bí ẩn. Đó là vì quá trình suy luận ra kết quả, tức là suy nghĩ \"Vì sao lại thế?\" rất thú vị. Làm toán cũng vậy, nếu nắm bắt được cách suy luận để giải được bài toán thì môn này sẽ trở nên hấp dẫn, lôi cuốn.\r\n\r\nCuốn sách này không đưa ra những lời giải thích một chiều, mà các nhân vật trong truyện sẽ hóa thân thành độc giả, giải đố sai, mang nghi vấn về những vấn đề và đưa ra những lí giải hết sức hồn nhiên... Qua những tình tiết mang đầy chất truyện tranh đó, các em sẽ hiểu vấn đề nhanh và dễ hơn. Ngoài ra tập sách cũng cung cấp đầy đủ những kiến thức cơ bản, nền tảng quan trọng trong bộ môn toán mà các em cần nắm chắc.', 'nhan-chia.jpg', '2021-12-15 10:34:23', 99, 1, 325257678, 377019926, 30000, 1, 1),
(612034523, 'Harry Potter and the Chamber of Secrets', 252000, 'The Triwizard Tournament is to be held at Hogwarts.', 'harry-potter-and-the-chamber-of-secrets.jpg', '2021-12-15 10:14:58', 100, 357429078, 480966078, 377019926, 252000, 1, 1),
(613999305, 'Harry Potter and the Goblet of Fire (2014)', 252000, 'The Triwizard Tournament is to be held at Hogwarts.', '2-45bbd9f5-d1ba-49f6-80c6-4b3f67b55df3.jpg', '2021-12-15 10:13:53', 100, 357429078, 480966078, 377019926, 252000, 1, 1),
(633772850, 'Doraemon Học Tập - Điện Năng, Âm Thanh, Ánh Sáng', 30000, 'Doraemon Học Tập - Điện Năng, Âm Thanh, Ánh Sáng\r\n\r\nTác giả: Fujiko F Fujio, Hiroshi Murata, Nichinouken\r\nKhuôn Khổ: 13x18 cm\r\nSố trang: 224\r\nĐịnh dạng: bìa mềm\r\nNgày phát hành: 20/03/2019\r\n\r\nGIỚI THIỆU TÁC PHẨM\r\nTrẻ em rất thích câu đố và những điều bí ẩn. Đó là vì quá trình suy luận ra kết quả, tức là suy nghĩ \"Vì sao lại thế?\" rất thú vị. Nếu nắm bắt được cách suy luận thì môn này sẽ trở nên hấp dẫn, lôi cuốn.\r\n\r\nCuốn sách này không đưa ra những lời giải thích một chiều, mà các nhân vật trong truyện sẽ hóa thân thành độc giả, giải đố sai, mang nghi vấn về những vấn đề và đưa ra những lí giải hết sức hồn nhiên... Qua những tình tiết mang đầy chất truyện tranh đó, các em sẽ hiểu vấn đề nhanh và dễ hơn. Ngoài ra tập sách cũng cung cấp đầy đủ những kiến thức cơ bản, nền tảng quan trọng trong bộ môn mà các em cần nắm chắc.', 'dien-nang.jpg', '2021-12-15 10:34:00', 99, 1, 325257678, 377019926, 30000, 1, 1),
(794717844, 'Harry Potter and the Prisoner of Azkaban', 252000, 'Khi Xe buýt Hiệp sĩ lao qua bóng tối và dừng lại trước mặt cậu, đó là khởi đầu cho một năm khác xa thường ở trường Hogwarts dành cho Harry Potter. Sirius Black, kẻ sát nhân hàng loạt đã trốn thoát và là tín đồ của Chúa tể Voldemort, đang chạy trốn - và họ nói rằng hắn ta đang đuổi theo Harry. Trong lớp Bói toán đầu tiên của mình, Giáo sư Trelawney nhìn thấy một điềm báo về cái chết trong lá trà của Harry. Nhưng có lẽ đáng sợ nhất là lũ Dementors đang tuần tra sân trường, với nụ hôn hút hồn của họ. Những ấn bản mới này của bộ truyện kinh điển và bán chạy nhất trên toàn thế giới, từng đoạt nhiều giải thưởng này có ngay những chiếc áo khoác mới có thể mua được của Jonny Duddle, với sức hấp dẫn trẻ em rất lớn, để đưa Harry Potter đến với thế hệ độc giả tiếp theo. Đã đến lúc BẬT MAGIC ON.', 'harry-potte-and-the-prisoner-of-azkaban.jpg', '2021-12-15 10:08:10', 100, 357429078, 480966078, 377019926, 252000, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tac_gia`
--

CREATE TABLE `tac_gia` (
  `MaTacGia` int(11) NOT NULL,
  `TenTacGia` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `TieuSu` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `DienThoai` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tac_gia`
--

INSERT INTO `tac_gia` (`MaTacGia`, `TenTacGia`, `DiaChi`, `TieuSu`, `DienThoai`, `Status`) VALUES
(1, 'Nguyễn Văn A', 'Hà Nội', 'Là nhà văn', '0123456789', 1),
(2, 'Nguyễn Văn B', 'Đà Nẵng', 'Là nhà toán học', '0482435322', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tham_gia`
--

CREATE TABLE `tham_gia` (
  `MaSach` int(11) NOT NULL,
  `MaTacGia` int(11) NOT NULL,
  `VaiTro` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tham_gia`
--

INSERT INTO `tham_gia` (`MaSach`, `MaTacGia`, `VaiTro`) VALUES
(1, 1, 'Tác giả a');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `the_loai`
--

CREATE TABLE `the_loai` (
  `MaTheLoai` int(11) NOT NULL,
  `TenTheLoai` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `MaLoai` int(11) NOT NULL,
  `Level` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `the_loai`
--

INSERT INTO `the_loai` (`MaTheLoai`, `TenTheLoai`, `MaLoai`, `Level`, `Status`) VALUES
(1, 'Truyện Cười', 1, 1, 1),
(2, 'Truyện Ngắn - Tản Văn', 2, 2, 1),
(3, 'Lớp 5 - Sách Tham Khảo', 13, 1, 1),
(4, 'Lớp 9 - Sách Tham Khảo', 14, 2, 1),
(5, 'Lớp 10 - Sách Tham Khảo', 15, 3, 1),
(6, 'Lớp 12 - Sách Tham Khảo', 16, 4, 1),
(7, 'Kiến Thức - Kỹ Năng Sống Cho Trẻ', 8, 3, 1),
(325257678, 'Manga - Comic', 4, 4, 1),
(480966078, 'Sách tiếng Anh', 6, 8, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `TenDN` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`TenDN`, `MatKhau`, `Role`) VALUES
('admin', '$2y$10$grSmMYTthyqx1thqeRwA2OWD/ieKEvjWLOe7xtt7nf2vxIwxzpWjq', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vi_tri_ship`
--

CREATE TABLE `vi_tri_ship` (
  `MaViTri` int(11) NOT NULL,
  `TenViTri` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PhiShip` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `vi_tri_ship`
--

INSERT INTO `vi_tri_ship` (`MaViTri`, `TenViTri`, `PhiShip`, `Status`) VALUES
(1, 'Cầu Giấy - Hà Nội', 25000, 1),
(2, 'Mai Dịch - Cầu giấy - Hà Nội', 20000, 1),
(1644075428, 'vip_1', 25000, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `anh_bai_viet`
--
ALTER TABLE `anh_bai_viet`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bai_viet`
--
ALTER TABLE `bai_viet`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bang_gia`
--
ALTER TABLE `bang_gia`
  ADD PRIMARY KEY (`MaGia`);

--
-- Chỉ mục cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD PRIMARY KEY (`MaDonHang`,`MaSach`),
  ADD KEY `MaSach` (`MaSach`);

--
-- Chỉ mục cho bảng `chu_de`
--
ALTER TABLE `chu_de`
  ADD PRIMARY KEY (`MaChuDe`);

--
-- Chỉ mục cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD PRIMARY KEY (`MaDG`),
  ADD KEY `danh_gia_ibfk_2` (`MaND`);

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`MaDonHang`),
  ADD KEY `MaKH` (`MaKH`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`MaKH`);

--
-- Chỉ mục cho bảng `khuyen_mai`
--
ALTER TABLE `khuyen_mai`
  ADD PRIMARY KEY (`MaKM`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`MaLoai`),
  ADD KEY `MaChuDe` (`MaChuDe`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nguoi_danh_gia`
--
ALTER TABLE `nguoi_danh_gia`
  ADD PRIMARY KEY (`MaND`);

--
-- Chỉ mục cho bảng `nha_xuat_ban`
--
ALTER TABLE `nha_xuat_ban`
  ADD PRIMARY KEY (`MaNXB`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`MaSach`),
  ADD KEY `MaNXB` (`MaNXB`),
  ADD KEY `MaTheLoai` (`MaTheLoai`),
  ADD KEY `MaKM` (`MaKM`);

--
-- Chỉ mục cho bảng `tac_gia`
--
ALTER TABLE `tac_gia`
  ADD PRIMARY KEY (`MaTacGia`);

--
-- Chỉ mục cho bảng `tham_gia`
--
ALTER TABLE `tham_gia`
  ADD PRIMARY KEY (`MaSach`,`MaTacGia`),
  ADD KEY `MaTacGia` (`MaTacGia`);

--
-- Chỉ mục cho bảng `the_loai`
--
ALTER TABLE `the_loai`
  ADD PRIMARY KEY (`MaTheLoai`),
  ADD KEY `MaLoai` (`MaLoai`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`TenDN`),
  ADD UNIQUE KEY `TenDN` (`TenDN`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `vi_tri_ship`
--
ALTER TABLE `vi_tri_ship`
  ADD PRIMARY KEY (`MaViTri`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `anh_bai_viet`
--
ALTER TABLE `anh_bai_viet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1645034131;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_1` FOREIGN KEY (`MaSach`) REFERENCES `sach` (`MaSach`),
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_2` FOREIGN KEY (`MaDonHang`) REFERENCES `don_hang` (`MaDonHang`);

--
-- Các ràng buộc cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD CONSTRAINT `danh_gia_ibfk_2` FOREIGN KEY (`MaND`) REFERENCES `nguoi_danh_gia` (`MaND`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `don_hang_ibfk_1` FOREIGN KEY (`MaKH`) REFERENCES `khach_hang` (`MaKH`);

--
-- Các ràng buộc cho bảng `loai`
--
ALTER TABLE `loai`
  ADD CONSTRAINT `loai_ibfk_1` FOREIGN KEY (`MaChuDe`) REFERENCES `chu_de` (`MaChuDe`);

--
-- Các ràng buộc cho bảng `sach`
--
ALTER TABLE `sach`
  ADD CONSTRAINT `sach_ibfk_1` FOREIGN KEY (`MaNXB`) REFERENCES `nha_xuat_ban` (`MaNXB`),
  ADD CONSTRAINT `sach_ibfk_2` FOREIGN KEY (`MaTheLoai`) REFERENCES `the_loai` (`MaTheLoai`),
  ADD CONSTRAINT `sach_ibfk_3` FOREIGN KEY (`MaKM`) REFERENCES `khuyen_mai` (`MaKM`),
  ADD CONSTRAINT `sach_ibfk_4` FOREIGN KEY (`MaKM`) REFERENCES `khuyen_mai` (`MaKM`);

--
-- Các ràng buộc cho bảng `tham_gia`
--
ALTER TABLE `tham_gia`
  ADD CONSTRAINT `tham_gia_ibfk_1` FOREIGN KEY (`MaTacGia`) REFERENCES `tac_gia` (`MaTacGia`),
  ADD CONSTRAINT `tham_gia_ibfk_2` FOREIGN KEY (`MaSach`) REFERENCES `sach` (`MaSach`);

--
-- Các ràng buộc cho bảng `the_loai`
--
ALTER TABLE `the_loai`
  ADD CONSTRAINT `the_loai_ibfk_1` FOREIGN KEY (`MaLoai`) REFERENCES `loai` (`MaLoai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
