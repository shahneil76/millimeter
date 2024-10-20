document.addEventListener("DOMContentLoaded", function () {
  const totalFrames = 204;
  const desktopPrefix = "assets/Desktop/Milimeter-TextForMobilesite-V";
  const mobilePrefix = "assets/Mobile/Milimeter-TextForMobilesite-V";
  const desktopStartIndex = 1000;
  const mobileStartIndex = 3000;
  const ext = ".jpg";
  const imageContainer = document.getElementById("imageContainer");
  const footer = document.getElementById("footer");
  const subFooter = document.getElementById("sub-footer");
  const loadingSpinner = document.getElementById("loadingSpinner");

  const isMobile = window.innerWidth <= 768; 
  const prefix = isMobile ? mobilePrefix : desktopPrefix;
  const startIndex = isMobile ? mobileStartIndex : desktopStartIndex;

  const images = [];
  let imagesLoaded = 0;

  for (let i = 0; i <= totalFrames; i++) {
    const img = new Image();
    img.src = `${prefix}${String(startIndex + i)}${ext}`;
    img.id = `frame${i}`;
    img.alt = `Frame ${i}`;
    img.style.display = 'none'; 
    img.onload = () => {
      imagesLoaded++;
      if (imagesLoaded === totalFrames + 1) {
        loadingSpinner.style.display = 'none'; 
      }
    };
    imageContainer.appendChild(img);
    images.push(img);
  }

  function handleScroll() {
    const lastImage = images[totalFrames - 1];
    const lastImageBottom = lastImage.getBoundingClientRect().bottom;
    const viewportHeight = window.innerHeight;
    const scrollY = window.scrollY;

    const scrollFraction = scrollY / (document.body.scrollHeight - viewportHeight);
    const frameIndex = Math.min(totalFrames, Math.floor(scrollFraction * totalFrames));

    images.forEach((img, index) => {
      img.style.display = index === frameIndex ? "block" : "none";
    });

    if (lastImageBottom <= viewportHeight) {
      footer.style.display = "block";
      subFooter.style.display = "block";
    } else {
      footer.style.display = "none";
      subFooter.style.display = "none";
    }
  }

  window.addEventListener("scroll", handleScroll);
  handleScroll(); 
});
