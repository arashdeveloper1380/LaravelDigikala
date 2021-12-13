-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 23, 2018 at 06:11 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel-digikala`
--

-- --------------------------------------------------------

--
-- Table structure for table `amazing`
--

CREATE TABLE `amazing` (
  `id` int(10) UNSIGNED NOT NULL,
  `m_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tozihat` text COLLATE utf8_unicode_ci NOT NULL,
  `price1` int(11) NOT NULL,
  `price2` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `amazing`
--

INSERT INTO `amazing` (`id`, `m_title`, `title`, `tozihat`, `price1`, `price2`, `product_id`, `time`, `timestamp`) VALUES
(2, 'گوشی دو سیم کارته', 'گوشي موبايل سامسونگ مدل Galaxy J7 Prime SM-G610FD دو سيم کارت', 'گوشی دو سیم کارته\r\n16 گیگابایت حافظه داخلي\r\n12.0 مگاپيکسل رزولوشن عکس', 949000, 31000, 10, 20, 1518154262),
(3, 'گوشي موبايل اپل 64 گيگابايت', 'گوشي موبايل اپل مدل iPhone 6s ظرفيت 64 گيگابايت', 'گوشی دو سیم کارته\r\n64 گیگابایت حافظه داخلي\r\n12.0 مگاپيکسل رزولوشن عکس', 2449000, 11000, 11, 20, 1520110925),
(4, 'گوشي موبايل اپل', 'گوشي موبايل اپل مدل iPhone 7 ظرفيت 128 گيگابايت', 'گوشی تک سیم کارته\r\n128 گیگابایت  حافظه داخلي\r\n12.0 مگاپيکسل رزولوشن عکس', 3099000, 100000, 12, 60, 1515531844),
(5, 'گوشي موبايل اپل 64 گيگابايت', 'گوشي موبايل اپل مدل iPhone 6s ظرفيت 64 گيگابايت', 'گوشی دو سیم کارته\r\n64 گیگابایت حافظه داخلي\r\n12.0 مگاپيکسل رزولوشن عکس', 2449000, 11000, 11, 20, 1522192683),
(6, 'گوشي موبايل سامسونگ', 'گوشي موبايل سامسونگ مدل Galaxy J7 Prime SM-G610FD دو سيم کارت', 'گوشی دو سیم کارته\r\n16 گیگابایت حافظه داخلي\r\n12.0 مگاپيکسل رزولوشن عکس', 949000, 31000, 10, 70, 1520167925),
(7, 'هندزفری', 'هندزفری بلوتوث ریمکس مدل RB-T10', 'هندزفری بلوتوث ریمکس مدل RB-T10', 75000, 60000, 20, 20, 1539926056);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cat_ename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `cat_ename`, `parent_id`, `img`) VALUES
(6, 'موبایل', 'Mobile', 5, '1507301607.png'),
(5, 'کالای دیجیتال', 'Electronic-Devices', 0, NULL),
(7, 'گوشی موبایل', 'mobile-phone', 6, NULL),
(8, 'تبلت و کتابخوان', 'Tablet-EBook-Reader', 5, '1507300239.png'),
(9, 'تبلت', 'tablet', 8, ''),
(11, 'لوازم خانگی', 'Home-and-Kitchen', 0, NULL),
(12, 'زیبایی و سلامت', 'Personal-Appliance', 0, NULL),
(13, 'فرهنگ و هنر', 'Book-And-Media', 0, NULL),
(14, 'ورزش و سرگرمی', 'Sport-Entertainment', 0, NULL),
(15, 'مادر و کودک', 'Mother-and-Child', 0, NULL),
(16, 'ابزار و الکتریک', 'Tools', 0, NULL),
(17, 'وسایل نقلیه و لوازم', 'Vehicles', 0, NULL),
(18, 'Apple', 'tablet_Apple', 9, NULL),
(19, 'Samsung', 'tablet_Samsung', 9, NULL),
(20, 'Microsoft', 'tablet_Microsoft', 9, NULL),
(21, 'Asus', 'tablet_Asus', 9, NULL),
(22, 'Lenovo', 'tablet_Lenovo', 9, NULL),
(23, 'Huawei', 'tablet_Huawei', 9, NULL),
(24, 'Amazon', 'tablet_Amazon', 9, NULL),
(25, 'Acer', 'tablet_Acer', 9, NULL),
(26, 'Dell', 'tablet_Dell', 9, NULL),
(27, 'LG', 'tablet_LG', 9, NULL),
(28, 'iLife', 'tablet_iLife', 9, NULL),
(29, 'nokia', 'tablet_nokia', 9, NULL),
(30, 'HTC', 'tablet_HTC', 9, NULL),
(31, 'براساس سایز', 'tablet', 8, NULL),
(32, 'لوازم آرایشی', 'Beauty', 12, NULL),
(33, 'Apple', 'filter_brand_17', 7, NULL),
(34, 'Samsung', 'filter_brand_18', 7, NULL),
(60, 'بر اساس سیستم عامل', 'mobile-phone', 6, NULL),
(61, 'اندروید', 'filter_type_23', 60, NULL),
(62, 'iOS', 'filter_type_22', 60, NULL),
(63, 'ویندوز فون', 'filter_type_24', 60, NULL),
(64, 'سایر سیستم عامل ها', 'filter_type_21', 60, NULL),
(65, 'LG', 'filter_brand_19', 7, NULL),
(66, 'Huawei', 'filter_brand_52', 7, NULL),
(67, 'HTC', 'filter_brand_53', 7, NULL),
(68, 'Sony', 'filter_brand_47', 7, NULL),
(69, 'Microsoft', 'filter_brand_55', 7, NULL),
(70, 'ASUS', 'filter_brand_50', 7, NULL),
(71, 'Lenovo', 'filter_brand_57', 7, NULL),
(72, 'Motorola', 'filter_brand_59', 7, NULL),
(73, 'SonyEricsson', 'filter_brand_58', 7, NULL),
(74, 'Nokia', 'filter_brand_56', 7, NULL),
(75, 'لپ تاپ', 'Laptop', 5, NULL),
(76, 'دوربين', 'Camera', 5, NULL),
(77, 'کامپيوتر و تجهيزات جانبي', 'Computer-Parts', 5, NULL),
(78, 'انواع گوشی', 'mobile-phone', 6, NULL),
(79, 'گوشی دو سیم کارت', 'filter_attribute_27', 78, NULL),
(80, 'گوشی تک سیم کارت', 'filter_attribute_26', 78, NULL),
(81, 'گوشی های 4G', 'filter_attribute_120', 78, NULL),
(82, 'گوشی های کلاسیک', 'filter_attribute_130', 78, NULL),
(83, 'هدفون', 'headphone', 6, NULL),
(84, 'لوازم جانبی گوشی موبایل', 'mobile-accessories', 6, NULL),
(85, 'محافظ صفحه نمایش', 'cell-phone-screen-guard', 84, NULL),
(86, 'کیف و کاور گوشی', 'cell-phone-pouch-cover', 84, NULL),
(87, 'لپ تاپ و الترابوک', 'notebook-netbook-ultrabook', 75, NULL),
(88, 'اپل', 'filter_brand_103', 87, NULL),
(89, 'هندزفری گوشی موبایل', 'handsfree', 84, NULL),
(90, 'پاوربانک', 'power-bank', 84, NULL),
(91, 'مونوپاد و پایه نگهدارنده', 'phone-holder', 84, NULL),
(92, 'شارژر موبایل', 'car-charger', 84, NULL),
(93, 'باتری گوشی', 'phone-battery', 84, NULL),
(94, 'قلم لمسی (Stylus)', 'stylus', 84, NULL),
(95, 'کارت حافظه microSD', 'memory-cards', 84, NULL),
(96, 'گیفت کارت', 'Gift-Card', 84, NULL),
(97, 'کیت تمیز کننده', 'Cleaner-Kit', 84, NULL),
(98, 'گجت های موبایل', 'cell-phone-kits', 6, NULL),
(99, 'مبدل برق', 'Power-Supply', 84, NULL),
(100, 'رده ی کاربری', 'mobile-phone', 6, NULL),
(101, 'مناسب بازی', 'filter_attribute_200', 100, NULL),
(102, 'مناسب عکاسی', 'filter_attribute_201', 100, NULL),
(103, 'مناسب عکاسی  سلفی', 'filter_attribute_202', 100, NULL),
(104, 'مقاوم در برابر آب', 'filter_attribute_203', 100, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cat_product`
--

CREATE TABLE `cat_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cat_product`
--

