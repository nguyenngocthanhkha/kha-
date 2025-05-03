<?php
// Bật hiển thị lỗi PHP
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Kết nối CSDL
$host = 'localhost';
$dbname = 'web_ho_tro_du_lich'; // Thay đổi tên cơ sở dữ liệu phù hợp
$username = 'root';             // Tài khoản MySQL
$password = '';                 // Mật khẩu MySQL (nếu có)

try {
    // Khởi tạo kết nối PDO
    $conn = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<h3 style='color:green'>Kết nối cơ sở dữ liệu thành công: </h3><br>";
} catch (PDOException $e) {
    die("<h3 style='color:red'>Kết nối cơ sở dữ liệu thất bại: </h3>" . $e->getMessage());
}

// Kiểm tra nếu form đăng nhập được submit
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Kiểm tra các trường form có tồn tại
    if (isset($_POST['user'], $_POST['pass'])) {
        // Lấy dữ liệu từ form
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        // Tìm người dùng trong cơ sở dữ liệu
        $sql = "SELECT pass FROM user WHERE user = :user";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':user' => $user]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Kiểm tra kết quả
        if ($result && password_verify($pass, $result['pass'])) {
            echo "<h1 style='color:green'>Đăng nhập thành công!</h1>";
            echo"<a href='#'>Về trang chủ</a>";
            // Chuyển hướng về trang chủ
            header("Refresh: 3; url=index.php"); // sau 3 giây sẽ chuyển hướng về index.php
            exit; // Kết thúc script sau khi chuyển hướng


            // Tùy chọn 'Nhớ mật khẩu' qua cookie
            if (!empty($_POST['remember'])) {
                setcookie('user', $user, time() + (86400 * 30), "/"); // Lưu cookie trong 30 ngày
            } else {
                setcookie('user', '', time() - 3600, "/"); // Xóa cookie
            }
        } else {
            echo "<h3 style='color:red'>Tên đăng nhập hoặc mật khẩu không đúng.</h3>";
            echo"<a href='../PHP/Login.php'>Về trang đăng nhập</a>";
            // Chuyển hướng về trang đăng nhập
            header("Refresh: 3; url=../PHP/Login.php"); // sau 3 giây sẽ chuyển hướng về Login.php
            exit; // Kết thúc script sau khi chuyển hướng
        }
    } else {
        echo "<h3 style='color:red'>Vui lòng điền đầy đủ thông tin.</h3>";
        echo"<a href='../PHP/Login.php'>Về trang đăng nhập</a>";
        // Chuyển hướng về trang đăng nhập
        header("Refresh: 3; url=../PHP/Login.php"); // sau 3 giây sẽ chuyển hướng về Login.php
        exit; // Kết thúc script sau khi chuyển hướng
    }
}
?>