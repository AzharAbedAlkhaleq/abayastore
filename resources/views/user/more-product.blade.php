@include('user.includes.head')
<body>
  @include('user.includes.header')


  <div class="products_main">

    <div class="mainimg">
        <div class="container text-center pt-5">
            <h3 class="mt-5">متجر</h3>

        </div>
    </div>

    <div class="products container mt-3">
        <div class="row">
            <div class="col-md-4 col-sm-12 rightside py-3">
                <h5>الفلاتر</h5>
                <h5 class="py-2">الفئات</h5>
                <div>
                    <h5>السعر</h5>

                    <div class="d-flex justify-content-between">
                        <p><span>الأعلي : </span> OMR0</p>
                        <p><span>الأدني : </span> OMR 1000</p>

                    </div>
                 <div class="filter">
                  
                    <div class="marka mt-4">
                        <p class="btn2 d-flex justify-content-between">تقيمات العملاء <i class="fas fa-angle-down"></i></p>
                        <div class="checkboxs2">
                            <div class="form-check mb-2">
                                <input class="mt-2" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                   استديو اصلاح التوب 
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="" type="checkbox" value="" id="flexCheckChecked" >
                                <label class="form-check-label" for="flexCheckChecked">
                                   استديو اصلاح التوب 
                                </label>
                            </div>
                        </div>
                    </div>
                         <div class="marka mt-4">
                        <p class="btn3 d-flex justify-content-between"> حجم <i class="fas fa-angle-down"></i></p>
                        <div class="checkboxs3">
                            <div class="form-check mb-2">
                                <input class="mt-2" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                   استديو اصلاح التوب 
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="" type="checkbox" value="" id="flexCheckChecked" >
                                <label class="form-check-label" for="flexCheckChecked">
                                   استديو اصلاح التوب 
                                </label>
                            </div>
                        </div>
                    </div>
                        <div class="marka mt-4">
                        <p class="btn4 d-flex justify-content-between"> عروض و خصم <i class="fas fa-angle-down"></i></p>
                        <div class="checkboxs4">
                            <div class="form-check mb-2">
                                <input class="mt-2" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                   استديو اصلاح التوب 
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="" type="checkbox" value="" id="flexCheckChecked" >
                                <label class="form-check-label" for="flexCheckChecked">
                                   استديو اصلاح التوب 
                                </label>
                            </div>
                        </div>
                    </div>
                        <div class="marka mt-4">
                        <p class="btn5 d-flex justify-content-between"> الفئة <i class="fas fa-angle-down"></i></p>
                        <div class="checkboxs5">
                            <div class="form-check mb-2">
                                <input class="mt-2" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                   استديو اصلاح التوب 
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="" type="checkbox" value="" id="flexCheckChecked" >
                                <label class="form-check-label" for="flexCheckChecked">
                                   استديو اصلاح التوب 
                                </label>
                            </div>
                        </div>
                    </div>
                    </div>
                    
                </div>

            </div><!-- end rightside -->
            <div class="col-md-8 col-sm-12 leftside">
                <p>عرض 17 2-1 of من 3.398 نتيجة ل "abaya"</p>
                <div class="d-flex list">
                    <h6>رتب حسب : </h6>
                    <ul class="list-unstyled d-flex listss">
                    <a href="{{ URL::current()."?sort=popularity"}}" style="text-decoration: none">  <li class="px-3 mx-2">الأكثر طلبا</li></a>
                    <a href="{{ URL::current()."?sort=price_asc"}}"  style="text-decoration: none">  <li class="px-3 mx-2">السعر من الاقل الي الاعلي</li></a>
                    <a href="{{ URL::current()."?sort=price_desc"}}"  style="text-decoration: none">  <li class="px-3 mx-2">السعر من الاعلي الي الاقل</li></a>
                    <a href="{{ URL::current()."?sort=newest"}}"  style="text-decoration: none"> <li class="px-3 mx-2">الاحدث اولا </li></a>
                    </ul>
                </div>

                <div class="product row pt-2">
            @foreach ($more_products as $m_prod)

            <div class="col-md-4 col-sm-2 text-center">
                {{-- <a href="{{ url('category/'.$category->slug_ar.'/'.$prod->slug_ar) }}"> --}}
                    <a style="text-decoration: none; color:black;" href="{{ route('shopping',$m_prod->id) }}">

                    <img src="{{ asset('assets/uploads/product/'.$m_prod->image_ar)}}" alt="women">

                {{-- </a> --}}
                <h6 class="pt-3 pb-2">


                    {{ $m_prod->name_ar }}
                
                    </a>
                </h6>
                <p><a href="#" class="px-2"><i class="far fa-heart"></i></a> OMR {{ $m_prod->orginal_price  }} </p>
            </div>

                
            @endforeach
            


                </div>
            </div><!-- end leftside -->

        </div>

    </div>


    <div class="rates mt-5">
        <div class="container py-3">
            <h5 class="pb-3 pt-2">مراجعات للعبايات الشعبية </h5>
            <div class="rated">
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <img src="{{ asset('front/images/womenadv.jpeg') }}">
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <div class="pp">
                                    <h6>سويت شيرت بطبعة نجمة لندن</h6>
                                    <div class="d-flex starr"> <span class="px-2 mx-2 mt-2"> 3.6 <i class="fas fa-star"></i></span>
                                        <p class="pt-2">15 تقييمات 4 مراجعات</p>
                                    </div>
                                    <div class="rate">
                                        <input type="radio" id="star5" name="rate" value="5" />
                                        <label for="star5" title="text">5 stars</label>
                                        <input type="radio" id="star4" name="rate" value="4" />
                                        <label for="star4" title="text">4 stars</label>
                                        <input type="radio" id="star3" name="rate" value="3" />
                                        <label for="star3" title="text">3 stars</label>
                                        <input type="radio" id="star2" name="rate" value="2" />
                                        <label for="star2" title="text">2 stars</label>
                                        <input type="radio" id="star1" name="rate" value="1" />
                                        <label for="star1" title="text">1 star</label>
                                    </div>
                                    <div class="px-2">
                                        <p>220 ريال عمال 50%</p>
                                        <p>النوع : عباية</p>
                                        <p>اللون : رمادي</p>
                                        <p> الحجم L </p>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="pp">
                                    <h6>سويت شيرت بطبعة نجمة لندن</h6>
                                    <div class="d-flex starr"> <span class="px-2 mx-2 mt-2"> 3.6 <i class="fas fa-star"></i></span>
                                        <p class="pt-2">15 تقييمات 4 مراجعات</p>
                                    </div>
                                    <div class="rate">
                                        <input type="radio" id="star5" name="rate" value="5" />
                                        <label for="star5" title="text">5 stars</label>
                                        <input type="radio" id="star4" name="rate" value="4" />
                                        <label for="star4" title="text">4 stars</label>
                                        <input type="radio" id="star3" name="rate" value="3" />
                                        <label for="star3" title="text">3 stars</label>
                                        <input type="radio" id="star2" name="rate" value="2" />
                                        <label for="star2" title="text">2 stars</label>
                                        <input type="radio" id="star1" name="rate" value="1" />
                                        <label for="star1" title="text">1 star</label>
                                    </div>
                                    <div class="px-2">
                                        <p>220 ريال عمال 50%</p>
                                        <p>النوع : عباية</p>
                                        <p>اللون : رمادي</p>
                                        <p> الحجم L </p>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="pp">
                                    <h6>سويت شيرت بطبعة نجمة لندن</h6>
                                    <div class="d-flex starr"> <span class="px-2 mx-2 mt-2"> 3.6 <i class="fas fa-star"></i></span>
                                        <p class="pt-2">15 تقييمات 4 مراجعات</p>
                                    </div>
                                    <div class="rate">
                                        <input type="radio" id="star5" name="rate" value="5" />
                                        <label for="star5" title="text">5 stars</label>
                                        <input type="radio" id="star4" name="rate" value="4" />
                                        <label for="star4" title="text">4 stars</label>
                                        <input type="radio" id="star3" name="rate" value="3" />
                                        <label for="star3" title="text">3 stars</label>
                                        <input type="radio" id="star2" name="rate" value="2" />
                                        <label for="star2" title="text">2 stars</label>
                                        <input type="radio" id="star1" name="rate" value="1" />
                                        <label for="star1" title="text">1 star</label>
                                    </div>
                                    <div class="px-2">
                                        <p>220 ريال عمال 50%</p>
                                        <p>النوع : عباية</p>
                                        <p>اللون : رمادي</p>
                                        <p> الحجم L </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rated pt-5">
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <img src="{{ asset('front/images/womenadv.jpeg') }}">
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <div class="pp">
                                    <h6>سويت شيرت بطبعة نجمة لندن</h6>
                                    <div class="d-flex starr"> <span class="px-2 mx-2 mt-2"> 3.6 <i class="fas fa-star"></i></span>
                                        <p class="pt-2">15 تقييمات 4 مراجعات</p>
                                    </div>
                                    <div class="rate">
                                        <input type="radio" id="star5" name="rate" value="5" />
                                        <label for="star5" title="text">5 stars</label>
                                        <input type="radio" id="star4" name="rate" value="4" />
                                        <label for="star4" title="text">4 stars</label>
                                        <input type="radio" id="star3" name="rate" value="3" />
                                        <label for="star3" title="text">3 stars</label>
                                        <input type="radio" id="star2" name="rate" value="2" />
                                        <label for="star2" title="text">2 stars</label>
                                        <input type="radio" id="star1" name="rate" value="1" />
                                        <label for="star1" title="text">1 star</label>
                                    </div>
                                    <div class="px-2">
                                        <p>220 ريال عمال 50%</p>
                                        <p>النوع : عباية</p>
                                        <p>اللون : رمادي</p>
                                        <p> الحجم L </p>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="pp">
                                    <h6>سويت شيرت بطبعة نجمة لندن</h6>
                                    <div class="d-flex starr"> <span class="px-2 mx-2 mt-2"> 3.6 <i class="fas fa-star"></i></span>
                                        <p class="pt-2">15 تقييمات 4 مراجعات</p>
                                    </div>
                                    <div class="rate">
                                        <input type="radio" id="star5" name="rate" value="5" />
                                        <label for="star5" title="text">5 stars</label>
                                        <input type="radio" id="star4" name="rate" value="4" />
                                        <label for="star4" title="text">4 stars</label>
                                        <input type="radio" id="star3" name="rate" value="3" />
                                        <label for="star3" title="text">3 stars</label>
                                        <input type="radio" id="star2" name="rate" value="2" />
                                        <label for="star2" title="text">2 stars</label>
                                        <input type="radio" id="star1" name="rate" value="1" />
                                        <label for="star1" title="text">1 star</label>
                                    </div>
                                    <div class="px-2">
                                        <p>220 ريال عمال 50%</p>
                                        <p>النوع : عباية</p>
                                        <p>اللون : رمادي</p>
                                        <p> الحجم L </p>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


</div>


















  @include('user.includes.footer')
  
</body>
</html>