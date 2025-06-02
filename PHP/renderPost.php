<?php
function hienThiBaiVietTrangQuanLy($conn, $chuyenMucId, $soBaiMoiTrang = 12){
        // Lấy trang hiện tại từ URL, mặc định là 1
    $trangHienTai = isset($_GET['trang']) ? (int)$_GET['trang'] : 1;
    if ($trangHienTai < 1) $trangHienTai = 1;

    // Tính offset bắt đầu
    $batDau = ($trangHienTai - 1) * $soBaiMoiTrang;
    if($chuyenMucId == 0)
    {
        $tongBaiQuery = mysqli_query($conn, "SELECT COUNT(*) AS tong FROM data");
    }
    else{
        $tongBaiQuery = mysqli_query($conn, "SELECT COUNT(*) AS tong FROM data WHERE chuyen_muc_id = $chuyenMucId");
    }
    // Truy vấn tổng số bài của chuyên mục đó
    //$tongBaiQuery = mysqli_query($conn, "SELECT COUNT(*) AS tong FROM data WHERE chuyen_muc_id = $chuyenMucId");
    if ($tongBaiQuery) {
        $tongBai = mysqli_fetch_assoc($tongBaiQuery)['tong'];
    } else {
        die('Lỗi truy vấn tổng số bài viết.');
    }

    $tongTrang = ceil($tongBai / $soBaiMoiTrang);

    // Truy vấn bài viết theo chuyên mục và trang
    if($chuyenMucId == 0)
    {
        $sql = "SELECT * FROM data LIMIT $batDau, $soBaiMoiTrang";
    }
    else{
        $sql = "SELECT * FROM data WHERE chuyen_muc_id = $chuyenMucId LIMIT $batDau, $soBaiMoiTrang";
    }

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
            ';
    if(!empty($row['link']))
    {
        echo '<a href="'. '.'. $row['link'] . '" class="read-more">Xem chi tiết</a>';
    }
    else{
        echo '<a href="../PHP/Post.php?id='.$row['id'].'" class="read-more">Xem chi tiết</a>';
    }
    echo'
        <a href="../Database/deletePost.php?id='.$row['id'].'" class="read-more">Xóa bài</a>    
        </figure>';
    }
    echo '</div>';
    echo '</section>';

    // Hiển thị phân trang 
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
}
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
            ';
    if(!empty($row['link']))
    {
        echo '<a href="' . $row['link'] . '" class="read-more">Xem chi tiết</a>';
    }
    else{
        echo '<a href="./PHP/Post.php?id='.$row['id'].'" class="read-more">Xem chi tiết</a>';
    }
    echo'
            
        </figure>';
    }
    echo '</div>';
    echo '</section>';

    // Hiển thị phân trang 
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
}

function hienThiTatCaBaiViet($conn, $soBaiMoiTrang = 12) {
    $trangHienTai = isset($_GET['trang']) ? (int)$_GET['trang'] : 1;
    if ($trangHienTai < 1) $trangHienTai = 1;

    $batDau = ($trangHienTai - 1) * $soBaiMoiTrang;

    // Lấy tổng số bài viết
    $tongBaiQuery = mysqli_query($conn, "SELECT COUNT(*) AS tong FROM data");
    if ($tongBaiQuery) {
        $tongBai = mysqli_fetch_assoc($tongBaiQuery)['tong'];
    } else {
        die('Lỗi truy vấn tổng số bài viết.');
    }

    $tongTrang = ceil($tongBai / $soBaiMoiTrang);

    // Truy vấn tất cả bài viết
    $sql = "SELECT * FROM data LIMIT $batDau, $soBaiMoiTrang";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die('Lỗi truy vấn dữ liệu.');
    }

    echo '<section>';
    echo '<h2>Tất cả bài viết</h2>';
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

    // Hiển thị phân trang
    if ($tongTrang >= 1) {
        echo '<div class="pagination">';
        for ($i = 1; $i <= $tongTrang; $i++) {
            $link = '?trang=' . $i;
            echo $i == $trangHienTai
                ? '<span class="current-page">' . $i . '</span>'
                : '<a href="' . $link . '">' . $i . '</a>';
        }
        echo '</div>';
    }
}
function timKiemBaiViet($conn, $tuKhoa, $soBaiMoiTrang = 12) {
    $trangHienTai = isset($_GET['trang']) ? (int)$_GET['trang'] : 1;
    if ($trangHienTai < 1) $trangHienTai = 1;

    $batDau = ($trangHienTai - 1) * $soBaiMoiTrang;

    // Escape từ khóa tìm kiếm để tránh lỗi SQL
    $tuKhoa = mysqli_real_escape_string($conn, $tuKhoa);

    // Truy vấn tổng số bài phù hợp
    $tongBaiQuery = mysqli_query($conn, 
        "SELECT COUNT(*) AS tong FROM data 
         WHERE tieude LIKE '%$tuKhoa%' OR mota LIKE '%$tuKhoa%'");
    if ($tongBaiQuery) {
        $tongBai = mysqli_fetch_assoc($tongBaiQuery)['tong'];
    } else {
        die('Lỗi truy vấn tổng số bài viết.');
    }

    $tongTrang = ceil($tongBai / $soBaiMoiTrang);

    // Truy vấn bài viết phù hợp theo từ khóa
    $sql = "SELECT * FROM data 
            WHERE tieude LIKE '%$tuKhoa%' OR mota LIKE '%$tuKhoa%' 
            LIMIT $batDau, $soBaiMoiTrang";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die('Lỗi truy vấn dữ liệu: ' . mysqli_error($conn));
    }

    // Hiển thị kết quả
    echo '<section>';
    echo '<h2>Kết quả tìm kiếm cho: <em>' . htmlspecialchars($tuKhoa) . '</em></h2>';
    if (mysqli_num_rows($result) == 0) {
        echo '<p>Không tìm thấy bài viết phù hợp.</p>';
    } else {
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
    }
    echo '</section>';

    // Hiển thị phân trang
    if ($tongTrang >= 1) {
        echo '<div class="pagination">';
        for ($i = 1; $i <= $tongTrang; $i++) {
            $link = '?tim=' . urlencode($tuKhoa) . '&trang=' . $i;
            echo $i == $trangHienTai
                ? '<span class="current-page">' . $i . '</span>'
                : '<a href="' . $link . '">' . $i . '</a>';
        }
        echo '</div>';
    }
}

?>
