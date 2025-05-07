<?php
<<<<<<< HEAD
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
=======
$host = "localhost";      
$username = "root";      
$password = "";          
$database = "travel_blog"; 

// Kết nối
$conn = mysqli_connect($host, $username, $password, $database);

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
} 
?>
>>>>>>> 1707fbada688bcd3a407c6a417cecff695faa6f6
