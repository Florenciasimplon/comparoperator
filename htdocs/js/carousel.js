console.log('HEHOOOOOOOOOOOOOO');
// var slideIndex = 1;
// showSlides(slideIndex);

// function plusSlides(n) {
//   showSlides(slideIndex += n);
// }

// function currentSlide(n) {
//   showSlides(slideIndex = n);
// }

// function showSlides(n) {
//   var i;
//   var slides = document.getElementsByClassName("mySlides");
//   var dots = document.getElementsByClassName("dot");
//   if (n > slides.length) {slideIndex = 1}    
//   if (n < 1) {slideIndex = slides.length}
//   for (i = 0; i < slides.length; i++) {
//       slides[i].style.display = "none";  
//   }
//   for (i = 0; i < dots.length; i++) {
//       dots[i].className = dots[i].className.replace(" active", "");
//   }
//   slides[slideIndex-1].style.display = "block";  
//   dots[slideIndex-1].className += " active";
// }


$(".carousel").owlCarousel({
    margin: 10,
    loop: true,
    autoplay : true,
    autoplayTimeout : 2000,
    autoplayHoverPause : true,
    responsive : {
        0: {
            items : 1,
            nav: false
        },
        600:{
            items:2,
            nav:false
        },
        1000:{
            items : 3,
            nav :false
        }
    }

});

$('.carousel2').owlCarousel({
    margin: 10,
    loop: true,
    autoplay : true,
    autoplayTimeout : 2000,
    autoplayHoverPause : true,
    responsive : {
        0: {
            items : 1,
            nav: false
        }
    }
})
