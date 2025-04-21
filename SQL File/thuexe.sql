-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 21, 2025 lúc 04:36 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `thuexe`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', '2025-04-21 14:23:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cauhoilienhe`
--

CREATE TABLE `cauhoilienhe` (
  `id` int(11) NOT NULL,
  `HoTen` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `SoDienThoai` char(10) DEFAULT NULL,
  `NoiDung` longtext DEFAULT NULL,
  `NgayTao` timestamp NOT NULL DEFAULT current_timestamp(),
  `TrangThai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `cauhoilienhe`
--

INSERT INTO `cauhoilienhe` (`id`, `HoTen`, `Email`, `SoDienThoai`, `NoiDung`, `NgayTao`, `TrangThai`) VALUES
(1, 'Bùi Hiếu Huy', 'cantho@gmail.com', '1234567899', 'Tôi muốn đăng tin cho thuê xe thì có được hỗ trợ không', '2025-04-21 13:35:09', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_gia`
--

CREATE TABLE `danh_gia` (
  `DG_Ma` int(11) NOT NULL,
  `ND_SoDt` char(10) NOT NULL,
  `DG_NoiDung` mediumtext NOT NULL,
  `DG_NgayTao` timestamp NOT NULL DEFAULT current_timestamp(),
  `DG_TrangThai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_gia`
--

INSERT INTO `danh_gia` (`DG_Ma`, `ND_SoDt`, `DG_NoiDung`, `DG_NgayTao`, `DG_TrangThai`) VALUES
(1, '1234567899', 'Dịch vụ tuyệt vời, thủ tục nhanh gọn, chất lượng xe ổn. Rất đáng để trải nghiệm!', '2025-04-21 13:27:50', 1),
(2, '8888888888', 'Đặt xe dễ dàng, giá cả hợp lý, sẽ giới thiệu cho bạn bè.', '2025-04-21 13:29:39', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `DH_Ma` int(11) NOT NULL,
  `DH_So` bigint(12) NOT NULL,
  `ND_SoDt` char(10) NOT NULL,
  `XE_Ma` int(11) NOT NULL,
  `DH_NgayThue` varchar(20) NOT NULL,
  `DH_NgayKetThuc` varchar(20) NOT NULL,
  `DH_GhiChu` varchar(255) DEFAULT NULL,
  `DH_TrangThai` int(11) DEFAULT NULL,
  `DH_NgayTao` timestamp NOT NULL DEFAULT current_timestamp(),
  `DH_NgayCapNhat` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `don_hang`
--

INSERT INTO `don_hang` (`DH_Ma`, `DH_So`, `ND_SoDt`, `XE_Ma`, `DH_NgayThue`, `DH_NgayKetThuc`, `DH_GhiChu`, `DH_TrangThai`, `DH_NgayTao`, `DH_NgayCapNhat`) VALUES
(5, 894577159, '8888888888', 2, '2025-04-22', '2025-04-25', 'cần gấp', 1, '2025-04-21 14:31:38', '2025-04-21 14:32:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hang_xe`
--

CREATE TABLE `hang_xe` (
  `HX_Ma` int(11) NOT NULL,
  `HX_Ten` varchar(255) NOT NULL,
  `HX_NgayTao` timestamp NULL DEFAULT current_timestamp(),
  `HX_NgayCapNhat` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `hang_xe`
--

INSERT INTO `hang_xe` (`HX_Ma`, `HX_Ten`, `HX_NgayTao`, `HX_NgayCapNhat`) VALUES
(1, 'HYUNDAI', '2025-04-21 13:00:20', NULL),
(2, 'TOYOTA', '2025-04-21 13:00:26', NULL),
(3, 'KIA', '2025-04-21 13:00:32', NULL),
(4, 'MITSUBISHI', '2025-04-21 13:00:37', NULL),
(5, 'MAZDA', '2025-04-21 13:00:42', NULL),
(6, 'VINFAST', '2025-04-21 13:00:48', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidangky`
--

CREATE TABLE `nguoidangky` (
  `id` int(11) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `NgayTao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidangky`
--

INSERT INTO `nguoidangky` (`id`, `Email`, `NgayTao`) VALUES
(1, 'cantho@gmail.com', '2025-04-21 13:30:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `ND_SoDt` char(10) NOT NULL,
  `ND_HoTen` varchar(255) NOT NULL,
  `ND_Email` varchar(255) NOT NULL,
  `ND_PassWord` varchar(255) NOT NULL,
  `ND_DiaChi` varchar(255) DEFAULT NULL,
  `ND_NgayTao` timestamp NULL DEFAULT current_timestamp(),
  `ND_NgayCapNhat` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`ND_SoDt`, `ND_HoTen`, `ND_Email`, `ND_PassWord`, `ND_DiaChi`, `ND_NgayTao`, `ND_NgayCapNhat`) VALUES
('1234567899', 'Bùi Hiếu Huy', 'cantho@gmail.com', 'b8dc042d8cf7deefb0ec6a264c930b02', 'Đường 3/2, Phường Xuân Khánh, Quận Ninh Kiều, Thành phố Cần Thơ', '2025-04-21 13:27:05', '2025-04-21 13:31:36'),
('8888888888', 'Nguyễn Hồng Trang', 'trang@gmail.com', '1e184ab537f0d6d6d94bbb5790b1fee0', NULL, '2025-04-21 13:29:19', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtinlienhe`
--

CREATE TABLE `thongtinlienhe` (
  `id` int(11) NOT NULL,
  `DiaChi` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `SoDienThoai` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `thongtinlienhe`
--

INSERT INTO `thongtinlienhe` (`id`, `DiaChi`, `Email`, `SoDienThoai`) VALUES
(1, 'Đường 3/2, Phường Xuân Khánh, Quận Ninh Kiều, Thành phố Cần Thơ', 'buihieuhuy@gmail.com', '9999999999');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trang`
--

CREATE TABLE `trang` (
  `id` int(11) NOT NULL,
  `TenTrang` varchar(255) DEFAULT NULL,
  `Loai` varchar(255) NOT NULL DEFAULT '',
  `ChiTiet` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `trang`
--

INSERT INTO `trang` (`id`, `TenTrang`, `Loai`, `ChiTiet`) VALUES
(1, 'Điều khoản và Điều kiện', 'terms', '<P align=justify><FONT size=2><STRONG><FONT color=#990000>(1) CHẤP NHẬN CÁC ĐIỀU KHOẢN</FONT><BR><BR></STRONG>Chào mừng đến với Xe thuận tiện! Cần Thơ. Chúng tôi cung cấp Dịch vụ (được định nghĩa bên dưới) cho bạn, tuân theo các Điều khoản dịch vụ (\"TOS\") sau đây, có thể được chúng tôi cập nhật theo thời gian mà không cần thông báo cho bạn. Ngoài ra, khi sử dụng các dịch vụ cụ thể của Xe thuận tiện hoặc các dịch vụ của bên thứ ba, bạn và Xe thuận tiện sẽ phải tuân theo bất kỳ hướng dẫn hoặc quy tắc nào được đăng áp dụng cho các dịch vụ đó theo thời gian. Tất cả các hướng dẫn hoặc quy tắc đó, có thể thay đổi, đều được đưa vào TOS bằng cách tham chiếu. Trong hầu hết các trường hợp, các hướng dẫn và quy tắc dành riêng cho một phần cụ thể của Dịch vụ và sẽ hỗ trợ bạn áp dụng TOS cho phần đó, nhưng trong phạm vi bất kỳ sự không nhất quán nào giữa TOS và bất kỳ hướng dẫn hoặc quy tắc nào, TOS sẽ được ưu tiên áp dụng. Chúng tôi cũng có thể cung cấp các dịch vụ khác theo thời gian được điều chỉnh bởi các Điều khoản Dịch vụ khác nhau, trong trường hợp đó TOS không áp dụng cho các dịch vụ khác đó nếu và trong phạm vi được loại trừ rõ ràng bởi các Điều khoản Dịch vụ khác nhau đó. Xe thuận tiện cũng có thể cung cấp các dịch vụ khác theo thời gian được điều chỉnh bởi các Điều khoản Dịch vụ khác nhau. Các TOS này không áp dụng cho các dịch vụ khác đó được điều chỉnh bởi các Điều khoản Dịch vụ khác nhau đó.</FONT></P>'),
(2, 'Chính sách bảo mật', 'privacy', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Chính sách bảo mật của chúng tôi được thiết lập nhằm bảo vệ toàn diện mọi thông tin cá nhân mà quý khách cung cấp khi sử dụng dịch vụ cho thuê xe ô tô. Chúng tôi cam kết chỉ thu thập, xử lý và lưu trữ dữ liệu với mục đích cải thiện chất lượng dịch vụ, hỗ trợ giao dịch và đảm bảo các nghĩa vụ pháp lý một cách minh bạch và an toàn. Mọi thông tin, từ dữ liệu đăng ký đến lịch sử giao dịch và các tương tác trên website, đều được bảo mật nghiêm ngặt và không chia sẻ với bên thứ ba nếu không có sự đồng ý của quý khách, ngoại trừ những trường hợp pháp luật quy định. Đồng thời, chúng tôi áp dụng các biện pháp bảo vệ tiên tiến nhằm ngăn chặn sự truy cập trái phép, đảm bảo quyền riêng tư của quý khách luôn được ưu tiên hàng đầu. Quý khách cũng có quyền kiểm tra, cập nhật hoặc yêu cầu điều chỉnh thông tin cá nhân của mình tại bất kỳ thời điểm nào. Chính sách bảo mật này thể hiện cam kết của chúng tôi đối với sự tin cậy và an toàn thông tin của khách hàng, nhằm mang lại trải nghiệm dịch vụ chất lượng và uy tín nhất.</span>'),
(3, 'Về chúng tôi', 'aboutus', '<span style=\"color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.3333px;\">Chúng tôi cung cấp nhiều loại xe khác nhau, từ xe nhỏ gọn đến xe hạng sang. Tất cả xe của chúng tôi đều có máy lạnh, trợ lực lái, cửa sổ chỉnh điện. Tất cả xe của chúng tôi đều được mua và bảo dưỡng tại các đại lý chính thức. Xe số tự động có sẵn trong mọi hạng đặt chỗ.</span><span style=\"color: rgb(52, 52, 52); font-family: Arial, Helvetica, sans-serif;\">Vì chúng tôi không liên kết với bất kỳ nhà sản xuất ô tô cụ thể nào nên chúng tôi có thể cung cấp nhiều loại xe và kiểu xe để khách hàng thuê.</span><div><span style=\"color: rgb(62, 62, 62); font-family: &quot;Lucida Sans Unicode&quot;, &quot;Lucida Grande&quot;, sans-serif; font-size: 11px;\">sứ mệnh của chúng tôi là được công nhận là công ty hàng đầu thế giới về dịch vụ cho thuê xe cho các công ty và khu vực công và tư nhân bằng cách hợp tác với khách hàng để cung cấp các giải pháp cho thuê xe tốt nhất và hiệu quả nhất, đồng thời đạt được dịch vụ xuất sắc.</span><span style=\"color: rgb(52, 52, 52); font-family: Arial, Helvetica, sans-serif;\"><br></span></div>'),
(11, 'FAQs', 'faqs', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Address------Test &nbsp; &nbsp;dsfdsfds</span>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xe`
--

CREATE TABLE `xe` (
  `XE_Ma` int(11) NOT NULL,
  `XE_Ten` varchar(255) NOT NULL,
  `HX_Ma` int(11) NOT NULL,
  `XE_TongQuan` longtext DEFAULT NULL,
  `XE_GiaThue` float NOT NULL,
  `XE_LoaiNhienLieu` varchar(100) NOT NULL,
  `XE_MauNam` int(6) NOT NULL,
  `XE_ChoNgoi` int(11) NOT NULL,
  `XE_Anh1` varchar(255) DEFAULT NULL,
  `XE_Anh2` varchar(255) DEFAULT NULL,
  `XE_Anh3` varchar(255) DEFAULT NULL,
  `XE_Anh4` varchar(255) DEFAULT NULL,
  `XE_Anh5` varchar(255) DEFAULT NULL,
  `AirConditioner` int(11) DEFAULT NULL,
  `PowerDoorLocks` int(11) DEFAULT NULL,
  `AntiLockBrakingSystem` int(11) DEFAULT NULL,
  `BrakeAssist` int(11) DEFAULT NULL,
  `PowerSteering` int(11) DEFAULT NULL,
  `DriverAirbag` int(11) DEFAULT NULL,
  `PassengerAirbag` int(11) DEFAULT NULL,
  `PowerWindows` int(11) DEFAULT NULL,
  `CDPlayer` int(11) DEFAULT NULL,
  `CentralLocking` int(11) DEFAULT NULL,
  `CrashSensor` int(11) DEFAULT NULL,
  `LeatherSeats` int(11) DEFAULT NULL,
  `XE_NgayTao` timestamp NOT NULL DEFAULT current_timestamp(),
  `XE_NgayCapNhat` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `xe`
--

INSERT INTO `xe` (`XE_Ma`, `XE_Ten`, `HX_Ma`, `XE_TongQuan`, `XE_GiaThue`, `XE_LoaiNhienLieu`, `XE_MauNam`, `XE_ChoNgoi`, `XE_Anh1`, `XE_Anh2`, `XE_Anh3`, `XE_Anh4`, `XE_Anh5`, `AirConditioner`, `PowerDoorLocks`, `AntiLockBrakingSystem`, `BrakeAssist`, `PowerSteering`, `DriverAirbag`, `PassengerAirbag`, `PowerWindows`, `CDPlayer`, `CentralLocking`, `CrashSensor`, `LeatherSeats`, `XE_NgayTao`, `XE_NgayCapNhat`) VALUES
(1, 'Deluxe 2023', 5, 'Mazda 3 sedan 2023 thể hiện một tinh thần “rất Nhật”, ít thay đổi nhưng một khi đã thay đổi thì nhưng nâng cấp đều rất thực dụng. Mặc dù không gian nội thất không quá rộng rãi, nhưng Mazda 32023 vẫn khá được lòng nhiều khách hàng nhờ sở hữu đường nét thanh lịch pha chất thể thao của ngôn ngữ KODO, hàm lượng option không kém xe Hàn, cảm giác lái linh hoạt, chính xác cùng nhiều trang bị an toàn cao cấp', 976000, 'Petrol', 2023, 4, 'lDZHS2o9mKOy0lOJR_uhig.jpg', '2eXIvoRsYHdtemldKSj27Q.jpg', 'qZNsnMof2j-tqokgeshBUw.jpg', 'tpi8HZmgxHCirOa1kSUkWA.jpg', '2eXIvoRsYHdtemldKSj27Q.jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2025-04-21 13:08:57', '2025-04-21 13:40:06'),
(2, 'MAZDA 3 2016', 5, 'MAZDA 3 (MT) số tự động đăng ký tháng 07/2024\r\nXe gia đình mới đẹp, nội thất nguyên bản, sạch sẽ, bảo dưỡng thường xuyên\r\nXe rộng rãi, an toàn, tiện nghi, phù hợp cho gia đình du lịch.\r\nXe trang bị hệ thống cảm biến lùi, camera hành trình cam cặp lề, hệ thống giải trí theo xe cùng nhiều tiện nghi khác…', 658000, 'Petrol', 2016, 5, 'k0btqA3RnKVKxXHQi6mM3A.jpg', '8GfGXHBWAIQBXam--1q9xA.jpg', 'iDh3URZeJSORuxpB5mbETA.jpg', 'LXvDSLRWK4S93tO0T0DYeA.jpg', 'x8V7G7DYEbYakOEre-M97w.jpg', 1, NULL, NULL, 1, NULL, 1, 1, NULL, 1, NULL, NULL, NULL, '2025-04-21 13:10:33', '2025-04-21 13:40:21'),
(3, 'KIA CERATO 2020', 3, 'Lưu ý xe số sàn nhé mọi người. Xe đời mới, màn hình androi camera 360, bản đồ, định vị, youtube, WIfi đầy đủ. Có hoá đơn VAT cho khách, có tài xế nếu có yêu cầu. Có bảo hiểm thân vỏ đầy đủ. Khách du lịch hỗ trợ giao tận sân bay  miễn phí, thủ tục chỉ cần passport hoặc thông tin chuyến bay khứ hồi là được. Giao nhận xe mọi nơi theo yêu cầu. Nước suối miễn phí. ( có quẹt thẻ, khách vui lòng yêu cầu trước để chuẩn bị. )\r\nCông ty TNHH Thiết Bị Công Nghệ Và Dịch Vụ Nam Anh\r\n30C Hồ Trung Thành, P Trà An, Q Bình Thuỷ, Tp Cần Thơ', 646000, 'Petrol', 2020, 5, 'Le8VGRjoPugUdGKtt3ViNw.jpg', '1sN_-uwheQIgemVMnFiXUA.jpg', 'wUf2EjdRfLKdpQj59PqqIA.jpg', 'eckQnkZ79D27M2-vsY5p1w.jpg', 'Le8VGRjoPugUdGKtt3ViNw.jpg', 1, NULL, 1, 1, 1, 1, 1, NULL, 1, 1, NULL, NULL, '2025-04-21 13:12:16', '2025-04-21 13:40:47'),
(4, 'AVANZA 2024', 2, 'TOYOTA AVANZA (AT) số tự động đăng ký tháng 02/2024\r\nXe gia đình mới đẹp, nội thất nguyên bản, sạch sẽ, bảo dưỡng thường xuyên, rửa xe miễn phí cho khách.\r\nXe rộng rãi, an toàn, tiện nghi, phù hợp cho gia đình du lịch.\r\nXe trang bị hệ thống cảm biến lùi, gạt mưa tự động, đèn pha tự động, camera hành trình, hệ thống giải trí AV cùng nhiều tiện nghi khác…', 867000, 'Petrol', 2024, 7, '6XAn_zrjqgQECQv5TMfoxA.jpg', 'qUs9pkxvysIqV6rxVImmFA.jpg', 'hXJ80GrQWgv8THlhO7zcHg.jpg', 'mUa5aPCLQasugXqr4GOn5A.jpg', '6XAn_zrjqgQECQv5TMfoxA.jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, '2025-04-21 13:14:25', '2025-04-21 13:41:00'),
(5, 'HYUNDAI I10 2019', 1, 'Xe rộng rãi, ít hao nhiên liệu, xe sạch đẹp, bảo hiểm thân vỏ đầy đủ', 506000, 'Diesel', 2019, 5, 'pi5Rzb4jUUg6qNGQXk3lLw (1).jpg', '7g-4N6yUQEhbD_V1-D92Sg.jpg', '7g-4N6yUQEhbD_V1-D92Sg.jpg', 'pi5Rzb4jUUg6qNGQXk3lLw (1).jpg', 'pi5Rzb4jUUg6qNGQXk3lLw.jpg', 1, NULL, 1, 1, NULL, 1, 1, NULL, 1, NULL, NULL, NULL, '2025-04-21 13:16:03', '2025-04-21 13:41:08'),
(6, 'XPANDER 2022', 4, 'Mitsubishi xpander máu trắng sx 2022 mẫu mới số tự động rộng rãi. Đẹp đời mới - Khách cần có app VNeID để kiểm tra khi nhận xe', 976000, 'Petrol', 2022, 7, 'g9kjYJdEvhD3NKFUekCqrg.jpg', 'eXySm1V0HKkM6OpNDzBAQA.jpg', '7VkOeNaqYUpAfR3iUqu1cw.jpg', '4g7_6euqeDUu4CzxPHhjMg.jpg', 'g9kjYJdEvhD3NKFUekCqrg.jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2025-04-21 13:18:06', '2025-04-21 13:41:20'),
(7, 'XPANDER 2023', 4, 'Mitsubishi Xpander AT Premium  đăng kí tháng 12 năm 2023\r\nXe mới gia đình sử dụng sạch sẽ có giao xe tận nơi và rửa xe miễn phí\r\nXe số tự động dễ sử dụng, ngoài ra còn được trang bị đèn tự động, gạt mưa tự động, ga tự động, cam 360, cam lùi, cảm biến lùi, cam hành trình vietmap cảnh báo tốc độ và khu dân cư. Màn hình kết nối Androi Auto và Apple Carplay có dây', 918000, 'Diesel', 2023, 7, 'Rp5H9JEkps0PxpbRCnSzsQ (1).jpg', 'iPfLspQhx8m6B9ZZ9ntdlQ.jpg', 'F6Syc2ZmXlRVwbdTHWC73Q.jpg', 'iPfLspQhx8m6B9ZZ9ntdlQ.jpg', 'Rp5H9JEkps0PxpbRCnSzsQ (1).jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, '2025-04-21 13:21:22', '2025-04-21 13:41:30'),
(8, 'VINFAST VF3 2024', 6, '◦ Sử dụng xe đúng mục đích.\r\n◦ Không sử dụng xe thuê vào mục đích phi pháp, trái pháp luật.\r\n◦ Không sử dụng xe thuê để cầm cố, thế chấp.\r\n◦ Không hút thuốc, nhả kẹo cao su, xả rác trong xe.\r\n◦ Không chở hàng quốc cấm dễ cháy nổ.\r\n◦ Không chở hoa quả, thực phẩm nặng mùi trong xe.\r\n◦ Khi trả xe, nếu xe bẩn hoặc có mùi trong xe, khách hàng vui lòng vệ sinh xe sạch sẽ hoặc gửi phụ thu phí vệ sinh xe.\r\nTrân trọng cảm ơn, chúc quý khách hàng có những chuyến đi tuyệt vời !', 531000, 'CNG', 2024, 4, 'TmI2kcrcN7u3S3CQbHN3zQ.jpg', 'UGPQ8sWnSVB-4ptGqXrL-w.jpg', 'uKybpLfyoJPSfUuKNHnnWw.jpg', 'fFEHMzIHcIffFn5jAks3sg.jpg', '5iJPHxASqXAbfWdGDd8K6g.jpg', 1, 1, 1, 1, NULL, 1, 1, 1, 1, NULL, NULL, NULL, '2025-04-21 13:22:49', '2025-04-21 13:41:44');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cauhoilienhe`
--
ALTER TABLE `cauhoilienhe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD PRIMARY KEY (`DG_Ma`),
  ADD KEY `fk_danhgia_nguoidung` (`ND_SoDt`);

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`DH_Ma`),
  ADD KEY `fk_donhang_nguoidung` (`ND_SoDt`),
  ADD KEY `fk_donhang_xe` (`XE_Ma`);

--
-- Chỉ mục cho bảng `hang_xe`
--
ALTER TABLE `hang_xe`
  ADD PRIMARY KEY (`HX_Ma`);

--
-- Chỉ mục cho bảng `nguoidangky`
--
ALTER TABLE `nguoidangky`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD PRIMARY KEY (`ND_SoDt`),
  ADD KEY `ND_Email` (`ND_Email`);

--
-- Chỉ mục cho bảng `thongtinlienhe`
--
ALTER TABLE `thongtinlienhe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `trang`
--
ALTER TABLE `trang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `xe`
--
ALTER TABLE `xe`
  ADD PRIMARY KEY (`XE_Ma`),
  ADD KEY `fk_xe_hangxe` (`HX_Ma`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `cauhoilienhe`
--
ALTER TABLE `cauhoilienhe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  MODIFY `DG_Ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `DH_Ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `hang_xe`
--
ALTER TABLE `hang_xe`
  MODIFY `HX_Ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `nguoidangky`
--
ALTER TABLE `nguoidangky`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `thongtinlienhe`
--
ALTER TABLE `thongtinlienhe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `trang`
--
ALTER TABLE `trang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `xe`
--
ALTER TABLE `xe`
  MODIFY `XE_Ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD CONSTRAINT `fk_danhgia_nguoidung` FOREIGN KEY (`ND_SoDt`) REFERENCES `nguoi_dung` (`ND_SoDt`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `fk_donhang_nguoidung` FOREIGN KEY (`ND_SoDt`) REFERENCES `nguoi_dung` (`ND_SoDt`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_donhang_xe` FOREIGN KEY (`XE_Ma`) REFERENCES `xe` (`XE_Ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `xe`
--
ALTER TABLE `xe`
  ADD CONSTRAINT `fk_xe_hangxe` FOREIGN KEY (`HX_Ma`) REFERENCES `hang_xe` (`HX_Ma`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
