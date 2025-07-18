<?php session_start(); require_once $_SERVER['DOCUMENT_ROOT']."/kha-/Database/db_connect.php" ?>
  <div class="header">
    <!-- Logo -->
    <div class="logo">
      <a href="/kha-/home.php" class="logo-link">
        <img src="https://icon-library.com/images/icon-for-travel/icon-for-travel-13.jpg" alt="Logo" />
        <div class="logo-text">QNTour</div>
      </a>
    </div>
    <!-- Rảnh css lại nha -->
    <!-- Menu -->
    <nav class="menu">

      <a href="/kha-/Admin/index.php" class="menu-item">Trang chủ Admin</a>
      <a href="/kha-/Admin/listBlog.php" class="menu-item">Danh sách bài viết</a>
      <a href="/kha-/Admin/addBlog.php" class="menu-item">Thêm bài viết</a>
      

    <!-- Đăng ký / Đăng nhập -->
    <div class="auth" >    
      <a href="/kha-/PHP/Register.php" class="signup-link">Sign up</a>
      <a href="/kha-/PHP/Login.php" class="login-btn">Log in</a>
    </div>
    <!-- Thông in user chỉ hiện khi login -->

    <div class="user-loginned hidden">
      <div class="user-loginned-warpper">
        <div class="img-warpper">
            <?php
                if(isset($_SESSION['UserName']))
                {
                  require $_SERVER['DOCUMENT_ROOT']. "/kha-/Database/db_connect.php";
                  $sql = "Select * from users where username = '".$_SESSION['UserName']."'";
                  $result = mysqli_query($conn, $sql);
                  $data = mysqli_fetch_assoc($result);
                  if(empty($data['avatar'])){
                    echo ' <img src="/kha-/UserAvatar/default.jpg" alt="Ảnh user">';
                  }
                  else{
                    echo ' <img src="/kha-/UserAvatar/'.$data['avatar'].'" alt="Ảnh user">';
                  }
                }
                
            ?>
            
        </div>
        <div class="username-warpper ">   
          <?php 
          
              if(isset($_SESSION['UserName']))
                echo "<label>". $_SESSION['UserName']. "</label>";
              else
                echo "undefine";
          
          ?>
        </div>
        <div class="dropdown user-info">
          <a href="#" id="update-info" class="dropdown-item show-info">Cập nhật thông tin</a>
          <a href="#" class="dropdown-item show-info">Đổi mật khẩu</a>
          <a href="/kha-/PHP/logout.php" class="dropdown-item dang-xuat">Đăng xuất</a>
        </div>
      </div>
      <!-- <a href="#" class="signout-btn">Đăng xuất</a> -->
    </div>

  </div>
    
      <?php

        if(isset($_SESSION['UserName']))
        {
          
          echo '<script> document.querySelector(".auth").classList.add("hidden"); </script>';
          echo '<script> document.querySelector(".user-loginned").classList.remove("hidden"); </script>';
        }
        else{

          echo '<script> document.querySelector(".auth").classList.remove("hidden"); </script>';
          echo '<script> document.querySelector(".user-loginned").classList.add("hidden"); </script>';
        }
    
    ?>
    <script>
        let user_info = document.querySelector(".user-loginned");
        let user_dropdown = document.querySelector(".dropdown.user-info");
        user_info.addEventListener("click", function(e){
          user_dropdown.classList.toggle("show");
        });
        document.querySelector(".dropdown-item.dang-xuat").addEventListener("click", function(e){
          if(!confirm("Bạn có muốn đăng xuất không")){
            e.preventDefault();
          }
        })

    </script>
<?php
  $username; $fullname; $birth; $sex; $phone; $email;
  if(isset($_SESSION['UserName']))
  {
      $result = mysqli_query($conn, "Select * from users where username = '" . $_SESSION['UserName'] . "' ");
      $data = mysqli_fetch_assoc($result);
      $username = $data['username'];
      $fullname = $data['full_name'];
      $birth = $data['birth_date'];
      $email = $data['email'];
      $phone = $data['phone'];
      $sex = $data['sex'];
  }
  $sql = "Select * from users where";
?>
<div class="new-windows">
    <div class="windows-user-data">
    <h1>Cập nhật thông tin</h1>
    <form action="/kha-/Database/changeInfo.php" method="POST" enctype="multipart/form-data">
      <table class="table-form">
        <tr>
          <td class="table-form col-1">Tên đăng nhập: </td>
          <td class="table-form col-2"><input type="text" name="user" disabled placeholder="Tên đăng nhập" required value="<?php echo $username ?>"></td>
        </tr>
        <tr>
          <td class="table-form col-1">Avatar: </td>
          <td class="table-form col-2"><input type="file" name="avatar"  required value="<?php echo $fullname ?>"></td>
        </tr>
        <tr>
          <td class="table-form col-1">Họ tên: </td>
          <td class="table-form col-2"><input type="text" name="full_name" placeholder="Họ tên" required value="<?php echo $fullname ?>"></td>
        </tr>
        <tr>
          <td class="table-form col-1">Ngày sinh:</td>
          <td class="table-form col-2"><input type="date" name="birth_date" required value="<?php echo $birth ?>"></td>
          
        </tr>
        <tr>
          <td class="table-form col-1"><label>Giới tính:</label></td>
            <td class="table-form col-2">
                <select class="select-gender" name="sex"  required >
              <option value="">-- Giới tính --</option>
              <option value="1">Nam</option >
              <option value="0">Nữ</option>
              </select>
            </td>
            <?php
              echo "<script> document.querySelector('.select-gender').value = '".$sex."'; </script>"
            ?>
        </tr>
        <tr>
          <td class="table-form col-1"><label>Số điện thoại:</label></td>
          <td class="table-form col-2"><input type="tel" name="phone" placeholder="Số điện thoại" required pattern="^\d{10,15}$" title="Số điện thoại phải có từ 10 đến 15 chữ số" value="<?php echo $phone ?>"></td>
        </tr>
        <tr>
          <td class="table-form col-1"><label>Email: </label></td>
          <td class="table-form col-2"><input type="email" disabled name="email" placeholder="Email" required value="<?php echo $email ?>"></td>
        </tr>
      </table>
      <div><input class="btn btn-submit" type="submit" value="Cập nhật"> <button class="btn btn-close"  onclick="closeWindows()" type="button">Đóng</button> </div>

      
    </form> 
  </div>
</div>
<script>
  let new_windows = document.querySelector(".new-windows");
  let windows_user_data = document.querySelector(".windows-user-data");
  document.getElementById("update-info").addEventListener("click", function(e){
    new_windows.classList.add("show")    
  })
new_windows.addEventListener("wheel", function(e) {
      e.preventDefault(); // Chặn hành vi cuộn mặc định
    new_windows.scrollTo(0, 0); // Kéo về đầu
});
  function closeWindows(){
    new_windows.classList.remove("show")   
  }
  

  
</script>
