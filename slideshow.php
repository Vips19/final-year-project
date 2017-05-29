<div class="content" style="width:98%">
    <div class="slideshow-container">
      <div class="mySlides fade">
        <div class="numbertext">1 / 3</div>
        <img src="brand images/8.jpg" class="slide-img">
        <div class="text"></div>
      </div>
    
      <div class="mySlides fade">
        <div class="numbertext">2 / 3</div>
        <img src="brand images/9.jpg" class="slide-img">
        <div class="text"></div>
      </div>
    
      <div class="mySlides fade">
        <div class="numbertext">3 / 3</div>
        <img src="brand images/10.jpg" class="slide-img">
        <div class="text"></div>
      </div>
     
    <!--  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a> -->
    </div>
    <!--<br>-->
    
    <div style="text-align:center; margin-left:665px;">
      <span class="dot" onclick="currentSlide(1)"></span> 
      <span class="dot" onclick="currentSlide(2)"></span> 
      <span class="dot" onclick="currentSlide(3)"></span> 
    </div>
</div>
<script>

var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>