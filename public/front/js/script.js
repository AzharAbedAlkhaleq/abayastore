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
    
 /*  $(document).ready(function(){
      jQuery(document).ready(function() {
      // click on next button
      jQuery('.next-button').click(function() {
          var parentFieldset = jQuery(this).parents('.step');
          var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
          var next = jQuery(this);
          var nextWizardStep = true;
          parentFieldset.find('.step-form').each(function(){
              var thisValue = jQuery(this).val();
              if( thisValue == "") {
                  jQuery(this).siblings(".step-form-error").slideDown();
                  nextWizardStep = false;
              }
              else {
                  jQuery(this).siblings(".step-form-error").slideUp();
              }
          });
          data = {}
          parentFieldset.find('input, select').each(function(){
              var thisValue = ""
              let name = $(this).attr('name');
               thisValue = jQuery(this).val();
               data[name] = thisValue;
               
              
          });
    
          step = $(this).data('step')
          data['step'] = step
         
          console.log(data);
          //alert(data);
          $('.alert-danger').addClass('hide');
           $.ajax({
              type: "POST",
              url: '/registerValidateURL',
              data: data,
              success: function(response){
                  if( nextWizardStep) {
                    $('.alert-danger').addClass('d-none');
                      next.parents('.step').removeClass("active");
                      next.parents('.step').next('.step').addClass("active");
                      jQuery(document).find('.step').each(function(){
                          if(jQuery(this).hasClass('active')){
                              var formAtrr = jQuery(this).attr('data-tab-content');
                              jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function(){
                                  if(jQuery(this).attr('data-attr') == formAtrr){
                                      jQuery(this).addClass('active');
                                      var innerWidth = jQuery(this).innerWidth();
                                      var position = jQuery(this).position();
                                      jQuery(document).find('.form-wizard-step-move').css({"left": position.left, "width": innerWidth});
                                  }else{
                                      jQuery(this).removeClass('active');
                                  }
                              });
                          }
                      });
                  }
              }
    
          }).fail(function(jqXHR, textStatus, errorThrown) {
              var errorMessagesLsit = '';
              var data = jqXHR.responseJSON;
              if (data.errors instanceof Object || data.errors instanceof Array) {
                for (var i in data.errors) {
                  errorMessagesLsit += '<li style="width: fit-content;">';
                  errorMessagesLsit += data.errors[i].join('<br />');
                  errorMessagesLsit += '</li>';
                }
              } else {
                errorMessagesLsit += '<li style="width: fit-content;">';
                errorMessagesLsit += data.errors;
                errorMessagesLsit += '</li>';
              }
     
              $('.alert-danger').removeClass('d-none');
              $('.alert-danger ul').html(errorMessagesLsit);
            });
          
      });
    });
    }); */
   
      var step = 1;
      var data = {};
  $(document).ready(function(){
    $('.next-button').click(function(){
        var parent = $(this).parent().parent();
        var next = $(this).parent().parent().next();

          parent.find('.step-form').each(function(){
              var thisValue = ""
              let name = $(this).attr('name');
               thisValue = $(this).val();
               data[name] = thisValue;
               
              
          });
        console.log(data)
          alert(locale);
        $.ajax({
          type: "POST",
          url: '/registerValidateURL',
          data: data,
          success: function(response){
            if (data['country'] == 'Oman') {
              $("#COD").removeClass('d-none');
             
            }
            console.log(response);
            if (response['shipping_expenses']) {
              $("#shipping_expenses").html(response['shipping_expenses'] + " OMR");
            
            }
            if (response['total_product']) {
              $("#total_product").html(response['total_product'] + " OMR");
             
            }
            if (response['total']) {
              $("#total").html(response['total'] + " OMR");
             
            }
                $('.alert-danger').addClass('d-none');
                $(parent).removeClass('active');
                $(parent).addClass('hide');
                $(next).removeClass('hide');
                $(next).addClass('active');
                step++;
                $('.steps-container').attr('finish', step);
                $('.steps-container #step' + step).addClass('active');
                $('.step-text').hide();
                $('#stepText' + step).show();
              
          }

      }).fail(function(jqXHR, textStatus, errorThrown) {
          var errorMessagesLsit = '';
          var data = jqXHR.responseJSON;
          if (data.errors instanceof Object || data.errors instanceof Array) {
            for (var i in data.errors) {
              errorMessagesLsit += '<li style="width: fit-content;">';
              errorMessagesLsit += data.errors[i].join('<br />');
              errorMessagesLsit += '</li>';
            }
          } else {
            errorMessagesLsit += '<li style="width: fit-content;">';
            errorMessagesLsit += data.errors;
            errorMessagesLsit += '</li>';
          }
 
          $('.alert-danger').removeClass('d-none');
          $('.alert-danger ul').html(errorMessagesLsit);
        });
    }) 
     
    //prev button
    $('.prev-button').click(function(){
      var parent = $(this).parent().parent();
      var prev = $(this).parent().parent().prev();
      $(parent).removeClass('active');
      $(prev).addClass('active');
      $(prev).removeClass('hide');
      step--;
      $('.steps-container').attr('finish', step);
      $('.steps-container #step' + step).addClass('active');
      $('.step-text').hide();
      $('#stepText' + step).show();
    })
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


 /**** filter by category ****/ 
$(document).ready(function(){
  $("#filter_category").change(function(){
    window.location = $(this).val();
    console.log($(this).val());
  });
});
