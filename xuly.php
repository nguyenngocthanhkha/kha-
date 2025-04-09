<?php
// Bật hiển thị lỗi PHP
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Kết nối CSDL
$host = 'localhost';
$dbname = 'web_ho_tro_du_lich'; // Đảm bảo tên đúng
$username = 'root';        // Tên tài khoản MySQL
$password = '';            // Mật khẩu (nếu có)

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Kết nối thành công!<br>"; // Đảm bảo kết nối thành công
} catch(PDOException $e) {
    die("Kết nối thất bại: " . $e->getMessage());
}

// Kiểm tra nếu form được submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem các trường có tồn tại trong $_POST hay không
    if (isset($_POST['user'], $_POST['pass'], $_POST['acpass'], $_POST['name'], $_POST['date'], $_POST['sex'], $_POST['email'])) {
        // Nhận dữ liệu từ form
        $user   = $_POST['user'];
        $pass   = $_POST['pass'];
        $acpass = $_POST['acpass'];
        $name   = $_POST['name'];
        $date   = $_POST['date'];
        $sex    = $_POST['sex'];
        $email  = $_POST['email'];

        // Kiểm tra mật khẩu nhập lại
        if ($pass !== $acpass) {
            die("Mật khẩu không khớp, vui lòng thử lại.");
        }

        // Mã hóa mật khẩu
        $hash = password_hash($pass, PASSWORD_DEFAULT);

        // Chèn dữ liệu vào bảng
        $sql = "INSERT INTO user (user, pass, acpass, name, date, sex, email) 
                VALUES (:user, :pass, :acpass, :name, :date, :sex, :email)";

        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':user' => $user,
                ':pass' => $hash,
                ':acpass' => $hash,
                ':name' => $name,
                ':date' => $date,
                ':sex' => $sex,
                ':email' => $email
            ]);
            echo "<h3 style='color:green'>Đăng ký thành công!</h3>";
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    } else {
        echo "Vui lòng điền đầy đủ thông tin.";
    }
}
?>
