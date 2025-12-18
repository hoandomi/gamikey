-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 04, 2024 at 04:24 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gamikey`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `image`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Adobe', 'adobe', 'uploads/brands/media_65fb0ce550284.png', 'Adobe là thương hiệu tiên phong trong phần mềm sáng tạo, cung cấp các công cụ mạnh mẽ cho mọi nhu cầu thiết kế, chỉnh sửa ảnh, video, và phát triển web. Nổi tiếng với các sản phẩm như Photoshop, Illustrator, Premiere Pro, và Acrobat, Adobe giúp người dùng từ cá nhân đến doanh nghiệp khai phá tiềm năng sáng tạo và nâng cao hiệu quả công việc.', 1, '2024-03-20 09:20:53', '2024-03-20 09:26:50'),
(2, 'Google', 'google', 'uploads/brands/media_65fb116889948.png', 'Google là tập đoàn công nghệ đa quốc gia hàng đầu thế giới, được biết đến với nhiều sản phẩm và dịch vụ mang tính đột phá như:Công cụ tìm kiếm Google,Hệ điều hành Android,Bộ ứng dụng văn phòng Google Workspace,Youtobe,Dịch vụ quảng cáo Google Ads,Trình duyệt web ChromeGoogle còn được đánh giá cao bởi văn hóa doanh nghiệp năng động, sáng tạo và môi trường làm việc chuyên nghiệp, thu hút nhân tài từ khắp nơi trên thế giới.Với tầm nhìn và sứ mệnh to lớn, Google đã và đang khẳng định vị thế là một trong những tập đoàn công nghệ quyền lực và có ảnh hưởng nhất thế giới.', 1, '2024-03-20 09:29:54', '2024-03-20 09:40:08'),
(3, 'Microsoft', 'microsoft', 'uploads/brands/media_65fb119e107e4.png', 'Microsoft là tập đoàn công nghệ đa quốc gia hàng đầu thế giới, được thành lập bởi Bill Gates và Paul Allen vào năm 1975. Nổi tiếng với các sản phẩm phần mềm và phần cứng như:Hệ điều hành Windows.Bộ ứng dụng Microsoft Office,Trình duyệt web Microsoft Edge,Máy chơi game Xbox,Dịch vụ điện toán đám mây Microsoft Azure,...', 1, '2024-03-20 09:33:33', '2024-03-20 09:41:02'),
(4, 'Netflix', 'netflix', 'uploads/brands/media_65fb121a185d6.png', 'Netflix là dịch vụ phát trực tuyến video hàng đầu thế giới với hơn 200 triệu người dùng trả phí tại hơn 190 quốc gia. Nổi tiếng với kho tàng nội dung phong phú và đa dạng.Netflix sở hữu nhiều bộ phim bom tấn Hollywood, phim độc quyền, phim truyền hình, phim tài liệu, v.v.Series: Netflix sản xuất và phát hành nhiều series gốc thành công như Stranger Things, The Crown, Umbrella Academy, Bridgerton, v.v..Nội dung dành cho trẻ em: Netflix cung cấp nhiều chương trình giải trí và giáo dục phù hợp cho trẻ em ở mọi lứa tuổi.Nội dung độc quyền: Netflix đầu tư sản xuất nhiều nội dung độc đáo, thu hút người dùng và tạo nên sự khác biệt so với các dịch vụ khác.Chất lượng cao: Netflix cung cấp nội dung với chất lượng hình ảnh và âm thanh tuyệt vời, mang đến trải nghiệm giải trí cao cấp cho người dùng.Tính cá nhân hóa: Netflix đề xuất nội dung phù hợp với sở thích của từng người dùng dựa trên lịch sử xem phim và tìm kiếm.Tải xuống để xem ngoại tuyến: Netflix cho phép người dùng tải xuống nội dung để xem khi không có kết nối internet.Giá cả hợp lý: Netflix cung cấp nhiều gói dịch vụ với mức giá phù hợp cho mọi đối tượng người dùng.', 1, '2024-03-20 09:43:06', '2024-03-20 09:43:06'),
(5, 'Spotify', 'spotify', 'uploads/brands/media_65fb146259ea0.svg', 'Spotify là dịch vụ phát trực tuyến âm nhạc hàng đầu thế giới với hơn 400 triệu người dùng hoạt động hàng tháng, trong đó hơn 180 triệu người là người dùng trả phí. Mô hình kinh doanh sáng tạo.', 1, '2024-03-20 09:44:46', '2024-03-20 09:52:50'),
(6, 'Anti Virus', 'anti-virus', 'uploads/brands/media_65fb14552fd06.svg', 'Dịch vụ antivirus là phần mềm được thiết kế để bảo vệ máy tính khỏi virus, phần mềm độc hại và các mối đe dọa an ninh mạng khác. Dưới đây là mô tả dịch vụ antivirus của một số thương hiệu phổ biến:Kaspersky,Bitdefender,Avast,Norton,ESET.', 1, '2024-03-20 09:50:39', '2024-03-20 09:52:37'),
(7, 'VPNs', 'vpns', 'uploads/brands/media_65fb1445157c5.svg', NULL, 1, '2024-03-20 09:52:21', '2024-03-20 09:52:21'),
(8, 'Apple', 'apple', 'uploads/brands/media_65fb14c4b3d77.webp', 'Apple là thương hiệu công nghệ cao cấp nổi tiếng với thiết kế sang trọng, hiệu năng mạnh mẽ và hệ sinh thái độc đáo. Các sản phẩm nổi bật của Apple bao gồm iPhone, iPad, Macbook, Apple Watch, AirPods. Apple luôn tiên phong trong đổi mới, mang đến những trải nghiệm đột phá cho người dùng. Hệ sinh thái Apple được xây dựng chặt chẽ, giúp các sản phẩm kết nối seamlessly với nhau, tạo nên sự tiện lợi cho người sử dụng. Apple cũng chú trọng vào bảo mật và quyền riêng tư, mang đến cho người dùng sự an tâm khi sử dụng sản phẩm.Với sự sáng tạo, đẳng cấp và trải nghiệm hoàn hảo, Apple đã trở thành thương hiệu được yêu thích và tin dùng bởi hàng triệu người trên thế giới.', 1, '2024-03-20 09:54:28', '2024-03-20 09:54:28'),
(9, 'Games', 'games', 'uploads/brands/media_65fb14efc0517.png', 'Ngành công nghiệp game là một lĩnh vực giải trí sôi động và phát triển mạnh mẽ với tốc độ chóng mặt. Ngành này bao gồm vô số thể loại game đa dạng từ game di động, game PC, game console cho đến game VR/AR, đáp ứng mọi sở thích và nhu cầu của người chơi.Sự phát triển của công nghệ, sự sáng tạo của các nhà phát hành game và sự phổ biến của internet đã góp phần đưa ngành game trở thành một ngành công nghiệp tỷ đô, thu hút hàng triệu người chơi trên toàn cầu. Ngành game không chỉ mang đến giá trị giải trí mà còn là một lĩnh vực thể thao điện tử đầy tiềm năng, thu hút lượng lớn người theo dõi và tham gia thi đấu.\r\nVới sự đầu tư mạnh mẽ vào công nghệ, sự ra đời của các nền tảng chơi game mới và sự bùng nổ của các tựa game online, ngành game hứa hẹn sẽ tiếp tục phát triển mạnh mẽ trong tương lai, mang đến những trải nghiệm giải trí tuyệt vời hơn cho người chơi.', 1, '2024-03-20 09:55:11', '2024-03-20 09:55:11');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Giải Trí', 'giai-tri', NULL, 0, 'giai-tri', '', '2024-03-20 09:57:32', '2024-03-29 07:07:22'),
(2, 'Học Tập', 'hoc-tap', NULL, 1, 'hoc-tap', '', '2024-03-20 09:57:50', '2024-03-20 09:57:50'),
(3, 'Key Game', 'key-game', NULL, 1, 'key-game', '', '2024-03-20 10:08:33', '2024-03-20 10:08:33');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `max_use` int NOT NULL,
  `discount_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` double NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `total_used` int NOT NULL DEFAULT '0',
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `code`, `quantity`, `max_use`, `discount_type`, `discount`, `status`, `total_used`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 'Chào Mừng Khách Hàng Mới', 'NEWUSERS50', 90000, 1, 'percent', 50, 1, 4, '2024-03-29 12:00:00', '2024-04-30 12:00:00', '2024-03-29 05:07:12', '2024-04-02 06:57:00'),
(3, 'Chào Mừng Khách Hàng Cũ', 'OLDUSERS30K', 99999999, 1, 'price', 30000, 1, 0, '2024-03-13 12:00:00', '2024-04-30 12:00:00', '2024-03-29 07:38:10', '2024-03-29 07:57:12');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(22, '2024_03_19_143350_create_product_types_table', 4),
(32, '2014_10_12_000000_create_users_table', 5),
(33, '2014_10_12_100000_create_password_reset_tokens_table', 5),
(34, '2019_08_19_000000_create_failed_jobs_table', 5),
(35, '2019_12_14_000001_create_personal_access_tokens_table', 5),
(36, '2024_03_17_160010_create_categories', 5),
(37, '2024_03_17_160015_create_sub_categories_table', 5),
(38, '2024_03_17_172107_create_brands_table', 5),
(39, '2024_03_18_120002_create_tags_table', 5),
(40, '2024_03_18_122728_create_products_table', 5),
(41, '2024_03_24_024254_create_product_variants_table', 6),
(43, '2024_03_24_083626_create_product_variant_items_table', 7),
(48, '2014_10_12_100000_create_password_resets_table', 8),
(49, '2024_03_26_135622_create_product_account_stores_table', 8),
(50, '2024_03_29_113251_create_coupons_table', 8),
(52, '2024_03_31_021527_create_paypal_settings_table', 9),
(56, '2024_03_31_135510_create_orders_table', 10),
(57, '2024_03_31_140244_create_order_products_table', 10),
(58, '2024_03_31_140743_create_transactions_table', 10),
(59, '2024_04_01_023315_add_used_by_email_column_to_product_account_stores', 11),
(60, '2024_04_01_133916_add_order_id_column_to_product_account_stores', 12),
(61, '2024_04_02_112042_add_soft_delete_column_to_users', 13),
(62, '2024_04_02_151130_create_product_comments_table', 14),
(63, '2024_04_02_155911_create_product_reply_comments_table', 15),
(64, '2024_04_03_143417_create_v_n_pay_settings_table', 16),
(65, '2024_04_03_144421_create_vnpay_settings_table', 17),
(67, '2024_04_04_031539_create_momo_settings_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `momo_settings`
--

CREATE TABLE `momo_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `mode` tinyint(1) NOT NULL DEFAULT '0',
  `partner_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `momo_settings`
--

INSERT INTO `momo_settings` (`id`, `status`, `mode`, `partner_code`, `access_key`, `secret_key`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'MOMOBKUN20180529', 'klm05TvNBzhg7h7j', 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa', '2024-04-03 20:26:56', '2024-04-03 20:28:24');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `invoice_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int DEFAULT NULL,
  `sub_total` double NOT NULL,
  `discount_amount` double NOT NULL DEFAULT '0',
  `total_amount` double NOT NULL,
  `currency_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` int NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon` text COLLATE utf8mb4_unicode_ci,
  `order_status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `invoice_id`, `customer_name`, `customer_email`, `customer_phone`, `user_id`, `sub_total`, `discount_amount`, `total_amount`, `currency_name`, `product_quantity`, `payment_method`, `payment_status`, `coupon`, `order_status`, `created_at`, `updated_at`) VALUES
(1, '85536171198228772077', 'Admin', 'admin@gmail.com', '1234567890', 1, 45544000, 22772000, 22772000, 'USD', 10, 'paypal', '1', '{\"code\":\"NEWUSERS50\",\"discount\":50,\"discount_type\":\"percent\"}', 1, '2024-04-01 07:38:07', '2024-04-01 08:46:09'),
(3, '3231417121532061158', 'ChuBe04', 'vohongson8520@gmail.com', '0766116989', 4, 1200000, 0, 1200000, 'USD', 1, 'paypal', '1', 'null', 1, '2024-04-03 07:06:46', '2024-04-03 07:06:46'),
(4, '6480171215331671084', 'ChuBe04', 'vohongson8520@gmail.com', '0766116989', 4, 1200000, 0, 1200000, 'USD', 1, 'paypal', '1', 'null', 1, '2024-04-03 07:08:36', '2024-04-03 07:08:36'),
(5, '48570171215336625606', 'ChuBe04', 'vohongson8520@gmail.com', '0766116989', 4, 1200000, 0, 1200000, 'USD', 1, 'paypal', '1', 'null', 1, '2024-04-03 07:09:26', '2024-04-03 07:09:26'),
(6, '75758171215361413461', 'ChuBe04', 'vohongson8520@gmail.com', '0766116989', 4, 1200000, 0, 1200000, 'USD', 1, 'paypal', '1', 'null', 1, '2024-04-03 07:13:34', '2024-04-03 07:13:34'),
(7, '15086171215874227428', 'ChuBe04', 'vohongson8520@gmail.com', '0766116989', 4, 2400000, 0, 2400000, 'USD', 1, 'vnpay', '1', 'null', 1, '2024-04-03 08:39:02', '2024-04-03 08:39:02'),
(8, '1660717122023903478', 'Vo Hong Son', 'vohongson8520@gmail.com', '0766116989', NULL, 1200000, 0, 1200000, 'USD', 1, 'momo', '1', 'null', 1, '2024-04-03 20:46:30', '2024-04-03 20:46:30');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `product_name`, `product_price`, `quantity`, `created_at`, `updated_at`) VALUES
(15, 1, 5, 'Red Dead Redemption 2 PC Rockstar Key GLOBAL', 550000, 10, '2024-04-01 07:38:07', '2024-04-01 07:38:07'),
(16, 1, 23, 'Nâng cấp Elsa Premium chính chủ 3 tháng', 390000, 7, '2024-04-01 07:38:07', '2024-04-01 07:38:07'),
(17, 1, 22, 'Nâng cấp Elsa Premium chính chủ 6 tháng', 590000, 7, '2024-04-01 07:38:07', '2024-04-01 07:38:07'),
(18, 1, 21, 'Nâng cấp Elsa Premium chính chủ 9 tháng', 899000, 6, '2024-04-01 07:38:07', '2024-04-01 07:38:07'),
(19, 1, 8, 'Tài khoản Netflix Premium Chính Hãng Việt Nam', 239000, 8, '2024-04-01 07:38:07', '2024-04-01 07:38:07'),
(20, 1, 1, 'Tài khoản Adobe All App 80GB Cloud | Bản Quyền – An Toàn', 1200000, 7, '2024-04-01 07:38:07', '2024-04-01 07:38:07'),
(21, 1, 17, 'Monster Hunter World: Iceborne (Master Edition) Steam Key GLOBAL', 990000, 10, '2024-04-01 07:38:07', '2024-04-01 07:38:07'),
(22, 1, 6, 'Grand Theft Auto V GTA: Criminal Enterprise Starter Pack (DLC) XBOX LIVE Key GLOBAL', 495000, 7, '2024-04-01 07:38:07', '2024-04-01 07:38:07'),
(23, 1, 11, 'Tài khoản Netflix Premium', 320000, 5, '2024-04-01 07:38:07', '2024-04-01 07:38:07'),
(24, 1, 16, 'Tài khoản Codecademy Pro 12 tháng – Học lập trình trực tuyến', 359000, 7, '2024-04-01 07:38:07', '2024-04-01 07:38:07'),
(37, 3, 1, 'Tài khoản Adobe All App 80GB Cloud | Bản Quyền – An Toàn', 1200000, 1, '2024-04-03 07:06:46', '2024-04-03 07:06:46'),
(38, 4, 1, 'Tài khoản Adobe All App 80GB Cloud | Bản Quyền – An Toàn', 1200000, 1, '2024-04-03 07:08:36', '2024-04-03 07:08:36'),
(39, 5, 1, 'Tài khoản Adobe All App 80GB Cloud | Bản Quyền – An Toàn', 1200000, 1, '2024-04-03 07:09:26', '2024-04-03 07:09:26'),
(40, 6, 1, 'Tài khoản Adobe All App 80GB Cloud | Bản Quyền – An Toàn', 1200000, 1, '2024-04-03 07:13:34', '2024-04-03 07:13:34'),
(41, 7, 1, 'Tài khoản Adobe All App 80GB Cloud | Bản Quyền – An Toàn', 1200000, 2, '2024-04-03 08:39:02', '2024-04-03 08:39:02'),
(42, 8, 1, 'Tài khoản Adobe All App 80GB Cloud | Bản Quyền – An Toàn', 1200000, 1, '2024-04-03 20:46:30', '2024-04-03 20:46:30');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paypal_settings`
--

CREATE TABLE `paypal_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `mode` tinyint(1) NOT NULL DEFAULT '0',
  `currency_rate` int NOT NULL DEFAULT '24000',
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_secret` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paypal_settings`
--

