<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Form Đăng Ký</title>
  <link rel="stylesheet" type="text/css" href="../CSS/styleRG.css">
</head>
<body>

<div class="container">
  <div class="title">
    <span>Đăng ký tài khoản</span>
  </div>
  <br>
  <form action="../DATABASE/Registerdb.php" method="POST">
    <div class="text-warpper"><input type="text" name="user" placeholder="Tên đăng nhập" required></div>
    <div class="text-warpper"><input type="password" name="pass" placeholder="Mật khẩu" required></div>
    <div class="text-warpper"><input type="password" name="acpass" placeholder="Nhập lại mật khẩu" required></div>
    <div class="text-warpper"><input type="text" name="full_name" placeholder="Họ tên" required></div>
    <div class="text-warpper"><input type="date" name="birth_date" required></div>

    <div class="text-warpper">
      <select name="sex" required>
        <option value="">-- Giới tính --</option>
        <option value="1">Nam</option>
        <option value="0">Nữ</option>
      </select>
    </div>

    <div class="text-warpper"><input type="tel" name="phone" placeholder="Số điện thoại" required pattern="^\d{10,15}$" title="Số điện thoại phải có từ 10 đến 15 chữ số"></div>
    <div class="text-warpper"><input type="email" name="email" placeholder="Email" required></div>
    <div class="text-warpper"><input type="submit" value="Đăng ký"></div>
    <div class="register">Đã có tài khoản? ➤ <a href="Login.php">Đăng nhập</a></div>
  </form>
</div>

</body>
</html>
