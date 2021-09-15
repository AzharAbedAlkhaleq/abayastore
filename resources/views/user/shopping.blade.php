@include('user.includes.head')
<body>
  @include('user.includes.header')

  <div class="shoping_container">

    <!-- Open Content -->
 
    <div class="shoping_container">

        <!-- Open Content -->
        <section class="bg-shoping">
            <div class="container pb-5">
                <div class="row">

                    <div class="col-md-6 col-sm-12 mt-5">
                        <div class="card mb-3">
                            <img class="card-img " src="images/women.jpeg" alt="Card image cap" id="product-detail" height="400">
                        </div>

                        <div class="swiper mySwiper2">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide"> <img class="card-img " src="images/women.jpeg" alt="Card image cap" id="product-detail"></div>
                                <div class="swiper-slide"> <img class="card-img " src="images/women.jpeg" alt="Card image cap" id="product-detail"></div>
                                <div class="swiper-slide"> <img class="card-img " src="images/women.jpeg" alt="Card image cap" id="product-detail"></div>

                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination"></div>
                        </div>

                        <div class="product_rated container pt-4">
                            <h6>التقييم و المراجعات</h6>
                            <div class="row pt-3">
                                <div class="col-4">
                                    <h5>4.5 <i class="fas fa-star"></i></h5>
                                    <p>1,344 التقييمات & 343 المراجعات</p>
                                </div>
                              



                            </div>
                        </div>
                        
                        <div class="reve">
                       <div>
                            <p> جيد جدا <span class="px-2 py-1">5 <i class="fas fa-star"></i></span></p>
                            <img src="images/womenhihab11.jpg" width="100px;" height="80px">
                            <div class="d-flex justify-content-between mt-2">
                                <p>العباية      <i class="mr-2 fas fa-check-circle"></i> مشتري منذ ١١ شهر </p>
                                <p><i class="fas fa-thumbs-up"></i> 17   <i class="fas fa-thumbs-down"></i>  5</p>
                            </div>
                            </div>
                                 <div class="mt-4">
                            <p> جيد جدا <span class="px-2 py-1">5 <i class="fas fa-star"></i></span></p>
                            <img src="images/womenhihab11.jpg" width="100px;" height="80px">
                            <div class="d-flex justify-content-between mt-2">
                                <p>العباية      <i class="mr-2 fas fa-check-circle"></i> مشتري منذ ١١ شهر </p>
                                <p><i class="fas fa-thumbs-up"></i> 17   <i class="fas fa-thumbs-down"></i>  5</p>
                            </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 mt-5 col-sm-12 rightside">
                        <div class=" ">
                            <div class="card-body">
                                <h1 class="h2">عباية</h1>
                                <p class=" py-2"><del>OMR 25.00</del>  OMR 20.00 </p>
                                <p>موقع عباية لبيع جميع انواع العبايات</p>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <h6>الالوان المتاحة :</h6>
                                    </li>
                                    <li class="list-inline-item">
                                        <p class="text-muted"><span class="b btn  btn-sm size" style="background-color: bluel;height: 20px;width: 20px;"></span><span class="mx-2 btn  btn-sm size" style="background-color:blueviolet;height: 20px;width: 20px;"></span></p>
                                    </li>
                                </ul>


                                <form action="" method="GET">
                                    <input type="hidden" name="product-title" value="Activewear">
                                    <div class="">
                                        <div class="col-auto">
                                            <ul class="list-inline pb-3">
                                                <li class="list-inline-item">الحجم :
                                                    <input type="hidden" name="product-size" id="product-size" value="S">
                                                </li>

                                                <li class="list-inline-item"><span class="btn  btn-sm size">XL</span></li>
                                            </ul>
                                        </div>

                                    </div>
                                    <div class="row pb-3 pt-2">
                                        <div class="d-grid btn1">
                                            <button type="submit" class="btn btn-success btn-lg" name="submit" value="buy"> <i class="mx-2 fas fa-bolt"></i> اشتري </button>
                                        </div>
                                        <div class="d-grid mx-3 btn2">
                                            <button type="submit" class="btn btn-success btn-lg" name="submit" value="addtocard"> <i class="mx-2 fas fa-shopping-cart"></i>اضافة الي السلة</button>
                                        </div>
                                        <div class="col-auto">
                                            <ul class="list-inline pb-3">
                                                <li class="list-inline-item text-right">
                                                    الكمية
                                                    <input type="hidden" name="product-quanity" id="product-quanity" value="1">
                                                </li>
                                                <li class="list-inline-item"><span class="btn btn-success" id="btn-minus">-</span></li>
                                                <li class="list-inline-item  w"><span class="badge bg-secondary" id="var-value">1</span></li>
                                                <li class="list-inline-item"><span class="btn btn-success" id="btn-plus">+</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                </form>
                                
                                <div class="d-flex">
                                <p class="pt-2" style="color: #8b8109;">شارك :</p>
                                      <ul class="list-unstyled d-flex">
                                            <li class="mx-1 p-2"><a href="#"><i class="fab fa-facebook-f" style="color: fff;border-radius: 50%;font-size:25px;"></i></a></li>
                                            <li class="mx-1 p-2"><a href="#"><i class=" fab fa-twitter" style="border-radius: 50%;font-size:25px;"></i></a></li>
                                            <li class="mx-1 p-2"><a href="#"><i class="fab fa-instagram" style="color: #9b4444;border-radius: 50%;font-size:25px;"></i></a></li>
                                          <li class="mx-1 p-2"><a href="#" ><i class="fab fa-whatsapp" style="color: #5b9b4b;border-radius: 50%;font-size:25px;"></i></a></li>
                                        </ul>
                                </div>
                                
                                <div class="charg py-2 px-2">
                                    <p class="p1 py-2"><i class="px-2 fas fa-truck"></i>شحن مجاني لمدة 5  أيام </p>
                                    <p><i class="px-2 fas fa-arrow-left"></i> ارجاع مجاني لمدة 30 يوما لتغيير رأيك</p>
                                </div>
                                <div class="desc mt-4 px-3 py-2">
                                <div class="d-flex"><h6>تفاصيل المنتج</h6><h6 class="des mx-4">الوصف</h6></div>
                                    <p class="pt-2">ارجاع مجاني لمدة 30 يوما لتغيير رأيك شحن مجاني لمدة 5  أيام  </p>
                                </div>

                            </div>
                        </div>
                    </div>





                </div>
            </div>

        </section>

        <div class="relatedproduct pt-4 pb-5">
            <div class=" container ">
                <h4 class="py-4">قد يعجبك أيضا</h4>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="box px-3 text-center">
                            <img src="images/women.jpeg" alt="women">
                            <h5 class="pt-4 ">عباية</h5>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="box px-3 text-center">
                            <img src="images/women.jpeg" alt="women">
                            <h5 class="pt-4 ">عباية</h5>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="box px-3 text-center">
                            <img src="images/women.jpeg" alt="women">
                            <h5 class="pt-4 ">عباية</h5>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="box px-3 text-center">
                            <img src="images/women.jpeg" alt="women">
                            <h5 class="pt-4 ">عباية</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Close Content -->

    </div>

   
           
  @include('user.includes.footer')
  
</body>
</html>
