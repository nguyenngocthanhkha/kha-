-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2025 at 02:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `chuyen_muc`
--

CREATE TABLE `chuyen_muc` (
  `id` int(11) NOT NULL,
  `ten_chuyen_muc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chuyen_muc`
--

INSERT INTO `chuyen_muc` (`id`, `ten_chuyen_muc`) VALUES
(1, 'Địa điểm nổi tiếng'),
(2, 'Mẹo du lịch'),
(3, 'Homestay gần biển'),
(4, 'Homestay giá rẻ'),
(5, 'Cafe view đẹp'),
(6, 'Cafe mở khuya'),
(7, 'Ăn vặt'),
(8, 'Quán ngon'),
(9, 'Lễ hội'),
(10, 'Khuyến mãi');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `tieude` varchar(255) DEFAULT NULL,
  `mota` text DEFAULT NULL,
  `hinhanh` text DEFAULT NULL,
  `alt` text DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `chuyen_muc_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `tieude`, `mota`, `hinhanh`, `alt`, `link`, `chuyen_muc_id`) VALUES
(1, 'Kỳ Co – Thiên đường biển xanh', 'Thiên đường biển xanh mộng mơ với những bãi cát trắng mịn và làn nước trong vắt. Hãy tận hưởng vẻ đẹp hoang sơ và những cảnh sắc khiến bạn ngỡ ngàng!', 'https://eholiday.vn/wp-content/uploads/2024/07/ky-co-1.jpg', 'Bãi biển Kỳ Co nhìn từ trên cao', './Post/KyCo.php', 1),
(2, 'Cù Lao Xanh – Đảo Nhơn Châu', 'Một hòn đảo quyến rũ với biển xanh, rạn san hô đầy màu sắc và không gian yên bình. Nếu bạn đam mê khám phá thiên nhiên, đây chính là điểm đến lý tưởng', 'https://image.vietgoing.com/destination/large/vietgoing_gun2104127154.webp', 'Toàn cảnh đảo Cù Lao Xanh', './Post/CuLaoXanh.php', 1),
(4, 'Ghềnh Ráng Tiên Sa – TP Quy Nhơn', 'Đắm mình trong vẻ đẹp kỳ vĩ của núi đá, biển cả và những truyền thuyết hấp dẫn. Một địa điểm thơ mộng không thể bỏ qua!', 'https://statics.vinpearl.com/du-lich-binh-dinh-5_1713625476.jpg', 'Ghềnh Ráng Tiên Sa nhìn từ xa', './Post/GhenhRang.php', 1),
(5, 'Đồi Cát Phương Mai – Xã Phước Thuận', 'Bạn đã từng lạc bước vào một \"tiểu sa mạc\" ngay giữa Bình Định chưa? Những đồi cát trải dài bất tận, sóng gió tạo hình tuyệt đẹp, hứa hẹn mang đến trải nghiệm không thể nào quên!', 'https://media.gody.vn/images/binh-dinh/doi-cat-phuong-mai/4-2017/86912036-20170425070420-binh-dinh-doi-cat-phuong-mai.jpg', 'Đồi cát Phương Mai trải dài', './Post/DoiCat.php', 1),
(7, 'Tháp Bánh Ít – Huyện Tuy Phước', 'Một công trình Chăm Pa cổ đầy huyền bí, nằm giữa những ngọn đồi xanh mướt. Kiến trúc độc đáo và dấu ấn lịch sử lâu đời sẽ khiến bạn say mê!', 'https://gonatour.vn/vnt_upload/news/02_2021/Thap_Banh_It.jpg', 'Tháp Bánh Ít với kiến trúc độc đáo', './Post/ThapBanhIt.php', 1),
(8, 'Khu Du Lịch Sinh Thái Hầm Hô – Huyện Tây Sơn', 'Nếu bạn yêu thích thiên nhiên, đây chính là nơi lý tưởng! Suối đá thơ mộng, rừng cây xanh mát cùng những chuyến chèo thuyền đầy thú vị đang chờ bạn khám phá!', 'https://tripzone.vn/uploads/202101/04/29/150258-ham-ho.jpg', 'Khu du lịch Hầm Hô với thiên nhiên tươi đẹp', './Post/HamHo.php', 1),
(9, 'Đàn Tế Trời Đất Tây Sơn', 'Một nơi linh thiêng, gắn liền với những nghi lễ trang trọng thời Tây Sơn. Đến đây, bạn sẽ cảm nhận được sự uy nghiêm và dấu ấn lịch sử mạnh mẽ!', 'https://salatour.com/wp-content/uploads/2020/06/dan-te-troi-dat-tay-son-binh-dinh.jpg.webp', 'Đàn Tế Trời Đất Tây Sơn', './Post/DenTeTroiDat.php', 1),
(10, 'Đền thờ Nguyễn Trung Trực – Di tích linh thiêng giữa lòng Phù Cát', 'Một nơi đầy ý nghĩa, gắn liền với vị anh hùng Nguyễn Trung Trực. Đây là điểm đến để tìm hiểu về lịch sử đấu tranh đầy kiêu hãnh!', 'https://quynhonhotel.com/wp-content/uploads/2023/02/den-tho-nguyen-trung-truc-diem-du-lich-moi-quy-nhon-binh-dinh-quy-nhon-hotel.jpg', 'Đền thờ Nguyễn Trung Trực', './Post/NguyenTrungTruc.php', 1),
(11, 'Bảo tàng Quang Trung - Dấu ấn lịch sử Anh hùng - Bình Định', 'Một địa điểm không thể bỏ qua nếu bạn yêu thích lịch sử. Cảm nhận tinh thần bất khuất của vị anh hùng áo vải Quang Trung qua từng hiện vật!', 'https://touring.vn/wp-content/uploads/2023/04/bao-tang-quang-trung-binh-dinh.jpg', 'Bảo tàng Quang Trung nhìn từ bên ngoài', './Post/BaoTangQuangTrung.php', 1),
(12, 'Di tích nơi cập bến tàu không số Lộ Diêu - Thị xã Hoài Nhơn', 'Một dấu ấn lịch sử quan trọng, nơi từng chứng kiến những con tàu không số huyền thoại cập bến trong thời kỳ kháng chiến.', 'https://photo-baomoi.bmcdn.me/w700_r1/2024_05_07_465_49030090/37b13a5cf010194e4001.jpg', 'Cập bến tàu không số Lộ Diêu', './Post/LoDieu.php', 1),
(13, 'Chùa Thiên Hưng – Tiên cảnh cổ kính giữa miền đất thượng võ Bình Định', 'Nếu bạn là một tín đồ Phật giáo, hay chỉ đơn giản là người yêu thích vẻ đẹp nghệ thuật và tâm linh, Chùa Thiên Hưng Bình Định chắc chắn sẽ mang đến cho bạn những trải nghiệm khó quên!', 'https://thuexequynhon.net/wp-content/uploads/2023/01/thien-hung-tu-phannguyenkhiem.jpg', 'Toàn cảnh chùa Thiên Hưng', './Post/ThienHung.php', 1),
(14, 'Chùa Ông Núi - Linh Phong Thiền Tự: Vẻ đẹp tâm linh giữa núi non hùng vĩ, nơi an trú của bình yên và đức tin', 'Chùa Ông Núi - Linh Phong Thiền Tự, điểm đến tâm linh nổi bật của Bình Định, với tượng Phật cao nhất Đông Nam Á và khung cảnh núi non tuyệt đẹp. Một nơi lý tưởng để tịnh tâm và chiêm nghiệm!', 'https://static.vinwonders.com/production/optimize_chua-ong-nui-2.jpg', 'Chùa Ông Núi nhìn từ xa', './Post/OngNui.php', 1),
(15, 'Chùa Long Khánh – Chốn tâm linh hơn 300 năm giữa lòng Quy Nhơn', 'Chùa Long Khánh – một điểm đến hơn 300 năm tuổi, vẫn tĩnh tại và đầy thiêng liêng trong lòng thành phố. Hãy để Chùa Long Khánh là điểm dừng chân cho tâm hồn bạn trên hành trình khám phá Quy Nhơn.', 'https://cdn.vntrip.vn/cam-nang/wp-content/uploads/2017/12/chinh-dien-vntrip-e1513327387996.jpg', 'Chánh điện chùa Long Khánh', './Post/LongKhanh.php', 1),
(16, 'Chùa Thập Tháp Di Đà - Di Sản Văn Hóa Miền Đất Bình Định', 'Khám phá vẻ đẹp của Chùa Thập Tháp Di Đà, nơi lưu giữ những giá trị văn hóa và lịch sử của vùng đất Bình Định. Một điểm đến không thể bỏ qua khi đến Quy Nhơn.', 'https://mia.vn/media/uploads/blog-du-lich/chua-thap-thap-9-1727514971.jpg', 'Chùa Thập Tháp cổ kính', './Post/ThapThap.php', 1),
(20, ' Mẹo Chụp Hình Đẹp Khi Du Lịch Bình Định', 'Khám phá các mẹo chụp ảnh siêu xịn như chọn ánh sáng tự nhiên, bố cục 1/3 và góc chụp \"ảo tung chảo\" để có những bức ảnh nghìn like!', 'https://cdn.britannica.com/67/92867-050-BC3DC984/cameras-camera-reviews-crystal-displays-photographs-film.jpg', 'Mẹo chụp ảnh khi du lịch Bình Định', './Post/MeoChupHinh.php', 2),
(21, ' Mẹo Sơ Cứu Cơ Bản Khi Du Lịch', 'Bỏ túi ngay những mẹo sơ cứu quan trọng như xử lý côn trùng cắn, say nắng, ngộ độc thực phẩm để có chuyến đi an toàn và trọn vẹn hơn.', 'https://i.pinimg.com/originals/e1/17/a7/e117a77c342fba33d1315df03514d3e0.jpg', 'Mẹo sơ cứu du lịch', './Post/MeoSoCuu.php', 2),
(22, ' Mẹo Mua Đặc Sản Không Lo “Chặt Chém”', 'Gợi ý đặc sản ngon - dễ mang về, cách mặc cả khéo léo và mẹo chọn cửa hàng uy tín để bạn yên tâm mua quà tặng sau chuyến đi Bình Định.', 'https://cohaxunau.com/wp-content/uploads/2023/04/ruou-bau-da-binh-dinh.jpg', 'Mẹo mua đặc sản làm quà', './Post/MeoMuaDacSan.php', 2),
(23, ' Mẹo Sắp Xếp Thời Gian Khi Du Lịch Bình Định Hiệu Quả', 'Khám phá cách lên lịch trình thông minh giúp bạn trải nghiệm trọn vẹn vẻ đẹp Quy Nhơn – Bình Định mà không lo lãng phí thời gian!', 'https://issi.vn/wp-content/uploads/2021/07/5-nguyen-tac-quan-ly-thoi-gian.jpg', 'Mẹo sắp xếp thời gian', './Post/MeoSapXepThoiGian.php', 2),
(24, 'Mẹo Sắp Xếp Thời Gian Khi Du Lịch Bình Định Hiệu Quả', 'Khám phá cách lên lịch trình thông minh giúp bạn trải nghiệm trọn vẹn vẻ đẹp Quy Nhơn – Bình Định mà không lo lãng phí thời gian!', 'https://issi.vn/wp-content/uploads/2021/07/5-nguyen-tac-quan-ly-thoi-gian.jpg', 'Mẹo sắp xếp thời gian', './Post/MeoSapXepThoiGian.php', 2),
(25, 'Bí Kíp Chống Say Sóng Khi Du Lịch Bằng Tàu Ở Bình Định', 'Bỏ túi những mẹo đơn giản giúp bạn “đánh bại” say sóng để tận hưởng chuyến khám phá biển đảo như Cù Lao Xanh, Kỳ Co thật trọn vẹn!', 'https://afamilycdn.com/150157425591193600/2021/4/22/s1-1619080884692372505368.jpg', 'Mẹo chống say tàu', './Post/MeoSaySong.php', 2),
(26, 'Quẩy Hết Mình – Chill Hết Hồn Tại Lễ Hội Chùa Ông Núi Ở Quy Nhơn!', 'Nếu bạn là dân mê xê dịch chính hiệu, đang \"lên mood\" cho chuyến đi đầu năm và Quy Nhơn đang nằm trong wishlist thì đừng quên note gấp cái tên Lễ hội chùa Ông Núi nha!', 'https://quyzo.com/wp-content/uploads/2022/09/le-hoi-chua-ong-nui.jpg', 'Lễ hội chùa ông núi', './Post_Fes/OngNui_Fes.php', 9),
(27, 'Bình Định trình làng 2 tour ưu đãi du khách bằng chuyến tàu 0 đồng', 'Nghe gì chưa? Bình Định vừa \"thả xích\" combo du lịch siêu hời: 2 tour xịn xò kéo dài 3 ngày 2 đêm, giá chỉ tầm 3,2 triệu/người, đặc biệt là FREE vé tàu khứ hồi cho gần 1.200 người đầu tiên. Đúng rồi đó, đi tàu kiểu “bao nguyên chuyến” từ Hà Nội – Sài Gòn - Đà Nẵng đến Bình Định, khỏi lo vụ di chuyển nha!', 'https://tse2.mm.bing.net/th?id=OIP.D78jBIOxtElWHnHD2EqMugHaEu&cb=iwp1&rs=1&pid=ImgDetMain', 'Khuyến mãi', './Post_Fes/KhuyenMai1.php', 10),
(28, 'Seagull Hotel', 'Khách sạn 4 sao nằm ngay bãi biển trung tâm Quy Nhơn, với tầm nhìn hướng biển tuyệt đẹp và dịch vụ chuyên nghiệp.', 'https://pix8.agoda.net/hotelImages/433/43382/43382_15052914050028022303.jpg?ca=4&ce=1&s=1024x', 'Seagull Hotel', './post_homestay/Seagull Hotel - Quy Nhơn.php', 3),
(29, 'Casa Marina Resort', 'Resort nghỉ dưỡng yên tĩnh, sát biển với dịch vụ chất lượng.', 'https://cf.bstatic.com/xdata/images/hotel/max1280x900/219494123.jpg?k=8221aed5c060c10b688e26af721eecd5398a1689db8a1a3bfa0feb9778023e78&o=&hp=1', 'Casa Marina Resort', './post_homestay/Casa Marina Resort.php', 3),
(30, 'Dankbaar Resort Quy Nhon', 'Khu nghỉ dưỡng gần biển lý tưởng cho các kỳ nghỉ cùng gia đình.', 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/445425837.jpg?k=09e91d3271b5f578bae2e9fa71ab99eb6d5dc8641f0b4c5564a560dbad5e5351&o=', 'Dankbaar Resort Quy Nhon', './post_homestay/Dankbaar Resort Quy Nhon.php', 3),
(31, 'FLC Sea Tower Quy Nhơn', 'Căn hộ du lịch hiện đại, tiện nghi và gần biển.', 'https://cf.bstatic.com/xdata/images/hotel/max1280x900/678433487.jpg?k=f0b2d5559e9b5db97244cdbac65474448c45dce0c4c9088f36d822533071991d&o=&hp=1', 'FLC Sea Tower Quy Nhon', './post_homestay/FLC Sea tower Quy Nhon.php', 3),
(32, 'FLC Sea Tower Quy Nhơn 2', 'Không gian thoáng đãng, gần bãi biển Quy Nhơn.', 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/268980476.jpg?k=754d1ec16a78ecdba7060d6fb6ca205ab9c335a180f50bc6f344051d05da92be&o=&hp=1', 'FLC Sea Tower Quy Nhon', './post_homestay/FLC Sea Tower Quy Nhon.php', 3),
(33, 'HAKU Boutique Hotel', 'Khách sạn boutique phong cách trẻ trung, sát biển.', 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/268980476.jpg?k=754d1ec16a78ecdba7060d6fb6ca205ab9c335a180f50bc6f344051d05da92be&o=&hp=1', 'HAKU Boutique Hotel', './post_homestay/HAKU Boutique Hotel .PHP', 3),
(34, 'HaTa Hotel', 'Nơi lưu trú thuận tiện gần biển, giá cả hợp lý.', 'https://cf.bstatic.com/xdata/images/hotel/max1280x900/236109846.jpg?k=9bb912c9c832041bdfd16df5d288ee6def221b80d586ccbe0646ee84d97b7774&o=&hp=1', 'HaTa Hotel', './post_homestay/HaTa Hotel.php', 3),
(35, 'HoangBao Hotel', 'Khách sạn gần biển với thiết kế hiện đại và tiện nghi.', 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/638435497.jpg?k=a4c64828669ba8c7d6687313b396d2d3aa3664bb714b78ea19e3cb3a90bfdb3d&o=&hp=1', 'HoangBaohotel', './post_homestay/HoangBaohotel.php', 3),
(36, 'Hồng Gấm Hotel', 'Khách sạn gần biển, phục vụ chu đáo và thân thiện.', 'https://cf.bstatic.com/xdata/images/hotel/max1280x900/673249878.jpg?k=47d31557e009210fbacde994b2179804ec40d0fea278951596af0e5d26b54a2b&o=&hp=1', 'Hồng Gấm Hotel', './post_homestay/Hồng Gấm Hotel.php', 3),
(37, 'Hồng Thịnh Hotel', 'Chỗ ở lý tưởng cho du khách thích gần biển.', 'https://cf.bstatic.com/xdata/images/hotel/max1280x900/629473642.jpg?k=5c018e6422331bdd1466f1ffd4830142091fd17f45aedbd4669cde91647a6f95&o=&hp=1', 'HongThinh', './post_homestay/HongThinh.php', 3),
(38, 'Mimi TMS Quy Nhơn', 'Căn hộ view biển tuyệt đẹp tại trung tâm Quy Nhơn.', 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/679309614.jpg?k=68ecf0c397ad06112df7ed2278c41cfb26cd175040073bad19597cc63a4c06ef&o=', 'mimi tms quy nhơn', './post_homestay/mimi tms quy nhơn .php', 3),
(39, 'TMS LUXURY Quy Nhơn', 'Căn hộ cao cấp sát biển, phù hợp nghỉ dưỡng.', 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/671769394.jpg?k=db0bc44a7a404bb826d457ce867c5502f5858f18b2bd3f958e05da58efad7dec&o=&hp=1', 'TMS LUXURY Quy Nhon', './post_homestay/TMS LUXURY Quy Nhon.php', 3),
(40, 'NHÀ TUI Share Quy Nhơn', 'Homestay thiết kế hiện đại, ấm cúng, phù hợp cho nhóm bạn hoặc gia đình.', '.\\Picture\\nha-tui-share-0.jpg', 'NHÀ TUI Share Quy Nhơn', './post_homestay/Căn hộ NHÀ TUI Share Quy Nhơn.php', 4),
(41, 'Cát Homestay Quy Nhơn', 'Không gian yên tĩnh, gần biển, nội thất mộc mạc và dễ thương.', 'https://mia.vn/media/uploads/blog-du-lich/homestay-quy-nhon-5-1679530448.jpg', 'Cát Homestay Quy Nhơn', './post_homestay/Cát Homestay Quy Nhơn.php', 4),
(42, 'Daviden Homestay Quy Nhơn', 'Homestay ấm áp, tiện nghi, thích hợp cho du lịch cùng bạn bè.', 'https://mia.vn/media/uploads/blog-du-lich/homestay-quy-nhon-6-1679530497.jpg', 'Daviden Homestay Quy Nhơn', './post_homestay/Daviden Homestay Quy Nhon.php', 4),
(43, 'Haven Vietnam Homestay', 'Homestay sát biển với phong cách gần gũi thiên nhiên, cực chill.', 'https://mia.vn/media/uploads/blog-du-lich/homestay-quy-nhon-7-1679530485.jpg', 'Haven Vietnam Homestay', './post_homestay/Haven Vietnam Homestay.php', 4),
(44, 'Home Quy Nhon Bed & Room', 'Chỗ ở hiện đại, gần trung tâm và các điểm du lịch nổi tiếng.', 'https://mia.vn/media/uploads/blog-du-lich/homestay-quy-nhon-10-1679530711.jpg', 'Home Quy Nhon Bed & Room', './post_homestay/Home Quy Nhon Bed & Room.php', 4),
(45, 'Lan Anh Homestay', 'Homestay thân thiện, gần biển và giá cả hợp lý.', 'https://mia.vn/media/uploads/blog-du-lich/homestay-quy-nhon-9-1679530485.jpg', 'Lan Anh Homestay', './post_homestay/Lan Anh Homestay.php', 4),
(46, 'Lặng Homestay Quy Nhơn', 'Không gian yên tĩnh, riêng tư, thích hợp nghỉ dưỡng.', 'https://mia.vn/media/uploads/blog-du-lich/homestay-quy-nhon-11-1679530711.jpg', 'Lặng Homestay Quy Nhơn', './post_homestay/Lặng Homestay Quy Nhơn.php', 4),
(47, 'Life’s A Beach Homestay', 'Homestay sát biển với phong cách nhiệt đới và vibe rất chill.', '.\\Picture\\Life’s A Beach0.jpg', 'Life’s A Beach Homestay', './post_homestay/Life’s A Beach.php', 4),
(48, 'Little Quy Nhơn Homestay', 'Không gian nhỏ xinh, gần biển, phù hợp cho du khách thích yên bình.', 'https://mia.vn/media/uploads/blog-du-lich/homestay-quy-nhon-2-1679530448.jpg', 'Little Quy Nhơn Homestay', './post_homestay/Little Quy Nhơn Homestay.php', 4),
(49, 'Mộc Homestay Quy Nhơn', 'Thiết kế mộc mạc, thân thiện với môi trường và gần biển.', 'https://mia.vn/media/uploads/blog-du-lich/homestay-quy-nhon-3-1679530485.jpg', 'Mộc Homestay Quy Nhơn', './post_homestay/Mộc Homestay Quy Nhơn.php', 4),
(50, 'Oh Homestay Quy Nhơn', 'Homestay đơn giản, tiện nghi, giá cả phải chăng.', 'https://mia.vn/media/uploads/blog-du-lich/homestay-quy-nhon-4-1679530448.jpg', 'Oh Homestay Quy Nhơn', './post_homestay/Oh Homestay Quy Nhơn .php', 4),
(51, 'Sun&Sea House – Homestay', 'Chỗ ở gần biển, trang trí hiện đại, view đẹp và yên tĩnh.', 'https://mrvivu.com/wp-content/uploads/2020/11/238151107.jpg', 'Sun&Sea House – Homestay', './post_homestay/Sun&Sea House – Homestay.php', 4),
(52, '67 Cafe', 'Quán cafe phong cách cổ điển tại Bình Định', 'https://media-cdn.tripadvisor.com/media/photo-s/08/0b/bf/13/cafe-67-in-newark-shopping.jpg', 'Cafe cổ điển', './Post_cafe/67cofe.php', 5),
(53, 'A\'dor Café', 'Cafe phong cách hiện đại, không gian rộng rãi', './Picture/edorcf_0.png', 'Cafe hiện đại', './Post_cafe/A’dor Café.php', 5),
(54, 'Cafe Thật - Cafe Acoustic', 'Cafe thưởng thức nhạc acoustic vào mỗi tối', 'https://quynhonreview.vn/wp-content/uploads/2023/11/1699061609-quan-ca-phe-acoustic-tai-quy-nhon.jpg', 'Cafe Acoustic', './Post_cafe/Cafe Thật - Cafe Acoustic.php', 5),
(55, 'Cafe Xưa và Nay', 'Không gian hoài cổ kết hợp hiện đại', 'https://i.pinimg.com/originals/2f/ae/aa/2faeaaef46f27984d8679e87b7dc0b06.jpg', 'Cafe hoài cổ', './Post_cafe/cafe xưa và nay.php', 5),
(56, 'Choicafe', 'Cafe sân vườn thoáng mát, lý tưởng cho họp mặt', 'https://trinhvantuyen.com/wp-content/uploads/2022/03/lam-choi-la-co-04.jpg', 'Cafe sân vườn', './Post_cafe/choicafe.php', 5),
(57, 'Days Cafe', 'Cafe mang phong cách trẻ trung, hiện đại', 'https://visitbinhdinh.vn/wp-content/uploads/2021/02/cafe_days.jpg', 'Cafe trẻ trung', './Post_cafe/Days Cafe.php', 5),
(58, 'Hari Hari Cafe', 'Không gian nhẹ nhàng, lý tưởng để học tập', 'https://th.bing.com/th/id/OIP.YloUDMsFuRMtGTMt1IV3hwHaFj?rs=1&pid=ImgDetMain', 'Cafe yên tĩnh', './Post_cafe/Hari Hari cafe.php', 5),
(59, 'Hem Cafe', 'Quán cafe nằm trong hẻm nhỏ, yên tĩnh', 'https://i.pinimg.com/736x/34/d9/0e/34d90e33747640deb0711b9271181c3b.jpg', 'Cafe trong hẻm', './Post_cafe/hemcafe.php', 5),
(60, 'Héstia Café & Workspace', 'Cafe kết hợp không gian làm việc hiện đại', 'https://quynhonreview.vn/wp-content/uploads/2024/11/hestia-cafe-workspace-52-chuong-duong-quy-nhon-1730887632.jpeg', 'Cafe Workspace', './Post_cafe/Héstia Café & Workspace.php', 5),
(61, 'Katinat Cafe', 'Cafe phong cách công nghiệp, không gian mở', 'https://www.cotrang.org/public/images/tin_dang/1/33_katinat-quy-nhon-bk-01.jpg', 'Cafe công nghiệp', './Post_cafe/katinatcoffe.php', 5),
(62, 'Kome Cafe', 'Cafe phục vụ thức uống organic', './Picture/cfkome_0.jpg', 'Cafe Organic', './Post_cafe/komecafe.php', 5),
(63, 'LaLa Cafe', 'Cafe trang trí tươi sáng, lý tưởng để chụp hình', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQfWcPjFhYO7auUq8rHyY8-EeG0XUXsJ6_C1A&s', 'Cafe chụp ảnh', './Post_cafe/Lacafee.php', 5),
(64, 'MAJORI COFFEE', 'Quán cafe phong cách hiện đại, đồ uống đa dạng', './Picture/cfmajory_0.jpg', 'Cafe hiện đại', './Post_cafe/MAJORI COFFEE.php', 6),
(65, 'Milano Coffee Tây Sơn', 'Cafe đậm chất Việt, hương vị truyền thống', 'https://banghegiare.com.vn/data/news/3517/mo-quan-cafe-milano.jpg', 'Cafe truyền thống', './Post_cafe/Milano coffee tây sơn.php', 6),
(66, 'Mộc An Vegetarian & Coffee', 'Quán cafe kết hợp đồ chay, không gian xanh', 'https://th.bing.com/th/id/OIP.PRfbgN_dKjK9dN7lXJGftAHaFj?rs=1&pid=ImgDetMain', 'Cafe đồ chay', './Post_cafe/Mộc An Vegetarian & Coffee.php', 6),
(67, 'Monk Cafe', 'Không gian yên tĩnh, lý tưởng để làm việc', './Picture/cfmonk_0.jpg', 'Cafe yên tĩnh', './Post_cafe/Monk cafe.php', 6),
(68, 'Nuicodon', 'Cafe trên núi với view cực chill', 'https://www.cotrang.org/tin-tuc/images/kon-tum/mang-den/cafe/41_view-sieu-chill-mang-den-bk-2.jpg', 'Cafe trên núi', './Post_cafe/Nuicodon.php', 6),
(69, 'Phuc Long Coffee', 'Cafe truyền thống, không gian thoáng đãng', 'https://quynhonreview.com/wp-content/uploads/2022/09/phuc-long-thumb-quynhonreview.jpg', 'Cafe truyền thống', './Post_cafe/phuclongcofe.php', 6),
(70, 'PUMBAA Coffee', 'Quán cafe năng động, không gian mở', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcShPy5o02FZBiBdu6sp6vfL4Ry39HvPvxIx-A&s', 'Cafe năng động', './Post_cafe/PUMBAA Coffee.php', 6),
(71, 'Ri Coffee', 'Cafe nhẹ nhàng, phù hợp cho gặp gỡ bạn bè', 'https://thichtours.com/wp-content/uploads/2023/07/pumpa-coffeee.jpeg', 'Cafe gặp gỡ', './Post_cafe/Ri Coffee.php', 6),
(73, 'The Casc Cafe', 'Quán cafe view đẹp, không gian mở', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRbqooc3AlzqjVPVpYFnznUf6ZyCmk5YB4tNg&s', 'Cafe view đẹp', './Post_cafe/thecascofe.php', 6),
(74, 'Khuyến mãi cực lớn khi du lịch tại Bình Định', 'Bình Định \"lên mood\" đón lễ 30/4 và hè 2025: Dịch vụ chất như nước cất, chơi thả ga không lo bị chặt chém! Chuẩn bị cho chuỗi nghỉ lễ 30/4 - 1/5 và mùa du lịch hè sôi động, Bình Định đang “vào guồng” với hàng loạt kế hoạch xịn sò để du khách vừa được chill hết mình, vừa yên tâm về giá cả, chất lượng và độ an toàn!', 'https://th.bing.com/th/id/R.15de070c88136aceac5564091cececd1?rik=y3ISEOPhRWOAuA&riu=http%3a%2f%2fworldtravelowl.com%2fwp-content%2fuploads%2f2016%2f06%2fGhenh-Rang-1024x680.jpg&ehk=XYOJjK4ERxHDVkLUSZpG99ECK0%2fLDYvPuaYiWDRvSLg%3d&risl=&pid=ImgRaw&r=0', 'Bãi Trứng', './Post_Fes/KhuyenMai2.php', 10),
(75, 'Lễ hội bài chòi', 'Hội bài chòi Quy Nhơn – Vui chơi có thưởng, mang đậm sắc màu truyền thống, tổ chức mỗi cuối tuần tại Quảng trường Nguyễn Tất Thành. Một trải nghiệm độc đáo kết hợp âm nhạc, diễn xuất và văn hóa dân gian!', 'https://baobinhdinh.vn/viewimage.aspx?imgid=268965', 'Quang cảnh hội thi diễn xướng bài chòi.', './Post_Fes/BaiChoi_Fes.php', 9),
(76, 'Lễ hội Rước cá Ông', 'Lễ hội Rước cá Ông tại xã biển Nhơn Hải – sự kiện truyền thống lớn nhất trong năm của ngư dân Quy Nhơn, với nghi lễ cầu ngư, rước thần, múa gươm, múa bá trạo và loạt trò chơi dân gian hấp dẫn, mang đậm bản sắc miền biển!', 'https://vcdn1-vnexpress.vnecdn.net/2014/03/13/01-JPG-3293-1394698410.jpg?w=680&h=0&q=100&dpr=1&fit=crop&s=LCQOeRxxCrhj7KyVdFuXQQ', 'Rước thần Nam Hải từ bãi biển về lăng', './Post_Fes/CaOng_Fes.php', 9),
(77, 'Lễ Hội Cầu Ngư Bình Định – Hẹn Hò Với Biển Cả!', 'Khám phá lễ hội cầu ngư độc đáo tại Bình Định – nơi ngư dân tổ chức các nghi lễ truyền thống để tri ân biển cả và cầu mong mùa biển thuận lợi, kết hợp cùng phần hội rộn ràng với các trò chơi dân gian đặc sắc.', 'https://quyzo.com/wp-content/uploads/2022/09/4787.jpg', 'Lễ rước sắc trong Lễ Hội Cầu Ngư Bình Định', './Post_Fes/CauNgu_Fes.php', 9),
(78, 'Lễ hội đua thuyền Gò Bồi – \"Cháy\" hết mình mỗi dịp Tết ở Bình Định!', 'Khám phá lễ hội đua thuyền Gò Bồi – sự kiện văn hóa - thể thao sôi động dịp đầu năm tại Bình Định với các hoạt động hấp dẫn như bắt vịt, chống sào và đua thuyền rồng.', 'https://mia.vn/media/uploads/blog-du-lich/le-hoi-dua-thuyen-1-1679308143.jpg', 'Lễ hội đua thuyền Gò Bồi là nét đẹp văn hóa truyền thống của người dân Bình Định', './Post_Fes/DuaThuyen_Fes.php', 9),
(79, 'Tết là phải đi Tây Sơn!', 'Hòa mình vào lễ hội Đống Đa rực rỡ tại Bảo tàng Quang Trung mỗi mùng 4-5 Tết: biểu diễn võ thuật, đánh trống, voi chiến, và khí thế hào hùng đầu xuân.', 'https://binhdinh.gov.vn/upload/2005340/fck/phongnv/55481e9c02f270190986c3e2.jpg', 'Lễ hội Đống Đa - Tây Sơn', './Post_Fes/TaySon_Fes.php', 9),
(80, 'Náo nhiệt lễ hội Chợ Gò – Ngày hội đầu xuân rộn ràng tại đất võ Bình Định', 'Lễ hội Chợ Gò – nét đẹp đầu xuân mang đậm bản sắc văn hóa Bình Định: từ chợ không mặc cả, trò chơi dân gian, võ Tây Sơn đến đặc sản quê hương hấp dẫn du khách mỗi mùng 1, 2 Tết.', 'https://mia.vn/media/uploads/blog-du-lich/le-hoi-cho-go-1-1679370668.jpg', 'Lễ hội Chợ Gò – nét văn hóa đầu xuân tại Bình Định', './Post_Fes/ChoGo_Fes.php', 9),
(81, 'Lễ hội Đèo Nhông Dương Liễu - Điểm nhấn siêu cool của Bình Định', 'Lễ hội Đèo Nhông Dương Liễu diễn ra vào mùng 5 Tết hằng năm tại huyện Phù Mỹ, Bình Định, nhằm tưởng niệm chiến thắng lịch sử năm 1965. Đây là dịp dâng hương, tổ chức các hoạt động văn hóa, thể thao sôi nổi và thu hút hàng ngàn du khách tham dự.', 'https://dulichthuduc.com.vn/vnt_upload/news/NAM-TRUNG-BO/binh-dinh/le_hoi_deo_nhong_duong_lieu_binh_dinh_thu_duc_travel.jpg', 'Lễ dâng hương tại lễ hội Đèo Nhông', './Post_Fes/DeoNhong_Fes.php', 9),
(82, 'Lễ hội làng rèn Tây Phương Danh – vibe cháy hết nấc!', 'Lễ hội làng rèn Tây Phương Danh tổ chức vào 12/2 âm lịch tại An Nhơn, Bình Định, với các hoạt động tri ân tổ nghề, lễ bái tổ sư, biểu diễn văn nghệ dân gian, trò chơi kéo co, đập ấm, và không khí lễ hội tưng bừng xuyên suốt ba ngày.', 'https://binhdinh.gov.vn/upload/2005340/20211201/bd_88138.jpg', 'Lễ hội làng rèn Tây Phương Danh', './Post_Fes/LangRen_Fes.php', 9),
(83, 'Bánh canh hải sản Cảng Đỏ Quán', 'Thưởng thức bánh canh hải sản đậm đà, tươi ngon giữa lòng thành phố biển Quy Nhơn.', '.\\Picture\\DoQuan_0.jpg', 'Bánh Canh Hải Sản Càng Đỏ Quán Quy Nhơn', './Post_quán_ăn\\Bánh canh hải sản Càng Đỏ Quán.php', 8),
(84, 'Bánh xèo Thái Hòa – Món Ngon Bình Dân Hút Khách tại Quy Nhơn', 'Thưởng thức bánh xèo tôm nhảy giòn rụm, đậm đà hương vị miền Trung tại quán Thái Hòa nổi tiếng Quy Nhơn.', './Picture/ThaiHoa.webp', 'Bánh xèo tôm nhảy Thái Hòa giòn thơm, ăn kèm rau sống tươi tại Quy Nhơn', './Post_quán_ăn/Bánh xèo Thái Hoà.php', 8),
(85, 'Bò Tơ Tây Ninh Ông Minh – Hương vị đặc sản Tây Ninh giữa lòng Quy Nhơn', 'Thưởng thức bò tơ tươi ngon đậm chất Tây Ninh với không gian rộng rãi, phục vụ tận tình tại quán Ông Minh Quy Nhơn.', './Picture/OngMinh_0.jpg', 'Bò Tơ Tây Ninh Ông Minh Quy Nhơn', './Post_quán_ăn/Bò Tơ Tây Ninh Ông Minh.php', 8),
(86, 'BÚN CÁ HOA LƯ - Bún chả cá thu ngon tại Quy Nhơn', 'Bún Cá Hoa Lư là quán bún chả cá thu nổi tiếng tại Quy Nhơn với nước dùng thanh ngọt, chả cá thu vàng giòn, không tanh, phục vụ sạch sẽ và giá cả hợp lý.', './Picture/HoaLu_0.webp', 'Bún cá Hoa Lư Quy Nhơn', './Post_quán_ăn/BÚN CÁ HOA LƯ - Bún chả cá thu ngon tại Quy Nhơn.php', 8),
(87, 'Cơm Bao Cấp Quy Nhơn – Trở về ký ức xưa trong từng bữa cơm', 'Cơm Bao Cấp Quy Nhơn mang không gian hoài cổ với món ăn dân dã đậm đà, đưa thực khách trở về những năm tháng bao cấp cùng phong cách “cơm mẹ nấu”.', './Picture/ComBaoCap_0.webp', 'Cơm Bao Cấp Quy Nhơn', './Post_quán_ăn/Cơm bao cấp Quy Nhơn.php', 8),
(88, 'Cơm Đồng Quê Quy Nhơn – Hương vị quê giữa lòng phố biển', 'Cơm Đồng Quê Quy Nhơn mang không gian mộc mạc, món ăn đậm đà vị miền Trung, phục vụ thân thiện, phù hợp bữa cơm gia đình và sinh viên.', './Picture/DongQue_0.jpg', 'Cơm Đồng Quê Quy Nhơn', './Post_quán_ăn/CƠM ĐỒNG QUÊ.php', 8),
(89, 'CƠM GÀ 125 – Đậm Đà Vị Truyền Thống Giữa Lòng Quy Nhơn', 'Cơm Gà 125 nổi tiếng hơn 20 năm tại Quy Nhơn với món cơm gà chuẩn vị, gà luộc mềm ngọt, cơm nấu từ nước luộc gà dẻo thơm, phục vụ nhanh và không gian rộng rãi thoáng mát.', './Picture/125_0.jpg', 'Cơm Gà 125 Quy Nhơn', './Post_quán_ăn/CƠM GÀ 125.php', 8),
(90, 'Cơm Gà Ngũ Vị Quy Nhơn', 'Quán cơm gà nổi tiếng với 5 hương vị đặc trưng, phục vụ nhanh, giá cả hợp lý tại trung tâm thành phố.', './Picture/NguVi_0.jpg', 'Cơm Gà Ngũ Vị Quy Nhơn', './Post_quán_ăn/Cơm Gà Ngũ Vị Quy Nhơn.php', 8),
(91, 'Cơm Ngon Quy Nhơn Mr Mộc', 'Quán cơm nhà mộc mạc, phục vụ các món ăn truyền thống Việt Nam giữa lòng thành phố Quy Nhơn, nổi tiếng với hương vị thân thuộc và giá cả phải chăng.', './Picture/mrLoc_0.jpg', 'Cơm Ngon Mr Mộc Quy Nhơn', './Post_quán_ăn/Cơm Ngon Quy Nhơn Mr Mộc.php', 8),
(92, 'Cơm Nhà 1989', 'Quán cơm mang phong cách hoài cổ, tái hiện bữa cơm gia đình đậm chất Việt giữa lòng thành phố Quy Nhơn, nổi bật với món ăn dân dã và không gian ấm cúng như trở về tuổi thơ.', './Picture/ComNha_0.jpg', 'Cơm Nhà 1989 Quy Nhơn', './Post_quán_ăn/Cơm Nhà 1989.php', 8),
(93, 'CƠM NIÊU QUY NHƠN', 'Quán chuyên phục vụ cơm niêu truyền thống giữa lòng Quy Nhơn, nổi bật với lớp cơm cháy giòn rụm, món ăn dân dã và không gian ấm cúng gợi nhớ hương vị quê nhà.', './Picture/nieu_0.webp', 'Cơm Niêu Quy Nhơn', './Post_quán_ăn/CƠM NIÊU QUY NHƠN.php', 8),
(94, 'DÊ NÚI QUY NHƠN SÁU TƯỜNG', 'Dê Núi Sáu Tường là điểm đến lý tưởng cho người mê thịt dê tại Quy Nhơn, nổi bật với các món dê hấp, nướng, lẩu được chế biến đậm đà và không gian thoáng đãng phù hợp tụ họp.', './Picture/DeNui_0.webp', 'Dê Núi Quy Nhơn Sáu Tường', './Post_quán_ăn/DÊ NÚI QUY NHƠN SÁU TƯỜNG.php', 8),
(95, 'GoGi House An Dương Vương Bình Định', 'GoGi House tại An Dương Vương, Quy Nhơn mang đến trải nghiệm ẩm thực nướng Hàn Quốc chuẩn vị với thực đơn phong phú gồm thịt bò Mỹ, ba chỉ heo, sườn non và buffet lẩu nướng hấp dẫn. Không gian ấm cúng, nhân viên chuyên nghiệp cùng giá cả hợp lý là điểm cộng lớn cho quán.', 'https://lh3.googleusercontent.com/gps-cs-s/AC9h4npM71Cip-W9-8pdp7x38g1XhVk48wtkW10f2jcd3FZuDMr943g0JjvMrzSH0if_FEsFWaN3NYGBMViAYnV_REPUStXnDwfoqqZ46PSU4l-dqOxC-hWbKKa1a5-xUF5v--FUL05E=w480-h240-k-no', 'GoGi House An Dương Vương Bình Định', './Post_quán_ăn/GoGi House An Dương Vương Bình Định.php', 8),
(96, 'Hải Sản Hoài Hương', 'Hải Sản Hoài Hương tại Quy Nhơn nổi bật với hải sản tươi sống được chọn trực tiếp từ bể, chế biến theo yêu cầu với hương vị đậm đà đặc trưng miền biển Bình Định. Không gian rộng rãi, phục vụ nhanh chóng, giá cả hợp lý phù hợp cho nhóm và gia đình.', './Picture/HoaiHuong_0.webp', 'Hải Sản Hoài Hương Quy Nhơn', './Post_quán_ăn/Hải Sản Hoài Hương.php', 8),
(97, 'Lẩu & Nướng Buffet Mộc', 'Lẩu & Nướng Buffet Mộc Quy Nhơn là điểm đến lý tưởng cho những tín đồ đam mê đồ nướng và lẩu buffet không giới hạn. Quán có không gian rộng rãi, thực đơn đa dạng các món thịt, hải sản, rau củ tươi ngon được tẩm ướp đậm đà, phục vụ nhanh nhẹn với giá cả hợp lý phù hợp sinh viên và gia đình.', './Picture/Loc_0.webp', 'Buffet Mộc Quy Nhơn', './Post_quán_ăn/Lẩu & Nướng Buffet Mộc.php', 8),
(98, 'MIJA JUMMY - Nhà Hàng Lẩu Nướng', 'MIJA JUMMY là một trong những nhà hàng lẩu nướng được yêu thích nhất tại Quy Nhơn với không gian trẻ trung, sạch sẽ và thực đơn buffet hấp dẫn hơn 50 món như bò Mỹ, ba chỉ heo, hải sản tươi sống cùng nhiều món ăn kèm và tráng miệng đa dạng. Nhà hàng phục vụ buffet không giới hạn với giá hợp lý, phù hợp tụ họp bạn bè, gia đình và tổ chức tiệc.', 'https://lh3.googleusercontent.com/gps-cs-s/AC9h4nonG0hKq6TAd39Vfd7gx9S8N-kv6moZKjyLGlTEFpyFdRpYKHM9egqoWVfoD8KGrDecdLahjX0UcgfJ1YW3XbMQVQ12pQMHlp4ESPyWYoyh8gVARMWGxmxIetCYQh7ijsSacRTM=w408-h306-k-no', 'MIJA JUMMY Nhà Hàng Lẩu Nướng Quy Nhơn', './Post_quán_ăn/MIJA JUMMY - Nhà Hàng Lẩu Nướng.php', 8),
(99, 'Nhà Hàng Cá Khói', 'Nhà Hàng Cá Khói tại Quy Nhơn nổi tiếng với các món hải sản và đặc sản miền Trung chế biến từ cá khói, hàu bỏ lò và lẩu hải sản tươi ngon. Quán có không gian rộng rãi, thiết kế hiện đại ấm cúng, phù hợp cho gia đình, bạn bè và đối tác với dịch vụ chuyên nghiệp.', './Picture/CaKhoi_0.webp', 'Nhà hàng Cá Khói Quy Nhơn', './Post_quán_ăn/Nhà Hàng Cá Khói.php', 8),
(100, 'Nhà Hàng Hankook BBQ', 'Hankook BBQ là nhà hàng nướng Hàn Quốc nổi bật tại Quy Nhơn, mang đến trải nghiệm ẩm thực chuẩn xứ kim chi với các món nướng đa dạng như ba chỉ heo, sườn bò Mỹ, gà sốt cay và bạch tuộc nướng, kèm nhiều loại panchan hấp dẫn. Không gian hiện đại, phục vụ chu đáo, thích hợp cho nhóm bạn và gia đình.', './Picture/BBQ_0.webp', 'Nhà hàng Hankook BBQ Quy Nhơn', './Post_quán_ăn/Nhà Hàng Hankook BBQ.php', 8),
(101, 'Nhà Hàng HQ Quy Nhon', 'Nhà Hàng HQ Quy Nhơn là điểm đến lý tưởng với không gian sang trọng, thực đơn đa dạng món Á - Âu, phục vụ chuyên nghiệp và đầu bếp tài năng. Phù hợp tiệc gia đình, gặp mặt bạn bè, tiếp khách doanh nghiệp tại trung tâm phố biển.', './Picture/HQ_0.webp', 'Không gian hiện đại, ấm cúng tại Nhà Hàng HQ Quy Nhơn', './Post_quán_ăn/Nhà Hàng HQ Quy Nhon.php', 8),
(102, 'Phở Hà Đông - Cơm Rang Dưa Bò', 'Phở Hà Đông – Cơm Rang Dưa Bò là quán ăn được nhiều thực khách tại Quy Nhơn yêu thích với hương vị đậm chất Bắc, món cơm rang dưa bò thơm ngon, phở bò chuẩn vị Hà Nội, phục vụ nhanh chóng, không gian đơn giản, giá cả hợp lý, phù hợp dân văn phòng, sinh viên và khách du lịch.', './Picture/HaDong_0.webp', 'Món cơm rang dưa bò đậm đà, phở chuẩn vị Bắc tại Phở Hà Đông', './Post_quán_ăn/Phở Hà Đông - Cơm Rang Dưa Bò.php', 8),
(103, 'Quán ăn sáng Bố Già', 'Bố Già là quán ăn sáng nổi tiếng tại Quy Nhơn với món bánh mì chảo, bánh mì bò kho, bún bò, mì xào, nui xào, cơm tấm chuẩn vị, phục vụ nhanh chóng, không gian sạch sẽ, giá cả hợp lý, phù hợp học sinh, sinh viên và dân văn phòng.', 'https://lh3.googleusercontent.com/gps-cs-s/AC9h4npi5Ikg0D6WWThMoqRcTwlihKgAUJ7Y7YAqea1wEt0vNP83ntUY-k_p2KVIt1v91tk7rcUU9q_JN9Bj2bVsZm-R2nL-_JeGwl3Y3rtGIBR4Xpd96rzL5VIqd-bLIIE6NDx_Pd8=w408-h272-k-no', 'Đậm chất Việt – Bữa sáng tại quán Bố Già luôn nóng hổi và hấp dẫn', './Post_quán_ăn/Quán ăn sáng Bố Già.php', 8),
(104, 'Quán bún, bánh canh, bánh bèo, bánh ướt, bánh hỏi', 'Quán bún, bánh canh, bánh bèo, bánh ướt, bánh hỏi tại Quy Nhơn với thực đơn đậm chất miền Trung gồm bánh hỏi lòng heo, bánh bèo nước mắm, bún bò, bánh canh cá thu, được chế biến thủ công, giá bình dân, không gian sạch sẽ và phục vụ thân thiện.', 'https://lh3.googleusercontent.com/gps-cs-s/AC9h4nrtLOajuxZkgH-rfJfA40CLt2Splseu30yieWu-rAj_ecJyrhCGupq1BaPrJRJTPNzhQ06xkdnaBsDlRQGx_TCNbexOdcdFGI-vZI6YZJFseVeFCON0xGrl10Z555yrlxD6r88A=w408-h544-k-no', 'Đặc sản dân dã Quy Nhơn – Hương vị quê nhà trong từng món ăn', './Post_quán_ăn/Quán bún, bánh canh, bánh bèo, bánh ướt, bánh hỏi.php', 8),
(105, 'Quán Cô Diễm Bánh Canh He Nem Nướng', 'Quán Cô Diễm nổi tiếng với món bánh canh hẹ đặc trưng màu xanh tươi mát và nem nướng thơm phức tại Quy Nhơn. Quán nhỏ sạch sẽ, phục vụ thân thiện với thực đơn đa dạng topping và dịch vụ đặt mang đi, giao hàng tiện lợi.', './Picture/He_0.webp', 'Bánh canh hẹ xanh mướt, nem nướng thơm lừng tại Quán Cô Diễm', './Post_quán_ăn/Quán Cô Diễm Bánh Canh Hẹ Nem Nướng.php', 8),
(106, 'Quán Cơm Ngon Làng Vũ Đại', 'Quán Cơm Ngon Làng Vũ Đại mang hương vị Bắc bộ đậm đà giữa lòng Quy Nhơn với không gian mộc mạc, cổ xưa. Món cá kho niêu đặc trưng Hà Nam cùng nhiều món ăn dân dã khác được chế biến cầu kỳ, rất bắt cơm.', './Picture/VuDai_0.webp', 'Không gian mộc mạc, đậm chất Bắc bộ tại Làng Vũ Đại Quy Nhơn', './Post_quán_ăn/Quán Cơm Ngon Làng Vũ Đại.php', 8),
(107, 'Quán lẩu Gà Lá É', 'Lẩu Gà Lá É tại Quy Nhơn nổi bật với hương vị cay nồng của ớt, the mát của lá é và thịt gà mềm ngọt. Quán có không gian ấm cúng, phục vụ thân thiện, giá cả hợp lý, rất phù hợp cho nhóm bạn và gia đình.', 'https://lh3.googleusercontent.com/gps-cs-s/AC9h4npdoM_eiflKvG_PWeHq6oH5PuKnj6EmQjQyhN21rpD8-6z7OgUo0FhI02sLZu4-_jDLbh3l1b3yrCUzdkEGR0BbkJl7PloXi_zC7EEdeCmxkl3iSK1k3sapW_1Cf78TVBQlNpxW=w408-h725-k-no', 'Nồi lẩu gà thơm lừng cùng lá é đặc trưng tại Quy Nhơn', './Post_quán_ăn/Quán lẩu Gà Lá É.php', 8),
(108, 'Quán Cô Gù', 'Quán Cô Gù – Ăn Vặt Bình Dân tại đường Phan Bội Châu, phường Lê Lợi, Quy Nhơn, nổi tiếng với món ăn ngon, giá bình dân, rất được lòng nhiều bạn trẻ và gia đình.', '.\\Picture\\quan1_0.jpg', 'Quán Cô Gù – Ăn Vặt Bình Dân', './Post_quán_ăn/quan1.php', 7),
(109, 'Face Quán 29', 'Face Quán 29, đường Nguyễn Nhạc, phường Ngô Mây, thành phố Quy Nhơn  Đây là quán ăn vặt khá có tiếng ở “thành phố biển”. Quán được rất nhiều người yêu thích và lựa chọn làm nơi “dừng chân” những lúc rảnh rỗi, đặc biệt là giới trẻ. Du khách khi đến Quy Nhơn du lịch nhớ đừng bỏ qua quán này.', '.\\Picture\\quan2_0.jpg', 'Face Quán – Các Món Ăn Vặt', './Post_quán_ăn/quan2.php', 7),
(110, 'Ahihi Quán', 'Ahihi Quán – Một trong những quán ăn vặt ngon tại Quy Nhơn nằm trong hẻm 72, đường Trần Cao Vân, thành phố Quy Nhơn, tỉnh Bình Định. Quán đã mở được khá lâu và được rất nhiều người yêu mến, đặc biệt là giới trẻ địa phương và du khách.', '.\\Picture\\quan3_0.jpg', 'Ahihi Quán – Ăn Vặt', './Post_quán_ăn/quan3.php', 7),
(111, 'Quán Ăn Vặt Quy Nhơn', 'Quán Ăn Vặt Quy Nhơn – Nằm tại Cổng 31/3 TT An Phú Thịnh, thành phố Quy Nhơn, tỉnh Bình Định. Quán có đường đi dễ dàng, thuận tiện giao thông, rất thích hợp cho bạn khi muốn ăn vặt và trò chuyện.', '.\\Picture\\quan4_0.jpg', 'Quán Ăn Vặt Quy Nhơn', './Post_quán_ăn/quan4.php', 7),
(112, 'Quán Kem – Gỏi Thanh Tâm', 'Quán Kem – Gỏi Thanh Tâm nằm tại số 69, đường Bà Triệu, thành phố Quy Nhơn, tỉnh Bình Định. Là quán ăn vặt ngon được giới trẻ yêu thích, thích hợp để thưởng thức các món ăn vặt ngon và độc đáo.', '.\\Picture\\quan5_0.jpg', 'Quán Kem – Gỏi Thanh Tâm', './Post_quán_ăn/quan5.php', 7),
(113, 'Quán Xiên Que Woắn', 'Quán Xiên Que Woắn là quán ăn vặt nổi tiếng tại Quy Nhơn tọa lạc cuối đường Nguyễn Tất Thành nối dài. Đường đi dễ, bạn có thể dùng bản đồ hoặc hỏi người dân địa phương.', '.\\Picture\\quan6_0.jpg', 'Quán Xiên Que Woắn', './Post_quán_ăn/quan6.php', 7),
(114, 'Quán Bánh Tráng Trứng', 'Quán Bánh Tráng Trứng – Phan Bội Châu là quán ăn vỉa hè với lò than nướng và bàn ghế đơn giản. Nơi đây mang lại cảm giác gần gũi và các món bánh tráng nướng thơm ngon đặc trưng.', '.\\Picture\\quan7_0.jpg', 'Quán Bánh Tráng Trứng – Phan Bội Châu', './Post_quán_ăn/quan7.php', 7),
(115, 'Quán Ăn Vặt Ngô Mây', 'Quán Ăn Vặt Ngô Mây – Địa chỉ số 101, đường Ngô Mây, thành phố Quy Nhơn, tỉnh Bình Định. Quán phục vụ từ 16\' đến 22\' tất cả các ngày trong tuần, rất thích hợp cho tín đồ trứng cút và bánh tráng nướng.', '.\\Picture\\quan8_0.jpg', 'Quán Ăn Vặt Ngô Mây', './Post_quán_ăn/quan8.php', 7),
(116, 'Quán Bánh Rế – Xôi Chiên', 'Quán Bánh Rế – Xôi Chiên nằm trên đường Lê Hồng Phong, thành phố Quy Nhơn. Quán được các bạn trẻ và sinh viên yêu thích, đảm bảo vệ sinh và an toàn thực phẩm.', '.\\Picture\\quan9_0.jpg', 'Quán Bánh Rế – Xôi Chiên', './Post_quán_ăn/quan9.php', 7),
(117, 'Chè Chuối Nướng', 'Quán Chè Chuối Nướng nằm trên đường Nguyễn Công Trứ, Quy Nhơn. Dù không gian nhỏ nhưng rất sạch sẽ và tạo cảm giác gần gũi, thoải mái cho khách.', '.\\Picture\\quan10_0.jpg', 'Quán Chè Chuối Nướng', './Post_quán_ăn/quan10.php', 7),
(118, 'Bánh bèo Bà Xê', 'Quán bánh bèo Bà Xê rất nổi tiếng tại Quy Nhơn, thu hút nhiều khách du lịch và dân địa phương nhờ món ngon giá rẻ. Quán mở cửa từ 15\' đến 22\' các ngày trong tuần.', '.\\Picture\\quan11_0.jpg', 'Quán bánh bèo Bà Xê', './Post_quán_ăn/quan11.php', 7),
(119, 'Mixue', 'Cửa hàng kem Mixue tại số 334 đường Diên Hồng, TP. Quy Nhơn, Bình Định, là điểm đến lý tưởng để thưởng thức kem ngon mát lạnh.', '.\\Picture\\quan12_0.jpg', 'Cửa hàng kem Mixue', './Post_quán_ăn/quan12.php', 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `is_admin` tinyint(1) DEFAULT 0,
  `reset_otp` varchar(6) DEFAULT NULL,
  `reset_otp_expiry` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `full_name`, `birth_date`, `sex`, `phone`, `email`, `avatar`, `created_at`, `is_admin`, `reset_otp`, `reset_otp_expiry`) VALUES
(9, 'HaruAlex', '$2y$10$9Wjnup1dflLCC4W0yu8yg.TQk4nEhyPTvO4tOWcoa3dPIgkvejCzu', 'Alex Stander', '2025-05-14', 0, '0342589631', 'yn84258@gmail.com', '1748853476_thế giới động vật.jpeg', '2025-05-24 18:53:25', 0, '718054', '2025-05-27 18:29:45'),
(10, 'admin', '$2y$10$jV0wCGVNKR5FiJerFHe9aeXYonA6aEgDQocF.faXYhcdkw35VT30y', 'Alex Stander', '2025-05-14', 0, '0342589631', 'hotrodulichquynhon@gmail.com', '1748853476_thế giới động vật.jpeg', '2025-06-01 22:11:30', 1, '915806', '2025-06-01 17:19:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chuyen_muc`
--
ALTER TABLE `chuyen_muc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_chuyen_muc` (`chuyen_muc_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chuyen_muc`
--
ALTER TABLE `chuyen_muc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `fk_chuyen_muc` FOREIGN KEY (`chuyen_muc_id`) REFERENCES `chuyen_muc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
