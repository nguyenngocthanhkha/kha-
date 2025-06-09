<?php
// Kết nối database
$host = "localhost";      
$username = "root";      
$password = "";          
$database = "travel_blog"; 

$conn = mysqli_connect($host, $username, $password, $database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $otp = $_POST['otp'];

    // Lấy thông tin user theo email
    $stmt = $conn->prepare("SELECT reset_otp, reset_otp_expiry FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($reset_otp, $reset_otp_expiry);
    $stmt->fetch();
    $stmt->close();

    if (!$reset_otp) {
        echo "Email chưa được gửi mã OTP hoặc mã OTP không tồn tại.";
        exit;
    }

    // Kiểm tra mã OTP và thời gian hết hạn
    $current_time = date("Y-m-d H:i:s");
    if ($otp === $reset_otp && $current_time <= $reset_otp_expiry) {
        echo "OTP hợp lệ. Bạn có thể đổi mật khẩu mới.";

        // Ở đây bạn có thể tạo form đổi mật khẩu hoặc chuyển hướng người dùng sang trang đổi mật khẩu
        // Ví dụ:
        echo '<br><a href="Reset_pass.php?email='.urlencode($email).'">Đổi mật khẩu mới</a>';

    } else {
        echo "Mã OTP không hợp lệ hoặc đã hết hạn.";
    }
} else {
    echo "Phương thức không hợp lệ.";
}
?>
