<?php
// Bắt đầu bộ đệm đầu ra để tránh lỗi header
ob_start();

// Bật hiển thị lỗi
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Kết nối CSDL
include('db.php');
mysqli_set_charset($conn, "utf8");

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

// Xử lý khi form gửi đi
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['user'], $_POST['pass'], $_POST['accept_pass'])) {
        $user = trim($_POST['user']);
        $pass = $_POST['pass'];
        $accept_pass = $_POST['accept_pass'];

        // Kiểm tra tên người dùng không rỗng
        if (empty($user)) {
            echo "<h3 style='color:red'>Vui lòng nhập tên đăng nhập.</h3>";
            header("Refresh: 3; url=Resetpassdb.php");
            exit;
        }

        // Kiểm tra định dạng mật khẩu
        if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $pass)) {
            echo "<h3 style='color:red'>Mật khẩu phải có ít nhất 8 ký tự, gồm chữ hoa, chữ thường, số và ký tự đặc biệt.</h3>";
            header("Refresh: 3; url=Resetpassdb.php");
            exit;
        }

        // Kiểm tra mật khẩu khớp nhau
        if ($pass !== $accept_pass) {
            echo "<h3 style='color:red'>Mật khẩu nhập lại không khớp.</h3>";
            header("Refresh: 3; url=Resetpassdb.php");
            exit;
        }

        // Mã hóa mật khẩu
        $hash = password_hash($pass, PASSWORD_DEFAULT);

        // Kiểm tra người dùng tồn tại
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        mysqli_stmt_bind_param($stmt, "s", $user);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);


        if (mysqli_num_rows($result) > 0) {
            // Người dùng tồn tại, cập nhật mật khẩu
            $update_stmt = mysqli_prepare($conn, "UPDATE users SET password = ? WHERE username = ?");
            mysqli_stmt_bind_param($update_stmt, "ss", $hash, $user);

            if (mysqli_stmt_execute($update_stmt)) {
                echo "<h3 style='color:green'>Đổi mật khẩu thành công!</h3>";
                echo "<a href='/kha-/home.php' style='color:blue; text-decoration:none;'>Trở về Trang Chủ</a>";
                header("Refresh: 3; url=/kha-/home.php");
                exit;
            } else {
                echo "<h3 style='color:red'>Lỗi khi cập nhật mật khẩu.</h3>";
                header("Refresh: 3; url=Resetpassdb.php");
                exit;
            }

            mysqli_stmt_close($update_stmt);
        } else {
            echo "<h3 style='color:red'>Tên đăng nhập không tồn tại.</h3>";
            header("Refresh: 3; url=Resetpassdb.php");
            exit;
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<h3 style='color:red'>Vui lòng điền đầy đủ thông tin.</h3>";
        header("Refresh: 3; url=Resetpassdb.php");
        exit;
    }
}

mysqli_close($conn);
ob_end_flush();
?>