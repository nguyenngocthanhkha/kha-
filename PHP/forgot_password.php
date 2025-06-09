<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu</title>
    <link rel="stylesheet" type="text/css" href="../CSS/styleFG.css">
</head>
<body>
    <div class="container">
        <div class="title">
            <span>Quên mật khẩu</span>
        </div>
        
        <form action="../PHPMailer-master/Forgotpassdb.php" method="post">
            <div class="input_wrapper">
                <input type="email" name="email" class="input_field" required>
                <label for="user" class="label">Email</label>
                <i class="fa"></i>
            </div>
            <div class="button_wrapper">
                <button type="submit" class="login_button">Gửi mail</button>
            </div>

            <br>
            <br>
                <div class="link">
                   <div>Đăng nhập tại đây! ➤ <a href="Login.php">Đăng nhập</a></div> 
                    <br>
                    <div>Chưa có tài khoản đăng kí tại đây! ➤ <a href="register.php">Đăng ký</a></div>
                </div>
        </form>
        <br>
    </div>

    <div class="footer">
        <p>&copy; Đảm bảo thông tin an toàn và bảo mật!</p>
    </div>

    
</body>
</html>