<?php include('Includes/header.php'); ?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QNTour</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="./CSS/styleHeader.css">
    <link rel="stylesheet" href="./CSS/styleFooter.css">
    <link rel="stylesheet" href="./CSS/style.css">
</head>

<body>
    <?php
include 'Database/db_connect.php';
include 'PHP/renderPost.php';
if (isset($_GET['tim']) && $_GET['tim'] != '') {
    timKiemBaiViet($conn, $_GET['tim']);
} else {
    hienThiTatCaBaiViet($conn); 
}
?>
</body>

</html>
<?php include('Includes/footer.php'); ?>