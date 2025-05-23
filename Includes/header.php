<?php session_start(); require_once $_SERVER['DOCUMENT_ROOT']."/kha-/Database/db_connect.php" ?>
  <div class="header">
    <!-- Logo -->
    <div class="logo">
      <a href="/kha-/home.php" class="logo-link">
        <img src="https://icon-library.com/images/icon-for-travel/icon-for-travel-13.jpg" alt="Logo" />
        <div class="logo-text">QNTour</div>
      </a>
    </div>
    <!-- Menu -->
    <nav class="menu">
      <a href="/kha-/home.php" class="menu-item">Trang chủ</a>

      <div class="menu-item">
        Cẩm nang du lịch <span class="arrow">&#9660;</span>
        <div class="dropdown">
          <a href="/kha-/FamousLocation.php" class="dropdown-item">Địa điểm nổi tiếng</a>
          <a href="/kha-/Checklist.php" class="dropdown-item">Mẹo du lịch</a>
        </div>
      </div>

      <div class="menu-item">
        Kênh Homestay <span class="arrow">&#9660;</span>
        <div class="dropdown">
          <a href="/kha-/checklist_homestay.php" class="dropdown-item">Homestay gần biển</a>
          <a href="/kha-/checklist_giare.php" class="dropdown-item">Homestay giá rẻ</a>
        </div>
      </div>

      <div class="menu-item">
        Nghiện Cafe <span class="arrow">&#9660;</span>
        <div class="dropdown">
          <a href="/kha-/checklist_cafe.php" class="dropdown-item">Cafe view đẹp</a>
          <a href="/kha-/checklist_cafe_khuya.php" class="dropdown-item">Cafe mở khuya</a>
        </div>
      </div>

      <div class="menu-item">
        Địa điểm ăn uống <span class="arrow">&#9660;</span>
        <div class="dropdown">
          <a href="/kha-/checklist_anvat.php" class="dropdown-item">Ăn vặt</a>
          <a href="/kha-/checklist_quanngon.php" class="dropdown-item">Quán ngon</a>
        </div>
      </div>

      <div class="menu-item">
        Sự kiện nổi bật <span class="arrow">&#9660;</span>
        <div class="dropdown">
          <a href="/kha-/Festival.php" class="dropdown-item">Lễ hội</a>
          <a href="/kha-/Concessionary.php" class="dropdown-item">Khuyến mãi</a>
        </div>
      </div>

      <a href="#" class="menu-item">Hỏi đáp</a>
    </nav>

    <!-- Search -->
    <div class="search-box">
      <input type="text" class="search-input" placeholder="Tìm kiếm" />
    </div>

    <!-- Đăng ký / Đăng nhập -->
    <div class="auth" >    
      <a href="/kha-/PHP/Register.php" class="signup-link">Sign up</a>
      <a href="/kha-/PHP/Login.php" class="login-btn">Log in</a>
    </div>
    <!-- Thông in user chỉ hiện khi login -->

    <div class="user-loginned hidden">
      <div class="user-loginned-warpper">
        <div class="img-warpper">
            <img src="/kha-/UserAvatar/default.jpg" alt="Ảnh user">
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
          <a href="#" class="dropdown-item dang-xuat">Đăng xuất</a>
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
    <form action="../DATABASE/Registerdb.php" method="POST">
      <table class="table-form">
        <tr>
          <td class="table-form col-1">Tên đăng nhập: </td>
          <td class="table-form col-2"><input type="text" name="user" disabled placeholder="Tên đăng nhập" required value="<?php echo $username ?>"></td>
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
