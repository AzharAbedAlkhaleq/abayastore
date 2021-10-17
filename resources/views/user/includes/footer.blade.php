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
<script src="https://cdn.tiny.cloud/1/ywnjssncdfmasinkweic1ecq329fm231ly7a524e6t6ks3tv/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{ asset('front/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('front/js/wow.min.js') }}"></script>
<script src="{{ asset('front/js/slick.min.js') }}"></script>
<script src="{{ asset('front/js/swiper-bundle.min.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="{{ asset('front/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('front/js/script.js') }}"></script>
<script src="{{ asset('front/js/wow.min.js') }}"></script>
<script src="{{-- asset('front/js/all.min.js') --}}"></script>
<script src="{{ asset('front') }}/js/owl.carousel.min.js"></script>

@yield('scripts')

</body>
</html>
