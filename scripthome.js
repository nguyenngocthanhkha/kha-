// JavaScript to handle the banner image transition (moving through images)
let currentIndex = 0;
const images = document.querySelectorAll('.banner-image');
const totalImages = images.length;

function changeBannerImage() {
  images.forEach((image, index) => {
    image.style.opacity = index === currentIndex ? 1 : 0;
  });
  currentIndex = (currentIndex + 1) % totalImages;
}

// Change banner every 5 seconds
setInterval(changeBannerImage, 5000);

// Initialize the first banner
changeBannerImage();
