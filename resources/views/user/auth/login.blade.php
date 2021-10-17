<!DOCTYPE html >
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta data-brackets-id='7728' name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>صفحة الدخول</title>
        <link rel="stylesheet" href="{{ asset('front') }}/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('front') }}/css/bootstrap-rtl.css">
        <link rel="stylesheet" href="{{ asset('front') }}/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('front') }}/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('front') }}/css/style.css">
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
        <link rel="stylesheet" href="{{ asset('front') }}/css/animate.css">
        <link rel="stylesheet" href="{{ asset('front') }}/css/owl.carousel.min.css">
        <link rel="stylesheet" href="{{ asset('front') }}/css/slick.css">
        <link rel="stylesheet" href="{{ asset('front') }}/css/slick-theme.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  @include('user.includes.header') 
  
  <div class="mainimg_signup ">
    <div class="container d-flex justify-content-between py-3">
        <h3 class="">تسجيل&تسجيل جديد</h3>

        <img>
    </div>
</div><!-- end mainimg_signup -->

<div class="mainsignup  container">

    <form method="post"  id="signupForm">


        <div class="row">
            <div class="col-12">
                <div class="steps text-left">

                    <div class="steps-container " finish="1">
                        @if (session()->has('error'))
                          <div class="aler alert-danger">
                            {{session()->get('error')}}    
                          </div>  
                        @endif
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
                                <div class="phone  mb-3">
                                    <div class="alert alert-danger" id="error" style="display: none;"></div>

                                    <div class="alert alert-success" id="successAuth" style="display: none;"></div>

                                    <input type="text" name="phone" id="number" placeholder=" (+968) ادخل رقم الهاتف " class="">

                                    <div id="recaptcha-container"></div>

                                    <a href="" class="btn btn-lg px-2" onclick="sendOTP();"> ارسال</a>
                                </div>

                                   
                                   
                                <div class="phone justify-content-between">
                                    <div class="alert alert-success" id="successOtpAuth" style="display: none;"></div>
                                    <input type="text" name="otp" id="verification" placeholder="ادخل رمز التحقق" class="">
                                    <a href="#" class="mt-7 px-2 btn btn-lg"  onclick="verify();"> تحقق</a>

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
                                        <div class="col-5"><img src="{{ asset('front/images/women.jpeg') }}"></div>
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

                        <div class="resu">
                            <button type="button" class="button next-button py-1">استمرار</button>
                        </div>

                    </div>

                    <div class="step-form-4 container text-center pb-4 d-flex justify-content-between" id="step-form-4 ">
                        <div class="">
                            <button type="button" class="button next-button py-1">الدفع عند الاستلام</button>
                        </div>
                        <div class="">
                            <a href="{{route('payment')}}" class="btn btn-pay next-button py-1">دفع الكتروني</a>
                        </div>
                        <div class="">
                            <button type="button" class="button next-button py-1">الغاء</button>
                        </div>
                    </div>



</div>
</div>
</div>
</form>
</div>




<footer class="mt-2 pt-5">
    <div class="footer pt-5 pb-2">
        <div class="container">
            <div class="row text-right">
                <div class="col-md-3 col-sm-6">
                    <img src="{{ asset('front') }}/images/logo55.png" class="w-100">
                   <ul class="list pt-2 list-unstyled d-flex justify-content-center">
                 <li class="mr-1 p-2"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
               <li class="mr-1 p-2"><a href="#"><i class="fab fa-twitter"></i></a></li>
               <li class="mr-1 p-2"><a href="#"><i class="fab fa-instagram"></i></a></li>
              <li class="mr-1 p-2"><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                </div>
                <div class="col-6 col-md-2 ">
                    <h4>معلومة</h4>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('aboutUs') }}">من نحن</a></li>
                        <li><a href="#">خدمة الزبائن</a></li>
                        <li><a href="#">سياسة الخصوصية</a></li>
                        <li><a href="{{ route('contact') }}">تواصل معنا</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-2">
                    <h4>مصادر</h4>
                    <ul class="list-unstyled text-right">
                        <li><a href="#">الشحن و الاسترجاع</a></li>
                        <li><a href="#">شحن مجاني</a></li>
                        <li><a href="#">سياسة الشحن</a></li>
                        <li><a href="#">دفع أمن</a></li>
                        <li><a href="#">الأسئلة الشائعة</a></li>

                    </ul>
                </div>
                <div class="apps col-6 col-md-2">
                    <h4>تطبيقات</h4>
                    <a href="#" class="my-2"><img class="my-2" src="{{ asset('front') }}/images/googleplay.png"></a>
                    <a href="#"><img class="my-2" src="{{ asset('front') }}/images/appstore.jpeg"></a>
                </div>
                <div class="cardd col-6 col-md-2">
                    <h4>اتصل بنا</h4>
                    <p>في النشر والتصميم الجرافيكي و lorem lpsum هو شكل نصي</p>
                    <img src="{{ asset('front') }}/images/Minimal-Credit-Card-Icons.jpeg">

                </div>
            </div>
        </div>
    </div>
    <div class="end">
        <div class="container py-3 text-center">
            <div>
                <h5> 	&#169; 2021 | عباية | كل الحقوق محفوظة</h5>
            </div>
        </div>
    </div>

   
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
<script>
    var firebaseConfig = {

apiKey: "AIzaSyDIUD1F3KP6eLQ6iRyPgCv-GrGntxDypw0",
authDomain: "abaya-c8b7c.firebaseapp.com",
projectId: "abaya-c8b7c",
storageBucket: "abaya-c8b7c.appspot.com",
messagingSenderId: "657247402231",
appId: "1:657247402231:web:11d61dd92e793585c23bf2",
measurementId: "G-VQ8HJKT9QV"
};

firebase.initializeApp(firebaseConfig);

</script>
<script type="text/javascript">
    window.onload = function () {
        render();
    };

    function render() {
        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
        recaptchaVerifier.render();
    }

    function sendOTP() {
        var number = $("#number").val();
        firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function (confirmationResult) {
            window.confirmationResult = confirmationResult;
            coderesult = confirmationResult;
            console.log(coderesult);
            $("#successAuth").text("Message sent");
            $("#successAuth").show();
        }).catch(function (error) {
            $("#error").text(error.message);
            $("#error").show();
        });
    }

    function verify() {
        var code = $("#verification").val();
        coderesult.confirm(code).then(function (result) {
            var user = result.user;
            console.log(user);
            $("#successOtpAuth").text("Auth is successful");
            $("#successOtpAuth").show();
        }).catch(function (error) {
            $("#error").text(error.message);
            $("#error").show();
        });
    }
</script>
<script src="https://cdn.tiny.cloud/1/ywnjssncdfmasinkweic1ecq329fm231ly7a524e6t6ks3tv/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{ asset('front/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('front/js/wow.min.js') }}"></script>
<script src="{{ asset('front/js/slick.min.js') }}"></script>
<script src="{{ asset('front/js/swiper-bundle.min.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="{{ asset('front/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('front/js/script.js') }}"></script>
<script src="{{-- asset('front/js/all.min.js') --}}"></script>
<script src="{{ asset('front') }}/js/owl.carousel.min.js"></script>


</body>
</html>

