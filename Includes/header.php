<<<<<<< HEAD
<?php 
session_start();
require_once(__DIR__ . '/../Database/db_connect.php'); 
=======
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

        <a href="/kha-/nut_lienhe.php" class="menu-item">Liên hệ</a>
    </nav>

    <!-- Search -->
    <div class="search-box">
        <form method="get" action="Search.php">
            <input type="text" class="search-input" name="tim" placeholder="Nhập từ khóa..."
                value="<?= isset($_GET['tim']) ? htmlspecialchars($_GET['tim']) : '' ?>">
            <button type="submit">Tìm kiếm</button>
        </form>

    </div>

    <!-- Đăng ký / Đăng nhập -->
    <div class="auth">
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
                <a href="/kha-/PHP/change_Pass.php" class="dropdown-item show-info">Đổi mật khẩu</a>
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
user_info.addEventListener("click", function(e) {
    user_dropdown.classList.toggle("show");
});
document.querySelector(".dropdown-item.dang-xuat").addEventListener("click", function(e) {
    if (!confirm("Bạn có muốn đăng xuất không")) {
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
>>>>>>> f879926fe58dbb25df8baf7d109be66c81a0d9db
?>

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
    <div class="menu-item">Cẩm nang du lịch <span class="arrow">&#9660;</span>
      <div class="dropdown">
        <a href="/kha-/FamousLocation.php" class="dropdown-item">Địa điểm nổi tiếng</a>
        <a href="/kha-/Checklist.php" class="dropdown-item">Mẹo du lịch</a>
      </div>
    </div>
    <div class="menu-item">Kênh Homestay <span class="arrow">&#9660;</span>
      <div class="dropdown">
        <a href="/kha-/checklist_homestay.php" class="dropdown-item">Homestay gần biển</a>
        <a href="/kha-/checklist_giare.php" class="dropdown-item">Homestay giá rẻ</a>
      </div>
    </div>
    <div class="menu-item">Nghiện Cafe <span class="arrow">&#9660;</span>
      <div class="dropdown">
        <a href="/kha-/checklist_cafe.php" class="dropdown-item">Cafe view đẹp</a>
        <a href="/kha-/checklist_cafe_khuya.php" class="dropdown-item">Cafe mở khuya</a>
      </div>
    </div>
    <div class="menu-item">Địa điểm ăn uống <span class="arrow">&#9660;</span>
      <div class="dropdown">
        <a href="/kha-/checklist_anvat.php" class="dropdown-item">Ăn vặt</a>
        <a href="/kha-/checklist_quanngon.php" class="dropdown-item">Quán ngon</a>
      </div>
    </div>
    <div class="menu-item">Sự kiện nổi bật <span class="arrow">&#9660;</span>
      <div class="dropdown">
        <a href="/kha-/Festival.php" class="dropdown-item">Lễ hội</a>
        <a href="/kha-/Concessionary.php" class="dropdown-item">Khuyến mãi</a>
      </div>
    </div>
    <a href="/kha-/nut_lienhe.php" class="menu-item">Liên hệ</a>
  </nav>
 <!-- Nút menu di động -->
<div class="mobile-menu-toggle" onclick="toggleMobileMenu()">☰</div>

  <!-- Search -->
  <div class="search-box">
    <input type="text" class="search-input" placeholder="Tìm kiếm" />
  </div>

  <!-- Đăng ký / Đăng nhập -->
  <div class="auth" <?php if (isset($_SESSION['UserName'])) echo 'style="display: none;"'; ?>>
    <a href="/kha-/PHP/Register.php" class="signup-link">Sign up</a>
    <a href="/kha-/PHP/Login.php" class="login-btn">Log in</a>
  </div>

  <!-- Thông tin người dùng -->
  <div class="user-loginned <?php if (!isset($_SESSION['UserName'])) echo 'hidden'; ?>">
    <div class="user-loginned-warpper">
      <div class="img-warpper">
        <?php
          if (isset($_SESSION['UserName'])) {
            $sql = "SELECT * FROM users WHERE username = '" . $_SESSION['UserName'] . "'";
            $result = mysqli_query($conn, $sql);
            $data = mysqli_fetch_assoc($result);
            $avatar = empty($data['avatar']) ? 'default.jpg' : $data['avatar'];
            echo '<img src="/kha-/UserAvatar/' . $avatar . '" alt="Ảnh user">';
          }
        ?>
      </div>
      <div class="username-warpper">
        <label><?php echo $_SESSION['UserName'] ?? 'undefine'; ?></label>
      </div>
      <div class="dropdown user-info">
        <a href="#" id="update-info" class="dropdown-item show-info">Cập nhật thông tin</a>
        <a href="#" class="dropdown-item show-info">Đổi mật khẩu</a>
        <a href="/kha-/PHP/logout.php" class="dropdown-item dang-xuat">Đăng xuất</a>
      </div>
    </div>
  </div>
</div>

<?php
// Lấy dữ liệu người dùng để cập nhật
$username = $fullname = $birth = $sex = $phone = $email = '';
if (isset($_SESSION['UserName'])) {
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '" . $_SESSION['UserName'] . "'");
    $data = mysqli_fetch_assoc($result);
    $username = $data['username'];
    $fullname = $data['full_name'];
    $birth = $data['birth_date'];
    $email = $data['email'];
    $phone = $data['phone'];
    $sex = $data['sex'];
}
?>

<div class="new-windows">
<<<<<<< HEAD
  <div class="windows-user-data">
    <h1>Cập nhật thông tin</h1>
    <form action="/kha-/Database/changeInfo.php" method="POST" enctype="multipart/form-data">
      <table class="table-form">
        <tr>
          <td class="col-1">Tên đăng nhập:</td>
          <td class="col-2"><input type="text" name="user" disabled value="<?php echo $username; ?>"></td>
        </tr>
        <tr>
          <td class="col-1">Avatar:</td>
          <td class="col-2"><input type="file" name="avatar"></td>
        </tr>
        <tr>
          <td class="col-1">Họ tên:</td>
          <td class="col-2"><input type="text" name="full_name" required value="<?php echo $fullname; ?>"></td>
        </tr>
        <tr>
          <td class="col-1">Ngày sinh:</td>
          <td class="col-2"><input type="date" name="birth_date" required value="<?php echo $birth; ?>"></td>
        </tr>
        <tr>
          <td class="col-1">Giới tính:</td>
          <td class="col-2">
            <select class="select-gender" name="sex" required>
              <option value="">-- Giới tính --</option>
              <option value="1">Nam</option>
              <option value="0">Nữ</option>
            </select>
          </td>
        </tr>
        <tr>
          <td class="col-1">Số điện thoại:</td>
          <td class="col-2"><input type="tel" name="phone" required pattern="^\d{10,15}$" value="<?php echo $phone; ?>"></td>
        </tr>
        <tr>
          <td class="col-1">Email:</td>
          <td class="col-2"><input type="email" name="email" disabled value="<?php echo $email; ?>"></td>
        </tr>
      </table>
      <div>
        <input class="btn btn-submit" type="submit" value="Cập nhật">
        <button class="btn btn-close" type="button" onclick="closeWindows()">Đóng</button>
      </div>
    </form>
  </div>
</div>

<script>
  document.querySelector(".select-gender").value = "<?php echo $sex; ?>";

  const userInfoBtn = document.getElementById("update-info");
  const newWindows = document.querySelector(".new-windows");
  const logoutBtn = document.querySelector(".dang-xuat");

  userInfoBtn?.addEventListener("click", e => {
    e.preventDefault();
    newWindows.classList.add("show");
  });

  logoutBtn?.addEventListener("click", e => {
    if (!confirm("Bạn có muốn đăng xuất không?")) {
      e.preventDefault();
    }
  });

  newWindows?.addEventListener("wheel", e => {
    e.preventDefault();
    newWindows.scrollTo(0, 0);
  });

  function closeWindows() {
    newWindows.classList.remove("show");
  }
</script>
<script>
  function toggleMobileMenu() {
    const menu = document.querySelector(".menu");
    menu.classList.toggle("show");
  }
=======
    <div class="windows-user-data">
        <h1>Cập nhật thông tin</h1>
        <form action="/kha-/Database/changeInfo.php" method="POST" enctype="multipart/form-data">
            <table class="table-form">
                <tr>
                    <td class="table-form col-1">Tên đăng nhập: </td>
                    <td class="table-form col-2"><input type="text" name="user" disabled placeholder="Tên đăng nhập"
                            required value="<?php echo $username ?>"></td>
                </tr>
                <tr>
                    <td class="table-form col-1">Avatar: </td>
                    <td class="table-form col-2"><input type="file" name="avatar" required
                            value="<?php echo $fullname ?>"></td>
                </tr>
                <tr>
                    <td class="table-form col-1">Họ tên: </td>
                    <td class="table-form col-2"><input type="text" name="full_name" placeholder="Họ tên" required
                            value="<?php echo $fullname ?>"></td>
                </tr>
                <tr>
                    <td class="table-form col-1">Ngày sinh:</td>
                    <td class="table-form col-2"><input type="date" name="birth_date" required
                            value="<?php echo $birth ?>"></td>

                </tr>
                <tr>
                    <td class="table-form col-1"><label>Giới tính:</label></td>
                    <td class="table-form col-2">
                        <select class="select-gender" name="sex" required>
                            <option value="">-- Giới tính --</option>
                            <option value="1">Nam</option>
                            <option value="0">Nữ</option>
                        </select>
                    </td>
                    <?php
              echo "<script> document.querySelector('.select-gender').value = '".$sex."'; </script>"
            ?>
                </tr>
                <tr>
                    <td class="table-form col-1"><label>Số điện thoại:</label></td>
                    <td class="table-form col-2"><input type="tel" name="phone" placeholder="Số điện thoại" required
                            pattern="^\d{10,15}$" title="Số điện thoại phải có từ 10 đến 15 chữ số"
                            value="<?php echo $phone ?>"></td>
                </tr>
                <tr>
                    <td class="table-form col-1"><label>Email: </label></td>
                    <td class="table-form col-2"><input type="email" disabled name="email" placeholder="Email" required
                            value="<?php echo $email ?>"></td>
                </tr>
            </table>
            <div><input class="btn btn-submit" type="submit" value="Cập nhật"> <button class="btn btn-close"
                    onclick="closeWindows()" type="button">Đóng</button> </div>


        </form>
    </div>
</div>
<script>
let new_windows = document.querySelector(".new-windows");
let windows_user_data = document.querySelector(".windows-user-data");
document.getElementById("update-info").addEventListener("click", function(e) {
    new_windows.classList.add("show")
})
new_windows.addEventListener("wheel", function(e) {
    e.preventDefault(); // Chặn hành vi cuộn mặc định
    new_windows.scrollTo(0, 0); // Kéo về đầu
});

function closeWindows() {
    new_windows.classList.remove("show")
}
>>>>>>> f879926fe58dbb25df8baf7d109be66c81a0d9db
</script>
