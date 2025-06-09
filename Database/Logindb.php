<?php
// Bật hiển thị lỗi
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Gồm file kết nối CSDL
require_once 'db.php';

// Kiểm tra nếu form được submit
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['user'], $_POST['pass'])) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        // Dùng câu lệnh chuẩn hóa để tránh SQL injection
        $stmt = mysqli_prepare($conn, "SELECT password, is_admin FROM users WHERE username = ?");
        if (!$stmt) {
            die("Lỗi truy vấn: " . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "s", $user);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $hashed_pass, $is_admin);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        // Kiểm tra mật khẩu
        if ($hashed_pass && password_verify($pass, $hashed_pass)) {
            session_start();
            $_SESSION['UserName'] = $user;
            $_SESSION['is_admin'] = $is_admin;
            echo "<h1 style='color:green'>Đăng nhập thành công!</h1>";
            // Nhớ mật khẩu qua cookie
            if (!empty($_POST['remember'])) {
                setcookie('user', $user, time() + (86400 * 30), "/", "", true, true);
            } else {
                setcookie('user', '', time() - 3600, "/");
            }
            // Kiểm tra quyền admin
            if ($is_admin == 1) {
                // echo "<h2 style='color:blue'>Chào mừng Admin!</h2>";
                header("Location: ../Admin/index.php");
                exit;
            } else 
            {
                //echo "<h2 style='color:gray'>Chào mừng người dùng!</h2>";
                header("Location: ../home.php");
                exit;
            }
            // exit;
            

        } else {
            echo "<h3 style='color:red'>Tên đăng nhập hoặc mật khẩu không đúng.</h3>";
            header("Refresh:url=../PHP/Login.php");
            exit;
        }
    } else {
        echo "<h3 style='color:red'>Vui lòng điền đầy đủ thông tin.</h3>";
        header("Refresh:url=../PHP/Login.php");
        exit;
    }
}
?>