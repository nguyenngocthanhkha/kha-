<?php
// Bật hiển thị lỗi PHP
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Bao gồm file kết nối CSDL
include('db.php');
mysqli_set_charset($conn, "utf8");

// Kiểm tra nếu form được submit
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Kiểm tra các trường form có tồn tại
    if (isset($_POST['user'], $_POST['pass'], $_POST['acpass'], $_POST['full_name'], $_POST['birth_date'], $_POST['sex'], $_POST['phone'], $_POST['email'])) {
        // Nhận dữ liệu từ form
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $acpass = $_POST['acpass'];
        $name = $_POST['full_name'];
        $date = $_POST['birth_date'];
        $sex = $_POST['sex'];
        $sdt = $_POST['phone'];
        $email = $_POST['email'];

        // Kiểm tra xem tên người dùng đã tồn tại chưa
        $checkUserQuery = "SELECT COUNT(*) FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $checkUserQuery);
        mysqli_stmt_bind_param($stmt, 's', $user);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $userExists);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        if ($userExists > 0) {
            echo "<h3 style='color:red'>Tên đăng nhập đã tồn tại, vui lòng chọn tên khác.</h3>";
            header("Location: 3; url=../PHP/Register.php");
            exit;
        }

        // Kiểm tra quy tắc tên đăng nhập
        if (!preg_match('/^[a-zA-Z0-9_]{5,}$/', $user)) {
            echo "<h3 style='color:red'>Tên đăng nhập phải chứa ít nhất 5 ký tự và không chứa ký tự đặc biệt.</h3>";
            header("Location: 3; url=../PHP/Register.php");
            exit;
        }

        // Kiểm tra quy tắc mật khẩu
        if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $pass)) {
            echo "<h3 style='color:red'>Mật khẩu phải chứa ít nhất 8 ký tự, bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt.</h3>";
            header("Location: 3; url=../PHP/Register.php");
            exit;
        }

        // Kiểm tra số điện thoại
        if (!preg_match('/^[0-9]{10}$/', $sdt)) {
            echo "<h3 style='color:red'>Số điện thoại phải chứa đúng 10 chữ số.</h3>";
            header("Location: 3; url=../PHP/Register.php");
            exit;
        }

        // Kiểm tra nhập lại mật khẩu
        if ($pass !== $acpass) {
            echo "<h3 style='color:red'>Mật khẩu không khớp, vui lòng thử lại.</h3>";
            header("Location: 3; url=../PHP/Register.php");
            exit;
        }

        // Mã hóa mật khẩu
        $hash = password_hash($pass, PASSWORD_DEFAULT);

        // Thêm người dùng vào cơ sở dữ liệu
        $sql = "INSERT INTO users (username, password, full_name, birth_date, sex, phone, email) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'sssssss', $user, $hash, $name, $date, $sex, $sdt, $email);

        if (mysqli_stmt_execute($stmt)) {
            echo "<h3 style='color:green'>Đăng ký thành công!</h3>";
            echo "<a href='../PHP/Login.php' style='color:blue; text-decoration:none;'>Quay lại Đăng nhập</a>";
            header("Location: 3; url=../PHP/Login.php");
            exit;
        } else {
            echo "<h3 style='color:red'>Lỗi: Không thể đăng ký tài khoản.</h3>";
            header("Location: 3; url=../PHP/Register.php");
            exit;
        }
    } else {
        echo "<h3 style='color:red'>Vui lòng điền đầy đủ thông tin.</h3>";
        header("Location: 3; url=../PHP/Register.php");
        exit;
    }
}
?>
