<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Bao gồm đúng các file của PHPMailer
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

// Kết nối database
$host = "localhost";      
$username = "root";      
$password = "";          
$database = "travel_blog"; 

// Kết nối
$conn = mysqli_connect($host, $username, $password, $database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // Kiểm tra email có tồn tại
    $result = $conn->query("SELECT * FROM users WHERE email='$email'");
    if ($result->num_rows > 0) {
        // Tạo OTP 6 chữ số
        $otp = random_int(100000, 999999);

        // Thời gian hết hạn OTP, ví dụ 5 phút sau
        $expiry = date("Y-m-d H:i:s", strtotime('+5 minutes'));

        // Cập nhật OTP và thời gian hết hạn vào database
        $conn->query("UPDATE users SET reset_otp='$otp', reset_otp_expiry='$expiry' WHERE email='$email'");

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'hotrodulichquynhon@gmail.com'; 
            $mail->Password   = 'zojzoggsivxlrmeb'; // App Password
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            $mail->setFrom('hotrodulichquynhon@gmail.com', 'QNTour');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Mã OTP đặt lại mật khẩu';
            $mail->Body    = "Mã OTP của bạn là: <b>$otp</b><br>Mã có hiệu lực trong 5 phút.";

            $mail->send();
            echo "Đã gửi mã OTP đến email: $email";
            echo '<meta http-equiv="refresh" content="5;url=../PHP/enter_otp.php">';
        } catch (Exception $e) {
            echo "Không thể gửi email. Lỗi: {$mail->ErrorInfo}";
        }
    } else {
        echo "Email không tồn tại.";
    }
}
?>
