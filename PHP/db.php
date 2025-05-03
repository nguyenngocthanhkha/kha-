<?php

// Cấu hình thông tin kết nối cơ sở dữ liệu
$host = "localhost";     //  (localhost khi chạy trên máy cục bộ)
$dbname = "kha";    // Tên cơ sở dữ liệu bạn muốn kết nối
$username = "root";      // Tên người dùng MySQL
$password = "";          // Mật khẩu MySQL (rỗng đối với người dùng 'root' mặc định)
// Tạo kết nối đến MySQL
$mysqli = new mysqli($host, $username, $password, $dbname);

// Kiểm tra kết nối
if ($mysqli->connect_error) {
    // In thông báo lỗi nếu kết nối không thành công
    die("Kết nối thất bại: " . $mysqli->connect_error);
}

// Kiểm tra cơ sở dữ liệu có tồn tại không
if (!$mysqli->select_db($dbname)) {
    // In lỗi nếu không thể chọn cơ sở dữ liệu
    die("Không thể chọn cơ sở dữ liệu: " . $mysqli->error);
}

// Kiểm tra phiên bản của MySQL để xác minh kết nối thành công
$result = $mysqli->query("SELECT VERSION()");
if ($result) {
    $version = $result->fetch_row();
    echo "Kết nối thành công, MySQL phiên bản: " . $version[0];
} else {
    die("Không thể lấy phiên bản MySQL: " . $mysqli->error);
}

// Trả về đối tượng kết nối MySQL để sử dụng trong các file khác
return $mysqli;

?>