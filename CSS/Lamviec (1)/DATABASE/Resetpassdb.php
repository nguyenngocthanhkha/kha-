<?php
// Bật hiển thị lỗi PHP
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Kết nối CSDL
$host = 'localhost';
$dbname = 'web_ho_tro_du_lich'; // Tên cơ sở dữ liệu
$username = 'root';             // Tài khoản MySQL
$password = '';                 // Mật khẩu MySQL (nếu có)

try {
    // Khởi tạo kết nối PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kết nối thất bại: " . $e->getMessage());
}

// Kiểm tra nếu form được submit
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Kiểm tra các trường form
    if (isset($_POST['user'], $_POST['pass'], $_POST['accept_pass'])) {
        // Lấy dữ liệu từ form
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $accept_pass = $_POST['accept_pass'];

        // Kiểm tra quy tắc mật khẩu mới
        if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $pass)) {
            die("<h3 style='color:red'>Mật khẩu phải chứa ít nhất 8 ký tự, bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt.</h3>");
        }

        // Kiểm tra nếu mật khẩu mới khớp nhau
        if ($pass !== $accept_pass) {
            die("<h3 style='color:red'>Mật khẩu nhập lại không khớp. Vui lòng thử lại.</h3>");
        }

        // Mã hóa mật khẩu mới
        $hash = password_hash($pass, PASSWORD_DEFAULT);

        // Kiểm tra xem người dùng có tồn tại hay không
        $sql = "SELECT * FROM user WHERE user = :user";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':user' => $user]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // Cập nhật mật khẩu mới
            $update_sql = "UPDATE user SET pass = :pass WHERE user = :user";
            $update_stmt = $conn->prepare($update_sql);
            try {
                $update_stmt->execute([':pass' => $hash, ':user' => $user]);
                echo "<h3 style='color:green'>Đổi mật khẩu thành công!</h3>";
                echo "<a href='trang_chu.php' style='color:blue; text-decoration:none;'>Trở về Trang Chủ</a>";
                // Chuyển hướng về trang chủ
                header("Refresh: 5; url=index.php"); // sau 5 giây sẽ chuyển hướng về index.php
                exit; // Kết thúc script sau khi chuyển hướng
                
            } catch (PDOException $e) {
                echo "<h3 style='color:red'>Lỗi khi cập nhật mật khẩu: " . $e->getMessage() . "</h3>";
            }
        } else {
            echo "<h3 style='color:red'>Tên đăng nhập không tồn tại.</h3>";
        }
    } else {
        echo "<h3 style='color:red'>Vui lòng điền đầy đủ thông tin.</h3>";
    }
}
?>