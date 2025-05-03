<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

// Kết nối database
$conn = new mysqli("localhost", "root", "", "kha");
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // Kiểm tra email có tồn tại
    $result = $conn->query("SELECT * FROM users WHERE email='$email'");
    if ($result->num_rows > 0) {
        $token = bin2hex(random_bytes(32));
        $expiry = date("Y-m-d H:i:s", strtotime('+1 hour'));

        // Cập nhật token vào database
        $conn->query("UPDATE users SET reset_token='$token', reset_token_expiry='$expiry' WHERE email='$email'");

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'thanhkha23122005@gmail.com'; 
            $mail->Password   = 'ynpf mzzd rctl qmlb'; // App Password
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            $mail->setFrom('thanhkha23122005@gmail.com', 'QNTour');
            $mail->addAddress($email);

            // Cần sửa lại link đúng như file reset_password.php của bạn
            $link = "http://localhost/kha-/PHPMailer/reset_password.php?token=$token";

            $mail->isHTML(true);
            $mail->Subject = 'Yêu cầu đặt lại mật khẩu';
            $mail->Body    = "Nhấn vào link sau để đặt lại mật khẩu:<br><a href='$link'>Đặt lại mật khẩu</a><br>Link có hiệu lực trong 1 giờ.";

            $mail->send();
            echo "Đã gửi link đặt lại mật khẩu đến email: $email";
        } catch (Exception $e) {
            echo "Không thể gửi email. Lỗi: {$mail->ErrorInfo}";
        }
    } else {
        echo "Email không tồn tại.";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quên Mật Khẩu</title>
</head>
<body>
    <h2>Quên mật khẩu</h2>
    <form method="POST" action="">
        <input type="email" name="email" required placeholder="Nhập email của bạn">
        <button type="submit">Gửi link đặt lại</button>
    </form>
</body>
</html>
