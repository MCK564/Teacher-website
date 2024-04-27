-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: mysql
-- Thời gian đã tạo: Th4 27, 2024 lúc 03:40 AM
-- Phiên bản máy phục vụ: 8.0.28
-- Phiên bản PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `teacher-app`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attach_files`
--

CREATE TABLE `attach_files` (
  `id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_id` bigint UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `attach_files`
--

INSERT INTO `attach_files` (`id`, `type`, `document_id`, `url`, `created_at`, `updated_at`, `file_name`) VALUES
(4, 'xlsx', 9, 'https://drive.google.com/thumbnail?id=19DVTI840VuXeUvPHjuWWoB7plubjZP50', '2024-04-25 07:34:37', '2024-04-25 07:34:37', '1714030475_bảng tính điểm.xlsx'),
(5, 'docx', 9, 'https://drive.google.com/thumbnail?id=1I4apj1WjF4shbPzwEj-8IQwq5ufaWDyI', '2024-04-25 07:34:39', '2024-04-25 07:34:39', '1714030477_chương-1-giới-thiệu.docx'),
(6, 'zip', 9, 'https://drive.google.com/thumbnail?id=1PHmH7n72NLkiimf27TSHVEIUf5vn8aZk', '2024-04-25 07:34:41', '2024-04-25 07:34:41', '1714030479_project cuối kỳ.zip'),
(7, 'docx', 11, 'https://drive.google.com/thumbnail?id=13_SSFUU_pkDinQxRTvcmcO-oKIhmldlo', '2024-04-25 10:10:27', '2024-04-25 10:10:27', '1714039824_chương-2-nghiên cứu người dùng.docx'),
(8, 'docx', 12, 'https://drive.google.com/thumbnail?id=1Eecb-4w3x0Hzl5O1d6lE4k_JE2ibJsIS', '2024-04-25 11:32:56', '2024-04-25 11:32:56', '1714044774_chương 3-wireframe_prototype.docx'),
(9, 'docx', 13, 'https://drive.google.com/thumbnail?id=1u65tRbTHMgphngfeXfALEJ9xAW63woh9', '2024-04-26 01:43:55', '2024-04-26 01:43:55', '1714095833_chương 1.Khái quát cơ sở dữ liệu.docx'),
(10, 'pptx', 13, 'https://drive.google.com/thumbnail?id=1HdRqS9aaBu7thcrCUaUQ1A9p3o3KOZlL', '2024-04-26 01:43:57', '2024-04-26 01:43:57', '1714095835_chương1 slide tiếng anh.pptx'),
(12, 'zip', 17, 'https://drive.google.com/thumbnail?id=1Y3Ae29SfkzpAl1UW3hoJ_z3gmjGyBN7d', '2024-04-26 06:55:00', '2024-04-26 06:55:00', '1714114495_Lab01.zip'),
(13, 'zip', 18, 'https://drive.google.com/thumbnail?id=14yXgLtAyR0NKiQFCb6dZVRMXBnhTUBKF', '2024-04-26 06:58:48', '2024-04-26 06:58:48', '1714114722_Lab02.zip');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `documents`
--

CREATE TABLE `documents` (
  `id` bigint UNSIGNED NOT NULL,
  `subject_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `documents`
--

INSERT INTO `documents` (`id`, `subject_id`, `title`, `content`, `created_at`, `updated_at`, `thumbnail`, `type`) VALUES
(9, 2, 'Chương 1 - Giới thiệu', 'description', '2024-04-25 05:56:07', '2024-04-26 08:48:53', 'https://drive.google.com/thumbnail?id=1Ue6V5GXXwxGW9mymSniZF73zg-RRhUa_', 'theory'),
(11, 2, 'Chương 2 - Nghiên cứu người dùng', 'Tập trung vào việc hiểu người dùng cuối và cách họ tương tác với sản phẩm để tạo ra trải nghiệm tốt nhất.', '2024-04-25 10:09:52', '2024-04-26 06:34:25', 'https://drive.google.com/thumbnail?id=1txbQmmtaHZe605krLSncjrcDhMm7cDoQ', 'theory'),
(12, 2, 'Chương 3 - Wireframe và Prototype', 'Xây dựng wireframes và prototypes để trực quan hóa ý tưởng và cấu trúc của sản phẩm.', '2024-04-25 11:30:52', '2024-04-26 06:34:38', 'https://drive.google.com/thumbnail?id=16ZCj9r_Dd-zKONgaYz1cLb80Igqqn3eq', 'theory'),
(13, 3, 'Chương 1 - Đại cương về hệ cơ sở dữ liệu', 'Giới thiệu khái quát về hệ cơ sở dữ liệu', '2024-04-26 01:42:54', '2024-04-26 06:34:47', 'https://drive.google.com/thumbnail?id=12AVgE9LBH9m6lxGMhOMLoR0BXuMyr8Te', 'theory'),
(14, 4, 'Chương 1 - HTML cơ bản', 'Trong chương này, bạn sẽ học về cấu trúc cơ bản của các trang web HTML, các phần tử HTML cơ bản như <html>, <head>, <body>, các phần tử block và inline, v.v.', '2024-04-26 01:46:19', '2024-04-26 06:34:56', 'https://drive.google.com/thumbnail?id=1Y6rxsRVEPtPOiIOikbQXMvFfqS0VVmYX', 'theory'),
(15, 4, 'Chương 2 - CSS cơ bản', 'Chương này tập trung vào việc sử dụng CSS để tạo kiểu cho các phần tử HTML, bao gồm cách chọn phần tử, thuộc tính CSS phổ biến như màu sắc, font chữ, kích thước, v.v.', '2024-04-26 01:46:54', '2024-04-26 06:35:04', 'https://drive.google.com/thumbnail?id=1Kj3_nf4Jb6Jbn_GCMqdISHgdEtJQiko1', 'theory'),
(16, 5, 'Chương 1 - Giới thiệu về .NET Framework và .NET Core', 'Lịch sử phát triển của .NET Framework và .NET Core.\r\nCác thành phần chính của .NET Framework và .NET Core.', '2024-04-26 01:49:42', '2024-04-26 06:35:13', 'https://drive.google.com/thumbnail?id=1d-hy3wOWpnZ5VRv3Wt8Wq7C_Lh_w_r7x', 'theory'),
(17, 4, 'lab-1 html', 'thực hành các thẻ cơ bản của html, tạo form login , sign up', '2024-04-26 06:36:11', '2024-04-26 06:36:11', 'https://drive.google.com/thumbnail?id=18nlw6FXMKJzolXbXlG4FOrRGhBHQjoSZ', 'lab'),
(18, 4, 'lab2 - css', 'làm lại lab1 và chỉnh sửa theo các thuộc tính trong bài', '2024-04-26 06:58:20', '2024-04-26 06:58:20', 'https://drive.google.com/thumbnail?id=14mR6DADG4xQyeo4z0q21ouUidHkXcwyR', 'lab');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `downloads`
--

