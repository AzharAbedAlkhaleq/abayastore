
@include('user.includes.head')
<body>
  @include('user.includes.header')
<div class="products_main mb-5">

    <div class="mainimg">
        <div class="container text-center pt-5">
            <h3 class="mt-5">قادم جديد</h3>

        </div>
    </div>

    <div class="products container mt-3">
        <div class="row">
            <div class="col-md-4 col-sm-12 rightside py-3">
                <h5>الفلاتر</h5>
                <h5 class="py-2">الفئات</h5>
                <div>
                    <h5>السعر</h5>
<!--
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
-->
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
             

                <div class="product row pt-2">
                 @foreach ($arrival_products as $arrival_product )
                 <div class="col-md-4 col-sm-2 text-center">
                    <img src="{{ asset('assets/uploads/product/'.$arrival_product->image_ar) }}" alt="women">
                    <h6 class="pt-3 pb-2">{{$arrival_product->name_ar }}</h6>
                    <p><a href="#" class="px-2"><i class="far fa-heart"></i></a> OMR {{ $arrival_product->orginal_price }}</p>
                </div>
                 @endforeach
                  
                </div>
            </div><!-- end leftside -->

        </div>

    </div>


</div>
@include('user.includes.footer')
  
</body>
</html>
