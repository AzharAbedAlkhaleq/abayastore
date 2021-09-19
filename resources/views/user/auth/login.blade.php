@include('user.includes.head')
<body>
  @include('user.includes.header') 
  
  
  
  <div class="mainimg_signup ">
    <div class="container d-flex justify-content-between py-3">
        <h3 class="">تسجيل&تسجيل جديد</h3>

        <img>
    </div>
</div><!-- end mainimg_signup -->

<div class="mainsignup  container">

    <form method="post" id="signupForm">


        <div class="row">
            <div class="col-12">
                <div class="steps text-left">

                    <div class="steps-container " finish="1">
                        <div>
                            <div id="step1" class="active">
                                <p class="pt-2">1</p>
                            </div>
                            <h6 class="txt ">تسجيل & تسجيل جديد</h6>
                        </div>

                        <div>
                            <div id="step2">
                                <p class="pt-2">2</p>
                            </div>
                            <h6 class="txt ">عنوان التسليم</h6>
                        </div>

                        <div>
                            <div id="step3">
                                <p class="pt-2">3</p>
                            </div>
                            <h6 class="txt ">ملخص الطلب</h6>
                        </div>


                        <div>
                            <div id="step4">
                                <p class="pt-2">4</p>
                            </div>
                            <h6 class="txt ">خيارات الدفع</h6>
                        </div>

                    </div>
                </div>


            </div>
            <div class="col-12 mt-5 stepss">
                <div>

                    <div class="step-form-1 active" id="step-form-1">
                        <div class="row text-right pt-5 mt-3">
                            <div class="col-md-3 col-sm-12   aa ">
                                <div class="phone d-flex mb-3">
                                    <input type="text" name="phone" placeholder="ادخل الهاتف" class="">

                                    <a href="#" class="btn btn-lg px-2"> ارسال</a>


                                </div>

                                <div class="justify-content-between">
                                    <input type="text" name="otp" placeholder="ادخل رمز التحقق" class="">
                                    <a href="#" class="mt-5 px-2">اعادة ارسال</a>

                                </div>

                                <div class=" soci ">
                                    <h5>تسجيل الدخول باستخدام</h5>
                                    <ul class=" pt-2 list-unstyled d-flex">
                                        <li class="mx-1 p-2"><a href="#"><i class=" fab fa-facebook-f"></i></a></li>
                                        <li class="mx-1 p-2"><a href="{{ route('login.twitter') }}"><i class=" fab fa-twitter"></i></a></li>
                                        <li class="mx-1 p-2"><a href="{{ route('login.google') }}"><i class=" fab fa-google-plus-g"></i></a></li>
                                    </ul>
                                </div>

                            </div>
                            <div class="col-md-4 col-sm-12 mx-4 px-5">
                                <h5 class="px-2">مزايا تسجيل الدخول الخاص بنا </h5>
                                <ul class="lii list-unstyled">
                                    <li><i class="fas fa-car"></i> متابعة الطلب بسهولة </li>
                                    <li><i class="fas fa-bell"></i> الحصول علي تنبيه وتوصية ذات صلة </li>
                                    <li><i class="fas fa-star"></i> قائمة الطلبات و المراجعات والتقييم </li>

                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <p><i class="fas fa-shield-alt"></i> مدفوعات أمنة ومأمونة . تقوم بارجاع <br> المنتحات الاصلية 100%</p>
                            </div>
                        </div>
                        <div class="">
                            <button type="button" class="button next-button py-1">استمرار</button>
                        </div>


                    </div><!-- end step-form-1 -->
                    <div class="step-form-2 container   pb-5 pt-5 px-2" id="step-form-2">
                        <h6><i class="fas fa-car"></i> متابعة الطلب بسهولة </h6>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-1">
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="الايميل">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-1">
                                    <input type="text" class="form-control" name="name" placeholder="الحالة">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 d-flex namee">
                                <div class="mb-1">
                                    <input type="text" class="form-control" name="name" placeholder="الاسم الاول">
                                </div>
                                <div class="mb-1 ml-2">
                                    <input type="text" class="form-control" name="name" placeholder="اسم العائلة">
                                </div>

                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-1">
                                    <input type="text" class="form-control" name="name" placeholder="الرمز البريدي">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-1">
                                    <input type="text" class="form-control" name="name" placeholder="عنوان الشارع">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-1">
                                    <input type="text" class="form-control" name="name" placeholder="الدولة">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-1">
                                    <input type="text" class="form-control" name="name" placeholder="المدينة">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-1">
                                    <input type="text" class="form-control" name="name" placeholder="رقم الهاتف">
                                </div>
                            </div>



                        </div>

                        <div class="">
                            <button type="button" class="button next-button">استمرار</button>



                        </div>

                    </div><!-- end step-form-2 -->

                    <div class="step-form-3 text-center" id="step-form-3 ">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="rightside">
                                    <div class="row py-2 mb-2">
                                        <div class="col-5"><img src="images/women.jpeg"></div>
                                        <div class="col-7 pt-3">
                                            <p>HIZAB (BULE)</p>
                                            <p>OMR 7112.00</p>
                                            <p>الكمية <select class="form-select" aria-label="Default select example">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select></p>
                                        </div>
                                    </div>
                                    <p class="d-flex">ارسال طلب تأكيد ع الايميل <input type="email" placeholder="الايميل"></p>
                                </div>
                            </div>
                            <div class="col-md-6 leftside  col-sm-12">
                                <div class="up brd  py-3">
                                    <h4>تفاصيل الاسعار</h4>
                                    <div class="d-flex justify-content-between">
                                        <h6>المجموع الفرعي</h6>
                                        <h6>OMR 454</h6>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <h6>الخصم</h6>
                                        <h6>OMR 454</h6>
                                    </div>
                                </div>
                                <div class="meddle py-3 brd">
                                    <div class="d-flex justify-content-between">
                                        <h6>رمز الخصم</h6> <input type="text" placeholder="كود الخصم">
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <h6>VAT</h6>
                                        <h6>OMR 454</h6>
                                    </div>
                                </div>
                                <div class="brd py-3">
                                    <div class="d-flex justify-content-between">
                                        <h6> نسبة بيبال</h6>
                                        <h6>OMR 454</h6>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <h6>رسوم الشحن</h6>
                                        <h6>OMR 454</h6>
                                    </div>

                                </div>
                                <div class=" py-3 ">
                                    <div class="d-flex justify-content-between">
                                        <h6> المبلغ الكلي</h6>
                                        <h6>OMR 454</h6>
                                    </div>
                                    <p><i class="fas fa-shield-alt"></i> مدفوعات أمنة ومأمونة . تقوم بارجاع <br> المنتحات الاصلية 100%</p>


                                </div>
                            </div>
                        </div>

                        <div class="">
                            <button type="button" class="button next-button py-1">استمرار</button>
                        </div>

                    </div>

                    <div class="step-form-4 container text-center pb-4 d-flex justify-content-between" id="step-form-4 ">
                        <div class="">
                            <button type="button" class="button next-button py-1">الدفع عند الاستلام</button>
                        </div>
                        <div class="">
                            <button type="button" class="button next-button py-1">دفع بيبال</button>
                        </div>
                        <div class="">
                            <button type="button" class="button next-button py-1">الغاء</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div><
  
  
  
  
  
  @include('user.includes.footer')
  
</body>
</html>
