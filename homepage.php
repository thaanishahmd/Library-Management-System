<?php
    include "include/header.php";
?>
<div class="menu slideshow">
    <div class="slideshow-container">

        <div class="mySlides fade">
            <div class="numbertext"></div>
            <img src="images/librarypic1.jpg" style="width:100%">
            <div class="text"></div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext"></div>
            <img src="images/librarypic2.jpg" style="width:100%">
            <div class="text"></div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext"></div>
            <img src="images/librarypic3.jpg" style="width:100%">
            <div class="text"></div>
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

    </div>
    <br>

    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>

</div>

<?php
    include "include/footer.php";
?>