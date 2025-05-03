function xemChiTiet(tenKhachSan) {
  // Tìm thẻ card gần nhất
  const card = event.target.closest('.homestay-card');

  // Thêm lớp để tạo hiệu ứng chuyển động
  card.classList.add('active');

  // Xoá hiệu ứng sau 0.5 giây
  setTimeout(() => {
    card.classList.remove('active');
  }, 500);

  // Hiển thị chi tiết (tạm thời qua console hoặc có thể popup sau)
  console.log("Bạn đã chọn khách sạn:", tenKhachSan);
}
