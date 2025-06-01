<?php   
    session_start();
    if($_SESSION['is_admin'] != 1){
        echo 'Không có quyền xóa';
        exit;
    }
    if($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        if(isset($_GET['id']))
        {
            require_once "./db.php";
            $sql = "DELETE FROM data WHERE id = '".$_GET['id']."'";
            if(mysqli_query($conn, $sql))
            {
                header("Location: ../Admin/listBlog.php");
            }
        }
    }
?>