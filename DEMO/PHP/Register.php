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
    <div><input type="text" name="user" placeholder="Tên đăng nhập" required></div>
    <div><input type="password" name="pass" placeholder="Mật khẩu" required></div>
    <div><input type="password" name="acpass" placeholder="Nhập lại mật khẩu" required></div>
    <div><input type="text" name="name" placeholder="Họ tên" required></div>
    <div><input type="datetime-local" name="date" required></div>
    
    <div><select name="sex" required>
      <option value="">-- Giới tính --</option>
      <option value="1">Nam</option>
      <option value="0">Nữ</option>
    </select></div>
    
    <div><input type="tel" name="sdt" placeholder="Số điện thoại" required></div>
    <div> <input type="email" name="email" placeholder="Email" required></div>
    <div><input type="submit" value="Đăng ký"></div>
    <div class="register">Đã có tài khoản đăng nhập tại đây! ➤ <a href="Login.php">Đăng nhập</a></div>
  </form>
</div>

</body>
</html>
