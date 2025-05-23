<?php include('./Includes/header.php'); ?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Liên hệ</title>
    <link rel="stylesheet" href="./CSS/styleHeader.css">
    <link rel="stylesheet" href="./CSS/styleFooter.css">
    <link rel="stylesheet" href="./CSS/stylelienhe.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
    <div class="contact-section">
        <div class="contact-info">
            <h2>Liên hệ</h2>

            <div class="info-block">
                <img src="https://img.icons8.com/ios-filled/50/ffffff/phone-office.png" alt="icon" />
                <strong>Thông Tin Liên Hệ</strong>
                Điện thoại: +84 123 456 789<br>
            </div>

            <div class="info-block">
                <img src="https://img.icons8.com/ios-filled/50/ffffff/email.png" alt="icon" />
                <strong>Liên Kết Nhanh</strong>
                Email: dulich.binhdinh@gmail.com<br>
                <br>
            </div>

            <div class="info-block">
                <img src="https://img.icons8.com/ios-filled/50/ffffff/marker.png" alt="icon" />
                <strong>Trường Đại Học Quy Nhơn</strong>
                170 An Dương Vương, TP. Quy Nhơn, Tỉnh Bình Định.<br>
                <a href="https://map.coccoc.com/map/53300242594451?borders=13.751161471896399,109.1981363296509,13.765646655832633,109.23109531402588" target="_blank" rel="noopener noreferrer">(Bản đồ)</a>
            </div>
        </div>

        <div class="contact-form">
            <h2>Gửi yêu cầu</h2>
            <form action="send_mail.php" method="POST">
                <div class="form-group">
                    <label>Họ và tên *</label>
                    <input type="text" name="name" required>
                </div>

                <div class="form-group">
                    <label>Email *</label>
                    <input type="email" name="email" required>
                </div>

                <div class="form-group">
                    <label>Nội dung *</label>
                    <textarea name="message" rows="5" required></textarea>
                </div>

                <button type="submit">Gửi</button>
            </form>
        </div>
    </div>
</body>

</html>
<?php include('./Includes/footer.php'); ?>