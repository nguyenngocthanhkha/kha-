<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer
require '../kha-/PHPMailer-master/src/PHPMailer.php';
require '../kha-/PHPMailer-master/src/Exception.php';
require '../kha-/PHPMailer-master/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nhận dữ liệu và làm sạch
    $name = htmlspecialchars($_POST["name"]);
    $from_email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $message = nl2br(htmlspecialchars($_POST["message"]));

    $mail = new PHPMailer(true);

    try {
        // Cấu hình server Gmail SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'hotrodulichquynhon@gmail.com'; // Gmail của bạn
        $mail->Password   = 'alrgrwongjcwlrgk'; // Mật khẩu ứng dụng
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Thiết lập người gửi và người nhận
        $mail->setFrom($from_email, $name);
        $mail->addAddress('hotrodulichquynhon@gmail.com'); // Người nhận cố định

        // Nội dung email
        $mail->isHTML(true);
        $mail->Subject = 'Yêu cầu liên hệ mới từ website';
        $mail->Body    = "
            <strong>Họ và tên:</strong> {$name}<br>
            <strong>Email:</strong> {$from_email}<br><br>
            <strong>Nội dung:</strong><br>{$message}
        ";

        // Gửi mail
        $mail->send();

        // Phản hồi thành công
        echo "<script>
                alert('Gửi thành công! Cảm ơn bạn đã liên hệ.');
                window.location.href = 'nut_lienhe.php';
              </script>";
    } catch (Exception $e) {
        // Phản hồi thất bại
        echo "<script>
                alert('Gửi thất bại. Lỗi: " . $mail->ErrorInfo . "');
                window.history.back();
              </script>";
    }
}
?>
