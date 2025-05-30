<?php include('../Includes/header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/styleHeader.css">
    <link rel="stylesheet" href="../CSS/styleFooter.css">
    <link rel="stylesheet" href="../CSS/addpost.css">
    <title>Thêm blog mới</title>
</head>
<body>
    <form  class="form-inp" action="../Database/submitBlog.php" method="post"  enctype="multipart/form-data">
        <div class="inp-warp title">
            <label for="">Tiêu đề:</label>
            <input class="inp inp-title" type="text" required name="title_txb">
        </div>
        <div class="inp-warp cat">
            <label for="">Chọn chuyên mục:</label>
            <select class="inp cat-selector" name="cat_selector" id="">
                
                <?php
                    require "../Database/db.php";
                    $sql = "select * from chuyen_muc";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<option value="'.$row['id'].'">'.$row['ten_chuyen_muc'].'</option>';
                    }
                    mysqli_free_result($result);
                    mysqli_close($conn);
                ?>
            </select>
        </div>
        <div class="inp-warp description">
            <label for="">Mô tả:</label>
            <textarea name="description_txb" class="textarea textarea-description" required></textarea>
        </div>
        <div class="inp-warp img-profile">
            <label for="">Ảnh bìa:</label>
            <input type="file" name="img-profile" class="upload upload-profile" required>
        </div>
        <div class="inp-warp img-profile-description">
            <label for="">Mô tả ảnh bìa:</label>
            <input class="inp img-profile-description" type="text" name="img-profile-des_txb">
        </div>

        <div class="add-content-blog-warpper">
            <table class="table-content-blog">
                <tr>
                    <th>Dòng</th>
                    <th>Loại</th>
                    <th>Nội dung</th>
                </tr>
                <!-- template -->
                <!-- <tr class="blog-content-row_i">
                    <td>i</td>
                    <td>
                        <select name="row-i-type-content-selector" id="">
                            <option value="" disabled selected>-- Vui lòng chọn --</option>
                            <option value="h1">Tiêu đề h1</option>
                            <option value="h2">Tiêu đề h2</option>
                            <option value="h3">Tiêu đề h3</option>
                            <option value="p">Đoạn văn</option>
                            <option value="or">Danh sách có thứ tự</option>
                            <option value="ul">Danh sách không có thứ tự</option>
                            <option value="quotes">Quotes</option>
                        </select>
                    </td>
                    <td class="td-content-row-i">
                        <input type="text" name="blog-content-row-i">
                    </td> -->
                </tr>
            </table>
            <button type="button" class="btn btn-add" onclick="addContentRow()">Thêm nội dung</button>
            <button type="button"  class="btn btn-delete" onclick="removeContentRow()">Xóa nội dung</button>
            <script>
                var i = 1;

                function addContentRow(){
                                    var template = ` <tr class="blog-content-row_${i}">
                    <td class="col1">${i}</td>
                    <td class="col2">
                        <select onchange="addContent(this,${i})" name="row-${i}-type-content-selector" id="">
                            <option value="" disabled selected>-- Vui lòng chọn --</option>
                            <option value="h1">Tiêu đề h1</option>
                            <option value="h2">Tiêu đề h2</option>
                            <option value="h3">Tiêu đề h3</option>
                            <option value="img">Hình ảnh</option>
                            <option value="img-des">Mô tả hình ảnh</option>
                            <option value="p">Đoạn văn</option>
                            <option value="ol">Danh sách có thứ tự</option>
                            <option value="ul">Danh sách không có thứ tự</option>
                            <option value="quotes">Quotes</option>
                        </select>
                    </td>
                    <td class="col3 td-content-row-${i}">
                        
                    </td>`;
                    document.querySelector('.table-content-blog').insertAdjacentHTML("beforeend", template);
                    i++;
                }
                function removeContentRow(){
                    document.querySelector(`.blog-content-row_${i-1}`).outerHTML = "";
                    i--;
                }
                function addContent(e , row){
                    // alert(e.value);
                    domContentRow = document.querySelector(`.td-content-row-${row}`);
                    if(e.value == 'h1' || e.value == 'h2' || e.value == 'h3'|| e.value == 'img-des')
                    {
                        domContentRow.innerHTML = `<input class="blog-content-input" type="text" name="blog-content-row-${row}">`;
                    }
                    else if(e.value == 'p' || e.value == 'quotes' || e.value == 'ol' || e.value== 'ul')
                    {
                        domContentRow.innerHTML = `<textarea class="textaera-blogcontent" name="blog-content-row-${row}"></textarea>`;
                    }
                    else if(e.value == 'img')
                    {
                        domContentRow.innerHTML = `<input type="file" lass="blog-content-upfile" name="blog-content-row-${row}">`;
                    }
                }
            </script>
        </div>
        <input type="submit" class="btn btn-submit" value="Nhập">
    </form>
</body>
</html>
<?php include('../Includes/footer.php'); ?>