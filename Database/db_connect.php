<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travel_blog"; // Thay đổi theo tên cơ sở dữ liệu của bạn

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
