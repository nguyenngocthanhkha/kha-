<?php
// Kết nối database
$conn = new mysqli("localhost", "root", "", "kha");
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy token từ URL
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Kiểm tra token có tồn tại và còn hạn
    $stmt = $conn->prepare("SELECT * FROM users WHERE reset_token = ? AND reset_token_expiry > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        echo "Link không hợp lệ hoặc đã hết hạn.";
        exit;
    }

    // Nếu nhấn gửi mật khẩu mới
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $new_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Cập nhật mật khẩu và xóa token
        $update = $conn->prepare("UPDATE users SET password=?, reset_token=NULL, reset_token_expiry=NULL WHERE reset_token=?");
        $update->bind_param("ss", $new_password, $token);
        $update->execute();

        echo "Đổi mật khẩu thành công!";
        exit;
    }
} else {
    echo "Không tìm thấy token.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đặt lại mật khẩu</title>
</head>
<body>
    <h2>Đặt lại mật khẩu</h2>
    <form method="POST" action="">
        <input type="password" name="password" required placeholder="Nhập mật khẩu mới">
        <button type="submit">Cập nhật mật khẩu</button>
    </form>
</body>
</html>
