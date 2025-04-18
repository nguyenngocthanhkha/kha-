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
include 'Database/db_connect.php';
include 'PHP/renderPost.php';
$chuyenMucId = 1;
hienThiBaiVietTheoChuyenMuc($conn, $chuyenMucId);
?>
</body>

</html>
<?php include('Includes/footer.php'); ?>