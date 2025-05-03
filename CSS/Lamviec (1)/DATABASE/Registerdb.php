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
    die("<h3 style='color:red'>Kết nối cơ sở dữ liệu thất bại: </h3> " . $e->getMessage());
}

// Kiểm tra nếu form được submit
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Kiểm tra các trường form có tồn tại
    if (isset($_POST['user'], $_POST['pass'], $_POST['acpass'], $_POST['name'], $_POST['date'], $_POST['sex'], $_POST['sdt'], $_POST['email'])) {
        // Nhận dữ liệu từ form
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $acpass = $_POST['acpass'];
        $name = $_POST['name'];
        $date = $_POST['date'];
        $sex = $_POST['sex'];
        $sdt = $_POST['sdt'];
        $email = $_POST['email'];

        // Kiểm tra xem tên người dùng đã tồn tại chưa
        $checkUserQuery = "SELECT COUNT(*) FROM user WHERE user = :user";
        $stmt = $conn->prepare($checkUserQuery);
        $stmt->execute([':user' => $user]);
        $userExists = $stmt->fetchColumn();
        if ($userExists > 0) {
            echo"<h3 style='color:red'>Tên đăng nhập đã tồn tại, vui lòng chọn tên khác.</h3>";
            header("Refresh: 3; url=../PHP/Register.php"); // sau 3 giây sẽ chuyển hướng về register.php
            exit; // Kết thúc script sau khi chuyển hướng
        }

        // kiểm tra quy tắc tên đăng nhập
        if (!preg_match('/^[a-zA-Z0-9_]{5,}$/', $user)) {
          echo "<h3 style='color:red'>Tên đăng nhập phải chứa ít nhất 5 ký tự và không chứa ký tự đặc biệt.</h3>";
          header("Refresh: 3; url=../PHP/Register.php"); // sau 3 giây sẽ chuyển hướng về register.php
          exit; // Kết thúc script sau khi chuyển hướng
        }

        // Kiểm tra quy tắc mật khẩu
        if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $pass)) {
            echo"<h3 style='color:red'>Mật khẩu phải chứa ít nhất 8 ký tự, bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt.</h3>";
            header("Refresh: 3; url=../PHP/Register.php"); // sau 3 giây sẽ chuyển hướng về register.php
            exit; // Kết thúc script sau khi chuyển hướng
        }

        // Kiểm tra quy tắc số điện thoại
        if (!preg_match('/^[0-9]{10}$/', $sdt)) {
            echo "<h3 style='color:red'>Số điện thoại phải chứa đúng 10 chữ số và chỉ bao gồm chữ số.</h3>";
            header("Refresh: 3; url=../PHP/Register.php"); // sau 3 giây sẽ chuyển hướng về register.php
            exit; // Kết thúc script sau khi chuyển hướng
        }   

        // Kiểm tra mật khẩu nhập lại
        if ($pass !== $acpass) {
            echo"<h3 style='color:red'>Mật khẩu không khớp, vui lòng thử lại.</h3>";
            header("Refresh: 3; url=../PHP/Register.php"); // sau 3 giây sẽ chuyển hướng về register.php
            exit; // Kết thúc script sau khi chuyển hướng
        }

        // Mã hóa mật khẩu
        $hash = password_hash($pass, PASSWORD_DEFAULT);

        // Thêm thông tin vào cơ sở dữ liệu
        $sql = "INSERT INTO user (user, pass, name, date, sex, sdt, email) 
                VALUES (:user, :pass, :name, :date, :sex, :sdt, :email)";
        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':user' => $user,
                ':pass' => $hash,
                ':name' => $name,
                ':date' => $date,
                ':sex' => $sex,
                ':sdt' => $sdt,
                ':email' => $email
            ]);
            echo "<h3 style='color:green'>Đăng ký thành công!</h3>";
            echo "<a href='index.php' style='color:blue; text-decoration:none;'>Quay lại Trang Chủ</a>";

            // Chuyển hướng về trang chủ
            header("Refresh: 3; url=index.php"); // sau 3 giây sẽ chuyển hướng về index.php
            exit; // Kết thúc script sau khi chuyển hướng

        } catch (PDOException $e) {
            echo "<h3 style='color:red'>Lỗi: " . $e->getMessage() . "</h3>";
            header("Refresh: 3; url=../PHP/Register.php"); // sau 3 giây sẽ chuyển hướng về register.php
            exit; // Kết thúc script sau khi chuyển hướng
        }

    } else {
        echo "<h3 style='color:red'>Vui lòng điền đầy đủ thông tin.</h3>";
        header("Refresh: 3; url=../PHP/Register.php"); // sau 3 giây sẽ chuyển hướng về register.php
        exit; // Kết thúc script sau khi chuyển hướng
    }
}
?>