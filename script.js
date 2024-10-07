// Load a specific page via AJAX
function loadPage(page) {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", `includes/pagination.php?page=${page}`, true);
    xhr.onload = function () {
      if (this.status === 200) {
        document.getElementById('album-grid').innerHTML = this.responseText;
      }
    };
    xhr.send();
  }
  
  // Open the lightbox
  function openLightbox(image) {
    const lightbox = document.getElementById("lightbox");
    const lightboxImg = document.getElementById("lightbox-img");
    const caption = document.getElementById("caption");
  
    lightbox.style.display = "block";
    lightboxImg.src = `images/${image}`;
    caption.innerHTML = image;
  }
  
  // Close the lightbox
  function closeLightbox() {
    document.getElementById("lightbox").style.display = "none";
  }
  