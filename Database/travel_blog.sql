CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) UNIQUE NOT NULL,         -- tên đăng nhập
  password VARCHAR(255) NOT NULL,               -- mật khẩu đã mã hóa
  full_name VARCHAR(255) NOT NULL,              -- họ tên đầy đủ
  birth_date DATE NOT NULL,                     -- ngày sinh (lưu đúng dạng ngày)
  sex TINYINT(1) NOT NULL,                      -- 0: Nữ, 1: Nam
  phone VARCHAR(15) NOT NULL,
  email VARCHAR(255) NOT NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, -- thời điểm tạo tài khoản
  is_admin BOOLEAN DEFAULT FALSE                -- phân quyền: true = admin
);

CREATE TABLE Posts (
  post_id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  content TEXT NOT NULL,  -- Dạng HTML để chứa văn bản và hình ảnh
  image_url VARCHAR(255), -- Ảnh đại diện bài viết (thumbnail)
  author_id INT,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (author_id) REFERENCES Users(user_id)
);

CREATE TABLE Comments (
  comment_id INT AUTO_INCREMENT PRIMARY KEY,
  post_id INT NOT NULL,
  user_id INT NOT NULL,
  comment_text TEXT NOT NULL,
  image_url VARCHAR(255),  -- Đường dẫn ảnh trong bình luận (nếu có)
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
-- Thêm bảng nè mấy ní:
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
--Insert nội dung này vào
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
-- Insert tiếp 
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

--- Tiếp tục thêm này của mẹo du lịch
INSERT INTO data (tieude, mota, hinhanh, alt, link, chuyen_muc_id) VALUES
(' Mẹo Chụp Hình Đẹp Khi Du Lịch Bình Định', 'Khám phá các mẹo chụp ảnh siêu xịn như chọn ánh sáng tự nhiên, bố cục 1/3 và góc chụp "ảo tung chảo" để có những bức ảnh nghìn like!', 'https://cdn.britannica.com/67/92867-050-BC3DC984/cameras-camera-reviews-crystal-displays-photographs-film.jpg', 'Mẹo chụp ảnh khi du lịch Bình Định', './Post/MeoChupHinh.php', 2),
(' Mẹo Sơ Cứu Cơ Bản Khi Du Lịch', 'Bỏ túi ngay những mẹo sơ cứu quan trọng như xử lý côn trùng cắn, say nắng, ngộ độc thực phẩm để có chuyến đi an toàn và trọn vẹn hơn.', 'https://i.pinimg.com/originals/e1/17/a7/e117a77c342fba33d1315df03514d3e0.jpg', 'Mẹo sơ cứu du lịch', './Post/MeoSoCuu.php', 2),
(' Mẹo Mua Đặc Sản Không Lo “Chặt Chém”', 'Gợi ý đặc sản ngon - dễ mang về, cách mặc cả khéo léo và mẹo chọn cửa hàng uy tín để bạn yên tâm mua quà tặng sau chuyến đi Bình Định.', 'https://cohaxunau.com/wp-content/uploads/2023/04/ruou-bau-da-binh-dinh.jpg', 'Mẹo mua đặc sản làm quà', './Post/MeoMuaDacSan.php', 2);
INSERT INTO data (tieude, mota, hinhanh, alt, link, chuyen_muc_id) VALUES
('Mẹo Sắp Xếp Thời Gian Khi Du Lịch Bình Định Hiệu Quả', 'Khám phá cách lên lịch trình thông minh giúp bạn trải nghiệm trọn vẹn vẻ đẹp Quy Nhơn – Bình Định mà không lo lãng phí thời gian!', 'https://issi.vn/wp-content/uploads/2021/07/5-nguyen-tac-quan-ly-thoi-gian.jpg', 'Mẹo sắp xếp thời gian', './Post/MeoSapXepThoiGian.php', 2),
('Bí Kíp Chống Say Sóng Khi Du Lịch Bằng Tàu Ở Bình Định', 'Bỏ túi những mẹo đơn giản giúp bạn “đánh bại” say sóng để tận hưởng chuyến khám phá biển đảo như Cù Lao Xanh, Kỳ Co thật trọn vẹn!', 'https://afamilycdn.com/150157425591193600/2021/4/22/s1-1619080884692372505368.jpg', 'Mẹo chống say tàu', './Post/MeoSaySong.php', 2);
--- Ừ thì cũng có
INSERT INTO data (tieude, mota, hinhanh, alt, link, chuyen_muc_id) VALUES
('Quẩy Hết Mình – Chill Hết Hồn Tại Lễ Hội Chùa Ông Núi Ở Quy Nhơn!', 'Nếu bạn là dân mê xê dịch chính hiệu, đang "lên mood" cho chuyến đi đầu năm và Quy Nhơn đang nằm trong wishlist thì đừng quên note gấp cái tên Lễ hội chùa Ông Núi nha!', 'https://quyzo.com/wp-content/uploads/2022/09/le-hoi-chua-ong-nui.jpg', 'Lễ hội chùa ông núi', './Post_Fes/OngNui_Fes.php', 9),
('Bình Định trình làng 2 tour ưu đãi du khách bằng chuyến tàu 0 đồng', 'Nghe gì chưa? Bình Định vừa "thả xích" combo du lịch siêu hời: 2 tour xịn xò kéo dài 3 ngày 2 đêm, giá chỉ tầm 3,2 triệu/người, đặc biệt là FREE vé tàu khứ hồi cho gần 1.200 người đầu tiên. Đúng rồi đó, đi tàu kiểu “bao nguyên chuyến” từ Hà Nội – Sài Gòn - Đà Nẵng đến Bình Định, khỏi lo vụ di chuyển nha!', 'https://tse2.mm.bing.net/th?id=OIP.D78jBIOxtElWHnHD2EqMugHaEu&cb=iwp1&rs=1&pid=ImgDetMain', 'Khuyến mãi', './Post_Fes/KhuyenMai1.php', 10);