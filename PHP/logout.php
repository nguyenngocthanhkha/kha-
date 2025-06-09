<?php
session_start(); // Đảm bảo session được bắt đầu trước khi kiểm tra
if (session_status() === PHP_SESSION_ACTIVE) {
    session_destroy();
}

// Chuyển hướng sau khi session bị hủy
header("Location: /kha-/home.php");
exit(); // Dừng script sau khi chuyển hướng
?>
