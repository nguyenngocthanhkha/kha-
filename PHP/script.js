function showDetail(title, content) {
    document.getElementById("detailTitle").textContent = title;
    document.getElementById("detailContent").textContent = content;
    document.querySelector(".cafe-container").classList.add("hidden");
    document.getElementById("cafeDetail").classList.remove("hidden");
  }
  
  function closeDetail() {
    document.querySelector(".cafe-container").classList.remove("hidden");
    document.getElementById("cafeDetail").classList.add("hidden");
  }
  