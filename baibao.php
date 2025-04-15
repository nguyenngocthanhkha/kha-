<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./CSS/stylebaibao.css">
    <link rel="stylesheet" href="./CSS/styleFooter.css">
    <link rel="stylesheet" href="./CSS/styleHeader.css">
</head>
<body>
    <?php include('Includes/header.php'); ?>
    <article>
        <?php
            include_once('./Data/baibao/'.$_GET['id'].'.php');
        ?>
    </article>
    <?php include('Includes/footer.php'); ?>
</body>
</html>