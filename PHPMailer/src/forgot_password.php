<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../vendor/autoload.php'; // <-- đường dẫn đúng tới vendor/autoload.php

// Kết nối database
$conn = new mysqli("localhost", "root", "", "ngon_lanh");
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Xử lý form gửi tới
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);

    // Kiểm tra email có trong hệ thống không
    $result = $conn->query("SELECT * FROM users WHERE email='$email'");
    if ($result->num_rows > 0) {
        // Tạo token reset
        $token = bin2hex(random_bytes(32));
        $expiry = date("Y-m-d H:i:s", strtotime('+1 hour'));

        // Lưu token vào database
        $conn->query("UPDATE users SET reset_token='$token', reset_token_expiry='$expiry' WHERE email='$email'");

        // Gửi email chứa link đặt lại mật khẩu
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'thanhkha23122005@gmail.com'; // <-- Thay bằng Gmail của bạn
            $mail->Password   = 'dezq xkow igwf rsus';   // <-- Thay bằng App Password
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            $mail->setFrom('thanhkha23122005@gmail.com', ' QNTour');
            $mail->addAddress($email);

            $link = "http://localhost/kha-/PHPMailer/reset_password.php?token=$token"; // Link reset
            $mail->isHTML(true);
            $mail->Subject = 'Yêu cầu đặt lại mật khẩu';
            $mail->Body    = "Chúng tôi nhận được yêu cầu đặt lại mật khẩu.<br>
                              Bấm vào đây để đặt lại: <a href='$link'>Đặt lại mật khẩu</a><br>
                              Link có hiệu lực trong 1 giờ.";

            $mail->send();
            echo "Đã gửi email xác nhận tới $email, vui lòng kiểm tra hộp thư.";
        } catch (Exception $e) {
            echo "Không thể gửi email. Lỗi: {$mail->ErrorInfo}";
        }

    } else {
        echo "Email không tồn tại trong hệ thống.";
    }
}
?>
