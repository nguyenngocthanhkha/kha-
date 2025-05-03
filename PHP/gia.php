<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Nghiện Cà Phê - Quy Nhơn</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Nghiện Cà Phê - Top quán hot Quy Nhơn</h1>
  </header>

  <div class="cafe-container">
    <!-- Quán 1 -->
    <div class="cafe-card">
      <img src="https://images.openai.com/thumbnails/0060f536edc3569bca33f09f363dbb0d.jpeg" alt="Hẻm Cafe" class="cafe-img">
      <h3>Hẻm Cafe</h3>
      <p>Không gian vintage, yên tĩnh, view cực chill.</p>
      <button onclick="showDetail('Hẻm Cafe', 'Hẻm Cafe là một trong những quán cà phê chill nhất Quy Nhơn, nằm trong con hẻm nhỏ với phong cách retro. Phù hợp làm việc và học tập. Địa chỉ: 123 Hẻm Trần Hưng Đạo.')">Xem chi tiết</button>
    </div>

    <!-- Quán 2 -->
    <div class="cafe-card">
      <img src="https://th.bing.com/th/id/OIP.NkodcUkxUCqkDRiSNX3hLQHaE6?rs=1&pid=ImgDetMain" alt="Surf Bar" class="cafe-img">
      <h3>Surf Bar</h3>
      <p>Ngay bãi biển, cực hot vào buổi chiều tối.</p>
      <button onclick="showDetail('Surf Bar', 'Surf Bar nằm ngay bãi biển Quy Nhơn, được trang trí bằng gỗ và đèn lồng. Cực kỳ thích hợp để chill sau 5h chiều, vừa ngắm hoàng hôn vừa nhâm nhi đồ uống.')">Xem chi tiết</button>
    </div>

    <!-- Quán 3 -->
    <div class="cafe-card">
      <img src="images/tropical.jpg" alt="Tropical Garden" class="cafe-img">
      <h3>Tropical Garden</h3>
      <p>Cây xanh mát mẻ, đồ uống đa dạng.</p>
      <button onclick="showDetail('Tropical Garden', 'Tropical Garden mang đến cảm giác như đang ngồi trong khu rừng nhiệt đới. Không gian mát mẻ, yên bình. Địa chỉ: 89 Phan Đình Phùng.')">Xem chi tiết</button>
    </div>

    <!-- Quán 4 -->
    <div class="cafe-card">
      <img src="images/sblue.jpg" alt="S.Blue Cafe" class="cafe-img">
      <h3>S.Blue Cafe</h3>
      <p>Không gian sang trọng, thích hợp họp mặt.</p>
      <button onclick="showDetail('S.Blue Cafe', 'S.Blue nổi tiếng với decor hiện đại và sang trọng. Quán nằm gần trung tâm, phục vụ đa dạng đồ uống và món ăn nhẹ.')">Xem chi tiết</button>
    </div>

    <!-- Quán 5 -->
    <div class="cafe-card">
      <img src="images/1988.jpg" alt="1988 Cafe" class="cafe-img">
      <h3>1988 Cafe</h3>
      <p>Phong cách hoài cổ, decor độc đáo.</p>
      <button onclick="showDetail('1988 Cafe', '1988 Cafe thu hút giới trẻ bởi phong cách hoài niệm với các vật dụng xưa cũ. Góc sống ảo siêu chất. Địa chỉ: 22 Ngô Mây.')">Xem chi tiết</button>
    </div>

    <!-- Quán 6 -->
    <div class="cafe-card">
      <img src="images/marina.jpg" alt="Marina Cafe" class="cafe-img">
      <h3>Marina Cafe</h3>
      <p>View nhìn thẳng biển, sáng cực chill.</p>
      <button onclick="showDetail('Marina Cafe', 'Marina Cafe tọa lạc ngay ven biển, thiết kế mở đón gió trời. Nơi lý tưởng cho buổi sáng thư giãn và cà phê.')">Xem chi tiết</button>
    </div>

    <!-- Quán 7 -->
    <div class="cafe-card">
      <img src="images/beans.jpg" alt="Bean’s Coffee" class="cafe-img">
      <h3>Bean’s Coffee</h3>
      <p>Giá sinh viên, wifi mạnh.</p>
      <button onclick="showDetail('Bean’s Coffee', 'Bean’s Coffee phù hợp với học sinh sinh viên. Không gian rộng, giá cả hợp lý, wifi mạnh. Địa chỉ: 45 Lê Lợi.')">Xem chi tiết</button>
    </div>

    <!-- Quán 8 -->
    <div class="cafe-card">
      <img src="images/dreamers.jpg" alt="Dreamers Cafe" class="cafe-img">
      <h3>Dreamers Cafe</h3>
      <p>Decor mộng mơ, đồ uống đẹp mắt.</p>
      <button onclick="showDetail('Dreamers Cafe', 'Dreamers Cafe là địa điểm yêu thích của giới trẻ nhờ không gian lãng mạn, nhiều góc check-in cực ấn tượng.')">Xem chi tiết</button>
    </div>
  </div>

  <!-- Chi tiết quán -->
  <div id="cafeDetail" class="hidden">
    <button onclick="closeDetail()">← Quay lại</button>
    <h2 id="detailTitle"></h2>
    <p id="detailContent"></p>
  </div>

  <script src="script.js"></script>
</body>
</html>
