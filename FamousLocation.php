<?php include('Includes/header.php'); ?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QNTour</title>
    <link rel="stylesheet" href="./CSS/styleHeader.css">
    <link rel="stylesheet" href="./CSS/styleFooter.css">
    <link rel="stylesheet" href="./CSS/style.css">
</head>
<body>
<?php
// Kết nối CSDL
include 'Database/db_connect.php';

// Thiết lập số bài mỗi trang
$soBaiMoiTrang = 12;

// Lấy trang hiện tại từ URL, mặc định là 1
$trangHienTai = isset($_GET['trang']) ? (int)$_GET['trang'] : 1;
if ($trangHienTai < 1) $trangHienTai = 1;

// Tính offset bắt đầu
$batDau = ($trangHienTai - 1) * $soBaiMoiTrang;

// Truy vấn tổng số bài
$tongBaiQuery = mysqli_query($conn, "SELECT COUNT(*) AS tong FROM data");
if ($tongBaiQuery) {
    $tongBai = mysqli_fetch_assoc($tongBaiQuery)['tong'];
} else {
    die('Lỗi truy vấn tổng số bài viết.');
}

$tongTrang = ceil($tongBai / $soBaiMoiTrang);

// Truy vấn bài viết theo trang
$sql = "SELECT * FROM data LIMIT $batDau, $soBaiMoiTrang";
$result = mysqli_query($conn, $sql);

// Kiểm tra kết quả truy vấn
if (!$result) {
    die('Lỗi truy vấn dữ liệu.');
}

// Mở section và container 1 lần duy nhất
echo '<section>';
echo '<div class="card-container">';

// Hiển thị bài viết
while ($row = mysqli_fetch_assoc($result)) {
    echo '<figure class="card">
        <img src="' . $row['hinhanh'] . '" alt="' . $row['alt'] . '" style="width:100%">
        <figcaption>
            <h3>' . $row['tieude'] . '</h3>
            <p>' . $row['mota'] . '</p>
        </figcaption>
        <a href="' . $row['link'] . '" class="read-more">Xem chi tiết</a>
    </figure>';
}

// Đóng thẻ
echo '</div>';
echo '</section>';

// Hiển thị phân trang nếu có nhiều hơn 1 trang
if ($tongTrang >= 1) {
    echo '<div class="pagination">';
    for ($i = 1; $i <= $tongTrang; $i++) {
        if ($i == $trangHienTai) {
            echo '<span class="current-page">' . $i . '</span>';
        } else {
            echo '<a href="?trang=' . $i . '">' . $i . '</a>';
        }
    }
    echo '</div>';
}

// Đóng kết nối
mysqli_close($conn);
?>
</body>
</html>
<?php include('Includes/footer.php'); ?>
