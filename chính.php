<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Nghiện Cà Phê - Top quán hot Quy Nhơn</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
      background-color: #f8f8f8;
    }

    h1 {
      text-align: center;
      color: #333;
    }

    .container {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      gap: 20px;
      margin-top: 30px;
    }

    .card {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      padding: 15px;
      flex: 1 1 calc(25% - 20px);
      max-width: calc(25% - 20px);
      box-sizing: border-box;
      text-align: center;
    }

    .card img {
      width: 100%;
      height: 160px;
      object-fit: cover;
      border-radius: 8px;
    }

    .card h3 {
      margin-top: 10px;
      color: #222;
    }

    .card p {
      font-size: 14px;
      color: #555;
    }

    .card button {
      margin-top: 10px;
      padding: 8px 12px;
      border: none;
      background-color: #007bff;
      color: white;
      border-radius: 5px;
      cursor: pointer;
    }

    .card button:hover {
      background-color: #0056b3;
    }

    @media (max-width: 768px) {
      .card {
        flex: 1 1 100%;
        max-width: 100%;
      }
    }
  </style>
</head>
<body>

  <h1>Nghiện Cà Phê - Top quán hot Quy Nhơn</h1>

  <div class="container">
    <div class="card">
      <img src="https://via.placeholder.com/300x160?text=Hem+Cafe" alt="Hẻm Cafe">
      <h3>Hẻm Cafe</h3>
      <p>Không gian vintage, yên tĩnh, view cực chill.</p>
      <button onclick="xemChiTiet('Hẻm Cafe')">Xem chi tiết</button>
    </div>

    <div class="card">
      <img src="https://via.placeholder.com/300x160?text=Adiuvat" alt="Adiuvat Coffee">
      <h3>Adiuvat Coffee</h3>
      <p>Quán cà phê phong cách hiện đại, rộng rãi.</p>
      <button onclick="xemChiTiet('Adiuvat Coffee')">Xem chi tiết</button>
    </div>

    <div class="card">
      <img src="https://via.placeholder.com/300x160?text=Cafe+Gio" alt="Cà Phê Gió">
      <h3>Cà Phê Gió</h3>
      <p>View biển đẹp, không khí trong lành.</p>
      <button onclick="xemChiTiet('Cà Phê Gió')">Xem chi tiết</button>
    </div>

    <div class="card">
      <img src="https://via.placeholder.com/300x160?text=Tropical+Garden" alt="Tropical Garden">
      <h3>Tropical Garden</h3>
      <p>Không gian xanh mát, decor nhiệt đới.</p>
      <button onclick="xemChiTiet('Tropical Garden')">Xem chi tiết</button>
    </div>
  </div>

  <script>
    function xemChiTiet(tenQuan) {
      alert("Bạn đã chọn: " + tenQuan);
    }
  </script>

</body>
</html>
