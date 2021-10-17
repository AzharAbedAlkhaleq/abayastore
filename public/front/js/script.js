$(function(){
    new WOW().init();

      $('.btn1').click(function (){
    
     $('.checkboxs').toggle();
     
     });
    
      $('.btn2').click(function (){
    
     $('.checkboxs2').toggle();
     
     });
    
      $('.btn3').click(function (){
    
     $('.checkboxs3').toggle();
     
     });
    
      $('.btn4').click(function (){
    
     $('.checkboxs4').toggle();
     
     });
    
      $('.btn5').click(function (){
    
     $('.checkboxs5').toggle();
     
     });
     $('.btn6').click(function (){
    
     $('.checkboxs6').toggle();
     
     });
    
   
      var step = 1;
    $('.next-button').click(function(){
        var parent = $(this).parent().parent();
        var next = $(this).parent().parent().next();
        $(parent).removeClass('active');
        $(next).addClass('active');
        step++;
        $('.steps-container').attr('finish', step);
        $('.steps-container #step' + step).addClass('active');
        $('.step-text').hide();
        $('#stepText' + step).show();
        
    })
     
    var swiper = new Swiper(".mySwiper", {
        speed: 600,
        parallax: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    
var swiper = new Swiper(".mySwiper2", {
        slidesPerView: 3,
        spaceBetween: 30,
        slidesPerGroup: 3,
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    
    
      var swiper = new Swiper(".mySwiper3", {
        speed: 600,
        parallax: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".button-next",
          prevEl: ".button-prev",
        },
      });
    
})


var modal = document.getElementById("myModal");
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
$(".my_img").on("click",function(){
modal.style.display = "block";
modalImg.src = this.src;
captionText.innerHTML = this.alt;
});  


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
modal.style.display = "none";
}


$(".search__field").focus(function(){
  console.log('hello');
  $(".search__icon").css("pointer-events", "all");
});


 
     
   