INSERT INTO `paypal_settings` (`id`, `status`, `mode`, `currency_rate`, `client_id`, `client_secret`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 25000, 'AZGAoKmLsbIWuCIu5u2f9RDBd12us2rfRz8TFp7S3_6xwXvGNS6terG7KaibqDRu70CpKMBttg1UPW_s', 'EJzbSlYZpQLlsJeMRBuXzOQIhKHfvrvI4ksX7ftfIyOgHkAcoWwsNl-py6i9kw4JpRv9vRjAfqTnctTC', '2024-03-30 20:22:38', '2024-04-03 20:26:10');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `discount_price` int DEFAULT '0',
  `discount_start_date` timestamp NULL DEFAULT NULL,
  `discount_end_date` timestamp NULL DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Key' COMMENT 'key, Tài Khoản, Nâng Cấp',
  `slug_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `search` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `purchased` int NOT NULL DEFAULT '0',
  `category_id` int NOT NULL,
  `sub_category_id` int DEFAULT NULL,
  `brand_id` int DEFAULT NULL,
  `tags_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `short_description`, `description`, `image`, `price`, `discount_price`, `discount_start_date`, `discount_end_date`, `status`, `type`, `slug_type`, `quantity`, `search`, `purchased`, `category_id`, `sub_category_id`, `brand_id`, `tags_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Tài khoản Adobe All App 80GB Cloud | Bản Quyền – An Toàn', 'tai-khoan-adobe-all-app-80gb-cloud-ban-quyen-an-toan', 'Sau khi đặt hàng bạn sẽ nhận được thông tin đăng nhập thông qua email bao gồm ID và Password\r\n\r\nGói  bao gồm:\r\n\r\nAll App Adobe\r\n80GB Cloud\r\nDo Adobe đã dừng dịch vụ ở Nga và Belarus vì vậy bạn không được login ip Nga hoặc Belarus\r\nKhông thêm SDT và bảo mật 2 lớp vào account\r\n\r\nSau khi bạn truy cập tài khoản lúc này bạn sẽ nhận được thông báo “Move data to new profile”, điều này có nghĩa là bạn sẽ chuyển toàn bộ các thiết kế, file lưu trữ trên Cloud Adobe cá nhân trước đó của bạn sang Profile mới của Gamikey cung cấp để sử dụng, nếu bạn không chọn move data thì data của bạn vẫn không mất mà nó sẽ nằm trên Profile ban đầu”, (Lưu ý: trong trường hợp bạn đang dùng Behance và nếu bạn muốn tiếp tục dùng thì không nên move data vì Behance sẽ không nằm trên Profile Business)\r\n\r\nTới bước chọn Profie bạn vui lòng chọn Profile mới không phải là Profie Personal của bạn để truy cập vào gói Adobe All App – Pro Edition\r\n\r\nThông tin & Tính Năng:\r\n\r\n– Sử dụng tối đa đồng thời trên 2 PC/MAC\r\n\r\n– Khả dụng trên cả IOS, Android\r\n\r\n– Tài khoản có hạn sử dụng 12 tháng kể từ ngày kích hoạt (có thể gia hạn sau khi hết hạn)\r\n\r\n– Có sẵn 80GB Cloud đi kèm\r\n\r\n– Dữ liệu và thông tin của bạn hoàn toàn riêng tư & an toàn.\r\n\r\n– Khi mua bản quyền Adobe chính hãng gói Creative Cloud All Apps, bạn có thể truy cập toàn bộ hệ sinh thái Adobe bao gồm tất cả các ứng dụng của Adobe như:\r\n\r\nAdobe Photoshop, Adobe Illustrator, Adobe Premiere Pro, Adobe After Effects, Adobe Lightroom, Adobe Dreamweaver, Adobe Audition, Adobe Indesign…\r\n\r\nLưu ý:\r\n\r\nGói đăng ký không bao gồm Adobe Subtance\r\n\r\nGamikey không bảo hành dữ liệu trên Cloud, bạn nên có bản backup vào máy tính cho dữ liệu của bạn.', '<p><strong style=\"color: rgb(51, 51, 51);\"><em>Adobe All Apps (Adobe CC)</em></strong><em style=\"color: rgb(51, 51, 51);\">&nbsp;là tập hợp đầy đủ các phiên bản phần mềm hiện có của Adobe dành cho chỉnh sửa ảnh, thiết kế đồ họa, web, video, ứng dụng,… cộng với các yếu tố tích hợp như phông chữ, bảng màu. Công nghệ đám mây sẽ cung cấp giải pháp sử dụng sản phẩm Adobe một cách tiện lợi nhất.&nbsp;</em><a href=\"https://gamikey.com/tai-khoan-adobe-all-apps-creative-cloud-12-thang/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(225, 89, 39); background-color: transparent;\"><strong><em>Mua Adobe bản quyền</em></strong></a><em style=\"color: rgb(51, 51, 51);\">&nbsp;được gợi ý cho bạn như một nơi thỏa sức sáng tạo mọi lúc mọi nơi. Cùng tìm hiểu về tài khoản Adobe Creative Cloud All Apps là gì, so sánh giữa bản crack và tài khoản bản quyền để bạn đưa ra lựa chọn của mình nhé!</em></p><h2><strong>Adobe Creative Cloud All Apps là gì?</strong></h2><p>Adobe là một tập đoàn phần mềm máy tính có nguồn gốc từ Mỹ, được ra đời vào năm 1982. Trụ sở của Adobe đặt tại San Jose, California, Hoa Kỳ. Adobe nổi tiếng với các sản phẩm phần mềm chuyên về đa phương tiện và sự sáng tạo. Các sản phẩm phần mềm nổi bật của Adobe bao gồm Adobe Photoshop để chỉnh sửa ảnh, Adobe Illustrator (AI) để thiết kế đồ họa vector và Arobat để chỉnh sửa PDF.</p><p>Adobe Creative Cloud All Apps là một gói dịch vụ tổng quát cao cấp nhất của Adobe. Khi&nbsp;<strong>mua bản quyền Adobe&nbsp;</strong>gói Creative Cloud All Apps, bạn có thể truy cập toàn bộ hệ sinh thái Adobe bao gồm tất cả các ứng dụng của Adobe… Các công việc mang tính chất sáng tạo của bạn sẽ được giải quyết trọn vẹn trong cùng một hệ thống.</p><ul><li>Adobe Photoshop CC: Phần mềm chỉnh sửa ảnh nổi tiếng, không có phần mềm nào có thể thay thế.</li><li>Adobe Illustrator CC: Phần mềm giúp dàn trang, brochure, thiết kế in ấn, logo,…nổi tiếng.</li><li>Adobe Indesign: Phần mềm dàn trang tạp chí.</li><li>Adobe XD: Phần mềm giúp người dùng phát triển UX/ UI.</li><li>Adobe Dreamweaver: Phần mềm thiết kế và lập trình website chuyên nghiệp, hỗ trợ nhiều ngôn ngữ phổ biến như: HTML, CSS, JavaScript, C+…</li><li>Adobe Premiere Pro: Phần mềm dựng phim chuyên nghiệp.</li><li>Adobe After Effects: Phần mềm tạo kỹ xảo.</li><li>Adobe Audition: Phần mềm chỉnh sửa âm thanh.</li><li>Adobe Lightroom: Phần mềm edit ảnh được rất nhiều chị em ưa chuộng.</li><li>Adobe Acrobat Pro: phần mềm chuyên dụng cho file PDF bao gồm: chỉnh sửa, quản lý, chuyển đổi, in ấn và chữ ký điện tử.</li><li>Adobe Premiere Rush: là phiên bản rút gọn của Adobe Premiere Pro, giúp bạn chỉnh sửa video ngay cả trên điện thoại hay máy tính.</li><li>Adobe Animate: phần mềm làm hoạt hình 2D và đồ họa vector mạnh mẽ.</li><li>Adobe Dimension: Phần mềm thiết kế hình ảnh 2D, 3D chuyên nghiệp.</li><li>Adobe InCopy: là một phần mềm xử lý văn bản chuyên nghiệp tích hợp với Adobe InDesign.</li><li>Adobe Character Animator: phần mềm được sử dụng để tạo ra chuyển động cho các nhân vật hoạt hình 2D.</li><li>Adobe Capture: cho phép bạn tìm phông chữ, màu sắc, ảnh dạng vector chỉ bằng cách chụp ảnh.</li><li>Adobe Bridge: là nơi quản lý các nội dung sáng tạo chuyển nghiệp, cho phép bạn xem trước, sắp xếp, chỉnh sửa và xuất bản nhiều nội dung một cách nhanh chóng.</li><li>Adobe Media Encoder: là công cụ mã hóa, hỗ trợ đổi định dạng, render xuất các file hình ảnh, âm thanh của Adobe.</li><li>Adobe Aero: phần mềm thiết kế AR – thực tế ảo mạnh mẽ.</li><li>Adobe Scan: phần mềm scan PDF &amp; OCR 4+</li><li>Adobe Fill &amp; Sign: Giúp bạn dễ dàng điền, ký và gửi biểu mẫu PDF nhanh chóng từ điện thoai, hay máy tính.</li><li>Adobe Acrobat Reader: Phần mềm đọc file PDF mạnh mẽ nhất hiện nay.</li><li>Adobe Photoshop Express: là một trong những ứng dụng chỉnh sửa ảnh miễn phí tốt nhất trên Android và Ios.</li><li>Adobe Express: giúp bạn tạo ra các nội dung truyền thông nổi bật như tờ rơi, logo, biểu ngữ. Kèm theo hàng nghìn mẫu thiết sẵn rất đẹp.</li><li>Và còn nhiều ứng dụng khác, bạn có thể tham khảo trực tiếp tại website chính thức của Adobe theo link sau nhé:&nbsp;<a href=\"https://www.adobe.com/vn_vi/products/catalog.html\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(225, 89, 39); background-color: transparent;\">https://www.adobe.com/vn_vi/products/catalog.html</a></li></ul><blockquote><em>Điều đặc biệt của Adobe Creative Cloud All Apps đó là mọi thao tác hành động của bạn đều được quản lý trên điện toán đám mây. Qua đó bạn có thể giảm bớt gánh nặng cho bộ nhớ máy tính và làm việc ở mọi lúc mọi nơi chỉ cần có kết nối internet.</em></blockquote><p>Có trong tay toàn bộ các thiết bị đó có thể giúp bạn hoàn thành trọn vẹn công việc của mình mà không cần phải mở bất kỳ ứng dụng ngoài khác. Đây là một trong những yếu tố tiện lợi quan trọng. Đảm bảo được công việc gọn gàng và trở nên dễ dàng kiểm soát hơn bao giờ hết.</p><p>Từ thiết kế hình ảnh, video, audio,…tất cả đều được tích hợp sau một nút đăng nhập duy nhất. Đem đến sự tiện lợi vô cùng cho người sử dụng.</p><h2><strong>Một số lợi ích cực lớn khi sử dụng Adobe bản quyền</strong></h2><ul><li>Khi sử dụng Adobe bản quyền dữ liệu của bạn sẽ được bảo vệ tối ưu. Ngăn chặn sự xâm nhập của virus và các loại mã độc hại trong quá trình sử dụng.</li><li>Thường xuyên cập nhật các tính năng mới nhất và đáp ứng đầy đủ nhu cầu sử dụng<strong>&nbsp;mua Adobe bản quyền</strong>&nbsp;vĩnh viễn của bạn.</li><li>Nếu bạn mua giấy phép Adobe, bạn sẽ nhận được hỗ trợ kỹ thuật trong quá trình cài đặt phần mềm.</li><li>Không vi phạm bản quyền và tránh được nhiều rủi ro.</li><li>Tạo giá trị tiện ích lâu dài.</li><li>Tốt hơn hết, bạn nên mua Adobe bản quyền chính hãng, mua Adobe Perpetual License để giảm chi phí, rủi ro bảo mật và sử dụng rất hiệu quả.</li><li>Người dùng khi mua Adobe bản quyền sẽ được nâng cấp tài khoản. Tự do sử dụng các đặc quyền của Acc Vip Adobe.</li><li>Hạn chế được các tình trạng lỗi phổ thông. Được sử dụng nhiều hiệu ứng độc quyền tài khoản Vip.</li></ul><p><br></p>', 'uploads/products/media_65ff8c6897de2.png', 1200000, NULL, NULL, NULL, 1, 'Tài Khoản', 'tai-khoan', 24, '0', 3, 2, NULL, 1, '[\"1\",\"3\"]', NULL, '2024-03-23 19:14:00', '2024-04-03 20:46:30'),
(2, 'Nâng cấp bộ nhớ Google One chính chủ 12 tháng', 'nang-cap-bo-nho-google-one-chinh-chu-12-thang', 'Bạn sẽ được nâng cấp bộ nhớ trên tài khoản Google chính chủ\r\nDung lượng có thể sử dụng cho Drive, Photo, Email… và bất cứ dịch vụ lưu trữ nào của Google\r\nBạn sẽ nhận được xác nhận tham gia sau khi đặt hàng.\r\nThời gian giao hàng trong vòng 6 tiếng kể từ khi mua hàng.\r\nLưu ý:\r\n\r\nNếu bạn đang sử dụng dịch vụ Youtube Premium tại Gamikey hay bên khác theo hình thức tham gia Family thì sẽ không đăng ký email đó với dịch vụ này\r\nTài khoản của bạn phải là tài khoản Gooogle Việt Nam, chưa từng tham gia quá 2 Family trong vòng 12 tháng gần nhất\r\nNếu bạn đang ở nước ngoài bạn cần fake VPN về Việt Nam khi nhấn link tham gia.', '<h2><strong>Những điều các bạn cần biết về nâng cấp bộ nhớ Google One</strong></h2><p>Không biết mọi người đã từng thắc mắc về: “Google One là gì? Chúng có công dụng ra sao?” hay chưa? Đây là một dịch vụ do Google cung cấp với nhiều tiện ích. Vậy chúng ta cùng đi vào bài viết này để tìm hiểu về loại dịch vụ này. Bên cạnh đó học tập hướng dẫn nâng cấp bộ nhớ Google One nhé.</p><h2><strong>Giới thiệu về Google One</strong></h2><p>Trước khi tìm hiểu cách để có thể nâng cấp bộ nhớ Google One thì chúng ta cùng đón đọc một vài thông tin về loại dịch vụ này nhé.&nbsp;<a href=\"https://wikimaytinh.com/google-one-la-gi-tinh-nang-va-chi-phi.html\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(225, 89, 39); background-color: transparent;\">Bộ nhớ Google One</a>&nbsp;là một dạng dịch vụ của Google Drive vô cùng nổi tiếng và được nhiều người sử dụng. Loại hình dịch vụ này cung cấp bộ lưu trữ đám mây.</p><p><img src=\"https://gamikey.com/wp-content/uploads/2022/03/nang-cap-bo-nho-google-one-1-1.webp\" alt=\"Google One là một dịch vụ tăng dung lượng bộ nhớ\" height=\"800\" width=\"800\"></p><p>Tuy nhiên thì dịch vụ này sẽ thu phí hàng tháng của các bạn khi sử dụng. Như vậy giúp mọi người mở rộng được ứng dụng trên Gmail, Google Drive và Google Photos. Nếu Google Drive thì các bạn sẽ nhận được 15GB dung lượng miễn phí để sử dụng. Thì Google One sẽ mất một phí nhỏ nhưng được dùng với dung lượng lớn hơn rất nhiều.</p><blockquote><strong><em>Tìm hiểu về&nbsp;</em></strong><a href=\"https://gamikey.com/mua-youtube-premium/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(225, 89, 39); background-color: transparent;\"><strong><em>mua youtube premium giá rẻ</em></strong></a><strong><em>&nbsp;tại Gamikey</em></strong></blockquote><h2><strong>Giá gói nâng cấp bộ nhớ Google One</strong></h2><p>Nhà sản xuất đã cung cấp 5 gói dịch vụ khác nhau để cho anh em lựa chọn khi nâng cấp bộ nhớ Google One. Vì vậy mà anh em muốn đăng ký để nhận được nhiều hơn 15GB miễn phí thì cần chú ý các mức giá sau. Hãy lựa chọn gói sao cho đúng mục đích, yêu cầu sử dụng nhé.</p><h3><strong>Gói 45K/ tháng (450K/ năm) – 100GB</strong></h3><p>Để có thể nâng lên đến là 100GB thì mọi người sẽ phải trả một khoản là 45K mỗi tháng hoặc 450K cho 1 năm. Như vậy thì dung lượng để lưu trữ cho Gmail, Drive cùng Photos là vô cùng đáng kể. Thêm vào đó thì mọi người còn được chia sẻ bộ nhớ này cho 5 thành viên trong gia đình, bạn bè hoặc đồng nghiệp.</p><p>Ngoài ra, khi là thành viên của Google One thì anh em sẽ được hưởng nhiều quyền lợi vô cùng như giảm giá hoặc thậm chí miễn phí khi đặt phòng khách sạn hoặc Google Stadia. Bên cạnh đó, video, tin nhắn, ảnh, danh bạ sẽ được tự động sao lưu trên thiết bị.</p><h3><strong>Gói 69K/ tháng (690K/ năm) – 200GB</strong></h3><p>Một loại gói khác để nâng cấp bộ nhớ Google One đó chính là200GB với giá 69K/ tháng, 690K/ năm. Những lợi ích từ gói 100GB thì các bạn cũng vẫn được hưởng. Bên cạnh đó còn có thêm cả chương trình hoàn 3% khi mua sản phẩm ở cửa hàng Google Store.</p><p><img src=\"https://gamikey.com/wp-content/uploads/2022/03/nang-cap-bo-nho-google-one-2-1.webp\" alt=\"Có nhiều gói nâng cấp bộ nhớ Google One\" height=\"800\" width=\"800\"></p><h3><strong>Gói 225K/ tháng (2.250K/ năm) – 2TB</strong></h3><p>Bộ nhớ 2TB là dung lượng vô cùng khủng khiếp, chứa đựng được rất nhiều thứ. Quyền lợi của khách hàng không khác gì với 2 gói trên. Thêm vào đó thì mọi người còn được hoàn tiền lên đến 10% tại Google Store. Hơn nữa còn có được một tính năng vô cùng hoàn hảo là VPN – giúp tạo lớp bảo mật cho dữ liệu người dùng khi duyệt web vô cùng an toàn.</p><h3><strong>Các gói 10TB, 20TB, 30TB</strong></h3><p>Ngoài các gói trên thì khi nâng cấp bộ nhớ Google One còn có rất nhiều loại khác như 10TB, 20TB, 30TB… Tuy nhiên thì để có thể đăng ký gói này thì phải sử dụng một trong 3 nhóm bên trên trước. Hơn nữa thì bộ nhớ này khá rộng nên nhiều người ít lựa chọn sử dụng và 2TB là quá đủ.</p><p>Xem thêm các gói nâng cấp tài khoản chính chủ:&nbsp;<a href=\"https://gamikey.com/nang-cap-spotify-family-premium-chinh-chu/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(255, 0, 0); background-color: transparent;\">Spotify Family Premium</a>,&nbsp;<a href=\"https://gamikey.com/spotify-premium/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(255, 0, 0); background-color: transparent;\">Spotify Premium</a>,&nbsp;<a href=\"https://gamikey.com/tai-khoan-zoom-pro/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(255, 0, 0); background-color: transparent;\">Zoom Pro</a>,&nbsp;<a href=\"https://gamikey.com/tai-khoan-zoom-pro/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(225, 89, 39); background-color: transparent;\">Nâng cấp tài khoản Zoom Pro chính chủ</a></p><h2><strong>Các tính năng khi nâng cấp bộ nhớ Google One</strong></h2><p>Khi bạn nâng cấp bộ nhớ Google One, bạn sẽ được hưởng nhiều tính năng mới:</p><ul><li><strong>Bộ nhớ và sao lưu:</strong>&nbsp;Bạn có thể sao lưu các kỷ niệm và tệp của mình an toàn vào đám mây.</li><li><strong>An toàn trên mạng:&nbsp;</strong>Bạn sẽ được tăng cường an toàn khi dùng Internet thông qua VPN của Google One và tính năng báo cáo web tối.</li><li><strong>Lợi ích khác</strong>: Bạn có thể sử dụng các tính năng chỉnh sửa trên Google Photos, nhận phần thưởng từ Google Store và nhiều lợi ích khác.</li><li><strong>Không gian lưu trữ mở rộng:&nbsp;</strong>Bạn sẽ có thêm không gian để lưu trữ dữ liệu quan trọng trên Gmail, Photos và Drive. Các gói bộ nhớ có dung lượng từ 100GB trở lên.</li><li><strong>An toàn hơn với Google One:&nbsp;</strong>Bạn sẽ được tăng cường bảo vệ hoạt động trực tuyến và thông tin cá nhân của mình thông qua các tính năng bảo mật và bảo vệ quyền riêng tư nâng cao.</li><li><strong>Tận hưởng các lợi ích khác từ Google:</strong>&nbsp;Bạn sẽ được hoàn tiền đến 10% khi mua các thiết bị và phụ kiện từ Google Store. Ngoài ra, bạn còn nhận được các ưu đãi độc quyền và tính năng đặc biệt khác từ Google.</li><li><strong>Hỗ trợ từ chuyên gia Google:</strong>&nbsp;Các chuyên gia của Google sẵn sàng giải đáp thắc mắc của bạn về dung lượng lưu trữ, bảo mật trực tuyến và các sản phẩm hoặc dịch vụ của Google.</li><li><strong>Chọn gói phù hợp với bạn:&nbsp;</strong>Gói thấp nhất là 100 GB. Tất cả các tài khoản Google đều có 15 GB bộ nhớ miễn phí.</li></ul><p><img src=\"https://gamikey.com/wp-content/uploads/2022/03/nang-cap-bo-nho-google-one-chinh-chu-12-thang-1.png\" alt=\"Tính năng khi nâng cấp bộ nhớ Google One\" height=\"500\" width=\"800\"></p><h2><strong>Lợi ích của Google One</strong></h2><p>Bên cạnh việc mở rộng bộ nhớ đám mây với mức giá hợp lý hơn Google Drive, người dùng Google One còn nhận được nhiều quyền lợi đặc biệt khi sử dụng Google Play hoặc Google Store. Google đã tạo ra một số đặc quyền riêng cho người dùng Google One, bao gồm một đội ngũ chuyên gia tư vấn 24/7 để giải quyết các vấn đề phát sinh. Các chuyên gia của Google sẽ hỗ trợ bạn bằng nhiều ngôn ngữ khác nhau.</p><p>Google One cung cấp các gói dung lượng bao gồm: 100GB, 200GB, 2TB, 10TB, 20TB, 30TB. Bạn có thể lựa chọn tùy theo nhu cầu sử dụng và khả năng tài chính của mình. Đặc biệt, người mua Google One có thể chia sẻ dung lượng của mình cho tối đa năm người khác mà không phải trả thêm chi phí, đồng thời vẫn đảm bảo quyền riêng tư của mỗi người. Điều này cho phép bạn chia sẻ gói lưu trữ cho người khác và chia nhỏ chi phí để phù hợp hơn với kế hoạch sử dụng của bạn.</p><p><img src=\"https://gamikey.com/wp-content/uploads/2022/03/nang-cap-bo-nho-google-one-chinh-chu-12-thang-2.png\" alt=\"Một số lợi ích nổi bật của Google One\" height=\"500\" width=\"800\"></p><p><br></p>', 'uploads/products/media_65ff8ced53494.webp', 290000, NULL, NULL, NULL, 1, 'Nâng Cấp', 'nang-cap', 0, '0', 0, 2, NULL, 2, '[\"1\",\"3\"]', NULL, '2024-03-23 19:16:13', '2024-03-23 19:16:13'),
(3, 'Nâng cấp tài Khoản Canva Education', 'nang-cap-tai-khoan-canva-education', 'Sau khi đặt hàng và thanh toán thành công, hệ thống sẽ gửi link invite về email cho bạn\r\nHãy nhấp vào nút tham gia để kích hoạt Canva của bạn\r\nTài khoản của bạn được bảo hành trọn gói đăng ký\r\nCanva Edu là bản Canva dành cho giáo dục vì vậy sẽ có các tính năng thích hợp với việc giảng dạy', '<h2><strong style=\"color: rgb(255, 102, 0);\">Tổng quan về Canva Education</strong></h2><p><a href=\"https://gamikey.com/nang-cap-tai-khoan-canva-education/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(225, 89, 39); background-color: transparent;\"><strong>Tài khoản Canva Edu</strong></a>&nbsp;là ứng dụng giúp cho việc thiết kế những ý tưởng được dễ dàng hơn. Nhờ có Canva Edu mà bạn có thể thỏa sức sáng tạo ra những thiết kế tuyệt vời với những ý tưởng content&nbsp;hay mà không sợ bị bí ý tưởng và&nbsp;công cụ này giúp cho bạn trở thành chuyên gia một cách dễ dàng.</p><p><strong>Gamikey&nbsp;</strong>như là một trong những shop nâng cấp&nbsp;<a href=\"https://gamikey.com/tai-khoan-canva-pro/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(225, 89, 39); background-color: transparent;\"><strong>tài khoản Canva Pro</strong></a>, cam kết&nbsp;sử dụng Canva Edu bản quyền và sẽ sử dụng email chính chủ của khách hàng để thực hiện nâng cấp tài khoản chứ không hề có việc sử dụng email của bên thứ 3 hoặc là một email chung cho nhiều khách hàng. Điều này giúp đảm bảo rằng những thông tin cá nhân của khách hàng sẽ được bảo mật và không bị tiết lộ cho bất kỳ bên thứ nào khác.</p><blockquote><strong><em>Tìm hiểu về&nbsp;</em></strong><a href=\"https://gamikey.com/mua-youtube-premium/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(225, 89, 39); background-color: transparent;\"><strong><em>cách đăng ký youtube premium</em></strong></a><strong><em>&nbsp;tại Gamikey</em></strong></blockquote><h2><strong style=\"color: rgb(255, 102, 0);\">Nâng cấp tài khoản Canva Education tại Gamikey được gì?&nbsp;</strong></h2><ul><li><strong>Bảo hành 1 đổi 1:&nbsp;</strong>Khi bạn nâng cấp tài khoản Canva Edu tại Gamikey mà có lỗi xảy ra hoặc gặp các vấn đề liên quan đến quyền truy cập và sử dụng tài khoản của mình, bạn có thể liên hệ trực tiếp đến Gmaikey thông qua zalo để được hỗ trợ. Gamikey cam kết sẽ giải quyết nhanh những vấn đề liên quan đến tài khoản của khách hàng nếu xảy ra trường hợp không được, chúng tôi sẽ hỗ trợ để tạo môt tài khoản mới và hoàn toàn miễn phí.</li><li><strong>Cam kết giá rẻ hơn so với mua trực tiếp:</strong>&nbsp;Đây là một điểm rất đáng chú ý cho người dùng nâng cấp tài khoản Canva Edu so với việc bỏ ra một số tiền lớn hơn nhiều thì Gamikey cam kết có giá cực sốc chỉ&nbsp;<strong>49k</strong>&nbsp;cho người dùng ở các phiên bản của Canva Edu. Việc có thể mua được tài khoản Canva Edu với giá rẻ hơn so với mua trực tiếp từ Gamikey hứa hẹn sẽ là một điểm hấp dẫn cho nhiều người dùng. Gamikey như là một trong những nhà cung cấp tài khoản Canva Edu, cam kết mang đến giá cực kỳ phải chăng hợp túi tiền cho người dùng khi mua các phiên bản của<strong>&nbsp;Canva Edu</strong>.</li><li><strong>Cung cấp tài khoản email chính chủ:</strong>&nbsp;Khi nâng cấp tài khoản Canva Edu, việc sử dụng email chính chủ của khách hàng là rất quan trọng. Điều này giúp đảm bảo tính bảo mật và an toàn của tài khoản Canva của bạn.</li><li><strong>Cam kết nâng cấp tài khoản Canva Edu bản quyền:&nbsp;</strong>&nbsp;Nếu bạn đã từng mua phải tài khoản Canva Edu bản lậu với một số tiền lớn nhưng dùng được mấy ngày thì bị chặn, hết hạn, không được phép dùng nữa thì ở Gamikey cam kết sẽ cung cấp cho khách hàng tài khoản Canva Edu bản quyền, giá rẻ không phải lo sợ bị lừa mua trúng tài khoản lậu.</li><li><strong>Thanh toán linh hoạt: Gamikey</strong>&nbsp;cung cấp tài khoản&nbsp;<strong>Canva Edu</strong>&nbsp;và mang đến một một trải nghiệm thanh toán thuận tiện nhất đến khách hàng. Đa dạng hình thức thanh toán giúp khách hàng dễ dàng lựa chọn hình thức thanh toán tại Việt Nam như: internet Banking, Momo để giúp khách hàng có thể lựa chọn phương thức thanh toán phù hợp nhất với bản thân mình.</li><li><strong>Nhận tài khoản nhanh chóng:</strong>&nbsp;Sau khi khách hàng hoàn tất các nội dung và điền đầy đủ thông tin cần thiết để tiến hành nâng cấp tài khoản,&nbsp;<strong>Gamikey</strong>&nbsp;sẽ tiến hành xử lý thông tin và gửi lại tài khoản Canva Edu cho khách hàng trong thời gian ngắn nhất có thể. Thời gian nhận tài khoản Canva Edu chỉ thường chỉ mất từ 15 đến 20 phút, tùy thuộc vào việc khách hàng sử dụng phương thức nào để có thể thanh toán.</li></ul>', 'uploads/products/media_65ff8e34959e7.webp', 49000, NULL, NULL, NULL, 1, 'Nâng Cấp', 'nang-cap', 0, '0', 0, 2, NULL, 3, '[\"1\",\"3\"]', NULL, '2024-03-23 19:21:40', '2024-03-23 19:21:40'),
(4, 'Nâng cấp Elsa Premium chính chủ 12 tháng', 'nang-cap-elsa-premium-chinh-chu-12-thang', 'Đăng nhập tối đa 3 thiết bị, không giới hạn thiết bị chuyển đổi\r\n\r\nSử dụng trên Android, IOS\r\n\r\nNâng cấp trực tiếp từ tài khoản chính chủ, gửi kèm bill thanh toán nếu khách hàng yêu cầu\r\n\r\nTrọn bộ ELSA Premium bao gồm ELSA Pro, ELSA AI và Speech Analyzer – 1 năm', '<h2><strong style=\"color: rgb(0, 0, 0);\">Giới thiệu về Elsa Premium là gì ?</strong></h2><p><span style=\"color: rgb(0, 0, 0);\">Elsa Premium chính thức ra mắt vào tháng 9 năm 2023. Đây là gói học tiếng Anh cao cấp nhất của Elsa tính tới thời điểm hiện tại. Với gói Elsa Premium thì người dùng có thể thoải mái truy cập vào nhiều gói học và sử dụng những tính năng mới của Elsa</span></p><p><img src=\"https://gamikey.com/wp-content/uploads/2023/10/tai-khoan-elsa-premium.png\" alt=\"tai khoan elsa premium\" height=\"500\" width=\"800\"></p><h2><strong style=\"color: rgb(0, 0, 0);\">Một số tính năng đặc biệt của gói Elsa Premium</strong></h2><p><span style=\"color: rgb(0, 0, 0);\">Elsa Premium là sự kết hợp của 3 gói Elsa Pro, Elsa Speech Analyzer và Elsa AI</span></p><p><strong style=\"color: rgb(0, 0, 0);\">Với Elsa Pro</strong></p><ul><li><span style=\"color: rgb(0, 0, 0);\">Elsa Pro là gói học tiếng Anh cao cấp có trả phí, Elsa Premium được tích hợp đầy đủ những tính năng mà Elsa Pro đang cung cấp</span></li><li><span style=\"color: rgb(0, 0, 0);\">Học viên có thể thoải mái học mà không lo bị làm phiền bởi quảng cáo</span></li><li><span style=\"color: rgb(0, 0, 0);\">Kho bài tập đa dạng, phong phú: Elsa Pro với hơn 7.100+ bài học, 22 kỹ năng ngôn ngữ trọng tâm. Các bài tập mới luôn được cập nhật liên tục để nâng cao trải nghiệm của người dùng.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Elsa Pro có công cụ phân tích giọng nói chuyên sâu, với công cụ này giúp người học biết được ưu điểm và nhược điểm trong cách phát âm của mình</span></li><li><span style=\"color: rgb(0, 0, 0);\">Cung cấp lộ trình học tập cá nhân, theo trình độ và năng lực của từng học viên, đảm bảo học viên tiến bộ dần, không bị cảm thấy nản do lượng bài học quá nhiều.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Elsa Pro còn cung cấp công cụ quản lý giúp học viên theo dõi được tiến độ học tập của mình, biết được bản thân mình cần phải cải thiện kỹ năng nào</span></li></ul><p><strong style=\"color: rgb(0, 0, 0);\">Elsa Speech Analyzer</strong></p><ul><li><span style=\"color: rgb(0, 0, 0);\">Đây là một công cụ phân tích giọng nói mà bạn có thể sử dụng để đánh giá khả năng phát âm của mình khi đối thoại trong cuộc sống như phỏng vấn, đi mua sắm, trò chuyện hàng ngày, ….</span></li><li><span style=\"color: rgb(0, 0, 0);\">Elsa Speech Analyzer có thể phân tích khả năng phát âm của bạn với nhiều khía cạnh:</span></li><li><span style=\"color: rgb(0, 0, 0);\">Phát âm: Elsa Speech Analyzer sẽ đánh giá xem bạn phát âm sai chỗ nào, phát âm đạt được bao nhiêu phần trăm giống với người bản địa.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Ngữ điệu: Elsa Speech Analyzer sẽ gợi ý cho bạn nên nhấn trọng âm vào những từ nào để tăng hiệu quả truyền đạt, đồng thời gợi ý cho bạn cao độ, giọng nói phù hợp với nội dung và hoàn cảnh hội thoại.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Ngữ pháp: Công cụ này sẽ chấm điểm ngữ pháp bạn dùng có đúng không, đồng thời sẽ gợi ý những ngữ pháp nâng cao mà bạn có thể thay thế.</span></li></ul><p><strong style=\"color: rgb(0, 0, 0);\">Elsa AI</strong></p><ul><li><span style=\"color: rgb(0, 0, 0);\">Đây là một công cụ mới nhất của Elsa, Elsa AI được tích hợp với công cụ trí tuệ nhân tạo để đem lại một trải nghiệm tuyệt vời đến học viên&nbsp;</span></li><li><span style=\"color: rgb(0, 0, 0);\">Elsa AI giống như một người bạn đồng hành trong cuộc trò chuyện như: mua sắm, phỏng vấn, đi chơi,… Qua đó để nâng cao khả năng phản xạ khi giao tiếp tiếng Anh của bạn. Elsa AI sẽ đánh giá khả năng tiếng Anh của bạn, từ đó đưa ra những bài học phù hợp với trình độ hiện tại của bạn.&nbsp;</span></li></ul><p><img src=\"https://gamikey.com/wp-content/uploads/2023/10/tai-khoan-elsa-premium-1.png\" alt=\"tai khoan elsa premium (1)\" height=\"500\" width=\"800\"></p><h2><strong style=\"color: rgb(0, 0, 0);\">Những ưu điểm nổi bật của Elsa Premium</strong></h2><ul><li><span style=\"color: rgb(0, 0, 0);\">Elsa Premium là phiên bản cao cấp nên sẽ không bị làm phiền bởi những quảng cáo nào trong quá trình học, đem lại một trải nghiệm học tập tuyệt vời</span></li><li><span style=\"color: rgb(0, 0, 0);\">Cập nhật nội dung, bài học và chức năng mới mỗi 2 tuần.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Sử dụng công nghệ A.I để kiểm tra phát âm tiếng Anh và hướng dẫn sửa lỗi theo hệ thống phiên âm chuẩn IPA.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Kho từ điển Anh-Việt miễn phí giúp bạn tra cứu từ mới thông qua hình ảnh và phát âm.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Hệ thống ELSA Speak Pro sẽ chấm điểm theo các tiêu chí và đưa ra lời khuyên cho người dùng theo từng kĩ năng cụ thể. Từ đó, lộ trình học cá nhân hóa sẽ được thiết kế dựa trên trình độ của mỗi người dùng.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Trải nghiệm học tiếng Anh “1 kèm 1” với gia sư ảo ELSA, bạn sẽ được nhắc nhở học tập và xem báo cáo tiến độ mỗi ngày 24/7.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Với phiên bản Premium này thì Elsa còn được hỗ trợ bởi Elsa AI, bao gồm:</span></li><li><span style=\"color: rgb(0, 0, 0);\">Đặt ra các tình huống thường gặp như mua sắm, đi ăn nhà hàng, phỏng vấn, đi dạo, tán gẫu,…</span></li><li><span style=\"color: rgb(0, 0, 0);\">Với Elsa AI thì bạn có thể thoải mái trò chuyện mà không lo bị nói sai hay phát âm không đúng. Elsa AI sẽ là một người bạn đồng hành cùng bạn trong suốt quá trình học tiếng Anh.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Sau những cuộc trò chuyện, Elsa AI sẽ đưa ra những đánh giá chi tiết để bạn có thể khắc phục những điểm chưa tốt của mình.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Hơn 290 chủ đề từ vựng tiếng Anh, hơn 5.000 bài học và 25.000 bài luyện tập, giúp bạn nâng cao kỹ năng phát âm, nghe hiểu, dấu nhấn, và hội thoại.&nbsp;</span></li></ul><p><img src=\"https://gamikey.com/wp-content/uploads/2023/10/tai-khoan-elsa-premium-2.png\" alt=\"tai khoan elsa premium (2)\" height=\"500\" width=\"800\"></p><h2><strong style=\"color: rgb(0, 0, 0);\">Nâng cấp Elsa Premium chính chủ 12 tháng tại Gamikey&nbsp;</strong></h2><p><span style=\"color: rgb(0, 0, 0);\">Dưới đây là một số lợi ích khi bạn chọn nâng cấp&nbsp;</span><a href=\"https://gamikey.com/nang-cap-elsa-premium-chinh-chu-12-thang/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(225, 89, 39); background-color: transparent;\">tài khoản Elsa Premium</a><span style=\"color: rgb(0, 0, 0);\">&nbsp;tại&nbsp;</span><a href=\"https://gamikey.com/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(225, 89, 39); background-color: transparent;\">Gamikey</a><span style=\"color: rgb(0, 0, 0);\">:</span></p><ul><li><strong style=\"color: rgb(0, 0, 0);\">Bảo hành 1 đổi 1:</strong><span style=\"color: rgb(0, 0, 0);\">&nbsp;Gamikey cam kết bảo hành 1 đổi 1 cho&nbsp;&nbsp;tài khoản Elsa Premium khi có lỗi xảy ra.</span></li><li><strong style=\"color: rgb(0, 0, 0);\">Giá cả hợp lý</strong><span style=\"color: rgb(0, 0, 0);\">: Gamikey nâng cấp tài khoản Elsa Premium với giá cả phải chăng, đảm bảo uy tín và bản quyền.</span></li><li><strong style=\"color: rgb(0, 0, 0);\">Sử dụng email cá nhân:</strong><span style=\"color: rgb(0, 0, 0);\">&nbsp;Khi nâng cấp tài khoản Elsa Premium, bạn sẽ sử dụng email cá nhân của mình, giúp tăng cường bảo mật cho tài khoản của bạn.</span></li><li><strong style=\"color: rgb(0, 0, 0);\">Thanh toán linh hoạt:&nbsp;</strong><span style=\"color: rgb(0, 0, 0);\">Gamikey cho phép bạn thanh toán qua các phương thức phổ biến như ATM, Internet Banking, và Momo.</span></li><li><strong style=\"color: rgb(0, 0, 0);\">Nhận key nhanh chóng:</strong><span style=\"color: rgb(0, 0, 0);\">&nbsp;Sau khi hoàn tất thông tin, Gamikey sẽ gửi tài khoản Elsa Premium cho bạn trong thời gian ngắn nhất có thể, thường chỉ từ 15 đến 20 phút.</span></li></ul><p><span style=\"color: rgb(0, 0, 0);\">Để nâng cấp Elsa Premium chính chủ 12 tháng tại Gamikey, bạn có thể làm theo các bước sau:</span></p><ul><li><strong style=\"color: rgb(0, 0, 0);\">Bước 1</strong><span style=\"color: rgb(0, 0, 0);\">: Truy cập vào trang web của Gamikey.com</span></li><li><strong style=\"color: rgb(0, 0, 0);\">Bước 2:&nbsp;</strong><span style=\"color: rgb(0, 0, 0);\">Tìm kiếm “Elsa Premium” trong thanh tìm kiếm.</span></li><li><strong style=\"color: rgb(0, 0, 0);\">Bước 3:&nbsp;</strong><span style=\"color: rgb(0, 0, 0);\">Thêm sản phẩm vào giỏ hàng và tiến hành thanh toán.</span></li></ul><p><strong style=\"color: rgb(0, 0, 0);\">Lưu ý</strong><span style=\"color: rgb(0, 0, 0);\">: Giá cả và chính sách bảo hành có thể thay đổi tùy thuộc vào Gamikey. Nếu bạn gặp vấn đề với thông tin đăng nhập, hãy liên hệ với đội ngũ CSKH của Gamikey.</span></p><p><img src=\"https://gamikey.com/wp-content/uploads/2023/10/tai-khoan-elsa-premium-3.png\" alt=\"tai khoan elsa premium (3)\" height=\"500\" width=\"800\"></p><h2><strong style=\"color: rgb(0, 0, 0);\">Một số câu hỏi thường gặp khi nâng cấp Elsa Premium&nbsp;</strong></h2><p><strong style=\"color: rgb(0, 0, 0);\">ELSA Premium sử dụng được trên mấy thiết bị?</strong></p><p><span style=\"color: rgb(0, 0, 0);\">ELSA, một ứng dụng học tiếng Anh hàng đầu, cho phép bạn sử dụng tối đa trên ba thiết bị khác nhau với một tài khoản. Điều này giúp tăng cường bảo mật và bảo vệ quyền lợi của người học. Tuy nhiên, nếu bạn cố gắng sử dụng tài khoản trên một thiết bị thứ tư, tài khoản của bạn trên thiết bị đó sẽ bị khóa.</span></p><p><strong style=\"color: rgb(0, 0, 0);\">Tài khoản Elsa Premium học Offline được không?</strong></p><p><span style=\"color: rgb(0, 0, 0);\">Câu trả lời là không bởi vì ELSA chỉ hoạt động khi có kết nối internet do khối lượng dữ liệu lớn cần được xử lý.</span></p><p><strong style=\"color: rgb(0, 0, 0);\">&nbsp;Tài khoản ELSA Premium hiện có bao nhiêu bài học?</strong></p><p><span style=\"color: rgb(0, 0, 0);\">ELSA hiện tại có khoảng 6000 bài học, bao gồm hơn 29.000 bài luyện tập và hơn 261 chủ đề. Đây là một nguồn học phong phú giúp bạn nâng cao kỹ năng tiếng Anh của mình.</span></p>', 'uploads/products/media_65ff8e992462a.png', 1290000, NULL, NULL, NULL, 1, 'Nâng Cấp', 'nang-cap', 0, '0', 0, 2, NULL, NULL, '[\"1\",\"3\"]', NULL, '2024-03-23 19:23:21', '2024-03-23 19:23:21'),
(5, 'Red Dead Redemption 2 PC Rockstar Key GLOBAL', 'red-dead-redemption-2-pc-rockstar-key-global', 'Yêu cầu hệ thống tối thiểu Windows\r\n– Yêu cầu hệ thống: Windows 7 – (6.1.7601)\r\n– Bộ xử lý: Intel® Core™ i5-2500K / AMD FX-6300\r\n– Bộ nhớ: 8 GB RAM\r\n– Đồ họa: Nvidia GeForce GTX 770 2GB / AMD Radeon R9 280 3GB\r\n– Lưu trữ: 150 GB\r\nYêu cầu hệ thống đề nghị\r\n– Yêu cầu hệ thống: Windows 10\r\n– (v1803)\r\n– Bộ xử lý: Intel® Core™ i7-4770K / AMD Ryzen 5 1500X\r\n– Bộ nhớ: 12 GB RAM\r\n– Đồ họa: Nvidia GeForce GTX 1060 6GB / AMD Radeon RX 480 4GB\r\n– Lưu trữ: 150 GB\r\nChi tiết khác\r\n– Ngôn ngữ: Tiếng Anh, Tiếng Pháp, Tiếng Đức, Tiếng Ý, Tiếng Ba Lan, Tiếng Tây Ban Nha\r\n– Ngày phát hành: 5 tháng 11 năm 2019\r\n– Nhà xuất bản: Rockstar Games\r\n– Nhà phát triển: Rockstar Games\r\n– Hỗ trợ trên: Windows', '<h2><strong style=\"color: rgb(0, 0, 0);\">Giới thiệu game Red Dead Redemption 2 PC Rockstar Key GLOBAL</strong></h2><p><span style=\"color: rgb(0, 0, 0);\">Red Dead Redemption 2 là một trò chơi đưa người chơi vào thế giới hoang dã của miền Tây hoang dã một cách tuyệt vời. Với sự chú ý đến chi tiết tận tâm, trò chơi tái hiện được vẻ đẹp hoang dã và sự khắc nghiệt của cuộc sống của các cao bồi, mang đến một sự kết hợp hấp dẫn của những trận đấu súng đầy cảm xúc, khám phá thế giới mở rộng và câu chuyện sâu sắc. Mặc dù trò chơi này chỉ dành cho người chơi trưởng thành vì chứa nhiều cảnh bạo lực và máu me không phù hợp với trẻ em, nhưng bạn có thể sống những giấc mơ miền Tây hoang dã của mình, cưỡi ngựa khắp cảnh quan tuyệt đẹp, tham gia vào những cuộc giao tranh mãnh liệt và trải nghiệm sự đoàn kết và căng thẳng khi là một thành viên của một băng đảng. Cốt truyện phong phú, các sự kiện động, bạo lực và cảnh quan chân thực đưa bạn vào một thời gian khác, biến Red Dead 2 không chỉ là một trò chơi mà còn là một cuộc hành trình vào bản chất của huyền thoại và truyền thuyết về tội phạm. Sau một ngày dài trên ngựa, bạn có thể tìm thấy mình nằm gọn bên bếp lửa trại, chia sẻ câu chuyện với các thành viên băng đảng qua một bữa ăn đơn giản và bổ dưỡng, có thể bao gồm một hộp đậu và một củ khoai tây nướng.</span></p><p><img src=\"https://gamikey.com/wp-content/uploads/2023/11/Red-Dead-Redemption-2-PC-Rockstar-Key-GLOBAL.png\" alt=\"Red Dead Redemption 2 PC Rockstar Key GLOBAL\" height=\"500\" width=\"800\"></p><p><span style=\"color: rgb(0, 0, 0);\">Rockstar Games đã xây dựng một danh tiếng là những nhà điều hành của các trò chơi thế giới mở, điều này đã được chứng minh qua Red Dead Redemption 1, Grand Theft Auto V và những tựa game khác. Ở bản cốt lõi, Red Dead Redemption 2 là một viên ngọc khác nằm trong bộ sưu tập tuyệt vời của Rockstar đã xuất bản suốt những năm qua. Trên thực tế, nó có thể là đỉnh cao tuyệt vời nhất trong dòng game đột phá này. Hãy xem những gì trò chơi khổng lồ này mang đến cho bạn:</span></p><h3><strong style=\"color: rgb(0, 0, 0);\">Thế giới mở và khám phá trong Red Dead Redemption 2</strong></h3><p><span style=\"color: rgb(0, 0, 0);\">Thế giới của Red Dead Redemption 2 rộng lớn, kết hợp hoang dã không chủ và các khu vực dân cư, và phiên bản trên PC cho phép bạn khám phá những cánh đồng hoang dã trong một trong những trò chơi AAA tốt nhất trong thể loại này. Với tầm nhìn xa hơn và độ phân giải cao hơn, các hệ sinh thái đa dạng của trò chơi, từ núi phủ tuyết đến sa mạc nóng bức, được mô phỏng với chi tiết tuyệt vời. Bạn có thể dành hàng giờ săn bắn, câu cá hoặc đơn giản là lang thang, hoàn toàn đắm chìm trong thế giới trò chơi dựa trên một thời đại đã qua.</span></p><h3><strong style=\"color: rgb(0, 0, 0);\">Các sự kiện ngẫu nhiên mang tính chất sống động cho Red Dead 2</strong></h3><p><span style=\"color: rgb(0, 0, 0);\">Khi bạn khám phá miền Tây Mỹ rộng lớn, nhiều sự kiện bất ngờ và không kế hoạch diễn ra, mang lại sự sống cho thế giới trong trò chơi. Các sự kiện ngẫu nhiên này có tính đa dạng rộng lớn, từ việc giúp đỡ người lạ và ngăn chặn vụ cướp đến gặp phải các tình huống bí ẩn. Mỗi sự kiện mang đến cảm giác tự nhiên và không thể đoán trước, với kết quả phụ thuộc vào sự lựa chọn của bạn, tăng cường tính thực tế và bất ngờ của trò chơi. Những sự kiện này làm tăng sự đắm chìm của bạn trong thế giới trò chơi và gia tăng sự giàu có về cốt truyện, làm nổi bật sự phức tạp của cuộc sống ở miền Tây hoang dã và sự tận tâm của Rockstar trong việc tạo ra một thế giới sống động, chân thực.</span></p><h3><strong style=\"color: rgb(0, 0, 0);\">Nhiều trò chơi nhỏ và hoạt động phụ trong Red Dead Redemption</strong></h3><p><span style=\"color: rgb(0, 0, 0);\">Đắm mình sâu hơn vào thế giới của Red Dead Redemption với một loạt các trò chơi nhỏ đặc biệt và hoạt động phụ mang lại những tầng lớp vui nhộn và chân thực cho trải nghiệm chơi game. Từ chơi poker và blackjack trong quán rượu đến một trận đấu đấu súng hoặc đơn giản chỉ là thời gian để chơi harmonica xung quanh đám lửa trại hoặc chăm sóc ngựa, những hoạt động này mang đến sự gián đoạn khỏi cốt truyện chchính và cho phép bạn tương tác với thế giới trò chơi một cách độc đáo và thú vị.</span></p><h3><strong style=\"color: rgb(0, 0, 0);\">Red Dead Redemption có thời tiết đa dạng và chu kỳ ngày đêm động</strong></h3><p><span style=\"color: rgb(0, 0, 0);\">Hãy trải nghiệm cuộc sống của một người cow-boy và nhà ngoại đạo tài ba với hệ thống săn bắn và chế tạo phức tạp trong trò chơi. Bạn có thể theo dõi và săn lùng nhiều loại động vật trong hoang dã, sử dụng vũ khí và chiến thuật khác nhau. Việc săn bắn thành công mang lại tài nguyên có thể được sử dụng để chế tạo các vật phẩm hữu ích và nâng cấp, tạo thêm một chiều hướng sinh tồn cho trò chơi. Khía cạnh này không chỉ làm giàu mối liên kết của bạn với thế giới trò chơi mà còn mang lại lợi ích thực tế cho hành trình qua miền Tây hoang dã.</span></p><p><img src=\"https://gamikey.com/wp-content/uploads/2023/11/Red-Dead-Redemption-2-PC-Rockstar-Key-GLOBAL-1.png\" alt=\"Red Dead Redemption 2 PC Rockstar Key GLOBAL (1)\" height=\"500\" width=\"800\"></p><h3><strong style=\"color: rgb(0, 0, 0);\">Hoạt động sau khi hoàn thành Red Dead Redemption 2</strong></h3><p><span style=\"color: rgb(0, 0, 0);\">Mua Red Dead Redemption 2 key trên PC để tận hưởng tất cả những gì một thế giới sandbox miền Tây hoang dã đầy đủ có thể mang lại. Ngay cả sau khi hoàn thành chiến dịch khổng lồ, bạn vẫn có thể khám phá một thế giới được cư dân và động vật đa dạng sinh sống. Bạn sẽ khám phá những sa mạc, thị trấn chăn nuôi, các khu định cư công nghiệp đang phát triển, các đầm lầy có cá sấu, đỉnh núi phủ tuyết, hang động nguy hiểm và bạn sẽ tận hưởng tất cả các hoạt động này trong một thế giới được xây dựng với không khí miền Tây hoang dã chân thực và sự chú ý đáng kinh ngạc đến chi tiết.</span></p><h3><strong style=\"color: rgb(0, 0, 0);\">Red Dead Redemption 2 trên PC: Trải nghiệm miền Tây với độ chi tiết tuyệt đẹp</strong></h3><p><span style=\"color: rgb(0, 0, 0);\">Bắt đầu cuộc hành trình hùng vĩ qua trái tim miền Tây Hoa Kỳ với phiên bản PC của Red Dead Redemption 2, phiên bản hoàn thiện của kiệt tác của Rockstar Games. Đây không chỉ là một cuộc phiêu lưu bình thường vào miền Tây hoang dã; đó là một trải nghiệm được cải tiến sâu sắc vượt xa phiên bản gốc trên Xbox One và PlayStation 4. Với sự nâng cấp kỹ thuật và nội dung đa dạng, phiên bản PC của Red Dead Redemption 2 mời gọi bạn chứng kiến câu chuyện miền Tây hoang dã với độ trung thành tuyệt đẹp và với các tính năng gameplay mở rộng. Hãy sẵn sàng và chuẩn bị trải qua một thế giới nơi mọi chi tiết được mài giũa đến hoàn thiện và vẻ đẹp hoang dã của biên giới sống động hơn bao giờ hết.</span></p><h3><strong style=\"color: rgb(0, 0, 0);\">Trải nghiệm đích thực của Red Dead Redemption 2 trên PC</strong></h3><p><span style=\"color: rgb(0, 0, 0);\">Phiên bản PC của RDR2 cũng có các cải tiến về hình ảnh như ánh sáng và các bề mặt được cải thiện, tốc độ khung hình nhanh hơn, hoạt động khuôn mặt chân thực, hỗ trợ HDR và độ phân giải 4K, cũng như cấu hình đa màn hình. Đây thực sự là một món quà đặc biệt dành cho người chơi trên PC! Mua key Red Dead Redemption 2 trên PC và bạn cũng sẽ nhận được các khẩu súng mới, nhiệm vụ Bounty Hunter, bản đồ kho báu, nơi ẩn náu của băng đảng, các loại ngựa mới và nhiều bổ sung khác, tạo nên phiên bản cuối cùng thực sự của trò chơi này. Đến lúc đội chiếc mũ cowboy và khám phá miền Tây cổ điển cả trong chế độ câu chuyện và Red Dead Online!</span></p><h3><strong style=\"color: rgb(0, 0, 0);\">Cộng đồng và cơ hội modding của Red Dead Redemption 2 trên PC</strong></h3><p><span style=\"color: rgb(0, 0, 0);\">Cộng đồng game thủ trên PC nổi tiếng với sự sáng tạo và đam mê trong việc tăng cường trò chơi thông qua các mod, và với fan hâm mộ Red Dead 2, truyền thống này tiếp tục. Việc có phiên bản PC mở ra một loạt cơ hội modding, cho phép game thủ xây dựng, chỉnh sửa và nâng cấp trò chơi của họ, tạo ra một trải nghiệm chơi game độc đáo, cá nhân hóa và hoàn toàn khác biệt. Từ việc cải thiện đồ họa đến giới thiệu nội dung mới trong trò chơi, các khả năng là vô tận. Điều này không chỉ kéo dài tuổi thọ của trò chơi mà còn xây dựng một cộng đồng game thủ mạnh mẽ, chia sẻ các bản mod và trải nghiệm của họ, làm giàu thêm vũ trụ Red Dead Redemption 2 trên PC.</span></p><h2><span style=\"color: rgb(0, 0, 0);\">Liên hệ với đội ngũ hỗ trợ.</span></h2>', 'uploads/products/media_65fb1d2f939a8.jpeg', 550000, 0, NULL, NULL, 1, 'Key', 'key', 20, '0', 0, 3, NULL, NULL, '[\"1\",\"5\"]', NULL, '2024-03-20 10:30:23', '2024-03-31 08:26:19'),
(6, 'Grand Theft Auto V GTA: Criminal Enterprise Starter Pack (DLC) XBOX LIVE Key GLOBAL', 'grand-theft-auto-v-gta-criminal-enterprise-starter-pack-dlc-xbox-live-key-global', NULL, '<h2><strong style=\"color: rgb(0, 0, 0);\">Mô tả game Grand Theft Auto V GTA: Criminal Enterprise Starter Pack (DLC) XBOX LIVE Key GLOBAL</strong></h2><p><span style=\"color: rgb(0, 0, 0);\">Trong thế giới của Grand Theft Auto: Online, có hai điều quan trọng. Điều đầu tiên là quyền lực, trong khi điều thứ hai là tiền bạc. Trong khi quyền lực chỉ có thể đạt được thông qua công việc chăm chỉ, có một cách tương đối dễ dàng để kiếm tiền và nhiều hơn thế nữa. Gói DLC Criminal Enterprise Starter Pack được phát hành để cung cấp cho bạn một số điều thú vị. Dưới đây là những thứ đó:</span></p><ul><li><span style=\"color: rgb(0, 0, 0);\">Tiền thưởng $1,000,000.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Các tài sản sau đây:</span></li><li><span style=\"color: rgb(0, 0, 0);\">Văn phòng điều hành Maze Bank West.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Câu lạc bộ mô tô Great Chaparral.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Bunker vũ khí Paleto Forest Gunrunning.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Nhà máy tiền giả Senora Desert Counterfeit Cash Factory.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Căn hộ tại 1561 San Vitas Street.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Gara ô tô 10 chỗ tại 1337 Exceptionalists Way.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Các phương tiện sau đây:</span></li><li><span style=\"color: rgb(0, 0, 0);\">Maibatsu Frogger.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Enus Windsor.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Obey Omnis.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Coquette Classic.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Dune FAV.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Turismo R.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Banshee.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Western Zombie Chopper.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Huntley S.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Pegassi Vortex.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Vũ khí, hình xăm và quần áo:</span></li><li><span style=\"color: rgb(0, 0, 0);\">Súng bắn tỉa Marksman.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Súng ngắn Compact rifle.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Súng phóng lựu Compact grenade launcher.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Hình xăm biker.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Trang phục đua xe và nhập khẩu/xuất khẩu.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Trò chơi</span></li></ul><p><img src=\"https://gamikey.com/wp-content/uploads/2023/11/Grand-Theft-Auto-V-GTA-Criminal-Enterprise-Starter-Pack-DLC-XBOX-LIVE-Key-GLOBAL.png\" alt=\"Grand Theft Auto V GTA Criminal Enterprise Starter Pack (DLC) XBOX LIVE Key GLOBAL\" height=\"500\" width=\"800\"></p><p><span style=\"color: rgb(0, 0, 0);\">Không thể phủ nhận rằng GTA 5 Criminal Enterprise Starter Pack có tác động lớn đến gameplay. Cuối cùng, ngay cả nhà phát triển cũng gọi DLC này là một gói khởi đầu. Nhờ vào nó, bạn sẽ có thể xây dựng đế chế tội phạm của mình một cách tương đối nhanh chóng. Tiền mặt bổ sung cùng với nội dung khác được cung cấp bởi DLC này sẽ biến bạn trở thành một nhân vật tội phạm quan trọng. Tuy nhiên, hãy nhớ rằng để chơi và truy cập nội dung do gói này cung cấp, bạn cần có GTA V. Hơn nữa, nội dung (bao gồm cả phương tiện) được đánh dấu là Miễn phí trong trò chơi. Nói cách khác, chúng không có giá trị giao dịch. Nói cách khác, bạn không thể bán những mặt hàng này.</span></p><h2><strong style=\"color: rgb(0, 0, 0);\">Các tính năng chính Grand Theft Auto V GTA: Criminal Enterprise Starter Pack (DLC) XBOX LIVE Key GLOBAL</strong></h2><ul><li><span style=\"color: rgb(0, 0, 0);\">Gói khởi đầu, cho phép bạn xây dựng đế chế tội phạm của mình với tốc độ nhanh chóng.</span></li><li><span style=\"color: rgb(0, 0, 0);\">$1,000,000 tiền mặt để giúp bạn trong cuộc hành trình của mình.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Các tài sản mới.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Các phương tiện mới.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Vũ khí, hình xăm và quần áo mới.</span></li></ul><p><img src=\"https://gamikey.com/wp-content/uploads/2023/11/Grand-Theft-Auto-V-GTA-Criminal-Enterprise-Starter-Pack-DLC-XBOX-LIVE-Key-GLOBAL-1.png\" alt=\"Grand Theft Auto V GTA Criminal Enterprise Starter Pack (DLC) XBOX LIVE Key GLOBAL (1)\" height=\"500\" width=\"800\"></p>', 'uploads/products/media_65fb1d65039d2.jpeg', 495000, 0, NULL, NULL, 1, 'Key', 'key', 10, '0', 0, 3, NULL, NULL, '[\"1\",\"5\"]', NULL, '2024-03-20 10:31:17', '2024-03-31 08:23:26'),
(7, 'Minecraft: Java Edition (PC) Official Website Key GLOBAL', 'minecraft-java-edition-pc-official-website-key-global', NULL, '<h2><strong style=\"color: rgb(0, 0, 0);\">Mô tả game Minecraft: Java Edition (PC) Official Website Key GLOBAL</strong></h2><p><span style=\"color: rgb(0, 0, 0);\">Hãy chọn phong cách chơi phù hợp với bạn nhất! Trong Chế độ Sáng tạo, bạn có thể dành hàng giờ trò chơi gây nghiện tập trung vào xây dựng – trong khi trong Chế độ Sinh tồn, bạn sẽ đối mặt với đám đông kẻ thù chỉ xuất hiện vào ban đêm. Nếu bạn cảm thấy đủ sức, hãy chọn Chế độ Hardcore khắc nghiệt, nơi mỗi lần chết là vĩnh viễn. Hoặc có thể bạn muốn khám phá bản đồ từ một góc nhìn hoàn toàn khác? Một lựa chọn như vậy có sẵn trong Chế độ Quan sát, trong đó bạn sẽ khám phá bản đồ như một hồn ma! Hoặc có thể bạn muốn chơi cùng với những người chơi khác trên máy chủ của họ? Bạn sẽ tìm thấy loại hình giải trí này trong Chế độ Phiêu lưu.</span></p><p><img src=\"https://gamikey.com/wp-content/uploads/2023/11/Minecraft-Java-Edition-PC-Official-Website-Key-GLOBAL.png\" alt=\"Minecraft Java Edition (PC) Official Website Key GLOBAL\" height=\"500\" width=\"800\"></p>', 'uploads/products/media_65fb1d90ccd81.jpeg', 650000, 0, NULL, NULL, 1, 'Key', 'key', 0, '0', 0, 3, NULL, NULL, '[\"1\",\"5\"]', NULL, '2024-03-20 10:32:00', '2024-03-20 10:32:00');
INSERT INTO `products` (`id`, `name`, `slug`, `short_description`, `description`, `image`, `price`, `discount_price`, `discount_start_date`, `discount_end_date`, `status`, `type`, `slug_type`, `quantity`, `search`, `purchased`, `category_id`, `sub_category_id`, `brand_id`, `tags_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(8, 'Tài khoản Netflix Premium Chính Hãng Việt Nam', 'tai-khoan-netflix-premium-chinh-hang-viet-nam', 'Bạn được cung cấp thông tin đăng nhập bao gồm email,mật khẩu và thông tin Profile bao gồm Tên Profile + Mã PIN để đăng nhập lên ứng dụng Netflix trên thiết bị của bạn\r\nBạn được sử dụng Profile riêng tư dùng để lưu lịch sử xem phim và cá nhân hoá list phim của bạn\r\nHoạt động trên tất cả thiết bị có hỗ trợ ứng dụng Netflix, sử dụng được trên trình duyệt tại địa chỉ https://www.netflix.com/\r\nSử dụng trên 01 thiết bị tại 01 thời điểm\r\nChất lượng video: 4K UHD\r\nƯu điểm so với các loại Netflix khác:\r\nTài khoản được Gamikey thanh toán chính hãng trực tiếp từ Netflix Việt Nam\r\nĐược bảo đảm không thay đổi Profile trong suốt quá trình sử dụng\r\nĐược thông báo trực tiếp từ hỗ trợ viên Gamikey khi tài khoản có bất kỳ cập nhật nào qua Zalo, SMS, Facebook, Email\r\nĐảm bảo tài khoản không lỗi khách hàng sử dụng xuyên suốt không cần thay đổi tài khoản trong thời gian đăng ký\r\nLưu ý: \r\n\r\nKhông tự ý thay đổi mật khẩu trong quá trình sử dụng\r\nKhông chia sẻ tài khoản cho người dùng khác\r\nKhông tự ý thay đổi Profile không phải của mình\r\nKhông thay đổi gói đăng ký và phương thức thanh toán trên tài khoản\r\nSử dụng đúng số thiết bị và Profile đã thanh toán\r\nTrường hợp phát hiện khách hàng vi phạm các lưu ý trên Gamikey sẽ thu hồi quyền truy cập và không hoàn trả.', '<h2><strong style=\"color: rgb(85, 85, 85);\">Tài khoản Netflix Premium Chính Hãng Việt Nam là gì?</strong></h2><p>Hiện nay để bạn có thể mua được Netflix tại Việt Nam sẽ có rất nhiều cách với nhiều hình thức đăng ký khác nhau, bạn có thể trực tiếp đăng ký và thanh toán thông qua thẻ tín dụng, Momo tại Việt Nam với mức phí cho gói Premium là 260.000đ/tháng hoặc bạn có thể mua được các gói Netflix từ các người bán khác với mức giá rẻ hơn nhiều tuy nhiên sẽ đi kèm với một số hạn chế, thông thường các dạng tài khoản này sẽ có phần kém ổn định vì người bán sẽ không làm chủ được phương thức thanh toán cho nên sẽ không nhận được hỗ trợ từ Netflix khi xảy ra sự cố.</p><p>Thực tế tại Gamikey cũng đã và đang bán một số hình thức Netflix này trong thời gian qua tuy nhiên bên phía Netflix đã có nhiều đợt cập nhật chính sách và lỗ hổng bảo mật khiến các hình thức này ngày càng khó khăn gây trải nghiệm không tốt cho khách hàng.</p><p>Để đảm bảo được việc này Gamikey sẽ bắt đầu bán&nbsp;<a href=\"https://gamikey.com/tai-khoan-netflix-premium/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(225, 89, 39); background-color: transparent;\">Netflix Premium</a>&nbsp;với hình thức chính hãng dành cho các khách hàng thực sự có nhu cầu sử dụng lâu dài với mức phí tiết kiệm.</p><h3><strong>Thông tin gói Premium:</strong></h3><ul><li><span style=\"color: rgb(0, 0, 0);\">Phim, chương trình truyền hình và trò chơi di động không có quảng cáo và không giới hạn</span></li><li><span style=\"color: rgb(0, 0, 0);\">Xem ở chế độ Ultra HD 4K</span></li><li><span style=\"color: rgb(0, 0, 0);\">Tải xuống&nbsp;cùng lúc trên 6 thiết bị được hỗ trợ</span></li><li><span style=\"color: rgb(0, 0, 0);\">Âm thanh không gian của Netflix</span></li></ul><p>Chất lượng video của gói Premium tối đa là Ultra HD 4K tuy nhiên bạn không thể chỉnh thủ công được mà nó phụ thuộc vào các yếu tố như thiết bị của bạn có hỗ trợ định dạng 4K hay không, tốc độ đường truyền mạng của bạn có đảm bảo tốt hay không.</p><p>Bạn có thể tạo Profile và đặt mã PIN cho Profile của mình trong quá trình sử dụng để đảm bảo danh sách phim của bạn và các cá nhân hoá của bạn được đảm bảo không mất.</p><p>Với gói Premium tại Gamikey đây là hình thức tài khoản share, bạn sẽ cùng nhóm với người dùng khác và được sở hữu 01 Profile cố định trong thời gian bạn đăng ký</p><h3><strong>Ưu điểm so với các loại Netflix khác:</strong></h3><ul><li>Tài khoản được Gamikey thanh toán chính hãng trực tiếp từ Netflix Việt Nam</li><li>Được bảo đảm không thay đổi Profile trong suốt quá trình sử dụng</li><li>Được thông báo trực tiếp từ hỗ trợ viên Gamikey khi tài khoản có bất kỳ cập nhật nào qua Zalo, SMS, Facebook, Email</li><li>Đảm bảo tài khoản không lỗi khách hàng sử dụng xuyên suốt không cần thay đổi tài khoản trong thời gian đăng ký</li></ul><p>Gamikey sẽ gửi cho bạn thông tin đăng nhập và các hướng dẫn cần thiết qua email khi bạn đặt mua.</p>', 'uploads/products/media_65fb1e00441d3.png', 239000, 0, NULL, NULL, 1, 'Tài Khoản', 'tai-khoan', 8, '0', 0, 1, 3, 4, '[\"1\",\"4\"]', NULL, '2024-03-20 10:33:52', '2024-03-31 08:23:11'),
(11, 'Tài khoản Netflix Premium', 'tai-khoan-netflix-premium', 'Đăng nhập trên nhiều thiết bị khác nhau nhưng chỉ được sử dụng đồng thời trên 01 thiết bị\r\nBạn có thể đổi tên Profile và đặt mã PIN cho Profile của mình\r\nKhông chia sẻ cho người khác sử dụng\r\nKhông được đổi mật khẩu hay phương thức thanh toán trên tài khoản\r\nSau khi thanh toán thành công hệ thống sẽ gửi thông tin tài khoản về email cho bạn, nếu không nhận được bạn vui lòng kiểm tra các mục Spam và Promotion trong hộp thư của các bạn nhé!', '<p>&lt;h2&gt;&lt;strong&gt;Tìm hiểu về gói Premium Netflix&amp;nbsp;&lt;/strong&gt;&lt;/h2&gt;&lt;p&gt;Netflix Premium là một trong 4 gói dịch vụ hiện có của Netflix cung cấp đến người dùng. Với phiên bản này thì bạn sẽ được dùng các tính năng vượt trội nhằm đáp ứng nhu cầu của những đối tượng khách hàng cao cấp. Với Netflix Premium thì bạn có thể thỏa sức tận hưởng những bộ phim hấp dẫn, đặc sắc mới và chất lượng. Điều đặc biệt là không bị làm phiền bởi những đoạn quảng cáo.&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;img src=\"https://gamikey.com/wp-content/uploads/2022/03/netflix-premium-1.png\" alt=\"netflix premium (1)\" height=\"500\" width=\"800\"&gt;&lt;/p&gt;&lt;h2&gt;&lt;strong&gt;Những tính năng nổi bật của gói Netflix Premium&amp;nbsp;&lt;/strong&gt;&lt;/h2&gt;&lt;h3&gt;&lt;strong&gt;Xem video chất lượng cao&lt;/strong&gt;&lt;/h3&gt;&lt;p&gt;&lt;strong&gt;Mua tài khoản Netflix&lt;/strong&gt;&amp;nbsp;Premium này thì Netflix hỗ trợ người xem chất lượng video 4K Ultra HD, độ phân giải cao giúp tạo ra những hình ảnh video sắc nét, sống động. Ngoài ra còn hỗ trợ âm thanh vòm 5.1, giúp người xem có trải nghiệm tầng âm thanh rõ ràng.&amp;nbsp;&lt;/p&gt;&lt;h3&gt;&lt;strong&gt;Xem được nhiều thiết bị cùng lúc&lt;/strong&gt;&lt;/h3&gt;&lt;p&gt;Khi&amp;nbsp;&lt;strong&gt;mua gói Netflix&lt;/strong&gt;&amp;nbsp;này thì cho phép xem được 4 thiết bị cùng lúc. Điều này có nghĩa là bạn và gia đình, bạn bè cùng truy cập vào tài khoản, cùng xem những nội dung trên nhiều thiết bị như điện thoại, máy tính, TV&amp;nbsp;&lt;/p&gt;&lt;h3&gt;&lt;strong&gt;Nói không với quảng cáo&lt;/strong&gt;&lt;/h3&gt;&lt;p&gt;Một điểm đặc biệt của&amp;nbsp;&lt;strong&gt;mua tài khoản Netflix Premium&lt;/strong&gt;&amp;nbsp;là không có quảng cáo. Bạn có thể tận hưởng nhiều bộ phim, chương trình truyền hình một cách liền mạch, không bị gián đoạn hay cảm thấy khó chịu bởi những quảng cáo chen ngang.&amp;nbsp;&lt;/p&gt;&lt;h3&gt;&lt;strong&gt;Cho phép tải video xuống để xem Offline&amp;nbsp;&lt;/strong&gt;&lt;/h3&gt;&lt;p&gt;&lt;strong&gt;Đăng ký Netflix&lt;/strong&gt;&amp;nbsp;này cho phép người dùng tải video về thiết bị và xem khi không có kết nối với Internet. Tính năng tải video này cũng giúp bạn tiết kiệm được băng thông Internet hơn. Nhưng hãy nhớ không phải video nào cũng có thể tải xuống, chỉ có thể tải những video được Netflix cho phép.&amp;nbsp;&lt;/p&gt;&lt;h3&gt;&lt;strong&gt;Netflix Premium với đa dạng trải nghiệm&lt;/strong&gt;&lt;/h3&gt;&lt;p&gt;Khi bạn đăng ký gói Netflix Premium thì bạn có thể tùy chọn chủ đề và ngôn ngữ khác nhau. Cho dù bạn đang ở quốc gia nào thì cũng có thể dễ dàng hiểu được nội dung trong video&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;img src=\"https://gamikey.com/wp-content/uploads/2022/03/netflix-premium-2.png\" alt=\"netflix premium (2)\" height=\"500\" width=\"800\"&gt;&lt;/p&gt;&lt;h2&gt;&lt;strong&gt;Một số ưu và nhược điểm khi sử dụng tài khoản Netflix Premium&amp;nbsp;&lt;/strong&gt;&lt;/h2&gt;&lt;p&gt;&lt;strong&gt;Ưu điểm&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Chất lượng hình ảnh, âm thanh cao: Acc Netflix Premium cung cấp chất lượng hình ảnh lên đến 4K Ultra HD và âm thanh Dolby Atmos, mang đến trải nghiệm xem phim tuyệt vời nhất.&lt;/li&gt;&lt;li&gt;Xem phim trên nhiều thiết bị cùng lúc: Đăng ký Netflix Premium, bạn có thể xem phim trên 4 thiết bị cùng lúc, cho phép các thành viên trong gia đình cùng nhau tận hưởng dịch vụ.&lt;/li&gt;&lt;li&gt;Tải phim xuống để xem ngoại tuyến: Mua Premium Netflix cho phép bạn tải phim xuống để xem ngoại tuyến, giúp bạn có thể xem phim mọi lúc mọi nơi, ngay cả khi không có kết nối internet.&lt;/li&gt;&lt;li&gt;Không có quảng cáo: gói Netflix Premium không hiển thị quảng cáo khi bạn xem phim, mang đến trải nghiệm xem phim liền mạch và không bị gián đoạn.&lt;/li&gt;&lt;li&gt;Tính năng dành cho trẻ em: tài khoản Netflix Premium cung cấp tính năng kiểm soát dành cho phụ huynh, cho phép bạn giới hạn nội dung mà trẻ em có thể xem.&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;strong&gt;Nhược điểm&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;Bên cạnh những ưu điểm đã kể trên thì gói Netflix Premium cũng có một số nhược điểm như:&amp;nbsp;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Giá cao hơn: Netflix Premium có giá cao hơn so với các gói cước khác của Netflix.&lt;/li&gt;&lt;li&gt;Có thể không cần thiết cho tất cả mọi người: Nếu bạn chỉ xem phim một mình và không quan tâm đến chất lượng hình ảnh cao nhất, bạn có thể cân nhắc sử dụng các gói cước khác rẻ hơn.&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;</p>', 'uploads/products/media_65fb1e85d89ef.webp', 320000, 0, '2024-03-24 05:00:00', '2024-03-30 05:00:00', 1, 'Tài Khoản', 'tai-khoan', 5, '0', 0, 1, 3, 4, '[\"1\",\"4\"]', NULL, '2024-03-22 18:39:49', '2024-03-31 08:21:56'),
(12, 'Remnant II – Ultimate Edition (PC) Steam Key GLOBAL', 'remnant-ii-ultimate-edition-pc-steam-key-global', 'Yêu cầu hệ thống tối thiểu\r\n– Yêu cầu hệ thống: Windows 10+\r\n– Bộ xử lý: Intel Core i5-7600 / AMD Ryzen 5 2600\r\n– Bộ nhớ: 16 GB RAM\r\n– Đồ họa: GeForce GTX 1650 / AMD Radeon RX 590\r\n– Lưu trữ: 80 GB\r\nChi tiết khác\r\n– Ngôn ngữ: Tiếng Anh, Tiếng Pháp, Tiếng Đức, Tiếng Ý, Tiếng Tây Ban Nha\r\n– Ngày phát hành: 22 tháng 7 năm 2023\r\n– Nhà xuất bản: Gearbox Publishing\r\n– Nhà phát triển: Gunfire Games', '<h2><strong style=\"color: rgb(0, 0, 0);\">Giới thiệu game Remnant II – Ultimate Edition (PC) Steam Key GLOBAL</strong></h2><p><span style=\"color: rgb(0, 0, 0);\">Remnant II – Ultimate Edition bao gồm:</span></p><p><span style=\"color: rgb(0, 0, 0);\">• Trò chơi gốc.</span></p><p><span style=\"color: rgb(0, 0, 0);\">• Truy cập sớm 3 ngày.</span></p><p><span style=\"color: rgb(0, 0, 0);\">• Truy cập đến các bộ giáp Remnant: From the Ashes.</span></p><p><span style=\"color: rgb(0, 0, 0);\">• Gói sinh tồn.</span></p><p><img src=\"https://gamikey.com/wp-content/uploads/2023/11/Remnant-II-Ultimate-Edition-PC-Steam-Key-GLOBAL.png\" alt=\"Remnant II Ultimate Edition (PC) Steam Key GLOBAL\" height=\"500\" width=\"800\"></p><h3><strong style=\"color: rgb(0, 0, 0);\">Gói DLC Remnant II với 3 gói DLC.</strong></h3><p><span style=\"color: rgb(0, 0, 0);\">Hãy sẵn sàng cho cuộc phiêu lưu chơi game tuyệt vời nhất với Remnant II, phần tiếp theo hấp dẫn của trò chơi hành động nhập vai/bắn súng đoạt giải thưởng, Remnant: From the Ashes! Chuẩn bị bước vào vai một người sống sót dũng cảm, hy vọng cuối cùng của loài người, đối đầu với những sinh vật mới đáng sợ và những con boss tương tự với các vị thần trong những thế giới đáng kinh ngạc và đáng sợ nhất mà bạn có thể tưởng tượng! Dù bạn là một con sói đơn độc tìm kiếm một trải nghiệm solo đầy kịch tính hay là một cặp đôi động lực sẵn sàng hợp tác với hai người bạn, Remnant II hứa hẹn một cuộc phiêu lưu đồng hành không thể so sánh mà sẽ làm bạn điên đảo. Cùng nhau, bạn sẽ khám phá những địa điểm chưa được khám phá sâu trong những cõi vô tận, đối mặt với một cái ác đe dọa không chỉ thế giới của chúng ta mà còn cả thực tại chính. Số phận của thực tại đang ngàn cân treo sợi tóc – nắm lấy số phận của bạn ngay bây giờ với key Steam của Remnant II!</span></p><h3><strong style=\"color: rgb(0, 0, 0);\">Tính năng của trò chơi Remnant 2</strong></h3><p><span style=\"color: rgb(0, 0, 0);\">Hãy sẵn sàng cho những trải nghiệm hồi hộp không ngừng với Remnant II! Hãy xem những tính năng tuyệt vời của trò chơi này:</span></p><ul><li><span style=\"color: rgb(0, 0, 0);\">Thế giới được tạo ra theo quy trình. Hãy chuẩn bị cho một trải nghiệm hoàn toàn mới mỗi khi bạn chơi. Thế giới được tạo động, đảm bảo những thử thách và cảm xúc mới mẻ mỗi cuộc phiêu lưu.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Đa dạng quái vật. Chuẩn bị cho những trận chiến đầy căng thẳng với một loạt quái vật nguy hiểm và đa dạng. Từ những con quái vật khổng lồ đến những con quỷ bay nhanh và đáng sợ, bạn sẽ không bao giờ biết điều gì đang rình rập góc kế bên.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Vũ khí và trang bị mạnh mẽ. Khám phá một kho vũ khí mạnh mẽ và trang bị hàng đầu sẽ là sợi dây mạng của bạn giữa những cảnh quan khắc nghiệt và những kẻ thù không ngừng.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Chế độ chơi đa người cùng chơi. Kết nối với những người bạn thân nhất của bạn và bắt đầu một cuộc phiêu lưu trực tuyến khó quên! Cùng hợp tác với tối đa hai người bạn để đối mặt với những khủng bổ ghê rợn vì đánh đấm với đồng đội luôn tốt hơn khi đối mặt với điều ác.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Lối chơi đầy thách thức. Hãy chuẩn bị cho thử thách cuối cùng về kỹ năng và sự cộng tác. Remnant II sẽ thử thách bạn đến giới hạn và hơn thế nữa, yêu cầu chiến lược và sự hợp tác tốt nhất của bạn để vượt qua những thách thức đáng gờm.</span></li><li><span style=\"color: rgb(0, 0, 0);\">Hãy sẵn sàng cho một cuộc hành trình đầy nhánh nhiệm vụ, khả năng nâng cấp, chế tạo kịch tính và phần thưởng đáng kinh ngạc sẽ kiểm tra ngay cả những người chơi kỳ cựu nhất. Những hang động và khu vực động, mỗi lượt chơi được tạo ra một cách độc đáo để mang đến trải nghiệm thú vị, đa dạng và đáng giá tuyệt đối. Hãy chuẩn bị cho những trận chiến căng thẳng đối mặt với những khó khăn không ngừng, nơi chiến thắng cảm giác như một thành tựu thực sự. Nhưng hãy nhớ, không có anh hùng nào đứng một mình trong vùng đất nguy hiểm này. Bạn có thể chọn đương đầu với những thế giới mới lạ này với một đội bạn tin cậy, đối mặt với những sinh vật thần thoại và kẻ thù nguy hiểm, đấu tranh để sống sót trong cuộc chiến đối đầu áp đảo. Mỗi thế giới đều mang đến những thách thức, sinh vật, vũ khí và vật phẩm độc đáo riêng, và đó là trách nhiệm của bạn để nắm bắt nghệ thuật sử dụng và nâng cấp những món đồ bạn khám phá để đối phó với những kẻ thù khó khăn hơn. Hãy tập hợp đồng đội của bạn, trang bị và chuẩn bị cho một cuộc hành trình không thể quên qua các vùng đất chưa biết đến với key Steam của Remnant 2!</span></li></ul><p><img src=\"https://gamikey.com/wp-content/uploads/2023/11/Remnant-II-Ultimate-Edition-PC-Steam-Key-GLOBAL-1.png\" alt=\"Remnant II Ultimate Edition (PC) Steam Key GLOBAL (1)\" height=\"500\" width=\"800\"></p><p><br></p>', 'uploads/products/media_65fe34d048c7d.jpg', 1200000, 850000, '2024-03-24 05:00:00', '2024-03-30 05:00:00', 1, 'Key', 'key', 10, '0', 0, 3, NULL, NULL, '[\"1\",\"5\"]', NULL, '2024-03-22 18:48:00', '2024-03-31 08:21:24'),
(14, 'Nâng cấp tài khoản Yousician Premium+ 12 tháng chính chủ', 'nang-cap-tai-khoan-yousician-premium-12-thang-chinh-chu', 'Đăng nhập và sử dụng trên nhiều thiết bị\r\nKhông giới hạn giờ học\r\nHơn 10.000 bài học & bài hát nổi tiếng\r\nTruy cập tất cả 5 công cụ\r\nTheo dõi tiến độ cá nhân', '<p>&lt;h2&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Giới thiệu về tài khoản Yousician Premium&amp;nbsp;&lt;/strong&gt;&lt;/h2&gt;&lt;p&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Yousician Premium là một dịch vụ ứng dụng học trực tuyến về nền tảng âm nhạc và chơi các nhạc cụ như Piano, Ukulele, guitar, bass và thanh nhạc. Yousician Premium được học thông qua những video bài giảng chi tiết nên giúp người học có thể dễ dàng học và tiếp thu một cách nhanh chóng.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Yousician Premium được phát triển tại Phần Lan, ứng dụng này đã giúp hơn 300 triệu người dùng với hơn 150 quốc gia. Các nội dung trên Yousician Premium được biên soạn bởi nhiều chuyên gia hàng đầu trong lĩnh vực nghệ thuật, giáo dục. Yousician có thể biến bạn từ một người không biết gì về âm nhạc và thành thạo một trong 5 nhạc cụ.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=\"https://gamikey.com/wp-content/uploads/2023/08/tai-khoan-Yousician-Premium.png\" alt=\"tài khoản Yousician Premium\" height=\"500\" width=\"800\"&gt;&lt;em&gt;Yousician Premium – ứng dụng học trực tuyến về âm nhạc và nhạc cụ&lt;/em&gt;&lt;/p&gt;&lt;h2&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Bạn sẽ học được những gì khi sử dụng tài khoản Yousician Premium&lt;/strong&gt;&lt;/h2&gt;&lt;ul&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Yousician Premium cho phép bạn có thoải mái học tất cả 5 nhạc cụ: Guitar, Ukulele, piano, bass, thanh nhạc với toàn quyền truy cập và toàn bộ các bài học và bài hát cho mọi nhạc cụ.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Học theo tiến độ của bạn, học mọi lúc mọi nơi, chỉ cần bạn thích học, ứng dụng sẽ không làm gián đoạn, làm ảnh hưởng đến quá trình học và thực hành của bạn.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Kết hợp vừa học vừa chơi: Việc kết hợp giữa vừa học với các bài tập sẽ thu hút, giúp bạn không cảm thấy nhàm chán. Bạn sẽ được tiến bộ và cải thiện nhanh chóng những kỹ năng của bản thân&amp;nbsp;&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Nắm vững kiến thức và học thành thạo nhạc lý: Hợp âm, tiết tấu, cách đọc tọa độ, điệu nhịp của bài hát.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Thoải mái truy cập không giới hạn với kho thư viện 10.000 nội dung, tài liệu học tập và những nội dung này sẽ luôn được cập nhật đổi mới liên tục.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Yousician Premium cung đến người học với hơn 1 nghìn bài hát được tải lên cộng đồng học viên, bạn sẽ được phép sử dụng những bài hát và không phải tốn bất kỳ chi phí nào&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Yousician Premium còn có một tính năng đặc biệt là có thể thu âm tiếng đàn của bạn để thống kê, so sánh và đưa ra những lời khuyên, sửa chữa&lt;/span&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;img src=\"https://gamikey.com/wp-content/uploads/2023/08/tai-khoan-Yousician-Premium-1.png\" alt=\"tài khoản Yousician Premium (1)\" height=\"500\" width=\"800\"&gt;&lt;em&gt;Người dùng có thể học cùng lúc cả 5 nhạc cụ: Guitar, Ukulele, piano, bass, thanh nhạc.&lt;/em&gt;&lt;/p&gt;&lt;h2&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Một số ưu và nhược điểm của Yousician Premium&lt;/strong&gt;&lt;/h2&gt;&lt;p&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Ưu điểm&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Bạn có thể học tập với lộ trình nội dung dễ hiểu, dễ dàng áp dụng&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Có đội ngũ nhân viên giàu kinh nghiệm, chất lượng nhất trong ngành.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Người học có thể học mọi lúc, mọi nơi chỉ cần thiết bị học có kết nối với Internet&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Nội dung bài học tại Yousician Premium được sắp xếp từ dễ đến khó với 2 phần Chords và Fingerstyle. Cho nên bạn đừng cảm thấy ngại khi mình là người mới bắt đầu học.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Tài liệu học tập miễn phí nên bạn chỉ cần tải ứng dụng về máy&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Yousician Premium được thiết kế với giao diện đơn giản, tương tác thân thiện và dễ sử dụng.&lt;/span&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Nhược điểm&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Yousician Premium có một nhược điểm là bị giới hạn 5 nhạc cụ, nên nếu người học muốn học nhạc cụ khác thì sẽ không đáp ứng được nhu cầu học của họ&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Hầu hết toàn bộ các bài học trên Yousician Premium đều do người thuyết minh thay vì có người sẽ hướng dẫn và ít tác động hơn.&amp;nbsp;&lt;/span&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;</p>', 'uploads/products/media_65fb1a947ea07.webp', 590000, 0, NULL, NULL, 1, 'Nâng Cấp', 'nang-cap', 0, '0', 0, 2, 5, NULL, '[\"1\",\"3\",\"4\"]', NULL, '2024-03-20 10:19:16', '2024-03-20 10:19:16'),
(15, 'Tài khoản Steezy 12 tháng | Học các điệu nhảy hot trend', 'tai-khoan-steezy-12-thang-hoc-cac-dieu-nhay-hot-trend', '‘- Không đăng nhập trên nhiều thiết bị\r\n\r\n– Không chia sẻ tài khoản cho người khác\r\n\r\n– Không thay đổi thông tin tài khoản', '<p>Nhảy, khiêu vũ là một trong những hoạt động giải trí, niềm đam mê phổ biến thường thấy ở nhiều bạn trẻ ngày nay. Và một trong những website dạy nhảy trực tuyến chất lượng nhất hiện nay mà bạn có thể tham khảo đó là&nbsp;<a href=\"https://play.google.com/store/apps/details?id=co.steezy.app&amp;hl=vi&amp;gl=US#:~:text=STEEZY%20l%C3%A0%20ph%C3%B2ng%20t%E1%BA%ADp%20nh%E1%BA%A3y,v%E1%BB%8B%20h%C6%A1n%20%C4%91%E1%BB%83%20kh%C3%A1m%20ph%C3%A1.\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(255, 0, 0); background-color: transparent;\">Steezy</a>. Bài viết sau đây sẽ giới thiệu cho bạn sản phẩm này12 tháng bao trọn gọn thế giới nhảy múa chuyên nghiệp.</p><h2><strong>Steezy là gì?</strong></h2><p>Steezy là một nền tảng phòng tập nhảy trực tuyến số 1 trên thiết bị Android hoặc TV thông minh hiện nay. Website cung cấp hơn 1500 lớp học với hàng trăm chương trình dạy nhảy trực tuyến cho những người có đam mê với những bước nhảy.</p><p>Cho dù bạn là ai, bạn vẫn sẽ được các chuyên gia nhảy chuyên nghiệp tại Steezy hỗ trọ nhiệt tình. Hiện có 4 cấp độ để mọi người có thể lựa chọn khi tham gia như:</p><ul><li>Brand New</li><li>Beginner</li><li>Intermediate</li><li>Advanced</li></ul><p>Thông qua những video giảng dạy đến từ các chuyên gia trong lĩnh vực nhảy, người tham gia sẽ dần nhận thấy được sự tiến bộ của mình. Các chuyên gia luôn chỉ bảo một cách đầy chi tiết kết hợp cùng nhiều góc quay chi tiết để các thành viên có thể tiện theo dõi.</p><p><img src=\"https://gamikey.com/wp-content/uploads/2022/07/steezy-12-thang-1.webp\" alt=\"Steezy là gì\" height=\"480\" width=\"800\"><em>Steezy là gì</em></p><p>Xem thêm:&nbsp;<a href=\"https://gamikey.com/tai-khoan-tunnelbear-vpn-12-thang/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(255, 0, 0); background-color: transparent;\">Tài khoản Tunnelbear VPN 12 tháng</a></p><p>Ngoài ra mọi người hoàn toàn có thể tham gia các chương trình thi nhảy, các challenge được các chuyên gia cũng như các thành viên khác đặt ra. Vừa có thể trải nghiệm nhiều điều mới mẻ vừa có thể nhận được những món quà vinh danh đặc biệt đến từ Steezy.</p><p>Người tham gia học nhảy tại đây sẽ được lựa chọn các video dạy nhảy phù hợp với phong cách mà bạn theo đuổi. Hiện tại mọi người có thể lựa chọn đa dạng các phong cách nhảy như sau:</p><ul><li>Hiphop</li><li>Contemporary</li><li>K-pop</li><li>Dance Workout</li><li>Salsa</li><li>House</li><li>Ballet</li><li>Lite Feet</li><li>Popping</li><li>Krump</li><li>Locking</li><li>Jazz Funk</li><li>Heels…</li></ul><h2><strong>Tại sao bạn nên mua tài khoản Steezy 12 tháng tại Gamikey?</strong></h2><p>Hiện nay, mọi người muốn tham gia học nhảy tại nền tảng này thì cần phải tiến hành tạo tài khoản. Có 2 loại tài khoản, đó là tài khoản Steezy theo tháng và 12 tháng. Chúng tôi muốn khuyên bạn lựa chọn tài khoản Steezy 12 tháng bởi những ưu điểm sau đây</p><h3><strong>Nhảy múa không giới hạn</strong></h3><p>Đến với Steezy, bạn có thể tham gia học nhảy ở bất kỳ các lớp hướng dẫn các phong cách nhảy khác nhau mọi lúc mọi nơi. Đa dạng các phong cách nhảy khác nhau sẽ được cung cấp cho bạn, như K-pop, Jazz, Hiphop, Heels….</p><p>Không chỉ là dạy bạn sao chép lại những hướng dẫn động tác mà còn giúp bạn lấy lại sự tự tin và nắm được cái hồn trong từng điệu nhảy nữa. Các tính năng sử dụng video nhảy tại đây cũng sẽ là những công cụ hữu hiệu giúp bạn học nhảy đạt hiệu quả tối đa nhất.</p><p><img src=\"https://gamikey.com/wp-content/uploads/2022/07/steezy-12-thang-2.webp\" alt=\"Tại sao bạn nên mua tài khoản Steezy 12 tháng\" height=\"480\" width=\"800\"><em>Tại sao bạn nên mua tài khoản Steezy 12 tháng</em></p><p>Xem thêm:&nbsp;<a href=\"https://gamikey.com/tai-khoan-panda-vpn-12-thang/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(255, 0, 0); background-color: transparent;\">Tài khoản Panda VPN 12 tháng</a></p><h3><strong>Học nhảy từ những chuyên gia hàng đầu</strong></h3><p>Hiện nay có rất nhiều các nền tảng hay phương thức giúp bạn học nhảy. Tuy nhiên nếu bạn thực sự muốn thành thạo các phong cách nhảy hiện đại ngày nay, bạn cần phải học từ những vũ công chuyên nghiệp và những người hướng dẫn giỏi nhất.</p><p>STEEZY đảm bảo sẽ mang đến sự giảng dạy, biên đạo chuyên nghiệp của một trường dạy khiêu vũ đẳng cấp thế giới dành cho bạn.</p><p>Bạn sẽ được hướng dẫn chi tiết từng bước, từng kỹ thuật cơ bản nhất để giúp những người học, kể cả những người mới biết đến nhảy có thể tự tin mà học nhảy. Không những thế, bạn hoàn toàn có thể gửi các thành quả luyện tập cho người hướng dẫn để được nhận xét và góp ý thẳng thắn nhé.</p><h3><strong>Cộng đồng nhảy Steezy lành mạnh &amp; chuyên nghiệp</strong></h3><p>Khi đăng ký 12 tháng, mọi người còn được tham gia thực hiện những đoạn video nhảy cùng các vũ công học nhảy đến từ hơn 100 quốc gia trên thế giới. Bạn sẽ thấy được sự cạnh tranh và những bước nhảy điệu nghệ của họ qua từng cuộc thi đấu nhảy quốc tế do Steezy tổ chức.</p><p>Hay bạn còn được chia sẻ ý kiến, phản hồi về những đoạn video clip do các người chơi up lên. Có thể nói cộng đồng người tham gia Steezy cực lành mạnh, chuyên nghiệp và hết mình với đam mê nhảy.</p><h3><strong>Đa dạng các thao tác sử dụng</strong></h3><p>Bạn sẽ được cung cấp các thao tác xem và sử dụng video dạy nhảy một cách cực kỳ đa dạng. Trước tiên, công nghệ phòng thu kỹ thuật số độc đáo cho phép người tham gia xem các giáo viên dạy nhảy – khiêu vũ biểu diễn các động tác từ các góc độ khác nhau.</p><p>Bạn hoàn toàn có thể tiến hành phát lại một phần video hay điều chỉnh tốc độ ở bất kỳ nhịp nào sao cho phù hợp với bản thân. Hay còn có thể chơi bất kỳ động tác nào cùng người hướng dẫn dạy nhảy cho mình thông qua webcam…</p><p><img src=\"https://gamikey.com/wp-content/uploads/2022/07/steezy-12-thang-3.webp\" alt=\"Đa dạng các thao tác sử dụng\" height=\"480\" width=\"800\"><em>Đa dạng các thao tác sử dụng</em></p><p>Người sử dụng tài khoản Steezy 12 tháng còn có thể tiến hành lưu các lớp học yêu thích để có thể xem lại nhiều lần tùy thích. Hoặc có thể tham gia các chương trình nhảy có hướng dẫn của người hướng dẫn, qua đó có thể khiến bạn làm chủ được phong cách nhảy cũng như sự tự tin của bạn khi sải bước nhảy.</p><h3><br></h3>', 'uploads/products/media_65fb1bb93714e.webp', 420000, 0, NULL, NULL, 1, 'Tài Khoản', 'tai-khoan', 7, '0', 0, 2, 5, NULL, '[\"1\",\"3\"]', NULL, '2024-03-20 10:24:09', '2024-03-31 08:20:57'),
(16, 'Tài khoản Codecademy Pro 12 tháng – Học lập trình trực tuyến', 'tai-khoan-codecademy-pro-12-thang-hoc-lap-trinh-truc-tuyen', '– Nhận chứng chỉ khoá học sau khi hoàn thành khoá học\r\n\r\n– Tiết kiệm hơn 90% chi phí so với mua trực tiếp.\r\n\r\n– Bảo hành 1 đổi 1 trong suốt thời gian sử dụng.\r\n\r\nĐiều kiện bảo hành:\r\n\r\n– Không thay đổi email, mật khẩu của tài khoản\r\n\r\n– Không chia sẻ tài khoản cho bất kì ai.', '<p><em>Tài khoản dành cho những người yêu thích bộ môn lập trình máy tính là tài khoản&nbsp;</em><strong><em>Codecademy Pro</em></strong><em>. Đây là phần mềm học lập trình trực tuyến chất lượng và phổ biến nhất hiện nay. Nền tảng cung cấp các khóa học xoay quanh 12 ngôn ngữ lập trình. Bao gồm Java, Go, SQL, Python, Sass, HTML, C++, C#, CSS, Swift, JavaScript và Ruby.</em></p><h2><strong>Tài khoản Codecademy Pro là gì?</strong></h2><p>Codecademy là một phần mềm học lập trình trực tuyến đến từ Mỹ. Phần mềm này được thành lập bởi Ryan Bubinski và&nbsp;<a href=\"https://en.wikipedia.org/wiki/Zach_Sims\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(225, 89, 39); background-color: transparent;\">Zach Sims</a>&nbsp;vào tháng 8/2011. Tài khoản Codecademy giúp người dùng cải thiện kỹ năng kỹ năng làm một trang Web với các ngôn ngữ lập trình đã học. Nền tảng cung cấp các chương trình miễn phí và có trả phí về bộ môn lập trình. Tất nhiên, muốn học nâng cao hơn thì người dùng cần trả phí theo mức quy định.</p><p><img src=\"https://gamikey.com/wp-content/uploads/2022/03/Codeacademy-2-1.jpg.webp\" alt=\"Giao diện của tài khoản Codecademy khi mở ra\" height=\"385\" width=\"800\"><em>Giao diện của Codecademy khi mở ra</em></p><p>Các nền tảng trên tài khoản Codecademy Pro được đánh giá là lò đào tạo lập trình trực tuyến tốt. Bởi, các chương trình học bám sát xu hướng công nghệ hiện đại và mang tính thực tế cao. Chưa có nền tảng nào có phần mềm cùng lĩnh vực đánh bại được ứng dụng này.</p><h2><strong>Đặc điểm tính năng của tài khoản Codecademy?</strong></h2><p>Mặc dùng nhiều nền tảng lập trình được ra đời mới. Nhưng Codecademy luôn là lựa chọn hàng đầu cho người học lập trình hiện nay. Nhiều đặc tính nổi bật về tài khoản Codecademy Pro mà bạn nên sử dụng nó. Các đặc tính như sau:</p><h3><strong>Dễ sử dụng</strong></h3><p>Người sử dụng cần đầu tiên là tính dễ sử dụng. Với tài khoản Codecademy Pro được đánh giá là giao diện dễ sử dụng. Giao diện này được nhiều học viên lập trình thích thú. Giao diện bắt mắt và sinh động bố cục được sắp xếp khoa học. Điều này giúp cho người dùng dễ dàng tìm được thông tin, chương trình mình muốn học.</p><h3><strong>Nội dung chất lượng</strong></h3><p>Nội dung trên ứng dụng đa dạng và vô cùng chất lượng. Tài khoản Codecademy cung cấp đầy đủ các khóa học liên quan đến bộ môn lịch trình.</p><p>Hơn thế nữa, nhà phát hành còn liên tục cập nhập những kiến thức mới. Cũng như sự thay đổi của lĩnh vực công nghệ, thông tin. Để từ đó, người dùng có thể nắm bắt được xu hướng lập trình trong tương lai.</p><p><img src=\"https://gamikey.com/wp-content/uploads/2022/03/Codeacademy-1.jpg.webp\" alt=\"Nền tảng cung cấp nhiều chủ đề về lập trình cho người dùng lựa chọn\" height=\"385\" width=\"800\"><em>Nền tảng cung cấp nhiều chủ đề về lập trình cho người dùng lựa chọn</em></p><h3><strong>Đa dạng chủ đề đào tạo</strong></h3><p>Hiện tại, tài khoản Codecademy cung cấp nhiều chủ đề về lập trình cho người dùng lựa chọn. Chẳng hạn như:</p><ul><li>Code Fondations</li><li>Web Development</li><li>Computer Science</li><li>Data Science</li><li>Developer Tool</li><li>Game Development</li><li>Mobile Development</li><li>Data Visualization</li><li>Web Design</li><li>Machine Learning</li></ul><p>Tài khoản Codecademy Pro cho phép bạn khám phá tìm hiểu hàng chục khóa học về 14 ngôn ngữ lập trình như: HTML &amp; CSS; Go; Bash/Shell; PHP; Python; Ruby; JavaScript; C++; Swift; Java’ R; Koylin; SQL; C#.</p><h3><strong>Mang lại cảm giác ham học hỏi</strong></h3><p>Tài khoản Codecademy Pro giúp tập trung vào việc việc thực hành hơn là chỉ học với những lý thuyết khô khan. Tăng niềm yêu thích đối với việc học lập trình hơn. Trong ứng dụng có chức năng trao huy hiệu cho những người chăm chỉ và công nhận năng lực của bạn.</p><p>Codecademy Pro không chỉ dạy tường tận về bộ môn lập trình mà còn nâng cao động lực cho người học. Bằng cách trao huy hiệu khá học sau khi hoàn thành xuất sắc các chương trình. Tất cả những kỹ năng mà bạn đạt được sẽ hiển thị trên bảng thông tin tài khoản cá nhân. Người dùng có thể show kết quả này khi đi phỏng vấn xin việc…</p><h2><strong>Lợi ích của tài khoản Codecademy Pro đối với người học</strong></h2><p>Tài khoản&nbsp;<strong>Codecademy Pro</strong>&nbsp;có những lợi ích gì với người học? Sau đây là lợi ích với người sở hữu tài khoản học lập trình này.</p><ul><li>So với việc sử dụng free miễn với phí bằng tài khoản Codecademy Pro, bạn sẽ được có quyền truy cập không giới hạn vào toàn bộ khóa chương trình học có sẵn trên nền tảng ứng dụng. Điều này có nghĩa là bạn được có thể học tất cả 14 ngôn ngữ lập trình trên Codecademy.</li><li>Học tìm hiểu những gì bạn yêu thích và được nhận hướng dẫn từng bước để thực cải hành thiện nâng cao kỹ năng được của bạn.</li><li>Được hỗ trợ bởi cộng đồng học sinh viên Codecademy Pro và các giáo giảng viên chất lượng của Codecademy.</li><li>Tiếp xúc với các kiến lực lĩnh vực công nghệ mới được cập nhật liên tục trên ứng dụng để học lập trình.</li></ul><p>Với hơn 45 triệu người dùng, tài khoản&nbsp;<a href=\"https://www.codecademy.com/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(225, 89, 39); background-color: transparent;\">Codecademy Pro</a>&nbsp;đã là khẳng minh định chứng cho những lợi ích mà nó đem mang lại cho cộng đồng sinh viên, những người muốn tìm hiểu về lĩnh vực ngôn ngữ lập trình.</p><h2><strong>So sánh giá tài khoản Codecademy Pro tại Gamikey và giá thị trường</strong></h2><h3><strong>Giá tài khoản Codecademy tại Gamikey so với giá gốc</strong></h3><p>So với giá gốc, giá bán tài khoản Codecademy tại Gamikey thì rẻ hơn rất nhiều. Bảng dưới đây thể hiện điều đó bạn cùng xem nhé.</p><p>GIÁ CODECADEMY TẠI GAMIKEYGIÁ GỐC359.000 VNĐ/12 tháng (37.500 VNĐ/ tháng)€ 13/1 tháng (tương đương 344.903 VNĐ)</p><p>Với mức giá như trên thì chỉ 450.000 VNĐ là bạn có ngay một tài khoản Codecademy sử dụng trong 12 tháng. So với giá 1 tháng 344.903 VNĐ trên tháng tiết kiệm lấy bao nhiêu. Không những thế chất lương lại không thay đổi xứng đáng đồng hành cùng bạn trong quá trình học tập và làm việc của bạn.</p><p><img src=\"https://gamikey.com/wp-content/uploads/2022/03/Codeacademy-3.jpg.webp\" alt=\"Giá bản quyền cho gói là Codecademy Pro € 13/1 tháng\" height=\"385\" width=\"800\"></p><h3><br></h3>', 'uploads/products/media_65fb1bffe8e6a.webp', 359000, 0, NULL, NULL, 1, 'Tài Khoản', 'tai-khoan', 9, '0', 0, 2, 4, NULL, '[\"1\",\"3\"]', NULL, '2024-03-20 10:25:19', '2024-03-31 08:20:39'),
(17, 'Monster Hunter World: Iceborne (Master Edition) Steam Key GLOBAL', 'monster-hunter-world-iceborne-master-edition-steam-key-global', 'Yêu cầu hệ thống tối thiểu Windows\r\n– Yêu cầu hệ thống: WINDOWS 7, 8, 8.1, 10 (yêu cầu 64-bit)\r\n– Bộ xử lý: Intel Core i5-4460, 3.20GHz hoặc AMD FX-6300\r\n– Bộ nhớ: 8 GB RAM\r\n– Đồ họa: NVIDIA GeForce GTX 760 hoặc AMD Radeon R7 260x (VRAM 2GB)\r\nYêu cầu hệ thống đề nghị\r\n– Yêu cầu hệ thống: WINDOWS 7, 8, 8.1, 10 (yêu cầu 64-bit)\r\n– Bộ xử lý: Intel Core i7 3770 3.4GHz hoặc Intel Core i3 8350 4GHz hoặc AMD Ryzen 5 1500X\r\n– Bộ nhớ: 8 GB RAM\r\n– Đồ họa: NVIDIA GeForce GTX 1060 (VRAM 3GB) hoặc AMD Radeon RX 570 (VRAM 4GB)\r\nChi tiết khác\r\n– Ngôn ngữ: Tiếng Anh\r\n– Ngày phát hành: 9 tháng 1 năm 2020\r\n– Nhà xuất bản: CAPCOM Co., Ltd.\r\n– Nhà phát triển: CAPCOM Co., Ltd.\r\n– Hỗ trợ trên: Windows', '<h2><strong>Giới thiệu về Monster Hunter World: Iceborne (Master Edition) Steam Key GLOBAL</strong></h2><p><span style=\"color: rgb(0, 0, 0);\">Mua Monster Hunter World: Iceborne (Master Edition) Steam Key GLOBAL để nhận được trò chơi cơ sở cộng với bản mở rộng! Lượng nội dung mới là rất lớn đến nỗi Iceborne có thể gần như được coi là một trò chơi spin-off hoàn toàn mới hoặc thậm chí là phần tiếp theo. Giống như bản gốc, Monster Hunter World: Iceborne được phát triển và xuất bản bởi Capcom. DLC này mở rộng thành công thế giới chi tiết được trình bày trong trò chơi cơ sở và giới thiệu một cài đặt mới với chủ đề mùa đông mà không hy sinh bất cứ thứ gì đã tạo nên bản sắc và sự quyến rũ của Monster Hunter: World cơ sở. Lưu ý – trò chơi cơ sở là yêu cầu để chơi DLC này.</span></p><p><img src=\"https://gamikey.com/wp-content/uploads/2023/11/Monster-Hunter-World-Iceborne-Master-Edition-Steam-Key-GLOBAL.png\" alt=\"Monster Hunter World Iceborne (Master Edition) Steam Key GLOBAL\" height=\"500\" width=\"800\"></p><h3><strong style=\"color: rgb(0, 0, 0);\">Chiến đấu với một hệ sinh thái toàn bộ sinh vật huyền thoại!</strong></h3><p><span style=\"color: rgb(0, 0, 0);\">Sau khi bạn đã chơi qua phiên bản gốc Monster Hunter: World, khi bạn mua key Monster Hunter World: Iceborne, bạn sẽ cảm thấy quen thuộc ngay khi trở lại. Cấu trúc trò chơi gốc vẫn giữ nguyên – bạn săn lùng những con quái vật huyền thoại độc đáo, thu thập tài nguyên từ xác chúng, môi trường sống và vùng săn bắn để chế tạo trang bị, vũ khí và giáp để đối đầu với những con quái vật mạnh mẽ hơn. Iceborne DLC mở rộng mạnh mẽ nội dung của phiên bản gốc, giới thiệu các loại quái vật mới và các loài phụ hoặc phân loại của những con đã xuất hiện trước đó.</span></p><h3><strong style=\"color: rgb(0, 0, 0);\">Vùng đất tuyết phủ Hoarfrost Reach</strong></h3><p><span style=\"color: rgb(0, 0, 0);\">Bản mở rộng Iceborne đưa người chơi đến một vùng đất mới được phủ bởi tuyết mang tên Hoarfrost Reach. Mặc dù địa điểm mới này có chủ đề mùa đông, nhưng khi bạn mua key Monster Hunter World: Iceborne, bạn sẽ thấy rằng nó vẫn bao gồm nhiều sự đa dạng: mặt núi, suối nước nóng, hang động dưới lòng đất và cánh đồng phủ tuyết tạo nên khu vực mới này. Thị trấn Seliana sẽ phục vụ như một trung tâm xã hội giữa các nhiệm vụ săn bắn. Bạn sẽ tương tác với các NPC, nâng cấp trang bị và trải qua thời gian trong một căn phòng cá nhân có thể tùy chỉnh mạnh mẽ!</span></p><p><img src=\"https://gamikey.com/wp-content/uploads/2023/11/Monster-Hunter-World-Iceborne-Master-Edition-Steam-Key-GLOBAL-1.png\" alt=\"Monster Hunter World Iceborne (Master Edition) Steam Key GLOBAL (1)\" height=\"500\" width=\"800\"><em>Vùng đất tuyết phủ Hoarfrost Reach</em></p><h3><strong style=\"color: rgb(0, 0, 0);\">Cải thiện chất lượng cuộc sống</strong></h3><p><span style=\"color: rgb(0, 0, 0);\">Không ai xa lạ với sự phức tạp của giao diện người dùng trong các trò chơi Monster Hunter của Capcom, nó không tuân thủ các xu hướng thông dụng và yêu cầu người chơi nhiều sự cống hiến nhất. Bạn sẽ thường xuyên phải quản lý trang bị và cây kỹ năng của mình. Mua key Monster Hunter World: Iceborne để tận hưởng nhiều cải tiến thân thiện với người mới bao gồm giao diện người dùng đơn giản hơn, khả năng cưỡi một con quái nhỏ vào trận đấu và sử dụng Clutch Claw đểđào vào các bộ phận cơ thể của quái vật lớn, làm yếu đi và làm chúng dễ bị tấn công. Tất cả điều này chỉ chiếm một phần nhỏ trong số lượng nội dung mới được trình bày trong DLC xuất sắc này!</span></p><h2><strong style=\"color: rgb(0, 0, 0);\">Cách mua Monster Hunter World: Iceborne (Master Edition) Steam Key GLOBAL tại Gamikey</strong></h2><p><span style=\"color: rgb(0, 0, 0);\">Để mua&nbsp;</span><a href=\"https://gamikey.com/monster-hunter-world-iceborne-master-edition-steam-key-global/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(225, 89, 39); background-color: transparent;\">Monster Hunter World: Iceborne (Master Edition) Steam Key GLOBAL</a><span style=\"color: rgb(0, 0, 0);\">&nbsp;tại</span>&nbsp;<a href=\"https://gamikey.com/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(225, 89, 39); background-color: transparent;\">Gamikey</a>,&nbsp;<span style=\"color: rgb(0, 0, 0);\">bạn có thể tham khảo các bước sau:</span></p><ul><li><strong style=\"color: rgb(0, 0, 0);\">Bước 1:</strong><span style=\"color: rgb(0, 0, 0);\">&nbsp;Truy cập vào trang web của Gamikey.com</span></li><li><strong style=\"color: rgb(0, 0, 0);\">Bước 2:</strong><span style=\"color: rgb(0, 0, 0);\">&nbsp;Tìm kiếm “ Monster Hunter World: Iceborne (Master Edition) Steam Key GLOBAL” trong thanh tìm kiếm.</span></li><li><strong style=\"color: rgb(0, 0, 0);\">Bước 3:</strong><span style=\"color: rgb(0, 0, 0);\">&nbsp;Chọn sản phẩm bạn muốn mua.</span></li><li><strong style=\"color: rgb(0, 0, 0);\">Bước 4:</strong><span style=\"color: rgb(0, 0, 0);\">&nbsp;Thêm sản phẩm vào giỏ hàng và tiến hành thanh toán.</span></li></ul><p><span style=\"color: rgb(0, 0, 0);\">Trên đây là những thông tin về Monster Hunter World: Iceborne (Master Edition) Steam Key GLOBAL ở trong mục ”</span>&nbsp;<a href=\"https://gamikey.com/game/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(225, 89, 39); background-color: transparent;\">Game</a>”&nbsp;<span style=\"color: rgb(0, 0, 0);\">tại Gamikey. Ngoài ra Gamikey còn cung cấp nhiều tài khoản Premium bản quyền giá rẻ, nhanh chóng và nếu bạn có bất kỳ khó khăn gì, hãy liên hệ với đội ngũ hỗ trợ.</span></p><p><img src=\"https://gamikey.com/wp-content/uploads/2023/11/Monster-Hunter-World-Iceborne-Master-Edition-Steam-Key-GLOBAL-2.png\" alt=\"Monster Hunter World Iceborne (Master Edition) Steam Key GLOBAL (2)\" height=\"500\" width=\"800\"></p>', 'uploads/products/media_65fb1c94007e0.jpeg', 990000, 0, NULL, NULL, 1, 'Key', 'key', 27, '0', 0, 3, NULL, NULL, '[\"1\",\"5\"]', NULL, '2024-03-20 10:27:48', '2024-03-31 08:19:24');
INSERT INTO `products` (`id`, `name`, `slug`, `short_description`, `description`, `image`, `price`, `discount_price`, `discount_start_date`, `discount_end_date`, `status`, `type`, `slug_type`, `quantity`, `search`, `purchased`, `category_id`, `sub_category_id`, `brand_id`, `tags_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(21, 'Nâng cấp Elsa Premium chính chủ 9 tháng', 'nang-cap-elsa-premium-chinh-chu-9-thang', 'Đăng nhập tối đa 3 thiết bị, không giới hạn thiết bị chuyển đổi\r\n\r\nSử dụng trên Android, IOS\r\n\r\nNâng cấp trực tiếp từ tài khoản chính chủ, gửi kèm bill thanh toán nếu khách hàng yêu cầu\r\n\r\nTrọn bộ ELSA Premium bao gồm ELSA Pro, ELSA AI và Speech Analyzer – 1 năm', '<p>&lt;h2&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Giới thiệu về Elsa Premium là gì ?&lt;/strong&gt;&lt;/h2&gt;&lt;p&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Elsa Premium chính thức ra mắt vào tháng 9 năm 2023. Đây là gói học tiếng Anh cao cấp nhất của Elsa tính tới thời điểm hiện tại. Với gói Elsa Premium thì người dùng có thể thoải mái truy cập vào nhiều gói học và sử dụng những tính năng mới của Elsa&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=\"https://gamikey.com/wp-content/uploads/2023/10/tai-khoan-elsa-premium.png\" alt=\"tai khoan elsa premium\" height=\"500\" width=\"800\"&gt;&lt;/p&gt;&lt;h2&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Một số tính năng đặc biệt của gói Elsa Premium&lt;/strong&gt;&lt;/h2&gt;&lt;p&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Elsa Premium là sự kết hợp của 3 gói Elsa Pro, Elsa Speech Analyzer và Elsa AI&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Với Elsa Pro&lt;/strong&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Elsa Pro là gói học tiếng Anh cao cấp có trả phí, Elsa Premium được tích hợp đầy đủ những tính năng mà Elsa Pro đang cung cấp&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Học viên có thể thoải mái học mà không lo bị làm phiền bởi quảng cáo&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Kho bài tập đa dạng, phong phú: Elsa Pro với hơn 7.100+ bài học, 22 kỹ năng ngôn ngữ trọng tâm. Các bài tập mới luôn được cập nhật liên tục để nâng cao trải nghiệm của người dùng.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Elsa Pro có công cụ phân tích giọng nói chuyên sâu, với công cụ này giúp người học biết được ưu điểm và nhược điểm trong cách phát âm của mình&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Cung cấp lộ trình học tập cá nhân, theo trình độ và năng lực của từng học viên, đảm bảo học viên tiến bộ dần, không bị cảm thấy nản do lượng bài học quá nhiều.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Elsa Pro còn cung cấp công cụ quản lý giúp học viên theo dõi được tiến độ học tập của mình, biết được bản thân mình cần phải cải thiện kỹ năng nào&lt;/span&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Elsa Speech Analyzer&lt;/strong&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Đây là một công cụ phân tích giọng nói mà bạn có thể sử dụng để đánh giá khả năng phát âm của mình khi đối thoại trong cuộc sống như phỏng vấn, đi mua sắm, trò chuyện hàng ngày, ….&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Elsa Speech Analyzer có thể phân tích khả năng phát âm của bạn với nhiều khía cạnh:&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Phát âm: Elsa Speech Analyzer sẽ đánh giá xem bạn phát âm sai chỗ nào, phát âm đạt được bao nhiêu phần trăm giống với người bản địa.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Ngữ điệu: Elsa Speech Analyzer sẽ gợi ý cho bạn nên nhấn trọng âm vào những từ nào để tăng hiệu quả truyền đạt, đồng thời gợi ý cho bạn cao độ, giọng nói phù hợp với nội dung và hoàn cảnh hội thoại.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Ngữ pháp: Công cụ này sẽ chấm điểm ngữ pháp bạn dùng có đúng không, đồng thời sẽ gợi ý những ngữ pháp nâng cao mà bạn có thể thay thế.&lt;/span&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Elsa AI&lt;/strong&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Đây là một công cụ mới nhất của Elsa, Elsa AI được tích hợp với công cụ trí tuệ nhân tạo để đem lại một trải nghiệm tuyệt vời đến học viên&amp;nbsp;&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Elsa AI giống như một người bạn đồng hành trong cuộc trò chuyện như: mua sắm, phỏng vấn, đi chơi,… Qua đó để nâng cao khả năng phản xạ khi giao tiếp tiếng Anh của bạn. Elsa AI sẽ đánh giá khả năng tiếng Anh của bạn, từ đó đưa ra những bài học phù hợp với trình độ hiện tại của bạn.&amp;nbsp;&lt;/span&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;img src=\"https://gamikey.com/wp-content/uploads/2023/10/tai-khoan-elsa-premium-1.png\" alt=\"tai khoan elsa premium (1)\" height=\"500\" width=\"800\"&gt;&lt;/p&gt;&lt;h2&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Những ưu điểm nổi bật của Elsa Premium&lt;/strong&gt;&lt;/h2&gt;&lt;ul&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Elsa Premium là phiên bản cao cấp nên sẽ không bị làm phiền bởi những quảng cáo nào trong quá trình học, đem lại một trải nghiệm học tập tuyệt vời&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Cập nhật nội dung, bài học và chức năng mới mỗi 2 tuần.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Sử dụng công nghệ A.I để kiểm tra phát âm tiếng Anh và hướng dẫn sửa lỗi theo hệ thống phiên âm chuẩn IPA.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Kho từ điển Anh-Việt miễn phí giúp bạn tra cứu từ mới thông qua hình ảnh và phát âm.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Hệ thống ELSA Speak Pro sẽ chấm điểm theo các tiêu chí và đưa ra lời khuyên cho người dùng theo từng kĩ năng cụ thể. Từ đó, lộ trình học cá nhân hóa sẽ được thiết kế dựa trên trình độ của mỗi người dùng.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Trải nghiệm học tiếng Anh “1 kèm 1” với gia sư ảo ELSA, bạn sẽ được nhắc nhở học tập và xem báo cáo tiến độ mỗi ngày 24/7.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Với phiên bản Premium này thì Elsa còn được hỗ trợ bởi Elsa AI, bao gồm:&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Đặt ra các tình huống thường gặp như mua sắm, đi ăn nhà hàng, phỏng vấn, đi dạo, tán gẫu,…&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Với Elsa AI thì bạn có thể thoải mái trò chuyện mà không lo bị nói sai hay phát âm không đúng. Elsa AI sẽ là một người bạn đồng hành cùng bạn trong suốt quá trình học tiếng Anh.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Sau những cuộc trò chuyện, Elsa AI sẽ đưa ra những đánh giá chi tiết để bạn có thể khắc phục những điểm chưa tốt của mình.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Hơn 290 chủ đề từ vựng tiếng Anh, hơn 5.000 bài học và 25.000 bài luyện tập, giúp bạn nâng cao kỹ năng phát âm, nghe hiểu, dấu nhấn, và hội thoại.&amp;nbsp;&lt;/span&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;img src=\"https://gamikey.com/wp-content/uploads/2023/10/tai-khoan-elsa-premium-2.png\" alt=\"tai khoan elsa premium (2)\" height=\"500\" width=\"800\"&gt;&lt;/p&gt;&lt;h2&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Nâng cấp Elsa Premium chính chủ 12 tháng tại Gamikey&amp;nbsp;&lt;/strong&gt;&lt;/h2&gt;&lt;p&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Dưới đây là một số lợi ích khi bạn chọn nâng cấp&amp;nbsp;&lt;/span&gt;&lt;a href=\"https://gamikey.com/nang-cap-elsa-premium-chinh-chu-12-thang/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(225, 89, 39); background-color: transparent;\"&gt;tài khoản Elsa Premium&lt;/a&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;&amp;nbsp;tại&amp;nbsp;&lt;/span&gt;&lt;a href=\"https://gamikey.com/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(225, 89, 39); background-color: transparent;\"&gt;Gamikey&lt;/a&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;:&lt;/span&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Bảo hành 1 đổi 1:&lt;/strong&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;&amp;nbsp;Gamikey cam kết bảo hành 1 đổi 1 cho&amp;nbsp;&amp;nbsp;tài khoản Elsa Premium khi có lỗi xảy ra.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Giá cả hợp lý&lt;/strong&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;: Gamikey nâng cấp tài khoản Elsa Premium với giá cả phải chăng, đảm bảo uy tín và bản quyền.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Sử dụng email cá nhân:&lt;/strong&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;&amp;nbsp;Khi nâng cấp tài khoản Elsa Premium, bạn sẽ sử dụng email cá nhân của mình, giúp tăng cường bảo mật cho tài khoản của bạn.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Thanh toán linh hoạt:&amp;nbsp;&lt;/strong&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Gamikey cho phép bạn thanh toán qua các phương thức phổ biến như ATM, Internet Banking, và Momo.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Nhận key nhanh chóng:&lt;/strong&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;&amp;nbsp;Sau khi hoàn tất thông tin, Gamikey sẽ gửi tài khoản Elsa Premium cho bạn trong thời gian ngắn nhất có thể, thường chỉ từ 15 đến 20 phút.&lt;/span&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Để nâng cấp Elsa Premium chính chủ 12 tháng tại Gamikey, bạn có thể làm theo các bước sau:&lt;/span&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Bước 1&lt;/strong&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;: Truy cập vào trang web của Gamikey.com&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Bước 2:&amp;nbsp;&lt;/strong&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Tìm kiếm “Elsa Premium” trong thanh tìm kiếm.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Bước 3:&amp;nbsp;&lt;/strong&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Thêm sản phẩm vào giỏ hàng và tiến hành thanh toán.&lt;/span&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Lưu ý&lt;/strong&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;: Giá cả và chính sách bảo hành có thể thay đổi tùy thuộc vào Gamikey. Nếu bạn gặp vấn đề với thông tin đăng nhập, hãy liên hệ với đội ngũ CSKH của Gamikey.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=\"https://gamikey.com/wp-content/uploads/2023/10/tai-khoan-elsa-premium-3.png\" alt=\"tai khoan elsa premium (3)\" height=\"500\" width=\"800\"&gt;&lt;/p&gt;&lt;h2&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Một số câu hỏi thường gặp khi nâng cấp Elsa Premium&amp;nbsp;&lt;/strong&gt;&lt;/h2&gt;&lt;p&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;ELSA Premium sử dụng được trên mấy thiết bị?&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;ELSA, một ứng dụng học tiếng Anh hàng đầu, cho phép bạn sử dụng tối đa trên ba thiết bị khác nhau với một tài khoản. Điều này giúp tăng cường bảo mật và bảo vệ quyền lợi của người học. Tuy nhiên, nếu bạn cố gắng sử dụng tài khoản trên một thiết bị thứ tư, tài khoản của bạn trên thiết bị đó sẽ bị khóa.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Tài khoản Elsa Premium học Offline được không?&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Câu trả lời là không bởi vì ELSA chỉ hoạt động khi có kết nối internet do khối lượng dữ liệu lớn cần được xử lý.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;&amp;nbsp;Tài khoản ELSA Premium hiện có bao nhiêu bài học?&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;ELSA hiện tại có khoảng 6000 bài học, bao gồm hơn 29.000 bài luyện tập và hơn 261 chủ đề. Đây là một nguồn học phong phú giúp bạn nâng cao kỹ năng tiếng Anh của mình.&lt;/span&gt;&lt;/p&gt;</p>', 'uploads/products/media_6600cd90eb089.png', 899000, NULL, NULL, NULL, 1, 'Tài Khoản', 'tai-khoan', 12, '0', 0, 2, NULL, NULL, '[\"1\",\"3\"]', NULL, '2024-03-24 18:04:16', '2024-03-31 08:13:04'),
(22, 'Nâng cấp Elsa Premium chính chủ 6 tháng', 'nang-cap-elsa-premium-chinh-chu-6-thang', 'Đăng nhập tối đa 3 thiết bị, không giới hạn thiết bị chuyển đổi\r\n\r\nSử dụng trên Android, IOS\r\n\r\nNâng cấp trực tiếp từ tài khoản chính chủ, gửi kèm bill thanh toán nếu khách hàng yêu cầu\r\n\r\nTrọn bộ ELSA Premium bao gồm ELSA Pro, ELSA AI và Speech Analyzer – 6 tháng', '<p>&lt;h2&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Giới thiệu về Elsa Premium là gì ?&lt;/strong&gt;&lt;/h2&gt;&lt;p&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Elsa Premium chính thức ra mắt vào tháng 9 năm 2023. Đây là gói học tiếng Anh cao cấp nhất của Elsa tính tới thời điểm hiện tại. Với gói Elsa Premium thì người dùng có thể thoải mái truy cập vào nhiều gói học và sử dụng những tính năng mới của Elsa&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=\"https://gamikey.com/wp-content/uploads/2023/10/tai-khoan-elsa-premium.png\" alt=\"tai khoan elsa premium\" height=\"500\" width=\"800\"&gt;&lt;/p&gt;&lt;h2&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Một số tính năng đặc biệt của gói Elsa Premium&lt;/strong&gt;&lt;/h2&gt;&lt;p&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Elsa Premium là sự kết hợp của 3 gói Elsa Pro, Elsa Speech Analyzer và Elsa AI&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Với Elsa Pro&lt;/strong&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Elsa Pro là gói học tiếng Anh cao cấp có trả phí, Elsa Premium được tích hợp đầy đủ những tính năng mà Elsa Pro đang cung cấp&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Học viên có thể thoải mái học mà không lo bị làm phiền bởi quảng cáo&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Kho bài tập đa dạng, phong phú: Elsa Pro với hơn 7.100+ bài học, 22 kỹ năng ngôn ngữ trọng tâm. Các bài tập mới luôn được cập nhật liên tục để nâng cao trải nghiệm của người dùng.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Elsa Pro có công cụ phân tích giọng nói chuyên sâu, với công cụ này giúp người học biết được ưu điểm và nhược điểm trong cách phát âm của mình&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Cung cấp lộ trình học tập cá nhân, theo trình độ và năng lực của từng học viên, đảm bảo học viên tiến bộ dần, không bị cảm thấy nản do lượng bài học quá nhiều.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Elsa Pro còn cung cấp công cụ quản lý giúp học viên theo dõi được tiến độ học tập của mình, biết được bản thân mình cần phải cải thiện kỹ năng nào&lt;/span&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Elsa Speech Analyzer&lt;/strong&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Đây là một công cụ phân tích giọng nói mà bạn có thể sử dụng để đánh giá khả năng phát âm của mình khi đối thoại trong cuộc sống như phỏng vấn, đi mua sắm, trò chuyện hàng ngày, ….&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Elsa Speech Analyzer có thể phân tích khả năng phát âm của bạn với nhiều khía cạnh:&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Phát âm: Elsa Speech Analyzer sẽ đánh giá xem bạn phát âm sai chỗ nào, phát âm đạt được bao nhiêu phần trăm giống với người bản địa.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Ngữ điệu: Elsa Speech Analyzer sẽ gợi ý cho bạn nên nhấn trọng âm vào những từ nào để tăng hiệu quả truyền đạt, đồng thời gợi ý cho bạn cao độ, giọng nói phù hợp với nội dung và hoàn cảnh hội thoại.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Ngữ pháp: Công cụ này sẽ chấm điểm ngữ pháp bạn dùng có đúng không, đồng thời sẽ gợi ý những ngữ pháp nâng cao mà bạn có thể thay thế.&lt;/span&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Elsa AI&lt;/strong&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Đây là một công cụ mới nhất của Elsa, Elsa AI được tích hợp với công cụ trí tuệ nhân tạo để đem lại một trải nghiệm tuyệt vời đến học viên&amp;nbsp;&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Elsa AI giống như một người bạn đồng hành trong cuộc trò chuyện như: mua sắm, phỏng vấn, đi chơi,… Qua đó để nâng cao khả năng phản xạ khi giao tiếp tiếng Anh của bạn. Elsa AI sẽ đánh giá khả năng tiếng Anh của bạn, từ đó đưa ra những bài học phù hợp với trình độ hiện tại của bạn.&amp;nbsp;&lt;/span&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;img src=\"https://gamikey.com/wp-content/uploads/2023/10/tai-khoan-elsa-premium-1.png\" alt=\"tai khoan elsa premium (1)\" height=\"500\" width=\"800\"&gt;&lt;/p&gt;&lt;h2&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Những ưu điểm nổi bật của Elsa Premium&lt;/strong&gt;&lt;/h2&gt;&lt;ul&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Elsa Premium là phiên bản cao cấp nên sẽ không bị làm phiền bởi những quảng cáo nào trong quá trình học, đem lại một trải nghiệm học tập tuyệt vời&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Cập nhật nội dung, bài học và chức năng mới mỗi 2 tuần.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Sử dụng công nghệ A.I để kiểm tra phát âm tiếng Anh và hướng dẫn sửa lỗi theo hệ thống phiên âm chuẩn IPA.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Kho từ điển Anh-Việt miễn phí giúp bạn tra cứu từ mới thông qua hình ảnh và phát âm.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Hệ thống ELSA Speak Pro sẽ chấm điểm theo các tiêu chí và đưa ra lời khuyên cho người dùng theo từng kĩ năng cụ thể. Từ đó, lộ trình học cá nhân hóa sẽ được thiết kế dựa trên trình độ của mỗi người dùng.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Trải nghiệm học tiếng Anh “1 kèm 1” với gia sư ảo ELSA, bạn sẽ được nhắc nhở học tập và xem báo cáo tiến độ mỗi ngày 24/7.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Với phiên bản Premium này thì Elsa còn được hỗ trợ bởi Elsa AI, bao gồm:&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Đặt ra các tình huống thường gặp như mua sắm, đi ăn nhà hàng, phỏng vấn, đi dạo, tán gẫu,…&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Với Elsa AI thì bạn có thể thoải mái trò chuyện mà không lo bị nói sai hay phát âm không đúng. Elsa AI sẽ là một người bạn đồng hành cùng bạn trong suốt quá trình học tiếng Anh.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Sau những cuộc trò chuyện, Elsa AI sẽ đưa ra những đánh giá chi tiết để bạn có thể khắc phục những điểm chưa tốt của mình.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Hơn 290 chủ đề từ vựng tiếng Anh, hơn 5.000 bài học và 25.000 bài luyện tập, giúp bạn nâng cao kỹ năng phát âm, nghe hiểu, dấu nhấn, và hội thoại.&amp;nbsp;&lt;/span&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;img src=\"https://gamikey.com/wp-content/uploads/2023/10/tai-khoan-elsa-premium-2.png\" alt=\"tai khoan elsa premium (2)\" height=\"500\" width=\"800\"&gt;&lt;/p&gt;&lt;h2&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Nâng cấp Elsa Premium chính chủ 12 tháng tại Gamikey&amp;nbsp;&lt;/strong&gt;&lt;/h2&gt;&lt;p&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Dưới đây là một số lợi ích khi bạn chọn nâng cấp&amp;nbsp;&lt;/span&gt;&lt;a href=\"https://gamikey.com/nang-cap-elsa-premium-chinh-chu-12-thang/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(225, 89, 39); background-color: transparent;\"&gt;tài khoản Elsa Premium&lt;/a&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;&amp;nbsp;tại&amp;nbsp;&lt;/span&gt;&lt;a href=\"https://gamikey.com/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(225, 89, 39); background-color: transparent;\"&gt;Gamikey&lt;/a&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;:&lt;/span&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Bảo hành 1 đổi 1:&lt;/strong&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;&amp;nbsp;Gamikey cam kết bảo hành 1 đổi 1 cho&amp;nbsp;&amp;nbsp;tài khoản Elsa Premium khi có lỗi xảy ra.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Giá cả hợp lý&lt;/strong&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;: Gamikey nâng cấp tài khoản Elsa Premium với giá cả phải chăng, đảm bảo uy tín và bản quyền.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Sử dụng email cá nhân:&lt;/strong&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;&amp;nbsp;Khi nâng cấp tài khoản Elsa Premium, bạn sẽ sử dụng email cá nhân của mình, giúp tăng cường bảo mật cho tài khoản của bạn.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Thanh toán linh hoạt:&amp;nbsp;&lt;/strong&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Gamikey cho phép bạn thanh toán qua các phương thức phổ biến như ATM, Internet Banking, và Momo.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Nhận key nhanh chóng:&lt;/strong&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;&amp;nbsp;Sau khi hoàn tất thông tin, Gamikey sẽ gửi tài khoản Elsa Premium cho bạn trong thời gian ngắn nhất có thể, thường chỉ từ 15 đến 20 phút.&lt;/span&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Để nâng cấp Elsa Premium chính chủ 12 tháng tại Gamikey, bạn có thể làm theo các bước sau:&lt;/span&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Bước 1&lt;/strong&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;: Truy cập vào trang web của Gamikey.com&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Bước 2:&amp;nbsp;&lt;/strong&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Tìm kiếm “Elsa Premium” trong thanh tìm kiếm.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Bước 3:&amp;nbsp;&lt;/strong&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Thêm sản phẩm vào giỏ hàng và tiến hành thanh toán.&lt;/span&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Lưu ý&lt;/strong&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;: Giá cả và chính sách bảo hành có thể thay đổi tùy thuộc vào Gamikey. Nếu bạn gặp vấn đề với thông tin đăng nhập, hãy liên hệ với đội ngũ CSKH của Gamikey.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=\"https://gamikey.com/wp-content/uploads/2023/10/tai-khoan-elsa-premium-3.png\" alt=\"tai khoan elsa premium (3)\" height=\"500\" width=\"800\"&gt;&lt;/p&gt;&lt;h2&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Một số câu hỏi thường gặp khi nâng cấp Elsa Premium&amp;nbsp;&lt;/strong&gt;&lt;/h2&gt;&lt;p&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;ELSA Premium sử dụng được trên mấy thiết bị?&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;ELSA, một ứng dụng học tiếng Anh hàng đầu, cho phép bạn sử dụng tối đa trên ba thiết bị khác nhau với một tài khoản. Điều này giúp tăng cường bảo mật và bảo vệ quyền lợi của người học. Tuy nhiên, nếu bạn cố gắng sử dụng tài khoản trên một thiết bị thứ tư, tài khoản của bạn trên thiết bị đó sẽ bị khóa.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Tài khoản Elsa Premium học Offline được không?&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Câu trả lời là không bởi vì ELSA chỉ hoạt động khi có kết nối internet do khối lượng dữ liệu lớn cần được xử lý.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;&amp;nbsp;Tài khoản ELSA Premium hiện có bao nhiêu bài học?&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;ELSA hiện tại có khoảng 6000 bài học, bao gồm hơn 29.000 bài luyện tập và hơn 261 chủ đề. Đây là một nguồn học phong phú giúp bạn nâng cao kỹ năng tiếng Anh của mình.&lt;/span&gt;&lt;/p&gt;</p>', 'uploads/products/media_6600cdd6d2d11.png', 590000, NULL, NULL, NULL, 1, 'Tài Khoản', 'tai-khoan', 9, '0', 0, 2, NULL, NULL, '[\"1\",\"3\"]', NULL, '2024-03-24 18:05:26', '2024-03-31 08:11:23'),
(23, 'Nâng cấp Elsa Premium chính chủ 3 tháng', 'nang-cap-elsa-premium-chinh-chu-3-thang', 'Đăng nhập tối đa 3 thiết bị, không giới hạn thiết bị chuyển đổi\r\n\r\nSử dụng trên Android, IOS\r\n\r\nNâng cấp trực tiếp từ tài khoản chính chủ, gửi kèm bill thanh toán nếu khách hàng yêu cầu\r\n\r\nTrọn bộ ELSA Premium bao gồm ELSA Pro, ELSA AI và Speech Analyzer – 1 năm', '<p>&lt;h2&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Giới thiệu về Elsa Premium là gì ?&lt;/strong&gt;&lt;/h2&gt;&lt;p&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Elsa Premium chính thức ra mắt vào tháng 9 năm 2023. Đây là gói học tiếng Anh cao cấp nhất của Elsa tính tới thời điểm hiện tại. Với gói Elsa Premium thì người dùng có thể thoải mái truy cập vào nhiều gói học và sử dụng những tính năng mới của Elsa&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=\"https://gamikey.com/wp-content/uploads/2023/10/tai-khoan-elsa-premium.png\" alt=\"tai khoan elsa premium\" height=\"500\" width=\"800\"&gt;&lt;/p&gt;&lt;h2&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Một số tính năng đặc biệt của gói Elsa Premium&lt;/strong&gt;&lt;/h2&gt;&lt;p&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Elsa Premium là sự kết hợp của 3 gói Elsa Pro, Elsa Speech Analyzer và Elsa AI&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Với Elsa Pro&lt;/strong&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Elsa Pro là gói học tiếng Anh cao cấp có trả phí, Elsa Premium được tích hợp đầy đủ những tính năng mà Elsa Pro đang cung cấp&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Học viên có thể thoải mái học mà không lo bị làm phiền bởi quảng cáo&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Kho bài tập đa dạng, phong phú: Elsa Pro với hơn 7.100+ bài học, 22 kỹ năng ngôn ngữ trọng tâm. Các bài tập mới luôn được cập nhật liên tục để nâng cao trải nghiệm của người dùng.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Elsa Pro có công cụ phân tích giọng nói chuyên sâu, với công cụ này giúp người học biết được ưu điểm và nhược điểm trong cách phát âm của mình&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Cung cấp lộ trình học tập cá nhân, theo trình độ và năng lực của từng học viên, đảm bảo học viên tiến bộ dần, không bị cảm thấy nản do lượng bài học quá nhiều.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Elsa Pro còn cung cấp công cụ quản lý giúp học viên theo dõi được tiến độ học tập của mình, biết được bản thân mình cần phải cải thiện kỹ năng nào&lt;/span&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Elsa Speech Analyzer&lt;/strong&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Đây là một công cụ phân tích giọng nói mà bạn có thể sử dụng để đánh giá khả năng phát âm của mình khi đối thoại trong cuộc sống như phỏng vấn, đi mua sắm, trò chuyện hàng ngày, ….&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Elsa Speech Analyzer có thể phân tích khả năng phát âm của bạn với nhiều khía cạnh:&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Phát âm: Elsa Speech Analyzer sẽ đánh giá xem bạn phát âm sai chỗ nào, phát âm đạt được bao nhiêu phần trăm giống với người bản địa.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Ngữ điệu: Elsa Speech Analyzer sẽ gợi ý cho bạn nên nhấn trọng âm vào những từ nào để tăng hiệu quả truyền đạt, đồng thời gợi ý cho bạn cao độ, giọng nói phù hợp với nội dung và hoàn cảnh hội thoại.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Ngữ pháp: Công cụ này sẽ chấm điểm ngữ pháp bạn dùng có đúng không, đồng thời sẽ gợi ý những ngữ pháp nâng cao mà bạn có thể thay thế.&lt;/span&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Elsa AI&lt;/strong&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Đây là một công cụ mới nhất của Elsa, Elsa AI được tích hợp với công cụ trí tuệ nhân tạo để đem lại một trải nghiệm tuyệt vời đến học viên&amp;nbsp;&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Elsa AI giống như một người bạn đồng hành trong cuộc trò chuyện như: mua sắm, phỏng vấn, đi chơi,… Qua đó để nâng cao khả năng phản xạ khi giao tiếp tiếng Anh của bạn. Elsa AI sẽ đánh giá khả năng tiếng Anh của bạn, từ đó đưa ra những bài học phù hợp với trình độ hiện tại của bạn.&amp;nbsp;&lt;/span&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;img src=\"https://gamikey.com/wp-content/uploads/2023/10/tai-khoan-elsa-premium-1.png\" alt=\"tai khoan elsa premium (1)\" height=\"500\" width=\"800\"&gt;&lt;/p&gt;&lt;h2&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Những ưu điểm nổi bật của Elsa Premium&lt;/strong&gt;&lt;/h2&gt;&lt;ul&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Elsa Premium là phiên bản cao cấp nên sẽ không bị làm phiền bởi những quảng cáo nào trong quá trình học, đem lại một trải nghiệm học tập tuyệt vời&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Cập nhật nội dung, bài học và chức năng mới mỗi 2 tuần.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Sử dụng công nghệ A.I để kiểm tra phát âm tiếng Anh và hướng dẫn sửa lỗi theo hệ thống phiên âm chuẩn IPA.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Kho từ điển Anh-Việt miễn phí giúp bạn tra cứu từ mới thông qua hình ảnh và phát âm.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Hệ thống ELSA Speak Pro sẽ chấm điểm theo các tiêu chí và đưa ra lời khuyên cho người dùng theo từng kĩ năng cụ thể. Từ đó, lộ trình học cá nhân hóa sẽ được thiết kế dựa trên trình độ của mỗi người dùng.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Trải nghiệm học tiếng Anh “1 kèm 1” với gia sư ảo ELSA, bạn sẽ được nhắc nhở học tập và xem báo cáo tiến độ mỗi ngày 24/7.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Với phiên bản Premium này thì Elsa còn được hỗ trợ bởi Elsa AI, bao gồm:&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Đặt ra các tình huống thường gặp như mua sắm, đi ăn nhà hàng, phỏng vấn, đi dạo, tán gẫu,…&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Với Elsa AI thì bạn có thể thoải mái trò chuyện mà không lo bị nói sai hay phát âm không đúng. Elsa AI sẽ là một người bạn đồng hành cùng bạn trong suốt quá trình học tiếng Anh.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Sau những cuộc trò chuyện, Elsa AI sẽ đưa ra những đánh giá chi tiết để bạn có thể khắc phục những điểm chưa tốt của mình.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Hơn 290 chủ đề từ vựng tiếng Anh, hơn 5.000 bài học và 25.000 bài luyện tập, giúp bạn nâng cao kỹ năng phát âm, nghe hiểu, dấu nhấn, và hội thoại.&amp;nbsp;&lt;/span&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;img src=\"https://gamikey.com/wp-content/uploads/2023/10/tai-khoan-elsa-premium-2.png\" alt=\"tai khoan elsa premium (2)\" height=\"500\" width=\"800\"&gt;&lt;/p&gt;&lt;h2&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Nâng cấp Elsa Premium chính chủ 12 tháng tại Gamikey&amp;nbsp;&lt;/strong&gt;&lt;/h2&gt;&lt;p&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Dưới đây là một số lợi ích khi bạn chọn nâng cấp&amp;nbsp;&lt;/span&gt;&lt;a href=\"https://gamikey.com/nang-cap-elsa-premium-chinh-chu-12-thang/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(225, 89, 39); background-color: transparent;\"&gt;tài khoản Elsa Premium&lt;/a&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;&amp;nbsp;tại&amp;nbsp;&lt;/span&gt;&lt;a href=\"https://gamikey.com/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(225, 89, 39); background-color: transparent;\"&gt;Gamikey&lt;/a&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;:&lt;/span&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Bảo hành 1 đổi 1:&lt;/strong&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;&amp;nbsp;Gamikey cam kết bảo hành 1 đổi 1 cho&amp;nbsp;&amp;nbsp;tài khoản Elsa Premium khi có lỗi xảy ra.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Giá cả hợp lý&lt;/strong&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;: Gamikey nâng cấp tài khoản Elsa Premium với giá cả phải chăng, đảm bảo uy tín và bản quyền.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Sử dụng email cá nhân:&lt;/strong&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;&amp;nbsp;Khi nâng cấp tài khoản Elsa Premium, bạn sẽ sử dụng email cá nhân của mình, giúp tăng cường bảo mật cho tài khoản của bạn.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Thanh toán linh hoạt:&amp;nbsp;&lt;/strong&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Gamikey cho phép bạn thanh toán qua các phương thức phổ biến như ATM, Internet Banking, và Momo.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Nhận key nhanh chóng:&lt;/strong&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;&amp;nbsp;Sau khi hoàn tất thông tin, Gamikey sẽ gửi tài khoản Elsa Premium cho bạn trong thời gian ngắn nhất có thể, thường chỉ từ 15 đến 20 phút.&lt;/span&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Để nâng cấp Elsa Premium chính chủ 12 tháng tại Gamikey, bạn có thể làm theo các bước sau:&lt;/span&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Bước 1&lt;/strong&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;: Truy cập vào trang web của Gamikey.com&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Bước 2:&amp;nbsp;&lt;/strong&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Tìm kiếm “Elsa Premium” trong thanh tìm kiếm.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Bước 3:&amp;nbsp;&lt;/strong&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Thêm sản phẩm vào giỏ hàng và tiến hành thanh toán.&lt;/span&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Lưu ý&lt;/strong&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;: Giá cả và chính sách bảo hành có thể thay đổi tùy thuộc vào Gamikey. Nếu bạn gặp vấn đề với thông tin đăng nhập, hãy liên hệ với đội ngũ CSKH của Gamikey.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=\"https://gamikey.com/wp-content/uploads/2023/10/tai-khoan-elsa-premium-3.png\" alt=\"tai khoan elsa premium (3)\" height=\"500\" width=\"800\"&gt;&lt;/p&gt;&lt;h2&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Một số câu hỏi thường gặp khi nâng cấp Elsa Premium&amp;nbsp;&lt;/strong&gt;&lt;/h2&gt;&lt;p&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;ELSA Premium sử dụng được trên mấy thiết bị?&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;ELSA, một ứng dụng học tiếng Anh hàng đầu, cho phép bạn sử dụng tối đa trên ba thiết bị khác nhau với một tài khoản. Điều này giúp tăng cường bảo mật và bảo vệ quyền lợi của người học. Tuy nhiên, nếu bạn cố gắng sử dụng tài khoản trên một thiết bị thứ tư, tài khoản của bạn trên thiết bị đó sẽ bị khóa.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;Tài khoản Elsa Premium học Offline được không?&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;Câu trả lời là không bởi vì ELSA chỉ hoạt động khi có kết nối internet do khối lượng dữ liệu lớn cần được xử lý.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;strong style=\"color: rgb(0, 0, 0);\"&gt;&amp;nbsp;Tài khoản ELSA Premium hiện có bao nhiêu bài học?&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"color: rgb(0, 0, 0);\"&gt;ELSA hiện tại có khoảng 6000 bài học, bao gồm hơn 29.000 bài luyện tập và hơn 261 chủ đề. Đây là một nguồn học phong phú giúp bạn nâng cao kỹ năng tiếng Anh của mình.&lt;/span&gt;&lt;/p&gt;</p>', 'uploads/products/media_6600ce14248cc.png', 390000, NULL, NULL, NULL, 1, 'Tài Khoản', 'tai-khoan', 7, '0', 0, 2, NULL, NULL, '[\"3\"]', NULL, '2024-03-24 18:06:28', '2024-03-30 07:38:40');

-- --------------------------------------------------------

--
-- Table structure for table `product_account_stores`
--

CREATE TABLE `product_account_stores` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` int NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `used_by_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `used_by_user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_account_stores`
--

INSERT INTO `product_account_stores` (`id`, `product_id`, `code`, `username`, `password`, `used`, `created_at`, `updated_at`, `used_by_email`, `used_by_user_id`, `order_id`) VALUES
(10, 23, NULL, 'xyjiwasy', 'Pa$$w0rd!', 1, '2024-03-30 07:25:18', '2024-04-01 07:38:07', 'admin@gmail.com', '1', 1),
(12, 23, NULL, 'foqyx', 'Pa$$w0rd!', 0, '2024-03-30 07:25:18', '2024-03-30 07:25:18', NULL, NULL, NULL),
(13, 23, NULL, 'zemujoqy', 'Pa$$w0rd!', 0, '2024-03-30 07:25:18', '2024-03-30 07:25:18', NULL, NULL, NULL),
(14, 23, NULL, 'neruli', 'Pa$$w0rd!', 0, '2024-03-30 07:25:18', '2024-03-30 07:25:18', NULL, NULL, NULL),
(15, 23, NULL, 'cakucit', 'Pa$$w0rd!', 0, '2024-03-30 07:25:18', '2024-03-30 07:25:18', NULL, NULL, NULL),
(16, 23, NULL, 'comasy', 'cpmasy', 0, '2024-03-30 07:38:40', '2024-03-30 07:38:40', NULL, NULL, NULL),
(18, 17, 'ASDA-SDAS-DASD-ASDD-SAEF-SACA-SCAS-CASC-SA', NULL, NULL, 1, '2024-03-30 07:56:13', '2024-04-01 07:38:07', 'admin@gmail.com', '1', 1),
(19, 22, NULL, 'lyselare', 'Pa$$w0rd!', 1, '2024-03-31 08:11:23', '2024-04-01 07:38:07', 'admin@gmail.com', '1', 1),
(21, 22, NULL, 'qiwud', 'Pa$$w0rd!', 0, '2024-03-31 08:11:23', '2024-03-31 08:11:23', NULL, NULL, NULL),
(22, 22, NULL, 'cehobysos', 'Pa$$w0rd!', 0, '2024-03-31 08:11:23', '2024-03-31 08:11:23', NULL, NULL, NULL),
(23, 22, NULL, 'gycyqehel', 'Pa$$w0rd!', 0, '2024-03-31 08:11:23', '2024-03-31 08:11:23', NULL, NULL, NULL),
(24, 22, NULL, 'kabeqeve', 'Pa$$w0rd!', 0, '2024-03-31 08:11:23', '2024-03-31 08:11:23', NULL, NULL, NULL),
(25, 22, NULL, 'rovaham', 'Pa$$w0rd!', 0, '2024-03-31 08:11:23', '2024-03-31 08:11:23', NULL, NULL, NULL),
(26, 22, NULL, 'hysopaxu', 'Pa$$w0rd!', 0, '2024-03-31 08:11:23', '2024-03-31 08:11:23', NULL, NULL, NULL),
(27, 22, NULL, 'wamaladocu', 'Pa$$w0rd!', 0, '2024-03-31 08:11:23', '2024-03-31 08:11:23', NULL, NULL, NULL),
(28, 21, NULL, 'raxam', 'Pa$$w0rd!', 1, '2024-03-31 08:13:03', '2024-04-01 07:38:07', 'admin@gmail.com', '1', 1),
(30, 21, NULL, 'qabozarot', 'Pa$$w0rd!', 0, '2024-03-31 08:13:03', '2024-03-31 08:13:03', NULL, NULL, NULL),
(31, 21, NULL, 'voxybozi', 'Pa$$w0rd!', 0, '2024-03-31 08:13:03', '2024-03-31 08:13:03', NULL, NULL, NULL),
(32, 21, NULL, 'nifade', 'Pa$$w0rd!', 0, '2024-03-31 08:13:03', '2024-03-31 08:13:03', NULL, NULL, NULL),
(33, 21, NULL, 'muniryhyh', 'Pa$$w0rd!', 0, '2024-03-31 08:13:03', '2024-03-31 08:13:03', NULL, NULL, NULL),
(34, 21, NULL, 'nydetiso', 'Pa$$w0rd!', 0, '2024-03-31 08:13:03', '2024-03-31 08:13:03', NULL, NULL, NULL),
(35, 21, NULL, 'sirafebyh', 'Pa$$w0rd!', 0, '2024-03-31 08:13:04', '2024-03-31 08:13:04', NULL, NULL, NULL),
(36, 21, NULL, 'rimonipox', 'Pa$$w0rd!', 0, '2024-03-31 08:13:04', '2024-03-31 08:13:04', NULL, NULL, NULL),
(37, 21, NULL, 'zysyz', 'Pa$$w0rd!', 0, '2024-03-31 08:13:04', '2024-03-31 08:13:04', NULL, NULL, NULL),
(38, 21, NULL, 'qikef', 'Pa$$w0rd!', 0, '2024-03-31 08:13:04', '2024-03-31 08:13:04', NULL, NULL, NULL),
(39, 21, NULL, 'befoqiwol', 'Pa$$w0rd!', 0, '2024-03-31 08:13:04', '2024-03-31 08:13:04', NULL, NULL, NULL),
(41, 17, 'Officiis provident', NULL, NULL, 0, '2024-03-31 08:14:13', '2024-03-31 08:14:13', NULL, NULL, NULL),
(42, 17, 'Aute duis enim dolor', NULL, NULL, 0, '2024-03-31 08:14:13', '2024-03-31 08:14:13', NULL, NULL, NULL),
(43, 17, 'Laboriosam ex occae', NULL, NULL, 0, '2024-03-31 08:14:13', '2024-03-31 08:14:13', NULL, NULL, NULL),
(44, 17, 'Est et incidunt ar', NULL, NULL, 0, '2024-03-31 08:14:13', '2024-03-31 08:14:13', NULL, NULL, NULL),
(45, 17, 'Placeat impedit im', NULL, NULL, 0, '2024-03-31 08:14:13', '2024-03-31 08:14:13', NULL, NULL, NULL),
(46, 17, 'Odit dolor quas et a', NULL, NULL, 0, '2024-03-31 08:14:13', '2024-03-31 08:14:13', NULL, NULL, NULL),
(47, 17, 'Eaque quidem labore', NULL, NULL, 0, '2024-03-31 08:14:13', '2024-03-31 08:14:13', NULL, NULL, NULL),
(48, 17, 'Odit dolorum ut enim', NULL, NULL, 0, '2024-03-31 08:14:13', '2024-03-31 08:14:13', NULL, NULL, NULL),
(49, 17, 'Eum doloremque quae', NULL, NULL, 0, '2024-03-31 08:14:13', '2024-03-31 08:14:13', NULL, NULL, NULL),
(50, 17, 'Voluptatem reprehend', NULL, NULL, 0, '2024-03-31 08:14:14', '2024-03-31 08:14:14', NULL, NULL, NULL),
(51, 17, 'Sed proident conseq', NULL, NULL, 0, '2024-03-31 08:14:14', '2024-03-31 08:14:14', NULL, NULL, NULL),
(52, 17, 'Tempora perspiciatis', NULL, NULL, 0, '2024-03-31 08:19:24', '2024-03-31 08:19:24', NULL, NULL, NULL),
(53, 17, 'Ea reiciendis dolor', NULL, NULL, 0, '2024-03-31 08:19:24', '2024-03-31 08:19:24', NULL, NULL, NULL),
(54, 17, 'In provident dolore', NULL, NULL, 0, '2024-03-31 08:19:24', '2024-03-31 08:19:24', NULL, NULL, NULL),
(55, 17, 'Delectus recusandae', NULL, NULL, 0, '2024-03-31 08:19:24', '2024-03-31 08:19:24', NULL, NULL, NULL),
(56, 17, 'Veritatis quod qui c', NULL, NULL, 0, '2024-03-31 08:19:24', '2024-03-31 08:19:24', NULL, NULL, NULL),
(57, 17, 'Aut occaecat sunt cu', NULL, NULL, 0, '2024-03-31 08:19:24', '2024-03-31 08:19:24', NULL, NULL, NULL),
(58, 17, 'Aut et neque nihil a', NULL, NULL, 0, '2024-03-31 08:19:24', '2024-03-31 08:19:24', NULL, NULL, NULL),
(59, 17, 'Vitae magni nihil ni', NULL, NULL, 0, '2024-03-31 08:19:24', '2024-03-31 08:19:24', NULL, NULL, NULL),
(60, 17, 'Est in omnis ut in', NULL, NULL, 0, '2024-03-31 08:19:24', '2024-03-31 08:19:24', NULL, NULL, NULL),
(61, 17, 'Ullam ut veritatis n', NULL, NULL, 0, '2024-03-31 08:19:24', '2024-03-31 08:19:24', NULL, NULL, NULL),
(62, 17, 'Quia dolor corrupti', NULL, NULL, 0, '2024-03-31 08:19:24', '2024-03-31 08:19:24', NULL, NULL, NULL),
(63, 17, 'Et veniam et explic', NULL, NULL, 0, '2024-03-31 08:19:24', '2024-03-31 08:19:24', NULL, NULL, NULL),
(64, 17, 'Et ea ab facere sed', NULL, NULL, 0, '2024-03-31 08:19:24', '2024-03-31 08:19:24', NULL, NULL, NULL),
(65, 16, NULL, 'zyxirumuv', 'Pa$$w0rd!', 1, '2024-03-31 08:20:39', '2024-04-01 07:38:07', 'admin@gmail.com', '1', 1),
(67, 16, NULL, 'pijomu', 'Pa$$w0rd!', 0, '2024-03-31 08:20:39', '2024-03-31 08:20:39', NULL, NULL, NULL),
(68, 16, NULL, 'gixifagaw', 'Pa$$w0rd!', 0, '2024-03-31 08:20:39', '2024-03-31 08:20:39', NULL, NULL, NULL),
(69, 16, NULL, 'mehehi', 'Pa$$w0rd!', 0, '2024-03-31 08:20:39', '2024-03-31 08:20:39', NULL, NULL, NULL),
(70, 16, NULL, 'baxedo', 'Pa$$w0rd!', 0, '2024-03-31 08:20:39', '2024-03-31 08:20:39', NULL, NULL, NULL),
(71, 16, NULL, 'lipisirebe', 'Pa$$w0rd!', 0, '2024-03-31 08:20:39', '2024-03-31 08:20:39', NULL, NULL, NULL),
(72, 16, NULL, 'wyleb', 'Pa$$w0rd!', 0, '2024-03-31 08:20:39', '2024-03-31 08:20:39', NULL, NULL, NULL),
(73, 16, NULL, 'zatine', 'Pa$$w0rd!', 0, '2024-03-31 08:20:39', '2024-03-31 08:20:39', NULL, NULL, NULL),
(75, 15, NULL, 'hogyp', 'Pa$$w0rd!', 0, '2024-03-31 08:20:57', '2024-03-31 08:20:57', NULL, NULL, NULL),
(76, 15, NULL, 'quseto', 'Pa$$w0rd!', 0, '2024-03-31 08:20:57', '2024-03-31 08:20:57', NULL, NULL, NULL),
(77, 15, NULL, 'fiqaw', 'Pa$$w0rd!', 0, '2024-03-31 08:20:57', '2024-03-31 08:20:57', NULL, NULL, NULL),
(78, 15, NULL, 'zeqejuxu', 'Pa$$w0rd!', 0, '2024-03-31 08:20:57', '2024-03-31 08:20:57', NULL, NULL, NULL),
(79, 15, NULL, 'busico', 'Pa$$w0rd!', 0, '2024-03-31 08:20:57', '2024-03-31 08:20:57', NULL, NULL, NULL),
(80, 15, NULL, 'wyquvu', 'Pa$$w0rd!', 0, '2024-03-31 08:20:57', '2024-03-31 08:20:57', NULL, NULL, NULL),
(82, 12, 'Atque et pariatur B', NULL, NULL, 0, '2024-03-31 08:21:24', '2024-03-31 08:21:24', NULL, NULL, NULL),
(83, 12, 'Veniam ullam aut ex', NULL, NULL, 0, '2024-03-31 08:21:24', '2024-03-31 08:21:24', NULL, NULL, NULL),
(84, 12, 'Similique pariatur', NULL, NULL, 0, '2024-03-31 08:21:24', '2024-03-31 08:21:24', NULL, NULL, NULL),
(85, 12, 'Adipisicing laborios', NULL, NULL, 0, '2024-03-31 08:21:24', '2024-03-31 08:21:24', NULL, NULL, NULL),
(86, 12, 'Sapiente consequuntu', NULL, NULL, 0, '2024-03-31 08:21:24', '2024-03-31 08:21:24', NULL, NULL, NULL),
(87, 12, 'Exercitationem sint', NULL, NULL, 0, '2024-03-31 08:21:24', '2024-03-31 08:21:24', NULL, NULL, NULL),
(88, 12, 'Unde quas adipisci e', NULL, NULL, 0, '2024-03-31 08:21:24', '2024-03-31 08:21:24', NULL, NULL, NULL),
(89, 12, 'Corrupti officiis r', NULL, NULL, 0, '2024-03-31 08:21:24', '2024-03-31 08:21:24', NULL, NULL, NULL),
(90, 12, 'Est laborum voluptat', NULL, NULL, 0, '2024-03-31 08:21:24', '2024-03-31 08:21:24', NULL, NULL, NULL),
(91, 11, NULL, 'hamove', 'Pa$$w0rd!', 1, '2024-03-31 08:21:56', '2024-04-01 07:38:07', 'admin@gmail.com', '1', 1),
(93, 11, NULL, 'kucem', 'Pa$$w0rd!', 0, '2024-03-31 08:21:56', '2024-03-31 08:21:56', NULL, NULL, NULL),
(94, 11, NULL, 'rysuhenu', 'Pa$$w0rd!', 0, '2024-03-31 08:21:56', '2024-03-31 08:21:56', NULL, NULL, NULL),
(95, 11, NULL, 'qenigup', 'Pa$$w0rd!', 0, '2024-03-31 08:21:56', '2024-03-31 08:21:56', NULL, NULL, NULL),
(96, 10, NULL, 'kekacireho', 'Pa$$w0rd!', 0, '2024-03-31 08:22:11', '2024-03-31 08:22:11', NULL, NULL, NULL),
(97, 10, NULL, 'xujawuzuc', 'Pa$$w0rd!', 0, '2024-03-31 08:22:11', '2024-03-31 08:22:11', NULL, NULL, NULL),
(98, 10, NULL, 'cyryd', 'Pa$$w0rd!', 0, '2024-03-31 08:22:11', '2024-03-31 08:22:11', NULL, NULL, NULL),
(99, 10, NULL, 'sumapah', 'Pa$$w0rd!', 0, '2024-03-31 08:22:11', '2024-03-31 08:22:11', NULL, NULL, NULL),
(100, 10, NULL, 'tyvyqeq', 'Pa$$w0rd!', 0, '2024-03-31 08:22:11', '2024-03-31 08:22:11', NULL, NULL, NULL),
(101, 10, NULL, 'kakazeper', 'Pa$$w0rd!', 0, '2024-03-31 08:22:11', '2024-03-31 08:22:11', NULL, NULL, NULL),
(102, 10, NULL, 'robinasy', 'Pa$$w0rd!', 0, '2024-03-31 08:22:11', '2024-03-31 08:22:11', NULL, NULL, NULL),
(103, 8, NULL, 'tebisocuk', 'Pa$$w0rd!', 1, '2024-03-31 08:23:11', '2024-04-01 07:38:07', 'admin@gmail.com', '1', 1),
(105, 8, NULL, 'keqiwez', 'Pa$$w0rd!', 0, '2024-03-31 08:23:11', '2024-03-31 08:23:11', NULL, NULL, NULL),
(106, 8, NULL, 'qaxiva', 'Pa$$w0rd!', 0, '2024-03-31 08:23:11', '2024-03-31 08:23:11', NULL, NULL, NULL),
(107, 8, NULL, 'dakoxug', 'Pa$$w0rd!', 0, '2024-03-31 08:23:11', '2024-03-31 08:23:11', NULL, NULL, NULL),
(108, 8, NULL, 'bupeqa', 'Pa$$w0rd!', 0, '2024-03-31 08:23:11', '2024-03-31 08:23:11', NULL, NULL, NULL),
(109, 8, NULL, 'zunynab', 'Pa$$w0rd!', 0, '2024-03-31 08:23:11', '2024-03-31 08:23:11', NULL, NULL, NULL),
(110, 8, NULL, 'gilik', 'Pa$$w0rd!', 0, '2024-03-31 08:23:11', '2024-03-31 08:23:11', NULL, NULL, NULL),
(111, 6, 'Tempor culpa conseq', NULL, NULL, 1, '2024-03-31 08:23:26', '2024-04-01 07:38:07', 'admin@gmail.com', '1', 1),
(113, 6, 'Inventore est volupt', NULL, NULL, 0, '2024-03-31 08:23:26', '2024-03-31 08:23:26', NULL, NULL, NULL),
(114, 6, 'Consequatur et cum a', NULL, NULL, 0, '2024-03-31 08:23:26', '2024-03-31 08:23:26', NULL, NULL, NULL),
(115, 6, 'Officiis consectetur', NULL, NULL, 0, '2024-03-31 08:23:26', '2024-03-31 08:23:26', NULL, NULL, NULL),
(116, 6, 'Quam aliquid labore', NULL, NULL, 0, '2024-03-31 08:23:26', '2024-03-31 08:23:26', NULL, NULL, NULL),
(117, 6, 'Esse magna est molli', NULL, NULL, 0, '2024-03-31 08:23:26', '2024-03-31 08:23:26', NULL, NULL, NULL),
(118, 6, 'Aliquid non sapiente', NULL, NULL, 0, '2024-03-31 08:23:26', '2024-03-31 08:23:26', NULL, NULL, NULL),
(119, 6, 'Ipsum quo ducimus', NULL, NULL, 0, '2024-03-31 08:23:26', '2024-03-31 08:23:26', NULL, NULL, NULL),
(120, 6, 'Dolores voluptate te', NULL, NULL, 0, '2024-03-31 08:23:26', '2024-03-31 08:23:26', NULL, NULL, NULL),
(121, 1, NULL, 'tykomigubo', 'Pa$$w0rd!', 1, '2024-03-31 08:23:45', '2024-04-01 07:38:07', 'admin@gmail.com', '1', 1),
(123, 1, NULL, 'nivuk', 'Pa$$w0rd!', 1, '2024-03-31 08:23:45', '2024-04-03 07:06:46', 'vohongson8520@gmail.com', '4', 3),
(124, 1, NULL, 'vodahefihe', 'Pa$$w0rd!', 1, '2024-03-31 08:23:45', '2024-04-03 07:08:36', 'vohongson8520@gmail.com', '4', 4),
(125, 1, NULL, 'xutykopa', 'Pa$$w0rd!', 1, '2024-03-31 08:23:45', '2024-04-03 07:09:26', 'vohongson8520@gmail.com', '4', 5),
(126, 1, NULL, 'qonujilu', 'Pa$$w0rd!', 1, '2024-03-31 08:23:45', '2024-04-03 07:13:34', 'vohongson8520@gmail.com', '4', 6),
(127, 1, NULL, 'nypiqomi', 'Pa$$w0rd!', 1, '2024-03-31 08:23:45', '2024-04-03 08:39:02', 'vohongson8520@gmail.com', '4', 7),
(128, 1, NULL, 'wisesokiki', 'Pa$$w0rd!', 1, '2024-03-31 08:23:45', '2024-04-03 20:46:30', 'vohongson8520@gmail.com', NULL, 8),
(129, 1, NULL, 'mutofanu', 'Pa$$w0rd!', 0, '2024-03-31 08:23:45', '2024-03-31 08:23:45', NULL, NULL, NULL),
(130, 1, NULL, 'merewybedy', 'Pa$$w0rd!', 0, '2024-03-31 08:23:45', '2024-03-31 08:23:45', NULL, NULL, NULL),
(131, 1, NULL, 'zelytezuc', 'Pa$$w0rd!', 0, '2024-03-31 08:23:45', '2024-03-31 08:23:45', NULL, NULL, NULL),
(132, 1, NULL, 'gicaqeh', 'Pa$$w0rd!', 0, '2024-03-31 08:23:45', '2024-03-31 08:23:45', NULL, NULL, NULL),
(133, 1, NULL, 'taxafarad', 'Pa$$w0rd!', 0, '2024-03-31 08:23:45', '2024-03-31 08:23:45', NULL, NULL, NULL),
(134, 1, NULL, 'letat', 'Pa$$w0rd!', 0, '2024-03-31 08:23:45', '2024-03-31 08:23:45', NULL, NULL, NULL),
(135, 1, NULL, 'juciroh', 'Pa$$w0rd!', 0, '2024-03-31 08:23:45', '2024-03-31 08:23:45', NULL, NULL, NULL),
(136, 1, NULL, 'typakuweka', 'Pa$$w0rd!', 0, '2024-03-31 08:23:45', '2024-03-31 08:23:45', NULL, NULL, NULL),
(137, 1, NULL, 'lobuj', 'Pa$$w0rd!', 0, '2024-03-31 08:23:45', '2024-03-31 08:23:45', NULL, NULL, NULL),
(138, 1, NULL, 'pydedawu', 'Pa$$w0rd!', 0, '2024-03-31 08:23:45', '2024-03-31 08:23:45', NULL, NULL, NULL),
(139, 1, NULL, 'paveso', 'Pa$$w0rd!', 0, '2024-03-31 08:23:45', '2024-03-31 08:23:45', NULL, NULL, NULL),
(140, 1, NULL, 'razokuw', 'Pa$$w0rd!', 0, '2024-03-31 08:23:45', '2024-03-31 08:23:45', NULL, NULL, NULL),
(141, 1, NULL, 'gawabehu', 'Pa$$w0rd!', 0, '2024-03-31 08:23:45', '2024-03-31 08:23:45', NULL, NULL, NULL),
(142, 1, NULL, 'lesef', 'Pa$$w0rd!', 0, '2024-03-31 08:23:45', '2024-03-31 08:23:45', NULL, NULL, NULL),
(143, 1, NULL, 'cokuja', 'Pa$$w0rd!', 0, '2024-03-31 08:23:45', '2024-03-31 08:23:45', NULL, NULL, NULL),
(144, 1, NULL, 'lysigot', 'Pa$$w0rd!', 0, '2024-03-31 08:23:45', '2024-03-31 08:23:45', NULL, NULL, NULL),
(145, 1, NULL, 'nuxicixyb', 'Pa$$w0rd!', 0, '2024-03-31 08:23:45', '2024-03-31 08:23:45', NULL, NULL, NULL),
(146, 1, NULL, 'dogamawy', 'Pa$$w0rd!', 0, '2024-03-31 08:23:45', '2024-03-31 08:23:45', NULL, NULL, NULL),
(147, 1, NULL, 'nokuxypo', 'Pa$$w0rd!', 0, '2024-03-31 08:23:45', '2024-03-31 08:23:45', NULL, NULL, NULL),
(148, 5, 'ETLA-BORE-ESTD-ELEC-TASD', NULL, NULL, 1, '2024-03-31 08:26:19', '2024-04-01 07:38:07', 'admin@gmail.com', '1', 1),
(150, 5, 'ETLA-BORE-ESTD-ELEC-TASD', NULL, NULL, 0, '2024-03-31 08:26:19', '2024-04-01 07:24:07', NULL, NULL, NULL),
(151, 5, 'ETLA-BORE-ESTD-ELEC-TASD', NULL, NULL, 0, '2024-03-31 08:26:19', '2024-03-31 08:26:19', NULL, NULL, NULL),
(152, 5, 'ETLA-BORE-ESTD-ELEC-TASD', NULL, NULL, 0, '2024-03-31 08:26:19', '2024-03-31 08:26:19', NULL, NULL, NULL),
(153, 5, 'ETLA-BORE-ESTD-ELEC-TASD', NULL, NULL, 0, '2024-03-31 08:26:19', '2024-03-31 08:26:19', NULL, NULL, NULL),
(154, 5, 'ETLA-BORE-ESTD-ELEC-TASD', NULL, NULL, 0, '2024-03-31 08:26:19', '2024-03-31 08:26:19', NULL, NULL, NULL),
(155, 5, 'ETLA-BORE-ESTD-ELEC-TASD', NULL, NULL, 0, '2024-03-31 08:26:19', '2024-03-31 08:26:19', NULL, NULL, NULL),
(156, 5, 'ETLA-BORE-ESTD-ELEC-TASD', NULL, NULL, 0, '2024-03-31 08:26:19', '2024-03-31 08:26:19', NULL, NULL, NULL),
(157, 5, 'ETLA-BORE-ESTD-ELEC-TASD', NULL, NULL, 0, '2024-03-31 08:26:19', '2024-03-31 08:26:19', NULL, NULL, NULL),
(158, 5, 'ETLA-BORE-ESTD-ELEC-TASD', NULL, NULL, 0, '2024-03-31 08:26:19', '2024-03-31 08:26:19', NULL, NULL, NULL),
(159, 5, 'ETLA-BORE-ESTD-ELEC-TASD', NULL, NULL, 0, '2024-03-31 08:26:19', '2024-03-31 08:26:19', NULL, NULL, NULL),
(160, 5, 'ETLA-BORE-ESTD-ELEC-TASD', NULL, NULL, 0, '2024-03-31 08:26:19', '2024-03-31 08:26:19', NULL, NULL, NULL),
(161, 5, 'ETLA-BORE-ESTD-ELEC-TASD', NULL, NULL, 0, '2024-03-31 08:26:19', '2024-03-31 08:26:19', NULL, NULL, NULL),
(162, 5, 'ETLA-BORE-ESTD-ELEC-TASD', NULL, NULL, 0, '2024-03-31 08:26:19', '2024-03-31 08:26:19', NULL, NULL, NULL),
(163, 5, 'ETLA-BORE-ESTD-ELEC-TASD', NULL, NULL, 0, '2024-03-31 08:26:19', '2024-03-31 08:26:19', NULL, NULL, NULL),
(164, 5, 'ETLA-BORE-ESTD-ELEC-TASD', NULL, NULL, 0, '2024-03-31 08:26:19', '2024-03-31 08:26:19', NULL, NULL, NULL),
(165, 5, 'ETLA-BORE-ESTD-ELEC-TASD', NULL, NULL, 0, '2024-03-31 08:26:19', '2024-03-31 08:26:19', NULL, NULL, NULL),
(166, 5, 'ETLA-BORE-ESTD-ELEC-TASD', NULL, NULL, 0, '2024-03-31 08:26:19', '2024-03-31 08:26:19', NULL, NULL, NULL),
(167, 5, 'ETLA-BORE-ESTD-ELEC-TASD', NULL, NULL, 0, '2024-03-31 08:26:19', '2024-03-31 08:26:19', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_comments`
--

CREATE TABLE `product_comments` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_comments`
--

INSERT INTO `product_comments` (`id`, `product_id`, `user_id`, `comment`, `rating`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, 4, 'asdasdasdasdas', 5, 1, '2024-04-02 15:49:41', '2024-04-02 15:49:41'),
(4, 1, 1, 'asdasdasdas', 5, 1, '2024-04-03 03:18:41', '2024-04-03 03:18:41'),
(5, 1, 1, 'Test render new', 4, 1, '2024-04-03 03:19:59', '2024-04-03 03:19:59'),
(6, 1, 1, 'Test Render', 2, 1, '2024-04-03 03:21:31', '2024-04-03 03:21:31'),
(7, 1, 1, 'Test Render', 5, 1, '2024-04-03 03:22:20', '2024-04-03 03:22:20'),
(8, 1, 1, 'test render 2', 5, 1, '2024-04-03 03:22:54', '2024-04-03 03:22:54'),
(9, 1, 1, 'asdasdas', 5, 1, '2024-04-03 03:23:11', '2024-04-03 07:03:10'),
(10, 1, 1, 'ascashd', 5, 1, '2024-04-03 03:30:07', '2024-04-03 07:03:10'),
(11, 1, 4, 'Test render fast', 5, 1, '2024-04-03 11:28:21', '2024-04-03 07:03:11'),
(12, 1, 4, 'Test asckajsghciuqwgchqwgucgfqwgdcuiyqgciyqgwufcgaugckagscuqgwucgqwgcjqwagfduycgqwivcqrender fast 2', 5, 1, '2024-04-03 11:35:58', '2024-04-03 07:03:12');

-- --------------------------------------------------------

--
-- Table structure for table `product_reply_comments`
--

CREATE TABLE `product_reply_comments` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` int NOT NULL,
  `product_comment_id` int NOT NULL,
  `user_id` int NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_reply_comments`
--

INSERT INTO `product_reply_comments` (`id`, `product_id`, `product_comment_id`, `user_id`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 4, '@ChuBe04 Test Relpy', 1, '2024-04-02 16:16:13', '2024-04-03 07:00:16');

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 'Thời Hạn', 1, '2024-03-23 20:14:40', '2024-03-24 17:31:15'),
(2, 23, 'Thời Hạn', 1, '2024-03-24 19:39:15', '2024-03-24 19:39:15'),
(3, 17, 'Phiên Bản', 1, '2024-03-24 19:53:57', '2024-03-24 19:53:57');

-- --------------------------------------------------------

--
-- Table structure for table `product_variant_items`
--

CREATE TABLE `product_variant_items` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_variant_id` int NOT NULL,
  `product_id` int NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variant_items`
--

INSERT INTO `product_variant_items` (`id`, `name`, `product_variant_id`, `product_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '9 tháng', 1, 21, 1, '2024-03-24 19:11:13', '2024-03-25 18:26:21'),
(2, '6 tháng', 1, 22, 1, '2024-03-24 19:26:17', '2024-03-25 18:24:55'),
(3, '3 tháng', 1, 23, 1, '2024-03-24 19:37:52', '2024-03-25 18:17:18'),
(4, '12 tháng', 1, 4, 1, '2024-03-24 19:38:56', '2024-03-25 18:16:15');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `slug`, `category_id`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Nghe Nhạc', 'nghe-nhac', 1, 1, NULL, '2024-03-20 09:59:33', '2024-03-20 09:59:33'),
(2, 'Thể Thao', 'the-thao', 1, 1, NULL, '2024-03-20 09:59:44', '2024-03-20 09:59:44'),
(3, 'Xem Phim', 'xem-phim', 1, 1, NULL, '2024-03-20 09:59:51', '2024-03-20 09:59:51'),
(4, 'Học Lập Trình', 'hoc-lap-trinh', 2, 1, NULL, '2024-03-20 10:04:18', '2024-03-20 10:04:18'),
(5, 'Học Nhạc', 'hoc-nhac', 2, 1, NULL, '2024-03-20 10:04:29', '2024-03-20 10:04:29');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Giải Trí', 'giai-tri', 1, '2024-03-20 10:04:47', '2024-03-20 10:04:47'),
(2, 'Bảo Mật', 'bao-mat', 1, '2024-03-20 10:04:52', '2024-03-20 10:04:52'),
(3, 'Học Tập', 'hoc-tap', 1, '2024-03-20 10:04:57', '2024-03-20 10:04:57'),
(4, 'Xem Phim', 'xem-phim', 1, '2024-03-20 10:05:03', '2024-03-20 10:05:03'),
(5, 'Game', 'game', 1, '2024-03-20 10:05:14', '2024-03-20 10:05:14');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `amount_real_currency` double NOT NULL,
  `amount_currency_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `order_id`, `transaction_id`, `payment_method`, `amount`, `amount_real_currency`, `amount_currency_name`, `created_at`, `updated_at`) VALUES
(6, '1', '46F6706329976530A', 'paypal', 22772000, 948.83, 'USD', '2024-04-01 07:38:07', '2024-04-01 07:38:07'),
(8, '3', '5SH45094T9344311C', 'paypal', 1200000, 50, 'USD', '2024-04-03 07:06:46', '2024-04-03 07:06:46'),
(9, '4', '4LG23469WP404053N', 'paypal', 1200000, 50, 'USD', '2024-04-03 07:08:36', '2024-04-03 07:08:36'),
(10, '5', '76971226TD5557922', 'paypal', 1200000, 50, 'USD', '2024-04-03 07:09:26', '2024-04-03 07:09:26'),
(11, '6', '1S3091664P5667400', 'paypal', 1200000, 50, 'USD', '2024-04-03 07:13:34', '2024-04-03 07:13:34'),
(12, '7', 'gamikey427081712158723', 'vnpay', 2400000, 2400000, 'VND', '2024-04-03 08:39:02', '2024-04-03 08:39:02'),
(13, '8', '4014825499', 'paypal', 1200000, 1200000, 'VND', '2024-04-03 20:46:30', '2024-04-03 20:46:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('user','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'uploads/users/default.png',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `image`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', 'uploads/users/media_660c18d069b51.png', '1234567890', '2024-03-20 09:05:22', '$2y$10$4bBa1ps2BiqaM7c3fDt2DOekiNvE5TpiU/6Ofd1BAvqgFRrCpd8ru', NULL, '2024-03-20 09:05:22', '2024-04-02 07:40:16', NULL),
(4, 'ChuBe04', 'vohongson8520@gmail.com', 'admin', 'https://avatars.githubusercontent.com/u/118839446?v=4', '0766116989', '2024-03-27 19:25:44', '$2y$10$vC8awTdYLKdvoiuTMMXx2OzvLHzj4bN3MINXK0qeQ7sTIq5zJi7dG', 'mUgaowOabtMFbNed5FfOaTOrU4jT3mIUTpJ8ZvqQ6IPkz0HP8GKARWTvTbBI', '2024-03-27 19:25:44', '2024-04-02 07:37:45', NULL),
(7, 'ChúBé04', 'user@gmail.com', 'user', 'uploads/users/default.png', NULL, NULL, '$2y$10$86sh8VC5MctN7uZOh.9paedyAsfvqboN/5Rk5mANZV7EYd0HLpAoe', NULL, '2024-04-02 07:48:55', '2024-04-02 07:48:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vnpay_settings`
--

