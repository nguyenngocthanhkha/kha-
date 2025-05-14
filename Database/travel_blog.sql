
CREATE TABLE Users (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  is_admin BOOLEAN DEFAULT FALSE
);

CREATE TABLE Posts (
  post_id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  content TEXT NOT NULL, 
  image_url VARCHAR(255), 
  author_id INT,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (author_id) REFERENCES Users(user_id)
);

CREATE TABLE Comments (
  comment_id INT AUTO_INCREMENT PRIMARY KEY,
  post_id INT NOT NULL,
  user_id INT NOT NULL,
  comment_text TEXT NOT NULL,
  image_url VARCHAR(255),  
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (post_id) REFERENCES Posts(post_id),
  FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

CREATE TABLE Categories (
  category_id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL
);

CREATE TABLE Post_Categories (
  post_id INT,
  category_id INT,
  PRIMARY KEY(post_id, category_id),
  FOREIGN KEY (post_id) REFERENCES Posts(post_id),
  FOREIGN KEY (category_id) REFERENCES Categories(category_id)
);

CREATE TABLE chuyen_muc (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ten_chuyen_muc VARCHAR(255)
);
CREATE TABLE data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tieude VARCHAR(255),
    mota TEXT,
    hinhanh TEXT,
    alt TEXT,
    link VARCHAR(255),
    chuyen_muc_id INT,
    CONSTRAINT fk_chuyen_muc FOREIGN KEY (chuyen_muc_id) REFERENCES chuyen_muc(id) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO chuyen_muc (ten_chuyen_muc) VALUES
('Địa điểm nổi tiếng'),
('Mẹo du lịch'),
('Homestay gần biển'),
('Homestay giá rẻ'),
('Cafe view đẹp'),
('Cafe mở khuya'),
('Ăn vặt'),
('Quán ngon'),
('Lễ hội'),
('Khuyến mãi');

INSERT INTO data (tieude, mota, hinhanh, alt, link, chuyen_muc_id) VALUES
('Kỳ Co – Thiên đường biển xanh', 'Thiên đường biển xanh mộng mơ với những bãi cát trắng mịn và làn nước trong vắt. Hãy tận hưởng vẻ đẹp hoang sơ và những cảnh sắc khiến bạn ngỡ ngàng!', 'https://eholiday.vn/wp-content/uploads/2024/07/ky-co-1.jpg', 'Bãi biển Kỳ Co nhìn từ trên cao', './Post/KyCo.php', 1),
('Cù Lao Xanh – Đảo Nhơn Châu', 'Một hòn đảo quyến rũ với biển xanh, rạn san hô đầy màu sắc và không gian yên bình. Nếu bạn đam mê khám phá thiên nhiên, đây chính là điểm đến lý tưởng', 'https://image.vietgoing.com/destination/large/vietgoing_gun2104127154.webp', 'Toàn cảnh đảo Cù Lao Xanh', './Post/CuLaoXanh.php', 1),
('Hòn Khô – Xã Nhơn Hải', 'Bạn đã từng đi bộ trên con đường giữa biển chưa? Đây chính là nơi mang đến trải nghiệm có một không hai khi con đường cát hiện ra giữa làn nước xanh mênh mông.', 'https://statics.vinpearl.com/hon-kho-quy-nhon-6_1703597833.jpeg', 'Hòn Khô và con đường cát giữa biển', './Post/HonKho.php', 1),
('Ghềnh Ráng Tiên Sa – TP Quy Nhơn', 'Đắm mình trong vẻ đẹp kỳ vĩ của núi đá, biển cả và những truyền thuyết hấp dẫn. Một địa điểm thơ mộng không thể bỏ qua!', 'https://statics.vinpearl.com/du-lich-binh-dinh-5_1713625476.jpg', 'Ghềnh Ráng Tiên Sa nhìn từ xa', './Post/GhenhRang.php', 1),
('Đồi Cát Phương Mai – Xã Phước Thuận', 'Bạn đã từng lạc bước vào một "tiểu sa mạc" ngay giữa Bình Định chưa? Những đồi cát trải dài bất tận, sóng gió tạo hình tuyệt đẹp, hứa hẹn mang đến trải nghiệm không thể nào quên!', 'https://media.gody.vn/images/binh-dinh/doi-cat-phuong-mai/4-2017/86912036-20170425070420-binh-dinh-doi-cat-phuong-mai.jpg', 'Đồi cát Phương Mai trải dài', './Post/DoiCat.php', 1),
('Đảo Yến Bình Định – Bán Đảo Phương Mai', 'Đây là nơi cư trú của hàng ngàn chim yến giữa thiên nhiên hoang sơ kỳ vĩ. Hãy tận hưởng không gian yên bình và khám phá hệ sinh thái độc đáo!', 'https://tuyhoago.com/wp-content/uploads/2020/09/dao-yen-binh-dinh-lac-vao-chon-tien-canh-noi-chim-yen-tru-ngu.jpg', 'Đảo Yến Bình Định với chim yến', './Post/DaoYen.php', 1),
('Tháp Bánh Ít – Huyện Tuy Phước', 'Một công trình Chăm Pa cổ đầy huyền bí, nằm giữa những ngọn đồi xanh mướt. Kiến trúc độc đáo và dấu ấn lịch sử lâu đời sẽ khiến bạn say mê!', 'https://gonatour.vn/vnt_upload/news/02_2021/Thap_Banh_It.jpg', 'Tháp Bánh Ít với kiến trúc độc đáo', './Post/ThapBanhIt.php', 1),
('Khu Du Lịch Sinh Thái Hầm Hô – Huyện Tây Sơn', 'Nếu bạn yêu thích thiên nhiên, đây chính là nơi lý tưởng! Suối đá thơ mộng, rừng cây xanh mát cùng những chuyến chèo thuyền đầy thú vị đang chờ bạn khám phá!', 'https://tripzone.vn/uploads/202101/04/29/150258-ham-ho.jpg', 'Khu du lịch Hầm Hô với thiên nhiên tươi đẹp', './Post/HamHo.php', 1),
('Đàn Tế Trời Đất Tây Sơn', 'Một nơi linh thiêng, gắn liền với những nghi lễ trang trọng thời Tây Sơn. Đến đây, bạn sẽ cảm nhận được sự uy nghiêm và dấu ấn lịch sử mạnh mẽ!', 'https://salatour.com/wp-content/uploads/2020/06/dan-te-troi-dat-tay-son-binh-dinh.jpg.webp', 'Đàn Tế Trời Đất Tây Sơn', './Post/DenTeTroiDat.php', 1),
('Đền thờ Nguyễn Trung Trực – Di tích linh thiêng giữa lòng Phù Cát', 'Một nơi đầy ý nghĩa, gắn liền với vị anh hùng Nguyễn Trung Trực. Đây là điểm đến để tìm hiểu về lịch sử đấu tranh đầy kiêu hãnh!', 'https://quynhonhotel.com/wp-content/uploads/2023/02/den-tho-nguyen-trung-truc-diem-du-lich-moi-quy-nhon-binh-dinh-quy-nhon-hotel.jpg', 'Đền thờ Nguyễn Trung Trực', './Post/NguyenTrungTruc.php', 1),
('Bảo tàng Quang Trung - Dấu ấn lịch sử Anh hùng - Bình Định', 'Một địa điểm không thể bỏ qua nếu bạn yêu thích lịch sử. Cảm nhận tinh thần bất khuất của vị anh hùng áo vải Quang Trung qua từng hiện vật!', 'https://touring.vn/wp-content/uploads/2023/04/bao-tang-quang-trung-binh-dinh.jpg', 'Bảo tàng Quang Trung nhìn từ bên ngoài', './Post/BaoTangQuangTrung.php', 1),
('Di tích nơi cập bến tàu không số Lộ Diêu - Thị xã Hoài Nhơn', 'Một dấu ấn lịch sử quan trọng, nơi từng chứng kiến những con tàu không số huyền thoại cập bến trong thời kỳ kháng chiến.', 'https://photo-baomoi.bmcdn.me/w700_r1/2024_05_07_465_49030090/37b13a5cf010194e4001.jpg', 'Cập bến tàu không số Lộ Diêu', './Post/LoDieu.php', 1),
('Chùa Thiên Hưng – Tiên cảnh cổ kính giữa miền đất thượng võ Bình Định', 'Nếu bạn là một tín đồ Phật giáo, hay chỉ đơn giản là người yêu thích vẻ đẹp nghệ thuật và tâm linh, Chùa Thiên Hưng Bình Định chắc chắn sẽ mang đến cho bạn những trải nghiệm khó quên!', 'https://thuexequynhon.net/wp-content/uploads/2023/01/thien-hung-tu-phannguyenkhiem.jpg', 'Toàn cảnh chùa Thiên Hưng', './Post/ThienHung.php', 1),
('Chùa Ông Núi - Linh Phong Thiền Tự: Vẻ đẹp tâm linh giữa núi non hùng vĩ, nơi an trú của bình yên và đức tin', 'Chùa Ông Núi - Linh Phong Thiền Tự, điểm đến tâm linh nổi bật của Bình Định, với tượng Phật cao nhất Đông Nam Á và khung cảnh núi non tuyệt đẹp. Một nơi lý tưởng để tịnh tâm và chiêm nghiệm!', 'https://static.vinwonders.com/production/optimize_chua-ong-nui-2.jpg', 'Chùa Ông Núi nhìn từ xa', './Post/OngNui.php', 1),
('Chùa Long Khánh – Chốn tâm linh hơn 300 năm giữa lòng Quy Nhơn', 'Chùa Long Khánh – một điểm đến hơn 300 năm tuổi, vẫn tĩnh tại và đầy thiêng liêng trong lòng thành phố. Hãy để Chùa Long Khánh là điểm dừng chân cho tâm hồn bạn trên hành trình khám phá Quy Nhơn.','https://cdn.vntrip.vn/cam-nang/wp-content/uploads/2017/12/chinh-dien-vntrip-e1513327387996.jpg', 'Chánh điện chùa Long Khánh', './Post/LongKhanh.php', 1),
('Chùa Thập Tháp Di Đà - Di Sản Văn Hóa Miền Đất Bình Định', 'Khám phá vẻ đẹp của Chùa Thập Tháp Di Đà, nơi lưu giữ những giá trị văn hóa và lịch sử của vùng đất Bình Định. Một điểm đến không thể bỏ qua khi đến Quy Nhơn.', 'https://mia.vn/media/uploads/blog-du-lich/chua-thap-thap-9-1727514971.jpg', 'Chùa Thập Tháp cổ kính', './Post/ThapThap.php', 1);


INSERT INTO data (tieude, mota, hinhanh, alt, link, chuyen_muc_id) VALUES
(' Mẹo Chụp Hình Đẹp Khi Du Lịch Bình Định', 'Khám phá các mẹo chụp ảnh siêu xịn như chọn ánh sáng tự nhiên, bố cục 1/3 và góc chụp "ảo tung chảo" để có những bức ảnh nghìn like!', 'https://cdn.britannica.com/67/92867-050-BC3DC984/cameras-camera-reviews-crystal-displays-photographs-film.jpg', 'Mẹo chụp ảnh khi du lịch Bình Định', './Post/MeoChupHinh.php', 2),
(' Mẹo Sơ Cứu Cơ Bản Khi Du Lịch', 'Bỏ túi ngay những mẹo sơ cứu quan trọng như xử lý côn trùng cắn, say nắng, ngộ độc thực phẩm để có chuyến đi an toàn và trọn vẹn hơn.', 'https://i.pinimg.com/originals/e1/17/a7/e117a77c342fba33d1315df03514d3e0.jpg', 'Mẹo sơ cứu du lịch', './Post/MeoSoCuu.php', 2),
(' Mẹo Mua Đặc Sản Không Lo “Chặt Chém”', 'Gợi ý đặc sản ngon - dễ mang về, cách mặc cả khéo léo và mẹo chọn cửa hàng uy tín để bạn yên tâm mua quà tặng sau chuyến đi Bình Định.', 'https://cohaxunau.com/wp-content/uploads/2023/04/ruou-bau-da-binh-dinh.jpg', 'Mẹo mua đặc sản làm quà', './Post/MeoMuaDacSan.php', 2);
INSERT INTO data (tieude, mota, hinhanh, alt, link, chuyen_muc_id) VALUES
('Mẹo Sắp Xếp Thời Gian Khi Du Lịch Bình Định Hiệu Quả', 'Khám phá cách lên lịch trình thông minh giúp bạn trải nghiệm trọn vẹn vẻ đẹp Quy Nhơn – Bình Định mà không lo lãng phí thời gian!', 'https://issi.vn/wp-content/uploads/2021/07/5-nguyen-tac-quan-ly-thoi-gian.jpg', 'Mẹo sắp xếp thời gian', './Post/MeoSapXepThoiGian.php', 2),
('Bí Kíp Chống Say Sóng Khi Du Lịch Bằng Tàu Ở Bình Định', 'Bỏ túi những mẹo đơn giản giúp bạn “đánh bại” say sóng để tận hưởng chuyến khám phá biển đảo như Cù Lao Xanh, Kỳ Co thật trọn vẹn!', 'https://afamilycdn.com/150157425591193600/2021/4/22/s1-1619080884692372505368.jpg', 'Mẹo chống say tàu', './Post/MeoSaySong.php', 2);
<<<<<<< HEAD

INSERT INTO data (tieude, mota, hinhanh, alt, link, chuyen_muc_id) VALUES
('Seagull Hotel','Khách sạn 4 sao nằm ngay bãi biển trung tâm Quy Nhơn, với tầm nhìn hướng biển tuyệt đẹp và dịch vụ chuyên nghiệp.','https://pix8.agoda.net/hotelImages/433/43382/43382_15052914050028022303.jpg?ca=4&ce=1&s=1024x','Seagull Hotel','./post_homestay/Seagull Hotel - Quy Nhơn.php',3 ),
('Casa Marina Resort', 'Resort nghỉ dưỡng yên tĩnh, sát biển với dịch vụ chất lượng.', 'https://cf.bstatic.com/xdata/images/hotel/max1280x900/219494123.jpg?k=8221aed5c060c10b688e26af721eecd5398a1689db8a1a3bfa0feb9778023e78&o=&hp=1', 'Casa Marina Resort', './post_homestay/Casa Marina Resort.php', 3),
('Dankbaar Resort Quy Nhon', 'Khu nghỉ dưỡng gần biển lý tưởng cho các kỳ nghỉ cùng gia đình.', 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/445425837.jpg?k=09e91d3271b5f578bae2e9fa71ab99eb6d5dc8641f0b4c5564a560dbad5e5351&o=', 'Dankbaar Resort Quy Nhon', './post_homestay/Dankbaar Resort Quy Nhon.php', 3),
('FLC Sea Tower Quy Nhơn', 'Căn hộ du lịch hiện đại, tiện nghi và gần biển.', 'https://cf.bstatic.com/xdata/images/hotel/max1280x900/678433487.jpg?k=f0b2d5559e9b5db97244cdbac65474448c45dce0c4c9088f36d822533071991d&o=&hp=1', 'FLC Sea Tower Quy Nhon', './post_homestay/FLC Sea tower Quy Nhon.php', 3),
('FLC Sea Tower Quy Nhơn 2', 'Không gian thoáng đãng, gần bãi biển Quy Nhơn.', 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/268980476.jpg?k=754d1ec16a78ecdba7060d6fb6ca205ab9c335a180f50bc6f344051d05da92be&o=&hp=1', 'FLC Sea Tower Quy Nhon', './post_homestay/FLC Sea Tower Quy Nhon.php', 3),
('HAKU Boutique Hotel', 'Khách sạn boutique phong cách trẻ trung, sát biển.', 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/268980476.jpg?k=754d1ec16a78ecdba7060d6fb6ca205ab9c335a180f50bc6f344051d05da92be&o=&hp=1', 'HAKU Boutique Hotel', './post_homestay/HAKU Boutique Hotel .PHP', 3),
('HaTa Hotel', 'Nơi lưu trú thuận tiện gần biển, giá cả hợp lý.', 'https://cf.bstatic.com/xdata/images/hotel/max1280x900/236109846.jpg?k=9bb912c9c832041bdfd16df5d288ee6def221b80d586ccbe0646ee84d97b7774&o=&hp=1', 'HaTa Hotel', './post_homestay/HaTa Hotel.php', 3),
('HoangBao Hotel', 'Khách sạn gần biển với thiết kế hiện đại và tiện nghi.', 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/638435497.jpg?k=a4c64828669ba8c7d6687313b396d2d3aa3664bb714b78ea19e3cb3a90bfdb3d&o=&hp=1', 'HoangBaohotel', './post_homestay/HoangBaohotel.php', 3),
('Hồng Gấm Hotel', 'Khách sạn gần biển, phục vụ chu đáo và thân thiện.', 'https://cf.bstatic.com/xdata/images/hotel/max1280x900/673249878.jpg?k=47d31557e009210fbacde994b2179804ec40d0fea278951596af0e5d26b54a2b&o=&hp=1', 'Hồng Gấm Hotel', './post_homestay/Hồng Gấm Hotel.php', 3),
('Hồng Thịnh Hotel', 'Chỗ ở lý tưởng cho du khách thích gần biển.', 'https://cf.bstatic.com/xdata/images/hotel/max1280x900/629473642.jpg?k=5c018e6422331bdd1466f1ffd4830142091fd17f45aedbd4669cde91647a6f95&o=&hp=1', 'HongThinh', './post_homestay/HongThinh.php', 3),
('Mimi TMS Quy Nhơn', 'Căn hộ view biển tuyệt đẹp tại trung tâm Quy Nhơn.', 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/679309614.jpg?k=68ecf0c397ad06112df7ed2278c41cfb26cd175040073bad19597cc63a4c06ef&o=', 'mimi tms quy nhơn', './post_homestay/mimi tms quy nhơn .php', 3),
('TMS LUXURY Quy Nhơn', 'Căn hộ cao cấp sát biển, phù hợp nghỉ dưỡng.', 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/671769394.jpg?k=db0bc44a7a404bb826d457ce867c5502f5858f18b2bd3f958e05da58efad7dec&o=&hp=1', 'TMS LUXURY Quy Nhon', './post_homestay/TMS LUXURY Quy Nhon.php', 3);

INSERT INTO data (tieude, mota, hinhanh, alt, link, chuyen_muc_id) VALUES
('NHÀ TUI Share Quy Nhơn', 'Homestay thiết kế hiện đại, ấm cúng, phù hợp cho nhóm bạn hoặc gia đình.', 'https://kenhhomestay.com/wp-content/uploads/2021/01/nha-tui-share-1.jpg', 'NHÀ TUI Share Quy Nhơn', './post_homestay/ Căn hộ NHÀ TUI Share Quy Nhơn.php', 4),
('Cát Homestay Quy Nhơn', 'Không gian yên tĩnh, gần biển, nội thất mộc mạc và dễ thương.', 'https://mia.vn/media/uploads/blog-du-lich/homestay-quy-nhon-5-1679530448.jpg', 'Cát Homestay Quy Nhơn', './post_homestay/Cát Homestay Quy Nhơn.php', 4),
('Daviden Homestay Quy Nhơn', 'Homestay ấm áp, tiện nghi, thích hợp cho du lịch cùng bạn bè.', 'https://mia.vn/media/uploads/blog-du-lich/homestay-quy-nhon-6-1679530497.jpg', 'Daviden Homestay Quy Nhơn', './post_homestay/Daviden Homestay Quy Nhơn.php', 4),
('Haven Vietnam Homestay', 'Homestay sát biển với phong cách gần gũi thiên nhiên, cực chill.', 'https://mia.vn/media/uploads/blog-du-lich/homestay-quy-nhon-7-1679530485.jpg', 'Haven Vietnam Homestay', './post_homestay/Haven Vietnam Homestay.php', 4),
('Home Quy Nhon Bed & Room', 'Chỗ ở hiện đại, gần trung tâm và các điểm du lịch nổi tiếng.', 'https://mia.vn/media/uploads/blog-du-lich/homestay-quy-nhon-10-1679530711.jpg', 'Home Quy Nhon Bed & Room', './post_homestay/Home Quy Nhon Bed & Room.php', 4),
('Lan Anh Homestay', 'Homestay thân thiện, gần biển và giá cả hợp lý.', 'https://mia.vn/media/uploads/blog-du-lich/homestay-quy-nhon-9-1679530485.jpg', 'Lan Anh Homestay', './post_homestay/Lan Anh Homestay.php', 4),
('Lặng Homestay Quy Nhơn', 'Không gian yên tĩnh, riêng tư, thích hợp nghỉ dưỡng.', 'https://mia.vn/media/uploads/blog-du-lich/homestay-quy-nhon-11-1679530711.jpg', 'Lặng Homestay Quy Nhơn', './post_homestay/Lặng Homestay Quy Nhơn.php', 4),
('Life’s A Beach Homestay', 'Homestay sát biển với phong cách nhiệt đới và vibe rất chill.', 'https://mia.vn/media/uploads/blog-du-lich/homestay-quy-nhon-8-1679530448.jpg', 'Life’s A Beach Homestay', './post_homestay/Life’s A Beach Homestay.php', 4),
('Little Quy Nhơn Homestay', 'Không gian nhỏ xinh, gần biển, phù hợp cho du khách thích yên bình.', 'https://mia.vn/media/uploads/blog-du-lich/homestay-quy-nhon-2-1679530448.jpg', 'Little Quy Nhơn Homestay', './post_homestay/Little Quy Nhơn Homestay.php', 4),
('Mộc Homestay Quy Nhơn', 'Thiết kế mộc mạc, thân thiện với môi trường và gần biển.', 'https://mia.vn/media/uploads/blog-du-lich/homestay-quy-nhon-3-1679530485.jpg', 'Mộc Homestay Quy Nhơn', './post_homestay/Mộc Homestay Quy Nhơn.php', 4),
('Oh Homestay Quy Nhơn', 'Homestay đơn giản, tiện nghi, giá cả phải chăng.', 'https://mia.vn/media/uploads/blog-du-lich/homestay-quy-nhon-4-1679530448.jpg', 'Oh Homestay Quy Nhơn', './post_homestay/Oh Homestay Quy Nhơn.php', 4),
('Sun&Sea House – Homestay', 'Chỗ ở gần biển, trang trí hiện đại, view đẹp và yên tĩnh.', 'https://mrvivu.com/wp-content/uploads/2020/11/238151107.jpg', 'Sun&Sea House – Homestay', './post_homestay/Sun&Sea House – Homestay.php', 4);
=======
--- Ừ thì cũng có
INSERT INTO data (tieude, mota, hinhanh, alt, link, chuyen_muc_id) VALUES
('Quẩy Hết Mình – Chill Hết Hồn Tại Lễ Hội Chùa Ông Núi Ở Quy Nhơn!', 'Nếu bạn là dân mê xê dịch chính hiệu, đang "lên mood" cho chuyến đi đầu năm và Quy Nhơn đang nằm trong wishlist thì đừng quên note gấp cái tên Lễ hội chùa Ông Núi nha!', 'https://quyzo.com/wp-content/uploads/2022/09/le-hoi-chua-ong-nui.jpg', 'Lễ hội chùa ông núi', './Post_Fes/OngNui_Fes', 9),
('Bình Định trình làng 2 tour ưu đãi du khách bằng chuyến tàu 0 đồng', 'Nghe gì chưa? Bình Định vừa "thả xích" combo du lịch siêu hời: 2 tour xịn xò kéo dài 3 ngày 2 đêm, giá chỉ tầm 3,2 triệu/người, đặc biệt là FREE vé tàu khứ hồi cho gần 1.200 người đầu tiên. Đúng rồi đó, đi tàu kiểu “bao nguyên chuyến” từ Hà Nội – Sài Gòn - Đà Nẵng đến Bình Định, khỏi lo vụ di chuyển nha!', 'https://tse2.mm.bing.net/th?id=OIP.D78jBIOxtElWHnHD2EqMugHaEu&cb=iwp1&rs=1&pid=ImgDetMain', 'Khuyến mãi', './Post_Fes/KhuyenMai1.php', 10);
>>>>>>> 1707fbada688bcd3a407c6a417cecff695faa6f6 >>>>>>>>
