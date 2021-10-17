<div class="category container">
    <div class="row">
        <div class="advimg col-md-3 col-sm-12  wow fadeInDown data-wow-duration=3s animate__delay-4s">
            <?php
            $banners = App\Models\Banner::where('location', 'bottom')
                ->latest()
                ->first();
            ?>
            @if ($banners)
                <img src="{{ asset('assets/uploads/banners/' . $banners->banner_image) }}" class="w-100">
            @else
                <img src="{{ asset('dashboard/1631697847.jpg') }}" width="543px" height="243px">
            @endif
        </div>
        {{-- @foreach ($categories as $category) --}}
        <div class="col-md-9 col-sm-12">
            <div class="categorytable">
                <div class="swiper mySwiper3">
                    <div class="swiper-wrapper">
                        @foreach ($categories as $category)
                            <div class="swiper-slide">
                                <div class="top d-flex justify-content-between">
                                    <h4 class="px-3 pt-2">{{ $category->name_ar }}</h4>
                                    <div>
                                        <i class="button-prev fas fa-angle-right"></i>
                                        <i class="button-next  fas fa-angle-left"></i>
                                    </div>
                                </div>
                                <div class="down row">
                                    <div class="col-md-7  col-sm-12 px-5">
                                        <div class="bg row ">
                                            <div class="col-11">
                                                <img src="{{ asset('assets/uploads/Category_ar/' . $category->image_ar) }}"
                                                    class="pt-3">
                                            </div>
                                            <div class="col-1 pt-5 mt-5 ">

                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-5 col-sm-12 right">
                                        @foreach ($category->product as $product)
                                        <a style="text-decoration: none;color:black; text-align:right;"
                                           href="{{ route('shopping', $product->id) }}">
                                            <div class="rightdown row pt-3">
                                                <div class="col-4"> <img
                                                        src="{{ asset('assets/uploads/product/' . $product->image_ar) }}">
                                                </div>
                                                <div class="col-8 ">
                                                    <h4>{{ $product->name_ar }}</h4>
                                                    <h6 style="color: red">OMR {{ $product->orginal_price }}</h6>
                                                </div>
                                            </div>
                                        </a>
                                        @endforeach


                                    </div>

                                </div>
                            </div>
                        @endforeach



                    </div>


                </div>

            </div>
        </div>






    </div>
</div>