CREATE TABLE `downloads` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `attach_file_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `downloads`
--

INSERT INTO `downloads` (`id`, `user_id`, `attach_file_id`, `created_at`, `updated_at`) VALUES
(1, 1, 4, '2024-04-25 08:53:27', '2024-04-25 08:53:27'),
(2, 1, 7, '2024-04-25 10:10:31', '2024-04-25 10:10:31'),
(3, 1, 7, '2024-04-25 10:10:34', '2024-04-25 10:10:34'),
(4, 1, 7, '2024-04-25 10:10:40', '2024-04-25 10:10:40'),
(5, 1, 7, '2024-04-25 10:10:44', '2024-04-25 10:10:44'),
(6, 1, 7, '2024-04-25 10:10:51', '2024-04-25 10:10:51'),
(7, 1, 7, '2024-04-25 10:10:58', '2024-04-25 10:10:58'),
(8, 1, 5, '2024-04-25 10:11:23', '2024-04-25 10:11:23'),
(9, 1, 4, '2024-04-25 10:11:27', '2024-04-25 10:11:27'),
(10, 1, 6, '2024-04-25 10:11:34', '2024-04-25 10:11:34'),
(11, 1, 6, '2024-04-25 10:11:37', '2024-04-25 10:11:37'),
(12, 1, 5, '2024-04-25 10:14:18', '2024-04-25 10:14:18'),
(13, 1, 5, '2024-04-25 10:14:23', '2024-04-25 10:14:23'),
(14, 1, 5, '2024-04-25 10:14:33', '2024-04-25 10:14:33'),
(15, 1, 7, '2024-04-25 10:15:26', '2024-04-25 10:15:26'),
(16, 1, 7, '2024-04-25 10:15:29', '2024-04-25 10:15:29'),
(17, 1, 7, '2024-04-25 10:15:37', '2024-04-25 10:15:37'),
(18, 1, 7, '2024-04-25 10:16:09', '2024-04-25 10:16:09'),
(19, 1, 7, '2024-04-25 10:17:11', '2024-04-25 10:17:11'),
(20, 1, 7, '2024-04-25 10:17:22', '2024-04-25 10:17:22'),
(21, 1, 7, '2024-04-25 10:17:30', '2024-04-25 10:17:30'),
(22, 1, 6, '2024-04-25 10:17:38', '2024-04-25 10:17:38'),
(23, 1, 6, '2024-04-25 10:17:41', '2024-04-25 10:17:41'),
(24, 1, 4, '2024-04-25 10:17:45', '2024-04-25 10:17:45'),
(25, 1, 5, '2024-04-25 10:20:48', '2024-04-25 10:20:48'),
(26, 1, 5, '2024-04-25 10:20:51', '2024-04-25 10:20:51'),
(27, 1, 4, '2024-04-25 10:34:29', '2024-04-25 10:34:29'),
(28, 1, 5, '2024-04-25 10:34:33', '2024-04-25 10:34:33'),
(29, 1, 6, '2024-04-25 10:34:40', '2024-04-25 10:34:40'),
(30, 1, 8, '2024-04-25 11:33:00', '2024-04-25 11:33:00'),
(31, 1, 8, '2024-04-25 12:03:02', '2024-04-25 12:03:02'),
(32, 1, 5, '2024-04-26 00:22:02', '2024-04-26 00:22:02'),
(33, 1, 6, '2024-04-26 00:22:05', '2024-04-26 00:22:05'),
(34, 1, 10, '2024-04-26 01:44:00', '2024-04-26 01:44:00'),
(35, 1, 4, '2024-04-26 02:13:49', '2024-04-26 02:13:49'),
(36, 1, 13, '2024-04-26 06:58:52', '2024-04-26 06:58:52'),
(37, 2, 6, '2024-04-26 09:37:52', '2024-04-26 09:37:52'),
(38, 2, 5, '2024-04-26 09:37:56', '2024-04-26 09:37:56'),
(39, 2, 4, '2024-04-26 09:37:59', '2024-04-26 09:37:59'),
(40, 2, 12, '2024-04-26 09:51:03', '2024-04-26 09:51:03'),
(41, 2, 13, '2024-04-26 09:51:22', '2024-04-26 09:51:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(8, '2024_04_22_042046_create_subjects_table', 2),
(9, '2024_04_22_042055_create_documents_table', 2),
(10, '2024_04_22_042124_create_news_table', 2),
(11, '2024_04_22_043510_create_vaccancies_table', 2),
(12, '2024_04_22_043912_add_columns_to_table_users', 2),
(13, '2024_04_22_074317_create_attach_files_table', 2),
(14, '2024_04_22_080316_create_table_downloads', 2),
(15, '2024_04_25_040824_add_columns_to_documents', 3),
(16, '2024_04_25_073232_add_collumns_to_attach_files', 4),
(17, '2024_04_25_115309_add_columns_to_vaccancies', 5),
(18, '2024_04_25_121025_add_columns_to_vaccancies2', 6),
(19, '2024_04_25_145839_update_column_in_vaccancies', 7),
(20, '2024_04_25_150128_update_column_in_vaccancies2', 8),
(21, '2024_04_26_062144_add_columns_to_documents', 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` bigint UNSIGNED NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `thumbnail`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 'https://drive.google.com/thumbnail?id=1-l0QCkeGcuxkJZXsmQkP7rs68Lfio-3n', 'Trường Đại học Tôn Đức Thắng tổ chức Hội nghị giao ban toàn Trường lần 2 năm học 2023 – 2024', '<p>Ngày 19/4/2024, Trường Đại học Tôn Đức Thắng (TDTU) đã tổ chức Hội nghị giao ban toàn Trường lần 2 năm học 2023 - 2024. TS. Trần Trọng Đạo - Hiệu trưởng TDTU đã chủ trì, chỉ đạo Hội nghị.&nbsp;</p><p>&nbsp;</p><h2>Tham dự Hội nghị có các thành viên Ban Giám hiệu (TS. Võ Hoàng Duy - Phó Hiệu trưởng TDTU, TS. Đồng Sĩ Thiên Châu - Phó Hiệu trưởng TDTU) cùng sự tham gia của Lãnh đạo (Trưởng, Phó, Trợ lý) các Khoa, Phòng, Ban, Viện, Trung tâm và đơn vị trực thuộc TDTU.&nbsp;</h2><h2>&nbsp;</h2><h2>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Đây là hoạt động định kỳ của Nhà trường nhằm đánh giá hiệu quả các nhiệm vụ, công tác trong năm học và đề ra các mục tiêu và kế hoạch thực hiện cho từng học kỳ, cả năm học và cho năm học sau. Hội nghị đã nghe báo cáo giám sát tình hình thực hiện Kết luận của Hiệu trưởng tại Hội nghị giao ban toàn Trường lần 1 năm học 2023-2024.&nbsp;</h2><h2>&nbsp; &nbsp; &nbsp; &nbsp; Báo cáo đã chỉ rõ kết quả, tiến độ thực hiện nội dung Kết luận cuộc họp giao ban công tác năm học 2023 – 2024, hành động thực hiện, đánh giá kết quả thực hiện của các đơn vị được giao chủ trì thực hiện. Hiệu trưởng đã nghiêm khắc nhắc nhở, phê bình các đơn vị chưa hoàn thành, chưa hoàn thành đúng tiến độ công việc được giao.&nbsp;</h2><p>&nbsp;</p><h2>Tiếp đó, Hội nghị đã nghe các đơn vị trình bày Báo cáo về kết quả kế hoạch củng cố nhân sự cho các đơn vị chuyên môn trong Trường nhằm đáp ứng chuẩn cơ sở giáo dục đại học và điều kiện phát triển Trường giai đoạn 2025-2030; Báo cáo tình hình thực hiện mục tiêu chất lượng về khoa học công nghệ (KHCN) và công bố quốc tế, các giải pháp đảm bảo về hiệu quả thực hiện MTCL năm học 2023-2024; Báo cáo đánh giá việc sử dụng công nghệ số trong dạy -học hiện nay của Trường, những nhiệm vụ cấp thiết cần làm để triển khai Đề án chuyển đổi số; Báo cáo kết quả về việc nâng cao chất lượng dạy và học tiếng Anh…Đặc biệt, Hội nghị cũng nghe báo cáo kế hoạch triển khai thực hiện các tiêu chí đáp ứng tiêu chuẩn cơ sở giáo dục đại học theo Thông tư số 01/2024 của Bộ Giáo dục và Đào tạo, ngày 5/2/2024. Lãnh đạo các đơn vị dự Hội nghị đã có nhiều ý kiến tham gia, đóng góp, hoàn thiện cho các báo cáo tại Hội nghị cũng như đặt ra các câu hỏi, giải pháp cho các đơn vị chủ trì báo cáo.</h2><h2>&nbsp;</h2><h2>&nbsp;Kết luận Hội nghị, Hiệu trưởng đã nêu ra một số định hướng, chỉ đạo về các giải pháp thực hiện các nhiệm vụ các đơn vị đang thực hiện và triển khai trong thời gian tới.</h2><figure class=\"image\"><img style=\"aspect-ratio:1000/667;\" src=\"https://tdtu.edu.vn/sites/www/files/articles/2024/Apr/GiaobanTruong/1.jpg\" alt=\"giaoban\" width=\"1000\" height=\"667\"></figure><p><i>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;TS. Trần Trọng Đạo - Hiệu trưởng TDTU; TS. Võ Hoàng Duy - Phó Hiệu trưởng TDTU và TS. Đồng Sĩ Thiên Châu - Phó Hiệu trưởng TDTU chủ trì hội nghị</i></p><p>&nbsp;</p><p>&nbsp;</p><figure class=\"image\"><img style=\"aspect-ratio:1000/667;\" src=\"https://tdtu.edu.vn/sites/www/files/articles/2024/Apr/GiaobanTruong/2.JPG\" alt=\"giaoban\" width=\"1000\" height=\"667\"></figure><figure class=\"image\"><img style=\"aspect-ratio:1000/667;\" src=\"https://tdtu.edu.vn/sites/www/files/articles/2024/Apr/GiaobanTruong/3.JPG\" alt=\"giaoban\" width=\"1000\" height=\"667\"></figure><figure class=\"image\"><img style=\"aspect-ratio:1000/667;\" src=\"https://tdtu.edu.vn/sites/www/files/articles/2024/Apr/GiaobanTruong/4.JPG\" alt=\"giaoban\" width=\"1000\" height=\"667\"></figure><p><i>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Lãnh đạo các Khoa, Phòng, Ban, Viện và đơn vị trực thuộc báo cáo tại hội nghị</i></p><figure class=\"image\"><img style=\"aspect-ratio:1000/667;\" src=\"https://tdtu.edu.vn/sites/www/files/articles/2024/Apr/GiaobanTruong/6.JPG\" alt=\"giaoban\" width=\"1000\" height=\"667\"></figure><figure class=\"image\"><img style=\"aspect-ratio:1000/667;\" src=\"https://tdtu.edu.vn/sites/www/files/articles/2024/Apr/GiaobanTruong/5.JPG\" alt=\"giaoban\" width=\"1000\" height=\"667\"></figure><p><i>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Toàn cảnh Hội nghị giao ban toàn Trường lần 2 năm học 2023 - 2024</i></p>', '2024-04-25 09:49:27', '2024-04-26 07:36:36'),
(2, 'https://drive.google.com/thumbnail?id=1Ei_JXZQDe1XDuYkoZ537xrclKU7FY2Mk', 'Đăng ký tham dự Workshop \"Kỹ năng giao tiếp hiệu quả trong Doanh nghiệp\"', '<p>Nay Khoa CNTT tổ chức Workshop \"Kỹ năng giao tiếp hiệu quả trong doanh nghiệp\" với sự tham gia của các diễn giả đến từ FPT Telecom, với thông tin chi tiết chương trình như sau:&nbsp;</p><p>1. Thời gian: 14h00 - 16h30, ngày 23/04/2023.&nbsp;</p><p>&nbsp;</p><p>2. Địa điểm: Phòng A0403.&nbsp;</p><p>&nbsp;</p><p>3. Nội dung chương trình:&nbsp;</p><p>- Các yếu tố ảnh hưởng giao tiếp trực tiếp, các hình thái giao tiếp trực tiếp/gián tiếp.</p><p>&nbsp;- Bí kíp viết email hiệu quả.&nbsp;</p><p>- Bí kíp giao tiếp hiệu quả: 3S, THINK, 3 câu hỏi quyền năng, lắng nghe, thấu hiểu, chia sẻ và cho đi.&nbsp;</p><p>- Kinh nghiệm và bài học thực tế từ các Diễn giả.&nbsp;</p><p>&nbsp;</p><p>4. Quyền lợi:&nbsp;</p><p>- Sinh viên được ghi nhận hoạt động khi tham gia chương trình&nbsp;</p><p>- Sinh viên có thêm những kỹ năng giao tiếp để chuẩn bị cho chuyến đi thực tập sắp tới.&nbsp;</p><p>&nbsp;</p><p>5. Số lượng ghế ngồi: Giới hạn 120 ghế.&nbsp;</p><p>&nbsp;</p><p>6. Đăng ký: Đăng ký tại đây để giữ slot cho bản thân mình. Lưu ý, sinh viên phải đăng ký mới có thể tham gia chương trình.</p>', '2024-04-25 09:57:01', '2024-04-26 07:26:59'),
(3, 'https://drive.google.com/thumbnail?id=1uealwcLunRUmWOxVGH8gsopqwtfSQy3b', 'Thông báo Về việc nộp hồ sơ tham gia Giải thưởng Khoa học và Công nghệ dành cho sinh viên trong các cơ sơ giáo dục đại học năm 2024', '<p>I. Mục đích&nbsp;</p><p>- Thực hiện Chủ trương và Nhiệm vụ của Khoa đối với Kế hoạch 60/KH-P.QLPT KHCN của Trường Đại học Tôn Đức Thắng. - Tạo điều kiện, cơ hội cho các đề tài nghiên cứu khoa học sinh viên của Trường có thành tích xuất sắc được biêu dương, khen thưởng, khuyên khích sinh viên tham gia nghiên cứu khoa học và phát triên công nghệ, ứng dụng vào giải quyêt những vân đê thực tiễn cuộc sông, góp phần nâng cao chất lượng đào tạo, phát triên kinh tế - xã hội, phát hiện và bôi dưỡng tài năng khoa học trẻ trong cơ sở giáo dục đại học.</p><p>&nbsp;</p><p>&nbsp;II. Đối tượng tham gia xét Giải thưởng</p><p>&nbsp;- Đối tượng tham gia là các sinh viên đang theo học tại Trường tính đến thời điểm nộp hồ sơ tham gia Giải thưởng.&nbsp;</p><p>&nbsp;</p><p>III. Yêu cầu Đề tài&nbsp;</p><p>&nbsp; &nbsp; &nbsp;a) Mỗi đề tài do 01 sinh viên chịu trách nhiệm thực hiện chính, số lượng thành viên tham gia không quá 05 sinh viên và tối đa có 02 người hướng dẫn, trong đó có 01 người hướng dẫn chính;&nbsp;</p><p>&nbsp;</p><p>&nbsp; &nbsp; &nbsp; b) Sản phẩm của đề tài được công bố hoặc ứng dụng trong thực tiễn ít nhất 01 năm tính đến thời điểm nộp hồ sơ đề nghị xét tặng giải thưởng. Các hình thức công bố bao gồm:&nbsp;</p><p>&nbsp;</p><p>- Sách chuyên khảo, sách tham khảo được cấp giấy phép xuất bản.</p><p>- Bài báo đăng trên các tạp chí khoa học.&nbsp;</p><p>- Báo cáo trình bày hoặc đăng trong kỷ yếu hội nghị, hội thảo khoa học trong nước và quốc tế.&nbsp;</p><p>- Báo cáo hoặc trưng bày, trình diễn sản phẩm tại hội nghị, hội thảo, seminar (xêmina) từ cấp khoa trở lên.&nbsp;</p><p>- Ứng dụng trong thực tiễn có xác nhận của tổ chức, đơn vị sử dụng sản phẩm của đề tài.&nbsp;</p><p>&nbsp;</p><p>IV. Đăng ký Sinh đáp ứng yêu cầu đề tài, có nguyện vọng đăng kí tham gia, vui lòng email liên hệ thầy Trần Trung Tín (trantrungtin@tdtu.edu.vn) để được hướng dẫn và cung cấp biểu mẫu trước ngày 5/4/2024.</p>', '2024-04-25 10:01:39', '2024-04-26 07:28:15'),
(4, 'https://drive.google.com/thumbnail?id=1xDean-jOBRQshsJDr296Gdw6ekgviQur', 'Trường Đại học Tôn Đức Thắng ký kết Thỏa thuận hợp tác với Trường Đại học Cảnh sát nhân dân', '<p>&nbsp;</p><p>Ngày 23/4/2024, Đoàn đại biểu Lãnh đạo, cán bộ, giảng viên Trường Đại học Cảnh sát nhân dân do Thiếu tướng, GS. TS. Trần Thành Hưng - Hiệu trưởng Trường Đại học Cảnh sát nhân dân (PPU) làm Trưởng đoàn đã đến thăm và làm việc tại Trường Đại học Tôn Đức Thắng (TDTU) và tham dự Lễ ký kết thỏa thuận hợp tác giữa hai Trường.&nbsp;</p><p>&nbsp;</p><p>Tiếp và làm việc với Đoàn, về phía TDTU có sự hiện diện của TS. Trần Trọng Đạo - Hiệu trưởng TDTU; PGS.TS Phạm Thị Minh Lý, Phó chủ tịch Hội đồng Trường, kiêm Trưởng Khoa Quản trị kinh doanh TDTU; TS. Võ Hoàng Duy - Phó Hiệu trưởng TDTU và đông đủ lãnh đạo các Phòng, Ban, Khoa, Trung tâm thuộc và trực thuộc của Trường.</p><p>&nbsp;</p><p>&nbsp;Đoàn đã đi tham quan cơ sở vất chất và môi trường học tập TDTU và có buổi làm việc với Ban Giám hiệu Nhà trường, Lãnh đạo các đơn vị thuộc, trực thuộc TDTU. Tại buổi làm việc, hai bên đã trao đổi, chia sẻ kinh nghiệm và thảo luận việc hợp tác giữa hai trường, theo thế mạnh của mỗi bên, về công tác quản trị Nhà trường; về quản trị đại học; đảm bảo an toàn an ninh mạng trong bối cảnh hiện nay; ứng dụng công nghệ thông tin, xây dựng Nhà trường thông minh, thư viện điện tử cũng như các vấn đề về hỗ trợ kỹ thuật, chuyển đổi công nghệ số nhằm nâng cao chất lượng giáo dục, đào tạo, trong đó nhấn mạnh vai trò của con người trong quá trình chuyển đổi số, trí tuệ nhân tạo…&nbsp;</p><p>&nbsp;</p><p>Phát biểu tại buổi làm việc, GS. TS. Trần Thành Hưng - Hiệu trưởng PPU đã cảm ơn sự đón tiếp nồng hậu và ấm áp của Trường dành cho Đoàn; đánh giá cao nề nếp trong sinh hoạt, học tập của sinh viên Nhà trường; ấn tượng về cơ sở vật chất hiện đại, tiện nghi, môi trường chuẩn quốc tế, xanh sạch đẹp của Trường; đồng thời bày tỏ sự vui mừng về định hướng và bước phát triển mới trong việc ký kết hợp tác với TDTU, qua đó, triển khai các hoạt động hợp tác sâu sắc hơn giữa hai trường trong thời gian tới.&nbsp;</p><p>&nbsp;</p><p>GS. TS Trần Thành Hưng cho rằng, với bề dày 50 năm thành lập và phát triển của Trường Đại học Cảnh sát Nhân dân, với các chuyên ngành đào tạo của PPU, có nhiều điểm tương đồng cũng như nhiều khía cạnh đào tạo có thể hỗ trợ lẫn nhau, việc hợp tác và phát triển quan hệ giữa hai trường sẽ có nhiều kết quả khả quan. “Chúng tôi hoàn toàn tin tưởng rằng, với trách nhiệm của người lính (Trường Đại học Cảnh sát Nhân dân) và khát vọng phụng sự, lan tỏa của Trường Đại học Tôn Đức Thắng, chắc chắn việc triển khai thỏa thuận hợp tác, phát triển sẽ thành công”.&nbsp;</p><p>&nbsp;</p><p>GS.TS Trần Thành Hưng phát biểu tại buổi làm việc và ký kết hợp tác giữa hai Trường. Trong khuôn khổ buổi làm việc, ký kết thỏa thuận hợp tác giữa hai bên, hai Trường cũng đã tổ chức buổi giao lưu thể thao đậm đà tình hữu nghị tại sân vận động TDTU.</p><figure class=\"image\"><img style=\"aspect-ratio:1000/667;\" src=\"https://tdtu.edu.vn/sites/www/files/articles/2024/Apr/TDTU-%C4%90HCS/1.jpg\" alt=\"Canhsat\" width=\"1000\" height=\"667\"></figure><p><i>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; TS. Trần Trọng Đạo - Hiệu trưởng TDTU phát biểu tại buổi làm việc</i></p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><figure class=\"image\"><img style=\"aspect-ratio:1000/667;\" src=\"https://tdtu.edu.vn/sites/www/files/articles/2024/Apr/TDTU-%C4%90HCS/2.JPG\" alt=\"Canhsat\" width=\"1000\" height=\"667\"></figure><p><i>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Thiếu tướng, GS. TS. Trần Thành Hưng - Hiệu trưởng PPU phát biểu tại buổi làm việc</i></p><p>&nbsp;</p><p>&nbsp;</p><figure class=\"image\"><img style=\"aspect-ratio:1000/667;\" src=\"https://tdtu.edu.vn/sites/www/files/articles/2024/Apr/TDTU-%C4%90HCS/3.jpg\" alt=\"Canhsat\" width=\"1000\" height=\"667\"></figure><p><i>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;TS. Trần Trọng Đạo - Hiệu trưởng TDTU và GS. TS. Trần Thành Hưng - Hiệu trưởng PPU ký kết hợp tác giữa hai Trường</i></p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><figure class=\"image\"><img style=\"aspect-ratio:1000/648;\" src=\"https://tdtu.edu.vn/sites/www/files/articles/2024/Apr/TDTU-%C4%90HCS/4.jpg\" alt=\"Canhsat\" width=\"1000\" height=\"648\"></figure><figure class=\"image\"><img style=\"aspect-ratio:1000/666;\" src=\"https://tdtu.edu.vn/sites/www/files/articles/2024/Apr/TDTU-%C4%90HCS/5.jpg\" alt=\"Canhsat\" width=\"1000\" height=\"666\"></figure><p><i>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;TS. Trần Trọng Đạo - Hiệu trưởng TDTU và GS. TS. Trần Thành Hưng - Hiệu trưởng PPU tặng quà lưu niệm nhân chuyến thăm và làm việc</i></p><p>&nbsp;</p>', '2024-04-26 01:07:00', '2024-04-26 07:33:16'),
(5, 'https://drive.google.com/thumbnail?id=1z4tNjjOX_HrvCZR8bCNW3bu5IFAWgqRc', 'Trường Đại học Tôn Đức Thắng tổ chức Lễ Tuyên dương sinh viên đạt danh hiệu Sinh viên 5 tốt cấp Trường', '<p>Ngày 31/3/2024, Hội Sinh viên Việt Nam Trường Đại học Tôn Đức Thắng (TDTU) đã tổ chức Lễ tuyên dương “Sinh viên 5 tốt” cấp Trường năm học 2022-2023 cho 329 sinh viên đến từ 16 khoa.&nbsp;</p><p>&nbsp;</p><p>Đến tham dự Lễ tuyên dương, về phía Thành đoàn, Hội sinh viên Thành phố có đồng chí Trần Hải Long, Cán bộ Ban Tổ chức - kiểm tra Thành Đoàn. Về phía TDTU có PGS.TS Phạm Thị Minh Lý, Ủy viên Ban Thường vụ, Chủ nhiệm Ủy ban kiểm tra Đảng ủy, Phó Chủ tịch Hội đồng trường, đồng chí Trần Lê Anh Huy - Đảng ủy viên, Bí Thư Đoàn trường, Phó trưởng phòng Phòng công tác học sinh - sinh viên và các thầy cô lãnh đạo và viên chức công tác sinh viên các Khoa.&nbsp;</p><p>&nbsp;</p><p>Tại buổi lễ, đồng chí Trương Thị Cẩm Tú - Chủ tịch Hội sinh viên trường báo cáo kết quả thực hiện phong trào “Sinh viên 5 Tốt” năm học 2022-2023, công bố quyết định công nhận danh hiệu và quyết định khen thưởng của Ban Giám hiệu nhà trường đối với các anh chị sinh viên đạt danh hiệu, đồng thời phát động phong trào cho năm học tiếp theo. Hội Sinh viên Việt Nam TDTU khuyến khích các cá nhân đã đạt danh hiệu “Sinh viên 5 Tốt” tiếp tục nỗ lực hơn nữa để tiếp tục đạt danh hiệu này trong những năm kế tiếp.&nbsp;</p><p>&nbsp;</p><p>Sinh viên 5 tốt là danh hiệu được trao cho các sinh viên xuất sắc đã có một năm phấn đấu học tập và rèn luyện để hoàn thiện 5 tiêu chí: Đạo đức tốt - Học tập tốt - Thể lực tốt - Tình nguyện tốt - Hội nhập tốt.</p><figure class=\"image\"><img style=\"aspect-ratio:1000/666;\" src=\"https://tdtu.edu.vn/sites/www/files/articles/2024/Mar/sinh%20vi%C3%AAn%205%20t%E1%BB%91t/1.jpg\" alt=\"Sinhvien 5 tot\" width=\"1000\" height=\"666\"></figure><p><i>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Đồng chí Trương Thị Cẩm Tú - Chủ tịch Hội sinh viên Trường báo cáo tại buổi Lễ</i></p><p>&nbsp;</p><figure class=\"image\"><img style=\"aspect-ratio:1000/666;\" src=\"https://tdtu.edu.vn/sites/www/files/articles/2024/Mar/sinh%20vi%C3%AAn%205%20t%E1%BB%91t/2.jpg\" alt=\"sinhvien5tot\" width=\"1000\" height=\"666\"></figure><p><i>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Ban tổ chức tặng hoa cho đại diện Thành đoàn và lãnh đạo TDTU</i></p><figure class=\"image\"><img style=\"aspect-ratio:1000/666;\" src=\"https://tdtu.edu.vn/sites/www/files/articles/2024/Mar/sinh%20vi%C3%AAn%205%20t%E1%BB%91t/3.jpg\" alt=\"sinhvien5tot\" width=\"1000\" height=\"666\"></figure><figure class=\"image\"><img style=\"aspect-ratio:1000/666;\" src=\"https://tdtu.edu.vn/sites/www/files/articles/2024/Mar/sinh%20vi%C3%AAn%205%20t%E1%BB%91t/4.jpg\" alt=\"sinhvien5tot\" width=\"1000\" height=\"666\"></figure><figure class=\"image\"><img style=\"aspect-ratio:1000/666;\" src=\"https://tdtu.edu.vn/sites/www/files/articles/2024/Mar/sinh%20vi%C3%AAn%205%20t%E1%BB%91t/5.jpg\" alt=\"sinhvien5tot\" width=\"1000\" height=\"666\"></figure><p><i>Các sinh viên nhận bằng khen và giấy chứng nhận sinh viên 5 tốt</i></p><figure class=\"image\"><img style=\"aspect-ratio:1000/666;\" src=\"https://tdtu.edu.vn/sites/www/files/articles/2024/Mar/sinh%20vi%C3%AAn%205%20t%E1%BB%91t/6.jpg\" alt=\"sinhvien5tot\" width=\"1000\" height=\"666\"></figure><p><i>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Ban tổ chức chụp hình lưu niệm tại buổi Lễ</i></p><figure class=\"image\"><img style=\"aspect-ratio:1000/666;\" src=\"https://tdtu.edu.vn/sites/www/files/articles/2024/Mar/sinh%20vi%C3%AAn%205%20t%E1%BB%91t/7.jpg\" alt=\"sinhvien5tot\" width=\"1000\" height=\"666\"></figure><p><i>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Toàn cảnh buổi Lễ tuyên dương sinh viên đạt danh hiệu Sinh viên 5 tốt</i></p><p>&nbsp;</p>', '2024-04-26 01:07:53', '2024-04-26 07:44:17'),
(6, 'https://drive.google.com/thumbnail?id=1e_QjbLFEfJY8IHa9otY7Zmy0Jq3zE-eO', 'Khoa CNTT - TDTU lần đầu tham gia tổ chức kỳ thi Lập trình Sinh viên Quốc tế ICPC vòng Quốc gia 2023', '<p>Lập trình sinh viên quốc tế ICPC là kỳ thi lập trình đẳng cấp có quy mô toàn cầu, được diễn ra hàng năm ở các quốc gia, châu lục để chọn đội tuyển tham dự vòng thi toàn cầu- World Final.&nbsp;Đây là cơ hội để các sinh viên CNTT trên cả thế giới cùng học hỏi, cọ xát và trưởng thành về chuyên môn.&nbsp;Tuy chỉ mới tham gia các kỳ thi này từ năm 2022, nhưng đội Olympic Tin học của Khoa CNTT - TDTU đã có nhiều <a href=\"https://it.tdtu.edu.vn/sv-khoa-cntt-dat-nhieu-danh-hieu-cao-trong-lan-dau-tham-gia-ky-thi-olympic-tin-hoc-sinh-vien-vn-va\">thành tích cao</a> trong lần đầu tham gia kỳ thi Olympic Tin học Sinh viên Việt Nam tại TpHCM</p><p>Cuộc thi Lập trình Sinh viên Quốc tế ICPC vòng Quốc gia 2023 được tổ chức tại 18 điểm thi trên toàn quốc. Được sự tín nhiệm cao của Hội tin học Việt Nam, tại TpHCM, Trường Đại học Tôn Đức Thắng đã được lựa chọn là 01 trong 06 điểm tổ chức kỳ thi ICPC quốc gia 2023 vào thời gian từ ngày 04 đến 05/11 vừa qua nhằm chọn ra các đội thi xuất sắc nhất đại diện các trường Đại học, Cao đẳng trên cả nước, đại diện Việt Nam tham dự Kỳ thi ICPC Asia Hue City 2023 từ ngày 05 đến ngày 08/12/2023.&nbsp;</p><figure class=\"image\"><img style=\"aspect-ratio:1144/491;\" src=\"https://it.tdtu.edu.vn/sites/cntt/files/inline-images/1_2.jpg\" alt=\"Trường Đại học Tôn Đức Thắng đã được lựa chọn là 01 trong 06 điểm thi ICPC quốc gia 2023 vào thời gian từ ngày 04 đến 05/11\" width=\"1144\" height=\"491\"></figure><p>&nbsp;</p><figure class=\"image\"><img style=\"aspect-ratio:1170/780;\" src=\"https://it.tdtu.edu.vn/sites/cntt/files/inline-images/To-chuc-thi-ICPC-Quoc-gia-2023-2.jpg\" alt=\"Tổ chức thi ICPC Quốc gia 2023\" width=\"1170\" height=\"780\"></figure><p>Các đdội tham gia chụp hình lưu niệm tại điểm thi Trường Đại học Tôn Đức Thắng</p><figure class=\"image\"><img style=\"aspect-ratio:1170/780;\" src=\"https://it.tdtu.edu.vn/sites/cntt/files/inline-images/To-chuc-thi-ICPC-Quoc-gia-2023-3.jpg\" alt=\"Đội OLP-ICPC của Khoa CNTT - TDTU\" width=\"1170\" height=\"780\"></figure><figure class=\"image\"><img style=\"aspect-ratio:780/1170;\" src=\"https://it.tdtu.edu.vn/sites/cntt/files/inline-images/To-chuc-thi-ICPC-Quoc-gia-2023-4.jpg\" alt=\"Thí sinh tham gia kỳ thi\" width=\"780\" height=\"1170\"></figure><figure class=\"image\"><img style=\"aspect-ratio:780/1170;\" src=\"https://it.tdtu.edu.vn/sites/cntt/files/inline-images/To-chuc-thi-ICPC-Quoc-gia-2023-5.jpg\" alt=\"Thí sinh tham gia kỳ thi\" width=\"780\" height=\"1170\"></figure><figure class=\"image\"><img style=\"aspect-ratio:1170/780;\" src=\"https://it.tdtu.edu.vn/sites/cntt/files/inline-images/To-chuc-thi-ICPC-Quoc-gia-2023-6.jpg\" alt=\"Thí sinh tham gia kỳ thi\" width=\"1170\" height=\"780\"></figure><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Thí sinh tham gia kỳ thi</p>', '2024-04-26 07:46:43', '2024-04-26 07:58:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `subjects`
--

INSERT INTO `subjects` (`id`, `created_at`, `updated_at`, `name`, `description`) VALUES
(2, '2024-04-24 00:04:45', '2024-04-24 00:04:45', 'Thiết kế giao diện người dùng', 'Môn này cũng rất khó nha các em'),
(3, '2024-04-24 00:05:21', '2024-04-24 00:05:21', 'Hệ cơ sở dữ liệu', 'Môn này không học là không làm được về quê nha các em'),
(4, '2024-04-24 00:16:36', '2024-04-24 00:16:36', 'Web php', 'Môn này cũng hơi khó đó các em'),
(5, '2024-04-26 01:48:03', '2024-04-26 01:48:03', 'Công nghệ .Net', 'Môn học về công nghệ .NET thường tập trung vào việc học về việc phát triển ứng dụng phần mềm sử dụng nền tảng .NET của Microsoft. Giới thiệu về .NET Framework và .NET Core, Xử lý Dữ liệu với Entity Framework và LINQ,.....................');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `user_type`, `remember_token`, `created_at`, `updated_at`, `avatar_url`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$SR3.S9Ys78cbTdnlpmCJc.GcB4mjtqDmFhGl8YPz/hPyqtyxgqc.i', 'admin', NULL, '2024-04-22 03:05:20', '2024-04-22 03:05:20', NULL),
(2, 'user1', 'user1@gmail.com', NULL, '$2y$10$s5JEmvr3cYS25qflMF/DR.3qXQsJzCf.nsD36C3HFIx4MeI0SDGpC', 'user', NULL, '2024-04-22 03:06:43', '2024-04-22 03:06:43', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vaccancies`
--

CREATE TABLE `vaccancies` (
  `id` bigint UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `welfare` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `thumnails` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `requirements` text COLLATE utf8mb4_unicode_ci,
  `detail_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vaccancies`
--

INSERT INTO `vaccancies` (`id`, `company_name`, `job_name`, `position`, `salary`, `welfare`, `description`, `thumnails`, `created_at`, `updated_at`, `requirements`, `detail_link`) VALUES
(1, 'Allexceed Việt Nam', 'Senior Software Developer (Java)', 'Senior Software Developer (Java)', '$2000 - $3000', 'Cơ hội làm việc onsite hoặc định cư tại Nhật Bản Thưởng cao theo năng lực (2 lần/năm) Chế độ BHXH, BHYT đầy đủ theo luật, và được đóng full lương', '<ul><li>Cung cấp giải pháp, phát triển phần mềm cho end-user&nbsp;</li><li>Phát triển các sản phẩm phần mềm theo yêu cầu của khách hàng (offshore)&nbsp;</li><li>Phát triển nhiều loại hình phần mềm: Windows Application (Java/.NET),</li><li>Web Application (Java/.NET/PHP),</li><li>Smartphone Application (iOS/Android)</li></ul>', 'https://drive.google.com/thumbnail?id=1SBHf8xmscsGulmgs_iUorDpe42CXpCah', '2024-04-25 12:36:11', '2024-04-26 07:19:36', '<ul><li>Tốt nghiệp Đại học chuyên ngành Công nghệ thông tin.</li><li>Có từ 5 năm kinh nghiệm phát triển phần mềm trở lên.&nbsp;</li><li>Có ít nhất 3 năm kinh nghiệm phát triển hệ thống Web với ngôn ngữ Java, JSF, J2EE, JPA, Hibernate.</li><li>Có hiểu biết hoặc có kinh nghiệm thực tế về PrimeFaces là một lợi thế.&nbsp;</li><li>Có khả năng lý giải nghiệp vụ, quy cách hệ thống, phân tích source code.&nbsp;</li><li>Có khả năng dựa trên thiết kế cơ bản để tạo thiết kế chi tiết ở mức độ sử dụng được cho thao tác lập trình.&nbsp;</li><li>Có kinh ngiệm phát triển hệ thống nghiệp vụ cho thị trường Nhật là một điểm cộng.&nbsp;</li><li>Có khả năng đọc hiểu tiếng Anh chuyên ngành, biết thêm tiếng Nhật là một điểm cộng.</li><li>Cẩn thận, năng động, có khả năng làm việc dưới áp lực cao.&nbsp;</li><li>Có trách nhiệm, nhiệt huyết với công việc.</li><li>Có khả năng nghiên cứu, nắm bắt nhanh chóng các công nghệ, kỹ thuật mới.&nbsp;</li><li>Kỹ năng làm việc độc lập/làm việc nhóm tốt (có thể chủ động thảo luận, xác nhận, chia sẻ các vấn đề trong công việc)&nbsp;</li></ul><p>&nbsp;</p><p>Công ty đánh giá cao các ứng viên có ý muốn gắn bó lâu dài với công ty, muốn phát triển nghề nghiệp bền vững Tùy theo yêu cầu công việc mà trong tương lai, cũng có khả năng sẽ làm việc với các ngôn ngữ lập trình khác, chẳng hạn: C#/ VB.NET PHP</p>', 'https://topdev.vn/viec-lam/senior-software-developer-java-allexceed-viet-nam-2032781'),
(2, 'TopDev\'s Client', 'Mobile Developer', 'All Levels', 'thõa thuận', 'Build solid foundation for IT career path through an accelerate 12-month development Acquire strong technical and soft skills Work in cutting edge technology projects Buddy with friendly colleagues and learn from senior experts Develop a strong sense of business insight', 'Tham gia phát triển ứng dụng.\r\nĐọc/viết tài liệu kỹ thuật.\r\nNghiên cứu nắm bắt công nghệ mới thích hợp để giải quyết vấn đề.', 'https://drive.google.com/thumbnail?id=1b6LwN0Kxsd0xfWpdMsOvZLHysGOluXMk', '2024-04-25 15:23:51', '2024-04-25 15:23:51', 'Thành thạo ngôn ngữ lập trình JAVA hoặc SWIFT.\r\nCó kiến thức về OOP và Design Patterns.\r\nHiểu về kiến trúc: MVVM, MVC, MVP…\r\nBiết sử dụng ít nhất một trong số các công cụ quản lý source code GIT, Bitbucket.\r\nCó kinh nghiệm làm việc với JIRA hoặc các công cụ quản lý task.\r\nCó sản phẩm được public trên Store là lợi thế.', 'https://topdev.vn/viec-lam/mobile-developer-ios-android-all-levels-topdev-s-client-2033159'),
(3, 'Red Star Technology', 'Backend/Frontend Developer (PHP, Python, HTML/CSS, Vuejs)', 'all levels', 'thõa thuận', 'Thưởng: Thưởng cuối năm, thưởng các dịp lễ, tết Làm việc trong môi trường quốc tế, năng động, chuyên nghiệp, có nhiều cơ hội để phát triển nghề nghiệp. Thiết bị làm việc công ty cấp Laptop và Điện thoại Mức lương và thưởng cạnh tranh Ưu tiên nhân sự đi công tác ngắn/dài hạn trong & ngoài nước thường xuyên. Môi trường CHUYÊN NGHIỆP', '<ul><li>Develop, and maintain custom PHP (WordPress, Laravel) plugins that meet the specific needs of our platform.&nbsp;</li><li>Develop and modify PHP (WordPress, Laravel) layouts and themes for optimal user experience and responsive design.</li><li>Knowing how to develop and maintain backend applications in Python is an advantage Troubleshoot and resolve issues related to WordPress websites, plugins, and themes.</li></ul>', 'https://drive.google.com/thumbnail?id=1yH1GRHoIzK7fvxD2SAU-DLy3XI2bRaD9', '2024-04-26 02:01:43', '2024-04-26 07:21:09', '<ul><li>Bachelor\'s degree in Computer Science, Information Technology, or a related field.&nbsp;</li><li>Proven experience in PHP &amp; Python development.&nbsp;</li><li>Strong understanding of responsive design and front-end technologies like HTML, CSS, JavaScript, and jQuery.</li><li>Strong knowledge of Python and experience in backend development. Experience with integrating third-party APIs, especially sports-related APIs. Familiarity with WordPress standards and best practices.&nbsp;</li><li>Have knowledge of PHP web frameworks {{such as Laravel, Yii, etc depending on your technology stack}}&nbsp;</li><li>Understanding the fully synchronous behavior of PHP or Python Understanding of MVC design patterns Basic understanding of front-end technologies, such as JavaScript, HTML5, and CSS3</li><li>Knowledge of object oriented PHP programming Strong knowledge of the common PHP or web server exploits and their solutions&nbsp;</li><li>Integration of multiple data sources and databases into one system&nbsp;</li><li>Familiarity with SQL/NoSQL databases and their declarative query languages</li><li>Proficient understanding of code versioning tools, such as Git.</li></ul>', 'https://topdev.vn/viec-lam/backend-frontend-developer-php-python-html-css-vuejs-red-star-technology-2033078'),
(4, 'Ngân hàng TMCP Việt Nam Thịnh Vượng (VPBank)', 'VPBank Data Talent', 'VPBank Data Talent', '20M - 45M (VND)', 'hu nhập hấp dẫn, lương thưởng cạnh tranh theo năng lực Thưởng các Ngày lễ, Tết (theo chính sách ngân hàng từng thời kỳ) Được vay ưu đãi theo chính sách ngân hàng từng thời kỳ Chế độ ngày phép hấp dẫn theo cấp bậc công việc, được hưởng chế độ du lịch hè Bảo hiểm bắt buộc theo luật lao động + Bảo hiểm VPBank care cho CBNV tùy theo cấp bậc và thời gian công tác Được tham gia các khóa đào tạo tùy thuộc vào Khung đào tạo cho từng vị trí Thời gian làm việc: từ thứ 2 – thứ 6 &amp; sáng thứ 7 Môi trường làm việc năng động, thân thiện, có nhiều cơ hội học đào tạo, học hỏi và phát triển; được tham gia nhiều hoạt động văn hóa thú vị (cuộc thi về thể thao, tài năng, hoạt động teambuiding...)', 'Xây dựng và vận hành ổn định nền tảng dữ liệu\r\nỨng dụng kết quả phân tích dữ liệu vào hoạt động kinh doanh và tối ưu vận hành\r\nTăng cường ứng dụng khoa học dữ liệu (AI) và công nghệ học máy (ML)\r\nThúc đẩy quá trình chuyển đổi dữ liệu trên nền tảng điện toán đám mây\r\nTriển khai chiến lược, sáng kiến dữ liệu, kiến trúc dữ liệu', 'https://drive.google.com/thumbnail?id=131GPKWfInpJY1T16V_ff3Jo9dGKsBRbq', '2024-04-26 02:04:03', '2024-04-26 02:04:03', 'Tốt nghiệp Đại học hoặc cao hơn liên quan đến 1 trong các chuyên nghành toán, thống kê, kinh tế, ngân hàng, tài chính, khoa học máy tính, kỹ thuật phần mềm\r\nTối thiểu 2-3 năm kinh nghiệm làm việc trong lĩnh vực dữ liên quan đến 1 trong các chuyên môn phân tích dữ liệu, mô hình học máy, quản trị dữ liệu, quản lý dữ liệu, kiến trúc dữ liệu, vận hành nền tảng dữ liệu,….\r\nƯu tiên Có kiến thức về dữ liệu, nghiệp vụ tài chính ngân hàng\r\nThành thạo SQL, Excel và ngôn ngữ phân tích dữ liệu R hoặc Python\r\nƯu tiên ứng viên có kinh nghiệm với AWS cloud\r\nSẵn lòng học hỏi và tham gia vào các dự án công nghệ của VPBank…', 'https://topdev.vn/viec-lam/vpbank-data-talent-ngan-hang-tmcp-viet-nam-thinh-vuong-vpbank-2033022'),
(5, 'Sungrove Tech Vietnam', 'SWAT Backend Engineer (Up to 4000 USD)', 'senior , tech - lead', 'up to 4000$', '13th month bonus + KPI bonus Performance Review 01 year/month Various social insurances', 'Identify requirements, design architecture, develop, review code, test, launch new projects from the zero \r\nProper database design takes into account functional and non-functional requirements\r\nWrite clean and maintainable code\r\nMonitor product performance and handling system errors\r\nTraining, support and motivate team members.\r\nResearch and develop new technology related to project', 'https://drive.google.com/thumbnail?id=1Wd0AtQyqN2OU3vkbDpy2Zs3tix9Jp5to', '2024-04-26 02:06:07', '2024-04-26 02:06:12', 'Preferably a bachelor’s degree in IT, Computer Science or related fields\r\nMinimum 3 years of experience in cross-platform development\r\n02 years of experience in Rails/ 03 years of experience in Python\r\nExperience as throughout the full project development lifecycle from the zero\r\nExperience using AWS (EC2, Lambda, APIGateWay, AWS Cognito, AWS cloudfront, S3, Amplify, ECS, etc.)\r\nProject management skills\r\nWilling to learn new technology / develop languages', 'https://topdev.vn/viec-lam/swat-backend-engineer-up-to-4000-usd-sungrove-tech-vietnam-2033141');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `attach_files`
--
ALTER TABLE `attach_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attach_files_document_id_foreign` (`document_id`);

--
-- Chỉ mục cho bảng `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documents_subject_id_foreign` (`subject_id`);

--
-- Chỉ mục cho bảng `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `downloads_user_id_foreign` (`user_id`),
  ADD KEY `downloads_attach_file_id_foreign` (`attach_file_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `vaccancies`
--
ALTER TABLE `vaccancies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `attach_files`
--
ALTER TABLE `attach_files`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `vaccancies`
--
ALTER TABLE `vaccancies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `attach_files`
--
ALTER TABLE `attach_files`
  ADD CONSTRAINT `attach_files_document_id_foreign` FOREIGN KEY (`document_id`) REFERENCES `documents` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `downloads`
--
ALTER TABLE `downloads`
  ADD CONSTRAINT `downloads_attach_file_id_foreign` FOREIGN KEY (`attach_file_id`) REFERENCES `attach_files` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `downloads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