INSERT INTO `cat_product` (`id`, `product_id`, `cat_id`) VALUES
(34, 11, 6),
(33, 11, 5),
(122, 10, 34),
(121, 10, 7),
(120, 10, 6),
(35, 11, 7),
(36, 11, 33),
(56, 12, 33),
(55, 12, 7),
(54, 12, 6),
(53, 12, 5),
(80, 13, 33),
(79, 13, 7),
(78, 13, 6),
(77, 13, 5),
(68, 14, 34),
(67, 14, 7),
(66, 14, 6),
(65, 14, 5),
(69, 15, 5),
(70, 15, 6),
(71, 15, 7),
(72, 15, 66),
(73, 16, 5),
(74, 16, 6),
(75, 16, 7),
(76, 16, 68),
(81, 17, 5),
(82, 17, 6),
(83, 17, 7),
(84, 17, 68),
(93, 18, 75),
(92, 18, 5),
(89, 19, 5),
(90, 19, 6),
(91, 19, 7),
(94, 18, 87),
(95, 18, 88),
(99, 20, 5),
(100, 20, 6),
(101, 20, 84),
(102, 20, 89),
(119, 10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `color_product`
--

CREATE TABLE `color_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `color_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `color_product`
--

INSERT INTO `color_product` (`id`, `color_name`, `color_code`, `product_id`) VALUES
(9, 'مشکی', '000000', 10),
(8, 'سفید', 'FFFFFF', 10),
(10, 'سفید', 'FFFFFF', 13),
(11, 'مشکی', '000000', 13),
(12, 'سفید', 'FFFFFF', 12),
(13, 'مشکی', '000000', 12),
(14, 'خاکسری', '8C8C8C', 12),
(15, 'آبی روشن', '6EE0FF', 14),
(16, 'طلایی', 'FFF100', 14),
(17, 'آبی تیره', '0052FF', 15),
(18, 'مشکی', '000000', 15),
(19, 'سفید', 'FFFFFF', 16),
(20, 'سفید', 'FFFFFF', 17),
(21, 'مشکی', '000000', 17),
(22, 'نقره ای', 'A3A3A3', 18),
(23, 'سفید', 'FFFFFF', 19),
(24, 'طلایی', 'FAFF00', 19),
(25, 'سفید', 'FFFFFF', 20),
(26, 'مشکی', '000000', 20);

-- --------------------------------------------------------

--
-- Table structure for table `comment_product`
--

CREATE TABLE `comment_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `advantages` text COLLATE utf8_unicode_ci,
  `disadvantages` text COLLATE utf8_unicode_ci,
  `comment_text` text COLLATE utf8_unicode_ci,
  `status` int(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment_product`
--

INSERT INTO `comment_product` (`id`, `product_id`, `user_id`, `subject`, `advantages`, `disadvantages`, `comment_text`, `status`) VALUES
(1, 10, 1, 'iphone7 red', 'رنگ متفاوت و خيره کننده@$E@دوربين سلفي عالي@$E@', 'هيچي@$E@', 'من امروز این گوشی به دستم رسید اولش یکم شک داشتم به خاطر رنگش خیلی از دوستان گفته بودن ترکیب سفید قرمر جالب نیست و لی به نظر من عالیه وا قعا قرمز خاصیه من همیشه دنبال یه چیز متفاوت بودم رنگهایی مثل رزگلد ومشکی مات واقعا خوشگل هستند ولی دست همه هست این واقعا خاصه عشق فقطiphone 7 red', 1),
(4, 17, 2, 'تست', '@$E@@$E@', '@$E@', 'تست', 1),
(5, 10, 5, 'خريد موبايل j7 prime', 'اندرويد 7 ، اثرانگشت@$E@', 'دوربين عقب@$E@', 'مهمترین ویژگی این گوشی اینه ک نسبت ب قیمتش واقعا کاراییه بالایی داره ، اثرانگشت ، رم3 ، باتری ی روز کار میکنه ، اندروید 7 هم اومده براش و اندروید 8 هم احتمالا بیاد\r\nمهمترین نقصی ک داره دوربینشه ک 13 مگاپیکسل واقعی نیس و صفحه نمایش معمولی داره و آمولد نیس. در کل گوشیه خوبیه', 1),
(6, 14, 1, 'Samsung Galaxy', '@$E@', '@$E@', 'Samsung Galaxy A5 (2017) Dual SIM Mobile Phone', 1);

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code_time` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `code`, `value`, `time`, `price`, `code_time`) VALUES
(5, 'digikala', 15, 1533737425, '0', 5);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `failed_jobs`
--

INSERT INTO `failed_jobs` (`id`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(1, 'database', 'default', '{\"displayName\":\"App\\\\Mail\\\\OrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":4,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":3:{s:8:\\\"mailable\\\";O:18:\\\"App\\\\Mail\\\\OrderMail\\\":19:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":3:{s:5:\\\"class\\\";s:9:\\\"App\\\\Order\\\";s:2:\\\"id\\\";i:14;s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:5:\\\"tries\\\";i:4;s:4:\\\"from\\\";a:0:{}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:24:\\\"ali.sedighi.tu@gmail.com\\\";}}s:2:\\\"cc\\\";a:0:{}s:3:\\\"bcc\\\";a:0:{}s:7:\\\"replyTo\\\";a:0:{}s:7:\\\"subject\\\";N;s:11:\\\"\\u0000*\\u0000markdown\\\";N;s:4:\\\"view\\\";N;s:8:\\\"textView\\\";N;s:8:\\\"viewData\\\";a:0:{}s:11:\\\"attachments\\\";a:0:{}s:14:\\\"rawAttachments\\\";a:0:{}s:9:\\\"callbacks\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";i:4;s:7:\\\"timeout\\\";N;}\"}}', 'Swift_TransportException: Connection could not be established with host smtp.gmail.com [php_network_getaddresses: getaddrinfo failed: nodename nor servname provided, or not known #0] in /Applications/XAMPP/xamppfiles/htdocs/laravel-digikala/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Transport/StreamBuffer.php:269\nStack trace:\n#0 /Applications/XAMPP/xamppfiles/htdocs/laravel-digikala/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Transport/StreamBuffer.php(62): Swift_Transport_StreamBuffer->establishSocketConnection()\n#1 /Applications/XAMPP/xamppfiles/htdocs/laravel-digikala/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Transport/AbstractSmtpTransport.php(126): Swift_Transport_StreamBuffer->initialize(Array)\n#2 /Applications/XAMPP/xamppfiles/htdocs/laravel-digikala/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Mailer.php(67): Swift_Transport_AbstractSmtpTransport->start()\n#3 /Applications/XAMPP/xamppfiles/htdocs/laravel-digikala/vendor/laravel/framework/src/Illuminate/Mail/Mailer.php(451): Swift_Mailer->send(Object(Swift_Message), Array)\n#4 /Applications/XAMPP/xamppfiles/htdocs/laravel-digikala/vendor/laravel/framework/src/Illuminate/Mail/Mailer.php(235): Illuminate\\Mail\\Mailer->sendSwiftMessage(Object(Swift_Message))\n#5 /Applications/XAMPP/xamppfiles/htdocs/laravel-digikala/vendor/laravel/framework/src/Illuminate/Mail/Mailable.php(125): Illuminate\\Mail\\Mailer->send(\'email.order\', Array, Object(Closure))\n#6 /Applications/XAMPP/xamppfiles/htdocs/laravel-digikala/vendor/laravel/framework/src/Illuminate/Mail/SendQueuedMailable.php(52): Illuminate\\Mail\\Mailable->send(Object(Illuminate\\Mail\\Mailer))\n#7 [internal function]: Illuminate\\Mail\\SendQueuedMailable->handle(Object(Illuminate\\Mail\\Mailer))\n#8 /Applications/XAMPP/xamppfiles/htdocs/laravel-digikala/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(29): call_user_func_array(Array, Array)\n#9 /Applications/XAMPP/xamppfiles/htdocs/laravel-digikala/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(87): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#10 /Applications/XAMPP/xamppfiles/htdocs/laravel-digikala/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(31): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#11 /Applications/XAMPP/xamppfiles/htdocs/laravel-digikala/vendor/laravel/framework/src/Illuminate/Container/Container.php(549): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#12 /Applications/XAMPP/xamppfiles/htdocs/laravel-digikala/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(94): Illuminate\\Container\\Container->call(Array)\n#13 /Applications/XAMPP/xamppfiles/htdocs/laravel-digikala/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(114): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#14 /Applications/XAMPP/xamppfiles/htdocs/laravel-digikala/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(102): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#15 /Applications/XAMPP/xamppfiles/htdocs/laravel-digikala/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(98): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#16 /Applications/XAMPP/xamppfiles/htdocs/laravel-digikala/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(49): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Illuminate\\Mail\\SendQueuedMailable), false)\n#17 /Applications/XAMPP/xamppfiles/htdocs/laravel-digikala/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(76): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#18 /Applications/XAMPP/xamppfiles/htdocs/laravel-digikala/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(320): Illuminate\\Queue\\Jobs\\Job->fire()\n#19 /Applications/XAMPP/xamppfiles/htdocs/laravel-digikala/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(270): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#20 /Applications/XAMPP/xamppfiles/htdocs/laravel-digikala/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(114): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#21 /Applications/XAMPP/xamppfiles/htdocs/laravel-digikala/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(101): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#22 /Applications/XAMPP/xamppfiles/htdocs/laravel-digikala/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(85): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#23 [internal function]: Illuminate\\Queue\\Console\\WorkCommand->handle()\n#24 /Applications/XAMPP/xamppfiles/htdocs/laravel-digikala/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(29): call_user_func_array(Array, Array)\n#25 /Applications/XAMPP/xamppfiles/htdocs/laravel-digikala/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(87): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#26 /Applications/XAMPP/xamppfiles/htdocs/laravel-digikala/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(31): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#27 /Applications/XAMPP/xamppfiles/htdocs/laravel-digikala/vendor/laravel/framework/src/Illuminate/Container/Container.php(549): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#28 /Applications/XAMPP/xamppfiles/htdocs/laravel-digikala/vendor/laravel/framework/src/Illuminate/Console/Command.php(180): Illuminate\\Container\\Container->call(Array)\n#29 /Applications/XAMPP/xamppfiles/htdocs/laravel-digikala/vendor/symfony/console/Command/Command.php(262): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#30 /Applications/XAMPP/xamppfiles/htdocs/laravel-digikala/vendor/laravel/framework/src/Illuminate/Console/Command.php(167): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#31 /Applications/XAMPP/xamppfiles/htdocs/laravel-digikala/vendor/symfony/console/Application.php(888): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 /Applications/XAMPP/xamppfiles/htdocs/laravel-digikala/vendor/symfony/console/Application.php(224): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 /Applications/XAMPP/xamppfiles/htdocs/laravel-digikala/vendor/symfony/console/Application.php(125): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 /Applications/XAMPP/xamppfiles/htdocs/laravel-digikala/vendor/laravel/framework/src/Illuminate/Console/Application.php(88): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 /Applications/XAMPP/xamppfiles/htdocs/laravel-digikala/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(121): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#36 /Applications/XAMPP/xamppfiles/htdocs/laravel-digikala/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#37 {main}', '2018-04-30 15:26:26');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `product_id`, `url`, `type`) VALUES
(1, 10, '49ef283e1863dc68bcb54e4280c2378e.jpg', 'review'),
(2, 10, '3a9f171b5b0852ddf2a89f378e16daf6.jpg', 'review'),
(3, 10, '44f28aaee6be9a47b3d3587f70b2f191.jpg', 'review'),
(4, 10, 'ad6c0b5f3bacabc70c9b5b27c8ebadb8.jpg', 'review'),
(5, 10, 'c11ab76e143accceb276233e5fd8dd8e.jpg', 'review'),
(6, 10, '18cf563dc46bb8b7f26ee1b06dad24d9.jpg', 'review'),
(7, 10, 'b850ed6550046c1d62bcbf16f928238b.jpg', 'review'),
(8, 10, 'e3dc9c8b6350164f038a669c42b55ff7.jpg', 'review'),
(9, 10, '86db10e5c4d416f432be80c2dba617ad.jpg', 'review'),
(10, 10, '54e8ee37bfc561402404e939e489c8b6.jpg', 'review');

-- --------------------------------------------------------

--
-- Table structure for table `filter`
--

CREATE TABLE `filter` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ename` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `filed` smallint(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `filter`
--

INSERT INTO `filter` (`id`, `cat_id`, `name`, `ename`, `parent_id`, `filed`) VALUES
(16, 7, 'برند و سازنده کالا', 'brand', 0, 1),
(17, 7, 'اپل', NULL, 16, 1),
(18, 7, 'سامسونگ', NULL, 16, 1),
(19, 7, 'ال جی', NULL, 16, 1),
(20, 7, 'بر اساس نوع', 'type', 0, 1),
(21, 7, 'ساير سيستم عامل ها', NULL, 20, 1),
(22, 7, 'سيستم عامل iOS', NULL, 20, 1),
(23, 7, 'سيستم عامل اندرويد', NULL, 20, 1),
(24, 7, 'سيستم عامل ويندوز فون', NULL, 20, 1),
(25, 7, 'تعداد سيم کارت', 'attribute', 0, 1),
(26, 7, 'تک', NULL, 25, 1),
(27, 7, 'دو', NULL, 25, 1),
(28, 7, 'سه', NULL, 25, 1),
(29, 7, 'حافظه داخلي', NULL, 0, 1),
(30, 7, '128 گيگابايت', NULL, 29, 1),
(31, 7, '128 مگابايت', NULL, 29, 1),
(32, 7, '16 گيگابايت', NULL, 29, 1),
(33, 7, '1 گيگابايت', NULL, 29, 1),
(38, 7, 'سفید', NULL, 37, 2),
(47, 7, 'سوني', NULL, 16, 1),
(45, 7, 'مشکی@000000', NULL, 43, 2),
(44, 7, 'سفید@FFFFFF', NULL, 43, 2),
(46, 7, 'زرد@FFD800', NULL, 43, 2),
(43, 7, 'بر اساس رنگ', 'attribute', 0, 2),
(48, 7, 'دل', NULL, 16, 1),
(49, 7, 'ايسر', NULL, 16, 1),
(50, 7, 'ایسوس', NULL, 16, 1),
(51, 7, 'نوکیا', NULL, 16, 1),
(52, 7, 'هوآوي', NULL, 16, 1),
(53, 7, 'اچ تی سی', NULL, 16, 1),
(54, 7, 'سوني', NULL, 16, 1),
(55, 7, 'مایکروسافت', NULL, 16, 1),
(56, 7, 'نوکیا', NULL, 16, 1),
(57, 7, 'لنوو', NULL, 16, 1),
(58, 7, 'سونی اریکسون', NULL, 16, 1),
(59, 7, 'موتورولا', NULL, 16, 1),
(60, 7, 'شبکه هاي ارتباطي', 'attribute', 0, 1),
(61, 7, '2G', NULL, 60, 1),
(62, 7, '3G', NULL, 60, 1),
(63, 7, '4G', NULL, 60, 1),
(64, 7, 'حس‌گرها', 'attribute', 0, 1),
(65, 7, 'شتاب‌سنج (Accelerometer)', NULL, 64, 1),
(66, 7, 'ارتفاع سنج (Altimeter)', NULL, 64, 1),
(67, 7, 'فشارسنج (Barometer)', NULL, 64, 1),
(68, 7, 'طيف رنگ (Color Spectrum)', NULL, 64, 1),
(69, 7, 'تشخيص چهره بيومتريک (Face ID)', NULL, 64, 1),
(70, 7, 'اثرانگشت روي قاب جلويي (FingerPrint|Front-Mounted)', NULL, 64, 1),
(71, 7, 'اثرانگشت روي قاب پشتي (FingerPrint|Rear-Mounted)', NULL, 64, 1),
(72, 7, 'اثرانگشت روي لبه (FingerPrint|Side-Mounted)', NULL, 64, 1),
(73, 7, 'فرمان‌هاي حرکتي (Gesture)', NULL, 64, 1),
(74, 7, 'ژيروسکوپ (Gyro)', NULL, 64, 1),
(75, 7, 'شمارنده ضربان قلب (Heart Rate)', NULL, 64, 1),
(76, 7, 'مقدار RAM', 'attribute', 0, 1),
(77, 7, '1.5 گيگابايت', NULL, 76, 1),
(78, 7, '128 مگابايت', NULL, 76, 1),
(79, 7, '16 مگابايت', NULL, 76, 1),
(80, 7, '1 گيگابايت', NULL, 76, 1),
(81, 7, '24 مگابايت', NULL, 76, 1),
(82, 7, '256 مگابايت', NULL, 76, 1),
(83, 7, '2 گيگابايت', NULL, 76, 1),
(84, 7, 'رزولوشن عکس', 'attribute', 0, 1),
(85, 7, '1.3 مگاپيکسل', NULL, 84, 1),
(86, 7, '10.0 مگاپيکسل', NULL, 84, 1),
(87, 7, '12.2 مگاپيکسل', NULL, 84, 1),
(88, 7, '12.3 مگاپيکسل', NULL, 84, 1),
(89, 7, 'ويژگي‌هاي خاص', 'attribute', 0, 1),
(90, 7, 'داراي تلويزيون همراه', NULL, 89, 1),
(91, 7, 'کلاسيک', NULL, 89, 1),
(92, 7, 'مناسب سالمندان', NULL, 89, 1),
(93, 7, 'مجهز به حس‌گر تشخيص چهره', NULL, 89, 1),
(94, 7, 'مجهز به حس‌گر اثرانگشت', NULL, 89, 1),
(95, 7, 'مناسب بازي', NULL, 89, 1),
(96, 7, 'داراي صفحه کليد', NULL, 89, 1),
(97, 7, 'طراحي مناسب بانوان', NULL, 89, 1),
(98, 7, 'فبلت', NULL, 89, 1),
(99, 7, 'مناسب عکاسي', NULL, 89, 1),
(100, 7, 'کشويي', NULL, 89, 1),
(101, 7, 'داراي قلم', NULL, 89, 1),
(102, 87, 'برند و سازنده کالا', 'brand', 0, 1),
(103, 87, 'اپل', NULL, 102, 1),
(104, 87, 'ایسوس', NULL, 102, 1),
(105, 87, 'اچ پي', NULL, 102, 1),
(106, 87, 'ايسر', NULL, 102, 1),
(107, 87, 'ام اس آی', NULL, 102, 1),
(108, 87, 'بر اساس نوع', 'type', 0, 1),
(109, 87, 'آلترابوک', NULL, 108, 1),
(110, 87, 'نت بوک', NULL, 108, 1),
(111, 87, 'نوت بوک (لپ تاپ)', NULL, 108, 1),
(112, 87, 'کروم بوک', NULL, 108, 1),
(117, 7, 'آبی@62CEFF', NULL, 43, 2),
(118, 7, 'سبز@2CFF51', NULL, 43, 2),
(119, 7, 'خاکسری@7C7C7C', NULL, 43, 2);

-- --------------------------------------------------------

--
-- Table structure for table `filter_product`
--

CREATE TABLE `filter_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `filter_id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `product` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `filter_product`
--

INSERT INTO `filter_product` (`id`, `filter_id`, `value`, `product`) VALUES
(75, 20, 22, 11),
(40, 43, 46, 10),
(39, 43, 44, 10),
(38, 29, 33, 10),
(37, 25, 27, 10),
(36, 20, 23, 10),
(35, 16, 18, 10),
(74, 16, 17, 11),
(41, 16, 17, 13),
(42, 20, 22, 13),
(43, 25, 27, 13),
(44, 29, 32, 13),
(45, 43, 44, 13),
(46, 43, 45, 13),
(47, 16, 17, 12),
(48, 20, 22, 12),
(49, 25, 28, 12),
(50, 29, 33, 12),
(51, 43, 44, 12),
(52, 43, 45, 12),
(53, 43, 46, 12),
(63, 43, 46, 14),
(62, 29, 32, 14),
(61, 25, 27, 14),
(60, 20, 23, 14),
(59, 16, 18, 14),
(64, 16, 52, 15),
(65, 20, 23, 15),
(66, 25, 26, 15),
(67, 29, 32, 15),
(68, 43, 45, 15),
(69, 16, 47, 16),
(70, 20, 23, 16),
(71, 25, 27, 16),
(72, 29, 31, 16),
(73, 43, 44, 16),
(76, 25, 27, 11),
(77, 16, 47, 17),
(78, 20, 23, 17),
(79, 25, 28, 17),
(80, 29, 32, 17),
(81, 60, 62, 17),
(82, 64, 66, 17),
(83, 84, 86, 17),
(84, 89, 95, 17),
(85, 102, 103, 18),
(86, 108, 110, 18),
(87, 16, 19, 19),
(88, 20, 21, 19),
(89, 25, 27, 19),
(90, 89, 91, 19),
(91, 43, 44, 19),
(92, 43, 46, 19),
(106, 43, 45, 21),
(105, 43, 44, 21),
(104, 89, 95, 21),
(103, 60, 62, 21),
(102, 25, 27, 21),
(101, 20, 23, 21),
(100, 16, 17, 21);

-- --------------------------------------------------------

--
-- Table structure for table `gift_cart`
--

CREATE TABLE `gift_cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `value2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gift_cart`
--

INSERT INTO `gift_cart` (`id`, `code`, `value`, `time`, `user_id`, `date`, `status`, `value2`) VALUES
(2, 'digiGift266728', 100000, 1529868599, 2, '1397/4/3', 2, 0),
(3, 'digiGift271558', 50000, 1530041399, 2, '1397/4/5', 0, 0),
(4, 'digiGift242834', 100000, 1544819399, 2, '1397/9/23', 0, 78000),
(5, 'digiGift242857', 50000, 1544819399, 2, '1397/9/23', 1, 50000),
(6, 'digiGift296734', 125000, 1545424199, 2, '1397/9/30', 1, 125000);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `filed` smallint(6) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `cat_id`, `name`, `filed`, `parent_id`) VALUES
(19, 7, 'ساختار بدنه', 3, 11),
(17, 7, 'ابعاد', 1, 11),
(18, 7, 'وزن', 1, 11),
(13, 7, 'قطع سيم کارت', 1, 11),
(11, 7, 'مشخصات کلي', 0, 0),
(12, 7, 'تعداد سيم کارت', 1, 11),
(20, 7, 'ويژگي‌هاي خاص', 1, 11),
(21, 7, 'پردازنده', 0, 0),
(22, 7, 'تراشه', 1, 21),
(23, 7, 'پردازنده‌ي مرکزي', 1, 21),
(24, 7, 'نوع پردازنده', 1, 21),
(25, 7, 'فرکانس پردازنده‌ي مرکزي', 1, 21),
(26, 7, 'پردازنده‌ي گرافيکي', 1, 21),
(27, 7, 'حافظه', 0, 0),
(28, 7, 'حافظه داخلي', 1, 27),
(29, 7, 'مقدار RAM', 1, 27),
(30, 7, 'پشتيباني از کارت حافظه جانبي', 1, 27),
(31, 7, 'حداکثر ظرفيت کارت حافظه', 1, 27),
(32, 7, 'صفحه نمايش', 0, 0),
(33, 7, 'صفحه نمايش رنگي', 2, 32),
(34, 7, 'صفحه نمايش لمسي', 2, 32),
(35, 7, 'نوع', 1, 32),
(36, 7, 'فناوري', 1, 32),
(37, 7, 'بازه‌ي سايز صفحه نمايش', 1, 32),
(38, 7, 'اندازه', 1, 32),
(39, 7, 'رزولوشن', 1, 32),
(40, 7, 'تراکم پيکسلي', 1, 32),
(41, 7, 'تعداد رنگ', 1, 32),
(42, 7, 'محافظت', 1, 32),
(43, 7, 'ساير قابليت‌ها', 1, 32),
(44, 7, 'ارتباطات', 0, 0),
(45, 7, 'شبکه هاي ارتباطي', 1, 44),
(46, 7, 'شبکه 2G', 3, 44),
(47, 7, 'شبکه 3G', 1, 44),
(48, 7, 'شبکه 4G', 3, 44),
(49, 7, 'فن‌آوري‌هاي ارتباطي', 1, 44),
(50, 7, 'Wi-Fi', 3, 44),
(51, 7, 'بلوتوث', 3, 44),
(52, 7, 'راديو', 1, 44),
(53, 7, 'فن‌آوري مکان‌يابي', 1, 44),
(54, 7, 'درگاه ارتباطي', 1, 44),
(55, 7, 'دوربين', 0, 0),
(56, 7, 'دوربين', 2, 55),
(57, 7, 'رزولوشن عکس', 1, 55),
(58, 7, 'فناوري فوکوس', 1, 55),
(59, 7, 'فلش', 1, 55),
(60, 7, 'قابليت‌هاي دوربين', 3, 55),
(61, 7, 'فيلمبرداري', 1, 55),
(62, 7, 'دوربين سلفي', 3, 55),
(63, 7, 'صدا', 0, 0),
(64, 7, 'بلندگو', 2, 63),
(65, 7, 'خروجي صدا', 2, 63),
(66, 7, 'امکانات نرم افزاري', 0, 0),
(67, 7, 'سيستم عامل', 1, 66),
(68, 7, 'نسخه سيستم عامل', 1, 66),
(69, 7, 'پشتيباني از زبان فارسي', 2, 66),
(70, 7, 'منوي فارسي', 2, 66),
(71, 7, 'قابليت‌هاي نرم‌افزاري', 3, 66),
(72, 7, 'دفترچه تلفن', 1, 66),
(73, 7, 'موسيقي', 1, 66),
(74, 7, 'ويديو', 1, 66),
(75, 7, 'ضبط صدا', 2, 66),
(76, 7, 'ساير مشخصات', 0, 0),
(77, 7, 'حس‌گرها', 3, 76),
(78, 7, 'باتري قابل تعويض', 2, 76),
(79, 7, 'مشخصات باتري', 1, 76),
(80, 7, 'ميزان شارژ مکالمه', 1, 76),
(81, 7, 'اقلام همراه گوشي', 1, 76);

-- --------------------------------------------------------

--
-- Table structure for table `item_product`
--

CREATE TABLE `item_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_id` int(11) NOT NULL,
  `value` text COLLATE utf8_unicode_ci,
  `product_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `item_product`
--

INSERT INTO `item_product` (`id`, `item_id`, `value`, `product_id`) VALUES
(107, 41, '16 ميليون رنگ', 10),
(106, 40, '401 پيکسل بر هر اينچ', 10),
(105, 39, '1920 × 1080 | Full HD', 10),
(104, 38, '5.5اينچ', 10),
(100, 34, '1', 10),
(101, 35, 'LCD', 10),
(102, 36, 'TFT', 10),
(103, 37, '5.5 تا 6.0 اينچ', 10),
(93, 25, '1.6 گيگاهرتز', 10),
(94, 26, 'Mali-T830MP2 GPU', 10),
(95, 28, '16 گيگابايت', 10),
(96, 29, '3 گيگابايت', 10),
(97, 30, 'microSD', 10),
(98, 31, '256 گيگابايت', 10),
(99, 33, '1', 10),
(91, 23, 'Octa-Core Cortex-A53 CPU', 10),
(92, 24, '64 بيت', 10),
(89, 20, 'فبلت، مجهز به حس‌گر اثرانگشت', 10),
(90, 22, 'Exynos 7870 Octa Chipset', 10),
(88, 19, 'بدنه‌ی تمام فلزی یکپارچه \r\n@#!\r\nمجهز به حس‌گر اثر انگشت (Fingerprint Sensor)', 10),
(87, 18, '167 گرم', 10),
(86, 17, '8 × 75 × 151.7 ميلي‌متر', 10),
(85, 13, 'سايز نانو (8.8 × 12.3 ميلي‌متر)', 10),
(84, 12, 'دو سيم کارت', 10),
(108, 42, 'Corning Gorilla Glass 4', 10),
(109, 43, 'قابلیت دریافت تا 2 لمس همزمان', 10),
(110, 45, '2G، 3G، 4G', 10),
(111, 46, 'GSM 850 / 900 / 1800 / 1900\r\n@#!\r\n برای هر دو سیم کارت', 10),
(112, 47, 'HSDPA 850 / 900 / 1900 / 2100', 10),
(113, 48, 'LTE band 1|2100, 3|1800, 5|850, 7|2600, 8|900, 20|800, 40|2300\r\n@#!\r\n LTE از نوع Cat4 با سرعت دانلود 150 مگابیت بر ثانیه و آپلود 50 مگابیت بر ثانیه', 10),
(114, 49, 'GPRS، EDGE، Wi-Fi، بلوتوث', 10),
(115, 50, 'Wi-Fi 802.11 b/g/n\r\n@#!\r\nWi-Fi Direct, Wi-Fi hotspot', 10),
(116, 51, 'نسخه 4.1 \r\n@#!\r\nA2DP , LE', 10),
(117, 52, 'ندارد', 10),
(118, 53, 'A-GPS، GLONASS، Beidou|BDS', 10),
(119, 54, 'microUSB v2.0', 10),
(120, 56, '1', 10),
(121, 57, '13.0 مگاپيکسل', 10),
(122, 58, 'AutoFocus', 10),
(123, 59, 'LED', 10),
(124, 60, 'فاصله کانونی لنز 28 میلی‌متر \r\n@#!\r\nدارای دریچه‌ی دیافراگم f/1.9\r\n@#!\r\nقابلیت ثبت موقعیت جغرافیایی عکس‌ها و فیلم‌ها (Geo-Tagging)\r\n@#!\r\nقابلیت فوکوس با اشاره روی سوژه (Touch Focus)\r\n@#!\r\nقابلیت تشخیص چهره (Face Detection) \r\n@#!\r\nقابلیت عکاسی پانوراما (Panorama)\r\n@#!\r\nقابلیت عکاسی HDR', 10),
(125, 61, 'رزولوشن 1080 × 1920 و سرعت 30 فریم بر ثانیه (1080p@30FPS)', 10),
(126, 62, 'دارای سنسور با رزولوشن 8 مگاپیکسل \r\n@#\r\nدارای دریچه‌ی دیافراگم f/2.2', 10),
(127, 64, '1', 10),
(128, 65, '1', 10),
(129, 67, 'Android', 10),
(130, 68, 'Marshmallow 6.0', 10),
(131, 69, '1', 10),
(132, 70, '1', 10),
(133, 71, 'MMS، ايميل، مرورگر HTML5، قابليت نمايش اسناد مايکروسافت آفيس، قابليت نمايش فايل‌هاي متني PDF، برنامه ويرايش عکس، سرويس‌هاي گوگل شامل Google Search, Google Maps, Gmail و YouTube، قابليت استفاده از سرويس شبکه‌هاي اجتماعي', 10),
(134, 72, 'با امکان افزودن مخاطب به تعداد بی‌نهایت', 10),
(135, 73, 'MP3، WAV، Flac', 10),
(136, 74, 'MP4، DivX، XviD، H.265', 10),
(137, 75, '1', 10),
(138, 77, 'شتاب‌سنج (Accelerometer)، مجاورت (Proximity)، اثرانگشت روي قاب جلويي (FingerPrint|Front-Mounted)', 10),
(139, 78, '2', 10),
(140, 79, 'باتری از نوع لیتیوم-یون با ظرفیت 3300 میلی‌آمپر ساعت', 10),
(141, 80, '21 ساعت', 10),
(142, 81, 'دفترچه‌ راهنما، کابل USB، هدفون، شارژر', 10);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(1, 'default', '{\"displayName\":\"App\\\\Mail\\\\OrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":4,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":3:{s:8:\\\"mailable\\\";O:18:\\\"App\\\\Mail\\\\OrderMail\\\":19:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":3:{s:5:\\\"class\\\";s:9:\\\"App\\\\Order\\\";s:2:\\\"id\\\";i:21;s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:5:\\\"tries\\\";i:4;s:4:\\\"from\\\";a:0:{}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:5:\\\"admin\\\";}}s:2:\\\"cc\\\";a:0:{}s:3:\\\"bcc\\\";a:0:{}s:7:\\\"replyTo\\\";a:0:{}s:7:\\\"subject\\\";N;s:11:\\\"\\u0000*\\u0000markdown\\\";N;s:4:\\\"view\\\";N;s:8:\\\"textView\\\";N;s:8:\\\"viewData\\\";a:0:{}s:11:\\\"attachments\\\";a:0:{}s:14:\\\"rawAttachments\\\";a:0:{}s:9:\\\"callbacks\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";i:4;s:7:\\\"timeout\\\";N;}\"}}', 0, NULL, 1529511221, 1529511221),
(2, 'default', '{\"displayName\":\"App\\\\Mail\\\\OrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":4,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":3:{s:8:\\\"mailable\\\";O:18:\\\"App\\\\Mail\\\\OrderMail\\\":19:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":3:{s:5:\\\"class\\\";s:9:\\\"App\\\\Order\\\";s:2:\\\"id\\\";i:22;s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:5:\\\"tries\\\";i:4;s:4:\\\"from\\\";a:0:{}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:5:\\\"admin\\\";}}s:2:\\\"cc\\\";a:0:{}s:3:\\\"bcc\\\";a:0:{}s:7:\\\"replyTo\\\";a:0:{}s:7:\\\"subject\\\";N;s:11:\\\"\\u0000*\\u0000markdown\\\";N;s:4:\\\"view\\\";N;s:8:\\\"textView\\\";N;s:8:\\\"viewData\\\";a:0:{}s:11:\\\"attachments\\\";a:0:{}s:14:\\\"rawAttachments\\\";a:0:{}s:9:\\\"callbacks\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";i:4;s:7:\\\"timeout\\\";N;}\"}}', 0, NULL, 1529511286, 1529511286),
(3, 'default', '{\"displayName\":\"App\\\\Mail\\\\OrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":4,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":3:{s:8:\\\"mailable\\\";O:18:\\\"App\\\\Mail\\\\OrderMail\\\":19:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":3:{s:5:\\\"class\\\";s:9:\\\"App\\\\Order\\\";s:2:\\\"id\\\";i:23;s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:5:\\\"tries\\\";i:4;s:4:\\\"from\\\";a:0:{}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:5:\\\"admin\\\";}}s:2:\\\"cc\\\";a:0:{}s:3:\\\"bcc\\\";a:0:{}s:7:\\\"replyTo\\\";a:0:{}s:7:\\\"subject\\\";N;s:11:\\\"\\u0000*\\u0000markdown\\\";N;s:4:\\\"view\\\";N;s:8:\\\"textView\\\";N;s:8:\\\"viewData\\\";a:0:{}s:11:\\\"attachments\\\";a:0:{}s:14:\\\"rawAttachments\\\";a:0:{}s:9:\\\"callbacks\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";i:4;s:7:\\\"timeout\\\";N;}\"}}', 0, NULL, 1529511384, 1529511384),
(4, 'default', '{\"displayName\":\"App\\\\Mail\\\\OrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":4,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":3:{s:8:\\\"mailable\\\";O:18:\\\"App\\\\Mail\\\\OrderMail\\\":19:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":3:{s:5:\\\"class\\\";s:9:\\\"App\\\\Order\\\";s:2:\\\"id\\\";i:24;s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:5:\\\"tries\\\";i:4;s:4:\\\"from\\\";a:0:{}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:5:\\\"admin\\\";}}s:2:\\\"cc\\\";a:0:{}s:3:\\\"bcc\\\";a:0:{}s:7:\\\"replyTo\\\";a:0:{}s:7:\\\"subject\\\";N;s:11:\\\"\\u0000*\\u0000markdown\\\";N;s:4:\\\"view\\\";N;s:8:\\\"textView\\\";N;s:8:\\\"viewData\\\";a:0:{}s:11:\\\"attachments\\\";a:0:{}s:14:\\\"rawAttachments\\\";a:0:{}s:9:\\\"callbacks\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";i:4;s:7:\\\"timeout\\\";N;}\"}}', 0, NULL, 1529511419, 1529511419),
(5, 'default', '{\"displayName\":\"App\\\\Mail\\\\OrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":4,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":3:{s:8:\\\"mailable\\\";O:18:\\\"App\\\\Mail\\\\OrderMail\\\":19:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":3:{s:5:\\\"class\\\";s:9:\\\"App\\\\Order\\\";s:2:\\\"id\\\";i:25;s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:5:\\\"tries\\\";i:4;s:4:\\\"from\\\";a:0:{}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:5:\\\"admin\\\";}}s:2:\\\"cc\\\";a:0:{}s:3:\\\"bcc\\\";a:0:{}s:7:\\\"replyTo\\\";a:0:{}s:7:\\\"subject\\\";N;s:11:\\\"\\u0000*\\u0000markdown\\\";N;s:4:\\\"view\\\";N;s:8:\\\"textView\\\";N;s:8:\\\"viewData\\\";a:0:{}s:11:\\\"attachments\\\";a:0:{}s:14:\\\"rawAttachments\\\";a:0:{}s:9:\\\"callbacks\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";i:4;s:7:\\\"timeout\\\";N;}\"}}', 0, NULL, 1529511518, 1529511518),
(6, 'default', '{\"displayName\":\"App\\\\Mail\\\\OrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":4,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":3:{s:8:\\\"mailable\\\";O:18:\\\"App\\\\Mail\\\\OrderMail\\\":19:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":3:{s:5:\\\"class\\\";s:9:\\\"App\\\\Order\\\";s:2:\\\"id\\\";i:26;s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:5:\\\"tries\\\";i:4;s:4:\\\"from\\\";a:0:{}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:5:\\\"admin\\\";}}s:2:\\\"cc\\\";a:0:{}s:3:\\\"bcc\\\";a:0:{}s:7:\\\"replyTo\\\";a:0:{}s:7:\\\"subject\\\";N;s:11:\\\"\\u0000*\\u0000markdown\\\";N;s:4:\\\"view\\\";N;s:8:\\\"textView\\\";N;s:8:\\\"viewData\\\";a:0:{}s:11:\\\"attachments\\\";a:0:{}s:14:\\\"rawAttachments\\\";a:0:{}s:9:\\\"callbacks\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";i:4;s:7:\\\"timeout\\\";N;}\"}}', 0, NULL, 1529515617, 1529515617),
(7, 'default', '{\"displayName\":\"App\\\\Mail\\\\OrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":4,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":3:{s:8:\\\"mailable\\\";O:18:\\\"App\\\\Mail\\\\OrderMail\\\":19:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":3:{s:5:\\\"class\\\";s:9:\\\"App\\\\Order\\\";s:2:\\\"id\\\";i:27;s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:5:\\\"tries\\\";i:4;s:4:\\\"from\\\";a:0:{}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:5:\\\"admin\\\";}}s:2:\\\"cc\\\";a:0:{}s:3:\\\"bcc\\\";a:0:{}s:7:\\\"replyTo\\\";a:0:{}s:7:\\\"subject\\\";N;s:11:\\\"\\u0000*\\u0000markdown\\\";N;s:4:\\\"view\\\";N;s:8:\\\"textView\\\";N;s:8:\\\"viewData\\\";a:0:{}s:11:\\\"attachments\\\";a:0:{}s:14:\\\"rawAttachments\\\";a:0:{}s:9:\\\"callbacks\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";i:4;s:7:\\\"timeout\\\";N;}\"}}', 0, NULL, 1529515711, 1529515711),
(8, 'default', '{\"displayName\":\"App\\\\Mail\\\\OrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":4,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":3:{s:8:\\\"mailable\\\";O:18:\\\"App\\\\Mail\\\\OrderMail\\\":19:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":3:{s:5:\\\"class\\\";s:9:\\\"App\\\\Order\\\";s:2:\\\"id\\\";i:28;s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:5:\\\"tries\\\";i:4;s:4:\\\"from\\\";a:0:{}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:5:\\\"admin\\\";}}s:2:\\\"cc\\\";a:0:{}s:3:\\\"bcc\\\";a:0:{}s:7:\\\"replyTo\\\";a:0:{}s:7:\\\"subject\\\";N;s:11:\\\"\\u0000*\\u0000markdown\\\";N;s:4:\\\"view\\\";N;s:8:\\\"textView\\\";N;s:8:\\\"viewData\\\";a:0:{}s:11:\\\"attachments\\\";a:0:{}s:14:\\\"rawAttachments\\\";a:0:{}s:9:\\\"callbacks\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";i:4;s:7:\\\"timeout\\\";N;}\"}}', 0, NULL, 1529572276, 1529572276),
(9, 'default', '{\"displayName\":\"App\\\\Mail\\\\OrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":4,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":3:{s:8:\\\"mailable\\\";O:18:\\\"App\\\\Mail\\\\OrderMail\\\":19:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":3:{s:5:\\\"class\\\";s:9:\\\"App\\\\Order\\\";s:2:\\\"id\\\";i:29;s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:5:\\\"tries\\\";i:4;s:4:\\\"from\\\";a:0:{}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:5:\\\"admin\\\";}}s:2:\\\"cc\\\";a:0:{}s:3:\\\"bcc\\\";a:0:{}s:7:\\\"replyTo\\\";a:0:{}s:7:\\\"subject\\\";N;s:11:\\\"\\u0000*\\u0000markdown\\\";N;s:4:\\\"view\\\";N;s:8:\\\"textView\\\";N;s:8:\\\"viewData\\\";a:0:{}s:11:\\\"attachments\\\";a:0:{}s:14:\\\"rawAttachments\\\";a:0:{}s:9:\\\"callbacks\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";i:4;s:7:\\\"timeout\\\";N;}\"}}', 0, NULL, 1529573552, 1529573552),
(10, 'default', '{\"displayName\":\"App\\\\Mail\\\\OrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":4,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":3:{s:8:\\\"mailable\\\";O:18:\\\"App\\\\Mail\\\\OrderMail\\\":19:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":3:{s:5:\\\"class\\\";s:9:\\\"App\\\\Order\\\";s:2:\\\"id\\\";i:30;s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:5:\\\"tries\\\";i:4;s:4:\\\"from\\\";a:0:{}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:5:\\\"admin\\\";}}s:2:\\\"cc\\\";a:0:{}s:3:\\\"bcc\\\";a:0:{}s:7:\\\"replyTo\\\";a:0:{}s:7:\\\"subject\\\";N;s:11:\\\"\\u0000*\\u0000markdown\\\";N;s:4:\\\"view\\\";N;s:8:\\\"textView\\\";N;s:8:\\\"viewData\\\";a:0:{}s:11:\\\"attachments\\\";a:0:{}s:14:\\\"rawAttachments\\\";a:0:{}s:9:\\\"callbacks\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";i:4;s:7:\\\"timeout\\\";N;}\"}}', 0, NULL, 1529598677, 1529598677),
(11, 'default', '{\"displayName\":\"App\\\\Mail\\\\OrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":4,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":3:{s:8:\\\"mailable\\\";O:18:\\\"App\\\\Mail\\\\OrderMail\\\":19:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":3:{s:5:\\\"class\\\";s:9:\\\"App\\\\Order\\\";s:2:\\\"id\\\";i:31;s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:5:\\\"tries\\\";i:4;s:4:\\\"from\\\";a:0:{}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:14:\\\"reza@gmail.com\\\";}}s:2:\\\"cc\\\";a:0:{}s:3:\\\"bcc\\\";a:0:{}s:7:\\\"replyTo\\\";a:0:{}s:7:\\\"subject\\\";N;s:11:\\\"\\u0000*\\u0000markdown\\\";N;s:4:\\\"view\\\";N;s:8:\\\"textView\\\";N;s:8:\\\"viewData\\\";a:0:{}s:11:\\\"attachments\\\";a:0:{}s:14:\\\"rawAttachments\\\";a:0:{}s:9:\\\"callbacks\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";i:4;s:7:\\\"timeout\\\";N;}\"}}', 0, NULL, 1529937270, 1529937270),
(12, 'default', '{\"displayName\":\"App\\\\Mail\\\\OrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":4,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":3:{s:8:\\\"mailable\\\";O:18:\\\"App\\\\Mail\\\\OrderMail\\\":19:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":3:{s:5:\\\"class\\\";s:9:\\\"App\\\\Order\\\";s:2:\\\"id\\\";i:32;s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:5:\\\"tries\\\";i:4;s:4:\\\"from\\\";a:0:{}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:14:\\\"reza@gmail.com\\\";}}s:2:\\\"cc\\\";a:0:{}s:3:\\\"bcc\\\";a:0:{}s:7:\\\"replyTo\\\";a:0:{}s:7:\\\"subject\\\";N;s:11:\\\"\\u0000*\\u0000markdown\\\";N;s:4:\\\"view\\\";N;s:8:\\\"textView\\\";N;s:8:\\\"viewData\\\";a:0:{}s:11:\\\"attachments\\\";a:0:{}s:14:\\\"rawAttachments\\\";a:0:{}s:9:\\\"callbacks\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";i:4;s:7:\\\"timeout\\\";N;}\"}}', 0, NULL, 1529937371, 1529937371),
(13, 'default', '{\"displayName\":\"App\\\\Mail\\\\OrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":4,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":3:{s:8:\\\"mailable\\\";O:18:\\\"App\\\\Mail\\\\OrderMail\\\":19:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":3:{s:5:\\\"class\\\";s:9:\\\"App\\\\Order\\\";s:2:\\\"id\\\";i:33;s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:5:\\\"tries\\\";i:4;s:4:\\\"from\\\";a:0:{}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:14:\\\"reza@gmail.com\\\";}}s:2:\\\"cc\\\";a:0:{}s:3:\\\"bcc\\\";a:0:{}s:7:\\\"replyTo\\\";a:0:{}s:7:\\\"subject\\\";N;s:11:\\\"\\u0000*\\u0000markdown\\\";N;s:4:\\\"view\\\";N;s:8:\\\"textView\\\";N;s:8:\\\"viewData\\\";a:0:{}s:11:\\\"attachments\\\";a:0:{}s:14:\\\"rawAttachments\\\";a:0:{}s:9:\\\"callbacks\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";i:4;s:7:\\\"timeout\\\";N;}\"}}', 0, NULL, 1529937492, 1529937492),
(14, 'default', '{\"displayName\":\"App\\\\Mail\\\\OrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":4,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":3:{s:8:\\\"mailable\\\";O:18:\\\"App\\\\Mail\\\\OrderMail\\\":19:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":3:{s:5:\\\"class\\\";s:9:\\\"App\\\\Order\\\";s:2:\\\"id\\\";i:34;s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:5:\\\"tries\\\";i:4;s:4:\\\"from\\\";a:0:{}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:14:\\\"reza@gmail.com\\\";}}s:2:\\\"cc\\\";a:0:{}s:3:\\\"bcc\\\";a:0:{}s:7:\\\"replyTo\\\";a:0:{}s:7:\\\"subject\\\";N;s:11:\\\"\\u0000*\\u0000markdown\\\";N;s:4:\\\"view\\\";N;s:8:\\\"textView\\\";N;s:8:\\\"viewData\\\";a:0:{}s:11:\\\"attachments\\\";a:0:{}s:14:\\\"rawAttachments\\\";a:0:{}s:9:\\\"callbacks\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";i:4;s:7:\\\"timeout\\\";N;}\"}}', 0, NULL, 1529937516, 1529937516),
(15, 'default', '{\"displayName\":\"App\\\\Mail\\\\OrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":4,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":3:{s:8:\\\"mailable\\\";O:18:\\\"App\\\\Mail\\\\OrderMail\\\":19:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":3:{s:5:\\\"class\\\";s:9:\\\"App\\\\Order\\\";s:2:\\\"id\\\";i:46;s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:5:\\\"tries\\\";i:4;s:4:\\\"from\\\";a:0:{}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:5:\\\"admin\\\";}}s:2:\\\"cc\\\";a:0:{}s:3:\\\"bcc\\\";a:0:{}s:7:\\\"replyTo\\\";a:0:{}s:7:\\\"subject\\\";N;s:11:\\\"\\u0000*\\u0000markdown\\\";N;s:4:\\\"view\\\";N;s:8:\\\"textView\\\";N;s:8:\\\"viewData\\\";a:0:{}s:11:\\\"attachments\\\";a:0:{}s:14:\\\"rawAttachments\\\";a:0:{}s:9:\\\"callbacks\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";i:4;s:7:\\\"timeout\\\";N;}\"}}', 0, NULL, 1543241955, 1543241955),
(16, 'default', '{\"displayName\":\"App\\\\Mail\\\\OrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":4,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":3:{s:8:\\\"mailable\\\";O:18:\\\"App\\\\Mail\\\\OrderMail\\\":19:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":3:{s:5:\\\"class\\\";s:9:\\\"App\\\\Order\\\";s:2:\\\"id\\\";i:48;s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:5:\\\"tries\\\";i:4;s:4:\\\"from\\\";a:0:{}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:5:\\\"admin\\\";}}s:2:\\\"cc\\\";a:0:{}s:3:\\\"bcc\\\";a:0:{}s:7:\\\"replyTo\\\";a:0:{}s:7:\\\"subject\\\";N;s:11:\\\"\\u0000*\\u0000markdown\\\";N;s:4:\\\"view\\\";N;s:8:\\\"textView\\\";N;s:8:\\\"viewData\\\";a:0:{}s:11:\\\"attachments\\\";a:0:{}s:14:\\\"rawAttachments\\\";a:0:{}s:9:\\\"callbacks\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";i:4;s:7:\\\"timeout\\\";N;}\"}}', 0, NULL, 1543246417, 1543246417),
(17, 'default', '{\"displayName\":\"App\\\\Mail\\\\OrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":4,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":3:{s:8:\\\"mailable\\\";O:18:\\\"App\\\\Mail\\\\OrderMail\\\":19:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":3:{s:5:\\\"class\\\";s:9:\\\"App\\\\Order\\\";s:2:\\\"id\\\";i:49;s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:5:\\\"tries\\\";i:4;s:4:\\\"from\\\";a:0:{}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:5:\\\"admin\\\";}}s:2:\\\"cc\\\";a:0:{}s:3:\\\"bcc\\\";a:0:{}s:7:\\\"replyTo\\\";a:0:{}s:7:\\\"subject\\\";N;s:11:\\\"\\u0000*\\u0000markdown\\\";N;s:4:\\\"view\\\";N;s:8:\\\"textView\\\";N;s:8:\\\"viewData\\\";a:0:{}s:11:\\\"attachments\\\";a:0:{}s:14:\\\"rawAttachments\\\";a:0:{}s:9:\\\"callbacks\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";i:4;s:7:\\\"timeout\\\";N;}\"}}', 0, NULL, 1543246498, 1543246498),
(18, 'default', '{\"displayName\":\"App\\\\Mail\\\\OrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":4,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":3:{s:8:\\\"mailable\\\";O:18:\\\"App\\\\Mail\\\\OrderMail\\\":19:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":3:{s:5:\\\"class\\\";s:9:\\\"App\\\\Order\\\";s:2:\\\"id\\\";i:50;s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:5:\\\"tries\\\";i:4;s:4:\\\"from\\\";a:0:{}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:5:\\\"admin\\\";}}s:2:\\\"cc\\\";a:0:{}s:3:\\\"bcc\\\";a:0:{}s:7:\\\"replyTo\\\";a:0:{}s:7:\\\"subject\\\";N;s:11:\\\"\\u0000*\\u0000markdown\\\";N;s:4:\\\"view\\\";N;s:8:\\\"textView\\\";N;s:8:\\\"viewData\\\";a:0:{}s:11:\\\"attachments\\\";a:0:{}s:14:\\\"rawAttachments\\\";a:0:{}s:9:\\\"callbacks\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";i:4;s:7:\\\"timeout\\\";N;}\"}}', 0, NULL, 1543247968, 1543247968),
(19, 'default', '{\"displayName\":\"App\\\\Mail\\\\OrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":4,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":3:{s:8:\\\"mailable\\\";O:18:\\\"App\\\\Mail\\\\OrderMail\\\":19:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":3:{s:5:\\\"class\\\";s:9:\\\"App\\\\Order\\\";s:2:\\\"id\\\";i:51;s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:5:\\\"tries\\\";i:4;s:4:\\\"from\\\";a:0:{}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:5:\\\"admin\\\";}}s:2:\\\"cc\\\";a:0:{}s:3:\\\"bcc\\\";a:0:{}s:7:\\\"replyTo\\\";a:0:{}s:7:\\\"subject\\\";N;s:11:\\\"\\u0000*\\u0000markdown\\\";N;s:4:\\\"view\\\";N;s:8:\\\"textView\\\";N;s:8:\\\"viewData\\\";a:0:{}s:11:\\\"attachments\\\";a:0:{}s:14:\\\"rawAttachments\\\";a:0:{}s:9:\\\"callbacks\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";i:4;s:7:\\\"timeout\\\";N;}\"}}', 0, NULL, 1543249180, 1543249180),
(20, 'default', '{\"displayName\":\"App\\\\Mail\\\\OrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":4,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":3:{s:8:\\\"mailable\\\";O:18:\\\"App\\\\Mail\\\\OrderMail\\\":19:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":3:{s:5:\\\"class\\\";s:9:\\\"App\\\\Order\\\";s:2:\\\"id\\\";i:52;s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:5:\\\"tries\\\";i:4;s:4:\\\"from\\\";a:0:{}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:5:\\\"admin\\\";}}s:2:\\\"cc\\\";a:0:{}s:3:\\\"bcc\\\";a:0:{}s:7:\\\"replyTo\\\";a:0:{}s:7:\\\"subject\\\";N;s:11:\\\"\\u0000*\\u0000markdown\\\";N;s:4:\\\"view\\\";N;s:8:\\\"textView\\\";N;s:8:\\\"viewData\\\";a:0:{}s:11:\\\"attachments\\\";a:0:{}s:14:\\\"rawAttachments\\\";a:0:{}s:9:\\\"callbacks\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";i:4;s:7:\\\"timeout\\\";N;}\"}}', 0, NULL, 1544193596, 1544193596),
(21, 'default', '{\"displayName\":\"App\\\\Mail\\\\OrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":4,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":3:{s:8:\\\"mailable\\\";O:18:\\\"App\\\\Mail\\\\OrderMail\\\":19:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":3:{s:5:\\\"class\\\";s:9:\\\"App\\\\Order\\\";s:2:\\\"id\\\";i:53;s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:5:\\\"tries\\\";i:4;s:4:\\\"from\\\";a:0:{}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:5:\\\"admin\\\";}}s:2:\\\"cc\\\";a:0:{}s:3:\\\"bcc\\\";a:0:{}s:7:\\\"replyTo\\\";a:0:{}s:7:\\\"subject\\\";N;s:11:\\\"\\u0000*\\u0000markdown\\\";N;s:4:\\\"view\\\";N;s:8:\\\"textView\\\";N;s:8:\\\"viewData\\\";a:0:{}s:11:\\\"attachments\\\";a:0:{}s:14:\\\"rawAttachments\\\";a:0:{}s:9:\\\"callbacks\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";i:4;s:7:\\\"timeout\\\";N;}\"}}', 0, NULL, 1544194285, 1544194285),
(22, 'default', '{\"displayName\":\"App\\\\Mail\\\\OrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":4,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":3:{s:8:\\\"mailable\\\";O:18:\\\"App\\\\Mail\\\\OrderMail\\\":19:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":3:{s:5:\\\"class\\\";s:9:\\\"App\\\\Order\\\";s:2:\\\"id\\\";i:54;s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:5:\\\"tries\\\";i:4;s:4:\\\"from\\\";a:0:{}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:5:\\\"admin\\\";}}s:2:\\\"cc\\\";a:0:{}s:3:\\\"bcc\\\";a:0:{}s:7:\\\"replyTo\\\";a:0:{}s:7:\\\"subject\\\";N;s:11:\\\"\\u0000*\\u0000markdown\\\";N;s:4:\\\"view\\\";N;s:8:\\\"textView\\\";N;s:8:\\\"viewData\\\";a:0:{}s:11:\\\"attachments\\\";a:0:{}s:14:\\\"rawAttachments\\\";a:0:{}s:9:\\\"callbacks\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";i:4;s:7:\\\"timeout\\\";N;}\"}}', 0, NULL, 1544194437, 1544194437),
(23, 'default', '{\"displayName\":\"App\\\\Mail\\\\OrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":4,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":3:{s:8:\\\"mailable\\\";O:18:\\\"App\\\\Mail\\\\OrderMail\\\":19:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":3:{s:5:\\\"class\\\";s:9:\\\"App\\\\Order\\\";s:2:\\\"id\\\";i:55;s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:5:\\\"tries\\\";i:4;s:4:\\\"from\\\";a:0:{}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:5:\\\"admin\\\";}}s:2:\\\"cc\\\";a:0:{}s:3:\\\"bcc\\\";a:0:{}s:7:\\\"replyTo\\\";a:0:{}s:7:\\\"subject\\\";N;s:11:\\\"\\u0000*\\u0000markdown\\\";N;s:4:\\\"view\\\";N;s:8:\\\"textView\\\";N;s:8:\\\"viewData\\\";a:0:{}s:11:\\\"attachments\\\";a:0:{}s:14:\\\"rawAttachments\\\";a:0:{}s:9:\\\"callbacks\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";i:4;s:7:\\\"timeout\\\";N;}\"}}', 0, NULL, 1544195268, 1544195268),
(24, 'default', '{\"displayName\":\"App\\\\Mail\\\\OrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":4,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":3:{s:8:\\\"mailable\\\";O:18:\\\"App\\\\Mail\\\\OrderMail\\\":19:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":3:{s:5:\\\"class\\\";s:9:\\\"App\\\\Order\\\";s:2:\\\"id\\\";i:56;s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:5:\\\"tries\\\";i:4;s:4:\\\"from\\\";a:0:{}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:5:\\\"admin\\\";}}s:2:\\\"cc\\\";a:0:{}s:3:\\\"bcc\\\";a:0:{}s:7:\\\"replyTo\\\";a:0:{}s:7:\\\"subject\\\";N;s:11:\\\"\\u0000*\\u0000markdown\\\";N;s:4:\\\"view\\\";N;s:8:\\\"textView\\\";N;s:8:\\\"viewData\\\";a:0:{}s:11:\\\"attachments\\\";a:0:{}s:14:\\\"rawAttachments\\\";a:0:{}s:9:\\\"callbacks\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";i:4;s:7:\\\"timeout\\\";N;}\"}}', 0, NULL, 1544195689, 1544195689),
(25, 'default', '{\"displayName\":\"App\\\\Mail\\\\OrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":4,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":3:{s:8:\\\"mailable\\\";O:18:\\\"App\\\\Mail\\\\OrderMail\\\":19:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":3:{s:5:\\\"class\\\";s:9:\\\"App\\\\Order\\\";s:2:\\\"id\\\";i:57;s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:5:\\\"tries\\\";i:4;s:4:\\\"from\\\";a:0:{}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:5:\\\"admin\\\";}}s:2:\\\"cc\\\";a:0:{}s:3:\\\"bcc\\\";a:0:{}s:7:\\\"replyTo\\\";a:0:{}s:7:\\\"subject\\\";N;s:11:\\\"\\u0000*\\u0000markdown\\\";N;s:4:\\\"view\\\";N;s:8:\\\"textView\\\";N;s:8:\\\"viewData\\\";a:0:{}s:11:\\\"attachments\\\";a:0:{}s:14:\\\"rawAttachments\\\";a:0:{}s:9:\\\"callbacks\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";i:4;s:7:\\\"timeout\\\";N;}\"}}', 0, NULL, 1544195797, 1544195797),
(26, 'default', '{\"displayName\":\"App\\\\Mail\\\\OrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":4,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":3:{s:8:\\\"mailable\\\";O:18:\\\"App\\\\Mail\\\\OrderMail\\\":19:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":3:{s:5:\\\"class\\\";s:9:\\\"App\\\\Order\\\";s:2:\\\"id\\\";i:58;s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:5:\\\"tries\\\";i:4;s:4:\\\"from\\\";a:0:{}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:5:\\\"admin\\\";}}s:2:\\\"cc\\\";a:0:{}s:3:\\\"bcc\\\";a:0:{}s:7:\\\"replyTo\\\";a:0:{}s:7:\\\"subject\\\";N;s:11:\\\"\\u0000*\\u0000markdown\\\";N;s:4:\\\"view\\\";N;s:8:\\\"textView\\\";N;s:8:\\\"viewData\\\";a:0:{}s:11:\\\"attachments\\\";a:0:{}s:14:\\\"rawAttachments\\\";a:0:{}s:9:\\\"callbacks\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";i:4;s:7:\\\"timeout\\\";N;}\"}}', 0, NULL, 1544195944, 1544195944),
(27, 'default', '{\"displayName\":\"App\\\\Mail\\\\OrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":4,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":3:{s:8:\\\"mailable\\\";O:18:\\\"App\\\\Mail\\\\OrderMail\\\":19:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":3:{s:5:\\\"class\\\";s:9:\\\"App\\\\Order\\\";s:2:\\\"id\\\";i:59;s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:5:\\\"tries\\\";i:4;s:4:\\\"from\\\";a:0:{}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:5:\\\"admin\\\";}}s:2:\\\"cc\\\";a:0:{}s:3:\\\"bcc\\\";a:0:{}s:7:\\\"replyTo\\\";a:0:{}s:7:\\\"subject\\\";N;s:11:\\\"\\u0000*\\u0000markdown\\\";N;s:4:\\\"view\\\";N;s:8:\\\"textView\\\";N;s:8:\\\"viewData\\\";a:0:{}s:11:\\\"attachments\\\";a:0:{}s:14:\\\"rawAttachments\\\";a:0:{}s:9:\\\"callbacks\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";i:4;s:7:\\\"timeout\\\";N;}\"}}', 0, NULL, 1544196029, 1544196029),
(28, 'default', '{\"displayName\":\"App\\\\Mail\\\\OrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":4,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":3:{s:8:\\\"mailable\\\";O:18:\\\"App\\\\Mail\\\\OrderMail\\\":19:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":3:{s:5:\\\"class\\\";s:9:\\\"App\\\\Order\\\";s:2:\\\"id\\\";i:60;s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:5:\\\"tries\\\";i:4;s:4:\\\"from\\\";a:0:{}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:5:\\\"admin\\\";}}s:2:\\\"cc\\\";a:0:{}s:3:\\\"bcc\\\";a:0:{}s:7:\\\"replyTo\\\";a:0:{}s:7:\\\"subject\\\";N;s:11:\\\"\\u0000*\\u0000markdown\\\";N;s:4:\\\"view\\\";N;s:8:\\\"textView\\\";N;s:8:\\\"viewData\\\";a:0:{}s:11:\\\"attachments\\\";a:0:{}s:14:\\\"rawAttachments\\\";a:0:{}s:9:\\\"callbacks\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";i:4;s:7:\\\"timeout\\\";N;}\"}}', 0, NULL, 1544196079, 1544196079),
(29, 'default', '{\"displayName\":\"App\\\\Mail\\\\OrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":4,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":3:{s:8:\\\"mailable\\\";O:18:\\\"App\\\\Mail\\\\OrderMail\\\":19:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":3:{s:5:\\\"class\\\";s:9:\\\"App\\\\Order\\\";s:2:\\\"id\\\";i:61;s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:5:\\\"tries\\\";i:4;s:4:\\\"from\\\";a:0:{}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:5:\\\"admin\\\";}}s:2:\\\"cc\\\";a:0:{}s:3:\\\"bcc\\\";a:0:{}s:7:\\\"replyTo\\\";a:0:{}s:7:\\\"subject\\\";N;s:11:\\\"\\u0000*\\u0000markdown\\\";N;s:4:\\\"view\\\";N;s:8:\\\"textView\\\";N;s:8:\\\"viewData\\\";a:0:{}s:11:\\\"attachments\\\";a:0:{}s:14:\\\"rawAttachments\\\";a:0:{}s:9:\\\"callbacks\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";i:4;s:7:\\\"timeout\\\";N;}\"}}', 0, NULL, 1544196138, 1544196138),
(30, 'default', '{\"displayName\":\"App\\\\Mail\\\\OrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":4,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":3:{s:8:\\\"mailable\\\";O:18:\\\"App\\\\Mail\\\\OrderMail\\\":19:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":3:{s:5:\\\"class\\\";s:9:\\\"App\\\\Order\\\";s:2:\\\"id\\\";i:62;s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:5:\\\"tries\\\";i:4;s:4:\\\"from\\\";a:0:{}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:5:\\\"admin\\\";}}s:2:\\\"cc\\\";a:0:{}s:3:\\\"bcc\\\";a:0:{}s:7:\\\"replyTo\\\";a:0:{}s:7:\\\"subject\\\";N;s:11:\\\"\\u0000*\\u0000markdown\\\";N;s:4:\\\"view\\\";N;s:8:\\\"textView\\\";N;s:8:\\\"viewData\\\";a:0:{}s:11:\\\"attachments\\\";a:0:{}s:14:\\\"rawAttachments\\\";a:0:{}s:9:\\\"callbacks\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";i:4;s:7:\\\"timeout\\\";N;}\"}}', 0, NULL, 1544196949, 1544196949),
(31, 'default', '{\"displayName\":\"App\\\\Mail\\\\OrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":4,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":3:{s:8:\\\"mailable\\\";O:18:\\\"App\\\\Mail\\\\OrderMail\\\":19:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":3:{s:5:\\\"class\\\";s:9:\\\"App\\\\Order\\\";s:2:\\\"id\\\";i:63;s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:5:\\\"tries\\\";i:4;s:4:\\\"from\\\";a:0:{}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:5:\\\"admin\\\";}}s:2:\\\"cc\\\";a:0:{}s:3:\\\"bcc\\\";a:0:{}s:7:\\\"replyTo\\\";a:0:{}s:7:\\\"subject\\\";N;s:11:\\\"\\u0000*\\u0000markdown\\\";N;s:4:\\\"view\\\";N;s:8:\\\"textView\\\";N;s:8:\\\"viewData\\\";a:0:{}s:11:\\\"attachments\\\";a:0:{}s:14:\\\"rawAttachments\\\";a:0:{}s:9:\\\"callbacks\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";i:4;s:7:\\\"timeout\\\";N;}\"}}', 0, NULL, 1544197074, 1544197074);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(25, '2014_10_12_000000_create_users_table', 16),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2017_10_06_052235_create_category_table', 2),
(5, '2017_10_06_174913_create_slider_tabel', 3),
(7, '2017_10_06_200125_create_product_tabel', 4),
(8, '2017_10_07_065303_create_cat_product_table', 5),
(9, '2017_10_07_072155_create_color_product_table', 6),
(10, '2017_10_08_093144_create_product_image', 7),
(12, '2017_10_16_145151_create_filter_table', 8),
(13, '2017_10_17_083557_create_item_table', 9),
(16, '2017_10_22_070429_create_amazing_table', 10),
(17, '2017_10_27_133152_create_service_table', 11),
(18, '2017_10_07_174510_add_price_column_to_service_table', 12),
(19, '2017_10_14_091121_create_review_table', 13),
(20, '2017_10_14_092007_create_file_table', 14),
(23, '2017_10_18_075009_create_item_product_table', 15),
(26, '2017_10_23_154307_create_ostan_table', 17),
(27, '2017_10_23_154319_create_shahr_table', 17),
(28, '2017_11_13_194649_create_user_address_table', 18),
(31, '2017_11_18_065422_create_order_table', 20),
(30, '2017_11_18_070108_create_order_row_table', 19),
(32, '2017_11_18_073231_add_order_type_cloumn_to_order_table', 21),
(33, '2017_11_26_141544_add_order_id_cloumn_to_order_table', 22),
(34, '2017_11_27_132712_create_filter_product_table', 23),
(40, '2017_12_10_141133_create_comment_product_table', 24),
(41, '2017_12_10_133351_create_product_score_table', 25),
(42, '2017_12_12_075012_add_user_cloumn_to_user', 26),
(44, '2017_12_15_160306_create_question_table', 27),
(45, '2018_01_15_093537_add_statistics_table', 28),
(46, '2018_01_15_093556_create_statistics_user_table', 28),
(48, '2018_02_13_183855_create_setting_table', 29),
(49, '2016_06_01_000001_create_oauth_auth_codes_table', 30),
(50, '2016_06_01_000002_create_oauth_access_tokens_table', 30),
(51, '2016_06_01_000003_create_oauth_refresh_tokens_table', 30),
(52, '2016_06_01_000004_create_oauth_clients_table', 30),
(53, '2016_06_01_000005_create_oauth_personal_access_clients_table', 30),
(57, '2018_04_29_163228_create_failed_jobs_table', 31),
(56, '2018_04_29_161037_create_jobs_table', 31),
(58, '2018_06_20_132729_create_discounts_table', 32),
(59, '2018_06_21_065454_create_gift_cart', 33),
(60, '2018_06_21_081450_add_status_cloumn_to_gift_cart', 34),
(61, '2018_11_26_155152_create_order_gift_table', 35),
(62, '2018_12_07_152340_add_order_gift_cart_table', 36);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0823276f4f4d48652be2a961cdef3d11cc6b1ff1e5e88b7624966e5856536283035ffd6502c1a01c', 1, 6, NULL, '[]', 0, '2018-06-04 12:03:56', '2018-06-04 12:03:56', '2018-06-06 16:33:56'),
('28c217495f9e939a8f31ee2e9d253172a6ebda9f8777530d6b6f4dcee3d5f08adbda0b4cc0a8a29b', 4, 6, NULL, '[]', 0, '2018-05-31 07:06:52', '2018-05-31 07:06:52', '2018-06-02 11:36:52'),
('3efa21ef1600763f13ee34fa9130742312db51db5d465fdc44006d0924397a8e27ffc2b8695eb501', 1, 6, NULL, '[]', 0, '2018-08-03 09:20:13', '2018-08-03 09:20:13', '2018-08-05 13:50:13'),
('4044c6da729230330e83b4369ecf1ae389553be06761c8054d2b9a91a780f2bcfe2ed23c1eae1e66', 4, 6, NULL, '[]', 0, '2018-04-22 11:25:42', '2018-04-22 11:25:42', '2018-04-24 15:55:42'),
('4e368fdd0108ce0ad5dcd79850d14abf25d9a3abbe40a30cceca8e103dd211644131ad169cecadcf', 1, 6, NULL, '[]', 0, '2018-06-04 10:16:32', '2018-06-04 10:16:32', '2018-06-06 14:46:32'),
('5cb2626b0d1b22323dfbec3820d543ccca31a3e6fd2096dd67cd0a67730b3b358bc238a312caf6a4', 4, 6, NULL, '[]', 0, '2018-04-19 09:40:48', '2018-04-19 09:40:48', '2018-04-19 14:20:48'),
('60420eff53ef3877708d4ff075b14c7198ac36a2b2e63b90267e596e7663a877efde33a2eca82c65', 4, 6, NULL, '[]', 0, '2018-04-19 09:48:20', '2018-04-19 09:48:20', '2018-04-19 14:28:20'),
('66a237c323ca102ee3b7e122eda648a5f5a1e76a97eab8aed62f9dd5c96724b5975ecbc8b363773a', 4, 6, NULL, '[]', 0, '2018-06-22 09:38:13', '2018-06-22 09:38:13', '2018-06-24 14:08:13'),
('91208c5f56272f208eea5c3db781616fc5fb345b227276c4a454f550de24f77f7eb168caf154ddc9', 1, 6, NULL, '[]', 0, '2018-07-31 05:55:32', '2018-07-31 05:55:32', '2018-08-02 10:25:31'),
('a27166f5aad344240d4b19d08d7624fcd63d102a6692d53e39b3781a869f45c0bcdacde9908b9041', 1, 6, NULL, '[]', 0, '2018-08-05 10:51:27', '2018-08-05 10:51:27', '2018-08-07 15:21:27'),
('b99763744b9fe3f3427d4ab3b442351d2d864451c8533a24500763b2cfedc1e9ced7439dc7d9b25b', 4, 2, 'test', '[]', 0, '2018-04-23 03:31:34', '2018-04-23 03:31:34', '2019-04-23 08:01:34'),
('ba2e26bda87320fe32af51c1be411ca8c01ad35984d80021b3cf0a2e3e1187f64f10eb315ecc564f', 1, 6, NULL, '[]', 0, '2018-06-04 11:17:17', '2018-06-04 11:17:17', '2018-06-06 15:47:17'),
('e9f128e5fe1b65a1f5cba15488a5d0e8c70a30506c3e30ec1fdd995f54ca5b942246db8f9d73074f', 4, 6, NULL, '[]', 0, '2018-04-23 03:40:37', '2018-04-23 03:40:37', '2018-04-25 08:10:37');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'sjvFbofTiKayz4w67xvoks31NbyjBf7XWxlXuohM', 'http://localhost', 1, 0, 0, '2018-04-15 09:03:16', '2018-04-15 09:03:16'),
(2, NULL, 'Laravel Personal Access Client', 'sMXpeaKRXkoXwVMmHgxHqS1rkwmUfF02qKk5naCl', 'http://localhost', 1, 0, 0, '2018-04-15 09:05:00', '2018-04-15 09:05:00'),
(6, NULL, 'Laravel Password Grant Client', 'v3Bha4nEQztteaS3lkUJNkWbGA27zDOXbUMJncss', 'http://localhost', 0, 1, 0, '2018-04-19 09:28:29', '2018-04-19 09:28:29');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(2, 2, '2018-04-15 09:05:00', '2018-04-15 09:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oauth_refresh_tokens`
--

INSERT INTO `oauth_refresh_tokens` (`id`, `access_token_id`, `revoked`, `expires_at`) VALUES
('0a698b04b7bf4b48a5d037233dbe44aa78d24509de45482cfc782951a7c534f24906ad7772051bf8', '28c217495f9e939a8f31ee2e9d253172a6ebda9f8777530d6b6f4dcee3d5f08adbda0b4cc0a8a29b', 0, '2019-05-31 11:36:52'),
('1d0dd4867f0fa4081149c9ec6cd8834cb5412609e20d736142036b8be2540dfe4105c8cc22097312', '19c0d06085a85b491396a7d25831a774f2ae642ec5ac162f059e3f91921a4df1e4aaeef40845ad8d', 0, '2019-04-16 15:36:41'),
('259fdd47e0ba897c5ad1bcac99a60a9468643dc1ed7313b6286b98829378a39dd5c0bd32cfda2cfe', '6a5e3013f30cb11d662e0412fb8ce594f0da306518bc3b5bac7dbb967bab175a02b032b90354dc5e', 0, '2019-04-19 07:55:07'),
('2dd71e1e12490f4c632b914629a4fe7946514cfccd77fa186573416011e2c43fe0fd13d3d6ea550e', 'e4b2292d96f68891455bbbc9752290a274fbce29cac1dbb007caedfb0b1322569a0f45db6c1b6643', 0, '2019-04-16 16:12:52'),
('363070b3935afb10540e075acdec0d1c1fb782586e70c500f13d5d72bfbd64b70d7ebcd3a79a0a79', 'a27166f5aad344240d4b19d08d7624fcd63d102a6692d53e39b3781a869f45c0bcdacde9908b9041', 0, '2019-08-05 15:21:28'),
('3bacf4aa5f1d931b2fd81096862a928da0994a9d33686ba7c635990b6edb7bff314be8ecb9fa8371', 'ffcac9ea8ad2da97b949611c6ea4273aa97da082ce922427fd430d46a03aa88782b5a9549d7c44ac', 0, '2019-04-19 07:54:11'),
('3bbbe5c092254f080ff16ec0aeaf725a77b9d45fbd7b29ed056b1f8673f1dec2a21df969c116ecff', 'eefa2b4129c516b89208c7b47195fe4c4102679ad335be61c7f0c804ead446a97e72e85572042560', 0, '2019-04-22 16:19:34'),
('3d605eb2f2573d2b50d063ace638cecfdef098de7659c7cc1b832fe52be8df1024e718f7595349aa', 'e6c36a885876635eadd4f203f52918cc0a78ecaf1d75df84740544e2ad9f593ad1e727ed0a1de6bd', 0, '2019-04-16 16:00:56'),
('3e446fdeea31e01246be06148ce2bb60feacf52b403599f3c40e282c0546aa32a72e62ba5bbf30d3', '91208c5f56272f208eea5c3db781616fc5fb345b227276c4a454f550de24f77f7eb168caf154ddc9', 0, '2019-07-31 10:25:32'),
('3ea7020eb88486a0387fa3dc2ce5e2b8afd6a7d8f05bd11c5d673946af4feec1996094669fc45430', '60420eff53ef3877708d4ff075b14c7198ac36a2b2e63b90267e596e7663a877efde33a2eca82c65', 0, '2019-04-19 14:18:20'),
('4089b4fc25f3477e1eeaf702106eb7db61500591d6de219a6ee319a0bb08593bed6890fe31ed7a7c', '65778f32b6ec585c253097f121fb911eb48c8045eaf5ede399fab1679bc10385589a519a0c632415', 0, '2019-04-19 14:38:43'),
('5002fe4e1c48005d4cd20e36fef1033d160f662a94a065b3b8676c0dfefa30624ef83fba88c98a75', '8bc1e3a3b12c0bae88fd76f10cef7d3dca6ed8e037e44b70a4f259a9c81032b179c986242d69adee', 0, '2019-04-16 14:28:41'),
('55bd5a3378b24e6b51287831c55f61cb6b90cbf1468c715970f93c08b4104f01dfe74fa3bfe18c97', 'c1c0e597a81cd7b63a38d625a5cfb3d2ab0d4ee151bd81cccd893415f41acc45af23bd33e66299de', 0, '2019-04-22 15:11:59'),
('572207284b1472ba58c29109225a95635f9a4935bf1dc5b8f61a0f0c581e3a934f7bc9af35dbf7ac', '66a237c323ca102ee3b7e122eda648a5f5a1e76a97eab8aed62f9dd5c96724b5975ecbc8b363773a', 0, '2019-06-22 14:08:13'),
('58eeb82e16737a43a392324ecfe726d831e59ac26d8877716f1af7d8910a264826184918413985c8', '0823276f4f4d48652be2a961cdef3d11cc6b1ff1e5e88b7624966e5856536283035ffd6502c1a01c', 0, '2019-06-04 16:33:56'),
('7c838dea2d2452045093511bb331aa3746468ce6977328f858e955021e44d7b9e0a1f1c755f6dc0f', '9b23c77aa7e580c0c4e86b3e1ad228d938e7f6b9d3664083550cc6dbf901a18b4d56e52dc335912e', 0, '2019-04-19 14:54:38'),
('826858a9a1af0b2731ac3b74f3680090a11fe72e09501a9015dca9c005a9afb5ee065551bfb4ff46', '4283db70a9f8b4d06b618d873b589ee2ae040d6695692987cf51ee32a08d746f93da0d9b4b9dd974', 0, '2019-04-16 15:38:01'),
('860b7617da0a394ff18d8b3679ff504cefbf0071eb4a0c9062d672270419d84f96c35cde37eb4e04', 'f5f88ed624d0a44d333c9ac603aebea1a9ed3bd0daf15e41c0538357f95cd08640bdb6d8949fb286', 0, '2019-04-19 07:51:02'),
('86ef2cb7a14c67fb191571aac1439e90a26986efa62eb5ef5a90e5e728b1b9b73244cabeecddbd56', '8e577bac3ee741ebf43e35a00ca94c8e052ce6a1f5cad0276698280087bff55b4c170865a445d565', 0, '2019-04-22 15:11:57'),
('a075e22659a486489518881c10fd4a5c1de05bf1553a45e4a275479c9f6a863a2afcd89d2c8ae3b5', '5cb2626b0d1b22323dfbec3820d543ccca31a3e6fd2096dd67cd0a67730b3b358bc238a312caf6a4', 0, '2019-04-19 14:10:48'),
('ab93de92284920ed20e6e1cf390ae5cc11ff125223f67d609c1ea418a4b915acaa79071a63b9da3b', '0b5a86fb626723a4e9cd8e2c6bb2f859758ee6817d4f5ac2d622ef8db33904a99d0131754010004c', 0, '2019-04-16 16:36:49'),
('b26e6a03d08aa6e9e71d02532234dedba300521413d41c61b8bee2bdb210e5f65fdb0b97654a433b', '4e368fdd0108ce0ad5dcd79850d14abf25d9a3abbe40a30cceca8e103dd211644131ad169cecadcf', 0, '2019-06-04 14:46:32'),
('c5f70e9ee9e242ba1be79208ec8e81da3b7d301114afdfaeff1812f6a8e41574727c6f54fac11cf4', 'ba2e26bda87320fe32af51c1be411ca8c01ad35984d80021b3cf0a2e3e1187f64f10eb315ecc564f', 0, '2019-06-04 15:47:17'),
('e27ebd84b3834b64e1e6754323c2f030bc5e8d5f387bab83a3029188d2d37c3debae9bcc342f0b1e', 'e9f128e5fe1b65a1f5cba15488a5d0e8c70a30506c3e30ec1fdd995f54ca5b942246db8f9d73074f', 0, '2019-04-23 08:10:37'),
('e4c6af26fd83906960b0552e572c96daead1f509a27220da4c4cf155b776ef854989918c0d4ad839', '4044c6da729230330e83b4369ecf1ae389553be06761c8054d2b9a91a780f2bcfe2ed23c1eae1e66', 0, '2019-04-22 15:55:42'),
('ef2ed7e80ec80bab09539aa8260d51fc2b5c3cadb56aa6b4a3c4edbbdbb77488f4975a64756720b3', '3efa21ef1600763f13ee34fa9130742312db51db5d465fdc44006d0924397a8e27ffc2b8695eb501', 0, '2019-08-03 13:50:13');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `address_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pay_type` smallint(6) NOT NULL,
  `pay_status` smallint(6) NOT NULL,
  `order_status` smallint(6) NOT NULL,
  `total_price` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `code1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_read` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `address_id`, `user_id`, `time`, `date`, `pay_type`, `pay_status`, `order_status`, `total_price`, `price`, `code1`, `code2`, `order_read`, `order_type`, `order_id`) VALUES
(12, 4, 2, 1511704303, '1396-9-5', 6, 1, 1, 979000, 948000, NULL, NULL, 'no', '1', '51099198349'),
(11, 2, 1, 1510998349, '1396-8-27', 6, 0, 2, 7506000, 7333000, NULL, NULL, 'no', '2', '51170204303'),
(13, 4, 4, 1516499919, '1396-11-01', 6, 1, 1, 4078000, 3947000, NULL, NULL, 'no', '1', '51845250419'),
(14, 5, 4, 1518639995, '1396-11-25', 6, 0, 0, 3386000, 3386000, NULL, NULL, 'no', '2', '51863439995'),
(15, 5, 4, 1525017917, '1397-2-9', 5, 0, 1, 587000, 587000, NULL, NULL, 'no', '1', '52501417917'),
(16, 5, 4, 1525017947, '1397-2-9', 5, 0, 1, 587000, 587000, NULL, NULL, 'no', '1', '52501417947'),
(17, 5, 4, 1525018003, '1397-2-9', 5, 0, 1, 587000, 587000, NULL, NULL, 'no', '1', '52501418003'),
(18, 5, 4, 1525022109, '1397-2-9', 6, 0, 1, 587000, 587000, NULL, NULL, 'no', '1', '52502422109'),
(19, 5, 4, 1525101556, '1397-2-10', 5, 0, 1, 4656000, 4556000, NULL, NULL, 'no', '1', '52510401556'),
(20, 5, 4, 1525102428, '1397-2-10', 5, 1, 1, 4656000, 4556000, NULL, NULL, 'no', '1', '52510402428'),
(21, 4, 2, 1529511221, '1397-3-30', 6, 0, 1, 3428000, 3396000, NULL, NULL, 'no', '1', '52951211221'),
(22, 4, 2, 1529511286, '1397-3-30', 6, 0, 1, 3428000, 3396000, NULL, NULL, 'no', '1', '52951211286'),
(23, 4, 2, 1529511384, '1397-3-30', 6, 0, 1, 3428000, 3396000, NULL, NULL, 'no', '1', '52951211384'),
(24, 4, 2, 1529511419, '1397-3-30', 6, 0, 1, 3428000, 2377200, NULL, NULL, 'no', '1', '52951211419'),
(25, 4, 2, 1529511518, '1397-3-30', 6, 0, 1, 979000, 958000, NULL, NULL, 'no', '1', '52951211518'),
(26, 4, 2, 1529515617, '1397-3-30', 6, 0, 1, 2937000, 2854000, NULL, NULL, 'no', '1', '52951215617'),
(27, 4, 2, 1529515711, '1397-3-30', 5, 0, 1, 2937000, 2140500, NULL, NULL, 'no', '1', '52951215711'),
(28, 4, 2, 1529572276, '1397-3-31', 6, 0, 1, 2449000, 1686000, NULL, NULL, 'no', '1', '52957272276'),
(29, 4, 2, 1529573552, '1397-3-31', 6, 1, 3, 5548000, 5297000, NULL, NULL, 'no', '1', '52957273552'),
(30, 4, 2, 1529598677, '1397-3-31', 6, 1, 3, 2449000, 2448000, NULL, NULL, 'no', '1', '52959298677'),
(33, 7, 10, 1529937492, '1397-4-4', 6, 0, 1, 3099000, 3009000, NULL, NULL, 'no', '1', '529931037492'),
(34, 7, 10, 1529937516, '1397-4-4', 5, 0, 1, 3099000, 3009000, NULL, NULL, 'no', '1', '529931037516'),
(45, 2, 1, 1533486865, '1397-5-14', 3, 0, 3, 5474000, 5474000, NULL, NULL, 'no', '1', '53348186865'),
(44, 1, 1, 1533486770, '1397-5-14', 3, 0, 1, 4556000, 4556000, NULL, NULL, 'no', '1', '53348186770'),
(41, 1, 1, 1533486465, '1397-5-14', 3, 0, 1, 4556000, 4556000, NULL, NULL, 'no', '1', '53348186465'),
(42, 1, 1, 1533486466, '1397-5-14', 3, 0, 1, 4556000, 4556000, NULL, NULL, 'no', '1', '53348186466'),
(46, 4, 2, 1543241955, '1397-9-5', 5, 0, 1, 3099000, 2859000, NULL, NULL, 'no', '1', '54324241955'),
(47, 4, 2, 1543246115, '1397-9-5', 8, 0, 1, 75000, 0, NULL, NULL, 'no', '1', '54324246115'),
(48, 4, 2, 1543246417, '1397-9-5', 8, 1, 1, 75000, 26000, NULL, NULL, 'no', '1', '54324246417'),
(49, 4, 2, 1543246498, '1397-9-5', 8, 1, 1, 75000, 26000, NULL, NULL, 'no', '1', '54324246498'),
(50, 4, 2, 1543247968, '1397-9-5', 8, 1, 1, 75000, 26000, NULL, NULL, 'no', '1', '54324247968'),
(51, 4, 2, 1543249180, '1397-9-5', 8, 1, 1, 75000, 26000, NULL, NULL, 'no', '1', '54324249180'),
(52, 4, 2, 1544193596, '1397-9-16', 8, 0, 1, 75000, 26000, NULL, NULL, 'no', '1', '54419293596'),
(53, 4, 2, 1544194285, '1397-9-16', 8, 0, 1, 75000, 26000, NULL, NULL, 'no', '1', '54419294285'),
(54, 4, 2, 1544194437, '1397-9-16', 8, 0, 1, 75000, 26000, NULL, NULL, 'no', '1', '54419294437'),
(55, 4, 2, 1544195268, '1397-9-16', 8, 0, 1, 75000, 26000, NULL, NULL, 'no', '1', '54419295268'),
(56, 4, 2, 1544195689, '1397-9-16', 8, 0, 1, 75000, 26000, NULL, NULL, 'no', '1', '54419295689'),
(57, 4, 2, 1544195797, '1397-9-16', 8, 0, 1, 75000, 26000, NULL, NULL, 'no', '1', '54419295797'),
(58, 4, 2, 1544195944, '1397-9-16', 8, 0, 1, 75000, 26000, NULL, NULL, 'no', '1', '54419295944'),
(59, 4, 2, 1544196029, '1397-9-16', 8, 0, 1, 75000, 26000, NULL, NULL, 'no', '1', '54419296029'),
(60, 4, 2, 1544196079, '1397-9-16', 8, 0, 1, 75000, 26000, NULL, NULL, 'no', '1', '54419296079'),
(61, 4, 2, 1544196138, '1397-9-16', 8, 0, 1, 75000, 26000, NULL, NULL, 'no', '1', '54419296138'),
(62, 4, 2, 1544196949, '1397-9-16', 6, 0, 1, 587000, 596990, NULL, NULL, 'no', '1', '54419296949'),
(63, 4, 2, 1544197074, '1397-9-16', 6, 0, 1, 587000, 596990, NULL, NULL, 'no', '1', '54419297074');

-- --------------------------------------------------------

--
-- Table structure for table `order_gift_cart`
--

CREATE TABLE `order_gift_cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_gift_cart`
--

INSERT INTO `order_gift_cart` (`id`, `order_id`, `cart_id`, `price`) VALUES
(1, 63, 6, 125000);

-- --------------------------------------------------------

--
-- Table structure for table `order_row`
--

CREATE TABLE `order_row` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_row`
--

INSERT INTO `order_row` (`id`, `order_id`, `product_id`, `color_id`, `service_id`, `number`) VALUES
(25, 12, 10, 9, 1, 1),
(24, 11, 11, 0, 23, 1),
(23, 11, 12, 14, 0, 1),
(22, 11, 10, 9, 1, 2),
(26, 13, 10, 9, 1, 1),
(27, 13, 12, 13, 0, 1),
(28, 14, 10, 9, 1, 1),
(29, 14, 11, 0, 23, 1),
(30, 15, 19, 23, 0, 1),
(31, 16, 19, 23, 0, 1),
(32, 17, 19, 23, 0, 1),
(33, 18, 19, 23, 0, 1),
(34, 19, 18, 22, 0, 1),
(35, 20, 18, 22, 0, 1),
(36, 21, 10, 9, 1, 1),
(37, 21, 11, 0, 23, 1),
(38, 22, 10, 9, 1, 1),
(39, 22, 11, 0, 23, 1),
(40, 23, 10, 9, 1, 1),
(41, 23, 11, 0, 23, 1),
(42, 24, 10, 9, 1, 1),
(43, 24, 11, 0, 23, 1),
(44, 25, 10, 9, 1, 1),
(45, 26, 10, 9, 1, 3),
(46, 27, 10, 9, 1, 3),
(47, 28, 11, 0, 23, 1),
(48, 29, 11, 0, 23, 1),
(49, 29, 12, 12, 0, 1),
(50, 30, 11, 0, 23, 1),
(53, 33, 12, 12, 0, 1),
(54, 34, 12, 12, 0, 1),
(55, 43, 18, 22, 0, 1),
(56, 44, 18, 22, 0, 1),
(57, 45, 18, 22, 0, 1),
(58, 45, 10, 9, 1, 1),
(59, 46, 12, 12, 0, 1),
(60, 47, 20, 25, 0, 1),
(61, 48, 20, 25, 0, 1),
(62, 49, 20, 25, 0, 1),
(63, 50, 20, 25, 0, 1),
(64, 51, 20, 25, 0, 1),
(65, 52, 20, 25, 0, 1),
(66, 53, 20, 25, 0, 1),
(67, 54, 20, 25, 0, 1),
(68, 55, 20, 25, 0, 1),
(69, 56, 20, 25, 0, 1),
(70, 57, 20, 25, 0, 1),
(71, 58, 20, 25, 0, 1),
(72, 59, 20, 25, 0, 1),
(73, 60, 20, 25, 0, 1),
(74, 61, 20, 25, 0, 1),
(75, 62, 19, 23, 0, 1),
(76, 63, 19, 23, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ostan`
--

CREATE TABLE `ostan` (
  `id` int(10) UNSIGNED NOT NULL,
  `ostan_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ostan`
--

INSERT INTO `ostan` (`id`, `ostan_name`) VALUES
(1, 'آذربایجان شرقی'),
(2, 'اردبیل'),
(3, 'تهران'),
(4, 'فارس'),
(5, 'اصفهان');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) DEFAULT NULL,
  `discounts` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL,
  `text` text COLLATE utf8_unicode_ci,
  `product_status` smallint(6) NOT NULL,
  `bon` smallint(6) DEFAULT NULL,
  `show_product` smallint(6) DEFAULT NULL,
  `product_number` int(11) DEFAULT NULL,
  `order_product` int(11) NOT NULL,
  `keywords` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `special` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `code`, `title_url`, `code_url`, `price`, `discounts`, `view`, `text`, `product_status`, `bon`, `show_product`, `product_number`, `order_product`, `keywords`, `description`, `special`, `created_at`, `updated_at`) VALUES
