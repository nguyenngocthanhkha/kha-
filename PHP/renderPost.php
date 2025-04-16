<?php
function hienThiBaiVietTheoChuyenMuc($conn, $chuyenMucId, $soBaiMoiTrang = 12) {
    // Lấy trang hiện tại từ URL, mặc định là 1
    $trangHienTai = isset($_GET['trang']) ? (int)$_GET['trang'] : 1;
    if ($trangHienTai < 1) $trangHienTai = 1;

    // Tính offset bắt đầu
    $batDau = ($trangHienTai - 1) * $soBaiMoiTrang;

    // Truy vấn tổng số bài của chuyên mục đó
    $tongBaiQuery = mysqli_query($conn, "SELECT COUNT(*) AS tong FROM data WHERE chuyen_muc_id = $chuyenMucId");
    if ($tongBaiQuery) {
        $tongBai = mysqli_fetch_assoc($tongBaiQuery)['tong'];
    } else {
        die('Lỗi truy vấn tổng số bài viết.');
    }

    $tongTrang = ceil($tongBai / $soBaiMoiTrang);

    // Truy vấn bài viết theo chuyên mục và trang
    $sql = "SELECT * FROM data WHERE chuyen_muc_id = $chuyenMucId LIMIT $batDau, $soBaiMoiTrang";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die('Lỗi truy vấn dữ liệu.');
    }

    // Hiển thị bài viết
    echo '<section>';
    echo '<div class="card-container">';
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
    echo '</div>';
    echo '</section>';

    // Hiển thị phân trang nếu có từ 2 trang trở lên
    if ($tongTrang > 1) {
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
}
?>
