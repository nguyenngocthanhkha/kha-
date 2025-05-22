<?php
// Bật hiển thị lỗi
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Gồm file kết nối CSDL dùng thủ tục
require_once 'db.php';

// Kiểm tra nếu form được submit
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['user'], $_POST['pass'])) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        // Dùng câu lệnh chuẩn hóa để tránh SQL injection
        $stmt = mysqli_prepare($conn, "SELECT password FROM users WHERE username = ?");
        mysqli_stmt_bind_param($stmt, "s", $user);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $hashed_pass);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        if ($hashed_pass && password_verify($pass, $hashed_pass)) {
            echo "<h1 style='color:green'>Đăng nhập thành công!</h1>";
            echo "<a href='../home.php'>Về trang chủ</a>";
            header("Refresh: 3; url=../home.php");
            exit;

            // Nhớ mật khẩu qua cookie
            if (!empty($_POST['remember'])) {
                setcookie('user', $user, time() + (86400 * 30), "/");
            } else {
                setcookie('user', '', time() - 3600, "/");
            }
        } else {
            echo "<h3 style='color:red'>Tên đăng nhập hoặc mật khẩu không đúng.</h3>";
            echo "<a href='../PHP/Login.php'>Về trang đăng nhập</a>";
            header("Refresh: 3; url=../PHP/Login.php");
            exit;
        }
    } else {
        echo "<h3 style='color:red'>Vui lòng điền đầy đủ thông tin.</h3>";
        echo "<a href='../PHP/Login.php'>Về trang đăng nhập</a>";
        header("Refresh: 3; url=../PHP/Login.php");
        exit;
    }
}
?>
