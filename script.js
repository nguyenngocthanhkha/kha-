// Chọn tất cả các nhóm menu
const groups = document.querySelectorAll('.group');

groups.forEach(group => {
  // Khi nhấp vào một nhóm menu, mở menu
  group.addEventListener('click', function(e) {
    // Ngừng hành động mặc định của thẻ <a>
    e.preventDefault();

    // Toggle class 'open' để giữ menu mở
    this.classList.toggle('open');
  });
});

// Đóng menu nếu nhấp vào bất kỳ đâu ngoài menu
document.addEventListener('click', function(e) {
  // Nếu không nhấp vào menu hoặc các mục bên trong nó
  if (!e.target.closest('.group')) {
    groups.forEach(group => {
      group.classList.remove('open'); // Đóng tất cả menu
    });
  }
});

// Tự động chuyển động banner (chuyển đổi hình ảnh mỗi 5 giây)
const bannerImages = document.querySelectorAll('.banner-image');
let currentImageIndex = 0;

function changeBannerImage() {
  // Ẩn tất cả hình ảnh banner
  bannerImages.forEach(img => {
    img.style.opacity = 0;
  });

  // Hiển thị hình ảnh hiện tại
  currentImageIndex = (currentImageIndex + 1) % bannerImages.length;
  bannerImages[currentImageIndex].style.opacity = 1;
}

// Thay đổi banner mỗi 5 giây
setInterval(changeBannerImage, 5000);

// Khởi tạo banner ban đầu
changeBannerImage();
// phần footer ( xử lý scripts.js)
// script.js

// JavaScript để xử lý form gửi email
document.querySelector('.newsletter').addEventListener('submit', function(event) {
  event.preventDefault(); // Ngăn chặn hành động mặc định của form
  const email = document.getElementById('email').value;
  alert('Cảm ơn bạn đã đăng ký nhận tin tức với email: ' + email);
  // Ở đây bạn có thể thêm mã PHP để gửi email hoặc lưu vào cơ sở dữ liệu
});

