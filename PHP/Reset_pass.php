<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" type="text/css" href="../CSS/styleLG.css">
</head>
<body>
    <div class="container">
        <div class="title">
            <span>Đổi mật khẩu</span>
        </div>
        <br>
        <form action="../Database/Resetpassdb.php" method="post">
            <div class="input_wrapper">
                <input type="text" name="user" class="input_field" required>
                <label for="user" class="label">Tên đăng nhập</label>
                <i class="fa"></i>
            </div>
            
            <div class="input_wrapper">
                <input type="password" name="pass" class="input_field" required>
                <label for="pass" class="label">Mật khẩu</label>
                <i class="fa"></i>
            </div>

            <div class="input_wrapper">
                <input type="password" name="accept_pass" class="input_field" required>
                <label for="pass" class="label">Nhập lại mật khẩu</label>
                <i class="fa"></i>
            </div>
            

            <div class="button_wrapper">
                <button type="submit" class="login_button">Xác nhận</button>
            </div>

            <br>

            <div class="register">
              Chưa có tài khoản đăng kí tại đây! ➤ <a href="register.php">Đăng ký</a>
            </div>

        </form>

        <br>

       
    </div>

    <div class="footer">
        <p>&copy; Đảm bảo thông tin an toàn và bảo mật!</p>
    </div>
</body>
</html>