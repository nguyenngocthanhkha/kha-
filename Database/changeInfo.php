<?php
    $avatarName = "111";
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $isUploadSuccess = false;
        $fileName =  time().'_'.$_FILES['avatar']['name'];
        $desPath = $_SERVER['DOCUMENT_ROOT']."/kha-/UserAvatar/".$fileName;
        if ((($_FILES['avatar']['type'] == 'image/gif') || 
		($_FILES['avatar']['type'] == 'image/jpeg')) && 
		($_FILES['avatar']['size'] < 5120000)) {
            $isUploadSuccess = move_uploaded_file(	$_FILES['avatar']['tmp_name'],
				$desPath);

        }

        require $_SERVER['DOCUMENT_ROOT']. "/kha-/Database/db_connect.php";
        $sql = "UPDATE `users` SET`full_name`='".$_POST['full_name']."',
        `birth_date`='".$_POST['birth_date']."'
        ,`sex`='".$_POST['sex']."',
        `phone`='".$_POST['phone']."',
        `avatar`='".$fileName."'";
        
        if(mysqli_query($conn, $sql))
        {
            echo "<script> alert('Cập nhật thành công'); 
                window.location='/kha-/home.php';
            </script>";
        }
        else{
                       echo "<script> alert('Cập nhật thất bại'); 
                window.location='/kha-/home.php';
            </script>";
        }
      

    }
?>