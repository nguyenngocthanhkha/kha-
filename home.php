<?php include("Includes/header.php"); ?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QNTour</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="./CSS/styleHome.css">
    <link rel="stylesheet" href="./CSS/styleHeader.css">
    <link rel="stylesheet" href="./CSS/styleFooter.css">
</head>

<body>
    <!-- Banner -->
    <section class="banner-container">
        <img src="https://www.vietnamairlines.com/~/media/Images/Discovery/Vietnam/QUYNHON/canh%20dep/1920x1080/Quynhon_canhdep_dam_thi_nai_1920x1080.jpg"
            class="banner-image" />
        <img src="https://ik.imagekit.io/tvlk/blog/2022/09/cu-lao-xanh-1.jpg?tr=dpr-2,w-675" class="banner-image" />
        <img src="https://focusasiatravel.vn/wp-content/uploads/2020/02/thap-doi-quy-nhon.jpg" class="banner-image" />
        <img src="https://www.elle.vn/wp-content/uploads/2018/09/24/elle-viet-nam-nhon-ly-5.jpg" class="banner-image" />
        <h2 class="banner-text">TRẢI NGHIỆM BÌNH ĐỊNH</h2>
    </section>

    <!-- Vì sao chọn QNTour -->
    <section class="reason-section">
        <div class="container">
            <h3 class="reason-title">Vì sao nên chọn QNTOUR?</h3>
            <div class="reason-grid">
                <div class="reason-item">
                    <span class="icon">💰</span>
                    <h4 class="reason-subtitle">Giá Tốt Nhất Cho Bạn</h4>
                    <p class="reason-text">Có nhiều mức giá đa dạng và phù hợp với túi tiền của bạn</p>
                </div>
                <div class="reason-item">
                    <span class="icon">📋</span>
                    <h4 class="reason-subtitle">Booking dễ dàng</h4>
                    <p class="reason-text">Đặt tour và được hỗ trợ khách hàng nhanh chóng, thuận tiện</p>
                </div>
                <div class="reason-item">
                    <span class="icon">🎒</span>
                    <h4 class="reason-subtitle">Tour du lịch tối ưu</h4>
                    <p class="reason-text">Đa dạng tour du lịch, linh hoạt và dễ chọn lựa</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Cẩm nang du lịch -->
    <section class="section-guide">
        <h2 class="section-title">Cẩm nang du lịch</h2>
        <p class="section-description">
            Hành trang du lịch Quy Nhơn trong tầm tay – đầy đủ thông tin, dễ hiểu và hấp dẫn.
        </p>

        <div class="guide-grid">
            <!-- Bài viết 1 -->
            <div class="guide-card">
                <img src="https://saoviettravel.com.vn/blog/wp-content/uploads/2021/05/eo-gio-2.jpg" alt="Biển Kỳ Co">
                <div class="guide-content">
                    <h3>Biển Kỳ Co – Maldives của Việt Nam</h3>
                    <p>Nơi biển xanh, cát trắng và những trải nghiệm khó quên...</p>
                    <a href="Post/KyCo.php" class="guide-button">Xem chi tiết</a>
                </div>
            </div>

            <!-- Bài viết 2 -->
            <div class="guide-card">
                <img src="https://static.vinwonders.com/production/mon-ngon-quy-nhon-1.jpg" alt="Ẩm thực Quy Nhơn">
                <div class="guide-content">
                    <h3>Ẩm thực đặc trưng Quy Nhơn</h3>
                    <p>Khám phá những món ăn dân dã không thể bỏ lỡ...</p>
                    <a href="\kha-\Post_quán_ăn\quan11.php" class="guide-button">Xem chi tiết</a>
                </div>
            </div>

            <!-- Bài viết 3 -->
            <div class="guide-card">
                <img src="https://th.bing.com/th/id/OIP.OAE44U5ALPUfWRKvmXRTNAHaF5?rs=1&pid=ImgDetMain"
                    alt="Lịch trình Quy Nhơn">
                <div class="guide-content">
                    <h3>Lịch trình du lịch Quy Nhơn</h3>
                    <p>3 ngày 2 đêm cực chất dành cho bạn đam mê khám phá...</p>
                    <a href="\kha-\Post\LichTrinh.php" class="guide-button">Xem chi tiết</a>
                </div>
            </div>

            <!-- Bài viết 4 -->
            <div class="guide-card">
                <img src="https://tourculaoxanh.vn/wp-content/uploads/2020/03/87974946_2641611629227325_7514046525597548544_o.jpg"
                    alt="Sống ảo Quy Nhơn">
                <div class="guide-content">
                    <h3>Tips sống ảo tại Quy Nhơn</h3>
                    <p>Gợi ý những góc chụp ảnh thần thánh bạn nên biết!</p>
                    <a href="Post/MeoChupHInh.php" class="guide-button">Xem chi tiết</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Nghiện Cà Phê -->
    <section class="section-guide">
        <h2 class="section-title">Nghiện Cà Phê</h2>
        <p class="section-description">
            Những không gian, những địa điểm nổi bật không thể thiếu hương vị cà phê. Vừa ngắm phố vừa nhâm nhi thì còn
            gì bằng!
        </p>

        <div class="guide-grid">
            <!-- Quán 1 -->
            <div class="guide-card">
                <img src="/kha-/Picture/Cafe1988_0.jpg" alt="Cafe 1988">
                <div class="guide-content">
                    <h3>Cafe 1988 - View biển chill</h3>
                    <p>Không gian vintage hòa cùng sóng biển tạo nên trải nghiệm cà phê cực thư giãn.</p>
                    <a href="/kha-/Post_cafe/Cafe1988.php" class="guide-button">Xem chi tiết</a>
                </div>
            </div>

            <!-- Quán 2 -->
            <div class="guide-card">
                <img src="/kha-/Picture/SurfCoffee_0.jpg" alt="Surf Coffee">
                <div class="guide-content">
                    <h3>Surf Coffee - Đậm chất Bali</h3>
                    <p>Không gian mở, tone gỗ trắng, cực hợp để sống ảo và thư giãn cả ngày.</p>
                    <a href="/kha-/Post_cafe/SurfCoffee.php" class="guide-button">Xem chi tiết</a>
                </div>
            </div>

            <!-- Quán 3 -->
            <div class="guide-card">
                <img src="/kha-/Picture/TropicalGarden_0.jpg" alt="Tropical Garden">
                <div class="guide-content">
                    <h3>Tropical Garden</h3>
                    <p>Góc vườn xanh mát, yên tĩnh, rất lý tưởng cho những buổi trò chuyện nhẹ nhàng.</p>
                    <a href="/kha-/Post_cafe/TropicalGarden.php" class="guide-button">Xem chi tiết</a>
                </div>
            </div>

            <!-- Quán 4 -->
            <div class="guide-card">
                <img src="/kha-/Picture/TheCoffeTalk_0.png" alt="The Coffee Talk">
                <div class="guide-content">
                    <h3>The Coffee Talk - Chill rooftop</h3>
                    <p>View tầng thượng nhìn toàn cảnh thành phố – quá lý tưởng để ngắm hoàng hôn.</p>
                    <a href="\kha-\Post_cafe\TheCoffeeTalk .php" class="guide-button">Xem chi tiết</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Kênh Homestay -->
    <section class="section-wrapper homestay">
        <section class="section-guide">
            <h2 class="section-title">Kênh Homestay</h2>
            <p class="section-description">
                Quy Nhơn không chỉ có biển đẹp mà còn có những homestay cực xinh.
                Cùng khám phá những nơi lưu trú đáng yêu khiến bạn chẳng muốn rời xa!
            </p>
        </section>

        <div class="card-container">
            <!-- Homestay 1 -->
            <div class="card">
                <img src="\kha-\Picture\Larose_0.jpg" alt="LaRose Homestay">
                <div class="card-content">
                    <h3>LaRose Homestay</h3>
                    <p>Thiết kế nhẹ nhàng, tinh tế, không gian yên tĩnh và gần trung tâm.</p>
                    <a href="\kha-\Post\larose.php" class="read-more">Xem chi tiết</a>
                </div>
            </div>

            <!-- Homestay 2 -->
            <div class="card">
                <img src="\kha-\Picture\Life’s A Beach0.jpg" alt="Life's A Beach">
                <div class="card-content">
                    <h3>Life’s A Beach</h3>
                    <p>Homestay sát biển mang vibe du mục, thân thiện và mộc mạc.</p>
                    <a href="post_homestay/Life’s A Beach.php" class="read-more">Xem chi tiết</a>
                </div>
            </div>

            <!-- Homestay 3 -->
            <div class="card">
                <img src="https://homestayvungtau.vn/wp-content/uploads/2024/09/villa-121-g2-nguyen-thi-minh-khai-7.jpg"
                    alt="Cocohut Homestay">
                <div class="card-content">
                    <h3>Cocohut Homestay</h3>
                    <p>Trang trí tông trắng – xanh biển, nổi bật với khu vườn xinh xắn và quán cà phê riêng.</p>
                    <a href="\kha-\Post_quán_ăn\cocohut.php" class="read-more">Xem chi tiết</a>
                </div>
            </div>

            <!-- Homestay 4 -->
            <div class="card">
                <img src="https://th.bing.com/th/id/OIP.tptahXwoTl-bnohc7iPjdgHaKC?pid=ImgDet&w=474&h=642&rs=1"
                    alt="Innside Homestay">
                <div class="card-content">
                    <h3>Innside Homestay</h3>
                    <p>Thiết kế hiện đại, sạch sẽ, có ban công nhìn ra phố – tiện nghi như khách sạn mini.</p>
                    <a href="\kha-\Post_quán_ăn\inside.php" class="read-more">Xem chi tiết</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Địa điểm ăn uống -->
    <section class="section-wrapper eating-places">
        <section class="section-guide">
            <h2 class="section-title">Địa điểm ăn uống</h2>
            <p class="section-description">
                Quy Nhơn không chỉ có biển đẹp mà còn thu hút bởi những món ăn bình dân và lâu đời đậm gia vị của những
                người dân xứ nẫu.
            </p>
        </section>

        <div class="card-container">
            <!-- Địa điểm 1 -->
            <div class="card">
                <img src="./Picture/nieu_0.webp"
                    alt="CƠM NIÊU QUY NHƠN">
                <div class="card-content">
                    <h3>CƠM NIÊU QUY NHƠN</h3>
                    <p>Quán chuyên phục vụ cơm niêu truyền thống giữa lòng Quy Nhơn, nổi bật với lớp cơm cháy giòn rụm,
                        món ăn dân dã và không gian ấm cúng gợi nhớ hương vị quê nhà.</p>
                    <a href="/kha-/Post_quán_ăn/CƠM NIÊU QUY NHƠN.php" class="read-more">Xem chi tiết</a>
                </div>
            </div>

            <!-- Địa điểm 2 -->
            <div class="card">
                <img src="./Picture/ComNha_0.jpg" alt="Cơm nhà 1989">
                <div class="card-content">
                    <h3>Cơm Nhà 1989</h3>
                    <p>Quán cơm mang phong cách hoài cổ, tái hiện bữa cơm gia đình đậm chất Việt giữa lòng thành phố Quy
                        Nhơn, nổi bật với món ăn dân dã và không gian ấm cúng như trở về tuổi thơ.</p>
                    <a href="/kha-/Post_quán_ăn/Cơm Nhà 1989.php" class="read-more">Xem chi tiết</a>
                </div>
            </div>

            <!-- Địa điểm 3 -->
            <div class="card">
                <img src="./Picture/HaDong_0.webp" alt="Phở Hà Đông - Cơm Rang Dưa Bò">
                <div class="card-content">
                    <h3>Phở Hà Đông - Cơm Rang Dưa Bò</h3>
                    <p>Phở Hà Đông – Cơm Rang Dưa Bò là quán ăn được nhiều thực khách tại Quy Nhơn yêu thích với hương
                        vị đậm chất Bắc, món cơm rang dưa bò thơm ngon, phở bò chuẩn vị Hà Nội, phục vụ nhanh chóng,
                        không gian đơn giản, giá cả hợp lý, phù hợp dân văn phòng, sinh viên và khách du lịch.</p>
                    <a href="/kha-/Post_quán_ăn/Phở Hà Đông - Cơm Rang Dưa Bò.php" class="read-more">Xem chi tiết</a>
                </div>
            </div>

            <!-- Địa điểm 4 -->
            <div class="card">
                <img src="./Picture/HoaLu_0.webp" alt="BÚN CÁ HOA LƯ">
                <div class="card-content">
                    <h3>BÚN CÁ HOA LƯ - Bún chả cá thu ngon tại Quy Nhơn</h3>
                    <p>Bún Cá Hoa Lư là quán bún chả cá thu nổi tiếng tại Quy Nhơn với nước dùng thanh ngọt, chả cá thu
                        vàng giòn, không tanh, phục vụ sạch sẽ và giá cả hợp lý.</p>
                    <a href="/kha-/Post_quán_ăn/BÚN CÁ HOA LƯ - Bún chả cá thu ngon tại Quy Nhơn.php"
                        class="read-more">Xem chi tiết</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Sự kiện nổi bật -->
    <section class="section-wrapper events">
        <section class="section-guide">
            <h2 class="section-title">Sự kiện nổi bật</h2>
            <p class="section-description">
                Quy Nhơn không chỉ có biển đẹp mà còn là nơi diễn ra những lễ hội văn hóa độc đáo.
            </p>
        </section>

        <div class="card-container">
            <!-- Sự kiện 1 -->
            <div class="card">
                <img src="https://th.bing.com/th/id/OIP.vtSOi2evDoHjz9KfBnLpIAHaEL?rs=1&pid=ImgDetMain"
                    alt="Lễ hội Đống Đa – Tây Sơn">
                <div class="card-content">
                    <h3>Lễ hội Đống Đa – Tây Sơn</h3>
                    <p>Rước kiệu, múa trống trận Tây Sơn, biểu diễn võ cổ truyền Bình Định cực kỳ ấn tượng.</p>
                    <a href="Post_Fes/TaySon_Fes.php" class="read-more">Xem chi tiết</a>
                </div>
            </div>

            <!-- Sự kiện 2 -->
            <div class="card">
                <img src="https://tourquynhon.com.vn/wp-content/uploads/2021/08/le-hoi-cho-go-tuy-phuoc-quy-nhon-d.jpg"
                    alt="Lễ hội ca bài chòi">
                <div class="card-content">
                    <h3>Lễ hội ca bài chòi</h3>
                    <p>Người dân tham gia chơi bài chòi dưới các chòi tre, lắng nghe những làn điệu mộc mạc mang đậm bản
                        sắc miền Trung.</p>
                    <a href="Post_Fes/BaiChoi_Fes.php" class="read-more">Xem chi tiết</a>
                </div>
            </div>

            <!-- Sự kiện 3 -->
            <div class="card">
                <img src="https://th.bing.com/th/id/OIP.x_t_TiIWNwHT9Zp-hQBXhwHaE8?rs=1&pid=ImgDetMain"
                    alt="Lễ hội cầu ngư">
                <div class="card-content">
                    <h3>Lễ hội cầu ngư</h3>
                    <p> </p>
                    <a href="Post_Fes/CauNgu_Fes.php" class="read-more">Xem chi tiết</a>
                </div>
            </div>

            <!-- Sự kiện 4 -->
            <div class="card">
                <img src="https://phuongnam.vanhoavaphattrien.vn/uploads/images/blog/hoand/2022/09/12/a-2563456456-1662956153.jpg"
                    alt="Lễ hội Cá Ông">
                <div class="card-content">
                    <h3>Lễ hội Cá Ông</h3>
                    <p>Tế lễ truyền thống, rước thần trên biển, múa lân, múa bông, hát bội.</p>
                    <a href="Post_Fes/CaOng_Fes.php" class="read-more">Xem chi tiết</a>
                </div>
            </div>
        </div>
    </section>

    <script src="./Java Scripts/scripthome.js"></script>
    <?php include('Includes/footer.php'); ?>
</body>

</html>
<!-- Đặt đoạn script ở đây -->
<script>
document.querySelectorAll('.carousel-wrapper').forEach(wrapper => {
    const container = wrapper.querySelector('.carousel-container');
    wrapper.querySelector('.arrow.left').onclick = () => container.scrollBy({
        left: -300,
        behavior: 'smooth'
    });
    wrapper.querySelector('.arrow.right').onclick = () => container.scrollBy({
        left: 300,
        behavior: 'smooth'
    });
});
</script>
</body>

</html>