CREATE TABLE `vnpay_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `mode` tinyint(1) NOT NULL DEFAULT '0',
  `terminal_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vnpay_settings`
--

INSERT INTO `vnpay_settings` (`id`, `status`, `mode`, `terminal_id`, `secret_key`, `created_at`, `updated_at`) VALUES
(1, 1, 0, '83ROYQPV', 'GJBSSXOPRFZGHBBDDQPNSABFJHFGMQAB', '2024-04-03 07:45:39', '2024-04-03 07:45:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `momo_settings`
--
ALTER TABLE `momo_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `paypal_settings`
--
ALTER TABLE `paypal_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_account_stores`
--
ALTER TABLE `product_account_stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_comments`
--
ALTER TABLE `product_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_reply_comments`
--
ALTER TABLE `product_reply_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_variant_items`
--
ALTER TABLE `product_variant_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vnpay_settings`
--
ALTER TABLE `vnpay_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `momo_settings`
--
ALTER TABLE `momo_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `paypal_settings`
--
ALTER TABLE `paypal_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_account_stores`
--
ALTER TABLE `product_account_stores`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `product_comments`
--
ALTER TABLE `product_comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_reply_comments`
--
ALTER TABLE `product_reply_comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_variant_items`
--
ALTER TABLE `product_variant_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vnpay_settings`
--
ALTER TABLE `vnpay_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
