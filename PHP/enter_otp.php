<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác thực OTP</title>
    <link rel="stylesheet" type="text/css" href="../CSS/styleLG.css"> <!-- Tận dụng lại CSS đã có -->
</head>
<body>
    <div class="container">
        <div class="title">
            <span>Xác thực OTP</span>
        </div>
        <br>
        <form method="POST" action="verify_otp.php">
            <div class="input_wrapper">
                <input type="email" name="email" class="input_field" required>
                <label for="email" class="label">Email</label>
                <i class="fa"></i>
            </div>

            <div class="input_wrapper">
                <input type="text" name="otp" class="input_field" required pattern="\d{6}" title="Mã OTP gồm 6 chữ số">
                <label for="otp" class="label">Mã OTP</label>
                <i class="fa"></i>
            </div>

            <div class="button_wrapper">
                <button type="submit" class="login_button">Xác nhận OTP</button>
            </div>
        </form>
        <br>
    </div>

    <div class="footer">
        <p>&copy; Đảm bảo thông tin an toàn và bảo mật!</p>
    </div>
</body>
</html>
