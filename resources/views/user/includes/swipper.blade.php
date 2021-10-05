<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        @foreach ($bottom as $bottom )

        <div class="swiper-slide ">

            <img src="{{ asset ('assets/uploads/Slider/'.$bottom->imageSlider) }}" />
            <div class="text text-right">
                <h2>{{  $bottom->title }}</h2>
                <p>{{ $bottom->subtitle	 }}</p>
            </div>
           
        </div>
        
        @endforeach

    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
</div>
</div> 