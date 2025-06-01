<?php 

    // hàm lưu ảnh vào thư mục và trả về tên ảnh
    function saveImageBlog($imgFile, $idPost){
        $floderSave = $_SERVER['DOCUMENT_ROOT']."/kha-/PostData/Upload/" . $idPost . "/";
        if(!is_dir($floderSave)){
            mkdir($floderSave, 0755, true);
        }
        $isUploadSuccess = false;
        $fileName =  time().'_'.$imgFile['name'];
        $desPath = $floderSave.$fileName;
        if ((($imgFile['type'] == 'image/gif') || 
		($imgFile['type'] == 'image/jpeg')) && 
		($imgFile['size'] < 5120000)) {
            $isUploadSuccess = move_uploaded_file(	$imgFile['tmp_name'],
				$desPath);
        }
        if($isUploadSuccess)
            return $fileName;
        else
            return false;
    };
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        $i = 1;

        // upload thông tin cơ bản vào database
        require_once "./db.php";
        $sql = "Insert into data(tieude, mota, alt, chuyen_muc_id) values(?, ?, ? , ? )";
        try
        {
            $preSql = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($preSql, "ssss", $_POST['title_txb'], $_POST['description_txb'], $_POST['img-profile-des_txb'], $_POST['cat_selector']);
            if(mysqli_stmt_execute($preSql))
            {
                // lấy id vừa mới insert
                $lastID = $conn->insert_id;
                $fileImageMainName = saveImageBlog($_FILES['img-profile'], $lastID);
                // nếu fileImageMainName không false thì cập nhật tên ảnh vào database
                if ($fileImageMainName) {
                    $fileImageMainName = "/kha-/PostData/Upload/".$lastID."/".$fileImageMainName;
                    $sql = "UPDATE data 
                            SET hinhanh = '".$fileImageMainName."'
                            WHERE `id` = ".$lastID;
                    mysqli_query($conn,$sql);
                    mysqli_close($conn);
                }
            }
        }
        catch (Exception $e){
            echo "<h1>Có gì đó hổng ổn: Lỗi: ".$e." </h1>";
            exit;
        }

        $rawBlogData = array();
        while(isset($_POST['row-'.$i.'-type-content-selector'])){
            $type = $_POST['row-'.$i.'-type-content-selector'];
            
            if($type == "img"){

                if(isset($lastID)){
                    $value = saveImageBlog($_FILES['blog-content-row-'.$i.''], $lastID);
                }
            }
            else{
                $value = $_POST['blog-content-row-'.$i.''];
            }
            $rawBlogData[] = array("type" => $type, "content" => $value);
            $i++;
        }
        if(isset($lastID))
        {
            $json = json_encode($rawBlogData, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
            $file = fopen('../PostData/Post/'.$lastID.'.json', 'w');
            if ($file) {
                fwrite($file, $json);
                fclose($file);

            } else {
                echo "File không tồn tại";
                exit;
            }
        }
        // Chuyển mảng sang JSON


    }

?>
<h1>Thêm blog thành công</h1>
<a href="../Admin/listBlog.php">Về trang quản lý</a>