(10, 'گوشي موبایل سامسونگ مدل Galaxy J7 Prime SM-G610FD دو سيم کارت', 'Samsung Galaxy J7 Prime SM-G610FD Dual SIM Mobile Phone', 'گوشي-موبایل-سامسونگ-مدل-Galaxy-J7-Prime-SMG610FD-دو-سيم-کارت', 'Samsung-Galaxy-J7-Prime-SMG610FD-Dual-SIM-Mobile-Phone', 2449000, 31000, 153, '<p>گوشی موبایل &laquo;سامسونگ&raquo; مدل &laquo;Galaxy J7 Prime&raquo; یکی دیگر از کهکشانی&zwnj;های این شرکت کره&zwnj;ای است که به&zwnj;تازگی پا به بازارهای جهانی گوشی موبایل گذاشته است. تراشه&zwnj;ی اگزینوس 7870، 3 گیگابایت رم، 16 گیگابایت حافظه&zwnj;ی داخلی و پردازنده&zwnj;ی گرافیکی Mali-T830MP2 سخت&zwnj;افزار قدرتمند J7 Prime را تشکیل می&zwnj;دهند.&nbsp;صفحه&zwnj;نمایش 5.5 اینچی آن که تراکمی برابر 401 پیکسل بر هر اینچ دارد، از نوع LCD است و فناوری&nbsp;TFT در آن استفاده شده است.</p>\r\n\r\n<p><!--more-->این صفحه&zwnj;نمایش که قابلیت نمایش 16 میلیون رنگ را دارد، از رزولوشن 1920&times;1080 پیکسل برخوردار است. شرکت سامسونگ برای محافظت از این صفحه&zwnj;نمایش، محافظ گوریلاگلس نوع 4&nbsp;را در نظر گرفته است که به دلیل افزایش مقاومت نمایشگر می&zwnj;تواند در برابر خط و خش و برخورد با سطوح سخت از گوشی موبایل شما به&zwnj;خوبی محافظت کند. دوربین این محصول به&nbsp; سنسوری 13 مگاپیکسلی مجهز شده است که با داشتن امکاناتی مانند فوکوس با اشاره روی سوژه (Touch Focus)، قابلیت تشخیص چهره (Face Detection)، قابلیت عکاسی پانوراما و عکاسی HDR امکان ثبت تصاویری با وضوح بالا را در اختیار کاربران قرار داده است. در کنار این سنسور قدرتمند، سنسوری 8 مگاپیکسلی در دوربین سلفی این محصول جای گرفته که در مقایسه با بسیاری از محصولات مشابه در بازار</p>\r\n\r\n<p>از کیفیت بهتری برخوردار است. یکی دیگر از ویژگی&zwnj;های جی 7 پرایم پشتیبانی از اینترنت پر سرعت 4G است که سرعت دانلودی معادل 150 مگابیت بر ثانیه را در اختیار کاربران قرار می&zwnj;دهد. در کنار مجهز&zwnj;بودن به شبکه 4G، پشتیانی از فناوری&zwnj;های ارتباطی EDGE &nbsp;,GPRS, Wi-Fi&nbsp;و بلوتوث نسخه 4.1 محبوبیت بیشتری به گوشی موبایل داده است. سیستم&zwnj;عامل اندروید مارشمالو نسخه&zwnj;ی 6.0 در این گوشی موبایل ایفای نقش می&zwnj;کند و امکانات کامل یک گوشی اندرویدی را پیش روی افراد قرار می&zwnj;دهد. مجموعه&zwnj;ی کاملی از حسگر&zwnj;ها هم در این گوشی به کار گرفته شده&zwnj;اند تا کاربر در هر شرایطی بتو&zwnj;اند، از نهایت قابلیت&zwnj;های گوشی&zwnj; خود استفاده کند. ازجمله حسگر&zwnj;های استفاده&zwnj;شده در J7 Prime می&zwnj;توان به قطب&zwnj;نما، شتاب&zwnj;سنج، حسگر تشخیص اثر انگشت و مجاورت اشاره کرد. در زیر قاب این محصول باتری 3300 میلی&zwnj;آمپرساعتی از نوع لیتیوم&zwnj;یون بدون قابلیت تعویض در نظر گرفته شده است تا جوابگوی فعالیت&zwnj;های انجام&zwnj;گرفته با این محصول باشد. با توجه به امکاناتی که در بالا بیان شد، می&zwnj;توان نتیجه گرفت که این گوشی موبایل با شباهت&zwnj;های بسیاری به Galaxy J7 2016 تولید شده و تنها برخی تفاوت&zwnj;های جزئی در حافظه&zwnj;ی داخلی، میزان رم و کیفیت نمایشگر در آن به کار گرفته شده است.&nbsp;</p>', 1, 4, 1, NULL, 0, NULL, NULL, 1, '2017-10-08 05:17:11', '2018-12-07 16:45:57'),
(11, 'گوشي موبايل اپل مدل iPhone 6s ظرفيت 64 گيگابايت', 'Apple iPhone 6s 64GB Mobile Phone', 'گوشي-موبايل-اپل-مدل-iPhone-6s-ظرفيت-64-گيگابايت', 'Apple-iPhone-6s-64GB-Mobile-Phone', 2449000, 11000, 19, NULL, 1, NULL, 1, NULL, 0, NULL, NULL, 0, '2017-10-21 11:38:07', '2018-12-07 16:32:36'),
(12, 'گوشي موبايل اپل مدل iPhone 7 Plus ظرفيت 32 گيگابايت', 'Apple iPhone 7 Plus 32GB Mobile Phone', 'گوشي-موبايل-اپل-مدل-iPhone-7-Plus-ظرفيت-32-گيگابايت', 'Apple-iPhone-7-Plus-32GB-Mobile-Phone', 3099000, 100000, 34, NULL, 1, NULL, 1, NULL, 0, NULL, NULL, 0, '2017-10-21 12:54:51', '2018-12-07 16:38:06'),
(13, 'گوشي موبايل اپل مدل iPhone 7 ظرفيت 128 گيگابايت', 'Apple iPhone 7 128GB Mobile Phone', 'گوشي-موبايل-اپل-مدل-iPhone-7-ظرفيت-128-گيگابايت', 'Apple-iPhone-7-128GB-Mobile-Phone', 3160000, 50000, 19, NULL, 0, NULL, 1, NULL, 0, NULL, NULL, 0, '2017-10-21 12:58:26', '2018-12-07 15:01:22'),
(14, 'گوشي موبايل سامسونگ مدل Galaxy A5 2017 دو سيم‌کارت', 'Samsung Galaxy A5 (2017) Dual SIM Mobile Phone', 'گوشي-موبايل-سامسونگ-مدل-Galaxy-A5-2017-دو-سيم‌کارت', 'Samsung-Galaxy-A5-(2017)-Dual-SIM-Mobile-Phone', 1345000, NULL, 4, '<p>گوشی&zwnj;های میان&zwnj;رده&zwnj;ی &laquo;سامسونگ&raquo; هرروز با نام&zwnj; و پسوندهای جدید معرفی می&zwnj;شوند و فقط با چند تغییر کوچک در اختیار کاربران جهانی قرار می&zwnj;گیرند. سامسونگ این بار از نسل جدید گلکسی A رونمایی کرده و قصد دارد به&zwnj;زودی آن&zwnj;ها را روانه&zwnj;ی بازارهای جهانی کند. گوشی موبایل سامسونگ &laquo;گلکسی A5 2017 دو سیم&zwnj;کارت&raquo; (Galaxy A5 2017 Dual SIM) از این سری، یک میان&zwnj;رده&zwnj;ی باکیفیت به&zwnj; حساب می&zwnj;آید. این گوشی با وجود شباهت به نسل قبلی خود از ویژگی&zwnj;هایی مانند مقاومت در برابر گردوغبار و آب تا عمق 1.5 متر به مدت 30 دقیقه بهره برده که آن را از همتای 2016 خود متمایز می&zwnj;کند. سخت&zwnj;افزاری که می&zwnj;تواند برای انجام بسیاری از امور مفید باشد، بدنه&zwnj;ای زیبا و چشم&zwnj;نواز، نمایشگری که کیفیتش چشم&zwnj;ها را خیره می&zwnj;کند، حسگر اثرانگشت برای امنیت بیشتر و دوربینی که تصاویر فوق&zwnj;العاده ثبت می&zwnj;کند، از مشخصات این گوشی میان&zwnj;رده هستند. سامسونگ برای تجربه&zwnj;ی کاربری بهتر در گلکسی A5 2017، تراشه&zwnj;ی 64بیتی اگزینوس 7880 را در نظر گرفته که 8 هسته&zwnj;ی پردازنده&zwnj; با معماری کورتکس A53 با قدرت پردازش 1.9 گیگاهرتز دارد؛ 3 گیگابایت رم در کنار این مجموعه سخت&zwnj;افزاری قرار دارد تا به هرچه روان&zwnj;ترشدن محصول کمک کند. گلکسی A5 2017 از حافظه&zwnj;ی داخلی 32گیگابایتی بهره برده و می&zwnj;تواند کارت حافظه&zwnj;ی جانبی تا 256 گیگابایت را پشتیبانی کند. طبق روال تمام گوشی&zwnj;های هوشمند، امکان استفاده از فناوری&zwnj;هایی مثل بلوتوث، Wi-Fiو NFC هم در این محصول وجود دارد که تجربه&zwnj;ی کاربری بهتری را برای کاربران A5 2017 به ارمغان خواهد آورد. نمایشگری با پنل OLED و فناوری Super AMOLED به&zwnj;اندازه&zwnj;ی 5.2 اینچ و رزولوشن FullHD&nbsp; برای این گوشی عالی به نظر می&zwnj;رسد. این نمایشگر می&zwnj;تواند تصاویر را با اشباع رنگ چشم&zwnj;نواز و با تراکم مناسب 424 پیکسل بر اینچ به تصویر بکشد. برای محافظت از آن هم از جدیدترین نسخه&zwnj;ی محافظ&zwnj;های گوریلاگلس استفاده شده است. این نمایشگر قابلیت دریافت تا 5 لمس هم&zwnj;زمان را دارد و برای بازی&zwnj;کردن و فیلم&zwnj;دیدن کاملا مناسب خواهد بود. برای پاسخ به نیاز علاقه&zwnj;مندان به عکاسی با گوشی موبایل، سامسونگ دو سنسور 16مگاپیکسلی را در A5 2017 به خدمت گرفته که با داشتن امکانات فراوان برای یک میان&zwnj;رده عالی به نظر می&zwnj;رسد. دوربین اصلی که به فلشی از نوع LED مجهز شده است، می&zwnj;تواند در مکان&zwnj;هایی با نور کم هم عملکرد خوبی از خود به نمایش بگذارد. دوربین سلفی گلکسی&nbsp; A5 هم سنسوری 16مگاپیکسلی با دریچه&zwnj;ی دیافراگم باز&zwnj;تر دارد که حالا می&zwnj;تواند نور بیشتری جذب و درنتیجه تصاویر بهتری هم ثبت می&zwnj;کند. گلکسی A5 از ترکیب فلز و شیشه ساخته شده و از دو سیم&zwnj;کارت در سایز نانو پشتیبانی می&zwnj;کند. از دیگر مشخصات ظاهری این گوشی می&zwnj;توان به ضخامت 7.9 میلی&zwnj;متری، طول 146.1 و عرض 71.4 میلی&zwnj;متری مناسبش با درنظرگرفتن نمایشگر 5.2اینچی&zwnj; آن اشاره کرد. در نسل جدید گلکسی A5 اندروید مارشمالو ایفای نقش می&zwnj;کند و یک باتری 3000 میلی&zwnj;آمپر ساعتی وظیفه&zwnj;ی تأمین انرژی را بر عهده دارد. اگر شما از کاربران محصولات سامسونگ هستید، محصول جدید این شرکت با عنوان A5 2017 می&zwnj;تواند به&zwnj;عنوان یک میان&zwnj;رده&zwnj;ی قدرتمند بخش عمده&zwnj;ای از نیازهای شما را پاسخ&zwnj;گو باشد.</p>', 1, 2, 1, NULL, 0, NULL, NULL, 0, '2018-01-08 06:00:46', '2018-04-01 15:09:28'),
(15, 'گوشي موبايل هوآوي مدل Honor 8 دو سيم کارت', 'Huawei Honor 8 Dual SIM Mobile Phone', 'گوشي-موبايل-هوآوي-مدل-Honor-8-دو-سيم-کارت', 'Huawei-Honor-8-Dual-SIM-Mobile-Phone', 1492000, NULL, 0, NULL, 1, NULL, 1, NULL, 0, NULL, NULL, 0, '2018-01-08 06:12:51', '2018-01-08 06:12:51'),
(16, 'گوشي موبايل سوني مدل Xperia C5 Ultra دو سيم‌کارت', 'Sony Xperia C5 Ultra Dual SIM Mobile Phone', 'گوشي-موبايل-سوني-مدل-Xperia-C5-Ultra-دو-سيم‌کارت', 'Sony-Xperia-C5-Ultra-Dual-SIM-Mobile-Phone', 1000000, 65000, 4, NULL, 1, NULL, 1, NULL, 0, NULL, NULL, 0, '2018-01-08 06:18:05', '2018-02-08 22:17:08'),
(17, 'گوشي موبايل سوني مدل Xperia XA Ultra دو سيم کارت ظرفيت 16 گيگابايت', 'Sony Xperia XA Ultra Dual SIM 16GB Mobile Phone', 'گوشي-موبايل-سوني-مدل-Xperia-XA-Ultra-دو-سيم-کارت-ظرفيت-16-گيگابايت', 'Sony-Xperia-XA-Ultra-Dual-SIM-16GB-Mobile-Phone', 1050000, 41000, 1, NULL, 1, NULL, 1, NULL, 0, NULL, NULL, 0, '2018-01-09 15:14:54', '2018-02-08 22:12:24'),
(18, 'لپ تاپ 13 اینچی اپل مدل MacBook Air MQD32 2017', 'Apple MacBook Air MQD32 2017 - 13 inch Laptop', 'لپ-تاپ-13-اینچی-اپل-مدل-MacBook-Air-MQD32-2017', 'Apple-MacBook-Air-MQD32-2017-13-inch-Laptop', 4656000, 100000, 2, NULL, 1, NULL, 1, NULL, 0, NULL, NULL, 0, '2018-01-15 05:32:24', '2018-04-30 15:17:59'),
(19, 'گوشي موبايل ال جي مدل K10 دو سيم‌کارت ظرفيت 16 گيگابايت', 'LG K10 Dual SIM 16GB Mobile Phone', 'گوشي-موبايل-ال-جي-مدل-K10-دو-سيم‌کارت-ظرفيت-16-گيگابايت', 'LG-K10-Dual-SIM-16GB-Mobile-Phone', 587000, 10, 53, NULL, 1, NULL, 1, NULL, 0, NULL, NULL, 1, '2018-02-08 04:48:02', '2018-12-07 15:37:01'),
(20, 'هندزفری بلوتوث ریمکس مدل RB-T10', 'Remax RB-T10 Bluetooth Handsfree', 'هندزفری-بلوتوث-ریمکس-مدل-RBT10', 'Remax-RBT10-Bluetooth-Handsfree', 75000, 59000, 25, NULL, 1, NULL, 1, NULL, 0, NULL, NULL, 0, '2018-02-12 11:44:56', '2018-12-07 15:21:49');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `url`) VALUES
(1, 10, '2601744190892df297417f225fa4cad2.jpg'),
(2, 10, 'ea00c954654cc41c93b12b490aa55a1f.jpg'),
(8, 11, 'c17ab5a5d24eab5fe8f5b6df40f8b71b.jpg'),
(9, 12, '82011bd42ee3d9d3ef0d74e02a5c72c6.jpg'),
(10, 13, 'd11825f4d0c10ac8ccd01404b4ab3fc2.jpg'),
(11, 10, '4a0acf596d74de42996ae95af934e8d7.jpg'),
(12, 14, '1b1849b3c938ffe6d1962a6f5809997a.jpg'),
(13, 14, 'd3aef818f253c93ba03bace88db4c419.jpg'),
(14, 14, '8ed276b8b0d6eac46bca8bb169ba8ffc.jpg'),
(15, 15, 'e0d803d3514aba12b5f816a7772b1f7b.jpg'),
(16, 15, '454578651c75fda6411d4cd479bf2339.jpg'),
(17, 15, '02d4080e0e4da1f3234c9a37ec65000a.jpg'),
(18, 15, '88f5cf857b04e3cee20c3546afd13c3d.jpg'),
(19, 16, 'c0da3344792c8a8cba0c8a91c16f4ea9.jpg'),
(20, 16, '7f5b6e10bc1179bfc884b6503ab04ceb.jpg'),
(21, 17, 'a2e060dff0afc61e14fae3c5a653880d.jpg'),
(22, 17, '908cda11d63d0fae5a10172107037b30.jpg'),
(23, 18, '96910b91ae8eb30918953426051cae14.jpg'),
(24, 18, 'd524865f412df0425eebe43f649cbefd.jpg'),
(44, 19, 'f26db428b42844a353c233f468a13a71.jpg'),
(43, 19, '6abaebafef446434d18365e1f5b3dc51.jpg'),
(41, 19, '1b467283a7241eb34121ff02f42124ab.jpg'),
(42, 19, '25e306f97408b49ea8bb66c42dd7c401.jpg'),
(45, 10, 'c33b8a67a044b662a10a973a637bd44b.jpg'),
(46, 20, 'b1bef936250ceef572767550c0c57ea0.jpg'),
(47, 21, '65b0d3605616c909dec570d1ed35fb2e.jpg'),
(48, 10, '5cf48bb0425d4a8d0098397af15c0ec5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_score`
--

CREATE TABLE `product_score` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_score`
--

INSERT INTO `product_score` (`id`, `product_id`, `value`, `user_id`, `time`) VALUES
(2, 10, '1_4@#2_2@#3_5@#4_3@#5_2@#6_4@#', 1, 1513063977),
(3, 10, '1_2@#2_4@#3_4@#4_2@#5_5@#6_4@#', 4, 1513070398),
(4, 18, '1_4@#2_4@#3_4@#4_4@#5_4@#6_4@#', 2, 1516002576),
(5, 17, '1_4@#2_2@#3_4@#4_4@#5_3@#6_4@#', 2, 1516007810),
(6, 10, '1_5@#2_3@#3_4@#4_5@#5_3@#6_4@#', 5, 1518101875),
(7, 14, '1_4@#2_3@#3_3@#4_5@#5_2@#6_3@#', 1, 1522595043);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(10) UNSIGNED NOT NULL,
  `time` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question` text COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `status` smallint(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `time`, `product_id`, `user_id`, `question`, `parent_id`, `status`) VALUES
(1, 1513524079, 10, 1, 'سلام\r\nمیخواستم بدونم بدنه فلز و شیشه بهتره یا یکپارچه فلزی؟', 0, 1),
(3, 1513526083, 10, 1, 'من بين اين گوشي و j5 prime موندم خيلي زياد با گوشي كار ميكنم يه چيزي ميخوام كه هنگ نكنه دوربينو صداشم مهمه برام ميشه راهنماييم كنين كدوم بهتره كه اونوبگيرم؟ممنون', 0, 1),
(4, 1513528610, 10, 1, 'می خوام بدوم شیار رم از سیم کا رت ها مجزا است یا نه؟', 0, 1),
(7, 1513528985, 10, 1, 'سلام . تومشخصاتش نوشته شده قابلیت دریافت تا 2 لمس همزمان !!!!! ینی بیش از دوتا لمس همزمان نمیشه انجام داد؟ یا دیجی کالا اشتباه تایپی کرده\r\nجواب بدین ممنون میشم', 0, 1),
(8, 1513531162, 10, 1, 'بله دوست عزیز جداست من خودم این گوشی رو دارم', 4, 1),
(9, 1513540248, 10, 1, 'من دارم 5تا انگشت گذاشتم کار کرد الکیه', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `review_tozihat` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `product_id`, `review_tozihat`) VALUES
(2, 10, '<p>میان&zwnj;رده&zwnj;ها روز به روز سهم بیشتری از بازار را به خود اختصاص می&zwnj;دهند. شرکت&zwnj;ها سعی می&zwnj;کنند با تولید گوشی&zwnj;های میان&zwnj;رده با مشخصات سخت&zwnj;افزاری و اندازه&zwnj;های متفاوت، فروش بیشتری در این رده داشته باشند. سامسونگ هم برای تصاحب سود بیشتر از بازار میان&zwnj;رده&zwnj;ها، گوشی&zwnj;های مختلفی را در این رده تولید کرده است. گوشی &laquo;سامسونگ گلکسی جی7 پرایم&raquo; (Samsung Galaxy J7 Prime) یک میان&zwnj;رده&zwnj;ی تمام&zwnj;عیار از این شرکت کره&zwnj;ای است. این گوشی برای کاربرانی که به دنبال زیبایی و کارایی در کنار هم هستند، گزینه&zwnj;ی مناسبی به شمار می&zwnj;رود.<br />\r\n&nbsp;</p>\r\n\r\n<p><br />\r\nstart_review</p>\r\n\r\n<p>start_item</p>\r\n\r\n<p>طراحی و ساخت</p>\r\n\r\n<p>end_item</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/laravel-digikala/public/upload/49ef283e1863dc68bcb54e4280c2378e.jpg\" style=\"height:auto; width:100%\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>بدنه&zwnj;ی تمام فلزی و خوش&zwnj;تراش از مزیت&zwnj;هایی است که گوشی&zwnj;های میان&zwnj;رده&zwnj;ی سامسونگ از گوشی&zwnj;های لوکس و گران&zwnj;قیمت این شرکت به ارث برده&zwnj;اند. علاوه بر این، حسگر اثرانگشت هم برای J7پرایم در نظر گرفته&zwnj;شده تا کاربران این گوشی&zwnj; نسبتا خوش قیمت هم بتوانند خیال راحتی بابت امنیت اطلاعات&zwnj;شان داشته باشند.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/laravel-digikala/public/upload/44f28aaee6be9a47b3d3587f70b2f191.jpg\" style=\"height:auto; width:100%\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>طراحی گوشی فاقد هرگونه پستی&zwnj;وبلندی روی قاب جلو و پشت است تا ظاهر آن هر چه بیشتر لوکس باشد. همچنین این نوع طراحی باعث شده تا بتواند به&zwnj;راحتی روی سطوح صاف قرار گیرد و در دست گرفتنش هم راحت شود. قاب جلویی ساده طراحی&zwnj;شده طبق روال همیشگی سامسونگ، دو کلید لمسی و یک کلید فیزیکی زیر نمایشگر، اجزای اصلی آن را تشکیل می&zwnj;دهند. با توجه به دوربین از قاب پشتی بیرون نزده است؛ J7پرایم ضخامت هشت میلی&zwnj;متری و وزن 167 گرمی دارد. این اولین گوشی از سری J سامسونگ است که با بدنه&zwnj;ی فلزی راهی بازار می&zwnj;شود و سامسونگ روی آن حساب ویژه&zwnj;ای باز کرده است تا فروش خوبی داشته باشد. همین وزن زیاد علاوه بر قاب پشتی تمام فلزی، می&zwnj;تواند بابت باتری بزرگ 3300 میلی&zwnj;آمپری J7پرایم هم باشد.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/laravel-digikala/public/upload/3a9f171b5b0852ddf2a89f378e16daf6.jpg\" style=\"height:auto; width:100%\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>تنها تغییری که در مقایسه با سایر گوشی&zwnj;های میان&zwnj;رده&zwnj;ی سامسونگ می&zwnj;توان به آن اشاره کرد، قرار گرفتن اسپیکر اصلی گوشی روی لبه&zwnj;ی سمت راست آن است. این تغییر مکان می&zwnj;تواند بابت تغییرات طراحی داخلی باید یا شاید سامسونگ به این نتیجه رسیده، قرار دادن اسپیکر روی قاب پشتی جالب به نظر نمی&zwnj;رسد. خوشبختانه بر خلاف بسیاری از گوشی&zwnj;های سری J سامسونگ، در این گوشی می&zwnj;توانید از دو سیم&zwnj;کارت در کنار کارت حافظه&zwnj;ی جانبی استفاده کنید و دیگر لازم نیست که بین سیم&zwnj;کارت دوم یا کارت حافظه&zwnj;ی جانبی یکی را انتخاب کنید.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>start_review</p>\r\n\r\n<p>start_item</p>\r\n\r\n<p>صفحه نمایش</p>\r\n\r\n<p>end_item</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/laravel-digikala/public/upload/e3dc9c8b6350164f038a669c42b55ff7.jpg\" style=\"height:auto; width:100%\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>از سامسونگ انتظار می&zwnj;رفت به خاطر بازه&zwnj;ی قیمتی این گوشی و بالا بردن فروش آن؛ از پنل&zwnj;های امولد برای نمایشگر J7 پرایم استفاده می&zwnj;کرد. اما این اتفاق رخ نداده و سامسونگ به پنل&zwnj;های LCD اکتفا کرده است. خبر بدتر اینکه این پنل حتی IPS هم نیست و سامسونگ سعی کرده تا با پنلی TFT رفع تکلیف کند. این مورد برای بزرگ&zwnj;ترین و درعین&zwnj;حال بهترین شرکت سازنده&zwnj;ی نمایشگر دنیا کمی دور از انتظار بود. به&zwnj;هرحال برای J7پرایم نمایشگری 5.5 اینچی با رزولوشن full HD در نظر گرفته&zwnj;شده است. اگر با TFT بودن پنل کنار بیایید، تراکم 401 پیکسل بر اینچ برای نمایشگر یک گوشی میان&zwnj;رده عالی است. تصاویر و محتویات کم&zwnj;رنگ&zwnj;تر از آن چیزی هستند که باید باشند، این مورد قابل&zwnj;تحمل است؛ اما نمایش نه&zwnj;چندان مناسب محتویات گوشی از زوایا می&zwnj;تواند کمی آزاردهنده باشد.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\nstart_review</p>\r\n\r\n<p>start_item</p>\r\n\r\n<p>سخت&zwnj;افزار، سیستم&zwnj;عامل و کارایی</p>\r\n\r\n<p>end_item</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/laravel-digikala/public/upload/18cf563dc46bb8b7f26ee1b06dad24d9.jpg\" style=\"height:auto; width:100%\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>کم&zwnj;کاری سامسونگ در مورد نمایشگر J7پرایم، در بخش سخت&zwnj;افزار جبران شده است. برای این گوشی میان&zwnj;رده تراشه&zwnj;ی اختصاصی سامسونگ در نظر گرفته&zwnj;شده که پردازنده&zwnj;ی مرکزی هشت هسته&zwnj;ای دارد. با این تراشه J7پرایم چیزی در حدود گوشی&zwnj;های پرچم&zwnj;دار سال گذشته قدرت پردازش دارد. سه گیگابایت رم هم کمک کرده تا هیچ مکث یا مشکلی هنگام کار کردن با گوشی مشاهده نشود. این مورد که گوشی&zwnj;های میان&zwnj;رده بعد از مدتی استفاده کند می&zwnj;شوند نمی&zwnj;تواند در مورد J7پرایم صحت داشته باشد؛ چراکه J7پرایم با این سخت&zwnj;افزار می&zwnj;تواند به&zwnj;راحتی تا مدتی یک گوشی قدرتمند باقی بماند. در حدود 16 گیگابایت&nbsp; حافظه&zwnj;ی داخلی در کنار با امکان استفاده از کارت حافظه&zwnj;ی جانبی به شما امکان می&zwnj;دهد که فضای کافی برای نصب برنامه و ذخیره کردن فایل&zwnj;های مالتی&zwnj;مدیا خود داشته باشید.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div class=\"col-md-7\"><br />\r\nبا J7پرایم می&zwnj;توانید از دو سیم&zwnj;کارت استفاده کنید و به اینترنت پرسرعت نسل چهارم متصل شوید. مثل تمام گوشی&zwnj;های هوشمند امکان استفاده از Wi-Fi، بلوتوث و GPS در این گوشی هم فراهم&zwnj;شده است. حسگر اثرانگشت از دیگر مواردی است که به گوشی&zwnj;های میان&zwnj;رده&zwnj;ی سامسونگ اضافه&zwnj;شده است. حسگر J7پرایم هم در کلید خانه&zwnj;ی این گوشی تعبیه&zwnj;شده است. این سنسور از نسل دوم و به&zwnj;صورت 360 درجه کار می&zwnj;کند. البته باید گفت که حسگر اثرانگشت این گوشی تنها می&zwnj;تواند اطلاعات سه انگشت شما را ذخیره کند. باتری 3300 میلی&zwnj;آمپر ساعتی این گوشی با توجه به تراشه&zwnj;ی بسیار کم&zwnj;مصرف و اختصاصی سامسونگ، می&zwnj;تواند تا 14 روز گوشی را در حالت آماده&zwnj;به&zwnj;کار نگه دارد.&nbsp;</div>\r\n\r\n<div class=\"col-md-5\">\r\n<p><img alt=\"\" src=\"http://localhost/laravel-digikala/public/upload/ad6c0b5f3bacabc70c9b5b27c8ebadb8.jpg\" style=\"height:auto; width:100%\" /></p>\r\n</div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>start_review</p>\r\n\r\n<p>start_item</p>\r\n\r\n<p>دوربین</p>\r\n\r\n<p>end_item</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/laravel-digikala/public/upload/b850ed6550046c1d62bcbf16f928238b.jpg\" style=\"height:auto; width:100%\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>دو سنسور 13 و 8 مگاپیکسلی برای دوربین&zwnj;های J7پرایم در نظر گرفته&zwnj;شده&zwnj;&zwnj;اند. جالب است بدانید هر دو سنسور از نوع CMOS هستند و دریچه&zwnj;ی دیافراگم f/1.9 دارند. فلشی از نوع LED به مجموعه&zwnj;ی دوربین اصلی گوشی کمک می&zwnj;کند تا بتواند در شرایط نوری نامساعد هم عملکرد مطلوب داشته باشد و تصاویر مطلوبی ثبت کند. سرعت فوکوس، ثبت و ذخیره&zwnj;ی تصاویر عالی به نظر می&zwnj;رسند. تصاویر ثبت&zwnj;شده کیفیت و روشنایی لازم را دارند. نویزی در هیچ&zwnj;کدام از تصاویر وجود ندارد؛ البته با توجه به مجموعه&zwnj;ی دوربین اصلی، انتظار چنین تصاویری باکیفیتی هم از J7پرایم می&zwnj;رود.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/laravel-digikala/public/upload/c11ab76e143accceb276233e5fd8dd8e.jpg\" style=\"height:auto; width:100%\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div class=\"review_item_div\">\r\n<p>سنسور 8 مگاپیکسلی دوربین سلفی هم تصاویر نسبتا خوبی ثبت می&zwnj;کند؛ اما در شرایطی که نور شدیدی در محل عکاسی دارید اصلا انتظار ثبت تصاویر مطلوب را نداشته باشید.</p>\r\n</div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>رابط کاربری دوربین با توجه به چیزی که در گوشی&zwnj;های قبلی سامسونگ شاهدش بودیم، تفاوتی نکرده است و می&zwnj;توانید به کمک آن تمام تنظیماتی که مدنظر دارید را قبل از ثبت تصاویر، اعمال کنید. حالت&zwnj;های مختلف مثل عکاسی پی&zwnj;درپی، پاناروما، HDR، عکاسی در شب و عکاسی حرفه&zwnj;ای در این رابط کاربری دوربین اصلی J7پرایم به چشم می&zwnj;خورند.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>start_review</p>\r\n\r\n<p>start_item</p>\r\n\r\n<p>جمع بندی</p>\r\n\r\n<p>end_item</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/laravel-digikala/public/upload/86db10e5c4d416f432be80c2dba617ad.jpg\" style=\"height:auto; width:100%\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>گوشی&zwnj;های میان&zwnj;رده برای کسانی که می&zwnj;خواهند از امکانات به&zwnj;روز استفاده کنند و درعین&zwnj;حال نمی&zwnj;خواهند پولی اضافی خرج گوشی&zwnj;های بالارده کنند، مناسب هستند. گوشی J7پرایم از گوشی&zwnj;های میان&zwnj;رده و قدرتمند سامسونگ است که اگر بتوانید با نمایشگر TFT آن کنار بیاید، سایر قسمت&zwnj;های&zwnj;اش حتما راضی&zwnj;تان می&zwnj;کنند. دوربین&zwnj;های 13 و 8 مگاپیکسلی که تصاویر با کیفیت ثبت می&zwnj;کنند، سخت&zwnj;افزاری برپایه&zwnj;ی تراشه&zwnj;ی اختصاصی اگزینوس 7870 سامسونگ به همراه سه گیگابایت رم در کنار طراحی زیبا و حسگر اثرانگشت از مشخصاتی هستند که پس از خریدن این گوشی نصیب&zwnj;تان می&zwnj;شوند.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(10) UNSIGNED NOT NULL,
  `service_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `service_name`, `product_id`, `parent_id`, `date`, `time`, `color_id`, `price`) VALUES
(1, 'گارانتی ویژه دیجی آنلاین', 10, 0, NULL, NULL, NULL, ''),
(3, '18 ماه گارانتي هماهنگ + گواهي جبران خسارت', 10, 0, NULL, NULL, NULL, ''),
(7, '-', 10, 3, '1396-7-15', 1507321800, 8, '949000'),
(6, '-', 10, 3, '1396-7-15', 1507321800, 9, '969000'),
(11, '-', 10, 3, '1396-7-16', 1507408200, 8, '959000'),
(10, '-', 10, 3, '1396-7-16', 1507408200, 9, '965000'),
(12, 'گارانتی ویژه دیجی آنلاین', 13, 0, NULL, NULL, NULL, NULL),
(13, '18 ماه گارانتي هماهنگ + گواهي جبران خسارت', 13, 0, NULL, NULL, NULL, NULL),
(14, '-', 13, 13, '1396-7-26', 1508272200, 10, '3160000'),
(15, '-', 13, 12, '1396-7-26', 1508272200, 11, '3260000'),
(16, '18ماه گارانتي مايکروتل', 13, 0, NULL, NULL, NULL, NULL),
(17, '-', 13, 16, '1396-7-26', 1508272200, 10, '3180000'),
(18, '-', 10, 1, '1396-7-15', 1507321800, 9, '979000'),
(19, '-', 10, 1, '1396-7-15', 1507321800, 8, '939000'),
(20, '-', 10, 3, '1396-7-26', 1508272200, 9, '990000'),
(21, '-', 13, 13, '1396-7-27', 1508358600, 10, '3210000'),
(22, '-', 13, 13, '1396-7-27', 1508358600, 11, '3310000'),
(23, 'گارانتی ویژه دیجی آنلاین', 11, 0, NULL, NULL, NULL, NULL),
(24, '18 ماه گارانتي هماهنگ + گواهي جبران خسارت', 11, 0, NULL, NULL, NULL, NULL),
(25, '-', 11, 24, '1396-7-26', 1508272200, 0, '2549000'),
(31, '-', 10, 1, '1397-9-23', 1544733000, 8, '2249000'),
(30, '-', 10, 1, '1397-9-23', 1544733000, 9, '2449000');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(10) UNSIGNED NOT NULL,
  `option_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `option_value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `option_name`, `option_value`) VALUES
(1, 'TerminalId', '5'),
(2, 'Username', '6'),
(3, 'Password', '7'),
(4, 'MerchantID', '8');

-- --------------------------------------------------------

--
-- Table structure for table `shahr`
--

CREATE TABLE `shahr` (
  `id` int(10) UNSIGNED NOT NULL,
  `shahr_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shahr`
--

INSERT INTO `shahr` (`id`, `shahr_name`, `parent_id`) VALUES
(1, 'تبریز', 1),
(3, 'آذرشهر', 1),
(4, 'اردیبل', 2),
(5, 'تهران', 3);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `url`, `img`) VALUES
(2, 'کفش ورزشی', 'http://localhost/laravel-digikala', '1507324089.jpg'),
(3, 'انواع کنسول', 'http://localhost/laravel-digikala', '1508510805.jpg'),
(4, 'دوربین و لوازم جانبی', 'http://localhost/laravel-digikala', '1508518806.jpg'),
(5, 'لوازم جانبی خودرو', 'http://localhost/laravel-digikala/public', '1517937679.jpg'),
(6, 'هندزفری', 'http://localhost/laravel-digikala/public', '1517937737.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `id` int(10) UNSIGNED NOT NULL,
  `year` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `month` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `day` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `view` int(11) NOT NULL,
  `total_view` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `statistics`
--

INSERT INTO `statistics` (`id`, `year`, `month`, `day`, `view`, `total_view`) VALUES
(1, '1396', '10', '25', 2, 34),
(2, '1396', '10', '26', 1, 1),
(3, '1396', '11', '10', 1, 9),
(4, '1396', '11', '11', 1, 50),
(5, '1396', '11', '13', 1, 134),
(6, '1396', '11', '14', 1, 154),
(7, '1396', '11', '15', 1, 49),
(8, '1396', '11', '16', 1, 13),
(9, '1396', '11', '17', 1, 64),
(10, '1396', '11', '18', 1, 39),
(11, '1396', '11', '19', 1, 109),
(12, '1396', '11', '20', 1, 43),
(13, '1396', '11', '21', 1, 13),
(14, '1396', '11', '22', 1, 74),
(15, '1396', '11', '23', 1, 50),
(16, '1396', '11', '24', 1, 15),
(17, '1396', '11', '27', 1, 3),
(18, '1396', '11', '25', 1, 7),
(19, '1396', '11', '26', 1, 19),
(20, '1396', '12', '08', 1, 4),
(21, '1396', '12', '09', 1, 1),
(22, '1396', '12', '10', 1, 1),
(23, '1396', '12', '11', 1, 21),
(24, '1396', '12', '14', 1, 1),
(25, '1396', '12', '16', 1, 3),
(26, '1396', '12', '17', 1, 4),
(27, '1396', '12', '18', 1, 4),
(28, '1396', '12', '19', 1, 14),
(29, '1396', '12', '20', 1, 1),
(30, '1396', '12', '22', 1, 3),
(31, '1396', '12', '23', 1, 1),
(32, '1396', '12', '26', 1, 6),
(33, '1396', '12', '27', 1, 7),
(34, '1396', '12', '28', 1, 1),
(35, '1397', '1', '06', 2, 2),
(36, '1397', '1', '08', 1, 2),
(37, '1397', '1', '09', 1, 5),
(38, '1397', '1', '12', 1, 49),
(39, '1397', '1', '13', 1, 2),
(40, '1397', '1', '14', 1, 5),
(41, '1397', '1', '19', 1, 7),
(42, '1397', '1', '24', 1, 3),
(43, '1397', '1', '30', 1, 1),
(44, '1397', '1', '31', 1, 10),
(45, '1397', '2', '01', 1, 3),
(46, '1397', '2', '02', 1, 4),
(47, '1397', '2', '09', 1, 10),
(48, '1397', '2', '10', 1, 16),
(49, '1397', '2', '13', 1, 1),
(50, '1397', '2', '14', 1, 1),
(51, '1397', '2', '28', 1, 17),
(52, '1397', '3', '08', 1, 1),
(53, '1397', '3', '10', 1, 6),
(54, '1397', '3', '12', 1, 2),
(55, '1397', '3', '14', 1, 2),
(56, '1397', '3', '16', 1, 1),
(57, '1397', '3', '19', 1, 5),
(58, '1397', '3', '21', 1, 1),
(59, '1397', '3', '22', 1, 26),
(60, '1397', '3', '28', 1, 8),
(61, '1397', '3', '30', 1, 33),
(62, '1397', '3', '31', 1, 21),
(63, '1397', '4', '02', 1, 4),
(64, '1397', '4', '04', 1, 31),
(65, '1397', '4', '05', 1, 56),
(66, '1397', '4', '06', 1, 211),
(67, '1397', '4', '07', 1, 10),
(68, '1397', '4', '10', 1, 4),
(69, '1397', '4', '11', 1, 10),
(70, '1397', '4', '12', 1, 7),
(71, '1397', '4', '13', 1, 4),
(72, '1397', '4', '14', 1, 10),
(73, '1397', '4', '15', 1, 3),
(74, '1397', '4', '16', 1, 2),
(75, '1397', '4', '17', 1, 2),
(76, '1397', '4', '19', 1, 1),
(77, '1397', '4', '20', 1, 3),
(78, '1397', '5', '03', 1, 3),
(79, '1397', '5', '04', 1, 40),
(80, '1397', '5', '06', 1, 2),
(81, '1397', '5', '09', 1, 2),
(82, '1397', '5', '12', 1, 2),
(83, '1397', '5', '21', 1, 1),
(84, '1397', '5', '22', 1, 3),
(85, '1397', '7', '19', 1, 3),
(86, '1397', '7', '23', 1, 2),
(87, '1397', '7', '26', 2, 8),
(88, '1397', '7', '27', 1, 7),
(89, '1397', '7', '28', 1, 4),
(90, '1397', '7', '29', 1, 16),
(91, '1397', '8', '06', 1, 8),
(92, '1397', '8', '15', 1, 1),
(93, '1397', '8', '17', 1, 87),
(94, '1397', '8', '18', 1, 24),
(95, '1397', '8', '19', 1, 2),
(96, '1397', '8', '27', 1, 4),
(97, '1397', '8', '28', 1, 1),
(98, '1397', '9', '03', 1, 15),
(99, '1397', '9', '05', 1, 57),
(100, '1397', '9', '06', 1, 10),
(101, '1397', '9', '07', 1, 4),
(102, '1397', '9', '08', 1, 1),
(103, '1397', '9', '14', 1, 23),
(104, '1397', '9', '15', 1, 3),
(105, '1397', '9', '16', 1, 69),
(106, '1397', '9', '18', 1, 2),
(107, '1397', '9', '25', 1, 2),
(108, '1397', '9', '29', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `statistics_user`
--

CREATE TABLE `statistics_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `year` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `month` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `day` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `statistics_user`
--

INSERT INTO `statistics_user` (`id`, `year`, `month`, `day`, `user_ip`) VALUES
(1, '1396', '10', '25', '::2'),
(2, '1396', '10', '25', '::1'),
(3, '1396', '10', '26', '::1'),
(4, '1396', '11', '10', '::1'),
(5, '1396', '11', '11', '::1'),
(6, '1396', '11', '13', '::1'),
(7, '1396', '11', '14', '::1'),
(8, '1396', '11', '15', '::1'),
(9, '1396', '11', '16', '::1'),
(10, '1396', '11', '17', '::1'),
(11, '1396', '11', '18', '::1'),
(12, '1396', '11', '19', '::1'),
(13, '1396', '11', '20', '::1'),
(14, '1396', '11', '21', '::1'),
(15, '1396', '11', '22', '::1'),
(16, '1396', '11', '23', '::1'),
(17, '1396', '11', '24', '::1'),
(18, '1396', '11', '27', '::1'),
(19, '1396', '11', '25', '::1'),
(20, '1396', '11', '26', '::1'),
(21, '1396', '12', '08', '::1'),
(22, '1396', '12', '09', '::1'),
(23, '1396', '12', '10', '::1'),
(24, '1396', '12', '11', '::1'),
(25, '1396', '12', '14', '192.168.43.210'),
(26, '1396', '12', '16', '::1'),
(27, '1396', '12', '17', '::1'),
(28, '1396', '12', '18', '::1'),
(29, '1396', '12', '19', '::1'),
(30, '1396', '12', '20', '::1'),
(31, '1396', '12', '22', '::1'),
(32, '1396', '12', '23', '::1'),
(33, '1396', '12', '26', '::1'),
(34, '1396', '12', '27', '::1'),
(35, '1396', '12', '28', '::1'),
(36, '1397', '1', '06', '192.168.43.210'),
(37, '1397', '1', '06', '::1'),
(38, '1397', '1', '08', '::1'),
(39, '1397', '1', '09', '::1'),
(40, '1397', '1', '12', '::1'),
(41, '1397', '1', '13', '::1'),
(42, '1397', '1', '14', '::1'),
(43, '1397', '1', '19', '::1'),
(44, '1397', '1', '24', '::1'),
(45, '1397', '1', '30', '::1'),
(46, '1397', '1', '31', '::1'),
(47, '1397', '2', '01', '::1'),
(48, '1397', '2', '02', '::1'),
(49, '1397', '2', '09', '::1'),
(50, '1397', '2', '10', '::1'),
(51, '1397', '2', '13', '::1'),
(52, '1397', '2', '14', '::1'),
(53, '1397', '2', '28', '::1'),
(54, '1397', '3', '08', '::1'),
(55, '1397', '3', '10', '::1'),
(56, '1397', '3', '12', '::1'),
(57, '1397', '3', '14', '::1'),
(58, '1397', '3', '16', '::1'),
(59, '1397', '3', '19', '::1'),
(60, '1397', '3', '21', '::1'),
(61, '1397', '3', '22', '::1'),
(62, '1397', '3', '28', '::1'),
(63, '1397', '3', '30', '::1'),
(64, '1397', '3', '31', '::1'),
(65, '1397', '4', '02', '::1'),
(66, '1397', '4', '04', '::1'),
(67, '1397', '4', '05', '::1'),
(68, '1397', '4', '06', '::1'),
(69, '1397', '4', '07', '::1'),
(70, '1397', '4', '10', '::1'),
(71, '1397', '4', '11', '::1'),
(72, '1397', '4', '12', '::1'),
(73, '1397', '4', '13', '::1'),
(74, '1397', '4', '14', '::1'),
(75, '1397', '4', '15', '::1'),
(76, '1397', '4', '16', '::1'),
(77, '1397', '4', '17', '::1'),
(78, '1397', '4', '19', '::1'),
(79, '1397', '4', '20', '::1'),
(80, '1397', '5', '03', '::1'),
(81, '1397', '5', '04', '::1'),
(82, '1397', '5', '06', '::1'),
(83, '1397', '5', '09', '::1'),
(84, '1397', '5', '12', '::1'),
(85, '1397', '5', '21', '::1'),
(86, '1397', '5', '22', '::1'),
(87, '1397', '7', '19', '::1'),
(88, '1397', '7', '23', '::1'),
(89, '1397', '7', '26', '::1'),
(90, '1397', '7', '26', '127.0.0.1'),
(91, '1397', '7', '27', '127.0.0.1'),
(92, '1397', '7', '28', '127.0.0.1'),
(93, '1397', '7', '29', '127.0.0.1'),
(94, '1397', '8', '06', '::1'),
(95, '1397', '8', '15', '::1'),
(96, '1397', '8', '17', '::1'),
(97, '1397', '8', '18', '::1'),
(98, '1397', '8', '19', '::1'),
(99, '1397', '8', '27', '::1'),
(100, '1397', '8', '28', '::1'),
(101, '1397', '9', '03', '::1'),
(102, '1397', '9', '05', '::1'),
(103, '1397', '9', '06', '::1'),
(104, '1397', '9', '07', '::1'),
(105, '1397', '9', '08', '::1'),
(106, '1397', '9', '14', '127.0.0.1'),
(107, '1397', '9', '15', '127.0.0.1'),
(108, '1397', '9', '16', '::1'),
(109, '1397', '9', '18', '::1'),
(110, '1397', '9', '25', '::1'),
(111, '1397', '9', '29', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `name`) VALUES
(1, '09141592083', '$2y$10$BhdTc7qzkBA2XwDaRSz6F.6QjeclEeeKB6TG5P5CQAhFTiTy3Wl4G', 'user', '1qoeNk9WCPWsA77053D5Tfg56P6lM7PJWoTuMnvRo1KT4PchJpYKIp1vh7VR', '2017-10-23 03:59:36', '2017-10-23 03:59:36', NULL),
(2, 'admin', '$2y$10$tMp5QfYofmay6gAo1cvw5OCOsYgZKwXA0Ro/wXS8oLEvr8hF2ZeK2', 'admin', 'CUfUAiBp8a7qPRbJ5QCGGk5urijDrtrlGQ2aeA89qdWEjE8ISwwwsLZLfWtA', '2017-11-26 05:28:09', '2017-11-26 05:28:09', NULL),
(4, 'ali.sedighi.tu@gmail.com', '$2y$10$MCJlllTu.ij3fzB944BRVu0vJWBTEOP9CVDtFrBwwA63IkFH8UJpm', 'user', 'AmxxeoRtiWwpPVJqDoXthBvTD6OA6t6yBetsOcKI6CXsy75KQph3yyfm0lKl', '2017-12-12 05:49:30', '2017-12-12 05:49:30', NULL),
(5, 'araz@gmail.com', '$2y$10$hUB60ImYieFl38OfTwbEQuqOZjsFm/pjuUN/utayKOYw.FPedCCxm', 'user', 's3uhJdePIx87DO2pFdF7QKhBhaJXCc73iAsUcPCQCf1YF3V8xUg7BJQFf4Q4', '2018-02-08 11:27:10', '2018-02-08 11:27:10', NULL),
(7, 'ali.sedighi@gmail.com', '$2y$10$dX68X0jtT248eR1dtyZqsufnbo7jnvye79NuS3DaJ6fo03GLPeK4e', 'user', NULL, '2018-03-31 10:41:22', '2018-03-31 10:41:22', NULL),
(10, 'reza@gmail.com', '$2y$10$IZKF2KWViQFdZvrjU93KeuYFnkarHMBatEk8qTJED3GqCVN8FKYD.', 'user', 'fCAC6FKUh5XswLvgN7dmsqYQdSkDzu1XDzqU98s9SZBN6kZJ2UN8fI6QID3J', '2018-06-25 09:51:38', '2018-06-25 09:51:38', 'رضا'),
(11, 'hossin1@gmail.com', '$2y$10$HJv6BFz74s8jTDQPbdWap.5HuU0zMB7jG/9XQv.RZFs763UoDD.nC', 'user', NULL, '2018-06-25 10:37:57', '2018-06-25 10:39:59', 'حسین'),
(12, 'sedighi', '$2y$10$5Cjl5.sHVFsC5ORtH6RlqeGAD0HH6gkkbxEZGKVkoamkZoQaEjGLa', 'admin', NULL, '2018-10-19 14:24:06', '2018-10-19 14:24:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ostan_id` int(11) NOT NULL,
  `shahr_id` int(11) NOT NULL,
  `tell` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tell_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zip_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`id`, `user_id`, `name`, `ostan_id`, `shahr_id`, `tell`, `tell_code`, `mobile`, `zip_code`, `address`) VALUES
(1, 1, 'علی صدیقی', 1, 1, '36379212', '041', '9141592083', '123456789', 'تبریز-مرزداران'),
(2, 1, 'علی صدیقی', 2, 4, '36379212', '041', '9141592083', '123456789', 'اردبیل'),
(4, 2, 'علی صدیقی', 2, 4, '36379212', '041', '9141592083', '123456789', 'اردبیل'),
(5, 4, 'علی صدیقی', 1, 1, '36380838', '041', '09141592083', '1234567891', 'آذربایجان شرقی - تبریز - مزداران نسترن غربی'),
(6, 4, 'علی صدیقی', 2, 4, '36380838', '041', '۰۹۱۴۱۵۹۲۰۸۳', '۱۲۳۴۵۶۷۸۹۱', 'اردبیل'),
(7, 10, 'رضا صدیقی', 1, 1, '36380838', '041', '۰۹۱۴۱۵۹۲۰۸۳', '۱۲۳۴۵۶۷۸۹۱', 'تبریز');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amazing`
--
ALTER TABLE `amazing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cat_product`
--
ALTER TABLE `cat_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color_product`
--
ALTER TABLE `color_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_product`
--
ALTER TABLE `comment_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filter`
--
ALTER TABLE `filter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filter_product`
--
ALTER TABLE `filter_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gift_cart`
--
ALTER TABLE `gift_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_product`
--
ALTER TABLE `item_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_gift_cart`
--
ALTER TABLE `order_gift_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_row`
--
ALTER TABLE `order_row`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ostan`
--
ALTER TABLE `ostan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_score`
--
ALTER TABLE `product_score`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shahr`
--
ALTER TABLE `shahr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statistics_user`
--
ALTER TABLE `statistics_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amazing`
--
ALTER TABLE `amazing`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `cat_product`
--
ALTER TABLE `cat_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `color_product`
--
ALTER TABLE `color_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `comment_product`
--
ALTER TABLE `comment_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `filter`
--
ALTER TABLE `filter`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `filter_product`
--
ALTER TABLE `filter_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `gift_cart`
--
ALTER TABLE `gift_cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `item_product`
--
ALTER TABLE `item_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `order_gift_cart`
--
ALTER TABLE `order_gift_cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_row`
--
ALTER TABLE `order_row`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `ostan`
--
ALTER TABLE `ostan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `product_score`
--
ALTER TABLE `product_score`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shahr`
--
ALTER TABLE `shahr`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `statistics`
--
ALTER TABLE `statistics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `statistics_user`
--
ALTER TABLE `statistics_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
