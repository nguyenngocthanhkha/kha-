<?php
$host = "localhost";       // hoặc 127.0.0.1
$username = "root";        // mặc định trên XAMPP
$password = "";            // rỗng nếu không đặt mật khẩu
$database = "";      //  bạn đổi lại đúng tên database bạn đã tạo nha

// Kết nối
$conn = new mysqli($host, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
} else {
    echo "Kết nối thành công!";
}
?>
