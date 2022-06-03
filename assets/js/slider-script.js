const slides = document.getElementsByClassName("mySlides");

document.addEventListener("DOMContentLoaded", function() {
    showSlides(1);
});

function showSlides(slideIndex) {
    let i;
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    slides[slideIndex].style.display = "block";
  }