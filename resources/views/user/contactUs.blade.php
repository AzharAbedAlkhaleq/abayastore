@include('user.includes.head')
<body>
  @include('user.includes.header')

  <div class="contactus">
    <div class="container">
        <div class="text-center mt-5 pt-4 top">
            <img src="{{ asset('front/images/communicate.png') }}" alt="coomet">
            <h2 class="pt-3 pb-2">اتصل بنا</h2>
            <p>
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</p>
        </div>

        <div class="forms mt-5 pt-5">
            <div class="row pt-5">
                <div class="col-md-7 col-sm-12 rights px-5">
                    <h2>اتصل بنا</h2>
                    <form action="" method="" class="mt-5">
                        <div class="mb-3 row">
                            <div class="col-6">
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="اسم الاول">

                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="الكنية">

                            </div>
                            <div class="col-6">
                            </div>
                        </div>

                        <div class="mb-3">
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="بريدك الالكتروني ">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="رسالتك"></textarea>
                        </div>
                        <button type="submit" class="btn btn-lg btn-warning">ارسلها حقا</button>
                    </form>

                </div>
                <div class="col-md-5 col-sm-12 px-5">

          <div class="lefts py-5">
                         <h6>برج ليوا</h6>
                    <h6>ص ب 901</h6>
                    <h6>ابو ظبي</h6>
                    <h6>ساعات العمل :</h6>
                    <p>الاثنين- الجمعة: 8:00 مساء 9:00  صباحا</p>
                     <p>جلس- الشمس: 8:00 مساء 9:00  صباحا</p>
                    <h5>دعوة الحجز</h5>
                    <h6>893845 3403 </h6>
                    
                    <h6>البريد الالكتروني:</h6>
                    <p>info@abaya.com</p>     
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>

  @include('user.includes.footer')
  
</body>
</html>