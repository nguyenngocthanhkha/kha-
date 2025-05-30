<?php ;  
require_once('./Database/db.php');
    if(!isset($_GET['id']))
    {
        echo "Yêu cầu không hợp lệ";
        exit;
    }
    
    $result1 = mysqli_query($conn, "select * from data where id = ".$_GET['id']." ");
    if(mysqli_num_rows($result1) == 0)
    {
        echo "Không tìm thấy bài";
        exit;
    }
    $data = mysqli_fetch_array($result1, MYSQLI_ASSOC);

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['tieude'] ?></title>
    <link rel="stylesheet" href="./CSS/stylePost.css">
    <link rel="stylesheet" href="./CSS/styleHeader.css">
    <link rel="stylesheet" href="./CSS/styleFooter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<?php
include('./Includes/header.php')
?>
<!DOCTYPE html>
<html lang="vi">


<body>
    <article class="style3">
            <?php
        $rawData = json_decode(file_get_contents('./PostData/Post/'.$_GET['id'].'.json'), true); 
        $isOpenSesion = false;
        foreach ($rawData as $chunk) {
            
            switch ($chunk['type']) {

                case 'h1':
                    if($isOpenSesion)
                    {
                        echo '</section><section><h1>' . $chunk['content'] . '</h1>';
                        $isOpenSesion = false;
                    }
                    else{
                        echo '<section><h1>' . $chunk['content'] . '</h1>';
                        $isOpenSesion = true;
                    }
                    break;
                case 'h2':
                    if($isOpenSesion)
                    {
                        echo '</section><section><h2>' . $chunk['content'] . '</h2>';
                        $isOpenSesion = false;
                    }
                    else{
                        echo '<section><h2>' . $chunk['content'] . '</h2>';
                        $isOpenSesion = true;
                    }
                    break;
                case 'h3':
                    if($isOpenSesion)
                    {
                        echo '</section><section><h3>' . $chunk['content'] . '</h3>';
                        $isOpenSesion = false;
                    }
                    else{
                        echo '<section><h3>' . $chunk['content'] . '</h3>';
                        $isOpenSesion = true;
                    }
                    break;
                case 'img':
                    echo '<img src="/kha-/PostData/Upload/'.$_GET['id'].'/' . $chunk['content'] . '" alt="">';
                    break;
                case 'img-des':
                    echo '<figcaption style="text-align: center;">' . $chunk['content'] . '</figcaption>';
                    break;
                case 'p':
                    echo '<p>' . $chunk['content'] . '</p>';
                    break;
                case 'ol':
                    echo '<ol>';
                    $items = explode("\n", $chunk['content']);
                    foreach ($items as $item) {
                        echo '<li>' . trim($item) . '</li>';
                    }
                    echo '</ol>';
                    break;
                case 'ul':
                    echo '<ul>';
                    $items = explode("\n", $chunk['content']);
                    foreach ($items as $item) {
                        echo '<li>' . trim($item) . '</li>';
                    }
                    echo '</ul>';
                    break;
                default:
                    echo '<!-- Unknown type: ' . htmlspecialchars($chunk['type']) . ' -->';
                    break;
            }

        }
         if($isOpenSesion)
        {
                echo "</section>";
        }

    ?>
    </article>

</body>