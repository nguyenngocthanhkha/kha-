<?php
// Bật hiển thị lỗi PHP
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Kết nối CSDL
$host = 'localhost';
$dbname = 'web_ho_tro_du_lich'; // Tên cơ sở dữ liệu
$username = 'root';             // Tên tài khoản MySQL
$password = '';                 // Mật khẩu (nếu có)

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Kết nối thành công!<br>"; // Hiển thị thông báo kết nối thành công
} catch (PDOException $e) {
    die("Kết nối thất bại: " . $e->getMessage());
}

// Kiểm tra nếu form đăng nhập được submit
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Kiểm tra các trường form có tồn tại hay không
    if (isset($_POST['user'], $_POST['pass'])) {
        // Nhận dữ liệu từ form
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        // Tìm người dùng trong cơ sở dữ liệu
        $sql = "SELECT pass FROM user WHERE user = :user";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':user' => $user]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Kiểm tra mật khẩu
        if ($result && password_verify($pass, $result['pass'])) {
            echo "<h3 style='color:green'>Đăng nhập thành công!</h3>";
        } else {
            echo "<h3 style='color:red'>Tên đăng nhập hoặc mật khẩu không đúng.</h3>";
        }
    } else {
        echo "<h3 style='color:red'>Vui lòng điền đầy đủ thông tin.</h3>";
    }
}
?>