<div class="mainslider">
    <a href="{{ route('user.categories') }}" class="btn btn-lg"> تسوق الان </a>
    
    <div class="swiper mySwiper">
   

               <div class="swiper-wrapper">
                @foreach ($tops as $top)
                   <div class="swiper-slide">
                   
                    <img src="{{ asset('assets/uploads/Slider/'.$top->imageSlider) }}"/>
                    
                </div>
                @endforeach
                </div>
                
               <div class="swiper-button-next"></div>
               <div class="swiper-button-prev"></div>
               <div class="swiper-pagination"></div>
           </div>
   </div>
 