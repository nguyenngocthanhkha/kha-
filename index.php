<?php
// index.php

// Kiểm tra nếu form đã được gửi
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    echo "<script>alert('Cảm ơn bạn đã đăng ký nhận tin tức với email: $email');</script>";
    // Bạn có thể xử lý gửi email hoặc lưu dữ liệu vào cơ sở dữ liệu ở đây
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khám Phá Thế Giới Theo Cách Của Bạn</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js" defer></script>
</head>
<body>
    <header>
        <h1>Khám Phá Thế Giới Theo Cách Của Bạn!</h1>
    </header>

    <section class="featured-articles">
        <h2>Bài Viết Nổi Bật</h2>
        <ul>
            <li>10 Điểm Đến Mơ Ước Cho Mùa Hè Này</li>
            <li>Hướng Dẫn Sống Sót Khi Du Lịch Một Mình</li>
        </ul>
    </section>

    <section class="search-bar">
        <input type="text" placeholder="Tìm kiếm địa điểm, kinh nghiệm và nhiều hơn nữa...">
        <button>Tìm Kiếm</button>
    </section>

    <section class="categories">
        <h2>Danh Mục Bài Viết</h2>
        <ul>
            <li>Du Lịch Trong Nước: Khám Phá Vẻ Đẹp Quê Hương.</li>
            <li>Du Lịch Nước Ngoài: Hành Trình Vượt Biên Giới.</li>
            <li>Kinh Nghiệm Du Lịch: Mẹo Để Chuyến Đi Hoàn Hảo.</li>
            <li>Tin Tức Du Lịch: Cập Nhật Sự Kiện Và Thông Tin Mới.</li>
        </ul>
    </section>

    <section class="articles-grid">
        <h2>Bài Viết</h2>
        <div class="article">
            <img src="image1.jpg" alt="Hình ảnh bài viết 1">
            <h3>Tựa đề bài viết 1</h3>
            <p>Tóm tắt ngắn gọn về bài viết 1.</p>
        </div>
        <div class="article">
            <img src="image2.jpg" alt="Hình ảnh bài viết 2">
            <h3>Tựa đề bài viết 2</h3>
            <p>Tóm tắt ngắn gọn về bài viết 2.</p>
        </div>
        <!-- Thêm nhiều bài viết ở đây -->
    </section>

    <section class="binh-dinh">
        <h2>Nội Dung Tập Trung Vào Tỉnh Bình Định</h2>
        <ul>
            <li>Vẻ Đẹp Thiên Nhiên: Khám phá những bãi biển tuyệt đẹp như Ky Co, Hoàng Hậu.</li>
            <li>Di Sản Văn Hóa: Tham quan tháp Chăm và các di tích lịch sử.</li>
            <li>Ẩm Thực Đặc Sắc: Thưởng thức món bánh xèo, bún chả cá, và nhiều món ngon khác.</li>
            <li>Hoạt Động Thú Vị: Lặn biển, trekking, và khám phá các làng nghề truyền thống.</li>
        </ul>
    </section>

    <!-- Include footer -->
    <?php include('footer.html'); ?>
</body>
</html>
